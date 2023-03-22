<?php
session_start();
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

<a href="index.php"></a>
