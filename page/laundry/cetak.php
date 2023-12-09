<?php 

 include "../../include/koneksi.php";
	
 $id = $_GET['id'];
 $sql = $koneksi->query("select * from tb_laundry, tb_pelanggan, tb_user where tb_laundry.id_pelanggan=tb_pelanggan.kode_pelanggan and tb_laundry.kode_user=tb_user.id");

	$data = $sql->fetch_assoc();



 ?>

 <script>


 	window.print();
 	window.onfocus=function () {window.close();}
 	


 </script>

 <body onload="window.print()">
 	


 <table>

 	<tbody>
 		<tr>
 			<td>Laundry Bogor</td>
 		</tr>
 		<tr>
 			<td>Bukit Permai blok B6</td>
 		</tr>
 		<tr>
 			<td>Telpon: 086775170409</td>
 		</tr>
 	</tbody> 	
 </table>

 <hr width="30%" align="left">


 <table>
     
     <tbody>
         <tr>
            <td>Kasir</td>
            <td>:</td>
            <td><?php echo $data['nama_user'] ?></td>
         </tr>

          <tr>
            <td>Pelanggan</td>
            <td>:</td>
            <td><?php echo $data['nama'] ?></td>
         </tr>

          <tr>
            <td>Tanggal Cuci</td>
            <td>:</td>
            <td><?php echo $data['tanggal_terima'] ?></td>
         </tr>

          <tr>
            <td>Tanggal Selesai</td>
            <td>:</td>
            <td><?php echo $data['tanggal_selesai'] ?></td>
         </tr>

          <tr>
            <td>Berat (kg)</td>
            <td>:</td>
            <td><?php echo $data['jumlah_kiloan'] ?></td>
         </tr>

         <tr>
            <td>Total Harga</td>
            <td>:</td>
            <td><?php echo $data['nominal'] ?></td>
         </tr>

         <tr>
            <td>Status</td>
            <td>:</td>
            <td><?php echo $data['status'] ?></td>
         </tr> 

         <tr>
            <td>Catatan Barang</td>
            <td>:</td>
            <td><?php echo $data['catatan'] ?></td>
         </tr>        

     </tbody>
 </table>

 <br><br>


 <table>

    <tbody>
        <tr>
            <td>Note:</td>
        </tr>

        <tr>
            <td width="350"> Barang tidak di ambil lebih dari sebulan maka bukan menjadi tanggung jawab laundry</td>
        </tr>

    </tbody>
     
 </table>


  </body>
