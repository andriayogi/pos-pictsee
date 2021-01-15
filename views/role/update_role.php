<?php

    include "../../config/koneksi.php";

    //DEKLARASI VARIABLE
    if(isset($_POST['ubah'])) {
        $id_role    = $_POST['id_role'];
        $name_role  = $_POST['name_role'];
        
        if(!$id_role) {
            echo "<script>alert('Data Tidak Ada')</script>";
            header("Location:../media.php?page=role");
        } else {
            $query  = "UPDATE `ref_role` SET `name_role` = '$name_role' WHERE `id_role` = '$id_role'";
            $sql    = mysqli_query($koneksi, $query);
?>
            <script>
                alert('Data Berhasil Diubah');
                document.location = '../media.php?page=role';
            </script>
<?php
        }
    }
           
?>