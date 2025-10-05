<?php
session_start();
include 'function.php';

$jenjang = isset($_GET['jenjang']) ? $_GET['jenjang'] : 'all';
$materi = isset($_GET['materi']) ? $_GET['materi'] : 'total_poin';

// Ambil data dari database dengan JOIN antara tabel poin, users, dan user_mater
$query = "SELECT u.nama, 
                 um.jenjang, 
                 p.matematika,
                 p.bahasa_inggris,
                 p.daspro,
                 p.utbk,
                 (p.matematika + p.bahasa_inggris + p.daspro + p.utbk) AS total_poin
          FROM poin p
          JOIN users u ON p.id_user = u.id
          JOIN user_materi um ON u.id = um.id_user";

// Tambahkan kondisi untuk filter jenjang dan materi
if ($jenjang !== 'Semua') {
    $query .= " WHERE um.jenjang = '$jenjang'";
}

if ($materi !== 'Semua') {
    $query .= ' ORDER BY p.'.$materi.' DESC';
}else{
    $query .= ' ORDER BY total_poin DESC';
    $materi = 'total_poin';
}

$result = ambilData($query);

if (empty($result)) {
    echo "<tr><td colspan='5'>Belum ada pengguna yang terdaftar</td></tr>";
    exit;
} else {
    $rank = 1; // Untuk menampilkan urutan peringkat
    foreach ($result as $row) {
        $username = htmlspecialchars($row['nama']);
        $jenjang = htmlspecialchars($row['jenjang']);
        $poin = $row[$materi];

        if($materi == 'total_poin'){
            $subject = "Total";
        }else if($materi == 'matematika'){
            $subject = 'Matematika';
        }else if($materi == 'bahasa_inggris'){
            $subject = 'Bahasa Inggris';
        }else if($materi == 'daspro'){
            $subject = 'Dasar Pemrograman';
        }else if($materi == 'utbk'){
            $subject = 'UTBK';
        }

        // Menentukan gambar medal berdasarkan ranking
        if ($rank == 1 && $poin != 0) {
            $medal = 'image/medal 1.png';
        } elseif ($rank == 2 && $poin != 0) {
            $medal = 'image/medal 2.png';
        } elseif ($rank == 3 && $poin != 0) {
            $medal = 'image/medal 3.png';
        } else {
            $medal = ''; // Tidak ada gambar untuk peringkat lebih dari 3
        }
    
        // Menampilkan data dalam tabel
        echo "<tr>
                <td>$rank</td>
                <td class='user'>
                    $username
                    <img src='$medal' width='25vw'>
                </td>
                <td>$jenjang</td>
                <td>$subject</td>
                <td>$poin</td>
            </tr>";
        $rank++;
    }
}
?>