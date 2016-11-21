<?php

namespace AnchorManagerPHP\Test;

require_once dirname(dirname(__FILE__)) . "/src/config.php";


class DBTest extends \PHPUnit_Framework_TestCase
{
	public function testDatabaseConnection()
	{
		$mysqli_conn = new \mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

		$this->assertTrue($mysqli_conn->connect_errno == false);
	}
}