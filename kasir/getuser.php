<?php
$q = $_REQUEST["q"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akrab_main";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT hutang FROM pengguna WHERE nama_pelanggan='".$q."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Output data dari setiap baris
while($row = $result->fetch_assoc()) {
echo "Hutang " . $q . " adalah: " . $row["hutang"];
}
} else {
echo "Tidak ada data";
}

$conn->close();
?>