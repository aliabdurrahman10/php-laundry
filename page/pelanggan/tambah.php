<?php 

        //integrasi sql ke kode pelanggan yang ada di tb_pelanggam
        $sql = $koneksi->query("select kode_pelanggan from tb_pelanggan order by kode_pelanggan desc");
        //
        $data = $sql->fetch_assoc();
        //
        $kode_pelanggan = $data['kode_pelanggan'];
        //
        $urut = substr($kode_pelanggan, 4, 4);
        //
        $tambah = (int) $urut+1;
        //
        if(strlen($tambah)==1) {
          $format="PLG-"."000".$tambah;
        //
        }elseif(strlen($tambah)==2) {
          $format="PLG-"."00".$tambah;
        //
        }elseif(strlen($tambah)==3) {
          $format="PLG-"."0".$tambah;
        //
        }else{
          $format="PLG-".$tambah;
        }

        

 ?>



<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <!-- buat kolom masing-masing untuk tambah data -->
            <!-- buat METHOD POST untuk memproses tambah data -->
            <form method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Pelanggan</label>
                  <!-- menambah fungsi php untuk memasukkan kode menggunakan $format-->
                  <input type="text" class="form-control"value="<?php echo $format ?>" name="kode">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Telpon</label>
                  <input type="text" class="form-control" name="telpon">
                </div>

                 <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat"></textarea>
                </div>

                
               <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>


          <?php 

          //menambah fungsi php untuk fungsi simpan dan di kirim ke tb_pelanggan

          if(isset($_POST['simpan'])){


            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $telpon = $_POST['telpon'];
            $alamat = $_POST['alamat'];
            //dibawah ini untuk memasukkan database
            $sql = $koneksi->query("insert into tb_pelanggan (kode_pelanggan, nama, alamat, telpon)values ('$kode', '$nama', '$alamat', '$telpon')");

            if ($sql) {
              ?>
                <!-- jiika data sudah berhasil disimpan, akan muncul kata berhasil dan di arahkan ke page pelanggan -->
                <script type="text/javascript">
                  alert("Data Berhasil Di simpan");
                  window.location.href="?page=pelanggan";
                </script>

              <?php  


              
            }


          }




           ?>