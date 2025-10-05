-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2024 pada 04.13
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otodu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab`
--

CREATE TABLE `bab` (
  `kode_bab` int(11) NOT NULL,
  `nama_bab` varchar(100) DEFAULT NULL,
  `kode_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bab`
--

INSERT INTO `bab` (`kode_bab`, `nama_bab`, `kode_materi`) VALUES
(1, 'Fungsi', 1),
(2, 'Matriks', 1),
(3, 'Report Text', 2),
(4, 'Narrative Text', 2),
(5, 'Variabel', 3),
(6, 'Perulangan', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_subtopik`
--

CREATE TABLE `beli_subtopik` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_subtopik` int(11) DEFAULT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `beli_subtopik`
--

INSERT INTO `beli_subtopik` (`id_pembelian`, `id_user`, `kode_subtopik`, `tanggal_pembelian`) VALUES
(1, 1, 1, '2024-10-28 08:17:15'),
(2, 16, 2, '2024-11-04 15:44:36'),
(3, 16, 1, '2024-11-04 15:45:01'),
(4, 16, 3, '2024-11-04 15:47:07'),
(5, 16, 4, '2024-11-04 15:49:13'),
(6, 13, 2, '2024-11-04 16:06:12'),
(7, 13, 1, '2024-11-04 16:06:27'),
(8, 20, 1, '2024-11-15 04:48:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_latihan`
--

CREATE TABLE `isi_latihan` (
  `kode_latihan` int(11) NOT NULL,
  `soal` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `opsi` text DEFAULT NULL,
  `gambar_url` varchar(255) DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `kode_subtopik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `isi_latihan`
--

INSERT INTO `isi_latihan` (`kode_latihan`, `soal`, `jawaban`, `opsi`, `gambar_url`, `keterangan`, `kode_subtopik`) VALUES
(1, 'Fungsi dapat digunakan untuk memodelkan fenomena dan menyelesaikan ______', 'masalah', NULL, NULL, 'isian', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_subtopik`
--

CREATE TABLE `isi_subtopik` (
  `kode_isi_subtopik` int(11) NOT NULL,
  `nomor` int(10) NOT NULL,
  `materi` text DEFAULT NULL,
  `gambar_url` varchar(255) DEFAULT NULL,
  `soal` varchar(255) DEFAULT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `opsi` text DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `kode_subtopik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `isi_subtopik`
--

INSERT INTO `isi_subtopik` (`kode_isi_subtopik`, `nomor`, `materi`, `gambar_url`, `soal`, `jawaban`, `opsi`, `keterangan`, `kode_subtopik`) VALUES
(1, 1, 'Fungsi adalah suatu relasi atau aturan yang menghubungkan setiap elemen dari satu set (domain) dengan tepat satu elemen di set lain (kodomain). Dalam matematika, fungsi biasanya dinyatakan dalam bentuk f(x), di mana x adalah input dan f(x) adalah output. Fungsi dapat digunakan untuk memodelkan berbagai fenomena dan menyelesaikan masalah, baik dalam konteks matematika murni maupun aplikasi dalam ilmu komputer, di mana fungsi berfungsi sebagai blok kode yang melakukan tugas tertentu dengan menerima parameter dan mengembalikan hasil.', NULL, 'Dalam notasi matematis, fungsi biasanya dituliskan sebagai f(x), di mana x adalah input dan f(x) adalah ______', 'output', 'domain,output', 'lengkap', 1),
(3, 2, 'ini materi nomor 2', NULL, '', NULL, NULL, 'materi', 1),
(5, 3, NULL, NULL, 'x + 5 = 2, x?', '-3', '2,-3', 'pilgan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `kode_materi` int(11) NOT NULL,
  `nama_materi` varchar(100) DEFAULT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`kode_materi`, `nama_materi`, `jenjang`, `kelas`) VALUES
(1, 'Matematika', 'SMA', '11'),
(2, 'Bahasa Inggris', 'SMA', '11'),
(3, 'Dasar Pemrograman', 'SMA', '12'),
(4, 'UTBK', 'SMA', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id_user` int(11) NOT NULL,
  `matematika` int(11) DEFAULT 0,
  `bahasa_inggris` int(11) DEFAULT 0,
  `daspro` int(11) DEFAULT 0,
  `utbk` int(11) DEFAULT 0,
  `total_poin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poin`
--

INSERT INTO `poin` (`id_user`, `matematika`, `bahasa_inggris`, `daspro`, `utbk`, `total_poin`) VALUES
(16, 150, 200, 200, 200, 750),
(10, 200, 150, 150, 0, 500),
(13, 100, 100, 150, 200, 550),
(1, 100, 100, 100, 100, 400);

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE `statistik` (
  `kode_statistik` int(11) NOT NULL,
  `minggu_lalu` int(11) DEFAULT NULL,
  `minggu_ini` int(11) DEFAULT NULL,
  `topik_selesai` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `statistik`
--

INSERT INTO `statistik` (`kode_statistik`, `minggu_lalu`, `minggu_ini`, `topik_selesai`, `id_user`) VALUES
(1, 12, 18, 9, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subbab`
--

CREATE TABLE `subbab` (
  `kode_subbab` int(11) NOT NULL,
  `nama_subbab` varchar(100) DEFAULT NULL,
  `kode_bab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `subbab`
--

INSERT INTO `subbab` (`kode_subbab`, `nama_subbab`, `kode_bab`) VALUES
(1, 'Pengantar', 1),
(2, 'Fungsi Komposisi', 1),
(3, 'Pengantar', 2),
(4, 'Matriks 2x2', 2),
(5, 'Pengantar', 3),
(6, 'Pengantar', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subtopik`
--

CREATE TABLE `subtopik` (
  `kode_subtopik` int(11) NOT NULL,
  `nama_subtopik` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT 0,
  `status_bayar` tinyint(1) DEFAULT 0,
  `kode_topik` int(11) NOT NULL,
  `keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `subtopik`
--

INSERT INTO `subtopik` (`kode_subtopik`, `nama_subtopik`, `harga`, `status_bayar`, `kode_topik`, `keterangan`) VALUES
(1, 'Subtopik 1', 10, 1, 1, 'materi'),
(2, 'Subtopik 2', 10, 1, 1, 'tambahan'),
(3, 'Subtopik 3', 12, 1, 1, 'tambahan'),
(4, 'Latihan 1', 13, 1, 1, 'latihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `target`
--

CREATE TABLE `target` (
  `kode_target` int(11) NOT NULL,
  `nama_target` varchar(50) DEFAULT NULL,
  `selesai` int(11) DEFAULT NULL,
  `dipelajari` int(11) DEFAULT NULL,
  `dikuasai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `target`
--

INSERT INTO `target` (`kode_target`, `nama_target`, `selesai`, `dipelajari`, `dikuasai`) VALUES
(1, 'ambis', 27, 7, 5),
(2, 'normal', 23, 5, 3),
(3, 'santai', 20, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE `topik` (
  `kode_topik` int(11) NOT NULL,
  `nama_topik` varchar(100) DEFAULT NULL,
  `rangkuman` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `kode_subbab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`kode_topik`, `nama_topik`, `rangkuman`, `video_url`, `kode_subbab`) VALUES
(1, 'Apa itu Fungsi?', 'Fungsi adalah konsep fundamental dalam matematika dan pemrograman yang berfungsi untuk menghubungkan suatu input dengan output tertentu. Dalam matematika, fungsi dapat dianggap sebagai sebuah aturan atau hubungan yang mengambil satu atau lebih nilai (input) dan mengubahnya menjadi satu nilai (output). Misalnya, fungsi 𝑓(𝑥) = 2𝑥+3\r\nakan mengambil nilai 𝑥 dan menghasilkan nilai baru berdasarkan rumus tersebut.\r\n\r\nDalam konteks pemrograman, fungsi juga berperan penting sebagai blok kode yang dirancang untuk melaksanakan tugas tertentu. Fungsi dapat menerima argumen (input), melakukan perhitungan atau operasi tertentu, dan kemudian mengembalikan hasilnya (output). Penggunaan fungsi membantu dalam mengorganisir kode, mengurangi pengulangan, dan meningkatkan keterbacaan serta pemeliharaan program.\r\n\r\nSecara keseluruhan, fungsi adalah alat yang sangat berguna baik dalam matematika maupun pemrograman, memungkinkan kita untuk menyelesaikan masalah dengan cara yang terstruktur dan efisien.', './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1),
(2, 'Beda fungsi dan bukan fungsi', 'Dalam matematika, fungsi adalah hubungan antara dua himpunan di mana setiap elemen di himpunan pertama (domain) memiliki tepat satu pasangan elemen di himpunan kedua (kodomain). Artinya, setiap input menghasilkan satu output yang unik. Sebagai contoh, pada fungsi \ny=2x+1, setiap nilai x hanya menghasilkan satu nilai y. Sebaliknya, suatu hubungan dikatakan bukan fungsi jika ada setidaknya satu elemen di domain yang berpasangan dengan lebih dari satu elemen di kodomain. Misalnya, jika suatu relasi menghubungkan nilai \n1 dengan nilai 3 dan 4 sekaligus, maka hubungan ini bukan fungsi karena satu input memiliki beberapa output.', './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1),
(3, 'Notasi Fungsi', 'Notasi fungsi adalah cara menyatakan aturan yang menghubungkan elemen di satu himpunan (domain) dengan elemen di himpunan lain (kodomain) dalam bentuk (x)=y. Dalam notasi ini, f mewakili nama fungsi, x adalah elemen di domain (nilai input), dan y adalah elemen hasil di kodomain (nilai output). Penulisan f(x)=y berarti bahwa fungsi f memasangkan nilai x dari domain dengan satu nilai y di kodomain. Selain itu, notasi f:A→B menunjukkan bahwa fungsi f menghubungkan himpunan A (domain) ke himpunan B (kodomain). Notasi ini memudahkan pemahaman bahwa setiap elemen domain memiliki satu output unik di kodomain, yang menjadi ciri utama dari suatu fungsi.', './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `jumlah`, `biaya`, `keterangan`, `waktu`) VALUES
(1, 20, 10, 5000, 'Beli Paket Sehari', '2024-11-10 17:00:00'),
(2, 20, 10, 5000, 'Beli Paket Sehari', '2024-11-10 17:00:00'),
(3, 20, 2, 4000, 'Beli 2 Koin', '2024-11-10 17:00:00'),
(4, 20, 3, 6000, 'Beli 3 Koin', '2024-11-10 17:00:00'),
(5, 20, 1, 2000, 'Beli 1 Koin', '2024-11-10 17:00:00'),
(6, 20, 4, 8000, 'Beli 4 Koin', '2024-11-10 17:00:00'),
(7, 20, 50, 20000, 'Beli Paket 5 Hari', '2024-11-12 12:48:57'),
(8, 20, 2, 4000, 'Beli 2 Koin', '2024-11-12 12:55:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(20) DEFAULT NULL,
  `latitude` decimal(11,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) DEFAULT NULL,
  `koin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `nomor`, `latitude`, `longitude`, `password`, `role`, `koin`) VALUES
(1, 'jazilasyukron12@gmail.com', 'Muhamamd Syukron', '89966677713', '3.56188160', '98.69393920', '$2y$10$9azZK1ny0.GW9iW0S.TPhOIfW8/LPfWG08Nl0alV/EOGruplaHKNy', 'admin', 100),
(10, 'adilafurqon21@gmail.com', 'tez', '08666777999', '3.57192172', '98.69133567', '$2y$10$A3FoUqx3Wq49yXX7xSHn7OCtod30EoVrN/m/aLTQ/vxVznDkO6HwG', 'Siswa', 0),
(13, 'syukron9a@gmail.com', 'Jonto Amgis', '0899888777', '3.57803962', '98.68850325', '$2y$10$vECUhEXrGeq0Yiv7MuP3zeug4mzPOryIq5/0NlRFiUeqX24V1.lNO', 'Siswa', 100),
(16, 'jazilasyukron21@gmail.com', 'Sigma Skibidi', '08997777666', '3.55057534', '98.69943422', '$2y$10$NpHawhm.LMBEJQ5PGaF5seHOfygrVtgvZ2kgK0L0ipcHslwHq0Lli', 'Siswa', 45),
(17, 'widianto@gmail.com', 'Akbar Widianto', '0811122223333', '3.57304501', '98.76194000', '$2y$10$F06wy4muaIhO8w27LV4cEOTwULjD4mEyJih5UYs6wWEPKq.dkuidG', 'Mentor', 0),
(18, 'budi@gmail.com', 'Budie Arie', '0866644446666', '3.56412867', '98.69537968', '$2y$10$PVKIzbuKfhcuZMDE/0BVbOYiXQxH1p5EKq02oDfGwJwPHB0Gfw8gm', 'Mentor', 0),
(19, 'eko@gmail.com', 'Eko Kurniawan', '089131136778', '3.55392007', '98.70346672', '$2y$10$Xkt2/fNI4FypMr6OxwOpp.mTz8GJyAVCQd5tg4TkFathPraqRXNpy', 'Mentor', 0),
(20, 'dzakwanattaqiy77@gmail.com', 'Muhammad Dzakwan', '0823', '3.60478072', '98.62504090', '$2y$10$nU8akevYOmofpHZ/PYkjpO5wi7Ql3eZlteosWnpE8IwZ0euPn7GVS', 'Siswa', 72);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_materi`
--

CREATE TABLE `user_materi` (
  `id_user` int(11) NOT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `minat` varchar(100) DEFAULT NULL,
  `kode_target` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_materi`
--

INSERT INTO `user_materi` (`id_user`, `jenjang`, `minat`, `kode_target`) VALUES
(1, 'SMA', 'Matematika', 1),
(13, 'SMP', 'UTBK', 1),
(10, 'SD', 'Matematika', 2),
(16, 'Lain-lain', 'daspro', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`kode_bab`),
  ADD KEY `kode_materi` (`kode_materi`);

--
-- Indeks untuk tabel `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indeks untuk tabel `isi_latihan`
--
ALTER TABLE `isi_latihan`
  ADD PRIMARY KEY (`kode_latihan`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indeks untuk tabel `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  ADD PRIMARY KEY (`kode_isi_subtopik`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`kode_statistik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `subbab`
--
ALTER TABLE `subbab`
  ADD PRIMARY KEY (`kode_subbab`),
  ADD KEY `kode_bab` (`kode_bab`);

--
-- Indeks untuk tabel `subtopik`
--
ALTER TABLE `subtopik`
  ADD PRIMARY KEY (`kode_subtopik`),
  ADD KEY `kode_topik` (`kode_topik`);

--
-- Indeks untuk tabel `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`kode_target`);

--
-- Indeks untuk tabel `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`kode_topik`),
  ADD KEY `kode_subbab` (`kode_subbab`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_materi`
--
ALTER TABLE `user_materi`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_target` (`kode_target`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bab`
--
ALTER TABLE `bab`
  MODIFY `kode_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `isi_latihan`
--
ALTER TABLE `isi_latihan`
  MODIFY `kode_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  MODIFY `kode_isi_subtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `kode_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `statistik`
--
ALTER TABLE `statistik`
  MODIFY `kode_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `subbab`
--
ALTER TABLE `subbab`
  MODIFY `kode_subbab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `subtopik`
--
ALTER TABLE `subtopik`
  MODIFY `kode_subtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `target`
--
ALTER TABLE `target`
  MODIFY `kode_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `topik`
--
ALTER TABLE `topik`
  MODIFY `kode_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bab`
--
ALTER TABLE `bab`
  ADD CONSTRAINT `bab_ibfk_1` FOREIGN KEY (`kode_materi`) REFERENCES `materi` (`kode_materi`);

--
-- Ketidakleluasaan untuk tabel `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  ADD CONSTRAINT `beli_subtopik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `beli_subtopik_ibfk_2` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Ketidakleluasaan untuk tabel `isi_latihan`
--
ALTER TABLE `isi_latihan`
  ADD CONSTRAINT `isi_latihan_ibfk_1` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Ketidakleluasaan untuk tabel `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  ADD CONSTRAINT `isi_subtopik_ibfk_1` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Ketidakleluasaan untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `subbab`
--
ALTER TABLE `subbab`
  ADD CONSTRAINT `subbab_ibfk_1` FOREIGN KEY (`kode_bab`) REFERENCES `bab` (`kode_bab`);

--
-- Ketidakleluasaan untuk tabel `subtopik`
--
ALTER TABLE `subtopik`
  ADD CONSTRAINT `subtopik_ibfk_1` FOREIGN KEY (`kode_topik`) REFERENCES `topik` (`kode_topik`);

--
-- Ketidakleluasaan untuk tabel `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`kode_subbab`) REFERENCES `subbab` (`kode_subbab`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_materi`
--
ALTER TABLE `user_materi`
  ADD CONSTRAINT `user_materi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_materi_ibfk_2` FOREIGN KEY (`kode_target`) REFERENCES `target` (`kode_target`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
