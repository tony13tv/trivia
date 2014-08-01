<?php

	class UserSchema extends CakeSchema {

		public function before($event = array()) {
			return TRUE;
		}

		public function after($event = array()) {
		}

		public $groups = [
			'id'       => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'name'     => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'created'  => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified' => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL]
		];

		public $users = [
			'id'         => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10, 'key' => 'primary'],
			'username'   => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'group_id'   => ['type' => 'integer', 'null' => FALSE, 'default' => NULL, 'length' => 10],
			'role'       => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'password'   => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'email'      => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'first_name' => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'last_name'  => ['type' => 'string', 'null' => FALSE, 'default' => NULL],
			'created'    => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL],
			'modified'   => ['type' => 'datetime', 'null' => FALSE, 'default' => NULL]
		];

	}