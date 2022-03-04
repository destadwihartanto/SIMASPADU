<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Simaspadu |  Data</title>
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

    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css
    "/> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets_frontend/assets/datatable/jquery.dataTables.css">
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
                                <li class="nav-item active">
                                <a class="nav-link" href="<?= base_url('frontend/laporan')?>">Laporan</a>
                                </li>
                                <li class="nav-item">
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
    <!-- Header part End-->
    <!-- BEGIN PAGE CONTAINER -->
    <div class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <section class="sub-banner">
            <!--CONTAINER START-->
            <div class="container">
                <div class="sab_banner_text text-center">
                    <h2>Informasi</h2>
                    <ul class="breadcrumb">
                        <li class="item-home">
                            <a class="bread-link bread-home" href="#">Homepage</a>
                        </li>
                        <li class="item-current item-122"><strong class="bread-current bread-122">
                                 Laporan</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <!--CONTAINER END-->
        </section>
        <!-- END BREADCRUMBS -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title mt-5">
                        <h2> Kas
                        </h2>
                        <span class="sec-title-icon">
                            <img src="<?= base_url(); ?>assets_frontend/assets/images/title-icon.png" alt="icon-title">
                        </span>
                        <p class="desc">Laporan Keuangan<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <section class="masjid-data-sec">
            <div class="container">
                <div class="table-responsive">
                    <table id="masjid-info-table" class="table table-bordered table-dark  table-hover"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Dibuat</th>
                            </tr>
                        </thead>
                        <tbody>
								<?php
								$i = 1;
								$total = 0;
								?>
								<?php foreach ($kas as $p) :
                                ?>
                            <tr>
                            <th scope="row"><?= $i ?></th>
										<td><?= $p['tgl']; ?></td>
										<td><?= $p['keterangan']; ?></td>
										<td><?= number_format($p['debet'], 0, '', ',') ?></td>
										<td><?= number_format($p['kredit'], 0, '', ',') ?></td>
										<!-- <td></td> -->
										<td><?= $p['created']; ?></td>
                            </tr>
                            <?php $i++; ?>
								<?php endforeach; ?>
                        </tbody>
                        <tr>
								<th colspan="3" style="text-align: center; font-size: 15px" class="alert alert-dark">Cashflow </th>
								<th colspan="1" style="text-align: center; font-size: 15px" class="alert alert-info"><?php echo "Rp." . number_format($total_debet) . ",-"; ?></th>
								<th colspan="1" style="text-align: center; font-size: 15px" class="alert alert-warning"><?php echo "Rp." . number_format($total_kredit) . ",-"; ?></th>
								<th colspan="3"   style="font-size: 15px; text-align: left;" class="danger alert-danger"><i class="badge badge-success"><h3>Saldo Akhir : <?php echo "Rp." . number_format($total_saldo) . ",-"; ?></i></h3></th>
							</tr>
                    </table>
                    </div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- End of Main Content -->
</div>
</div>
            <!-- Modal -->
        </section>
        <!--End masjid-data-sec-->
    </div>
    <!-- END PAGE CONTAINER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Terkait</h6>
                    <p class="text-justify">QS Al Hadid: 7. “Berimanlah kamu kepada Allah dan Rasul-Nya dan nafkahkanlah sebagian hartamu yang telah Allah menjadikan kamu menguasainya.
                        Maka orang-orang yang beriman di antara kamu dan menafkahkan (sebagian) dari hartanya memperoleh pahala yang besar.”
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
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal">Masjid Data</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal">Learning Center</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal">Privacy Policy</a></li>
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
                         </li>
                        <!-- <li><a class="facebook" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-facebook"></i></a></li> -->
                        <!-- <li><a class="dribbble" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-dribbble"></i></a></li> -->
                        <!-- <li><a class="linkedin" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-linkedin"></i></a></li> -->
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
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
    <script type="text/javascript" src="<?= base_url(); ?>assets_frontend/assets/datatable/jquery.dataTables.min.js"></script>
    <!-- custom js -->
    <script src="<?= base_url(); ?>assets_frontend/assets/js/custom.js"></script>
</body>

</html>