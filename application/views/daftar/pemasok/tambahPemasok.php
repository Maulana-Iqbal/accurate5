<div class="row">

  <div class="col-8 mx-auto">

    <h4 class="mb-3">Tambah Pemasok Baru</h4>

    <div class="card">
      <div class="card-body">

        <form action="<?= base_url('Daftar/Pemasok/tambahPemasok') ?>" id="form" method="post">

          <div class="form-group">
            <label for="input_nama">Nama Pemasok<span style="color: red">*</span></label>
            <input type="text" class="form-control input" name="nama" id="nama" maxlength="80">
            <span class="text-danger hide-any" id="error-nama-kosong">*Nama Pemasok tidak boleh kosong</span>
          </div>

          <div class="form-group" id="form-alamat">
            <label for="input_alamat">Alamat<span style="color: red">*</span></label>
            <textarea class="form-control input" id="alamat" name="alamat" rows="3"></textarea>
            <span class="text-danger hide-any" id="error-alamat-kosong">*Alamat tidak boleh kosong</span>
          </div>

          <div class="form-group">
            <label for="input_nama">Telepon</label>
            <input type="text" class="form-control input" name="telepon" id="telepon" maxlength="20">
          </div>

          <div class="form-group">
            <label for="input_nama">Kontak</label>
            <input type="text" class="form-control input" name="kontak" id="kontak" maxlength="50">
          </div>

          <hr>
          <!-- Button -->
          <div class="d-flex flex-row-reverse">
            <a href="<?= base_url('Daftar/Pengguna'); ?>" class="btn btn-warning btn-icon-split btn-lg ml-3">
              <span class="icon text-white-50">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
              <span class="text">Cancel</span>
            </a>
            <button type="submit" id="btn-save" class="btn btn-primary btn-icon-split btn-lg">
              <span class="icon text-white-50">
                <i class="fas fa-save"></i>
              </span>
              <span class="text">Save</span>
            </button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>