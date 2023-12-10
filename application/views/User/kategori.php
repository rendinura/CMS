<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <?php
            if ($konten == null) {
                echo 'MAAF KATEGORI TIDAK TERSEDIA ;(';
            } else {
            ?>
                <div class="section-title" data-aos="zoom-in">
                    <h3>Kategori <span><?= $nama_kategori ?></span></h3>
                </div>

                <div class="row">

                    <?php foreach ($konten as $us) { ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 d-flex align-items-stretch mt-4 pb-3">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
                                <div class="container mb-3">
                                    <img class="card-img-top mb-2;" style="border-radius: 5%;" src="<?= base_url('assets/upload/konten/' . $us['foto']) ?>">
                                </div>
                                <h3 class="h5">
                                    <a class="post-title" href="<?= base_url('Home/artikel/' . $us['slug']); ?>"><?= $us['judul'] ?></a>
                                </h3>
                                <ul class="list-inline post-meta mb-2">
                                    <small>
                                        <i class="bi bi-person mr-2">
                                            <li class="list-inline-item"><?= $us['nama']  ?>
                                            </li>
                                            <li class="list-inline-item">Date : <?= $us['tanggal'] ?></li>
                                            <li class="list-inline-item">Categories : <?= $us['nama_kategori'] ?> </li>
                                        </i>
                                    </small>
                                </ul>
                                <p>
                                <p>
                                    <?php
                                    $keterangan = $us['keterangan'];

                                    $maxLength = 70;
                                    $kategoriSlug = $us['slug'];

                                    if (strlen($keterangan) > $maxLength) {
                                        $shortText = substr($keterangan, 0, $maxLength);
                                        $shortText .= '... <a href="' . base_url('Home/artikel/' . $kategoriSlug) . '">Baca Selengkapnya..</a>';
                                    } else {
                                        $shortText = $keterangan .= ' <a href="' . base_url('Home/artikel/' . $kategoriSlug) . '">Baca Selengkapnya..</a>';
                                    }

                                    echo $shortText;
                                    ?>
                                </p>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>


        </div>
    </section>
    <!-- End Services Section -->

</main>