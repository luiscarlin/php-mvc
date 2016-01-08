<?php
class Error extends Controller {
	
	function __construct() {
		parent::__construct();
		//echo "$arg<br />"; 
	}
	
	function index() { 
		$this->view->render('error/index'); 
	}
}