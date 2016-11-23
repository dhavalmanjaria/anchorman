<?php

require_once '../config.php';

class ActController {
	public $actId;
	public $act;
	
	/*
	* Stores new text into the database*
	* @return string|boolean returns a text response according to what is stored in the act
	*/
	public function store($id) {
		$act = new Act();
		$retVal = '';

		if($_POST['field'] == 'intro') {
			$txt = $_POST['introText'];
			$act->storeColumnById('intro', $txt, $id);

			$act = $act->getActById($id);
			return $act->intro;
		}

		if ($_POST['field'] = 'outro') {
			$txt = $_POST['outroText'];
			$act->storeColumnById('outro', $txt, $id);

			$act = Act::getActById($id);
			return $act->outro;
		}
	}
}

$actCtl = new ActController();
echo $actCtl->store($_POST['id']);

?>