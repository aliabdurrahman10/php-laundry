<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

         
          <!-- Dashboard Utama -->
            <?php if ($_SESSION['admin']){ ?>
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            

            <li><a href="?page=pengguna"><i class="fa fa-dashboard"></i> User</a></li>
            <?php } ?>
            <li><a href="?page=pelanggan"><i class="fa fa-dashboard"></i> Data Pelanggan</a></li>
            
            <li><a href="?page=laundry"><i class="fa fa-dashboard"></i> Transaksi Laundry</a></li>
            <?php if ($_SESSION['admin']){ ?>

            <li><a href="?page=transaksi"><i class="fa fa-money"></i> Laporan Keuangan </a></li>
            <?php } ?>



            
       </ul>
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
 