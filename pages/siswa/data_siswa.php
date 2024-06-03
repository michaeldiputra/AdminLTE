<style>
  .table td,
  .table th {
    vertical-align: middle;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?page=home">Siswa</a></li>
            <li class="breadcrumb-item active">Data Siswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <!-- INSERT HERE INSERT HERE INSERT HERE INSERT HERE INSERT HERE INSERT HERE INSERT HERE INSERT HERE INSERT HERE INSERT HERE INSERT HERE -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
        </div>

        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
              <div class="col-sm-12 col-md-6"></div>
              <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="example2_info">
                  <thead>
                    <tr>
                      <th rowspan="1" colspan="1" style="width: 30px;" class=""></th>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="NIS: activate to sort column descending" style="width: 24px; ">NIS</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nama siswa: activate to sort column ascending">FOTO</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nama siswa: activate to sort column ascending">NAMA SISWA</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Alamat: activate to sort column ascending">ALAMAT</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jenis kelamin: activate to sort column ascending">JENIS KELAMIN</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Nama siswa: activate to sort column ascending">AGAMA</th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Jurusan: activate to sort column ascending">JURUSAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //include("header.php");
                    $q_tampil_siswa = "SELECT tbl_siswa.*,tbl_jurusan.* FROM tbl_siswa LEFT JOIN tbl_jurusan ON tbl_siswa.id_jur = tbl_jurusan.id_jur";
                    $tampil_siswa = mysqli_query($connect, $q_tampil_siswa);
                    $no = 1;
                    while ($tampil = mysqli_fetch_array($tampil_siswa)) {
                      $tampil_foto_siswa = $tampil['foto_siswa'];
                      ?>
                      <tr class="odd">
                        <td style="text-decoration: none; text-align: center;">
                          <a href="edit_siswa.php?id=<?php echo $tampil['nis'] ?>"style="text-decoration: none; text-align: center;" target="_blank">✏️</a>
                          <a href=""style="text-decoration: none; text-align: center;">⛔</a>
                        </td>
                        <td class="sorting_1 dtr-control" style="text-align: center;">
                          <?php echo $tampil['nis'] ?>
                        </td>
                        <td style="display: flex; text-align: center;">
                          <img src="<?php
                          if (file_exists($tampil_foto_siswa)) {
                            echo $tampil_foto_siswa;
                          } else {
                            echo 'pages\siswa\foto_siswa\404.png';
                          }
                          ?>" alt="foto_siswa" style="max-height: 100px;">
                        </td>
                        <td>
                          <?php echo $tampil['nama_siswa'] ?>
                        </td>
                        <td>
                          <?php echo $tampil['alamat_siswa'] ?>
                        </td>
                        <td>
                          <?php echo $tampil['jenis_kelamin'] ?>
                        </td>
                        <td>
                          <?php echo $tampil['agama'] ?>
                        </td>
                        <td>
                          <?php echo $tampil['nama_jur'] ?>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th rowspan="1" colspan="1"></th>
                      <th rowspan="1" colspan="1">NIS</th>
                      <th rowspan="1" colspan="1">FOTO</th>
                      <th rowspan="1" colspan="1">NAMA SISWA</th>
                      <th rowspan="1" colspan="1">ALAMAT</th>
                      <th rowspan="1" colspan="1">JENIS KELAMIN</th>
                      <th rowspan="1" colspan="1">AGAMA</th>
                      <th rowspan="1" colspan="1">JURUSAN</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>