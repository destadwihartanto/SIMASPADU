-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2021 pada 11.16
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bismillah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(60) DEFAULT NULL,
  `stok` varchar(4) DEFAULT NULL,
  `id_rak` int(11) NOT NULL,
  `id_satuan` int(20) DEFAULT NULL,
  `id_jenis` int(20) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `id_rak`, `id_satuan`, `id_jenis`, `foto`, `file`) VALUES
('BRG-0001', 'sajadah', '0', 27, 9, 11, 'box.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` varchar(30) NOT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_keluar` varchar(5) DEFAULT NULL,
  `tgl_keluar` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_barang`, `id_user`, `jumlah_keluar`, `tgl_keluar`, `status`, `catatan`) VALUES
('BRG-K-0002', 'BRG-0001', 'USR-001', '1', '2021-09-01', 'Rusak', 'dddd'),
('BRG-K-0003', 'BRG-0001', 'USR-001', '2', '2021-09-01', 'Perbaikan', 'service');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` varchar(40) NOT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_masuk` int(10) DEFAULT NULL,
  `kondisi` varchar(10) NOT NULL,
  `tgl_masuk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang`, `id_user`, `jumlah_masuk`, `kondisi`, `tgl_masuk`) VALUES
('BRG-M-0012', 'BRG-0001', 'USR-001', 1, 'Second', '2021-09-02'),
('BRG-M-0013', 'BRG-0001', 'USR-001', 1, '', '2021-09-01'),
('BRG-M-0014', 'BRG-0001', 'USR-001', 1, 'Second', '2021-09-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(20) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `ket`) VALUES
(9, 'Sajadah', 'Alas Shalat'),
(10, 'Toa', 'Speaker'),
(11, 'Kain', 'Kafan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kajian`
--

CREATE TABLE `kajian` (
  `id` int(11) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(128) NOT NULL,
  `waktu` date NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `pemateri` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kajian`
--

INSERT INTO `kajian` (`id`, `tema`, `desc`, `image`, `waktu`, `tempat`, `pemateri`) VALUES
(20, 'Pranikah', '-', '74881550_786253565147030_1359710240331327632_n1.jpg', '2021-09-02', 'Mushola', 'Ust Andi'),
(21, 'Membina Rumah Tangga', 'kajian pranikah', '72351079_2411277669127319_3913706383529889602_n1.jpg', '2021-09-02', 'Mushola', 'Ust Andi'),
(22, 'Mendidik Anak ', 'Majelis Rutin Mingguan Mengaji', '69695266_428473734440580_9137947545907880364_n1.jpg', '2021-09-11', 'Mushola', 'Ust Andi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `kd_rek` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl` date NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `partner`
--

INSERT INTO `partner` (`id`, `nama`, `gambar`) VALUES
(19, 'Universitas Pamulang', 'logo_unpam3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `title`, `desc`, `image`) VALUES
(15, 'Training Hadroh', 'Belajar hadroh rutin tiap malam jumat', 'IMG_20210831_074351.jpg'),
(17, 'Mengaji Mingguan', 'Majelis Rutin Mingguan Mengaji', '71776305_150895229530950_4598223567952650592_n.jpg'),
(18, 'Tabungan Qurban ', 'Berbagi dengan lingkungan sekitar', 'qurban-Bantuanku.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `kode_rak` varchar(128) NOT NULL,
  `nama_rak` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `kode_rak`, `nama_rak`, `keterangan`) VALUES
(27, 'G001', 'Gudang ', 'penyimpanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(20) NOT NULL,
  `nama_satuan` varchar(60) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `ket`) VALUES
(9, 'Pcs', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktural`
--

CREATE TABLE `struktural` (
  `id_struktural` varchar(10) NOT NULL,
  `nama_struktural` varchar(60) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jabatan` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `struktural`
--

INSERT INTO `struktural` (`id_struktural`, `nama_struktural`, `notelp`, `alamat`, `jabatan`, `foto`) VALUES
('DKM-0001', 'desta', '087887727217', 'larangan', 'Bendahara', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `level` enum('sekertaris','admin','bendahara') NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `notelp`, `level`, `password`, `foto`, `status`) VALUES
('USR-001', 'Administrasi', 'admin', 'admin@admin.com', '087856123445', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user.png', 'Aktif'),
('USR-002', 'Agus Dermawan', 'agus', 'agusdermawan@gmail.com', '085311852225', 'admin', '25d55ad283aa400af464c76d713c07ad', 'user.png', 'Aktif'),
('USR-003', 'Teguh', 'teguh', 'teguh@gmail.com', '087', 'sekertaris', '25d55ad283aa400af464c76d713c07ad', 'user.png', 'Tidak Aktif'),
('USR-004', 'Heri ', 'heri', 'heri@gmail.com', '087', 'bendahara', '25d55ad283aa400af464c76d713c07ad', 'user.png', 'Tidak Aktif'),
('USR-005', 'Erni Rohyati', 'erni', 'erni@gmail.com', '0878788', 'sekertaris', '25d55ad283aa400af464c76d713c07ad', 'user.png', 'Aktif'),
('USR-006', 'nurul huda hakim', 'huda', 'huda@gmail.com', '12345', 'bendahara', 'e10adc3949ba59abbe56e057f20f883e', 'logo_unpam.png', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` varchar(10) NOT NULL,
  `nama_vendor` varchar(128) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kajian`
--
ALTER TABLE `kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `struktural`
--
ALTER TABLE `struktural`
  ADD PRIMARY KEY (`id_struktural`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kajian`
--
ALTER TABLE `kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
