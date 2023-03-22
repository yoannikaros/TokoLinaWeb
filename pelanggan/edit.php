
<html lang="en">
<head>
    <meta charset="UTF-8">
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

    <title>BAYAR HUTANG</title>
</head>
<body class="bg-secondary">
<?php include "../source/navbar/index.php"; ?>
    <div class="container mt-3">
        <div class="card p-3">
            <div class="form-group">

<?php
session_start();
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

if(isset($_GET['identitas'])){
    $identitas = filter_input(INPUT_GET, 'identitas', FILTER_SANITIZE_STRING);
    $identitas = mysqli_real_escape_string($conn, $identitas);
    // Query untuk mengambil data dari database
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
}

if(isset($_POST['submit'])){
    // Validasi dan sanitasi input
    $nohp = filter_input(INPUT_POST, 'nohp', FILTER_SANITIZE_NUMBER_INT);
    $nama_pelanggan = filter_input(INPUT_POST, 'nama_pelanggan', FILTER_SANITIZE_STRING);
    $hutang_baru = filter_input(INPUT_POST, 'hutang_baru', FILTER_SANITIZE_NUMBER_INT);
    // Menyimpan data yang diisi oleh pengguna ke dalam session
    $_SESSION['nohp'] = $nohp;
    $_SESSION['nama_pelanggan'] = $nama_pelanggan;
    $_SESSION['hutang_sebelumnya'] = $hutang;
    $_SESSION['hutang_baru'] = $hutang_baru;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query untuk menambahkan data ke database
    $sql = "INSERT INTO pelanggan (nama_pelanggan, hutang) VALUES ('$nama_pelanggan', '$hutang_baru')";
    if (mysqli_query($conn, $sql)) {
        // Query berhasil, menutup koneksi ke database
        mysqli_close($conn);
        //redirect ke print.php
        header("location: print.php?nama_pelanggan=$nama_pelanggan");
        } else {
        // Query gagal, menampilkan pesan error
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }

?>

<form action="" method="post">

    <label for="nama_pelanggan">Nama Pelanggan:</label>
    <input class="form-control" readonly type="text" name="nama_pelanggan" value="<?php if(isset($nama_pelanggan)) echo $nama_pelanggan; ?>"">
<br>
<label for="hutang_sebelumnya">Hutang Sebelumnya:</label>
<input class="form-control" type="text" name="hutang_sebelumnya" value="<?php if(isset($hutang)) echo $hutang; ?>" disabled>
<br>
<label for="hutang_baru">Hutang dibayarkan:</label>
<input class="form-control" type="number" name="hutang_baru" required value="">
<br>
<input type="submit" class="btn btn-success" name="submit" value="Bayarkan">
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