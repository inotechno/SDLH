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
                    Tabel ini berisi informasi pembayaran dari pelanggan yang sudah membayar.
                  </p>
                </div>

                <div class="col-6 text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addPembayaran">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>

              </div>
            </div>
            <div class="py-4 table-responsive">
              <table class="table table-flush" id="table-pembayaran">
                <thead class="thead-light">
                  <tr>
                    <th>No Invoice</th>
                    <th>Nama Lengkap</th>
                    <th>Kategori</th>
                    <th>Nama Petugas</th>
                    <th>Tanggal Bayar</th>
                  </tr>
                </thead>
                <tbody id="table-data-pembayaran">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>