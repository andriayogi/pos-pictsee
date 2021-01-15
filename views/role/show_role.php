<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Master Role</h1>
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
                    $hasil = mysqli_query($koneksi, "SELECT * FROM ref_role WHERE status = '1'");
                ?>
                <table id="example1" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Role</th>
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
                            <td><?php echo $kolom['name_role']; ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-data<?php echo $kolom['id_role']; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <a class="btn btn-danger" href="role/delete_role.php?page=delete_role&id=<?php echo $kolom['id_role']; ?>" onclick="if(confirm('Apakah anda yakin akan menghapus?')){return true;} else {return false;}"><i class="fa fa-trash-o"></i> Hapus</a>
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
                                <h4 class="modal-title">Tambah Data Role</h4>
                            </div>
                            <div class="modal-body">
                            <!-- BEGIN BODY -->
                            <form class="form-horizontal" action="role/insert_role.php" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name_role" class="col-sm-3 control-label">Nama Role</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name_role" name="name_role" placeholder="Nama Role" required>
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
                    $return = mysqli_query($koneksi, "SELECT * FROM ref_role WHERE status = '1'");
                    if($return != null) {
                        while($modal = mysqli_fetch_array($return)) {
                ?>
                <div class="modal fade" id="edit-data<?php echo $modal['id_role'];?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Data Role</h4>
                            </div>
                            <div class="modal-body">
                            <!-- BEGIN BODY -->
                            <form class="form-horizontal" action="role/update_role.php" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name_role" class="col-sm-3 control-label">Nama Role</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" id="id_role" name="id_role" placeholder="ID Role" required value="<?php echo $modal['id_role']; ?>">
                                            <input type="text" class="form-control" id="name_role" name="name_role" placeholder="Nama Role" required value="<?php echo $modal['name_role']; ?>">
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