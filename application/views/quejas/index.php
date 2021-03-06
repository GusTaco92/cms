

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar
        <small>Quejas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Quejas</li>
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
<!--           
          <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Agregar queja</a>
            <br /> <br />
          <?php endif; ?> -->


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administrar Quejas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Comentario</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Matrícula</th>
                    <th>Tel</th>
                    <th>Grado</th>
                    <th>Docente</th>

                  <?php if(in_array('updateQuejas', $user_permission) || in_array('deleteQuejas', $user_permission)): ?>
                  <th>Acción</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($quejas_data): ?>                  
                    <?php foreach ($quejas_data as $k => $v): ?>
                      <tr>
                        <td><?php echo $v['user_info']['Quejas_depto']; ?></td>
                        <td><?php echo $v['user_info']['Quejas_nombre']; ?></td>
                        <td><?php echo $v['user_info']['Quejas_email']; ?></td>
                        <td><?php echo $v['user_info']['Quejas_comentario']; ?></td>
                        <td><?php echo $v['user_info']['Quejas_fechaAlta']; ?></td>
                        <td><?php if(!$v['user_info']['Quejas_Tipo']){ echo "General"; }else{echo "Padre familia"; }; ?></td>
                        <td><?php echo $v['user_info']['Quejas_matricula']; ?></td>
                        <td><?php echo $v['user_info']['Quejas_tel']; ?></td>
                        <td><?php echo $v['user_info']['Quejas_grado']; ?></td>
                        <td><?php echo $v['user_info']['Quejas_docente']; ?></td>
                        <?php if(in_array('updateQuejas', $user_permission) || in_array('deleteQuejas', $user_permission)): ?>
                        <td>
                          <!-- <?php if(in_array('updateQuejas', $user_permission)): ?>
                            <a href="<?php echo base_url('quejas/edit/'.$v['user_info']['Quejas_id']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <?php endif; ?> -->
                          <?php if(in_array('deleteQuejas', $user_permission)): ?>
                            <a href="<?php echo base_url('quejas/delete/'.$v['user_info']['Quejas_id']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
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

      $("#mainQuejasNav").addClass('active');
      $("#manageQuejasNav").addClass('active');
    });
  </script>
