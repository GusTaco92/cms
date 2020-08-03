

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar
        <small>Grupos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Grupos</li>
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

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Agregar grupos</h3>
            </div>
            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Nombre del grupo</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name">
                </div>
                <div class="form-group">
                  <label for="permission">Permisos</label>

                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Crear</th>
                        <th>Actualizar</th>
                        <th>Ver</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Admin Privada</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createPrivada" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updatePrivada" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewPrivada" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deletePrivada" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Informes costos</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createInforme" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateInforme" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewInforme" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteInforme" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Gatiland</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGatiland" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGatiland" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGatiland" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGatiland" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Quejas</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createQuejas" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateQuejas" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewQuejas" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteQuejas" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Usuarios</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Grupos</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Etiquetas</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createBrand" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateBrand" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewBrand" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteBrand" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Categorías</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewCategory" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteCategory" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Tiendas</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createStore" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateStore" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewStore" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteStore" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Atributos</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createAttribute" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateAttribute" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewAttribute" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteAttribute" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Productos</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProduct" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteProduct" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Ordenes</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewOrder" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteOrder" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Reportes</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewReports" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Compañía</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Perfil</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" class="minimal"></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Configuración</td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                    </tbody>
                  </table>
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Regresar</a>
              </div>
            </form>
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
    $("#mainPrivadaNav").addClass('active');
    $("#createPrivadaNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  });
</script>

