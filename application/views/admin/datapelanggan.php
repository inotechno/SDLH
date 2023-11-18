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
                  <h3 class="mb-0">Daftar Pelanggan</h3>
                  <p class="text-sm mb-0">
                    Tabel ini berisi informasi data pelanggan yang ada pada instansi kami.
                  </p>
                </div>

                <div class="col-6 text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addPelanggan">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>

              </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-pelanggan">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>QRCode | Foto</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>JK</th>
                    <th>TTL</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-pelanggan">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addPelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-addPelanggan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Pelanggan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addPelanggan" method="POST" enctype="multipart/form-data">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="h5">Username</label>
                          <input type="text" name="username" class="form-control form-control-sm" required>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label class="h5">Password</label>
                              <input type="password" name="password" class="form-control form-control-sm">
                              <small class="notSamePassword text-danger" hidden>
                                Password Tidak Sama
                              </small>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label class="h5">Konfirmasi Password</label>
                              <input type="password" name="konf_password" class="form-control form-control-sm">
                              <small class="notSamePassword text-danger" hidden>
                                Konfirmasi Password Tidak Sama
                              </small>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="h5">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" class="form-control form-control-sm" required>
                        </div>  

                        <div class="form-group">
                          <label class="h5">Email</label>
                          <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group">
                          <label class="h5">HP</label>
                          <input type="number" name="hp" class="form-control form-control-sm" required>
                        </div>
                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <label class="h5">Jenis Kelamin</label>
                          <div class="row">
                            <div class="col">
                              <div class="custom-control custom-radio">
                                <input name="jenis_kelamin" class="custom-control-input" id="laki-laki" type="radio" value="L" checked>
                                <label class="custom-control-label" for="laki-laki">Laki-Laki</label>
                              </div>
                            </div>

                            <div class="col text-left">
                              <div class="custom-control custom-radio mb-2">
                                <input name="jenis_kelamin" class="custom-control-input" id="perempuan" type="radio" value="P">
                                <label class="custom-control-label" for="perempuan">Perempuan</label>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="form-group">
                          <label class="h5">Tempat, Tanggal Lahir</label>
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control form-control-sm" required>
                            </div>
                            <input type="date" name="tanggal_lahir" class="form-control form-control-sm" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="h5">Alamat</label>
                          <textarea class="form-control form-control-sm" name="alamat"></textarea required>
                        </div>

                        <div class="form-group">

                          <img width="110" height="130" class="foto-preview" src="<?= base_url('assets/assets/img/users/default.png') ?>">

                          <label class="h5" for="foto" class="text-center m-2">
                            <a class="btn btn-warning btn-sm text-white" rel="nofollow" style="cursor: pointer;"><span class="ni ni-album-2"></span> Pilih Foto</a>
                          </label>
                            <input type="file" id="foto" name="foto" style="display: none;">
                        </div>  
                      </div>

                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addPelanggan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updatePelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-updatePelanggan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update Pelanggan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updatePelanggan" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_update">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="h5">Username</label>
                          <input type="text" name="username_update" class="form-control form-control-sm" readonly>
                        </div>

                        <div class="form-group">
                          <label class="h5">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap_update" class="form-control form-control-sm" required>
                        </div>  

                        <div class="form-group">
                          <label class="h5">Email</label>
                          <input type="email" name="email_update" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group">
                          <label class="h5">HP</label>
                          <input type="number" name="hp_update" class="form-control form-control-sm" required>
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <label class="h5">Jenis Kelamin</label>
                          <div class="row">
                            <div class="col">
                              <div class="custom-control custom-radio">
                                <input name="jenis_kelamin_update" class="custom-control-input" id="laki-laki_update" type="radio" value="L">
                                <label class="h5" class="custom-control-label" for="laki-laki_update">Laki-Laki</label>
                              </div>
                            </div>

                            <div class="col text-left">
                              <div class="custom-control custom-radio mb-2">
                                <input name="jenis_kelamin_update" class="custom-control-input" id="perempuan_update" type="radio" value="P">
                                <label class="h5" class="custom-control-label" for="perempuan_update">Perempuan</label>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="form-group">
                          <label class="h5">Tempat, Tanggal Lahir</label>
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <input type="text" name="tempat_lahir_update" placeholder="Tempat Lahir" class="form-control form-control-sm" required>
                            </div>
                            <input type="date" name="tanggal_lahir_update" class="form-control form-control-sm" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="h5">Alamat</label>
                          <textarea class="form-control form-control-sm" name="alamat_update"></textarea required>
                        </div>

                        <div class="form-group">

                          <img width="110" height="130" class="foto-preview" src="<?= base_url('assets/assets/img/users/default.png') ?>">

                          <label class="h5" for="foto_update" class="text-center m-2">
                            <a class="btn btn-warning btn-sm text-white" rel="nofollow" style="cursor: pointer;"><span class="ni ni-album-2"></span> Pilih Foto</a>
                          </label>
                            <input type="file" id="foto_update" name="foto_update" style="display: none;">
                        </div>  
                        <input type="hidden" name="foto_lama">
                      </div>
                    
                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updatePelanggan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deletePelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-deletePelanggan" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus pelanggan <span id="pelanggan-delete"></span></h4>
                <form class="form" id="form-deletePelanggan" method="POST">
                  <input type="hidden" name="id_pelanggan_delete">
                  <input type="hidden" name="foto_delete">
                  <input type="hidden" name="file_mou_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-pelanggan" form="form-deletePelanggan">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updateFileMOU" tabindex="-1" role="dialog" aria-labelledby="modal-updateFileMOU" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">MOU Pelanggan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updateFileMOU" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_mou">
                    <input type="hidden" name="username_mou">
                    <div class="row mb-1">
                      <div class="col-md-2">
                        <label class="h5">File MOU</label>
                        <div class="form-group">
                          <label class="h5" for="fileMOU" class="text-center">
                            <a class="btn btn-danger btn-sm text-white" rel="nofollow" style="cursor: pointer;">
                              <span class="ni ni-single-copy-04"></span> Pilih File
                            </a>
                          </label>
                          <input type="file" id="fileMOU" name="file_mou" style="display: none;">
                        </div>
                      </div>

                      <div class="col-md">
                        <label class="h5">Tanggal MOU</label>
                        <input type="date" name="tanggal_mou" class="form-control form-control-sm">
                      </div>

                      <div class="col-md">
                        <label class="h5">Jenis Pelanggan</label>
                        <select class="form-control form-control-sm id_kategori" data-toggle="select" name="id_kategori_mou">
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <iframe class="file-preview" width="100%" height="500" frameborder="0" scrolling="no"></iframe>
                    </div>

                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updateFileMOU" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>