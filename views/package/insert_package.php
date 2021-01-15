<?php

    include "../../config/koneksi.php";

    if(isset($_POST['save-package'])) {
        // DEKLARASI VARIABLE
        $name_package   = $_POST['name_package'];
        $price_package  = $_POST['price_package'];
        $type_package   = $_POST['type_package'];
        $created_by     = $_POST['username'];
        
        // QUERY SIMPAN
        $query = mysqli_query($koneksi, "INSERT INTO `mst_package`(`name_package`, `price_package`, `type_package`, `created_by`) VALUES ('$name_package', $price_package, '$type_package', '$created_by');") or die (mysqli_error($koneksi));

        if($query) {
?>

            <script>
                alert('Data Berhasil Disimpan.');
                document.location = '../media.php?page=package';
            </script>

<?php
        } else {
?>

            <script>
                alert('Data Gagal Disimpan.');
                document.location = '../media.php?page=package';
            </script>

<?php
        }
    } else if(isset($_POST['save-promo'])) {
        // DEKLARASI VARIABLE
        $name_promo = $_POST['name_promo'];
        $price      = $_POST['price'];
        $sd         = explode("-", $_POST['start_date']);
        $ed         = explode("-", $_POST['end_date']);
        $start_date = $sd[2]."-".$sd[1]."-".$sd[0];
        $end_date   = $ed[2]."-".$ed[1]."-".$ed[0];
        $created_by = $_POST['username'];
        
        // QUERY SIMPAN
        $query = mysqli_query($koneksi, "INSERT INTO `mst_promo`(`name_promo`, `price`, `start_date`, `end_date`, `created_by`) VALUES ('$name_promo', '$price', '$start_date', '$end_date', '$created_by');") or die (mysqli_error($koneksi));

        if($query) {
?>

            <script>
                alert('Data Berhasil Disimpan.');
                document.location = '../media.php?page=package';
            </script>

<?php
        } else {
?>

            <script>
                alert('Data Gagal Disimpan.');
                document.location = '../media.php?page=package';
            </script>

<?php
        }
    } else {
?>

    <script>
        alert('Data Gagal Disimpan.');
        document.location = '../media.php?page=package';
    </script>

<?php
    }
?>