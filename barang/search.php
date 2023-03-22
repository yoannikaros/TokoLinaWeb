<?php
$query = $_GET['query'];
$con = mysqli_connect("localhost", "root", "", "akrab_main");
$result = mysqli_query($con, "SELECT barang, hargagrosir, hargaumum FROM barang WHERE barang LIKE '%$query%'");
echo "<table>";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['barang'] . "</td>";
  echo "<td>" . $row['hargagrosir'] . "</td>";
  echo "<td>" . $row['hargaumum'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
