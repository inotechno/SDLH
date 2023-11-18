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
                  <h3 class="mb-0">Daftar Kategori</h3>
                  <p class="text-sm mb-0">
                    Tabel ini berisi informasi data kategori pelanggan yang ada pada instansi kami.
                  </p>
                </div>

                <div class="col-6 text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addKategori">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>

              </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-kategori">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Nominal</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-kategori">

                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addKategori" tabindex="-1" role="dialog" aria-labelledby="modal-addKategori" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Kategori</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addKategori" method="POST">

                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" name="nama_kategori" class="form-control form-control-sm" required>
                    </div>

                    <div class="form-group">
                      <label>Nominal</label>
                      <input type="number" name="nominal" class="form-control form-control-sm" required>
                    </div>  

                    <div class="form-group">
                      <label>Jenis Kategori</label>
                      <select class="form-control form-control-sm" name="jenis_kategori">
                        <option value="Hari">Hari</option>
                        <option value="Bulan">Bulan</option>
                      </select>
                    </div>

                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addKategori" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updateKategori" tabindex="-1" role="dialog" aria-labelledby="modal-updateKategori" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update Kategori</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updateKategori" method="POST">
                    <input type="hidden" name="id_kategori_update">
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="text" name="nama_kategori_update" class="form-control form-control-sm" required>
                    </div>

                    <div class="form-group">
                      <label>Nominal</label>
                      <input type="number" name="nominal_update" class="form-control form-control-sm" required>
                    </div>  

                    <div class="form-group">
                      <label>Jenis Kategori</label>
                      <select class="form-control form-control-sm" name="jenis_kategori_update">
                        <option value="Hari">Hari</option>
                        <option value="Bulan">Bulan</option>
                      </select>
                    </div>

                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updateKategori" class="btn btn-primary align-right">Update</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deleteKategori" tabindex="-1" role="dialog" aria-labelledby="modal-delete-soal" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Warning !</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">Jika anda menhapus <span id="kategori-delete"></span> maka seluruh pelanggan dengan kategori ini menjadi tanpa kategori</h4>
                <form class="form" id="form-deleteKategori" method="POST">
                  <input type="hidden" name="id_kategori_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-Kategori" form="form-deleteKategori">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>