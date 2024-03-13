<div class="pagetitle">
    <h1>Data Stunting</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Data Stunting</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <form action="<?= base_url('admin/Dt_stunting_all') ?>" method="post">
            <div class="row mt-3">
                <div class="col-md-1">
                  <h5 class="mt-1">Periode</h5>
                </div>
                <div class="col-md-2">
                <input type="date" class="form-control" name="awal" value="<?=$awal?>" required>
                </div>

                <div class="col-md-2">
                  <input type="date" class="form-control" name="akhir" value="<?=$akhir?>" required>
                </div>

                <div class="col-md-2">
                <div class="form-group">
                    <select class="form-control" id="kecamatan" name="kecamatan">
                    <option value="<?=$kecamatan?>"><?=$kecamatan?></option>
                    <?php foreach ($id_kec as $kec) { ?>
                      <option value="<?=$kec['kecamatan']?>"><?=$kec['kecamatan']?></option>
                    <?php } ?>
                    </select>
                </div>
                </div>

                <div class="col-md-2">
                <div class="form-group">
                    <select class="form-control" id="status" name="status">
                    <option value="<?=$status?>"><?=$status?></option>
                    <option value="Status">Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Gejala">Gejala</option>
                    <option value="Sembuh">Sembuh</option>
                    </select>
                </div>
                </div>
                

                <div class="col-md-3">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Search"><i class="bi bi-search"></i></button>
                <a href="<?= base_url('admin/Dt_stunting_all/cetak_all?awal='.$awal .'&'.'akhir='. $akhir.'&'.'status='. $status. '&'.'kecamatan='.$kecamatan) ?>" class='btn btn-success' target="_blank" data-toggle="tooltip" data-placement="top" title="Print"><i class='bi bi-printer'></i></a>
                <a href="<?=base_url('admin/Kec_desa')?>" class="btn btn-primary">
                    <i class="ri-user-add-line"></i> Tambah
                </a>
                </div>

            </div>

        </form>
                

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Name Lengkap</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Kec/Desa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  foreach ($dt_stunting as $dt) { ?>
                    <tr>
                      <th scope="row"><?=$no++?></th>
                      <td><?=$dt['nik']?></td>
                      <td><?=$dt['nama']?></td>
                      <td><?=$dt['umur']?> Tahun</td>
                      <td><?=$dt['l/p']?></td>
                      <td><?=$dt['status']?></td>
                      <td><?=$dt['tgl']?></td>
                      <td><?=$dt['thn']?></td>
                      <td><?=$dt['kecamatan']?>/<?=$dt['desa']?></td>
                      
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
