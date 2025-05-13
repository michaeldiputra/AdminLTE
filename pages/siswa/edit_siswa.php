<?php
// include("..\inc\koneksi.php");
$nis = $_GET['id'];
if (empty($nis)) {
    // Jika $nis kosong, arahkan ke view_siswa.php
    header("location:view_siswa.php");
    exit(); // Pastikan keluar dari skrip setelah mengarahkan
}
$query = "select * from tbl_siswa where nis='$nis'";
  //  echo $query;
$result = mysqli_query($connect, $query);
$tampil_siswa = mysqli_fetch_assoc($result);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Data Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?page=home">Siswa</a></li>
            <li class="breadcrumb-item active">Edit Data Siswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Input Data Siswa</h3>
        </div>
        <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <!-- input nis -->
            <div class="form-group">
              <label> NIS</label>
              <input type="text" name="nis" class="form-control" placeholder="0000"  required>
            </div>
            <!-- input nama siswa -->
            <div class="form-group">
              <label> Nama Siswa</label>
              <input type="text" name="nama" class="form-control" placeholder="Nama siswa"  required>
            </div>
            <!-- input Alamat siswa -->
            <div class="form-group">
              <label> Alamat Siswa</label>
              <textarea class="form-control" name="alamat" rows="3" placeholder="Jalan, No.(nomor rumah), Kecamatan, Kabupaten, Provinsi"  required></textarea>
            </div>
            <!-- input jenis kelamin  -->
            <div class="form-group">
              <label> Jenis Kelamin Siswa</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" required>
                <label class="form-check-label">Laki-Laki</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
                <label class="form-check-label">Perempuan</label>
              </div>
            </div>
            <!-- input Agama  -->
            <div class="form-group">
              <label>Agama</label>
              <select class="form-control" name="agama" required>
                <option value="Kristen">Kristen</option>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Konghucu">konghucu</option>
              </select>
            </div>
            <!-- Foto Siswa -->
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                  <label class="custom-file-label" for="exampleInputFile">Input file</label>
                </div>
              </div>
            </div>
            <!-- Pilih Jurusan Siswa -->
            <div class="form-group">
              <label for="exampleInputFile">Jurusan Siswa</label>
              <select class="form-control" name="jurusan" id="">
                <option value="">--PILIH JURUSAN--</option>
                <?php
                $q_tampil_jurusan = "SELECT * from tbl_jurusan";
                $tampil_jurusan = mysqli_query($connect, $q_tampil_jurusan);
                while ($tampil = mysqli_fetch_array($tampil_jurusan)) {
                  echo "<option value=$tampil[id_jur]>$tampil[nama_jur]</option>";
                }
                ?>
              </select>
            </div>
          </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="proses" value="proses">Submit</button>
              <button type="reset" class="btn btn-danger" name="proses" value="proses">Cancel</button>
            </div>
        </form>
      <?php

      $f_nis = $f_nama = $f_alamat = $f_jenis_kelamin = $f_agama = "";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $f_nis = ($_POST["nis"]);
        $f_nama = ($_POST["nama"]);
        $f_alamat = ($_POST["alamat"]);
        $f_jenis_kelamin = ($_POST["jenis_kelamin"]);
        $f_agama = ($_POST["agama"]);
        $jurusan = $_POST["jurusan"];
        //membaca nama file
        $f_foto = $_FILES['foto']['name'];
        //temporary file 
        $f_tmp_foto = $_FILES['foto']['tmp_name'];
        //membaca type dari file
        $f_type_foto = $_FILES['foto']['type'];
        //membaca ukuran dari file
        $f_size_foto = $_FILES['foto']['size'];
        //untuk mengambil jenis file/extantion
        $extArray = explode(".", $f_foto);
        $ext = end($extArray);
        //untuk membuat file name baru
        $new_name = $f_nama . '.' . $ext;
        $dir = 'pages/siswa/foto_siswa/';
        if (!file_exists($dir)) {
          mkdir($dir, 0777, true); // Membuat direktori jika belum ada
        }

        $tujuan = $dir . $new_name;
        move_uploaded_file($f_tmp_foto, $tujuan);
        if (isset($_FILES['foto'])) {
          move_uploaded_file($f_tmp_foto, $dir . $new_name);
        }

        function test_input($data)
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        $q_input_siswa = "INSERT INTO tbl_siswa(nis,nama_siswa,alamat_siswa,jenis_kelamin,agama,foto_siswa,id_jur) VALUES ('$f_nis','$f_nama','$f_alamat','$f_jenis_kelamin','$f_agama','$tujuan','$jurusan')";

        try {
          $input_siswa = mysqli_query($connect, $q_input_siswa);
          if ($input_siswa) {
            echo "<div class='alert alert-success' role='alert'>Data berhasil tersimpan</div>";
          } else {
            echo "<div class='alert alert-danger' role='alert'>Gagal menyimpan data</div>";
          }
        } catch (mysqli_sql_exception $e) {
          if ($e->getCode() == 1062) { // kode error untuk 'Duplicate entry'
            echo "<div class='alert alert-danger' role='alert'>NIS sudah terdaftar</div>";
          } else {
            throw $e; // melempar kembali pengecualian jika bukan duplikat entri
          }
        }
      }
      // echo "$tujuan"
      ?>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
</div>