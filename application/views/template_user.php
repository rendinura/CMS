<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $judul ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/remember/') ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/remember/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/remember/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/remember/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/remember/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/remember/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/remember/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/remember/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/remember/') ?>assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><span><?= $konfig->email; ?></span></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span><?= $konfig->no_wa; ?></span></i>
                <i class="bi bi-door-open m-3"><a href="<?= base_url('auth') ?>">login</a></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="https://wa.me/6285732545684" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                <a href="<?= $konfig->facebook ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?= $konfig->instagram ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">

        <div class="container d-flex justify-content-between">

            <div class="logo">
                <a href="#">
                    <h1 class="text-light"><i class="bi bi-battery-charging text-light"></i><?= $konfig->judul_website ?></h1>
                </a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <?php $menu = $this->uri->segment(1); ?>
                    <li><a class="nav-link scrollto  <?php if ($menu == null) {
                                                            echo "active";
                                                        } else {
                                                            echo "";
                                                        } ?>" href="<?= base_url() ?>">Home</a>
                    </li>

                    <!-- dropdown -->
                    <li class="dropdown">
                        <a class="nav-link scrollto <?php if ($menu != null && $this->uri->segment(2) == 'kategori') {
                                                        echo "active";
                                                    } else {
                                                        echo "";
                                                    } ?>"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <?php foreach ($kategori as $kat) { ?>
                                <li>
                                    <a href="<?= base_url('Home/kategori/' . $kat['id_kategori']) ?>"><?= $kat['nama_kategori'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li><a class="nav-link scrollto <?php if ($menu != null && $this->uri->segment(2) == 'galeri') {
                                                        echo "active";
                                                    } else {
                                                        echo "";
                                                    } ?>" href="<?= base_url('Home/galeri') ?>">Galeri</a></li>
                    <!-- <li><a class="nav-link scrollto" href="">About</a></li> -->
                    <li><a class="nav-link scrollto <?php if ($menu != null && $this->uri->segment(2) == 'contact') {
                                                        echo "active";
                                                    } else {
                                                        echo "";
                                                    } ?>" href="<?= base_url('Home/contact') ?>">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <!-- End Hero -->

    <?= $contents; ?>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row justify-content-center flex flex-wrap">
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-box about-widget">
                                    <h1 class="widget-title"><?= $konfig->judul_website; ?></h1>
                                    <p><?= $konfig->profile_website; ?></p>
                                </div>
                                <div class="social-links">
                                    <!-- <a href="#" class="twitter"><i class="bx bxl-tiktok"></i></a> -->
                                    <a href="<?= $konfig->facebook ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                                    <a href="<?= $konfig->instagram ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                                    <a href="https://wa.me/6285732545684" class="google-plus"><i class="bx bxl-whatsapp"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="pages">
                                    <h2 class="widget-title">Contac Us</h2>
                                    <ul>
                                        <div>
                                            <p>
                                            <h5><i class="bi bi-pin-map"></i> Alamat</h5>
                                            <?= $konfig->alamat; ?></p>

                                            <p>
                                            <h5><i class="bi bi-envelope"></i> Email</h5>
                                            <?= $konfig->email; ?></p>

                                            <p>
                                            <h5><i class="bi bi-telephone"></i> Phone</h5>
                                            <?= $konfig->no_wa; ?></p>
                                        </div>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-box pages">
                                    <h2 class="widget-title">Pages</h2>
                                    <div class="row"><i class="bi bi-chevron-right mr-2"> <a href="#">Home</a></i>
                                        <?php foreach ($kategori as $kat) { ?>
                                            <i class="bi bi-chevron-right mr-2"><a href="<?= base_url('Home/kategori/' . $kat['id_kategori']) ?>"><?= $kat['nama_kategori'] ?></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <h2 class="widget-title">Recent Post</h2>
                                <!-- post-item -->
                                <?php foreach ($konten2 as $us) { ?>
                                    <ul class="list-unstyled widget-list">
                                        <li class="media widget-post align-items-center">
                                            <article class="row">
                                                <i class="bi bi-chevron-right mr-2"><a href="<?= base_url('Home/artikel/' . $us['slug']); ?>"><?= $us['judul'] ?></i></a>
                                            </article>
                                        </li>
                                    </ul>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span><?= $konfig->judul_website; ?></span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/remember/') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('assets/remember/') ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets/remember/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/remember/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets/remember/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets/remember/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets/remember/') ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/remember/') ?>assets/js/main.js"></script>

</body>

</html>