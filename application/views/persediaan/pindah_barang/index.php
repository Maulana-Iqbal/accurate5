<div class="row mb-5">
  <!-- <?php var_dump($list_pemindahan); ?> -->
  <!-- DataTables Pengguna -->
  <div class="col-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Pemindahan Barang</h6>
      </div>
      <div class="card-body">
        <div class="d-flex flex-row-reverse mt-2 mb-4">
          <a href="<?= base_url('Persediaan/PindahBarang/tambahPemindahanBarang'); ?>">
            <button id="btn-tambah-pengguna" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
              </span>
              <span class="text">Tambah Pemindahan Barang Baru</span>
            </button>
          </a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="tablePemindahanBarang" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Dari</th>
                <th>Ke</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="data-table-user">
              <?php $this->load->view('persediaan/pindah_barang/tableListPemindahanBarang', array('model' => $list_pemindahan)); // Load file view.php dan kirim data siswanya 
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>