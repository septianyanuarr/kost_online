 <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="dividerHeading">
                        <h4><span>Edit data kos <a href="<?php echo base_url()."index.php/user/kelola_kos"; ?>" class="btn btn-default">Kelola kos</a></span></h4>
                    </div>
                    <p>Silakan masukan data kos anda dengan lengkap agar orang yang membutuhkan mudah mencarinya.</p>
                    <?php foreach ($e_kos as $ek) {
                     ?>
                      <form id="contactForm" action="<?php echo base_url()."index.php/user/simp_edit_kos"; ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                         <div class="form-group">
                                <div class="col-lg-12">
                                    <input type="hidden" id="kd" name="kd" class="form-control" maxlength="100" placeholder="Kode Kos" value="<?php echo $ek->kd_kos_t; ?>">
                                </div>
                                </div>
                            <div class="form-group">
                                <div class="col-lg-6 ">
                                    <input type="text" id="nmk" name="nmk" class="form-control" maxlength="100" placeholder="Nama kos / nama pemilik" value="<?php echo $ek->nm_kos_t; ?>">
                                </div>
                                <div class="col-lg-6 ">
                                    <select class="form-control" name="ktk">
                                    
                                      <option value="Pria" <?php if ($ek->ktg_r=='Pria') echo "selected"; else echo ""; ?>>Pria</option>
                                      <option value="Wanita" <?php if ($ek->ktg_r=='Wanita') echo "selected"; else echo ""; ?>>Wanita</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-12">
                                    <input type="text" id="psk" name="psk" class="form-control" maxlength="100" placeholder="Fasilitas" value="<?php echo $ek->fas_lts; ?>">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-6">
                                    <input type="number" min="1" max="3" name="jmk" class="form-control" placeholder="Jumlah kamar" value="<?php echo $ek->jml_kmr_ks; ?>">
                                </div>
                                 <div class="col-md-6">
                                    <input type="number" min="50000" id="hrg" name="hrg" class="form-control" maxlength="100" placeholder="Harga / Bulan" value="<?php echo $ek->hrg_ks; ?>">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                <label for="exampleInputFile">Keterangan / peraturan :</label>
                                    <textarea id="ket" class="form-control ckeditor" name="ket" rows="10" cols="50" maxlength="5000" placeholder="Keterangan / Peraturan kos"><?php echo $ek->ket_ks; ?></textarea>
                                   
                                </div>
                            </div>
                        </div>
                        <br>
                         <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-12">
                                <select class="form-control" name="id_kmp">
                                   <?php foreach ($kampus as $kmp) {
                                         ?> 
                                      <option value="<?php echo $kmp->id_kmp; ?>" <?php if ($kmp->id_kmp==$ek->id_kmp) echo "selected"; else echo ""; ?>><?php echo $kmp->nm_kmps; ?></option>
                                      <?php } ?>
                                      </select>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea id="alm" class="form-control" name="alm" rows="10" cols="50" maxlength="5000" placeholder="Alamat lengkap"><?php echo $ek->alm_ks; ?></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                               
                                <div class="col-md-6">
                                    <label for="exampleInputFile">Foto Utama kos</label>
                                    <p><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $ek->ft_utm; ?>" style="max-width:100px;max-height:100px;"></p>
                                    <input name="ful" class="form-control" type="hidden" id="exampleInputFile" value="<?php echo $ek->ft_utm; ?>">
                                    <input name="fu" class="form-control" type="file" id="exampleInputFile">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputFile">Foto Pilihan 1</label>
                                    <p><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $ek->ft_p1; ?>" style="max-width:100px;max-height:100px;"></p>
                                    <input name="f1l" class="form-control" type="hidden" id="exampleInputFile" value="<?php echo $ek->ft_p1; ?>">
                                   <input name="f1" class="form-control" type="file" id="exampleInputFile">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="exampleInputFile">Foto Pilihan 2</label>
                                    <p><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $ek->ft_p2; ?>" style="max-width:100px;max-height:100px;"></p>
                                    <input name="f2l" class="form-control" type="hidden" id="exampleInputFile" value="<?php echo $ek->ft_p2; ?>">
                                    <input name="f2" class="form-control" type="file" id="exampleInputFile">
                                </div>

                            </div>
                        </div>
                    <br>
                        <div class="row">
                            <div class="col-md-12 text-left">

                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Edit kos">
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
                