
<div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?=base_url('assets/')?>img/<?=$user['foto']?>" alt="Profile" class="rounded-circle">
              <h2><?=$user['nama']?></h2>
              <h3><?=$user['status']?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">


                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <?= form_open_multipart('admin/Dashboard/edit_user'); ?>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?=base_url('assets/')?>img/<?=$user['foto']?>" alt="Profile">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nama" class="col-md-4 col-lg-3 col-form-label">Foto</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="nama" value="<?=$user['nama']?>" require>
                        <input name="id_login" type="text" class="form-control" id="id_login" value="<?=$user['id_login']?>" require hidden>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="status" class="col-md-4 col-lg-3 col-form-label">Status</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="status" type="text" class="form-control" id="status" value="<?=$user['status']?>" disabled require>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <?= form_open_multipart('admin/Dashboard/edit_password'); ?>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Sekarang</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="old_password" type="password" class="form-control" id="old_password" require>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password" type="password" class="form-control" id="new_password" require>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="confirm_password" class="col-md-4 col-lg-3 col-form-label">Ulangi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirm_password" type="password" class="form-control" id="confirm_password" require>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
