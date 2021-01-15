<?php
    include "../../config/koneksi.php";

    if(isset($_GET['id'])) {
        
        $id     = $_GET['id'];
        $query  = "UPDATE `mst_user` SET `status` = '0' WHERE `id_user` = '$id'";
        $sql    = mysqli_query($koneksi,$query);

        if($sql) {
            echo "<script>alert('Data berhasil dihapus');</script>";
            echo "<script>document.location = '../media.php?page=user';</script>";
        } else {
            echo "<script>alert(".$sql.");</script>";
            echo "<script>document.location = '../media.php?page=user';</script>";    
        }
        
    } else {
        echo "<script>alert('Tidak ada data yang terpilih');</script>";
    }
?>