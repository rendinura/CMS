<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/niceadmin/') ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/niceadmin/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/niceadmin/') ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <script src="https://cdn.tiny.cloud/1/7swq3xdmfcao5mekf04x4ll3mplj0odf3gy9y0ffied91h90/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url('auth/logout'); ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url('assets/niceadmin/') ?>assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url('assets/niceadmin/') ?>assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('nama'); ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $this->session->userdata('nama'); ?></h6>
                            <span><?= $this->session->userdata('level'); ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout'); ?>">
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
            <?php $menu = $this->uri->segment(2); ?>
            <li class="nav-item">
                <a class="nav-link <?php if ($menu == 'home') {
                                        echo "";
                                    } else {
                                        echo "collapsed";
                                    } ?>" href="<?= site_url('Admin/home') ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link <?php if ($menu == 'caraousel') {
                                        echo "";
                                    } else {
                                        echo "collapsed";
                                    } ?>" href="<?= site_url('Admin/caraousel') ?>">
                    <i class="bi bi-aspect-ratio"></i>
                    <span>Caraousel</span>
                </a>
            </li><!-- End Caraousel Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?php if ($menu == 'kategori') {
                                        echo "";
                                    } else {
                                        echo "collapsed";
                                    } ?>" href="<?= site_url('Admin/kategori') ?>">
                    <i class="bi bi-collection"></i>
                    <span>Kategori Konten</span>
                </a>
            </li><!-- End Kategori Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?php if ($menu == 'konten') {
                                        echo "";
                                    } else {
                                        echo "collapsed";
                                    } ?>" href="<?= site_url('Admin/konten') ?>">
                    <i class="bi bi-badge-4k"></i>
                    <span>Konten</span>
                </a>
            </li><!-- End Konten Page Nav -->

            <?php if ($this->session->userdata('level') == "Admin") { ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($menu == 'user') {
                                            echo "";
                                        } else {
                                            echo "collapsed";
                                        } ?>" href="<?= site_url('Admin/user') ?>">
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li><!-- End User Page Nav -->

                <li class="nav-item">
                    <a class="nav-link <?php if ($menu == 'konfigurasi') {
                                            echo "";
                                        } else {
                                            echo "collapsed";
                                        } ?>" href="<?= site_url('Admin/konfigurasi') ?>">
                        <i class="bi bi-brush"></i>
                        <span>Configuration</span>
                    </a>
                </li><!-- End Config Page Nav -->

                <li class="nav-item">
                    <a class="nav-link <?php if ($menu == 'galeri') {
                                            echo "";
                                        } else {
                                            echo "collapsed";
                                        } ?>" href="<?= site_url('Admin/galeri') ?>">
                        <i class="bi bi-card-image"></i>
                        <span>Galeri</span>
                    </a>
                </li><!-- End Galeri Page Nav -->


                <li class="nav-item">
                    <a class="nav-link <?php if ($menu == 'recent_login') {
                                            echo "";
                                        } else {
                                            echo "collapsed";
                                        } ?>" href="<?= site_url('Admin/recent_login') ?>">
                        <i class="bi bi-info-square"></i>
                        <span>User Activity</span>
                    </a>
                </li>
                <!-- End Galeri contact Nav -->

            <?php } ?>
            <li class="nav-item">
                <a class="nav-link <?php if ($menu == 'contact') {
                                        echo "";
                                    } else {
                                        echo "collapsed";
                                    } ?>" href="<?= site_url('Admin/contact') ?>">
                    <i class="bi bi-chat"></i>
                    <span>Kritik dan Saran</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <?= $contents; ?>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer flex-bottom">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/php-email-form/validate.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <script>
        $('#ngilang').delay('slow').slideDown('slow').delay(1500).slideUp(600);
    </script>
    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/niceadmin/') ?>assets/js/main.js"></script>

    <!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/aq37vou6o6fl7r2lfo92721t18z6173r03hevnh6qpu52i0f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
</body>

</html>