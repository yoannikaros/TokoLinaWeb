<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $no = $_GET['no'];
    // Query untuk mengambil data tanggal dan total subtotal dari data yang sama
    $query = "SELECT DATE_FORMAT(date,'%Y/%m/%d') as date, SUM(subtotal) as total_subtotal 
    FROM sales WHERE date >= DATE_SUB(NOW(), INTERVAL $no DAY)
    GROUP BY DATE_FORMAT(date,'%Y-%m-%d') 
    ORDER BY date DESC
    ";

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
            <div class="btn-group mb-3" role="group">

                <a href="../transaksi"><button class='btn btn-dark mb-3 mr-3'>Rincian</button></a>
                <a href="../pelanggan/transaksi"><button class='btn btn-dark mb-3 mr-3'>Cek Transaksi
                        Konsumen</button></a>
                <a href="../transaksi/range.php"><button class='btn btn-dark mb-3 mr-2'>Rentang waktu</button></a>
                <a href="../transaksi/data_pertransaksi.php"><button class='btn btn-warning mb-3 mr-2'>Data
                        Kunjungan</button></a>
                <a href="../transaksi/data_struk.php"><button class='btn btn-warning mb-3 mr-2'>Jumlah Barang
                        keluar</button></a>
                <a href="../transaksi/data_barang.php"><button class='btn btn-warning mb-3 mr-2'>Data Barang
                        keluar</button></a>
            </div>
            <p>Menjumlahkan subtotal berdasarkan tanggal</p>
            <table class='table'>

                <thead class='thead-dark'>
                    <tr>
                        <th>Tanggal</th>
                        <th>Total Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $total_hutang = 0;
                    //Menghitung rata rata
                    $total_nilai = 0;
                    $jumlah_baris = 0;
                    while ($data = mysqli_fetch_assoc($result)) {

                        $total_hutang += $data['total_subtotal'];
                        //Menghitung rata rata
                        $nilai = $data['total_subtotal'];
                        $total_nilai += $nilai;
                        $jumlah_baris++;
                    ?>

                        <tr>
                            <td data-label="Tanggal"><?php echo $data['date']; ?></td>
                            <td data-label="Total Subtotal"><?php echo buatRupiah($data['total_subtotal']); ?></td>
                            <td> <a target='_blank' href='../transaksi-konsumen/barang.php?tanggal=<?php echo $data['date']; ?>' class='btn-sm btn btn-outline-info mr-2'>Detail Transaksi</a>
                            </td>

                        </tr>
                    <?php
                        $rata_rata = $total_nilai / $jumlah_baris;
                    } ?>
                    <td data-label="Total Subtotal">Total : <?php echo buatRupiah($total_hutang); ?></td>
                    <td data-label="Total Subtotal">Rata rata : <?php echo buatRupiah($rata_rata); ?></td>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>