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
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" crossorigin="anonymous">
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
        <?php
        // menghubungkan dengan database
        $host = "localhost"; // ganti dengan host Anda
        $user = "root"; // ganti dengan user Anda
        $password = ""; // ganti dengan password Anda
        $database = "akrab_main"; // ganti dengan nama database Anda
        $koneksi = mysqli_connect($host, $user, $password, $database);

        // cek koneksi
        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        // tanggal 31 hari kebelakang dari hari ini
        $tanggal_awal = date("Y-m-d", strtotime("-31 days"));
        echo  date("Y-m-d", strtotime("-31 days"));
        // query untuk menghitung selisih harga
        // $sql = "SELECT b.barang, b.harga_modal, sb.nama_barang,sb.tanggal,sb.pelanggan ,sb.harga, (sb.harga - b.harga_modal) AS selisih_harga
        // FROM barang AS b
        // JOIN sales_barang AS sb ON b.barang = sb.nama_barang
        // WHERE DATE(sb.tanggal) >= '$tanggal_awal'";

        $sql = "SELECT b.barang, b.harga_modal, sb.nama_barang, sb.tanggal ,sb.pelanggan,sb.harga, sb.jumlah, (sb.harga * sb.jumlah - b.harga_modal * sb.jumlah ) AS selisih_harga
        FROM barang AS b
        JOIN sales_barang AS sb ON b.barang = sb.nama_barang
        WHERE DATE(sb.tanggal) >= '$tanggal_awal'";

        $result = mysqli_query($koneksi, $sql);

        // cek hasil query
        if (mysqli_num_rows($result) > 0) {
            // menampilkan hasil
            echo "<table>";
            echo "<tr><th>Pelanggan</th><th>tanggal</th><th>Nama Barang</th><th>Harga</th><th>qty</th><th>Modal</th><th>Untung</th></tr>";
            $total_hutang = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $total_hutang += $row['selisih_harga'];
                echo "<tr>";
                echo "<td>" . $row["pelanggan"] . "</td>";
                echo "<td>" . $row["tanggal"] . "</td>";
                echo "<td>" . $row["nama_barang"] . "</td>";
                echo "<td>" . $row["harga"] . "</td>";
                echo "<td>" . $row["jumlah"] . "</td>";
                echo "<td>" . $row["harga_modal"] . "</td>";
                echo "<td>" . $row["selisih_harga"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "Total keuntungan: Rp " . number_format($total_hutang, 0, ',', '.');
        } else {
            echo "Tidak ada hasil yang ditemukan.";
        }

        // tutup koneksi
        mysqli_close($koneksi);
        ?>

    </div>
</body>

</html>