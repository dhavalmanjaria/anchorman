<?php 
class DB {
	// The database connection. Static because you need only one connection across multiple instances.
	protected static $connection;
	
	/**
	 * Connect to the database
	 * 
	 * @return bool false on failure / mysqli MySQLi object instance on success
	 * 
	 */
	public function connect() {
		// Try to connect to the database
		if (!isset(self::$connection)) {
			// Loaded from config.php
			self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}
		
		// If the connection was unsuccessful, handle the error
		if(self::$connection == false) {
			// Handle error: notify administrator, log to a file, show an error screen, etc.
			error_log("Database connection failed: " . self::$connection->error);	
		}
		
		return $connection;
	}
	
	/**
	 * Query the database
	 * 
	 * @param $query The query string
	 * @return mixed The result of the mysqli::query() function
	 */
	public function query($query){
		// Connect to the database
		$connection = $this->connect();
		
		// Execute the query
		$result = $connection->query($query);
		
		return $result;
	}
	
	public function select($query) {
		$rows = array();
		$result = $this->query($query);
		
		if($result === false) {
			return false;
		}
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}
	
	/**
	 * Quote and escape value for use in a database query
	 * 
	 * @param string $value to be quoted and escaped
	 * @return string The quoted and escaped string
	 */
	public function quote($value) {
		$connetcion = $this->connect();
		return "'" . $connection->real_escape_string($value) . "'";
	}
}
?>