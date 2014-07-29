<?php
	App::uses('AppModel', 'Model');

	/**
	 * User Model
	 *
	 * @property Group $Group
	 * @property Entry $Entry
	 */
	class User extends AppModel {

		/**
		 * Display field
		 *
		 * @var string
		 */
		public $displayField = 'username';

		/**
		 * belongsTo associations
		 *
		 * @var array
		 */
		public $belongsTo = array(
			'Group' => array(
				'className'  => 'Group',
				'foreignKey' => 'group_id'
			)
		);

		/**
		 * hasMany associations
		 *
		 * @var array
		 */
		public $hasMany = array(
			'Entry' => array(
				'className'  => 'Entry',
				'foreignKey' => 'user_id'
			)
		);

	}
