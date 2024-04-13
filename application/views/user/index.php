<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AdoptMe</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/index-style.css');?>" rel="stylesheet">
</head>

<body>

    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a  href="#home">home</a></li>
                                        <li><a href="#service">service</a></li>
                                        <li><a href="#about">about</a></li>
                                        <li><a href="#adopt">care</a></li>
                                        <li><a href="#contact">contact</a></li>
                                        <li><a class="text-success" href="<?php echo base_url('main/login')?>">Login</a></li>
                                        <li><a class="text-success" href="<?php echo base_url('main/register')?>">Register</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- slider_area_start -->
    <section id="home">
        <div class="slider_area">
            <div class="single_slider slider_bg_1 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="slider_text">
                                <h3>AdoptME <br> <span>We Care About Homeless Pets</span></h3>
                                <p>Your Home, MY HOME</p>
                                <br>
                                <a href="contact.html" class="boxed-btn4">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dog_thumb d-none d-lg-block">
                    <img src="<?php echo base_url('assets/img/banner/dog.png');?>" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- slider_area_end -->

    <!-- service_area_start  -->
    <section id="service">
        <div class="service_area">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-7 col-md-10">
                        <div class="section_title text-center mb-95">
                            <h3>Rumah Bagi Semua Hewan</h3>
                            <p>
                                AdoptMe memberikan jaminan bahwa hewan yang akan di adopsi siap secara kesehatan dan kejiwaan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_service">
                             <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                                 <div class="service_icon">
                                    <img src="<?php echo base_url('assets/img/service/service_icon_1.png');?>" alt="">
                                 </div>
                             </div>
                             <div class="service_content text-center">
                                <h3>Costumer Service & Care</h3>
                                <p>
                                    Kami menyediakan layanan costumer service dan care kepada para pengguna AdoptMe.
                                </p>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_service active">
                             <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                                 <div class="service_icon">
                                     <img src="<?php echo base_url('assets/img/service/service_icon_2.png');?>" alt="">
                                 </div>
                             </div>
                             <div class="service_content text-center">
                                <h3>Fitur Deteksi Ras Hewan</h3>
                                <p>
                                    Mendeteksi Ras Hewan yang anda cari dengan menggunakan fitur deteksi Ras Hewan kami.
                                </p>
                             </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_service">
                             <div class="service_thumb service_icon_bg_1 d-flex align-items-center justify-content-center">
                                 <div class="service_icon">
                                     <img src="<?php echo base_url('assets/img/service/service_icon_3.png');?>" alt="">
                                 </div>
                             </div>
                             <div class="service_content text-center">
                                <h3>Adopsi Mudah dan Cepat</h3>
                                <p>
                                    Proses Adopsi Tidak Akan Memakan Waktu Yang Lama dan Segala Urusan Sangat Mudah.
                                </p>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service_area_end -->

    <!-- pet_care_area_start  -->
    <section id="about">
        <div class="pet_care_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="pet_thumb">
                            <img src="<?php echo base_url('assets/img/about/pet_care.png')?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-6">
                        <div class="pet_info">
                            <div class="section_title">
                                <h3><span>Kami Peludi Akan Hewan Peliharaan</span> <br>
                                    Seperti Anda Juga</h3>
                                <p>
                                    Menurut data dari Dinas Ketahanan Pangan, Kelautan, dan Pertanian (KPKP), Pada akhir tahun 2018, jumlah anjing dan kucing yang divaksin mencapai 33.000 ekor. Pada tahun 2021, populasi kucing di Jakarta diperkirakan sekitar 2,8 juta ekor, atau setara dengan 25% populasi penduduk Jakarta
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- pet_care_area_end  -->

    <!-- adapt_area_start  -->
    <section id="adopt">
        <div class="adapt_area">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5">
                        <div class="adapt_help">
                            <div class="section_title">
                                <h3><span>Kami Membutuhkan Anda</span><br>
                                    Bantu AdoptMe</h3>
                                <p>
                                    Dengan Mengadopsi Mereka Bantuan anda sangat berarti untuk hewan-hewan ini karena dengan memberikan mereka kenyamanan, keamanan, dan rumah yang baik bagi mereka.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="adapt_about">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_adapt text-center">
                                        <img src="<?php echo base_url('assets/img/adapt_icon/1.png')?>" alt="">
                                        <div class="adapt_content">
                                            <h3 class="counter">20</h3>
                                            <p>Kucing Tersedia</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single_adapt text-center">
                                        <img src="<?php echo base_url('assets/img/adapt_icon/2.png')?>" alt="">
                                        <div class="adapt_content">
                                            <h3 class="counter">20</h3>
                                            <p>Anjing Tersedia</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- adapt_area_end  -->

    <section id="contact">
        <div class="contact_anipat anipat_bg_1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact_text text-center">
                            <div class="section_title text-center">
                                <h3>Mengapa AdoptMe ?</h3>
                                <p>
                                    Kami Percaya Bahwa Kami Bisa memberikan kepuasan terhadap pengguna dengan adanya fitur dan layanan yang kami sediakan secara gratis.
                                </p>
                            </div>
                            <div class="contact_btn d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Contact Us
                            </h3>
                            <ul class="address_line">
                                <li>+62893232990</li>
                                <li><a href="#">AdoptMe@company.com</a></li>
                                <li>Daerah Khusus Jakarta</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Kategori Hewan
                            </h3>
                            <ul class="links">
                                <li><a href="#">Anjing</a></li>
                                <li><a href="#">Kucing</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Link Yang Berguna
                            </h3>
                            <ul class="links">
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                            <p class="address_text">Daerah Khusus Jakarta
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="bordered_1px"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> AdoptMe Co., Ltd. All Rights Reserved.  <i class="ti-heart" aria-hidden="true"></i>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->


    <!-- JS here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/index-main.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.slicknav.min.js')?>"></script>
</body>

</html>