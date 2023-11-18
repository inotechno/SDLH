
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= SHORT_SITE_URL.' | '.$title ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= site_url('assets/assets/img/brand/favicon.png') ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/css/argon.css?v=1.1.0') ?>" type="text/css">
</head>

<body class="bg-default">

    <!-- Page content -->
    <div class="container-fluid py-1">
      <div class="row row-cols-1 row-cols-md-2">
        <?php 
          foreach ($pelanggan as $dt) {
            if ($dt->qrcode != NULL) {
              $qrcode = base_url('assets/assets/img/qrcode/'.$dt->qrcode);
            }else{
              $qrcode = base_url('assets/assets/img/users/default.png');
            }

            if ($dt->foto != NULL) {
              $foto = base_url('assets/assets/img/users/pelanggan/'.$dt->foto);
            }else{
              $foto = base_url('assets/assets/img/users/default.png');
            }

          ?>
            <div class="col-xs-6 mr-1">
              <div class="card" style="border:1px solid #000;border-radius: 5px;">
                <!-- Card body -->
                <div class="card-body">
                  <a href="<?= $qrcode ?>">
                    <img src="<?= $qrcode ?>" class="shadow shadow-lg--hover" style="width: 140px; height: 140px;">
                  </a>
                  <a href="<?= $foto ?>">
                    <img src="<?= $foto ?>" class="shadow shadow-lg--hover" style="width: 140px; height: 140px;">
                  </a>
                  <div class="pt-4 text-center">
                    <h5 class="h3 title">
                      <span class="d-block mb-1"><?= $dt->nama_lengkap ?></span>
                      <small class="h4 font-weight-light text-muted"><?= $dt->nama_kategori == null ? 'No Kategori':$dt->nama_kategori ?></small>
                    </h5>
                    <ul class="list-group list-group-flush text-left">
                      <li class="list-group-item p-2">Username : <?= $dt->username ?></li>
                      <li class="list-group-item p-2">Email : <?= $dt->email ?></li>
                      <li class="list-group-item p-2">HP : <?= $dt->hp ?></li>
                      <li class="list-group-item p-2">TTL : <?= $dt->tempat_lahir ?>, <?= date('d-m-Y', strtotime($dt->tanggal_lahir)) ?></li>
                      <li class="list-group-item p-2">Jenis Kelamin : <?= $dt->jenis_kelamin ?></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        ?>
      </div>
    </div>
  
  <!-- Core -->
  <script src="<?= site_url('assets/assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= site_url('assets/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script type="text/javascript">
    window.print();
  </script>
</body>

</html>