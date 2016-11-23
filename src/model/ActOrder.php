<?php

/**
 * This class represents the ActOrder, i.e. the entire list of all the acts that will take place during a particular event. 
 * @author dhaval
 *
 * 
 */
class ActOrder {
	protected $db;
	
	public function __construct() {
		// Initiate database connection
		global $db;
		$db = new DB();	
		$db->connect();
	}
	
	/**
	 * Sets the new act ordering according to the listview
	 * @param unknown $newActOrdering
	 * @returns value of the query() function
	 */
	function setOrder($newActOrdering) {
		global $db;
		$retVal = NULL;
		$orderNo = 0;
		foreach($newActOrdering as $id) {
			$orderNo++;
			$sql_query = "UPDATE `actTable` SET `actOrderingNo` = $orderNo WHERE `actId`=" . $db->quote($id);
			echo $sql_query;
			$retVal = $db->query($sql_query);
		}
		return $retVal;
	}

}

?>