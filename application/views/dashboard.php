<!-- <?php
                                         
    ?> -->
<div class="main-content">

    <div class="page-content">
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
                                <h4 class="header-title">Chart Hasil penjualan</h4>
                                <p class="card-title-desc">Chart Hasil Penjualan Pupuk Phonska</p>
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
                                    }, 
                                    // {
                                    //     name: 'Data Hasil Forecast (Ft)',
                                    //     type: 'line',
                                    //     data: [
                                    //         <?php
                                    //             foreach($ft as $ft):
                                            
                                    //         ?>
                                    //         <?= (double)$ft['ft'].','?>
                                    //         <?php
                                    //         endforeach;
                                    //         ?>
                                    //     ]
                                    // }
                                    ], dataLabels: {
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
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>