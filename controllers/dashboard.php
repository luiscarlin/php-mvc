<?php
class Dashboard extends Controller {
	
	function __construct() {
		parent::__construct();
		
		Session::init(); 
		
		// check if the person is logged in
		$logged = Session::get('loggedIn'); 
		
		if($logged == false) { 
			// cannot see this pages because you are not logged in
			Session::destroy();
			
			// redirect 
			header('location: ../login'); 
			exit;
		}
	}
	
	function index() { 
		$this->view->render('dashboard/index'); 
	}
}