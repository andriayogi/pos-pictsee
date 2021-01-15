<?php

    include "../../config/koneksi.php";

    // DEKLARASI VARIABLE
    $name_user  = $_POST['name_user'];
    $username   = $_POST['username'];
    $password   = sha1($_POST['password']);
    $id_role    = $_POST['id_role'];
    
    // PENGECEKAN USERNAME
    $check = mysqli_query($koneksi, "SELECT * FROM `mst_user` WHERE username = '$username' AND status = '1'");
    $username_check = $check->num_rows;

    // QUERY SIMPAN
    if(isset($_POST['simpan'])) {
        if($username_check == 0) {
            $query = mysqli_query($koneksi, "INSERT INTO `mst_user`(`name_user`, `username`, `password`, `id_role`) VALUES ('$name_user', '$username', '$password', '$id_role');") or die (mysqli_error($koneksi));
?>

            <script>
                alert('Data Berhasil Disimpan.');
                document.location = '../media.php?page=user';
            </script>

<?php
        } else {
?>

            <script>
                alert('Mohon maaf, Username sudah ada.');
                document.location = '../media.php?page=user';
            </script>

<?php
        }
    }
?>