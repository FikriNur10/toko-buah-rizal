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

<section class="gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-success text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 ">
            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Daftar Akun</h2>
              <form action="<?php echo base_url('/register'); ?>" method="post">
              <div class="row row-cols-2">
              <div class="form-outline form-white mb-4 ">
              <label class="form-label" for="username">Username</label> 
                <input type="text" id="username" class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-4">
              <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-lg" />
              </div>
              </div>
              <div class="row row-cols-2">
              <div class="form-outline form-white mb-4">
              <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control form-control-lg" />
              </div>
              <div class="form-outline form-white mb-4">
              <label class="form-label" for="notlp">Nomer Telepon</label>
                <input type="text" id="notlp" class="form-control form-control-lg" />
              </div>
              </div>
              <div class="form-outline form-white mb-4">
              <label class="form-label" for="alamat">Alamat</label>
                <input type="text" id="alamat" class="form-control form-control-lg" />
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Daftar</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--====== SIGNIN ONE PART ENDS ======-->
<!-- Bootstrap core JavaScript-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


</html>

<!-- PENGHUBUNG SURGA -->

<?=$this->extend("project/layout")?>
  
<?=$this->section("content")?>
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Register</h5>
                    <form action="<?php echo base_url('/register'); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('name') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('email') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address"><?= set_value('address') ?></textarea>
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('address') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="<?= set_value('phone') ?>">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('phone') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control" id="role" name="role" value="user">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('role') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('password') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            <?php if(isset($validation)):?>
                                <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
                            <?php endif;?>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Register Now</button>
                            <p class="text-center">Have already an account <a href="<?php echo base_url('/login'); ?>">Login here</a><p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     
</div>
  
<?=$this->endSection()?>