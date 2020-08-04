

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
            <h3 class="box-title">Agregar orden de servicio</h3>
          </div>
          <!-- /.box-header -->
          <form role="form" action="<?php base_url('privada/create') ?>" method="post" enctype="multipart/form-data">
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
                  <label for="tipoV">Tipo de edificio</label>
                  <select class="form-control" id="tipoV" name="tipoV" required>
                    <option value="">Seleccionar grupos</option>
                      <option value="Casa">Casa</option>
                      <option value="Departamento">Departamento</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="edif">Edificio</label>
                  <input type="text" class="form-control" id="edif" name="edif" placeholder="# de edificio" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="mat">Materiales</label>
                  <input type="text" class="form-control" id="mat" name="mat" placeholder="Ingresa los materiales" autocomplete="off" />
                </div>

                <div class="form-group">
                  <label for="fact">Factura</label>
                  <textarea type="text" class="form-control" id="fact" name="fact" placeholder="Ingresa el folio de la factura" autocomplete="off"></textarea>
                </div>

                <div class="form-group">
                  <label for="cot">Cotización</label>
                  <textarea type="text" class="form-control" id="cot" name="cot" placeholder="Ingresa el folio de la cotización" autocomplete="off"></textarea>
                </div>

                <div class="form-group">
                  <label for="f_ini">Fecha de inicio</label>
                  <input type="date" class="form-control" id="f_ini" name="f_ini">
                </div>

                <div class="form-group">
                  <label for="f_fin">Fecha de fin</label>
                  <input type="date" class="form-control" id="f_fin" name="f_fin">
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