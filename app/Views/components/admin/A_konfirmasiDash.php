<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pembayaran Order #1235245454</h1>
    </div>
    <!--Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-wrapper">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">Pembayaran</h3>
                                <span class="float-right text-success font-weight-bold" style="margin-top: -30px;"></span>
                            </div>
                            <div class="card-body p-0">
                                <table class="table align-items-center table-flush table-hover">
                                    <tr>
                                        <td>Transfer</td>
                                        <td><b>Rp <?= number_format($transaction['total'], 2, ',', '.'); ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td><b><?php echo $transaction['created_at']; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><b>
                                                <span class="badge badge-info">Menunggu konfirmasi</span>
                                                <!-- <span class="badge badge-success">Dikonfirmasi</span> -->
                                                <!--<span class="badge badge-danger">Gagal</span>-->
                                            </b></td>
                                    </tr>
                                    <tr>
                                        <td>Transfer ke</td>
                                        <td>
                                            <div style="white-space: initial;"><b>
                                                </b> Mandiri a.n Toko Buah Rizal (1234567890)</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Transfer dari</td>
                                        <td>
                                            <div style="white-space: initial;">
                                                <?php

                                                use App\Models\UserModel;

                                                $userModel = new UserModel();
                                                $user = $userModel->find($transaction['user_id']);

                                                if ($user) {
                                                    echo '<b>Bca a.n ' . $user['name'] . ' (123691283)</b>';
                                                } else {
                                                    echo 'User tidak ditemukan';
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="mb-0">Bukti Pembayaran</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="text-center">
                                <img alt="Pembayaran Order #" class="img img-fluid" src="/uploads/<?php echo $transaction['image']; ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <form action="/konfirmasi/<?php echo $transaction['id']; ?>/update" method="post">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="hidden" name="trans_code" value="<?php echo $transaction['trans_code']; ?>">
                                        <select class="form-control" name="trans_status">
                                            <option value="success" <?php if ($transaction['trans_status'] == 'success') echo 'selected'; ?>>Konfirmasi Pembayaran</option>
                                            <option value="failed" <?php if ($transaction['trans_status'] == 'failed') echo 'selected'; ?>>Pembayaran Tidak Ada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        <input type="submit" class="btn btn-primary" value="OK">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
</div>