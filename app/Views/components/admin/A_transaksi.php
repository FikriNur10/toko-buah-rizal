<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-3">
            <div class="card-body">
                <div class="table-responsive  overflow-hidden">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Total Pesanan</th>
                                <th>Status</th>
                                <th>Action</th>
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
                                        <td><?= (new DateTime($trans['created_at']))->format('l, m-d-Y'); ?></td>
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
        </div>

    </div>
    <!-- /.container-fluid -->
</div>

<!-- Udah -->
<!-- Custom styles for this template-->
<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../assets/js/demo/datatables-demo.js"></script>