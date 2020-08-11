

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
                    <th>Encargado</th>
                    <th>Materiales</th>
                    <th>Factura</th>
                    <th>Total de fac</th>
                    <th>Cotización</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de termino</th>
                    <th>Fotos antes</th>
                    <th>Fotos despues</th>

                  <?php if(in_array('updatePrivada', $user_permission) || in_array('deletePrivada', $user_permission)): ?>
                  <th>Acción</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($privada_data): ?>                  
                    <?php foreach ($privada_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['ordenes_info']['id']; ?></td>
                        <td><?php echo $v['ordenes_info']['CasaDepto']; ?></td>
                        <td><?php echo $v['ordenes_info']['Edificio']; ?></td>
                        <td><?php echo $v['ordenes_info']['Encargado']; ?></td>
                        <td><?php echo $v['ordenes_info']['Materiales']; ?></td>
                        <td><?php echo $v['ordenes_info']['Factura']; ?></td>
                        <td><?php echo "$".number_format($v['ordenes_info']['Total_f'], 2, '.', ' '); ?></td>
                        <td><?php echo $v['ordenes_info']['Cotización']; ?></td>
                        <td><?php echo $v['ordenes_info']['Fecha_de_inicio']; ?></td>
                        <td><?php echo $v['ordenes_info']['Fecha_de_termino']; ?></td>
                        <td>
                          <a href="<?php echo base_url('Privada/detail/'.$v['ordenes_info']['id']) ?>"><i class="fas fa-eye"></i></a>
                        </td>
                        <td>
                          <a href="<?php echo base_url('Privada/detalle/'.$v['ordenes_info']['id']) ?>"><i class="fas fa-eye"></i></a>
                        </td>
                        <?php if(in_array('updatePrivada', $user_permission) || in_array('deletePrivada', $user_permission)): ?>
                        <td>
                          <?php if(in_array('updatePrivada', $user_permission)): ?>
                            <a href="<?php echo base_url('Privada/edit/'.$v['ordenes_info']['id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <?php endif; ?>
                          <?php if(in_array('deletePrivada', $user_permission)): ?>
                            <a href="<?php echo base_url('Privada/delete/'.$v['ordenes_info']['id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
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

      $("#mainPrivadaNav").addClass('active');
      $("#managePrivadaNav").addClass('active');
    });
  </script>
