<?php

class Index {
	
	function __construct() {
		echo 'We are in index';
	}
	
	function method($arg = false) {
		
		echo "you are in method with optinal parameter " . $arg;
		
	}
}