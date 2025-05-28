<?php
$conn = mysqli_connect("localhost", "root", "", "ukm_db");

if (!$conn) {
  die("Koneksi database gagal: " . mysqli_connect_error());
}

session_start();
?>
