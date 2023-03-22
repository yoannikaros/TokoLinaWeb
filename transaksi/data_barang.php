
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    	<!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" crossorigin="anonymous">	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	
	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>

</head>
<body>
<?php include "../source/navbar/index.php"; ?>
    <div class="container">
		<div class="card">



<?php

// Connect to the database
$koneksi = mysqli_connect("localhost", "root", "", "akrab_main");

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create the query
$query = "SELECT DATE_FORMAT(tanggal,'%Y/%m/%d') as tanggal,nama_barang,harga
FROM sales_barang WHERE tanggal >= DATE_SUB(NOW(), INTERVAL 60 DAY)
GROUP BY DATE_FORMAT(tanggal,'%Y/%m/%d'), lastinsetid
ORDER BY tanggal DESC";

// Execute the query
$result = mysqli_query($koneksi, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<div class="container mt-3">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
        </tr>
    </thead>
    <tbody>
        
    <?php 
//Menghitung rata rata
$total_nilai = 0;
$jumlah_baris = 0;
    while($data = mysqli_fetch_assoc($result)){ 
            //Menghitung rata rata
            $nilai = $data['harga'];
            $total_nilai += $nilai;
            $jumlah_baris++;
        ?>
        <tr>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo $data['harga']; ?></td>
                </tr>
        <?php 
         $rata_rata = $total_nilai / $jumlah_baris;
    } ?>
 <td data-label="Total Subtotal">Rata rata harga barang : <?php echo $rata_rata ?></td>
    </tbody>
</table>

<?php

// Close the connection
mysqli_close($koneksi);

?>

</div>
	</div>
</body>
</html>