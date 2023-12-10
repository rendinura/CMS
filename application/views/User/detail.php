<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2><?= $konten->judul ?></h2>
                <ol>
                    <li><a href="<?= base_url() ?>">Home</a></li>

                    <li><?= $konten->nama_kategori ?></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <?php
                if ($konten == null) {
                    echo 'MAAF KONTEN TIDAK TERSEDIA ;(';
                } else {
                ?>
                    <div class="row gy-4 col-lg-8">
                        <img class="img-fluid" src="<?= base_url('assets/upload/konten/' . $konten->foto) ?>">


                        <div class="portfolio-description">
                            <h3 class="h5">
                                <h2><?= $konten->judul ?></h2>
                            </h3>
                            <ul class="list-inline post-meta mb-2">
                                <small>
                                    <i class="bi bi-person mr-2">
                                        <li class="list-inline-item"><?= $konten->nama ?>
                                        </li>
                                        <li class="list-inline-item">Date : <?= $konten->tanggal ?></li>
                                        <li class="list-inline-item">Category : <?= $konten->nama_kategori ?> </li>
                                    </i>
                                </small>
                            </ul>
                            <p><?= $konten->keterangan ?></p>
                        </div>
                    </div>

                    <aside class="col-lg-4 mt-5">
                        <!-- Search -->
                        <div class="widget">
                            <h5 class="widget-title"><span></span></h5>

                            <form action="<?php echo base_url('Home/hasil_pencarian'); ?>" method="post">
                                <input type="text" name="keyword" placeholder="Pencarian..." autocomplete="off">
                                <input type="submit" value="Cari">
                            </form>

                        </div>
                        <!-- categories -->
                        <div class="widget">
                            <div class="widget mt-4">
                                <h5 class="widget-title"><span>Categories</span></h5>
                                <ul class="list-inline widget-list-inline">
                                    <?php foreach ($kategori as $kat) { ?>
                                        <li class="list-inline-item">
                                            <div class="btn-wrap cta-btn">
                                                <a class="btn btn-secondary mt-2" href="<?= base_url('Home/kategori/' . $kat['id_kategori']) ?>"><?= $kat['nama_kategori'] ?></a>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- latest post -->
                        <div class="widget">
                            <div class="section-title mt-5 mb-3">
                                <h3>Recent<span> Post</span></h3>
                            </div>
                            <!-- post-item -->
                            <?php foreach ($konten2 as $us) { ?>
                                <ul class="list-unstyled widget-list">
                                    <li class="media widget-post align-items-center">

                                        <article class="row mb-3">
                                            <div class="col-md-2 justify-content-center align-items-center">
                                                <img class="mt-2 mb-2" style="width: 100%; border-radius: 50%; width: 60px; height: 60px;" src="<?= base_url('assets/upload/konten/' . $us['foto']) ?>">
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <h3 class="h5">
                                                    <a class="post-title" href="<?= base_url('Home/artikel/' . $us['slug']); ?>"><?= $us['judul'] ?></a>
                                                </h3>
                                                <small>
                                                    <ul class="list-inline post-meta mb-2">
                                                        <li class="list-inline-item"> <i class="bi bi-person "></i><?= $us['nama'] ?>
                                                        <li class="list-inline-item">Tanggal : <?= $us['tanggal'] ?>
                                                        <li class="list-inline-item">Category : <?= $us['nama_kategori'] ?>
                                                        </li>
                                                    </ul>
                                                </small>
                                            </div>
                                        </article>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </aside>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End Portfolio Details Section -->

</main>