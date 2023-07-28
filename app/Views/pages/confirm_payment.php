<link rel="stylesheet" type="text/css" href="../assets/css/checkout-style.css">

<div class="container py-5">
  <h1 class="h3 mb-5">Alamat Pengiriman</h1>
  <div class="row">
    <!-- Left -->
    <div class="col-lg-9">
      <div class="accordion" id="accordionPayment">
        <!-- Credit card -->
        <div class="accordion-item mb-1">
          <div id="collapseCC" class="accordion-collapse collapse show" data-bs-parent="#accordionPayment">
            <div class="accordion-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Name Penerima</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label">Nomer Telepon</label>
                    <input type="text" class="form-control" placeholder="MM/YY">
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                  <label class="form-label">Catatan</label>
                  <input type="text" class="form-control" placeholder="">
                </div>
                <div class="col-lg-3">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- PayPal -->
        <div class="accordion-item mb-3 border">
          <div id="collapsePP" class="accordion-collapse collapse" data-bs-parent="#accordionPayment">
            <div class="accordion-body">
              <div class="px-2 col-lg-6 mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Right -->
    <div class="col-lg-3">
      <div class="card position-sticky top-0">
        <div class="p-3 bg-light bg-opacity-10">
          <h6 class="card-title mb-3">Rincian Belanja</h6>
          <div class="d-flex justify-content-between mb-1 small">
            <span>Subtotal</span> <span>Rp 25.000,00</span>
          </div>
          <div class="d-flex justify-content-between mb-1 small">
            <span>Ongkos Kirim</span> <span>Rp 10.000,00</span>
          </div>
          <hr>
          <div class="d-flex justify-content-between mb-4 small">
            <span>TOTAL</span> <strong class="text-dark">Rp 35.000,00</strong>
          </div>
          <h6 class="card-title mb-3">Metode Pembayaran</h6>
          <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
            <input class="form-check-input" type="radio" name="payment" id="payment1">
           <label class="form-check-label pt-1" for="payment1">Transfer Bank</label>
          </div>
          <div class="form-check w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseCC" aria-expanded="false">
            <input class="form-check-input" type="radio" name="payment" id="payment1">
            <label class="form-check-label pt-1" for="payment1">Bayar Ditempat</label>
          </div>
          <a class="btn btn-primary w-100 mt-2" href="/product">Buat Pesanan</a>
        </div>
      </div>
    </div>
  </div>
</div>