<?php 
$host='localhost';
$user='root';
$pass='';
$database='db_21_michael_xirpl';
$connect=mysqli_connect($host,$user,$pass)or die(mysqli_error());
mysqli_select_db($connect,$database)or die("Database Tidak Di temukan");
?>