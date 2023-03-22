<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "akrab_main";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT nama_pelanggan FROM pengguna";
$result = $conn->query($sql);

echo '<form>';
echo '<select name="users" onchange="showUser(this.value)">';
echo '<option value="">Pilih Nama Pengguna:</option>';

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row["nama_pelanggan"].'">'.$row["nama_pelanggan"].'</option>';
    }
} else {
    echo "Tidak ada data";
}

echo '</select>';
echo '</form>';
echo '<br>';
echo '<div id="txtHint"></div>';

$conn->close();
?>

<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else { 
    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
