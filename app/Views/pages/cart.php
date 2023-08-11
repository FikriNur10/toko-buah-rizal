<section class="" style="background-color: #eee;">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>
        <?php
        $totalPrice = 0;
        foreach ($cartItems as $item) :
          $itemTotal = $item['product']['price'] * $item['quantity'];
          $totalPrice += $itemTotal;
        ?>
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img src="/uploads/<?php echo $item['product']['image']; ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="lead fw-normal mb-2"><?php echo $item['product']['name']; ?></p>
                  <p><span class="text-muted">Satuan: </span>Kg</p>
                </div>
                <!-- jumlah -->
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <a class="btn btn-link px-2" onclick="changeQuantity(this, -1)">
                    <i class="fas fa-minus"></i>
                  </a>
                  <form action="/cart/update/<?php echo $item['id']; ?>" method="post">
                  <input id="form1" min="0" name="quantity" value="<?php echo $item['quantity']; ?>" type="number" class="form-control form-control-sm" data-cart-id="<?php echo $item['id']; ?>" onchange="updatePrice(this)">
                  <a class="btn btn-link px-2" onclick="changeQuantity(this, 1)">
                    <i class="fas fa-plus"></i>
                  </a>
                </div>
                <!-- harga -->
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <h5 class="mb-0">Total Price: <span id="total-price-<?php echo $item['id']; ?>"><?php echo number_format($item['product']['price'] * $item['quantity'], 2, '.'); ?></span></h5>
                </div>
                <!-- harga end -->
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <button href="/cart/update/<?php echo $item['id']; ?>" class="text-success" type="submit"><i class="fa fa-pencil"></i></button>
                </div>
              </form>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  <a href="/cart/remove/<?php echo $item['id']; ?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- Cart Card End-->
          <?php endforeach; ?>
          <div class="card rounded-3 mb-4">
            <div class="px-5 py-3 text-end">
              <h5>Total: <span id="grand-total"><?php echo number_format($totalPrice, 2, '.', ','); ?></span></h5>
            </div>
          </div>
          <div class="d-grid gap-2 col-2 mx-auto">
            <a class="btn btn-success btn-lg" type="button" href="payment">Beli</a>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  function changeQuantity(button, change) {
    var input = button.parentNode.querySelector('input[type=number]');
    var newValue = parseInt(input.value) + change;
    if (newValue >= 0) {
      input.value = newValue;
      updatePrice(input);
    }
  }
  function updatePrice(input) {
    var cartId = input.getAttribute('data-cart-id');
    var pricePerItem = <?php echo $item['product']['price']; ?>;
    var quantity = parseInt(input.value);
    var totalPrice = pricePerItem * quantity;
    document.getElementById('total-price-' + cartId).textContent = totalPrice.toFixed(2).replace('.', ',');

    // Update grand total
    var grandTotal = 0;
    <?php foreach ($cartItems as $item) : ?>
      var itemPrice = <?php echo $item['product']['price']; ?>;
      var itemQuantity = parseInt(document.querySelector('input[data-cart-id="<?php echo $item['id']; ?>"]').value);
      var itemTotal = itemPrice * itemQuantity;
      grandTotal += itemTotal;
    <?php endforeach; ?>
    document.getElementById('grand-total').textContent = grandTotal.toFixed(2).replace('.', ',');
  }
</script>