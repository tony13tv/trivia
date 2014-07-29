<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
        'unix_socket' => '/Applications/MAMP/tmp/mysql/mysql.sock',
		'database' => 'larach_trivia',
		'encoding' => 'utf8'
	);
}
