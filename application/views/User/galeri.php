<main id="main" style="background-color:black;">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title" data-aos="zoom-in">
                <!-- <h2>Portfolio</h2> -->
                <h3 style="color:aquamarine;" class="m-3">Galeri</h3>
            </div>

            <!-- <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                        </ul>
                    </div>
                </div> -->

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="50">

                <?php foreach ($galeri as $ben) { ?>
                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <a href="<?= base_url('assets/upload/galeri/' . $ben['foto']) ?>" class="portfolio-lightbox preview-link">
                            <img style="background-color: aliceblue; border-radius: 5%;" src="<?= base_url('assets/upload/galeri/' . $ben['foto']) ?>" class="img-fluid">
                        </a>
                    </div>
                <?php } ?>

            </div>

        </div>
    </section><!-- End Portfolio Section -->

</main>