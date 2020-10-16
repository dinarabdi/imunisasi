-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2020 pada 09.28
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_putra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `informasi` text NOT NULL,
  `inti` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `filosofi` text NOT NULL,
  `kompeten` text NOT NULL,
  `kompetitif` text NOT NULL,
  `mandiri` text NOT NULL,
  `akte` text NOT NULL,
  `pajak` text NOT NULL,
  `izin` text NOT NULL,
  `daftar` text NOT NULL,
  `akun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id_about`, `informasi`, `inti`, `visi`, `misi`, `filosofi`, `kompeten`, `kompetitif`, `mandiri`, `akte`, `pajak`, `izin`, `daftar`, `akun`) VALUES
(1, '<p>Suatu perusahaan yang memahami kenyataan bahwa perkembangan dan pembangunan di segala bidang begitu pesat. Dengan adanya peluang itu, kami mengakomodir hal tersebut.</p>\r\n', '<p>Suatu perusahaan yang memahami kenyataan bahwa perkembangan dan pembangunan di segala bidang begitu pesat. Dengan adanya peluang dan kesempatan tersebut kami mengakomodir semua hal tersebut. Dengan tujuan mewujudkan keadilan social bagi seluruh rakyat Nusantara, dan turut serta dalam memajukan pembangunan dalam segala bidang di Negara ini. Untuk mewujudkan hal tersebut kami memiliki cor bisnis terpadu berbasis pember- dayaan masyarakat yang meliputi pengembangan dan pembangunan usaha di bidang pertanian peter- nakan perikanan, pembiayaan, permodalan, pendidikan, industry, jasa, bidang kesehatan serta bidang-bidang lainnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Membangun negeri dengan sepenuh hati, menuju kejayaan era majapahit tata tentrem kertorahardjo General Contractor, Property, Trading Industrial, Plant, Suplier, Expor, Import, Prodution, Jasa, Pariwisata,Pada sector &ndash;sector yang lainnya. Baik itu industry maupun usaha skala kecil menengah maupun besar dengan system plasma investasi berbasis pemberdayaan masyarakat dan kerakyatan.</p>\r\n', '<p>Menjadi Perusahaan Perdagangan, Pariwisata, dan Kontraktor dengan pelayanan terbaik.</p>\r\n', '<p>Membangun usaha Perdagangan, Pariwisata dan Kontraktor yang berorientasi pada efisiensi dan efektivitas serta kepuasan pelanggan.</p>\r\n', '<p>Fokus pada konsumen Perusahaan membangun komitmen untuk berfokus dalam melayani konsumen dengan upaya terbaik.</p>\r\n', '<p>Perusahaan menempatkan kompetensi profesional para pengelolanya, baik dalam ketrampilan, keahlian, pemilihan produk dan jasa layanan yang disajikan maupun kepemimpinan serta para karyawannya.</p>\r\n', '<p>Perusahaan menempatkan diri untuk siap bersaing dalam kualitas maupun berbagai aspek komersial lainnya secara efisian (dalam biaya) dan efektif (tepat guna dan berhasil guna) dengan kompetitor dalam bidangnya.</p>\r\n', '<p>Perusahaan turut serta mengembangkan kemandirian pada tingkat lokal dan domestik dangan membangun kemitraan bersama usaha-usaha kecil menengah lainnya untuk berperan dalam pembangunan ekonomi<br />\r\nmasyarakat.</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>Notaris :&nbsp;<br />\r\nNomor :&nbsp;<br />\r\nTanggal : 3 April 2020</p>\r\n', '<p>NPWP :&nbsp;</p>\r\n', '<p>Kabupaten : Sleman<br />\r\nNomor :&nbsp;<br />\r\nTanggal : 3 April 2020</p>\r\n', '<p>Kabupaten : Sleman<br />\r\nNomor :&nbsp;<br />\r\nTanggal : 3 April 2020</p>\r\n', '<p>Nama : CV PUTRA WIRA PERKASA</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id_article`, `title`, `file`, `content`, `created_at`, `update_at`, `update_by`) VALUES
(12, 'Test Dinar', '2.jpg', '<p>1</p>\r\n', '2020-03-14 13:08:03', '2020-03-15 19:29:22', 2),
(13, 'Manage Students', '35.jpg', '<p>hhhh</p>\r\n', '2020-03-15 00:21:07', '2020-03-15 00:21:07', 1),
(14, 'dede1', '1.jpg', '<p>qwqw</p>\r\n', '2020-03-15 00:21:15', '2020-03-15 00:21:15', 1),
(15, 'dede3', '1.jpg', '<p>qwqw</p>\r\n', '2020-03-15 00:21:15', '2020-03-15 00:21:15', 1),
(16, 'dede2', '1.jpg', '<p>qwqw</p>\r\n', '2020-03-15 00:21:15', '2020-03-15 00:21:15', 1),
(17, 'dede4', '1.jpg', '<p>qwqw</p>\r\n', '2020-03-15 00:21:15', '2020-03-15 00:21:15', 1),
(18, 'coba', '36.jpg', '<p>1122</p>\r\n', '2020-03-15 21:50:04', '2020-03-15 21:50:04', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `nomor` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `alamat`, `nomor`, `email`) VALUES
(1, '<p>Jl. Opak Raya VI, Brintikan, Tirtomartani</p>\r\n', '0986784564', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `keterangan`, `gambar`) VALUES
(3, 'PARIWISATA', 'photo-1519922639192-e73293ca430e1.jpeg'),
(4, 'PERDAGANGAN', 'photo-1470309864661-68328b2cd0a51.jpeg'),
(5, 'KONTRAKTOR', 'photo-1563257764-ec4bd2983cbe1.jpeg'),
(6, 'KONTRAKTOR', 'photo-1513467535987-fd81bc7d62f8.jpeg'),
(7, 'KONTRAKTOR', 'photo-1503708928676-1cb796a0891e.jpeg'),
(9, 'PARIWISATA', 'photo-1545922521-ffc22e0de375.jpeg'),
(10, 'PARIWISATA', 'photo-1546484458-6904289cd4f0.jpeg'),
(11, 'PERDAGANGAN', 'photo-1520693414807-45858f5a9188.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `judul` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `rincian_layanan` text NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `rincian_layanan`, `gambar`) VALUES
(7, 'DIVISI PARIWISATA', '<p>Tours dan Travels</p>\r\n', 'photo-1519922639192-e73293ca430e.jpeg'),
(8, 'DIVISI PERDAGANGAN', '<p>Perdagangan besar eceran dan alat tulis</p>\r\n', 'photo-1470309864661-68328b2cd0a5.jpeg'),
(9, 'DIVISI KONTRAKTOR', '<ol>\r\n	<li>Kontraktor Konstruksi Sipil dan Arsitektur</li>\r\n	<li>Kontraktor Mekanikal dan Elektrikal</li>\r\n	<li>Kontraktor Infrastruktur</li>\r\n</ol>\r\n', 'photo-1563257764-ec4bd2983cbe.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE `pengelola` (
  `id_pengelola` int(11) NOT NULL,
  `nama_pengelola` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`id_pengelola`, `nama_pengelola`, `jabatan`, `foto`) VALUES
(3, 'User', '<p>User</p>\r\n', 'admin-png-4_(1).png'),
(4, 'User', '<p>User</p>\r\n', 'admin-png-4_(1)1.png'),
(5, 'User', '<p>User</p>\r\n', 'admin-png-4_(1)2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekanan`
--

CREATE TABLE `rekanan` (
  `id` int(11) NOT NULL,
  `rekanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekanan`
--

INSERT INTO `rekanan` (`id`, `rekanan`) VALUES
(1, '<p>PT. MULTI SARANA PRAMADITA<br />\r\nPT. HARAPAN INDAH CIPTA PERKASA<br />\r\nPT. PEMBANGUNAN INDONESIA RAYA<br />\r\nPT. REKA CIPTA<br />\r\nPT. ANDAKARA JEJARING NUSANTARA<br />\r\nPT. WASKITA KARYA<br />\r\nPT. ADHI KARYA<br />\r\nPT. PP PROPERTI<br />\r\nPT. HUTAMA KARYA<br />\r\nPT. ANGKASA PURA PROPERTI<br />\r\nPT. CENDRAWASIH ANEKA INDAH<br />\r\nPT. KARYA TAMA BANGUN NUSA<br />\r\nPT. GLOBAL INDO CANMA<br />\r\nPT. ONE PROPERTI<br />\r\nKOPERASI NUSANTARA INDONESIA</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id_students` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `place_birth` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('1','0') NOT NULL,
  `religion` varchar(20) NOT NULL,
  `address` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id_students`, `nis`, `name`, `place_birth`, `birthday`, `gender`, `religion`, `address`, `created_at`, `update_at`) VALUES
(2, '82547', 'dinar', 'tangerangg', '2019-10-03', '1', 'Islam', 'jln kp kadu 04/01 curug tangerang', '2019-10-31 13:27:33', '2020-01-21 11:52:46'),
(3, '28613', 'rere', 'tangerang', '2019-11-16', '0', 'Islam', 'jln kp kadu 04/01 curug tangerang', '2019-11-01 01:31:13', '2019-11-26 06:59:52'),
(4, '36315', 'Budi', 'Klaten', '1993-06-16', '1', 'Islam', 'Klaten', '2019-11-23 12:55:46', '2019-11-26 07:00:11'),
(5, '21056', 'Anis', 'Klaten', '2019-11-02', '0', 'Kristen', 'Klaten', '2019-11-24 15:20:32', '2019-11-26 07:00:52'),
(6, '72605', 'Risa', 'Yogya', '2003-02-04', '0', 'Hindu', 'Yogya', '2019-11-23 14:19:13', '2019-11-26 07:01:41'),
(7, '72606', 'Doni', 'sleman', '2019-11-03', '1', 'Islam', 'Sleman', '2019-11-23 14:19:28', '2019-11-26 07:02:23'),
(8, '72607', 'Rina', 'Sleman', '2019-11-14', '0', 'Islam', 'Sleman', '2019-11-23 14:19:42', '2019-11-26 07:02:53'),
(9, '72601', 'Arif', 'Gunung Kidul', '2019-11-03', '1', 'Islam', 'Gunung Kidul', '2019-11-23 14:19:59', '2019-11-26 07:03:33'),
(10, '72602', 'Riska', 'Klaten', '2019-11-03', '0', 'Islam', 'Klaten', '2019-11-23 14:20:11', '2019-11-26 07:04:08'),
(11, '50599', 'Roni', 'Wonogiri', '2019-11-03', '1', 'Islam', 'Wonogiri', '2019-11-23 14:20:37', '2019-11-26 07:04:43'),
(13, '50591', 'Irvan', 'Sukoharjo', '2015-03-04', '1', 'Islam', 'Sukoharjo', '2019-11-24 14:53:52', '2019-11-26 07:05:30'),
(14, '50597', 'Dian', 'tangerangg', '2019-10-07', '0', 'Islam', 'jln kp kadu 04/01 curug tangerang', '2019-10-31 13:27:33', '2019-11-26 07:06:01'),
(15, '50598', 'Aris', 'Solo', '2019-11-10', '1', 'Islam', 'Solo', '2019-11-23 14:19:13', '2019-11-26 07:06:42'),
(16, '38512', 'rere', 'tangerang', '2019-11-16', '0', 'Islam', 'jln kp kadu 04/01 curug tangerang', '2019-11-01 01:31:13', '2019-11-26 07:06:57'),
(17, '38513', 'Dwi', 'Klaten', '2019-11-10', '1', 'Islam', 'Klaten', '2019-11-23 14:19:13', '2019-11-26 07:07:17'),
(18, '38511', 'Asih', 'Yogya', '2019-11-10', '1', 'Islam', 'Yogya', '2019-11-23 14:19:13', '2019-11-26 07:07:45'),
(19, '38514', 'Damar', 'Solo', '2019-10-07', '1', 'Islam', 'Solo', '2019-10-31 13:27:33', '2019-11-26 07:08:22'),
(20, '38515', 'Dani', 'Klaten', '2019-11-10', '1', 'Islam', 'Klaten', '2019-11-23 14:19:13', '2019-11-26 07:08:43'),
(21, '38518', 'Rosa', 'Gunung Kidul', '2019-10-07', '0', 'Islam', 'Gunung Kidul', '2019-10-31 13:27:33', '2019-11-26 07:09:22'),
(22, '95242', 'Arfa', 'tangerangg', '2019-10-07', '1', 'Islam', 'jln kp kadu 04/01 curug tangerang', '2019-10-31 13:27:33', '2019-11-26 07:09:40'),
(23, '95241', 'Dayat', 'Klaten', '2019-10-07', '1', 'Islam', 'Klaten', '2019-10-31 13:27:33', '2019-11-26 07:09:59'),
(24, '95244', 'Dono', 'Kulon Progo', '2019-10-07', '1', 'Islam', 'Kulon Progo', '2019-10-31 13:27:33', '2019-11-26 07:10:25'),
(25, '60602', 'Chandra', 'tangerangg', '2019-10-07', '1', 'Islam', 'jln kp kadu 04/01 curug tangerang', '2019-11-24 15:18:52', '2019-11-26 07:10:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id` int(1) NOT NULL,
  `tentang` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id`, `tentang`, `visi`, `misi`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin-png-4.png', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2019-10-13 00:00:00'),
(2, 'dinar', 'dinar', 'admin-png-41.png', '13d2c27d75f43e084f96904768e10fee', 2, 1, '2019-10-15 20:49:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(9, 1, 4),
(11, 1, 3),
(25, 2, 3),
(26, 1, 2),
(29, 1, 10),
(30, 2, 10),
(31, 1, 11),
(32, 1, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Staff'),
(10, 'News'),
(11, 'Service'),
(12, 'Pengelola');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa fa-tachometer', 1),
(2, 2, 'My Profile', 'user', 'fa fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fa fa-edit', 1),
(4, 3, 'Menu Management', 'menu/index', 'fa fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fa fa-folder-open', 1),
(14, 1, 'Role Access', 'admin/role', 'fa fa-key', 1),
(15, 4, 'Manage Users', 'staff', 'fa fa-users', 1),
(23, 10, 'Tetang kami', 'news/about', 'fa fa-info-circle', 1),
(24, 10, 'Rekanan', 'news/rekanan', 'fa fa-info-circle', 1),
(25, 11, 'Produk dan Layanan', 'Service', 'fa fa-info-circle', 1),
(26, 12, 'Pengelola', 'pengelola', 'fa fa-users', 1),
(27, 10, 'Galeri', 'news/galeri', 'fa fa-book', 1),
(28, 11, 'Kontak', 'service/contact', 'fa fa-book', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indeks untuk tabel `rekanan`
--
ALTER TABLE `rekanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_students`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Role1` (`role_id`),
  ADD KEY `Menu1` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submenu` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rekanan`
--
ALTER TABLE `rekanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id_students` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `Menu1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Role1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `submenu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
