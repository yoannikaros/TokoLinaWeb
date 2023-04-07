<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Pelanggan</title>
</head>

<body class="bg-secondary">
    <?php include "../source/navbar/index.php"; ?>



    <div class="container mt-5">
        <div class="card p-4 ">
            <center>
                <h5>LAPORAN KEUANGAN HARIAN</h5>
                <p>Untuk memudahkan pencarian laporan, mohon tentukan berapa hari yang ingin ditampilkan hingga saat
                    ini:</p>
                <form method="GET" action="ringkas.php">
                    <input type="number" name="no" value="30" class="form-control">
                    <button type="submit" class="btn btn-primary w-100 mt-2">Lihat</button>
                </form>
            </center>
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