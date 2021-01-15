<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Profile</h1>
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
            Username : <?php echo $_SESSION['username'] ?>
            <hr>
            Nama : <?php echo $_SESSION['name'] ?>
            <hr>
            Jabatan : <?php
                if($_SESSION['role'] == 1) {
                    echo "Administrator";
                } else if($_SESSION['role'] == 2) {
                    echo "Kasir";
                }
            ?>

        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.col (left) -->
    
    <!-- /.col (right) -->
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->