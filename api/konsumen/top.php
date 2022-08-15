<?php 

$connection = new mysqli("localhost","root","","akrab_main");
$data       = mysqli_query($connection, "SELECT * FROM pengguna ORDER BY Hutang ASC LIMIT 10");
$data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

// echo json_encode($data);
echo json_encode(array('data' => $data));