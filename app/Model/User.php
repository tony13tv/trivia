<?php
	App::uses('AppModel', 'Model');
	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

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

		public function beforeSave($options = []) {
			if (!empty($this->data[ $this->alias ]['password'])) {
				$passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
				$this->data[ $this->alias ]['password'] = $passwordHasher->hash(
					$this->data[ $this->alias ]['password']
				);
			}

			return true;
			//return parent::beforeSave($options);
		}

	}
