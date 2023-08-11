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
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="password" placeholder="Password" value="<?php echo $user[0]['password']; ?>" name="password">
             </div>
             <div class="form-group">
                 <label for="confirm_password">Confirm Password</label>
                 <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
             </div>
             <div class="form-group form-check">
                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
             </div>
             <button type="submit" class="btn btn-primary">Save data</button>
         </form>

     </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 <!-- End of Main Content -->
 <!-- udah -->