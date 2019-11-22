<?php
$user =& JFactory::getUser();
$userid = $user->get('id');
$vode = new Vodes();
#echo $userid;
$vode->spendVodes( $userid );
?>
<?php
/**
* @package Vodes_Joomla_1.5
* @Copyright (C) 2008 Rakibul Hasan, rhasan082@gmail.com
* @All Rights Reserved
*/
class Vodes {
	/*
	* Constructor do nothing
	*/
	function Vodes(){}
	/**
	* This function provides the the remianing credit of a user
	* @param user_id User Id whose current credits going to be retrieved
	* @return credits remaining for the user
	*/	
	function getVodes( $userid ){
		$database =& JFactory::getDBO();
		$sql = "SELECT credit FROM #__vodes_credits WHERE userid='$userid'" ;
		$database->setQuery( $sql );
		$balance = $database->loadResult();
		return $balance ? $balance : 0;

	}

	/**
	* This function will spend 'amount'  of credits for a user
	* @param user_id User Id whose credits will be spent
	* @param amount Amount to spend
	* @return boolean success status
	*/		
	function spendVodes( $userid ){
		$database =& JFactory::getDBO();
		echo $uid;
		$sql = "UPDATE #__vodes_credits SET credit=credit-1 WHERE userid='$userid'";
		$database->setQuery( $sql );
		if( !$database->query()) return false;
		return true;
	}
}
?>