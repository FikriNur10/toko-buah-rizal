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
                             <td><?php echo $totalPrice; ?></td>
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