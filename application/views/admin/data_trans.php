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
            <span><a href="<?php echo base_url()."index.php/admin/cetak_data_kos"; ?>" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a></span>
                </div><!-- /.box-header -->
                <div class="box-body">
                     <?php echo $this->session->flashdata('pes_kos_adm'); ?>
                  <table id="example1" class="table table-bordered table-striped">
                     
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nomor Faktur</th>
                        <th>ID Pesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Nomor Rekening</th>
                        <th>Bukti Transaksi</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
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
                        <td><?php echo $data[$i]->nml_us; ?></td>
                        <td><?php echo $data[$i]->no_rek; ?></td>
                        <td><img class="img-thumbnail" style="max-height:70px;max-width:120px;min-height:70px;min-width:120px;" src="<?php echo base_url()."assets/"; ?>images/bukti_trans/<?php echo $data[$i]->bkti; ?>"></td>
                        <td><?php echo $data[$i]->tot_bay; ?></td>
                        <td><?php echo $data[$i]->stt_t; ?></td>
                        <td><?php echo $data[$i]->tgl_trans_us; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/ok_trans/".$data[$i]->no_fak_trans_us; ?>" class="btn btn-warning" data-placement="bottom" data-toggle="tooltip" title="Cetak"><i class="fa fa-print"></i></a></p>
                                </td>
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
         