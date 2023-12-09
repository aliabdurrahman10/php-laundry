<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <!-- buat kolom masing-masing untuk tambah data -->
            <!-- buat METHOD POST untuk memproses tambah data -->
            <form method="POST">
              <div class="box-body">

              	 
                

                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Pembelian</label>
                  <input type="date" class="form-control" name="tgl_transaksi">
                </div>

                  <div class="form-group">
                  <label for="exampleInputPassword1">Harga</label>
                  <input type="number" class="form-control" name="nominal">
                </div>


                 <div class="form-group">
                  <label>Catatan (Jenis Barang)</label>
                  <textarea class="form-control" rows="3" name="catatan"></textarea>
                </div>

                
               <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>


          <?php 

          //menambah fungsi php untuk fungsi simpan dan di kirim ke tb_laundry

          if(isset($_POST['simpan'])){


            $tgl_transaksi = $_POST['tgl_transaksi'];
            $nominal = $_POST['nominal'];
            $catatan = $_POST['catatan'];

            $id_user = $_SESSION['admin'] ?? $_SESSION['kasir'];


          
               $sql = $koneksi->query("insert into tb_transaksi (kode_user, tgl_transaksi, pengeluaran, catatan, keterangan)values ('$id_user', '$tgl_transaksi', '$nominal','$catatan', 'pengeluaran')");



                if ($sql) {
                  ?>
                    <!-- jiika data sudah berhasil disimpan, akan muncul kata berhasil dan di arahkan ke page laundry -->
                    <script type="text/javascript">
                      alert("Data Berhasil Di simpan");
                      window.location.href="?page=transaksi";
                    </script>
                    

                  <?php  


                  
                }

            


          }




           ?>