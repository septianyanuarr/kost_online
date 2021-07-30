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
                            <li>Data pesanan</li>
                        </ul>
                    </nav>

                    <div class="page_title">
                        <h2>Data pesanan</h2>
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
                                    <li class="active"><a href="#Pesanan" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Data pesanan saya <span class="badge"><?php echo $j_pesanan; ?></span></a></li>
                                    <li class=""><a href="#Transaksi" data-toggle="tab"><i class="fa fa-money"></i> Data transaksi saya <span class="badge"><?php echo $j_trans; ?></span></a></li>
                                </ul>

                                <div class="tab-content clearfix">
                                    <div class="tab-pane fade active in" id="Pesanan">
                                     <?php echo $dt_psn; ?>
                                    </div>
                                    <div class="tab-pane fade" id="Transaksi">
                                       <?php echo $dt_trans; ?>
                                    </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>
</section>