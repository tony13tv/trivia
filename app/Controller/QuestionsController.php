<?php
	App::uses('AppController', 'Controller');

	/**
	 * Class QuestionsController
	 *
	 * @property Question $Question
	 */
	class QuestionsController extends AppController {
		public function view($id = null) {
			if (!$this->Question->exists($id)) {
				throw new NotFoundException(__('Invalid question'));
			}
			$options = ['conditions' => ['Question.' . $this->Question->primaryKey => $id]];
			$question = $this->Question->find('first', $options);
			$this->set('answers', $this->Question->Answer->find('list', ['conditions' => ['question_id' => $id]]));
			$lives = 3;
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
			$this->set(compact('question', 'lives'));
		}

		public function admin_index() {
			$fields = array_keys($this->Question->getColumnTypes());
			$this->set(compact('fields'));
		}

		public function admin_add() {
			$this->set('categories', $this->Question->Answer->find('list'));
			if ($this->request->is('post')) {
				if ($this->Question->save($this->request->data)) {
					$this->Session->setFlash(__('The question has been saved.'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
				}
			}
		}

		public function admin_edit($id = null) {
			$this->set('categories', $this->Question->Category->find('list'));
			$this->set('rightAnswers', $this->Question->Answer->find('list', ['conditions' => ['question_id' => $id]]));
			if (!$this->Question->exists($id)) {
				throw new NotFoundException(__('Invalid question'));
			}
			if ($this->request->is('put')) {
				if ($this->Question->save($this->request->data)) {
					$this->Session->setFlash(__('The question has been saved.'), 'default', ['success']);
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'default', ['warning']);
				}
			} else {
				$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
				$this->request->data = $this->Question->find('first', $options);
			}
		}
	}
