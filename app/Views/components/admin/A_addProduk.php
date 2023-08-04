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
        <input type="text" class="form-control" name="product_code" id="product_code" placeholder="Masukkan Nama Product" required>
      </div>
      <div class="form-group mb-3">
        <label for="product_name">Nama Produk</label>
        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Masukkan Nama Product" required>
      </div>
      <div class="form-group mb-3">
        <label for="product_price">Harga</label>
        <input type="number" class="form-control" name="product_price" id="product_price" placeholder="Masukkan Harga" required>
      </div>
      <div class="form-group mb-3">
        <label for="product_description">Deskripsi</label>
        <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Masukkan Harga" required>
      </div>
      <div class="form-group mb-3">
        <label for="product_stock">Stock</label>
        <input type="number" class="form-control" name="product_stock" id="product_stock" placeholder="Masukkan Jumlah" required>
      </div>
      <div class="form-group mb-3">
        <label for="image">Gambar Produk</label>
        <input type="file" class="form-control-file" name="product_image" id="product_image" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
  </div>

  


<!-- <div class="container-fluid" hidden>
  <h1>Add New Product</h1>
  <?php if (session()->has('success')) : ?>
    <p><?= session('success'); ?></p>
  <?php endif; ?>
  <form method="post" action="/dashboard/tambahproduk/store">
    <?= csrf_field(); ?>
    <label for="product_code">Product Code:</label>
    <input type="text" name="product_code" required><br>

    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required><br>

    <label for="product_price">Product Price:</label>
    <input type="number" name="product_price" required><br>

    <label for="product_description">Product Description:</label>
    <textarea name="product_description" required></textarea><br>

    <label for="product_stock">Product Stock:</label>
    <input type="number" name="product_stock" required><br>

    <label for="product_image">Product Image:</label>
    <input type="text" name="product_image" required><br>

    <button type="submit">Submit</button>
  </form>
</div> -->
