<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from tb_laundry where id_laundry='$id'");
	$data = $sql->fetch_assoc();

	$tanggal = $data['tanggal_terima'];
	$nominal = $data['nominal'];
	$catatan = $data['catatan'];

	$kode_user = $data['kode_user'];

	$sql2 = $koneksi->query("insert into tb_transaksi (kode_user, tgl_transaksi, pemasukan, catatan, keterangan)values ('$kode_user', '$tanggal', '$nominal','$catatan', 'pemasukan')");

	$sql2 = $koneksi->query("update tb_laundry set status='Lunas' where id_laundry= '$id'");

	 if ($sql) {
                  
                  ?>
                    <!-- jiika data sudah berhasil disimpan, akan muncul kata berhasil dan di arahkan ke page laundry -->
                    <script type="text/javascript">
                      alert("Data Berhasil Di simpan");
                      window.location.href="?page=laundry";
                    </script>
                    

                  <?php  


                  
                }






 ?>