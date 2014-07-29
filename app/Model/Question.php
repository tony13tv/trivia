<?php
	App::uses('AppModel', 'Model');

	class Question extends AppModel {
		public $displayField = 'content';

		public $images = ['image'];

		public $hasMany = [
			'Answer' => [
				'className'  => 'Answer',
				'foreignKey' => 'question_id'
			]
		];
	}
