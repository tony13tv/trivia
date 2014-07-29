<?php
	App::uses('AppModel', 'Model');

	class Group extends AppModel {
		public $hasMany = [
			'Users' => [
				'className'  => 'User',
				'foreignKey' => 'group_id'
			]
		];
	}
