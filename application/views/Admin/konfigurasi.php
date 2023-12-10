<div id="ngilang">
    <?= $this->session->flashdata('alert', true); ?>
</div>
<form action="<?= base_url('Admin/Konfigurasi/update') ?>" method="post">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">KONFIGURASI</h5>
            <!-- General Form Elements -->
            <div class="row mb-2 mt-2">
                <label class="col-form-label">Judul Website</label>
                <div class="col-sm">
                    <input type="text" class="form-control" name="judul_website" type="text" value="<?= $konfig->judul_website ?>" required>
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <label class="col-form-label">Profil</label>
                <div class="col-sm">
                    <textarea type="text" class="form-control" name="profile_website" type="text" required><?= $konfig->profile_website ?></textarea>
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <label class="col-form-label">Instagram</label>
                <div class="col-sm">
                    <input class="form-control" name="instagram" value="<?= $konfig->instagram ?>" required />
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <label class="col-form-label">Facebook</label>
                <div class="col-sm">
                    <input class="form-control" name="facebook" value="<?= $konfig->facebook ?>" required />
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <label class="col-form-label">Email</label>
                <div class="col-sm">
                    <input class="form-control" name="email" value="<?= $konfig->email ?>" required />
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <label class="col-form-label">Alamat</label>
                <div class="col-sm">
                    <input class="form-control" name="alamat" value="<?= $konfig->alamat ?>" required />
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <label class="col-form-label">Whatsapp</label>
                <div class="col-sm">
                    <input class="form-control" name="no_wa" value="<?= $konfig->no_wa ?>" required />
                </div>
            </div>

            <div class="row mb-2 mt-2">
                <label class="col-form-label">Headline</label>
                <div class="col-sm">
                    <input class="form-control" name="marquee" value="<?= $konfig->marquee ?>" required />
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>