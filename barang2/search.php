<?php
$query = $_GET['query'];
$con = mysqli_connect("localhost", "root", "", "akrab_main");
$result = mysqli_query($con, "SELECT barang, jenis ,hargagrosir, hargaumum, kode_item FROM barang WHERE barang LIKE '%$query%'");

echo "<div class='container'>";
echo "<table id='search-table' class='table table-striped'><thead class='thead-dark'>";
echo "<tr>
        <th>NAMA BARANG</th>
        <th>SATUAN</th>
        <th>HARGA GROSIR</th>
        <th>HARGA UMUM</th>
        <th>ACTION</th>
      </tr></thead>";
while ($row = mysqli_fetch_array($result)) {
    $hargagrosir = "Rp " . number_format($row['hargagrosir'],0,',','.');
    $hargaumum = "Rp " . number_format($row['hargaumum'],0,',','.');
    echo "<tr>
            <td style='text-transform: uppercase;'>$row[barang]</td>
            <td>$row[jenis]</td>
            <td>$hargagrosir</td>
            <td>$hargaumum</td>
            <td>
            <a href='../barang/edit-users.php?editId=$row[kode_item]' target='_blank' class='btn btn-primary'> Ubah </a> 
            <a href='../barang/delete.php?delId=$row[kode_item]' onClick='return confirm(\"beneran mau hapus barang ini mah ?\");' target='_blank' class='btn btn-danger'> Hapus </a>
            </td>
          </tr>";
}
echo "</table>";
echo "</div>";
mysqli_close($con);
?>
