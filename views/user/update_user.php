<?php

    include "../../config/koneksi.php";

    //DEKLARASI VARIABLE
    if(isset($_POST['ubah'])) {
        $id_user    = $_POST['id_user'];
        $name_user  = $_POST['name_user'];
        $username   = $_POST['username'];
        if($_POST['password'] != "") {
            $password   = sha1($_POST['password']);
        } else {
            $password   = "";
        }
        $id_role  = $_POST['id_role'];
        
        if(!$id_user) {
            echo "<script>alert('Data Tidak Ada')</script>";
            header("Location:../media.php?page=user");
        } else {
            // PENGECEKAN USERNAME
            $check = mysqli_query($koneksi, "SELECT * FROM `mst_user` WHERE username = '$username' AND id_user <> $id_user AND status = '1'");
            $username_check = $check->num_rows;
            
            if($username_check == 0) {
                if($password != "") {
                    $query  = "UPDATE `mst_user` SET `name_user` = '$name_user', `username` = '$username', `password` = '$password', `id_role` = '$id_role' WHERE `id_user` = '$id_user'";
                } else {
                    $query  = "UPDATE `mst_user` SET `name_user` = '$name_user', `username` = '$username', `id_role` = '$id_role' WHERE `id_user` = '$id_user'";
                }
                $sql    = mysqli_query($koneksi, $query);
?>
                <script>
                    alert('Data Berhasil Diubah');
                    document.location = '../media.php?page=user';
                </script>
<?php
            
            } else {
?>
                <script>
                    alert('Maaf, username sudah ada');
                    document.location = '../media.php?page=user';
                </script>
<?php
            }
        }
    }
           
?>