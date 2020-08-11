

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

        <div id="messages"></div>

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
            <h3 class="box-title">Editar orden de servicio</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('privada/edit') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>
                <div class="form-group">
                    <?php
                    foreach ($imagenes as $ki => $imgs) {
                    ?>
                    <img src="<?php echo base_url().$imgs->URL; ?>" class="img-fluid" width="80px" height="80px" alt="Imagen <?php echo $ki; ?>">
                    <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                  <label for="product_image">Imagenes finales del proyecto</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image[]" type="file"  multiple>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tipoV">Tipo de edificio</label>
                  <select class="form-control" id="tipoV" name="tipoV" required>
                        <option value="">Seleccionar grupos</option>
                    <?php
                        for ($i=0; $i < 2 ;$i++) {
                            $seleccionado="";
                            if($i == 0){
                                if("Casa"==$orden[0]->CasaDepto){
                                    $seleccionado="SELECTED";
                                }else{
                                    $seleccionado="";
                                }
                                ?>
                                <option value="Casa" <?php echo $seleccionado; ?>>Casa</option>
                            <?php
                            }
                            if($i == 1){
                                if("Departamento"==$orden[0]->CasaDepto){
                                    $seleccionado="SELECTED";
                                }else{
                                    $seleccionado="";
                                }
                                ?>
                                <option value="Departamento" <?php echo $seleccionado; ?>>Departamento</option>
                            <?php
                            }
                          
                    ?>
                        
                    <?php
                        }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="edif">Edificio</label>
                  <input type="text" class="form-control" id="edif" name="edif" value="<?php echo $orden[0]->Edificio; ?>" placeholder="# de edificio" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="mat">Materiales</label>
                  <input type="text" class="form-control" id="mat" name="mat" value="<?php echo $orden[0]->Materiales; ?>" placeholder="Ingresa los materiales" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="cot">Cotización</label>
                  <input type="text" class="form-control" id="cot" name="cot" value="<?php echo $orden[0]->Cotización; ?>" placeholder="Ingresa el folio de la cotización" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="fact">Factura</label>
                  <input type="text" class="form-control" id="fact" name="fact" value="<?php echo $orden[0]->Factura; ?>" placeholder="Ingresa el folio de la factura" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="total">Total de factura</label>
                  <input type="text" class="form-control" id="total" name="total" value="<?php echo $orden[0]->Total_f; ?>" placeholder="Ingresa el total de la factura" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="encargado">Encargado</label>
                  <input type="text" class="form-control" id="encargado" name="encargado" value="<?php echo $orden[0]->Encargado; ?>" placeholder="Nombre del encargado" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="f_ini">Fecha de inicio</label>
                  <input type="date" class="form-control" id="f_ini" name="f_ini" value="<?php echo $orden[0]->Fecha_de_inicio; ?>">
                </div>

                <div class="form-group">
                  <label for="f_fin">Fecha de fin</label>
                  <input type="date" class="form-control" id="f_fin" name="f_fin" value="<?php echo $orden[0]->Fecha_de_termino; ?>">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="<?php echo base_url('products/') ?>" class="btn btn-warning">Regresar</a>
              </div>
            </form>
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
    $(".select_group").select2();
    $("#description").wysihtml5();

    $("#mainPrivadaNav").addClass('active');
    $("#createPrivadaNav").addClass('active');
    
    var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#product_image").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-1',
        msgErrorClass: 'alert alert-block alert-danger',
        // defaultPreviewContent: '<img src="/uploads/default_avatar_male.jpg" alt="Your Avatar">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

  });
</script>