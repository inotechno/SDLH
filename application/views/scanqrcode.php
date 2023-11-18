
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= SHORT_SITE_URL.' | '.$page_title ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= site_url('assets/assets/img/brand/favicon.png') ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/animate.css/animate.min.css') ?>">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/css/argon.css?v=1.1.0') ?>" type="text/css">
</head>

<body class="bg-default">

  <!-- Main content -->
  <div class="main-content">

    <!-- Page content -->
    <div class="container py-5 pb-5">
      <div class="row justify-content-center">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="<?= base_url('assets/assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img id="foto-card" width="130" height="130" src="<?= base_url('assets/assets/img/theme/team-4.jpg') ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-5">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">
                    <div>
                      <span class="heading" id="totalBayar"></span>
                      <span class="description">Jumlah Tagihan Yang Sudah Dibayar</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h5 class="h3">
                  <span id="nama-card"></span><span class="font-weight-light">, <span id="umur-card"></span></span>
                </h5>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><span id="tempat-tanggal-lahir-card"></span>
                </div>
                <div class="h3 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><span id="nama-kategori"></span>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-5 order-xl-2">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <div class="row">
                <div class="col-8">
                  <h5 class="h3 mb-0">Daftar Tagihan</h5>
                </div>
                <div class="col-4 text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addPembayaran">
                      <span class="btn-inner--text">Bayar</span>
                    </button>
                </div>
              </div>
            </div>
            <!-- Card body -->
            <div class="card-body p-0">
              <!-- List group -->
              <ul class="list-group list-group-flush" data-toggle="checklist" style="max-height: 400px;overflow-y: auto" id="daftar-pelunasan">
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  <div class="modal fade show" id="modal-addPembayaran" tabindex="-1" role="dialog" aria-labelledby="modal-addPembayaran" aria-modal="true">
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
            <h4 class="heading mt-4">Apakah anda yakin ingin melunaskan tagihan selanjutnya dari pelanggan <span id="pelanggan"></span></h4>
            <form class="form" id="form-addPembayaran" method="POST">
              <input type="hidden" name="id_pelanggan" id="id_pelanggan">
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-white" id="btn-add-pembayaran" form="form-addPembayaran">Ok</button>
          <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Core -->
  <script src="<?= site_url('assets/assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= site_url('assets/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script> 
  <script src="<?= site_url('assets/assets/vendor/js-cookie/js.cookie.js') ?>"></script>

  <script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      get_profile();
      getPembayaran();
      
      function get_profile() {
        var username = '<?= $this->uri->segment(2) ?>';
        $.ajax({
          url: '<?= site_url("petugas/Pembayaran/getProfilePelangganByUsername") ?>',
          type:'POST',
          data:{username:username},
          dataType: 'JSON',
          success:function (data) {
            console.log(data);
            
            if (data.status == 1) {
              status = 'Aktif';
            }else{
              status = 'Tidak Aktif';
            }

            if (data.foto != null) {
              foto = '<?= site_url("assets/assets/img/users/pelanggan/") ?>'+data.foto;
            }

            $('#link-foto').attr('href', foto);
            $('#foto-card').attr('src', foto);
            $('#id_pelanggan').val(data.id);
            $('#nama-card').html(data.nama_lengkap);
            $('#umur-card').html(data.umur);
            $('#nama-kategori').html(data.nama_kategori);
            $('#tempat-tanggal-lahir-card').html(data.tempat_lahir+', '+data.tanggal_lahir);
          }
        });
      }

      function getPembayaran() {
        var username = '<?= $this->uri->segment(2) ?>';
        $.ajax({
          url: '<?= site_url("petugas/Pembayaran/getDataPembayaran") ?>',
          type:'POST',
          async:false,
          data:{username:username},
          dataType: 'HTML',
          success:function (data) {
            $('#daftar-pelunasan').html(data);
            var totalBayar = $('.checklist-entry').length;
            $('#totalBayar').html(totalBayar);
          }
        });

        return false;
      }

      $('#form-addPembayaran').submit(function() {
        var data = $(this).serialize();
        $.ajax({
          url: '<?= base_url("petugas/Pembayaran/addPembayaran") ?>',
          type: 'POST',
          dataType: 'JSON',
          data:data,
          success:function (response) {
            $.notify({
                      icon: 'ni ni-bell-55',
                      message:response.message
                  },{
                      type:response.type,
                      placement: {
                        from: "top",
                        align: "right"
                  },
                      animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                  });

            if (response.type == 'success') {
              $('#modal-addPembayaran').modal('hide');
              getPembayaran();
            }
          }
        });
        
        return false;
      });
    });
  </script>
</body>

</html>