-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2025 at 01:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS otodu;
USE otodu;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otodu`
--

-- --------------------------------------------------------

--
-- Table structure for table `bab`
--

CREATE TABLE `bab` (
  `kode_bab` int(11) NOT NULL,
  `nama_bab` varchar(100) DEFAULT NULL,
  `kode_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bab`
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
-- Table structure for table `beli_subtopik`
--

CREATE TABLE `beli_subtopik` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `kode_subtopik` int(11) DEFAULT NULL,
  `selesai` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beli_subtopik`
--

INSERT INTO `beli_subtopik` (`id_pembelian`, `id_user`, `kode_subtopik`, `selesai`, `tanggal_pembelian`) VALUES
(1, 1, 1, 0, '2024-10-28 08:17:15'),
(2, 16, 2, 0, '2024-11-04 15:44:36'),
(3, 16, 1, 0, '2024-11-04 15:45:01'),
(4, 16, 3, 0, '2024-11-04 15:47:07'),
(5, 16, 4, 0, '2024-11-04 15:49:13'),
(6, 13, 2, 0, '2024-11-04 16:06:12'),
(7, 13, 1, 0, '2024-11-04 16:06:27'),
(9, 1, 3, 0, '2024-11-10 17:47:39'),
(10, 1, 4, 0, '2024-11-10 17:52:58'),
(11, 1, 7, 0, '2024-11-12 14:39:01'),
(12, 1, 11, 0, '2024-11-12 14:39:19'),
(13, 10, 1, 0, '2024-11-13 12:02:48'),
(14, 10, 2, 0, '2024-11-13 12:09:40'),
(15, 10, 3, 0, '2024-11-13 12:40:04'),
(16, 10, 4, 0, '2024-11-13 13:12:11'),
(17, 10, 8, 0, '2024-11-13 13:21:15'),
(18, 10, 5, 0, '2024-11-13 13:45:25'),
(19, 10, 6, 0, '2024-11-13 13:45:30'),
(20, 10, 10, 0, '2024-11-13 13:47:14'),
(21, 10, 9, 0, '2024-11-13 14:04:45'),
(22, 10, 7, 0, '2024-11-13 14:05:18'),
(23, 10, 11, 0, '2024-11-13 14:08:20'),
(24, 13, 3, 0, '2024-11-13 14:28:21'),
(25, 13, 4, 0, '2024-11-13 14:29:34'),
(26, 13, 5, 0, '2024-11-13 14:29:51'),
(27, 13, 10, 0, '2024-11-13 14:30:20'),
(28, 13, 8, 0, '2024-11-13 14:30:52'),
(29, 13, 9, 0, '2024-11-13 14:31:10'),
(30, 13, 6, 0, '2024-11-14 03:24:29'),
(31, 13, 11, 0, '2024-11-14 03:26:50'),
(32, 13, 7, 0, '2024-11-14 03:28:54'),
(33, 1, 10, 0, '2024-11-16 15:00:46'),
(34, 1, 9, 0, '2024-11-16 15:00:57'),
(35, 1, 6, 0, '2024-11-17 14:35:37'),
(36, 1, 5, 0, '2024-11-17 14:53:20'),
(37, 22, 1, 0, '2024-12-01 18:59:00'),
(38, 22, 2, 0, '2024-12-01 18:59:31'),
(39, 16, 5, 0, '2024-12-06 01:39:30'),
(40, 24, 2, 0, '2024-12-06 15:03:49'),
(41, 24, 1, 0, '2024-12-06 15:04:04'),
(42, 24, 9, 0, '2024-12-06 15:04:11'),
(43, 24, 11, 0, '2024-12-06 16:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `data_mentor`
--

CREATE TABLE `data_mentor` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `materi` text DEFAULT NULL,
  `jenjang` text DEFAULT NULL,
  `online` text DEFAULT NULL,
  `offline` text DEFAULT NULL,
  `riwayat_studi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_mentor`
--

INSERT INTO `data_mentor` (`id`, `id_user`, `materi`, `jenjang`, `online`, `offline`, `riwayat_studi`) VALUES
(1, 17, 'MM;Daspro;Bing;UTBK', 'MM-;Daspro-', '13:00 - 16:30;20:00 - 23:00', '08:00 - 11:00', 'Ilmu Komputer - Universitas Sumatera Utara;Computer Science - Harvard University'),
(4, 18, 'MM;UTBK', 'MM-;UTBK-', '08:00 - 13:20;22:00 - 03:00', '15:00 - 17:30', 'Sastra Mesin - Universitas Garut'),
(5, 19, 'Bing;UTBK', 'Bing-;UTBK-', '13:00 - 16:50;21:00 - 23:20', '07:00 - 11:30', 'Teknik Inggris - Universitas Garut'),
(6, 20, 'MM;Bing;UTBK', 'MM-;Bing-;UTBK-', '12:00 - 15:30;20:00 - 23:00', '08:00 - 10:30', 'Pendidikan UTBK - Universitas Pasundan');

-- --------------------------------------------------------

--
-- Table structure for table `isi_latihan`
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
-- Dumping data for table `isi_latihan`
--

INSERT INTO `isi_latihan` (`kode_latihan`, `soal`, `jawaban`, `opsi`, `gambar_url`, `keterangan`, `kode_subtopik`) VALUES
(1, 'Fungsi dapat digunakan untuk memodelkan fenomena dan menyelesaikan ______', 'masalah', NULL, NULL, 'isian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `isi_subtopik`
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
  `kode_subtopik` int(11) NOT NULL,
  `petunjuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `isi_subtopik`
--

INSERT INTO `isi_subtopik` (`kode_isi_subtopik`, `nomor`, `materi`, `gambar_url`, `soal`, `jawaban`, `opsi`, `keterangan`, `kode_subtopik`, `petunjuk`) VALUES
(1, 1, 'Dalam fungsi, terdapat dua himpunan utama yang saling berhubungan. Agar bisa disebut fungsi, tidak cukup hanya dengan adanya hubungan antara elemen Himpunan A dan Himpunan B; ada aturan-aturan tertentu yang harus dipenuhi. Aturan-aturan ini akan dibahas dalam sub-topik berikutnya.', 'image/svg/materi1.svg', NULL, NULL, NULL, 'materi', 1, 'Tetap Semangat Tetap Otodidak'),
(6, 2, 'Gambar disamping adalah bentuk dari fungsi karena elemen-elemen didalam himpunan A berhubungan dengan himpunan B, atau bahasa matematikanya adalah Himpunan A memetakan Himpunan B.', 'image/svg/materi2.svg', NULL, NULL, NULL, 'materi', 1, 'Otodidak Adalah Jalan Ninjaku'),
(7, 3, NULL, 'image/svg/materi3.svg', 'Identifikasi Gambar Diatas!', 'Himpunan Laki-Laki Memetakan Himpunan Jodohnya', 'Himpunan;Laki-Laki;Memetakan;Himpunan;Jodohnya', 'cocok', 1, 'Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban'),
(8, 4, 'Pada latihan sebelumnya, kita memahami permasalahan fungsi dengan bahasa awam. Sekarang, mari ubah sudut pandang agar lebih sesuai dengan matematika. Perhatikan gambar: (1) Himpunan diubah menjadi Himpunan A dan B beserta elemennya, (2) Himpunan A disebut Domain (himpunan asal), (3) Himpunan B disebut Kodomain (himpunan kawan), dan (4) Himpunan A memetakan Himpunan B.', 'image/svg/materi4.svg', NULL, NULL, NULL, 'materi', 1, 'Pengalaman Adalah Guru Terbaik'),
(9, 5, 'Untuk memahami materi ini, diperlukan langkah-langkah sebagai berikut:\n<br>1. Buat Himpunan A (Domain) dan Himpunan B (Kodomain) beserta elemennya.<br>2. Buat rumus fungsi untuk menentukan elemen Himpunan B, dengan tampilan rumus umumnya di sebelah kanan.<br>3. Gunakan rumus tersebut dan gantikan variabel x dengan elemen Himpunan A untuk mendapatkan elemen Himpunan B.', 'image/svg/materi5.svg', NULL, NULL, NULL, 'materi', 1, 'Self-education is, I firmly believe, the only kind of education there is. – Isaac Asimov'),
(10, 6, NULL, NULL, 'Pernyataan mana yang benar?', 'Domain adalah daerah asal, Kodomain adalah daerah kawan', 'Lorem ipsum dolor sit amet;Domain adalah daerah kawan, kodomain adalah daerah asal;Domain adalah daerah asal, Kodomain adalah daerah kawan;Lorem ipsum dolor sit amet', 'pilgan', 1, 'Fokuslah Dalam Memilih Jawaban, Anda Tidak Dikejar Setan'),
(11, 7, 'Ini adalah konten untuk Materi 7. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis quae in repudiandae? Eum animi odit obcaecati porro est! Voluptates officiis, minus obcaecati dolorum architecto in ipsum veritatis sunt reiciendis maiores.', NULL, NULL, NULL, NULL, 'materi', 1, 'Self-education is a lifelong journey. Keep learning, keep growing'),
(13, 8, 'Ini adalah konten untuk Materi 8. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis quae in repudiandae? Eum animi odit obcaecati porro est! Voluptates officiis, minus obcaecati dolorum architecto in ipsum veritatis sunt reiciendis maiores.', NULL, NULL, NULL, NULL, 'materi', 1, 'Kesuksesanmu Ditentukan Oleh Usahamu Dan Kekuatan Dari Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kode_materi` int(11) NOT NULL,
  `nama_materi` varchar(100) DEFAULT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kode_materi`, `nama_materi`, `jenjang`, `kelas`) VALUES
(1, 'Matematika', 'SMA', '11'),
(2, 'Bahasa Inggris', 'SMA', '11'),
(3, 'Dasar Pemrograman', 'SMA', '12'),
(4, 'UTBK', 'SMA', '12');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_mentor`
--

CREATE TABLE `pesan_mentor` (
  `id` int(11) NOT NULL,
  `nama_mentor` varchar(250) NOT NULL,
  `nama_siswa` varchar(250) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poin`
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
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`id_user`, `matematika`, `bahasa_inggris`, `daspro`, `utbk`, `total_poin`) VALUES
(16, 150, 200, 200, 200, 750),
(10, 200, 150, 150, 0, 500),
(13, 100, 100, 150, 200, 550),
(1, 100, 100, 100, 100, 400),
(21, 0, 0, 0, 0, 0),
(22, 0, 0, 0, 0, 0),
(23, 100, 0, 100, 0, 200),
(24, 100, 150, 0, 0, 250);

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `kode_statistik` int(11) NOT NULL,
  `minggu_lalu` int(11) DEFAULT NULL,
  `minggu_ini` int(11) DEFAULT NULL,
  `topik_selesai` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`kode_statistik`, `minggu_lalu`, `minggu_ini`, `topik_selesai`, `id_user`) VALUES
(1, 12, 18, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subbab`
--

CREATE TABLE `subbab` (
  `kode_subbab` int(11) NOT NULL,
  `nama_subbab` varchar(100) DEFAULT NULL,
  `kode_bab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subbab`
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
-- Table structure for table `subtopik`
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
-- Dumping data for table `subtopik`
--

INSERT INTO `subtopik` (`kode_subtopik`, `nama_subtopik`, `harga`, `status_bayar`, `kode_topik`, `keterangan`) VALUES
(1, 'Subtopik 1', 10, 1, 1, 'materi'),
(2, 'Subtopik 2', 10, 1, 1, 'tambahan'),
(3, 'Subtopik 3', 12, 1, 1, 'tambahan'),
(4, 'Latihan 1', 13, 1, 1, 'latihan'),
(5, 'Subtopik 1', 10, 0, 2, 'materi'),
(6, 'Subtopik 2', 15, 0, 2, 'materi'),
(7, 'Subtopik 3', 13, 0, 2, 'tambahan'),
(8, 'Latihan 1', 12, 0, 2, 'latihan'),
(9, 'Subtopik 1', 15, 0, 3, 'materi'),
(10, 'Subtopik 1', 13, 0, 3, 'tambahan'),
(11, 'Latihan 1', 12, 0, 3, 'latihan');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `kode_target` int(11) NOT NULL,
  `nama_target` varchar(50) DEFAULT NULL,
  `selesai` int(11) DEFAULT NULL,
  `dipelajari` int(11) DEFAULT NULL,
  `dikuasai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`kode_target`, `nama_target`, `selesai`, `dipelajari`, `dikuasai`) VALUES
(1, 'Ambis', 27, 7, 5),
(2, 'Normal', 23, 5, 3),
(3, 'Santai', 20, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `kode_topik` int(11) NOT NULL,
  `nama_topik` varchar(100) DEFAULT NULL,
  `rangkuman` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `kode_subbab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`kode_topik`, `nama_topik`, `rangkuman`, `video_url`, `kode_subbab`) VALUES
(1, 'Apa itu Fungsi?', 'Fungsi adalah konsep fundamental dalam matematika dan pemrograman yang berfungsi untuk menghubungkan suatu input dengan output tertentu. Dalam matematika, fungsi dapat dianggap sebagai sebuah aturan atau hubungan yang mengambil satu atau lebih nilai (input) dan mengubahnya menjadi satu nilai (output). Misalnya, fungsi 𝑓(𝑥) = 2𝑥+3\nakan mengambil nilai 𝑥 dan menghasilkan nilai baru berdasarkan rumus tersebut.\n\nDalam konteks pemrograman, fungsi juga berperan penting sebagai blok kode yang dirancang untuk melaksanakan tugas tertentu. Fungsi dapat menerima argumen (input), melakukan perhitungan atau operasi tertentu, dan kemudian mengembalikan hasilnya (output). Penggunaan fungsi membantu dalam mengorganisir kode, mengurangi pengulangan, dan meningkatkan keterbacaan serta pemeliharaan program.\n\nSecara keseluruhan, fungsi adalah alat yang sangat berguna baik dalam matematika maupun pemrograman, memungkinkan kita untuk menyelesaikan masalah dengan cara yang terstruktur dan efisien.', './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1),
(2, 'Beda fungsi dan bukan fungsi', NULL, './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1),
(3, 'Notasi Fungsi', NULL, './image/CARA MENENTUKAN FUNGSI DAN BUKAN FUNGSI PADA GRAFIK.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `jumlah`, `biaya`, `keterangan`, `waktu`) VALUES
(1, 20, 10, 5000, 'Beli Paket Sehari', '2024-11-10 17:00:00'),
(2, 20, 10, 5000, 'Beli Paket Sehari', '2024-11-10 17:00:00'),
(3, 20, 2, 4000, 'Beli 2 Koin', '2024-11-10 17:00:00'),
(4, 20, 3, 6000, 'Beli 3 Koin', '2024-11-10 17:00:00'),
(5, 20, 1, 2000, 'Beli 1 Koin', '2024-11-10 17:00:00'),
(6, 20, 4, 8000, 'Beli 4 Koin', '2024-11-10 17:00:00'),
(7, 20, 50, 20000, 'Beli Paket 5 Hari', '2024-11-12 12:48:57'),
(8, 20, 2, 4000, 'Beli 2 Koin', '2024-11-12 12:55:40'),
(9, 1, 50, 20000, 'Beli Paket 5 Hari', '2024-11-13 04:41:34'),
(10, 10, 50, 20000, 'Beli Paket 5 Hari', '2024-11-13 12:02:32'),
(11, 13, 10, 20000, 'Beli 10 Koin', '2024-11-14 03:34:37'),
(12, 13, 4, 8000, 'Beli 4 Koin', '2024-11-14 03:35:45'),
(13, 1, 10, 5000, 'Beli Paket Sehari', '2024-12-01 08:15:47'),
(14, 22, 10, 5000, 'Beli Paket Sehari', '2024-12-01 18:58:21'),
(15, 22, 100, 200000, 'Beli 100 Koin', '2024-12-01 18:58:51'),
(16, 1, 50, 20000, 'Beli Paket 5 Hari', '2024-12-04 07:20:39'),
(17, 1, 50, 20000, 'Beli Paket 5 Hari', '2024-12-04 08:13:11'),
(18, 1, 100, 35000, 'Beli Paket 10 Hari', '2024-12-06 08:35:43'),
(19, 24, 100, 35000, 'Beli Paket 10 Hari', '2024-12-06 09:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  `koin` int(11) NOT NULL DEFAULT 0,
  `materi_terakhir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `nomor`, `latitude`, `longitude`, `password`, `role`, `koin`, `materi_terakhir`) VALUES
(1, 'jazilasyukron12@gmail.com', 'Muhamamd Syukron', '89966677713', 3.56188160, 98.69393920, '$2y$10$9azZK1ny0.GW9iW0S.TPhOIfW8/LPfWG08Nl0alV/EOGruplaHKNy', 'admin', 247, 'Fungsi - Pengantar'),
(10, 'adilafurqon21@gmail.com', 'tez', '08666777999', 3.57192172, 98.69133567, '$2y$10$A3FoUqx3Wq49yXX7xSHn7OCtod30EoVrN/m/aLTQ/vxVznDkO6HwG', 'Siswa', 10, NULL),
(13, 'syukron9a@gmail.com', 'Jonto Amgis', '0899888777', 3.57803962, 98.68850325, '$2y$10$vECUhEXrGeq0Yiv7MuP3zeug4mzPOryIq5/0NlRFiUeqX24V1.lNO', 'Siswa', 89, NULL),
(16, 'jazilasyukron21@gmail.com', 'Sigma Skibidi', '08997777666', 3.55057534, 98.69943422, '$2y$10$NpHawhm.LMBEJQ5PGaF5seHOfygrVtgvZ2kgK0L0ipcHslwHq0Lli', 'Siswa', 35, NULL),
(17, 'widianto@gmail.com', 'Akbar Widianto', '0811122223333', 3.57304501, 98.76194000, '$2y$10$F06wy4muaIhO8w27LV4cEOTwULjD4mEyJih5UYs6wWEPKq.dkuidG', 'Mentor', 0, NULL),
(18, 'budi@gmail.com', 'Budie Arie', '0866644446666', 3.56412867, 98.69537968, '$2y$10$PVKIzbuKfhcuZMDE/0BVbOYiXQxH1p5EKq02oDfGwJwPHB0Gfw8gm', 'Mentor', 0, NULL),
(19, 'eko@gmail.com', 'Eko Kurniawan', '089131136778', 3.55392007, 98.70346672, '$2y$10$Xkt2/fNI4FypMr6OxwOpp.mTz8GJyAVCQd5tg4TkFathPraqRXNpy', 'Mentor', 0, NULL),
(20, 'joko@gmail.com', 'Joko Susanto', '081122223333', 3.56246680, 98.65932800, '$2y$10$cKXDccGB6lsA/iOg2aaO0.0eMknNGCfzqywNIBGxcwUoP4.CTKkJO', 'Mentor', 0, NULL),
(21, 'deadline@gmail.com', 'tes last deadline', '089911112222', 3.62307133, 98.70769501, '$2y$10$.QeP.mCXPyb/DH30Ahf17.pEN4fOHSeFDz8pH440LUjX6iy9yky3S', 'Siswa', 0, NULL),
(22, 'mizone@gmail.com', 'mizone', '08999111010', 3.61821213, 98.69332129, '$2y$10$ffPB4O.XYenxMomMp1e/WestPv.WnjmZ9pM8ElEmK5YIh29RnLvk.', 'Siswa', 90, NULL),
(23, 'arie@gmail.com', 'arie', '0899992993', 3.58809600, 98.67427840, '$2y$10$DA//1RAc95tvd5WpWhkN3.EHqamVVSLKjTVFHZFPwvveYN0JilUrG', 'Siswa', 0, NULL),
(24, 'teslab@gmail.com', 'budi', '0899777666', 3.58809600, 98.67427840, '$2y$10$EB2nA/BfzmapfsVuKILYSuWGYr0BDe7lsz.x/rGTVIfUEBmGQmh6u', 'Siswa', 53, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_materi`
--

CREATE TABLE `user_materi` (
  `id_user` int(11) NOT NULL,
  `jenjang` varchar(100) DEFAULT NULL,
  `minat` varchar(100) DEFAULT NULL,
  `kode_target` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_materi`
--

INSERT INTO `user_materi` (`id_user`, `jenjang`, `minat`, `kode_target`) VALUES
(1, 'SMA', 'Matematika', 1),
(13, 'SMP', 'UTBK', 1),
(10, 'SD', 'Matematika', 2),
(16, 'Lain-lain', 'daspro', 3),
(21, 'SMP', 'Pemrograman', 2),
(22, 'SMP', 'Pemrograman', 2),
(23, 'SMA', 'Pemrograman', 3),
(24, 'SMA', 'Pemrograman', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`kode_bab`),
  ADD KEY `kode_materi` (`kode_materi`);

--
-- Indexes for table `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indexes for table `data_mentor`
--
ALTER TABLE `data_mentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_latihan`
--
ALTER TABLE `isi_latihan`
  ADD PRIMARY KEY (`kode_latihan`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indexes for table `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  ADD PRIMARY KEY (`kode_isi_subtopik`),
  ADD KEY `kode_subtopik` (`kode_subtopik`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`);

--
-- Indexes for table `pesan_mentor`
--
ALTER TABLE `pesan_mentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`kode_statistik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `subbab`
--
ALTER TABLE `subbab`
  ADD PRIMARY KEY (`kode_subbab`),
  ADD KEY `kode_bab` (`kode_bab`);

--
-- Indexes for table `subtopik`
--
ALTER TABLE `subtopik`
  ADD PRIMARY KEY (`kode_subtopik`),
  ADD KEY `kode_topik` (`kode_topik`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`kode_target`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`kode_topik`),
  ADD KEY `kode_subbab` (`kode_subbab`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_materi`
--
ALTER TABLE `user_materi`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_target` (`kode_target`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bab`
--
ALTER TABLE `bab`
  MODIFY `kode_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `data_mentor`
--
ALTER TABLE `data_mentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `isi_latihan`
--
ALTER TABLE `isi_latihan`
  MODIFY `kode_latihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  MODIFY `kode_isi_subtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `kode_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan_mentor`
--
ALTER TABLE `pesan_mentor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `kode_statistik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subbab`
--
ALTER TABLE `subbab`
  MODIFY `kode_subbab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subtopik`
--
ALTER TABLE `subtopik`
  MODIFY `kode_subtopik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `kode_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `kode_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bab`
--
ALTER TABLE `bab`
  ADD CONSTRAINT `bab_ibfk_1` FOREIGN KEY (`kode_materi`) REFERENCES `materi` (`kode_materi`);

--
-- Constraints for table `beli_subtopik`
--
ALTER TABLE `beli_subtopik`
  ADD CONSTRAINT `beli_subtopik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `beli_subtopik_ibfk_2` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Constraints for table `isi_latihan`
--
ALTER TABLE `isi_latihan`
  ADD CONSTRAINT `isi_latihan_ibfk_1` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Constraints for table `isi_subtopik`
--
ALTER TABLE `isi_subtopik`
  ADD CONSTRAINT `isi_subtopik_ibfk_1` FOREIGN KEY (`kode_subtopik`) REFERENCES `subtopik` (`kode_subtopik`);

--
-- Constraints for table `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `statistik`
--
ALTER TABLE `statistik`
  ADD CONSTRAINT `statistik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `subbab`
--
ALTER TABLE `subbab`
  ADD CONSTRAINT `subbab_ibfk_1` FOREIGN KEY (`kode_bab`) REFERENCES `bab` (`kode_bab`);

--
-- Constraints for table `subtopik`
--
ALTER TABLE `subtopik`
  ADD CONSTRAINT `subtopik_ibfk_1` FOREIGN KEY (`kode_topik`) REFERENCES `topik` (`kode_topik`);

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`kode_subbab`) REFERENCES `subbab` (`kode_subbab`);

--
-- Constraints for table `user_materi`
--
ALTER TABLE `user_materi`
  ADD CONSTRAINT `user_materi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_materi_ibfk_2` FOREIGN KEY (`kode_target`) REFERENCES `target` (`kode_target`);
COMMIT;

