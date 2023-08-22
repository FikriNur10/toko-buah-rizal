<link rel="stylesheet" type="text/css" href="../assets/css/checkout-style.css">
<div class="container py-5">
  <h1 class="h3 mb-1">Alamat Pengiriman</h1>
  <!-- form start -->
  <form action="/payment/checkout" method="post" enctype="multipart/form-data">
    <div class="row">
      <!-- Left -->
      <div class="accordion" id="accordionPayment">
        <!-- Credit card -->
        <div class="accordion-item">
          <div class="accordion-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Nama Penerima</label>
                  <input type="text" class="form-control" value="<?= $user['name']; ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Nomer Telepon</label>
                  <input type="text" class="form-control" value="<?= $user['phone']; ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label class="form-label">Provinsi</label>
                  <input type="text" class="form-control" value="<?= $paymentDetails['rajaongkir']['destination_details']['province']; ?>" disabled>
                </div>
              </div>
              <div class="col-lg-6 mb-3">
                <label class="form-label">Kota</label>
                <input type="text" class="form-control" value="<?= $paymentDetails['rajaongkir']['destination_details']['city_name']; ?>" disabled>
              </div>
              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" value="<?= $user['address']; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right -->
      <div class="col-lg-6">
        <h6 class="card-title mb-3">Rincian Belanja</h6>
        <?php
        $totalPrice = 0; // Initialize total price variable
        foreach ($cart['cartItems'] as $item) :
          $itemTotal = $item['product']['price'] * $item['quantity']; // Calculate item total
          $totalPrice += $itemTotal; // Add item total to total price
          $totalOngkir = $paymentDetails['rajaongkir']['results']['0']['costs'][1]['cost']['0']['value'];
        ?>
          <div class="d-flex justify-content-between mb-1 small">
            <!-- input ke form -->
            <input type="hidden" name="produk_code" value="<?= $cart['cartItems'][0]['product']['produk_code']; ?>">
            <input type="hidden" name="quantity" value="<?= $cart['cartItems'][0]['quantity']; ?>">
            <!-- input ke form end -->
            <span><?= $item['product']['name']; ?>(x<?= $item['quantity']; ?>)</span>
            <span>Rp <?= number_format($itemTotal, 2, '.', ','); ?></span>
          </div>
        <?php endforeach; ?>
        <div class="d-flex justify-content-between mb-1 small">
          <span>Ongkos Kirim</span> <span>Rp <?= number_format($totalOngkir, 2, '.', ','); ?></span>
          <input type="hidden" name="ongkir" value="<?= $totalOngkir; ?>">
        </div>
        <hr>
        <div class="d-flex justify-content-between mb-4 small">
          <span>TOTAL</span> <strong class="text-dark">Rp <?= number_format($totalPrice + $totalOngkir, 2, '.', ','); ?></strong>
        </div>
      </div>
      <div class="col-lg-6">
        <h6 class="card-title mb-3">Metode Pembayaran</h6>
        <div class="d-flex justify-content-between mb-1 small">
          <span>ATM/Bank Transfer</span>
        </div>
        <div class="d-flex justify-content-between mb-1 small">
          <span>Mandiri / TokoBuahRizal</span> <span>Rekening : 123 456 2322</span>
        </div>
        <hr>
        <div class="d-flex justify-content-between mb-1 small">
          <span>Upload Bukti Pembayaran</span>
          <input type="file" class="form-control-file" id="productImg" accept="image/*" name="bukti_pembayaran" required>
        </div>
      </div>
      <button class="btn btn-primary w-100 mt-2" type="submit">Buat Pesanan</button>
    </div>
  </form>
  <!-- form end -->
</div>