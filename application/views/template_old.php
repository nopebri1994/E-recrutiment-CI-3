
<!DOCTYPE html>
<html lang="en">

  <head>

    <title>Penerimaan Karyawan</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

   <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/media/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/media/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/DataTables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/DataTables/media/css/dataTables.bootstrap.css">
  <link href="<?php echo base_url()?>assets/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- Custom styles for this template -->
    <link href="navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="<?php echo base_url();?>assets/js/ie-emulation-modes-warning.js"></script>
 
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?> assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle info" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>home.html"><img src="<?php echo base_url();?>/assets/img/logo.png" width="30" height="30">Penerimaan Karyawan</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><?php echo anchor('pelamar','Data Pelamar');?></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo anchor('jabatan','Data jabatan');?></li>
                <li><?php echo anchor('Pendidikan','Data Pendidikan');?></li>
                <li><?php echo anchor('jurusan','Data Jurusan');?></li>
                <li><?php echo anchor('jadwal','Jadwal test');?></li>
                
              </ul>
              </li>
               <li class=" "> <?php echo anchor('proses','Proses Test');?></li>

                <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo anchor('transaksi','Data Peserta Tes');?></li>
                <li><?php echo anchor('transaksi/tidak_lulus','Data Peserta Tidak Lulus Kriteria');?></li>
                 <!-- <li><?php echo anchor('','Print Laporan');?></li> -->
               
               
                
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li class="acttive"><?php echo anchor('auth/logout','Logout');?></li></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

<!-- /container -->

      <div class="container">

        <?php echo $contents;?>

    </div> 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/DataTables/media/js/jquery.js');?>" type="text/javascript"></script>
  <script  src="<?php echo base_url('assets/DataTables/media/js/jquery.dataTables.js');?>" type="text/javascript"></script>
<script  src="<?php echo base_url()?>assets/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8" type="text/javascript"></script>
<script  src="<?php echo base_url()?>assets/datepicker/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8" type="text/javascript"></script>

  </body>
 <script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>
<script type="text/javascript">
 $('.datepicker').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
    });
</script> 
<script>
  $(document).ready (function(){
            $("#success-alert").hide(3000);
            $("#myWish").click(function showAlert() {
                $("#success-alert").alert();
                window.setTimeout(function () { 
                            $("#success-alert").alert('close'); });               
                  });       
                    });
</script>
</html>
  