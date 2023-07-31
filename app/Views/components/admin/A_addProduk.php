<<<<<<< HEAD


<body>
  <div class="container mt-4">
    <h2>Tambah Product</h2>
    <form enctype="multipart/form-data">
      <div class="form-group mt-5">
        <label for="product_name">Nama Produk:</label>
        <input type="text" class="form-control" id="productName" placeholder="Masukkan Nama Product" required>
      </div>
      <div class="form-group">
        <label for="price">Harga:</label>
        <input type="number" class="form-control" id="productPrice" placeholder="Masukkan Harga" required>
      </div>
      <div class="form-group">
        <label for="quantity">Jumlah:</label>
        <input type="number" class="form-control" id="quantity" placeholder="Masukkan Jumlah" required>
      </div>
      <div class="form-group">
        <label for="image">Gambar Produk:</label>
        <input type="file" class="form-control-file" id="productImg" accept="image/*" required>
      </div>
      <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
  </div>

  


=======
<div class="container-fluid">
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
</div>
>>>>>>> f2e7132254adbf2d60aa49b4339db3a742097b86
