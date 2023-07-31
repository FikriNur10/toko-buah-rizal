<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content=""> 

  <title>Login</title>

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
          <div class="card-body p-5">
            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <?php if(session()->getFlashdata('error')):?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif;?>
                    <form action="<?php echo base_url('/login'); ?>" method="post">
              <p class="text-white-50 mb-5">Masukkan username dan password</p>
              <div class="form-outline form-white mb-4 ">
              <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control form-control-lg" />
              </div>

              <div class="form-outline form-white mb-4">
              <label class="form-label" for="password">Password</label>
                <input type="password" id="password" class="form-control form-control-lg" />
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
            </div>

            <div>
            <p class="mb-0 text-center">Tidak Punya Akun? <a href="<?php echo base_url('/register'); ?>" class="text-white-50 fw-bold">Daftar Disini</a><p>
              <p class="mb-0 text-center">Tidak Punya Akun? <a href="/register" class="text-white-50 fw-bold"></a>
              </p>
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