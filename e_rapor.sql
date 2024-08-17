-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2023 pada 10.12
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_rapor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_akademik`
--

CREATE TABLE `data_akademik` (
  `id_akademik` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `id_guru` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_thnAkd` int(5) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_akademik`
--

INSERT INTO `data_akademik` (`id_akademik`, `id_siswa`, `id_guru`, `id_kelas`, `id_thnAkd`, `semester`, `tahun`) VALUES
(26, 26, 4, 1, 1, 1, '2023'),
(27, 27, 4, 1, 1, 1, '2023'),
(28, 28, 4, 1, 1, 1, '2023'),
(29, 29, 4, 1, 1, 1, '2023'),
(30, 30, 4, 1, 1, 1, '2023'),
(31, 31, 4, 1, 1, 1, '2023'),
(32, 32, 4, 1, 1, 1, '2023'),
(33, 33, 4, 1, 1, 1, '2023'),
(34, 34, 4, 1, 1, 1, '2023'),
(35, 35, 4, 1, 1, 1, '2023'),
(36, 36, 4, 1, 1, 1, '2023'),
(37, 37, 4, 1, 1, 1, '2023'),
(38, 38, 4, 1, 1, 1, '2023'),
(39, 39, 4, 1, 1, 1, '2023'),
(40, 40, 4, 1, 1, 1, '2023'),
(41, 41, 4, 1, 1, 1, '2023'),
(42, 42, 4, 1, 1, 1, '2023'),
(43, 43, 4, 1, 1, 1, '2023'),
(44, 44, 4, 1, 1, 1, '2023'),
(45, 45, 4, 1, 1, 1, '2023'),
(46, 46, 5, 2, 1, 1, '2023'),
(47, 47, 5, 2, 1, 1, '2023'),
(48, 48, 5, 2, 1, 1, '2023'),
(49, 49, 5, 2, 1, 1, '2023'),
(50, 50, 5, 2, 1, 1, '2023'),
(51, 51, 5, 2, 1, 1, '2023'),
(52, 52, 5, 2, 1, 1, '2023'),
(53, 53, 5, 2, 1, 1, '2023'),
(54, 54, 5, 2, 1, 1, '2023'),
(55, 55, 5, 2, 1, 1, '2023'),
(56, 56, 5, 2, 1, 1, '2023'),
(57, 57, 5, 2, 1, 1, '2023'),
(58, 58, 5, 2, 1, 1, '2023'),
(59, 59, 5, 2, 1, 1, '2023'),
(60, 60, 5, 2, 1, 1, '2023'),
(61, 61, 5, 2, 1, 1, '2023'),
(62, 62, 5, 2, 1, 1, '2023'),
(63, 63, 5, 2, 1, 1, '2023'),
(64, 64, 5, 2, 1, 1, '2023'),
(65, 65, 5, 2, 1, 1, '2023'),
(66, 66, 5, 2, 1, 1, '2023'),
(67, 67, 5, 2, 1, 1, '2023'),
(68, 68, 5, 2, 1, 1, '2023'),
(69, 69, 5, 2, 1, 1, '2023'),
(70, 70, 5, 2, 1, 1, '2023'),
(71, 71, 5, 2, 1, 1, '2023'),
(72, 72, 5, 2, 1, 1, '2023'),
(73, 73, 5, 2, 1, 1, '2023'),
(74, 74, 5, 2, 1, 1, '2023'),
(75, 75, 5, 2, 1, 1, '2023'),
(76, 76, 5, 2, 1, 1, '2023'),
(77, 77, 5, 2, 1, 1, '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(5) NOT NULL,
  `guru_userid` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_bekerja` date DEFAULT NULL,
  `tgl_pensiun` date DEFAULT NULL,
  `alamat_gmaps` varchar(1000) DEFAULT NULL,
  `jk` varchar(10) NOT NULL,
  `pend_terakhir` varchar(50) NOT NULL,
  `gelar` varchar(10) NOT NULL,
  `bidang_ilmu` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `guru_userid`, `nama`, `nip`, `id_kelas`, `no_hp`, `alamat`, `tgl_lahir`, `tgl_bekerja`, `tgl_pensiun`, `alamat_gmaps`, `jk`, `pend_terakhir`, `gelar`, `bidang_ilmu`, `gambar`, `created_at`, `updated_at`) VALUES
(4, 5, 'A. Jumandi', '3298323', 1, 0, '  PAMEKASAN TLANAKAN', '1987-01-23', '2017-08-01', '0000-00-00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7916.415200175198!2d113.45026138154775!3d-7.217144831272901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd77fb6bec99873%3A0x54a0fbefe0657fe3!2sPP.%20Dakwatul%20Khairat%20P.A%20Al-Madani!5e0!3m2!1sid!2sid!4v1692624185624!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'L', 'sarjana', 'S.Kom', 'Informatika', 'default.jpeg', '2023-08-01 12:45:01', '2023-08-01 12:45:01'),
(5, 6, 'Moh Syaiful', '201209938928831', 2, 0, ' PAMEKASAN TLANAKAN', '1979-05-10', '2019-08-15', '0000-00-00', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1979.0897292518434!2d113.45694196204617!3d-7.220360920545443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd77eb76b201157%3A0x1889adcbc83d343a!2sLPI%20MAMBAUL%20ULUM%20BRANTA%20TINGGI!5e0!3m2!1sid!2sid!4v1692623812309!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'L', 'sarjana', 'S.Pd', '-', 'default.jpeg', '2023-08-10 18:42:32', '2023-08-10 18:42:32'),
(7, 9, 'Deddy Armanda', '0', 0, 0, 'PAMEKASAN BUGIH', '2000-01-23', '2023-08-21', '0001-01-01', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d588.4784994930822!2d113.47448484763427!3d-7.149607756989748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssmk%20al%20madani%20tlanakan!5e0!3m2!1sid!2sid!4v1692624422906!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'L', 'sarjana', 'S.Kom', '', 'default.jpeg', '2023-08-21 20:27:29', '2023-08-21 20:27:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelas`
--

CREATE TABLE `data_kelas` (
  `id_kelas` int(5) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`, `status`, `created_at`, `updated_at`) VALUES
(1, 'X', 'aktif', '2023-08-01 09:03:02', '2023-08-01 09:03:06'),
(2, 'XI', 'aktif', '2023-08-01 13:57:35', '2023-08-01 13:57:35'),
(4, 'XII', 'aktif', '2023-08-01 14:18:43', '2023-08-01 14:18:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mapel`
--

CREATE TABLE `data_mapel` (
  `id_Dmapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_mapel`
--

INSERT INTO `data_mapel` (`id_Dmapel`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Ilmu Pengetahuan Alam (IPA)', '2023-08-08 19:22:04', '2023-08-08 19:22:04'),
(2, 'Ilmu Pengetahuan Sosial (IPS)', '2023-08-08 20:00:29', '2023-08-08 20:00:29'),
(3, 'MATEMATIKA', '2023-08-08 20:01:20', '2023-08-08 20:01:20'),
(4, 'P. AGAMA', '2023-08-08 20:01:55', '2023-08-08 20:01:55'),
(7, 'PKN', '2023-08-15 23:53:28', '2023-08-15 23:53:28'),
(8, 'Bahasa Indonesia', '2023-08-15 23:53:45', '2023-08-15 23:53:45'),
(9, 'Bahasa Inggris', '2023-08-15 23:54:07', '2023-08-15 23:54:07'),
(10, 'SBDP', '2023-08-15 23:54:36', '2023-08-15 23:54:36'),
(11, 'Penjaskes', '2023-08-15 23:55:09', '2023-08-15 23:55:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `sekolah_asal` varchar(255) NOT NULL,
  `ortu_ayah` varchar(100) NOT NULL,
  `ortu_ibu` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nama_siswa`, `nisn`, `tgl_lahir`, `tempat_lahir`, `jk`, `agama`, `alamat`, `no_hp`, `sekolah_asal`, `ortu_ayah`, `ortu_ibu`, `pekerjaan_ortu`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(26, 'MAFRUROH', '0039248787', '01 Juli 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Samarno', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'KHODEIFAH', '0021358279', '14 November 2002', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Ahmad Hosen', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'FAIDHATUL JANNAH', '0019223522', '11 November 2001', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Bulhari', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'DEWI ANISAH', '0026977098', '25 November 2002', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Mat Betrih', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'MAULIDIYAH WATI', '0023117019', '03 Juni 2002', 'Sampang', 'P', 'islam', 'Pamekasan', 0, '-', 'Stanis Laus Taru', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'DESI SUTIANA BUDIARTI', '0039271944', '08 Juli 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Agus Budi Hartono', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'NADIA AGUSTIN', '0006909031', '12 Juli 2000', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Sulistiyono', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'DWI MASYI\'ATUS  SYARIFAH', '0010220552', '19 Juli 2001', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Moh. Maswan', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'KIBRATUL UMMAH', '0003409584', '27 November 2000', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Mashudi', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'NOFI YANTI', '0062975992', ' 01 Agustus 2001', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Nawari', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'FARHATUN HUSNI', '0011986917', '22 September 2001', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Sekar', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'UYUNATUL MUSARROFAH', '0019373920', '05 Mei 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Mattarah', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'SOFIATUR RISKIYAH', '0006829527', '29 Desember 2000', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Moh. Alwi', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'YULI ASTUTIK', '0026976301', '05 April 2002', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Siman', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'MUTIMATUS SHOLEHAH', '0010220557', '17 September', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Safidin', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'SITTI KHAIRUNNISA', '0013166122', '24 Februari 2001', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Sri Sugiarto', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'ISRIYANI', '0026975891', ' 03 Oktober 2002', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Budi Santoso', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'MUNA SAFITRI', '0035564763', '01 Juni 2003', 'Pontianak', 'P', 'islam', 'Pamekasan', 0, '-', 'Subandi', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'MILA SORAYA', '0024926367', '17 November 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Buhari', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'RUMIYATI', '0032346803', '22 April 2002', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Marsa\'i', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'AMELIA MAHMUDANA', '0038890444', '30 Juni 2003', 'Surabaya', 'P', 'islam', 'Pamekasan', 0, '-', 'Ali Mahmud', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'BELA SALSABILA', '0038235701', '06 Februari 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Patli', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'DESI FATMAWATI', '0035704536', '17 Juli 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Hatimah', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'DEWI SAGITA', '52951491', '01-11 Januari 2005', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Moh. Pandat', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'DIAN AYU', '0049206350', '08 Agustus 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Sumyati', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'HOLIPAH', '0052951491', '15 September 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Abdussalam', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'HOTIMATUS ZAHROH', '0047252487', '20 Agustus 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Toyyiman', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'IFADHATUS SA\'ADAH', '0046739273', '29 November 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Amina', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'Ismawati', '3032728420', '08 Desember 2003', 'Malang', 'P', 'islam', 'Pamekasan', 0, '-', 'Salam', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'KHOIRIYAH', '0039029878', '04 Agustus 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Dulsa\'at', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'LELI AGUSTINI', '0046098498', '22 Agustus 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Aryanto', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'LIVIA APRILIANTI', '0044335040', '08 April 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Angrito', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'MARFU\'AH', '0037121425', ' 01 Juli 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Mohammad', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'MARIA ULFA', '3032306278', '12 Juni 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Hasan', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'MASRUROH', '0033555899', '08 November 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Haderi', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'MISYANA', '0050957918', '05 Maret 2005', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Suhri', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'MUIZATUL AINIYAH', '0048054200', '15 Desember 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Fathor Rosi', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'NUFI RAMADANIA', '0038275848', '13 November 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Zeri', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'PUTRI NORHALISA', '0035570847', ' 03 November 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'SATORI', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'QOMARIYAH', '0034323264', '08 Juli 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Lukman', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'RAHMALIA', '0032790162', '18 November 2003', 'Sampang', 'P', 'islam', 'Pamekasan', 0, '-', 'AMIN', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'RAUDHOTUL JANNAH', '0035553583', '22 Desember 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Imam Tantowi', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'RUSTINI', '0049349704', '20 November 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Jusan', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'SAHRIYAH', '0005089308', ' 03 Oktober 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Saimah', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'SERLY RAHMA', '0046098571', '14 Juli 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Subairi', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'SINDY ALFINA', '0050957924', '02 Juli 2005', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Marluto', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'SITTI KHOZEIMAH', '0038438143', '11 Mei 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Moh Jasuli', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'SUQIYATUL AINI', '0057813298', '16 Januari 2005', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Husin', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'TOIBAH', '0038199044', '08 Mei 2003', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Murnasit', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'ULFATUL KHOMARIYAH', '0012287896', '14 Januari 2001', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Syafiih', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'WARDATUT TIBAH', '0036886489', '16 Agustus 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Sanidin', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'YUNITA LESTARI', '0044910430', '06 November 2004', 'Pamekasan', 'P', 'islam', 'Pamekasan', 0, '-', 'Shaib', 'null', 'null', 'default.jpeg', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_tugas`
--

CREATE TABLE `data_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `materi` varchar(100) NOT NULL,
  `tgl_tugas` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_tugas`
--

INSERT INTO `data_tugas` (`id_tugas`, `id_mapel`, `materi`, `tgl_tugas`) VALUES
(16, 8, 'tugas 1 IPA kelas X', '2023-01-01'),
(20, 8, 'tugas 2 IPA kelas X', '2023-02-05'),
(21, 9, 'tugas 1 ipa kelas XI', '2023-08-01'),
(22, 9, 'tugas 2 ipa kelas XI', '2023-08-08'),
(23, 10, 'Tugas 1 IPS Kelas IX', '2023-08-01'),
(24, 10, 'Tugas 2 IPS Kelas XI', '2023-08-07'),
(25, 11, 'Tugas 1 Matematika Kelas X', '2023-08-01'),
(26, 11, 'Tugas 2 MTK kelas X', '2023-08-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(5) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_Dmapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_thnAkd` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_guru`, `id_Dmapel`, `id_kelas`, `id_thnAkd`, `created_at`, `updated_at`) VALUES
(8, 4, 1, 1, 1, '2023-08-15 15:34:50', '2023-08-15 15:34:50'),
(9, 4, 1, 2, 1, '2023-08-15 19:30:39', '2023-08-15 19:30:39'),
(10, 5, 2, 1, 1, '2023-08-15 19:34:00', '2023-08-15 19:34:00'),
(11, 7, 3, 1, 1, '2023-08-21 21:01:42', '2023-08-21 21:01:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(74, '2023-07-09-050431', 'App\\Database\\Migrations\\Datakelas', 'default', 'App', 1688906666, 1),
(75, '2023-07-09-061242', 'App\\Database\\Migrations\\DataGuru', 'default', 'App', 1688906667, 1),
(76, '2023-07-09-065851', 'App\\Database\\Migrations\\Mapel', 'default', 'App', 1688906667, 1),
(77, '2023-07-09-070814', 'App\\Database\\Migrations\\KriteriaMapel', 'default', 'App', 1688906667, 1),
(78, '2023-07-09-113158', 'App\\Database\\Migrations\\NilaiRapor', 'default', 'App', 1688906668, 1),
(79, '2023-07-09-115548', 'App\\Database\\Migrations\\TahunAkademik', 'default', 'App', 1688906668, 1),
(80, '2023-07-09-121121', 'App\\Database\\Migrations\\DataAkademik', 'default', 'App', 1688906668, 1),
(81, '2023-07-09-122551', 'App\\Database\\Migrations\\Users', 'default', 'App', 1688906669, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_rapor`
--

CREATE TABLE `nilai_rapor` (
  `id_nilai` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `nilai` int(5) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `id_thnAkd` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `nilai_rapor`
--

INSERT INTO `nilai_rapor` (`id_nilai`, `id_mapel`, `id_siswa`, `nilai`, `deskripsi`, `id_thnAkd`, `created_at`, `updated_at`) VALUES
(12, 8, 26, 82, 'Ananda MAFRUROH', 1, '2023-08-15 17:57:44', '2023-08-15 17:57:44'),
(13, 8, 27, 80, 'Ananda KHODEIFAH', 1, '2023-08-15 17:58:47', '2023-08-15 17:58:47'),
(14, 10, 26, 79, 'Ananda MAFRUROH', 1, '2023-08-15 19:36:26', '2023-08-15 19:36:26'),
(15, 10, 27, 82, 'Ananda KHODEIFAH', 1, '2023-08-15 19:36:38', '2023-08-15 19:36:38'),
(16, 9, 46, 79, 'Ananda AMELIA MAHMUDANA', 1, '2023-08-15 19:39:43', '2023-08-15 19:39:43'),
(17, 9, 47, 77, 'Ananda BELA SALSABILA', 1, '2023-08-15 19:39:55', '2023-08-15 19:39:55'),
(18, 8, 28, 83, 'Ananda FAIDHATUL JANNAH', 1, '2023-08-16 09:11:50', '2023-08-16 09:11:50'),
(19, 10, 28, 84, 'Ananda FAIDHATUL JANNAH', 1, '2023-08-16 09:13:52', '2023-08-16 09:13:52'),
(20, 11, 26, 82, 'Ananda MAFRUROH', 1, '2023-08-21 21:04:18', '2023-08-21 21:04:18'),
(21, 11, 27, 80, 'Ananda KHODEIFAH', 1, '2023-08-21 21:04:31', '2023-08-21 21:04:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_tugas`
--

CREATE TABLE `nilai_tugas` (
  `id_nTugas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_tugas`
--

INSERT INTO `nilai_tugas` (`id_nTugas`, `id_tugas`, `id_siswa`, `nilai_tugas`) VALUES
(31, 16, 26, 85),
(32, 16, 27, 80),
(33, 16, 28, 80),
(34, 16, 29, 77),
(35, 16, 30, 78),
(36, 16, 31, 0),
(37, 16, 32, 0),
(38, 16, 33, 0),
(39, 16, 34, 0),
(40, 16, 35, 80),
(41, 16, 36, 0),
(42, 16, 37, 0),
(43, 16, 38, 0),
(44, 16, 39, 0),
(45, 16, 40, 0),
(46, 16, 41, 0),
(47, 16, 42, 0),
(48, 16, 43, 0),
(49, 16, 44, 0),
(50, 16, 45, 77),
(111, 20, 26, 85),
(112, 20, 27, 80),
(113, 20, 28, 89),
(114, 20, 29, 0),
(115, 20, 30, 0),
(116, 20, 31, 0),
(117, 20, 32, 0),
(118, 20, 33, 0),
(119, 20, 34, 0),
(120, 20, 35, 0),
(121, 20, 36, 0),
(122, 20, 37, 0),
(123, 20, 38, 0),
(124, 20, 39, 0),
(125, 20, 40, 0),
(126, 20, 41, 0),
(127, 20, 42, 0),
(128, 20, 43, 0),
(129, 20, 44, 0),
(130, 20, 45, 0),
(131, 21, 46, 77),
(132, 21, 47, 75),
(133, 21, 48, 0),
(134, 21, 49, 0),
(135, 21, 50, 0),
(136, 21, 51, 0),
(137, 21, 52, 0),
(138, 21, 53, 0),
(139, 21, 54, 0),
(140, 21, 55, 0),
(141, 21, 56, 0),
(142, 21, 57, 0),
(143, 21, 58, 0),
(144, 21, 59, 0),
(145, 21, 60, 0),
(146, 21, 61, 0),
(147, 21, 62, 0),
(148, 21, 63, 0),
(149, 21, 64, 0),
(150, 21, 65, 0),
(151, 21, 66, 0),
(152, 21, 67, 0),
(153, 21, 68, 0),
(154, 21, 69, 0),
(155, 21, 70, 0),
(156, 21, 71, 0),
(157, 21, 72, 0),
(158, 21, 73, 0),
(159, 21, 74, 0),
(160, 21, 75, 0),
(161, 21, 76, 0),
(162, 21, 77, 0),
(163, 22, 46, 85),
(164, 22, 47, 75),
(165, 22, 48, 0),
(166, 22, 49, 0),
(167, 22, 50, 0),
(168, 22, 51, 0),
(169, 22, 52, 0),
(170, 22, 53, 0),
(171, 22, 54, 0),
(172, 22, 55, 0),
(173, 22, 56, 0),
(174, 22, 57, 0),
(175, 22, 58, 0),
(176, 22, 59, 0),
(177, 22, 60, 0),
(178, 22, 61, 0),
(179, 22, 62, 0),
(180, 22, 63, 0),
(181, 22, 64, 0),
(182, 22, 65, 0),
(183, 22, 66, 0),
(184, 22, 67, 0),
(185, 22, 68, 0),
(186, 22, 69, 0),
(187, 22, 70, 0),
(188, 22, 71, 0),
(189, 22, 72, 0),
(190, 22, 73, 0),
(191, 22, 74, 0),
(192, 22, 75, 0),
(193, 22, 76, 0),
(194, 22, 77, 0),
(195, 23, 26, 77),
(196, 23, 27, 77),
(197, 23, 28, 80),
(198, 23, 29, 0),
(199, 23, 30, 0),
(200, 23, 31, 0),
(201, 23, 32, 0),
(202, 23, 33, 0),
(203, 23, 34, 0),
(204, 23, 35, 0),
(205, 23, 36, 0),
(206, 23, 37, 0),
(207, 23, 38, 0),
(208, 23, 39, 0),
(209, 23, 40, 0),
(210, 23, 41, 0),
(211, 23, 42, 0),
(212, 23, 43, 0),
(213, 23, 44, 0),
(214, 23, 45, 0),
(215, 24, 26, 85),
(216, 24, 27, 86),
(217, 24, 28, 83),
(218, 24, 29, 0),
(219, 24, 30, 0),
(220, 24, 31, 0),
(221, 24, 32, 0),
(222, 24, 33, 0),
(223, 24, 34, 0),
(224, 24, 35, 0),
(225, 24, 36, 0),
(226, 24, 37, 0),
(227, 24, 38, 0),
(228, 24, 39, 0),
(229, 24, 40, 0),
(230, 24, 41, 0),
(231, 24, 42, 0),
(232, 24, 43, 0),
(233, 24, 44, 0),
(234, 24, 45, 0),
(235, 25, 26, 88),
(236, 25, 27, 76),
(237, 25, 28, 0),
(238, 25, 29, 0),
(239, 25, 30, 0),
(240, 25, 31, 0),
(241, 25, 32, 0),
(242, 25, 33, 0),
(243, 25, 34, 0),
(244, 25, 35, 0),
(245, 25, 36, 0),
(246, 25, 37, 0),
(247, 25, 38, 0),
(248, 25, 39, 0),
(249, 25, 40, 0),
(250, 25, 41, 0),
(251, 25, 42, 0),
(252, 25, 43, 0),
(253, 25, 44, 0),
(254, 25, 45, 0),
(255, 26, 26, 85),
(256, 26, 27, 85),
(257, 26, 28, 0),
(258, 26, 29, 0),
(259, 26, 30, 0),
(260, 26, 31, 0),
(261, 26, 32, 0),
(262, 26, 33, 0),
(263, 26, 34, 0),
(264, 26, 35, 0),
(265, 26, 36, 0),
(266, 26, 37, 0),
(267, 26, 38, 0),
(268, 26, 39, 0),
(269, 26, 40, 0),
(270, 26, 41, 0),
(271, 26, 42, 0),
(272, 26, 43, 0),
(273, 26, 44, 0),
(274, 26, 45, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_ujian`
--

CREATE TABLE `nilai_ujian` (
  `id_nUjian` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_ujian`
--

INSERT INTO `nilai_ujian` (`id_nUjian`, `id_ujian`, `nilai`, `id_siswa`) VALUES
(15, 11, 80, 26),
(16, 11, 79, 27),
(17, 11, 85, 28),
(18, 11, 0, 29),
(19, 11, 0, 30),
(20, 11, 0, 31),
(21, 11, 0, 32),
(22, 11, 0, 33),
(23, 11, 0, 34),
(24, 11, 0, 35),
(25, 11, 0, 36),
(26, 11, 0, 37),
(27, 11, 0, 38),
(28, 11, 0, 39),
(29, 11, 0, 40),
(30, 11, 0, 41),
(31, 11, 0, 42),
(32, 11, 0, 43),
(33, 11, 0, 44),
(34, 11, 0, 45),
(35, 12, 78, 26),
(36, 12, 80, 27),
(37, 12, 80, 28),
(38, 12, 0, 29),
(39, 12, 0, 30),
(40, 12, 0, 31),
(41, 12, 0, 32),
(42, 12, 0, 33),
(43, 12, 0, 34),
(44, 12, 0, 35),
(45, 12, 0, 36),
(46, 12, 0, 37),
(47, 12, 0, 38),
(48, 12, 0, 39),
(49, 12, 0, 40),
(50, 12, 0, 41),
(51, 12, 0, 42),
(52, 12, 0, 43),
(53, 12, 0, 44),
(54, 12, 0, 45),
(55, 13, 80, 46),
(56, 13, 77, 47),
(57, 13, 0, 48),
(58, 13, 0, 49),
(59, 13, 0, 50),
(60, 13, 0, 51),
(61, 13, 0, 52),
(62, 13, 0, 53),
(63, 13, 0, 54),
(64, 13, 0, 55),
(65, 13, 0, 56),
(66, 13, 0, 57),
(67, 13, 0, 58),
(68, 13, 0, 59),
(69, 13, 0, 60),
(70, 13, 0, 61),
(71, 13, 0, 62),
(72, 13, 0, 63),
(73, 13, 0, 64),
(74, 13, 0, 65),
(75, 13, 0, 66),
(76, 13, 0, 67),
(77, 13, 0, 68),
(78, 13, 0, 69),
(79, 13, 0, 70),
(80, 13, 0, 71),
(81, 13, 0, 72),
(82, 13, 0, 73),
(83, 13, 0, 74),
(84, 13, 0, 75),
(85, 13, 0, 76),
(86, 13, 0, 77),
(87, 14, 75, 46),
(88, 14, 80, 47),
(89, 14, 0, 48),
(90, 14, 0, 49),
(91, 14, 0, 50),
(92, 14, 0, 51),
(93, 14, 0, 52),
(94, 14, 0, 53),
(95, 14, 0, 54),
(96, 14, 0, 55),
(97, 14, 0, 56),
(98, 14, 0, 57),
(99, 14, 0, 58),
(100, 14, 0, 59),
(101, 14, 0, 60),
(102, 14, 0, 61),
(103, 14, 0, 62),
(104, 14, 0, 63),
(105, 14, 0, 64),
(106, 14, 0, 65),
(107, 14, 0, 66),
(108, 14, 0, 67),
(109, 14, 0, 68),
(110, 14, 0, 69),
(111, 14, 0, 70),
(112, 14, 0, 71),
(113, 14, 0, 72),
(114, 14, 0, 73),
(115, 14, 0, 74),
(116, 14, 0, 75),
(117, 14, 0, 76),
(118, 14, 0, 77),
(119, 15, 75, 26),
(120, 15, 80, 27),
(121, 15, 85, 28),
(122, 15, 0, 29),
(123, 15, 0, 30),
(124, 15, 0, 31),
(125, 15, 0, 32),
(126, 15, 0, 33),
(127, 15, 0, 34),
(128, 15, 0, 35),
(129, 15, 0, 36),
(130, 15, 0, 37),
(131, 15, 0, 38),
(132, 15, 0, 39),
(133, 15, 0, 40),
(134, 15, 0, 41),
(135, 15, 0, 42),
(136, 15, 0, 43),
(137, 15, 0, 44),
(138, 15, 0, 45),
(139, 16, 79, 26),
(140, 16, 85, 27),
(141, 16, 89, 28),
(142, 16, 0, 29),
(143, 16, 0, 30),
(144, 16, 0, 31),
(145, 16, 0, 32),
(146, 16, 0, 33),
(147, 16, 0, 34),
(148, 16, 0, 35),
(149, 16, 0, 36),
(150, 16, 0, 37),
(151, 16, 0, 38),
(152, 16, 0, 39),
(153, 16, 0, 40),
(154, 16, 0, 41),
(155, 16, 0, 42),
(156, 16, 0, 43),
(157, 16, 0, 44),
(158, 16, 0, 45),
(159, 17, 76, 26),
(160, 17, 80, 27),
(161, 17, 0, 28),
(162, 17, 0, 29),
(163, 17, 0, 30),
(164, 17, 0, 31),
(165, 17, 0, 32),
(166, 17, 0, 33),
(167, 17, 0, 34),
(168, 17, 0, 35),
(169, 17, 0, 36),
(170, 17, 0, 37),
(171, 17, 0, 38),
(172, 17, 0, 39),
(173, 17, 0, 40),
(174, 17, 0, 41),
(175, 17, 0, 42),
(176, 17, 0, 43),
(177, 17, 0, 44),
(178, 17, 0, 45),
(179, 18, 79, 26),
(180, 18, 78, 27),
(181, 18, 0, 28),
(182, 18, 0, 29),
(183, 18, 0, 30),
(184, 18, 0, 31),
(185, 18, 0, 32),
(186, 18, 0, 33),
(187, 18, 0, 34),
(188, 18, 0, 35),
(189, 18, 0, 36),
(190, 18, 0, 37),
(191, 18, 0, 38),
(192, 18, 0, 39),
(193, 18, 0, 40),
(194, 18, 0, 41),
(195, 18, 0, 42),
(196, 18, 0, 43),
(197, 18, 0, 44),
(198, 18, 0, 45);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id_profil` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nip_kepsek` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id_profil`, `nama_sekolah`, `alamat`, `kepsek`, `nip_kepsek`, `logo`) VALUES
(1, 'SMK AL-MADANIYAH', 'Tlanakan Pamekasan', 'SAHIRULLAH,S.P.d', '1092100121212', 'default.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id_thnAkd` int(5) NOT NULL,
  `nama_tahun` varchar(100) NOT NULL,
  `semester` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id_thnAkd`, `nama_tahun`, `semester`, `status`) VALUES
(1, '2023/2024', 1, 1),
(3, '2023/2024', 2, 0),
(4, '2024/2025', 1, 0),
(5, '2024/2025', 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tgl_rapor`
--

CREATE TABLE `tgl_rapor` (
  `id_tglRapor` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_thnAkd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tgl_rapor`
--

INSERT INTO `tgl_rapor` (`id_tglRapor`, `tanggal`, `id_thnAkd`) VALUES
(1, '2023-08-15', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `tipe_ujian` varchar(50) NOT NULL,
  `tgl_ujian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `id_mapel`, `tipe_ujian`, `tgl_ujian`) VALUES
(3, 1, 'uts', '2023-08-15'),
(6, 1, 'uas', '2023-08-14'),
(7, 2, 'uts', '2023-08-15'),
(8, 2, 'uas', '2023-08-17'),
(9, 7, 'uts', '2023-08-16'),
(10, 7, 'uas', '2023-08-24'),
(11, 8, 'uts', '2023-07-15'),
(12, 8, 'uas', '2023-08-17'),
(13, 9, 'uts', '2023-08-17'),
(14, 9, 'uas', '2023-08-24'),
(15, 10, 'uts', '2023-08-14'),
(16, 10, 'uas', '2023-08-16'),
(17, 11, 'uts', '2023-08-14'),
(18, 11, 'uas', '2023-08-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1),
(5, 'guru', 'guru', 2),
(6, 'guru1', 'guru1', 2),
(9, 'dd1', 'dd1', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_akademik`
--
ALTER TABLE `data_akademik`
  ADD PRIMARY KEY (`id_akademik`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_tahun` (`id_thnAkd`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `guru_userid` (`guru_userid`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  ADD PRIMARY KEY (`id_Dmapel`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `data_tugas`
--
ALTER TABLE `data_tugas`
  ADD PRIMARY KEY (`id_tugas`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_Dmapel` (`id_Dmapel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `nilai_rapor_ibfk_1` (`id_mapel`),
  ADD KEY `id_thnAkd` (`id_thnAkd`);

--
-- Indeks untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  ADD PRIMARY KEY (`id_nTugas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `nilai_tugas_ibfk_1` (`id_tugas`);

--
-- Indeks untuk tabel `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD PRIMARY KEY (`id_nUjian`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indeks untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id_thnAkd`);

--
-- Indeks untuk tabel `tgl_rapor`
--
ALTER TABLE `tgl_rapor`
  ADD PRIMARY KEY (`id_tglRapor`),
  ADD KEY `id_thnAkd` (`id_thnAkd`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_akademik`
--
ALTER TABLE `data_akademik`
  MODIFY `id_akademik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `data_kelas`
--
ALTER TABLE `data_kelas`
  MODIFY `id_kelas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_mapel`
--
ALTER TABLE `data_mapel`
  MODIFY `id_Dmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `data_tugas`
--
ALTER TABLE `data_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  MODIFY `id_nilai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  MODIFY `id_nTugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT untuk tabel `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  MODIFY `id_nUjian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id_thnAkd` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tgl_rapor`
--
ALTER TABLE `tgl_rapor`
  MODIFY `id_tglRapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_akademik`
--
ALTER TABLE `data_akademik`
  ADD CONSTRAINT `data_akademik_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `data_guru` (`id_guru`),
  ADD CONSTRAINT `data_akademik_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`),
  ADD CONSTRAINT `data_akademik_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id_siswa`),
  ADD CONSTRAINT `data_akademik_ibfk_4` FOREIGN KEY (`id_thnAkd`) REFERENCES `tahun_akademik` (`id_thnAkd`);

--
-- Ketidakleluasaan untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD CONSTRAINT `data_guru_ibfk_1` FOREIGN KEY (`guru_userid`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `data_tugas`
--
ALTER TABLE `data_tugas`
  ADD CONSTRAINT `data_tugas_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `data_guru` (`id_guru`),
  ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`id_Dmapel`) REFERENCES `data_mapel` (`id_Dmapel`);

--
-- Ketidakleluasaan untuk tabel `nilai_rapor`
--
ALTER TABLE `nilai_rapor`
  ADD CONSTRAINT `nilai_rapor_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `nilai_rapor_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id_siswa`),
  ADD CONSTRAINT `nilai_rapor_ibfk_3` FOREIGN KEY (`id_thnAkd`) REFERENCES `tahun_akademik` (`id_thnAkd`);

--
-- Ketidakleluasaan untuk tabel `nilai_tugas`
--
ALTER TABLE `nilai_tugas`
  ADD CONSTRAINT `nilai_tugas_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `data_tugas` (`id_tugas`),
  ADD CONSTRAINT `nilai_tugas_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id_siswa`);

--
-- Ketidakleluasaan untuk tabel `nilai_ujian`
--
ALTER TABLE `nilai_ujian`
  ADD CONSTRAINT `nilai_ujian_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id_siswa`),
  ADD CONSTRAINT `nilai_ujian_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id_ujian`);

--
-- Ketidakleluasaan untuk tabel `tgl_rapor`
--
ALTER TABLE `tgl_rapor`
  ADD CONSTRAINT `tgl_rapor_ibfk_1` FOREIGN KEY (`id_thnAkd`) REFERENCES `tahun_akademik` (`id_thnAkd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
