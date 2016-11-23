<?php
namespace AnchorManagerPHP\Test;


require_once dirname(dirname(__FILE__)) . "/src/config.php";


class ActTest extends \PHPUnit_Framework_TestCase {
	public function testGetArray() {
		$act = new \Act();
		$actList = \Act::getAllAsArray();
		$this->assertTrue(!empty($actList));
		$this->assertTrue(!is_null($actList));
	}

	public function testInsert() {
		$act = new \Act();
		$id = $act->insertAct(-1, 'test', 'test', 'test');
		$this->assertTrue(!is_null($id));		
	}
	
}

?>