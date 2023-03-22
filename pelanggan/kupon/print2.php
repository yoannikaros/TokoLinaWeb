<?php

$point_sebelumnya  = $_GET["point_sebelumnya"];
$pointbaru  = $_GET["pointbaru"];
$nama_pelanggan  = $_GET["nama_pelanggan"];


?>
<script>
window.onload = function() {
    window.print();
}
</script>
<style>
@media print {
    .hide-on-print {
        display: none;
    }
}
</style>

--------------------------<br>
<b>TOKO LINA SIGONG</b><br>
<?= $nama_pelanggan ?> <br>
<?= date('l, d-m-Y') ?>
<br>--------------------------<br>
<span> Point Sebelum&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $point_sebelumnya ?><br> </span>
<span> Akhir Point&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $pointbaru ?> <br></span>
--------------------------
<br><span>Minal 'Aidin wal-Faizin</span>
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
</script>