-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2023 pada 00.08
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
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `no_antrian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_pasien`, `id_poli`, `no_antrian`) VALUES
(3, 73, 1, 1),
(4, 74, 1, 2),
(5, 75, 3, 1),
(6, 76, 3, 2),
(9, 77, 5, 1),
(13, 79, 5, 2),
(17, 81, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_poli`, `nama_dokter`, `jenis_kelamin`, `alamat`, `hp`) VALUES
(1, 1, 'dokter dalam', 'laki-laki', 'pekalongan', '0880800'),
(2, 2, 'dokter saraf', 'perempuan', 'Pluto', '08355365'),
(3, 5, 'dokter tht', 'Gak punya kontol', 'ygderasil', '07788667'),
(4, 6, 'dokter mata', 'laki-laki', 'pekalongan', '08846464'),
(5, 4, 'dokter jiwa', 'perempuan', 'pekalongan', '0824264'),
(6, 3, 'dokter anak', 'laki-laki', 'batang', '05755566'),
(7, 1, 'dokter dalam 2', 'perempuan', 'pekalongan', '066767657'),
(8, 2, 'dokter saraf', 'batang', 'pekalongan', '068686556');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `jadwal` time NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `jadwal`, `deskripsi`) VALUES
(1, 'penyakit dalam', '12:12:42', 'poli dalam merupakan poliklinik yang khusus merawat penyakit dalam seeprti diabetes dan lain-lain. didalam poli ini terdapat pelayanan seperti pengecekan,perawatan dan penaganan penyait dalam. '),
(2, 'saraf', '12:13:40', 'Poli saraf melakukan poliklinik yang khusus merawat dan mengatasi gangguan penyakit saraf. didalam poli saraf terdapat pelayanan seperti pengecekan, perawatan dan penaganan gangguan saraf.'),
(3, 'Anak', '00:00:09', 'Poli anak adalah poli yang menangani khusus permasalahan atau gangguan penyakit pada anak.'),
(4, 'Jiwa', '09:00:06', 'poli jiwa merupakan poliklinik yang ksusus menagani pasien yang memiliki permasalaha pada emosi dan perasaan jiwa pasien. pada poli ini mengatasi permasalahan gangguan jiwa atau permasalahan yang lain yang berhubungan dengan kondisi kesehatan jiwa.'),
(5, 'THT', '00:00:09', 'poliklinik THT adalah polilinik yang mengatasi permasalahan dan merawat penyakit hidung, tengorokan dan telinga.pada poli ini terdapat pelayanan kesehatan telinga tenggorokanm hidung seperti perawatan,pemeriksaan dan penanaganan atau operasi apabila terdapat permasalahan. '),
(6, 'mata', '00:00:09', 'poliklinik yang merawat penyakit yang berhubungan dengan kesehatan mata. pada poli ini terdapat pelayanan kesehatan mata seperti cek kesehatan mata, perawatan, operasi katarak dan penyakit lainnya yang behubungan dengan permasalahan mata.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawat_jalan`
--

CREATE TABLE `rawat_jalan` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` bigint(16) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `tanggal_kunjungan` datetime NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rawat_jalan`
--

INSERT INTO `rawat_jalan` (`id_pasien`, `nama_pasien`, `tempat_lahir`, `tanggal_lahir`, `nik`, `hp`, `tanggal_kunjungan`, `id_poli`, `id_dokter`) VALUES
(73, 'jenna lyn my love', 'Los Angles', '2023-07-10', 1122334455, '09676767', '2023-07-10 22:52:00', 1, 7),
(74, 'juan pratama', 'jakarta', '2023-07-10', 553246755342215, '86989886', '2023-07-10 22:58:00', 1, 7),
(75, 'plo', 'bandung', '2023-07-10', 987654321, '978976', '2023-07-10 23:01:00', 3, 6),
(76, 'momo', 'Los Angles', '2023-07-10', 1234567, '12345678', '2023-07-10 23:02:00', 3, 6),
(77, 'juancok', 'amsterdam', '2023-07-11', 55287825365, '978976', '2023-07-11 00:17:00', 5, 3),
(79, 'plo', 'Pekalongan', '2023-07-11', 747644553443, '09676767', '2023-07-11 03:47:00', 5, 3),
(81, 'prabowo', 'Pekalongan', '2023-07-11', 83625636573, '09676767', '2023-07-11 05:02:00', 4, 5);

--
-- Trigger `rawat_jalan`
--
DELIMITER $$
CREATE TRIGGER `no_urut_trigger` AFTER INSERT ON `rawat_jalan` FOR EACH ROW BEGIN
   INSERT INTO antrian (id_pasien, id_poli, no_antrian)
  SELECT NEW.id_pasien, NEW.id_poli, COUNT(*) + 1
  FROM antrian
  WHERE id_poli = NEW.id_poli;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `no_urut_update_trigger` AFTER UPDATE ON `rawat_jalan` FOR EACH ROW BEGIN
   INSERT INTO antrian (id_pasien, id_poli, no_antrian)
  SELECT NEW.id_pasien, NEW.id_poli, COUNT(*) + 1
  FROM antrian
  WHERE id_poli = NEW.id_poli;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `diagnosa` text NOT NULL,
  `resep` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(233) NOT NULL,
  `level` varchar(20) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `picture`) VALUES
(14, 'juan', '$2y$10$SzTTZyZwQNYSV.rhU6Jvs.9LWJ.n6YfZmTKoSx31aYbSk076jvIvS', 'admin', '1686320885_03c9db8a4719bbfb48fa.jpg'),
(15, 'juan2', '$2y$10$y/S2Uu6awQrx0JlDKObzouZTwafBeT5YG.EkjKKK1Oi2W39/L8yG6', 'admin', '1686320945_526587a8db993a63ff02.jpg'),
(16, 'dokter', '$2y$10$v5JEbYPzWwvZ8eFn7N0xIOlRC0Gn2ZvqE/cNlagPEPYZqunt3gGuq', 'dokter', '1686321388_0914515354ab2c59672c.jpg'),
(17, 'iqmal', '$2y$10$6o/92s3EFolKlqk9Dgy/Rerg6K09kZ86FHjyCZdY0JlVwfkSWJv1G', 'dokter', '1686321767_cd6dbfded44fbe3e269c.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_poli_2` (`id_poli`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `relasi_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`),
  ADD CONSTRAINT `relasi_rj` FOREIGN KEY (`id_pasien`) REFERENCES `rawat_jalan` (`id_pasien`);

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD CONSTRAINT `r_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`),
  ADD CONSTRAINT `rawat_jalan_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `r_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `rawat_jalan` (`id_pasien`),
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
