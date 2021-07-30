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
                </div><!-- /.box-header -->
                <div class="box-body">
                     <?php echo $this->session->flashdata('pes_c_trans'); ?>
                  <table id="example1" class="table table-bordered table-striped">
                     
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nomor Faktur</th>
                        <th>ID Pesanan</th>
                        <th>Nomor Rekening</th>
                        <th>Bukti Transaksi</th>
                        <th>Total Bayar</th>
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $data[$i]->no_fak_trans_us; ?></td>
                        <td><?php echo $data[$i]->id_psn_ks_us; ?></td>
                        <td><?php echo $data[$i]->no_rek; ?></td>
                         <td><img class="img-thumbnail" style="max-height:70px;max-width:120px;min-height:70px;min-width:120px;" src="<?php echo base_url()."assets/"; ?>images/bukti_trans/<?php echo $data[$i]->bkti; ?>"></td>
                        <td><?php echo $data[$i]->tot_bay; ?></td>
                        <td><?php echo $data[$i]->tgl_trans_us; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/konfirm_trans/".$data[$i]->no_fak_trans_us; ?>" class="btn btn-info" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi"><i class="fa fa-check-circle-o"></i></a></p>
                                <p><a href="<?php echo base_url()."index.php/admin/batal_trans/".$data[$i]->no_fak_trans_us; ?>" data-placement="bottom" data-toggle="tooltip" title="Tidak Konfirmasi" onclick="return confirm('Apakah Anda Yakin batalkan konfirmasi data ini.?')" class="btn btn-warning"><i class="fa fa-times-circle-o"></i></a></p></td>
                        </td>
                       
                      </tr>
                    <?php } ?>
                    </tbody>
                    
                  </table>

                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
         