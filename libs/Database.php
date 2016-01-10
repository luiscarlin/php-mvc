<?php

class Database extends PDO {
	
	function __construct() {
		parent::__construct('mysql:host=localhost;dbname=php-mvc', 'root', 'mnilchay'); 
	}
	
	
}