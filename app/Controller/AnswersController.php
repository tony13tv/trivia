<?php
	App::uses('AppController', 'Controller');

	class AnswersController extends AppController {

		public function admin_index() {
			$this->Answer->recursive = 0;
			$this->set('answers', $this->Paginator->paginate());
		}

		public function admin_add() {
			if ($this->request->is('post')) {
				if ($this->Answer->save($this->request->data)) {
					$this->Session->setFlash(__('The answer has been saved.'));

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
				}
			}
		}

		public function admin_edit($id = null) {
			if (!$this->Answer->exists($id)) {
				throw new NotFoundException(__('Invalid question'));
			}
			if ($this->request->is('put')) {
				if ($this->Answer->save($this->request->data)) {
					$this->Session->setFlash(__('The answer has been saved.'));

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The answer could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('Answer.' . $this->Answer->primaryKey => $id));
				$this->request->data = $this->Answer->find('first', $options);
			}
		}
	}
