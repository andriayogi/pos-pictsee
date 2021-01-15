<?php

    include "../../config/koneksi.php";

    $query = "SELECT * FROM mst_package WHERE status = '1' AND type_package = 'package'";

    $sql = mysqli_query($koneksi, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }

    echo json_encode($data);

?>