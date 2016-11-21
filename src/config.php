<?php

/* 
 * This file defines values that will be used by all files. All they have to do is include this file.
 * 
 * The file contains database login credentials, global variables that will be used in includes by all the files, etc.
 * 
 * It should be located in the root directory of the project, i.e. the top-level directory of the project, not the server.
 */

   
define("ROOT_DIR", __DIR__);

// Database definitions
define("DB_USER", "root");
define("DB_PASSWORD", "dhaval");
define("DB_DATABASE", "anchromandb");
define("DB_HOST", "localhost");


spl_autoload_register(function($classname) {
	// Include each class by traversing the directories recursively
	$directory = new RecursiveDirectoryIterator(__DIR__, RecursiveDirectoryIterator::SKIP_DOTS);
	$fileIterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::LEAVES_ONLY);
	
	$filename = $classname . ".php";
	if (is_null($fileIterator)) {
		echo "FileIterator is null";
	}
	
	foreach($fileIterator as $file) {
		if(strtolower($file->getFilename()) == strtolower($filename)) {
			if($file->isReadable()) {
				include $file->getPathname();
			}
		}
		//break;
	}
});
