

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar
        <small>Privada Villa del Sur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Privada Villa del Sur</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>
          
          <!-- <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Agregar usuario</a>
            <br /> <br />
          <?php endif; ?> -->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administrar Privada Villa del Sur</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Casa/Dto</th>
                    <th>Edificio</th>
                    <th>Materiales</th>
                    <th>Factura</th>
                    <th>Cotización</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de termino</th>
                  

                  <?php if(in_array('updatePrivada', $user_permission) || in_array('deletePrivada', $user_permission)): ?>
                  <th>Acción</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($gatiland_data): ?>                  
                    <?php foreach ($gatiland_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['user_info']['Gat_id']; ?></td>
                        <td><?php echo $v['user_info']['Gat_nombre']; ?></td>
                        <td><?php echo $v['user_info']['Gat_facebook']; ?></td>
                        <td><?php echo $v['user_info']['Gat_tel']; ?></td>
                        <td><?php echo $v['user_info']['Gat_email']; ?></td>
                        <td><?php echo $v['user_info']['Gat_aportación']; ?></td>
                        <td><?php echo $v['user_info']['Gat_sugerencia']; ?></td>
                        <td><?php echo $v['user_info']['Gat_comentario']; ?></td>
                        <td><?php echo $v['user_info']['Gat_fechaRegistro']; ?></td>
                        <td><?php echo $v['user_info']['Gat_sitioW']; ?></td>
                        <?php if(in_array('updatePrivada', $user_permission) || in_array('deletePrivada', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updatePrivada', $user_permission)): ?>
                            <a href="<?php echo base_url('Privada/edit/'.$v['user_info']['Gat_id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <?php endif; ?>
                          <?php if(in_array('deletePrivada', $user_permission)): ?>
                            <a href="<?php echo base_url('Privada/delete/'.$v['user_info']['Gat_id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                        </td>
                      <?php endif; ?>
                      </tr>
                    <?php endforeach ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $('#userTable').DataTable();

      $("#mainGatilandNav").addClass('active');
      $("#manageGatilandNav").addClass('active');
    });
  </script>
