<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Address Book">
    <meta name="keywords" content="Address Book">
    <meta name="robots" content="index,follow">
    <title>Toko Lina barang</title>


    <!-- Menyisipkan CSS -->
    <link rel="stylesheet" href="../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Menyisipkan JQuery dan Javascript  -->
    <script src="../source/v4/dist/js/bootstrap.min.js"></script>
    <script src="../source/js/bootstrap.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>


    <title> Toko Lina</title>
</head>

<body>
    <?php include "../source/navbar/index.php"; ?>



    <div class='container'>
        <center class="mt-5 mb-3">
            <h5>MANAJEMEN STOK YANG KURANG</h5>
        </center>
        <?php
        error_reporting(0);
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

        $sql = "SELECT barang, jenis, qty, kode_item FROM barang WHERE qty < 10 ORDER BY qty";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "
			<table id='search-results' class='table table-striped mt-3'>
			<thead class='thead-dark'>
			
			<tr>
			<th>NAMA BARANG</th>
			<th>SATUAN</th>
			<th>STOK</th>
			<th>ACTION</th>
			</tr>
			
			</thead>
			
			";

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $hargagrosir = "Rp " . number_format($row['hargagrosir'], 0, ',', '.');
                $hargaumum = "Rp " . number_format($row['hargaumum'], 0, ',', '.');

                echo "<tr>
                    <td style='text-transform: uppercase;'>" . $row["barang"] . "</td>
                    <td style='text-transform: uppercase;'>" . $row["jenis"] . "</td>
                    <td style='text-transform: uppercase;'>" . $row["qty"] . "</td>
                
                    <td>
					<a href='../barang/edit-users.php?editId=$row[kode_item]' target='_blank' class='btn btn-primary'>+ Tambah Stok </a> 					
					</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>

    <script>
    document.getElementById("tambah-button").onclick = function() {
        window.open("../barang/add-users.php", "_blank");
    };
    </script>


    <script>
    chrome.tabs.update(tabId, {
        pinned: true
    }, function(tab) {
        //tab is now pinned
    });

    function search() {
        var input = document.getElementById("search-input").value;
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../barang2/search.php?query=" + input);
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