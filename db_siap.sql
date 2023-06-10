-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 07:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siap`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `tgl_akun` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nip`, `nama_lengkap`, `password`, `tgl_akun`) VALUES
(8, 999999999, 'Krm Fajar', '$2y$10$Pjgd8Y9YX6StQGRlV20emOPajHbydGuhkNZXMx9FkwcsyyCkcmeCy', '2023-04-27 10:25:30'),
(15, 111111111, 'Rachel', '$2y$10$RXccKiiZ1vJt3ZRdxGlhmeRBtPSXF21gYfY73YN9l.zH9Xv.lt7Pu', '2023-04-27 10:26:44'),
(16, 222222222, 'Budi', '$2y$10$ThpUpbBkuWE4/maSH8G/0.HNOc9A2B8jYVaolMzYnEprCaPJnuG9K', '2023-04-27 10:27:13'),
(21, 2147483647, 'krmisme', '$2y$10$h1nwCXjQZotRPMOQdzFxyuzBmfQZuxeCIUEM4UxtMiQoH.hX9g9De', '2023-05-08 17:52:24'),
(22, 12345678, 'freya', '$2y$10$CG4zPHyQr6d07g0ZAAusfOxsPtGFXVg8Scqls9tOwDcCnGaKm9s7W', '2023-05-18 19:46:29'),
(23, 123, '123', '$2y$10$fYJyZhmvdTiv79B5zpyg2e7N8QSX6kru3/pjFElSVqQgc3ew1Dt8C', '2023-05-18 20:10:59'),
(24, 9, 'Krm Fajar Fremeida S', '$2y$10$lR01ae/0ruKeoihxfumTCemIuAEofSkAGCS0ulIa2CRtKZIeOaFey', '2023-05-18 20:35:44'),
(25, 1, 'krm', '$2y$10$mzwBhsUDl2GdtseMcdHGVO/1NbS9gE3pfOsPRjR3WAII7sRZZb6Ca', '2023-05-22 16:34:20'),
(28, 2, 'rahcel', '$2y$10$TCMv2MwemPNTTx7xDGoxX.VOyDyPYfjXQGp9Py.F9MaeWaLal2ys6', '2023-05-22 16:37:24'),
(29, 3, 'lala', '$2y$10$WVgi6ieD6otKFoSW1twXzuuatbb758.gM4tnbJEair/1qhviCRQ6q', '2023-05-22 16:43:09'),
(30, 4, 'pop', '$2y$10$GhOhSzHjU7WJxtElk7XEI.WajULlWnW/rtGI1oSfLrGkcgAu54pg.', '2023-05-22 16:48:13'),
(31, 5, 'lalal', '$2y$10$vIHM.F.vyckXh9LMExXVFeUccHdg.LBLns0GAPbGtUHM/hd.XYBDG', '2023-05-22 16:49:21'),
(32, 6, 'gaga', '$2y$10$o9Kjiu4bdYbYBARty3w3HOYs6BpO6UPLSZJ..AyQAMVzttkJyaRdi', '2023-05-22 16:49:45'),
(33, 1234, 'Marlina Handayani Salim', '$2y$10$EwZnTqTSEgrYbTL5rNvW6u2b/pm.G8bDQmR0YU3n56HfTnblQl1hK', '2023-05-23 15:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_terima` date DEFAULT NULL,
  `nomor` varchar(25) NOT NULL,
  `asal` varchar(25) DEFAULT NULL,
  `kepada` varchar(25) DEFAULT NULL,
  `perihal` char(255) NOT NULL,
  `ket` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `jenis`, `tgl_surat`, `tgl_terima`, `nomor`, `asal`, `kepada`, `perihal`, `ket`) VALUES
(1, 'masuk', '2021-02-09', '2021-02-10', '2/SDM.03.1-Pu/05/SJ/II/20', 'KPU RI ', '', 'Pengumuman', ''),
(2, 'masuk', '2021-02-10', '2021-02-10', '800/789-BKPSDM', 'Sekretariat Daerah', '', 'Surat Edaran', ''),
(4, 'masuk', '2021-02-04', '2021-02-10', '305/PL.02.1-SD/32/Prov/II', 'Ketua KPU Jawa Barat', '', 'Rakor Penyiapan Data Pemilih Untuk Program Vaksinasi Covid-19 di Jawa Barat', ''),
(5, 'masuk', '2021-02-17', '2021-02-16', '170/HM.06-SD/06/KPU/II/20', 'KPU RI ', '', 'Optimalisasi Pemanfaatan Akun Media Sosial Dalam Membangun Kredibilitas Kelembagaan KPU', ''),
(6, 'masuk', '2021-02-15', '2021-02-18', '01/KT-IRWIL/III/2021', 'KPU  Perkantoran Hayam Wu', '', 'Permintaan data rievew laporfan keuangan semester II tahun 2020', ''),
(7, 'masuk', '2021-02-16', '2021-02-18', '238/KU.06-SD/02/SJ/II/202', 'KPU RI ', '', 'Permintaan data tim bank', ''),
(8, 'masuk', '2021-02-18', '2021-02-18', '800/932/BKPSDM', 'Sekretariat Daerah', '', 'Surat Edaran', ''),
(9, 'masuk', '2021-02-04', '2021-02-18', '132/PL.01-SD/01/KPU/II/20', 'KPU RI ', '', 'Pemutakhiran data pemilih bekelanjutan tahun 2021', ''),
(10, 'masuk', '2021-02-22', '2021-02-22', '800/965-BKPSDM', 'Sekretariat Daerah', '', 'Surat Edaran', ''),
(11, 'masuk', '2021-02-23', '2021-02-25', '007/EXT/DPC-PD/KTBGR/II/2', 'DPC Partai Demokrat Kota ', '', 'Permohonan surat SK jumlah kursi hasil pemilu', ''),
(12, 'keluar', '2021-01-25', '0000-00-00', '16/KU.03.2/SD/3271/Sek-Ko', '', 'BRI Kantor Cabang Bogor', 'Permohonan Perubahan Speciment', ''),
(13, 'keluar', '2021-01-12', '0000-00-00', '05/HM.03.4-SD/3271/Kpu-Ko', '', 'Dekan Fakultas Hukum Univ', 'Permohonan Data dan Wawancara', ''),
(14, 'keluar', '2021-01-18', '0000-00-00', '08/KU.03.2-SD/3271/Sek.Ko', '', 'Kepala Bank BJB Cabang Bo', 'Permohonan penutupan Giro', ''),
(15, 'keluar', '2021-01-07', '0000-00-00', '002/SDM.06-SR/3271/Sek-Ko', '', 'Kepala BKPSDM Kota Bogor', 'Surat Pengantar Penyampaian Laporan PNS dilingkungan KPU Kota Bogor', ''),
(16, 'keluar', '2021-01-11', '0000-00-00', '004/SDM.02.1-SPT/3271/Sek', '', 'Kepala BKPSDM Kota Bogor', 'Surat Perintah Melakukan WFH', ''),
(17, 'keluar', '2021-01-26', '0000-00-00', '20/SDM.02.1-SR/3271/Sek-K', '', 'Kepala BKPSDM Kota Bogor', 'Penyampaian Surat Perintah', ''),
(18, 'keluar', '2021-01-29', '0000-00-00', '26/SDM.03.1-SD/3271/Sek-K', '', 'Kepala BKPSDM Kota Bogor', 'Permohonan', ''),
(19, 'keluar', '2021-01-01', '0000-00-00', '01/Ku.03.2-SD/3271/Sek.Ko', '', 'Kepala KPPN Bogor', 'Permohonan konfirmasi surat setoran pajak dan PNBP', ''),
(20, 'keluar', '2021-01-18', '0000-00-00', '09/KU.03.2-SD/3271/Sek.Ko', '', 'Kepala KPPN Bogor', 'Perubahan user KPA pada aplikasi E-Rekon', ''),
(21, 'keluar', '2021-01-21', '0000-00-00', '11/KU.03.2-SD/3271/Sek.Ko', '', 'Kepala KPPN Bogor', 'Permohonan persetujuan Up kartu kredit pemerintah', ''),
(22, 'keluar', '2021-01-21', '0000-00-00', '12/KU.03.2-SD/3271/Sek.Ko', '', 'Kepala KPPN Bogor', 'Surat pernyataan uang persediaan', ''),
(23, 'keluar', '2021-01-25', '0000-00-00', '15/PL.02.1-UND/3271/KPU-K', '', 'Ketua bawaslu Kota Bogor ', 'Undangan rapat koordinasi pra pleno DPB pada 26 januari 2021 di aula KPU Kota Bogor', ''),
(24, 'keluar', '2021-01-13', '0000-00-00', '07/SDM.06/SD/3271/Sek-Kot', '', 'Ketua KORPRI Kota Bogor', 'Permohonan bantuan', ''),
(25, 'keluar', '2021-01-28', '0000-00-00', '23/Pl.06-SD/3271/KPU-Kot/', '', 'Ketua KPU Provinsi Jawa B', 'Penyampaian Laporan Kegiatan Tahun 2021 dan Rencana Kerja Sosialisasi, Pendidikan Pemilih dan Partisipasi Masyarakat Tahun 2021', ''),
(26, 'keluar', '2021-01-26', '0000-00-00', '18/SDM.02.1-Spt/3271/Sek.', '', 'Pegawai Sekretariat KPU K', 'Surat Perintah WFH', ''),
(27, 'keluar', '2021-01-26', '0000-00-00', '19/Pl.02.1-und/3271/KPU-K', '', 'Pimpinan Lembaga Daftar T', 'Undangan rapat Pleno Pemuktahiran DPB', ''),
(28, 'keluar', '2021-01-12', '0000-00-00', '6/SDM.05.4/SD/3271/Sek-Ko', '', 'Sekretaris KPU Provinsi J', 'Usulan Pengangkatan Dalam Jabatan Fungsional Umum Bagi Calon Pegawai Negeri Sipil dilingkungan Sekretariat KPU Kota Bogor', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
