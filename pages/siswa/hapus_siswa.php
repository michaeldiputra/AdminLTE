<?php 
include "..\inc/koneksi.php";
$id=$_GET['id'];
$q_hapus_siswa="delete from tbl_siswa where nis='$id'";
$hapus_siswa=mysqli_query($connect,$q_hapus_siswa);
if($hapus_siswa){
  echo "Data telah terhapus";
  ?>
  <script>
    alert('Data telah terhapus')
  </script>
  <?php
  header("location:view_siswa.php");
} else{
  echo "Data gagal terhapus";
}
echo $id;
?>