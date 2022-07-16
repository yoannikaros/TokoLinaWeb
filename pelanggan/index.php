<?php include_once('config.php'); ?>
<!-- <?php error_reporting(0); ?> -->

<!doctype html>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="Address Book">
	<meta name="keywords" content="Address Book">
	<meta name="robots" content="index,follow">
	<title>Toko Lina Pelanggan</title>


	<!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>




</head>



<body>

	<?php

	$condition	=	'';
	if (isset($_REQUEST['nama_pelanggan']) and $_REQUEST['nama_pelanggan'] != "") {
		$condition	.=	' AND nama_pelanggan LIKE "%' . $_REQUEST['nama_pelanggan'] . '%" ';
	}
	if (isset($_REQUEST['alamat']) and $_REQUEST['alamat'] != "") {
		$condition	.=	' AND alamat LIKE "%' . $_REQUEST['alamat'] . '%" ';
	}


	//Main queries
	$pages->default_ipp	=	10;
	$sql 	= $db->getRecFrmQry("SELECT * FROM pengguna WHERE 1 " . $condition . "");
	$pages->items_total	=	count($sql);
	$pages->mid_range	=	2;
	$pages->paginate();

	$userData	=   $db->getRecFrmQry("SELECT * FROM pengguna WHERE 1 " . $condition . " ORDER BY nama_pelanggan asc " . $pages->limit . "");

	?>



	<style>
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

		@media screen and (max-width: 800px) {
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

	<div class="header">
		<h3>Konsumen</h3>
	</div>

	<div class="container">



		<div class="card">

			<div class="card-header">

				<a href="../index.php" class="float-left btn btn-dark btn-sm">Menu</a>

				<!-- <a href="add-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Tambah</a> -->

			</div>

			<div class="card-body">

				<?php

				if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>  Barang berhasil di hapus !</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Barang berhasil di ubah!</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {

					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
				}

				?>

				<div class="col-sm-12">

					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Pencarian Konsumen</h5>
					<hr>
					<form method="get">

						<div class="row">

							<div class="col-sm-5">

								<div class="form-group">

									<label>Nama Konsumen</label>

									<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" value="<?php echo isset($_REQUEST['nama_pelanggan']) ? $_REQUEST['nama_pelanggan'] : '' ?>" placeholder="Nama Konsumen">

								</div>

							</div>

							<div class="col-sm-5">

								<div class="form-group">

									<label>Desa Konsumen</label>

									<input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo isset($_REQUEST['alamat']) ? $_REQUEST['alamat'] : '' ?>" placeholder="Desa Konsumen">

								</div>

							</div>


							<div class="col-sm-10">

								<div class="form-group">

									<label>&nbsp;</label>

									<div>

										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Cari Konsumen</button>

										<!-- <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a> -->

									</div>

								</div>

							</div>

						</div>

					</form>

				</div>

			</div>

		</div>

		<hr>


		<?php
//fungsi buatRupiah
function buatRupiah($angka){
    $hasil = "Rp " . number_format($angka,0,',','.');
    return $hasil;
}

?>


		<div>
			<br>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>Nama Pelanggan</th>
						<th>Alamat</th>
						<th>Hutang</th>
						<th>Point</th>
					
						<!-- <th class="text-center">Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					if (count($userData) > 0) {
						$s	=	'';
						foreach ($userData as $val) {
							$s++;
					?>

							<tr>
								<td data-label="No"><?php echo $s; ?></td>
								<td data-label="Nama Pelanggan"><?php echo $val['nama_pelanggan']; ?></td>
								<td data-label="Alamat "><?php echo $val['alamat']; ?></td>
								
								<!-- <td data-label="Hutang "><?php echo  $val[ 'hutang']; ?></td> -->
								<td data-label="Hutang "><?php echo buatRupiah($val['hutang']); ?></td>

								<td data-label="Point "><?php echo $val['point']; ?></td>

							</tr>
						<?php
						}
					} else {
						?>
						<tr>
							<td colspan="5" align="center">Barang ngga ada! coba ketik yang bener</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!--/.col-sm-12-->

		<div class="clearfix"></div>

		<div class="row marginTop">
			<div class="col-sm-12 paddingLeft pagerfwt">
				<?php if ($pages->items_total > 0) { ?>
					<?php echo $pages->display_pages(); ?>
					<?php echo $pages->display_items_per_page(); ?>
					<?php echo $pages->display_jump_menu(); ?>
				<?php } ?>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>

	</div>

	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo left sidebar -->

		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752" data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>

	</div>

	<style>
		.footer {
			position: relative;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: Black;
			color: white;
			text-align: center;
		}
	</style>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<!-- 	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
		jQuery(function($){
			  var input = $('[type=tel]')
			  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
			  input.bind('country.mobilePhoneNumber', function(e, country) {
				$('.country').text(country || '')
			  })
			 });
		});
	</script>
     -->

</body>

</html>