<?php
$db_connect = new mysqli("localhost","root","","akrab_main");

$nama_pelanggan =$_POST['nama_pelanggan'];
$alamat =$_POST['alamat'];
$hutang=$_POST['hutang'];
$point=$_POST['point'];


$query = "INSERT INTO pengguna(nama_pelanggan,alamat,hutang,point) VALUES('$nama_pelanggan','$alamat','$hutang','$point')";
$sql = mysqli_query($db_connect,$query);

if ($sql){
   
    echo json_encode (array('message'=> 'BERHASIL DIBUAT!'));
} else {
    echo json_encode (array('message'=> 'GAGAL!'));
}
?>