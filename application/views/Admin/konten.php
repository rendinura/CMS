<section class="section">
    <div class="row">
        <div id="ngilang">
            <?= $this->session->flashdata('alert', true); ?>
        </div>
        <div class="col-lg-12">
            <a class="btn btn-primary mb-4" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" href="">Tambah Konten
                <i class="bi bi-folder-plus"></i>
            </a>
            <div class="col-lg-6">
                <!-- Basic Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="card-title">Tambah Konten</h5>
                                <form action="<?= base_url('Admin/Konten/simpan') ?>" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- General Form Elements -->
                                            <div class="row mb-2 mt-2">
                                                <label class="col-form-label">Judul</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" name="judul" type="text" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label class="col-form-label">Kategori</label>
                                                <div class="col-sm">
                                                    <select class="form-select" name="id_kategori" required>
                                                        <option selected="">Pilih kategori konten</option>
                                                        <?php foreach ($kategori as $us) { ?>
                                                            <option value="<?= $us['id_kategori'] ?>"><?= $us['nama_kategori'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-2 mt-2">
                                                <label class="col-form-label">Keterangan</label>
                                                <div class="col-sm">
                                                    <textarea class="form-control" name="keterangan"></textarea>
                                                </div>
                                            </div>

                                            <div class="row mb-2 mt-2">
                                                <label class="col-form-label">Foto</label>
                                                <div class="col-sm">
                                                    <input type="file" class="form-control" name="foto" type="text" accept="image/png, image/gif, image/jpeg , image/jpg" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- End Basic Modal-->
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">KONTEN</h5>
                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Kreator</th>
                                        <th>Foto</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($konten as $us) { ?>

                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $us['judul'] ?></td>
                                            <td> <?= $us['nama_kategori'] ?></td>
                                            <td> <?= $us['tanggal'] ?></td>
                                            <td> <?= $us['nama'] ?></td>
                                            <td>
                                                <a href="<?= base_url('assets/upload/konten/' . $us['foto']) ?>" target="_blank">
                                                    <i class="bi bi-search m-2"></i>foto
                                                </a>
                                            </td>
                                            <td>
                                                <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/Konten/hapus/' . $us['foto']) ?>">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                <a class="btn btn-sm btn-warning" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModalkonten<?= $us['id_konten'] ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <div class="col-lg-12">
                                                    <!-- Basic Modal -->
                                                    <div class="modal fade" id="basicModalkonten<?= $us['id_konten'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="card">
                                                                    <div class="modal-body">
                                                                        <h5 class="card-title col d-flex justify-content-center"><?= $us['judul'] ?></h5>
                                                                        <form action="<?= base_url('Admin/Konten/update') ?>" method="post" enctype="multipart/form-data">
                                                                            <input type="hidden" name="nama_foto" value="<?= $us['foto'] ?>">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <!-- General Form Elements -->
                                                                                    <div class="row mb-2 mt-2">
                                                                                        <label class="col-form-label">Judul</label>
                                                                                        <div class="col-sm">
                                                                                            <input type="text" class="form-control" value="<?= $us['judul'] ?>" name="judul" type="text" required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mb-3">
                                                                                        <label class="col-form-label">Kategori</label>
                                                                                        <div class="col-sm">
                                                                                            <select class="form-select" name="id_kategori" required>
                                                                                                <?php foreach ($kategori as $uu) { ?>
                                                                                                    <option <?php if ($uu['id_kategori'] == $us['id_kategori']) {
                                                                                                                echo "selected";
                                                                                                            } ?> value="<?= $uu['id_kategori'] ?>"><?= $uu['nama_kategori'] ?></option>
                                                                                                <?php } ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mb-2 mt-2">
                                                                                        <label class="col-form-label">Keterangan</label>
                                                                                        <div class="col-sm">
                                                                                            <textarea class="form-control" name="keterangan"><?= $us['keterangan'] ?></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mb-2 mt-2">
                                                                                        <label class="col-form-label">Foto</label>
                                                                                        <div class="col-sm">
                                                                                            <input type="file" class="form-control" name="foto" type="text" accept="image/png, image/gif, image/jpeg , image/jpg">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Basic Modal-->
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

</section>