<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 pr-3">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        <a href="/dashboard/tambahadmin" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Tambah data Admin</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="table-responsive  overflow-hidden">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Email</th>
                            <th scope="col">Provinsi</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <th><?= $user['id'] ?></th>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <?php
                                    $userProvinceCode = $user['provinsi']; // Assuming the province code is stored in $user['provinsi']
                                    $userProvinceName = '';
                                    foreach ($provinsi['rajaongkir']['results'] as $pr) {
                                        if ($pr['province_id'] === $userProvinceCode) {
                                            $userProvinceName = $pr['province'];
                                            break;
                                        }
                                    }
                                    echo $userProvinceName;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $userCityCode = $user['kota']; // Assuming the city code is stored in $user['kota']
                                    $userCityName = '';
                                    foreach ($kota['rajaongkir']['results'] as $kt) {
                                        if ($kt['city_id'] === $userCityCode) {
                                            $userCityName = $kt['city_name'];
                                            break;
                                        }
                                    }
                                    echo $userCityName;
                                    ?>
                                </td>
                                <td><?= $user['address'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td>
                                    <a type="button" class="btn btn-danger" href="/user/<?= $user['id'] ?>/delete">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
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