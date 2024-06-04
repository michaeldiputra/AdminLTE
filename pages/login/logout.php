<?php
ob_start(); // Start output buffering
session_start(); // Start the session

// Hapus semua data sesi
session_unset(); // Hapus semua variabel sesi
session_destroy(); // Hancurkan sesi

// Redirect to the homepage
header("Location: /21_michael_adminlte/");
exit();
ob_end_flush(); // Flush the output buffer and turn off output buffering
?>