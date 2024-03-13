<div class="pagetitle">
    <h1><?=$dt_stunting[0]['desa']?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Kec/Desa</li>
          <li class="breadcrumb-item"><?=$dt_stunting[0]['kecamatan']?></li>
          <li class="breadcrumb-item"><?=$dt_stunting[0]['desa']?></li>
          <li class="breadcrumb-item active">Data Stunting</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Stunting</h5>
              <a href="<?= base_url('admin/Kec_desa/cetak_desa?id_desa='. $dt_stunting[0]['id_desa']) ?>" class='btn btn-success btn-sm' target="_blank" data-toggle="tooltip" data-placement="top" title="Print"><i class='bi bi-printer'></i></a>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
              <i class="ri-user-add-line"></i> Tambah
              </button>
              

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
                    <th scope="col" colspan="2">Aksi</th>
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
                      <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable<?=$dt['nik']?>" type="button" class="btn btn-success btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri ri-edit-line"></i> </a>
                      </td>
                      <td>
                        <a href="<?= base_url('admin/Kec_desa/hapus_stunting?nik=' . $dt['nik'] . '&'. 'id_desa=' . $dt['id_desa']) ?>" class="btn btn-danger btn-sm tombol-hapus" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="bi bi-trash"></i> </a>
                      </td>
                      
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



<!-- Modal Dialog Scrollable -->
    
<div class="modal fade" id="modalDialogScrollable" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Stunting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
            <div style="font-weight: bold;" class="card-body">
              <!-- Vertical Form -->
              <?= form_open_multipart('admin/Kec_desa/tambah_stunting'); ?>

              <div class="row mt-4">

                <div class="col-6">
                  <label class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" value="<?=$dt_stunting[0]['kecamatan']?>" disabled>
                </div>

                <div class="col-6">
                  <label for="id_desa" class="form-label">Desa</label>
                  <input type="text" class="form-control" value="<?=$dt_stunting[0]['desa']?>" disabled>
                  <input type="text" class="form-control" id="id_desa" name="id_desa" value="<?=$dt_stunting[0]['id_desa']?>" hidden>
                </div>

              </div>

                <div class="col-12 mt-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="number" class="form-control" id="nik" name="nik" required>
                </div>

                <div class="col-12">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="col-12">
                  <label for="umur" class="form-label">Umur</label>
                  <input type="number" class="form-control" id="umur" name="umur" required>
                </div>

                <div class="col-12">
                  <label for="l/p" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="l/p" name="l/p" aria-label="State">
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="col-12">
                  <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" aria-label="State">
                      <option value="Aktif">Aktif</option>
                      <option value="Gejala">Gejala</option>
                      <option value="Sembuh">Sembuh</option>
                    </select>
                </div>

                <div class="col-12">
                  <label for="tgl" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="tgl" name="tgl" required>
                </div>

                <div class="col-12">
                  <label for="thn" class="form-label">Tahun</label>
                  <input type="number" class="form-control" id="thn" name="thn" required>
                </div>
                
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
      </div>
    </div>
  </div>
</div><!-- End Modal Dialog Scrollable-->

<?php foreach ($dt_stunting as $dt) { ?>
<!-- Modal Edit -->
    
<div class="modal fade" id="modalDialogScrollable<?=$dt['nik']?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data Stunting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="card">
            <div style="font-weight: bold;" class="card-body">
              <!-- Vertical Form -->
              <?= form_open_multipart('admin/Kec_desa/edit_stunting'); ?>

              <div class="row mt-4">

                <div class="col-6">
                  <label class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" value="<?=$dt['kecamatan']?>" disabled>
                </div>

                <div class="col-6">
                  <label for="id_desa" class="form-label">Desa</label>
                  <input type="text" class="form-control" value="<?=$dt['desa']?>" disabled>
                  <input type="text" class="form-control" id="id_desa" name="id_desa" value="<?=$dt['id_desa']?>" hidden>
                </div>

              </div>

                <div class="col-12 mt-3">
                  <label for="nik" class="form-label">NIK</label>
                  <input type="number" class="form-control" value="<?=$dt['nik']?>" disabled>
                  <input type="number" class="form-control" id="nik" name="nik" value="<?=$dt['nik']?>" hidden>
                </div>

                <div class="col-12">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" required value="<?=$dt['nama']?>">
                </div>

                <div class="col-12">
                  <label for="umur" class="form-label">Umur</label>
                  <input type="number" class="form-control" id="umur" name="umur" required value="<?=$dt['umur']?>"> 
                </div>

                <div class="col-12">
                  <label for="l/p" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="l/p" name="l/p" aria-label="State">
                      <option value="<?=$dt['l/p']?>"><?=$dt['l/p']?></option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="col-12">
                  <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" aria-label="State">
                    <option value="<?=$dt['status']?>"><?=$dt['status']?></option>
                      <option value="Aktif">Aktif</option>
                      <option value="Gejala">Gejala</option>
                      <option value="Sembuh">Sembuh</option>
                    </select>
                </div>

                <div class="col-12">
                  <label for="tgl" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" id="tgl" name="tgl" required value="<?=$dt['tgl']?>">
                </div>

                <div class="col-12">
                  <label for="thn" class="form-label">Tahun</label>
                  <input type="number" class="form-control" id="thn" name="thn" required value="<?=$dt['thn']?>">
                </div>
                
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>
      </div>
    </div>
  </div>
</div><!-- End Modal Dialog Scrollable-->
<?php } ?>

