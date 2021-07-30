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
                     <?php echo $this->session->flashdata('pes_kos_adm'); ?>
                  <table id="example1" class="table table-bordered table-striped">
                     
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Pengirim</th>
                        <th>Email Pengirim</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $data[$i]->nm; ?></td>
                        <td><?php echo $data[$i]->em; ?></td>
                        <td><?php echo $data[$i]->sub; ?></td>
                        <td><?php echo $data[$i]->kom; ?></td>
                        <td><?php echo $data[$i]->tgl; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/lihat_psn_msuk/".$data[$i]->id ?>" class="btn btn-info" data-placement="bottom" data-toggle="tooltip" title="Lihat"><i class="fa fa-eye"></i></a></p>
                                <p><a href="<?php echo base_url()."index.php/admin/del_psn_msuk/".$data[$i]->id ?>" data-placement="bottom" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah Anda Yakin batalkan konfirmasi data ini.?')" class="btn btn-danger"><b><i class="fa fa-eye-slash"> </i><b></a></p></td>
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
         