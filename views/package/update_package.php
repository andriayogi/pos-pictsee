<?php

    include "../../config/koneksi.php";

    //DEKLARASI VARIABLE
    if(isset($_POST['update-package'])) {
        $id_package     = $_POST['id_package'];
        $name_package   = $_POST['name_package'];
        $price_package  = $_POST['price_package'];
        $type_package   = $_POST['type_package'];
        $created_by     = $_POST['username'];
        
        if(!$id_package) {
            echo "<script>alert('Data Tidak Ada')</script>";
            header("Location:../media.php?page=package");
        } else {
            $query_package  = "UPDATE `mst_package` SET `name_package` = '$name_package', `price_package` = '$price_package', `type_package` = '$type_package', `created_by` = '$created_by' WHERE `id_package` = '$id_package'";
            $update_package = mysqli_query($koneksi, $query_package);
?>
            <script>
                alert('Data Berhasil Diubah');
                document.location = '../media.php?page=package';
            </script>
<?php
        }
    } else if(isset($_POST['update-promo'])) {
        $id_promo   = $_POST['id_promo'];
        $name_promo = $_POST['name_promo'];
        $price      = $_POST['price'];
        $sd         = explode("-", $_POST['start_date']);
        $ed         = explode("-", $_POST['end_date']);
        $start_date = $sd[2]."-".$sd[1]."-".$sd[0];
        $end_date   = $ed[2]."-".$ed[1]."-".$ed[0];
        $created_by = $_POST['username'];
        
        if(!$id_promo) {
            echo "<script>alert('Data Tidak Ada')</script>";
            header("Location:../media.php?page=package");
        } else {
            $query_promo    = "UPDATE `mst_promo` SET `name_promo` = '$name_promo', `price` = '$price', `start_date` = '$start_date', `end_date` = '$end_date', `created_by` = '$created_by' WHERE `id_promo` = '$id_promo'";
            $update_promo   = mysqli_query($koneksi, $query_promo);
?>
            <script>
                alert('Data Berhasil Diubah');
                document.location = '../media.php?page=package';
            </script>
<?php
        }
    }
?>
?>