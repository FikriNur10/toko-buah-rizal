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