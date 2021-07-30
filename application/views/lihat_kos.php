	<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav id="breadcrumbs">
                        <ul>
                            <li></li>
                            <li><a href="#">Home</a></li>
                            <li>Detail</li>
                        </ul>
                    </nav>

                    <div class="page_title">
                        <h2>Lihat kos</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

		<section class="content right_sidebar">
			<div class="container">
				<div class="row"> 
				<?php 
                   foreach ($kost as $kos ) { ?>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="blog_large">
							<article class="post">
								<figure class="post_img">
									
									<div id="slider" class="swipe">

										<ul class="swipe-wrap">
											<li><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $kos->ft_utm; ?>" alt="blog post"></li>
											<li><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $kos->ft_p1; ?>" alt="blog post"></li>
											<li><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $kos->ft_p2; ?>" alt="blog post"></li>
											
										</ul>
										<div class="swipe-navi">
										  <div class="swipe-left" onclick="mySwipe.prev()"><i class="fa fa-chevron-left"></i></div> 
										  <div class="swipe-right" onclick="mySwipe.next()"><i class="fa fa-chevron-right"></i></div>
										</div>
									</div>
								</figure>
								<p>Keterangan :</p>
										<blockquote class="default">
										<?php echo $kos->ket_ks; ?>
									</blockquote>
							</article>

						</div>

					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="post_content">
									<div class="post_meta">
									<?php echo $this->session->flashdata('pesan'); ?>
									<div class="col-md-6">
									Nama Kos :
										<h2><blockquote class="default">
											 <?php echo $kos->nm_kos_t; ?>
											 </blockquote>
										</h2>
										<hr>
									</div>
								
									<div class="col-md-6">
									<p>Harga :</p>
									<blockquote class="default">
										Rp <?php echo number_format($kos->hrg_ks,0,".","."); ?> / Bulan
										</blockquote>
										<hr>
										</div>
									<div class="col-md-12">
									<p>Kampus Terdekat Kos :</p>
										<blockquote class="default">
										<?php echo $kos->nm_kmps; ?>
									</blockquote>
										
									</div>
									<div class="col-md-6">
									
										<p>Fasilitas :</p>
										<blockquote class="default">
										<?php echo $kos->fas_lts; ?>
									</blockquote>
									<hr>
										
										<p>Pemilik / Pengelola :</p>
										<blockquote class="default">
										<?php echo $kos->nml_us; ?>
										</blockquote>
										<hr>
									</div>
										<div class="col-md-6">
										<p>Kategori :</p>
										<blockquote class="default">
										<?php echo $kos->ktg_r; ?>
										</blockquote>
										<hr>
										<p>No Telepon :</p>
										<blockquote class="default">
										<?php echo $kos->no_hp_us; ?>
										</blockquote>
										<hr>
									</div>
									<div class="col-md-12">
										<p>Alamat :</p>
										<blockquote class="default">
										<?php echo $kos->alm_ks; ?>
										</blockquote>
										<hr>
									
									</div>	
									<div class="col-md-12">
										<a href="<?php echo base_url()."index.php/kos/pesan_kos/".$kos->kd_kos_t; ?>" class="btn btn-primary btn-lg"><i class="fa fa-cart-plus"></i> Pesan</a>
									</div>
									<br>
									</div>
									</div>
					</div>
					<?php } ?>
				<!--start info service-->
<br>
        <section class="info_service">
            <div class="container">
                <div class="row sub_content">
                    <div class="col-lg-12 col-md-12 col-sm-12 wow fadeInDown">
                    <br>
                    <br>
                        <h1 class="intro text-center">Info ! Transaksi pemesanan</h1>
                    </div>
                    <div class="rs_box">
                        <div class="col-sm-4">
                            <div class="serviceBox_1">
                                <div class="service-icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Pembayaran</h3>
                                    <p>Lakukan transaksi pembayaran ke bank yang telah ditentukan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="serviceBox_1">
                                <div class="service-icon">
                                    <i class="fa fa-check-square-o"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Konfirmasi pembayaran</h3>
                                    <p>Lakukan konfirmasi pembayaran untuk menyelesikan pemesanan kos anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="serviceBox_1">
                                <div class="service-icon">
                                    <i class="fa fa-print"></i>
                                </div>
                                <div class="service-content">
                                    <h3>Cetak Bukti</h3>
                                    <p>Cetak bukti pemesanan anda dan selajutnya diserahkan kepada pemilik kos,untuk mendapatkan kos pesanan anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--end info service-->
				</div><!--/.row-->
			</div> <!--/.container-->
		</section>
	</section>
	<!--end wrapper-->