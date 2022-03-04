<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simaspadu | Tentang</title>
    <link rel="icon" href="<?= base_url(); ?>assets_frontend/assets/images/masjid.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/bootstrap.min.css">
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/owl.carousel.min.css">
    <!-- Tabs CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/tabulous.css"> -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- magnific popup CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <!--::HEADER PART START::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href=""> <img src="<?= base_url(); ?>assets_frontend/assets/mushola.png" alt="logo" width="120px">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                            <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('frontend/')?>">Beranda</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('frontend/laporan')?>">Laporan</a>
                                </li>
                                <li class="nav-item active">
                                <a class="nav-link" href="<?= base_url('frontend/tentang')?>">Tentang</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('frontend/contact/')?>">Kontak</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('login/') ?>">Login</a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="blog.html">blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER PART END-->
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <section class="sub-banner">
            <!--CONTAINER START-->
            <div class="container">
                <div class="sab_banner_text text-center">
                    <h2>Tentang Kami</h2>
                    <ul class="breadcrumb">
                        <li class="item-home"><a class="bread-link bread-home" href="#" title="Homepage">Homepage</a>
                        </li>
                        <li class="item-current item-122"><strong class="bread-current bread-122"> Informasi</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <!--CONTAINER END-->
        </section>
        <!-- END BREADCRUMBS -->


        <div class="wrapper d-flex align-items-stretch learing-center">
            <nav id="sidebar">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                </div>
                <div class="p-4">
                    <h1><a href="" class="logo"><i class="fas fa-mosque"> DKM </i><span>Mushola Al-Amin</span></a></h1>
                    <ul class="tabs list-unstyled components mb-5">
                        <li class="tab-link current" data-tab="tab-1" title="The distance of the feet in salah">
                            1. Pengurus
                        </li>
                        <li class="tab-link" data-tab="tab-2">2. Inventaris</li>
                        <li class="tab-link" data-tab="tab-3">3. Kegiatan</li>

                    </ul>

                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                <div class=" tabs ">
                    <div id="tab-1" class="tab-content current main-content fade-in-fwd ">
                        <h4><span class="badge badge-info"></span> Data Pengurus</h4>
                        <table class="table " width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Jabatan</th>
                                <th>Nama</th>
                                <th>No.Telepon</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php $no=1; foreach ($struktural as $s) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $s->jabatan ?></td>
                                <td><?= $s->nama_struktural ?></td>
                                <td><?= $s->notelp ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    </div>
                    <div id="tab-2" class="tab-content main-content fade-in-fwd ">
                        <h4> Menampilkan Data Inventaris </h4>
                        <p> Progress
                        </p>
                    </div>
                    <div id="tab-3" class="tab-content main-content fade-in-fwd">
                        <!-- <h4> Menampilkan Data Kegiatan </h4> -->
                        <section class="about-area text-center ptb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title">
                                <h2><span class="badge badge-info">Kajian</span></h2>
                                <span class="sec-title-icon">
                                    <img src="<?= base_url(); ?>assets_frontend/assets/images/title-icon.png" alt="icon-title">
                                </span>
                        <!-- <p class="desc">The Masjid Timetable app has been created fee sabeelillah.<br>
                            Please make dua for the creator of this app, that Allah saves him from all forms of
                            punishment in the hereafter.
                        </p> -->
                    </div>
                </div>
            </div>
            <div class="row">
            <?php $i = 1; ?>
				<?php foreach ($kajian as $k) : ?>
                <div class="col-lg-4">
                    <div class="single-about-box">
                        <i class="icofont icofont-ruler-pencil"></i>
                        <img src="<?= base_url('assets/image/kajian/') . $k['image']; ?>" alt="icon">
                        <h4><span class="badge badge-info"><?= $k['tema']; ?></span></h4>
                        <p>Tanggal:<?= $k['waktu']; ?><br>Pemateri: <?= $k['pemateri']; ?><br>Tempat: <?= $k['tempat']; ?><br></p>

                    </div>
						</div>
						<?php $i++; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- END PAGE CONTAINER -->
    <!-- Start Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Terkait</h6>
                    <p class="text-justify">Q.S. al-Tawbah: 18 Allah swt. berfirman, yang artinya; “Sesungguhnya hanya yang memakmurkan masjid-masjid Allah ialah orang-orang yang beriman kepada Allah dan hari akhir, serta tetap mendirikan shalat, menunaikan zakat dan tidak takut (kepada siapapun) selain kepada Allah,
                        Maka merekalah orang-orang yang diharapkan Termasuk golongan orang-orang yang mendapat petunjuk”.
                    </p>
                </div>

                <!-- <div class="col-xs-6 col-md-3">
                    <h6>Download</h6>
                    <ul class="footer-links">
                        <li>
                            <a href="https://play.google.com/store/apps/details?id=com.masjid.timetable&hl=en_GB"
                                target="_blank" class="download-btn flexbox-center">
                                <div class="download-btn-icon">
                                    <i class="icofont icofont-brand-android-robot"></i>
                                    <img src="<?= base_url(); ?>assets_frontend/assets/images/icons/google-play.svg">
                                </div>
                                <div class="download-btn-text">
                                    <h4>Android Store</h4>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://apps.apple.com/us/app/masjid-timetable/id461959243" target="_blank"
                                class="download-btn flexbox-center">
                                <div class="download-btn-icon">
                                    <img src="<?= base_url(); ?>assets_frontend/assets/images/icons/app-store.svg">
                                </div>
                                <div class="download-btn-text">
                                    <h4>Apple Store</h4>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#">Masjid Data</a></li>
                        <li><a href="#">Learning Center</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div> -->
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <!-- <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by Lentrica Software</p> -->
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li class="skype-icon">
                        <p class="copyright-text">Copyright &copy; 2021
                            <img src="<?= base_url(); ?>assets_frontend/assets/images/icons/skype.svg" alt="icon">
                            <span>simaspadu<i id="skype-id"></p></i></span>
                        </li>                        <!-- <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li> -->
                        <!-- <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li> -->
                        <!-- <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jquery plugins here-->

    <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery.magnific-popup.js"></script>
    <!-- owl.carousel js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery.nice-select.min.js"></script>
    <!-- swiper js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/slick.min.js"></script>
    <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery.form.js"></script>
    <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery.validate.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets_frontend/assets/js/tabs.min.js"></script> -->
    <!-- custom js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/custom.js"></script>
    <script src="<?= base_url(); ?>assets_frontend/assets/js/wow.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        new WOW().init();
        AOS.init();
    </script>
</body>

</html>