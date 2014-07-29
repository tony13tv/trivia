<?php

	class AppSchema extends CakeSchema {

		public function before($event = array()) {
			return TRUE;
		}

		public function after($event = array()) {
		}

		public $answers = [
			'id'          => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'content'        => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'question_id' => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10],
			'created'     => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified'    => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
		];

		public $categories = [
			'id'       => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'name'     => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'created'  => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified' => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
		];

		public $entries = [
			'id'        => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'content'      => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'user_id'   => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10],
			'answer_id' => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10],
			'created'   => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified'  => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL]
		];

		public $facts = [
			'id'          => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'name'        => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'image'       => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'category_id' => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10],
			'created'     => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified'    => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
		];

		public $groups = [
			'id'       => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'name'     => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'created'  => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified' => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL]
		];

		public $questions = [
			'id'          => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'content'    => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'image'       => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'category_id' => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10],
			'created'     => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified'    => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL]
		];

		public $users = [
			'id'         => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'username'   => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'group_id'   => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10],
			'password'   => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'email'      => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'first_name' => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'last_name'  => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'created'    => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified'   => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL]
		];

	}
