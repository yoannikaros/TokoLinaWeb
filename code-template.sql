<?php
                        $halaman_id = $_GET["halaman_id"];
                        $judul = $_GET["judul"];
                       
                        // Koneksi ke database
                        require_once '../../enkripsi/config.php';
                        $conn = mysqli_connect($host, $username, $password, $database);


                        // Query database
                        $sql = "SELECT * FROM ";


                        // Eksekusi query
                        $result = mysqli_query($conn, $sql);

                        // Tampilkan hasil query
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>


-- <?php echo $row["panggil"]; ?>
-- <?php echo "Rp " . number_format($row["anggaran"], 0, ",", "."); ?>


                        <?php
                            }
                        } else {
                            echo "Tidak ada data hari ini";
                        }

                        // Tutup koneksi
                        mysqli_close($conn);

                        ?>

                        ----------------------------------------------------------------------------------------------
                        	//table 2
	$table_2 = "SELECT * FROM invoice_barang WHERE no_tabel = '2'";
	$table_2 = $db->query($table_2);

				<?php
				$nomor = 1;
				$total2 = 0;
				$firstRow = true;
				while ($row = $table_2->fetch(PDO::FETCH_ASSOC)) {
					$subtotal = $row['qty'] * $row['harga'];

					echo "<tr>";
					echo " <td style='text-align: center'>$nomor</td>";
					echo "<td>" . $row['nama_barang'] . " <a style='float: right;' href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Hapus</a> </td>";
					echo "<td >" . $row['satuan'] . " </td>";
					echo "<td style='width: 1%; text-align: center'>" . $row['qty'] . " </td>";
					echo "<td >" . $row['harga'] . " </td>";
					echo "<td >" . $subtotal . "</td>";

					echo "</tr>";
					$total2 += $subtotal;
					$nomor++;
				} ?>