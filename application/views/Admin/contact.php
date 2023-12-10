<section class="section">
    <div class="row">
        <div id="ngilang">
            <?= $this->session->flashdata('alert', true); ?>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">PESAN MASUK KRITIK DAN SARAN</h5>
                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal</th>
                                        <th>Saran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($saran as $sar) { ?>

                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $sar['nama'] ?></td>
                                            <td> <?= $sar['email'] ?></td>
                                            <td> <?= $sar['tanggal'] ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#basicModal<?= $sar['id_saran'] ?>">
                                                    <i class="bi bi-chat"></i>
                                                </a>
                                                <div class="col-lg-6">
                                                    <!-- Basic Modal -->

                                                    <div class="modal fade" id="basicModal<?= $sar['id_saran'] ?>" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="card">
                                                                    <div class="modal-body">
                                                                        <h5 class="card-title">Saran</h5>
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <!-- General Form Elements -->
                                                                                <div class="row mt-2">
                                                                                    <div class="col-sm">
                                                                                        <?= $sar['saran'] ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- End Basic Modal-->
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                if ($this->session->userdata('level') == 'Admin') { ?>
                                                    <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/Contact/hapus/' . $sar['id_saran']) ?>">
                                                        <i class="bi bi-trash"></i>

                                                    <?php } else { ?>
                                                        <a class="btn btn-sm btn btn-secondary disabled">
                                                            <i class="bi bi-trash"></i>
                                                        <?php } ?>

                                                        <!-- <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/Contact/hapus/' . $sar['id_saran']) ?>">
                                                            <i class="bi bi-trash"></i>
                                                        </a> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <td>
                                <?php
                                if ($this->session->userdata('level') == 'Admin') { ?>
                                    <a onClick="return confirm('apakah anda yakin ingin menghapus semua data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/Contact/hapusall/' . $rec['id_saran']) ?>">HAPUS SEMUA DATA
                                        <i class="bi bi-trash"></i></a>

                                <?php } else { ?>
                                    <a class="btn btn-sm btn btn-secondary disabled">HAPUS SEMUA DATA
                                        <i class="bi bi-trash"></i></a>
                                <?php } ?>
                            </td>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

</section>