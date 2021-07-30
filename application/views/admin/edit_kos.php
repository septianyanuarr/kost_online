<!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            
          
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                   
                  <span><a href="<?php echo base_url()."index.php/admin/index"; ?>" class="btn btn-default"><i class="fa fa-table"></i> Data kos</a></span>
                </div><!-- /.box-header -->
                <div class="box-body">
                 <?php echo $this->session->flashdata('pes_form_adm'); ?>
                  <?php foreach ($e_kos as $ek) {
                     ?>
                      <form id="contactForm" action="<?php echo base_url()."index.php/admin/simp_edit_kos"; ?>" method="post" enctype="multipart/form-data">
                      <div class="row">
                            <div class="form-group">
                             
                                    <input type="hidden" id="kd" name="kd" class="form-control" maxlength="100" placeholder="Kode Kos" value="<?php echo $ek->kd_kos_t; ?>">
                               
                                      <div class="col-md-8">
                                    <select class="form-control" name="noktp">
                                  
                                    <?php foreach($data_us as $us){ ?>
                                      <option value="<?php echo $us->no_ktp_us; ?>" <?php if ($us->no_ktp_us==$ek->no_ktp_us) echo "selected"; else echo ""; ?>><?php echo $us->nml_us; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                </div>
                                <br>
                                <p>
                                  <div class="form-group">
                                <div class="col-md-4 ">
                                    <input type="text" id="nmk" name="nmk" class="form-control" maxlength="100" placeholder="Nama kos / nama pemilik" value="<?php echo $ek->nm_kos_t; ?>">
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" name="ktk">
                                    <option>-Kategori-</option>
                                       <option value="Pria" <?php if ($ek->ktg_r=='Pria') echo "selected"; else echo ""; ?>>Pria</option>
                                      <option value="Wanita" <?php if ($ek->ktg_r=='Wanita') echo "selected"; else echo ""; ?>>Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                               
                                <div class="col-md-8">
                                    <input type="text" id="psk" name="psk" class="form-control" maxlength="100" placeholder="Fasilitas" value="<?php echo $ek->fas_lts; ?>">
                                </div>

                            </div>
                            <br>
                                <p>
                            <div class="form-group">
                               
                                <div class="col-md-4">
                                    <input type="number" min="1" max="3" name="jmk" class="form-control" placeholder="Jumlah kamar" value="<?php echo $ek->jml_kmr_ks; ?>">
                                </div>
                                 <div class="col-md-4">
                                    <input type="number" min="50000" id="hrg" name="hrg" class="form-control" maxlength="100" placeholder="Harga / Bulan" value="<?php echo $ek->hrg_ks; ?>">
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="form-group">

                                <div class="col-md-8">
                                <label for="exampleInputFile">Keterangan / peraturan :</label>
                                    <textarea id="ket" class="form-control ckeditor" name="ket" rows="10" cols="50" maxlength="5000" placeholder="Keterangan / Peraturan kos"><?php echo $ek->ket_ks; ?></textarea>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <br>
                             <div class="form-group">
                               
                                <div class="col-md-8">
                                     <select class="form-control" name="id_kmp">
                                   <?php foreach ($kampus as $kmp) {
                                         ?> 
                                      <option value="<?php echo $kmp->id_kmp; ?>" <?php if ($kmp->id_kmp==$ek->id_kmp) echo "selected"; else echo ""; ?>><?php echo $kmp->nm_kmps; ?></option>
                                      <?php } ?>
                                      </select>
                                <br>
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="form-group">

                                <div class="col-md-8">
                                    <textarea id="alm" class="form-control" name="alm" rows="10" cols="50" maxlength="5000" placeholder="Alamat lengkap"><?php echo $ek->alm_ks; ?></textarea>
                                        <p>
                                </div>
                                <br>
                            </div>
                            
                            <div class="form-group">
                               
                                <div class="col-md-8">
                                <p>
                                  <label for="exampleInputFile">Foto Utama</label>
                                    <p><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $ek->ft_utm; ?>" style="max-width:100px;max-height:100px;"></p>
                                    <input name="ful" class="form-control" type="hidden" id="exampleInputFile" value="<?php echo $ek->ft_utm; ?>">
                                    <input name="fu" class="form-control" type="file" id="exampleInputFile">
                                    <p>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-md-8">
                                <p>
                                   <label for="exampleInputFile">Foto Pilihan 1</label>
                                    <p><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $ek->ft_p1; ?>" style="max-width:100px;max-height:100px;"></p>
                                    <input name="f1l" class="form-control" type="hidden" id="exampleInputFile" value="<?php echo $ek->ft_p1; ?>">
                                   <input name="f1" class="form-control" type="file" id="exampleInputFile">
                                   <p>
                                </div>

                            </div>
                            <br>
                                <p>
                             <div class="form-group">
                                <div class="col-md-8">
                                <p>
                                    <label for="exampleInputFile">Foto Pilihan 2</label>
                                    <p><img class="img-thumbnail" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $ek->ft_p2; ?>" style="max-width:100px;max-height:100px;"></p>
                                    <input name="f2l" class="form-control" type="hidden" id="exampleInputFile" value="<?php echo $ek->ft_p2; ?>">
                                    <input name="f2" class="form-control" type="file" id="exampleInputFile">
                                   <p>
                                   <br><br>
                                </div>

                            </div>
                            <br>
                                <p>
                               <div class="col-md-12 text-left">

                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Edit kos">
                            </div>
                            </div>
                        </div>
                      
                    </form>
                    <?php } ?>
                </div>


        </section><!-- /.content -->
         