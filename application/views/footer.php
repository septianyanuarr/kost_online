<footer class="footer">
    <div class="container">
        <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="widget_title">
                    <h4><span>Info kami</span></h4>
                </div>
                <div class="widget_content">
                    <p>Untuk informasi tentang kami lebih jelas silahkan anda hubungi kontak kami yang ada dibawah ini atau kunjungi alamat kami,Terimakasih.</p>
                    <?php foreach ($kontak as $kon) {
                            ?>
                    <ul class="contact-details-alt">
                        <li><i class="fa fa-map-marker"></i> <p><strong>Alamat</strong>: <?php echo $kon->alm_k; ?></li>
                        <li><i class="fa fa-user"></i> <p><strong>Telepon</strong>: <?php echo $kon->no_hp_k; ?></p></li>
                        <li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="#"><?php echo $kon->e_mail_k; ?></a></p></li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="widget_title">
                    <h4><span>Kos Terbaru</span></h4>
                </div>
                <div class="widget_content">
                    <ul class="links">
                    <?php foreach ($recent as $kos) { ?>
                       
                        <li><i class="fa fa-caret-right"></i> <a href="<?php echo base_url()."index.php/kos/lihat_kos/".$kos->kd_kos_t; ?>"><?php echo $kos->nm_kos_t; ?><span>Rp <?php echo number_format($kos->hrg_ks,0,".",".") ?></span></a></li>
                       <?php } ?>
                </div>
            </div>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="widget_title">
                    <h4><span>Kos Pria</span></h4>

                </div>
                <div class="widget_content">
                    <ul class="tweet_list">
                     <?php foreach ($kosl as $ksl) { ?>
                        <li class="tweet_content item">
                            <i class="fa fa-male"></i>
                            <p class="tweet_link"><a href="<?php echo base_url()."index.php/kos/lihat_kos/".$ksl->kd_kos_t; ?>">Kos Pria </a></p>
                            <span class="time"><?php echo $ksl->alm_ks; ?></span>
                        </li>
                       <?php } ?>
                    </ul>
                </div>
               
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="widget_title">
                    <h4><span>Kos Wanita</span></h4>

                </div>
                  <div class="widget_content">
                    <ul class="tweet_list">
                     <?php foreach ($kosp as $ksp) { ?>
                        <li class="tweet_content item">
                            <i class="fa fa-female"></i>
                            <p class="tweet_link"><a href="<?php echo base_url()."index.php/kos/lihat_kos/".$ksp->kd_kos_t; ?>">Kos Wanita </a></p>
                            <span class="time"><?php echo $ksp->alm_ks; ?></span>
                        </li>
                       <?php } ?>
                    </ul>
                </div>
               
            </div>
             
           
        </div>
    </div>
</footer>