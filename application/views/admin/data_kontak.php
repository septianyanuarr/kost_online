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
                        <th>Alamat</th>
                        <th>E-mail</th>
                        <th>No Telp</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Google +</th>
                        <th>Istagram</th>
                        <th>Youtube</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $data[$i]->alm_k; ?></td>
                        <td><?php echo $data[$i]->e_mail_k; ?></td>
                        <td><?php echo $data[$i]->no_hp_k; ?></td>
                        <td><?php echo $data[$i]->fb_k; ?></td>
                        <td><?php echo $data[$i]->twit_k; ?></td>
                        <td><?php echo $data[$i]->g_plus_k; ?></td>
                        <td><?php echo $data[$i]->instag_k; ?></td>
                        <td><?php echo $data[$i]->yt_k; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/ok_trans/".$data[$i]->id_k; ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></p>
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
         