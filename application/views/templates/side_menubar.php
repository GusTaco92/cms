<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li id="dashboardMainMenu">
          <a href="<?php echo base_url('dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <?php if($user_permission): ?>
          <?php if(in_array('createPrivada', $user_permission) || in_array('updatePrivada', $user_permission) || in_array('viewPrivada', $user_permission) || in_array('deletePrivada', $user_permission)): ?>
            <li class="treeview" id="mainPrivadaNav">
            <a href="#">
              <i class="far fa-building"></i>
              <span>*Privada</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createPrivada', $user_permission)): ?>
              <li id="createPrivadaNav"><a href="<?php echo base_url('Privada/create') ?>"><i class="fa fa-circle-o"></i> Registrar orden</a></li>
              <?php endif; ?>

              <?php if(in_array('updatePrivada', $user_permission) || in_array('viewPrivada', $user_permission) || in_array('deletePrivada', $user_permission)): ?>
              <li id="managePrivadaNav"><a href="<?php echo base_url('Privada') ?>"><i class="fa fa-circle-o"></i> Administrar Privada</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(in_array('createInforme', $user_permission) || in_array('updateInforme', $user_permission) || in_array('viewInforme', $user_permission) || in_array('deleteInforme', $user_permission)): ?>
            <li class="treeview" id="mainInformeNav">
            <a href="#">
              <i class="fas fa-info-circle"></i>
              <span>*Informes Costos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <?php if(in_array('createInforme', $user_permission)): ?>
              <li id="createInformeNav"><a href="<?php echo base_url('informes/create') ?>"><i class="fa fa-circle-o"></i> Registrar informe</a></li>
              <?php endif; ?> -->

              <?php if(in_array('updateInforme', $user_permission) || in_array('viewInforme', $user_permission) || in_array('deleteInforme', $user_permission)): ?>
              <li id="manageInformeNav"><a href="<?php echo base_url('informes') ?>"><i class="fa fa-circle-o"></i> Administrar informes</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>     

          <?php if(in_array('createGatiland', $user_permission) || in_array('updateGatiland', $user_permission) || in_array('viewGatiland', $user_permission) || in_array('deleteGatiland', $user_permission)): ?>
            <li class="treeview" id="mainGatilandNav">
            <a href="#">
              <i class="fas fa-cat"></i>
              <span>*Aportaciones gatiland</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <?php if(in_array('createGatiland', $user_permission)): ?>
              <li id="createGatilandNav"><a href="<?php echo base_url('gatiland/create') ?>"><i class="fa fa-circle-o"></i> Registrar informe</a></li>
              <?php endif; ?> -->

              <?php if(in_array('updateGatiland', $user_permission) || in_array('viewGatiland', $user_permission) || in_array('deleteGatiland', $user_permission)): ?>
              <li id="manageGatilandNav"><a href="<?php echo base_url('gatiland') ?>"><i class="fa fa-circle-o"></i> Administrar aportaciones</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          <?php if(in_array('createQuejas', $user_permission) || in_array('updateQuejas', $user_permission) || in_array('viewQuejas', $user_permission) || in_array('deleteQuejas', $user_permission)): ?>
            <li class="treeview" id="mainQuejasNav">
            <a href="#">
              <i class="far fa-angry"></i>
              <span>*Quejas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- <?php if(in_array('createQuejas', $user_permission)): ?>
              <li id="createQuejasNav"><a href="<?php echo base_url('quejas/create') ?>"><i class="fa fa-circle-o"></i> Registrar informe</a></li>
              <?php endif; ?> -->

              <?php if(in_array('updateQuejas', $user_permission) || in_array('viewQuejas', $user_permission) || in_array('deleteQuejas', $user_permission)): ?>
              <li id="manageQuejasNav"><a href="<?php echo base_url('quejas') ?>"><i class="fa fa-circle-o"></i> Administrar quejas</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>
          <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
            <li class="treeview" id="mainUserNav">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Usuarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if(in_array('createUser', $user_permission)): ?>
              <li id="createUserNav"><a href="<?php echo base_url('users/create') ?>"><i class="fa fa-circle-o"></i> Agregar usuarios</a></li>
              <?php endif; ?>

              <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li id="manageUserNav"><a href="<?php echo base_url('users') ?>"><i class="fa fa-circle-o"></i> Administrar usuarios</a></li>
            <?php endif; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
            <li class="treeview" id="mainGroupNav">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Grupos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createGroup', $user_permission)): ?>
                  <li id="addGroupNav"><a href="<?php echo base_url('groups/create') ?>"><i class="fa fa-circle-o"></i> Agregar grupos</a></li>
                <?php endif; ?>
                <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                <li id="manageGroupNav"><a href="<?php echo base_url('groups') ?>"><i class="fa fa-circle-o"></i> Administrar grupos</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>


          <?php if(in_array('createBrand', $user_permission) || in_array('updateBrand', $user_permission) || in_array('viewBrand', $user_permission) || in_array('deleteBrand', $user_permission)): ?>
            <li id="brandNav">
              <a href="<?php echo base_url('brands/') ?>">
                <i class="glyphicon glyphicon-tags"></i> <span>Etiquetas</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if(in_array('createCategory', $user_permission) || in_array('updateCategory', $user_permission) || in_array('viewCategory', $user_permission) || in_array('deleteCategory', $user_permission)): ?>
            <li id="categoryNav">
              <a href="<?php echo base_url('category/') ?>">
                <i class="fa fa-files-o"></i> <span>Categorías</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if(in_array('createStore', $user_permission) || in_array('updateStore', $user_permission) || in_array('viewStore', $user_permission) || in_array('deleteStore', $user_permission)): ?>
            <li id="storeNav">
              <a href="<?php echo base_url('stores/') ?>">
                <i class="fa fa-files-o"></i> <span>Tiendas</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if(in_array('createAttribute', $user_permission) || in_array('updateAttribute', $user_permission) || in_array('viewAttribute', $user_permission) || in_array('deleteAttribute', $user_permission)): ?>
          <li id="attributeNav">
            <a href="<?php echo base_url('attributes/') ?>">
              <i class="fa fa-files-o"></i> <span>Atributos</span>
            </a>
          </li>
          <?php endif; ?>

          <?php if(in_array('createProduct', $user_permission) || in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
            <li class="treeview" id="mainProductNav">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span>Productos</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createProduct', $user_permission)): ?>
                  <li id="addProductNav"><a href="<?php echo base_url('products/create') ?>"><i class="fa fa-circle-o"></i> Agregar producto</a></li>
                <?php endif; ?>
                <?php if(in_array('updateProduct', $user_permission) || in_array('viewProduct', $user_permission) || in_array('deleteProduct', $user_permission)): ?>
                <li id="manageProductNav"><a href="<?php echo base_url('products') ?>"><i class="fa fa-circle-o"></i> Administrar productos</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>


          <?php if(in_array('createOrder', $user_permission) || in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
            <li class="treeview" id="mainOrdersNav">
              <a href="#">
                <i class="fa fa-dollar"></i>
                <span>Ordenes</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php if(in_array('createOrder', $user_permission)): ?>
                  <li id="addOrderNav"><a href="<?php echo base_url('orders/create') ?>"><i class="fa fa-circle-o"></i> Agregar orden</a></li>
                <?php endif; ?>
                <?php if(in_array('updateOrder', $user_permission) || in_array('viewOrder', $user_permission) || in_array('deleteOrder', $user_permission)): ?>
                <li id="manageOrdersNav"><a href="<?php echo base_url('orders') ?>"><i class="fa fa-circle-o"></i> Administrar ordenes</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>

          <?php if(in_array('viewReports', $user_permission)): ?>
            <li id="reportNav">
              <a href="<?php echo base_url('reports/') ?>">
                <i class="glyphicon glyphicon-stats"></i> <span>Reportes</span>
              </a>
            </li>
          <?php endif; ?>


          <?php if(in_array('updateCompany', $user_permission)): ?>
            <li id="companyNav"><a href="<?php echo base_url('company/') ?>"><i class="fa fa-files-o"></i> <span>Compañía</span></a></li>
          <?php endif; ?>

        

        <!-- <li class="header">Configuraciones</li> -->

        <?php if(in_array('viewProfile', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/profile/') ?>"><i class="fa fa-user-o"></i> <span>Perfil</span></a></li>
        <?php endif; ?>
        <?php if(in_array('updateSetting', $user_permission)): ?>
          <li><a href="<?php echo base_url('users/setting/') ?>"><i class="fa fa-wrench"></i> <span>Configuración</span></a></li>
        <?php endif; ?>

        <?php endif; ?>
        <!-- user permission info -->
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> <span>Salir</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>