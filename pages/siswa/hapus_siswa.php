<?php 
// include "../../inc/koneksi.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
  die("ID tidak ditemukan.");
}

$id = mysqli_real_escape_string($connect, $_GET['id']);
$q_hapus_siswa = "DELETE FROM tbl_siswa WHERE nis='$id'";
$hapus_siswa = mysqli_query($connect, $q_hapus_siswa);

if ($hapus_siswa) {
  echo "<script>
      alert('Data telah terhapus');
      window.location.href = '/AdminLTE/?page=data_siswa';
  </script>";
  exit();
} else {
  echo "Data gagal terhapus: " . mysqli_error($connect);
}
?>