<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div id="carouselExampleControls" class="carousel slide mb-2" data-bs-ride="carousel">
				<div class="carousel-inner">

					<?php $no = 1;
					foreach ($caraousel as $ca) { ?>
						<div class="carousel-item <?php if ($no == 1) {
														echo 'active';
													} ?>">
							<img style="border-radius: 5% % 0% 0%;" src="<?= base_url('assets/upload/caraousel/' . $ca['foto']) ?>" class="d-block w-100 img-fluid">
						</div>
					<?php $no++;
					} ?>

				</div>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			<div class="bg-dark p-2">
				<div class="flex align-items-center text-white">
					<marquee><span><?= $konfig->marquee ?></span></marquee>
				</div>
			</div>
		</div>
	</div>
</div>

<main id="main" data-aos="fade-up">


	<section class="section" id="konten">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h3>My<span> Content</span></h3>
					</div>
				</div>
				<div class="col-lg-8 mb-t mb-lg-0">
					<article class="row mb-5">
						<?php foreach ($results as $us) { ?>
							<div class="col-md-4 mb-md-0">
								<div class="post-slider slider-sm">
									<img style="border-radius: 5%;" src="<?= base_url('assets/upload/konten/' . $us['foto']) ?>" class="img-fluid mt-5">
									</a>
								</div>
							</div>
							<div class="col-md-8 mt-5">
								<h3 class="h5">
									<a class="post-title" href="<?= base_url('Home/artikel/' . $us['slug']); ?>"><?= $us['judul'] ?></a>
								</h3>
								<ul class="list-inline post-meta mb-2">
									<small>
										<i class="bi bi-person mr-2">
											<li class="list-inline-item"><?= $us['nama'] ?>
											</li>
											<li class="list-inline-item">Date : <?= $us['tanggal'] ?></li>
											<li class="list-inline-item">Categories : <?= $us['nama_kategori'] ?> </li>
										</i>
									</small>
								</ul>
								<p>
									<?php
									$keterangan = $us['keterangan'];

									$maxLength = 150;
									$kategoriSlug = $us['slug'];

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
						<?php } ?>
					</article>

					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							<?= $pagination ?>
						</ul>
					</nav>
				</div>


				<aside class="col-lg-4">
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
													<li class="list-inline-item"><?= $us['tanggal'] ?></li>
													<li class="list-inline-item"><?= $us['nama_kategori'] ?></li>
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

</main>