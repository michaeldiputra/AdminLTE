<?php
// Start the session
session_start();
include "inc\koneksi.php";

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
  // header("location: pages\login\login.php"); // Redirect to login page if not logged in
  if (!empty($_GET['page'])) {

    $page = $_GET['page'];
    switch ($page) {
      case 'register':
        include "pages/login/register.php";
        break;
      default:
        include "pages/login/login.php";
        break;
    }
  } else {
    include "pages/login/login.php";
  }
  exit();
} else

  include 'template_header.php';
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