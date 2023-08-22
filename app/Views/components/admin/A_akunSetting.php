 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Settings</h1>
     </div>
     <div>
         <form action="/user/update/<?php echo $user[0]['id']; ?>" method="post">
             <div class="form-group">
                 <label for="name">Nama</label>
                 <input type="text" class="form-control" id="name" placeholder="Masukan Nama" value="<?php echo $user[0]['name']; ?>" name="name">
             </div>
             <div class="form-group">
                 <label for="email">Email address</label>
                 <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $user[0]['email']; ?>" disabled>
                 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
             </div>
             <div class="form-group">
                 <label for="address">Alamat</label>
                 <input type="text" class="form-control" id="address" placeholder="Enter Alamat" value="<?php echo $user[0]['address']; ?>" name="address">
             </div>
             <div class="form-group">
                 <label for="negara">Negara</label>
                 <input type="text" class="form-control" id="negara" placeholder="Enter Negara" value="<?php echo $user[0]['negara']; ?>" name="negara">
             </div>
             <div class="form-group">
                 <label for="kodepos">Kode pos</label>
                 <input type="text" class="form-control" id="kodepos" placeholder="Enter Kode pos" value="<?php echo $user[0]['kodepos']; ?>" name="kodepos">
             </div>
             <div class="form-group">
                 <label for="provinsi">Provinsi</label>
                 <input type="text" class="form-control" id="provinsi" placeholder="Enter Provinsi" value="<?php echo $user[0]['provinsi']; ?>" name="provinsi">
             </div>
             <div class="form-group">
                 <label for="kota">Kota</label>
                 <input type="text" class="form-control" id="kota" placeholder="Enter Kota" value="<?php echo $user[0]['kota']; ?>" name="kota">
             </div>
             <div class="form-group">
                 <label for="kota">Phone</label>
                 <input type="text" class="form-control" id="phone" placeholder="Enter Kota" value="<?php echo $user[0]['phone']; ?>" name="phone">
             </div>
             <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="password" placeholder="Password" value="<?php echo $user[0]['password']; ?>" name="password">
             </div>
             <div class="form-group">
                 <label for="confirm_password">Confirm Password</label>
                 <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
             </div>
             <button type="submit" class="btn btn-primary">Save data</button>
         </form>

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