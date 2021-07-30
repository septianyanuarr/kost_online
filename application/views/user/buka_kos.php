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
                            <li>Buka kos</li>
                        </ul>
                    </nav>

                    <div class="page_title">
                        <h2>Buka kos</h2>
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
                        <h4><span>Input data kos</span></h4>
                    </div>
                    <p>Silakan masukan data kos anda dengan lengkap agar orang yang membutuhkan mudah mencarinya.</p>

                       <?php echo $this->session->flashdata('pesan'); ?>

                      <form id="contactForm" action="<?php echo base_url()."index.php/user/daftarkan_kos"; ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-lg-6 ">
                                    <input type="text" id="nmk" name="nmk" class="form-control" maxlength="100" placeholder="Nama kos / nama pemilik" >
                                </div>
                                <div class="col-lg-6 ">
                                    <select class="form-control" name="ktk">
                                    <option>-Kategori-</option>
                                      <option>Pria</option>
                                      <option>Wanita</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-12">
                                    <input type="text" id="psk" name="psk" class="form-control" maxlength="100" placeholder="Fasilitas">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-6">
                                    <input type="number" min="1" max="3" name="jmk" class="form-control" placeholder="Jumlah kamar">
                                </div>
                                 <div class="col-md-6">
                                    <input type="number" min="50000" id="hrg" name="hrg" class="form-control" maxlength="100" placeholder="Harga / Bulan">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                <label for="exampleInputFile">Keterangan / peraturan :</label>
                                    <textarea id="ket" class="form-control ckeditor" name="ket" placeholder="Keterangan / Peraturan kos"></textarea>
                                </div>
                                
                            </div>
                        </div><br>
                         <div class="row">
                            <div class="form-group">
                               
                                <div class="col-lg-12">
                                
                                    <select class="form-control" name="id_kmp">
                                    <option value="0">-Kampus Terdekat Kos-</option>
                                    <?php foreach ($kampus as $kmp) {
                                         ?> 
                                      <option value="<?php echo $kmp->id_kmp; ?>"><?php echo $kmp->nm_kmps; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="alm" class="form-control" name="alm" rows="10" cols="50" maxlength="5000" placeholder="Alamat lengkap"></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-6">
                                    <label for="exampleInputFile">Foto Utama kos</label>
                                    <input name="fu" class="form-control" type="file" id="exampleInputFile">
                                 
                               
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputFile">Foto Pilihan 1</label>
                                    <input name="f1" class="form-control" type="file" id="exampleInputFile">
                                   
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="exampleInputFile">Foto Pilihan 2</label>
                                    <input name="f2" class="form-control" type="file" id="exampleInputFile">
                                   
                                </div>

                            </div>
                        </div>
                    <br>
                        <div class="row">
                            <div class="col-md-12 text-left">

                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Daftarkan">
                            </div>
                        </div>
                    </form>
                </div>
 <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="sidebar">
                        <div class="widget_info">
                            <div class="dividerHeading">
                                <h4><span>Info Membuka kos</span></h4>
                            </div>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Isikan nama kos atau nama pemilik dari kos agar pengguna yang lain mudah untuk mencarinya serta isikan kategori kos agar dapat membatasi user yang ingin memesan sesuai kategori saja yang dibolehkan.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Isikan Fasilitas yang disediakan oleh kos anda sehingga pengguna bisa mengetahui dan berminat untuk memesan kos anda.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Isikan jumlah kamar dan harga kos anda seperti diketahui harga ini menjadi prioritas pertama untuk pengguna mencarinya.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Isikan keterangan atau bisa juga peraturan yang ada dikos anda sehingga sebelum pengguna lain memesan dia sudah tau dengan peraturan atau keterangan dikos anda.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Pilihlah kampus terdekat dengan kos anda,biasanya pengguna menginginan kos yang terdekat dengan kampus atau tempat kerjanya.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Isilah alamat lengkap dari kos anda agar pengguna tau dan mudah untuk mencarinya.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Lengkapi kos anda dengan foto yang sebenarnya kami menyediakan 3 tempat untuk 3 foto kos anda diharapkan masing-masing foto dengan posisi yang berbeda.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Dengan mendaftar berarti anda sudah bersedia berkerja sama dengan kosGreen dan diharapkan nomor telepon anda selalu aktif untuk kami beritahu jika ada informasi yang harus kami beritahu kepada anda.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Pastikan data kos anda sesuai dengan yang diinginan kosGreen serta tidak melanggar undang-undang ,jika melanggar kos anda tidak akan kami proses atau tidak ditampilkan dimenu utama.</p>
                            <br>
                            <p><i class="fa fa-angle-double-right"></i> Terimakasih atas kerja sama nya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>