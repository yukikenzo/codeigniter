
<div class="pagetitle">
      <h1>Website</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Website</li>
          <li class="breadcrumb-item active">Website</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?=base_url('assets/')?>img/<?=$website[0]['logo']?>" alt="Profile" class="rounded-circle">
              <h2><?=$website[0]['nama']?></h2>
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

              </ul>
              <div class="tab-content pt-2">


                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <?= form_open_multipart('admin/Dashboard/edit_website'); ?>
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Logo Website</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?=base_url('assets/')?>img/<?=$website[0]['logo']?>" alt="Profile">
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
                        <input name="nama" type="text" class="form-control" id="nama" value="<?=$website[0]['nama']?>" require>
                        <input name="id" type="text" class="form-control" id="id" value="<?=$website[0]['id']?>" require hidden>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
