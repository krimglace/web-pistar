-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2022 at 08:11 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1702441_pistar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap_admin` varchar(250) NOT NULL,
  `nama_panggilan_admin` varchar(250) NOT NULL,
  `email_admin` varchar(250) NOT NULL,
  `password_admin` varchar(250) NOT NULL,
  `pp_admin` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_lengkap_admin`, `nama_panggilan_admin`, `email_admin`, `password_admin`, `pp_admin`) VALUES
(1, 'Muhammad Rafli Nasution', 'Shiota', 'mhdrafli.mr@gmail.com', 'e821a8bfc2c786f275e5d5ea94d519a7', 'aeAv05b_460s.jpg'),
(5, '', '', 'pepengajah29@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'IMG_20200802_192110.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id_blog` int(11) NOT NULL,
  `judul_artikel` varchar(250) NOT NULL,
  `featured_image` varchar(250) NOT NULL,
  `author` varchar(250) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  `kategori_blog` varchar(150) NOT NULL,
  `content_blog` varchar(10000) NOT NULL,
  `last_picture` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog_comment`
--

CREATE TABLE `tb_blog_comment` (
  `id_comment` int(11) NOT NULL,
  `email_comment` varchar(250) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `isi_komentar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_blog_comment`
--

INSERT INTO `tb_blog_comment` (`id_comment`, `email_comment`, `id_blog`, `isi_komentar`) VALUES
(2, 'amdklm@klmklm', 8, 'm m mlm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_content_instagram`
--

CREATE TABLE `tb_content_instagram` (
  `id_content_ig` int(11) NOT NULL,
  `gambar_content` varchar(250) NOT NULL,
  `link_content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_faq`
--

CREATE TABLE `tb_faq` (
  `id_faq` int(11) NOT NULL,
  `pertanyaan` varchar(2500) NOT NULL,
  `jawaban` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_faq`
--

INSERT INTO `tb_faq` (`id_faq`, `pertanyaan`, `jawaban`) VALUES
(1, 'Jika Saya Butuh Konsultasi, Kemana Saya Harus Menghubungi ?', '<p>Anda dapat berkonsultasi ke Whatsapp admin support kami di nomor 12345678</p>\r\n'),
(3, 'Bagaimana Les Privat Dilaksanakan Selama Masa Pandemi Covid19 ?', '<p>Kami hadir untuk menjadi solusi bagi orang tua dan siswa, dengan membuat protokol khusus untuk pengajar.</p>\r\n\r\n<ul>\r\n	<li>Kami akan menugaskan bagi yang memiliki kendaraan pribadi saja</li>\r\n	<li>Dalam keadaan sehat tidak ada gejala batuk, suhu badan tinggi, dsb.</li>\r\n	<li>Kami mewajibkan guru menggunakan masker dan face shield (bila perlu) saat mengajar.</li>\r\n	<li>Ketika sudah sampai rumah siswa pengajar wajib mencuci tangan sebelum mengajar.</li>\r\n	<li>Pengajar membawa pakaian ganti.</li>\r\n	<li>Mengizinkan pengajar untuk melakukan rapid test atau swab apabila diperlukan, biaya diluar dari biaya les privat.</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_filterbiayales`
--

CREATE TABLE `tb_filterbiayales` (
  `id_biaya` int(11) NOT NULL,
  `nama_program` varchar(250) NOT NULL,
  `level_kurikulum` varchar(250) DEFAULT NULL,
  `sistem_pembelajaran` varchar(250) NOT NULL,
  `kelas` int(11) DEFAULT NULL,
  `harga_regullar` varchar(100) NOT NULL,
  `diskon_regullar` int(100) NOT NULL,
  `harga_super` varchar(100) NOT NULL,
  `diskon_super` int(100) NOT NULL,
  `harga_intensif` varchar(100) NOT NULL,
  `diskon_intensif` int(100) NOT NULL,
  `harga_superintensif` varchar(100) NOT NULL,
  `diskon_superintensif` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_filterbiayales`
--

INSERT INTO `tb_filterbiayales` (`id_biaya`, `nama_program`, `level_kurikulum`, `sistem_pembelajaran`, `kelas`, `harga_regullar`, `diskon_regullar`, `harga_super`, `diskon_super`, `harga_intensif`, `diskon_intensif`, `harga_superintensif`, `diskon_superintensif`) VALUES
(13, 'TK', 'Nasional', 'Online', NULL, '85k', 10, '333k', 10, '666k', 10, '999k', 10),
(14, 'TK', 'Nasional', 'Offline', NULL, '85k', 10, '333k', 10, '666k', 10, '999k', 10),
(19, 'SD', 'Nasional', 'Online', 1, '95k', 10, '373k', 10, '746k', 10, '1119k', 10),
(20, 'SD', 'Nasional', 'Offline', 1, '95k', 10, '373k', 10, '746k', 10, '1119k', 10),
(25, 'SD', 'Nasional', 'Online', 2, '95k', 0, '373k', 0, '746k', 0, '1119k', 0),
(26, 'SD', 'Nasional', 'Offline', 2, '95k', 0, '373k', 0, '746k', 0, '1119k', 0),
(31, 'SD', 'Nasional', 'Online', 3, '95k', 0, '373k', 0, '746k', 0, '1119k', 0),
(32, 'SD', 'Nasional', 'Offline', 3, '95k', 0, '373k', 0, '746k', 0, '1119k', 0),
(37, 'SD', 'Nasional', 'Online', 4, '100k', 0, '393k', 0, '786k', 0, '1179k', 0),
(38, 'SD', 'Nasional', 'Offline', 4, '100k', 0, '393k', 0, '786k', 0, '1179k', 0),
(43, 'SD', 'Nasional', 'Online', 5, '100k', 0, '393k', 0, '786k', 0, '1179k', 0),
(44, 'SD', 'Nasional', 'Offline', 5, '100k', 0, '393k', 0, '786k', 0, '1179k', 0),
(49, 'SD', 'Nasional', 'Online', 6, '105k', 0, '413k', 0, '826k', 0, '1239k', 0),
(50, 'SD', 'Nasional', 'Offline', 6, '105k', 0, '413k', 0, '826k', 0, '1239k', 0),
(55, 'SMP', 'Nasional', 'Online', 7, '115k', 10, '453k', 10, '906k', 10, '1359k', 10),
(56, 'SMP', 'Nasional', 'Offline', 7, '115k', 10, '453k', 10, '906k', 10, '1359k', 10),
(61, 'SMP', 'Nasional', 'Online', 8, '115k', 0, '453k', 0, '906k', 0, '1359k', 0),
(62, 'SMP', 'Nasional', 'Offline', 8, '115k', 0, '453k', 0, '906k', 0, '1359k', 0),
(67, 'SMP', 'Nasional', 'Online', 9, '120k', 0, '473k', 0, '946k', 0, '1419k', 0),
(68, 'SMP', 'Nasional', 'Offline', 9, '120k', 0, '473k', 0, '946k', 0, '1419k', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_blog`
--

CREATE TABLE `tb_kategori_blog` (
  `id_katblog` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori_blog`
--

INSERT INTO `tb_kategori_blog` (`id_katblog`, `nama_kategori`) VALUES
(1, 'Berita'),
(2, 'Event'),
(3, 'Uncatogorized'),
(5, 'Brosur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komisi_tutor`
--

CREATE TABLE `tb_komisi_tutor` (
  `id_komisi` int(11) NOT NULL,
  `id_tutor` varchar(6) NOT NULL,
  `total_komisi` varchar(250) NOT NULL,
  `tanggal_komisi` date NOT NULL,
  `status_komisi` varchar(250) NOT NULL,
  `kategori_komisi` varchar(250) NOT NULL,
  `rekening` varchar(250) NOT NULL,
  `status_pengiriman` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_komisi_tutor`
--

INSERT INTO `tb_komisi_tutor` (`id_komisi`, `id_tutor`, `total_komisi`, `tanggal_komisi`, `status_komisi`, `kategori_komisi`, `rekening`, `status_pengiriman`) VALUES
(5, 'PST004', '20000', '0000-00-00', 'Sedang Diproses', 'Klaim Kode Referral', '1234567890', 'Selesai'),
(6, 'PST002', '12000', '0000-00-00', 'Sedang Diproses', 'Bonus Referral', 'BRI3265501012038018', 'Selesai'),
(7, 'PST002', '70.95000', '0000-00-00', 'Selesai', 'Bonus Referral', 'BRI213131', 'Selesai'),
(8, 'PST002', '6000', '0000-00-00', 'Belum Diklaim', 'Bonus Referral', '', ''),
(9, 'PST004', '10', '0000-00-00', 'Selesai', 'Klaim Kode Referral', '1234567890', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kotaksaran`
--

CREATE TABLE `tb_kotaksaran` (
  `id_saran` int(11) NOT NULL,
  `id` varchar(6) NOT NULL,
  `judul_saran` varchar(250) NOT NULL,
  `isi_saran` varchar(2000) NOT NULL,
  `target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kotaksaran`
--

INSERT INTO `tb_kotaksaran` (`id_saran`, `id`, `judul_saran`, `isi_saran`, `target`) VALUES
(4, 'PST001', 'Okr', 'Hello World', 'Admin'),
(5, 'PTR005', 'Test', 'Oke', 'Tutor'),
(6, 'PTR005', 'Test', 'Oke', 'Admin'),
(7, 'PTR006', 'Bagus', 'Bagus', 'Tutor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_levelkurikulum`
--

CREATE TABLE `tb_levelkurikulum` (
  `id_levelkurikulum` int(11) NOT NULL,
  `level_kurikulum` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_levelkurikulum`
--

INSERT INTO `tb_levelkurikulum` (`id_levelkurikulum`, `level_kurikulum`) VALUES
(1, 'Beginner'),
(2, 'Elementary'),
(3, 'Intermediete'),
(4, 'Advance'),
(5, 'Nasional'),
(6, 'Nasional Plus/Bilingual'),
(7, 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(25) NOT NULL,
  `tingkatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `tingkatan`) VALUES
(1, 'Matematika', 'SMP'),
(2, 'Bahasa Inggris', 'SMP'),
(3, 'Fisika', 'SMP'),
(4, 'Matematika', 'SD'),
(5, 'IPA', 'SD'),
(6, 'IPS', 'SD'),
(7, 'Bahasa Inggris', 'SD'),
(8, 'Bahasa Indonesia', 'SD'),
(9, 'Umum', 'SD'),
(10, 'Kimia', 'SMP'),
(11, 'Sejarah', 'SMP'),
(12, 'Geografi', 'SMP'),
(13, 'Ekonomi', 'SMP'),
(14, 'Sosiologi', 'SMP'),
(15, 'Bahasa Indonesia', 'SMP'),
(16, 'Biologi', 'SMP'),
(17, 'Umum', 'SMP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_namaprogramles`
--

CREATE TABLE `tb_namaprogramles` (
  `id_namaprogram` int(11) NOT NULL,
  `nama_program` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_namaprogramles`
--

INSERT INTO `tb_namaprogramles` (`id_namaprogram`, `nama_program`) VALUES
(3, 'TK'),
(4, 'SD'),
(5, 'SMP');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket_belajar`
--

CREATE TABLE `tb_paket_belajar` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_paket_belajar`
--

INSERT INTO `tb_paket_belajar` (`id_paket`, `nama_paket`) VALUES
(1, 'Regular 1X'),
(2, 'Super 4X'),
(3, 'Intensif 8X'),
(4, 'Super Intensif 12X');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panduan_jadipengajar`
--

CREATE TABLE `tb_panduan_jadipengajar` (
  `id_panduan_jadipengajar` int(11) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `link` varchar(2500) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_panduan_jadipengajar`
--

INSERT INTO `tb_panduan_jadipengajar` (`id_panduan_jadipengajar`, `judul`, `link`, `keterangan`) VALUES
(1, '', 'https://www.youtube.com/embed/X9pbG7YA5HQ', 'Panduan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan_les`
--

CREATE TABLE `tb_pesanan_les` (
  `id_siswawali` varchar(6) NOT NULL,
  `id_pesanan` varchar(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `sistem_pembelajaran` varchar(100) NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `jk_guru` varchar(100) NOT NULL,
  `hari_senin` time DEFAULT NULL,
  `hari_selasa` time DEFAULT NULL,
  `hari_rabu` time DEFAULT NULL,
  `hari_kamis` time DEFAULT NULL,
  `hari_jumat` time DEFAULT NULL,
  `hari_sabtu` time DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `kode_referral` varchar(100) NOT NULL,
  `catatan` varchar(1000) NOT NULL,
  `status` varchar(250) NOT NULL,
  `id_tutor` varchar(6) NOT NULL,
  `link_senin` varchar(1000) NOT NULL,
  `link_selasa` varchar(1000) NOT NULL,
  `link_rabu` varchar(1000) NOT NULL,
  `link_kamis` varchar(1000) NOT NULL,
  `link_jumat` varchar(1000) NOT NULL,
  `link_sabtu` varchar(1000) NOT NULL,
  `bukti_pembayaran` varchar(250) NOT NULL,
  `total_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan_les`
--

INSERT INTO `tb_pesanan_les` (`id_siswawali`, `id_pesanan`, `nama_paket`, `sistem_pembelajaran`, `mata_pelajaran`, `jk_guru`, `hari_senin`, `hari_selasa`, `hari_rabu`, `hari_kamis`, `hari_jumat`, `hari_sabtu`, `tanggal_mulai`, `jumlah_siswa`, `kode_referral`, `catatan`, `status`, `id_tutor`, `link_senin`, `link_selasa`, `link_rabu`, `link_kamis`, `link_jumat`, `link_sabtu`, `bukti_pembayaran`, `total_bayar`) VALUES
('PTR001', 'PLES000012', 'Paket Super Intensif 12X', 'Online', 'Matematika', 'Laki - Laki', '20:05:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '2022-04-29', 2, '', '', 'Success', '', '', '', '', '', '', '', '', ''),
('PTR005', 'PLES000013', 'Paket Regular 1X', 'Online', 'IPA', 'Laki - Laki', '23:35:00', '23:35:00', '23:35:00', '23:35:00', '23:35:00', '23:35:00', '2022-04-30', 1, '', '', 'On Process', 'PST004', '', '', '', '', '', '', '', '85.5k');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ratting_tutor`
--

CREATE TABLE `tb_ratting_tutor` (
  `id_ratting` int(11) NOT NULL,
  `jumlah_ratting` varchar(100) NOT NULL,
  `id_tutor` varchar(11) NOT NULL,
  `id_siswawali_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ratting_tutor`
--

INSERT INTO `tb_ratting_tutor` (`id_ratting`, `jumlah_ratting`, `id_tutor`, `id_siswawali_user`) VALUES
(2, '4', 'PST001', 'PTR003'),
(3, '4', 'PST002', 'PTR001'),
(4, '5', 'PST001', 'PTR001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekeningpistar`
--

CREATE TABLE `tb_rekeningpistar` (
  `id_rekening` int(11) NOT NULL,
  `jenis_bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `atas_nama` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekeningpistar`
--

INSERT INTO `tb_rekeningpistar` (`id_rekening`, `jenis_bank`, `nomor_rekening`, `atas_nama`) VALUES
(3, 'MANDIRI', '12345678', 'PISTAR');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswawali_user`
--

CREATE TABLE `tb_siswawali_user` (
  `id_siswawali` varchar(6) NOT NULL,
  `nama_lengkap_user` varchar(250) NOT NULL,
  `nama_panggilan_user` varchar(250) NOT NULL,
  `email_user` varchar(250) NOT NULL,
  `password_user` varchar(250) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tingkat` varchar(100) NOT NULL,
  `pp_siswa` varchar(250) NOT NULL,
  `no_whatsapp_user` varchar(100) DEFAULT NULL,
  `alamat_user` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswawali_user`
--

INSERT INTO `tb_siswawali_user` (`id_siswawali`, `nama_lengkap_user`, `nama_panggilan_user`, `email_user`, `password_user`, `kelas`, `tingkat`, `pp_siswa`, `no_whatsapp_user`, `alamat_user`) VALUES
('PTR001', 'Muhammad Rafli', 'Shiota', 'ryukokaru@gmail.com', 'e821a8bfc2c786f275e5d5ea94d519a7', '9', 'SMP', 'berlian.png', '6282275713049', 'Purwakarta'),
('PTR003', 'kmkmdak', 'mkmkmkm', 'kmkm@kmkm', '2cfdef5e1a205a6a0391991d460903a2', '', '', '', '', NULL),
('PTR004', 'jnanf', 'lknlkfmalkfma', 'lkmfam@lkmalkmfa', '87902a18ce5ac11ea0664999f614f516', '', '', '', '', NULL),
('PTR006', 'Nuna Zatulina', 'Nuna', '089636290979', 'e10adc3949ba59abbe56e057f20f883e', '8', 'SMP', '', NULL, 'sadaguarguar@gmail.com'),
('PTR007', 'Pepen', 'Aja', 'pepenga53@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slide` int(11) NOT NULL,
  `gambar_slider` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id_slide`, `gambar_slider`) VALUES
(1, 'carousel3.jpeg'),
(2, 'carousel2.jpeg'),
(6, '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_syarat_ketentuan`
--

CREATE TABLE `tb_syarat_ketentuan` (
  `id_syarat` int(11) NOT NULL,
  `isi_syarat_ketentuan` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_syarat_ketentuan`
--

INSERT INTO `tb_syarat_ketentuan` (`id_syarat`, `isi_syarat_ketentuan`) VALUES
(1, '<p>Baik, ramah</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tentang_pistar`
--

CREATE TABLE `tb_tentang_pistar` (
  `id_tentang` int(11) NOT NULL,
  `logo_pistar` varchar(250) NOT NULL,
  `alamat_pistar` varchar(250) NOT NULL,
  `no_telepon_pistar` varchar(100) NOT NULL,
  `email_pistar` varchar(1000) NOT NULL,
  `whatsapp_admin_pistar` varchar(1000) NOT NULL,
  `instagram_pistar` varchar(1000) NOT NULL,
  `facebook_pistar` varchar(1000) NOT NULL,
  `youtube_pistar` varchar(1000) NOT NULL,
  `tiktok_pistar` varchar(1000) NOT NULL,
  `tentang_pistar` varchar(5000) NOT NULL,
  `nama_pt` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tentang_pistar`
--

INSERT INTO `tb_tentang_pistar` (`id_tentang`, `logo_pistar`, `alamat_pistar`, `no_telepon_pistar`, `email_pistar`, `whatsapp_admin_pistar`, `instagram_pistar`, `facebook_pistar`, `youtube_pistar`, `tiktok_pistar`, `tentang_pistar`, `nama_pt`) VALUES
(1, 'logo.png', 'Tangerang', '12345678', 'Test@gmail.com', '6283801313205', '', '', 'https://www.youtube.com/', '', 'Tes', 'Pistar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni_siswa`
--

CREATE TABLE `tb_testimoni_siswa` (
  `id_testimoni` int(11) NOT NULL,
  `id_siswawali` varchar(6) NOT NULL,
  `isi_testimoni` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_testimoni_siswa`
--

INSERT INTO `tb_testimoni_siswa` (`id_testimoni`, `id_siswawali`, `isi_testimoni`) VALUES
(4, 'PTR005', 'Good'),
(5, 'PTR006', 'Keren nih pistar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni_tutor`
--

CREATE TABLE `tb_testimoni_tutor` (
  `id_testi_tutor` int(11) NOT NULL,
  `id_tutor` varchar(6) NOT NULL,
  `isi_testimoni` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_testimoni_tutor`
--

INSERT INTO `tb_testimoni_tutor` (`id_testi_tutor`, `id_tutor`, `isi_testimoni`) VALUES
(3, 'PST003', 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tutor`
--

CREATE TABLE `tb_tutor` (
  `id_tutor` varchar(6) NOT NULL,
  `nama_lengkap_tutor` varchar(250) NOT NULL,
  `nama_panggilan_tutor` varchar(250) NOT NULL,
  `email_tutor` varchar(250) NOT NULL,
  `password_tutor` varchar(250) NOT NULL,
  `jurusan_tutor` varchar(250) NOT NULL,
  `universitas_tutor` varchar(250) NOT NULL,
  `provinsi` varchar(250) NOT NULL,
  `kabupaten_kota` varchar(250) NOT NULL,
  `matapelajaran_tempuh` varchar(250) NOT NULL,
  `setujui_tutor` varchar(100) NOT NULL,
  `quotes_tutor` varchar(1000) NOT NULL,
  `gambar_guru` varchar(250) NOT NULL,
  `kode_referral` varchar(250) NOT NULL,
  `no_whatsapp_tutor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tutor`
--

INSERT INTO `tb_tutor` (`id_tutor`, `nama_lengkap_tutor`, `nama_panggilan_tutor`, `email_tutor`, `password_tutor`, `jurusan_tutor`, `universitas_tutor`, `provinsi`, `kabupaten_kota`, `matapelajaran_tempuh`, `setujui_tutor`, `quotes_tutor`, `gambar_guru`, `kode_referral`, `no_whatsapp_tutor`) VALUES
('PST003', 'Test', 'Aja', 'pepengajah29@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Teknik industri', 'UI', 'Banten', 'Tangerang', 'IPA', 'Ya', '', '', '', '123456789'),
('PST004', 'Test 2', 'Bae', 'pepengajah55@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Teknik industri', 'UI', 'Banten', 'Tangerang', 'IPA', 'Ya', '', '', 'TEST', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tutorial`
--

CREATE TABLE `tb_tutorial` (
  `id_tutorial` int(11) NOT NULL,
  `jenis_tutorial` varchar(250) DEFAULT NULL,
  `isi_tutorial` varchar(5000) DEFAULT NULL,
  `link_video` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tutorial`
--

INSERT INTO `tb_tutorial` (`id_tutorial`, `jenis_tutorial`, `isi_tutorial`, `link_video`) VALUES
(1, 'Pemesanan (Siswa)', 'hello', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indexes for table `tb_blog_comment`
--
ALTER TABLE `tb_blog_comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `tb_content_instagram`
--
ALTER TABLE `tb_content_instagram`
  ADD PRIMARY KEY (`id_content_ig`);

--
-- Indexes for table `tb_faq`
--
ALTER TABLE `tb_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `tb_filterbiayales`
--
ALTER TABLE `tb_filterbiayales`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `tb_kategori_blog`
--
ALTER TABLE `tb_kategori_blog`
  ADD PRIMARY KEY (`id_katblog`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_komisi_tutor`
--
ALTER TABLE `tb_komisi_tutor`
  ADD PRIMARY KEY (`id_komisi`);

--
-- Indexes for table `tb_kotaksaran`
--
ALTER TABLE `tb_kotaksaran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `tb_levelkurikulum`
--
ALTER TABLE `tb_levelkurikulum`
  ADD PRIMARY KEY (`id_levelkurikulum`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_namaprogramles`
--
ALTER TABLE `tb_namaprogramles`
  ADD PRIMARY KEY (`id_namaprogram`);

--
-- Indexes for table `tb_paket_belajar`
--
ALTER TABLE `tb_paket_belajar`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_panduan_jadipengajar`
--
ALTER TABLE `tb_panduan_jadipengajar`
  ADD PRIMARY KEY (`id_panduan_jadipengajar`);

--
-- Indexes for table `tb_pesanan_les`
--
ALTER TABLE `tb_pesanan_les`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_ratting_tutor`
--
ALTER TABLE `tb_ratting_tutor`
  ADD PRIMARY KEY (`id_ratting`);

--
-- Indexes for table `tb_rekeningpistar`
--
ALTER TABLE `tb_rekeningpistar`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tb_siswawali_user`
--
ALTER TABLE `tb_siswawali_user`
  ADD PRIMARY KEY (`id_siswawali`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `tb_syarat_ketentuan`
--
ALTER TABLE `tb_syarat_ketentuan`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `tb_tentang_pistar`
--
ALTER TABLE `tb_tentang_pistar`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `tb_testimoni_siswa`
--
ALTER TABLE `tb_testimoni_siswa`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `tb_testimoni_tutor`
--
ALTER TABLE `tb_testimoni_tutor`
  ADD PRIMARY KEY (`id_testi_tutor`);

--
-- Indexes for table `tb_tutor`
--
ALTER TABLE `tb_tutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- Indexes for table `tb_tutorial`
--
ALTER TABLE `tb_tutorial`
  ADD PRIMARY KEY (`id_tutorial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_blog_comment`
--
ALTER TABLE `tb_blog_comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_content_instagram`
--
ALTER TABLE `tb_content_instagram`
  MODIFY `id_content_ig` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_faq`
--
ALTER TABLE `tb_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_filterbiayales`
--
ALTER TABLE `tb_filterbiayales`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_kategori_blog`
--
ALTER TABLE `tb_kategori_blog`
  MODIFY `id_katblog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_komisi_tutor`
--
ALTER TABLE `tb_komisi_tutor`
  MODIFY `id_komisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kotaksaran`
--
ALTER TABLE `tb_kotaksaran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_levelkurikulum`
--
ALTER TABLE `tb_levelkurikulum`
  MODIFY `id_levelkurikulum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_namaprogramles`
--
ALTER TABLE `tb_namaprogramles`
  MODIFY `id_namaprogram` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_paket_belajar`
--
ALTER TABLE `tb_paket_belajar`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_panduan_jadipengajar`
--
ALTER TABLE `tb_panduan_jadipengajar`
  MODIFY `id_panduan_jadipengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_ratting_tutor`
--
ALTER TABLE `tb_ratting_tutor`
  MODIFY `id_ratting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_rekeningpistar`
--
ALTER TABLE `tb_rekeningpistar`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_syarat_ketentuan`
--
ALTER TABLE `tb_syarat_ketentuan`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tentang_pistar`
--
ALTER TABLE `tb_tentang_pistar`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_testimoni_siswa`
--
ALTER TABLE `tb_testimoni_siswa`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_testimoni_tutor`
--
ALTER TABLE `tb_testimoni_tutor`
  MODIFY `id_testi_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_tutorial`
--
ALTER TABLE `tb_tutorial`
  MODIFY `id_tutorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
