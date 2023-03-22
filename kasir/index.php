<?php
session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "akrab_main";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT barang, hargagrosir, hargaumum,jenis FROM barang";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "
      <div style='height: 300px; width:700px; overflow: scroll;'>
      <table><tr>
      <th>Barang</th>
      <th>Jenis</th>
      <th> Grosir</th>
      <th>Action</th>
      </tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        
          echo "<tr>
          <td>" . $row["barang"]. "</td>
          <td>" . $row["jenis"]. "</td>
          <td>" . $row["hargagrosir"]. "</td>
          <td>
          
          <form action='' method='post'>
          <input type='hidden' name='barang' value='" . $row["barang"]. "'>
          <input type='hidden' name='hargagrosir' value='" . $row["hargagrosir"]. "'>
          <input type='hidden' name='jenis' value='" . $row["jenis"]. "'>
          <input type='submit' name='submit' value='Masukkan ke Keranjang'>
          
          </form>
          </td>
          </tr>
          ";
      }
      echo "</table> </div>";
  } else {
      echo "0 results";
  }
  $conn->close();
  ?>

<?php

if(isset($_POST['submit'])){
    $barang = $_POST['barang'];
    $hargagrosir = $_POST['hargagrosir'];
    $jenis = $_POST['jenis'];
    if(!isset($_SESSION['keranjang'])){
      $_SESSION['keranjang'] = array();
    }
    array_push($_SESSION['keranjang'], array('barang' => $barang, 'hargagrosir' => $hargagrosir, 'jenis' => $jenis));
}
?>

<h2>Keranjang Belanja</h2>
<table>
  <tr>
    <th>Barang</th>
    <th>Satuan</th>
    <th>Harga Grosir</th>
    
    <th>Aksi</th>
  </tr>
  <?php
if(isset($_SESSION['keranjang'])){
    foreach($_SESSION['keranjang'] as $item){
      echo "<tr>
      <td>" . $item['barang'] . "</td>
      <td>" . $item['jenis'] . "</td>
      <td>" . $item['hargagrosir'] . "</td>
     
      <td><form action='hapuskeranjang.php' method='post'>
      <input type='hidden' name='barang' value='" . $item['barang'] . "'>
      <input type='submit' name='submit' value='Hapus'></form></td></tr>";
    }
  }
?>
</table>
<br>
<?php
$total = 0;
if(isset($_SESSION['keranjang'])){
    foreach($_SESSION['keranjang'] as $item){
    $total += $item['hargagrosir'];
    }
    }
    echo "Total Harga Grosir: Rp. " . $total;
    ?>
<br><br>
