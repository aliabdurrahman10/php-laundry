<?php 
        

        $kode = $_GET['id'];

        //integrasi sql ke kode pelanggan yang ada di tb_pelanggam
        $sql = $koneksi->query("select * from tb_pelanggan where kode_pelanggan='$kode'");

        $data = $sql->fetch_assoc();
        

        

 ?>



<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <!-- buat kolom masing-masing untuk tambah data -->
            <!-- buat METHOD POST untuk memproses tambah data -->
            <form method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Pelanggan</label>
                  <!-- menambah fungsi php untuk memasukkan kode menggunakan $data kode pelanggan-->
                  <!-- menambah fungsi php echo di setiap kolom data untuk menampilkan data dari db laundry-->
                  <input type="text" class="form-control" value="<?php echo $data['kode_pelanggan'] ?>" readonly name="kode">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" value="<?php echo $data['nama'] ?>"  name="nama">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Telpon</label>
                  <input type="text" class="form-control" value="<?php echo $data['telpon'] ?>"  name="telpon">
                </div>

                 <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat"><?php echo $data['alamat']; ?></textarea>
                </div>

                
               <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Ubah</button>
              </div>
            </form>
          </div>


          <?php 

          //menambah fungsi php untuk fungsi simpan dan di kirim ke tb_pelanggan
          

          if(isset($_POST['simpan'])){


           
            $nama = $_POST['nama'];
            $telpon = $_POST['telpon'];
            $alamat = $_POST['alamat'];
            //dibawah ini untuk memasukkan database
            $sql2 = $koneksi->query("update tb_pelanggan set nama='$nama', telpon='$telpon', alamat='$alamat' where kode_pelanggan='$kode'");

            if ($sql2) {
              ?>
                <!-- jiika data sudah berhasil diubah, akan muncul kata berhasil dan di arahkan ke page pelanggan -->
                <script type="text/javascript">
                  alert("Data Berhasil Di ubah");
                  window.location.href="?page=pelanggan";
                </script>

              <?php  


              
            }


          }




           ?>