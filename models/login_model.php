<?php

class Login_Model extends Model {
	
	function __construct() { 
		parent::__construct();
	}
	
	public function run() { 
		
		$query = $this->db->prepare("SELECT id FROM users WHERE
				login = :login AND password = :password"); 
		
		$query->execute(array(
				':login' => $_POST['login'], 
				':password' => $_POST['password']
		)); 
		
		$match = $query->rowCount();

		if ($match == 1) { 
			//found person, so show the dashboard
			
			// initialize session
			Session::init();
			
			// set the session to loggedIn=true
			Session::set('loggedIn', true); 
			
			// redirect to dashboard
			header('location: ../dashboard'); 
		}
		else { 
			// keep showing the login
			header('location: ../login'); 
		}
	}
}