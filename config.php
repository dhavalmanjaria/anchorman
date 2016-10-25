<?php

/* 
 * This file defines values that will be used by all files. All they have to do is include this file.
 * 
 * The file contains database login credentials, global variables that will be used in includes by all the files, etc.
 * 
 * It should be located in the root directory of the project, i.e. the top-level directory of the project, not the server.
 */

/**
 *  Defines the ROOT_DIR (of the project) as the directory in which the config file is located.
 */
define("ROOT_DIR", __DIR__);

/**
 * Database credentials
 */
$db_config = array(
		"user" => "root",
		"password" => "dhaval",
		"database" => "anchormandb",
		"host" => "localhost"
);