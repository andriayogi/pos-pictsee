<?php

    include "../../config/koneksi.php";

    $promo = $_GET['promo'];

    $query = "SELECT price FROM mst_promo WHERE status = '1' AND name_promo = '$promo'";

    $sql = mysqli_query($koneksi, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode($data);

?>