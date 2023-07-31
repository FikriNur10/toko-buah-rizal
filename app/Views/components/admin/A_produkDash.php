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
      <div class="row">
          <!-- Earnings (Monthly) Card Example -->
          <div class="row row-cols-1 row-cols-md-4 g-4">
              <?php foreach ($product as $productItem): ?>
              <div class="col">
                  <div class="card">
                      <img src="/assets/img/anggur.jpg" class="card-img-top" alt="Hollywood Sign on The Hill" />
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $productItem['product_name']; ?></h5>
                          <p class="card-text"><?php echo $productItem['product_price']; ?></p>
                          <a href="#" class="btn btn-primary">Edit</a>
                          <a href="/dashboard/produk/<?php echo $productItem['product_code']; ?>/delete" class="btn btn-danger">Hapus</a>
                      </div>
                  </div>
                </div>
                <?php endforeach; ?>
          </div>
    
          <!-- End of Main Content -->