<?php
session_start();
include 'config.php';
// Ambil nilai jumlah dan biaya dari permintaan POST
if (isset($_POST['nama']) && isset($_POST['biaya']) && isset($_POST['keterangan'])) {
  $mentor = $_POST['mentor'];
  $user = $_POST['user'];

  $query = "INSERT INTO pesan_mentor(nama_mentor, nama_siswa) VALUES($mentor, $user)";
  mysqli_query($query);
} else {
  echo "Invalid request.";
}
?>