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
                            <li>Profil</li>
                        </ul>
                    </nav>

                    <div class="page_title">
                        <h2>Biodata</h2>
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
                    <div class="dividerHeading">
                        <h4><span>Biodata anda</span></h4>
                    </div>
                  
                    <?php echo $this->session->flashdata('pesan'); ?>
                   

                    <?php foreach ($user as $us) {
                            ?>
                    <form id="contactForm" action="<?php echo base_url()."index.php/user/edit_profil"; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                            <div class="form-group">

                                <div class="col-lg-3 col-md-3 col-xs-5">
                                <label for="exampleInputFile">Foto anda</label>
                                    <img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/use_r/<?php if($us->ft_us==""){ echo 'default.png'; }else { echo $us->ft_us;} ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8">
                                <br>
                                    <input type="text" id="noktp" name="noktp" class="form-control" maxlength="100" value="<?php echo $us->no_ktp_us; ?>"  placeholder="No ktp / Sim anda" readonly>
                                </div>
                                <div class="col-md-8">
                                <label for="exampleInputFile">Nama lengkap</label>
                                    <input type="text" id="nml" name="nml" class="form-control" maxlength="100" value="<?php echo $us->nml_us; ?>" placeholder="Nama lengkap" >
                                </div>
                                <div class="col-md-5">
                                
                                    <label class="radio-inline">
                                    <input type="radio" name="jk" id="inlineRadio2" value="Pria" <?php if($us->je_kel_us=='Pria'){ echo 'checked';} ?>> Pria
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="jk" id="inlineRadio3" value="Wanita" <?php if($us->je_kel_us=='Wanita'){ echo 'checked';} ?>> Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-5">

                                 <input type="hidden" name="ft_lama" class="form-control" value="<?php echo $us->ft_us; ?>">
                                 <label for="exampleInputFile">Ganti Foto</label>
                                    <input type="file" name="ftu" class="form-control">
                                </div>
                                <div class="col-md-6">
                                <label for="exampleInputFile">No Handphone</label>
                                    <input type="text" id="nohp" name="nohp" class="form-control" maxlength="100" value="<?php echo $us->no_hp_us; ?>" placeholder="No Telepon">
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-5">
                                <label for="exampleInputFile">Alamat</label>
                                    <textarea id="alm" class="form-control" name="alm" rows="10" cols="50" maxlength="5000" placeholder="Alamat lengkap"><?php echo $us->alm_us; ?></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 ">
                                <label for="exampleInputFile">Username</label>
                                    <input type="text" id="user" name="user" class="form-control" maxlength="100" placeholder="Username" value="<?php echo $us->ua_ks_user; ?>">
                                </div>
                                <div class="col-md-6 ">
                                <label for="exampleInputFile">Password</label>
                                   
                                    <input type="password" name="pas" class="form-control" maxlength="100" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-md-5">
                                <label for="exampleInputFile">Konfirmasi password</label>
                                    <input type="password" name="cpas" class="form-control" maxlength="100" placeholder="Konfirmasi Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Simpan">
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</section>