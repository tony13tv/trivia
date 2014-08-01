<?php
App::uses('AppModel', 'Model');

class Category extends AppModel {
	public $displayField = 'name';

	public $hasMany = [
		'Question' => [
			'className' => 'Question',
			'foreignKey' => 'category_id'
		]
	];
}
