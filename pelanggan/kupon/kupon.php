<html>
<?php
$identitas  = $_GET["identitas"];
$nama_pelanggan = $_GET["nama_pelanggan"];
?>

<head>
    <link rel="stylesheet" href="../../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../source/fontawesome/css/all.css" />
</head>


<body class="bg-secondary">
    <div class="container mt-3">
        <div class="card p-3 mr-2">


            <?php
            // membuat koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "akrab_main";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // mendapatkan nilai point sebelum diupdate
            $sql_select = "SELECT point FROM pengguna WHERE identitas='$identitas'";
            $result = mysqli_query($conn, $sql_select);
            $row = mysqli_fetch_assoc($result);
            $point_sebelumnya = $row['point'];

            if (isset($_POST['tambah_point'])) {
                // mendapatkan data dari form
                $tambah_point = $_POST['tambah_point'];

                // melakukan update pada kolom 'point'
                $point_baru = $point_sebelumnya - $tambah_point;
                $selisih =  $point_sebelumnya - $point_baru;

                $sql_update = "UPDATE pengguna SET point='$point_baru' WHERE identitas='$identitas'";
                if (mysqli_query($conn, $sql_update)) {
                    header('Location: print2.php?point_sebelumnya=' . $point_sebelumnya . '&pointbaru=' . $point_baru . '&nama_pelanggan=' . $nama_pelanggan . '&selisih=' . $selisih);
                } else {
                    echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
                }
            }
            ?>

            <!-- HTML untuk form -->
            <h5>
                <?php echo $nama_pelanggan ?>
            </h5>
            <form class="form" method="post">
                <label for="tambah_point">Yakin Mau tukar semua kuponnya ?</label><br>
                <input class="form-control" type="number" name="tambah_point" id="tambah_point" value="<?php echo $point_sebelumnya ?>"><br>
                <input class="btn btn-primary" type="submit" value="Yakin dong">
                <button class="btn btn-warning" onclick="window.close();">Kembali</button>
            </form>

        </div>
    </div>
</body>

</html>