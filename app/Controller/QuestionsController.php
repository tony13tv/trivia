<?php
	App::uses('AppController', 'Controller');

	/**
	 * Class QuestionsController
	 *
	 * @property Questions $Question
	 */
	class QuestionsController extends AppController {
		public function view($id = null) {
			if (!$this->Question->exists($id)) {
				throw new NotFoundException(__('Invalid question'));
			}
			$this->Question->recursive = 2;
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->set('question', $this->Question->find('first', $options));
			$this->set('posibilities', ['(A) 1960', '(B) 1872', '(C) 1947', '(D) 1950']);
			$this->set('lives', 3);
		}

		public function admin_index() {
			$this->Question->recursive = 0;
			$this->set('questions', $this->Paginator->paginate());
		}

		public function admin_add() {
			if ($this->request->is('post')) {
				if ($this->Question->save($this->request->data)) {
					$this->Session->setFlash(__('The question has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
				}
			}
		}

		public function admin_edit($id = null) {
			if (!$this->Question->exists($id)) {
				throw new NotFoundException(__('Invalid question'));
			}
			if ($this->request->is('put')) {
				if ($this->Question->save($this->request->data)) {
					$this->Session->setFlash(__('The question has been saved.'), 'default', ['success']);

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'default', ['warning']);
				}
			} else {
				$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
				$this->request->data = $this->Question->find('first', $options);
			}
		}
	}
