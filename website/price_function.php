<?php
session_start();
include 'config.php';
// Ambil nilai jumlah dan biaya dari permintaan POST
if (isset($_POST['jumlah']) && isset($_POST['biaya']) && isset($_POST['keterangan'])) {
  $_SESSION['jumlah'] = (int)$_POST['jumlah'];
  $_SESSION['biaya'] = (int)$_POST['biaya'];
  $_SESSION['keterangan'] = (string)$_POST['keterangan'];

  // Tampilkan pesan konfirmasi
  echo "Session updated: jumlah = " . $_SESSION['jumlah'] . ", biaya = " . $_SESSION['biaya'] . ", ket = " . $_SESSION['keterangan'];
} else {
  echo "Invalid request.";
}

if (isset($_POST['detail_transaksi'])) {
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // Ambil data dari request
  $detail = $_POST['detail_transaksi'];
  $id = $_SESSION['user_id'];
  $biaya = $_SESSION['biaya'];
  $keterangan = $_SESSION['nama_transaksi'];
  // Kueri insert
  $insert_query = "INSERT INTO transaksi (id_user,jumlah,biaya,keterangan) VALUES ( $id, $detail, $biaya,'$keterangan')";
  $result = mysqli_query($conn, $insert_query);
  if (!$result) {
    echo "Error saat insert data: " . mysqli_error($conn);
    exit;
  }
  // Kueri update (misalnya menambah saldo koin user)
  $update_query = "UPDATE users SET koin = koin + $detail WHERE id = $id";
  $result = mysqli_query($conn, $update_query);
  if (!$result) {
    echo "Error saat update data: " . mysqli_error($conn);
    exit;
  }
  // Tutup koneksi
  mysqli_close($conn);

  echo "success";
}
