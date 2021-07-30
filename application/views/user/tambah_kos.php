 <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="dividerHeading">
                        <h4><span>Input data kos <a href="<?php echo base_url()."index.php/user/kelola_kos"; ?>" class="btn btn-default">Kelola kos</a></span></h4>
                    </div>
                    <p>Silakan masukan data kos anda dengan lengkap agar orang yang membutuhkan mudah mencarinya.</p>

                      <form id="contactForm" action="<?php echo base_url()."index.php/user/simpan_kos"; ?>" method="post" enctype="multipart/form-data">
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
                                    <textarea id="ket" class="form-control ckeditor" name="ket" rows="10" cols="50" maxlength="5000" placeholder="Keterangan / Peraturan kos"></textarea>
                                </div>
                            </div>
                        </div>
                        <br>
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