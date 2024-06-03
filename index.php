<?php 
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("location: pages\login\login.php"); // Redirect to login page if not logged in
    exit();
}

include 'template_header.php';
include "inc\koneksi.php";
?>

<!-- Content Wrapper. Contains page content -->

<?php 
if (!empty($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    case 'dashboard':
      include "pages/home/dashboard.php";
      break;
    case 'input_siswa':
      include "pages/siswa/input_siswa.php";
      break;
    case 'data_siswa':
      include "pages/siswa/data_siswa.php";
      break;
    case 'hapus_siswa':
      include "pages/siswa/hapus_siswa.php";
      break;
    case 'portfolio':
      include "pages/home/portfolio.html";
      break;
    case 'label':
      # code...
      break;
    default:
      include '404.php';
      break;
  }
} else {
  include 'pages/home/dashboard.php';
}
?>
<!-- /.content-wrapper -->

<?php include 'template_footer.php' ?>