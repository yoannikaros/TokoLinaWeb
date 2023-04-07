<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Menyisipkan CSS -->
    <link rel="stylesheet" href="../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Pelanggan</title>
</head>

<body class="bg-secondary">
    <?php include "../source/navbar/index.php"; ?>

    <div class="container mt-5">
        <div class="card p-4">
            <center class="mb-2">
                <h3>MANAJEMEN HUTANG</h3>
                <p>Sebagai asisten, tugas kamu bisa membantu pelanggan mengatur pembayaran hutang atau membantu mereka
                    menambah hutang yang diinginkan</p>
            </center>
            <?php
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

            $sql = "SELECT identitas, nama_pelanggan, alamat, hutang, point FROM pengguna ORDER BY hutang , point ASC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table id='search-results' class='table'><thead class='thead-dark'><tr><th>No</th><th>Nama Pelanggan</th><th>Alamat</th><th>Hutang</th><th>Menu</th></tr></thead>";

                // output data of each row
                $total_hutang = 0;

                //Menghitung rata rata
                $total_nilai = 0;
                $jumlah_baris = 0;

                //nomor
                $nomor = 1;
                while ($row = $result->fetch_assoc()) {
                    $hutang = "Rp " . number_format($row['hutang'], 0, ',', '.');
                    $total_hutang += $row['hutang'];

                    //Menghitung rata rata
                    $nilai = $row['hutang'];
                    $total_nilai += $nilai;
                    $jumlah_baris++;


                    echo "<tr>
                    <td>" . $nomor . "</td>
                    <td style='text-transform: uppercase;'>" . $row["nama_pelanggan"] . "</td>
                    <td style='text-transform: uppercase;'>" . $row["alamat"] . "</td>
                    <td>$hutang</td>
                 
                    
                    <td>
                    <a target='_blank' href='edit.php?identitas=" . $row['identitas'] . "' class='btn btn-success btn-sm'>Bayar hutang</a>
                    <a target='_blank' href='tambahhutang.php?identitas=" . $row['identitas'] . "' class='btn btn-warning btn-sm'>Tambah hutang</a>
                    </td></tr>";
                    $nomor++;
                }

                echo "Total Hutang beredar: Rp " . number_format($total_hutang, 0, ',', '.');
                $rata_rata = $total_nilai / $jumlah_baris;
                $rata = "Rp " . number_format($rata_rata, 0, ',', '.');
                // echo "<br>Nilai rata-rata hutang: " . $rata;
                echo "<br> .";
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        document.getElementById("tambah-button").onclick = function() {
            window.open("../pelanggan/add.php", "_blank");
        };
    </script>

    <script>
        function search() {
            var input = document.getElementById("search-input").value;
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "search.php?query=" + input);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("search-results").innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>

</body>

</html>