<?php
require_once '../config.php';

class ListController {
	/** inserts an empty act so that it can be reordered later */
	function insertEmptyAct($newActPos) {
		$actOrder = new ActOrder();
		$idOrder = array();
		foreach($actObj->getAllAsArray() as $act) {
			$idOrder[] = $act->actId;
		}
		$newId = $act->insertAct(-1, '', '', '');
		array_splice($idOrder, $newActPos, $newId);
	}
}

$lc = new ListController();

if(isset($_GET['newActPos'])) {
	$aon = $lc->insertEmptyAct($_GET['newActPos']);
	header("Location: " . " ../actview.php?acton=$aon");
	die();
}

if(isset($_GET['delActPos'])) {
	$aid = $_GET['delActId'];
	$act = new Act();
	$act->deleteAct($aid);
	header("Location: " . "../listview.php");
	die();
}

if(isset($_POST['idorder'])) {
	$actOrd = new ActOrder();
	$actOrd->setOrder($_POST['idorder']);
}

?>