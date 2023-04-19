<?php
// konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "akrab_main";

// membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// variabel untuk menyimpan kode item dan qty baru
// $kode_item = "BRG001";
// $qty_baru = 10;

$kode_item = $_GET['kode_item'];
$qty_baru = $_GET['qty'];
$harga_modal = $_GET['harga_modal'];

// query untuk melakukan update data
$sql = "UPDATE barang SET qty = $qty_baru, harga_modal = $harga_modal WHERE kode_item = '$kode_item'";


// eksekusi query
if (mysqli_query($conn, $sql)) {
    echo "<script>setTimeout(function(){
        window.close();
     }, 1000);</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// menutup koneksi ke database
mysqli_close($conn);
