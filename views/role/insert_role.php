<?php

    include "../../config/koneksi.php";

    // DEKLARASI VARIABLE
    $name_role  = $_POST['name_role'];
    
    // QUERY SIMPAN
    $query = mysqli_query($koneksi, "INSERT INTO `ref_role`(`name_role`) VALUES ('$name_role');") or die (mysqli_error($koneksi));

    if($query) {
?>

    <script>
        alert('Data Berhasil Disimpan.');
        document.location = '../media.php?page=role';
    </script>

<?php
    } else {
?>

    <script>
        alert('Data Gagal Disimpan.');
        document.location = '../media.php?page=role';
    </script>

<?php
    }
?>