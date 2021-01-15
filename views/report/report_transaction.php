<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Report Transaksi</h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <?php
                    header("Content-type: application/vnd-ms-excel");
                    header("Content-Disposition: attachment; filename=Report.xls");
                    
                    include "../config/koneksi.php";

                    if(isset($_POST['search'])) {
                        $today  = date('Y-m-d');
                        $select = $_POST['show_by'];
                        if($select == 'all') {
                            $hasil = mysqli_query($koneksi, "SELECT * FROM trn_invoice WHERE status = '1'");    
                        } else if($select == 'current_date') {
                            $hasil = mysqli_query($koneksi, "SELECT * FROM trn_invoice WHERE status = '1' AND date = '$today'");
                        } else if($select == 'period_date') {
                            $ss     = explode("-", $_POST['period_start']);
                            $se     = explode("-", $_POST['period_end']);
                            $start  = $ss[2]."-".$ss[1]."-".$ss[0];
                            $end    = $se[2]."-".$se[1]."-".$se[0];
                            $hasil  = mysqli_query($koneksi, "SELECT * FROM trn_invoice WHERE status = '1' AND date >= '$start' AND date <= '$end'");
                        }
                    } else {
                        $today  = date('Y-m-d');
                        $hasil  = mysqli_query($koneksi, "SELECT * FROM trn_invoice WHERE status = '1' AND date = '$today'");
                    }
                ?>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="form-control datepickers" value="<?php if(isset($_POST['search'])) { if($_POST['show_by'] == 'all') { echo ""; } else { echo $_POST['period_start']; } } else { echo date('d-m-Y'); } ?>" id="period_start" name="period_start" placeholder="Periode Awal" required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control datepickers" value="<?php if(isset($_POST['search'])) { if($_POST['show_by'] == 'all') { echo ""; } else { echo $_POST['period_end']; } } else { echo date('d-m-Y'); } ?>" id="period_end" name="period_end" placeholder="Periode Akhir" required autocomplete="off">
                        </div>
                        <div class="col-md-2">
                            <select name="show_by" id="show_by" class="form-control">
                                <option value="all" <?php if(isset($_POST['search'])) { if($_POST['show_by'] == 'all') { echo "selected"; } } ?> >Seluruh Data</option>
                                <option value="current_date" <?php if(isset($_POST['search'])) { if($_POST['show_by'] == 'current_date') { echo "selected"; } } else { echo "selected"; } ?>>Hari Ini</option>
                                <option value="period_date" <?php if(isset($_POST['search'])) { if($_POST['show_by'] == 'period_date') { echo "selected"; } } ?> >Periode</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" name="search"><i class="fa fa-search"></i> Cari</button>
                            <a href="export_excel.php" id="download" target="blank" class="btn btn-success"><i class="fa fa-download"></i> Export To Excel</a>
                            <?php if(isset($_POST['search'])) { ?>
                                <a href="../views/media.php?page=report_transaction" class="btn btn-danger" name="search"><i class="fa fa-ban"></i> Bersihkan</a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
                <br>
                <table id="example1" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Invoice</th>
                            <th>Nama Customer</th>
                            <th>Tanggal</th>
                            <th>Detail Order</th>
                            <th>Sub. Total</th>
                            <th>Potongan Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($hasil != null) {
                                $count = 1;
                                while($kolom = mysqli_fetch_array($hasil)) {
                                    $d         = explode("-", $kolom['date']);
                                    $date    = $d[2]."-".$d[1]."-".$d[0];
                        ?>
                        <tr>
                            <td><?=$count; ?></td>
                            <td><?=$kolom['invoice_number']; ?></td>
                            <td><?=$kolom['name_customer']; ?></td>
                            <td><?=$date; ?></td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#detail-<?php echo $kolom['id_invoice']; ?>">
                                    <i class="fa fa-eye"></i> Show
                                </button>
                            </td>
                            <td>Rp <?=number_format($kolom['sub_total'], 2, ",", "."); ?></td>
                            <td>Rp <?=number_format($kolom['discount'], 2, ",", "."); ?></td>
                            <td>Rp <?=number_format($kolom['total_price'], 2, ",", "."); ?></td>
                        </tr>
                        <?php
                                    $count++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- BEGIN MODAL DETAIL -->
            <?php
                $query = "SELECT tid.*, mpa.* FROM trn_invoice_detail AS tid LEFT JOIN mst_package AS mpa ON tid.id_package = mpa.id_package WHERE tid.status = '1'";
                $return = mysqli_query($koneksi, $query);
                if($return != null) {
                    while($modal = mysqli_fetch_array($return)) {
            ?>
            <div class="modal fade" id="detail-<?php echo $modal['id_invoice'];?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Detail Order</h4>
                        </div>
                        <div class="modal-body">
                        <!-- BEGIN BODY -->
                            <div class="box-body">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Paket</th>
                                            <th>Harga Paket</th>
                                            <th>Jumlah</th>
                                            <th>Tipe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $return_detail = mysqli_query($koneksi, $query);
                                        if($return_detail != null) {
                                            $count = 1;
                                            while($kolom = mysqli_fetch_array($return_detail)) {
                                                if($modal['id_invoice'] == $kolom['id_invoice']) {
                                    ?>
                                    <tr>
                                        <td><?=$kolom['name_package']; ?></td>
                                        <td>Rp <?=number_format($kolom['price_package'], 2, ",", "."); ?></td>
                                        <td><?=$kolom['qty']; ?></td>
                                        <td><?php
                                            if($kolom['type_package'] == 'package') {
                                                echo "Paket";
                                            } else {
                                                echo "Tambahan";
                                            }
                                        ?></td>
                                    </tr>
                                    <?php
                                                    $count++;
                                                }
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        <!-- END BODY -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                <!-- /.modal-content -->
                </div>
            <!-- /.modal-dialog -->
            </div>
            <?php
                    }
                }
            ?>
            <!-- END MODAL DETAIL -->
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
    <!-- /.row -->

</section>
<!-- /.content -->