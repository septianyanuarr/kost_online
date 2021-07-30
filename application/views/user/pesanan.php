<div class="sidebar">
                        <div class="widget_info">
                            
                          <?php echo $this->session->flashdata('pesan_pesanan'); ?>
                          <?php foreach ($pesanan as $pes) {

                            date_default_timezone_set("Asia/Jakarta");
                
                            $stt=$pes->stt;
                            $tgla=$pes->tgl_akhr;
                            $tgls=date('Y-m-d H:i:s');
                            $date1= new DateTime($tgla);
                            $date2= new DateTime($tgls);
                            $difference= $date1->diff($date2);
                            $lama=$difference->days +1;

                            if($lama=='7' and $stt=="Belum Konfirmasi"){
                                echo ' <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Peringatan! </strong>Batas waktu konfirmasi pesanan anda hanya 7 Hari ,Jika tidak ada konfirmasi lebih lanjut pesanan anda akan otomatis dibatalkan sistem.</div>';
                            }
                            if($lama < 7 and $stt=="Belum Konfirmasi"){
                                echo ' <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Peringatan! </strong>Batas waktu konfirmasi pesanan anda tinggal '.$lama.' Hari lagi ,Jika tidak ada konfirmasi lebih lanjut pesanan anda akan otomatis dibatalkan sistem.</div>';
                            }
                        }
                           ?>
                          
                         
                
                                 
                                <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>ID Pesanan</th>
                                <th>Nama kos</th>
                                <th>Kategori</th>
                                <th>Alamat</th>
                                <th>Harga</th>
                                <th>Tanggal Pesanan</th>
                                <th>Status</th>
                                <th colspan="2">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for ($i = 0; $i < count($pesanan); ++$i) { ?>
                            <tr>
                                <td><?php echo ($i+1); ?></td>
                                <td><?php echo $pesanan[$i]->id_psn_ks_us; ?></td>
                                <td><?php echo $pesanan[$i]->nm_kos_t; ?></td>
                                <td><?php echo $pesanan[$i]->ktg_r; ?></td>
                                <td><?php echo $pesanan[$i]->alm_ks; ?></td>
                                <td><?php echo $pesanan[$i]->hrg_ks; ?></td>
                                <td><?php echo $pesanan[$i]->tgl_psn; ?></td>
                                <td><?php echo $pesanan[$i]->stt; ?></td>
                                <?php if($pesanan[$i]->stt=='Belum Konfirmasi'){
                                    echo '<td><a href="'.base_url()."index.php/user/konfirmasi/".$pesanan[$i]->id_psn_ks_us.'" class="btn btn-info" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi"><i class="fa fa-check-square-o"></i></a></td>';
                                    echo '<td><a href="'.base_url()."index.php/user/batal_pesanan/".$pesanan[$i]->id_psn_ks_us.'" data-placement="bottom" data-toggle="tooltip" title="Batalkan" onclick="return confirm("Apakah Anda Yakin batalkan pesanan ini.?")" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>'; }else{ echo '<td></td><td></td>'; } ?>
                            </tr>
                           <?php } ?>
                            </tbody>
                        </table>
                      
                        </div>
                    </div>