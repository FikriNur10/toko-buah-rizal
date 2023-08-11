<div class="container-fluid">
    <!-- Content Row -->
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Pesanan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $trans) : ?>
                    <?php
                    $produkCodes = json_decode($trans['produk_code']);
                    $quantities = json_decode($trans['quantity']);
                    $totalPrice = $trans['total'];
                    $userName = $userModel->find($trans['user_id'])['name'];

                    // Loop through each product code and quantity and create a row
                    for ($i = 0; $i < count($produkCodes); $i++) :
                    ?>
                        <tr>
                            <?php if ($i === 0) : ?>
                                <th rowspan="<?php echo count($produkCodes); ?>" scope="row"><?php echo $trans['id']; ?></th>
                                <td rowspan="<?php echo count($produkCodes); ?>"><?php echo $trans['trans_code']; ?></td>
                                <td rowspan="<?php echo count($produkCodes); ?>"><?php echo $userName; ?></td>
                            <?php endif; ?>
                            <td><?php echo $produkCodes[$i]; ?></td>
                            <td><?php echo $trans['created_at']; ?></td>
                            <td><?php echo $quantities[$i]; ?></td>
                            <td>Rp <?= number_format($totalPrice, 2, ',', '.'); ?></td>
                            <td><?php echo $trans['trans_status']; ?></td>
                            <td><a href="/konfirmasi/<?php echo $trans['id']; ?>" class="btn btn-primary">Cek</a></td>
                        </tr>
                    <?php endfor; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
<!-- Udah -->