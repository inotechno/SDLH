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
                  <h3 class="mb-0">Daftar Petugas</h3>
                  <p class="text-sm mb-0">
                    Tabel ini berisi informasi data petugas yang ada pada instansi kami.
                  </p>
                </div>

                <div class="col-6 text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addPetugas">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>

              </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-petugas">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>HP</th>
                    <th>JK</th>
                    <th>TTL</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-petugas">

                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addPetugas" tabindex="-1" role="dialog" aria-labelledby="modal-addPetugas" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Petugas</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addPetugas" method="POST">

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control form-control-sm" required>
                        </div>

                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control form-control-sm">
                              <small class="notSamePassword text-danger" hidden>
                                Password Tidak Sama
                              </small>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label>Konfirmasi Password</label>
                              <input type="password" name="konf_password" class="form-control form-control-sm">
                              <small class="notSamePassword text-danger" hidden>
                                Konfirmasi Password Tidak Sama
                              </small>
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" class="form-control form-control-sm" required>
                        </div>  

                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group">
                          <label>HP</label>
                          <input type="number" name="hp" class="form-control form-control-sm" required>
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <label>Jenis Kelamin</label>
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
                          <label>Tempat, Tanggal Lahir</label>
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control form-control-sm" required>
                            </div>
                            <input type="date" name="tanggal_lahir" class="form-control form-control-sm" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea class="form-control form-control-sm" name="alamat"></textarea required>
                        </div>

                        <div class="form-group">

                          <img width="110" height="130" class="foto-preview" src="<?= base_url('assets/assets/img/users/default.png') ?>">

                          <label for="foto" class="text-center m-2">
                            <a class="btn btn-warning btn-sm text-white" rel="nofollow" style="cursor: pointer;"><span class="ni ni-album-2"></span> Pilih Foto</a>
                          </label>
                            <input type="file" id="foto" name="foto" style="display: none;">
                        </div>  
                      </div>
                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addPetugas" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updatePetugas" tabindex="-1" role="dialog" aria-labelledby="modal-updatePetugas" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update Petugas</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updatePetugas" method="POST">
                    <input type="hidden" name="id_update">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username_update" class="form-control form-control-sm" readonly>
                        </div>

                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" name="nama_lengkap_update" class="form-control form-control-sm" required>
                        </div>  

                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email_update" class="form-control form-control-sm" required>
                        </div>

                        <div class="form-group">
                          <label>HP</label>
                          <input type="number" name="hp_update" class="form-control form-control-sm" required>
                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <label>Jenis Kelamin</label>
                          <div class="row">
                            <div class="col">
                              <div class="custom-control custom-radio">
                                <input name="jenis_kelamin_update" class="custom-control-input" id="laki-laki_update" type="radio" value="L">
                                <label class="custom-control-label" for="laki-laki_update">Laki-Laki</label>
                              </div>
                            </div>

                            <div class="col text-left">
                              <div class="custom-control custom-radio mb-2">
                                <input name="jenis_kelamin_update" class="custom-control-input" id="perempuan_update" type="radio" value="P">
                                <label class="custom-control-label" for="perempuan_update">Perempuan</label>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="form-group">
                          <label>Tempat, Tanggal Lahir</label>
                          <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                              <input type="text" name="tempat_lahir_update" placeholder="Tempat Lahir" class="form-control form-control-sm" required>
                            </div>
                            <input type="date" name="tanggal_lahir_update" class="form-control form-control-sm" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label>Alamat</label>
                          <textarea class="form-control form-control-sm" name="alamat_update"></textarea required>
                        </div>

                        <div class="form-group">

                          <img width="110" height="130" class="foto-preview" src="<?= base_url('assets/assets/img/users/default.png') ?>">

                          <label for="foto_update" class="text-center m-2">
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
                  <button type="submit" form="form-updatePetugas" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deletePetugas" tabindex="-1" role="dialog" aria-labelledby="modal-delete-soal" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus petugas <span id="petugas-delete"></span></h4>
                <form class="form" id="form-deletePetugas" method="POST">
                  <input type="hidden" name="id_petugas_delete">
                  <input type="hidden" name="foto_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-petugas" form="form-deletePetugas">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>