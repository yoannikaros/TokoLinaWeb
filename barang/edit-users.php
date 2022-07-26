<?php include_once('config.php');

if (isset($_REQUEST['editId']) and $_REQUEST['editId'] != "") {

	$row	=	$db->getAllRecords('barang', '*', ' AND kode_item="' . $_REQUEST['editId'] . '"');
}



if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

	extract($_REQUEST);

	if ($barang == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($jenis == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($hargaumum == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($hargagrosir == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($barcode == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($idsatuan == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($id == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($qty == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	}

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

	$update	=	$db->update('barang', $data, array('kode_item' => $editId));

	if ($update) {

		header('location: index.php?msg=rus');

		exit;
	} else {

		header('location: index.php?msg=rnu');

		exit;
	}
}

?>

<!doctype html>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title>Silakan Ubah barang</title>
	<!-- Menyisipkan CSS -->
	<link rel="stylesheet" href="../source/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../source/css/bootstrap.css" />
	<link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="../source/fontawesome/css/all.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<!-- Menyisipkan JQuery dan Javascript  -->
	<script src="../source/js/bootstrap.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
	<script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>


	<script rel="stylesheet" src="source/fontawesome/js/all.min.js"></script>
	<!-- 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->


</head>



<body>







	<div class="container">
		<br>

		<center>
			<h4>Ubah barang</h4>
		</center>
		<br>
		<?php

		if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Nama Barang ngga boleh kosong!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}

		?>

		<div class="card">

			<div class="card-header"><a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Lihat semua barang</a></div>

			<div class="card-body">



				<div class="col-sm-60">


					<form method="post">

						<div class="form-group">

							<label>Nama Barang <span class="text-danger">*</span></label>

							<input type="text" name="barang" id="barang" class="form-control" value="<?php echo isset($row[0]['barang']) ? $row[0]['barang'] : ''; ?>" placeholder="Enter barang name" required>

						</div>

						

						<div class="form-group">

							<label>Satuan <span class="text-danger">*</span></label>

							<input readonly type="text" name="jenis" id="jenis" class="form-control" value="<?php echo isset($row[0]['jenis']) ? $row[0]['jenis'] : ''; ?>" placeholder="Enter jenis name" required>

						</div>

						

						<div class="form-group">

							<label>Harga Umum <span class="text-danger">*</span></label>

							<input type="text" name="hargaumum" id="hargaumum" class="form-control" value="<?php echo isset($row[0]['hargaumum']) ? $row[0]['hargaumum'] : ''; ?>" placeholder="Enter hargaumum name" required>

						</div>

						<div class="form-group">

							<label>Harga Grosir <span class="text-danger">*</span></label>

							<input type="text" name="hargagrosir" id="hargagrosir" class="form-control" value="<?php echo isset($row[0]['hargagrosir']) ? $row[0]['hargagrosir'] : ''; ?>" placeholder="Enter hargagrosir name" required>

						</div>

						<div class="form-group">

							<label>Isi Perdus</label>

							<input type="text" name="idsatuan" id="idsatuan" class="form-control" value="<?php echo isset($row[0]['idsatuan']) ? $row[0]['idsatuan'] : ''; ?>" placeholder="Enter idsatuan name" required>

						</div>

						<div class="form-group">

							<label>Abaikan</label>

							<input readonly type="text" name="barcode" id="barcode" class="form-control" value="1<?php echo isset($row[0]['barcode']) ? $row[0]['barcode'] : ''; ?>" placeholder="Enter barcode name" required>

						</div>


						<div class="form-group">

							<label>Abaikan</label>

							<input readonly type="text" name="id" id="id" class="form-control" value="<?php echo isset($row[0]['id']) ? $row[0]['id'] : ''; ?>" placeholder="Enter id name" required>

						</div>

						<div class="form-group">

							<label>Stok</label>

							<input readonly type="text" name="qty" id="qty" class="form-control" value="<?php echo isset($row[0]['qty']) ? $row[0]['qty'] : ''; ?>" placeholder="Enter qty name" required>

						</div>

						<br>
						<div class="form-group">

							<input type="hidden" name="editId" id="editId" value="<?php echo isset($_REQUEST['editId']) ? $_REQUEST['editId'] : '' ?>">

							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update Barang</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>



	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo left sidebar -->

		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752" data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>

	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
			jQuery(function($) {
				var input = $('[type=tel]')
				input.mobilePhoneNumber({
					allowPhoneWithoutPrefix: '+1'
				});
				input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				})
			});
		});
	</script>


</body>

</html>