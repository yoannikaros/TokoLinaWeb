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
    <link rel="stylesheet" href="source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="source/css/bootstrap.css" />
    <link rel="stylesheet" href="source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="source/v4/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Menyisipkan JQuery dan Javascript  -->
    <script src="source/v4/dist/js/bootstrap.min.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>


    <title> Toko Lina</title>
</head>

<body class="bg-secondary">
    <?php include "source/navbar/index.php"; ?>

    <div class="container mt-2">

        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    Keuntunagn
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    Transaksi
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <div class="card">
                    Barang keluar
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    Hutang
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-sm-6">
                <div class="card">
                    Stok
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    Kunjunagn
                </div>
            </div>
        </div>

        <div class="card mt-2">
            Barang
        </div>

        <div class="card mt-2">
            Barang
        </div>
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