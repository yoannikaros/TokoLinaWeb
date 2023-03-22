<?php 

include_once('config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){

	$db->delete('sales',array('idsales'=>$_REQUEST['delId']));

	header('location: index.php?msg=rds');

	exit;

}

?>