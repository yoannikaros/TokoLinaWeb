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
	<link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="../source/v5/dist/css/bootstrap.min.css" crossorigin="anonymous">

	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>


</head>



<body class="bg-secondary">

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

	<?php include "../source/navbar/index.php"; ?>


	<div class="container mt-4">

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


			<div class="card-header">
				<button type="button" class="btn btn-warning float-left mr-2" onclick="window.close();">Kembali</button>
				<h4 class="float-left">Tambah Barang</h4>
			</div>

			<div class="card-body">



				<div class="col-sm-60">


					<form method="post">

						<div class="form-group">

							<label>Barcode <span class="text-danger">*</span></label>

							<input type="text" name="barcode" id="barcode" class="form-control" placeholder="Masukan barcode" value="0" required>

						</div>

						<div class="form-group">

							<b><label>NAMA BARANG <span class="text-danger">*</span></label></b>

							<input type="text" name="barang" id="barang" class="form-control" placeholder="Masukan nama barang" required>

						</div>

						<div class="form-group">

							<b><label>SATUAN <span class="text-danger">*</span></label></b>

							<!-- <input type="text" name="jenis" id="jenis" class="form-control" placeholder="Masukan Satuan" required> -->

							<select class="form-select" name="jenis" id="jenis">
								<option value="PCS">PCS</option>
								<option value="BKS">BKS</option>
								<option value="1/2 BKS">1/2 BKS</option>
								<option value="SLOP">SLOP</option>

								<option value="RENCENG">RENCENG</option>
								<option value="RTG">RTG</option>
								<option value="1/2 RTG">1/2 RTG</option>

								<option value="KG">KG</option>
								<option value="/2 KG">/2 KG</option>
								<option value="0.5">Setengah KG</option>

								<option value="GLS">GLS</option>
								<option value="IKET">IKET</option>

								<option value="1/4">1/4</option>
								<option value="/2">1/2</option>

								<option value="LUSIN">LUSIN</option>
								<option value="1/2 LUSIN">1/2 LUSIN</option>

								<option value="LEMBAR">LEMBAR</option>

								<option value="1 ONS">1 ONS</option>
								<option value="1/2 ONS">1/2 ONS</option>

								<option value="1 GRAM">1 GRAM</option>
								<option value="1/2 GRAM">1/2 GRAM</option>

								<option value="PAK">Pak</option>
								<option value="/2 Pak">/2 Pak</option>

								<option value="1 Roll">1 Roll</option>
								<option value="1/2 Roll">1/2 Roll</option>

								<option value="1 Gross">1 Gross</option>
								<option value="1/2 Gross">1/2 Gross</option>

								<option value="BOX">BOX</option>
								<option value="DUS">DUS</option>
								<option value="1/2 DUS">1/2 DUS</option>

								<option value="Bal">Bal</option>
								<option value="1/2 Bal">1/2 Bal</option>

								<option value="KARUNG">KARUNG</option>
								<option value="1/2 KARUNG">1/2 KARUNG</option>

								<option value="Boss">Boss</option>
								<option value="1/2 Boss">1/2 Boss</option>

								<option value="1 PETI">1 PETI</option>
								<option value="1/2 PETI">1/2 PETI</option>

								<option value="GULUNG">GULUNG</option>
								<option value="TIMBANGAN">TIMBANGAN</option>
							</select>

						</div>

						<div class="form-group">

							<b><label>HARGA UMUM <span class="text-danger">*</span></label></b>

							<input type="number" name="hargaumum" id="hargaumum" class="form-control" placeholder="Masukan harga umum" required>

						</div>

						<div class="form-group">

							<b><label>HARGA GROSIR <span class="text-danger">*</span></label></b>

							<input type="number" name="hargagrosir" id="hargagrosir" class="form-control" placeholder="Masukan harga grosir" required>

						</div>

						<div class="form-group">

							<label>Isi Perdus <span class="text-danger">*</span></label>

							<input type="text" name="idsatuan" id="idsatuan" class="form-control" placeholder="Masukan idsatuan" value="1" required>

						</div>


						<div class="form-group">

							<label>Abaikan <span class="text-danger">*</span></label>

							<input readonly type="text" name="id" id="id" class="form-control" placeholder="Masukan id" value="2" required>

						</div>

						<div class="form-group">

							<label>Stok <span class="text-danger">*</span></label>

							<input type="text" name="qty" id="qty" class="form-control" placeholder="Masukan qty" value="9999" required>

						</div>

						<div class="form-group">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Tambah Barang</button>
							<button type="button" class="btn btn-warning" onclick="window.close();">Kembali</button>

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
	<script>
		document.getElementById('myForm').addEventListener('submit', function(event) {
			event.preventDefault(); // prevent form from being submitted

			// get value of input with ID "name"
			var USERNAME = document.getElementById('USERNAME').value;

			// set action of form to "google.com/name"
			this.action = "../barang/?barang=" + USERNAME;

			// submit form
			this.submit();
		});
	</script>

</body>

</html>