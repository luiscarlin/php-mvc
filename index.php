<?php

$url = explode('/', $_GET['url']); 

print_r($url); 

$file = './controllers/' . $url[0] . '.php';

if (file_exists($file)) { 
	require $file; 
}



$controller = new $url; 

