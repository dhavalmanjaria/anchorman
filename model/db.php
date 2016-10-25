<?php

require_once ROOT_DIR . 'config.php';

/**
 * This class houses the database queries, connections and is used to connect to the database
 */
class DB {
	/**
	 * The database connection. Static because you need only one connection across multiple instances
	 */
	protected static $connection;
	
	/**
	 * Connect to the database
	 * 
	 * @return bool false on failure / mysqli MySQLi object instance on success
	 */
	public function connect() {
		// Try to connect to the database
		if (!isset(self::$connection)) {
			// Load configuration s an array. use the actual location of your configuration file. 
			self::$connection = new mysqli($db_config->host);
		}
	}
}