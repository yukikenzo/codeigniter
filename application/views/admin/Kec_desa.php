    <div class="pagetitle">
    <h1>Kecamatan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Kec/Desa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-12">
          <div class="row">

          <?php foreach ($dt_kec as $dt) { ?>
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <a href="<?=base_url('admin/Kec_desa/desa?id_kec='. $dt->id_kec)?>">
                    <div class="card-body">
                    <h5 class="card-title"><?= $dt->kecamatan ?></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-archive"></i>
                        </div>
                        <div class="ps-3">
                        <h6><?= $dt->total ?></h6>
                        <span class="text-success small pt-1 fw-bold">Desa</span>

                        </div>
                    </div>
                    </div>
                    </a>

                </div>
                </div><!-- End Sales Card -->
            <?php } ?>

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>