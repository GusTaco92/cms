

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar
        <small>Informes cucm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Informes cucm</li>
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
          
          <?php if(in_array('createUser', $user_permission)): ?>
            <a href="<?php echo base_url('users/create') ?>" class="btn btn-primary">Agregar usuario</a>
            <br /> <br />
          <?php endif; ?>


          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Administrar informes <?php echo $this->session->userdata('seccion') ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="userTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>CP</th>
                    <th>Tel</th>
                    <th>Lic/Maestria</th>
                    <th>Fecha</th>
                    <th>Se enteró</th>
                    <th>Enviar inf</th>
                  <?php if(in_array('updateInformeCucm', $user_permission) || in_array('deleteInformeCucm', $user_permission)): ?>
                  <th>Acción</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                  <?php if($informe_data): ?>                  
                    <?php foreach ($informe_data as $k => $v):
                      ?>
                      <tr>
                        <td><?php echo $v['user_info']['ID']; ?></td>
                        <td><?php echo $v['user_info']['Nombre_completo']; ?></td>
                        <td><?php echo $v['user_info']['Correo']; ?></td>
                        <td><?php echo $v['user_info']['Codigo_postal']; ?></td>
                        <td><?php echo $v['user_info']['Telefono']; ?></td>
                        <td><?php echo $v['user_info']['Licenciatura_Maestria']; ?></td>
                        <td><?php echo $v['user_info']['Fecha']; ?></td>
                        <td><?php echo $v['user_info']['Se_entero']; ?></td>
                        <td>
                          <?php
                            if(!$v['user_info']['Enviado']){
                          ?>
                            <a href="<?= base_url('informes/EnviarCostos/'.$v['user_info']['ID']) ?>">Enviar Información</a>
                          <?php
                            }
                          ?>
                        </td>
                        <?php if(in_array('updateInformeCucm', $user_permission) || in_array('deleteInformeCucm', $user_permission)): ?>

                        <td>
                          <!-- <?php if(in_array('updateInformeCucm', $user_permission)): ?>
                            <a href="<?php echo base_url('informesCucm/edit/'.$v['user_info']['ID']) ?>" class="btn btn-default"><i class="fa fa-edit"></i></a>
                          <?php endif; ?> -->
                          <?php if(in_array('deleteInformeCucm', $user_permission)): ?>
                            <a href="<?php echo base_url('informesCucm/delete/'.$v['user_info']['ID']) ?>" class="btn btn-default"><i class="fa fa-trash"></i></a>
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

      $("#mainInformeNavCucm").addClass('active');
      $("#manageInformeNavCucm").addClass('active');
    });
  </script>
