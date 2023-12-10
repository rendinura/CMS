<section class="section">
    <div class="row">
        <div id="ngilang">
            <?= $this->session->flashdata('alert', true); ?>
        </div>
        <div class="col-lg-12">
            <a class="btn btn-primary mb-4" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" href="">Tambah Kategori
                <i class="bi bi-folder-plus"></i>
            </a>
            <div class="col-lg-6">
                <!-- Basic Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="card-title">Tambah Kategori</h5>
                                <form action="<?= site_url('Admin/Kategori/simpan') ?>" method="post">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- General Form Elements -->
                                            <div class="row mb-2 mt-2">
                                                <label class="col-form-label">Nama Kategori</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" name="nama_kategori" type="text" required>
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
                    <h5 class="card-title">KATEGORI KONTEN</h5>
                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper no-footer sortable searchable fixed-columns">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori Konten</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategori as $us) { ?>

                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $us['nama_kategori'] ?></td>
                                            <td>
                                                <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/Kategori/hapus/' . $us['id_kategori']) ?>">
                                                    <i class="bi bi-trash"></i>
                                                </a>

                                                <a class="btn btn-sm btn-warning" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModaledit<?= $us['id_kategori'] ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <div class="col-lg-6">
                                                    <!-- Basic Modal -->

                                                    <div class="modal fade" id="basicModaledit<?= $us['id_kategori'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="card">
                                                                    <div class="modal-body">
                                                                        <h5 class="card-title">Update Kategori</h5>
                                                                        <form action="<?= site_url('Admin/Kategori/update') ?>" method="post">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <!-- General Form Elements -->
                                                                                    <input type="hidden" class="form-control" value="<?= $us['id_kategori'] ?>" name="id_kategori">

                                                                                    <div class="row mb-2 mt-2">
                                                                                        <label class="col-form-label">Nama Kategori Konten</label>
                                                                                        <div class="col-sm">
                                                                                            <input type="text" class="form-control" name="nama_kategori" type="text" value="<?= $us['nama_kategori'] ?>" required>
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