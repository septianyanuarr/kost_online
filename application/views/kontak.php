<!--start wrapper-->
<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav id="breadcrumbs">
                        <ul>
                            <li></li>
                            <li><a href="<?php echo site_url('kos/index'); ?>">Home</a></li>
                            <li>Kontak</li>
                        </ul>
                    </nav>

                    <div class="page_title">
                        <h2>Kontak Kami</h2>
                        <!--<span class="sub_heading">We are here for you 24/7</span>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_2">
        
        <div class="container">
            <div class="row sub_content">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="dividerHeading">
                        <h4><span>Kirim pesan ke kami</span></h4>
                    </div>
                    <p>Silahan anda kirim pesan kepada kami jika anda ada saran atau pun keluhan!</p>

                 <?php echo $this->session->flashdata('pesan'); ?>

                    <form id="contactForm" action="<?php echo base_url()."index.php/kos/komentar"; ?>" method="post">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-lg-6 ">
                                    <input type="text" id="name" name="nama" class="form-control" maxlength="100" value="" placeholder="Nama anda" >
                                </div>
                                <div class="col-lg-6 ">
                                    <input type="email" id="email" name="email" class="form-control" maxlength="100" value="" placeholder="Email anda" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-12">
                                    <input type="text" id="subject" name="sub" class="form-control" maxlength="100" value="" placeholder="Subjek pesan">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="message" class="form-control" name="komen" rows="10" cols="50" maxlength="5000" placeholder="Pesan anda"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Kirim Pesan">
                            </div>
                        </div>
                    </form>
                </div>
<?php foreach ($kontak as $kon) {
                            ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="sidebar">
                        <div class="widget_info">
                            <div class="dividerHeading">
                                <h4><span>Kontak Info</span></h4>
                            </div>
                            <p>Untuk informasi tentang kami lebih jelas silahkan anda hubungi kontak kami yang ada dibawah ini atau kunjungi alamat kami,Terimakasih.</p>
                            
                            <ul class="widget_info_contact">

                                <li><i class="fa fa-map-marker"></i><strong>Alamat</strong> <p>: <?php echo $kon->alm_k; ?> </p> </li>
                                <li><i class="fa fa-envelope"></i><strong>Email</strong> <p>: <a href="#"><?php echo $kon->e_mail_k; ?></a></p></li>
                                <li><i class="fa fa-phone"></i><strong>Telepon</strong> <p>: <?php echo $kon->no_hp_k; ?></p></li>
                            </ul>

                        </div>

                        <div class="widget_social">
                            <ul class="widget_social">
                                <li><a class="fb" href="<?php echo $kon->fb_k; ?>" data-placement="bottom" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twtr" href="<?php echo $kon->twit_k; ?>" data-placement="bottom" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="gmail" href="<?php echo $kon->g_plus_k; ?>" data-placement="bottom" data-toggle="tooltip" title="Google"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="instagram" href="<?php echo $kon->instag_k ?>" data-placement="bottom" data-toggle="tooltip" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="youtube" href="<?php echo $kon->yt_k ?>" data-placement="bottom" data-toggle="tooltip" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>
</section>