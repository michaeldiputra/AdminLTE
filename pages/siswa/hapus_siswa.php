<?php 
include "../../inc/koneksi.php";
$id=$_GET['id'];
$q_hapus_siswa="DELETE FROM tbl_siswa WHERE nis='$id'";
$hapus_siswa=mysqli_query($connect,$q_hapus_siswa);
if($hapus_siswa){
  echo "Data telah terhapus";
  ?>
  <script>
    alert('Data telah terhapus')
  </script>
  <?php
  header("Location: /21_michael_adminlte/?page=data_siswa");
} else{
  echo "Data gagal terhapus";
}
echo $id;
?>