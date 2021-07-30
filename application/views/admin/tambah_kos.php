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
                      <form id="contactForm" action="<?php echo base_url()."index.php/admin/simpan_kos"; ?>" method="post" enctype="multipart/form-data">
                      <div class="row">
                            <div class="form-group">
                               
                                      <div class="col-md-8">
                                    <select class="form-control" name="noktp">
                                    <option>-Nama Pemilik-</option>
                                    <?php foreach($data_us as $us){ ?>
                                      <option value="<?php echo $us->no_ktp_us; ?>"><?php echo $us->nml_us; ?></option>
                                      <?php } ?>
                                    </select>
                                </div>
                                </div>
                                <br>
                                <p>
                                  <div class="form-group">
                                <div class="col-md-4 ">
                                    <input type="text" id="nmk" name="nmk" class="form-control" maxlength="100" placeholder="Nama kos / nama pemilik" >
                                </div>
                                <div class="col-md-4 ">
                                    <select class="form-control" name="ktk">
                                    <option>-Kategori-</option>
                                      <option>Pria</option>
                                      <option>Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                               
                                <div class="col-md-8">
                                    <input type="text" id="psk" name="psk" class="form-control" maxlength="100" placeholder="Fasilitas">
                                </div>

                            </div>
                            <br>
                                <p>
                            <div class="form-group">
                               
                                <div class="col-md-4">
                                    <input type="number" min="1" max="3" name="jmk" class="form-control" placeholder="Jumlah kamar">
                                </div>
                                 <div class="col-md-4">
                                    <input type="number" min="50000" id="hrg" name="hrg" class="form-control" maxlength="100" placeholder="Harga / Bulan">
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="form-group">

                                <div class="col-md-8">
                                <label for="exampleInputFile">Keterangan / peraturan :</label>
                                    <textarea id="ket" class="form-control ckeditor" name="ket" rows="10" cols="50" maxlength="5000" placeholder="Keterangan / Peraturan kos"></textarea>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <br>
                             <div class="form-group">
                               
                                <div class="col-md-8">
                                   <select class="form-control" name="id_kmp">
                                    <option>-Kampus Terdekat Kos-</option>
                                     <?php foreach ($kampus as $kmp) {
                                         ?> 
                                      <option value="<?php echo $kmp->id_kmp; ?>"><?php echo $kmp->nm_kmps; ?></option>
                                      <?php } ?>
                                    </select>
                                <br>
                                </div>

                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-md-8">
                                    <textarea id="alm" class="form-control" name="alm" rows="10" cols="50" maxlength="5000" placeholder="Alamat lengkap"></textarea>
                                        <p>
                                </div>
                                <br>
                            </div>
                            
                            <div class="form-group">
                               
                                <div class="col-md-8">
                                <p>
                                    <label for="exampleInputFile">Foto Utama kos</label>
                                    <input name="fu" class="form-control" type="file" id="exampleInputFile">
                                 
                               
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="col-md-8">
                                <p>
                                    <label for="exampleInputFile">Foto Pilihan 1</label>
                                    <input name="f1" class="form-control" type="file" id="exampleInputFile">
                                   
                                </div>

                            </div>
                            <br>
                                <p>
                             <div class="form-group">
                                <div class="col-md-8">
                                <p>
                                    <label for="exampleInputFile">Foto Pilihan 2</label>
                                    <input name="f2" class="form-control" type="file" id="exampleInputFile">
                                   <p>
                                   <br><br>
                                </div>

                            </div>
                            <br>
                                <p>
                               <div class="col-md-12 text-left">

                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Daftarkan">
                            </div>
                            </div>
                        </div>
                      
                    </form>
                </div>


        </section><!-- /.content -->
         