<?php
include 'inc/koneksi.php';
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMK Wira Harapan</title>
  <?php include 'partials\stylesheet.php'; ?>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'partials\navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
    $username =$_SESSION['user']['nama_user'];
    $query = "SELECT * FROM tbl_pengguna WHERE nama_user='$username'";
    //echo $query;
    $hasil = mysqli_query($connect, $query);
    $tampil = mysqli_fetch_array($hasil);
    // echo "level anda adalah " , $tampil['level'];
  if ($tampil['level'] == "admin") {
    include 'partials\sidebar.php'; 

  }elseif ($tampil['level'] == "petugas"){
    include 'partials\sidebar_petugas.php'; 
    
  }elseif ($tampil['level'] == "anggota"){
    include 'partials\sidebar_anggota.php'; 
  
  }else{
    include 'partials\sidebar_guest.php'; 
  }
  ?>
