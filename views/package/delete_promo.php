<?php
    include "../../config/koneksi.php";

    if(isset($_GET['id'])) {
        
        $id     = $_GET['id'];
        $query  = "UPDATE `mst_promo` SET `status` = '0' WHERE `id_promo` = '$id'";
        $sql    = mysqli_query($koneksi,$query);

        if($sql) {
            echo "<script>alert('Data berhasil dihapus');</script>";
            header("Location:../media.php?page=package");
        } else {
            echo "<script>alert(".$sql.");</script>";
            echo "<script>document.location = '../views/media.php?page=package';</script>";    
        }
        
    } else {
        echo "<script>alert('Tidak ada data yang terpilih');</script>";
    }
?>