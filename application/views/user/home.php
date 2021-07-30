 <!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>images/logo_atas.png"/>
    <title>Selamat datang di kosGreen</title>
    <meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.css">

    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/fractionslider.css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style-fraction.css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/animate.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="<?php echo base_url()."assets/layout/wide.css"; ?>" data-name="layout">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/switcher.css" media="screen" />
    <script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
    
   
</head>
<body>
<!--Start Header-->
<header id="header">
    <!-- Start info-bar -->
    <div id="info-bar">
        <div class="container">
            <div class="row">
            <?php foreach ($kontak as $kon) {
                            ?>
                <div class="col-sm-8 top-info hidden-xs">
                    <span><i class="fa fa-phone"></i>Phone: <?php echo $kon->no_hp_k; ?></span>
                    <span><i class="fa fa-envelope"></i>Email: <?php echo $kon->e_mail_k; ?></span>
                </div>
                <div class="col-sm-4 top-info hidden-xs">
                    <ul>
                        <li><a href="<?php echo $kon->twit_k; ?>" class="my-tweet"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo $kon->fb_k; ?>" class="my-facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $kon->g_plus_k; ?>" class="my-google"><i class="fa fa-google-plus"></i></a></li>
                    </ul>

                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--/#info-bar -->

    <div id="logo-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <div id="logo">
                        <h1><img src="<?php echo base_url()."assets/"; ?>images/logokos.png"/></h1>
                    </div>
                </div>

                <div class="col-lg-9 col-sm-9">
                        <div class="navbar navbar-default navbar-static-top" role="navigation">
                            <!--  <div class="container">-->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li class="<?php if($this->uri->segment(2)=="index"){ echo "active"; } ?>"><a href="<?php echo site_url('user/index'); ?>"> Home</a></li>

                                   

                                    <li class="<?php if($this->uri->segment(2)=="kontak"){ echo "active"; } ?>"><a href="<?php echo site_url('user/kontak'); ?>"> Kontak</a></li>
                                    <?php
                                    
                                    if($this->session->userdata('lev')==3){
                                    echo'<li class="#"><a href="'.site_url('user/buka_kos').'"><i class="fa fa-plus-square"></i> Buka Kos</a></li>';
                                }
                                   ?>
                                      <li class="dropdown profil">
                                     
                                    <a href="#" class="dropdown-toggle a-profil" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php foreach ($user as $us) { ?>
                                    <img class="img-profil" src="<?php echo base_url()."assets/"; ?>images/use_r/<?php if($us->ft_us==""){ echo 'default.png'; }else { echo $us->ft_us;} ?>"/>
                                      <span><?php echo $us->nml_us; ?></span></a>
                                      <?php } ?>
                                          <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url()."index.php/user/profil"; ?>"><i class="fa fa-user"></i> Profil</a></li>
                                            <li><a href="<?php echo base_url()."index.php/user/data_pesanan"; ?>"><i class="fa fa-shopping-cart"></i> Pesanan Saya</a></li>
                                            <li><a href="<?php echo base_url()."index.php/user/kelola_kos"; ?>"><i class="fa fa-list-alt"></i> Kelola kos</a></li>
                                            <li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                          </ul>
                                        </li>
                                      
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                   </div>
            </div>
            </div>
        </div>
        <!--/.container -->
    </div>
    <!--/#logo-bar -->
</header>
<!--End Header-->

<!--start wrapper-->
<section class="wrapper">
<!-- slider -->
<?php echo $slider; ?>    
<!--End Slider-->
<!-- kos -->
<?php echo $kos; ?>
<!-- end kos-->
</section>

<!--start footer-->
<?php echo $footer; ?>
<!--end footer-->

<section class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="copyright">&copy; Copyright <?php echo date('Y'); ?> kosGreen</a></p>
            </div>

            <div class="col-sm-6 ">
                <div class="footer_social">
                <?php foreach ($kontak as $kon) {
                            ?>
                    <ul class="footbot_social">
                        <li><a class="fb" href="<?php echo $kon->fb_k; ?>" data-placement="top" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twtr" href="<?php echo $kon->twit_k; ?>" data-placement="top" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="gmail" href="<?php echo $kon->g_plus_k; ?>" data-placement="top" data-toggle="tooltip" title="Google"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="instagram" href="<?php echo $kon->instag_k ?>" data-placement="top" data-toggle="tooltip" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="youtube" href="<?php echo $kon->yt_k ?>" data-placement="top" data-toggle="tooltip" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery.cookie.js"></script> <!-- jQuery cookie -->
<script src="<?php echo base_url()."assets/"; ?>js/jquery.fractionslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery.smartmenus.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery.smartmenus.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jflickrfeed.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/swipe.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/jquery-scrolltofixed-min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>js/main.js"></script>
<script type="text/javascript">
    $(function(){
        $("#dt_kos").dataTable();
    });
</script>

<!-- Start Style Switcher -->
<div class="switcher"></div>
<!-- End Style Switcher -->
<script>
    $(window).load(function(){
        $('.slider').fractionSlider({
            'fullWidth': 			true,
            'controls': 			true,
            'responsive': 			true,
            'dimensions': 			"1920,450",
            'timeout' :             5000,
            'increase': 			true,
            'pauseOnHover': 		true,
            'slideEndAnimation': 	false,
            'autoChange':           true
        });
    });
</script>

    <!-- WARNING: Wow.js doesn't work in IE 9 or less -->
    <!--[if gte IE 9 | !IE ]><!-->
        <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>js/wow.min.js"></script>
        <script>
            // WOW Animation
            new WOW().init();
        </script>
    <![endif]-->

</body>
</html>