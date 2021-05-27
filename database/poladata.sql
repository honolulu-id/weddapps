-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Mar 2019 pada 06.26
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poladata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `about_id` int(11) NOT NULL,
  `about_us` text NOT NULL,
  `our_strength` text NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`about_id`, `about_us`, `our_strength`, `photo`) VALUES
(1, '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">(<strong>archaic</strong>) In circuit; circularly; by a circuitous way; around the outside; in circumference. [ First attested around 1350 to 1470. ] quotations ? a mile&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">about</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, and a third of a mile across. (chiefly Canada, US, colloquial) Going to; on the verge of; intending to.</span></p>', '<div style=\"color: #222222; font-family: arial, sans-serif; font-size: small; display: inline;\" data-dobid=\"dfn\">the capacity of an object or substance to withstand great force or pressure.</div>\r\n<div class=\"vk_gy\" style=\"color: #878787 !important;\">\"they were taking no chances with the strength of the retaining wall\"</div>\r\n<p>&nbsp;</p>\r\n<div class=\"vmod\" style=\"color: #222222; font-family: arial, sans-serif; font-size: small;\">\r\n<table class=\"vk_tbl vk_gy\" style=\"color: #878787 !important; border-collapse: collapse;\">\r\n<tbody>\r\n<tr>\r\n<td class=\"lr_dct_nyms_ttl\" style=\"font-style: italic; vertical-align: top; white-space: nowrap; padding: 0px 3px 0px 0px;\">synonyms:</td>\r\n<td style=\"padding: 0px;\"><span class=\"SDZsVb\" style=\"cursor: pointer; color: #1a0dab;\" tabindex=\"0\" role=\"link\" data-term-for-update=\"robustness\" data-ved=\"2ahUKEwjB-6CC59vgAhXNT30KHclYBmYQ_SowAHoECAMQQQ\">robustness</span>,&nbsp;sturdiness,&nbsp;<span class=\"SDZsVb\" style=\"cursor: pointer; color: #1a0dab;\" tabindex=\"0\" role=\"link\" data-term-for-update=\"firmness\" data-ved=\"2ahUKEwjB-6CC59vgAhXNT30KHclYBmYQ_SowAHoECAMQQg\">firmness</span>,&nbsp;<span class=\"SDZsVb\" style=\"cursor: pointer; color: #1a0dab;\" tabindex=\"0\" role=\"link\" data-term-for-update=\"toughness\" data-ved=\"2ahUKEwjB-6CC59vgAhXNT30KHclYBmYQ_SowAHoECAMQQw\">toughness</span>,&nbsp;<span class=\"SDZsVb\" style=\"cursor: pointer; color: #1a0dab;\" tabindex=\"0\" role=\"link\" data-term-for-update=\"soundness\" data-ved=\"2ahUKEwjB-6CC59vgAhXNT30KHclYBmYQ_SowAHoECAMQRA\">soundness</span>,&nbsp;<span class=\"SDZsVb\" style=\"cursor: pointer; color: #1a0dab;\" tabindex=\"0\" role=\"link\" data-term-for-update=\"solidity\" data-ved=\"2ahUKEwjB-6CC59vgAhXNT30KHclYBmYQ_SowAHoECAMQRQ\">solidity</span>,&nbsp;solidness,&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '1550888775459.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `additional` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `phone`, `additional`) VALUES
(1, 'poladatas', 'support@poladata.coms', '089987876765', '<p><strong>An architecture models</strong></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `downloads`
--

CREATE TABLE `downloads` (
  `downloads_id` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `waktu` date NOT NULL,
  `files` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `downloads`
--

INSERT INTO `downloads` (`downloads_id`, `judul`, `waktu`, `files`, `keterangan`) VALUES
(2, 'Perlem No. 1 Th. 2014', '2019-02-15', '1550534273914.docx', 'Peraturan Lembaga Jasa Konstruksi No. 1 Th. 2014 tentang Perubahan Perlem No. 6 Th. 2013 sesuai UU'),
(3, 'Forms adds', '2019-02-20', '1550534995123.docx', '<p><em><strong>It has survived not only five centuries</strong></em>, but also the leap into electronic typesetting, remaining essentially unchanged.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(2, 'Rumah'),
(3, 'Arsitektur'),
(4, 'Kota'),
(5, 'Perumahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `news_id` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `waktu` date NOT NULL,
  `background` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`news_id`, `judul`, `waktu`, `background`, `keterangan`) VALUES
(1, 'NEWS FORMS PAGE', '2019-02-28', 'img4.jpg', '<h3 class=\"box-title m-b-0\" style=\"box-sizing: border-box; font-family: Rubik, sans-serif; font-weight: 500; line-height: 30px; color: #313131; margin: 0px 0px 12px; font-size: 16px; text-transform: uppercase; outline: none !important;\">NEWS FORMS <em>PAGE</em></h3>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_detail`
--

CREATE TABLE `news_detail` (
  `id_detail` int(10) NOT NULL,
  `id_news` int(10) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news_detail`
--

INSERT INTO `news_detail` (`id_detail`, `id_news`, `photo`) VALUES
(1, 1, 'img4.jpg'),
(2, 1, 'genu.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongoing`
--

CREATE TABLE `ongoing` (
  `ongoing_id` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `waktu` date NOT NULL,
  `background` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongoing`
--

INSERT INTO `ongoing` (`ongoing_id`, `judul`, `waktu`, `background`, `keterangan`) VALUES
(1, 'ON GOING PROJECTS FORMS PAGE', '2019-02-28', 'img3.jpg', '<p>ON GOING PROJECTS <strong>FORMS PAGE</strong></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongoing_detail`
--

CREATE TABLE `ongoing_detail` (
  `id_detail` int(10) NOT NULL,
  `id_ongoing` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongoing_detail`
--

INSERT INTO `ongoing_detail` (`id_detail`, `id_ongoing`, `photo`) VALUES
(1, 1, 'varun.jpg'),
(2, 1, 'vd3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `project_id` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_project` varchar(100) NOT NULL,
  `waktu` date NOT NULL,
  `customer` varchar(50) NOT NULL,
  `year` varchar(4) NOT NULL,
  `budget` varchar(10) NOT NULL,
  `background` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`project_id`, `id_kategori`, `nama_project`, `waktu`, `customer`, `year`, `budget`, `background`, `keterangan`) VALUES
(24, 4, 'PROJECT FORMS PAGE', '2019-03-22', 'PROJECT FORMS PAGE', '6', '7', 'photo_2019-02-02_15-13-59 (3).jpg', '<h3 class=\"box-title m-b-0\" style=\"box-sizing: border-box; font-family: Rubik, sans-serif; font-weight: 500; line-height: 30px; color: #313131; margin: 0px 0px 12px; font-size: 16px; text-transform: uppercase; outline: none !important;\">PROJECT FORMS PAGE</h3>\r\n<p>&nbsp;</p>'),
(25, 3, 'PROJECT FORMS PAGE', '2019-03-22', 'PROJECT FORMS PAGE', '6', '6', 'photo_2019-02-02_15-13-59 (5).jpg', '<h3 class=\"box-title m-b-0\" style=\"box-sizing: border-box; font-family: Rubik, sans-serif; font-weight: 500; line-height: 30px; color: #313131; margin: 0px 0px 12px; font-size: 16px; text-transform: uppercase; outline: none !important;\">PROJECT FORMS PAGE</h3>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_detail`
--

CREATE TABLE `project_detail` (
  `id_detail` int(10) NOT NULL,
  `id_project` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `qanda`
--

CREATE TABLE `qanda` (
  `qanda_id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanya` text NOT NULL,
  `jawab` text NOT NULL,
  `waktu_tanya` datetime NOT NULL,
  `waktu_jawab` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `qanda`
--

INSERT INTO `qanda` (`qanda_id`, `user`, `email`, `tanya`, `jawab`, `waktu_tanya`, `waktu_jawab`) VALUES
(3, 'mustaqim', 'ymustaqim@gmail.com', 'Tanya jawab (konsultasi) seputar administrasi dan teknis bidang jasa konsultasi.', '', '2019-03-05 02:28:54', '0000-00-00 00:00:00'),
(4, 'andra', 'andra@gmail.com', 'Select Team to Manage?', '<p>hello, whats your name?</p>', '2019-03-05 02:36:34', '2019-03-05 02:43:30'),
(5, 'Ali', 'ali@ali.com', 'oke', '', '2019-03-05 02:46:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `Planning` text NOT NULL,
  `Architecture` text NOT NULL,
  `Structural` text NOT NULL,
  `Mechanic` text NOT NULL,
  `Construction` text NOT NULL,
  `Industrial` text NOT NULL,
  `Assessment` text NOT NULL,
  `Water` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`service_id`, `keterangan`, `Planning`, `Architecture`, `Structural`, `Mechanic`, `Construction`, `Industrial`, `Assessment`, `Water`) VALUES
(1, '<p><strong>Pola Data&rsquo;s project experience includes planning and supervising</strong>, Architecture, Civil/Structural engineering, Mechanical and Electrical engineering, Interior design, Landscape, Construction Management, Industrial facilities, Transportation, Assessment and Building maintenance, Environment plans, Water treatment and Environmental Impact Analysis.</p>', '<p>Planning and supervision is a general service we provide especially in buildings that emphasizes speed and accuracy in achieving client satisfaction.</p>', '<p>Architecture is our main business. Together with structural engineering and mechanical &amp; electrical engineering, we provide excellent products to our clients to satisfy their needs. We have experiences in designing educational buildings, hotels and housings, museum, industrial, sport facilities, government offices, and religious facilities, etc.</p>', '<p>Civil/structural engineering are partners with architecture. They provide solutions to complete architectural works to satisfy our clients need. Civil/structural engineering team will surely design to satisfy architecture and standards to deliver aesthetic, safety and economic products.</p>', '<p>Mechanical and electrical engineering are partners with architecture. They provide solutions to complete architectural works to satisfy our clients need.</p>', '<p>Construction Project Management is the overall planning, coordination and control of a project from inception to completion aimed at meeting a client&rsquo;s requirements in order to produce a functionally and financially viable project. (CPM) is project management that applies to the construction sector (3rd Forum &ldquo;International Construction Project Management&rdquo; 26th/27 June 2003 in Berlin)</p>', '<p>Industrial fasilities is one of our services to design industrial facilities applicable standards and customer satisfaction.</p>', '<p>Assessment and building maintenance is our service to the assessment of a building and in terms of architectural, structural and mechanical and electrical.</p>', '<p>Water treatment and environmental impact analysis is our service for water treatment design and analysis of the impact on the environment.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`team_id`, `nama`, `jabatan`, `email`, `no_telp`, `keterangan`, `photo`) VALUES
(2, 'aldo', 'Manager', 'hritik@gmail.com', '089876765654', 'oke aja', '1550400969275.jpg'),
(3, 'admin', 'admin', 'support@gmail.com', '089876765654', 'admin bagian utama', '1550400936882.jpg'),
(5, 'Form team', 'manager', 'admin@admin.com', '098987876765', '<p class=\"text-muted m-b-30\" style=\"box-sizing: border-box; outline: none !important; line-height: 1.6; color: #8d9ea7; font-family: Rubik, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin: 0px 0px 30px !important 0px;\"><em><strong>Form team</strong></em></p>', '1551231992021.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_info` text NOT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_email`, `user_info`, `photo`) VALUES
(1, 'admin', '1', 'admin@poladata.com', '<p><strong>Donec pede justo, fringilla vel</strong>, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>', '1550889081585.jpg'),
(2, 'user', '1', 'user@user.com', 'oke', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indeks untuk tabel `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`downloads_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indeks untuk tabel `news_detail`
--
ALTER TABLE `news_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  ADD PRIMARY KEY (`ongoing_id`);

--
-- Indeks untuk tabel `ongoing_detail`
--
ALTER TABLE `ongoing_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indeks untuk tabel `project_detail`
--
ALTER TABLE `project_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `qanda`
--
ALTER TABLE `qanda`
  ADD PRIMARY KEY (`qanda_id`);

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `downloads`
--
ALTER TABLE `downloads`
  MODIFY `downloads_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `news_detail`
--
ALTER TABLE `news_detail`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ongoing`
--
ALTER TABLE `ongoing`
  MODIFY `ongoing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ongoing_detail`
--
ALTER TABLE `ongoing_detail`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `project_detail`
--
ALTER TABLE `project_detail`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `qanda`
--
ALTER TABLE `qanda`
  MODIFY `qanda_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
