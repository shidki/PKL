-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2024 pada 07.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Mal Pelayanan Publik Kota Yogyakarta ', 'MPP dirancang oleh KEMEPAN RB sebagai bagian dari perbaikan menyeluruh dan transformasi tata kelola pelayanan publik. Menggabungkan berbagai jenis pelayanan pada satu tempat, penyederhaan dan prosedur serta integrasi pelayanan pada Mal Pelayanan Publik akan memudahkan akses masyarakat dalam mendapat berbagai jenis pelayanan, serta meningkatkan kepercayaan masyarakat kepada penyelenggara pelayanan publik. '),
(2, 'Dinas Kebudayaan (Kundha Kabudavan) ', 'Dinas Kebudayaan Kota Yogyakarta berkedudukan di Jl. Kemasan Nomor 39 Kotagede Yogyakarta. Dibentuk berdasarkan Peraturan Daerah Kota Yogyakarta Nomor 4 Tahun 2020 Tentang Perubahan Atas Peraturan Daerah Nomor 5 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Yogyakarta. Sebelum Menjadi Dinas Kebudayan (Kundha Kabudayan), nama organisasi ini telah mengalami perubahan nama yaitu Dinas Pariwisata, Seni dan Budaya berdasarkan pada Peraturan Daerah Nomor 09 Tahun 2005, kemudian pada tahun 2008 diubah menjadi Dinas Pariwisata dan Kebudayaan Kota Yogyakarta berdasarkan Peraturan Daerah No. 10 Tahun 2008 yang kemudian berpisah dengan Dinas Pariwisata dan Menjadi Dinas Kebudayaan Kota Yogyakarta sesuai dengan Peraturan Daerah Nomor 5 Tahun 2016. '),
(3, 'Dinas Kependudukan dan Pencatatan Sipil ', 'Dinas Kependudukan dan Pencatatan Sipil mempunyai tugas membantu Walikota melaksanakan urusan pemerintahan di bidang administrasi kependudukan dan pencatatan sipil. Beberapa tujuan utama pembentukan Dinas Kependudukan dan Pencatatan Sipil adalah:  \r\n\r\n1. Penyelenggaraan Pelayanan Pendaftaran Penduduk diantaranya adalah Pelayanan Identitas Penduduk; dan Pelayanan Pindah Datang dan Pendataan Penduduk  \r\n\r\n2. Penyelenggaraaan  Pelayanan Pencatatan Sipil, diantaranya Pelayanan Pencatatan Kelahiran dan Kematian; dan Pelayanan Pencatatan Perkawinan Perceraian Perubahan Status Anak dan Pewarganegaraan. \r\n\r\n3. Pengelolaan        Informasi              Administrasi    Kependudukan       dan Pemanfaatan Data, diantaranya meliputi Pengelolaan                       Informasi         Administrasi Kependudukan; dan Kerjasama dan Pemanfaatan Data. \r\n\r\n4. Pengawasan dan Evaluasi penyelenggaraan program dan kegiatan kependudukan dan pencatatan sipil agar berjalan efektivitas, efisiensi,  sesuai dengan Rencana Pembangunan Jangka Menengah Kota Yogyakarta dan sesuai dengan  kebutuhan masyarakat. '),
(4, 'Dinas Kesehatan', 'Di Kota Yogyakarta, Dinas Kesehatan merupakan salah satu perangkat Pemerintah Kota Yogyakarta yang mempunyai tugas dan fungsi membantu Walikota Yogyakarta di Bidang Kesehatan.Pembangunan kesehatan merupakan bagian dari pembangunan nasional yang bertujuan meningkatkan kesadaran, kemauan, dan kemampuan hidup sehat bagi setiap orang agar terwujud derajat kesehatan masyarakat yang setinggi-tingginya. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `id_gedung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
(1, 'shid@gmail.com', 'shid', '$2y$10$toxBR6H98jr36.DqG2uWBey.xEV3OMHxHjmEHIxuplWCd8VTSrLhG', 'admin'),
(4, 'shidkigaming7@gmail.com', 'veldddd', '$2y$12$ZonEUTqXRIHChiKg5Xm.G..u6IxC1Ebx3/pbeFLQMlUjN4bto22CS', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
