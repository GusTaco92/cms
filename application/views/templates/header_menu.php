<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <img class="logo-mini" src="<?php echo $this->session->userdata('profile_picture') ?>" alt="logo_user" width="50px" height="50px">
      <span class="logo-mini"><b><?php echo $this->session->userdata('firstname') ?></b></span>
      <!-- logo for regular state and mobile devices -->
      <img class="logo-lg" src="<?php echo $this->session->userdata('profile_picture') ?>" alt="logo_user" width="50px" height="50px">
      <span class="logo-lg"><b><?php echo $this->session->userdata('firstname') ?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  