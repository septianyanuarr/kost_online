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
                        <th>Backgroud Slider Pertama</th>
                        <th>Backgroud Slider Kedua</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php for ($i = 0; $i < count($data); ++$i) { ?>
                      <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><img class="img-thumbnail" style="max-height:70px;width:60%;" src="<?php echo base_url()."assets/"; ?>images/fraction-slider/<?php echo $data[$i]->bg; ?>"></td>
                         <td><img class="img-thumbnail" style="max-height:70px;width:60%;" src="<?php echo base_url()."assets/"; ?>images/fraction-slider/<?php echo $data[$i]->bg2; ?>"></td>
                        <td>
                        <p><a href="<?php echo base_url()."index.php/admin/edit_slider/".$data[$i]->id ?>" class="btn btn-success" data-placement="bottom" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a></p>
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
         