<?php 
$username = $_SESSION['user']['nama_user'];
$query = "SELECT * FROM tbl_pengguna WHERE nama_user='$username'";
$hasil = mysqli_query($connect, $query);
$tampil = mysqli_fetch_array($hasil);
?>
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="dist/img/HARAPAN.png" alt="SMK Wira Harapan Logo" class="brand-image" style="opacity: 0.8">
    <span class="brand-text font-weight-light">SMK Wira Harapan</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <a href="#" data-bs-toggle="modal" data-bs-target="#profile">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/profile2.gif" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $tampil['nama_user']; ?></a>
        </div>
      </div>
    </a>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->

  <div class="sidebar-custom">
    <a href="pages\login\logout.php" class="btn btn-link"><i class="fas fa-sign-out-alt" style="color: #c82333;"></i></a>
    <a href="pages\login\logout.php" class="btn btn-danger hide-on-collapse pos-right">Logout</a>
  </div>
    <!-- /.sidebar-custom -->
</aside>