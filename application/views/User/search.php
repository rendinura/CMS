<main id="main">


    <section class="section" id="konten">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-t mb-lg-0" data-aos="fade-up">
                    <article class="row mb-5">
                        <h2>Hasil Pencarian : <?= $keyword ?></h2>

                        <?php if (!empty($results)) : ?>
                            <ul>
                                <?php foreach ($results as $result) : ?>
                                    <div class="col-md-4 mb-md-0">
                                        <div class="post-slider slider-sm">
                                            <img style="border-radius: 5%;" src="<?= base_url('assets/upload/konten/' . $result->foto) ?>" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <h3 class="h5">
                                            <a class="post-title" href="<?= base_url('Home/artikel/' . $result->slug); ?>"><?= $result->judul ?></a>
                                        </h3>
                                        <ul class="list-inline post-meta mb-2">
                                            <small>
                                                <i class="bi bi-person mr-2">
                                                    <li class="list-inline-item"><?= $result->username ?>
                                                    </li>
                                                    <li class="list-inline-item">Date : 05 October 2023</li>
                                                    <li class="list-inline-item">Categories : <?php $kategorinama = $this->db->where('id_kategori', $result->id_kategori)->get('kategori')->row()->nama_kategori;
                                                                                                echo $kategorinama ?></li>
                                                </i>
                                            </small>
                                        </ul>
                                        <p>
                                            <?php
                                            $keterangan = $result->keterangan;

                                            $maxLength = 150;
                                            $kategoriSlug = $result->slug;

                                            if (strlen($keterangan) > $maxLength) {
                                                $shortText = substr($keterangan, 0, $maxLength);
                                                $shortText .= '... <a href="' . base_url('Home/artikel/' . $kategoriSlug) . '">Baca Selengkapnya</a>';
                                            } else {
                                                $shortText = $keterangan .= ' <a href="' . base_url('Home/artikel/' . $kategoriSlug) . '">Baca Selengkapnya</a>';
                                            }

                                            echo $shortText;
                                            ?>
                                        </p>
                                    </div>
                                <?php endforeach; ?>
                                <a href="<?= base_url(); ?>">Back</a>
                            </ul>
                        <?php else : ?>
                            <p>Tidak ada hasil yang ditemukan.</p>
                        <?php endif; ?>
                    </article>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <!-- <?= $pagination ?> -->
                        </ul>
                    </nav>
                </div>


                <aside class="col-lg-4" data-aos="fade-up">
                    <!-- Search -->
                    <div class="widget">
                        <h5 class="widget-title"><span></span></h5>

                        <form action="<?php echo base_url('Home/hasil_pencarian'); ?>" method="post">
                            <input type="text" name="keyword" placeholder="Pencarian..." autocomplete="off">
                            <input type="submit" value="Cari">
                        </form>

                        <!-- <form action="https://pipapip.web.id/siswa/XI-RB-Bagas/Home" method="post" class="widget-search">
                        <div class="row mb-2">
                            <input class="col-8" id="search-query" name="search" type="text" placeholder="Pencarian.." autocomplete="off">
                            <input type="submit" value="Search" name="submit" class="btn btn-primary col-3">
                        </div>
                    </form> -->
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
                        <h5 class="widget-title mt-5 mb-3"><span>Recent Post</span></h5>
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
                                                    <li class="list-inline-item">05 October 2023</li>
                                                </ul>
                                            </small>
                                        </div>
                                    </article>
                                </li>
                            </ul>
                        <?php } ?>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <!-- <div class="container col-lg-12">
    <div class="row">
        <div class="col-lg">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0ug5NqcwcFR2xrfTkc7k8e?utm_source=generator" width="100%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <div class="col-lg">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/2X62SjtuwVQiGiZvZZ9Ztr?utm_source=generator" width="100%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
        <div class="col-lg">
            <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/7FlHNJT4TC120CDvFOHzei?utm_source=generator" width="100%" height="152" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
</div> -->

</main>