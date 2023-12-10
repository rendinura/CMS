<div id="ngilang">
    <?= $this->session->flashdata('alert', true); ?>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Caraousel </h5>
        <!-- General Form Elements -->
        <form action="<?= base_url('Admin/Caraousel/simpan') ?>" method="post" enctype="multipart/form-data">
            <div class="row mb-2 mt-2">
                <label class="col-form-label">JUDUL</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="judul" type="text" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputNumber" class="col-form-label">PILIH FOTO dengan ukuran (1:3)</label>
                <div class="col-sm">
                    <input class="form-control" name="foto" type="file">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form><!-- End General Form Elements -->
    </div>
</div>

<div class="row">
    <?php foreach ($caraousel as $ca) { ?>
        <div class="card col-md-4">
            <img src="<?= base_url('assets/upload/caraousel/' . $ca['foto']) ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title col d-flex justify-content-center"><?= $ca['judul'] ?></h5>
                <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-danger" href="<?= base_url('admin/caraousel/hapus/' . $ca['foto']) ?>">
                    <i class="bi bi-trash"></i>
                </a>
                <a class="btn btn-sm btn-warning" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModalkonten<?= $ca['judul'] ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <div class="col-lg-6">
                    <!-- Basic Modal -->
                    <div class="modal fade" id="basicModalkonten<?= $ca['judul'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="card">
                                    <div class="modal-body">
                                        <h5 class="card-title col d-flex justify-content-center"><?= $ca['judul'] ?></h5>
                                        <form action="<?= base_url('Admin/Caraousel/update') ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="nama_foto" value="<?= $ca['foto'] ?>">
                                            <div class="card">
                                                <div class="card-body">
                                                    <!-- General Form Elements -->
                                                    <div class="row mb-2 mt-2">
                                                        <label class="col-form-label">Judul</label>
                                                        <div class="col-sm">
                                                            <input type="text" class="form-control" value="<?= $ca['judul'] ?>" name="judul" type="text" required>
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
                        </div><!-- End Basic Modal-->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>