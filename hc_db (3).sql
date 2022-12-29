-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Agu 2017 pada 05.31
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hc_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_ui`
--

CREATE TABLE `hasil_ui` (
  `id_hasil` int(11) NOT NULL,
  `id_soal` int(20) NOT NULL,
  `id_pelamar` varchar(20) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_ui`
--

INSERT INTO `hasil_ui` (`id_hasil`, `id_soal`, `id_pelamar`, `nilai`) VALUES
(2, 4, 'PP003', 40),
(3, 4, 'PP001', 40),
(4, 4, 'PP004', 90);

--
-- Trigger `hasil_ui`
--
DELIMITER $$
CREATE TRIGGER `upd_status_ujian` AFTER INSERT ON `hasil_ui` FOR EACH ROW BEGIN
 UPDATE t_pelamar SET t_pelamar.keterangan='Sudah Mengikuti Ujian Online'
 WHERE t_pelamar.id_pelamar=NEW.id_pelamar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran`
--

CREATE TABLE `lampiran` (
  `id_lampiran` int(15) NOT NULL,
  `id_pelamar` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `lampiran` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lampiran`
--

INSERT INTO `lampiran` (`id_lampiran`, `id_pelamar`, `foto`, `lampiran`) VALUES
(7, 'PP001', '1601661_737952562883238_506733204_o211.JPG', 'pgn231.pdf'),
(8, 'PP004', 'Koala.jpg', 'hc_db.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mainmenu`
--

CREATE TABLE `mainmenu` (
  `id_mainmenu` int(11) NOT NULL,
  `nama_mainmenu` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin, 2=staff, 3=user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mainmenu`
--

INSERT INTO `mainmenu` (`id_mainmenu`, `nama_mainmenu`, `icon`, `aktif`, `link`, `level`) VALUES
(1, 'home', 'fa fa-home', 'y', 'http://localhost/hc/home', 1),
(2, 'data master', 'gi gi-group', 'y', 'http://localhost/hc/pelamar', 1),
(3, 'Data Pelamar', 'fa fa-group', 'y', '#', 1),
(4, 'Data FPK', 'fa fa-group', 'y', '#', 1),
(5, 'Cetak Data', 'fa fa-print', 'y', '#', 1),
(6, 'Ujian Online', 'fa fa-group', 'y', 'http://localhost/hc/ujian_online', 1),
(7, 'Informasi', 'fa fa-info', 'y', 'http://localhost/hc/info', 1),
(8, 'Setting', 'fa fa-star-o', 'y', '#', 1),
(9, 'Home', 'fa fa-home', 'y', 'http://localhost/hc/home', 2),
(12, 'Home', 'fa fa-home', 'y', 'http://localhost/hc/home', 3),
(13, 'Biodata Pelamar', '#', 'y', '#', 3),
(14, 'Ujian Online', 'fa fa-group', 'y', '#', 3),
(15, 'data master', 'gi gi-group', 'y', 'http://localhost/hc/pelamar', 2),
(16, 'Data Pelamar', 'fa fa-group', 'y', '#', 2),
(17, 'Data FPK', 'fa fa-group', 'y', '#', 2),
(18, 'Cetak Data', 'fa fa-print', 'y', '#', 2),
(19, 'Ujian Online', 'fa fa-group', 'y', 'http://localhost/hc/ujian_online', 2),
(20, 'Informasi', 'fa fa-info', 'y', 'http://localhost/hc/info', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_mainmenu` int(11) NOT NULL,
  `nama_submenu` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `icon` varchar(20) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin, 2=user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_mainmenu`, `nama_submenu`, `link`, `aktif`, `icon`, `level`) VALUES
(1, 3, 'pelamar', 'http://localhost/hc/pelamar.html', 'y', 'fa fa-keyboard-o', 1),
(2, 2, 'Jabatan yang dilamar', 'http://localhost/hc/jabatan', 'y', 'fa fa-keyboard-o', 1),
(3, 2, 'Pendidikan terakhir', 'http://localhost/hc/pendidikan', 'y', 'fa fa-keyboard-o', 1),
(4, 2, 'Jurusan pendidikan', 'http://localhost/hc/jurusan', 'y', 'fa fa-keyboard-o', 1),
(5, 2, 'Jadwal', 'http://localhost/hc/jadwal', 'y', 'fa fa-keyboard-o', 1),
(6, 3, 'Proses data pelamar', 'http://localhost/hc/proses', 'y', 'fa fa-keyboard-o', 1),
(7, 5, 'Cetak absensi', 'http://localhost/hc/transaksi', 'y', 'fa fa-print', 1),
(8, 4, 'Lihat Data FPK', 'http://localhost/hc/fpk', 'y', 'fa fa-keyboard-o', 1),
(10, 4, 'Pemenuhan FPK', 'http://localhost/hc/fpk/proses', 'y', 'fa fa-keyboard-o', 1),
(11, 8, 'mainmenu', 'http://localhost/hc/Mainmenu', 'y', 'fa fa-keyboard-o', 1),
(12, 8, 'submenu', 'http://localhost/hc/submenu', 'y', 'gi gi-group', 1),
(13, 6, 'Input Soal', 'http://localhost/hc/Ujian_online', 'y', 'fa fa-circle-o', 1),
(14, 8, 'User Account', 'http://localhost/hc/account', 'y', 'fa fa-group', 1),
(15, 10, 'Lihat Biodata', '#', 'y', 'fa fa-circle-o', 3),
(16, 10, 'Input Data', '#', 'y', 'fa fa-circle-o', 3),
(17, 11, 'Lampiran', '#', 'y', 'fa fa-circle-o', 3),
(18, 13, 'Lihat Biodata', 'http://localhost/hc/pelamar/lihat_biodata', 'y', 'fa fa-circle-o', 3),
(20, 13, 'Lampiran', 'http://localhost/hc/lampiran', 'y', 'fa fa-circle-o', 3),
(21, 14, 'Data Ujian', 'http://localhost/hc/ujian_online/data_soal', 'y', 'fa fa-circle-o', 3),
(22, 16, 'pelamar', 'http://localhost/hc/pelamar.html', 'y', 'fa fa-keyboard-o', 2),
(23, 15, 'Jabatan yang dilamar', 'http://localhost/hc/jabatan', 'y', 'fa fa-keyboard-o', 2),
(24, 15, 'Pendidikan terakhir', 'http://localhost/hc/pendidikan', 'y', 'fa fa-keyboard-o', 2),
(25, 15, 'Jurusan pendidikan', 'http://localhost/hc/jurusan', 'y', 'fa fa-keyboard-o', 2),
(26, 15, 'Jadwal', 'http://localhost/hc/jadwal', 'y', 'fa fa-keyboard-o', 2),
(27, 16, 'Proses data pelamar', 'http://localhost/hc/proses', 'y', 'fa fa-keyboard-o', 2),
(28, 18, 'Cetak absensi', 'http://localhost/hc/transaksi', 'y', 'fa fa-print', 2),
(29, 17, 'Lihat Data FPK', 'http://localhost/hc/fpk', 'y', 'fa fa-keyboard-o', 2),
(30, 17, 'Pemenuhan FPK', 'http://localhost/hc/fpk/proses', 'y', 'fa fa-keyboard-o', 2),
(31, 19, 'Input Soal', 'http://localhost/hc/Ujian_online', 'y', 'fa fa-circle-o', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_fpk`
--

CREATE TABLE `t_fpk` (
  `Id_fpk` int(10) NOT NULL,
  `no_fpk` varchar(30) NOT NULL,
  `total` int(20) NOT NULL,
  `terpenuhi` int(10) NOT NULL,
  `Bagian` varchar(20) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `usia` int(2) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `jurusan` text NOT NULL,
  `ket_bahasa` text NOT NULL,
  `kemampuan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_fpk`
--

INSERT INTO `t_fpk` (`Id_fpk`, `no_fpk`, `total`, `terpenuhi`, `Bagian`, `id_jabatan`, `jenis_kelamin`, `usia`, `pendidikan`, `jurusan`, `ket_bahasa`, `kemampuan`, `keterangan`) VALUES
(4, 'fpk01', 2, 1, 'Finishing', 'JD001', 'L', 24, 'SMA Sedera', 'Teknik Mesin', 'Bahasa Inggris Bahasa Mandarin ', 'Daya Tangkap Inisiatif ', 'Welder'),
(5, 'FPK002', 2, 0, 'Fabrikasi 2', 'JD001', 'L', 23, 'SMA Sederajat', 'Teknik Mesin', 'Welder', 'Motivasi Kerja Ketelitian Kerja Inisiatif ', 'Untuk Tukang Las');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_fpk_pel`
--

CREATE TABLE `t_fpk_pel` (
  `id_fpk` int(20) NOT NULL,
  `id_pelamar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_fpk_pel`
--

INSERT INTO `t_fpk_pel` (`id_fpk`, `id_pelamar`) VALUES
(4, 'PP003');

--
-- Trigger `t_fpk_pel`
--
DELIMITER $$
CREATE TRIGGER `update_stat` AFTER INSERT ON `t_fpk_pel` FOR EACH ROW BEGIN
 UPDATE t_pelamar, t_fpk SET t_pelamar.keterangan='Lulus Seleksi', 
 t_fpk.terpenuhi=t_fpk.terpenuhi+1
 WHERE t_pelamar.id_pelamar=NEW.id_pelamar and t_fpk.Id_fpk=NEW.Id_fpk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_info`
--

CREATE TABLE `t_info` (
  `id_info` int(11) NOT NULL,
  `info` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_info`
--

INSERT INTO `t_info` (`id_info`, `info`, `status`) VALUES
(1, 'Silahkan masukan data anda secara lengkap dan benar.', 'Y'),
(2, 'Ujian Online hanya dilakukan 1 kali 1 soal. jika anda memenuhi kriteria akan dihubungi oleh HRD PT. Lion Metal Works Tbk. Purwakarta', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_isi_soal`
--

CREATE TABLE `t_isi_soal` (
  `id_isi_soal` int(11) NOT NULL,
  `id_soal` int(10) NOT NULL,
  `gambar` text,
  `soal` text NOT NULL,
  `opsi_a` text NOT NULL,
  `opsi_b` text NOT NULL,
  `opsi_c` text NOT NULL,
  `opsi_d` text NOT NULL,
  `opsi_e` text NOT NULL,
  `Jawaban` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_isi_soal`
--

INSERT INTO `t_isi_soal` (`id_isi_soal`, `id_soal`, `gambar`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `Jawaban`) VALUES
(5, 4, '', 'Bulan Lalu pada awal tahun ini adalah  ?', 'Januari', 'Februari', 'Juli', 'Desember', 'Oktober', 'D'),
(6, 4, '', 'Menangkap adalah lawan kata dari ?', 'Meletakan', 'Membebaskan', 'Beresiko', 'Berusaha', 'Turun Tingkat', 'B'),
(7, 4, '', 'Sebagian besar hal dibawah ini serupa satu sama lain. Manakah salah satu diantaranya yang kurang serupa dengan yang lain ?', 'Januari', 'Agustus', 'Rabu', 'Oktober', 'Desember', 'C'),
(8, 4, '', 'Jawablah dengan memilih YA atau TIDAK. apakah RSVP berarti. Jawablah yang tidak perlu  ?', 'YA', 'TIDAK', '.', '.', '.', 'B'),
(9, 4, '', 'Dalam kelompok kata berikut, manakah yang berbeda dari kata yang lain ? ', 'Pasukan', 'Liga', 'Berpartisipasi', 'Pak', 'Kelompok', 'C'),
(10, 4, '', 'BIASA adalah lawan kata dari ?', 'Jarang', 'Terbiasa', 'Tetap', 'Berhenti', 'Selalu', 'A'),
(11, 4, '', 'Klien dan Pelanggan. Apaah kata-kata ini:', 'Memiliki arti yang sama', 'Memiliki arti yang berlawanan', 'Tidak memiliki arti sama atau berlainan', '.', '.', 'A'),
(12, 4, '', 'Manakah kata berikut ini yang berhubungan dengan aroma saat gigi mengunyah ?', 'Manis', 'Bau tak sedap ', 'Bau wangi', 'hidung', 'bersih', 'D'),
(13, 4, '', 'Manakah kata berikut ini yang berhubungan dengan aroma saat gigi mengunyah ?', 'Manis', 'Bau tak sedap ', 'Bau wangi', 'hidung', 'bersih', 'D'),
(14, 4, '', 'MUSIM GUGUR. Adalah lawan kata dari ?', 'Liburan', 'Musim Panas', 'Musim Semi', 'Musim Dingin', 'Musim Gugur', 'C'),
(15, 4, '', 'Anggaplah dua pernyataan pertama adalah benar. Apakah yang terakhir :\r\n\"Anak- anak lelaki ini adalah anak yang normal. semua anak normal sifatnya aktif. anak - anak lelaki ini aktif\"', 'benar', 'salah', 'tidak tahu', '.', '.', 'A'),
(16, 4, '', 'Jauh adalah lawan kata dari ?', 'Terpencil', 'Dekat', 'Jauh', 'Terburu - buru', 'Pasti', 'B'),
(17, 4, '', 'IT\'S. ITS Apakah kata ini ?', 'Memiliki arti yang sama', 'Memiliki arti yang berlawanan', 'Tidak memiliki arti sama atau berlainan', '.', '.', 'C'),
(18, 4, '', 'Anggaplah dua pernyataan pertama adalah benar. apakah pernyataan terakhir ?\r\n\"John seusia dengan sally. Sally lebih muda dari bill. John lebih muda dari bill.', 'benar', 'salah', 'tidak tahu', '.', '.', '.'),
(19, 4, '', 'CANVASS. CANVAS. Apakah kata - kata ini ?', 'Memiliki arti yang sama', 'Memiliki arti yang berlawanan', 'Tidak memiliki arti sama atau berlainan', '.', '.', 'C'),
(20, 4, '', 'Anggaplah dua perynyataan pertama adalah benar. Pernyataan terakhir ?\r\n\"Semua siswa mengikuti ujian. beberapa orang diruangan ini adalah siswa. Beberapa orang diruangan ini mengikuti ujian\"', 'benar', 'salah', 'tidak tahu', '.', '.', 'A'),
(21, 4, '', 'INGENIOUS. INGENUOUS apakah kata-kata ini ?', 'Memiliki arti yang sama', 'Memiliki arti yang berlawanan', 'Tidak memiliki arti sama atau berlainan', '.', '.', 'C'),
(22, 4, '', 'DAPAT DIPERCAYA. GAMPANG PERCAYA, Apakah kata-kata ini?', 'Memiliki arti yang sama', 'Memiliki arti yang berlawanan', 'Tidak memiliki arti sama atau berlainan', '.', '.', 'B'),
(23, 4, '', 'Dalam kelompok angka berikut. manakah angka terkecil?', '10', '1', '.999', '.33', '11', 'D'),
(24, 4, '', 'Dalam rangkaian kata berikut ini, manakah kata yang berbeda dari yang lainya?', 'Koloni', 'Perkawinan', 'Kawanan', 'Kru', 'Konstelasi', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jabatan`
--

CREATE TABLE `t_jabatan` (
  `id_jabatan` varchar(35) NOT NULL,
  `jabatan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jabatan`
--

INSERT INTO `t_jabatan` (`id_jabatan`, `jabatan`) VALUES
('JD001', 'Operator'),
('JD002', 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id_jadwal` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jadwal`
--

INSERT INTO `t_jadwal` (`id_jadwal`, `tanggal`) VALUES
('JA001', '2016-10-25'),
('JA002', '2017-08-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jadwal_pel`
--

CREATE TABLE `t_jadwal_pel` (
  `id_jadwal` varchar(30) NOT NULL,
  `id_pelamar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jadwal_pel`
--

INSERT INTO `t_jadwal_pel` (`id_jadwal`, `id_pelamar`) VALUES
('JA001', 'PP001'),
('JA001', 'PP003'),
('JA002', 'PP004');

--
-- Trigger `t_jadwal_pel`
--
DELIMITER $$
CREATE TRIGGER `update status` AFTER INSERT ON `t_jadwal_pel` FOR EACH ROW BEGIN
 UPDATE t_pelamar SET t_pelamar.keterangan='Proses tahap 2'
 WHERE t_pelamar.id_pelamar=NEW.id_pelamar;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurusan`
--

CREATE TABLE `t_jurusan` (
  `id_jurusan` varchar(30) NOT NULL,
  `jurusan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jurusan`, `jurusan`) VALUES
('J001', 'Teknik Mesin'),
('J002', 'Teknik Otomotif'),
('J004', 'Teknik Elektro'),
('J005', 'IPA'),
('J006', 'IPS'),
('J007', 'Teknik Informatika'),
('J008', 'Teknik Industri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelamar`
--

CREATE TABLE `t_pelamar` (
  `id_pelamar` varchar(20) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `tinggi` int(3) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `jk` varchar(8) NOT NULL,
  `id_pendidikan` varchar(20) NOT NULL,
  `id_jurusan` varchar(20) NOT NULL,
  `id_jabatan` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `keterangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pelamar`
--

INSERT INTO `t_pelamar` (`id_pelamar`, `nik`, `nama`, `no_hp`, `tinggi`, `tempat_lahir`, `tanggal`, `jk`, `id_pendidikan`, `id_jurusan`, `id_jabatan`, `alamat`, `tgl_input`, `keterangan`) VALUES
('PP001', '002', 'bima', '08998794927', 169, 'Padang', '1994-11-14', 'L', 'p001', 'J001', 'JD001', 'Gg Nusa Indah', '2017-03-16', 'Proses tahap 2'),
('PP003', '32101230181018281', 'Asep Sunandar', '08998794927', 168, 'Purwakarta', '1997-03-14', 'L', 'p001', 'J001', 'JD001', 'Cisantri', '2017-08-17', 'Lulus Seleksi'),
('PP004', '3214011411940002', 'Muhammad Ramdhani', '083823519565', 165, 'Jakarta', '1994-12-03', 'L', 'p002', 'J005', 'JD001', 'Gg Nusa Indah V Rt/RW 005/0010', '2017-08-21', 'Proses tahap 2'),
('PP005', '21211241414', 'Septian Randi', '43948324921', 162, 'padang', '1994-08-09', 'L', 'p001', 'J001', 'JD001', 'tes', '2017-08-21', 'Tidak lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pendidikan`
--

CREATE TABLE `t_pendidikan` (
  `id_pendidikan` varchar(25) NOT NULL,
  `nama_pendidikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pendidikan`
--

INSERT INTO `t_pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
('p001', 'SMK'),
('p002', 'SMA'),
('p003', 'MAN'),
('P004', 'Sekolah Tinggi'),
('P005', 'SMP'),
('P006', 'Universitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_soal`
--

CREATE TABLE `t_soal` (
  `id_soal` int(11) NOT NULL,
  `nama_soal` varchar(20) NOT NULL,
  `waktu` int(5) NOT NULL,
  `jumlah_soal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_soal`
--

INSERT INTO `t_soal` (`id_soal`, `nama_soal`, `waktu`, `jumlah_soal`) VALUES
(4, 'WPT', 6, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_login` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(25) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('1','2','3') NOT NULL COMMENT '1=admin,2=staff,3=user',
  `last_login` datetime DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_login`, `nik`, `nama`, `user`, `password`, `level`, `last_login`, `email`) VALUES
(1, '', 'Nopebri Ade Candra', 'admin', 'admin', '1', '2017-08-21 04:11:26', NULL),
(3, NULL, 'Yusuf', 'staf', 'staf', '2', '2017-08-21 05:00:39', NULL),
(4, '002', 'bima', 'bima', 'bima', '3', '2017-08-18 13:03:17', NULL),
(5, '03', 'Tika Dewi', 'tika', 'tika', '3', '2017-08-17 17:07:56', 'tes@gmail.com'),
(6, '32101230181018281', 'Asep Sunandar', 'asep', 'asep', '3', '2017-08-17 17:23:25', 'asep@gmail.com'),
(7, '3214011411940002', 'Muhammad Ramdhani', 'ramdan', '12345', '3', '2017-08-21 05:02:38', 'Ramdhani@gmail.com'),
(8, '21211241414', 'Spetian Randi', 'septian', 'septian', '3', '2017-08-21 05:30:29', 'septian@gmail.com'),
(9, '8887790', 'cek', 'asa', 'asa', '3', '2017-08-21 05:31:01', 'asas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_ui`
--
ALTER TABLE `hasil_ui`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`id_mainmenu`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `t_fpk`
--
ALTER TABLE `t_fpk`
  ADD PRIMARY KEY (`Id_fpk`);

--
-- Indexes for table `t_fpk_pel`
--
ALTER TABLE `t_fpk_pel`
  ADD PRIMARY KEY (`id_fpk`,`id_pelamar`);

--
-- Indexes for table `t_info`
--
ALTER TABLE `t_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `t_isi_soal`
--
ALTER TABLE `t_isi_soal`
  ADD PRIMARY KEY (`id_isi_soal`);

--
-- Indexes for table `t_jabatan`
--
ALTER TABLE `t_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `t_jadwal_pel`
--
ALTER TABLE `t_jadwal_pel`
  ADD PRIMARY KEY (`id_jadwal`,`id_pelamar`),
  ADD KEY `id_pelamar` (`id_pelamar`);

--
-- Indexes for table `t_jurusan`
--
ALTER TABLE `t_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `t_pelamar`
--
ALTER TABLE `t_pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `t_pendidikan`
--
ALTER TABLE `t_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `t_soal`
--
ALTER TABLE `t_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_ui`
--
ALTER TABLE `hasil_ui`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `id_mainmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `t_fpk`
--
ALTER TABLE `t_fpk`
  MODIFY `Id_fpk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t_info`
--
ALTER TABLE `t_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_isi_soal`
--
ALTER TABLE `t_isi_soal`
  MODIFY `id_isi_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `t_soal`
--
ALTER TABLE `t_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_jadwal_pel`
--
ALTER TABLE `t_jadwal_pel`
  ADD CONSTRAINT `t_jadwal_pel_ibfk_1` FOREIGN KEY (`id_pelamar`) REFERENCES `t_pelamar` (`id_pelamar`),
  ADD CONSTRAINT `t_jadwal_pel_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `t_jadwal` (`id_jadwal`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
