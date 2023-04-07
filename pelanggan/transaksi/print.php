<style>
span {
    font-size: 11px;
}
</style>

<span style="margin-left: 10px;">TOKO LINA SIGONG</span><br>
<span style="margin-left: 40px;">Note Ulang</span><br>
<?php
$lastinsetid = $_GET["lastinsetid"];


// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akrab_main";
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Query database
$sql = "SELECT * FROM sales_barang where lastinsetid = $lastinsetid LIMIT 1";


// Eksekusi query
$result = mysqli_query($conn, $sql);

// Tampilkan hasil query
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

<span>---------------------------------------------</span><br>
<span>No Transaksi &nbsp; &nbsp; </span> <span>:&nbsp;<?php echo $row["lastinsetid"]; ?></span><br>
<span>Tgl Transaksi&nbsp; &nbsp;</span> <span>:&nbsp;<?php echo $row["tanggal"]; ?></span><br>
<span>Konsumen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<span>:&nbsp;<?php echo $row["pelanggan"]; ?></span><br>
<span>---------------------------------------------</span><br>
<?php
    }
} else {
    echo "Tidak ada data yang absen hari ini";
}

// Tutup koneksi
mysqli_close($conn);

?>


<?php
$lastinsetid = $_GET["lastinsetid"];


// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akrab_main";
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Query database
$sql = "SELECT * FROM sales_barang where lastinsetid = $lastinsetid";


// Eksekusi query
$result = mysqli_query($conn, $sql);

// Tampilkan hasil query
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<br><span><b><?php echo $row["nama_barang"]; ?></b></span><br>
<span><?php echo $row["jumlah"]; ?></span> <span style="margin-left: 1px;"><?php echo $row["satuan"]; ?></span>

<span style="margin-left: 1px;">X</span>

<span style="margin-left: 1px;"><?php echo "Rp " . number_format($row["harga"], 0, ",", "."); ?></span>

<span style="margin-left: 3;">= <?php echo "Rp " . number_format($row["hargatotal"], 0, ",", "."); ?></span><br>

<?php
    }
} else {
    echo "Tidak ada data yang absen hari ini";
}

// Tutup koneksi
mysqli_close($conn);

?>
<br><span>---------------------------------------------</span><br>


<?php
$lastinsetid = $_GET["lastinsetid"];


// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akrab_main";
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Query database
$sql = "SELECT * FROM sales_barang where lastinsetid = $lastinsetid LIMIT 1";


// Eksekusi query
$result = mysqli_query($conn, $sql);

// Tampilkan hasil query
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $hutangtotal = $row["hutang_sekarang"] + $row["hutang_sebelumnya"];
?>

<span>Subtotal</span> <span style="margin-left: 50px;">&nbsp;&nbsp;=&nbsp;
    <?php echo "Rp " . number_format($row["subtotal"], 0, ",", "."); ?></span><br>
<span>Tunai</span> <span style="margin-left: 60px;">&nbsp;&nbsp;=&nbsp;
    <?php
            if (is_int($row["tunai"])) {
                echo "Rp " . number_format($row["tunai"], 0, ",", ".");
            } else {
                echo $row["tunai"];
            }
            ?>
</span><br>
<span>---------------------------------------------</span><br>
<span>Hutang Sekarang</span> <span style="margin-left: 6px;">&nbsp;&nbsp;=&nbsp;
    <?php echo "Rp " . number_format($row["hutang_sekarang"], 0, ",", "."); ?>
</span><br>
<span>Hutang Sebelum</span> <span style="margin-left:  8px;">&nbsp;&nbsp;=&nbsp;
    <?php echo "Rp " . number_format($row["hutang_sebelumnya"], 0, ",", "."); ?>
</span>
<br><span>---------------------------------------------</span><br>
<span>Total Hutang</span> <span style="margin-left: 22px;">&nbsp;&nbsp;=&nbsp;
    <?php echo "Rp " . number_format($hutangtotal, 0, ",", "."); ?></span><br>
<span>Total</span> <span style="margin-left: 58px;">&nbsp;&nbsp;=&nbsp;
    <?php echo "Rp " . number_format($row["kembalian"], 0, ",", "."); ?></span>
<br><span>---------------------------------------------</span><br>
<span style="margin-left: 60px;">&nbsp;&nbsp;&nbsp;
    <?php echo $row["pointsekarang"]; ?></span><br>

<?php
    }
} else {
    echo "Tidak ada data yang absen hari ini";
}

// Tutup koneksi
mysqli_close($conn);

?>

<script>
window.onload = function() {
    window.print();
}
</script>