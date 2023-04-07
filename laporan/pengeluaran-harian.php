<!DOCTYPE html>
<html>

<head>
    <title>Form Insert Data</title>
    <!-- Menyisipkan CSS -->
    <link rel="stylesheet" href="../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
    @media print {
        .utama {
            display: none;
        }
    }
    </style>
</head>

<body class=" bg-secondary">
    <?php include "../source/navbar/index.php"; ?>

    <div class="container card p-5 mt-3 utama">
        <h5>Laporan Belanja (Pengeluaran)</h5> <br>
        <?php
        //koneksi ke database
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "akrab_main";
        $koneksi = mysqli_connect($host, $user, $password, $database);

        //ambil data dari form jika form disubmit
        if (isset($_POST['submit'])) {
            $suplay = $_POST['suplay'];
            $nominal = $_POST['nominal'];

            //ambil tanggal dan waktu saat ini
            date_default_timezone_set('Asia/Jakarta');
            $tanggal_sekarang = date('Y-m-d H:i:s');

            //query untuk insert data
            $query = "INSERT INTO pengeluaran_harian (tanggal, suplay, nominal) VALUES ('$tanggal_sekarang', '$suplay', '$nominal')";

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
            <label for="suplay">Toko:</label>
            <!-- <input class="form-control" type="text" name="suplay" id="suplay" required><br> -->

            <div class="form-row">
                <div class="form-group col-md-6">
                    <select name="suplay" class="form-control" required>
                        <option>--- Pilih toko ---</option>
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
                        <option value="<?php echo $row["nama_toko"]; ?>"><?php echo $row["nama_toko"]; ?></option>

                        <?php
                            }
                        } else {
                            echo "Tidak ada data yang absen hari ini";
                        }

                        // Tutup koneksi
                        mysqli_close($conn);

                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <a href="suplayer.php"><button type="button" class="btn btn-primary">Tambah toko lain</button></a>
                </div>
            </div>
            <br>


            <label for="nominal">Nominal:</label>
            <input class="form-control" type="number" name="nominal" id="nominal" required><br><br>
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            <button type="button" class="btn btn-warning" onclick="window.history.go(-2);">Kembali</button>
            <button type="button" class="btn btn-success ml-5" onclick="window.print();">Print</button>
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
                        Tanggal
                    </td>
                    <td>
                        Toko
                    </td>
                    <td>
                        Nominal
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
                // $sql = "SELECT * FROM pengeluaran_harian";
                $sql = "SELECT * FROM pengeluaran_harian WHERE tanggal >= DATE_SUB(CURDATE(), INTERVAL 31 DAY)";


                // Eksekusi query
                $result = mysqli_query($conn, $sql);
                $total = 0; // inisialisasi variabel total
                // Tampilkan hasil query
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        $total += $row["nominal"];
                ?>
                <tr>
                    <td>
                        <?php echo $row["tanggal"]; ?>
                    </td>
                    <td>
                        <?php echo $row["suplay"]; ?>
                    </td>
                    <td>
                        <?php echo "Rp " . number_format($row["nominal"], 0, ",", "."); ?>

                    </td>
                </tr>
                <?php
                    }
                    ?>
                <tr>
                    <td colspan="2"><b>Total</b></td>
                    <td>
                        <b>
                            <?php echo "Rp " . number_format($total, 0, ",", "."); ?>
                        </b>
                    </td>
                </tr>
                <?php
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