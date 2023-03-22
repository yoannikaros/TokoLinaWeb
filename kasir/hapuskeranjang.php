<?php
session_start();
if(isset($_POST['submit'])){
    $barang = $_POST['barang'];
    foreach($_SESSION['keranjang'] as $key => $item){
        if($item['barang'] == $barang){
            unset($_SESSION['keranjang'][$key]);
        }
    }
}
header("Location: index.php");
