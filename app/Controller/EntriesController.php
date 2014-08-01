<?php
	App::uses('AppController', 'Controller');

	class EntriesController extends AppController {
		public function admin_index() {
			$fields = array_keys($this->Entry->getColumnTypes());
			$this->set(compact('fields'));
		}
	}
