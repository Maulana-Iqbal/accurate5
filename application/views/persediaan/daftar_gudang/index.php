<div class="row">
  <div class="col-6">
    <?= $this->session->flashdata('suksesTambahGudang') ?>
    <?= $this->session->flashdata('errorTambahGudang') ?>
    <?= $this->session->flashdata('suksesEditGudang') ?>
    <?= $this->session->flashdata('errorEditGudang') ?>
    <?= $this->session->flashdata('suksesHapusGudang') ?>
    <?= $this->session->flashdata('errorHapusGudang') ?>
  </div>
</div>

<div class="row mb-5">
  <!-- DataTables Pengguna -->
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Gudang</h6>
      </div>
      <div class="card-body">
        <div class="d-flex flex-row-reverse mt-2 mb-4">
          <a href="<?= base_url('Persediaan/DaftarGudang/tambahGudang'); ?>">
            <button id="btn-tambah-pengguna" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Tambah Gudang</span>
            </button>
          </a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Penanggung Jawab</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="data-table-user">
              <?php $this->load->view('persediaan/daftar_gudang/tableGudang', array('model' => $gudang)); // Load file view.php dan kirim data siswanya 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>