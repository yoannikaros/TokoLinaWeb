<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Konsumen</title>
    	<!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>


</head>
<body class="bg-secondary">
<?php include "../source/navbar/index.php"; ?>

<div class="container mt-3"><div class="card p-3">
<form action="" method="post">
  Identitas: <input class="form-control" type="text" readonly name="identitas"><br>
  Nama Pelanggan: <input class="form-control" required type="text" name="nama_pelanggan"><br>
  Alamat: <input class="form-control" type="text" required name="alamat"><br>
  Hutang: <input class="form-control" type="number" required value="-0" name="hutang"><br>
  Point: <input class="form-control" type="number" required value="0" name="point"><br>
  <input class="btn btn-success" type="submit" name="submit" value="Submit">
  <button type="button" class="btn btn-warning" onclick="window.close();">Kembali</button>
</form>


<?php
if(isset($_POST['submit'])){
    // Mendapatkan data dari form
    $identitas = $_POST['identitas'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $hutang = $_POST['hutang'];
    $point = $_POST['point'];

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

    // Insert data ke table pengguna
    $sql = "INSERT INTO pengguna (identitas, nama_pelanggan, alamat, hutang, point) VALUES ('$identitas', '$nama_pelanggan', '$alamat', '$hutang', '$point')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan";
        echo "<script>setTimeout(function(){
            window.close();
         }, 1000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

</div></div></body>

</html>