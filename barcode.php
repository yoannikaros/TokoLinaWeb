<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "akrab_main");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk menampilkan data dengan jumlah angka lebih dari 10
$sql = "SELECT * FROM barang WHERE LENGTH(barcode) > 10";

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Buat tabel
echo "<table>";
echo "<tr><th>Barang</th><th>Barcode</th></tr>";

// Periksa apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Tampilkan data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["barang"] . "</td><td>      " . $row["barcode"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data yang ditemukan</td></tr>";
}

// Tutup tabel
echo "</table>";

// Tutup koneksi
mysqli_close($conn);
