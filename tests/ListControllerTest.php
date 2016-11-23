<?php
namespace AnchorManagerPHP\Test;


require_once dirname(dirname(__FILE__)) . "/src/config.php";


class ListControllerTest extends \PHPUnit_Framework_TestCase {

	public function testInsert() {
		$lc = new \ListController();
		$lc->insertEmptyAct(4);
	}

	public function testOrder() {
		$idorder = ["4","6","5","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41","42","43","44","45","46","47","48","49","50","51","52","53","54","1","2","3"];
		
	}
	
}

?>