-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2024 pada 13.44
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
-- Database: `pkl6`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `id_jenis_fasilitas` int(5) NOT NULL,
  `id_penginapan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `id_jenis_fasilitas`, `id_penginapan`) VALUES
(180, 1, 'PH20241'),
(181, 2, 'PH20241'),
(182, 25, 'PH20241'),
(183, 26, 'PH20241'),
(184, 27, 'PH20241'),
(185, 28, 'PH20241'),
(186, 29, 'PH20241'),
(187, 30, 'PH20241'),
(188, 31, 'PH20241'),
(189, 32, 'PH20241'),
(190, 1, 'PH20242'),
(191, 25, 'PH20242'),
(192, 26, 'PH20242'),
(193, 27, 'PH20242'),
(194, 29, 'PH20242'),
(195, 30, 'PH20242'),
(196, 31, 'PH20242'),
(197, 32, 'PH20242'),
(198, 33, 'PH20242'),
(199, 27, 'PH20243'),
(200, 34, 'PH20243'),
(201, 35, 'PH20243'),
(202, 26, 'PH20244'),
(203, 27, 'PH20244'),
(204, 36, 'PH20244'),
(205, 33, 'PH20245'),
(206, 34, 'PH20245'),
(207, 35, 'PH20245'),
(208, 36, 'PH20245'),
(209, 27, 'PH20246'),
(210, 34, 'PH20246'),
(211, 35, 'PH20246'),
(212, 36, 'PH20246'),
(213, 27, 'PH20247'),
(214, 34, 'PH20247'),
(215, 1, 'PH20248'),
(216, 27, 'PH20248'),
(217, 29, 'PH20248'),
(218, 37, 'PH20248'),
(219, 38, 'PH20248'),
(220, 39, 'PH20248'),
(221, 40, 'PH20248'),
(222, 1, 'PH20249'),
(223, 26, 'PH20249'),
(224, 27, 'PH20249'),
(225, 29, 'PH20249'),
(226, 32, 'PH20249'),
(227, 39, 'PH20249'),
(228, 1, 'PH202410'),
(229, 32, 'PH202410'),
(230, 38, 'PH202410'),
(231, 39, 'PH202410'),
(232, 1, 'PH202411'),
(233, 27, 'PH202411'),
(234, 29, 'PH202411'),
(235, 32, 'PH202411'),
(236, 38, 'PH202411'),
(237, 1, 'PH202412'),
(238, 27, 'PH202412'),
(239, 1, 'PH202413'),
(240, 26, 'PH202413'),
(241, 27, 'PH202413'),
(242, 1, 'PH202414'),
(243, 26, 'PH202414'),
(244, 27, 'PH202414'),
(245, 34, 'PH202414'),
(246, 41, 'PH202414'),
(247, 42, 'PH202414'),
(248, 43, 'PH202414'),
(249, 1, 'PH202415'),
(250, 26, 'PH202415'),
(251, 27, 'PH202415'),
(252, 31, 'PH202415'),
(253, 32, 'PH202415'),
(254, 34, 'PH202415'),
(255, 35, 'PH202415'),
(256, 39, 'PH202415'),
(257, 42, 'PH202415'),
(258, 45, 'PH202415'),
(259, 1, 'PH202416'),
(260, 26, 'PH202416'),
(261, 34, 'PH202416'),
(262, 36, 'PH202416'),
(263, 41, 'PH202416'),
(264, 43, 'PH202416'),
(265, 1, 'PH202417'),
(266, 26, 'PH202417'),
(267, 27, 'PH202417'),
(268, 34, 'PH202417'),
(269, 36, 'PH202417'),
(270, 41, 'PH202417'),
(271, 43, 'PH202417'),
(272, 1, 'PH202418'),
(273, 26, 'PH202418'),
(274, 27, 'PH202418'),
(275, 34, 'PH202418'),
(276, 36, 'PH202418'),
(277, 41, 'PH202418'),
(278, 43, 'PH202418'),
(279, 1, 'PH202419'),
(280, 26, 'PH202419'),
(281, 27, 'PH202419'),
(282, 41, 'PH202419'),
(283, 42, 'PH202419'),
(284, 43, 'PH202419'),
(285, 1, 'PH202420'),
(286, 26, 'PH202420'),
(287, 27, 'PH202420'),
(288, 34, 'PH202420'),
(289, 41, 'PH202420'),
(290, 42, 'PH202420'),
(291, 43, 'PH202420'),
(292, 26, 'PH202421'),
(293, 27, 'PH202421'),
(294, 46, 'PH202421'),
(295, 1, 'PH202422'),
(296, 26, 'PH202422'),
(297, 27, 'PH202422'),
(298, 35, 'PH202422'),
(299, 41, 'PH202422'),
(300, 43, 'PH202422'),
(301, 1, 'PH202423'),
(302, 26, 'PH202423'),
(303, 27, 'PH202423'),
(304, 34, 'PH202423'),
(305, 35, 'PH202423'),
(306, 36, 'PH202423'),
(307, 41, 'PH202423'),
(308, 43, 'PH202423'),
(309, 1, 'PH202424'),
(310, 26, 'PH202424'),
(311, 27, 'PH202424'),
(312, 34, 'PH202424'),
(313, 35, 'PH202424'),
(314, 41, 'PH202424'),
(315, 42, 'PH202424'),
(316, 43, 'PH202424');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_detail_layanan`
--

CREATE TABLE `gambar_detail_layanan` (
  `id` int(11) NOT NULL,
  `judul_gambar` varchar(100) DEFAULT NULL,
  `gambar_detail` text DEFAULT NULL,
  `id_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gambar_detail_layanan`
--

INSERT INTO `gambar_detail_layanan` (`id`, `judul_gambar`, `gambar_detail`, `id_layanan`) VALUES
(57, NULL, 'file_gambar/instansi/layanan/gambar_layanan_Layanan Permohonan Nomor Induk Kebudayaan (NIK)NIK.png', 8),
(58, NULL, 'file_gambar/instansi/layanan/gambar_layanan_Layanan Pengajuan Rekomendasi KebudayaanREKOM.png', 16),
(59, NULL, 'file_gambar/instansi/layanan/gambar_layanan_Pengujian Kendaraan BermotorKENDARAAN.png', 312),
(60, NULL, 'file_gambar/instansi/layanan/gambar_layanan_Penerbitan Kartu Keluarga (KK) Baru Karena Membentuk Keluarga Barukk 1.png', 502),
(61, NULL, 'file_gambar/instansi/layanan/gambar_layanan_Penerbitan KK Baru Karena Penggantian kepala Keluarga (Kematian Kepala Keluarga)kk 2.png', 503),
(63, NULL, 'file_gambar/instansi/layanan/gambar_layanan_Penerbitan KK Karena Perubahan Datakk perubahan data.png', 505),
(65, NULL, 'file_gambar/instansi/layanan/gambar_layanan_Layanan On line ADMINDUKadminduk.png', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `jenis` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id`, `nama`, `deskripsi`, `maps`, `gambar`, `jenis`) VALUES
(1, 'Mal Pelayanan Publik Kota Yogyakarta', 'MPP dirancang oleh KEMEPAN RB sebagai bagian dari perbaikan menyeluruh dan transformasi tata kelola pelayanan publik. Menggabungkan berbagai jenis pelayanan pada satu tempat, penyederhaan dan prosedur serta integrasi pelayanan pada Mal Pelayanan Publik akan memudahkan akses masyarakat dalam mendapat berbagai jenis pelayanan, serta meningkatkan kepercayaan masyarakat kepada penyelenggara pelayanan publik. ', 'https://ths.li/Bksm4jd', 'file_gambar/instansi/gambar_instansi_Mal Pelayanan Publik Kota Yogyakarta', 'inst'),
(2, 'Dinas Kebudayaan', 'Dinas Kebudayaan Kota Yogyakarta berkedudukan di Jl. Kemasan Nomor 39 Kotagede Yogyakarta. Dibentuk berdasarkan Peraturan Daerah Kota Yogyakarta Nomor 4 Tahun 2020 Tentang Perubahan Atas Peraturan Daerah Nomor 5 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Yogyakarta. Sebelum Menjadi Dinas Kebudayan (Kundha Kabudayan), nama organisasi ini telah mengalami perubahan nama yaitu Dinas Pariwisata, Seni dan Budaya berdasarkan pada Peraturan Daerah Nomor 09 Tahun 2005, kemudian pada tahun 2008 diubah menjadi Dinas Pariwisata dan Kebudayaan Kota Yogyakarta berdasarkan Peraturan Daerah No. 10 Tahun 2008 yang kemudian berpisah dengan Dinas Pariwisata dan Menjadi Dinas Kebudayaan Kota Yogyakarta sesuai dengan Peraturan Daerah Nomor 5 Tahun 2016. ', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.689957360182!2d110.3982828740084!3d-7.822603792198213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57185bc9064b%3A0x965401183c270d9!2sDinas%20Kebudayaan%20Kota%20Yogyakarta!5e0!3m2!1sen!2sid!4v1708997576277!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Kebudayaan', 'inst'),
(3, 'Dinas Kependudukan dan Pencatatan Sipil', 'Dinas Kependudukan dan Pencatatan Sipil mempunyai tugas membantu Walikota melaksanakan urusan pemerintahan di bidang administrasi kependudukan dan pencatatan sipil. Beberapa tujuan utama pembentukan Dinas Kependudukan dan Pencatatan Sipil adalah:  \r\n\r\n1. Penyelenggaraan Pelayanan Pendaftaran Penduduk diantaranya adalah Pelayanan Identitas Penduduk; dan Pelayanan Pindah Datang dan Pendataan Penduduk  \r\n\r\n2. Penyelenggaraaan  Pelayanan Pencatatan Sipil, diantaranya Pelayanan Pencatatan Kelahiran dan Kematian; dan Pelayanan Pencatatan Perkawinan Perceraian Perubahan Status Anak dan Pewarganegaraan. \r\n\r\n3. Pengelolaan        Informasi              Administrasi    Kependudukan       dan Pemanfaatan Data, diantaranya meliputi Pengelolaan                       Informasi         Administrasi Kependudukan; dan Kerjasama dan Pemanfaatan Data. \r\n\r\n4. Pengawasan dan Evaluasi penyelenggaraan program dan kegiatan kependudukan dan pencatatan sipil agar berjalan efektivitas, efisiensi,  sesuai dengan Rencana Pembangunan Jangka Menengah Kota Yogyakarta dan sesuai dengan  kebutuhan masyarakat. ', 'https://ths.li/Utvh04q', 'file_gambar/instansi/gambar_instansi_Dinas Kependudukan dan Pencatatan Sipil', 'inst'),
(4, 'Dinas Kesehatan', 'Di Kota Yogyakarta, Dinas Kesehatan merupakan salah satu perangkat Pemerintah Kota Yogyakarta yang mempunyai tugas dan fungsi membantu Walikota Yogyakarta di Bidang Kesehatan.Pembangunan kesehatan merupakan bagian dari pembangunan nasional yang bertujuan meningkatkan kesadaran, kemauan, dan kemampuan hidup sehat bagi setiap orang agar terwujud derajat kesehatan masyarakat yang setinggi-tingginya. ', 'https://ths.li/GdrIpWw', 'file_gambar/instansi/gambar_instansi_Dinas Kesehatan', 'inst'),
(5, 'Badan Pengelolaan Keuangan dan Aset Daerah', 'Berdasarkan Peraturan Walikota Yogyakarta Nomor 112 Tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi dan Tata Kerja Badan Pengelolaan Keuangan dan Aset Daerah Pasal 4: Badan mempunyai tugas membantu Walikota melaksanakan fungsi penunjang penyelenggaraan urusan pemerintahan di bidang keuangan.', 'https://ths.li/0xIKoer', 'file_gambar/instansi/gambar_instansi_Badan Pengelolaan Keuangan dan Aset Daerah', 'inst'),
(6, 'Badan Perencanaan Pembangunan Daerah', 'Bappeda Kota Yogyakarta mempunyai tugas membantu Walikota melaksanakan fungsi penunjang penyelenggaraan urusan pemerintahan bidang perencanaan pembangunan daerah, penelitian dan pengembangan.', 'https://ths.li/j7lgKLw', 'file_gambar/instansi/gambar_instansi_Badan Perencanaan Pembangunan Daerah', 'inst'),
(7, 'Dinas Pariwisata', 'Dinas Pariwisata Kota Yogyakarta mempunyai tugas melaksanakan urusan bidang pariwisata, kewenangan dekonsentrasi serta tugas pembantuan yang diberikan oleh Pemerintah. Dinas Pariwisata mempunyai fungsi: Perumusan kebijakan teknis di bidang pariwisata; Penyelenggaraan urusan pemerintahan dan pelayanan umum di bidang pariwisata; Pelaksanaan koordinasi penyelenggaraan urusan di bidang pariwisata; Pembinaan dan pelaksanaan tugas di bidang pariwisata; Pengelolaan Taman Pintar dengan Pola Pengelolaan Keuangan Badan Layanan Umum Daerah (PPK BLUD); Pengelolaan kesekretariatan meliputi perencanaan umum, kepegawaian, keuangan, evaluasi dan pelaporan; dan Pelaksanaan pengawasan, pengendalian evaluasi, dan pelaporan di bidang pariwisata.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.0570550500474!2d110.37196727400787!3d-7.783775792235921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a583276eb8ccd%3A0x732af38c7fe6b63c!2sDinas%20Pariwisata%20Kota%20Yogyakarta!5e0!3m2!1sen!2sid!4v1708997658827!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Pariwisata', 'inst'),
(8, 'Dinas Pekerjaan Umum Perumahan dan Kawasan Permukiman', 'Dinas Pekerjaan Umum Perumahan dan Kawasan Permukiman yang menyelenggarakan urusan pemerintahan bidang pekerjaan umum dan bidang perumahan dan kawasan permukiman.', 'https://ths.li/fPiOdkr', 'file_gambar/instansi/gambar_instansi_Dinas Pekerjaan Umum Perumahan dan Kawasan Permukiman', 'inst'),
(9, 'Dinas Pemadam Kebakaran dan Penyelamatan', 'Dinas Pemadam Kebakaran dan Penyelamatan mempunyai tugas membantu Walikota melaksanakan urusan pemerintahan di bidang ketenteraman dan ketertiban umum serta perlindungan masyarakat pada sub urusan kebakaran. Kewenangan Dinas Pemadam Kebakaran dan Penyelamatan Kota Yogyakarta meliputi urusan pemerintahan dibidang ketentraman dan ketertiban umum serta perlindungan masyarakat pada sub urusan kebakaran.', 'https://ths.li/aTuDAJC', 'file_gambar/instansi/gambar_instansi_Dinas Pemadam Kebakaran dan Penyelamatan', 'inst'),
(10, 'Dinas Pemberdayaan Perempuan Perlindungan Anak dan Pengendalian Penduduk dan Keluarga Berencana', 'Dinas Pemberdayaan Perempuan Perlindungan Anak dan Pengendalian Penduduk dan Keluarga Berencana Kota Yogyakarta dibentuk berdasarkan Peraturan Daerah Kota Yogyakarta Nomor 4 Tahun 2020 tentang Perubahan Atas Peraturan Daerah No 5 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Yogyakarta dan selanjutnya ditindaklanjuti dengan Peraturan Walikota Yogyakarta Nomor 101 Tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi dan Tata Kerja Dinas Pemberdayaan Perempuan Perlindungan Anak dan Pengendalian Penduduk dan Keluarga Berencana Kota Yogyakarta.', 'https://ths.li/QseVzIz', 'file_gambar/instansi/gambar_instansi_Dinas Pemberdayaan Perempuan Perlindungan Anak dan Pengendalian Penduduk dan Keluarga Berencana', 'inst'),
(11, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'Sebelum Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kota Yogyakarta berdiri diawali dengan lahirnya Unit Pelayanan Terpadu Satu Atap (UPTSA)  yang  mendasarkan Surat Edaran Mentri Dalam Negeri Nomor 503/125/PUOD Tahun 1997 perihal Pembentukan Unit Pelayanan Terpadu Perizinan di Daerah, Pemerintah Kota Yogyakarta membentuk Unit Pelayanan Terpadu Satu Atap dengan Keputusan Walikota Yogyakarta Nomor 01 tahun 2000 tentang Pembentukan Unit Pelayanan Terpadu Satu Atap (UPTSA) Kota Yogyakarta, yang dipimpin oleh seorang Koordinator dengan jabatan non esselon dengan tunjangan jabatan disetarakan dengan esselon IV. Dalam perkembanganya dengan keluarnya PP 24 tahun 2015 tentang Pelayanan Perizinan Berusaha Terintegrasi Secara Elektronik, maka Pemerintah Kota Yogyakarta menyempurnakan Peraturan Daerah dengan terbitnya Peraturan Daerah Nomor 4 tahun 2020 tentang Perubahan Atas Peraturan Daerah Nomor 5 tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Yogyakarta, dan DPMP Kota Yogyakarta berubah menjadi Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (DPMPTSP) Kota Yogyakarta, dan dengan terbitnya Peraturan Walikota Yogyakarta Nomor 114 tahun 2020 tentang Kedudukan, Susunan, Organisasi, Tugas, Fungsi dan Tata Kerja Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu, maka hal tersebut memperjelas ketugasan DPMPTSP, dan mulai Januari 2021 DPMP telah berubah menjadi DPMPTSP.', 'https://ths.li/5Ti736k', 'file_gambar/instansi/gambar_instansi_Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 'inst'),
(12, 'Dinas Pendidikan Pemuda dan Olahraga', 'Dinas Pendidikan Pemuda dan Olahraga  mempunyai tugas membantu Walikota melaksanakan urusan pemerintahan di bidang pendidikan dan bidang kepemudaan dan olahraga.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7905.895694658222!2d110.36324107770997!3d-7.795346800000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a582a2e979463%3A0xc0eb36a64a0d42eb!2sDinas%20Pendidikan%20Pemuda%20dan%20Olahraga%20Kota%20Yogyakarta!5e0!3m2!1sen!2sid!4v1708997802133!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Pendidikan Pemuda dan Olahraga', 'inst'),
(13, 'Dinas Perdagangan', 'Dinas Perdagangan Kota Yogyakarta mempunyai tugas untuk menjadikan sektor perdagangan sebagai pusat pengembangan perekonomian, wisata, dan edukasi yang berkelanjutan. Dengan meningkatkan promosi dan pengembangan perdagangan, serta meningkatkan pengawasan dan pengendalian perdagangan, Dinas ini berkomitmen untuk mempertahankan kota sebagai Daerah Tertib Ukur. Fokusnya adalah menciptakan sarana dan prasarana yang mendukung kebersihan, keamanan, dan ketertiban pasar, sambil mewujudkan penataan lahan yang produktif. Dengan pemberdayaan pedagang pasar tradisional dan adopsi sistem yang mengikuti perkembangan, Dinas Perdagangan bertujuan untuk meningkatkan pendapatan secara berkelanjutan, menciptakan lingkungan perdagangan yang dinamis, dan memberikan kontribusi positif bagi masyarakat Kota Yogyakarta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.9134265012344!2d110.36540127400805!3d-7.79899029222112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57419c38fe9b%3A0x76222262fc983991!2sDinas%20Perdagangan%20Kota%20Yogyakarta%20(Lantai%203%20Pasar%20Beringharjo)!5e0!3m2!1sen!2sid!4v1708997885816!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Perdagangan', 'inst'),
(14, 'Dinas Perhubungan', 'Dinas Perhubungan Kota Yogayakarta memiliki tugas dalam mewujudkan pelayanan transportasi kota yang berkeselamatan, aman dan nyaman, serta tertib dan lancar, yang berwawasan lingkungan serta responsif gender dan mewujudkan keselamatan, keamanan, ketertiban dan kelancaran lalu lintas jalan.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5826859730146!2d110.3916043!3d-7.8339138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58475a4414a7%3A0xb5d50eb3ac1c4126!2sDinas%20Perhubungan%20Kota%20Yogyakarta!5e0!3m2!1sen!2sid!4v1708997949502!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Perhubungan', 'inst'),
(15, 'Dinas Perindustrian Koperasi Usaha Kecil dan Menengah', 'Dinas Perindustrian Koperasi Usaha Kecil Menengah Kota Yogyakarta mempunyai tugas membantu Walikota melaksanakan urusan pemerintahan di bidang perindustrian, bidang koperasi, usaha kecil dan menengah di Kota Yogyakarta. Dalam perjalanan dan perkembangan kelembagaan mengalami perubahan susunan organisasi dari waktu ke waktu menyesuaikan dengan arah kebijakan dan perkembangan peraturan dari pemerintah pusat.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.899957918006!2d110.3906452!3d-7.8004155000000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5764acf8a101%3A0xd76e38af53c9a731!2sDinas%20Perindustrian%2C%20Koperasi%20dan%20UKM%20Kota%20Yogyakarta!5e0!3m2!1sid!2sid!4v1709031912451!5m2!1sid!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Perindustrian Koperasi Usaha Kecil dan Menengah', 'inst'),
(16, 'Dinas Perpustakaan dan Kearsipan', 'Dinas Perpustakaan dan Kearsipan Kota Yogyakarta berdiri berdasarkan Peraturan Daerah Kota Yogyakarta Nomor 5 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kota Yogyakarta, dan ditindaklanjuti dengan Peraturan Walikota Nomor 86 Tahun 2016 tentang Susunan Organisasi, Kedudukan, Tugas, Fungsi dan Tata Kerja Dinas Perpustakaan dan Kearsipan Kota Yogyakarta. Dinas Perpustakaan dan Kearsipan Kota Yogyakarta terdiri dari dua sub urusan yaitu urusan perpustakaan dan urusan kearsipan. Sehubungan dengan ditetapkannya Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 25 Tahun 2021 Tentang Penyederhanaan Struktur Organisasi Pada Instansi Pemerintah Untuk Penyederhanaan Birokrasi, maka tugas dan fungsi Dinas Perpustakaan dan Kearsipan yang diatur dalam Peraturan Walikota Nomor 111 Tahun 2020 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi, dan Tata Kerja Dinas Perpustakaan dan Kearsipan, perlu dicabut dan diganti dengan Peraturan Walikota Yogyakarta Nomor 107 Tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi, dan Tata Kerja Dinas Perpustakaan dan Kearsipan.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.930938824778!2d110.35558499999999!3d-7.797136800000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58218febd995%3A0xf9e4e80c5bbfbac!2sDinas%20Perpustakaan%20Dan%20Kearsipan%20Kota%20Yogyakarta!5e0!3m2!1sid!2sid!4v1709032029979!5m2!1sid!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Perpustakaan dan Kearsipan', 'inst'),
(17, 'Dinas Pertanahan dan Tata Ruang', 'Dinas Pertanahan dan Tata Ruang (Kundha Niti Mandala Sarta Tata Sasana) Kota yogyakarta mempunyai tugas membantu Walikota untuk melaksanakan urusan pemerintahan dan penugasan urusan keistimewaan di bidang pertanahan dan bidang penataan ruang', 'https://ths.li/i60gqp0', 'file_gambar/instansi/gambar_instansi_Dinas Pertanahan dan Tata Ruang', 'inst'),
(18, 'Dinas Pertanian dan Pangan', 'Dinas Pertanian dan Pangan mempunyai tugas membantu Walikota melaksanakan urusan pemerintahan daerah di bidang pertanian, bidang pangan, dan bidang kelautan dan perikanan.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5568239425747!2d110.3883886!3d-7.8366381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a56fd68fcd2d1%3A0x2c4f783068ce6cbf!2sDinas%20Pertanian%20Dan%20Pangan-Plasma%20Nutfah%20Pisang!5e0!3m2!1sen!2sid!4v1708997977976!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Pertanian dan Pangan', 'inst'),
(19, 'Dinas Sosial Tenaga Kerja dan Transmigrasi', 'Dinas Sosial Tenaga Kerja dan Transmigrasi (Dinsosnakertrans) merupakan sebuah badan publik pemerintah di Kota Yogyakarta yang bertanggung jawab dalam mengelola berbagai program dan kebijakan terkait dengan bidang sosial, tenaga kerja, dan transmigrasi. Latar belakang pembentukan dinas ini melibatkan beberapa faktor yang mendorong perlunya peningkatan perhatian dan pengelolaan yang lebih baik dalam bidang tersebut. ', 'https://ths.li/wdlhGWf', 'file_gambar/instansi/gambar_instansi_Dinas Sosial Tenaga Kerja dan Transmigrasi', 'inst'),
(20, 'Satuan Polisi Pamong Praja', 'Satuan Polisi Pamong Praja di singkat Satpol PP adalah perangkat pemerintahan daerah dalam memelihara ketentraman dan ketertiban umum serta menegakkan peraturan daerah. Organisasi dan kata kerja Satuan Polisi Pamong Praja ditetapkan dengan peraturan daerah. Satpol PP dapat berkedudukan di daerah Provinsi dan daerah Kabupaten/Kota. Di daerah Provinsi Satuan Pol PP dipimpin oleh kepala yang berada di bawah dan bertanggung jawab kepada Gubernur melalui Sekeretaris Daerah. Di daerah Kabupaten/Kota Satuan Pol PP di pimpin oleh kepala yang berada di bawah dan bertanggung jawab kepada Bupati/Walikota melalui Sekertaris Daerah.', 'https://ths.li/N3Cs5FN', 'file_gambar/instansi/gambar_instansi_Satuan Polisi Pamong Praja', 'inst'),
(21, 'Bagian Administrasi dan Keuangan', 'Berdasarkan Peraturan Walikota Nomor 92 tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi, dan Tata Kerja Sekretariat Daerah pada pasal 74, Bagian Administrasi dan Keuangan mempunyai tugas untuk melaksanakan beberapa tugas, yaitu Penyiapan pengoordinasian perumusan kebijakan daerah, Pengoordinasian pelaksanaan tugas perangkat daerah, Pemantauan dan evaluasi pelaksanaan kebijakan daerah di bidang perencanaan, Evaluasi dan pelaporan Sekretariat Daerah, Keuangan dan Aset Sekretariat Daerah, dan Administrasi umum.', 'https://ths.li/RQjosmp', 'file_gambar/instansi/gambar_instansi_Bagian Administrasi dan Keuangan', 'inst'),
(22, 'Bagian Administrasi Pembangunan', 'Bagian Administrasi Pembangunan Setda Kota Yogyakarta dibentuk untuk membantu Sekretariat Daerah dan Walikota melaksanakan urusan Pemerintahan untuk melaksanakan perumusan kebijakan pembangunan, pengoordinasian dan pengendalian pelaksanaan tugas pembangunan oleh Perangkat Daerah, pelaksanaan pembinaan administrasi di bidang kebijakan pembangunan, serta pemantauan, evaluasi dan pelaporan pelaksanaan kebijakan pembangunan.', 'https://ths.li/6rJ1v36', 'file_gambar/instansi/gambar_instansi_Bagian Administrasi Pembangunan', 'inst'),
(23, 'Bagian Hukum', 'Bagian Hukum Sekretariat Daerah Kota Yogyakarta dibentuk untuk melaksanakan penyiapan perumusan kebijakan Daerah, pengoordinasian perumusan kebijakan Daerah, pengoordinasian pelaksanaan tugas Perangkat Daerah, pemantauan dan evaluasi pelaksanaan kebijakan Daerah, pelaksanaan pembinaan administrasi di bidang perundang-undangan, bantuan hukum, dan dokumentasi dan informasi.', 'https://ths.li/xPzUh4P', 'file_gambar/instansi/gambar_instansi_Bagian Hukum', 'inst'),
(24, 'Bagian Kesejahteraan Rakyat', 'Bagian Kesejahteraan Rakyat mempunyai tugas melaksanakan penyiapan perumusan kebijakan Daerah, pengoordinasian perumusan kebijakan Daerah, pengoordinasian pelaksanaan tugas Perangkat Daerah, pemantauan, dan evaluasi pelaksanaan kebijakan Daerah, pelaksanaan pembinaan administrasi di bidang bina mental, kesejahteraan sosial, serta pemberdayaan dan kesejahteraan masyarakat. ', 'https://ths.li/5IrjKJo', 'file_gambar/instansi/gambar_instansi_Bagian Kesejahteraan Rakyat', 'inst'),
(25, 'Bagian Organisasi', 'Berdasarkan pada Peraturan Daerah Kota Yogyakarta Nomor 4 Tahun 2020 tentang Perubahan Atas Peraturan Daerah Nomor 5 Tahun 2016 Tentang Pembentukan dan Susunan Perangkat Daerah Kota Yogyakarta  dan Peraturan Walikota Yogyakarta Nomor 92  Tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi, dan Tata Kerja Sekretariat Daerah, Bagian Organisasi mempunyai tugas melaksanakan penyiapan perumusan kebijakan Daerah, pengoordinasian perumusan kebijakan Daerah,pengoordinasian pelaksanaan tugas Perangkat Daerah, pemantauan dan evaluasi pelaksanaan kebijakan Daerah di bidang kelembagaan dan analisis jabatan, pelayanan publik dan tata laksana, dan reformasi birokrasi.', 'https://ths.li/YbiQlqy', 'file_gambar/instansi/gambar_instansi_Bagian Organisasi', 'inst'),
(26, 'Bagian Pengadaan Barang dan Jasa', 'Bagian Pengadaan Barang dan Jasa mempunyai tugas melaksanakan penyiapan perumusan kebijakan Daerah, pengoordinasian perumusan kebijakan Daerah, pengoordinasian pelaksanaan tugas Perangkat Daerah, pelaksanaan pemantauan dan evaluasi di bidang pembinaan pengadaan barang dan jasa, pengelolaan pengadaan barang dan jasa, dan layanan pengadaan secara elektronik. ', 'https://ths.li/35ueEQy', 'file_gambar/instansi/gambar_instansi_Bagian Pengadaan Barang dan Jasa', 'inst'),
(27, 'Bagian Perekonomian dan Kerjasama', 'Bagian Kerjasama Setda Kota Yogyakarta terbentuk pada tahun Januari 2009. Setelah sebelumnya Tugas dan Wewenang yang saat ini dilakukan oleh Bagian Kerjasama Setda Kota yogyakarta, dilaksanakan oleh Bagian Tata Pemerintahan Umum Setda Kota Yogyakarta dan Badan Perencanaan Pembangunan Daerah (Bappeda) Kota Yogyakarta. Kerjasama dimaksudkan untuk mewujudkan kepentingan bersama dalam meningkatkan penyelenggaraan pemerintahan dan pembangunan guna mendukung pelaksanaan otonomi\r\ndaerah. \r\n', 'https://ths.li/ZhNfr6x', 'file_gambar/instansi/gambar_instansi_Bagian Perekonomian dan Kerjasama', 'inst'),
(28, 'Bagian Tata Pemerintahan', 'Bagian Tata Pemerintahan merupakan perangkat Pemerintah Kota Yogyakarta yang bertanggungjawab untuk meneguhkan kota ini sebagai lingkungan yang nyaman dan berdaya saing tinggi, yang menjadi pusat pelayanan jasa unggul dengan landasan pada nilai-nilai keistimewaan yang khas. Misi-misinya mencakup upaya meningkatkan kesejahteraan dan keberdayaan masyarakat melalui program-program yang mendukung ekonomi kerakyatan dan daya saing kota. Selain itu, Bagian ini berkomitmen untuk memperkuat moral, etika, dan budaya masyarakat Yogyakarta, serta meningkatkan kualitas pendidikan, kesehatan, sosial, dan budaya. Dalam konteks pembangunan kota, Bagian Tata Pemerintahan aktif berperan dalam memperkuat tata kota dan menjaga kelestarian lingkungan melalui langkah-langkah yang berkelanjutan. Pembangunan sarana prasarana publik dan permukiman menjadi fokus penting untuk menciptakan lingkungan yang nyaman huni. Selain itu, Bagian ini berusaha untuk meningkatkan tatakelola pemerintah yang baik dan bersih, yang menjadi dasar penting dalam mencapai visi Kota Yogyakarta sebagai pusat unggulan yang memberdayakan masyarakatnya.', 'https://ths.li/FjHVTaY', 'file_gambar/instansi/gambar_instansi_Bagian Tata Pemerintahan', 'inst'),
(29, 'Bagian Umum dan Protokol', 'Bagian Umum dan Protokol merupakan bagian dari Sekretariat Daerah yang berkedaulatan di bawah dan bertanggungjawab kepada Sekretariat Daerah Kota Yogyakarta. Bagian Umum dan Protokol mempunyai tugas melaksanakan penyiapan pelaksanaan kebijakan, pemantauan, dan evaluasi di bidang tata usaha dan administrasi pimpinan, protokol, rumah tangga, dan perlengkapan sesuai dengan yang tercantum pada Peraturan Walikota Yogyakarta Nomor 92 Tahun 2021 tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi, dan Tata Kerja Sekretariat Daerah.', 'https://ths.li/DvDwZF2', 'file_gambar/instansi/gambar_instansi_Bagian Umum dan Protokol', 'inst'),
(30, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia merupakan perangkat Pemerintah Kota Yogyakarta yang bertanggungjawab meneguhkan kota yogyakarta sebagai kota nyaman huni dan pusat pelayanan jasa yang berdaya saing kuat untuk keberdayaan masyarakat dengan berpijak pada nilai keistimewaan serta mendukung misi ke-7 walikota dan wawwali yaitu menigkatkan tata kelola pemerintahan yang baik dan bersih melalui peningkatan kualitas aparatur sipil negara.', 'https://ths.li/s75Xw3y', 'file_gambar/instansi/gambar_instansi_Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'inst'),
(31, 'Badan Kesatuan Bangsa dan Politik', 'Badan Kesatuan Bangsa dan Politik Kota Yogyakarta merupakan perangkat Pemerintah Kota Yogyakarta yang bertanggungjawab terhadap pembinaan dan pengembangan wawasan kebangsaan di Kota Yogyakarta. Urusan yang diampu oleh Bekesbangpol adalah urusan politik dalam negeri dan kesatuan bangsa.  ', 'https://maps.app.goo.gl/cv8cUct59QxFHuzp7?g_st=ic', 'file_gambar/instansi/gambar_instansi_Badan Kesatuan Bangsa dan Politik', 'inst'),
(32, 'Badan Penanggulangan Bencana Daerah', 'Badan Penanggulangan Bencana Daerah (BPBD) Kota Yogyakarta adalah perangkat daerah Kota Yogyakarta yang dibentuk dalam rangka melaksanakan tugas dan fungsi untuk penanggulangan bencana dan segala akibat yang dimunculkannya. Berdasarkan Undang-Undang Nomor 24 Tahun 2007 tentang Penanggulangan bencana merupakan payung hukum tertinggi pembentukan Badan Penanggulangan Bencana Daerah (BPBD) yang selanjutnya Badan Penanggulangan Bencana Daerah (BPBD) Kota Yogyakarta dibentuk atas landasan Peraturan Daerah Kota Yogyakarta Nomor 03 Tahun 2011 tentang Badan Penanggulangan Bencana Daerah Kota Yogyakarta.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8885061338165!2d110.37774247400812!3d-7.801627092218582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57d23e195d2b%3A0x657bf2026b547acc!2sBadan%20Kesatuan%20Bangsa%20Dan%20Politik%20Kota%20Yogyakarta!5e0!3m2!1sen!2sid!4v1708997727954!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Badan Penanggulangan Bencana Daerah', 'inst'),
(33, 'Forum Pemantau Independen', 'Forum Pemantau Independen (Forpi) di Kota Yogyakarta memiliki peran penting dalam memastikan integritas dan transparansi dalam berbagai proses. Forpi memiliki tugas menyusun kode etik sebagai dasar pengawasan terhadap pelaksanaan pakta integritas. Mereka juga membantu program pencegahan korupsi di Lingkungan Pemerintah Kota Yogyakarta dan menyampaikan laporan hasil tugas kepada Walikota Yogyakarta.', 'https://ths.li/e1T6UG2', '', 'inst'),
(34, 'Korps Pegawai Republik Indonesia', 'Korps Pegawai Republik Indonesia (Korpri) adalah satu-satunya organisasi dan wadah berhimpun Aparatur Sipil Negara (ASN) yang merupakan bagian integral dari Pemerintahan. Didirikan pada tanggal 29 November 1971, KORPRI memiliki peran penting dalam memastikan integritas dan transparansi dalam berbagai proses. Selain itu, KORPRI Kota Yogya juga aktif dalam berbagai program untuk masyarakat. Mereka rutin menggelar bakti sosial, termasuk pemasangan IUD KB gratis kepada masyarakat.', 'https://ths.li/G4LkkNt', '', 'inst'),
(35, 'Pemberdayaan Kesejahteraan Keluarga', 'Pemberdayaan Kesejahteraan Keluarga (PKK) di Kota Yogyakarta memiliki peran penting dalam memajukan kesejahteraan keluarga dan masyarakat. ', 'https://ths.li/uV6CBkb', '', 'inst'),
(36, 'Graha Pandawa', 'Gedung Graha Pandawa, yang terletak di Balaikota Yogyakarta, adalah sebuah bangunan yang menjadi tempat pelaksanaan berbagai kegiatan. Berlokasi di pusat kota Yogyakarta, gedung ini memudahkan akses bagi peserta kegiatan. Gedung ini merupakan salah satu fasilitas yang disewakan atau dapat dipinjam oleh publik.', 'https://ths.li/ktPhm0h', 'file_gambar/instansi/gambar_instansi_Graha Pandawa', 'lain'),
(37, 'Parkir MPP', 'Parkir MPP adalah parkir khusus roda dua yang berada di depan MPP yang dapat digunakan oleh pegawai maupun pengunjung dari MPP sendiri. ', 'https://ths.li/qvdRq3Q', 'file_gambar/instansi/gambar_instansi_Parkir MPP', 'lain'),
(38, 'Parkir Sebrang MPP', 'Parkir Sebrang MPP adalah parkir khusus roda dua yang berada di depan MPP yang dapat digunakan oleh pegawai maupun pengunjung dari MPP sendiri. ', 'https://ths.li/zkYREqn', 'file_gambar/instansi/gambar_instansi_Parkir Sebrang MPP', 'lain'),
(39, 'Dinas Komunikasi Informatika dan Persandian', 'Dinas Komunikasi, Informatika dan Persandian Kota Yogyakarta dibentuk untuk membantu Walikota melaksanakan urusan pemerintahan di bidang komunikasi dan informatika, bidang persandian, dan bidang statistik. Kewenangan Dinas Komunikasi, Informatika dan Persandian meliputi Urusan Komunikasi dan Informatika, Urusan Statistik dan Urusan Persandian serta keamanan informasi.', 'https://ths.li/Skd2bxe', 'file_gambar/instansi/gambar_instansi_Dinas Komunikasi Informatika dan Persandian', ''),
(40, 'Dinas Lingkungan Hidup', 'Dinas Lingkungan Hidup merupakan dinas yang mempunyai tugas melaksanakan urusan pemerintahan daerah berdasarkan asas otonomi dan tugas pembantuan di bidang Lingkungan Hidup.', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15812.103575057141!2d110.36958171053949!3d-7.787079201045572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599af7880365%3A0x6e5f2d57f62e3b8!2sDinas%20Lingkungan%20Hidup%20Kota%20Yogyakarta!5e0!3m2!1sen!2sid!4v1708997839490!5m2!1sen!2sid', 'file_gambar/instansi/gambar_instansi_Dinas Lingkungan Hidup', ''),
(41, 'Lapangan', 'Lapangan Upacara Balaikota Timoho, yang berada di Kota Yogyakarta, sering digunakan untuk menggelar upacara kebangsaan, termasuk upacara kemerdekaan dan lainnya.  Lokasinya berada di Jalan Kenari No. 56, Kelurahan Muja Muju, Kemantren Umbulharjo2. Sebelumnya, Balaikota Yogyakarta telah mengalami beberapa perpindahan lokasi sepanjang sejarahnya.', 'https://ths.li/1dZUaE1', 'file_gambar/instansi/gambar_instansi_Lapangan', 'lain'),
(42, 'Masjid Diponegoro Balaikota', 'Masjid Pangeran Diponegoro, yang terletak di Jl. Kenari No.56, Muja Muju, Umbulharjo, Yogyakarta 55165, merupakan bagian dari kompleks Balaikota Yogyakarta. Masjid Pangeran Diponegoro memiliki peran penting sebagai tempat ibadah dan kegiatan masyarakat. Selain itu, masjid ini juga menjadi lokasi untuk berbagai program pelayanan, termasuk jemput zakat dan konsultasi zakat.', 'https://ths.li/iFrkJOp', 'file_gambar/instansi/gambar_instansi_Masjid Diponegoro Balaikota', 'lain'),
(43, 'Kantin', 'Kantin Mbak Ris, yang berada di kompleks Balaikota Yogyakarta, telah menjadi tempat yang akrab bagi para karyawan Pemerintah Kota (Pemkot) Yogyakarta. Mbak Ris merupakan generasi kedua, dia meneruskan usaha sang Ibu yang sebelumnya juga berjualan di komplek Balaikota. Sebelum berada di tempat yang sekarang, kantin Balaikota ini berada di Gedung Pawarta. Di kantin ini memiliki menu spesial, yakni brongkos koyor. Selain menjadi andalan para karyawan Pemkot Yogya, tak jarang banyak orang luar kerap memesan brongkos koyor ini. Selain brongkos koyor, kantin ini juga menyediakan menu lain, seperti nasi rames, mie nyemek, sop buntut, dan masih banyak lagi. Sementara untuk menu minumannya, kantin ini menyediakan berbagai macam menu pelepas dahaga, seperti aneka jus buah, serta minuman seperti es jeruk, es susu, dan es teh manis. ', 'https://ths.li/fqoYzg6', 'file_gambar/instansi/gambar_instansi_Kantin', 'lain'),
(44, 'Parkir Vertikal', 'Gedung Parkir Vertikal di Kota Yogyakarta merupakan inisiatif yang menarik untuk mengatasi keterbatasan lahan parkir di perkotaan. Gedung ini khusus untuk sepeda motor. Terdiri dari enam tingkat, dengan setiap tingkat setinggi 1,5 meter. Dengan luas parkir adalah  6,5x8,5 meter persegi dan total tinggi gedung berkisar antara 10 hingga 12 meter. Diperkirakan gedung ini dapat menampung hingga 200 unit sepeda motor. Keunggulan sistem parkir vertikal ini adalah penggunaan lahan yang lebih efisien, terutama di kawasan perkotaan yang memiliki harga tanah tinggi. Gedung parkir vertikal ini akan dilengkapi dengan lift untuk memudahkan pengguna dalam menaik-turunkan sepeda motor. Pembangunan gedung ini diharapkan dapat menjadi solusi bagi kebutuhan lokasi parkir di Kota Yogyakarta.', 'https://ths.li/lhQz3ap', 'file_gambar/instansi/gambar_instansi_Parkir Vertikal', 'lain'),
(45, 'Parkir Depan TK', 'Parkir di depan TK adalah parkiran untuk roda dua, yang dapat digunakan oleh pegawai dan pengunjung instansi terdekat.', 'https://ths.li/h8ywkFf', 'file_gambar/instansi/gambar_instansi_Parkir Depan TK', 'lain'),
(46, 'Parkir Depan Kominfosan', 'Parkir depan kominfosan adalah parkiran yang digunakan untuk parkir roda dua, yang dapat diakses oleh pegawai dan pengunjung kominfosan, dan instansi terdekat lainnya.', 'https://ths.li/UcTOYwi', 'file_gambar/instansi/gambar_instansi_Parkir Depan Kominfosan', 'lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliner`
--

CREATE TABLE `kuliner` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jarak` float NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kuliner`
--

INSERT INTO `kuliner` (`id`, `nama`, `alamat`, `jarak`, `gambar`) VALUES
('KLN202410', 'RM. Padang Giwangan Baru', 'Jl. Wonosari KM 4.5 No. 11, Banguntapan, YogyakartaJl. Wonosari KM 4.5 No. 11, Banguntapan, Yogyakarta', 3.83, 'file_gambar/kuliner/gambar_kuliner_10.jpg'),
('KLN202411', 'Bakmi Pak Yok', 'JL.KUSUMANEGARA ( Disamping Sampurna Digital Printing )', 3.96, 'file_gambar/kuliner/gambar_kuliner_11.jpg'),
('KLN202412', 'Lesehan Mae', 'Jl. Wisata, Tambak Bayan, Caturtunggal, Depok, Sleman DIY', 4.16, 'file_gambar/kuliner/gambar_kuliner_12.jpg'),
('KLN202413', 'Warmindo Barbarossa', 'Jl. Wiyoro Lor No. 5, Banguntapan, Yogyakarta', 4.34, 'file_gambar/kuliner/gambar_kuliner_13.jpeg'),
('KLN202414', 'Lontong Tahu Blora Bu Pudji', 'Jl. Kenari No. 39 (Barat Balaikota Timoho), Mujamuju, Umbulharjo, Yogyakarta', 4.24, 'file_gambar/kuliner/gambar_kuliner_14.jpg'),
('KLN202415', 'Angkringan Jeckser Pak Tompi', 'Jl.Kenari Gg jagung no.29 Sanggrahan Semaki Umbulharjo Yogyakarta', 4.72, 'file_gambar/kuliner/gambar_kuliner_15.jpg'),
('KLN202416', 'Mie Nampoll', 'Jl. Kusumanegara, Gang Satria No. 2, Umbulharjo, Yogyakarta', 4.9, 'file_gambar/kuliner/gambar_kuliner_16.png'),
('KLN202417', 'Martabak Manis Songji', 'Jl Sorowajan Baru Gg Salak No 1 RT 17 Banguntapan Bantul Y', 4.91, 'file_gambar/kuliner/gambar_kuliner_17.jpg'),
('KLN202418', 'EsCogar (Es Coklat dan Coffee)', 'Jl. Karangsari, Kotagede, Yogyakarta', 4.99, 'file_gambar/kuliner/gambar_kuliner_18.jpg'),
('KLN202419', 'Bakmi Jawa Mas Doel', 'Jl. Kenari No. 43, Umbulharjo, Yogyakarta', 5.08, 'file_gambar/kuliner/gambar_kuliner_19.jpg'),
('KLN20242', 'Lesehan Aldan, Tamansiswa', 'Jl. Tamansiswa, Mergangsan, Yogyakarta', 1.71, 'file_gambar/kuliner/gambar_kuliner_2.jpg'),
('KLN202420', 'Rujak Pangkalan', 'Jl Taman Siswa Wirogunan Mergangsa Yogyakarta', 5.15, 'file_gambar/kuliner/gambar_kuliner_20.png'),
('KLN202421', 'Yesyana', 'Maera Sari, Tembalang, Semarang', 5, 'file_gambar/kuliner/gambar_kuliner_Screenshot 2024-02-28 165927.png'),
('KLN20243', 'Brongkos Koyo dan Sop Buntut Mbak Ris Balaikota', 'Kompleks Balai Kota Yogyakarta, Jl. Kenari No. 56, Umbulharjo, Yogyakarta', 1.97, 'file_gambar/kuliner/gambar_kuliner_3.jpg'),
('KLN20244', 'Hay Jus, Tuntungan', 'Jl. Tuntungan UH 3 1081, Umbulharjo, Yogyakarta', 2.02, 'file_gambar/kuliner/gambar_kuliner_4.jpg'),
('KLN20245', 'Ndalem Kamulyan, Banguntapan', 'Jl. Rajawali No. 58 C, Banguntapan, Yogyakarta', 2.14, 'file_gambar/kuliner/gambar_kuliner_5.png'),
('KLN20246', 'Nasi Kuning, Nasi Ayam, dan Jus buah', 'Jl.Tuntungan Uh III 1081 RT43 RW10 Tahunan Umbulharjo Yogyakarta', 2.36, 'file_gambar/kuliner/gambar_kuliner_6.jpg'),
('KLN20247', 'Puding Paris dan Salad Mosu, Baturetno', 'Jl. Wonosari KM 7, Banguntapan, Yogyakarta', 3.11, 'file_gambar/kuliner/gambar_kuliner_7.png'),
('KLN20248', 'Lotek dan Gado-Gado Teteg Lempuyangan Argolubang', 'Jl. Argolubang No. 184, Baciro, Gondokusuman, Yogyakarta', 3.25, 'file_gambar/kuliner/gambar_kuliner_8.jpg'),
('KLN20249', 'Solasta Coffee', 'Jl. Kusumanegara No. 105B, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta', 3.75, 'file_gambar/kuliner/gambar_kuliner_9.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_gedung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `nama`, `deskripsi`, `id_gedung`) VALUES
(3, 'Layanan On line ADMINDUK', 'Masyarakat Kota Yogyakarta dapat memanfaatkan layanan online untuk mengurus akte kelahiran, akta kematian, dan pindah penduduk pada alamat yang ditentukan melalui menu layanan PELAYANAN ONLINE SIPAK di aplikasi JSS.', 3),
(4, 'Layanan 3 in 1 di RS dan dinas', 'Masyarakat Kota Yogyakarta yang melahirkan di rumah sakit yang bekerjasama dengan Dinas Kependudukan dan Pencatataan Sipil Kota Yogyakarta dapat menerima layanan 3 in 1 yaitu layanan pengurusan dan penerimaan akte kelahiran, Kartu Keluarga, dan Kartu Identitas Anak di rumah sakit tempat ibu melahirkan langsung pada saat ibu pulang dari rumah sakit. Rumah Sakit yang sudah bekerjasama pelayanan 3 in 1 dengan Dinas Kependudukan dan Pencatataan Sipil Kota Yogyakarta sebagai berikut. \r\n1. Rumah Sakit Pratama Kota Yogyakarta, \r\n2. Puskesmas Tegalrejo, Puskesmas Jetis, \r\n3. Puskesmas Jetis, \r\n4. Rumah Sakit Jogja, \r\n5. RSKIA Bhakti Ibu, \r\n6. RSKIA Permata Bunda, \r\n7. RS Bethesda Lempuyangwangi, \r\n8. RS Puri Adisty, \r\n9. PKU Muhammadiyah Yogyakarta, dan \r\n10. RSI Hidayatullah Yogyakarta \r\n11. RS. Dr. Soetarto, \r\n12. RSKIA Rachmi, \r\n13. RSKIA PKU Muh Kotagede, \r\n14. RS. Ludira Husada Yogyakarta', 3),
(5, 'Layanan Jemput Bola Mobil Keliling', 'Masyarakat Kota Yogykarta dapat memanfaatkan layanan jemput bola Rekam KTP El: \r\n1. Dari rumah ke rumah untuk lansia, difabel dan sakit fisik/mental dengan melaporkan ke kelurahan untuk dijadwalkan kunjungan \r\n2. Kelurahan atau tempat publik sesuai jadwal yang diumumkan \r\n\r\nSelain itu, masyarakat Kota Yogyakarta (siswa) dapat memanfaatkan layanan jemput bola Katu Identitas Anak (KIA) di sekolah-sekolah sesuai jadwal yang diumumkan', 3),
(6, 'Layanan Informasi Data kependudukan', 'Masyarakat dapat mengakses publikasi layanan data kependudukan melalui aplikasi Jogja Smart Service (JSS) pada menu Datawarehouse.', 3),
(7, 'Layanan SMS Masking dan Perubahan Status Perkawinan Online', 'Dinas Kependudukan dan Pencatatan Sipil Kota Yogyakarta akan menyampaikan informasi-informasi yang diperlukan masyarakat melalui SMS antara lain informasi jadwal jemput bola, informasi kepemilikan akta, informasi penduduk belum rekam KTP El, dll. Database kependudukan di Dinas Kependudukan dan Pencatatan Sipil Kota Yogyakarta mencatat secara langsung perubahan status perkawinan warga yang telah melangsungkan perkawinan di KUA se Kota Yogyakarta secara otomasi.', 3),
(8, 'Layanan Permohonan Nomor Induk Kebudayaan (NIK)', NULL, 2),
(16, 'Layanan Pengajuan Rekomendasi Kebudayaan', NULL, 2),
(41, 'Rekomendasi Sertifikat Standart Fasilitas Pelayanan Kesehatan', NULL, 4),
(42, 'Penutupan Fasilitas Pelayanan Kesehatan', NULL, 4),
(43, 'Penerbitan Surat Izin Praktik (SIP) Dokter/Dokter Gigi/Dokter Spesialis/Dokter Gigi Spesialis', NULL, 4),
(44, 'Pembetulan Surat Izin Praktik (SIP) Dokter/Dokter Gigi/Dokter Spesialis/Dokter Gigi Spesialis', NULL, 4),
(45, 'Pencabutan Surat Izin Praktik (SIP) Dokter/Dokter Gigi/Dokter Spesialis/Dokter Gigi Spesialis', NULL, 4),
(46, 'Rekomendasi Surat Izin Praktik Tenaga Kesehatan selain Praktik Dokter/Dokter Gigi/Dokter Spesialis Dokter Gigi Spesialis', NULL, 4),
(47, 'Pembetulan Rekomendasi Surat Izin Praktik Tenaga Kesehatan selain Praktik Dokter/Dokter Gigi/Dokter Spesialis Dokter Gigi Spesialis', NULL, 4),
(48, 'Pencabutan Rekomendasi Surat Izin Praktik Tenaga Kesehatan selain Praktik Dokter/Dokter Gigi/Dokter Spesialis Dokter Gigi Spesialis', NULL, 4),
(49, 'Penerbitan Surat Terdaftar Penyehat Tradisional (STPT)', NULL, 4),
(50, 'Pencabutan Surat Terdaftar Penyehat Tradisional (STPT)', NULL, 4),
(51, 'Sertifikat Laik Higiene Sanitasi (SLHS)', NULL, 4),
(52, 'Sertifikat Laik Sehat (SLS)', NULL, 4),
(53, 'Sertifikat Pemenuhan Komitmen Pangan Industri Rumah Tangga (SPP-IRT)', NULL, 4),
(54, 'Penyuluhan Keamanan Pangan PIRT', NULL, 4),
(55, 'Penyuluhan Keamanan Pangan Siap Saji', NULL, 4),
(56, 'Pendaftaran Program Penduduk yang Didaftarkan Pemerintah Daerah (PDPD)', NULL, 4),
(57, 'Verifikasi dan Validasi Data Kepesertaan PBPU dan BP pemda', NULL, 4),
(58, 'Pembayaran Klaim 24 Jam Pertama PSC 119 YES', NULL, 4),
(59, 'Antrian Puskesmas', NULL, 4),
(60, 'Antrian RS Pratama', NULL, 4),
(61, 'Corona Monitoring System (CMS)', NULL, 4),
(62, 'Dilan E-IRTP', NULL, 4),
(63, 'Gawat Darurat', NULL, 4),
(64, 'Informasi Covid 19 (Corona Virus)', NULL, 4),
(65, 'Izin Praktik Kesehatan', NULL, 4),
(66, 'Pemantauan Hasil Skrining', NULL, 4),
(67, 'Pendaftaran Vaksinasi', NULL, 4),
(68, 'Posbindu', NULL, 4),
(69, 'Sertifikat Usaha Bidang Kesehatan', NULL, 4),
(70, 'Shelter', NULL, 4),
(71, 'Skrining Corona Pegawai', NULL, 4),
(72, 'Layanan PPID ', NULL, 39),
(73, 'Admin Pengaduan (UPIK) ', NULL, 39),
(76, 'CCTV ', NULL, 39),
(77, 'Eksekutif ', NULL, 39),
(78, 'Email Jogjakarta ', NULL, 39),
(79, 'FAQ JSS ', NULL, 39),
(80, 'FREEHOSPOT PEMKOT YOGYAKARTA ', NULL, 39),
(81, 'Grafik Trend pendaftar JSS ', NULL, 39),
(82, 'Helpdesk Chat ', NULL, 39),
(83, 'Informasu Free Hospot JSS ', NULL, 39),
(84, 'Inventory Barang ', NULL, 39),
(85, 'JSS Chat Asisten ', NULL, 39),
(86, 'JSS Drive ', NULL, 39),
(87, 'Kinerja Pegawai v2 Beta ', NULL, 39),
(88, 'Kliping ', NULL, 39),
(89, 'Kuliah Lagi ', NULL, 39),
(90, 'Kunjungan  ', NULL, 39),
(91, 'Lapor Nikah ', NULL, 39),
(92, 'Laporan Sosialisasi ', NULL, 39),
(93, 'Layanan Aduan', NULL, 39),
(94, 'Live Monitoring Presensi ', NULL, 39),
(95, 'Lokasi WiFi Publik ', NULL, 39),
(96, 'Manajemen Email ', NULL, 39),
(97, 'Manajemen JSS ', NULL, 39),
(98, 'Manajemen portal Jogjakarta ', NULL, 39),
(99, 'Manajemen Ticketing ', NULL, 39),
(100, 'MONALISA ', NULL, 39),
(101, 'Monitoring Uptime Layanan ', NULL, 39),
(102, 'Open Data ', NULL, 39),
(103, 'Pengaduan(IUPK) ', NULL, 39),
(104, 'Pengelola PPID ', NULL, 39),
(105, 'Pengelolaan Kliping ', NULL, 39),
(106, 'Penjadwalan project Sistem Informasi ', NULL, 39),
(107, 'Prasarana ', NULL, 39),
(108, 'Satu profile JSS ', NULL, 39),
(109, 'Sertifikat WiFi ', NULL, 39),
(110, 'SIMVENAA ', NULL, 39),
(111, 'SiRapat ', NULL, 39),
(112, 'Survey Desk SPBE ', NULL, 39),
(113, 'Survey Online ', NULL, 39),
(114, 'Verifikasi Akun JSS ', NULL, 39),
(115, 'Website OPD ', NULL, 39),
(116, 'Whatsapp CS (JESSICA) ', NULL, 39),
(117, 'WIFI SEGOROAMARTO ', NULL, 39),
(118, 'YKTV ', NULL, 39),
(119, 'Permohonan Izin Lingkungan ', NULL, 40),
(120, 'SOP Izin Lingkungan ', NULL, 40),
(121, 'SOP Izin Pengelolaan Limbah B3 ', NULL, 40),
(122, 'Retribusi Kebersihan ', NULL, 40),
(123, 'Pelaporan Perusahaan ', NULL, 40),
(124, 'Permohonan SPPL ', NULL, 40),
(125, 'Pedoman Permohonan Dokumen Lingkungan ', NULL, 40),
(126, 'Pedoman Penggunaan RTHP ', NULL, 40),
(127, 'Pedoman Pemantauan Lingkungan Hidup ', NULL, 40),
(128, 'Bank Sampah ', NULL, 40),
(129, 'Kelola Lingkungan (Silaling) ', NULL, 40),
(130, 'Kualitas Lingkungan Hidup ', NULL, 40),
(131, 'Uji Kualitas Air (e-Labling) ', NULL, 40),
(229, 'SANTER (Satu Atap Terintegrasi)', '1. DUKCAPIL\r\n    • Akta Kelahiran \r\n    • Akta Kematian\r\n    • Akta Perkawinan\r\n    • Akta Perceraian\r\n2. POLRES \r\n    • Surat Kehilangan\r\n3. PTSP \r\n    • DPMPTSP Kota Jogja \r\n    • Sektor Pendidikan \r\n    • Sektor Perhubungan  \r\n    • Sektor Lingkungan Hidup \r\n    • Pertanian dan Pangan \r\n    • Ketenagkerjaan	 \r\n    • Sektor Damkar', 1),
(230, 'TAMU (Layanan Tatap Muka)', '1.Dukcapil \r\n   • Perekaman KTP \r\n2.PolresPajak \r\n    • Laporan Kehilangan \r\n    • Perpanjangan STNK \r\n3.Pajak \r\n   • Pajak Daerah \r\n4.Pemerintah Kota \r\n   • Konsultasi \r\n5.BPJS \r\n    • Jamkesda', 1),
(235, 'Pajak Penerangan Jalan', NULL, 5),
(236, 'Pajak Parkir', NULL, 5),
(237, 'Pajak Air Tanah', NULL, 5),
(238, 'Pajak Sarang Burung Walet', NULL, 5),
(241, 'Akuntabilitas Kinerja ', NULL, 5),
(242, 'BPHTB (Bea Perolehan Hak atas Tanah dan Bangunan)', NULL, 5),
(243, 'E-Retribusi Pasar', NULL, 5),
(244, 'E-SPTPD', NULL, 5),
(245, 'Informasi PBB', NULL, 5),
(246, 'KSWPDP', NULL, 5),
(247, 'Layanan PBB', NULL, 5),
(248, 'Lelang Aset', NULL, 5),
(249, 'Portal Layanan Pajak Daerah', NULL, 5),
(250, 'QRISNA', NULL, 5),
(251, 'SIM Persediaan', NULL, 5),
(252, 'SIPKD', NULL, 5),
(253, 'Waspada', NULL, 5),
(254, 'Anugerah Inovasi dan Penelitian', 'Anugerah Inovasi dan Penelitian meruapan apresiasi hasil inovasi dan penelitian bagi masyarakat umum. Informasi lebih lanjut dapat dilihat melalui aplikasi JSS.', 6),
(255, 'Intivada', 'Intivada merupakan Sistem Informasi Basis Data Inovasi yang  digunakan untuk mengelola data inovasi.', 6),
(256, 'Kajian', 'Kajian merupakan Sistem informasi untuk memfasilitasi Forum LPPM, Forum 		 TSLP, OPD, dan Bappeda dalam pengambilan keputusan berbasis spasial dan 		kajian.', 6),
(257, 'Riset', 'Riset merupakan Jurnal Penelitian dan Pengembangan Kota Yogyakarta.', 6),
(258, 'SIM LKIP', 'SIM LKIP ini menggunakan database yang sama dengan SIM Pelaporan dan SIM Monev sehingga data- datanya sudah terintegrasi.', 6),
(259, 'SIM MONEV', 'SIM MONEV merupakan Aplikasi untuk memonitor dan mengevaluasi pada 		level Program OPD di Pemerintah Kota Yogyakarta.', 6),
(260, 'SIM Pelaporan', 'SIM Pelaporan merupakan aplikasi untuk memonitor dan mengevaluasi kegiatan dan output serta realisasi keuangan yang diambil dari SIPKD', 6),
(261, 'SIM Pelaporan Program Prioritas', 'SIM Pelaporan Program Prioritas merupakan aplikasi yang digunakan untuk  mengelola data pelaporan program prioritas.', 6),
(262, 'SIM Pemberdayaan Masyarakat', 'SIM Pemberdayaan Masyarakat merupakan Sistem Informasi data pemberdayaan masyarakat Kota Yogyakarta.', 6),
(263, 'Ekonomi kreatif', 'Informasi pelaku ekonomi kreatif Kota Yogyakarta', 7),
(264, 'Event wisata', 'Informasi event wisata yang ada di Kota Yogyakarta', 7),
(265, 'Kamelia (Kampung Wisata Melayani Melalui Aplikasi)', 'Mengelola data promosi kampung wisata', 7),
(266, 'Pendaftaran event', 'Data event pariwisata usaha mikro', 7),
(267, 'Assaineering', 'Manajemen data wajib retribusi pengelolaan saluran air limbah, informasi selengkapnya dapat dilihat melalui https://jss.jogjakota.go.id/v5', 8),
(268, 'SIMPENJALU (Sistem Informasi Manajemen Penerangan Jalan UMUM)', 'Layanan pengaduan dan manajemen aset penerangan jalan umum, informasi selengkapnya dapat dilihat melalui https://simpenjalu.jogjakota.go.id/', 8),
(269, 'Waktu Tanggap Damkar', 'Mengelola data pencatatan waktu tanggap (response time) dalam aksi pemadaman kebakaran.', 9),
(270, 'Penyelematan Jiwa', 'Mengelola data penyelamatan jiwa. Layanan bantuan untuk penyelamatan jiwa (HOTLINE: 0274 587101).', 9),
(271, 'Kebakaran', 'Mengelola proses laporan warga terkait kebakaran. Layanan Pemadam Kebakaran (HOTLINE: 0274 587101).', 9),
(272, 'KB (Keluarga Berencana)', 'Informasi selengkapnya dapat dilihat melalui https://kb.jogjakota.go.id/', 10),
(273, 'Layanan PUSPAGA (Layanan Konseling)', 'Untuk HOTLINE dan form pengisian dapat dilihat melalui link berikut ini https://linktr.ee/puspagakenarijogja.', 10),
(274, 'Layanan UPT PPA (Pengelolaan data program perlindungan anak)', 'Untuk HOTLINE dan form registrasi dapat dilihat melalui link berikut ini https://linktr.ee/uptppakotayogyakarta.', 10),
(275, 'Layanan Perizinan', NULL, 11),
(276, 'Layanan Non Perizinan', NULL, 11),
(277, 'Antrian MPP (Mall Pelayanan Publik)', NULL, 11),
(278, 'Denah 3D Pelayanan MPP', NULL, 11),
(279, 'Informasi Layanan MPP', NULL, 11),
(280, 'Layanan Perizinan Sektor Pertanian', NULL, 11),
(281, 'Manajemen Investasi (Cek Poin)', NULL, 11),
(282, 'Pelayanan Adminduk melalui MPP Digital', NULL, 11),
(283, 'Perizinan Sektor Damkar', NULL, 11),
(284, 'Periizinan Sektor Ketenagakerjaan', NULL, 11),
(285, 'Perizinan Sektor Lain', NULL, 11),
(286, 'Perizinan Sektor Lingkungan ', NULL, 11),
(287, 'Perizinan Sektor Pendidikan', NULL, 11),
(288, 'Perizinan Sektor Perhubungan', NULL, 11),
(289, 'Perizinan Sektor Sosial', NULL, 11),
(290, 'Konsultasi Belajar Siswa (KBS)', 'Media Konsultasi Online untuk pembelajaran siswa dengan Tim khusus dari Dinas Pendidikan, Pemuda dan Olahraga Kota Yogyakarta. Untuk informasi lebih lanjut dapat diakses melalui link berikut https://kbs.jogjakota.go.id/.', 12),
(291, 'Monitoring Siswa ', NULL, 12),
(292, 'Bidang Umum Dan Kepegawaian', NULL, 12),
(293, 'Bidang Pendidikan SD', NULL, 12),
(294, 'Bidang Pendidikan SMP', NULL, 12),
(295, 'Bidang Pendidikan Non-Formal (PNF)', NULL, 12),
(296, 'Bidang Pendidik Dan Tenaga Kependidikan (PTK)', NULL, 12),
(297, 'SIM Jaminan Pendidikan Daerah (JPD)', NULL, 12),
(298, 'UPT Unit Layanan Disabilitas Dan Resource Center (ULD)', NULL, 12),
(299, 'Dodolan (Marketplace untuk mengiklankan produk Program Gandeng-Gendong)', NULL, 13),
(300, 'E-Retribusi', NULL, 13),
(301, 'E-Sewa', NULL, 13),
(302, 'Informasi Harga Pangan', NULL, 13),
(303, 'Manage Harga Pangan', NULL, 13),
(304, 'Pasar (Mengelola dan memproses data pasar)', NULL, 13),
(305, 'SIM Pasar (Mengelola data transaksi pasar dan proses pasar)', NULL, 13),
(306, 'Pelayanan Pengelolaan Pasar ', NULL, 13),
(307, 'Pelayanan UTTP (Ukur Takar Timbang dan Perlengkapannya)', NULL, 13),
(308, 'Pelayanan Pembinaan Usaha Perdagangan', NULL, 13),
(309, 'Pelayaanan Pengawasan dan Pengendalian Perdagangan', NULL, 13),
(310, 'Info Antrian KIR', NULL, 14),
(311, 'KIR ONLINE (SI REGOL)', NULL, 14),
(312, 'Pengujian Kendaraan Bermotor', NULL, 14),
(313, 'Pendaftaran BPUM', NULL, 15),
(314, 'Layanan Perpustakaan', NULL, 16),
(315, 'Kearsipan', NULL, 16),
(316, 'Sekretariat ', NULL, 16),
(317, 'Informasi Kesesuain Tata Ruang', NULL, 17),
(318, 'Surat Keterangan Rencana Kota (SKRK)', NULL, 17),
(319, 'Rekomendasi Kesesuaian Tata Ruang', NULL, 17),
(320, 'Rekomendasi Pemanfaatan Tanah Negara', NULL, 17),
(321, 'Rekomendasi Pemanfaatan Tanah Kasultanan dan Tanah Kadipaten', NULL, 17),
(322, 'Izin Perubahan Penggunaan Tanah (IPPT)', NULL, 17),
(323, 'Izin Lokasi', NULL, 17),
(324, 'Informasi Geoportal', NULL, 17),
(325, 'Informasi Pertanahan', NULL, 17),
(326, 'Informasi Tata Ruang', NULL, 17),
(327, 'Peta Data Spasial', NULL, 17),
(328, 'Pelayanan di RPH Giwangan Di Mendungan Umbulharjo', NULL, 18),
(329, 'Pelayanan Hortikultura Kebun Plasma Nutfah Pisang.', NULL, 18),
(330, 'Pelayanan Poliklinik Hewan', NULL, 18),
(331, 'Pelayanan Raiser', NULL, 18),
(332, 'Balai Benih Ikan di Mendungan', NULL, 18),
(333, 'Balai Benih Ikan di Nitikan', NULL, 18),
(334, 'DTKS', NULL, 19),
(335, 'Pelayanan Pencatatan PKWT', NULL, 19),
(336, 'Jobfair', NULL, 19),
(337, 'Kartu Pencari Kerja', NULL, 19),
(338, 'Lowongan Pekerjaan', NULL, 19),
(339, 'Pendaftaran Pelatihan', NULL, 19),
(340, 'Pendataan Pengangguran', NULL, 19),
(341, 'Pendataan UMKM', NULL, 19),
(342, 'Santunan Kematian (Sankem)', NULL, 19),
(343, 'Survey KSJPS', NULL, 19),
(344, 'Tenaga Kerja', NULL, 19),
(345, 'UPT Bisnis', NULL, 19),
(346, 'Validasi data JKN', NULL, 19),
(347, 'E-Yustisi', NULL, 20),
(348, 'Linmas', NULL, 20),
(349, 'Jasa Perseorangan (Testing)', NULL, 22),
(350, 'Nglarisi', NULL, 22),
(351, 'Pengawasan Konsultan', NULL, 22),
(352, 'SIM Tenaga Jasa Lainnya Orang Perorangan (TT)', NULL, 22),
(353, 'Konsultasi Hukum', NULL, 23),
(354, 'Produk Hukum (JDIH)', NULL, 23),
(355, 'PTSP Kemenag', NULL, 23),
(356, 'Regulasi', NULL, 23),
(357, 'Fasilitas Keagaaman', 'Pelaksanaan kegiatan fasilitasi keagamaan di Kota Yogyakarta dikelola oleh Bagian Kesejahteraan Rakyat Setda Kota Yogyakarta, dengan kebijakan sebagai berikut: \r\n\r\n● Fasilitasi Keagamaan diberikan dalam wujud jamuan \r\n (snack dan atau makan). \r\n● Besaran nominal jamuan (snack dan atau makan) menyesuaikan dengan Standar Harga Barang dan Jasa yang berlaku di Pemerintah Kota Yogyakarta. \r\n● Untuk kegiatan yang dilaksanakan oleh kepanitiaan tentatif, kegiatan minimal di tingkat kampung (Eks RK). \r\n● Untuk kegiatan yang dilaksanakan oleh lembaga kemasyarakatan atau keagamaan, minimal peserta 100 (seratus) orang dan/atau berlaku sesuai protokol kesehatan ditempat pelaksanaan serta konsep acara yang diakan dilaksanakan \r\n● Setiap lembaga di tingkat Kota bisa mengajukan fasilitasi paling banyak 3 kali dalam 1 tahun anggaran. \r\n● Setiap lembaga di tingkat kecamatan dan di bawahnya bisa mengajukan fasilitasi paling banyak 2 kali dalam 1 tahun anggaran. \r\n● Dalam hal anggaran masih tersedia, Bagian Kesejahteraan Rakyat Setda Kota Yogyakarta dimungkinkan untuk tetap memberikan fasilitasi kepada lembaga dan atau kepanitiaan yang sudah melebihi batas maksimal permohonan. \r\n●Jamuan yang digunakan untuk pelaksanaan kegiatan keagamaan diusahakan berasal dari kelompok usaha masyarakat Kota Yogyakarta yang telah terdaftar dalam program Gandeng Gendong. \r\nUntuk informasi lebih lengkap mengenai kegiatan Fasilitasi Keagamaan dapat menghubungi Sdr. Hibnu Basuki di nomor Whatsapp +62 815-7870-5939', 24),
(358, 'Permohonaan Informasi Publik', 'Berikut kami sampaikan formulir terkait Permohonan Informasi Publik pada Bagian Kesejahteraan Rakyat Setda Kota Yogyakarta yang dapat diunduh di sini. Untuk informasi lebih lengkap mengenai Permohonan Informasi Publik pada Bagian Kesejahteraan Rakyat Setda Kota Yogyakarta dapat menghubungi Sdr. Anshar Bayu Syafrian di nomor Whatsapp +6285727642462, atau bisa melalui email pada kesra@jogjakota.go.id', 24),
(359, 'Pengaduan Keberatan', 'Berikut kami sampaikan formulir terkait Pengaduan Keberatan Permohonan Informasi Publik pada Bagian Kesejahteraan Rakyat Setda Kota Yogyakarta yang dapat diunduh di sini. Untuk informasi lebih lengkap mengenai Pengaduan Keberatan Permohonan Informasi Publik pada Bagian Kesejahteraan Rakyat Setda Kota Yogyakarta dapat menghubungi Sdr. Anshar Bayu Syafrian di nomor Whatsapp +6285727642462, atau bisa melalui email pada kesra@jogjakota.go.id', 24),
(360, 'SIM Organisasi', 'Sistem Informasi Manajemen Organisasi digunakan untuk mengelola data aplikasi bagian organisasi', 25),
(361, 'SOTK', 'Struktur Organisasi dan Tata Kerja digunakan untuk mengelola data struktur 	organisasi OPD', 25),
(362, 'Layanan Pengadaan Secara Elektronik', NULL, 26),
(363, 'Konsultasi Pengadaan Barang/Jasa', NULL, 26),
(364, 'Pelaksanaan Pengadaan Barang/Jasa', NULL, 26),
(365, 'e-Katalog', NULL, 26),
(366, 'LPSE Kota Yogyakarta', NULL, 26),
(367, 'Toko Daring', NULL, 26),
(368, 'Teman Periksa', NULL, 27),
(369, 'Kerja Sama Daerah', NULL, 27),
(370, 'Pembekalan Perwal Pelimpahan Kewenangan', NULL, 28),
(371, 'Penyusunan Buku Toponimi', NULL, 28),
(372, 'Penyusunan ILPPD', NULL, 28),
(373, 'Penyusunan LKPJ', NULL, 28),
(374, 'Penyusunan LPPD', NULL, 28),
(375, 'Memori Jabatan', NULL, 28),
(376, 'Standar Pelayanan Minimal', NULL, 28),
(377, 'Penyusunan Tindak Lanjut Rekomendasi DPRD atas LKPJ', NULL, 28),
(378, 'PPID', NULL, 28),
(379, 'Bagian Tata Pemerintahan Sekretariat Daerah Kota Yogyakarta', NULL, 28),
(380, 'Evaluasi Kinerja Kemantren', NULL, 28),
(381, 'Penerimaan Surat', NULL, 29),
(382, 'Penerimaan Kunjungan Kerja', NULL, 29),
(383, 'Agenda Rapat', NULL, 29),
(384, 'Penerimaan Tamu', NULL, 29),
(385, 'Pengelola PPID', NULL, 29),
(386, 'JKK (Jaminan Kecelakaan Kerja)', NULL, 30),
(387, 'JKM (Jaminan Kematian)', NULL, 30),
(388, 'Assessmentv2', NULL, 30),
(389, 'Cuti (Beta)', NULL, 30),
(390, 'Diklat', NULL, 30),
(391, 'e-Assesment', NULL, 30),
(392, 'e-kinerja', NULL, 30),
(393, 'e-PKP 360 v2', NULL, 30),
(394, 'e-Polkar (versi Beta)', NULL, 30),
(395, 'JOGJA COPRU', NULL, 30),
(396, 'KMS Kepegawaian', NULL, 30),
(397, 'Manajemen Pendaftaran Seleksi JPT', NULL, 30),
(398, 'Manajemen Presensi', NULL, 30),
(399, 'Pendaftaran Seleksi JPT', NULL, 30),
(400, 'Pola Karier Berbasis Manajemen Talenta', NULL, 30),
(401, 'Presensi Online', NULL, 30),
(402, 'SIM TPP V3', NULL, 30),
(403, 'SIMPEG', NULL, 30),
(404, 'Test Berbasis Computer (CAT)', NULL, 30),
(405, 'Timeline TPP', NULL, 30),
(406, 'TPP V4', NULL, 30),
(407, 'Pendaftaran Omas', NULL, 31),
(408, 'Pendaftaran Surat Keterangan Penelitian', NULL, 31),
(409, 'Izin Kuliah Kerja Nyata', NULL, 31),
(410, 'Layanan Mobil Jenazah', NULL, 32),
(411, 'Pemesanan Mobil Jenazah', NULL, 32),
(412, 'Peta Bencana (Beta)', NULL, 32),
(501, 'Sapa Budaya', 'Informasi lengkap mengenai Sapa Budaya dapat diakses melalui link berikut sapabudaya.jogjakota.go.id', 2),
(502, 'Penerbitan Kartu Keluarga (KK) Baru Karena Membentuk Keluarga Baru', NULL, 3),
(503, 'Penerbitan KK Baru Karena Penggantian kepala Keluarga (Kematian Kepala Keluarga)', NULL, 3),
(504, 'Penerbitan KK Karena Hilang', NULL, 3),
(505, 'Penerbitan KK Karena Perubahan Data', NULL, 3),
(506, 'Penerbitan KTP-el Baru', NULL, 3),
(507, 'Penerbitan KTP-el Baru karena Pindah', NULL, 3),
(508, 'Penerbitan Kartu Indentitas Anak', NULL, 3),
(509, 'Perpindahan Penduduk Keluar Kota Yogyakarta', 'Persyaratan:\r\nMengisi formulir perpindahan penduduk (F1.03)\r\nFoto Dokumen Asli :\r\n - Kartu Keluarga\r\n\r\nCatatan:\r\na. Layanan Melalui Aplikasi WA nomor 0821 3758 9077\r\nb. Bila anggota keluarga yang tidak pindah, tidak memenuhi syarat menjadi kepala keluarga maka ditumpangkan ke kartu keluarga lainnya dengan melampirkan Surat Persyaratan Tidak Keberatan Pengunaan Alamat ditandatanagni pemilik rumah.', 3),
(510, 'Pindah Datang dari Luar Kota Yogyakarta', 'Persyaratan:\r\nMengisi formulir perpindahan penduduk (F1.08)\r\nFoto Dokumen Asli :\r\n - SKPWNI\r\n - Surat Pernyataan Tidak Keberatan Penggunaan Alamat ditandatangani pemilik rumah (bila numpang kk)\r\n\r\nCatatan:\r\na. Layanan Melalui Aplikasi WA nomor 0821 3758 9077\r\nb. Menyerahkan KTP-el darid aerah adal ke Dinas Kependudukan dan Pencatatan Sipil Kota Yogyakarta bagi yang sudah memiliki KTP-el.', 3),
(511, 'Penerbitan Akta Kelahiran', 'Persyaratan\r\nFoto Dokumen Asli\r\n- Surat keterangan kelahiran dari rumah sakit/Puskesmas/fasilitas kesehatan/dokter/bidan atau dari lurah jika lahir di rumah\r\n- Buku nikah/kutipan akta perkawinan\r\n- KK\r\n\r\nCatatan:\r\na. Layanan Melalui Aplikasi Jogja Smart Service (JSS) di menu kependudukan dan catatan sipil.\r\nb. Bila anak tidak diketahui asal usulnya/keberadaan orang tuanya melampirkan : Berita acara dari kepolisian\r\nc. Jika tidak memiliki surat keterangan kelahiran melampirkan SPTJM(Surat pernyataan Tanggung Jawab Mutlak) Kebenaran data kelahiran menggunakan form baku dari Dinas.', 3),
(512, 'Penerbitan Akta Kematian', 'Persyaratan:\r\nFoto Dokumen Asli:\r\n- Surat kematian dari dokter datau lurah\r\n- KK/KTP yang meninggal dunia\r\n\r\nCatatan:\r\na. Layanan Melalui Layanan Aplikasi JSS di menu kependeudukan dan catatan sipil.\r\nBagi kematian seseorang yang tidak jelas indentitasnya melampirkan : surat keterangan kepolisian.\r\nc. Bagi seseorang yang tidak jelas keberadaanya karena hilang atau mati tetapi tidak ditemukan jenazahnya melampirkan: salinan penetpaan pengadilan', 3),
(513, 'Penerbitan Akta Pernikahan', NULL, 3),
(514, 'Pencatatan Perceraian', NULL, 3),
(515, 'Pencatatan Pengangkatan Anak', NULL, 3),
(516, 'Pencatatan Perubahan Status Kewarganegaraan WNA menjadi WNI', NULL, 3),
(517, 'Pencatata Anak yang Lahir Dari Perkawinan Campuran Atau Anak Berkewarganegaraan Ganda (ABG)', NULL, 3),
(518, 'Pajak Pajak', 'BPKAD Kota Yogyakarta memberikan pelayanan kepada masyarakat antara lain dalam melayani Wajib Pajak, yang terdiri dari pajak-pajak berikut dan untuk informasi lebih lengkap dapat diakses melalui https://bpkad.jogjakota.go.id/page/index/daftar-layanan \r\n\r\n1. Pajak Hotel \r\n2. Pajak Restoran \r\n3. Pajak Hiburan \r\n4. Pajak Reklame \r\n5. Pajak Penerangan Jalan \r\n6. Pajak Parkir \r\n7. Pajak Air Tanah \r\n8. Pajak Sarang Burung Walet \r\n9. Pajak Bumi dan Bangunan (PBB-P2) \r\n10. Pajak Bea Perolehan Hak Atas Tanah dan Bangunan Pajak Hotel \r\n11. Pajak Restoran \r\n12. Pajak Hiburan \r\n13. Pajak Reklame \r\n14. Pajak Penerangan Jalan \r\n15. Pajak Parkir \r\n16. Pajak Air Tanah \r\n17. Pajak Sarang Burung Walet \r\n18. Pajak Bumi dan Bangunan (PBB-P2) \r\n19. Pajak Bea Perolehan Hak Atas Tanah dan Bangunan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_fasilitas`
--

CREATE TABLE `list_fasilitas` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `list_fasilitas`
--

INSERT INTO `list_fasilitas` (`id`, `nama_fasilitas`) VALUES
(1, 'ac'),
(2, 'kolam renang'),
(25, 'Cafe'),
(26, 'Restoran'),
(27, 'wifi'),
(28, 'Fitness'),
(29, 'laundry'),
(30, 'meeting room'),
(31, 'lift'),
(32, 'tv'),
(33, 'Parkir'),
(34, 'Shuttle bandara'),
(35, 'Spa'),
(36, 'Kolam renang dalam ruangan'),
(37, 'Garden'),
(38, 'room service'),
(39, 'Pets Allowed'),
(40, 'kitchen'),
(41, 'sarapan'),
(42, 'Kolam renang luar'),
(43, 'Layanan Binatu'),
(44, 'Tours'),
(45, 'Business Center'),
(46, 'Bar'),
(47, 'layanan Pijat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kuliner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `id_kuliner`) VALUES
(66, 'Paket Sahabat Ayam', 13500, 'KLN20242'),
(67, 'Paket Sahabat Telor', 12500, 'KLN20242'),
(68, 'Paket Lele Kremes', 21000, 'KLN20242'),
(69, 'Paket Ayam Sakau', 14500, 'KLN20242'),
(70, 'Paket Sayap Mawut', 14500, 'KLN20242'),
(71, 'Paket Ayam Geprek', 18000, 'KLN20242'),
(72, 'Paket Ceker Mawut', 14500, 'KLN20242'),
(73, 'Pahe Ayam', 20000, 'KLN20242'),
(74, 'Paket Ayam Geprek', 18000, 'KLN20242'),
(75, 'Paket Ayam Bacem', 21000, 'KLN20242'),
(76, 'Paket Ayam Hot', 23000, 'KLN20242'),
(77, 'Paket Ayam HITS', 19000, 'KLN20242'),
(78, 'Paket Ayam Kampung', 30000, 'KLN20242'),
(79, 'Paket Nila', 27000, 'KLN20242'),
(80, 'Paket Ikan Salem', 24000, 'KLN20242'),
(81, 'Paket Ikan Cakalang', 28000, 'KLN20242'),
(82, 'Paket Ikan Bawal', 23000, 'KLN20242'),
(83, 'Nasi Kembul Gurame (2 orang)', 63500, 'KLN20242'),
(84, 'Nasi Kembul Ayam (2 orang)', 50000, 'KLN20242'),
(85, 'Paket Hemat Single', 13000, 'KLN20242'),
(86, 'Paket Hemat Couple', 26500, 'KLN20242'),
(87, 'Pahe Lele', 20000, 'KLN20242'),
(88, 'Roti Bakar', 16000, 'KLN20242'),
(89, 'Banana Roll', 16000, 'KLN20242'),
(90, 'Bakwan Jagung', 7500, 'KLN20242'),
(91, 'Pisang Keju', 16000, 'KLN20242'),
(92, 'French Fries', 16000, 'KLN20242'),
(93, 'Juice Wortel', 11000, 'KLN20242'),
(94, 'Juice Melon', 11000, 'KLN20242'),
(95, 'Juice Belimbing', 11000, 'KLN20242'),
(96, 'Juice Apel', 11000, 'KLN20242'),
(97, 'Juice Pir', 11000, 'KLN20242'),
(98, 'Juice Jambu', 11000, 'KLN20242'),
(99, 'Juice Semangka', 11000, 'KLN20242'),
(100, 'Juice Tomat', 11000, 'KLN20242'),
(101, 'Juice Buah Naga', 11000, 'KLN20242'),
(102, 'Juice Strawberry', 11000, 'KLN20242'),
(103, 'Juice Mix\'s', 13000, 'KLN20242'),
(104, 'Juice Alpukat', 12500, 'KLN20242'),
(105, 'Juice Mangga', 12500, 'KLN20242'),
(106, 'Brongkos Koyor', 19000, 'KLN20243'),
(107, 'Brongkos Telur', 13000, 'KLN20243'),
(108, 'Brongkos Tahu', 6000, 'KLN20243'),
(109, 'Pecel Ikan', 18000, 'KLN20243'),
(110, 'Pecel Telur', 13000, 'KLN20243'),
(111, 'Rendang Daging Sapi', 14500, 'KLN20243'),
(112, 'Kikil', 12000, 'KLN20243'),
(113, 'Lodeh', 6000, 'KLN20243'),
(114, 'Bakso', 12000, 'KLN20243'),
(115, 'Sop Daging Sapi', 22000, 'KLN20243'),
(116, 'Soto Daging Sapi', 16000, 'KLN20243'),
(117, 'Indomie Goreng/Nyemek/Rebus', 12000, 'KLN20243'),
(118, 'Sambal Ikan Tuna/Bandeng', 13000, 'KLN20243'),
(119, 'Oseng Oseng Sayur', 6000, 'KLN20243'),
(120, 'Sop Iga', 42000, 'KLN20243'),
(121, 'Brongkos Daging', 20000, 'KLN20243'),
(122, 'Pecel', 8000, 'KLN20243'),
(123, 'Sop Buntut', 42000, 'KLN20243'),
(124, 'Opor Gending', 24000, 'KLN20243'),
(125, 'Opor Dada', 24000, 'KLN20243'),
(126, 'Opor Ati', 12000, 'KLN20243'),
(127, 'Opor Paha', 18000, 'KLN20243'),
(128, 'Opor Telur', 12000, 'KLN20243'),
(129, 'Opor Kepala Ayam', 17000, 'KLN20243'),
(130, 'Ikan Bandeng/Tuna Goreng', 12000, 'KLN20243'),
(131, 'Ikan Lele', 10000, 'KLN20243'),
(132, 'Sayur Bobor', 6000, 'KLN20243'),
(133, 'Sayur Asem Asem', 8000, 'KLN20243'),
(134, 'Jus Alpukat', 14500, 'KLN20243'),
(135, 'Jus Buah Naga', 12000, 'KLN20243'),
(136, 'Jus Sirsak', 10000, 'KLN20243'),
(137, 'Jus Jeruk', 10000, 'KLN20243'),
(138, 'Jus Wortel', 10000, 'KLN20243'),
(139, 'Jus Mangga', 12000, 'KLN20243'),
(140, 'Jus Jambu', 10000, 'KLN20243'),
(141, 'Jeruk Panas', 5000, 'KLN20243'),
(142, 'Jus Tomat', 8000, 'KLN20243'),
(143, 'Teh Panas', 4000, 'KLN20243'),
(144, 'Es Teh', 4000, 'KLN20243'),
(145, 'Es Jeruk', 5000, 'KLN20243'),
(146, 'Sere Jahe Nipis Panas', 9000, 'KLN20243'),
(147, 'Jahe Geprek Panas', 7000, 'KLN20243'),
(148, 'Mihun Goreng/ Mie Kuning Goreng', 6000, 'KLN20243'),
(149, 'Sayur Asem', 6000, 'KLN20243'),
(150, 'Apel', 8500, 'KLN20244'),
(151, 'Buah Naga', 8500, 'KLN20244'),
(152, 'Jambu', 8500, 'KLN20244'),
(153, 'Pear', 8500, 'KLN20244'),
(154, 'Pepaya', 8500, 'KLN20244'),
(155, 'Sirsak', 8500, 'KLN20244'),
(156, 'Semangka', 8500, 'KLN20244'),
(157, 'Tomat', 8500, 'KLN20244'),
(158, 'Wortel', 8500, 'KLN20244'),
(159, 'Alpukat', 8500, 'KLN20244'),
(160, 'Melon', 8500, 'KLN20244'),
(161, 'Mangga', 8500, 'KLN20244'),
(162, 'Nanas', 8500, 'KLN20244'),
(163, 'Strawbery', 8500, 'KLN20244'),
(164, 'Orange', 8500, 'KLN20244'),
(165, 'Salad Buah 200ml', 10000, 'KLN20244'),
(166, 'Salad Buah 500ml', 20000, 'KLN20244'),
(167, 'Mie Geprek Keju', 16000, 'KLN20244'),
(168, 'Nasi Ayam Geprek Keju', 14000, 'KLN20244'),
(169, 'Nasi Ayam Geprek', 13000, 'KLN20244'),
(170, 'Mie Geprek', 15000, 'KLN20244'),
(171, 'Nasi Ayam Crispy', 13000, 'KLN20244'),
(172, 'Nasi Ayam Pedas Manis', 16000, 'KLN20244'),
(173, 'Greentea Latte', 12500, 'KLN20245'),
(174, 'Redvelvet Latte', 12500, 'KLN20245'),
(175, 'Bubble Brown Sugar', 12500, 'KLN20245'),
(176, 'Taiwan Milktea', 12500, 'KLN20245'),
(177, 'Taiwan Strawberry Milktea', 12500, 'KLN20245'),
(178, 'Cheese Milktea', 12500, 'KLN20245'),
(179, 'Thai Tea Original', 12500, 'KLN20245'),
(180, 'Thai Greentea', 12500, 'KLN20245'),
(181, 'Iced Coffee', 14500, 'KLN20245'),
(182, 'Blacktea Macchiato', 9000, 'KLN20245'),
(183, 'Bubble', 2000, 'KLN20245'),
(184, 'Macchiato', 2000, 'KLN20245'),
(185, 'Jus Alpukat', 15000, 'KLN20246'),
(186, 'Jus Sirsak', 14000, 'KLN20246'),
(187, 'Jus Durian Medan', 18000, 'KLN20246'),
(188, 'Jus Apple', 13000, 'KLN20246'),
(189, 'Jus Kiwi', 14000, 'KLN20246'),
(190, 'Jus Naga Merah', 13000, 'KLN20246'),
(191, 'Jus Sunkist', 15000, 'KLN20246'),
(192, 'Jus Jambu', 11000, 'KLN20246'),
(193, 'Jus Melon', 11000, 'KLN20246'),
(194, 'Jus Terong Belanda', 11000, 'KLN20246'),
(195, 'Jus Belimbing', 11000, 'KLN20246'),
(196, 'Jus Wortel', 13000, 'KLN20246'),
(197, 'Jus Jeruk Peras', 11000, 'KLN20246'),
(198, 'Jus Strawbery', 12000, 'KLN20246'),
(199, 'Jus Tomat', 11000, 'KLN20246'),
(200, 'Jus Pisang', 11000, 'KLN20246'),
(201, 'Jus Nanas', 11000, 'KLN20246'),
(202, 'Jus Lemon', 16000, 'KLN20246'),
(203, 'Juice Kedondong', 14000, 'KLN20246'),
(204, 'Jus Mangga', 15000, 'KLN20246'),
(205, 'Jus Strawbery + Pisang', 18000, 'KLN20246'),
(206, 'Jus Apple + Strawbery', 18000, 'KLN20246'),
(207, 'Mangga + Naga + Strawbery', 20000, 'KLN20246'),
(208, 'Soup Buah Durian', 25000, 'KLN20246'),
(209, 'Sop Buah Kaldu Alpukat', 20000, 'KLN20246'),
(210, 'Soup Buah Sirsak', 20000, 'KLN20246'),
(211, 'Sop Buah Kaldu Jambu', 20000, 'KLN20246'),
(212, 'Sop Buah Kaldu Melon', 20000, 'KLN20246'),
(213, 'Sop Buah Kaldu Original', 16000, 'KLN20246'),
(214, 'Sop Buah Kaldu Naga', 20000, 'KLN20246'),
(215, 'Sop Buah Kaldu Nanas', 20000, 'KLN20246'),
(216, 'Sop Buah Kaldu Strawbery', 20000, 'KLN20246'),
(217, 'Sop Buah Rasa Terong', 20000, 'KLN20246'),
(218, 'Sop Buah Kaldu Apple', 20000, 'KLN20246'),
(219, 'Sop Buah Rasa Jeruk Peras', 20000, 'KLN20246'),
(220, 'Sop Buah Kaldu Mangga', 20000, 'KLN20246'),
(221, 'Rujak Turkey', 25000, 'KLN20246'),
(222, 'Puding Tiramisu Regal Coklat', 110000, 'KLN20247'),
(223, 'Puding Milo Oreo Coklat', 80000, 'KLN20247'),
(224, 'Puding Kaca', 150000, 'KLN20247'),
(225, 'Puding Gula Merah', 80000, 'KLN20247'),
(226, 'Puding Mangga Box', 70000, 'KLN20247'),
(227, 'Puding Fruity Leci', 145000, 'KLN20247'),
(228, 'Puding Hias Regal Tiramisu Coklat', 200000, 'KLN20247'),
(229, 'Puding Hias Milo Topping Coklat', 200000, 'KLN20247'),
(230, 'Puding Rainbow', 165000, 'KLN20247'),
(231, 'Puding Hias Lumut Gula Merah Coklat', 200000, 'KLN20247'),
(232, 'Puding Hias Kaca', 135000, 'KLN20247'),
(233, 'Puding Tiramisu Fruity', 175000, 'KLN20247'),
(234, 'Salad Hias 1.000ml', 125000, 'KLN20247'),
(235, 'Puding Buah', 55000, 'KLN20247'),
(236, 'Puding Buah Cup', 20000, 'KLN20247'),
(237, 'Puding Buah Large', 90000, 'KLN20247'),
(238, 'Puding Milo Fruity', 220000, 'KLN20247'),
(239, 'Puding Hias Milo Oreo Coklat', 175000, 'KLN20247'),
(240, 'Puding Tiramisu', 70000, 'KLN20247'),
(241, 'Puding Tiramisu Regal', 90000, 'KLN20247'),
(242, 'Puding Oreo Milo', 55000, 'KLN20247'),
(243, 'Puding Regal Tiramisu', 60000, 'KLN20247'),
(244, 'Puding Cappucino Cincau', 135000, 'KLN20247'),
(245, 'Puding Lumut Gula Merah Coklat', 145000, 'KLN20247'),
(246, 'Dressing Salad', 50000, 'KLN20247'),
(247, 'Lotek + Ketupat', 22500, 'KLN20248'),
(248, 'Lotek + Ketupat + Telur Utuh', 29500, 'KLN20248'),
(249, 'Gado-Gado + Ketupat + (Telur 1/2)', 25000, 'KLN20248'),
(250, 'Gado-Gado + Ketupat + Telur Utuh', 29500, 'KLN20248'),
(251, 'Lotek Tanpa Ketupat', 21500, 'KLN20248'),
(252, 'Lotek Tanpa Ketupat + Telur Utuh', 26500, 'KLN20248'),
(253, 'Gado-Gado Tanpa Ketupat (Telur 1/2)', 24000, 'KLN20248'),
(254, 'Gado-Gado Tanpa Ketupat + Telur Utuh', 26500, 'KLN20248'),
(255, 'Extra Saus Kacang', 0, 'KLN20248'),
(256, 'Bumbu Kacang Untuk Gado-Gado', 10000, 'KLN20248'),
(257, 'Extra Kerupuk', 4000, 'KLN20248'),
(258, 'Bakwan / Tempe / Tahu', 2000, 'KLN20248'),
(259, 'Ketupat', 5000, 'KLN20248'),
(260, 'Extra Cabai', 3000, 'KLN20248'),
(261, 'Telur Rebus Utuh', 5000, 'KLN20248'),
(262, 'Teh Panas / Dingin', 4000, 'KLN20248'),
(263, 'Jeruk Panas / Dingin', 6000, 'KLN20248'),
(264, 'Tape Ketan Hijau (Es/panas)', 7500, 'KLN20248'),
(265, 'Milo (Es/panas)', 7500, 'KLN20248'),
(266, 'Coffeemix (Es / Panas)', 7500, 'KLN20248'),
(267, 'Kopi Hitam (Es/panas)', 6500, 'KLN20248'),
(268, 'Nutrisari ( Panas / Es )', 7500, 'KLN20248'),
(269, 'Lemon Te', 8750, 'KLN20248'),
(279, 'Americano (Hot/Ice)', 12000, 'KLN20249'),
(280, 'Caffe Latte (Hot/Ice)', 15500, 'KLN20249'),
(281, 'Cappuccino (Hot/Ice)', 15500, 'KLN20249'),
(282, 'Ice Sparkling Coffee', 19500, 'KLN20249'),
(283, 'Kopi Susu Amaryll (Hot/Ice)', 19500, 'KLN20249'),
(284, 'Kopi Susu Gula Aren (Hot/Ice)', 19500, 'KLN20249'),
(285, 'Kopi Susu Karamel (Hot/Ice)', 19500, 'KLN20249'),
(286, 'Kopi Susu Pisang (Hot/Ice)', 19500, 'KLN20249'),
(287, 'Kopi Susu Hazelnut (Hot/Ice)', 19500, 'KLN20249'),
(324, 'Nasi Udang Goreng', 17000, 'KLN202410'),
(325, 'Nasi Ayam Goreng', 18000, 'KLN202410'),
(326, 'Nasi Gembung Goreng', 17000, 'KLN202410'),
(327, 'Nasi Bandeng Goreng', 18000, 'KLN202410'),
(328, 'Nasi Telur Dadar', 15000, 'KLN202410'),
(329, 'Nasi Tongkol Goreng', 18000, 'KLN202410'),
(330, 'Nasi Bandeng Pedas', 19000, 'KLN202410'),
(331, 'Nasi Gembung Pedas', 19000, 'KLN202410'),
(332, 'Nasi Nila Pedas', 19000, 'KLN202410'),
(333, 'Nasi Ati', 18000, 'KLN202410'),
(334, 'Nasi Ayam Balado', 20000, 'KLN202410'),
(335, 'Nasi Lele Balado', 19000, 'KLN202410'),
(336, 'Nasi Lele Goreng', 18000, 'KLN202410'),
(337, 'Nasi Rendang', 20000, 'KLN202410'),
(338, 'Nasi Nila Goreng', 18000, 'KLN202410'),
(339, 'Nasi Kikil', 20000, 'KLN202410'),
(340, 'Nasi Limpa', 20000, 'KLN202410'),
(341, 'Nasi Paru', 20000, 'KLN202410'),
(342, 'Nasi Babat', 20000, 'KLN202410'),
(343, 'Nasi Iso', 20000, 'KLN202410'),
(344, 'Udang Goreng', 16000, 'KLN202410'),
(345, 'Lele Goreng', 16000, 'KLN202410'),
(346, 'Ayam Goreng', 16000, 'KLN202410'),
(347, 'Nila Goreng', 16000, 'KLN202410'),
(348, 'Nasi Telur Balado', 15000, 'KLN202410'),
(349, 'Nasi Tongkol Balado', 17000, 'KLN202410'),
(350, 'Nasi Tongkol Basah', 19000, 'KLN202410'),
(351, 'Nasi Kepala Tongkol Basah', 20000, 'KLN202410'),
(352, 'Nasi Lele Bakar', 19000, 'KLN202410'),
(353, 'Nasi Ayam Bakar', 20000, 'KLN202410'),
(354, 'Nasi Gembung Bakar', 19000, 'KLN202410'),
(355, 'Es Lemontea', 4000, 'KLN202410'),
(356, 'Es Teh', 3500, 'KLN202410'),
(357, 'Es Jeruk', 3500, 'KLN202410'),
(358, 'Aie Es', 1000, 'KLN202410'),
(359, 'Kopi Hitam', 4500, 'KLN202410'),
(360, 'Nasi Goreng Special', 18000, 'KLN202411'),
(361, 'Nasi Goreng Ayam', 15000, 'KLN202411'),
(362, 'Mie Goreng', 15000, 'KLN202411'),
(363, 'Mie Godog', 15000, 'KLN202411'),
(364, 'Kwetiauw Godog', 15000, 'KLN202411'),
(365, 'Kwetiauw Goreng', 15000, 'KLN202411'),
(366, 'Cap Cay Goreng', 17000, 'KLN202411'),
(367, 'Cap Cay Godog', 17000, 'KLN202411'),
(368, 'Pangsit Goreng', 17000, 'KLN202411'),
(369, 'Teh Hangat', 3000, 'KLN202411'),
(370, 'Es Teh', 4000, 'KLN202411'),
(371, 'Jeruk Hangat', 4000, 'KLN202411'),
(372, 'Es Jeruk', 5000, 'KLN202411'),
(373, 'Extra Telur', 3000, 'KLN202411'),
(374, 'Nasi Putih', 3000, 'KLN202411'),
(375, 'Nasi + Nila Goreng + Lalapan Sambal', 18000, 'KLN202412'),
(376, 'Nasi + Ati Ampela Goreng + Lalapan Sambal', 11000, 'KLN202412'),
(377, 'Nasi + Ayam Goreng + Lalapan Sambal', 12500, 'KLN202412'),
(378, 'Nasi + Nila Goreng + Lalapan Sambal', 18000, 'KLN202412'),
(379, 'Nasi + Ati Ampela Goreng + Lalapan Sambal', 11000, 'KLN202412'),
(380, 'Nasi + Ayam Goreng + Lalapan Sambal', 12500, 'KLN202412'),
(381, 'Burjo Ketan Hitam', 9000, 'KLN202413'),
(382, 'Indomie Rebus Tanpa Telor', 9000, 'KLN202413'),
(383, 'Bakmi Goreng Barbarossa', 18000, 'KLN202413'),
(384, 'Nasi Ayam Goreng', 16000, 'KLN202413'),
(385, 'Nasi Telor Dadar', 12000, 'KLN202413'),
(386, 'Nasi Ayam Geprek', 16000, 'KLN202413'),
(387, 'Bakmie Godhog Barbarossa', 18000, 'KLN202413'),
(388, 'Nasi Telor Orak Arik', 12000, 'KLN202413'),
(389, 'Es Burjo Ketan Hitam', 9000, 'KLN202413'),
(390, 'Indomie Rebus Telor', 12000, 'KLN202413'),
(391, 'Bihun Goreng Barbarossa', 18000, 'KLN202413'),
(392, 'Nasi Sarden', 12000, 'KLN202413'),
(393, 'Indomie Goreng Tanpa Telor', 9000, 'KLN202413'),
(394, 'Nasi Ayam Goreng Kentucky', 16000, 'KLN202413'),
(395, 'Bibun Godhog Barbarossa', 18000, 'KLN202413'),
(396, 'Indomie Goreng Telor', 12000, 'KLN202413'),
(397, 'Mie Dok Dok Indomie', 13000, 'KLN202413'),
(398, 'Magelangan Indomie', 16000, 'KLN202413'),
(399, 'Omlet Indomie', 12000, 'KLN202413'),
(400, 'Es Jeruk / Panas', 4000, 'KLN202413'),
(401, 'Es Teh / Panas', 4000, 'KLN202413'),
(402, 'Es Good Day Aneka Rasa', 4000, 'KLN202413'),
(403, 'Kopi Hitam ( Kapal Api ) Gelas Kecil', 3000, 'KLN202413'),
(404, 'Lontong Tahu', 17000, 'KLN202414'),
(405, 'Lontong Tahu Telur', 20000, 'KLN202414'),
(406, 'Nasi Soto Daging Sapi', 12000, 'KLN202414'),
(407, 'Teh Panas / Es', 4000, 'KLN202414'),
(408, 'Jeruk Panas / Es', 4500, 'KLN202414'),
(409, 'Es Dawet', 6000, 'KLN202414'),
(410, 'Es Kelapa Muda', 4500, 'KLN202414'),
(411, 'Jus Sirsak', 7000, 'KLN202414'),
(412, 'Jus Jambu', 6000, 'KLN202414'),
(413, 'Minuman Herbal JeckSer', 12000, 'KLN202415'),
(414, 'Saparella', 18000, 'KLN202415'),
(415, 'Nasi Goreng', 13000, 'KLN202415'),
(416, 'Nasi Goreng + Telur', 16000, 'KLN202415'),
(417, 'Nasi Orak Arik', 13000, 'KLN202415'),
(418, 'Nasi Orak Arik + Telur', 16000, 'KLN202415'),
(419, 'Mendoan 1 Porsi Isi 3', 4500, 'KLN202415'),
(420, 'Tempe Garit Bungkus Daun', 5000, 'KLN202415'),
(421, 'Mie Asin Ayam Katsu Level 0', 22500, 'KLN202416'),
(422, 'Mie Asin Ayam Katsu Level 1', 22500, 'KLN202416'),
(423, 'Mie Asin Ayam Katsu Level 2', 23750, 'KLN202416'),
(424, 'Mie Asin Ayam Katsu Level 3', 23750, 'KLN202416'),
(425, 'Mie Asin Ayam Katsu Level 4', 25000, 'KLN202416'),
(426, 'Mie Asin Ayam Katsu Level 5', 25000, 'KLN202416'),
(427, 'Mie Manis Ayam Katsu Level 0', 22500, 'KLN202416'),
(428, 'Mie Manis Ayam Katsu Level 1', 22500, 'KLN202416'),
(429, 'Mie Manis Ayam Katsu Level 2', 23750, 'KLN202416'),
(430, 'Mie Manis Ayam Katsu Level 3', 23750, 'KLN202416'),
(431, 'Mie Manis Ayam Katsu Level 4', 25000, 'KLN202416'),
(432, 'Mie Manis Ayam Katsu Level 5', 25000, 'KLN202416'),
(433, 'Mie Asin Cakalang Asap Level 0', 22500, 'KLN202416'),
(434, 'Mie Asin Cakalang Asap Level 1', 22500, 'KLN202416'),
(435, 'Mie Asin Cakalang Asap Level 2', 23750, 'KLN202416'),
(436, 'Mie Asin Cakalang Asap Level 3', 23750, 'KLN202416'),
(437, 'Mie Asin Cakalang Asap Level 4', 25000, 'KLN202416'),
(438, 'Mie Asin Cakalang Asap Level 5', 25000, 'KLN202416'),
(439, 'Mie Manis Cakalang Asap Level 0', 22500, 'KLN202416'),
(440, 'Mie Manis Cakalang Asap Level 1', 22500, 'KLN202416'),
(441, 'Mie Manis Cakalang Asap Level 2', 23750, 'KLN202416'),
(442, 'Mie Manis Cakalang Asap Level 3', 23750, 'KLN202416'),
(443, 'Mie Manis Cakalang Asap Level 4', 25000, 'KLN202416'),
(444, 'Mie Manis Cakalang Asap Level 5', 25000, 'KLN202416'),
(445, 'Rice Bowl Chicken Karrage Saus Madu', 25000, 'KLN202416'),
(446, 'Rice Bowl Krengsengan Daging Sapi', 31250, 'KLN202416'),
(447, 'Rice Bowl Rica Ayam', 25000, 'KLN202416'),
(448, 'Rice Bowl Chicken Katsu', 25000, 'KLN202416'),
(449, 'Nasi Sate Goreng Ayam Bumbu Laos', 31250, 'KLN202416'),
(450, 'Sate Goreng Ayam Bumbu Laos', 25000, 'KLN202416'),
(451, 'Sambal Spesial Baby Cumi', 35000, 'KLN202416'),
(452, 'Sambal Spesial Cakalang Asap', 28750, 'KLN202416'),
(453, 'Sambal Spesial Ikan Roa', 35000, 'KLN202416'),
(454, 'Sambal Spesial Tuna Asap', 28750, 'KLN202416'),
(455, 'Martabak Biasa Kosongan', 20000, 'KLN202417'),
(456, 'Martabak Biasa Kacang', 22000, 'KLN202417'),
(457, 'Martabak Biasa Cokelat', 23000, 'KLN202417'),
(458, 'Martabak Biasa Cokelat Kacang', 25000, 'KLN202417'),
(459, 'Martabak Biasa Cokelat Keju', 26000, 'KLN202417'),
(460, 'Martabak Biasa Cokelat Kacang Keju', 35000, 'KLN202417'),
(461, 'Martabak Biasa Keju', 27000, 'KLN202417'),
(462, 'Martabak Biasa Keju Kacang', 30000, 'KLN202417'),
(463, 'Martabak Pandan Kosongan', 23000, 'KLN202417'),
(464, 'Martabak Pandan Kacang', 25000, 'KLN202417'),
(465, 'Martabak Pandan Cokelat', 26000, 'KLN202417'),
(466, 'Martabak Pandan Cokelat Kacang', 28000, 'KLN202417'),
(467, 'Martabak Pandan Cokelat Keju', 29000, 'KLN202417'),
(468, 'Martabak Pandan Cokelat Kacang Keju', 38000, 'KLN202417'),
(469, 'Martabak Pandan Keju', 30000, 'KLN202417'),
(470, 'Martabak Pandan Keju Kacang', 33000, 'KLN202417'),
(471, 'Martabak Red Velvet Kosongan', 23000, 'KLN202417'),
(472, 'Martabak Red Velvet Kacang', 25000, 'KLN202417'),
(473, 'Martabak Red Velvet Cokelat', 26000, 'KLN202417'),
(474, 'Martabak Red Velvet Cokelat Kacang', 28000, 'KLN202417'),
(475, 'Martabak Red Velvet Cokelat Keju', 29000, 'KLN202417'),
(476, 'Martabak Red Velvet Cokelat Kacang Keju', 38000, 'KLN202417'),
(477, 'Martabak Red Velvet Keju', 30000, 'KLN202417'),
(478, 'Martabak Red Velvet Keju Kacang', 33000, 'KLN202417'),
(479, 'Aqua 600ml', 4500, 'KLN202417'),
(480, 'Teh', 4000, 'KLN202417'),
(481, 'Jeruk', 5000, 'KLN202417'),
(482, 'Kopi', 5000, 'KLN202417'),
(483, 'Milo', 6000, 'KLN202417'),
(484, 'Lemon Tea', 6000, 'KLN202417'),
(485, 'Susu', 6000, 'KLN202417'),
(486, 'Cappuccino', 7000, 'KLN202417'),
(487, 'Teh Tarik', 7000, 'KLN202417'),
(488, 'Choco Basic', 9000, 'KLN202418'),
(489, 'Choco Oreo', 11000, 'KLN202418'),
(490, 'Choco Creamy', 10000, 'KLN202418'),
(491, 'Latte Basic', 9000, 'KLN202418'),
(492, 'Latte Oreo', 11000, 'KLN202418'),
(493, 'Latte Creamy', 11000, 'KLN202418'),
(494, 'Vanilla Creamy', 10000, 'KLN202418'),
(495, 'Vanilla Oreo', 12000, 'KLN202418'),
(496, 'Chocoa', 11000, 'KLN202418'),
(497, 'Mocca Basic', 9000, 'KLN202418'),
(498, 'Mocca Oreo', 11000, 'KLN202418'),
(499, 'Mocca Creamy', 10000, 'KLN202418'),
(500, 'CHOCO MEDIUM', 10000, 'KLN202418'),
(501, 'CHOCO OREO MEDIUM', 13000, 'KLN202418'),
(502, 'CHOCO CREAMY MEDIUM', 12000, 'KLN202418'),
(503, 'LATTE BASIC MEDIUM', 10000, 'KLN202418'),
(504, 'LATTE OREO MEDIUM', 13000, 'KLN202418'),
(505, 'LATTE CREAMY MEDIUM', 12000, 'KLN202418'),
(506, 'MOCCA BASIC MEDIUM', 10000, 'KLN202418'),
(507, 'MOCCA OREO MEDIUM', 13000, 'KLN202418'),
(508, 'MOCCA CREAMY MEDIUM', 12000, 'KLN202418'),
(509, 'CHOCOA MEDIUM', 13000, 'KLN202418'),
(510, 'VANILLA CREAMY MEDIUM', 12000, 'KLN202418'),
(511, 'VANILLA OREO MEDIUM', 13000, 'KLN202418'),
(512, 'Teh Panas / Es', 4000, 'KLN202419'),
(513, 'Jeruk Panas / Es', 5000, 'KLN202419'),
(514, 'Jeruk Nipis Panas / Es', 6000, 'KLN202419'),
(515, 'Wedang Jahe', 7000, 'KLN202419'),
(516, 'Wedang Jahe Sere', 8000, 'KLN202419'),
(517, 'Wedang Jeruk Nipis Jahe Sere', 9000, 'KLN202419'),
(518, 'Wedang Uwuh', 6000, 'KLN202419'),
(519, 'Wedang Uwuh Sere', 8000, 'KLN202419'),
(520, 'Bakmi Goreng', 18000, 'KLN202419'),
(521, 'Bakmi Godhog', 18000, 'KLN202419'),
(522, 'Nasi Goreng', 18000, 'KLN202419'),
(523, 'Magelangan', 18000, 'KLN202419'),
(524, 'Capcay Goreng', 18000, 'KLN202419'),
(525, 'Capcay Rebus', 18000, 'KLN202419'),
(526, 'Topping Telor Dadar/Ceplok', 5000, 'KLN202419'),
(527, 'Nasi Godhog', 18000, 'KLN202419'),
(528, 'Capcay Mie Goreng', 19000, 'KLN202419'),
(529, 'Capcay Mie Godhog', 19000, 'KLN202419'),
(530, 'Rica-rica Balungan', 21000, 'KLN202419'),
(531, 'Rica-rica Ayam Kampung', 28000, 'KLN202419'),
(532, 'Topping Kepala', 9000, 'KLN202419'),
(533, 'Topping Brutu', 9000, 'KLN202419'),
(534, 'Topping Sayap', 10000, 'KLN202419'),
(535, 'Rujak Pedas', 11000, 'KLN202420'),
(536, 'Buah Rujak Lengkap', 11000, 'KLN202420'),
(537, 'Rujak Manis', 11000, 'KLN202420'),
(553, 'kuli', 2000, 'KLN202421'),
(554, 'sanco', 15000, 'KLN202421');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penginapan`
--

CREATE TABLE `penginapan` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` bigint(20) NOT NULL,
  `harga_terendah` bigint(100) NOT NULL,
  `harga_tertinggi` bigint(100) NOT NULL,
  `jarak` float NOT NULL,
  `gambar` text DEFAULT NULL,
  `jenis` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penginapan`
--

INSERT INTO `penginapan` (`id`, `nama`, `alamat`, `telp`, `harga_terendah`, `harga_tertinggi`, `jarak`, `gambar`, `jenis`) VALUES
('PH20241', 'Gaia Cosmo Hotel', 'Jl. Ipda Tut Harsono No.16, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta 55165', 2745307777, 800000, 2500000, 0.4, 'file_gambar/penginapan/gambar_penginapan_gaia_cosmo.jpg', 'htl'),
('PH202410', 'RedDoorz near Kampus 3 UTY Yogyakarta', 'Jl. Prof. DR. Soepomo Sh No.14, Warungboto, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55165', 2180629666, 200000, 350000, 0.6, 'file_gambar/penginapan/gambar_penginapan_11. RedDoorz near Kampus 3 UTY.jpg', 'oyo'),
('PH202411', 'Urbanview Hotel Syariah Wisnugraha', 'Jl. Kusumanegara No.114, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55165', 88806002545, 250000, 600000, 0.35, 'file_gambar/penginapan/gambar_penginapan_12. Urbanview Hotel Syariah Wisnugraha.jpg', 'htl'),
('PH202412', 'Collection O 1061 Aliya Homestay', 'Jl. Jagung No.21, Semaki, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55166', 816688800, 200000, 500000, 1, 'file_gambar/penginapan/gambar_penginapan_13. Collection O 1061 Aliya Homestay.jpg', 'htl'),
('PH202413', 'Collection O 2627 Ratamya Co-living', '58, Jl. Timoho II No.58, Semaki, Kec. Umbulharjo, Daerah Istimewa Yogyakarta 55166', 2129707601, 150000, 400000, 1.1, 'file_gambar/penginapan/gambar_penginapan_collection.png', 'htl'),
('PH202414', 'Prima In Hotel Maliboro', 'Jl. Gandekan Lor No.47, Pringgokusuman, Gedong Tengen, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55272', 2744469777, 350000, 800000, 4.7, 'file_gambar/penginapan/gambar_penginapan_15. Prima In Hotel.jpg', 'htl'),
('PH202415', 'Burza Hotel Yogyakarta', 'Jl. Jogokaryan No.61-63, Mantrijeron, Kec. Mantrijeron, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55143', 2744580130, 300000, 800000, 5.5, 'file_gambar/penginapan/gambar_penginapan_16. Burza Hotel.jpg', 'htl'),
('PH202416', 'Zest Hotel Yogyakarta', 'Jl. Gajah Mada No.28, Purwokinanti, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55112', 2746429119, 300000, 600000, 2.7, 'file_gambar/penginapan/gambar_penginapan_17. Zest Hotel.jpg', 'htl'),
('PH202417', 'H Boutique Hotel Jogjakarta', 'Jl. Prof. Herman Yohanes No.1, Terban, Kec. Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223', 2746429742, 300000, 600000, 3.6, 'file_gambar/penginapan/gambar_penginapan_18. H Boutique Hotel.jpg', 'htl'),
('PH202418', 'Laxston Hotel', 'No.139 A, Jl. Urip Sumoharjo, Klitren, Gondokusuman, Yogyakarta City, Special Region of Yogyakarta 55222', 274552552, 250000, 800000, 5.7, 'file_gambar/penginapan/gambar_penginapan_19. Laxston Hotel.jpg', 'htl'),
('PH202419', 'Paku Mas Hotel', 'Jl. Nogopuro No.35, Ambarukmo, Caturtunggal, Kec. Depok, Yogyakarta, Daerah Istimewa Yogyakarta 55281', 274489089, 250000, 500000, 3.1, 'file_gambar/penginapan/gambar_penginapan_20. Paku Mas Hotel.jpg', 'htl'),
('PH20242', 'POP! Hotel Timoho', 'Jl. Ipda Tut Harsono No.11, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta 55165', 2742924646, 350000, 600000, 0.45, 'file_gambar/penginapan/gambar_penginapan_2. POP! Hotel Timoho.jpg', 'htl'),
('PH202420', 'Puri Pangeran Hotel', 'Jl. Masjid No.7, Purwokinanti, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55112', 274562445, 250000, 400000, 2.2, 'file_gambar/penginapan/gambar_penginapan_21. Puri Pangeran Hotel.jpg', 'htl'),
('PH202421', 'RedDoorz Plus @Timoho', 'Jalan Ipda Tut Harsono No. 3A Timoho, Umbulharjo Yogyakarta, Kota Baru, Yogyakarta, 55221', 87687654321, 100000, 250000, 1.4, 'file_gambar/penginapan/gambar_penginapan_8. RedDoorz Puls @Timoho.jpg', 'oyo'),
('PH202422', 'Yellow Star Ambarukmo Hotel', 'Jl. Laksda Adisucipto No.23, Papringan, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 2742800719, 300000, 600000, 3, 'file_gambar/penginapan/gambar_penginapan_22. Yellow Star Ambarukmo Hotel.jpg', 'htl'),
('PH202423', 'KHAS Tugu Hotel Yogyakarta', 'Jl. Pangeran Diponegoro No.99, Bumijo, Kec. Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55231', 2742922939, 350000, 800000, 5.1, 'file_gambar/penginapan/gambar_penginapan_23. KHAS Tugu Hotel.jpg', 'htl'),
('PH202424', 'Tjokro Style Hotel', 'Jl. Menteri Supeno No.48, Sorosutan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55161', 274386200, 400000, 800000, 2.8, 'file_gambar/penginapan/gambar_penginapan_24. Tjokro Style Hotel.jpg', 'htl'),
('PH20243', 'Favehotel Kusumanegara', 'Jl. Kusumanegara No.91, Kota Baru, Kec. Umbulharjo, Kota Yogyakarta , Daerah Isitmewa Yogyakarta 55165', 274560111, 300000, 800000, 0.65, 'file_gambar/penginapan/gambar_penginapan_3. Favehotel Kusumanegara.jpg', 'htl'),
('PH20244', '@HOM Premiere Timoho By Horison', 'Jalan Ipda Tut Harsono, Kota Baru, Yogyakarta 55165', 274547171, 200000, 3250000, 0.4, 'file_gambar/penginapan/gambar_penginapan_4. @HOM Premiere Timoho by Horison.jpg', 'oyo'),
('PH20245', 'Grand Rohan Jogja', 'Jalan Janti - Gedongkuning No 336, Banguntapan, Kota Baru, Yogyakarta 55198', 2742810099, 400000, 3500000, 2.1, 'file_gambar/penginapan/gambar_penginapan_5. Grand Rohan.jpg', 'htl'),
('PH20246', 'Kaiya Hotel Yogyakarta', 'Jalan Gedongkuning Selatan No. 118, Kota Gede, Yogyakarta 55171', 274371225, 200000, 500000, 3.3, 'file_gambar/penginapan/gambar_penginapan_6. Kalya Hotel.jpeg', 'htl'),
('PH20247', 'Hotel Madina Inn Yogyakarta', 'Jl. Taman Siswa No.56, Wirogunan, Kec. Mergangsan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55151', 274384137, 118000, 500000, 2.4, 'file_gambar/penginapan/gambar_penginapan_7. Hotel Madina Inn.jpg', 'htl'),
('PH20248', 'OYO 1226 AI Abror Homestay', 'Jl. Cantel Baru No.5, Semaki, Kec. Umbulharjo, Kota, Daerah Istimewa, Yogyakarta, 55166', 21297007600, 82000, 250000, 1, 'file_gambar/penginapan/gambar_penginapan_9. OYO 1226 Al Abror Homestay.jpg', 'oyo'),
('PH20249', 'OYO 3496 Griya Gayatri Monjali', 'Jl. Nyi Tjondrolukito Gg. Napas No.60C, Nandan, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581', 8128005242, 156000, 250000, 8.4, 'file_gambar/penginapan/gambar_penginapan_10. OYO 3496 Griya Gayatri Monjali.jpg', 'oyo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nama_admin`, `password`, `role`) VALUES
('admin20241', 'shid@gmail.com', 'shid', 'shidki', '$2y$10$lEYlER0aLl7.RIXTUtMMPum8f.iEeQxK/N6B9DKVKg0jxfTWswJ3C', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `harga_weekend` int(11) NOT NULL,
  `jarak` float NOT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id`, `nama`, `deskripsi`, `alamat`, `harga_tiket`, `harga_weekend`, `jarak`, `gambar`) VALUES
('WST202410', 'Museum Sonobudoyo', 'Museum Sonobudoyo menyimpan berbagai peninggalan unik yang terbagi menjadi dua unit, unit 1 dan unit 2. Di dalam gedung pamer (unit 1), terdapat koleksi wayang yang digunakan untuk melakukan penyebaran agama dan mengajarkan nilai kehidupan. Pengunjung dapat melihat berbagai macam senjata di masa lalu seperti tombak, clurit, kapak, keris, dan masih banyak lagi di ruang senjata, kemudian terdapat juga berbagai macam koleksi batik. Selain itu, terkadang di museum ini diadakan pameran keren yang menjadi daya tarik untuk remaja karena banyak spot foto yang disediakan.', 'Ngupasan, Gondomanan, Kota Yogyakarta', 10000, 10000, 3.3, 'file_gambar/wisata/gambar_wisata_14. Museum Sonobudoyo.jpg'),
('WST202411', 'Taman Budaya Yogyakarta', 'Taman Budaya menjadi jendela bagi wisatawan untuk melihat keseluruhan budaya Yogyakarta. Wisatawan yang ingin melihat budaya Jawa, namun hanya memiliki waktu singkat, dapat berkunjung ke sini karena terdapat dokumentasi, hasil karya seni, pertunjukan seni, dan banyak hal lainnya.', 'Jl. Sriwedani No.1, Ngupasan, Kec. Gondomanan, Kota Yogyakarta 55122', 0, 0, 3.1, 'file_gambar/wisata/gambar_wisata_13. Taman Budaya.jpg'),
('WST202412', 'Situs Warungboto', 'Situs Warungboto merupakan situs cagar budaya yang dibuka menjadi salah satu destinasi wisata sejarah. Situs Warungboto terlihat megah karena kekokohan dindingnya, juga struktur bangunan dengan lorong, pintu, dan jendela beraksen lengkung pada bagian atas sehingga menambah kesan eksotis. Tempat wisata ini biasa digunakan oleh masyarakat sekitar ataupun wisatawan untuk bersantai bersama teman keluarga, berfoto, bahkan terkadang digunakan sebagai tempat pre-wedding.', 'Jl. Veteran No.77, Warungboto, Kec. Umbulharjo, Kota Yogyakarta 55164', 0, 0, 1.6, 'file_gambar/wisata/gambar_wisata_12. Situs Warungboto.jpg'),
('WST202413', 'Air Terjun SIDOBALI', 'Air Terjun SIDOBALI merupakan salah satu air terjun yang berada dekat dengan wilayah Balaikota Yogyakarta. Di tempat ini, pengunjung bisa merasakan keasrian alam dengan suara khas dari air terjun.', 'Jl. Sidobali No. 384, Muja Muju, Kec. Umbulharjo, Kota Yogyakarta 55165', 0, 0, 1, 'file_gambar/wisata/gambar_wisata_11. Air Terjun SIDOBALI.jpg'),
('WST202414', 'Embung Langensari', 'Embung Langensari Jogja digunakan sebagai ekowisata. Selain sebagai resapan air, embun ini menjadi tempat rekreasi keluarga menyenangkan di mana pengunjung bisa melakukan aktivitas seperti memancing, berfoto, bermain skateboard, jogging, dan lainnya.', 'Jl. Kusbini No.35, Klitren, Kec. Gondokusuman, Kota Yogyakarta 55222', 0, 0, 3.5, 'file_gambar/wisata/gambar_wisata_10. Embung Langensari.jpg'),
('WST202415', 'Wisata Kali Gajah Wong Mrican', 'Wisata Kali Gajah Wong merupakan salah satu destinasi wisata baru di Jogja. Di tempat wisata ini, pengunjung dapat menyusuri kampung wisata di utamanya adalah sungai bersih yang penuh dengan banyak ikan-ikan cantik. Selain itu, terdapat playground anak, spot foto, dan food court.', 'Mrican, Giwangan, Kec. Umbulharjo, Kota Yogyakarta 55163', 0, 0, 4.4, 'file_gambar/wisata/gambar_wisata_9. Wisata Kali Gajah Wong Mrican.jpg'),
('WST202416', 'Alun-alun Kidul Yogyakarta (Alkid)', 'Alun-alun Kidul merupakan halaman belakang dari Keraton Yogyakarta. Alun-alun ini bukan hanya memiliki lapangan, namun juga memiliki sejumlah atraksi wisata seperti penyewaan sepeda dan odong-odong, permainan masangin yang melewati 2 pohon beringin, melukis, hingga kulineran.', 'Patehan, Kraton, Kota Yogyakarta 55133', 0, 0, 4.6, 'file_gambar/wisata/gambar_wisata_8. Alun-alun Kidul.jpg'),
('WST202417', 'Benteng Vredeburg', 'Benteng Vredeburg adalah saksi sejarah betapa kuatnya pengaruh Belanda dalam menjajah Indonesia. Untuk mengenang saksi sejarah tersebut, Benteng Vredenburg menjadi salah satu wisata sejarah di Kota Yogyakarta.', 'Jl. Margo Mulyo No.6, Ngupasan, Kec. Gondomanan, Kota Yogyakarta 55122', 2000, 3000, 4.5, 'file_gambar/wisata/gambar_wisata_7. Benteng Vredeburg.jpg'),
('WST202418', 'Keraton Yogyakarta', 'Keraton Yogyakarta adalah istana dari Kesultanan Ngayogyakarta Hadiningrat yang berlokasi di Kecamatan Kraton, Kota Yogyakarta. Keraton ini didirikan oleh Sri Sultan Hamengkubuwono I pada 1755, setelah Kerajaan Mataram Islam terpecah menjadi dua. Fungsi Keraton Yogyakarta yaitu dijadikan tempat tinggal para rajanya yang sampai saat ini masih menjalankan tradisi kesultanan. Selain itu, kompleks bangunannya juga dijadikan objek wisata bersejarah di Kota Yogyakarta.', 'Jl. Rotowijayan Blok No. 1, Panembahan, Kecamatan Kraton, Kota Yogyakarta', 10000, 25000, 3.8, 'file_gambar/wisata/gambar_wisata_6. Keraton.jpg'),
('WST202419', 'Taman Pintar', 'Taman Pintar adalah tempat rekreasi edukasi yang keren dan seru di Jogja. Wahana yang tersedia diantaranya planetarium, wahana bahari, zona pengolahan sampah, science theater, playground, perpustakaan, kampung kerajinan, gedung oval, dll.', 'Jl. Panembahan Senopati No.1-3, Ngupasan, Kec. Gondomanan, Kota Yogyakarta 55122', 48000, 48000, 3, 'file_gambar/wisata/gambar_wisata_5. Taman Pintar.jpg'),
('WST20242', 'Taman Sari', 'Taman Sari adalah situs bekas taman atau kebun istana Keraton Ngayogyakarta Hadiningrat. Kompleks Taman Sari dapat dibagi menjadi 4 bagian. Bagian pertama adalah danau buatan yang terletak di sebelah barat. Bagian selanjutnya adalah bangunan yang berada di sebelah selatan danau buatan antara lain Pemandian Umbul Binangun. Bagian ketiga adalah Pasarean Ledok Sari dan Kolam Garjitawati yang terletak di selatan bagian kedua. Bagian terakhir adalah bagian sebelah timur bagian pertama dan kedua dan meluas ke arah timur sampai tenggara kompleks Magangan.', 'Patehan, Kraton, Kota Yogyakarta 55133', 7500, 15000, 4.9, 'file_gambar/wisata/gambar_wisata_2. Taman Sari.jpg'),
('WST202420', 'Cleverlli Art Studio', 'Cleverlli Art Space Studio adalah sebuah studio seni yang membawa sebuah konsep “Art Retreat fo Inner Harmony” (tempat pelarian seni untuk keharmonisan diri) dengan menggabungkan seni lukis splat, pendulum, dan bearbrivck painting, dimana semua kalangan dapat mencobanya dan menemukan pengalaman baru serta keharmonisan di setiap sudutnya. Cleverlli Art Space Studio juga dapat menyediakan bantuan untuk menyelenggarkan acara seni, seperti, pameran, lokakarya, seminar, atau workshop class.', 'Jl. Asem Gede No.17, Cokrodiningratan, Kec. Jetis, Kota Yogyakarta 55233', 89000, 450000, 5.3, 'file_gambar/wisata/gambar_wisata_20. Cleverlli Art Studio.jpg'),
('WST202421', 'Sindu Kusuma Edupark (SKE)', 'Sindu Kusuma Edupark merupakan salah satu tempat wisata yang digemari karena terdapat banyak wahana diantaranya bianglala, kursi mabur, kopi putar, motor tumbur, cinema 8D, house of batik, outbond, waterpark, spot foto, dan wahana menarik lainnya.', 'Jl. Jambon, Kragilan, Sinduadi, Kec. Mlati, Kabupaten Sleman 55284 •	Jenis Wisata: Rekreasi, edukasi', 80000, 90000, 7.5, 'file_gambar/wisata/gambar_wisata_23. Sindu Kusuma Edupark.jpg'),
('WST202422', 'Taman Pelangi Jogja', 'Taman Pelangi ini merupakan tempat rekreasi yang di dalamnya terdapat taman lampion, trampolin, becak mini, boom-boom car, ATV, perahu dayung, bola air, speed boat, batery car, auro bungee, dan lainnya sehingga cocok dikunjungi untuk bermain.', 'Jl. Ring Road Utara, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman 55284', 15000, 20000, 9.9, 'file_gambar/wisata/gambar_wisata_24. Taman Pelangi.jpeg'),
('WST202423', 'Kids Fun Park (Pusat)', 'Kids Fun merupakan tempat rekreasi dengan berbagai wahana seperti aquasplash dan gokart yang dapat dijadikan pilihan untuk berlibur.', 'Jl. Wonosari KM 10, Asem Ngecis, Sitimulyo, Kec. Piyungan, Kabupaten Bantul 55792', 20000, 110000, 7.2, 'file_gambar/wisata/gambar_wisata_22. Kids Fun Park (Pusat).jpg'),
('WST202424', 'Tugu Jogja', 'Tugu Jogja memiliki nama asli Tugu Pal Putih berada di sebelah utara Jalan Mangkubumi. Tugu Jogja menjadi ikon dari Kota Jogja sehingga banyak wisatawan yang menjadikan tempat ini sebagai tempat wajib dikunjungi saat ke Yogyakarta. Di Tugu Jogja ini, pengunjung atau wisatawan dapat berfoto, melihat jalan persimpangan khas Jogja, dan berkeliling di sekitar Tugu karena banyak spot untuk dieksplor seperti cafe, pasar, pertokoan, dan lainnya.', 'Jl. Jend. Sudirman, Gowongan, Kec. Jetis, Kota Yogyakarta 55233', 0, 0, 5.3, 'file_gambar/wisata/gambar_wisata_21. Tugu Jogja.jpeg'),
('WST20243', 'Titik Nol Kilometer Yogyakarta', 'Titik Nol Kilometer Yogyakarta berbentuk persimpangan yang mempertemukan empat ruas jalan. Di kawasan ini, wisatawan bisa merasakan nuansa Jogja masa kini yang berada di sumbu imajiner antara Gunung Merapi, Keraton Ngayogyakarta, dan Laut Selatan. Di sekitar tempat ini, juga terletak di pusat pemerintahan, perdagangan, dan pariwisata untuk dikembangkan sebagai pusat aktivitas masyarakat dan wisatawan, khususnya aktivitas budaya dan pariwisata.', 'Jl. Pangurakan No.1, Ngupasan, Kec. Gondomanan, Kota Yogyakarta 55122', 0, 0, 3.3, 'file_gambar/wisata/gambar_wisata_3. Titik Nol Kilometer.jpg'),
('WST20244', 'Kawasan Malioboro', 'Malioboro merupakan nama jalan bagian dari aksis imaginer. Di kawasan ini, banyak terdapat tempat untuk berfoto, tempat makan seperti angkringan, terdapat Pasar Malioboro, Pasar Beringharjo, toko cinderamata, Malioboro Mall, dan lainnya yang dapat dikunjungi oleh wisatawan.', 'Jl. Margo Mulyo Jl. Jend. Ahmad Yani No.106, Ngupasan, Kec. Gondomanan, Kota Yogyakarta 55122', 0, 0, 5.3, 'file_gambar/wisata/gambar_wisata_4. Kawasan Malioboro.jpg'),
('WST20245', 'Jalan Prawirotaman', 'Jalan Prawirotaman ini merupakan kompleks atau kampung wisata yang di dalamnya terdapat restoran, cafe, penginapan, toko barang antik, gerai batik, toko buku kuno, dan masih banyak lagi terkait kebudayaan dan sejarah. Daerah ini seringkali disebut sebagai “kampung bule” di Jogja karena banyak turis mancanegara yang menyukai daerah klasik ini sehingga jika mengunjungi daerah ini tak perlu heran saat melihat banyaknya bule.', 'Jl. Prawirotaman, Brontokusuman, Kec. Mergangsan, Kota Yogyakarta 55153', 0, 0, 5, 'file_gambar/wisata/gambar_wisata_19. Jalan Prawirotaman.jpg'),
('WST20246', 'Sosrowijayan', 'Sosrowijayan merupakan kampung turis kedua paling terkenal setelah Prawirotaman. Terletak di pusat kota Yogyakarta, kampung ini menawarkan penginapan terjangkau sekaligus bangunan hotel kuno, studio dan kursus batik hingga bookshop.', 'Jl. Sosrowijayan, Sosromenduran, Kota Yogyakarta', 0, 0, 4.9, 'file_gambar/wisata/gambar_wisata_18. Sosrowijayan.jpg'),
('WST20247', 'Pasar Beringharjo', 'Pasar Beringharjo yang terletak di kawasan Malioboro ini merupakan pusat perbelanjaan yang menyediakan berbagai pilihan seperti batik, jajanan pasar, tas, sepatu, hingga patung Buddha. Selain itu, Beringharjo juga merupakan salah satu pilar \'Catur Tunggal\' (terdiri dari Kraton, Alun-Alun Utara, Kraton, dan Pasar Beringharjo) yang melambangkan fungsi ekonomi.', 'Jl. Margo Mulyo No.16, Ngupasan, Kec. Gondomanan, Kota Yogyakarta 55122', 0, 0, 4.9, 'file_gambar/wisata/gambar_wisata_17. Pasar Beringharjo.jpg'),
('WST20248', 'Jogja National Museum', 'Jogja National Museum (JNM) adalah sebuah kantong aktivitas seni dan budaya yang dikonsep sebagai ruang publik dan secara legal berdiri di bawah payung Yayasan Yogyakarta Seni Nusantara (YYSN), sebuah yayasan nirlaba berbadan hukum yang khusus bergerak dalam bidang pelestarian dan pengembangan seni dan budaya, baik seni rupa, seni pertunjukan maupun seni multimedia.', 'Jl. Prof. DR. Ki Amri Yahya No.1, Pakuncen, Wirobrajan, Kota Yogyakarta 55167', 0, 0, 4.5, 'file_gambar/wisata/gambar_wisata_16. Jogja National Museum.jpg'),
('WST20249', 'Museum Pusat TNI AU Dirgantara Mandala', 'Museum Pusat TNI AU Dirgantara Mandala atau Museum Dirgantara adalah tempat wisata yang populer untuk dikunjungi keluarga. Museum ini menyimpan koleksi yang berkaitan dengan sejarah TNI AU Indonesia. Museum yang berdiri sejak tahun 1978 ini dulunya merupakan sebuah bangunan pabrik gula peninggalan masa kolonialisme seluas 4,3 hektare.  Bukan hanya menyimpan aneka benda mengenai TNI AU, museum ini juga berisi pesawat-pesawat yang pernah digunakan TNI AU.', 'Kompleks Pangkalan Udara Adisucipto Jl. Raya Janti, Karang Janbe, Maguwoharjo, Kec. Depok, Kabupaten Sleman 55282', 6000, 6000, 4.2, 'file_gambar/wisata/gambar_wisata_15. Museum Pusat TNI AU Dirgantara Mandala.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fasilitas_penginapan` (`id_penginapan`),
  ADD KEY `fk_id_jenis_fasilitas` (`id_jenis_fasilitas`);

--
-- Indeks untuk tabel `gambar_detail_layanan`
--
ALTER TABLE `gambar_detail_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_gedung_layanan` (`id_gedung`);

--
-- Indeks untuk tabel `list_fasilitas`
--
ALTER TABLE `list_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_kuliner` (`id_kuliner`);

--
-- Indeks untuk tabel `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT untuk tabel `gambar_detail_layanan`
--
ALTER TABLE `gambar_detail_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;

--
-- AUTO_INCREMENT untuk tabel `list_fasilitas`
--
ALTER TABLE `list_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fk_fasilitas_penginapan` FOREIGN KEY (`id_penginapan`) REFERENCES `penginapan` (`id`),
  ADD CONSTRAINT `fk_id_jenis_fasilitas` FOREIGN KEY (`id_jenis_fasilitas`) REFERENCES `list_fasilitas` (`id`);

--
-- Ketidakleluasaan untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `fk_id_gedung_layanan` FOREIGN KEY (`id_gedung`) REFERENCES `gedung` (`id`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_kuliner` FOREIGN KEY (`id_kuliner`) REFERENCES `kuliner` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
