<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>buku</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url() ?>asset/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>asset/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
  <link href="<?php echo base_url() ?>asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style type="text/css">
   
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fan"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="font-family: 'Roboto Slab', serif;">MAJESTICE<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
    <?php $uriMethod_name=$this->router->fetch_method(); ?>

      <!-- Nav Item - Dashboard -->
      <li <?php 
             if($uriMethod_name=="index"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> >
        <a class="nav-link" href="<?= base_url('admin/index'); ?>">
        <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li <?php 
             if($uriMethod_name=="buku" || $uriMethod_name=="tambah_buku" || $uriMethod_name=="edit_buku"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> >
        <a class="nav-link"  href="<?php echo base_url().'admin/buku'; ?>">
          <i class="fas fa-book"></i>
          <span>Buku</span></a>
      </li>

       <li <?php 
             if($uriMethod_name=="user"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> >
        <a class="nav-link"  href="<?php echo base_url().'admin/user'; ?>">
          <i class="fas fa-user"></i>
          <span>User</span></a>
      </li>

       <li <?php 
             if($uriMethod_name=="kategori"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> >
        <a class="nav-link"  href="<?php echo base_url().'admin/kategori'; ?>">
         <i class="fas fa-share-alt"></i>
          <span>Kategori</span></a>
      </li>


      <li <?php 
             if($uriMethod_name=="anggota" || $uriMethod_name=="tambah_anggota" || $uriMethod_name=="edit_anggota"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> >
        <a class="nav-link" href="<?php echo base_url().'admin/anggota'; ?>">
          <i class="fas fa-user"></i>
          <span>Anggota</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Nav Item - Charts -->
      <li <?php 
             if($uriMethod_name=="peminjaman" || $uriMethod_name=="tambah_peminjaman" || $uriMethod_name=="edit_peminjaman"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?>>
        <a class="nav-link" href="<?php echo base_url().'admin/peminjaman'; ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Transaksi Peminjaman</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-list"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan Peminjaman</h6>
            <a class="collapse-item" href="<?php echo base_url().'admin/cetak_laporan_buku' ?>">Laporan Data Buku</a>
            <a class="collapse-item" href="<?php echo base_url().'admin/cetak_laporan_anggota' ?>">Laporan Data Anggota</a>
            <a class="collapse-item" href="<?php echo base_url().'admin/laporan_transaksi' ?>">Laporan Data Transaksi</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
     <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-info topbar mb-4 static-top shadow" >

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white" style="font-family: 'Roboto Slab', serif; font-size: 15px;"><?= $user['name']; ?></span>
               
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url().'admin/ganti_password' ?>">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>