<section class="section">
    <div class="row">
        <div id="ngilang">
            <?= $this->session->flashdata('alert', true); ?>
        </div>
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">AKTIFITAS USER</h5>
                    <!-- Table with stripped rows -->
                    <div class="datatable-wrapper no-footer sortable searchable fixed-columns">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Username</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($recent_login as $rec) { ?>
                                        <tr>
                                            <td> <?= $no++ ?></td>
                                            <td> <?= $rec['username'] ?></td>
                                            <td> <?= $rec['tanggal'] ?></td>
                                            <td> <?= $rec['keterangan'] ?></td>
                                            <td>
                                                <a onClick="return confirm('apakah anda yakin ingin menghapus data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/Recent_login/hapus/' . $rec['id_recent_login']) ?>">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <a onClick="return confirm('apakah anda yakin ingin menghapus semua data!...')" class="btn btn-sm btn-danger" href="<?= base_url('Admin/Recent_login/hapusall/' . $rec['id_recent_login']) ?>">HAPUS SEMUA DATA
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>