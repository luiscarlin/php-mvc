<?php

class Bootstrap {
	
	function __construct() {
		// if no url, then go to index
		$url = isset($_GET['url']) ? $_GET['url'] : "index";
		
		$url = explode('/', rtrim($url, '/'));
		
		// debug
		//print_r($url);
		
		$controllerName = $url[0];
		
		$file = 'controllers/' . $controllerName . '.php';
		
		if (! file_exists($file)) {
			$this->error();
			return false;
		}
		
		require $file;
		
		$controller = new $controllerName;
		$controller->loadModel($controllerName);
		
		if (isset($url[1])) {
			
			$methodName = $url[1];
			
			if (! method_exists($controller, $methodName)) { 
				$this->error();
				return false;
			}

			if (isset($url[2])) {
				$controller->{$methodName}($url[2]);
			}
			else {
				$controller->{$methodName}();
			}
		}
		else { 
			// no method was set, so go to index() method for the controller by default
			$controller->index();
		}
	}
	
	public function error() { 
		require 'controllers/error.php'; 
		$controller = new Error(); 
		$controller->index(); 
		return false;
	}
}