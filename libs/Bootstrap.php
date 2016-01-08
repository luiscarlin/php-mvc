<?php
require 'controllers/error.php';

class Bootstrap {
	function __construct() {
		
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = explode('/', rtrim($_GET['url'], '/'));
		
		// debug
		//print_r($url);
		
		$controllerName = $url[0];
		
		if (empty($controllerName)) { 
			require 'controllers/index.php'; 
			$controller = new Index(); 
			return false;
		}
		
		$file = 'controllers/' . $controllerName . '.php';
		
		if (! file_exists($file)) {
			
			new Error("ERROR: This controller does not exist");
		
			# quit
			return false;
		}
		
		require $file;
		
		$controller = new $controllerName;
		
		if (isset($url[1])) {
			
			$methodName = $url[1];
			
			if (! method_exists($controller, $methodName)) { 
				new Error("ERROR: This method does not exist");
				return false;
			}

			if (isset($url[2])) {
				$controller -> {$methodName}($url[2]);
			}
			else {
				$controller -> {$methodName}();
			}
		}
	}
}