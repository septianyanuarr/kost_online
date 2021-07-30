<!--start wrapper-->
<section class="wrapper">
    <section class="page_head">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <nav id="breadcrumbs">
                        <ul>
                            <li></li>
                            <li><a href="<?php echo site_url('user/index'); ?>">Home</a></li>
                            <li>Data Kos</li>
                        </ul>
                    </nav>

                    <div class="page_title">
                        <h2>Kelola kos</h2>
                        <!--<span class="sub_heading">We are here for you 24/7</span>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_2">
        
        <div class="container">
            <div class="row sub_content">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    
                      <div class="velocity-tab sidebar-tab">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#Data" data-toggle="tab"><i class="fa fa-list-alt"></i> Data kos</a></li>
                                    <li class=""><a href="#Pesanan" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Pesanan kos <span class="badge"><?php echo $j_psn_ks; ?></span></a></li>
                                    <li class=""><a href="#Transaksi" data-toggle="tab"><i class="fa fa-money"></i> Transaksi Kos <span class="badge"><?php echo $j_tran_ks; ?></span></a></li>
                                    
                                </ul>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane fade active in" id="Data">
                                    <?php echo $this->session->flashdata('pes_dt_us'); ?>
                                        <?php echo $data; ?>
                                    </div>
                                    <div class="tab-pane fade" id="Pesanan">
                                     <?php echo $pesan; ?>
                                    </div>
                                    <div class="tab-pane fade" id="Transaksi">
                                       <?php echo $trans; ?>
                                    </div>
                                    
                                </div>
                            </div>
                   
                </div>

            </div>
        </div>
    </section>
</section>