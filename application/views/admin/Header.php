<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$website[0]['nama']?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url('assets/')?>img/<?=$website[0]['logo']?>" rel="icon">
  <link href="<?=base_url('assets/')?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url('assets/') ?>dist/sweetalert2.min.css" id="theme-styles" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/')?>css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?=base_url('admin/Dashboard')?>" class="logo d-flex align-items-center">
        <img src="<?=base_url('assets/')?>img/<?=$website[0]['logo']?>" alt="">
        <span class="d-none d-lg-block"><?=$website[0]['nama']?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=base_url('assets/')?>img/<?=$user['foto']?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$user['nama']?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$user['nama']?></h6>
              <span><?=$user['status']?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('admin/Dashboard/profil')?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('Login/logout')?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?=base_url('admin/Dashboard')?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-settings-3-line"></i><span>Website</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('admin/Dashboard/website')?>">
              <i class="bi bi-circle"></i><span>Website</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-heading">Master Data</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url('admin/Kec_desa')?>">
          <i class="bi bi-menu-button-wide"></i>
          <span>Data Kec/Desa</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url('admin/Dt_stunting_all')?>">
          <i class="bi bi-menu-button-wide"></i>
          <span>Data Stunting</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">