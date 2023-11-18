      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">

                <div class="col-6">
                  <h3 class="mb-0">Daftar Pembayaran</h3>
                  <p class="text-sm mb-0">
                    Tabel ini berisi informasi pembayaran dari pelanggan yang sudah membayar kepada anda.
                  </p>
                </div>

              </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-pembayaran">
                <thead class="thead-light">
                  <tr>
                    <th>No Invoice</th>
                    <th>Nama Lengkap</th>
                    <th>Kategori</th>
                    <th>Tanggal Bayar</th>
                    <th>Cetak Struk</th>
                  </tr>
                </thead>
                <tbody id="table-data-pembayaran">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-Invoice" tabindex="-1" role="dialog" aria-labelledby="modal-Invoice" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-xs" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">#<span class="no_invoice"></span></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body" id="cetak-invoice" style="border-radius: 5px; background: url('<?= base_url("assets/assets/img/background-invoice.jpg") ?>') no-repeat;background-size: 100%;">
                  <img width="150" src="<?= site_url('assets/assets/img/brand/logo-brand-white.png') ?>" class="img-fluid">
                  
                  <div class="my-4">
                    <h5 class="text-white">No Invoice : <span class="no_invoice"></h5>
                    <h5 class="text-white">Nama Pelanggan : <span class="nama_pelanggan"></span></h5>
                    <h5 class="text-white">Kategori Pelanggan : <span class="kategori_pelanggan"></span></h5>
                    <h5 class="text-white">Tanggal Bayar : <span class="tanggal"></h5>
                    <h5 class="text-white">Nama Petugas : <span class="nama_petugas"></h5>
                  </div>

                  <p class="h5 text-white">Terima kasih sudah membayar tagihan pembayaran ini, semoga semuanya berjalan dengan lancar.</p>
                </div>

                <div class="modal-footer mt-0">
                  <a class="btn btn-primary btn-sm align-right" href="#" id="btn-cetak">Cetak</a>
                </div>
                
            </div>
        </div>
      </div>