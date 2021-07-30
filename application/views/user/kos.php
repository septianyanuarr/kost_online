
    <section class="team">
        <div class="container">
            <div class="row  sub_content">
           
         
            <div class="col-lg-6 col-md-6 col-sm-6">
            <p>
	
							<div class="widget widget_search">
								<div class="site-search-area">
									  <?php 
                                $attr = array("class" => "form-horizontal", "role" => "form", "id" => "site-searchform", "name" => "form1");
                                echo form_open("user/search", $attr);?>  
										<div>
											<input class="input-text" name="kata_pencarian" id="s" value="<?php echo set_value('kata_pencarian'); ?>" placeholder="Nama kos/Alamat kos/Nama kampus..." type="text" />
											<input id="searchsubmit" value="Cari" type="submit" />
										</div>
									<?php echo form_close(); ?>
								</div><!-- end site search -->
							
</div></p><br></div>
 <div class="col-lg-2 col-md-2 col-sm-2">
            <p>
                <ul class="nav navbar-nav">
                                <li class="kat"><a href="#" class="kat_a">Kategori Kos</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url()."index.php/user/populer"?>">Populer</a></li>
                                        <li><a href="<?php echo base_url()."index.php/user/new_kos"?>">Terbaru</a></li>
                                        <li><a href="<?php echo base_url()."index.php/user/kategori/Pria"?>">Kos Pria</a></li>
                                        <li><a href="<?php echo base_url()."index.php/user/kategori/Wanita"?>">Kos Wanita</a></li>
                                        <li><a href="<?php echo base_url()."index.php/user/index"?>">Semua Kos</a></li>
                                    </ul>
                                </li></ul></p>
            </div>
  
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="dividerHeading">
                        <h4><span></span></h4>
                    </div>
                </div>

                 <?php 
                 if(count($booklist)>0){
                    foreach ($booklist as $kos ) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="dreamz-team">
                        <div class="pic">
                        <?php
                            $tgl_kos=date('d',strtotime($kos->tgl_pst));
                            $tgl_skrg=date('d');
                               if($tgl_kos==$tgl_skrg){
                              echo'<div class="sale-box"><span class="on_sale title_shop">New</span></div>';
                              } 
                              ?>
                            <img src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $kos->ft_utm; ?>" alt="profile img">
                            <div class="social_media_team">
                                <ul class="team_social">
                                    <li><a href="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $kos->ft_utm; ?>" class="hover-zoom mfp-image" ><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="team_prof">
                            <h3 class="names">Kos <?php echo $kos->ktg_r; ?></h3>
                            <p class="description">Rp <?php echo number_format($kos->hrg_ks,0,".",".") ?>  / Bulan</p>
                           <center> <p class="detail"><a href="<?php echo base_url()."index.php/user/lihat_kos/".$kos->kd_kos_t; ?>" class="btn btn-default btn-lg">Detail</a></p></center>
                        </div>
                    </div>
                </div>

                <?php
            }
               }else{

                        echo'<div class="col-md-12"><div class="kosong"><center>Maaf !! Data tidak ditemukan.</center></div></div>';
                    }
                         ?>
                
            </div> 
            <?php echo $pagination; ?>
        </div>
    </section>