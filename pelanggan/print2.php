<style>
  @media print {
    .hide-on-print {
      display: none;
    }
  }
</style>

<?php
session_start();
$hutang_total = $_SESSION['hutang_sebelumnya'] - $_SESSION['hutang_baru'];
$nama_pelanggan  = $_GET["nama_pelanggan"];
if ($hutang_total >= 0) {

  echo "------------------------------ <br>";
  echo "<b>TOKO LINA SIGONG</b><br>";
  echo "$nama_pelanggan";
  echo "<br>";
  echo date('l, d-m-Y');
  echo "<br>------------------------------ <br>";
  $hutang_total = 'Lunas';
  echo "Hutang Sblm&nbsp;&nbsp;&nbsp;" . number_format($_SESSION['hutang_sebelumnya'], 0, ',', '.') . "<br>";
  echo "Uang Tunai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . number_format($_SESSION['hutang_baru'], 0, ',', '.') . "<br>";
  echo "------------------------------ <br>";
  echo "Total: Pembayaran lunas<br>";
} else {
  echo "------------------------------ <br>";
  echo "<b>TOKO LINA SIGONG</b><br>";
  echo "$nama_pelanggan";
  echo "<br>";
  echo date('l, d-m-Y');
  echo "<br>------------------------------ <br>";
  echo "Hutang Sblm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . number_format($_SESSION['hutang_sebelumnya'], 0, ',', '.') . "<br>";
  echo "Uang Tunai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . number_format($_SESSION['hutang_baru'], 0, ',', '.') . "<br>";
  echo "------------------------------ <br>";
  echo "Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . number_format($hutang_total, 0, ',', '.') . "<br>";
  echo "------------------------------ <br>";
}

?>
<br>
<button class="hide-on-print" onclick="window.print()">Print</button>

<button class="hide-on-print" id="kembali-btn">Kembali</button>

<script>
  // Mengambil elemen tombol "Kembali"
  const kembaliBtn = document.getElementById("kembali-btn");

  // Menambahkan event listener ketika tombol "Kembali" ditekan
  kembaliBtn.addEventListener("click", function() {
    // Menampilkan pesan konfirmasi dan menutup halaman web jika OK ditekan
    if (confirm("Sudah ngeprintnya?")) {
      window.close();
    }
  });

  window.onload = function() {
    window.print();
  }
</script>