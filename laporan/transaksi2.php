<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Darurat</title>
    <!-- Menyisipkan CSS -->
    <link rel="stylesheet" href="../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Menyisipkan JQuery dan Javascript  -->
    <script src="../source/js/bootstrap.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>


</head>

<body class="bg-secondary">
    <?php include "../source/navbar/index.php"; ?>
    <?php
    // Koneksi ke database
    $connection = mysqli_connect("localhost", "root", "", "akrab_main");

    // Query untuk mengambil data tanggal dan total subtotal dari data yang sama
    $query = "SELECT nama_pelanggan, SUM(subtotal) as total_subtotal, SUM(bayar) as total_bayar, SUM(balance) as total_balance, SUM(hutang) as total_hutang, SUM(totalhutang) as total_totalhutang FROM sales GROUP BY nama_pelanggan";


    // Eksekusi query
    $result = mysqli_query($connection, $query);
    ?>

    <?php
    //fungsi buatRupiah
    function buatRupiah($angka)
    {
        $hasil = "Rp. " . number_format($angka, 0, ',', '.');
        return $hasil;
    }

    ?>
    <div class="container mt-3">
        <div class="card p-3">

            <table class='table'>

                <thead class='thead-dark'>
                    <tr>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $total_hutang = 0;

                    while ($data = mysqli_fetch_assoc($result)) {

                        $total_hutang += $data['total_subtotal'];

                    ?>

                        <tr>
                            <td data-label="nama_pengguna"><?php echo $data['nama_pelanggan']; ?></td>
                            <td> <a target='_blank' href='../transaksi-konsumen/barang.php?pelanggan=<?php echo $data['nama_pelanggan']; ?>' class='btn-sm btn btn-info mr-2'>Periksa</a>
                            </td>

                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    </div>
</body>

</html>