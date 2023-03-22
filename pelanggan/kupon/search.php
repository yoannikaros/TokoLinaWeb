<?php
$query = $_GET['query'];
$con = mysqli_connect("localhost", "root", "", "akrab_main");
$result = mysqli_query($con, "SELECT identitas, nama_pelanggan, alamat, hutang, point FROM pengguna WHERE nama_pelanggan LIKE '%$query%'");

echo "<div class='container'>";
echo "<table id='search-table' class='table table-striped'>";
echo "<thead class='thead-dark'><tr>
        <th>Nama Pelanggan</th>
        <th>Alamat</th>
        <th>Hutang</th>
        <th>Point</th>
        <th>ACTION</th>
      </tr></thead>";
while ($row = mysqli_fetch_array($result)) {
    $hutang = "Rp " . number_format($row['hutang'],0,',','.');
    echo "<tr>
            <td style='text-transform: uppercase;'>$row[nama_pelanggan]</td>
            <td>$row[alamat]</td>
            <td>$hutang</td>
            <td>$row[point]</td>
            <td>
            <a class='btn btn-primary' target='_blank' href='kupon.php?identitas=" . $row['identitas'] . "&nama_pelanggan=" . $row['nama_pelanggan'] . "'>TUKAR</a>


            </td>
          </tr>";
}
echo "</table>";
echo "</div>";
mysqli_close($con);
?>
