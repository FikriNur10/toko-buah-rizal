<section class="p-5">
    <div class="px-5 pb-4">
        <H1>Produk Kami</H1>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 px-5">
        <?php foreach ($product as $productItem) : ?>
            <form action="/cart/add" method="post">
                <!-- <?= csrf_field(); ?>     -->
                <div class="col">
                    <div class="card">
                        <img src="/uploads/<?php echo $productItem['product_image']; ?>" class="card-img-top" alt="Hollywood Sign on The Hill" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $productItem['product_name']; ?></h5>
                            <p class="card-text"><?php echo $productItem['product_price']; ?></p>
                            <div class="d-grid gap-2">
                                <a class="btn btn-success" type="button">Buy Now</a>
                                <button class="btn btn-primary" type="submit">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <!-- Form for input data -->
                    <input type="text" value="<?php echo $productItem['product_code']; ?>" class="form-control" name="product_code" id="product_code" required hidden>
                    <input type="text" value="<?php echo session()->get('id') ?>" class="form-control" name="user_id" id="user_id" required hidden>
                    <input type="text" value="1" class="form-control" name="cart_qty" id="cart_qty" required hidden>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</section>