<?php
class Bootstrap {
	function __construct() {
		$url = explode('/', rtrim($_GET['url'], '/'));
		
		// debug
		print_r($url);
		
		$controllerName = $url[0];
		
		$file = 'controllers/' . $controllerName . '.php';
		
		if (! file_exists($file)) {
			require 'controllers/error.php';
			new Error();
		
			# quit
			return false;
		}
		
		require $file;
		
		$controller = new $controllerName;
		
		if (isset($url[1])) {
		
			$methodName = $url[1];
		
			if (isset($url[2])) {
				$controller -> {$methodName}($url[2]);
			}
			else {
				$controller -> {$methodName}();
			}
		}
	}
}