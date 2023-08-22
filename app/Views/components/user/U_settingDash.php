 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">Settings</h1>
     </div>
     <div>
         <form action="/user/update/<?php echo $user['id']; ?>" method="post">
             <div class="form-group">
                 <label for="name">Nama</label>
                 <input type="text" class="form-control" id="name" placeholder="Masukan Nama" value="<?php echo $user['name']; ?>" name="name">
             </div>
             <div class="form-group">
                 <label for="email">Email address</label>
                 <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $user['email']; ?>" disabled>
                 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
             </div>
             <div class="form-group">
                 <label for="address">Alamat</label>
                 <input type="text" class="form-control" id="address" placeholder="Enter Alamat" value="<?php echo $user['address']; ?>" name="address">
             </div>
             <div class="form-group">
                 <label for="negara">Negara</label>
                 <input type="text" class="form-control" id="negara" placeholder="Enter Negara" value="<?php echo $user['negara']; ?>" name="negara">
             </div>
             <div class="form-group">
                 <label for="kodepos">Kode pos</label>
                 <input type="text" class="form-control" id="kodepos" placeholder="Enter Kode pos" value="<?php echo $user['kodepos']; ?>" name="kodepos">
             </div>
             <div class="form-group">
                 <label for="provinsi">Provinsi</label>
                 <select class="form-control" id="provinsi" name="provinsi">
                     <option selected>Pilih Provinsi</option>
                     <?php
                        $selectedProvinceCode = $user['provinsi']; // Province code from the user data
                        $selectedProvinceName = ''; // Initialize with an empty value
                        if (isset($provinsi) && isset($provinsi['rajaongkir']['results'])) {
                            foreach ($provinsi['rajaongkir']['results'] as $pr) {
                                if ($pr['province_id'] === $selectedProvinceCode) {
                                    $selectedProvinceName = $pr['province'];
                                    break; // No need to continue searching once found
                                }
                            }

                            foreach ($provinsi['rajaongkir']['results'] as $pr) {
                                echo '<option value="' . $pr['province_id'] . '"';
                                if ($pr['province_id'] === $selectedProvinceCode) {
                                    echo ' selected';
                                }
                                echo '>' . $pr['province'] . '</option>';
                            }
                        }
                        ?>
                 </select>
             </div>
             <div class="form-group">
                 <label for="kota">Kota</label>
                 <select class="form-control" id="autosearch" name="kota">
                     <option selected>Pilih Kota</option>
                     <?php
                        $selectedCityId = $user['kota']; // Assuming you have city ID in $user['kota']
                        $selectedCityName = ''; // Initialize with an empty value

                        if (isset($kota) && isset($kota['rajaongkir']['results'])) {
                            foreach ($kota['rajaongkir']['results'] as $kt) {
                                if ($kt['city_id'] === $selectedCityId) {
                                    $selectedCityName = $kt['city_name'];
                                    echo '<option value="' . $kt['city_id'] . '" selected>' . $selectedCityName . '</option>';
                                } else {
                                    echo '<option value="' . $kt['city_id'] . '">' . $kt['city_name'] . '</option>';
                                }
                            }
                        }
                        ?>
                 </select>
             </div>
             <div class="form-group">
                 <label for="password">Password</label>
                 <input type="password" class="form-control" id="password" placeholder="Password" value="<?php echo $user['password']; ?>" name="password">
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