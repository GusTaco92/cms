

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
        <li><a href="<?php echo base_url('groups/') ?>">Grupos</a></li>
        <li class="active">Editar</li>
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
              <h3 class="box-title">Editar Grupos</h3>
            </div>
            <form role="form" action="<?php base_url('groups/update') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Nombre del grupo</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['group_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="permission">Permisos</label>

                  <?php $serialize_permission = unserialize($group_data['permission']); ?>
                  
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
                        <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createPrivada" <?php if($serialize_permission) {
                          if(in_array('createPrivada', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updatePrivada" <?php 
                        if($serialize_permission) {
                          if(in_array('updatePrivada', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewPrivada" <?php 
                        if($serialize_permission) {
                          if(in_array('viewPrivada', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deletePrivada" <?php 
                        if($serialize_permission) {
                          if(in_array('deletePrivada', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Informes costos</td>
                        <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createInforme" <?php if($serialize_permission) {
                          if(in_array('createInforme', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateInforme" <?php 
                        if($serialize_permission) {
                          if(in_array('updateInforme', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewInforme" <?php 
                        if($serialize_permission) {
                          if(in_array('viewInforme', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteInforme" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteInforme', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Gatiland</td>
                        <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createGatiland" <?php if($serialize_permission) {
                          if(in_array('createGatiland', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateGatiland" <?php 
                        if($serialize_permission) {
                          if(in_array('updateGatiland', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewGatiland" <?php 
                        if($serialize_permission) {
                          if(in_array('viewGatiland', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteGatiland" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteGatiland', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Gatiland</td>
                        <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createQuejas" <?php if($serialize_permission) {
                          if(in_array('createQuejas', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateQuejas" <?php 
                        if($serialize_permission) {
                          if(in_array('updateQuejas', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewQuejas" <?php 
                        if($serialize_permission) {
                          if(in_array('viewQuejas', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteQuejas" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteQuejas', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Usuarios</td>
                        <td><input type="checkbox" class="minimal" name="permission[]" id="permission" class="minimal" value="createUser" <?php if($serialize_permission) {
                          if(in_array('createUser', $serialize_permission)) { echo "checked"; } 
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateUser" <?php 
                        if($serialize_permission) {
                          if(in_array('updateUser', $serialize_permission)) { echo "checked"; } 
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewUser" <?php 
                        if($serialize_permission) {
                          if(in_array('viewUser', $serialize_permission)) { echo "checked"; }   
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteUser" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteUser', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Grupos</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('createGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('updateGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('viewGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteGroup" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; }  
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Etiquetas</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createBrand" <?php if($serialize_permission) {
                          if(in_array('createBrand', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateBrand" <?php if($serialize_permission) {
                          if(in_array('updateBrand', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewBrand" <?php if($serialize_permission) {
                          if(in_array('viewBrand', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteBrand" <?php if($serialize_permission) {
                          if(in_array('deleteBrand', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                      </tr>
                      <tr>
                        <td>Categorías</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createCategory" <?php if($serialize_permission) {
                          if(in_array('createCategory', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCategory" <?php if($serialize_permission) {
                          if(in_array('updateCategory', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewCategory" <?php if($serialize_permission) {
                          if(in_array('viewCategory', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteCategory" <?php if($serialize_permission) {
                          if(in_array('deleteCategory', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                      </tr>
                      <tr>
                        <td>Tiendas</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createStore" <?php if($serialize_permission) {
                          if(in_array('createStore', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateStore" <?php if($serialize_permission) {
                          if(in_array('updateStore', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewStore" <?php if($serialize_permission) {
                          if(in_array('viewStore', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteStore" <?php if($serialize_permission) {
                          if(in_array('deleteStore', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                      </tr>
                      <tr>
                        <td>Atributos</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createAttribute" <?php if($serialize_permission) {
                          if(in_array('createAttribute', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateAttribute" <?php if($serialize_permission) {
                          if(in_array('updateAttribute', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewAttribute" <?php if($serialize_permission) {
                          if(in_array('viewAttribute', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteAttribute" <?php if($serialize_permission) {
                          if(in_array('deleteAttribute', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                      </tr>
                      <tr>
                        <td>Productos</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createProduct" <?php if($serialize_permission) {
                          if(in_array('createProduct', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateProduct" <?php if($serialize_permission) {
                          if(in_array('updateProduct', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProduct" <?php if($serialize_permission) {
                          if(in_array('viewProduct', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteProduct" <?php if($serialize_permission) {
                          if(in_array('deleteProduct', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                      </tr>
                      <tr>
                        <td>Ordenes</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="createOrder" <?php if($serialize_permission) {
                          if(in_array('createOrder', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateOrder" <?php if($serialize_permission) {
                          if(in_array('updateOrder', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewOrder" <?php if($serialize_permission) {
                          if(in_array('viewOrder', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="deleteOrder" <?php if($serialize_permission) {
                          if(in_array('deleteOrder', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                      </tr>
                      <tr>
                        <td>Reportes</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewReports" <?php if($serialize_permission) {
                          if(in_array('viewReports', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Compañía</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateCompany" <?php if($serialize_permission) {
                          if(in_array('updateCompany', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Perfil</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="viewProfile" <?php if($serialize_permission) {
                          if(in_array('viewProfile', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Configuración</td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="permission" class="minimal" value="updateSetting" <?php if($serialize_permission) {
                          if(in_array('updateSetting', $serialize_permission)) { echo "checked"; } 
                        } ?>></td>
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
    $("#mainGroupNav").addClass('active');
    $("#manageGroupNav").addClass('active');

    $('input[type="checkbox"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });
  });
</script>
