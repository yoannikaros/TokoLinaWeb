<?php include_once('config.php'); ?>
<?php error_reporting(0); ?>

<!doctype html>

<html lang="en-US">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Address Book">
    <meta name="keywords" content="Address Book">
    <meta name="robots" content="index,follow">
    <title>Toko Lina Transaksi</title>


    <!-- Menyisipkan CSS -->
    <link rel="stylesheet" href="../source/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/css/bootstrap.css" />
    <link rel="stylesheet" href="../source/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../source/fontawesome/css/all.css" />
    <link rel="stylesheet" href="../source/v4/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Menyisipkan JQuery dan Javascript  -->
    <script src="../source/js/bootstrap.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.min.js"></script>
    <script rel="stylesheet" src="../source/fontawesome/js/all.js"></script>




</head>



<body>

    <?php

	$condition	=	'';
	if (isset($_REQUEST['pelanggan']) and $_REQUEST['pelanggan'] != "") {
		$condition	.=	' AND pelanggan LIKE "%' . $_REQUEST['pelanggan'] . '%" ';
	}
	if (isset($_REQUEST['lastinsetid']) and $_REQUEST['lastinsetid'] != "") {
		$condition	.=	' AND lastinsetid LIKE "%' . $_REQUEST['lastinsetid'] . '%" ';
	}
	if (isset($_REQUEST['tanggal']) and $_REQUEST['tanggal'] != "") {
		$condition	.=	' AND tanggal LIKE "%' . $_REQUEST['tanggal'] . '%" ';
	}


	//Main queries
	$pages->default_ipp	=	100;
	$sql 	= $db->getRecFrmQry("SELECT * FROM sales_barang WHERE 1 " . $condition . "");
	$pages->items_total	=	count($sql);
	$pages->mid_range	=	2;
	$pages->paginate();

	$userData	=   $db->getRecFrmQry("SELECT * FROM sales_barang WHERE 1 " . $condition . " ORDER BY idjual DESC " . $pages->limit . "");

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

    @media screen and (max-width: 1029px) {
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

    <?php include "../source/navbar/index.php"; ?>

    <div class="mt-4 mr-2 ml-2">


        <div class="card">



            <div class="card-body mt-2">

                <?php

				if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i>  Barang berhasil di hapus !</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Barang berhasil di ubah!</div>';

					echo "<script>setTimeout(function(){
						window.close();
					 }, 2000);</script>";
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {

					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Produk berhasil DITAMBAH!</div>';
					echo "<script>setTimeout(function(){
						window.close();
					 }, 5000);</script>";
				} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
				}


				?>

                <div class="container col-sm-12">

                    <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Pencarian pelanggan</h5>
                    <hr>
                    <form method="get">

                        <div class="row">

                            <div class="col-sm-5">

                                <div class="form-group">

                                    <label>nama pelanggan</label>

                                    <input type="text" name="pelanggan" id="pelanggan" class="form-control"
                                        value="<?php echo isset($_REQUEST['pelanggan']) ? $_REQUEST['pelanggan'] : '' ?>"
                                        placeholder="Nama pelanggan">

                                </div>





                            </div>

                            <div class="col-sm-5">

                                <div class="form-group">

                                    <label>No Struk</label>

                                    <input type="text" name="lastinsetid" id="lastinsetid" class="form-control"
                                        value="<?php echo isset($_REQUEST['lastinsetid']) ? $_REQUEST['lastinsetid'] : '' ?>"
                                        placeholder="No Struk">

                                </div>





                                <div class="col-sm-10">

                                    <div class="form-group">

                                        <label>&nbsp;</label>

                                        <div>

                                            <button type="submit" name="submit" value="search" id="submit"
                                                class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Cari
                                                Pelanggan</button>
                                            <button type="button" class="btn btn-warning"
                                                onclick="window.close();">Kembali</button>
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
		function buatRupiah($angka)
		{
			$hasil = "Rp. " . number_format($angka, 0, ',', '.');
			return $hasil;
		}

		?>


        <div style='width:1500px; overflow: scroll;'>
            <br>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr class="bg-primary text-white">
                        <!-- <th>Sr#</th> -->
                        <th>TTL</th>
                        <th>No. struk</th>
                        <th>Nama</th>
                        <th>Barang</th>

                        <th>Harga</th>

                        <th>QTY</th>
                        <th>Satuan</th>

                        <th>H x QTY</th>
                        <th>Sub </th>
                        <th>hutang sblm</th>
                        <th>Tunai</th>
                        <th>Hutang skrng</th>
                        <th>Sisa</th>

                        <th>point sblm</th>
                        <th>point didapat</th>
                        <th>total point</th>
                        <th>Print</th>
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
                        <!-- <td data-label="No"><?php echo $s; ?></td> -->

                        <td data-label="tanggal "><?php echo $val['tanggal']; ?></td>
                        <td data-label="lastinsetid "><?php echo $val['lastinsetid']; ?></td>
                        <td data-label="pelanggan "><?php echo $val['pelanggan']; ?></td>
                        <td data-label="nama_barang "><?php echo $val['nama_barang']; ?></td>

                        <td data-label="harga "><?php echo buatRupiah($val['harga']); ?></td>

                        <td data-label="jumlah "><?php echo $val['jumlah']; ?></td>
                        <td data-label="satuan "><?php echo $val['satuan']; ?></td>

                        <td data-label="hargatotal "><?php echo buatRupiah($val['hargatotal']); ?></td>
                        <td data-label="subtotal "><?php echo buatRupiah($val['subtotal']); ?></td>
                        <td data-label="hutang_sebelumnya "><?php echo buatRupiah($val['hutang_sebelumnya']); ?></td>
                        <td data-label="tunai "><?php echo buatRupiah($val['tunai']); ?></td>
                        <td data-label="hutang_sekarang "><?php echo buatRupiah($val['hutang_sekarang']); ?></td>
                        <td data-label="sisa "><?php echo buatRupiah($val['kembalian']); ?></td>
                        <td data-label="point_didapat "><?php echo $val['point_didapat']; ?></td>
                        <td data-label="point_sebelumnya "><?php echo $val['pointsebelumnya']; ?></td>

                        <td data-label="total_point "><?php echo $val['pointsekarang']; ?></td>
                        <td><a href="../pelanggan/transaksi/print.php?lastinsetid=<?php echo $val["lastinsetid"]; ?>"><button
                                    class="btn btn-primary">Print</button></a></td>

                    </tr>
                    <?php
						}
					} else {
						?>
                    <tr>
                        <td colspan="5" align="center">Konsumen ngga ada! mungkin belum transaksi atau merubah nama
                            sebelumnya</td>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>


</body>

</html>