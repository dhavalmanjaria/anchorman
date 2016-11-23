<?php
class Act {
	public $actId;
	public $actName;
	public $actOrderingNo;
	public $intro;
	public $outro;
	public $db;


	public function __construct($actId=-1, $actOrderingNo=-1, $actName='', $intro='', $outro='') {
		$this->actId = $actId;
		$this->actOrderingNo = $actOrderingNo;
		$this->actName = $actName;
		$this->intro = $intro;
		$this->outro = $outro;

		global $db;
		$db = new DB();
		$db->connect();
	}

	/* Gets all acts as an array of the Act() class */
	public function getAllAsArray() {
		global $db;
		$query = "SELECT * FROM `actTable` ORDER BY `actOrderingNo";
		$res = $db->query($query);
		$list = array();
		foreach($res as $row) {
			$list[] = new Act($row['actId'], $row['actOrderingNo'], $row['actName'], $row['intro'], $row['outro']);
		}
		return $list;
	}

	// Gets a specific act according to the ordering no
	public static function getActByOrderingNo($ordNo) {
		global $db;
		$query = "SELECT * FROM `actTable` WHERE `actOrderingNo` = $ordNo";
		$res = $db->query($query);
		$row = $res->fetch_assoc();
		$act = new Act($row['actId'], $row['actOrderingNo'], $row['actName'], $row['intro'], $row['outro']);

		return $act;
	}

	// Stores a specific value, in a specific column for a specific id. Does not work on actOrderingNo though
	public function storeColumnById($column_name, $value, $id) {
		global $db;
		$query = "UPDATE `actTable` SET $column_name = " . $db->quote($value) ." WHERE $actId = $id";

		return $db->query($query);	
	}

	// Inserts a new act and returns it's ID
	public function insertAct($actOrderingNo, $actName,$intro, $outro) {
		global $db;

		$query = "INSERT INTO `actTable`(actOrderingNo, actName, intro, outro) VALUES(" .
					$actOrderingNo . ",".
					$db->quote($actName) .",".
					$db->quote($intro) .",".
					$db->quote($outro)  .
					");";
		error_log(basename(__FILE__) .": ". $query);
		$db->query($query);

		// Get the id of the last inserted Act
		$query2 = "SELECT `actId` FROM `actTable` ORDER BY `actId` DESC LIMIT 0, 1";

		$res = $db->query($query2);
		$res = $res->fetch_assoc();
		return $res['actId'];
	}

	public function deleteActById($actId) {
		global $db;

		$del_query= "DELETE FROM `actTable` WHERE `actId`= " .$db->quote($aid);
		return $db->query($del_query);
	}

	
}

?>