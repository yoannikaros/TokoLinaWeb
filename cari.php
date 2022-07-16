
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
    .header {
	  position: relative;
	  left: 0;
	  Top: 0;
	  width: 100%;
	  background-color: Black;
	  color: white;
	  text-align: center;
	}

	table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }
  
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: right;
  }
  
  table td::before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  
  table td:last-child {
    border-bottom: 0;
  }
}
/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">TRANSAKSI</a>
    <button type="button" class="btn btn-light"><a href="../index.php">Kembali</a></button>
    </nav>
    <div class="profile"> 

    <table style="margin-top: 40px;">
    <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Hutang</td>    
                <td>Point</td>            
            </tr>
        </thead>
        <?php
        include "../koneksi/sambung.php";
        $no = 1;
        $query = mysqli_query($kon, 'SELECT * FROM pengguna');
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td data-label="Nomor "><?php echo $no++ ?></td>
                <td data-label="Nama Pelanggan "><?php echo $data['nama_pelanggan'] ?></td>
                <td data-label="Alamat "><?php echo $data['alamat'] ?></td>
                <td data-label="Hutang "><?php echo $data['hutang'] ?></td>
                <td data-label="Point "><?php echo $data['point'] ?></td>
            </tr>
        <?php } ?>
    </table>

    </div>

    
</body>
</html>