<?php

class Index extends Controller {
	
	function __construct() {
		parent::__construct();
		//echo 'We are in index<br />';
	}
	
	public function index() {
		$this->view->render('index/index');
	}
}