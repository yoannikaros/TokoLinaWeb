<?php
$db_connect = new mysqli("localhost","root","","akrab_main");
$nama_pelanggan =$_POST['nama_pelanggan'];
$hutang =$_POST['hutang'];

$query = "INSERT INTO pelanggan2(nama_pelanggan,hutang) VALUES('$nama_pelanggan','$hutang')";
$sql = mysqli_query($db_connect,$query);


if ($sql){
   
    echo json_encode (array('message'=> 'BERHASIL DIBUAT!'));
} else {
    echo json_encode (array('message'=> 'gagal!'));
}
?>