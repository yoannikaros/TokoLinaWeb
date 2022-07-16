<?php 

include_once('config.php');

if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){

	$db->delete('barang',array('kode_item'=>$_REQUEST['delId']));

	header('location: index.php?msg=rds');

	exit;

}

?>