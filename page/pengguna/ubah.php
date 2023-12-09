<?php 
        

        $id = $_GET['id'];

        //integrasi sql ke kode pengguna yang ada di tb_pelanggam
        $sql = $koneksi->query("select * from tb_user where id='$id'");

        $data = $sql->fetch_assoc();
        

        

 ?>
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <!-- buat kolom masing-masing untuk tambah data -->
            <!-- buat METHOD POST untuk memproses tambah data -->
            <form method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <!-- menambah fungsi php untuk memasukkan kode menggunakan $format-->
                  <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_user'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password" value="<?php echo $data['password'] ?>">
                </div>

                <div class="form-group">
                <label>Posisi</label>
                <select class="form-control select2" style="width: 100%;" name="level" required="">
                  <option value="">-Pilih Posisi-</option>


                  <option <?= $data['level'] == 'admin' ? 'selected' : '' ?>>admin</option>
                  <option <?= $data['level'] == 'kasir' ? 'selected' : '' ?>>kasir</option>
                </select>
              </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                  <label> <img src="images/<?php echo $data['Foto'] ?>" width="100" height="100" alt=""></label>
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Ganti Foto</label>
                  <input type="file" name="Foto">
                </div>

                
               <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
              </div>
            </form>
          </div>


          <?php 

          //menambah fungsi php untuk fungsi simpan dan di kirim ke tb_user

          if(isset($_POST['simpan'])){


            $username = $_POST['username'];
            $nama = $_POST['nama'];
            $password = $_POST['password'];
            $kasir = $_POST['level'];

            $foto= $_FILES['Foto']['name'];
            $lokasi= $_FILES['Foto']['tmp_name'];


            if (!empty($lokasi)) {
            	move_uploaded_file($lokasi, "images/".$foto);
            	
         		 //dibawah ini untuk memasukkan database
              $sql = $koneksi->query("update tb_user set username='$username', nama_user='$nama', Foto='$foto', password='$password', level='$kasir' where id='$id'");
            } else {
              $sql = $koneksi->query("update tb_user set username='$username', nama_user='$nama', password='$password', level='$kasir' where id='$id'");
            }


            if ($sql) {
              ?>
                <!-- jiika data sudah berhasil disimpan, akan muncul kata berhasil dan di arahkan ke page pelanggan -->
                <script type="text/javascript">
                  alert("Data Berhasil Di simpan");
                  window.location.href="?page=pengguna";
                </script>

              <?php  


              
            }


          



      }




           ?>