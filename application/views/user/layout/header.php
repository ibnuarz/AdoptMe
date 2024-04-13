<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>AdoptMe - Your Home, My Home</title>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/css/bootstrap.min.css')?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/user/css/font-awesome.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/user/css/user-main.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/user/css/costum.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/user/css/owl-carousel.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/user/css/lightbox.css')?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css');?>">

    <!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->

    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="<?php echo base_url('Main/dashboard') ?>" class="logo">
                            <img src="<?php echo base_url('assets/img/adoptmelogo.png')?>">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="<?php echo base_url('Main/dashboard') ?>">Home</a></li>
                            <li class="scroll-to-section"><a href="<?php echo base_url('Main/listHewan/1') ?>">Hewan</a></li>
                            <li class="scroll-to-section"><a href="<?php echo base_url('Main/riwayatAdopsi') ?>">Riwayat Adopsi</a></li>
                            <li class="scroll-to-section"><a href="" data-toggle="modal" data-target="#addAnimalModal">Posting Hewan</a></li>
                            <li class="scroll-to-section"><a href="<?php echo base_url('Main/kontakKami') ?>">Kontak Kami</a></li>
                            <li class="submenu">
                                <a href="#">Deteksi Ras</a>
                                <ul>
                                    <li><a href="<?php echo base_url('Main/fiturCekRasAnjing') ?>">Untuk Anjing</a></li>
                                    <li><a href="<?php echo base_url('Main/fiturCekRasKucing') ?>">Untuk Kucing</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="fas fa-solid fa-user"></i></a>
                                <ul>
                                    <li class="scroll-to-section"><a href="/" onclick="return false;">Halo , <?php echo $this->session->userdata('Namalengkap');?></a></li>
                                    <li><a href="<?php echo base_url('Main/dataProfile') ?>"><i class="fas fa-solid fa-address-card"></i> Profile</a></li>
                                    <li><a href="<?php echo base_url('Main/dataHewanByUser') ?>"><i class="fas fa-solid fa-cat"></i><i class="fas fa-solid fa-dog"></i>Data Hewan Anda</a></li>
                                    <li>
                                        <a href="" href="" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Add Animal Modal -->
    <div class="modal fade bd-example-modal-lg" id="addAnimalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Posting Hewan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-warning">Perhatikan Sebelum Memposting Hewan Untuk Diadopsi!</h6>
                            <p class="text-danger">
                                1. Pastikan data anda valid dan sudah mengisi profile.<br>
                                2. Pastikan data hewan yang diposting merupakan data real(AdoptMe akan melakukan verifikasi disaat ada pengguna ingin mengadopsi).<br>
                            </p>
                        </div>
                    </div>
                    <form id="addAnimalForm" action="<?php echo site_url('Admin/adminc/addAnimalUser'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" id="userID" name="userID" value="<?php echo $this->session->userdata('UserID'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="animalname">Nama Hewan:</label>
                            <input type="text" class="form-control" id="animalname" name="animalname" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Usia dalam bulan : (jika tidak diketahui isi 0)</label>
                            <input type="number" class="form-control" id="age" name="age" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="text-danger">Deskripsi : <br>(ceritakan semua mencangkup lokasi, alasan, ditemukan jika hewan liar, kondisi)</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="status" name="status" value="1">
                        </div>
                        <div class="form-group">
                            <label for="jenis_anjing">Jenis Hewan:</label><br>
                            <input type="radio" id="jenis_anjing" name="jenis" value="1">
                            <label for="jenis_anjing">Anjing</label><br>
                            <input type="radio" id="jenis_kucing" name="jenis" value="2">
                            <label for="jenis_kucing">Kucing</label><br>
                        </div>
                        <div id="rasList" class="form-group">
                            <label for="rasID">Pilih Ras Hewan:</label>
                            <select class="form-control" id="rasID" name="rasID" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="text-danger">Gambar <br>(Maksimal 4 gambar):</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar[]" accept="image/*" multiple required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline-success posthewan">Posting Hewan</button>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-danger">Dengan Memposting Anda Sudah Setuju Dengan Segala Aturan Dari AdoptMe</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>