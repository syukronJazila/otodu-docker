<?php
session_start();
include 'config.php';
if (isset($_POST['jenjang'])) {
  $jenjang = $_POST['jenjang'];
  $minat = $_POST['minat'];
  $kode_target = $_POST['kode_target'];
  $id_user = $_SESSION['user_id'];

  $query = "INSERT INTO user_materi(id_user, jenjang, minat, kode_target) VALUES ($id_user, '$jenjang', '$minat', '$kode_target')";
  mysqli_query($conn, $query);
  $sql = "SELECT nama_target FROM target WHERE kode_target = $kode_target";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $_SESSION['nama_target'] = $row['nama_target'];
}
