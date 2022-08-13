<?php
define ('HOST','localhost');
define ('USER','root');
define ('PASS','');
define ('DB','akrab_main'); 

$db_connect = mysqli_connect(HOST,USER,PASS,DB) or die ('gagal koneksi bro');
header('Content-Type: application/json');
?>