    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-primary border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Pelanggan</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">
                    <?= 
                                
                      // $num_rows=$this->db->get_where('pembayaran', array('tanggal_bayar' => $a ))->num_rows();
                      // $total_rows = $this->db->count_all_results('pembayaran');
                    $this->db->count_all_results('pelanggan');
                      // var_dump($count);
                      // die;
                      ?>
                  </span>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 
                    <?php
                      $total_rows = $this->db->count_all_results('pelanggan');
                      $persen =100;

                      $total_persen = $persen / $total_rows ;
                      echo $total_persen; 
                      ?>
                    "></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Petugas</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">
                    <?= 
                                
                      // $num_rows=$this->db->get_where('pembayaran', array('tanggal_bayar' => $a ))->num_rows();
                      // $total_rows = $this->db->count_all_results('pembayaran');
                    $this->db->count_all_results('petugas');
                      // var_dump($count);
                      // die;
                      ?>
                  </span>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 
                    <?php
                      $total_rows = $this->db->count_all_results('petugas');
                      $persen =100;

                      $total_persen = $persen / $total_rows ;
                      echo $total_persen; 
                      ?>
                    "></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-danger border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Kategori Pelanggan</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">
                    <?= 
                                
                      // $num_rows=$this->db->get_where('pembayaran', array('tanggal_bayar' => $a ))->num_rows();
                      // $total_rows = $this->db->count_all_results('pembayaran');
                    $this->db->count_all_results('kategori_pelanggan');
                      // var_dump($count);
                      // die;
                      ?>
                  </span>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 
                    <?php
                      $total_rows = $this->db->count_all_results('kategori_pelanggan');
                      $persen =100;

                      $total_persen = $persen / $total_rows ;
                      echo $total_persen; 
                      ?>

                    "></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-default border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Pembayarans</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">
                    <?= 
                      // $num_rows=$this->db->get_where('pembayaran', array('tanggal_bayar' => $a ))->num_rows();
                      // $total_rows = $this->db->count_all_results('pembayaran');
                    $this->db->count_all_results('pembayaran');
                      // var_dump($count);
                      // die;
                      ?>
                  </span>
                  <div class="progress progress-xs mt-3 mb-0">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:
                      <?php
                      $total_rows = $this->db->count_all_results('pembayaran');
                      $persen =100;

                      $total_persen = $persen / $total_rows ;
                      echo $total_persen; 
                      ?>
                     "></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="card-deck flex-column flex-xl-row">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
      