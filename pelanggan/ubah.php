<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	 <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Ubah Nama konsumen</title>
</head>
<body class="bg-secondary">
<?php include "../source/navbar/index.php"; ?>

        <div class="container mt-3">
<div class="card p-3"

<div class="form-group">
<?php
//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akrab_main";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//mengambil data dari URL
$identitas = $_GET['identitas'];

//query select
$sql = "SELECT identitas, nama_pelanggan, alamat, hutang, point FROM pengguna WHERE identitas='$identitas'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $identitas = $row["identitas"];
    $nama_pelanggan = $row["nama_pelanggan"];
    $alamat = $row["alamat"];
    $hutang = $row["hutang"];
    $point = $row["point"];
} else {
    echo "Data not found";
}

//jika submit form
if(isset($_POST['submit'])){

    //mengambil data dari form
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $hutang = $_POST['hutang'];
    $point = $_POST['point'];

    //query update
    $sql = "UPDATE pengguna SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', hutang='$hutang', point='$point' WHERE identitas='$identitas'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        echo "<script>setTimeout(function(){
            window.close();
         }, 1000);</script>";

    } else {
        echo "Error updating record: " . $conn->error;
    }

}

$conn->close();
?>

<form method="post" action="">
    <label for="nama_pelanggan">Nama Pelanggan:</label>
    <input class="form-control" type="text" id="nama_pelanggan" readonly name="nama_pelanggan" value="<?php echo $nama_pelanggan; ?>">
    <br>
   
    <label for="alamat">Alamat:</label>
    <textarea  class="form-control" type="text" id="alamat" name="alamat"><?php echo $alamat; ?></textarea>
    <br>
    <label hidden for="hutang">Hutang:</label>
    <input hidden class="form-control" type="text" id="hutang" readonly name="hutang" value="<?php echo $hutang; ?>">
    <br>
    <label hidden for="point">Point:</label>
    <input hidden class="form-control" readonly type="text" id="point" name="point" value="<?php echo $point; ?>">
    <br>
    <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
    <button type="button" class="btn btn-warning" onclick="window.close();">Kembali</button>    
</form>

</div>
</div>
</div>
<script>
		document.getElementById("tambah-button").onclick = function() {
			window.open("../pelanggan/add.php", "_blank");
		};
	</script>
</body>
</html>