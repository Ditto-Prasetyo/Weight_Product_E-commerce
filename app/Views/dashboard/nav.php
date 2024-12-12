  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo site_url("home") ?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">WP Method</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url("home") ?>" class="nav-link <?= uri_string() === "home" ? "active" : "" ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="<?php echo site_url("home")?>" class="nav-link <?= uri_string() === "home" ? "active" : "" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master Data E-Commerce
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url("home/jenis_usaha") ?>" class="nav-link <?= uri_string() === "home/jenis_usaha" ?"active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis E-Commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url("home/data_umkm") ?>" class="nav-link <?= uri_string() === "home/data_umkm" ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data E-Commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url("home/data_kriteria") ?>" class="nav-link <?= uri_string() === "home/data_kriteria" ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kriteria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url("home/data_bobot") ?>" class="nav-link <?= uri_string() === "home/data_bobot" ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bobot</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="<?php echo site_url("home") ?>" class="nav-link <?= uri_string() === "home" ? "active" : "" ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Weight Product Method
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url("home/data_WPalternatif") ?>" class="nav-link <?= uri_string() === "home/data_WPalternatif" ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Alternatif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url("home/data_WPnormalisasi") ?>" class="nav-link <?= uri_string() === "home/data_WPnormalisasi" ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Nilai S</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url("home/data_WPpreferensi") ?>" class="nav-link <?= uri_string() === "home/data_WPpreferensi" ? "active" : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Nilai V</p>
                </a>
              </li>
            </ul>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SPK Bantuan UMKM</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url("home") ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Jenis Usaha</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->