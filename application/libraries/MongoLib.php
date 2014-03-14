<?php

include_once('mongo/Builder.php');

class MongoLib {
	public function __construct(){
		$ci =& get_instance();
		$ci->mongo = new MongoQB\Builder(Array('dsn' =>  'mongodb://localhost:27017/message'));
	}

}