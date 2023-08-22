 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Tambah Admin</h1>
     </div>
     <div>
         <form action="/dashboard/tambahadmin/store" method="post">
             <div class="form-group">
                 <label for="name">Nama</label>
                 <input type="text" class="form-control" id="name" placeholder="Masukan Nama" name="name">
             </div>
             <div class="form-group">
                 <label for="email">Email address</label>
                 <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
             </div>
             <div class="form-group">
                 <label for="address">Alamat</label>
                 <input type="text" class="form-control" id="address" placeholder="Enter Alamat" name="address">
             </div>
             <div class="form-group">
                 <label for="negara">Negara</label>
                 <input type="text" class="form-control" id="negara" placeholder="Enter Negara" name="negara">
             </div>
             <div class="form-group">
                 <label for="kodepos">Kode pos</label>
                 <input type="text" class="form-control" id="kodepos" placeholder="Enter Kode pos" name="kodepos">
             </div>
             <div class="form-group">
                 <label for="provinsi">Provinsi</label>
                 <input type="text" class="form-control" id="provinsi" placeholder="Enter Provinsi" name="provinsi">
             </div>
             <div class="form-group">
                 <label for="kota">Kota</label>
                 <input type="text" class="form-control" id="kota" placeholder="Enter Kota" name="kota">
             </div>
             <div class="form-group">
                 <label for="kota">Phone</label>
                 <input type="number" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
             </div>
             <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="password" placeholder="Password" name="password">
             </div>
             <div class="form-group">
                 <label for="role">Roles</label>
                 <select class="form-control" id="role" name="role">
                     <option value="admin" selected>Admin</option>
                 </select>
             </div>
             <button type="submit" class="btn btn-primary">Save data</button>
         </form>
     </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 <!-- End of Main Content -->
 <!-- udah -->