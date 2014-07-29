<?php
App::uses('AppModel', 'Model');

class Entry extends AppModel {
	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id'
		]
	];
}
