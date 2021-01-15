<?php
    include "../config/koneksi.php";

    $current_date = date('Y-m-d');
    $query = "SELECT * FROM mst_promo WHERE status = '1' AND end_date >= '$current_date' AND start_date <= '$current_date'";
    $promo = mysqli_query($koneksi, $query);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Invoice</h1>
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
                <div class="container">
                <form class="form-horizontal" method="post" id="form">
                    <div class="form-group">
                        <label for="date" class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="created_by" name="created_by" placeholder="Created By" value="<?=$_SESSION['username']; ?>" required>
                            <input type="hidden" class="form-control" id="name_cashier" name="name_cashier" placeholder="Name Cashier" value="<?=$_SESSION['name']; ?>" required>
                            <input type="hidden" class="form-control" id="invoice_number" name="invoice_number" placeholder="Invoice Number" value="<?php echo "PCT".date('YmdHis'); ?>" required>
                            <input type="text" class="form-control datepickers" id="date" name="date" placeholder="Tanggal" value="<?=date('d-m-Y');?>" required autocomplete="off" pattern="[0-9-]+" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name_customer" class="col-sm-3 control-label">Nama Customer</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="name_customer" name="name_customer" placeholder="Nama Customer" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">No. Hp</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="No. Hp" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success pull-right add-package"><i class="fa fa-plus"></i> Paket</button>
                        </div>
                    </div>
                    <div id="box-package">
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success pull-right add-additional"><i class="fa fa-plus"></i> Tambahan</button>
                        </div>
                    </div>
                    <div id="box-additional">
                    </div>
                    <div class="form-group">
                        <label for="promo" class="col-sm-3 control-label">Promo</label>
                        <div class="col-sm-4">
                            <select name="promo" class="form-control select2" id="promo">
                                <option value="-" selected disabled>- PILIH PROMO -</option>
                                <?php
                                    if($promo != null) {
                                        while($option = mysqli_fetch_array($promo)) {
                                ?>
                                    <option value="<?=$option['id_promo']; ?>"><?=$option['name_promo']; ?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" id="discount" name="discount" placeholder="Potongan Harga (Rp)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="information" class="col-sm-3 control-label">Keterangan</label>
                        <div class="col-sm-7">
                            <textarea id="information" class="form-control" name="information" placeholder="Keterangan" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="button" id="save-button" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="total" class="col-sm-3 control-label">Total</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="total" id="total" value="0" placeholder="Total" readonly>
                        </div>
                        <div class="col-sm-1">
                            <button type="button" id="save-button" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div> -->
                    
                </form>
                </div>
            </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
    <!-- /.row -->

</section>
<!-- /.content -->