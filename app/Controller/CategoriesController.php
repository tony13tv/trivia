<?php
	App::uses('AppController', 'Controller');

	/**
	 * Class CategoriesController
	 *
	 * @property Category $Category
	 */
	class CategoriesController extends AppController {
		public function admin_index() {
			$fields = array_keys($this->Category->getColumnTypes());
			$this->set(compact('fields'));
		}

		public function admin_add() {
			if ($this->request->is('post')) {
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash('The category was saved correctly');
					$this->redirect(['action' => 'index']);
				} else {
					$this->Session->setFlash('The category couldn\'t be saved correctly');
				}
			}
		}

		public function admin_edit($id = null) {
			if (!$this->Category->exists($id)) {
				throw new NotFoundException(__('Invalid category'));
			}
			if ($this->request->is('put')) {
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash('The category was saved correctly');
					$this->redirect(['action' => 'index']);
				} else {
					$this->Session->setFlash('The category couldn\'t be saved correctly');
				}
			} else {
				$this->request->data = $this->Category->find('first', ['conditions' => ['Category.id' => $id]]);
			}
		}
	}
