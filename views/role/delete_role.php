<?php
    include "../../config/koneksi.php";

    if(isset($_GET['id'])) {
        
        $id     = $_GET['id'];
        $query  = "UPDATE `ref_role` SET `status` = '0' WHERE `id_role` = '$id'";
        $sql    = mysqli_query($koneksi, $query);

        if($sql) {
            echo "<script>alert('Data Berhasil Dihapus. Terimakasih.');</script>";
            echo "<script>document.location = '../media.php?page=role';</script>";
        } else {
            echo "<script>alert(".$sql.");</script>";
            echo "<script>document.location = '../media.php?page=role';</script>";    
        }
        
    } else {
        echo "<script>alert('Tidak ada data yang terpilih');</script>";
    }
?>