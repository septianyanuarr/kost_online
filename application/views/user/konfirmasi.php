  <div class="col-lg-12 col-md-12 col-sm-12">
                    
                 
                    <?php echo $this->session->flashdata('psn_konfr'); ?>

                    <form id="contactForm" action="<?php echo base_url()."index.php/user/metode_pembayaran"; ?>" method="post">
                   
                        <div class="row">
                            <div class="form-group">
                            <?php foreach ($psn as $ps) {
                               ?>
                            <input type="hidden" name="idp" class="form-control" value="<?php echo $ps->id_psn_ks_us; ?>">
                                <?php } ?>
                                <div class="col-lg-9">
                                 <p>Silahkan Pilih metode pembayaran yang akan anda lakukan untuk menyelesaikan pemesanan anda.</p>
                                <label for="exampleInputFile">Metode Pembayaran</label>
                                    
                                    <select class="form-control" name="mtp">
                                      <option value="1">Transfer ATM / Bank</option>
                                      <option value="2">Bayar Ditempat</option>
                                    </select>
                                </div>
                               
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-9 text-right">
                                <a href="<?php echo base_url('index.php/user/data_pesanan'); ?>" class="btn btn-default btn-md">Back</a>
                                <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-md" value="Next">
                            </div>
                        </div>
                    </form>
                </div>