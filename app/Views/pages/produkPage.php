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
        <?php foreach ($product as $index => $productItem) : ?>
            <form action="/cart/add" method="post">
                <div class="col">
                    <div class="card">
                        <img src="/uploads/<?php echo $productItem['image']; ?>" class="card-img-top" style="max-height: 200px; object-fit: contain;" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $productItem['name']; ?></h5>
                            <p class="card-text mb-1">Rp. <?php echo number_format($productItem['price'], 2, ',', '.'); ?>/Kg</p>
                            <p class="card-text">Stock : <?php echo $productItem['stock']; ?> Kg</p>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-secondary mb-1" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $index; ?>">
                                    Detail
                                </button>
                            </div>
                            <?php if (session('isLoggedIn') === TRUE) : ?>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Add to Cart</button>
                                </div>
                            <?php else : ?>
                                <div class="d-grid gap-2">
                                    <a class="btn btn-primary" href="/login">Add to Cart</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Form for input data -->
                    <input type="text" value="<?php echo $productItem['produk_code']; ?>" class="form-control" name="produk_code" id="produk_code" required hidden>
                    <input type="text" value="<?php echo session()->get('id') ?>" class="form-control" name="id" id="id" required hidden>
                    <input type="text" value="1" class="form-control" name="quantity" id="quantity" required hidden>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo $index; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $productItem['name']; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="/uploads/<?php echo $productItem['image']; ?>" class="card-img-top" style="max-height: 200px; object-fit: contain;" />
                                <h5 class="card-title"><?php echo $productItem['name']; ?></h5>
                                <p class="card-text mb-1"><?php echo $productItem['deskripsi']; ?></p>

                                <p class="card-text mb-1">Harga : Rp. <?php echo number_format($productItem['price'], 2, ',', '.'); ?></p>
                                <p class="card-text mb-1">Expiried : <?php echo $productItem['expiried_date']; ?></p>
                                <p class="card-text">Stock : <?php echo $productItem['stock']; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>

</section>
<script>

</script>