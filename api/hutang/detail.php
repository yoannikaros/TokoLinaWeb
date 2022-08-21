<?php 

    $connection = new mysqli("localhost","root","","akrab_main");
    $data       = mysqli_query($connection, "select * from pengguna where identitas=".$_GET['identitas']);
    $data       = mysqli_fetch_array($data, MYSQLI_ASSOC);

    echo json_encode($data);