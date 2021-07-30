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
                  <h3 class="box-title"><a href="<?php echo base_url()."index.php/admin/tambah"; ?>" class="btn btn-default"><i class="fa fa-plus"></i> Tambah</a></h3>  
                </div><!-- /.box-header -->
                <div class="box-body">
                     <?php echo $this->session->flashdata('pes_kos_adm'); ?>
                  <table id="example1" class="table table-bordered table-striped">
                     
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Kampus</th>
                        <th>Alamat Kampus</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $data[$i]->nm_kmps; ?></td>
                        <td><?php echo $data[$i]->alm_kmps; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/edit_kos/".$data[$i]->id_kmp ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></p>
                                <p><a href="<?php echo base_url()."index.php/admin/del_kos_adm/".$data[$i]->id_kmp ?>" data-placement="bottom" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah Anda Yakin hapus data ini.?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></p></td>
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
         