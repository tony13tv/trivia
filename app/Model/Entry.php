<?php
App::uses('AppModel', 'Model');

class Entry extends AppModel {
	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id'
		],
		'Question' => [
			'className' => 'Question',
			'foreignKey' => 'question_id'
		],
		'Answer' => [
			'className' => 'Answer',
			'foreignKey' => 'answer_id'
		]
	];
}
