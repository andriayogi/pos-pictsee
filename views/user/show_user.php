<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Master User</h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
        <!-- <div class="box-header">
            <h3 class="box-title">Input masks</h3>
        </div> -->
            <div class="box-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data">
                    <i class="fa fa-plus"></i> Tambah
                </button>
                <br><br>
                <?php
                    include "../config/koneksi.php";
                    $hasil = mysqli_query($koneksi, "SELECT * FROM mst_user WHERE status = '1'");
                ?>
                <table id="example1" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($hasil != null) {
                                $count = 1;
                                while($kolom = mysqli_fetch_array($hasil)) {
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $kolom['name_user']; ?></td>
                            <td><?php echo $kolom['username']; ?></td>
                            <td>
                            <?php
                                if($kolom['id_role'] == 1) {
                                    echo "Admin";
                                } else if($kolom['id_role'] == 2) {
                                    echo "Kasir";
                                }
                            ?>
                            </td>
                            <td align="center">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-data<?php echo $kolom['id_user']; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <a class="btn btn-danger" href="user/delete_user.php?page=delete_user&id=<?php echo $kolom['id_user']; ?>" onclick="if(confirm('Apakah anda yakin akan menghapus?')){return true;} else {return false;}"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
                                    $count++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <!-- BEGIN MODAL TAMBAH DATA -->
                <div class="modal fade" id="tambah-data">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Data User</h4>
                            </div>
                            <div class="modal-body">
                            <!-- BEGIN BODY -->
                            <form class="form-horizontal" action="user/insert_user.php" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name_user" class="col-sm-3 control-label">Nama User</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Nama User" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_role" class="col-sm-3 control-label">Role</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_role">
                                                <?php
                                                    $select = mysqli_query($koneksi, "SELECT * FROM ref_role WHERE status = '1'");
                                                    if($select != null) {
                                                        while($option = mysqli_fetch_array($select)) {
                                                ?>
                                                    <option value="<?=$option['id_role'];?>"><?=$option['name_role'];?></option>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <!-- END BODY -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                <!-- /.modal-dialog -->
                </div>
                <!-- END MODAL TAMBAH DATA -->
                <!-- BEGIN MODAL EDIT DATA -->
                <?php
                    $return = mysqli_query($koneksi, "SELECT * FROM mst_user WHERE status = '1'");
                    if($return != null) {
                        while($modal = mysqli_fetch_array($return)) {
                ?>
                <div class="modal fade" id="edit-data<?php echo $modal['id_user'];?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Data User</h4>
                            </div>
                            <div class="modal-body">
                            <!-- BEGIN BODY -->
                            <form class="form-horizontal" action="user/update_user.php" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name_user" class="col-sm-3 control-label">Nama User</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="ID User" required value="<?php echo $modal['id_user']; ?>">
                                            <input type="text" class="form-control" id="name_user" name="name_user" placeholder="Nama User" required value="<?php echo $modal['name_user']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-3 control-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required value="<?php echo $modal['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-3 control-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password (Kosongkan bila tidak akan diubah)" title="Kosongkan bila tidak akan diubah">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_role" class="col-sm-3 control-label">Role</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="id_role">
                                            <?php
                                                $selects = mysqli_query($koneksi, "SELECT * FROM ref_role WHERE status = '1'");
                                                if($selects != null) {
                                                    while($options = mysqli_fetch_array($selects)) {
                                            ?>
                                                <option value="<?=$options['id_role']; ?>" <?php if($modal['id_role'] == $options['id_role']) {echo "selected";} ?>><?=$options['name_role']; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <!-- END BODY -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    <!-- /.modal-content -->
                    </div>
                <!-- /.modal-dialog -->
                </div>
                <?php
                        }
                    }
                ?>
                <!-- END MODAL EDIT DATA -->
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
    <!-- /.row -->

</section>
<!-- /.content -->

<script>
    function disabledRole() {
        let role = document.getElementById('role_name').value;
        if(role == 'disdakmen' || role == 'yayasan') {
            document.getElementById('role_location').disabled = true;
        }
        if(role == 'kepsek' || role == 'admin') {
            document.getElementById('role_location').disabled = false;
        }
    }
</script>