 <!DOCTYPE html>
 <?php echo $this->session->flashdata('gagal_login'); ?>
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
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.css">

    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/fractionslider.css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style-fraction.css"/>
    <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/animate.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="<?php echo base_url()."assets/layout/wide.css"; ?>" data-name="layout">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/"; ?>css/switcher.css" media="screen" />
    
   
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
                                    <li class="<?php if($this->uri->segment(2)=="index"){ echo "active"; } ?>"><a href="<?php echo site_url('kos/index'); ?>"> Home</a></li>

                                   

                                    <li class="<?php if($this->uri->segment(2)=="kontak"){ echo "active"; } ?>"><a href="<?php echo site_url('kos/kontak'); ?>"> Kontak</a></li>


                                    <li class="<?php if($this->uri->segment(2)=="daftar"){ echo "active"; } ?>"><a href="<?php echo site_url('kos/daftar'); ?>"> Daftar</a></li>
                                    <li><a href="#modal-index" data-toggle="modal" data-target="#modal-index" id="0" class="login">Login</a></li>
                                </ul>
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
  <div class="container">
                  <div class="modal fade" id="modal-index" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content modal-login">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel" style="color: #1abc9c;">Login</h4>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url(). "index.php/login/aksi_login"; ?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="user" class="form-control" id="exampleInputEmail1" placeholder="Username">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="pas" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              </div>

                                </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default btn-lg btn-login" id="login" data-loading-text="Loading...">Login</button>
                              </form>
                        </div> 
                    </div>
                </div>
            </div>
                    </div>
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