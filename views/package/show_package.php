<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Master Paket</h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-xs-12">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#package" data-toggle="tab">Paket</a></li>
            <li><a href="#additional" data-toggle="tab">Tambahan</a></li>
            <li><a href="#promotion" data-toggle="tab">Promo</a></li>
        </ul>
        <div class="tab-content">
            <!-- BEGIN PACKAGE -->
            <div class="tab-pane active" id="package">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data-paket">
                    <i class="fa fa-plus"></i> Tambah
                </button>
                <br><br>
                <?php
                    include "../config/koneksi.php";
                    $query_show = "
                        SELECT * FROM mst_package WHERE status = '1' AND type_package = 'package'
                    ";
                    $hasil = mysqli_query($koneksi, $query_show);
                ?>
                <table class="table table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Harga Paket</th>
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
                            <td><?php echo $kolom['name_package']; ?></td>
                            <td>Rp <?=number_format($kolom['price_package'], 2, ",", "."); ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-data-paket-<?php echo $kolom['id_package']; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <a class="btn btn-danger" href="package/delete_package.php?page=delete_package&id=<?php echo $kolom['id_package']; ?>" onclick="if(confirm('Apakah anda yakin akan menghapus?')){return true;} else {return false;}"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
                                    $count++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- END PACKAGE -->

            <!-- BEGIN ADDITIONAL -->
            <div class="tab-pane" id="additional">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data-paket">
                    <i class="fa fa-plus"></i> Tambah
                </button>
                <br><br>
                <?php
                    include "../config/koneksi.php";
                    $query_show = "
                        SELECT * FROM mst_package WHERE status = '1' AND type_package = 'additional'
                    ";
                    $hasil = mysqli_query($koneksi, $query_show);
                ?>
                <table class="table table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Tambahan</th>
                            <th>Harga Tambahan</th>
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
                            <td><?php echo $kolom['name_package']; ?></td>
                            <td>Rp <?=number_format($kolom['price_package'], 2, ",", "."); ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-data-paket-<?php echo $kolom['id_package']; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <a class="btn btn-danger" href="package/delete_package.php?page=delete_package&id=<?php echo $kolom['id_package']; ?>" onclick="if(confirm('Apakah anda yakin akan menghapus?')){return true;} else {return false;}"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
                                    $count++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- END ADDITIONAL -->

            <!-- BEGIN PROMOTION -->
            <div class="tab-pane" id="promotion">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data-promo">
                    <i class="fa fa-plus"></i> Tambah
                </button>
                <br><br>
                <?php
                    include "../config/koneksi.php";
                    $query_show = "
                        SELECT * FROM mst_promo WHERE status = '1'
                    ";
                    $hasil = mysqli_query($koneksi, $query_show);
                ?>
                <table class="table table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Promo</th>
                            <th>Max. Potongan Harga</th>
                            <th>Periode Awal</th>
                            <th>Periode Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($hasil != null) {
                                $count = 1;
                                while($kolom = mysqli_fetch_array($hasil)) {
                                    $ps         = explode("-", $kolom['start_date']);
                                    $pe         = explode("-", $kolom['end_date']);
                                    $per_start  = $ps[2]."-".$ps[1]."-".$ps[0];
                                    $per_end    = $pe[2]."-".$pe[1]."-".$pe[0];
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $kolom['name_promo']; ?></td>
                            <td>Rp <?=number_format($kolom['price'], 2, ",", "."); ?></td>
                            <td><?php echo $per_start; ?></td>
                            <td><?php echo $per_end; ?></td>
                            <td align="center">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-data-promo-<?php echo $kolom['id_promo']; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                <a class="btn btn-danger" href="package/delete_promo.php?page=delete_promo&id=<?php echo $kolom['id_promo']; ?>" onclick="if(confirm('Apakah anda yakin akan menghapus?')){return true;} else {return false;}"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php
                                    $count++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- END PROMOTION -->

        </div>
        <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>

<!-- BEGIN MODAL TAMBAH DATA PAKET -->
<div class="modal fade" id="tambah-data-paket">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Paket/Tambahan</h4>
            </div>
            <div class="modal-body">
            <!-- BEGIN BODY -->
            <form class="form-horizontal" action="package/insert_package.php" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name_package" class="col-sm-3 control-label">Nama Paket</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="username" name="username" value="<?=$_SESSION['username']; ?>" placeholder="Username" required>
                            <input type="text" class="form-control" id="name_package" name="name_package" placeholder="Nama Paket" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_package" class="col-sm-3 control-label">Harga Paket</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="price_package" name="price_package" placeholder="Harga Paket" required pattern="[0-9]+">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type_package" class="col-sm-3 control-label">Tipe Paket</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="type_package" id="type_package" required>
                                <option value="package">Paket</option>
                                <option value="additional">Tambahan</option>
                            </select>
                        </div>
                    </div>
                </div>
            <!-- END BODY -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="save-package" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<!-- END MODAL TAMBAH DATA PAKET -->
<!-- BEGIN MODAL EDIT DATA PAKET -->
<?php
    $query_modal = "
        SELECT * FROM mst_package WHERE status = '1'
    ";
    $return = mysqli_query($koneksi, $query_modal);
    if($return != null) {
        while($modal = mysqli_fetch_array($return)) {
?>
<div class="modal fade" id="edit-data-paket-<?php echo $modal['id_package'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Paket</h4>
            </div>
            <div class="modal-body">
            <!-- BEGIN BODY -->
            <form class="form-horizontal" action="package/update_package.php" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name_package" class="col-sm-3 control-label">Nama Paket</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="username" name="username" value="<?=$_SESSION['username']; ?>" placeholder="Username" required>
                            <input type="hidden" class="form-control" id="id_package" name="id_package" placeholder="ID Paket" value="<?=$modal['id_package']; ?>" required>
                            <input type="text" class="form-control" id="name_package" name="name_package" placeholder="Nama Paket" value="<?=$modal['name_package']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price_package" class="col-sm-3 control-label">Harga Paket</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="price_package" name="price_package" placeholder="Harga Paket" required pattern="[0-9]+" value="<?=$modal['price_package']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type_package" class="col-sm-3 control-label">Tipe Paket</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="type_package" id="type_package" required>
                                <option <?php if($modal['type_package'] == 'package') { echo "selected"; } ?> value="package">Paket</option>
                                <option <?php if($modal['type_package'] == 'additional') { echo "selected"; } ?> value="additional">Tambahan</option>
                            </select>
                        </div>
                    </div>
                </div>
            <!-- END BODY -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="update-package" class="btn btn-primary">Simpan</button>
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
<!-- END MODAL EDIT DATA PAKET -->

<!-- ==================================================================== -->

<!-- BEGIN MODAL TAMBAH DATA PROMO -->
<div class="modal fade" id="tambah-data-promo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Promo</h4>
            </div>
            <div class="modal-body">
            <!-- BEGIN BODY -->
            <form class="form-horizontal" action="package/insert_package.php" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name_promo" class="col-sm-3 control-label">Nama Promo</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="username" name="username" value="<?=$_SESSION['username']; ?>" placeholder="Username" required>
                            <input type="text" class="form-control" id="name_promo" name="name_promo" placeholder="Nama Promo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Max. Potongan Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Max. Potongan Harga" required pattern="[0-9]+">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="start_date" class="col-sm-3 control-label">Periode Awal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepickers" id="start_date" name="start_date" placeholder="Periode Awal" required pattern="[0-9-]+" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="col-sm-3 control-label">Periode Akhir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepickers" id="end_date" name="end_date" placeholder="Periode Akhir" required pattern="[0-9-]+" maxlength="10">
                        </div>
                    </div>
                </div>
            <!-- END BODY -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="save-promo" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    <!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>
<!-- END MODAL TAMBAH DATA PROMO -->
<!-- BEGIN MODAL EDIT DATA PROMO -->
<?php
    $query_modal = "
        SELECT * FROM mst_promo WHERE status = '1'
    ";
    $return = mysqli_query($koneksi, $query_modal);
    if($return != null) {
        while($modal = mysqli_fetch_array($return)) {
?>
<div class="modal fade" id="edit-data-promo-<?php echo $modal['id_promo'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Data Promo</h4>
            </div>
            <div class="modal-body">
            <!-- BEGIN BODY -->
            <form class="form-horizontal" action="package/update_package.php" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name_promo" class="col-sm-3 control-label">Nama Promo</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="username" name="username" value="<?=$_SESSION['username']; ?>" placeholder="Username" required>
                            <input type="hidden" class="form-control" id="id_promo" name="id_promo" value="<?=$modal['id_promo'] ?>" placeholder="ID Promo" required>
                            <input type="text" class="form-control" id="name_promo" name="name_promo" value="<?=$modal['name_promo']; ?>" placeholder="Nama Promo" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-sm-3 control-label">Max. Potongan Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="price" name="price" value="<?=$modal['price']; ?>" placeholder="Max. Potongan Harga" required pattern="[0-9]+">
                        </div>
                    </div>
                    <?php
                        $sd         = explode("-", $modal['start_date']);
                        $ed         = explode("-", $modal['end_date']);
                        $start_date = $sd[2]."-".$sd[1]."-".$sd[0];
                        $end_date   = $ed[2]."-".$ed[1]."-".$ed[0];
                    ?>
                    <div class="form-group">
                        <label for="start_date" class="col-sm-3 control-label">Periode Awal</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepickers" id="start_date" name="start_date" value="<?=$start_date; ?>" placeholder="Periode Awal" required pattern="[0-9-]+" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="end_date" class="col-sm-3 control-label">Periode Akhir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepickers" id="end_date" name="end_date" value="<?=$end_date; ?>" placeholder="Periode Akhir" required pattern="[0-9-]+" maxlength="10">
                        </div>
                    </div>
                </div>
            <!-- END BODY -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="update-promo" class="btn btn-primary">Simpan</button>
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
<!-- END MODAL EDIT DATA PROMO -->

</section>
<!-- /.content -->