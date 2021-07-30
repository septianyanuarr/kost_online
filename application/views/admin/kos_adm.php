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
                  <span><a href="<?php echo base_url()."index.php/admin/tambah"; ?>" class="btn btn-default"><i class="fa fa-plus"></i> Tambah</a></span>
                   <span><a href="<?php echo base_url()."index.php/admin/cetak_data_kos"; ?>" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a></span>
                </div><!-- /.box-header -->
                <div class="box-body">
                     <?php echo $this->session->flashdata('pes_kos_adm'); ?>
                  <table id="example1" class="table table-bordered table-striped">
                     
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>KD Kos</th>
                        <th>Nama Pemilik</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Melihat kos</th>
                        <th>Foto utama</th>
                        <th>Tanggal Post</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $data[$i]->kd_kos_t; ?></td>
                        <td><?php echo $data[$i]->nml_us; ?></td>
                        <td><?php echo $data[$i]->ktg_r; ?></td>
                        <td><?php echo $data[$i]->hrg_ks; ?></td>
                        <td><?php echo $data[$i]->alm_ks; ?></td>
                        <td><?php echo $data[$i]->v_kos_t; ?></td>
                        <td><img class="img-thumbnail" style="max-height:70px;max-width:120px;min-height:70px;min-width:120px;" src="<?php echo base_url()."assets/"; ?>images/kos_t/<?php echo $data[$i]->ft_utm; ?>"></td>
                        <td><?php echo $data[$i]->tgl_pst; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/edit_kos/".$data[$i]->kd_kos_t ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></p>
                                <p><a href="<?php echo base_url()."index.php/admin/del_kos_adm/".$data[$i]->kd_kos_t ?>" data-placement="bottom" data-toggle="tooltip" title="Hapus" onclick="return confirm('Apakah Anda Yakin hapus data ini.?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></p></td>
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
         