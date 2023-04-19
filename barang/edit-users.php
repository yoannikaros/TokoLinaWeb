<?php include_once('config.php');

if (isset($_REQUEST['editId']) and $_REQUEST['editId'] != "") {




    $row    =    $db->getAllRecords('barang', '*', ' AND kode_item="' . $_REQUEST['editId'] . '"');
}



if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

    $barang = $_POST['barang'];
    $harga_modal = $_POST['harga_modal'];
    $barang_lima_karakter = substr($barang, 0, 12);

    // MENENGAH ----------

    // Menghitung Stok menengah
    $idsatuan = $_POST['idsatuan']; //is perdus
    $qty = $_POST['qty']; // QTY

    $stok_menengah = $idsatuan * $qty; // Hasil Stok Menengah
    $modal_menengah = round($harga_modal / $idsatuan);

    $satuan_menengah = $_POST['satuan_menengah'];

    // PCS -----
    $stok_pcs = $_POST['totalPCS'];
    $modal_pcs = $harga_modal / $stok_pcs;

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
    } elseif ($harga_modal == "") {

        header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

        exit;
    }

    $data    =    array(

        'barang' => $barang,
        'jenis' => $jenis,
        'hargaumum' => $hargaumum,
        'hargagrosir' => $hargagrosir,
        'barcode' => $barcode,
        'idsatuan' => $idsatuan,
        'id' => $id,
        'qty' => $qty,
        'harga_modal' => $harga_modal
    );

    $update    =    $db->update('barang', $data, array('kode_item' => $editId));

    if ($update) {

        if ($_POST['jenis'] === "DUS") {
            header("location: ../barang2/name-for-stok.php?barang=$barang_lima_karakter&stokm=$stok_menengah&modalm=$modal_menengah&satuanm=$satuan_menengah&stokp=$stok_pcs&modalp=$modal_pcs");

            exit;
        } else {
            header('location: index.php?msg=ras');
            exit;
        }
        header('location:index.php?msg=ras');



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

    <meta name="robots" content="index,follow">
    <title>Silakan Ubah barang</title>
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



    <?php include "../source/navbar/index.php"; ?>



    <div class="container">
        <br>


        <br>
        <?php

        if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {

            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Nama Barang ngga boleh kosong!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {

            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {

            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {
            header("location: ../barang2");
            echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
        } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

            echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
        }

        ?>

        <div class="card">

            <div class="card-header">
                <h5 class=" float-left" style="text-transform: uppercase;">UBAH PRODUK
                    <?php echo isset($row[0]['barang']) ? $row[0]['barang'] : ''; ?></h5>

            </div>

            <div class="card-body">



                <div class="col-sm-60">


                    <form method="post">

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Barcode</label>

                                <input type="number" name="barcode" id="barcode" class="form-control" value="1<?php echo isset($row[0]['barcode']) ? $row[0]['barcode'] : ''; ?>" placeholder="Enter barcode name" required>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-md-6">
                                <b> <label>Nama Barang</label></b>
                                <input type="text" name="barang" id="barang" class="form-control" value="<?php echo isset($row[0]['barang']) ? $row[0]['barang'] : ''; ?>" placeholder="Enter barang name" required>
                            </div>
                            <div class="col-md-6">
                                <b><label>Satuan</label></b>
                                <select class="form-select" name="jenis" id="jenis">
                                    <option value="<?php echo isset($row[0]['jenis']) ? $row[0]['jenis'] : ''; ?>">
                                        <?php echo isset($row[0]['jenis']) ? $row[0]['jenis'] : ''; ?></option>
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
                                    <option value="DUS" <?php echo isset($row[0]['jenis']) && $row[0]['jenis'] == 'DUS' ? 'selected' : ''; ?>>
                                        DUS</option>
                                    <option value="1/2 DUS">1/2 DUS</option>

                                    <option value="Bal">Bal</option>
                                    <option value="1/2 Bal">1/2 Bal</option>

                                    <option value="KARUNG">KARUNG</option>
                                    <option value="1/2 KARUNG">1/2 KARUNG</option>

                                    <option value="1 PETI">1 PETI</option>
                                    <option value="1/2 PETI">1/2 PETI</option>

                                    <option value="Boss">Boss</option>
                                    <option value="1/2 Boss">1/2 Boss</option>

                                    <option value="GULUNG">GULUNG</option>
                                    <option value="TIMBANGAN">TIMBANGAN</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <h5 class="mt-3 mb-3"><u>Manajemen Stok</u></h5>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <b> <label>Stok</label></b>
                                <input type="number" name="qty" id="qty" class="form-control" value="<?php echo isset($row[0]['qty']) ? $row[0]['qty'] : '1'; ?>" placeholder="Enter qty name" required>
                            </div>

                            <div class="col-md-4">
                                <b><label>Isi Perdus - </label> <label id="label">Pilih Satuan</label><br></b>
                                <div class="input-group">
                                    <input type="number" name="idsatuan" id="idsatuan" class="form-control" value="<?php echo isset($row[0]['idsatuan']) ? $row[0]['idsatuan'] : ''; ?>" placeholder="Masukan isi perdus nya">
                                    <div class="input-group-append">
                                        <select name="satuan_menengah" required class="form-control" id="selectOption">

                                            <?php
                                            // Kondisi menampilkan jumlah data yang tersedia
                                            //koneksi ke database
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "akrab_main";

                                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                                            if (!$conn) {
                                                die("Koneksi gagal: " . mysqli_connect_error());
                                            }

                                            // Query untuk menghitung jumlah data yang sama
                                            $search = $row[0]['barang'];
                                            $sql = "SELECT jenis, COUNT(*) FROM barang WHERE barang LIKE '%$search%'and jenis != 'DUS'";

                                            $result = mysqli_query($conn, $sql);

                                            $rowCount = mysqli_fetch_assoc($result);
                                            $count = $rowCount["COUNT(*)"];

                                            $sql3 = "SELECT jenis, COUNT(*) FROM barang WHERE barang LIKE '%$search%' AND jenis != 'DUS' GROUP BY jenis";
                                            $result3 = mysqli_query($conn, $sql3);
                                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                                $jenis = $row3["jenis"] ? $row3["jenis"] : "tidak tersedia";
                                            ?>
                                                <option value="<?php echo $jenis ?>"><?php echo $jenis ?>
                                                </option>
                                            <?php

                                            }
                                            ?>
                                            <option value="1">-- Tidak ada Satuan --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <?php
                            if ($count > 1) {

                                // Jika barang ditemukan, tampilkan input
                            ?>

                                <div class="col-md-4" id="tampilStokDua">
                                    <b> <label>Berapa PCS dalam 1 </label> <label id="pcs">...</label> <label>
                                            ?</label></b>
                                    <input type="number" id="berapa" class="form-control" name="isi_pcs" value="0" placeholder="Masukin stok" required>

                                </div>
                        </div>



                        <div id="tampilStok" <?php echo isset($row[0]['jenis']) && $row[0]['jenis'] == 'DUS' ? 'style="display: block;"' : 'style="display: none;"'; ?> class="md-10">

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Total Stok </label> <label id="totaltitle"></label><br>
                                    <div class="input-group">
                                        <input type="number" name="" id="hasil" class="form-control" value="0" placeholder="Otomatis" readonly>
                                        <div class="input-group-append">
                                            <select class="form-control" id="selectOption">
                                                <option id="totalkedua">...</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Total Stok PCS</label><br>
                                    <div class="input-group">
                                        <input type="number" name="totalPCS" id="hasil2" class="form-control" value="0" placeholder="Otomatis" readonly>
                                        <div class="input-group-append">
                                            <select class="form-control" id="selectOption2">
                                                <option value="PCS">PCS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                                $sql2 = "SELECT jenis, COUNT(*) FROM barang WHERE barang LIKE '%$search%' AND jenis != 'DUS' GROUP BY jenis";
                                $result2 = mysqli_query($conn, $sql2);

                                while ($row2 = mysqli_fetch_assoc($result2))
                                    echo $row2['jenis'] . " (" . $row2["COUNT(*)"] . ")\n";

                                echo "</div>";
                            } elseif ($count > 0) {
                                echo "</div>";
                                echo $rowCount['jenis'] . " (" . $rowCount["COUNT(*)"] . ")\n";
                            } else {
                                echo " </div>";
                            }

                            mysqli_close($conn);
                    ?>

                    <br><br>
                    <h5 class="mt-3 mb-3"><u>Manajemen Harga</u></h6>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <b><label>HARGA MODAL <span class="text-danger">*</span></label></b>
                                <input type="number" name="harga_modal" id="harga_modal" class="form-control" placeholder="Masukan harga modal barang" required value="<?php echo isset($row[0]['harga_modal']) ? $row[0]['harga_modal'] : ''; ?>">
                            </div>
                            <div class="col-md-4">
                                <b><label>HARGA UMUM <span class="text-danger">*</span></label></b>
                                <input type="number" name="hargaumum" id="hargaumum" class="form-control" placeholder="Enter hargaumum name" required value="<?php echo isset($row[0]['hargaumum']) ? $row[0]['hargaumum'] : ''; ?>">
                            </div>
                            <div class="col-md-4">
                                <b><label>HARGA GROSIR <span class="text-danger">*</span></label></b>
                                <input type="number" name="hargagrosir" id="hargagrosir" class="form-control" placeholder="Enter hargagrosir name" required value="<?php echo isset($row[0]['hargagrosir']) ? $row[0]['hargagrosir'] : ''; ?>">
                            </div>
                        </div>

                        <br>
                        <h5 class="mt-3 mb-3"><u>Rekomendasi Harga</u></h6>



                            <div class="input-group col-md-8">
                                <input type="number" name="" id="tampil_rekomendasi" class="form-control" value="" placeholder="Otomatis" readonly>
                                <div class="input-group-append">
                                    <select class="form-control" id="rekomendasi">
                                        <option value="">-- Pilih Konversi --</option>
                                        <option value="0.0625">Standart</option>
                                        <option value="0.065">PCS (6,25%)</option>
                                        <option value="0.1">RTG (10%)</option>
                                        <option value="0.069">Kemasan (6,9%)</option>
                                        <option value="0.04">1 Dus (4%)</option>
                                        <option value="0.02">1/2 Dus (2%)</option>
                                        <option value="0.008">Karung (0,8 %)</option>
                                        <option value="0.036">1 Dus Mie(3,6%)</option>
                                        <option value="0.018">1/2 Dus Mie (1,8%)</option>
                                        <option value="0.0125">Rokok PCS (1,25%)</option>
                                        <option value="0.005">Slop Rokok (0.5%)</option>
                                    </select>

                                </div>
                                <button class="btn btn-primary" id="pakeButton">Pake Ke Grosir</button>


                                <input hidden readonly type="text" name="id" id="id" class="form-control" value="<?php echo isset($row[0]['id']) ? $row[0]['id'] : ''; ?>" placeholder="Enter id name" required>

                            </div>

                            <br>
                            <div class="input-group col-md-8">
                                <input type="number" name="" id="tampil_rekomendasiUmum" class="form-control" value="" placeholder="Otomatis" readonly>
                                <div class="input-group-append">
                                    <select class="form-control" id="rekomendasiUmum">
                                        <option value="">-- Pilih Konversi --</option>
                                        <option value="0.3">Standart</option>
                                        <option value="0.25">Minimal</option>

                                    </select>

                                </div>
                                <button class="btn btn-primary" id="pakeButtonUmum">Pake Ke Umum</button>


                                <input hidden readonly type="text" name="id" id="id" class="form-control" value="<?php echo isset($row[0]['id']) ? $row[0]['id'] : ''; ?>" placeholder="Enter id name" required>

                            </div>

                            <br>
                            <div class="form-group">

                                <input type="hidden" name="editId" id="editId" value="<?php echo isset($_REQUEST['editId']) ? $_REQUEST['editId'] : '' ?>">

                                <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update
                                    Barang</button>
                                <button type="button" class="btn btn-warning" onclick="window.close();">Kembali</button>
                            </div>

                    </form>

                </div>

            </div>

        </div>

    </div>





    <script>
        var jenisSelect = document.getElementById("jenis");
        var tampilStokDiv = document.getElementById("tampilStok");
        var tampilStokDua = document.getElementById("tampilStokDua");


        // Set tampilStokDiv display style based on jenisSelect value
        tampilStokDiv.style.display =
            "<?php echo isset($row[0]['jenis']) && $row[0]['jenis'] == 'DUS' ? 'block' : 'none'; ?>";

        tampilStokDua.style.display =
            "<?php echo isset($row[0]['jenis']) && $row[0]['jenis'] == 'DUS' ? 'block' : 'none'; ?>";

        jenisSelect.addEventListener("change", function() {
            if (jenisSelect.value == "DUS") {
                tampilStokDiv.style.display = "block";
                tampilStokDua.style.display = "block";
            } else {
                tampilStokDiv.style.display = "none";
                tampilStokDua.style.display = "none";
            }
        });

        //Variabell Grosir
        var hargaModal = document.getElementById('harga_modal');
        var rekomendasi = document.getElementById('rekomendasi');
        var tampilRekomendasi = document.getElementById('tampil_rekomendasi');


        // Variabell Umum
        var hargaModalUmum = document.getElementById('harga_modal');
        var tampil_Rekomendasi_Umum = document.getElementById('tampil_rekomendasiUmum');
        var rekomendasiUmum = document.getElementById('rekomendasiUmum');


        // Ambil elemen input
        var qty = document.getElementById("qty");
        var idsatuan = document.getElementById("idsatuan");
        var hasil = document.getElementById("hasil");
        var hasil2 = document.getElementById("hasil2");
        var berapa = document.getElementById("berapa");

        // Tambahkan event listener ketika nilai input berubah
        qty.addEventListener("input", updateHasil);
        idsatuan.addEventListener("input", updateHasil);

        berapa.addEventListener("input", updateHasil2);

        // Fungsi untuk menghitung hasil
        function updateHasil() {
            var stok = qty.value;
            var isiPerdus = idsatuan.value;
            var hasilSatuanMenengah = stok * isiPerdus;
            hasil.value = hasilSatuanMenengah;
        }

        function updateHasil2() {
            var berapaInput = berapa.value; // ubah nama variabel untuk menghindari konflik dengan variabel lain
            var hasilInput = hasil.value; // ubah nama variabel untuk menghindari konflik dengan variabel lain
            var totalta = berapaInput * hasilInput;
            hasil2.value = totalta;
        }

        // Ubah nama dari option
        const selectOption = document.getElementById("selectOption");
        const label = document.getElementById("label");
        const pcs = document.getElementById("pcs");
        const totalkedua = document.getElementById("totalkedua");
        const totaltitle = document.getElementById("totaltitle");
        selectOption.addEventListener("change", (event) => {
            label.textContent = event.target.value;
            pcs.textContent = event.target.value;
            totaltitle.textContent = event.target.value;
            totalkedua.textContent = event.target.value;
        });

        // Rekomendasi harga Grosir
        rekomendasi.addEventListener("change", function() {
            var selectedValue = parseFloat(rekomendasi.value);
            var recommendedPrice = hargaModal.value * (1 + selectedValue);
            tampilRekomendasi.value = recommendedPrice;
        });

        pakeButton.addEventListener("click", function(event) {
            event.preventDefault(); // mencegah perilaku default tombol
            const tampilRekomendasi = document.getElementById('tampil_rekomendasi').value;
            const hargagrosir = Math.round(tampilRekomendasi); // membulatkan nilai
            document.getElementById('hargagrosir').value = hargagrosir;
        });

        //Rekomendasi Harga Umu
        rekomendasiUmum.addEventListener("change", function() {
            var selectedValue = parseFloat(rekomendasiUmum.value);
            var recommendedPriceUmum = hargaModal.value * (1 + selectedValue);
            tampil_Rekomendasi_Umum.value = recommendedPriceUmum;
        });

        pakeButtonUmum.addEventListener("click", function(event) {
            event.preventDefault(); // mencegah perilaku default tombol
            const tampil_Rekomendasi_Umum = document.getElementById('tampil_rekomendasiUmum').value;
            const hargaumum = Math.round(tampil_Rekomendasi_Umum); // membulatkan nilai
            document.getElementById('hargaumum').value = hargaumum;
        });

        // Mendapatkan opsi Standart
        var standardOption = document.querySelector('option[value="0.0625"]');

        // Mendapatkan tanggal hari ini
        var today = new Date();

        // Mendapatkan nilai untuk opsi hari ini
        var optionValue = getOptionValue(today.getDay());

        // Set nilai untuk opsi Standart
        standardOption.value = optionValue;

        // Fungsi untuk mendapatkan nilai opsi berdasarkan hari
        function getOptionValue(day) {
            switch (day) {
                case 0:
                    // Hari Minggu
                    return "0.0625";
                case 1:
                    // Hari Senin
                    return "0.0625";
                case 2:
                    // Hari Selasa
                    return "0.8";
                case 3:
                    // Hari Rabu
                    return "0.08";
                case 4:
                    // Hari Kamis
                    return "0.7";
                case 5:
                    // Hari Jumat
                    return "0.7";
                case 6:
                    // Hari Sabtu
                    return "0.0630";
                default:
                    return "0.0625";
            }
        }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
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

    <script>
        document.getElementById("tambah-button").onclick = function() {
            window.open("../barang/add-users.php", "_blank");
        };
    </script>

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