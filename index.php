<?php

$url = explode('/', $_GET['url']); 

// debug
print_r($url); 

$file = 'controllers/' . $url[0] . '.php';

if (file_exists($file)) { 
	require $file;
	$controller = new $url[0];
	
}
else { 
	require 'controllers/error.php'; 
	$controller = new Error();
}

