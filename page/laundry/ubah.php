<?php 
        

        $idlaundry = $_GET['id'];

        //integrasi sql ke kode pelanggan yang ada di tb_pelanggam
        $sql = $koneksi->query("select * from tb_laundry where id_laundry='$idlaundry'");

        $data = $sql->fetch_assoc();
        
        

 ?>
<script type="text/javascript">
  
  function sum(){
      var jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
      var total = parseInt(jumlah_kiloan)*7000;

      if(!isNaN(total)){

        document.getElementById('nominal').value = total;
  }
}

</script> 


<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Transaksi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <!-- buat kolom masing-masing untuk tambah data -->
            <!-- buat METHOD POST untuk memproses tambah data -->
            <form method="POST">
              <div class="box-body">

                 <div class="form-group">
                <label>Nama</label>
                <select class="form-control select2" style="width: 100%;" name="pelanggan" required="">
                  <option value="">-Pilih-</option>



                  <?php   

                    $sql = $koneksi->query("select * from tb_pelanggan");


                    while($item=$sql->fetch_assoc()) {
                      ?>
                        <option value="<?= $item['kode_pelanggan'] ?>" <?= $data['id_pelanggan'] == $item['kode_pelanggan'] ? 'selected' : '' ?>> <?= $item['nama'] ?></option>
                      <?php

                    }


                   ?>
                 
                </select>
              </div>

              
                

                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Terima</label>
                  <input type="date" class="form-control" name="tgl_terima" value="<?php echo $data['tanggal_terima'] ?>">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Selesai</label>
                  <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $data['tanggal_selesai'] ?>">
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah kiloan</label>
                  <input type="number" class="form-control" onkeyup="sum();" id="jumlah_kiloan" name="jml_kiloan" value="<?php echo $data['jumlah_kiloan'] ?>" required>
                </div>
                

                  <div class="form-group">
                  <label for="exampleInputPassword1">Total</label>
                  <input type="number" class="form-control" name="total" id="nominal" value="<?php echo $data['nominal'] ?>" readonly="">
                </div>

                <div class="form-group">
                <label>Status</label>
                <select class="form-control select2" style="width: 100%;" name="status" required="">
                  <option value="">-Pilih Status-</option>

                  <option <?= $data['status'] == 'Lunas' ? 'selected' : '' ?>>Lunas</option>
                  <option <?= $data['status'] == 'Belum Lunas' ? 'selected' : '' ?>>Belum Lunas</option>


                 
                </select>
              </div>

                 <div class="form-group">
                  <label>Catatan</label>
                  <textarea class="form-control" rows="3" name="catatan"><?php echo $data['catatan'] ?></textarea>
                </div>
 
                
               <!-- /.box-body -->


          <div class="box-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
              </div>
            </form>
          </div>



          <?php 
          //menambah fungsi php untuk fungsi simpan dan di kirim ke tb_laundry

          if(isset($_POST['simpan'])){

            $pelanggan = $_POST['pelanggan'];
            $tgl_terima = $_POST['tgl_terima'];
            $tgl_selesai = $_POST['tgl_selesai'];
            $jml_kiloan = $_POST['jml_kiloan'];

            $total = $_POST['total'];
            $status = $_POST['status'];
            $catatan = $_POST['catatan'];

            $id_user = $_SESSION['admin'] ?? $_SESSION['kasir'];


            //dibawah ini untuk memasukkan database
            $sql2 = $koneksi->query("update tb_laundry set id_pelanggan='$pelanggan', tanggal_terima='$tgl_terima', tanggal_selesai='$tgl_selesai', jumlah_kiloan='$jml_kiloan', nominal='$total', status='$status', catatan='$catatan' where id_laundry='$idlaundry'");       


            if ($sql2) {
              ?>
                <!-- jiika data sudah berhasil disimpan, akan muncul kata berhasil dan di arahkan ke page laundry -->
                <script type="text/javascript">
                  alert("Data Berhasil Di simpan");
                  window.location.href="?page=laundry";
                </script>
                

              <?php  


              
            }

            


          }




           ?>