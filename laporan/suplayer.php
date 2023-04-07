<!DOCTYPE html>
<html>

<head>
    <title>Form Insert Data</title>
    <link rel="stylesheet" href="../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" crossorigin="anonymous">

</head>

<body class=" bg-secondary">
    <?php include "../source/navbar/index.php"; ?>

    <div class="container card p-5 mt-3">
        <h5>Data Toko</h5>
        <?php
        //koneksi ke database
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "akrab_main";
        $koneksi = mysqli_connect($host, $user, $password, $database);

        //ambil data dari form jika form disubmit
        if (isset($_POST['submit'])) {
            $nama_toko = $_POST['nama_toko'];
            $alamat = $_POST['alamat'];

            //query untuk insert data
            $query = "INSERT INTO suplay_pengeluaran_harian (nama_toko, alamat) VALUES ('$nama_toko', '$alamat')";

            //eksekusi query
            $result = mysqli_query($koneksi, $query);

            //cek apakah data berhasil diinsert
            if ($result) {
                echo "Data berhasil disimpan";
            } else {
                echo "Gagal menyimpan data";
            }
        }
        ?>
        <form method="POST" action="">
            <label for="nama_toko">Nama Toko:</label>
            <input class="form-control" type="text" name="nama_toko" id="nama_toko" required><br>

            <label for="alamat">Alamat:</label>
            <input class="form-control" type="text" name="alamat" id="alamat" required><br><br>

            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            <button type="button" class="btn btn-warning" onclick="window.history.go(-2);">Kembali</button>
        </form>
        <?php
        //tutup koneksi
        mysqli_close($koneksi);
        ?>
    </div>
    <div class="container card p-5 mt-3">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        Toko
                    </td>
                    <td>
                        Alamat
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php


                // Koneksi ke database
                $host = "localhost";
                $user = "root";
                $password = "";
                $database = "akrab_main";
                $conn = mysqli_connect($host, $user, $password, $database);


                // Query database
                $sql = "SELECT * FROM suplay_pengeluaran_harian";


                // Eksekusi query
                $result = mysqli_query($conn, $sql);

                // Tampilkan hasil query
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td>
                                <?php echo $row["nama_toko"]; ?>
                            </td>
                            <td>
                                <?php echo $row["alamat"]; ?>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "Tidak ada data hari ini";
                }

                // Tutup koneksi
                mysqli_close($conn);

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>