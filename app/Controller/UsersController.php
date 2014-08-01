<?php
	App::uses('AppController', 'Controller');

	/**
	 * Users Controller
	 *
	 * @property User               $User
	 * @property PaginatorComponent $Paginator
	 */
	class UsersController extends AppController {

		/**
		 * index method
		 *
		 * @return void
		 */
		public function index() {
			$this->User->recursive = 0;
			$this->set('users', $this->Paginator->paginate());
		}

		/**
		 * view method
		 *
		 * @throws NotFoundException
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function view($id = null) {
			if (!$this->User->exists($id)) {
				throw new NotFoundException(__('Invalid user'));
			}
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->set('user', $this->User->find('first', $options));
		}

		/**
		 * add method
		 *
		 * @return void
		 */
		public function add() {
			if ($this->request->is('post')) {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved.'));

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
		}

		/**
		 * edit method
		 *
		 * @throws NotFoundException
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function edit($id = null) {
			if (!$this->User->exists($id)) {
				throw new NotFoundException(__('Invalid user'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved.'));

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
				$this->request->data = $this->User->find('first', $options);
			}
		}

		/**
		 * delete method
		 *
		 * @throws NotFoundException
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function delete($id = null) {
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid user'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->User->delete()) {
				$this->Session->setFlash(__('The user has been deleted.'));
			} else {
				$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
			}

			return $this->redirect(array('action' => 'index'));
		}

		/**
		 * admin_index method
		 *
		 * @return void
		 */
		public function admin_index() {
			$fields = array_keys($this->User->getColumnTypes());
			$this->set(compact('fields'));
		}

		/**
		 * admin_view method
		 *
		 * @throws NotFoundException
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_view($id = null) {
			if (!$this->User->exists($id)) {
				throw new NotFoundException(__('Invalid user'));
			}
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->set('user', $this->User->find('first', $options));
		}

		/**
		 * admin_add method
		 *
		 * @return void
		 */
		public function admin_add() {
			$this->User->recursive = 3;
			if ($this->request->is('post')) {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved.'), 'default', ['success']);

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', ['warning']);
				}
			}
		}

		/**
		 * admin_edit method
		 *
		 * @throws NotFoundException
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_edit($id = null) {
			if (!$this->User->exists($id)) {
				throw new NotFoundException(__('Invalid user'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been saved.'));

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
				$this->request->data = $this->User->find('first', $options);
			}
		}

		/**
		 * admin_delete method
		 *
		 * @throws NotFoundException
		 *
		 * @param string $id
		 *
		 * @return void
		 */
		public function admin_delete($id = null) {
			$this->User->id = $id;
			if (!$this->User->exists()) {
				throw new NotFoundException(__('Invalid user'));
			}
			$this->request->allowMethod('post', 'delete');
			if ($this->User->delete()) {
				$this->Session->setFlash(__('The user has been deleted.'));
			} else {
				$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
			}

			$this->redirect(array('action' => 'index'));
		}

		public function admin_login() {
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					$this->redirect($this->Auth->redirectUrl());
				} else {
					$this->Session->setFlash('Email/Password wrong try again.', 'default', ['class' => 'warning']);
				}
			}
		}

		public function admin_logout() {
			$this->Auth->logout();
			$this->redirect($this->Auth->redirectUrl());
		}

		public function login() {

		}

		public function logout() {

		}

		public function register() {
			if ($this->request->is('post')) {
				if ($this->User->save($this->request->data)) {
					if ($this->Auth->login()) {
						$this->Session->setFlash('Bienvenido a la trivia de Larach y Cia.');
						$this->redirect($this->Auth->loginRedirect);
					} else {
						$this->redirect($this->Auth->logoutRedirect);
					}
				}
			}
		}
	}
