<?php
require_once('../connection.php');
$nama_pelanggan =$_POST['nama_pelanggan'];
$hutang =$_POST['hutang'];

$query = "INSERT INTO pelanggan(nama_pelanggan,hutang) VALUES('$nama_pelanggan','$hutang')";
$sql = mysqli_query($db_connect,$query);


if ($sql){
   
    echo json_encode (array('message'=> 'BERHASIL DIBUAT!'));
} else {
    echo json_encode (array('message'=> 'gagal!'));
}
?>