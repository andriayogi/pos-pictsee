<?php 
    session_start();
    error_reporting(1);
    if(empty($_SESSION)) {
        header("Location: ../index.php");
    }

    include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIM Aset |
      <?php
        $page = (isset($_GET['page'])) ? $_GET['page'] : "main";
        switch ($page) {
            case 'home':
                echo "Home";
                break;
            case 'profile':
                echo "Profile";
                break;
            case 'package':
                echo "Master Paket";
                break;
            case 'user':
                echo "Master User";
                break;
            case 'role':
                echo "Master Role";
                break;
            case 'invoice':
                echo "Invoice";
                break;
            case 'transaction':
                echo "Data Transaksi";
                break;
            case 'report_transaction':
                echo "Report Transaksi";
                break;
            default: 
                echo 'Home';
                break;
        }
      ?>

  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../assets/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  <script type="text/javascript">
    window.onload = function () {
      var table = document.getElementById('reportTable'),
      download = document.getElementById('download');

      download.addEventListener('click', function () {
        window.open('data:application/vnd.ms-excel,' + encodeURIComponent(table.outerHTML));
      });
    }
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/backend_pictsee/views/media.php?page=home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../assets/img/logo white.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../assets/img/logo white long.png"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../assets/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['name'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <?=$_SESSION['name'];?>
                  <small>
                    <?php
                      if($_SESSION['role'] == 1) {
                        echo "Administrator";
                      } else if($_SESSION['role'] == 2) {
                        echo "Kasir";
                      }
                    ?>
                  </small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/backend_pictsee/views/media.php?page=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <?php if($_SESSION['role'] == 1) { ?>
            <li <?php if($_GET['page'] == 'home') {echo "class='active'";} ?>>
                <a href="http://localhost/backend_pictsee/views/media.php?page=home"><i class="fa fa-home"></i> <span>Home</span></a>
            </li>
            <li <?php if($_GET['page'] == 'invoice') {echo "class='active'";} ?>>
                <a href="http://localhost/backend_pictsee/views/media.php?page=invoice"><i class="fa fa-ticket"></i> <span>Invoice</span></a>
            </li>
            <li <?php if($_GET['page'] == 'package' || $_GET['page'] == 'user' || $_GET['page'] == 'role') { echo "class='treeview active'"; } else { echo "class='treeview'"; } ?>>
              <a href="#">
                <i class="fa fa-edit"></i> <span>Master Data</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li <?php if($_GET['page'] == 'package') { echo "class='active'"; } ?>>
                  <a href="http://localhost/backend_pictsee/views/media.php?page=package">
                  <i class="fa fa-cube"></i> Master Paket</a>
                </li>
                <li <?php if($_GET['page'] == 'user') { echo "class='active'"; } ?>>
                  <a href="http://localhost/backend_pictsee/views/media.php?page=user">
                  <i class="fa fa-users"></i> Master User</a>
                </li>
                <li <?php if($_GET['page'] == 'role') { echo "class='active'"; } ?>>
                  <a href="http://localhost/backend_pictsee/views/media.php?page=role">
                  <i class="fa fa-user-md"></i> Master Role</a>
                </li>
              </ul>
            </li>
            <!-- <li <?php if($_GET['page'] == 'transaction') {echo "class='active'";} ?>>
                <a href="http://localhost/backend_pictsee/views/media.php?page=transaction"><i class="fa fa-money"></i> <span>Data Transaksi</span></a>
            </li> -->
            <li <?php if($_GET['page'] == 'report_transaction') {echo "class='active'";} ?>>
                <a href="http://localhost/backend_pictsee/views/media.php?page=report_transaction"><i class="fa fa-book"></i> <span>Report Transaksi</span></a>
            </li>
        <?php } else if($_SESSION['role'] == 2) { ?>
            <li <?php if($_GET['page'] == 'home') {echo "class='active'";} ?>>
                <a href="http://localhost/backend_pictsee/views/media.php?page=home"><i class="fa fa-home"></i> <span>Home</span></a>
            </li>
            <li <?php if($_GET['page'] == 'invoice') {echo "class='active'";} ?>>
                <a href="http://localhost/backend_pictsee/views/media.php?page=invoice"><i class="fa fa-ticket"></i> <span>Invoice</span></a>
            </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    <!-- BEGIN MAIN CONTENT -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <?php 
        $page = (isset($_GET['page']))? $_GET['page'] : "home";
        switch ($page) {
            // HOME
            case 'home':
                include "home.php";
                break;
            // PROFILE
            case 'profile':
                include "profile.php";
                break;
            // PACKAGE
            case 'package':
                include "package/show_package.php";
                break;
            case 'delete_package':
                include "package/delete_package.php";
                break;
            // USER
            case 'user':
                include "user/show_user.php";
                break;
            case 'delete_user':
                include "user/delete_user.php";
                break;
            // ROLE
            case 'role':
                include "role/show_role.php";
                break;
            case 'delete_role':
                include "role/delete_role.php";
                break;
            // INVOICE
            case 'invoice':
                include "transaction/invoice.php";
                break;
            // TRANSACTION
            case 'transaction':
                include "transaction/main.php";
                break;
            // REPORT TRANSACTION
            case 'report_transaction':
                include "report/report_transaction.php";
                break;
            // DEFAULT
            default:
                include 'home.php';
                break;
        }
    ?>
    </div>
    <!-- END MAIN CONTENT -->
  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer> -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery Update -->
<script src="../assets/jquery-3.5.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    $('#datepicker2').datepicker({
      autoclose: true
    })

    $('.datepickertahun').datepicker({
      autoclose: true,
      format: 'yyyy'
    })

    $('.datepickers').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    })

    // $('#date').datepicker().datepicker('setDate',new Date());​

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
    
    //DataTable
    $('.datatable').DataTable();
    $('#example1').DataTable();
    $('#reportTable').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  })
</script>

<!-- Invoice JS -->
<script src="../assets/invoice.js"></script>

</body>
</html>
