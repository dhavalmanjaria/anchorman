<?php

namespace AnchorManagerPHP\Test;

require_once dirname(dirname(__FILE__)) . "/config.php";


class DBTest extends \PHPUnit_Framework_TestCase
{
	public function testDatabaseConnection()
	{
		$mysqli_conn = new \mysqli($db_config["host"], $db_config["user"], $db_config["password"], $db_config["database"]);

		$this->assert($mysqli_conn->connect_errno == false);
	}
}