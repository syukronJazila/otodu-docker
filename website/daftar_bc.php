<?php
include 'function.php';
if (isset($_GET['id_materi'])) {
  $id_materi = intval($_GET['id_materi']);
  $query = "SELECT * FROM bab WHERE kode_materi = $id_materi";
  $result = mysqli_query($conn, $query);

  $data = [];
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
  } else {
    // Jika tidak ada bab
    $data[] = ['kode_bab' => 0, 'nama_bab' => 'Tidak ada bab', 'kode_materi' => 0];
  }
  echo json_encode($data);
}

if (isset($_GET['id_bab'])) {
  $id_bab = intval($_GET['id_bab']);
  $query = "SELECT * FROM subbab WHERE kode_bab = $id_bab";
  $result = mysqli_query($conn, $query);

  $data = [];
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
    }
  } else {
    $data[] = ['id_subbab' => 0, 'nama_subbab' => 'Tidak ada subbab', 'id_bab' => 0];
  }
  echo json_encode($data);
}
