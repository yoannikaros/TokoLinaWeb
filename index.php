
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Control Center</title>
     <!-- Menyisipkan CSS -->
     <link rel="stylesheet" href="source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="source/css/bootstrap.css" />
	<link rel="stylesheet" href="source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menyisipkan JQuery dan Javascript  -->
    <script src="source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="source/fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: rgb(30, 132, 226);
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: black;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 95%;
        left: 124%; 
        width: 100%;
        transform: translate(-50%, -50%);
        font-size: 25px;
        font-weight: 600;
    }
    .profile button a{
        color: black;
    }
    .profile button{
        background-color: rgb(168, 228, 28);
        border: none;
        margin-top: 2%;
        margin-left: auto;
        margin-right: auto;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        cursor: pointer;
        width: 200px;
        display: block;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
    }
    .profile button:hover{
        background-color: yellow;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">TOKO LINA SIGONG</a>
    </nav>
    <div class="profile"> 
    <a href="barang/index.php"><button style="margin-top: 100px;"> <b>Barang</b> </button></a>
        <a href="pelanggan/index.php"><button > <b>Pelanggan</b> </button></a>
        <a href="transaksi/index.php"><button > <b>Transaksi</b> </button> </a>

    </div>

    
</body>
</html>