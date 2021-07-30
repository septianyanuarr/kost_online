  <div class="col-lg-12 col-md-12 col-sm-12">
                    
                 
                    <?php echo $this->session->flashdata('psn_konfr'); ?>

                    <?php foreach ($metod as $mt) {
                    }
                    if($mt->metod_pemb=="1"){

                        ?>

                    <form id="contactForm" action="<?php echo base_url()."index.php/user/trans_bank"; ?>" method="post" enctype="multipart/form-data">
                   
                        <div class="row">
                            <div class="form-group">
                            <?php foreach ($psn as $ps) {
                               ?>
                               
                            <input type="hidden" name="idp" class="form-control" value="<?php echo $ps->id_psn_ks_us; ?>">
                                <?php } ?>
                                <div class="col-lg-9">
                                 <p>Silahkan lakukan transaksi ke nomor rekening kosgreen yang ada dibawah dan lakukan pengisian data berdasarkan transaksi yang telah dilakukan.</p>
                                 <?php foreach ($rek as $rk) { ?>
                                <label for="exampleInputFile">Nomor Rekening kosgreen</label>
                                   <blockquote class="default"><h2><?php echo $rk->no_rek; ?></h2></blockquote>
                                  <?php } ?>
                                  <p></p>
                                  <?php foreach ($dtpem as $dt) { ?>
                                   <label for="exampleInputFile">Total yang harus dibayar</label>
                                   <blockquote class="default"><h3>Rp <?php echo number_format($dt->hrg_ks,0,".","."); ?></h3></blockquote>
                                   <?php } ?>
                                   <p></p>
                                    <label for="exampleInputFile">Nomor Rekening anda</label>
                                   <input type="number" name="norek" class="form-control" placeholder="Nomor Rekening">
                                   <p></p>
                                   <label for="exampleInputFile">Total bayar</label>
                                   <input type="number" name="totbay" class="form-control" placeholder="Total Bayar">
                                    <p></p>
                                   <label for="exampleInputFile">Bukti Pembayaran/Transfer</label>
                                   <input type="file" name="buktrans" class="form-control">
                                </div>
                               
                            </div>
                        </div>

                          <div class="row">
                            <div class="col-md-9 text-right">
                                <a href="<?php echo base_url()."index.php/user/konfirmasi/".$ps->id_psn_ks_us; ?>" class="btn btn-default btn-md">Back</a>
                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-md" value="Selesai">
                            </div>
                        </div>
                        </form>

                    <?php 
                    }else{ 
                        ?>

                        <form id="contactForm" action="<?php echo base_url()."index.php/user/trans_cod"; ?>" method="post">
                         <div class="row">
                            <div class="form-group">
                            <?php foreach ($psn as $ps) {
                               ?>
                            <input type="hidden" name="idp" class="form-control" value="<?php echo $ps->id_psn_ks_us; ?>">
                                <?php } ?>
                                <div class="col-lg-9">
                                 <p>Silahkan lakukan transaksi dengan pemilik kos agar bisa mendapatkan kos yang anda pesan dengan membawa bukti pemesanan dari kosGreen,untuk informasi lebih lanjut silahkan hubungi nomor telepon pemilik kos dibawah.<b>Terima Kasih</b>.</p>
                                <?php foreach ($dtpem as $dt) { ?>
                                  <label for="exampleInputFile">Nama Pemilik kos</label>
                                   <blockquote class="default"><h3><?php echo $dt->nml_us; ?></h3></blockquote>
                                <p></p>
                                  <label for="exampleInputFile">No Telepon Pemilik Kos</label>
                                   <blockquote class="default"><h2><?php echo $dt->no_hp_us; ?></h2></blockquote>
                                <p></p>
                                   <label for="exampleInputFile">Total yang harus dibayar</label>
                                   <blockquote class="default"><h4>Rp <?php echo number_format($dt->hrg_ks,0,".","."); ?></h4></blockquote>
                                   <?php } ?>
                                   
                                </div>
                               
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-9 text-right">
                                <a href="<?php echo base_url()."index.php/user/konfirmasi/".$ps->id_psn_ks_us; ?>" class="btn btn-default btn-md">Back</a>
                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-md" value="Selesai">
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>