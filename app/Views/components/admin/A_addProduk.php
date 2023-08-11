<body>
  <div class="px-5">
    <h2>Tambah Product</h2>
    <?php if (session()->has('success')) : ?>
      <p><?= session('success'); ?></p>
    <?php endif; ?>
    <form method="post" action="/dashboard/tambahproduk/store" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <div class="form-group mb-3">
        <label for="product_name">Kode Produk</label>
        <input type="text" class="form-control" name="produk_code" id="produk_code" placeholder="Masukkan Kode Product" required>
      </div>
      <div class="form-group mb-3">
        <label for="product_name">Nama Produk</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Product" required>
      </div>
      <div class="form-group mb-3">
        <label for="product_price">Harga</label>
        <input type="number" class="form-control" name="price" id="price" placeholder="Masukkan Harga" required>
      </div>
      <div class="form-group mb-3">
        <label for="expiried_date">Tanggal Expiried</label>
        <p><input type="date" name="expiried_date"></p>
      </div>
      <div class="form-group mb-3">
        <label for="product_stock">Stock</label>
        <input type="number" class="form-control" name="stock" id="stock" placeholder="Masukkan Jumlah" required>
      </div>
      <div>
        <div class="form-group mb-3">
          <label for="image">Gambar Produk</label>
          <input type="file" class="form-control-file" name="image" id="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
  </div>
  <script>
    $(function() {
      $("#datepicker").datepicker();
    });
  </script>