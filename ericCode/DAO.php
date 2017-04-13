<?php

class DAO {  
	
	protected static $DB_HOST = "localhost";
	
	protected static $DB_USERNAME = "root";
	
	protected static $DB_PASSWORD = "root";
	
	protected static $DB_NAME = "alms";
	
	protected $mysqli;
	
	
	function __construct() {
		$this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, self::$DB_PASSWORD, self::$DB_NAME);
		if ($this->mysqli->connect_error){
			die("Connection failed: " . $this->connect_error);
		}
	}
}
?>