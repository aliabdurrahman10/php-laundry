<?php 

    $kode = $_GET['id'];

    $sql = $koneksi->query("delete from tb_pelanggan where kode_pelanggan='$kode'");

    if ($sql) {
      ?>
        <script type="text/javascript">
          alert("Data Berhasil Di hapus");
          window.location.href="?page=pelanggan";
        </script>

        <?php  
    }


 ?>