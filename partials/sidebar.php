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
        <li class="nav-item">
          <a href="?page=dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-user"></i>
            <p>
              Siswa
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?page=input_siswa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Input Siswa
                  <i class="right fas fa-solid fa-plus"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=data_siswa" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Siswa</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-suitcase"></i>
            <p>
              Guru
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?page=input_guru" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Input Guru
                  <i class="right fas fa-solid fa-plus"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=data_guru" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Guru</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-clipboard"></i>
            <p>
              Jurusan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?page=input_jurusan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Input Jurusan
                  <i class="right fas fa-solid fa-plus"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=data_jurusan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Jurusan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-solid fa-book"></i>
            <p>
              Mata Pelajaran
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?page=input_mp" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Input Mata Pelajaran
                  <i class="right fas fa-solid fa-plus"></i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=data_mp" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Mata Pelajaran</p>
              </a>
            </li>
          </ul>
        </li>
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