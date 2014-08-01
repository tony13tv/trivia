<?php
	App::uses('AppController', 'Controller');

	class FactsController extends AppController {
		public function admin_index() {
			$fields = array_keys($this->Fact->getColumnTypes());
			$this->set(compact('fields'));
		}

		public function admin_add() {
			$this->loadModel('Category');
			$this->set('categories', $this->Category->find('list'));
			if ($this->request->is('post')) {
				if ($this->Fact->save($this->request->data)) {
					$this->Session->setFlash(__('The question has been saved.'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
				}
			}
		}

		public function admin_edit() {

		}
	}
