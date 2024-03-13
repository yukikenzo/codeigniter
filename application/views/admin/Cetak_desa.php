<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$website[0]['nama']?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url('assets/')?>img/<?=$website[0]['logo']?>" rel="icon">
  <link href="<?=base_url('assets/')?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/')?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url('assets/') ?>dist/sweetalert2.min.css" id="theme-styles" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/')?>css/style.css" rel="stylesheet">

  <style type="text/css">
        @page {
            size: landscape;
        }
    </style>

    <style>
        table {
            font-size: 12px; /* Mengatur ukuran huruf untuk seluruh tabel */
            width: 100%;
        }
    </style>


</head>

<body>

    <!-- Page Wrapper -->
    <div id="wrapper">
    <h2 class="text-center">Laporan Kasus Stunting Kota Ambon</h2>
    <hr>
        
      <div class="row">
        <div class="col-md-6">
            <table class="table2 table-borderless">
                <tbody>
                    <tr>
                        <th scope="row">Kecamatan</th>
                        <td>: <?=$dt_stunting[0]['kecamatan']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Desa</th>
                        <td>: <?=$dt_stunting[0]['desa']?></td>
                    </tr>
                    <tr>
                        <th scope="row">Waktu Cetak</th>
                        <td>: <?=$tgl_cetak?></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
        <!-- Table with stripped rows -->
        <table class="table table-bordered mt-3">
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
                      
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
       
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script type="text/javascript">
        window.print();
    </script>

   
<!-- Vendor JS Files -->
<script src="<?=base_url('assets/') ?>js/jquery-3.6.0.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/chart.js/chart.umd.js"></script>
<script src="<?=base_url('assets/')?>vendor/echarts/echarts.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/quill/quill.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?=base_url('assets/')?>vendor/tinymce/tinymce.min.js"></script>
<script src="<?=base_url('assets/')?>vendor/php-email-form/validate.js"></script>
<script src="<?= base_url('assets/') ?>dist/sweetalert2.all.min.js"></script>

<!-- Template Main JS File -->
<script src="<?=base_url('assets/')?>js/main.js"></script>

</body>

</html>