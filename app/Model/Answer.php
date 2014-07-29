<?php
	App::uses('AppModel', 'Model');

	class Answer extends AppModel {
		public $displayField = 'content';

		public $belongsTo = [
			'Question' => [
				'className'  => 'Question',
				'foreignKey' => 'question_id'
			]
		];
	}
