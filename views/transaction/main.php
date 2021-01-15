<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Data Transaksi Hari Ini</h1>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <?php
                    include "../config/koneksi.php";
                    $today = date('Y-m-d');
                    $hasil = mysqli_query($koneksi, "SELECT * FROM trn_invoice WHERE status = '1' AND date = '$today'");
                ?>
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
                        ?>
                        <tr>
                            <td><?=$count; ?></td>
                            <td><?=$kolom['invoice_number']; ?></td>
                            <td><?=$kolom['name_customer']; ?></td>
                            <td><?=$kolom['date']; ?></td>
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