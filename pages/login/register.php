<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">

  <?php
  include "inc/koneksi.php"; // Koneksi ke database
  
  if (isset($_POST["submit"])) {
    // Ambil data dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama_user = $_POST["namauser"];
    $alamat_user = $_POST["alamatuser"];
    $notlp_user = $_POST["notlpuser"];
    $repeat_password = $_POST["repeatpassword"];
    $level = "guest";

    // Hash password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Periksa kesalahan input
    $errors = array();
    if (empty($username) || empty($password) || empty($nama_user) || empty($repeat_password) || empty($alamat_user) || empty($notlp_user)) {
      $errors[] = "All fields are required.";
    }
    if ($password !== $repeat_password) {
      $errors[] = "Passwords do not match.";
    }

    // Periksa apakah username sudah ada
    $sql = "SELECT * FROM tbl_pengguna WHERE username = '$username'";
    $result = mysqli_query($connect, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
      $errors[] = "Username already exists.";
    }

    if (count($errors) > 0) {
      foreach ($errors as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
      }
    } else {
      // Membuat ID user otomatis
      $user_id = "ID001"; // Default ID jika tabel kosong
      $id_sql = "SELECT id_user FROM tbl_pengguna ORDER BY id_user DESC LIMIT 1"; // Mendapatkan ID terakhir
      $id_result = mysqli_query($connect, $id_sql);
      if ($id_result && mysqli_num_rows($id_result) > 0) {
        $last_id = mysqli_fetch_assoc($id_result)['id_user'];
        $user_id = str_pad((int) substr($last_id, 2) + 1, 3, '0', STR_PAD_LEFT); // Tambah 1 dan pad dengan 0
      }

      // Tampilkan ID User baruk
      echo "Your new user ID is: " . $user_id; // Memanggil dan menampilkan ID User
  
      // Masukkan data ke database
      $sql = "INSERT INTO tbl_pengguna (id_user, nama_user, username, password, alamat_user, notlp_user, level) VALUES (?, ?, ?, ?, ?, ?, ?)";
      $stmt = mysqli_stmt_init($connect);

      if (mysqli_stmt_prepare($stmt, $sql)) {
        // Pastikan jumlah parameter sesuai dengan jumlah kolom
        mysqli_stmt_bind_param($stmt, "sssssss", $user_id, $nama_user, $username, $passwordHash, $alamat_user, $notlp_user, $level); // Enam parameter
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>You are registered successfully.</div>";
      } else {
        echo "Something went wrong.";
      }
    }
  }
  ?>

  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new account</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name" name="namauser" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-at"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password" name="repeatpassword" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="tel" class="form-control" placeholder="User's phone" name="notlpuser" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <textarea class="form-control" rows="3" placeholder="User address" name="alamatuser" required></textarea>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker-alt"></span>
              </div>
            </div>
          </div>

          <a href="pages\login\logout.php" class="text-center">I already have a account</a>
          <p> </p>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>