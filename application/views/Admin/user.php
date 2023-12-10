<section class="section">
    <div class="row">
        <div id="ngilang">
            <?= $this->session->flashdata('alert', true); ?>
        </div>
        <div class="col-lg-12">
            <a class="btn btn-primary mb-4" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal" href="">Tambah
                <i class="bi bi-person-plus-fill"></i>
            </a>
            <div class="col-lg-6">
                <!-- Basic Modal -->
                <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="card-title col d-flex justify-content-center">Tambah User</h5>
                                <form action="<?= site_url('Admin/User/simpan') ?>" method="post">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- General Form Elements -->
                                            <div class="row mb-2 mt-2">
                                                <label class="col-form-label">Nama</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" name="nama" type="text" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <label class="col-form-label">Username</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" name="username" type="text" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="row mb-2">
                                                <label class="col-form-label">Password</label>
                                                <div class="col-sm">
                                                    <input type="password" class="form-control" name="password" type="text" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <fieldset class="row mb-2">
                                                <label class="col-form-label">Level</label>
                                                <div class="col-sm inline-flex items-center">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="level" value="Admin" autocomplete="off" required>
                                                        <label class="form-check-label">
                                                            Admin
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="level" value="Kontributor" autocomplete="off" required>
                                                        <label class="form-check-label">
                                                            Kontributor
                                                        </label>
                                                    </div>
                                                </div>
                                            </fieldset>
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
                    <h5 class="card-title">DATA PENGGUNA</h5>
                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper no-footer sortable searchable fixed-columns">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $us) { ?>
                                        <tr>
                                            <td> <?= $us['nama'] ?></td>
                                            <td> <?= $us['username'] ?></td>
                                            <td> <?= $us['level'] ?></td>
                                            <td>
                                                <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/User/hapus/' . $us['id_user']) ?>">
                                                    <i class="bi bi-trash"></i>
                                                </a>

                                                <a class="btn btn-sm btn-warning" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModaledit<?= $us['id_user'] ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <div class="col-lg-6">
                                                    <!-- Basic Modal -->
                                                    <div class="modal fade" id="basicModaledit<?= $us['id_user'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <h5 class="card-title col d-flex justify-content-center">Update Data User</h5>
                                                                    <form action="<?= site_url('Admin/User/update') ?>" method="post">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <!-- General Form Elements -->
                                                                                <input type="hidden" class="form-control" value="<?= $us['id_user'] ?>" name="id_user">

                                                                                <div class="row mb-2 mt-2">
                                                                                    <label class="col-form-label">Nama</label>
                                                                                    <div class="col-sm">
                                                                                        <input type="text" class="form-control" name="nama" type="text" value="<?= $us['nama'] ?>" required>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row mb-2">
                                                                                    <label class="col-form-label">Username</label>
                                                                                    <div class="col-sm">
                                                                                        <input type="text" class="form-control" name="username" value="<?= $us['username'] ?>" type="text" readonly>
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