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
                        <th>ID Pesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Kode Kos dipesan</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal Pesanan</th>
                        <th>Tanggal Jatuh tempo</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $data[$i]->id_psn_ks_us; ?></td>
                        <td><?php echo $data[$i]->nml_us; ?></td>
                        <td><?php echo $data[$i]->kd_kos_t; ?></td>
                        <td><?php echo $data[$i]->metod_pemb; ?></td>
                        <td><?php echo $data[$i]->tgl_psn; ?></td>
                        <td><?php echo $data[$i]->tgl_akhr; ?></td>
                        <td><?php echo $data[$i]->stt; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/ok_trans/".$data[$i]->id_psn_ks_us; ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></p>
                                <p><a href="<?php echo base_url()."index.php/admin/batal_trans/".$data[$i]->id_psn_ks_us; ?>" data-placement="bottom" data-toggle="tooltip" title="Batal" onclick="return confirm('Apakah Anda Yakin batalkan pesanan ini.?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></p></td>
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
         