<?php
	/**
	 * Application model for CakePHP.
	 *
	 * This file is application-wide model file. You can put all
	 * application-wide model-related methods here.
	 *
	 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
	 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	 *
	 * Licensed under The MIT License
	 * For full copyright and license information, please see the LICENSE.txt
	 * Redistributions of files must retain the above copyright notice.
	 *
	 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
	 * @link          http://cakephp.org CakePHP(tm) Project
	 * @package       app.Model
	 * @since         CakePHP(tm) v 0.2.9
	 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
	 */

	App::uses('Model', 'Model');

	/**
	 * Application model for Cake.
	 *
	 * Add your application-wide methods in the class below, your models
	 * will inherit them.
	 *
	 * @package       app.Model
	 */
	class AppModel extends Model {
		public $actsAs = ['Containable'];

		public $images = [];

		public function beforeSave($options = array()) {
			foreach ($this->images as $image) {
				if (is_uploaded_file($this->data[ $this->alias ][ $image ]['tmp_name'])) {
					move_uploaded_file($this->data[ $this->alias ][ $image ]['tmp_name'], WWW_ROOT . 'files' . DS . $this->data[ $this->alias ][ $image ]['name']);

					// store the filename in the array to be saved to the db
					$this->data[ $this->alias ][ $image ] = $this->data[ $this->alias ][ $image ]['name'];
				} else {
					$this->data[ $this->alias ][ $image ] = "";
				}
			}

			return parent::beforeSave($options);
		}
	}
