                    <div class="box-header">
                    <?php 
                        if(count($booklist) > 0){
                        ?>
                   <h3 class="box-title"><a href="<?php echo base_url()."index.php/user/tambah_kos"; ?>" class="btn btn-default"><i class="fa fa-plus"> Tambah</i></a>
                   <a href="<?php echo base_url()."index.php/user/tambah_kos"; ?>" class="btn btn-warning"><i class="fa fa-print"> Print</i></a></h3> 
                   <?php } ?>
                </div><!-- /.box-header -->
                                <table id="dt_kos" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Nama kos</th>
                                <th>Kategori</th>
                                <th>Fasilitas</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                                <th>Alamat</th>
                                <th>Jumlah kamar</th>
                                <th>Kampus terdekat</th>
                                <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($booklist); ++$i) { ?>
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><img class="img-thumbnail" style="max-height:70px;max-width:120px;min-height:70px;min-width:120px;" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $booklist[$i]->ft_utm; ?>"></td>
                                <td><?php echo $booklist[$i]->nm_kos_t; ?></td>
                                <td><?php echo $booklist[$i]->ktg_r; ?></td>
                                <td><?php echo $booklist[$i]->fas_lts; ?></td>
                                <td><?php echo $booklist[$i]->hrg_ks; ?></td>
                                <td><?php echo $booklist[$i]->ket_ks; ?></td>
                                <td><?php echo $booklist[$i]->alm_ks; ?></td>
                                <td><?php echo $booklist[$i]->jml_kmr_ks; ?></td>
                                <td><?php echo $booklist[$i]->nm_kmps; ?></td>
                                <td><p><a href="<?php echo base_url()."index.php/user/edit_kos/".$booklist[$i]->kd_kos_t ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></p>
                                <p><a href="<?php echo base_url()."index.php/user/del_kos_us/".$booklist[$i]->kd_kos_t ?>" data-placement="bottom" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah Anda Yakin hapus data ini.?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></p></td>
                            </tr>
                           <?php } ?>
                            </tbody>
                        </table>