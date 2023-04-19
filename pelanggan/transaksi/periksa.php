<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $nama_pelanggan = $_GET["nama_pelanggan"];
    ?>
    <link rel="stylesheet" href="../../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../../source/v4/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        tbody {
            font-weight: normal;
        }

        tbody td {
            font-weight: normal;
        }
    </style>
    <title>Pelanggan</title>
</head>

<body class="bg-secondary">
    <?php include "navbar/index.php"; ?>



    <div class="container mt-5">
        <div class="card p-4 ">
            <h5>Memeriksa Transaksi: <?php echo $nama_pelanggan ?></h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <!-- <th>Sr#</th> -->
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Subtotal</th>
                        <th>Tunai</th>
                        <th>Total</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php



                    // Koneksi ke database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "akrab_main";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);


                    // Query database
                    // $sql = "SELECT pelanggan, MAX(tanggal) as tanggal, MAX(lastinsetid) as lastinsetid, SUM(subtotal) as subtotal, SUM(tunai) as tunai, SUM(kembalian) as kembalian FROM sales_barang WHERE pelanggan = '$nama_pelanggan' GROUP BY pelanggan";
                    // $sql = "SELECT * FROM sales_barang where pelanggan = '$nama_pelanggan' ORDER BY lastinsetid DESC";


                    $sql = "SELECT lastinsetid, MAX(pelanggan) as pelanggan, MAX(tanggal) as tanggal, subtotal, tunai, kembalian FROM sales_barang WHERE pelanggan = '$nama_pelanggan' GROUP BY lastinsetid DESC";



                    // Eksekusi query
                    $result = mysqli_query($conn, $sql);

                    // Tampilkan hasil query
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row["lastinsetid"]; ?></td>
                                <td><?php echo $row["tanggal"]; ?></td>
                                <td>Rp. <?php echo $row["subtotal"]; ?></td>
                                <td>Rp. <?php echo $row["tunai"]; ?></td>
                                <td><?php echo "Rp " . number_format($row["kembalian"], 0, ",", "."); ?></td>
                                <td><a href="print.php?lastinsetid=<?php echo $row["lastinsetid"]; ?>"><button class="btn btn-success">Cetak</button></a></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "Tidak ada data, ";
                        echo "sepertinya data anda telah diubah <br>";
                        echo " <a target='_blank' href='../../laporan/transaksi2.php' class='btn btn-warning'>Periksa laporan zaman dulu</a> <br>";
                    }

                    // Tutup koneksi
                    mysqli_close($conn);

                    ?>

                </tbody>
            </table>

            <script>
                document.getElementById("tambah-button").onclick = function() {
                    window.open("../pelanggan/add.php", "_blank");
                };
            </script>

            <script>
                function search() {
                    var input = document.getElementById("search-input").value;
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "search.php?query=" + input);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            document.getElementById("search-results").innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send();
                }
            </script>
        </div>
    </div>

</body>

</html>