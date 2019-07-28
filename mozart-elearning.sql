-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2019 at 04:12 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mozart-elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `kode_hasil` varchar(30) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `jawaban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`kode_hasil`, `kode_judul_soal`, `id_student`, `jawaban`) VALUES
('SOAL-1-1', 'KJS-1-1-1', 'STD-1', 1),
('SOAL-1-2', 'KJS-1-1-1', 'STD-1', 2),
('SOAL-1-3', 'KJS-1-1-1', 'STD-1', 3),
('SOAL-1-4', 'KJS-1-1-1', 'STD-1', 2),
('SOAL-1-5', 'KJS-1-1-1', 'STD-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `judul_soal`
--

CREATE TABLE `judul_soal` (
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL,
  `kode_mentor_pelajaran` varchar(25) DEFAULT NULL,
  `judul` varchar(191) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `tanggal_mulai` varchar(20) DEFAULT NULL,
  `tanggal_selesai` varchar(20) DEFAULT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diupdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_soal`
--

INSERT INTO `judul_soal` (`kode_judul_soal`, `id_mentor`, `kode_mapel`, `kode_mentor_pelajaran`, `judul`, `jumlah_soal`, `tanggal_mulai`, `tanggal_selesai`, `dibuat`, `diupdate`) VALUES
('KJS-1-1-1', 'MNTR-1', 'MPL-1', 'MP-1-1-1', 'Quiz Matematika Algoritma', 5, '2019-06-29 10:00:00', '2019-07-29 12:00:00', '2019-07-28 01:50:59', '2019-07-27 18:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`username`, `password`) VALUES
('master', '$2y$10$UjCwlB90V3.JmFbbloXAvuVImfqeW3J2xOU/m5p5PTdTvtri3Mypy');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `kode_materi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mentor` varchar(25) CHARACTER SET latin1 NOT NULL,
  `kode_mentor_pelajaran` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `kode_mapel` varchar(25) CHARACTER SET latin1 NOT NULL,
  `judul_materi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diupdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`kode_materi`, `id_mentor`, `kode_mentor_pelajaran`, `kode_mapel`, `judul_materi`, `cover`, `materi`, `dibuat`, `diupdate`) VALUES
('MTRI-1-1-1', 'MNTR-1', 'MP-1-1-1', 'MPL-1', 'Pengertian Logaritma', '1564278090_matematika.jpg', '<h2><br></h2>\r\n<p><strong>Logaritma</strong> adalah kebalikan dari suatu perpangkatan. Jika sebuah perpangkatan a<sup>c</sup> = b, maka dapat dinyatakan dalam logaritma sebagai:</p><div class=\"code-block code-block-1\" style=\"margin: 8px auto; text-align: center; display: block; clear: both;\">\r\n\r\n<ins class=\"adsbygoogle\" style=\"display: block; text-align: center; height: 142px;\" data-ad-layout=\"in-article\" data-ad-format=\"fluid\" data-ad-client=\"ca-pub-1866946395819623\" data-ad-slot=\"7964585009\" data-adsbygoogle-status=\"done\"><ins id=\"aswift_1_expand\" style=\"display:inline-table;border:none;height:142px;margin:0;padding:0;position:relative;visibility:visible;width:565px;background-color:transparent;\"><ins id=\"aswift_1_anchor\" style=\"display:block;border:none;height:142px;margin:0;padding:0;position:relative;visibility:visible;width:565px;background-color:transparent;\"></ins></ins></ins>\r\n</div>\r\n\r\n<p style=\"text-align: center;\"><sup>a</sup>log b = c</p><p style=\"text-align: center;\">dengan syarat a &gt; 0 dan <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\"></p><div class=\"code-block code-block-2\" style=\"margin: 8px auto; text-align: center; display: block; clear: both;\">\r\n<div style=\"background-color: #1E90FF; font-size: 17px; color: #FFFFFF;\"><br><a style=\"color: #FFA500;\" rel=\"nofollow\" href=\"https://forum.studiobelajar.com/\"><strong></strong></a></div></div>\r\n\r\n<p><br></p><br><div id=\"attachment_1397\" style=\"width: 298px\" class=\"wp-caption aligncenter\"><img aria-describedby=\"caption-attachment-1397\" class=\"size-full wp-image-1397\" src=\"https://i2.wp.com/www.studiobelajar.com/wp-content/uploads/2017/07/sifat-logaritma.jpg?resize=288%2C175\" alt=\"sifat logaritma\" width=\"288\" height=\"175\"></div><div style=\"width: 298px\" class=\"wp-caption aligncenter\"><br></div><div id=\"attachment_1397\" style=\"width: 298px\" class=\"wp-caption aligncenter\"><br></div>\r\n<p>Pada penulisan logaritma <sup>a</sup>log b = c, a disebut bilangan \r\npokok dan b disebut bilangan numerus atau bilangan yang dicari nilai \r\nlogaritmanya (b &gt; 0) dan c merupakan hasil logaritma. Jika nilai a \r\nsama dengan 10, biasanya 10 tidak dituliskan sehingga menjadi log b = c.\r\n Jika nilai bilangan pokoknya merupakan bilangan e (bilangan eurel) \r\ndengan e = 2,718281828 maka logaritmanya ditulis dengan logaritma \r\nnatural dan penulisannya dapat disingkat menjadi ln, misalnya <sup>e</sup>log b = c menjadi:</p>\r\n<p style=\"text-align: center;\">ln b = c</p>\r\n<p>Berikut ini sejumlah contoh logaritma:</p>\r\n<table style=\"text-align: center;\">\r\n<tbody>\r\n<tr>\r\n<td width=\"188\">Perpangkatan</td>\r\n<td width=\"188\">Contoh Logaritma</td>\r\n</tr>\r\n<tr>\r\n<td width=\"188\">&nbsp;2<sup>1</sup> = 2</td>\r\n<td width=\"188\"><sup>2</sup>log 2 = 1</td>\r\n</tr>\r\n<tr>\r\n<td width=\"188\">&nbsp;2<sup>0</sup> = 1</td>\r\n<td width=\"188\"><sup>2</sup>log 1 = 0</td>\r\n</tr>\r\n<tr>\r\n<td width=\"188\">&nbsp;2<sup>3</sup> = 8</td>\r\n<td width=\"188\"><sup>2</sup>log 8 = 3</td>\r\n</tr>\r\n<tr>\r\n<td width=\"188\">2-<sup>3</sup> = 8</td>\r\n<td width=\"188\"><sup>2</sup>log &nbsp;= – 3</td>\r\n</tr>\r\n<tr>\r\n<td width=\"188\">&nbsp;<img src=\"https://s0.wp.com/latex.php?latex=9%5E%7B%5Cfrac%7B3%7D%7B4%7D%7D+%3D+3+%5Csqrt%7B3%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"9^{\\frac{3}{4}} = 3 \\sqrt{3}\" title=\"9^{\\frac{3}{4}} = 3 \\sqrt{3}\" class=\"latex\"></td>\r\n<td width=\"188\"><sup>9</sup>log <img src=\"https://s0.wp.com/latex.php?latex=3+%5Csqrt%7B3%7D+%3D+%5Cfrac%7B3%7D%7B4%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"3 \\sqrt{3} = \\frac{3}{4}\" title=\"3 \\sqrt{3} = \\frac{3}{4}\" class=\"latex\"></td>\r\n</tr>\r\n<tr>\r\n<td width=\"188\">&nbsp;10<sup>3</sup> = 1000</td>\r\n<td width=\"188\">log 1000 = 3</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Sifat-sifat Logaritma</h2>\r\n<h3>1. Sifat Logaritma dari perkalian</h3>\r\n<p>Suatu logaritma merupakan hasil penjumlahan dari dua logaritma lain \r\nyang nilai kedua numerus-nya merupakan faktor dari nilai numerus awal. \r\nBerikut modelnya:</p>\r\n<p style=\"text-align: center;\"><sup>a</sup>log p.q = <sup>a</sup>log p + <sup>a</sup>log q</p>\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">, p &gt; 0, q &gt; 0.</p>\r\n<h3>2. Perkalian Logaritma</h3>\r\n<p>Suatu logaritma a dapat dikalikan dengan logaritma b jika nilai \r\nnumerus logaritma a sama dengan nilai bilangan pokok logaritma b. Hasil \r\nperkalian tersebut merupakan logaritma baru dengan nilai bilangan pokok \r\nsama dengan logaritma a, dan nilai numerus sama dengan logaritma b. \r\nBerikut model sifat logaritma nya:</p>\r\n<p style=\"text-align: center;\"><sup>a</sup>log b x <sup>b</sup>log c = <sup>a</sup>log c</p>\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">.</p>\r\n<h3>3. Sifat Logaritma dari pembagian</h3>\r\n<p>Suatu logaritma merupakan hasil pengurangan dari dua logaritma lain \r\nyang nilai kedua numerus-nya merupakan pecahan atau pembagian dari nilai\r\n numerus logaritma awal. Berikut modelnya:</p>\r\n<p style=\"text-align: center;\"><sup>a</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7Bp%7D%7Bq%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{p}{q}\" title=\"\\frac{p}{q}\" class=\"latex\">&nbsp;= <sup>a</sup>log p – <sup>a</sup>log q</p>\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">, p &gt; 0, q &gt; 0.</p>\r\n<h3>4. Sifat Logaritma berbanding terbalik</h3>\r\n<p>Suatu logaritma berbanding terbalik dengan logaritma lain yang \r\nmemiliki nilai bilangan pokok dan numerus-nya saling bertukaran. Berikut\r\n modelnya:</p>\r\n<p style=\"text-align: center;\"><sup>a</sup>log b = <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B%5Eb+log+a%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{^b log a}\" title=\"\\frac{1}{^b log a}\" class=\"latex\"></p>\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">.</p>\r\n<h3>5. Logaritma berlawanan tanda</h3>\r\n<p>Suatu logaritma berlawanan tanda dengan logaritma yang memiliki \r\nnumerus-nya merupakan pecahan terbalik dari nilai numerus logaritma \r\nawal. Berikut modelnya:</p>\r\n<p style=\"text-align: center;\"><sup>a</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7Bp%7D%7Bq%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{p}{q}\" title=\"\\frac{p}{q}\" class=\"latex\">&nbsp;= – <sup>a</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7Bq%7D%7Bp%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{q}{p}\" title=\"\\frac{q}{p}\" class=\"latex\"></p>\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">, p &gt; 0, q &gt; 0.</p>\r\n<h3>6. Sifat Logaritma dari perpangkatan</h3>\r\n<p>Suatu logaritma dengan nilai numerus-nya merupakan suatu eksponen \r\n(pangkat) dapat dijadikan logaritma baru dengan mengeluarkan pangkatnya \r\nmenjadi bilangan pengali. Berikut modelnya :</p>\r\n<p style=\"text-align: center;\"><sup>a</sup>log b<sup>p</sup> = p. <sup>a</sup>log b</p>\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">, b &gt; 0</p>\r\n<h3>7. Perpangkatan Bilangan Pokok Logaritma</h3>\r\n<p>Suatu logaritma dengan nilai bilangan pokoknya merupakan suatu \r\neksponen (pangkat) dapat dijadikan logaritma baru dengan mengeluarkan \r\npangkatnya menjadi bilangan pembagi. Berikut modelnya:</p>\r\n<p style=\"text-align: center;\"><img src=\"https://s0.wp.com/latex.php?latex=%5E%7Ba%5Ep%7D+log+b+%3D+%5Cfrac%7B1%7D%7Bp%7D+%5Ea+log+b&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"^{a^p} log b = \\frac{1}{p} ^a log b\" title=\"^{a^p} log b = \\frac{1}{p} ^a log b\" class=\"latex\"></p><div class=\"code-block code-block-5\" style=\"margin: 8px auto; text-align: center; display: block; clear: both;\">\r\n<div style=\"background-color: #1E90FF; font-size: 17px; color: #FFFFFF;\"><span style=\"color: #FFA500;\"><strong><br></strong></span></div></div>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">.\r\n<h3>8. Bilangan pokok logaritma sebanding dengan perpangkatan numerus</h3>\r\n<p>Suatu logaritma dengan nilai numerus-nya merupakan suatu eksponen \r\n(pangkat) dari nilai bilangan pokoknya memiliki hasil yang sama dengan \r\nnilai pangkat numerus tersebut. Berikut model sifat logaritma nya:</p>\r\n<p style=\"text-align: center;\"><sup>a</sup>log a<sup>p</sup> = p</p>\r\n<p>dengan syarat a &gt; 0 dan <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">.</p>\r\n<h3>9. Perpangkatan logaritma</h3>\r\n<p>Suatu bilangan yang memiliki pangkat berbentuk logaritma, hasil \r\npangkatnya adalah nilai numerus dari logaritma tersebut. Berikut \r\nmodelnya:</p>\r\n<img src=\"https://s0.wp.com/latex.php?latex=a%5E%7B%5Ea+log+m%7D+%3D+m&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a^{^a log m} = m\" title=\"a^{^a log m} = m\" class=\"latex\">\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">, m &gt; 0.</p>\r\n<h3>10. Mengubah basis logaritma</h3>\r\n<p>Suatu logaritma dapat dipecah menjadi perbandingan dua logaritma sebagai berikut:</p>\r\n<img src=\"https://s0.wp.com/latex.php?latex=%5Ep+log+q+%3D+%5Cfrac%7B%5Ea+log+p%7D%7B%5Ea+log+q%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"^p log q = \\frac{^a log p}{^a log q}\" title=\"^p log q = \\frac{^a log p}{^a log q}\" class=\"latex\">\r\n<p>dengan syarat a &gt; 0, <img src=\"https://s0.wp.com/latex.php?latex=a+%5Cne+1&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"a \\ne 1\" title=\"a \\ne 1\" class=\"latex\">, p &gt; 0, q &gt; 0</p>\r\n<h2>Contoh Soal Logaritma dan Pembahasan</h2>\r\n<h3>Contoh Soal Logaritma 1</h3>\r\n<p>Diketahui <sup>3</sup>log 5 = x dan <sup>3</sup>log 7 = y. maka, nilai dari <sup>3</sup>log 245 <sup>1/2</sup> adalah … ?&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(EBTANAS ’98)</p>\r\n<p>Pembahasan 1</p>\r\n<p><sup>3</sup>log 245 <sup>½</sup> = <sup>3</sup>log (5 x 49) <sup>½</sup></p>\r\n<p><sup>3</sup>log 245 <sup>½</sup> = <sup>3</sup>log ((5) <sup>½</sup> x (49) <sup>½</sup>)</p>\r\n<p><sup>3</sup>log 245 <sup>½</sup> = <sup>3</sup>log (5) <sup>½</sup> + <sup>3</sup>log (7<sup>2</sup>) <sup>½</sup></p>\r\n<p><sup>3</sup>log 245 <sup>½</sup> = <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B2%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{2}\" title=\"\\frac{1}{2}\" class=\"latex\"> ( <sup>3</sup>log 5 + <sup>3</sup>log 7)</p>\r\n<p><sup>3</sup>log 245 <sup>½</sup> = <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B2%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{2}\" title=\"\\frac{1}{2}\" class=\"latex\"> (x + y)</p>\r\n<p>Jadi, nilai dari <sup>3</sup>log 245 <sup>1/2</sup> adalah <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B2%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{2}\" title=\"\\frac{1}{2}\" class=\"latex\"> (x + y).</p>\r\n<h3>Contoh Soal Logaritma 2</h3>\r\n<p>Jika b = a<sup>4</sup>, nilai a dan b positif, maka nilai <sup>a</sup>log b – <sup>b</sup>log a adalah …? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (UMPTN ’97)</p>\r\n<p>Pembahasan 2</p>\r\n<p>Diketahui bahwa b = a<sup>4</sup>, maka dapat disubstitusi kedalam perhitungan:</p>\r\n<p><sup>a</sup>log b – <sup>b</sup>log a = <sup>a</sup>log a<sup>4</sup>&nbsp; – <img src=\"https://s0.wp.com/latex.php?latex=%5E%7Ba%5E4%7D+log+a&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"^{a^4} log a\" title=\"^{a^4} log a\" class=\"latex\"></p>\r\n<p><sup>a</sup>log b – <sup>b</sup>log a = 4 (<sup>a</sup>log a) – <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B4%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{4}\" title=\"\\frac{1}{4}\" class=\"latex\">( <sup>a</sup>log a)</p>\r\n<p><sup>a</sup>log b – <sup>b</sup>log a = 4 – <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B4%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{4}\" title=\"\\frac{1}{4}\" class=\"latex\"></p>\r\n<p><sup>a</sup>log b – <sup>b</sup>log a = <img src=\"https://s0.wp.com/latex.php?latex=3+%5Cfrac%7B3%7D%7B4%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"3 \\frac{3}{4}\" title=\"3 \\frac{3}{4}\" class=\"latex\"></p>\r\n<p>Jadi, nilai dari <sup>a</sup>log b – <sup>b</sup>log a pada soal tersebut adalah <img src=\"https://s0.wp.com/latex.php?latex=3+%5Cfrac%7B3%7D%7B4%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"3 \\frac{3}{4}\" title=\"3 \\frac{3}{4}\" class=\"latex\">.</p>\r\n<h3>Contoh Soal Logaritma 3</h3>\r\n<p>Jika <sup>a</sup>log (1- <sup>3</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B27%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{27}\" title=\"\\frac{1}{27}\" class=\"latex\">) = 2, maka tentukanlah nilai a.&nbsp;&nbsp; (UMPTN ’97)</p>\r\n<p>Pembahsan 3</p>\r\n<p>Jika kita buat nilai 2 menjadi sebuah logaritma dengan bilangan pokok logaritmanya adalah a menjadi <sup>a</sup>log a<sup>2</sup>= 2, maka didapat :</p>\r\n<p><sup>a</sup>log (1- <sup>3</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B27%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{27}\" title=\"\\frac{1}{27}\" class=\"latex\">) = 2</p>\r\n<p><sup>a</sup>log (1- <sup>3</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B27%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{27}\" title=\"\\frac{1}{27}\" class=\"latex\">) = <sup>a</sup>log a<sup>2</sup></p>\r\n<p>Nilai numerus kedua logaritma tersebut bisa menjadi sebuah persamaan:</p>\r\n<p>1- <sup>3</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B27%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{27}\" title=\"\\frac{1}{27}\" class=\"latex\">&nbsp;= a<sup>2</sup></p>\r\n<p><sup>3</sup>log 3 – <sup>3</sup>log <img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B1%7D%7B27%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{1}{27}\" title=\"\\frac{1}{27}\" class=\"latex\">&nbsp;= a<sup>2</sup></p>\r\n<p><sup>3</sup>log 3 – <sup>3</sup>log 3<sup>(-3) </sup>= a<sup>2</sup></p>\r\n<p><sup>3</sup>log&nbsp;<img src=\"https://s0.wp.com/latex.php?latex=%5Cfrac%7B3%7D%7B3%5E%7B%28-3%29%7D%7D&amp;bg=f9f9f9&amp;fg=000000&amp;s=0\" alt=\"\\frac{3}{3^{(-3)}}\" title=\"\\frac{3}{3^{(-3)}}\" class=\"latex\"> = a<sup>2</sup></p>\r\n<p><sup>3</sup>log 3<sup>4</sup> = a<sup>2</sup></p>\r\n<p>4 = a<sup>2</sup></p>\r\n<p>Sehingga diperoleh nilai a = 2</p>', '2019-07-28 01:41:30', '2019-07-28 01:41:30');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id_mentor` varchar(25) NOT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) NOT NULL DEFAULT 'user/mentor_default.jpg',
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `email_verified_at` varchar(191) DEFAULT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id_mentor`, `name`, `foto`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('MNTR-1', 'wahyu chandra nugroho', '1564278138_guru.jpeg', 'wahyuchandra1109@gmail.com', '$2y$10$YJzOVIiEFgjtAd58XRRZqOgBie2IMkcVbBXP9vCDcn.pOJfDUpd3G', '2019-07-27 01:48:07', 'm1r4AhAGOGQD9vb8JTI9hkTPlTcTJKNRn5yDZmlKiBr0ZYkqpRTLVXJCDnvu', '2019-07-28 02:01:17', '2019-07-27 18:42:18'),
('MNTR-2', 'Mozart E-learning', '1564278237_guru2.jpg', 'mozzartwolfgang@gmail.com', '$2y$10$xv6Z6fci6Kj./zjLA8XpwOj5U00/a8aErha2Rii1KOeLb/e/QX6tK', NULL, NULL, '2019-07-28 01:43:57', '2019-07-27 18:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_pelajaran`
--

CREATE TABLE `mentor_pelajaran` (
  `kode_mentor_pelajaran` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `kuota` int(10) NOT NULL DEFAULT 30,
  `kode_mapel` varchar(25) NOT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_pelajaran`
--

INSERT INTO `mentor_pelajaran` (`kode_mentor_pelajaran`, `id_mentor`, `kuota`, `kode_mapel`, `tanggal_buat`) VALUES
('MP-1-1-1', 'MNTR-1', 50, 'MPL-1', '2019-07-27 01:57:30'),
('MP-1-2-2', 'MNTR-1', 20, 'MPL-2', '2019-07-27 01:57:39'),
('MP-2-2-3', 'MNTR-2', 30, 'MPL-2', '2019-07-27 18:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_student`
--

CREATE TABLE `mentor_student` (
  `kode_mentor_student` varchar(25) NOT NULL,
  `kode_mentor_pelajaran` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `tanggal_mengikuti` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_student`
--

INSERT INTO `mentor_student` (`kode_mentor_student`, `kode_mentor_pelajaran`, `id_mentor`, `id_student`, `tanggal_mengikuti`) VALUES
('MS-2-2', 'MP-1-1-1', 'MNTR-1', 'STD-1', '2019-07-27 12:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_06_20_044229_create_materi_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` varchar(25) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `nilai` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_selesai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `kode_judul_soal`, `id_student`, `nilai`, `status`, `tanggal_selesai`, `tanggal_update`) VALUES
('NIL-1-1-1-5', 'KJS-1-1-1', 'STD-1', 2, 'selesai', '2019-07-28 01:52:23', '2019-07-27 18:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wa@gmail.com', '$2y$10$8Y6XU4S1/D3MGTNt.fNCCeBC966BgDECzg3GgoEY5TRRyW7DHqVQ2', '2019-07-18 22:52:06'),
('wahyuchandra1109@gmail.com', '$2y$10$ibO3fsrOYUqwQbxepoUEReS.XKF2Q2ZXrdoTf/HD5V4Z3N/SoPZoy', '2019-07-27 19:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kode_mapel` varchar(25) NOT NULL,
  `nama_pelajaran` varchar(191) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `diupdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`kode_mapel`, `nama_pelajaran`, `dibuat`, `diupdate`) VALUES
('MPL-1', 'Matematika', '2019-07-26 18:55:45', '2019-07-26 18:55:45'),
('MPL-2', 'Manajemen Bisnis', '2019-07-26 18:55:53', '2019-07-26 18:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `kode_soal` varchar(30) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `pertanyaan` longtext DEFAULT NULL,
  `pilihan1` varchar(191) DEFAULT NULL,
  `pilihan2` varchar(191) DEFAULT NULL,
  `pilihan3` varchar(191) DEFAULT NULL,
  `pilihan4` varchar(191) DEFAULT NULL,
  `pilihan5` varchar(191) DEFAULT NULL,
  `pilihan_benar` varchar(191) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`kode_soal`, `kode_judul_soal`, `pertanyaan`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `pilihan_benar`) VALUES
('SOAL-1-1', 'KJS-1-1-1', '<br>', '2', '1', '3', '4', '5', ''),
('SOAL-1-2', 'KJS-1-1-1', '<p>8 + 2 ?<br></p>', '11', '10', '12', '13', '14', '2'),
('SOAL-1-3', 'KJS-1-1-1', '<p>6 x 2 ?<br></p>', '13', '8', '12', '10', '11', '3'),
('SOAL-1-4', 'KJS-1-1-1', '<p>7 x 8 ?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></p>', '56', '55', '57', '58', '59', ''),
('SOAL-1-5', 'KJS-1-1-1', '<p>17 - 2 ?<br></p>', '15', '13', '14', '12', '11', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id_student` varchar(25) NOT NULL,
  `socialite_id` varchar(255) DEFAULT NULL,
  `socialite_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) DEFAULT 'user/user_default.png',
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `remember_token` varchar(191) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT current_timestamp(),
  `diupdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id_student`, `socialite_id`, `socialite_name`, `name`, `foto`, `email`, `password`, `email_verified_at`, `remember_token`, `tanggal_daftar`, `diupdate`) VALUES
('STD-1', '110084344871768341865', 'google', 'wahyu chandra', '1564279151_el-rumi_20170704_202536.jpg', 'wahyuchandra1109@gmail.com', '$2y$10$2kNCAbU21z4ibfgNNNlmFueGwjPCqI2vGYw0lkiuippRcvh5RIfkC', '2019-07-28 01:59:11', '6M4IgNE13rf6aqsaoTyJFQ2vyaDhO0OBaO7VpIOVmGuB0fLtHipRrOhAAm1g', '2019-07-27 07:45:26', '2019-07-27 18:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `student_pelajaran`
--

CREATE TABLE `student_pelajaran` (
  `kode_student_pelajaran` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kode_hasil`),
  ADD KEY `fk_kode_judul_soal_hasil` (`kode_judul_soal`),
  ADD KEY `fk_id_student_hasil` (`id_student`);

--
-- Indexes for table `judul_soal`
--
ALTER TABLE `judul_soal`
  ADD PRIMARY KEY (`kode_judul_soal`),
  ADD KEY `fk_id_mentor_judul_soal` (`id_mentor`),
  ADD KEY `fk_kode_mentor_pelajaran_mentor_pelajaran_judu_soal` (`kode_mentor_pelajaran`),
  ADD KEY `fk_kode_mapel_judul_soal` (`kode_mapel`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`),
  ADD KEY `fk_id_mentor_materi` (`id_mentor`),
  ADD KEY `fk_kode_mentor_pelajaran_materi` (`kode_mentor_pelajaran`),
  ADD KEY `fk_kode_mapel_materi` (`kode_mapel`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `mentor_pelajaran`
--
ALTER TABLE `mentor_pelajaran`
  ADD PRIMARY KEY (`kode_mentor_pelajaran`),
  ADD KEY `fk_id_mentor_mentor_student` (`id_mentor`),
  ADD KEY `fk_kode_mapel_mentor_pelajaran` (`kode_mapel`);

--
-- Indexes for table `mentor_student`
--
ALTER TABLE `mentor_student`
  ADD PRIMARY KEY (`kode_mentor_student`),
  ADD KEY `fk_id_mentor_mentor_pelajaran_student` (`id_mentor`),
  ADD KEY `fk_kode_mentor_pelajaran_mentor_student` (`kode_mentor_pelajaran`),
  ADD KEY `fk_id_student_mentor_student` (`id_student`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`),
  ADD KEY `fk_kode_judul_soal_nilai` (`kode_judul_soal`),
  ADD KEY `fk_id_student_nilai` (`id_student`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`kode_soal`),
  ADD KEY `fk_kode_judul_soal_soal` (`kode_judul_soal`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`);

--
-- Indexes for table `student_pelajaran`
--
ALTER TABLE `student_pelajaran`
  ADD PRIMARY KEY (`kode_student_pelajaran`),
  ADD KEY `fk_id_mentor_pelajaran_student` (`id_mentor`),
  ADD KEY `fk_id_student_pelajaran_student` (`id_student`),
  ADD KEY `fk_kode_mapel_pelajaran_student` (`kode_mapel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `fk_id_student_hasil` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_judul_soal_hasil` FOREIGN KEY (`kode_judul_soal`) REFERENCES `judul_soal` (`kode_judul_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judul_soal`
--
ALTER TABLE `judul_soal`
  ADD CONSTRAINT `fk_id_mentor_judul_soal` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_judul_soal` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mentor_pelajaran_mentor_pelajaran_judu_soal` FOREIGN KEY (`kode_mentor_pelajaran`) REFERENCES `mentor_pelajaran` (`kode_mentor_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_id_mentor_materi` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_materi` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mentor_pelajaran_materi` FOREIGN KEY (`kode_mentor_pelajaran`) REFERENCES `mentor_pelajaran` (`kode_mentor_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentor_pelajaran`
--
ALTER TABLE `mentor_pelajaran`
  ADD CONSTRAINT `fk_id_mentor_mentor_student` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_mentor_pelajaran` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentor_student`
--
ALTER TABLE `mentor_student`
  ADD CONSTRAINT `fk_id_mentor_mentor_pelajaran_student` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_student_mentor_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mentor_pelajaran_mentor_student` FOREIGN KEY (`kode_mentor_pelajaran`) REFERENCES `mentor_pelajaran` (`kode_mentor_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_id_student_nilai` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_judul_soal_nilai` FOREIGN KEY (`kode_judul_soal`) REFERENCES `judul_soal` (`kode_judul_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `fk_kode_judul_soal_soal` FOREIGN KEY (`kode_judul_soal`) REFERENCES `judul_soal` (`kode_judul_soal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_pelajaran`
--
ALTER TABLE `student_pelajaran`
  ADD CONSTRAINT `fk_id_mentor_pelajaran_student` FOREIGN KEY (`id_mentor`) REFERENCES `mentors` (`id_mentor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_student_pelajaran_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mapel_pelajaran_student` FOREIGN KEY (`kode_mapel`) REFERENCES `pelajaran` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
