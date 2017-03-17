-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Apr 2015 pada 19.02
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_taufik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
`id_admin` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `id_petugas`) VALUES
(1, 'taufik', '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'rahman', 'e9b74cd3c4c1600ee591fd56360b89db', 4),
(11, 'ufik', 'b971580c0640430ea7f9e576a07614bb', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` char(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_seri_pabrik` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_status` int(10) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `gambar` char(50) NOT NULL,
  `jml` int(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama`, `no_seri_pabrik`, `tgl_masuk`, `id_jenis`, `id_status`, `id_ruangan`, `harga_beli`, `gambar`, `jml`, `ket`) VALUES
('BR001', 'perinter', 12345, '2015-04-17', 13, 3, 1, '2000000', 'imagesssssss.jpg', 1, 'oke'),
('BR002', 'scan', 12345, '2015-04-17', 13, 3, 2, '1200000', 'imagesww.jpg', 1, 'oke'),
('BR003', 'hp', 123456, '2015-04-17', 13, 3, 1, '1200000', 'imagessssssss.jpg', 1, 'oke'),
('BR004', 'semaugue', 0, '2015-04-14', 13, 2, 1, '120000', '7 001.jpg', 7, 'whatever'),
('euoae', 'aoeuaoeuoa', 0, '2015-04-16', 13, 2, 1, 'eouao', '7 002.jpg', 0, 'uoe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE IF NOT EXISTS `tb_detail` (
`id_detail` int(11) NOT NULL,
  `id_pinjam` char(5) NOT NULL,
  `id_barang` char(5) NOT NULL,
  `jml` varchar(3) NOT NULL,
  `ket` enum('dipinjam','dikembalikan') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`id_detail`, `id_pinjam`, `id_barang`, `jml`, `ket`) VALUES
(16, 'PJ001', 'BR002', '1', ''),
(17, 'PJ002', 'BR001', '1', ''),
(19, 'PJ003', 'BR001', '2', 'dipinjam'),
(20, 'PJ003', 'BR002', '1', 'dipinjam'),
(21, 'PJ004', 'BR001', '1', 'dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_barang_ruangan`
--

CREATE TABLE IF NOT EXISTS `tb_detail_barang_ruangan` (
  `id_ruangan` int(10) DEFAULT NULL,
  `id_barang` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gallery`
--

CREATE TABLE IF NOT EXISTS `tb_gallery` (
`id_foto` int(3) NOT NULL,
  `nama_file` varchar(25) NOT NULL,
  `judul_foto` varchar(25) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gallery`
--

INSERT INTO `tb_gallery` (`id_foto`, `nama_file`, `judul_foto`, `waktu`) VALUES
(20, 'imagesssssss.jpg', 'ass', '2015-04-04 15:51:10'),
(21, 'imagesww.jpg', 'm', '2015-04-15 03:52:02'),
(22, 'imags.jpg', 'wde', '2015-04-15 21:44:30'),
(24, 'kroppi.jpg', 'rararar', '2015-04-15 21:49:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
`id_jenis` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `jenis`, `satuan`, `ket`) VALUES
(13, 'komputer', 'unit', ''),
(15, 'LCD', 'unit', ''),
(16, 'Monitor', 'unit', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
`nik` int(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jk` enum('pria','wanita') NOT NULL,
  `email` varchar(25) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1231243233 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`nik`, `nama`, `jk`, `email`, `nohp`, `ket`) VALUES
(123, 'taufik', 'pria', 'taufik_tkj@yahoo.co.id', '1234567', 'ada'),
(1234, 'rahman', 'pria', 'rahman@gmail.com', '1351531', 'ada'),
(12345, 'tantan', 'pria', 'tantan@tantna.com', '23423423423', 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE IF NOT EXISTS `tb_petugas` (
`id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `nik` int(20) NOT NULL,
  `jk` enum('pria','wanita') COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `no_hp` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `level_petugas` enum('admin','petugas') COLLATE latin1_general_ci NOT NULL DEFAULT 'petugas'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `nik`, `jk`, `email`, `no_hp`, `level_petugas`) VALUES
(1, 'taufik', 123456, 'pria', 'amikom@ami.com', '621111111', 'admin'),
(4, 'rahman', 122223, 'pria', 'zee.cewekimut@gmail.com', '092932', 'petugas'),
(5, 'ufik', 2311, 'pria', 'ufik@gmail.com', '622282893903', 'petugas'),
(6, 'ufik', 3222, 'pria', '', '323243', 'petugas'),
(7, 'ufik', 3211, 'pria', '', '311', 'admin'),
(8, 'ufik', 232, 'pria', '', '3222', 'petugas'),
(9, 'ufik', 12345, 'pria', '', '12345', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE IF NOT EXISTS `tb_pinjam` (
  `id_pinjam` char(5) NOT NULL,
  `nik` int(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `nik`, `tgl_pinjam`, `tgl_kembali`) VALUES
('PJ001', 123, '2015-04-17', '2015-04-18'),
('PJ002', 1234, '2015-04-17', '2015-04-18'),
('PJ003', 123, '0000-00-00', '0000-00-00'),
('PJ004', 123, '2015-04-08', '2015-04-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pj`
--

CREATE TABLE IF NOT EXISTS `tb_pj` (
`id_pj` int(11) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `nama_pj` varchar(50) NOT NULL,
  `nik` int(25) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pj`
--

INSERT INTO `tb_pj` (`id_pj`, `id_ruangan`, `nama_pj`, `nik`, `ket`) VALUES
(1, 2, 'taufik rahman', 12345, 'oke'),
(3, 1, 'rahman taufik', 123, 'oke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profile`
--

CREATE TABLE IF NOT EXISTS `tb_profile` (
  `nama` varchar(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `id_ruangan` int(10) NOT NULL,
  `ruangan` varchar(25) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `ruangan`, `ket`) VALUES
(1, 'RPL', 'ada'),
(2, 'komputer jaringan', 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
`id_status` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`, `ket`) VALUES
(2, 'tidak', 'tidak dipinjam'),
(3, 'ada', 'dipinjam'),
(4, 'dipinjam', ''),
(5, 'dikembalik', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
 ADD PRIMARY KEY (`id_admin`), ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
 ADD PRIMARY KEY (`id_barang`), ADD KEY `id_jenis` (`id_jenis`), ADD KEY `id_status` (`id_status`), ADD KEY `id_ruangan` (`id_ruangan`), ADD KEY `id_ruangan_2` (`id_ruangan`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
 ADD PRIMARY KEY (`id_detail`), ADD KEY `id_pinjam` (`id_pinjam`), ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_detail_barang_ruangan`
--
ALTER TABLE `tb_detail_barang_ruangan`
 ADD KEY `FK_tb_detail_barang_ruangan_tb_ruangan` (`id_ruangan`), ADD KEY `FK_tb_detail_barang_ruangan_tb_barang` (`id_barang`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
 ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
 ADD PRIMARY KEY (`nik`), ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
 ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
 ADD PRIMARY KEY (`id_pinjam`), ADD UNIQUE KEY `id_pinjam_2` (`id_pinjam`), ADD KEY `id_pinjam` (`id_pinjam`), ADD KEY `nik` (`nik`);

--
-- Indexes for table `tb_pj`
--
ALTER TABLE `tb_pj`
 ADD PRIMARY KEY (`id_pj`), ADD UNIQUE KEY `id_pj` (`id_pj`), ADD KEY `id_ruangan` (`id_ruangan`), ADD KEY `id_ruangan_2` (`id_ruangan`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
 ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
 ADD PRIMARY KEY (`id_ruangan`), ADD UNIQUE KEY `id_ruangan_2` (`id_ruangan`), ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
 ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
MODIFY `id_foto` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
MODIFY `nik` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1231243233;
--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_pj`
--
ALTER TABLE `tb_pj`
MODIFY `id_pj` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
ADD CONSTRAINT `FK_tb_admin_tb_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis` (`id_jenis`),
ADD CONSTRAINT `tb_barang_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id_status`);

--
-- Ketidakleluasaan untuk tabel `tb_detail`
--
ALTER TABLE `tb_detail`
ADD CONSTRAINT `tb_detail_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tb_pinjam` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tb_detail_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_barang_ruangan`
--
ALTER TABLE `tb_detail_barang_ruangan`
ADD CONSTRAINT `FK_tb_detail_barang_ruangan_tb_barang` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`),
ADD CONSTRAINT `FK_tb_detail_barang_ruangan_tb_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `tb_ruangan` (`id_ruangan`);

--
-- Ketidakleluasaan untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
ADD CONSTRAINT `tb_pinjam_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pj`
--
ALTER TABLE `tb_pj`
ADD CONSTRAINT `FK_tb_pj_tb_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `tb_ruangan` (`id_ruangan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
