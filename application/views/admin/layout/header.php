<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb-admin-2.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">
    
    

</head>

<body id="page-top">
<div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Admin/adminc/dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3">AdoptMe Admin Dashboard<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Admin/adminc/dashboard') ?>">
                    <i class="fas fa-solid fa-inbox"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Admin/adminc/datauser')?>">
                <i class="fas fa-solid fa-user"></i>
                    <span>Data User</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Admin/adminc/dataras')?>">
                <i class="fas fa-solid fa-list"></i>
                    <span>Data Ras</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Admin/adminc/datahewan')?>">
                <i class="fas fa-solid fa-dog"></i>
                <i class="fas fa-solid fa-cat"></i>
                    <span>Data Hewan</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Admin/adminc/dataadopsi')?>">
                <i class="fas fa-solid fa-pen"></i>
                    <span>Data dan Verifikasi Adopsi</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fiturras"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-solid fa-bars"></i>
                    <span>Fitur Deteksi Ras</span>
                </a>
                <div id="fiturras" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu : </h6>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/detectKucing')?>">Ras Kucing</a>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/detectAnjing')?>">Ras Anjing</a>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/detectBug')?>">Laporan Error / Bug</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporanuser"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-solid fa-bars"></i>
                    <span>Laporan From User</span>
                </a>
                <div id="laporanuser" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu : </h6>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/laporanBug')?>">Laporan Bug Aplikasi</a>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/laporanSaran')?>">Laporan Saran dan Kritik</a>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/laporanLain')?>">Laporan Lainnya</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporanadopsi"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-solid fa-bars"></i>
                    <span>Laporan Adopsi Bulanan</span>
                </a>
                <div id="laporanadopsi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu : </h6>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/laporanBulanan')?>">Laporan Bulanan</a>
                        <a class="collapse-item" href="<?php echo base_url('Admin/adminc/laporanKendala')?>">Laporan Kendala</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600">Login Sebagai, <?php echo $this->session->userdata('Adminname');?>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->