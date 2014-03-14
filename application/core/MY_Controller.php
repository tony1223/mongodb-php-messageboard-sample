<?php use MongoQB\Builder;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  MY_Controller  extends  CI_Controller  {

	/**
	 *
	 * @var MongoQB\Builder
	 */
	var $mongo;//Builder

	public function __construct(){
		parent::__construct();
		session_start();
	}

	protected function _init(){
		session_start();
	}

	protected function return_json ($obj){
		echo json_encode($obj);
		return true;
	}

}
