<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simaspadu | Kontak</title>
    <link rel="icon" href="<?= base_url(); ?>assets_frontend/assets/images/masjid.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/bootstrap.min.css">
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/css/owl.carousel.min.css">

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
    <!--::header part start::-->
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
                                <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('frontend/tentang')?>">Tentang</a>
                                </li>
                                <li class="nav-item active">
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
    <!-- Header part End-->
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-content">
    <!-- BEGIN BREADCRUMBS -->
    <section class="sub-banner">
        <!--CONTAINER START-->
        <div class="container">
            <div class="sab_banner_text text-center">
                <h2>Kontak</h2>
                <ul class="breadcrumb">
                    <li class="item-home"><a class="bread-link bread-home" href="#" title="Homepage">Homepage</a>
                    </li>
                    <li class="item-current item-122"><strong class="bread-current bread-122">
                            Kontak</strong>
                    </li>
                </ul>
            </div>
        </div>
        <!--CONTAINER END-->
    </section>
    <!-- END BREADCRUMBS -->

    <section>
        <!-- style="background-image: url('<?= base_url(); ?>assets_frontend/assets/images/banner/banner10.jpg');" -->
        <div class="bg-contact100" >
            <div class="container-contact100">
                <div class="wrap-contact100">
                    <div class="contact100-pic js-tilt" data-tilt>
                        <img src="<?= base_url(); ?>assets_frontend/assets/images/img-01.png" alt="IMG">

                    </div>

                    <form class="contact100-form validate-form" method="POST">
                        <span class="contact100-form-title">
                            Get in touch
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Name is required">
                            <input class="input100" type="text" name="name" placeholder="Name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="input100" type="text" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Message is required">
                            <textarea class="input100" name="message" placeholder="Message"></textarea>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-contact100-form-btn">
                            <button class="contact100-form-btn">
                                Send
                            </button>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </section>

    </div> <!-- END PAGE CONTAINER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Terkait</h6>
                    <p class="text-justify">Hanyalah yang memakmurkan masjid-masjid Allah ialah orang-orang yang beriman kepada Allah dan hari kemudian, serta tetap mendirikan shalat, menunaikan zakat dan tidak takut (kepada siapapun) selain Allah,
                         maka merekalah yang termasuk golongan orang-orang yang selalu mendapat petunjuk (dari Allah Ta???ala)??? (QS At-Taubah: 18).
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Link Terkait</h6>
                    <ul class="footer-links">
                        <li>
                            <a href="https://simas.kemenag.go.id/"
                                target="_blank" class="download-btn flexbox-center">
                                <div class="download-btn-icon">
                                    <i class="icofont icofont-brand-android-robot"></i>
                                    <!-- <img src="<?= base_url(); ?>assets_frontend/assets/images/icons/google-play.svg"> -->
                                </div>
                                <div class="download-btn-text">
                                    <p>simas kemenag</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.istiqlal.or.id/" target="_blank"
                                class="download-btn flexbox-center">
                                <div class="download-btn-icon">
                                    <!-- <img src="<?= base_url(); ?>assets_frontend/assets/images/icons/app-store.svg"> -->
                                </div>
                                <div class="download-btn-text">
                                    <p>Istiqlal</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <!-- <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#">Masjid Data</a></li>
                        <li><a href="#">Learning Center</a></li>
                        <li><a href="#">Privacy Policy</a></li> -->
                    </ul>
                </div>
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
                                </li>
                        <!-- <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li> -->
                        <!-- <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li> -->
                        <!-- <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>


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
    <!-- <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery.counterup.min.js"></script> -->
    <!-- <script src="<?= base_url(); ?>assets_frontend/assets/js/waypoints.min.js"></script> -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery.form.js"></script>
    <script src="<?= base_url(); ?>assets_frontend/assets/js/jquery.validate.min.js"></script>
    <!-- custom js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/custom.js"></script>
</body>

</html>