<div class="sidebar">
                        <div class="widget_info">
                            
                          <?php echo $this->session->flashdata('pesan'); ?>
                                 
                                <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Nama Pemesan</th>
                                <th>Jenis Kelamin</th>
                                 <th>Kode Kos pesanan</th>
                                <th>Kategori Kos</th>
                                <th>Harga</th>
                                <th>Tanggal Pesanan</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($pesan); ++$i) { ?>
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><?php echo $pesan[$i]->nml_us; ?></td>
                                <td><?php echo $pesan[$i]->je_kel_us; ?></td>
                                <td><?php echo $pesan[$i]->kd_kos_t; ?></td>
                                <td><?php echo $pesan[$i]->ktg_r; ?></td>
                                <td><?php echo $pesan[$i]->hrg_ks; ?></td>
                                <td><?php echo $pesan[$i]->tgl_psn; ?></td>
                                <td><?php echo $pesan[$i]->stt; ?></td>
                            </tr>
                           <?php } ?>
                            </tbody>
                        </table>
                      
                        </div>
                    </div>