
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?= site_url('assets/assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="" id="link-foto" target="_blank">
                    <img id="foto-card" width="130" height="130" src="<?= site_url('assets/assets/img/theme/team-4.jpg') ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-around mt-md-4 mt-sm-3 mt-xs-2">
                <form id="form-updateFoto">
                  <label for="foto">
                    <a class="btn btn-warning btn-sm text-white" rel="nofollow" style="cursor: pointer;"><span class="fas fa-2x fa-camera"></span></a>
                  </label>
                    <input type="hidden" name="foto_lama">
                    <input type="file" id="foto" name="foto" style="display: none;">
                </form>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading" id="level-card"></span>
                      <span class="description">Level</span>
                    </div>
                    <div>
                      <span class="heading" id="status-card"></span>
                      <span class="description">Status</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <span id="nama-lengkap-card"></span><span class="font-weight-light">, <span id="umur-card"></span></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><span id="tempat-tanggal-lahir-card"></span>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><span id="nama-group-card"></span>
                </div>
              </div>
            </div>
          </div>
          <!-- Progress track -->
          <!-- <div class="card">
            <div class="card-header">
              <h5 class="h3 mb-0">Progress track</h5>
            </div>

            <div class="card-body">

              <ul class="list-group list-group-flush list my--3">
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= site_url('assets/assets/img/theme/bootstrap.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Argon Design System</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= site_url('assets/assets/img/theme/angular.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Angular Now UI Kit PRO</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= site_url('assets/assets/img/theme/sketch.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Black Dashboard</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-red" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= site_url('assets/assets/img/theme/react.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>React Material Dashboard</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="row align-items-center">
                    <div class="col-auto">

                      <a href="#" class="avatar rounded-circle">
                        <img alt="Image placeholder" src="<?= site_url('assets/assets/img/theme/vue.jpg') ?>">
                      </a>
                    </div>
                    <div class="col">
                      <h5>Vue Paper UI Kit PRO</h5>
                      <div class="progress progress-xs mb-0">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div> -->
        </div>
        <div class="col-xl-8 order-xl-1">
          <!-- <div class="row">
            <div class="col-lg-6">
              <div class="card bg-gradient-info border-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total traffic</h5>
                      <span class="h2 font-weight-bold mb-0 text-white">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap text-light">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card bg-gradient-danger border-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0 text-white">Performance</h5>
                      <span class="h2 font-weight-bold mb-0 text-white">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                        <i class="ni ni-spaceship"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap text-light">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div> -->
          <div class="card">

            <div class="card-body">
              <form id="updateProfile" method="POST">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="update-username">Username</label>
                        <input type="text" id="update-username" class="form-control" placeholder="Username" name="username" readonly="">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="update-nama-lengkap">Nama Lengkap</label>
                        <input type="text" id="update-nama-lengkap" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="update-email">Email address</label>
                        <input type="email" id="update-email" class="form-control" placeholder="jesse@example.com" name="email" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="update-password">Password</label>
                        <input type="text" id="update-password" class="form-control" placeholder="Password" name="password">
                        <small class="invalid-feedback"></small>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="update-konfir-password">Konfirmasi Password</label>
                        <input type="text" id="update-konfir-password" class="form-control" placeholder="Konfirmasi Password">
                        <small class="invalid-feedback"></small>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="update-tempat-lahir">Tempat Lahir</label>
                        <input type="text" id="update-tempat-lahir" class="form-control" placeholder="Kota" name="tempat_lahir" required="">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="update-tanggal-lahir">Tanggal Lahir</label>
                        <input id="update-tanggal-lahir" class="form-control" name="tanggal_lahir" type="date" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="update-hp">HP</label>
                        <input type="number" name="hp" id="update-hp" class="form-control" placeholder="089676490971" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="update-jenis-kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="update-jenis-kelamin" required="">
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">Address</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Alamat</label>
                    <textarea name="alamat" rows="4" class="form-control" placeholder="" required=""></textarea>
                  </div>
                </div>

                <div class="block mt-2 text-right">
                  <button class="btn btn-warning" type="submit" id="btn-updateProfile">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>