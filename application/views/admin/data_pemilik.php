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
                <span><a href="<?php echo base_url()."index.php/admin/tambah_pemilik"; ?>" class="btn btn-default"><i class="fa fa-plus"></i> Tambah</a></span>
                   <span><a href="<?php echo base_url()."index.php/admin/cetak_data_kos"; ?>" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</a></span>
                </div><!-- /.box-header -->
                <div class="box-body">
                     <?php echo $this->session->flashdata('pes_kos_adm'); ?>
                  <table id="example1" class="table table-bordered table-striped">
                     
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto pemilik</th>
                        <th>Nomor identitas</th>
                        <th>Nama User</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Tanggal daftar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><img class="img-thumbnail" style="max-height:50px;max-width:50px;min-height:50px;min-width:50px;" src="<?php echo base_url()."assets/"; ?>images/use_r/<?php echo $data[$i]->ft_us; ?>"></td>
                        <td><?php echo $data[$i]->no_ktp_us; ?></td>
                        <td><?php echo $data[$i]->nml_us; ?></td>
                        <td><?php echo $data[$i]->je_kel_us; ?></td>
                        <td><?php echo $data[$i]->alm_us; ?></td>
                        <td><?php echo $data[$i]->no_hp_us; ?></td>
                        <td><?php echo $data[$i]->ua_ks_user; ?></td>
                        <td><p style="min-width:20px;max-width:20px !important;"><?php echo $data[$i]->ua_ks_pas; ?></p></td>
                        <td><?php echo $data[$i]->tgl_daf; ?></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/ok_trans/".$data[$i]->no_ktp_us; ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></p>
                                <p><a href="<?php echo base_url()."index.php/admin/batal_trans/".$data[$i]->no_ktp_us; ?>" data-placement="bottom" data-toggle="tooltip" title="Batal" onclick="return confirm('Apakah Anda Yakin batalkan pesanan ini.?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></p></td>
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
         