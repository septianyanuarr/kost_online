<div class="sidebar">
                        <div class="widget_info">
                           
                          <?php echo $this->session->flashdata('pesan'); ?>
                         
                                <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>No Faktur</th>
                                <th>Nama kos</th>
                                <th>Alamat</th>
                                <th>Harga</th>
                                <th>Tanggal Pesanan</th>
                                 <th>Motode Pembayaran</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                                <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($transaksi); ++$i) { ?>
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><?php echo $transaksi[$i]->no_fak_trans_us; ?></td>
                                <td><?php echo $transaksi[$i]->nm_kos_t; ?></td>
                                <td><?php echo $transaksi[$i]->alm_ks; ?></td>
                                <td><?php echo $transaksi[$i]->hrg_ks; ?></td>
                                <td><?php echo $transaksi[$i]->tgl_psn; ?></td>
                                <td><?php if($transaksi[$i]->metod_pemb=="1"){ echo 'Transfer ATM / Bank';}else{echo 'Bayar Ditempat';} ?></td>
                                <td><?php echo $transaksi[$i]->tgl_trans_us; ?></td>
                                <td><?php echo $transaksi[$i]->tot_bay; ?></td>
                                <td><?php if($transaksi[$i]->stt_t==""){ echo "<b>Waiting....</b>";}else{ echo $transaksi[$i]->stt_t;} ?></td>
                                <td>
                                <?php if($transaksi[$i]->cek=="Ok"){ ?>
                                <a href="<?php echo base_url()."index.php/user/print_bukti_transaksi"; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Cetak"><i class="fa fa-print"></i></a>
                                <?php }else{
                                    echo "<b>Waiting....</b>";
                                }
                                ?>
                                </td>
                            </tr>
                           <?php } ?>
                            </tbody>
                        </table>
                      
                        </div>
                    </div>