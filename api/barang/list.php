
<?php 

$connection = new mysqli("localhost","root","","akrab_main");
$data       = mysqli_query($connection, "SELECT * FROM barang ORDER BY kode_item DESC");
$data       = mysqli_fetch_all($data, MYSQLI_ASSOC);

// echo json_encode($data);
echo json_encode(array('data' => $data));