<?php
	App::uses('AppController', 'Controller');

	class GroupsController extends AppController {
		public function admin_index() {
			$this->Group->recursive = 0;
			$this->set('groups', $this->Paginator->paginate());
		}

		public function admin_add(){
			if ($this->request->is('post')) {
				if ($this->Group->save($this->request->data)) {
					$this->Session->setFlash(__('The group has been saved.'));

					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The group could not be saved. Please, try again.'));
				}
			}
		}
	}
