  <!-- Begin Page Content -->
  <div class="container-fluid">
      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4 pr-3">
          <h1 class="h3 mb-0 text-gray-800">Produk</h1>
          <a href="/dashboard/tambahproduk" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah</a>
      </div>
      <div class="align-items-center mb-4 ">
      </div>
      <!-- Content Row -->
      <div class="row px-4">
          <!-- Earnings (Monthly) Card Example -->
          <div class="row row-cols-1 row-cols-md-4 g-4">
              <?php foreach ($product as $productItem) : ?>
                  <div class="col">
                      <div class="card mb-3">
                          <img src="/uploads/<?php echo $productItem['image']; ?>" class="card-img-top" alt="Hollywood Sign on The Hill" />
                          <div class="card-body">
                              <h5 class="card-title"><?php echo $productItem['name']; ?></h5>
                              <p class="card-text"><?php echo $productItem['deskripsi']; ?></p>
                              <p class="card-text mb-1">Harga : <?php echo number_format($productItem['price'], 2, ',', '.'); ?></p>
                              <p class="card-text mb-1">Expiried :<?php echo $productItem['expiried_date']; ?></p>
                              <p class="card-text">Stock :<?php echo $productItem['stock']; ?></p>
                              <a href="/edit/<?php echo $productItem['produk_code']; ?>" class="btn btn-primary">Edit</a>
                              <a href="/dashboard/produk/delete/<?php echo $productItem['id']; ?>" class="btn btn-danger">Hapus</a>
                          </div>
                      </div>
                  </div>
              <?php endforeach; ?>
          </div>
      </div>
  </div>
  <!-- End of Main Content -->
  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../assets/js/demo/datatables-demo.js"></script>