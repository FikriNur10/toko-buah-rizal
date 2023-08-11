<section class="p-5">
    <?php if (session('isLoggedIn') === TRUE) : ?>
        <?php if (strcasecmp(session('negara'), 'Indonesia') !== 0) : ?>
            <div class="alert alert-danger" role="alert">
                Anda tidak berada di Indonesia, Anda tidak dalam jangkauan pengiriman kami.
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="px-5 pb-4">
        <H1>Produk Kami</H1>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 px-5">
        <?php foreach ($product as $productItem) : ?>
            <form action="/cart/add" method="post">
                <div class="col">
                    <div class="card">
                        <img src="/uploads/<?php echo $productItem['image']; ?>" class="card-img-top" style="max-height: 200px; object-fit: contain;" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $productItem['name']; ?></h5>
                            <p class="card-text">Harga : Rp.<?php echo number_format($productItem['price'], 2, ',', '.'); ?></p>
                            <p class="card-text">Expiried : <?php echo $productItem['expiried_date']; ?></p>
                            <p class="card-text">Stock : <?php echo $productItem['stock']; ?></p>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- Form for input data -->
                    <input type="text" value="<?php echo $productItem['produk_code']; ?>" class="form-control" name="produk_code" id="produk_code" required hidden>
                    <input type="text" value="<?php echo session()->get('id') ?>" class="form-control" name="id" id="id" required hidden>
                    <input type="text" value="1" class="form-control" name="quantity" id="quantity" required hidden>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</section>