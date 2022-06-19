
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Beranda</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Selamat Datang, <?=$user['username']?></li>
                        </ol>
                    </div>
        <!-- end page title end breadcrumb -->
                                <div class="row">
                                    <blockquote class="blockquote text-center">
                                        <p>PERAMALAN PENGGUNAAN AIR TANAH PADA PELANGGAN AIR TANAH DI DKI JAKARTA METODE
                                            BROWN DOUBLE EXPONENTIAL SMOOTHING BERBASIS WEB</p>


                                    </blockquote>

                                </div>
                                <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                </div>
                                <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                                </div>
    <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="x-ua-compatible" content="ie=edge">

      <title>Sistem Persediaan | Dashboard </title>

      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="<?= base_url('assets/template') ?>/plugins/fontawesome-free/css/all.min.css">
      <!-- IonIcons -->
      <link rel="stylesheet" href="<?= base_url('assets/template') ?>/http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/adminlte.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="<?= base_url('assets/template') ?>/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

     <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                              <h3 class="card-title">Online Store Visitors</h3>
                              <a href="javascript:void(0);">View Report</a>
                            </div>
                          </div>
                        <div class="card-body">
                            <div class="d-flex">
                              <p class="d-flex flex-column">
                                <span class="text-bold text-lg">820</span>
                                <span>Visitors Over Time</span>
                              </p>
                              <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                  <i class="fas fa-arrow-up"></i> 12.5%
                                </span>
                                <span class="text-muted">Since last week</span>
                              </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/template') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url('assets/template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?= base_url('assets/template') ?>/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/template') ?>/dist/js/demo.js"></script>
    <script src="<?= base_url('assets/template') ?>/dist/js/pages/dashboard3.js"></script>
    </body>
</html>

