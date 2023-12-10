<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div id="ngilang">
                <?= $this->session->flashdata('alert', true); ?>
            </div>
            <div class="section-title" data-aos="zoom-in">
                <h3>Kritik dan Saran</h3>
            </div>

            <div class="row mt-5">

                <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">
                    <form action="<?= base_url('Home/pesan/') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="saran" rows="5" placeholder="Kritik dan saran" required></textarea>
                        </div>
                        <div class="text-center mt-3">
                            <button class="btn btn-success" type="submit">Kirim Pesan</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>
</main>

<footer>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Template Main JS File -->
    <script>
        $('#ngilang').delay('slow').slideDown('slow').delay(1500).slideUp(600);
    </script>
    <script src="<?= base_url('assets/remember/') ?>assets/js/main.js"></script>
</footer>