

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

  


