<!-- <?php
                                         
    ?> -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1"></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                </div>
                                <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                                </div>
                                <h4 class="header-title">Chart Hasil Perhitungan</h4>
                                <p class="card-title-desc">Chart Hasil Forecasting Penjualan Barang
                                    <?= $dt_databarang['nama_barang']?></p>
                                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
                                <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3"></script> -->
                                <div id="chart">
                                </div>
                                <script>
                                var options = {
                                    chart: {
                                        type: 'line'
                                    },
                                    series: [{
                                        name: 'Data Real (At)',
                                        type: 'line',
                                        data: [

                                            <?php
                                                foreach($at as $at):
                                            
                                            ?>
                                            <?= (double)$at['jumlah_penjualan'].','?>
                                            <?php
                                            endforeach;
                                            ?>
                                        ]
                                    }, {
                                        name: 'Data Hasil Forecast (Ft)',
                                        type: 'line',
                                        data: [
                                            <?php
                                                foreach($ft as $ft):
                                            
                                            ?>
                                            <?= (double)$ft['ft'].','?>
                                            <?php
                                            endforeach;
                                            ?>
                                        ]
                                    }], dataLabels: {
                                        enabled: true,
                                        enabledOnSeries: [0,1],
                                        
                                       
                                    },
                                   
                                    xaxis: {
                                        categories: [
                                            <?php
                                                foreach($bulan as $bulan):
                                            
                                            ?>
                                            <?= (double)$bulan['bulan'].','?>
                                            <?php
                                            endforeach;
                                            ?>

                                        ]
                                    }
                                }


                                var chart = new ApexCharts(document.querySelector("#chart"), options);

                                chart.render();
                                </script>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Perhitungan PeraSmalan</h4>
                                <p class="card-title-desc">Penjualan Barang
                                    <?= $dt_databarang['nama_barang']?></p>

                                <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                </div>
                                <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                                </div>
                                <!-- <?= var_dump($dt_databarang['id_databarang'])?> -->

                                <br>
                                <!-- <?= var_dump($tbl_penjualan)?> -->
                                <table id="datatable" class="table table-bordered dt-responsive "
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Penjualan (Xt)</th>
                                            <th>S'</th>
                                            <th>S''</th>
                                            <th>at</th>
                                            <th>bt</th>

                                            <th>Hasil Forecast</th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n0 = 1; ?>
                                        <?php foreach ($hitung as $hitung) : ?>
                                        <tr>
                                            <td style="width: 4%;"><?= $n0?></td>
                                            <td style="width: 7%;"><?= $hitung['tahun']; ?></td>
                                            <td><?= $hitung['bulan']; ?></td>
                                            <td><?= $hitung['jumlah_penjualan']; ?></td>
                                            <td><?= $hitung['s_aksen']; ?></td>
                                            <td><?= $hitung['s_2aksen']; ?></td>
                                            <td><?= $hitung['at']; ?></td>
                                            <td><?= $hitung['bt']; ?></td>

                                            <td><?= $hitung['ft']; ?></td>

                                        </tr>
                                        <?php $n0++ ?>
                                        <?php endforeach ?>
                                    </tbody>


                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Perhitungan Mean Absolute Percentage Error (MAPE)</h4>
                                <p class="card-title-desc">Permalan Data Penjualan Barang
                                    <?= $dt_databarang['nama_barang']?></p>

                                <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                </div>
                                <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                                </div>
                                <!-- <?= var_dump($dt_databarang['id_databarang'])?> -->

                                <br>

                                <br>
                                <!-- <?= var_dump($tbl_penjualan)?> -->
                                <table id="datatable" class="table table-bordered dt-responsive "
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Jumlah Penjualan (Xt)</th>
                                            <th>Hasil Forecast (Ft)</th>
                                            <th>xt_min_ft</th>
                                            <th>abs_xt_min_ft_bagi_xt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n0 = 1; ?>
                                        <?php foreach ($haha as $haha1) : ?>
                                        <tr>
                                            <td style="width: 4%;"><?= $n0?></td>
                                            <td><?= $haha1['jumlah_penjualan']; ?></td>
                                            <td><?= $haha1['ft']; ?></td>
                                            <td><?= $haha1['xt_min_ft']; ?></td>
                                            <td><?= $haha1['abs_xt_min_ft_bagi_xt']; ?></td>


                                        </tr>
                                        <?php $n0++ ?>
                                        <?php endforeach ?>
                                    </tbody>


                                </table>
                                <h4>MAPE=<?=$MAPE?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="header-title">Permalan Masa Depan</h4>
                                <p class="card-title-desc">Penjualan barang
                                    <?= $dt_databarang['nama_barang']?></p>

                                <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">

                                </div>
                                <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                                </div>
                                <!-- <?= var_dump($dt_databarang['id_databarang'])?> -->
                                <a href="<?=base_url()?>hasil/ramal/<?= $dt_databarang['id_databarang']?>"
                                    type="button p-1 mb-2 " class="btn btn-success mdi mdi-plus mx-auto">Ramal Masa
                                    Depan</a>
                                <br>
                                <br>
                                <!-- <?= var_dump($tbl_penjualan)?> -->
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Penjualan (Xt)</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $n0 = 1; ?>
                                        <?php foreach ($masa_dpn as $masa_dpn) : ?>
                                        <tr>
                                            <td><?=$n0?></td>
                                            <td><?=$masa_dpn['tahun']?></td>
                                            <td><?=$masa_dpn['bulan']?></td>
                                            <td><?=$masa_dpn['jumlah_penjualan']?></td>

                                        </tr>
                                        <?php $n0++ ?>
                                        <?php endforeach ?>
                                    </tbody>


                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>


            </div> <!-- container-fluid -->
        </div>
        <!-- end page-content-wrapper -->
    </div>
    <!-- End Page-content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>