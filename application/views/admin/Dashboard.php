<style>
        /* CSS untuk mengatur posisi teks di atas gambar */
        .container {
            position: relative;
            text-align: center;
            color: white;
        }
        
        .text1 {
            position: absolute;
            top: 40%; /* Atur posisi vertikal teks */
            left: 35%; /* Atur posisi horizontal teks */
            transform: translate(-50%, -50%); /* Pusatkan teks di atas gambar */
        }

        .text2 {
            position: absolute;
            top: 25%; /* Atur posisi vertikal teks */
            left: 70%; /* Atur posisi horizontal teks */
            transform: translate(-50%, -50%); /* Pusatkan teks di atas gambar */
        }

        .text3 {
            position: absolute;
            top: 65%; /* Atur posisi vertikal teks */
            left: 80%; /* Atur posisi horizontal teks */
            transform: translate(-50%, -50%); /* Pusatkan teks di atas gambar */
        }

        .text4 {
            position: absolute;
            top: 53%; /* Atur posisi vertikal teks */
            left: 62%; /* Atur posisi horizontal teks */
            transform: translate(-50%, -50%); /* Pusatkan teks di atas gambar */
        }

        .text5 {
            position: absolute;
            top: 67%; /* Atur posisi vertikal teks */
            left: 52%; /* Atur posisi horizontal teks */
            transform: translate(-50%, -50%); /* Pusatkan teks di atas gambar */
        }
    </style>

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 style="font-weight: bold;" class="card-title">Peta Kota Ambon</h5>
                  <img style="display: block; margin: 0 auto;" src="<?=base_url('assets/')?>maps/Administrasi_Kota_Ambon_Warna.svg" alt="">

                  <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[0]['id_kec'])?>" style="font-weight: bold;" class="text1 text-dark"> <i class="bi bi-geo-alt display-5 text-light"></i> Teluk Ambon</a> 
                  <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[1]['id_kec'])?>" style="font-weight: bold;" class="text2 text-dark"><i class="bi bi-geo-alt display-5 text-primary"></i> Baguala</a>
                  <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[2]['id_kec'])?>" style="font-weight: bold;" class="text3 text-dark"> <i class="bi bi-geo-alt display-5 text-danger"></i> Leitimur Sel</a>
                  <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[3]['id_kec'])?>" style="font-weight: bold;" class="text4 text-dark"> <i class="bi bi-geo-alt display-5 text-warning"></i> Sirimau</a>
                  <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[4]['id_kec'])?>" style="font-weight: bold;" class="text5 text-dark"> <i class="bi bi-geo-alt display-5 text-light"></i> Nusaniwe</a>

                  <div style="font-weight: bold;" class="row text-center">
                    <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[0]['id_kec'])?>" style="background-color: #ff6b6b;" class="btn col-md-3">Teluk Ambon</a>
                    <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[1]['id_kec'])?>" style="background-color: #ffdd59;" class="btn col-md-2">Baguala</a>
                    <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[2]['id_kec'])?>" style="background-color: #78e08f;" class="btn col-md-3">Leitimur Sel</a>
                    <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[3]['id_kec'])?>" style="background-color: #18dcff;" class="btn col-md-2">Sirimau</a>
                    <a href="<?=base_url('admin/Dashboard/data_stuning_desa?id_kec=' .$dt_kec[4]['id_kec'])?>" style="background-color: #7d5fff;" class="btn col-md-2">Nusaniwe</a>
                  </div>
                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Sales Card -->
            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Konfirmasi Aktif</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-emoji-frown"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$aktif?></h6>
                      <span class="text-success small pt-1 fw-bold">Anak</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Konfrimasi Gejala</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-emoji-neutral"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$gejala?></h6>
                      <span class="text-success small pt-1 fw-bold">Anak</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Sales Card -->
            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Konfirmasi Sembuh</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-emoji-smile"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?=$sembuh?></h6>
                      <span class="text-success small pt-1 fw-bold">Anak</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h5 style="font-weight: bold;" class="card-title">Kota Ambon</h5>

                <!-- Column Chart -->
                <div id="columnChart"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#columnChart"), {
                        series: [
                        {
                          name: 'Aktif',
                          data: [
                            <?php foreach ($dt_kasus as $data) { ?>
                              <?= $data->total ?>,
                            <?php } ?>
                          ]
                        }, {
                          name: 'Gejala',
                          data: [
                            <?php foreach ($dt_kasus2 as $data) { ?>
                              <?= $data->total ?>,
                            <?php } ?>
                          ]
                        }, {
                          name: 'Sembuh',
                          data: [
                            <?php foreach ($dt_kasus3 as $data) { ?>
                              <?= $data->total ?>,
                            <?php } ?>
                          ]
                        }],
                        chart: {
                        type: 'bar',
                        height: 350
                        },
                        plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                        },
                        dataLabels: {
                        enabled: false
                        },
                        stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                        },
                        xaxis: {
                        categories: [
                          <?php foreach ($dt_kec as $dt) { ?>
                                "<?= $dt['kecamatan'] ?>",
                            <?php } ?>
                        ],
                        },
                        yaxis: {
                        title: {
                            text: 'Kasus'
                        }
                        },
                        fill: {
                        opacity: 1
                        },
                        tooltip: {
                        y: {
                            formatter: function(val) {
                            return "+ " + val + " Kasus"
                            }
                        }
                        }
                    }).render();
                    });
                </script>
                <!-- End Column Chart -->

                </div>
            </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
    
            <div class="card-body">
              <h5 class="card-title">Kasus Aktif</h5>

              <div id="verticalBarChart" style="min-height: 400px;" class="echart"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#verticalBarChart")).setOption({
                    title: {
                      text: 'Tahun'
                    },
                    tooltip: {
                      trigger: 'axis',
                      axisPointer: {
                        type: 'shadow'
                      }
                    },
                    legend: {},
                    grid: {
                      left: '1%',
                      right: '2%',
                      bottom: '3%',
                      containLabel: true
                    },
                    xAxis: {
                      type: 'value',
                      boundaryGap: [0, 0.01]
                    },
                    yAxis: {
                      type: 'category',
                      data: [ <?php foreach ($dt_kec as $dt) { ?>
                                "<?= $dt['kecamatan'] ?>",
                            <?php } ?>]
                    },
                    series: [{
                        name: '<?=$thn_now1?>',
                        type: 'bar',
                        data: [
                          <?php foreach ($dt_kasus_aktif22 as $data) { ?>
                              <?= $data->total ?>,
                            <?php } ?>
                        ]
                      },
                      {
                        name: '<?=$thn_now?>',
                        type: 'bar',
                        data: [
                          <?php foreach ($dt_kasus_aktif23 as $data) { ?>
                              <?= $data->total ?>,
                            <?php } ?>
                        ]
                      }
                    ]
                  });
                });
              </script>
              <!-- End Vertical Bar Chart -->

            </div>
          </div><!-- End Recent Activity -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Tahun 2023</h5>

              <!-- Pie Chart -->
              <div id="pieChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#pieChart"), {
                    series: [<?php foreach ($dt_kasus_now as $data) { ?>
                              <?= $data->total ?>,
                            <?php } ?>],
                    chart: {
                      height: 350,
                      type: 'pie',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: [<?php foreach ($dt_kec as $dt) { ?>
                                "<?= $dt['kecamatan'] ?>",
                            <?php } ?>]
                  }).render();
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div><!-- End Website Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>
