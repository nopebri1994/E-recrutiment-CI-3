<?php
if($this->session->userdata('id_login')=='')
{
    redirect('auth/login');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIS HC</title>
        <link rel="stylesheet" href="<?php echo base_url()?>assets/uadmin/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/uadmin/css/plugins.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/uadmin/css/main.css">
             <link rel="stylesheet" href="<?php echo base_url()?>assets/uadmin/css/themes.css">
        <script src="<?php echo base_url()?>assets/uadmin/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
           <script src="<?php echo base_url()?>assets/js/angular.min.js"></script>
        
              <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
          <link href="<?php echo base_url()?>assets/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  </head>
  
  <body>
      <!-- Navbars -->
                    

                    <!-- Inverse Navbar - You can replace 'navbar-inverse' with 'navbar-default' for a light navbar -->
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="fa fa-bars"></span>
                            </button>
                          
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                               <!-- <li class="active"><a href="javascript:void(0)"> <i class="fa fa-barcode"></i> Link</a></li>-->
                                <?php
                                $mainmenu=$this->db->get_where('mainmenu',array('aktif'=>'y','level'=>$this->session->userdata('level')))->result();
                                foreach ($mainmenu as $m)
                                {
                                    // chek sub menu
                                    $submenu=$this->db->get_where('submenu',array('id_mainmenu'=>$m->id_mainmenu,'aktif'=>'y'));
                                    if($submenu->num_rows()>0)
                                    {
                                        //looping
                                        echo "<li class='dropdown'>
                                    <a href='javascript:void(0)' class='dropdown-toggle' data-toggle='dropdown'> <i class='".$m->icon."'></i> ".  strtoupper($m->nama_mainmenu)." <b class='caret'></b></a>
                                    <ul class='dropdown-menu'>";
                                        foreach ($submenu->result() as $s)
                                        {
                                            echo "<li>".  anchor($s->link,  '<i class="'.$s->icon.'"></i> '.strtoupper($s->nama_submenu))."</li>";
                                        }
                                    echo"</ul>
                                </li>";
                                        // end looping
                                    }
                                    else
                                    {
                                        echo "<li>".  anchor($m->link,  '<i class="'.$m->icon.'"></i> '.strtoupper($m->nama_mainmenu))."</li>";
                                    }
                                }
                                ?>
                           
                            </ul>

                            <ul class="nav navbar-nav navbar-right">

                                <li class="dropdown">
                                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> <?php 
                                    echo strtoupper($this->session->userdata['nama'])?>
                                    </i> <?php echo strtoupper($this->session->userdata('username'));?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('users/profile',"<i class='fa fa-cogs'></i> Account");?></li>
                                        <li><?php echo anchor('auth/logout',"<i class='fa fa-sign-out'></i> Logout");?></li>
     
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!-- END Inverse Navbar -->
                    <!-- END Navbars -->

      <div class="container" style="background: white;">
      <!-- Example row of columns -->
      <div class="row">

        <div class="col-md-12">
            
            <?php echo $contents; ?>     
        </div>
      <hr>

      
    </div> 
      <div class="clear:both"></div>
      <hr>
      <p align='center' style="font-weight: bold;" >&copy; SIS HC V 0.1 | MIS Purwakarta 2017</p>
      <!--
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url()?>assets/uadmin/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script>!window.jQuery && document.write(unescape('%3Cscript src="js/vendor/jquery-1.11.0.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js -->
           <script src="<?php echo base_url()?>assets/uadmin/js/vendor/bootstrap.min.js"></script>

        <!-- Jquery plugins and custom javascript code -->
        <script src="<?php echo base_url()?>assets/uadmin/js/plugins.js"></script>
        <script src="<?php echo base_url()?>assets/uadmin/js/main.js"></script>
                <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/ui/jquery.ui.core.js"></script>
    <script src="<?php echo base_url();?>assets/ui/jquery.ui.widget.js"></script>
    <script src="<?php echo base_url();?>assets/ui/jquery.ui.datepicker.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/themes/base/jquery.ui.all.css">
        <script  src="<?php echo base_url()?>assets/datepicker/js/bootstrap-datetimepicker.js" charset="UTF-8" type="text/javascript"></script>
<script  src="<?php echo base_url()?>assets/datepicker/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8" type="text/javascript"></script>
    
        

        <!-- Javascript code only for this page -->
     
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
  </body>
</html>