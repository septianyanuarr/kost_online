<div class="sidebar">
                        <div class="widget_info">
                           
                          <?php echo $this->session->flashdata('pesan'); ?>
                                 
                                <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                               <th>#</th>
                                <th>No Faktur</th>
                                <th>Nama pemesan</th>
                                <th>Kode Kos pesanan</th>
                                <th>Kategori Kos</th>
                                <th>Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Total Bayar</th>
                                <th>Tanggal Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($trans); ++$i) { ?>
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><?php echo $trans[$i]->no_fak_trans_us; ?></td>
                                <td><?php echo $trans[$i]->nml_us; ?></td>
                                <td><?php echo $trans[$i]->kd_kos_t; ?></td>
                                <td><?php echo $trans[$i]->ktg_r; ?></td>
                                <td><?php echo $trans[$i]->hrg_ks; ?></td>
                                <td><?php if($trans[$i]->metod_pemb=="1"){ echo 'Transfer ATM / Bank';}else{echo 'Bayar Ditempat';} ?></td>
                                <td><?php echo $trans[$i]->tot_bay; ?></td>
                                <td><?php echo $trans[$i]->tgl_trans_us; ?></td>
                                <td><?php if($trans[$i]->stt_t==""){ echo '<b>Waitting..<b>';}else{ echo $trans[$i]->stt_t; } ?></td>
                                
                                <td><?php if($trans[$i]->cek=='Ok'){ ?><a href="<?php echo base_url()."index.php/user/print_bukti_transaksi"; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Cetak"><i class="fa fa-print"></i></a> <?php }else{ echo '<b>Waitting..<b>';} ?></td>
                            </tr>
                           <?php } ?>
                            </tbody>
                        </table>
                      
                        </div>
                    </div>