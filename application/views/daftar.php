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
                            <li>Daftar</li>
                        </ul>
                    </nav>

                    <div class="page_title">
                        <h2>Mendaftar</h2>
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
                    <div class="sidebar">
                        <div class="widget_info">
                            <div class="dividerHeading">
                                <h4><span>Info Daftar</span></h4>
                            </div>
                            <p><i class="fa fa-angle-double-right"></i> Dengan mendaftar anda dapat menikmati fitur yang diberikan oleh kosGreen ,seperti pencarian kos memesan kos hingga membuka kos.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Harap isikan data anda dengan benar dan tak perlu takut karena privasi anda kami jamin keamanan nya.</p>
                            <br>
                             <p><i class="fa fa-angle-double-right"></i> Pengisian jenis kelamin anda harus sesuai dengan kartu identitas anda karena ini mengangkut syarat pemesanan kos nantinya.</p>
                             <br>
                            <p><i class="fa fa-angle-double-right"></i> Isilah nomor telepon yang selalu aktif digunakan karena kami akan memberi tahu anda melalui nomor telepon itu,dan jika anda membuka kos maka nomor telepon ini juga yang akan dihubungi oleh pengguna lain atau yang mencari kos.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Untuk pengisian username dan password harap diisi dengan huruf dan angka serta minimal 6 karakter agar pihak yang tidak diinginkan sulit dalam menebak password anda.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Atas kerjasamanya kami ucapkan terima kasih ,dan selamat bergabung dikosGreen.</p>
                            
                           

                        </div>
                    </div>
                </div>
            
               <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="dividerHeading">
                        <h4><span>Daftar</span></h4>
                    </div>

                    <?php echo $this->session->flashdata('pesan'); ?>

                    <form id="contactForm" action="<?php echo base_url()."index.php/kos/mendaftar"; ?>" method="post">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-lg-6 ">
                                    <input type="number" id="noktp" name="nktp" class="form-control" maxlength="100"  placeholder="No ktp / Sim anda" >
                                </div>
                                <div class="col-lg-6 ">
                                    <input type="text" id="nml" name="nml" class="form-control" maxlength="100" value="" placeholder="Nama lengkap" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="radio-inline">
                                    <input type="radio" name="jk" id="inlineRadio2" value="Pria"> Pria
                                    </label>
                                    <label class="radio-inline">
                                    <input type="radio" name="jk" id="inlineRadio3" value="Wanita"> Wanita
                                    </label>
                                </div>
                                <br>

                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" id="nohp" name="nohp" class="form-control" maxlength="100" placeholder="No Telepon">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="alm" class="form-control" name="alm" rows="10" cols="50" maxlength="5000" placeholder="Alamat lengkap"></textarea>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 ">
                                    <input type="text" id="user" name="user" class="form-control" maxlength="100" placeholder="Username" >
                                </div>
                                <div class="col-lg-6 ">
                                    <input type="password" id="pas" name="pas" class="form-control" maxlength="100" placeholder="Password" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Daftar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>