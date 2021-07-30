<!DOCTYPE html>      
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/logo_atas.png"/>
    <title>Menu admin kosGreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/ionicons.min.css">
     <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/dist/css/skins/kos_awak.min.css">

    <script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
        
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">
          <div class="logo">
            
        </div>
      <header class="main-header">
        <!-- Logo -->
        <div class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="<?php echo base_url()."assets/"; ?>images/logo_mini.png" alt="" style="width: 40px;height: 40px;padding: 0px 0px 3px 0px;"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="<?php echo base_url()."assets/"; ?>images/logo.png" alt="" style="width: 110px;height: 45px;padding: 0px 0px 10px 0px;"></span>
        </div>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
     
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php foreach ($adm as $ad) {
                ?>
                  <img src="<?php echo base_url()."assets/"; ?>images/use_r/<?php echo $ad->ft_adm; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $ad->nm_ad_min; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url()."index.php/user/profil"; ?>"><i class="fa fa-user"></i> Profil</a></li>
                  <li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="margin-top: 60px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()."assets/"; ?>images/use_r/<?php echo $ad->ft_adm; ?>" class="img-rounded" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $ad->nm_ad_min; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <?php } ?>
         <br>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <li class="<?php if($this->uri->segment(2)=="rekening"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/rekening"; ?>"><i class="fa fa-bank"></i> <span>Rekening kos</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="pesan"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/pesan"; ?>"><i class="fa fa-comments-o"></i> <span>Pesan Masuk</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="cek_trans"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/cek_trans"; ?>"><i class="fa fa-money"></i> <span>Cek Transaksi</span><i class="fa fa-angle-left pull-right"></i></a></li>
             <li class="<?php if($this->uri->segment(2)=="kos_konfirm"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/kos_konfirm"; ?>"><i class="fa fa-check-square-o"></i> <span>Kos Belum Konfirmasi</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="index"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/index"; ?>"><i class="fa fa-home"></i> <span>Data Kos</span><i class="fa fa-angle-left pull-right"></i></a></li>
             <li class="<?php if($this->uri->segment(2)=="kampus"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/kampus"; ?>"><i class="fa fa-building-o"></i> <span>Data Kampus</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="data_pesanan"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/data_pesanan"; ?>"><i class="fa fa-shopping-cart"></i><span> Pesanan kos</span><i class="fa fa-angle-left pull-right"></i> </a></li>
            <li class="<?php if($this->uri->segment(2)=="data_trans"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/data_trans"; ?>"><i class="fa fa-money"></i> <span> Transaksi Kos</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="usr_kos"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/usr_kos"; ?>"><i class="fa fa-users"></i> <span> User Kos</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="pem_kos"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/pem_kos"; ?>"><i class="fa fa-user"></i> <span> Pemilik Kos</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="kontak"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/kontak"; ?>"><i class="fa fa-phone-square"></i> <span> Kontak</span><i class="fa fa-angle-left pull-right"></i></a></li>
            <li class="<?php if($this->uri->segment(2)=="slider"){ echo "active"; } ?>"><a href="<?php echo base_url(). "index.php/admin/slider"; ?>"><i class="fa fa-picture-o"></i> <span> Slider</span><i class="fa fa-angle-left pull-right"></i></a></li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(). "index.php/admin/index"; ?>"> Home</a></li>
            <li class="active">
            <?php
             if($this->uri->segment(2)=="index"){ echo "Data kos";
            }if($this->uri->segment(2)==""){ echo "Data kos"; 
            }if($this->uri->segment(2)=="tambah"){ echo "Tambah kos"; 
            }if($this->uri->segment(2)=="kampus"){ echo "Data kampus";   
            }if($this->uri->segment(2)=="kos_konfirm"){ echo "Kos Konfirmasi"; 
            }if($this->uri->segment(2)=="pesan"){ echo "Pesan Masuk"; 
            }if($this->uri->segment(2)=="cek_trans"){ echo "Cek Transaksi";
            }if($this->uri->segment(2)=="data_trans"){ echo "Transaksi Kos";
            }if($this->uri->segment(2)=="pem_kos"){ echo "Pemilik Kos";
            }if($this->uri->segment(2)=="kontak"){ echo "Kontak";
            }if($this->uri->segment(2)=="rekening"){ echo "Rekening";  
            }if($this->uri->segment(2)=="slider"){ echo "Slider";  
            }if($this->uri->segment(2)=="usr_kos"){ echo "User Kos";   
            }if($this->uri->segment(2)=="data_pesanan"){ echo "Pesanan Kos"; } ?></li>
          </ol>
        </section>
        <!-- isi data -->
         <?php echo $isi; ?> 
        <!-- end isi data-->

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        <strong>kosGreen &copy; <?php echo date('Y'); ?></strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
         
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
  
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets/"; ?>js/bootstrap.min.js"></script>
     <!-- DataTables -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Slimscroll -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/dist/js/app.min.js"></script>
   
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."assets/"; ?>plugins/dist/js/demo.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>