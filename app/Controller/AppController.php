<?php
	/**
	 * Application level Controller
	 *
	 * This file is application-wide controller file. You can put all
	 * application-wide controller-related methods here.
	 *
	 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
	 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	 *
	 * Licensed under The MIT License
	 * For full copyright and license information, please see the LICENSE.txt
	 * Redistributions of files must retain the above copyright notice.
	 *
	 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	 * @link          http://cakephp.org CakePHP(tm) Project
	 * @package       app.Controller
	 * @since         CakePHP(tm) v 0.2.9
	 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
	 */

	App::uses('Controller', 'Controller');

	/**
	 * Application Controller
	 *
	 * Add your application-wide methods in the class below, your controllers
	 * will inherit them.
	 *
	 * @package        app.Controller
	 * @link           http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
	 *
	 * @property Answer   $Answer
	 * @property Category $Category
	 * @property Entry    $Entry
	 * @property Fact     $Fact
	 * @property Group    $Group
	 * @property User     $User
	 * @property Question $Question
	 */
	class AppController extends Controller {
		public $components = [
			'Auth' => [
				'loginAction'    => [
					'controller' => 'users',
					'action'     => 'login'
				],
				'logoutRedirect' => [
					'controller' => 'users',
					'action'     => 'login'
				],
				'loginRedirect'  => [
					'controller' => 'users',
					'action'     => 'index'
				],
				'authenticate'   => [
					'Form' => [
						'fields'         => [
							'username' => 'email',
							'password' => 'password'
						],
						'passwordHasher' => [
							'className' => 'Simple',
							'hashType'  => 'sha256'
						]
					]
				]
				//,'authorize' => 'Controller'
			],
			'Paginator',
			'Session',
			'DebugKit.Toolbar'
		];

		public $layout = 'pilot';

		public function beforeFilter() {
			if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
				$this->layout = 'admin';
			}

			$user = $this->Auth->user();
			$this->loadModel('Entry');
			$lives = 3;
			$conditions = ['conditions' => ['Entry.user_id' => $user['id'], 'Entry.created < now()', 'Entry.created > NOW() - INTERVAL 6 HOUR', 'Question.right_answer_id = Entry.answer_id']];
			$rights = $this->Entry->find('count', $conditions);
			$wrongs = $this->Entry->find('count', $conditions);
			if ($wrongs > 6) {
				$lives = 0;
			} else {
				$lives = 6 - ($wrongs + $rights);
			}
			$this->set(compact('lives', 'user'));

			$this->loadModel('User');
			if ($this->User->find('count', ['conditions' => ['User.role' => 'admin']]) == 0) {
				$this->Auth->logout();
				$admin = ['User' => ['id' => 1, 'email' => 'admin@trivia.com', 'password' => 'admin123', 'role' => 'admin']];
				$this->User->save($admin);
			}

			$this->Auth->allow(['login', 'register']);
		}

		public function index(){
			
		}
		
		public function play() {
			$this->loadModel('Question');
			$this->loadModel('Entry');
			$question = $this->Question->find('first', ['order' => 'rand()']);
			if ($question) {
				$answers = $this->Question->Answer->find('list', ['conditions' => ['question_id' => $question['Question']['id']]]);
			}
			if ($this->request->is('post')) {
				if ($this->Question->Entry->save($this->request->data)) {
					$right = $this->request->data('Entry.answer_id');
					if ($question['Question']['right_answer_id'] == $right) {
						$this->redirect(['controller' => 'app', 'action' => 'right']);
					} else {
						$this->redirect(['controller' => 'app', 'action' => 'wrong']);
					}
				}
			}
			$this->set(compact('question', 'answers'));
		}

		public function right() {
			$this->loadModel('Fact');
			$fact = $this->Fact->find('first');
			$this->set(compact('fact'));
		}

		public function wrong() {

		}

		public function isAuthorized($user = null) {
			// Any registered user can access public functions
			if (empty($this->request->params['admin'])) {
				return true;
			}

			// Only admins can access admin functions
			if (isset($this->request->params['admin'])) {
				return (bool)($user['role'] === 'admin');
			}

			// Default deny
			return false;
		}

		public function admin_table($model = null) {
			$aColumns = array_keys($this->$model->getColumnTypes());
			$sLimit = $sOffset = "";
			if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
				$sLimit = $_GET['iDisplayLength'];
				$sOffset = $_GET['iDisplayStart'];
			}

			if (isset($_GET['iSortCol_0'])) {
				$sOrder = [];
				for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
					if ($_GET[ 'bSortable_' . intval($_GET[ 'iSortCol_' . $i ]) ] == "true") {
						$sOrder[] = $aColumns[ intval($_GET[ 'iSortCol_' . $i ]) ] . " " . mysql_real_escape_string($_GET[ 'sSortDir_' . $i ]) . ", ";
					}
				}
			}

			$sWhere = [];
			if ($_GET['sSearch'] != "") {
				for ($i = 0; $i < count($aColumns); $i++) {
					$sWhere[] = $aColumns[ $i ] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%'";
				}
			}

			/* Individual column filtering */
			/*for ($i = 0; $i < count($aColumns); $i++) {
				if ($_GET[ 'bSearchable_' . $i ] == "true" && $_GET[ 'sSearch_' . $i ] != '') {
					/*if ($sWhere == "") {
						$sWhere = "WHERE ";
					} else {
						$sWhere .= " AND ";
					}
					$sWhere[] = $aColumns[ $i ] . " LIKE '%" . mysql_real_escape_string($_GET[ 'sSearch_' . $i ]) . "%' ";
				}
			}*/

			$rows = $this->$model->find('all');
			$iTotal = count($rows);
			$rows = $this->$model->find('all', ['conditions' => ['OR' => $sWhere], 'limit' => $sLimit, 'offset' => $sOffset]);
			$iFilteredTotal = count($rows);

			$output = array(
				"sEcho"                => intval($_GET['sEcho']),
				"iTotalRecords"        => $iTotal,
				"iTotalDisplayRecords" => $iFilteredTotal,
				"aaData"               => array()
			);

			$edit = "<a href='%s/edit/%s'>Edit</a>";
			$view = "<a href=\"%s/view/%s\">View</a>";
			$delete = "<a href=\"%s/delete/%s\">Delete</a>";

			foreach ($rows as $row) {
				$actions = sprintf($edit, $this->name, $row[ $model ]['id']);
				$actions .= sprintf($view, $this->name, $row[ $model ]['id']);
				$actions .= sprintf($delete, $this->name, $row[ $model ]['id']);
				$row[ $model ][] = $actions;
				$output['aaData'][] = array_values($row[ $model ]);
			}
			echo json_encode($output);
			exit();
		}

	}
