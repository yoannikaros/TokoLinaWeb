<body onload="window.print()">
    <?php
    // Lakukan koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "akrab_main");

    // Lakukan query untuk mengambil data dari tabel pengguna
    $sql = "SELECT * FROM pengguna";
    $result = mysqli_query($conn, $sql);

    // Buat array kosong untuk menampung data dari database
    $users = array();

    // Looping untuk mengisi array dengan data dari query
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }

    // // Urutkan array berdasarkan kolom "point" dari kecil ke besar
    // $points = array_column($users, 'point');
    // sort($points);
    // $sorted_users = array();
    // foreach ($points as $point) {
    //     foreach ($users as $user) {
    //         if ($user['point'] == $point) {
    //             $sorted_users[] = $user;
    //             break;
    //         }
    //     }
    // }

    // Urutkan array berdasarkan kolom "point" dari besar ke kecil
    $points = array_column($users, 'point');
    rsort($points);
    $sorted_users = array();
    foreach ($points as $point) {
        foreach ($users as $user) {
            if ($user['point'] == $point) {
                $sorted_users[] = $user;
                break;
            }
        }
    }

    // Tampilkan hasil pengurutan ke layar
    // Tampilkan hasil pengurutan ke dalam tabel
    echo '<table>';
    echo '<thead><tr><th>Konsumen</th><th>Point</th></tr></thead>';
    echo '<tbody>';
    foreach ($sorted_users as $user) {
        echo '<tr><td>' . $user['nama_pelanggan'] . '</td><td>' . $user['point'] . '</td></tr>';
    }
    echo '</tbody>';
    echo '</table>';
    ?>
</body>