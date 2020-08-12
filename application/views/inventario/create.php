

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dar de alta
      <small>Nuevo artículo al inventario</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li class="active">Inventario General</li>
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
            <h3 class="box-title">Registrar nuevo producto</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('inventario/create') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">

                  <label for="product_image">Imagen</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="product_image" name="product_image[]" type="file"  multiple required>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="departamento">Departamento</label>
                  <select class="form-control" id="departamento" name="departamento" required>
                    <option value="">Selecciona una opción</option>
                  <?php
                        foreach ($departamento as $key => $dep) {
                    ?>
                        <option value="<?php echo $dep->depto_id ?>"><?php echo $dep->depto_nombre."--".$dep->firstname." ".$dep->lastname ?></option>
                    <?php
                        }
                      ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" placeholder="" value="<?php echo set_value("marca"); ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control" id="modelo" name="modelo" placeholder="" value="<?php echo set_value("modelo"); ?>" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <textarea type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value("descripcion"); ?>" placeholder="Ingresa una descripción" autocomplete="off"></textarea>
                </div>

                <div class="form-group">
                  <label for="barras">Tipo propiedad</label>
                  <select class="form-control" id="barras" name="barras" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Producto">Producto</option>
                    <option value="Intelectual">Intelectual</option>
                  </select>
                  <!-- <input type="text" class="form-control" id="barras" name="barras" value="<?php echo set_value("barras"); ?>"placeholder="Código de barras" autocomplete="off"> -->
                </div>
                <div class="form-group">
                  <label for="serie">Número de serie</label>
                  <input type="text" class="form-control" id="serie" name="serie" value="<?php echo set_value("serie"); ?>"placeholder="Código de barras" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="importe">Importe(sin impuestos)</label>
                  <input type="text" class="form-control" id="importe" name="importe" value="<?php echo set_value("importe"); ?>"placeholder="Código de barras" autocomplete="off">
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

    $("#mainInventarioNav").addClass('active');
    $("#createInventarioNav").addClass('active');
    
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