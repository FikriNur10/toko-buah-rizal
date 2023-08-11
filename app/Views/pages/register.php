<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register</title>
  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!-- Custom styles for this template-->
</head>
</html>
<!-- PENGHUBUNG SURGA -->
<?= $this->extend("project/layout") ?>
<?= $this->section("content") ?>
<section class="gradient-custom">
  <div class="container py-4">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-success text-white" style="border-radius: 1rem;">
          <div class="card-body px-4 py-5">
            <h2 class="fw-bold mb-2 text-uppercase text-white">Daftar Akun</h2>
            <form action="<?php echo base_url('/register'); ?>" method="post">
              <div class="row row-cols-1">
                <div class="form-outline form-white mb-3 ">
                  <label class="form-label" for="name">Name</label>
                  <input type="text" id="name" name="name" value="<?= set_value('name') ?>" class="form-control form-control-sm" />
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('name') ?></small>
                  <?php endif; ?>
                </div>
                <div class="form-outline form-white mb-3">
                  <label class="form-label" for="email">Email</label>
                  <input type="email" id="email" name="email" value="<?= set_value('email') ?>" class="form-control form-control-sm" />
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('email') ?></small>
                  <?php endif; ?>
                </div>
              </div>
              <!-- alamat -->
              <div class="form-outline form-white mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address"><?= set_value('address') ?></textarea>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('address') ?></small>
                <?php endif; ?>
              </div>
              <!-- alamat -->
              <div class="row row-cols-2">
                <!-- kode pos -->
                <div class="form-outline form-white mb-3">
                  <label for="kodepos" class="form-label">Kode Pos</label>
                  <input type="number" class="form-control" id="kodepos" name="kodepos" value="<?= set_value('kodepos') ?>"></input>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('kodepos') ?></small>
                  <?php endif; ?>
                </div>
                <!-- kodepos end -->
                <!-- negara -->
                <div class="form-outline form-white mb-3">
                  <label for="negara" class="form-label">Negara</label>
                  <select class="form-control" id="negara" name="negara" value="<?= set_value('negara') ?>">
                    <option value="Indonesia" value="<?= set_value('negara') ?>">Indonesia</option>
                    <option value="Malaysia" value="<?= set_value('negara') ?>">Malaysia</option>
                    <option value="Singapura" value="<?= set_value('negara') ?>">Singapura</option>
                    <option value="Thailand" value="<?= set_value('negara') ?>">Thailand</option>
                    <option value="Filipina" value="<?= set_value('negara') ?>">Filipina</option>
                    <option value="Laos" value="<?= set_value('negara') ?>">Laos</option>
                    <option value="Myanmar" value="<?= set_value('negara') ?>">Myanmar</option>
                    <option value="Brunei Darussalam" value="<?= set_value('negara') ?>">Brunei Darussalam</option>
                  </select>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('negara') ?></small>
                  <?php endif; ?>
                </div>
                <!-- negara end -->
                <!-- kota -->
                <div class="form-outline form-white mb-3">
                  <label for="provinsi" class="form-label">Kota</label>
                  <input type="text" class="form-control" id="kota" name="kota" value="<?= set_value('kota') ?>"></input>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('provinsi') ?></small>
                  <?php endif; ?>
                </div>
                <!-- kota end -->
                <div class="form-outline form-white mb-3">
                  <label for="provinsi" class="form-label">Provinsi</label>
                  <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= set_value('provinsi') ?>"></input>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('provinsi') ?></small>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-outline form-white mb-3">
                <!-- telepon -->
                <div class="form-outline form-white mb-3">
                  <label class="form-label" for="phone">Nomer Telepon</label>
                  <input type="tel" id="phone" name="phone" value="<?= set_value('phone') ?>" class="form-control form-control-sm" />
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('phone') ?></small>
                  <?php endif; ?>
                </div>
                <!-- telepon end -->
                <div class="form-outline form-white mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control form-control-sm" id="password" name="password">
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('password') ?></small>
                  <?php endif; ?>
                </div>
                <div class="form-outline form-white mb-3">
                  <label for="confirm_password" class="form-label">Confirm Password</label>
                  <input type="password" class="form-control  form-control-sm" id="confirm_password" name="confirm_password">
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
                  <?php endif; ?>
                </div>
              </div>
              <div class="mb-3" hidden>
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="user">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('role') ?></small>
                <?php endif; ?>
              </div>
              <div class="d-grid gap-2 py-3">
                <button class="btn text-white" type="submit" style="
                background-color: #005E00;
                " ;>Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--====== SIGNIN ONE PART ENDS ======-->
<!-- Bootstrap core JavaScript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<?= $this->endSection() ?>
