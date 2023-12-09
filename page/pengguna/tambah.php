<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Pengguna</h3>
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
                  <input type="text" class="form-control" name="username">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password">
                </div>

                <div class="form-group">
                <label>Posisi</label>
                <select class="form-control select2" style="width: 100%;" name="level" required="">
                  <option value="">-Pilih Posisi-</option>

                  <option>admin</option>
                  <option>kasir</option>
                </select>
              </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                  <input type="file" name="Foto">
                </div>

                
               <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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

            $upload = move_uploaded_file($lokasi, "images/".$foto);

            if ($upload) {
            	
            



            //dibawah ini untuk memasukkan database
            $sql = $koneksi->query("insert into tb_user (username, nama_user, password, level, Foto)values ('$username', '$nama', '$password', '$kasir', '$foto')");

            if ($sql) {
              ?>
                <!-- jiika data sudah berhasil disimpan, akan muncul kata berhasil dan di arahkan ke page pengguna -->
                <script type="text/javascript">
                  alert("Data Berhasil Di simpan");
                  window.location.href="?page=pengguna";
                </script>

              <?php  


              
            }


          }

      }




           ?>