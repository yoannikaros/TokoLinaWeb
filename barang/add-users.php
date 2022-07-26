<?php include_once('config.php');

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

	extract($_REQUEST);

	if ($barang == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un');

		exit;
	} elseif ($jenis == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} elseif ($hargaumum == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up');

		exit;
	} elseif ($hargagrosir == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} elseif ($barcode == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} elseif ($idsatuan == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} elseif ($id == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} elseif ($qty == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} else {



		$userCount	=	$db->getQueryCount('barang', 'kode_item');

		if ($userCount[0]['total'] < 100000) {

			$data	=	array(

				'barang' => $barang,
				'jenis' => $jenis,
				'hargaumum' => $hargaumum,
				'hargagrosir' => $hargagrosir,
				'barcode' => $barcode,
				'idsatuan' => $idsatuan,
				'id' => $id,
				'qty' => $qty,

			);

			$insert	=	$db->insert('barang', $data);

			if ($insert) {

				header('location:index.php?msg=ras');

				exit;
			} else {

				header('location:index.php?msg=rna');

				exit;
			}
		} else {

			header('location:' . $_SERVER['PHP_SELF'] . '?msg=dsd');

			exit;
		}
	}
}

?>

<!doctype html>
<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="Address Book">
	<meta name="keywords" content="toko lina">
	<meta name="robots" content="index,follow">
	<title>Tambah Barang</title>
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



</head>



<body>

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
	</style>

	<div class="header">
		<h3>Tambah Barang Baru</h3>
	</div>


	<div class="container">

		<?php

		if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "dsd") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';
		}

		?>

		<div class="card">


			<div class="card-header"><a href="index.php" class="float-left btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Kembali</a></div>

			<div class="card-body">



				<div class="col-sm-60">


					<form method="post">

						<div class="form-group">

							<label>Nama Barang <span class="text-danger">*</span></label>

							<input type="text" name="barang" id="barang" class="form-control" placeholder="Masukan nama barang" required>

						</div>

						<div class="form-group">

							<label>Satuan Barang <span class="text-danger">*</span></label>

							<!-- <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Masukan Satuan" required> -->

							<select class="form-select" name="jenis" id="jenis">
								<option value="PCS">PCS</option>
								<option value="BKS">BKS</option>
								<option value="Slop">Slop</option>
								<option value="PAK">Pak</option>
								<option value="/2 Pak">/2 Pak</option>
								<option value="LEMBAR">LEMBAR</option>
								<option value="RENCENG">RENCENG</option>
								<option value="BUNGKUS">BUNGKUS</option>
								<option value="IKET">IKET</option>
								<option value="0.5">0.5</option>
								<option value="1/4">1/4</option>
								<option value="GLS">GLS</option>
								<option value="/4">/4</option>
								<option value="/2">/2</option>
								<option value="KG">KG</option>
								<option value="/2 KG">/2 KG</option>
								<option value="1/2 RTG">1/2 RTG</option>
								<option value="1 KG">1 KG</option>
								<option value="1 ONS">1 ONS</option>
								<option value="1/2 ONS">1/2 ONS</option>
								<option value="1 GRAM">1 GRAM</option>
								<option value="BOX">BOX</option>
								<option value="DUS">DUS</option>
								<option value="RTG">RTG</option>
								<option value="KARUNG">KARUNG</option>
								<option value="TIMBANGAN">TIMBANGAN</option>
								<option value="Bal">Bal</option>
								<option value="Slop">Slop</option>
								<option value="SLOP">SLOP</option>
							</select>






						</div>

						<div class="form-group">

							<label>Harga Umum <span class="text-danger">*</span></label>

							<input type="text" name="hargaumum" id="hargaumum" class="form-control" placeholder="Masukan harga umum" required>

						</div>

						<div class="form-group">

							<label>Harga Grosir <span class="text-danger">*</span></label>

							<input type="text" name="hargagrosir" id="hargagrosir" class="form-control" placeholder="Masukan harga grosir" required>

						</div>

						<div class="form-group">

							<label>Isi Perdus <span class="text-danger">*</span></label>

							<input type="text" name="idsatuan" id="idsatuan" class="form-control" placeholder="Masukan idsatuan" value="1" required>

						</div>


						<div class="form-group">

							<label>Abaikan <span class="text-danger">*</span></label>

							<input readonly type="text" name="barcode" id="barcode" class="form-control" placeholder="Masukan barcode" value="9999" required>

						</div>


						<div class="form-group">

							<label>Abaikan <span class="text-danger">*</span></label>

							<input readonly type="text" name="id" id="id" class="form-control" placeholder="Masukan id" value="2" required>

						</div>

						<div class="form-group">

							<label>Abaikan <span class="text-danger">*</span></label>

							<input readonly type="text" name="qty" id="qty" class="form-control" placeholder="Masukan qty" value="9999" required>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Tambah Barang</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>



	<div class="container my-4">



	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<style>
		.footer {
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			background-color: Black;
			color: white;
			text-align: center;
		}
	</style>


</body>

</html>