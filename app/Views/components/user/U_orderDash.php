 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->

     <div>
         <table class="table table-striped">
             <thead>
                 <tr>
                     <th scope="col">No</th>
                     <th scope="col">ID</th>
                     <th scope="col">Kode Produk</th>
                     <th scope="col">Nama Produk</th>
                     <th scope="col">Tanggal</th>
                     <th scope="col">Jumlah</th>
                     <th scope="col">Total Pesanan</th>
                     <th scope="col">Status</th>

                 </tr>
             </thead>
             <tbody>
                 <?php foreach ($payments as $trans) : ?>
                     <?php
                        $produkCodes = json_decode($trans['produk_code']);
                        $quantities = json_decode($trans['quantity']);
                        $totalPrice = $trans['total'];

                        // Loop through each product code and quantity and create a row
                        for ($i = 0; $i < count($produkCodes); $i++) :
                        ?>
                         <tr>
                             <?php if ($i === 0) : ?>
                                 <th rowspan="<?php echo count($produkCodes); ?>" scope="row"><?php echo $trans['id']; ?></th>
                             <?php endif; ?>
                             <td><?php echo $trans['trans_code']; ?></td>
                             <td>Nama Produk</td>
                             <td><?php echo $produkCodes[$i]; ?></td>
                             <td><?php echo $trans['created_at']; ?></td>
                             <td><?php echo $quantities[$i]; ?></td>
                             <td>Rp. <?php echo number_format($totalPrice, 2, '.', ','); ?></td>
                             <td><?php echo $trans['trans_status']; ?></td>
                         </tr>
                     <?php endfor; ?>
                 <?php endforeach; ?>
             </tbody>
         </table>
     </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 <!-- End of Main Content -->
 <!-- udah -->
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