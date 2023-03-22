<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akrab_main";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Hapus data
if(isset($_GET['identitas'])){
    $identitas = filter_input(INPUT_GET, 'identitas', FILTER_SANITIZE_NUMBER_INT);
    $sql = "DELETE FROM pengguna WHERE identitas = '$identitas'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>setTimeout(function(){
            window.close();
         }, 1000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
