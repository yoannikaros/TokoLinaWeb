<?php
	$conn = mysqli_connect("localhost", "root", "", "akrab_main");
	$post_at = "";
	$post_at_to_date = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"]["post_at"])) {			
		$post_at = $_POST["search"]["post_at"];
		list($fiy,$fim,$fid) = explode("/",$post_at);
		
		$post_at_todate = date('Y/m/d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tiy,$tim,$tid) = explode("/",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy/$tim/$tid";
		}
		
		$queryCondition .= "WHERE date BETWEEN '$fiy/$fim/$fid' AND '" . $post_at_todate . "'";
	}

	$sql = "SELECT * from sales " . $queryCondition . " ORDER BY date asc";
	$result = mysqli_query($conn,$sql);
?>

<html>
	<head>
    <title>Transaksi</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:50%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	</style>

		<!-- Menyisipkan CSS -->
		<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>
	</head>
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
		margin-left: 10px;
        background-color: rgb(168, 228, 28);
        border: none;
		border-radius: 4px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        cursor: pointer;
        width: 120px;
      	height: 35px;
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
			
			
			margin: 10px;
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

		@media screen and (max-width: 20px) {
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
				margin-top: 5px;
				font-size: .8em;

				text-align: right;
			}

			table td::before {
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
	<body>
	<nav class="navbar">
    <a class="navbar-brand" href="/index.php">Transaksi</a>
   
</nav>
<br>
	<a href="../index.php"><input style="margin-left:10px" class="btn btn-primary"  value="Kembali ke menu!" ></a>
    <div class="profile"> 

	<br>
    <div class="demo-content">
		
  <form name="frmSearch" method="post" action="">
	 <p class="search_input">
		<input type="text" placeholder="Dari Tanggal" style="margin-left:10px"  id="post_at" name="search[post_at]"  value="<?php echo date('Y/m/d');?><?php echo $post_at; ?>" class="input-control" />
		<br>
		<br>
	    <input  type="text" placeholder="Sampai Tanggal" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  />			 
		<br>
		<br>
		
		<input style="margin-left:10px" class="btn btn-primary" type="submit" name="go" value="Cari Transaksi" >
	</p>
	
<?php if(!empty($result))	 { ?>

<table class="table table-striped table-bordered">
          <thead>
        <tr>
                      
          <th><span>Nama Pelanggan</span></th>
          <th ><span>Tanggal</span></th>          
		  <th ><span>Subtotal</span></th>   
        </tr>
      </thead>
    <tbody>
	<?php
	$total = 0;
	$formatku = "Rp";
	
		while($row = mysqli_fetch_array($result)) {
			
			$total += $row['subtotal'];
	?>
        <tr>
			<td><?php echo $row["nama_pelanggan"]; ?></td>
			<td><?php echo $row["date"]; ?></td>
			<!-- <td><?php echo $row["subtotal"]; ?></td> -->
			<td>Rp. <?php echo number_format(($row["subtotal"]), 0, ',', '.') ?></td>
		</tr>
		
   <?php
		}
   ?>
   <tr>
		<td colspan="2">TOTAL</td>
		<td>Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
	 </tr>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
// buttonImage: "../source/fontawesome/svgs/regular/calendar.svg",
buttonText: "Pilih tanggal",
// buttonImageOnly: true,
dateFormat: 'yy/mm/dd'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
</div>
</body>
</html>
