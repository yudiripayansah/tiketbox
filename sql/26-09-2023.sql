-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 11:29 PM
-- Server version: 5.7.42-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `powered_by` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `powered_by_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_public` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_offline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `location_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_coordinate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `toc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_order` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_ticket` int(11) NOT NULL,
  `one_email_one_transaction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `one_ticket_one_order` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `peduli_lindungi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `powered_by`, `powered_by_image`, `category`, `subcategory`, `keyword`, `is_public`, `is_offline`, `date_start`, `date_end`, `time_start`, `time_end`, `location_name`, `location_address`, `location_city`, `location_coordinate`, `description`, `toc`, `form_order`, `max_ticket`, `one_email_one_transaction`, `one_ticket_one_order`, `peduli_lindungi`, `status`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'IFG Labuan Bajo Marathon', 'TIKETBOX', 'default', 'Reality Show', 'Musik', '#IFGLABUANBAJO', '1', '1', '2023-11-04', '2023-11-04', '05:32:00', '09:36:00', 'Labuan Bajo NTT', 'Labuan Bajo', 'Surabaya', 'location,coordinate', '<p>IFG Labuan Bajo Marathon 2023 akan diselenggarakan pada hari Sabtu, 4 November 2023 dan berlokasi di Waterfront Labuan Bajo, Manggarai Barat, Nusa Tenggara Timur.</p><p>Hadirnya IFG Labuan Bajo Marathon 2023 ini diharapkan dapat semakin banyak menciptakan bibit-bibit unggul pelari di Indonesia, serta mendorong pertumbuhan perekonomian lokal melalui Sport Tourism.</p><p>IFG Labuan Bajo Marathon 2023 juga diharapkan menjadi event tahunan untuk memperkenalkan IFG kepada seluruh masyarakat khususnya masyarakat Indonesia bagian timur.</p>', '<ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser</li></ol>', 'Full Name,No Handphone,Gender,Email', 5, '1', '1', '0', 'active', 'event', NULL, '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(3, 'GWK Cultural Event', 'TIKETBOX', 'default', 'Konser', 'Musik', 'konserrakyat', '1', '1', '2023-12-15', '2023-12-15', '15:20:00', '20:48:00', 'AEON Mall', 'Jl Sudirman', 'Bandung', 'location,coordinate', '<p>GWK Cultural Park\'s vast and expansive venues make it the perfect destination for music concerts, with the capacity to cater to up to 40,000 visitors all at once. The park has been selected by renowned music events such as Soundrenaline, Djakarta Warehouse Project, and Dreamfields Festival for several occasions. The spectacular backdrop of the Garuda Wisnu Kencana statue, coupled with the exceptional sound system, guarantees an unparalleled concert experience. If you\'re interested in hosting a music concert at GWK Cultural Park, contact our staff for the best offers and packages available. Don\'t miss out on the opportunity to make your next music event truly unforgettable.</p>', '<ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser</li></ol>', 'Full Name', 10, '0', '1', '0', 'active', 'event', NULL, '2023-08-04 07:46:28', '2023-09-17 19:10:03'),
(4, 'JISPHORIA', 'TIKETBOX', 'default', 'Concert', 'Musik', 'konsertunggal', '1', '1', '2023-11-29', '2023-11-29', '18:50:00', '20:52:00', 'Jakarta International Stadium', 'Jakarta International Stadium is a retractable roof football stadium in Tanjung Priok, Jakarta, Indonesia', 'Jakarta', 'location,coordinate', '<p>Experience International Music Festival at The Biggest Stadium in South-East Asia.</p><p>Di tengah banyaknya festival musik tahun ini, JISPHORIA akan hadir dengan deretan penampil skala internasional dan juga nama-nama besar di industri musik Indonesia. Bertempat di Jakarta International Stadium (JIS), JISPHORIA akan dilaksanakan pada tanggal 1 Oktober 2022 nanti.<br>JISPHORIA sendiri adalah sebuah festival musik yang tak hanya menghadirkan penampilan musisi ternama. Dalam acara nanti, JISPHORIA juga menghadirkan area kuliner untuk para penonton.<br>Salah satu artis internasional yang sudah dipastikan tampil di JISPHORIA adalah iKON, salah satu boyband terbesar asal Korea Selatan. Penampilan boyband yang tergabung YG Entertainment di JISPHORIA ini juga menjadi pelepas dahaga para iKONIC (sebutan fans iKON) yang menunggu mereka untuk tampil di Jakarta.<br>Ada juga deretan artis nasional yang akan turut memeriahkan panggung JISPHORIA ini. Nama-nama yang tak asing seperti JKT48, Andmesh, SM*SH, dan Lyodra siap menghibur dan memberikan pengalaman tak terlupakan untuk para penonton.</p>', '<ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser</li></ol>', 'Full Name,Email', 5, '0', '0', '0', 'active', 'event', NULL, '2023-08-04 07:49:58', '2023-09-18 01:42:31'),
(7, 'BLACKPINK WORLD TOUR JAKARTA', 'TIKETBOX', 'default', 'Concert', 'Musik', 'Newjeans, Konser, Jakarta', '1', '1', '2023-11-05', '2023-11-06', '10:03:00', '23:03:00', 'Jakarta INternational Stadium', 'Jakarta International Stadium is a retractable roof football stadium in Tanjung Priok, Jakarta, Indonesia', 'Jakarta', 'location,coordinate', '<p>Grup K-pop legendaris, BLACKPINK akan datang back ke Jakarta untuk mempromosikan album terbaru mereka, BORN PINK melalui tur dunia mereka yang bertajuk, BLACKPINK WORLD TOUR [BORN PINK] JAKARTA pada tanggal 20 &amp; 21 DESEMBER 2023 di Stadion Main Gelora Bung Karno, Jakarta! Grup beranggotakan empat orang ini akan menggelar konser pertama kalinya.</p>', '<p>Show DAY 1: Sabtu, 11 Maret 2023 (19.00 WIB)<br>General Sales untuk pertunjukan&nbsp;</p><p>DAY 1 dimulai pada tanggal 15 November 2022 (jam 12.00 siang).<br>1 orang dapat membeli maks. 6 ticket per hari pertunjukan.<br>Kursi bersifat diurutkan (Numbered Seating) dengan penentuan yang diatur oleh sistem tiketbox.com berdasarkan ketersediaan ticket.</p><ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser<br>&nbsp;</li></ol>', 'Full Name,No Handphone,Domisili,Gender,Tanggal Lahir,NIK,Email', 5, '1', '1', '0', 'active', 'event', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(8, 'COLDPLAY WORLD TOUR - JAKARTA', 'TIKETBOX', 'default', 'Concert', 'Musik', 'konsermusik', '1', '1', '2023-11-15', '2023-11-15', '16:00:00', '23:59:00', 'Gelora Bung Karno Stadium', 'Jalan Pintu 1 Senayan, Jakarta Pusat, DKI Jakarta', 'Jakarta', 'location,coordinate', '<p>Coldplay bakal menggelar konser perdananya di Jakarta pada <strong>15 November 2023</strong> di Stadion Utama Gelora Bung Karno (SUGBK), Jakarta Pusat.</p>', '<ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser</li></ol>', 'Full Name,No Handphone,Email', 1, '1', '1', '0', 'active', 'event', NULL, '2023-09-05 08:16:23', '2023-09-18 01:41:59'),
(9, 'Indraprastha Talent Night Mr. & Ms. UMN 2023', 'UMN', 'default', 'Talent Show', 'Teater', '#IndraprasthaTalent', '1', '1', '2023-09-22', '2023-09-22', '16:30:00', '19:30:00', 'Function Hall Universitas Multimedia Nusantara', 'Jakarta', 'Jakarta', '-6.122201940729568,106.85147259146612', '<h3><strong>Description</strong></h3><p>Indraprastha Mr. &amp; Ms. UMN 2023 membawakan pertunjukan bakat yang dikemas dan dihadirkan oleh kandidat Mr. &amp; Ms. UMN 2023. Melalui tema Arunika yang berarti cahaya matahari yang terbit, serta konsep Wiracarita Pagelaran Wayang, Indraprastha akan membawakan latar belakang nusantara dengan berbagai elemen yang disusun untuk membawa audience merasa berada di kerajaan khayalan.<br><br>Don’t miss the opportunity to venture into a world where talent radiates with brilliance!</p>', '<h3><strong>Syarat &amp; Ketentuan</strong></h3><p>Syarat &amp; Ketentuan<br>Umum<br>1. Harga belum termasuk biaya administrasi.<br>2. Pembeli wajib mengisi data diri pribadi saat memesan.<br>3. Tiket yang sudah dibeli tidak dapat dikembalikan.<br><br>E-ticket<br>1. E-Ticket tidak dapat dipindahtangankan, diperjualbelikan, dan dikembalikan.<br>2. Kehilangan E-Ticket merupakan tanggung jawab pemegang tiket.<br>3. Masing-masing E-ticket akan mendapatkan nomor kursi yang akan diurutkan berdasarkan waktu transaksi. <br><br>&nbsp;</p><h3><strong>Info Penukaran Tiket</strong></h3><p>1. Tunjukkan e-tiket yang telah diterima melalui email atau di halaman \"Daftar Tiket\" pada menu Tiketbox.com kepada petugas di lapangan untuk dipindai QR Code-nya. 2. Setelah QR Code berhasil diverifikasi, pembeli akan menerima gelang tangan (wristband) yang dapat digunakan untuk memasuki venue dan wajib dipakai dari awal hingga akhir acara.</p>', 'Full Name,No Handphone,Gender,Tanggal Lahir,NIK,Email', 20, '0', '0', '0', 'active', 'event', NULL, '2023-09-12 03:40:23', '2023-09-18 05:55:31'),
(11, 'OLX Indonesia Modification Expo 2023', 'TIKETBOX', 'default', 'Exhibition', 'Teater', '#imx', '1', '1', '2023-10-29', '2023-11-01', '10:00:00', '22:00:00', 'Jakarta Convention Center', 'JCC', 'Jakarta', 'location,coordinate', '<h3><strong>Description</strong></h3><p>OLX IMX 2023 akan hadir dalam gelaran terbaiknya di tahun ke-6 setelah sukses dalam 5 tahun sebelumnya, tema kuat <strong>“The Future of Creativity”</strong> tahun ini akan membawa kreativitas otomotif Indonesia untuk menyambut era baru dalam teknologi dan setiap terobosan serta peralihan tren dalam industri, dengan semangat kreativitas akan gagasan baru termasuk konsep elektrifikasi dan digitalisasi yang tentunya didukung dengan regulasi dalam kolaborasi dengan Pemerintah Republik Indonesia melalui berbagai Kementrian, <strong>IMX 2023</strong> akan hadir menjadi tonggak dan barometer baru bagi industri otomotif Tanah Air.</p><p>IMX hadir dengan berbagai line up, kehadiran para overseas guest:</p><ul><li>Liberty Walk Japan (Kato dan Toshi San)</li><li>Keiichi Tsuchiya</li><li>Rywire Ryan Basseri</li><li>West Coast Customs Musa dari Amerika Serikat</li></ul><p>Akan membuat IMX 2023 akan semakin meriah! IMX 2023 juga akan menghadirkan Supergiveaway mobil dari <strong>Raffi Ahmad</strong> yang akan memberikan Wuling secara online dan Fitra Eri yang memberikan replika Jazz balapnya langsung untuk semua pengunjung event!&nbsp;</p><p>Jangan lewatkan kesempatan tahun ini, beli tiketnya sekarang, sampai jumpa di IMX 2023!</p>', '<h3><strong>Syarat &amp; Ketentuan</strong></h3><p><strong>Umum</strong></p><ol><li>Harga belum termasuk pajak &amp; admin Tiketbox.com.</li><li>Tiket yang sudah dibeli tidak dapat dikembalikan.</li><li>Tiket yang sudah dibeli tidak dapat diganti jadwalnya.</li><li>Pembeli wajib mengisi data diri pribadi saat memesan.</li><li>Penjualan tiket sewaktu-waktu dapat dihentikan atau dimulai oleh tiketbox.com sesuai dengan kebijakan dari promotor atau tiketbox.com.</li><li>Pengunjung wajib menjaga protokol kesehatan yang berlaku.</li><li>Setiap pengunjung dianggap sepenuhnya melepaskan dan membebaskan penyelenggara dari segala hak, tuntutan, kerugian, kehilangan, tanggung jawab, denda dan perbuatan apapun, yang timbul secara langsung maupun tidak langsung dari rekaman dan siaran pertunjukkan ini.</li><li>Jika terjadi pembatalan pertunjukan, maka uang tiket akan dikembalikan sesuai dengan ketentuan promotor. Biaya administrasi tiket maupun convenient fee yang dibebankan kepada pembeli melalui kartu kredit atau biaya pribadi (contoh biaya perjalanan, biaya akomodasi dll) tidak dapat dikembalikan.</li></ol><p><strong>E-tiket</strong></p><ol><li>E-tiket tidak dapat diuangkan.</li><li>Tiket tidak dapat ditukar atau dipindahtangankan ke pihak/orang lain.</li></ol><p><strong>Perhatian</strong></p><ol><li>Transaksi Tiketbox.com yang resmi hanyalah yang dilakukan melalui website dan aplikasi eventori. Kami tidak bertanggungjawab atas transaksi yang terjadi diluar website dan/atau aplikasi eventori</li><li>Dalam hal ini Tiketbox.com hanya berperan sebagai agen penjual tiket, sehingga hal-hal yang timbul sehubungan dengan acara termasuk namun tidak terbatas pada penggunaan atas tiket sepenuhnya merupakan tanggung jawab antara pembeli dan promotor acara.</li><li>Terkait dengan mekanisme pengembalian dana, dalam hal ini Tiketbox.com bertindak sebagai platform penjualan tiket sehingga proses refund sepenuhnya tunduk kepada kebijakan yang dikeluarkan oleh promotor.</li><li>Jika ada kendala terkait tiket mohon untuk dapat menghubungi <a href=\"mailto:support@tiketbox.com\">support@tiketbox.com</a>&nbsp;</li><li>Pre Sale Ticket Sold Out l Tiket dapat dibeli on the venue</li></ol><h3><strong>Info Penukaran Tiket</strong></h3><p>Info Penukaran Tiket Tunjukkan e-tiket yang telah diterima melalui email atau di halaman \"Daftar Tiket\" pada menu Tiketbox.com kepada petugas di lapangan untuk dipindai QR Code-nya. Pastikan tingkat kecerahan layar ponsel telah disesuaikan sebelum menampilkan QR Code. Setelah QR Code berhasil diverifikasi, pelanggan akan menerima tiket yang dapat digunakan untuk masuk ke venue.</p>', 'Full Name,No Handphone,Domisili,Gender,Tanggal Lahir', 5, '1', '1', '0', 'active', 'event', NULL, '2023-09-17 19:27:03', '2023-09-18 05:44:53'),
(23, 'Sound of Unity', 'TIKETBOX', 'default', 'Konser', 'Musik', '#soundofunity', '1', '1', '2023-11-12', '2023-11-12', '10:00:00', '22:30:00', 'Comunity Park, PIK 2', 'prambanan', 'Jakarta', 'location,coordinate', '<h3><strong>Description</strong></h3><p>Let’s Ride to The Beat!</p><p>Sound of Unity adalah festival tempatnya musik, otomotif, dan kuliner bertemu dalam satu keseruan. Sesuai dengan namanya, Sound of Unity jadi suatu perayaan untuk menggambarkan bersenang-senang dalam nilai persatuan. Makanya, Sound of Unity diadakan dengan suasana pantai di Community Park, PIK 2, tanggal 12 November 2023.</p><p>Festival Sound of Unity akan diramaikan oleh:&nbsp;<br>Dewa 19&nbsp;<br>Raisa&nbsp;<br>Maliq &amp; D\'essentials<br>Ada Band&nbsp;<br>Coconuttreez<br>Iwa K&nbsp;<br>DJ Winky Wiryawan</p><p>Selain ada performance dari musisi, Sound of Unity juga akan menghadirkan Drag Race Competition dan bazaar kuliner yang melengkapi keseruan saat datang ke festival.</p><p>Jadi, ajak semua teman-teman, pasangan, saudara, kakak, adik, siapa pun untuk bersenang-senang di Sound of Unity!</p>', '<h3><strong>Syarat &amp; Ketentuan</strong></h3><p>Syarat &amp; Ketentuan<br>Umum<br>1. Harga sudah termasuk pajak&nbsp;<br>2. Pembeli wajib mengisi data diri pribadi saat memesan.<br>3. Tiket yang sudah dibeli tidak dapat dikembalikan.</p><p>E-ticket<br>1. E-Ticket tidak dapat dipindahtangankan, diperjualbelikan, dan dikembalikan.<br>2. Kehilangan E-Ticket merupakan tanggung jawab pemegang tiket.<br>&nbsp;</p><h3><strong>Info Penukaran Tiket</strong></h3><p>Info Penukaran Tiket 1. Tunjukkan e-tiket yang telah diterima melalui email atau di halaman \"\"Daftar Tiket\"\" pada menu Tiketbox.com kepada petugas di lapangan untuk dipindai QR Code-nya.&nbsp; 2. Setelah QR Code berhasil diverifikasi, pembeli akan menerima gelang tangan (wristband) yang dapat digunakan untuk memasuki venue dan wajib dipakai dari awal hingga akhir acara</p>', 'Full Name', 1, '0', '0', '0', 'active', 'event', NULL, '2023-09-17 19:57:33', '2023-09-18 06:02:40'),
(25, 'DUNIA FANTASI', 'TIKETBOX', 'default', 'Atraksi', 'Teater', '#dufan', '1', '1', '2999-01-01', '2999-01-01', '10:00:00', '21:00:00', 'Dufan, Jakarta', 'Jakarta', 'Jakarta', 'location,coordinate', '<p>Dunia Fantasi adalah sebuah taman hiburan yang terletak di kawasan Taman Impian Ancol, Jakarta Utara, Indonesia yang diresmikan dan dibuka untuk umum pada tanggal 29 Agustus 1985.</p>', '<ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser</li></ol>', 'Full Name', 1, '0', '0', '0', 'active', 'amusement', NULL, '2023-09-17 20:00:56', '2023-09-17 20:00:56'),
(26, 'TAMAN MINI INDONESIA INDAH', 'TIKETBOX', 'default', 'Atraksi', 'Teater', '#tamini', '1', '1', '2999-01-01', '2999-01-01', '10:00:00', '20:00:00', 'Taman Mini Indonesia Indah', 'tamini', 'Jakarta', 'location,coordinate', '<p><strong>Taman Mini Indonesia Indah</strong> merupakan suatu taman hiburan bertemakan kebudayaan Indonesia di Jakarta Timur, DKI Jakarta yang memiliki area seluas kurang lebih 150 hektare atau 1,5 kilometer persegi. Taman ini merupakan rangkuman kebudayaan bangsa Indonesia, yang mencakup berbagai aspek kehidupan sehari-hari masyarakat 26 provinsi Indonesia (pada tahun 1975) yang ditampilkan dalam anjungan daerah berarsitektur tradisional, serta menampilkan aneka busana, tarian, dan tradisi daerah. Di samping itu, di tengah-tengah TMII terdapat sebuah danau yang menggambarkan miniatur kepulauan Indonesia di tengahnya yang juga menjadi tempat pertunjukkan multimedia show bernama Tirta Cerita, kereta gantung, berbagai museum, dan Teater IMAX Keong Mas dan Teater Tanah Airku, berbagai sarana rekreasi ini menjadikan TMII sebagai salah satu kawasan wisata terkemuka di Jakarta.</p>', '<ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser</li></ol>', 'Full Name', 10, '0', '0', '0', 'active', 'amusement', NULL, '2023-09-17 20:05:37', '2023-09-18 06:19:07'),
(27, 'JATIM PARK', 'TIKETBOX', 'default', 'Atraksi', 'Teater', '#jatimpark', '1', '1', '2999-01-01', '2999-01-01', '09:00:00', '20:00:00', 'Jatim Park', 'jatim', 'Surabaya', 'location,coordinate', '<p>Jawa Timur Park adalah sebuah tempat rekreasi dan taman belajar masa kini<br>yang menawarkan permainan,&nbsp;pengetahuan hingga&nbsp;hiburan dan menjadi salah satu icon<br>wisata Jawa Timur yang terdapat di Kota Batu.</p>', '<ol><li>Mohon siapkan data diri yang sesuai dengan tiket / e- ticket</li><li>Bawa e-Ticket dalam bentuk fisik maupun yang tertera dalam akun</li><li>Datang lebih awal ( Jika belum menukar Tiket )</li><li>Datang dan antri secara teratur pada saat masuk area maupun keluar area konser</li></ol>', 'Full Name', 20, '0', '0', '0', 'active', 'amusement', NULL, '2023-09-17 20:08:54', '2023-09-17 20:08:54');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_event` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `id_event`, `title`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, '64ccab8aa572b1691134858-2-event.png', '64ccab8aa572b1691134858-2-event.png', '2023-09-17 18:52:11', '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(2, 3, '64ccacd4d455c1691135188-3-event.png', '64ccacd4d455c1691135188-3-event.png', '2023-09-17 19:10:03', '2023-08-04 07:46:29', '2023-09-17 19:10:03'),
(3, 4, '64ccada6b3bdd1691135398-4-event.png', '64ccada6b3bdd1691135398-4-event.png', '2023-09-17 18:41:56', '2023-08-04 07:49:58', '2023-09-17 18:41:56'),
(4, 7, '64d061cbcb7c51691378123-7-event.png', '64d061cbcb7c51691378123-7-event.png', '2023-09-17 18:24:24', '2023-08-07 03:15:23', '2023-09-17 18:24:24'),
(5, 8, '64f6e3d79f0621693901783-8-event.png', '64f6e3d79f0621693901783-8-event.png', '2023-09-17 18:14:28', '2023-09-05 08:16:23', '2023-09-17 18:14:28'),
(6, 9, '64ffdda7cbdb01694490023-9-event.png', '64ffdda7cbdb01694490023-9-event.png', '2023-09-17 18:34:17', '2023-09-12 03:40:23', '2023-09-17 18:34:17'),
(7, 9, '64ffdda7cdf721694490023-9-event.png', '64ffdda7cdf721694490023-9-event.png', '2023-09-17 18:34:17', '2023-09-12 03:40:23', '2023-09-17 18:34:17'),
(8, 9, '64ffdda7cef451694490023-9-event.png', '64ffdda7cef451694490023-9-event.png', '2023-09-17 18:34:17', '2023-09-12 03:40:23', '2023-09-17 18:34:17'),
(9, 9, '64ffdda7cfd441694490023-9-event.png', '64ffdda7cfd441694490023-9-event.png', '2023-09-17 18:34:17', '2023-09-12 03:40:23', '2023-09-17 18:34:17'),
(10, 8, '650742043a61b1694974468-8-event.png', '650742043a61b1694974468-8-event.png', NULL, '2023-09-17 18:14:28', '2023-09-17 18:14:28'),
(11, 7, '65074458909551694975064-7-event.png', '65074458909551694975064-7-event.png', NULL, '2023-09-17 18:24:24', '2023-09-17 18:24:24'),
(12, 9, '650746a98b6801694975657-9-event.png', '650746a98b6801694975657-9-event.png', '2023-09-18 05:55:31', '2023-09-17 18:34:17', '2023-09-18 05:55:31'),
(13, 4, '65074874c7afb1694976116-4-event.png', '65074874c7afb1694976116-4-event.png', NULL, '2023-09-17 18:41:56', '2023-09-17 18:41:56'),
(14, 2, '65074adb859301694976731-2-event.png', '65074adb859301694976731-2-event.png', NULL, '2023-09-17 18:52:11', '2023-09-17 18:52:11'),
(15, 2, '65074adb879441694976731-2-event.png', '65074adb879441694976731-2-event.png', NULL, '2023-09-17 18:52:11', '2023-09-17 18:52:11'),
(16, 3, '65074f0bea8681694977803-3-event.png', '65074f0bea8681694977803-3-event.png', NULL, '2023-09-17 19:10:03', '2023-09-17 19:10:03'),
(18, 11, '65075307759ae1694978823-11-event.png', '65075307759ae1694978823-11-event.png', '2023-09-18 05:44:53', '2023-09-17 19:27:03', '2023-09-18 05:44:53'),
(19, 23, '65075a2dc349c1694980653-23-event.png', '65075a2dc349c1694980653-23-event.png', '2023-09-18 05:19:17', '2023-09-17 19:57:33', '2023-09-18 05:19:17'),
(20, 25, '65075af8778611694980856-25-event.png', '65075af8778611694980856-25-event.png', NULL, '2023-09-17 20:00:56', '2023-09-17 20:00:56'),
(21, 26, '65075c11534571694981137-26-event.png', '65075c11534571694981137-26-event.png', NULL, '2023-09-17 20:05:37', '2023-09-17 20:05:37'),
(22, 27, '65075cd68560e1694981334-27-event.png', '65075cd68560e1694981334-27-event.png', NULL, '2023-09-17 20:08:54', '2023-09-17 20:08:54'),
(23, 23, '6507ddd517ec61695014357-23-event.png', '6507ddd517ec61695014357-23-event.png', NULL, '2023-09-18 05:19:17', '2023-09-18 05:19:17'),
(24, 11, '6507e3d51af571695015893-11-event.png', '6507e3d51af571695015893-11-event.png', NULL, '2023-09-18 05:44:53', '2023-09-18 05:44:53'),
(25, 9, '6507e6532ce6d1695016531-9-event.png', '6507e6532ce6d1695016531-9-event.png', NULL, '2023-09-18 05:55:31', '2023-09-18 05:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE `event_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_event` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax_amount` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_tickets`
--

INSERT INTO `event_tickets` (`id`, `id_event`, `image`, `name`, `quota`, `price`, `tax`, `tax_amount`, `date_start`, `date_end`, `time_start`, `time_end`, `description`, `status`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 2, 'default', 'Ticket Pelajar', 100, 5000, '0', 5, '2023-09-18', '2023-08-04', '09:33:00', '23:36:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(3, 2, 'default', 'Tiket duduk', 100, 20000, '1', 5, '2023-08-05', '2023-08-07', '14:33:00', '23:36:00', 'tiket duduk', 'active', 'paid', '2023-09-17 18:52:11', '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(4, 3, 'default', 'Ticket Umum', 100, 5000, '0', 5, '2023-09-18', '2023-12-14', '03:20:00', '20:49:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-08-04 07:46:28', '2023-09-17 19:10:03'),
(5, 4, 'default', 'GA ( STANDING ) - PRESALE', 100, 5000, '1', 5, '2023-09-17', '2023-08-29', '18:50:00', '20:53:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-08-04 07:49:58', '2023-09-18 01:42:31'),
(6, 5, '64d0609b55fbd1691377819-5-event-ticket.png', 'GA Standing', 500, 150000, '1', 5, '2023-08-20', '2023-08-26', '10:04:00', '23:04:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'active', 'paid', NULL, '2023-08-07 03:10:19', '2023-08-07 03:10:19'),
(7, 6, '64d060a3a51811691377827-6-event-ticket.png', 'GA Standing', 500, 150000, '1', 5, '2023-08-20', '2023-08-26', '10:04:00', '23:04:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'active', 'paid', NULL, '2023-08-07 03:10:27', '2023-08-07 03:10:27'),
(8, 7, 'default', 'GA ( STANDING ) - PRESALE', 100, 5000, '1', 5, '2023-09-17', '2023-11-03', '10:04:00', '23:04:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(9, 7, 'default', 'GA ( SEAT ) NORMAL PRICE', 100, 5000, '1', 5, '2023-09-17', '2023-11-03', '10:04:00', '23:04:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(10, 8, 'default', 'GA ( STANDING ) - PRESALE', 100, 5000, '1', 5, '2023-11-01', '2023-11-14', '14:14:00', '18:14:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-09-05 08:16:23', '2023-09-18 01:41:59'),
(11, 9, 'default', 'Sale', 100, 5000, '0', 5, '2023-09-18', '2023-09-21', '00:01:00', '23:59:00', 'Tiket yang sudah dibeli tidak dapat dikembalikan.', 'active', 'paid', NULL, '2023-09-12 03:40:23', '2023-09-18 05:55:31'),
(12, 8, 'default', 'GA ( SEAT ) NORMAL PRICE', 100, 0, '0', 5, '2023-11-15', '2023-11-15', '01:12:00', '18:15:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', NULL, '2023-09-17 18:14:28', '2023-09-18 01:41:59'),
(13, 9, 'default', 'Ticket Kendaraan Motor', 1000000000, 10000, '0', 5, '2023-09-01', '2023-12-31', '01:31:00', '23:32:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', '2023-09-18 05:55:31', '2023-09-17 18:34:17', '2023-09-18 05:55:31'),
(14, 9, 'default', 'Ticket Orang Masuk Ancol', 1000000, 5000, '0', 5, '2023-09-01', '2023-12-31', '01:32:00', '23:32:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', '2023-09-18 05:55:31', '2023-09-17 18:34:17', '2023-09-18 05:55:31'),
(15, 9, 'default', 'Ticket Kendaraan BUS', 100000, 10000, '0', 5, '2023-09-01', '2023-12-31', '01:33:00', '23:33:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', '2023-09-18 05:55:31', '2023-09-17 18:34:17', '2023-09-18 05:55:31'),
(16, 4, 'default', 'GA ( SEAT ) NORMAL PRICE', 100, 5000, '0', 5, '2023-09-17', '2023-11-29', '18:30:00', '19:41:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', NULL, '2023-09-17 18:41:56', '2023-09-18 01:42:31'),
(17, 2, 'default', 'Ticket Umum', 1000, 5000, '0', 5, '2023-09-18', '2023-11-03', '01:51:00', '20:51:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', NULL, '2023-09-17 18:52:11', '2023-09-17 18:52:11'),
(18, 3, 'default', 'Ticket VIP', 100, 5000, '0', 5, '2023-09-18', '2023-12-14', '02:09:00', '18:09:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', NULL, '2023-09-17 19:10:03', '2023-09-17 19:10:03'),
(20, 11, 'default', 'Ticket Umum', 1000, 4000, '1', 5, '2023-09-18', '2023-10-14', '02:25:00', '23:25:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', '2023-09-18 05:44:53', '2023-09-17 19:27:03', '2023-09-18 05:44:53'),
(32, 23, '65075a2dc122a1694980653-23-event-ticket.png', 'Ticket Umum', 100, 5000, '1', 5, '2023-09-18', '2023-11-02', '00:01:00', '23:57:00', 'Tiket Umum', 'active', 'free', '2023-09-18 05:19:17', '2023-09-17 19:57:33', '2023-09-18 05:19:17'),
(33, 23, '65075a2dc2cfd1694980653-23-event-ticket.png', 'Ticket VIP', 1000, 5000, '1', 5, '2023-09-18', '2023-11-01', '00:01:00', '23:59:00', 'VIP Ticket', 'active', 'free', '2023-09-18 05:19:17', '2023-09-17 19:57:33', '2023-09-18 05:19:17'),
(35, 25, '65075af87582d1694980856-25-event-ticket.png', 'Ticket Umum', 1000000, 5000, '0', 5, '2023-09-18', '2024-01-31', '00:01:00', '23:59:00', 'Tiket Umum', 'active', 'free', NULL, '2023-09-17 20:00:56', '2023-09-17 20:00:56'),
(36, 26, 'default', 'Ticket Umum', 1000000, 5000, '0', 5, '2023-09-18', '2024-01-03', '00:05:00', '23:05:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', NULL, '2023-09-17 20:05:37', '2023-09-18 06:19:07'),
(37, 27, '65075cd6838401694981334-27-event-ticket.png', 'Tiket Umum', 1000000, 5000, '0', 5, '2023-09-18', '2024-06-11', '00:08:00', '23:59:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'free', NULL, '2023-09-17 20:08:54', '2023-09-17 20:08:54'),
(38, 23, 'default', 'Presale 1', 100, 5000, '0', 5, '2023-09-18', '2023-11-11', '00:08:00', '23:58:00', 'Tiket yang sudah dibeli tidak dapat dikembalikan.', 'active', 'paid', NULL, '2023-09-18 05:19:17', '2023-09-18 06:02:40'),
(39, 23, 'default', 'Presale Festival', 100, 6000, '0', 5, '2023-09-18', '2023-09-17', '00:17:00', '23:59:00', 'Tiket yang sudah dibeli tidak dapat dikembalikan.', 'active', 'paid', NULL, '2023-09-18 05:19:17', '2023-09-18 06:02:40'),
(40, 11, 'default', 'PRESALE 1 ( VIP ) - 3 Day Pass', 100, 5000, '0', 5, '2023-09-18', '2023-09-28', '00:42:00', '23:42:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-09-18 05:44:53', '2023-09-18 05:44:53'),
(41, 11, 'default', 'PRESALE 1 ( GENERAL ) - 3 Day Pass', 1000, 5000, '0', 5, '2023-09-18', '2023-09-28', '00:11:00', '23:44:00', '1 Ticket hanya berlaku untuk 1 orang', 'active', 'paid', NULL, '2023-09-18 05:44:53', '2023-09-18 05:44:53'),
(42, 9, 'default', 'Presale', 100, 6000, '0', 5, '2023-09-18', '2023-09-21', '00:01:00', '23:59:00', 'Tiket yang sudah dibeli tidak dapat dikembalikan.', 'active', 'paid', NULL, '2023-09-18 05:55:31', '2023-09-18 05:55:31'),
(43, 9, 'default', 'Early Birds', 100, 7000, '0', 5, '2023-09-18', '2023-09-21', '00:01:00', '23:59:00', 'Tiket yang sudah dibeli tidak dapat dikembalikan.', 'active', 'paid', NULL, '2023-09-18 05:55:31', '2023-09-18 05:55:31'),
(44, 26, 'default', 'Tiket', 100, 1000, '0', 5, '2023-09-18', '2023-09-18', '13:18:00', '18:23:00', 'tiket', 'active', 'paid', NULL, '2023-09-18 06:19:07', '2023-09-18 06:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `event_ticket_seats`
--

CREATE TABLE `event_ticket_seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `row` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_ticket_seats`
--

INSERT INTO `event_ticket_seats` (`id`, `id_event`, `id_ticket`, `image`, `section`, `row`, `seat`, `price`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'default', 'Section 1', 'A', 10, 20000, 'active', '2023-09-17 18:52:11', '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(3, 2, 2, 'default', 'Section 1', 'B', 10, 25000, 'active', '2023-09-17 18:52:11', '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(4, 2, 2, 'default', 'Section 2', 'A', 10, 30000, 'active', '2023-09-17 18:52:11', '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(5, 2, 2, 'default', 'Section 3', 'B', 10, 35000, 'active', '2023-09-17 18:52:11', '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(6, 2, 3, 'default', 'Section 1', 'A', 10, 20000, 'active', NULL, '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(7, 2, 3, 'default', 'Section 1', 'B', 10, 25000, 'active', NULL, '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(8, 2, 3, 'default', 'Section 2', 'A', 10, 30000, 'active', NULL, '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(9, 2, 3, 'default', 'Section 3', 'B', 10, 35000, 'active', NULL, '2023-08-04 07:40:58', '2023-09-17 18:52:11'),
(10, 3, 4, 'default', 'section 1', 'A', 50, 100000, 'active', '2023-09-17 19:10:03', '2023-08-04 07:46:28', '2023-09-17 19:10:03'),
(11, 4, 5, 'default', 'Section A', 'A', 50, 50000, 'active', '2023-09-17 18:41:56', '2023-08-04 07:49:58', '2023-09-17 18:41:56'),
(12, 4, 5, 'default', 'Section 2', 'B', 20, 60000, 'active', '2023-09-17 18:41:56', '2023-08-04 07:49:58', '2023-09-17 18:41:56'),
(13, 5, 6, 'default', '400', 'A', 100, 500000, 'active', NULL, '2023-08-07 03:10:19', '2023-08-07 03:10:19'),
(14, 5, 6, 'default', '400', 'B', 100, 550000, 'active', NULL, '2023-08-07 03:10:19', '2023-08-07 03:10:19'),
(15, 5, 6, 'default', '400', 'C', 100, 600000, 'active', NULL, '2023-08-07 03:10:19', '2023-08-07 03:10:19'),
(16, 5, 6, 'default', '400', 'D', 100, 650000, 'active', NULL, '2023-08-07 03:10:19', '2023-08-07 03:10:19'),
(17, 5, 6, 'default', '400', 'E', 100, 700000, 'active', NULL, '2023-08-07 03:10:19', '2023-08-07 03:10:19'),
(18, 6, 7, 'default', '400', 'A', 100, 500000, 'active', NULL, '2023-08-07 03:10:27', '2023-08-07 03:10:27'),
(19, 6, 7, 'default', '400', 'B', 100, 550000, 'active', NULL, '2023-08-07 03:10:27', '2023-08-07 03:10:27'),
(20, 6, 7, 'default', '400', 'C', 100, 600000, 'active', NULL, '2023-08-07 03:10:27', '2023-08-07 03:10:27'),
(21, 6, 7, 'default', '400', 'D', 100, 650000, 'active', NULL, '2023-08-07 03:10:27', '2023-08-07 03:10:27'),
(22, 6, 7, 'default', '400', 'E', 100, 700000, 'active', NULL, '2023-08-07 03:10:27', '2023-08-07 03:10:27'),
(23, 7, 8, 'default', '400', 'A', 100, 500000, 'active', '2023-09-17 18:24:24', '2023-08-07 03:15:23', '2023-09-17 18:24:24'),
(24, 7, 8, 'default', '400', 'B', 100, 550000, 'active', '2023-09-17 18:24:24', '2023-08-07 03:15:23', '2023-09-17 18:24:24'),
(25, 7, 8, 'default', '400', 'C', 100, 600000, 'active', '2023-09-17 18:24:24', '2023-08-07 03:15:23', '2023-09-17 18:24:24'),
(26, 7, 8, 'default', '400', 'D', 100, 650000, 'active', '2023-09-17 18:24:24', '2023-08-07 03:15:23', '2023-09-17 18:24:24'),
(27, 7, 8, 'default', '400', 'E', 100, 700000, 'active', '2023-09-17 18:24:24', '2023-08-07 03:15:23', '2023-09-17 18:24:24'),
(28, 7, 9, 'default', '1', 'A', 10, 5000, 'active', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(29, 7, 9, 'default', '1', 'B', 10, 5000, 'active', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(30, 7, 9, 'default', '2', 'A', 10, 5000, 'active', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(31, 7, 9, 'default', '2', 'B', 10, 5000, 'active', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(32, 7, 9, 'default', '3', 'A', 10, 5000, 'active', NULL, '2023-08-07 03:15:23', '2023-09-18 01:42:16'),
(33, 8, 10, 'default', '1', 'A', 10, 15000, 'active', '2023-09-17 18:14:28', '2023-09-05 08:16:23', '2023-09-17 18:14:28'),
(34, 9, 11, 'default', '300', 'A', 10, 230000, 'active', '2023-09-18 05:55:31', '2023-09-12 03:40:23', '2023-09-18 05:55:31'),
(35, 8, 12, 'default', '1', 'A', 10, 5000, 'active', NULL, '2023-09-17 18:14:28', '2023-09-18 01:41:59'),
(36, 8, 12, 'default', '1', 'B', 10, 5000, 'active', NULL, '2023-09-17 18:14:28', '2023-09-18 01:41:59'),
(37, 8, 12, 'default', '1', 'C', 10, 5000, 'active', NULL, '2023-09-17 18:14:28', '2023-09-18 01:41:59'),
(38, 8, 12, 'default', '2', 'A', 10, 5000, 'active', NULL, '2023-09-17 18:14:28', '2023-09-18 01:41:59'),
(39, 8, 12, 'default', '2', 'B', 10, 5000, 'active', NULL, '2023-09-17 18:14:28', '2023-09-18 01:41:59'),
(40, 8, 12, 'default', '3', 'A', 10, 5000, 'active', NULL, '2023-09-17 18:14:28', '2023-09-18 01:41:59'),
(41, 4, 16, 'default', '1', 'A', 10, 5000, 'active', NULL, '2023-09-17 18:41:56', '2023-09-18 01:42:31'),
(42, 4, 16, 'default', '1', 'B', 10, 5000, 'active', NULL, '2023-09-17 18:41:56', '2023-09-18 01:42:31'),
(43, 4, 16, 'default', '2', 'A', 10, 5000, 'active', NULL, '2023-09-17 18:41:56', '2023-09-18 01:42:31'),
(44, 4, 16, 'default', '3', 'A', 10, 5000, 'active', NULL, '2023-09-17 18:41:56', '2023-09-18 01:42:31'),
(45, 11, 20, 'default', '1', 'A', 10, 4000, 'active', NULL, '2023-09-17 19:27:03', '2023-09-18 05:44:53'),
(46, 23, 38, 'default', '1', 'Festival A', 10, 5000, 'active', NULL, '2023-09-18 05:19:17', '2023-09-18 06:02:40'),
(47, 23, 38, 'default', '1', 'Festival B', 10, 5000, 'active', NULL, '2023-09-18 05:19:17', '2023-09-18 06:02:40'),
(48, 23, 39, 'default', '1', 'Festival A', 10, 6000, 'active', NULL, '2023-09-18 05:19:17', '2023-09-18 06:02:40'),
(49, 23, 39, 'default', '1', 'Festival B', 10, 6000, 'active', NULL, '2023-09-18 05:19:17', '2023-09-18 06:02:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_22_035050_create_event_images_table', 1),
(3, '2023_07_22_035050_create_event_ticket_seats_table', 1),
(4, '2023_07_22_035050_create_event_tickets_table', 1),
(5, '2023_07_22_035050_create_events_table', 1),
(6, '2023_07_22_035050_create_order_items_table', 1),
(7, '2023_07_22_035050_create_orders_table', 1),
(8, '2023_07_22_035050_create_promotion_images_table', 2),
(9, '2023_07_22_035050_create_promotions_table', 2),
(10, '2023_07_22_035050_create_user_scanner_table', 2),
(11, '2023_07_22_035050_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `domicile` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_items` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_id` text COLLATE utf8mb4_unicode_ci,
  `payment_method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `id_user`, `email`, `phone`, `name`, `gender`, `dob`, `domicile`, `total_items`, `total_amount`, `payment_id`, `payment_method`, `payment_status`, `payment_description`, `payment_date`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'TXB-64d1f8c4c5a1b-2308080811', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1050000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 08:11:48', '2023-08-08 08:11:48'),
(5, 'TXB-64d1fa3d8d0cf-2308080818', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1050000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 08:18:05', '2023-08-08 08:18:05'),
(6, 'TXB-64d1fa9390384-2308080819', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1050000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 08:19:31', '2023-08-08 08:19:31'),
(7, 'TXB-64d1faba2ce46-2308080820', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1050000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 08:20:10', '2023-08-08 08:20:10'),
(8, 'TXB-64d1ffb661791-2308080841', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 3, 1650000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 08:41:26', '2023-08-08 08:41:26'),
(9, 'TXB-64d2003174a5f-2308080843', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 110000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 08:43:29', '2023-08-08 08:43:29'),
(10, 'TXB-64d20927684ef-2308080921', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 3, 1750000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 09:21:43', '2023-08-08 09:21:43'),
(11, 'TXB-64d24053bed15-2308081317', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky zakiri', 'Male', '1992-06-18', 'Jakarta', 1, 50000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-08 13:17:07', '2023-08-08 13:17:07'),
(12, 'TXB-64d3cd0d6db85-2308091729', 0, 'rezky@gmail.com', '08788875456433', 'john', 'Male', '2002-02-27', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-09 17:29:49', '2023-08-09 17:29:49'),
(13, 'TXB-64d5fd3be7aae-2308110919', 0, 'rezky@gmail.com', '087887257284', 'john', 'Male', '2000-03-01', 'Jakarta', 2, 45000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-11 09:19:55', '2023-08-11 09:19:55'),
(14, 'TXB-64d5fd3c6225b-2308110919', 0, 'rezky@gmail.com', '087887257284', 'john', 'Male', '2000-03-01', 'Jakarta', 2, 45000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-11 09:19:56', '2023-08-11 09:19:56'),
(15, 'TXB-64d860b774c55-2308130448', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:48:55', '2023-08-13 04:48:55'),
(16, 'TXB-64d860b8d8c3e-2308130448', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:48:56', '2023-08-13 04:48:56'),
(17, 'TXB-64d860bcef84b-2308130449', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:49:01', '2023-08-13 04:49:01'),
(18, 'TXB-64d860be29c9a-2308130449', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:49:02', '2023-08-13 04:49:02'),
(19, 'TXB-64d860becd1eb-2308130449', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:49:02', '2023-08-13 04:49:02'),
(20, 'TXB-64d860c0b13e1-2308130449', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:49:04', '2023-08-13 04:49:04'),
(21, 'TXB-64d860c81426a-2308130449', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:49:12', '2023-08-13 04:49:12'),
(22, 'TXB-64d860cb8b020-2308130449', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:49:15', '2023-08-13 04:49:15'),
(23, 'TXB-64d860cf154fd-2308130449', 0, 'Gff@gmail.com', '087887543465', 'John', 'Male', '1992-08-13', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-13 04:49:19', '2023-08-13 04:49:19'),
(24, 'TXB-64d97f439dda6-2308140111', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-14 01:11:31', '2023-08-14 01:11:31'),
(25, 'TXB-64d9a65d7b3c9-2308140358', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1100000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-14 03:58:21', '2023-08-14 03:58:21'),
(26, 'TXB-64d9a6aa9eb84-2308140359', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 3, 810000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-14 03:59:38', '2023-08-14 03:59:38'),
(27, 'TXB-64d9a6d4b288a-2308140400', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 110000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-14 04:00:20', '2023-08-14 04:00:20'),
(28, 'TXB-64d9ae893abe0-2308140433', 0, 'rezky@gmail.com', '08788727272722', 'doe', 'Female', '1999-07-08', 'Jakarta', 1, 500000, NULL, 'BANK_TRANSFER', 'PAID', '{\"id\":\"579c8d61f23fa4ca35e52da4\",\"external_id\":\"invoice_123124123\",\"user_id\":\"5781d19b2e2385880609791c\",\"is_high\":true,\"payment_method\":\"BANK_TRANSFER\",\"status\":\"PAID\",\"merchant_name\":\"Xendit\",\"amount\":50000,\"paid_amount\":50000,\"bank_code\":\"PERMATA\",\"paid_at\":\"2016-10-12T08:15:03.404Z\",\"payer_email\":\"wildan@xendit.co\",\"description\":\"This is a description\",\"adjusted_received_amount\":47500,\"fees_paid_amount\":0,\"updated\":\"2016-10-10T08:15:03.404Z\",\"created\":\"2016-10-10T08:15:03.404Z\",\"currency\":\"IDR\",\"payment_channel\":\"PERMATA\",\"payment_destination\":\"888888888888\"}', '2016-10-12', 'PAID', '-', NULL, '2023-08-14 04:33:13', '2023-09-03 14:00:11'),
(39, 'TXB-64dee3a3a2612-2308181021', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 3, 1650000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-18 10:21:07', '2023-08-18 10:21:07'),
(40, 'TXB-64dee3a9b3c29-2308181021', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 3, 1650000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-18 10:21:13', '2023-08-18 10:21:13'),
(41, 'TXB-64dee3ec46f42-2308181022', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 3, 1650000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-18 10:22:20', '2023-08-18 10:22:20'),
(42, 'TXB-64dee410f2709-2308181022', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 3, 1650000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-18 10:22:57', '2023-08-18 10:22:57'),
(43, 'TXB-64df16502811d-2308181357', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky zakiri', 'Male', '1999-02-11', 'Jakarta', 2, 650000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-18 13:57:20', '2023-08-18 13:57:20'),
(44, 'TXB-64e2e28a20197-2308211105', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-21 11:05:30', '2023-08-21 11:05:30'),
(45, 'TXB-64e49f1ad1f1e-2308221842', 0, 'dimaspraharsa@yahoo.com', '038039392391', 'Dimas', 'Female', '2023-08-22', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-22 18:42:18', '2023-08-22 18:42:18'),
(46, 'TXB-64e573e50af31-2308230950', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1050000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-23 09:50:13', '2023-08-23 09:50:13'),
(47, 'TXB-64e574fb704fb-2308230954', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1050000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-23 09:54:51', '2023-08-23 09:54:51'),
(48, 'TXB-64e81e5de7544-2308251022', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1000000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-08-25 10:22:05', '2023-08-25 10:22:05'),
(49, 'TXB-64f1d47162cdb-2309011909', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 1050000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-09-01 12:09:21', '2023-09-01 12:09:21'),
(50, 'TXB-64f48d0153bd5-2309032041', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 500000, NULL, 'default', 'default', 'default', '2999-01-01', 'default', 'default', NULL, '2023-09-03 13:41:21', '2023-09-03 13:41:21'),
(51, 'TXB-64f4953a26746-2309032116', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 500000, '64f4953aaab3b73e4f8d3026', 'none', 'UNPAID', 'none', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-03 14:16:27', '2023-09-03 14:16:27'),
(52, 'TXB-64f4960b7523e-2309032119', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 550000, '64f4960baab3b7db7d8d352f', 'none', 'UNPAID', '{\"id\":\"64f4960baab3b7db7d8d352f\",\"external_id\":\"TXB-64f4960b7523e-2309032119\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":550000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64f4960b7523e-2309032119\",\"expiry_date\":\"2023-09-03T14:33:55.921Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f4960baab3b7db7d8d352f\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-03T14:19:56.676Z\",\"updated\":\"2023-09-03T14:19:56.676Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-03 14:19:56', '2023-09-03 14:19:56'),
(53, 'TXB-64f49a24b3d37-2309032137', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 500000, '64f49a258bea5f1eb860e197', 'none', 'UNPAID', '{\"id\":\"64f49a258bea5f1eb860e197\",\"external_id\":\"TXB-64f49a24b3d37-2309032137\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":500000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64f49a24b3d37-2309032137\",\"expiry_date\":\"2023-09-03T14:51:25.650Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f49a258bea5f1eb860e197\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-03T14:37:26.404Z\",\"updated\":\"2023-09-03T14:37:26.404Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-03 14:37:26', '2023-09-03 14:37:26'),
(54, 'TXB-64f49d7b9f4db-2309032151', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 600000, '64f49d7c8bea5f55d860f72b', 'none', 'UNPAID', '{\"id\":\"64f49d7c8bea5f55d860f72b\",\"external_id\":\"TXB-64f49d7b9f4db-2309032151\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":600000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64f49d7b9f4db-2309032151\",\"expiry_date\":\"2023-09-03T15:05:40.240Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f49d7c8bea5f55d860f72b\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":600000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":600000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":600000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":600000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":600000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":600000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-03T14:51:40.984Z\",\"updated\":\"2023-09-03T14:51:40.984Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-03 14:51:41', '2023-09-03 14:51:41'),
(55, 'TXB-64f49dc95e2d7-2309032152', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 50000, '64f49dca8bea5f380f60f8d7', 'none', 'UNPAID', '{\"id\":\"64f49dca8bea5f380f60f8d7\",\"external_id\":\"TXB-64f49dc95e2d7-2309032152\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":50000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64f49dc95e2d7-2309032152\",\"expiry_date\":\"2023-09-03T15:06:58.038Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f49dca8bea5f380f60f8d7\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-03T14:52:58.809Z\",\"updated\":\"2023-09-03T14:52:58.809Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-03 14:52:59', '2023-09-03 14:52:59'),
(56, 'TXB-64f49e2913e8d-2309032154', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 550000, '64f49e29860b761b4e18494a', 'none', 'UNPAID', '{\"id\":\"64f49e29860b761b4e18494a\",\"external_id\":\"TXB-64f49e2913e8d-2309032154\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":550000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64f49e2913e8d-2309032154\",\"expiry_date\":\"2023-09-03T15:08:33.787Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f49e29860b761b4e18494a\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":550000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-03T14:54:34.347Z\",\"updated\":\"2023-09-03T14:54:34.347Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-03 14:54:34', '2023-09-03 14:54:34'),
(57, 'TXB-64f54bb8055f0-2309041015', 0, 'wildanjailani@gmail.com', '8128882220', 'Wildan J Saputra', 'Male', '1992-01-17', 'Jakarta', 1, 50000, '64f54bb985bbefcc96b8c41b', 'none', 'UNPAID', '{\"id\":\"64f54bb985bbefcc96b8c41b\",\"external_id\":\"TXB-64f54bb8055f0-2309041015\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":50000,\"payer_email\":\"wildanjailani@gmail.com\",\"description\":\"Invoice for Order: TXB-64f54bb8055f0-2309041015\",\"expiry_date\":\"2023-09-04T03:29:05.194Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f54bb985bbefcc96b8c41b\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-04T03:15:05.925Z\",\"updated\":\"2023-09-04T03:15:05.925Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-04 03:15:06', '2023-09-04 03:15:06'),
(58, 'TXB-64f6dc780f0a9-2309051444', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky', 'Male', '1993-02-11', 'Jakarta', 1, 500000, '64f6dc79e5b1f6d6de18fe52', 'none', 'UNPAID', '{\"id\":\"64f6dc79e5b1f6d6de18fe52\",\"external_id\":\"TXB-64f6dc780f0a9-2309051444\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":500000,\"payer_email\":\"rezkyzakiri@gmail.com\",\"description\":\"Invoice for Order: TXB-64f6dc780f0a9-2309051444\",\"expiry_date\":\"2023-09-05T07:58:57.226Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f6dc79e5b1f6d6de18fe52\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":500000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-05T07:44:57.947Z\",\"updated\":\"2023-09-05T07:44:57.947Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-05 07:44:58', '2023-09-05 07:44:58'),
(59, 'TXB-64f6e4426360c-2309051518', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky zakiri', 'Male', '1995-03-16', 'Jakarta', 1, 15000, '64f6e442023e59e3403bb9ff', 'BANK_TRANSFER', 'PAID', '{\"id\":\"64f6e442023e59e3403bb9ff\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"external_id\":\"TXB-64f6e4426360c-2309051518\",\"is_high\":false,\"status\":\"PAID\",\"merchant_name\":\"Tiketbox.com\",\"amount\":15000,\"created\":\"2023-09-05T08:18:11.603Z\",\"updated\":\"2023-09-05T08:19:48.860Z\",\"payer_email\":\"rezkyzakiri@gmail.com\",\"description\":\"Invoice for Order: TXB-64f6e4426360c-2309051518\",\"payment_id\":\"f714785b-990a-47e8-804f-b8506c7d7906\",\"paid_amount\":15000,\"payment_method\":\"BANK_TRANSFER\",\"bank_code\":\"MANDIRI\",\"currency\":\"IDR\",\"paid_at\":\"2023-09-05T08:19:44.000Z\",\"payment_channel\":\"MANDIRI\",\"payment_destination\":\"8890839767166311316\"}', '2023-09-05', 'PAID', '-', NULL, '2023-09-05 08:18:12', '2023-09-05 08:19:49'),
(60, 'TXB-64f6e44447843-2309051518', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky zakiri', 'Male', '1995-03-16', 'Jakarta', 1, 15000, '64f6e4446c32fefa7de593cd', 'none', 'UNPAID', '{\"id\":\"64f6e4446c32fefa7de593cd\",\"external_id\":\"TXB-64f6e44447843-2309051518\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":15000,\"payer_email\":\"rezkyzakiri@gmail.com\",\"description\":\"Invoice for Order: TXB-64f6e44447843-2309051518\",\"expiry_date\":\"2023-09-05T08:32:12.967Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64f6e4446c32fefa7de593cd\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-05T08:18:13.511Z\",\"updated\":\"2023-09-05T08:18:13.511Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-05 08:18:14', '2023-09-05 08:18:14'),
(61, 'TXB-64f979d7c67d2-2309071420', 0, 'wildan@tiketbox.com', '08128882220', 'Wildan J Saputraa', 'Male', '1993-05-28', 'Jakarta', 1, 15000, '64f979d847735b0ef9f808ad', 'QR_CODE', 'PAID', '{\"id\":\"64f979d847735b0ef9f808ad\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"external_id\":\"TXB-64f979d7c67d2-2309071420\",\"is_high\":false,\"status\":\"PAID\",\"merchant_name\":\"Tiketbox.com\",\"amount\":15000,\"created\":\"2023-09-07T07:20:57.574Z\",\"updated\":\"2023-09-07T07:21:43.828Z\",\"payer_email\":\"wildan@tiketbox.com\",\"description\":\"Invoice for Order: TXB-64f979d7c67d2-2309071420\",\"payment_id\":\"qrpy_58a4638a-8ec6-4492-aa38-b57494c91897\",\"paid_amount\":15000,\"payment_method\":\"QR_CODE\",\"currency\":\"IDR\",\"paid_at\":\"2023-09-07T07:21:42.000Z\",\"payment_channel\":\"QRIS\",\"payment_method_id\":\"pm-35db9864-6478-4df2-9b8f-11a7f67ee50e\",\"payment_details\":{\"receipt_id\":\"000143953762\",\"source\":\"Gopay\"}}', '2023-09-07', 'PAID', '-', NULL, '2023-09-07 07:20:58', '2023-09-07 07:21:45'),
(62, 'TXB-64ffe0492f104-2309121051', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 230000, '64ffe04b02b906690ff8e76b', 'none', 'UNPAID', '{\"id\":\"64ffe04b02b906690ff8e76b\",\"external_id\":\"TXB-64ffe0492f104-2309121051\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":230000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64ffe0492f104-2309121051\",\"expiry_date\":\"2023-09-12T04:05:39.276Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64ffe04b02b906690ff8e76b\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":230000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":230000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":230000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":230000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":230000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":230000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-12T03:51:39.831Z\",\"updated\":\"2023-09-12T03:51:39.831Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-12 03:51:40', '2023-09-12 03:51:40'),
(63, 'TXB-64ffe482f0c9f-2309121109', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 25000, '64ffe48327a1452a0ebc8e3f', 'none', 'UNPAID', '{\"id\":\"64ffe48327a1452a0ebc8e3f\",\"external_id\":\"TXB-64ffe482f0c9f-2309121109\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":25000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64ffe482f0c9f-2309121109\",\"expiry_date\":\"2023-09-12T04:23:39.324Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64ffe48327a1452a0ebc8e3f\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":25000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":25000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":25000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":25000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":25000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":25000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-12T04:09:40.063Z\",\"updated\":\"2023-09-12T04:09:40.063Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-12 04:09:40', '2023-09-12 04:09:40'),
(64, 'TXB-64ffe5d59907c-2309121115', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 2, 50000, '64ffe5d64a4a3188c962a30d', 'none', 'UNPAID', '{\"id\":\"64ffe5d64a4a3188c962a30d\",\"external_id\":\"TXB-64ffe5d59907c-2309121115\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":50000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-64ffe5d59907c-2309121115\",\"expiry_date\":\"2023-09-12T04:29:18.502Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/64ffe5d64a4a3188c962a30d\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":50000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-12T04:15:19.255Z\",\"updated\":\"2023-09-12T04:15:19.255Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-12 04:15:20', '2023-09-12 04:15:20'),
(65, 'TXB-6502dd7ad8e36-2309141716', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky doe', 'Male', '1998-02-05', 'Jakarta', 4, 80000, '6502dd7c5a536abd09d0b871', 'none', 'UNPAID', '{\"id\":\"6502dd7c5a536abd09d0b871\",\"external_id\":\"TXB-6502dd7ad8e36-2309141716\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":80000,\"payer_email\":\"rezkyzakiri@gmail.com\",\"description\":\"Invoice for Order: TXB-6502dd7ad8e36-2309141716\",\"expiry_date\":\"2023-09-14T10:30:28.105Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/6502dd7c5a536abd09d0b871\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":80000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":80000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":80000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":80000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":80000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":80000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-14T10:16:28.834Z\",\"updated\":\"2023-09-14T10:16:28.834Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-14 10:16:29', '2023-09-14 10:16:29'),
(66, 'TXB-6502ddef335d6-2309141718', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky', 'Male', '1999-02-11', 'Jakarta', 1, 5000, '6502ddeff5f17556058902dd', 'none', 'UNPAID', '{\"id\":\"6502ddeff5f17556058902dd\",\"external_id\":\"TXB-6502ddef335d6-2309141718\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":5000,\"payer_email\":\"rezkyzakiri@gmail.com\",\"description\":\"Invoice for Order: TXB-6502ddef335d6-2309141718\",\"expiry_date\":\"2023-09-14T10:32:23.461Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/6502ddeff5f17556058902dd\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-14T10:18:24.183Z\",\"updated\":\"2023-09-14T10:18:24.183Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-14 10:18:24', '2023-09-14 10:18:24'),
(67, 'TXB-6505f19cbf8f9-2309170119', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 15000, '6505f19d4096ead78963b350', 'none', 'UNPAID', '{\"id\":\"6505f19d4096ead78963b350\",\"external_id\":\"TXB-6505f19cbf8f9-2309170119\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":15000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-6505f19cbf8f9-2309170119\",\"expiry_date\":\"2023-09-16T18:33:09.021Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/6505f19d4096ead78963b350\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-16T18:19:09.536Z\",\"updated\":\"2023-09-16T18:19:09.536Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-16 18:19:10', '2023-09-16 18:19:10');
INSERT INTO `orders` (`id`, `order_code`, `id_user`, `email`, `phone`, `name`, `gender`, `dob`, `domicile`, `total_items`, `total_amount`, `payment_id`, `payment_method`, `payment_status`, `payment_description`, `payment_date`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(68, 'TXB-6505f1ceda7d3-2309170119', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 15000, '6505f1cf3bdf35b3d02a209c', 'none', 'UNPAID', '{\"id\":\"6505f1cf3bdf35b3d02a209c\",\"external_id\":\"TXB-6505f1ceda7d3-2309170119\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":15000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-6505f1ceda7d3-2309170119\",\"expiry_date\":\"2023-09-16T18:33:59.683Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/6505f1cf3bdf35b3d02a209c\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-16T18:20:00.431Z\",\"updated\":\"2023-09-16T18:20:00.431Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-16 18:20:01', '2023-09-16 18:20:01'),
(69, 'TXB-650704e8930dc-2309172053', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 15000, '650704ea0bdb301a9400be47', 'none', 'UNPAID', '{\"id\":\"650704ea0bdb301a9400be47\",\"external_id\":\"TXB-650704e8930dc-2309172053\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":15000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-650704e8930dc-2309172053\",\"expiry_date\":\"2023-09-17T14:07:46.502Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/650704ea0bdb301a9400be47\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-17T13:53:47.192Z\",\"updated\":\"2023-09-17T13:53:47.192Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-17 13:53:47', '2023-09-17 13:53:47'),
(70, 'TXB-65070b0398135-2309172119', 0, 'rezkyzakiri@gmail.com', '087887257295', 'rezky', 'Male', '1995-06-09', 'Jakarta', 1, 5000, '65070b03a487a92348f33bf1', 'QR_CODE', 'PAID', '{\"id\":\"65070b03a487a92348f33bf1\",\"amount\":5000,\"status\":\"PAID\",\"created\":\"2023-09-17T14:19:48.666Z\",\"is_high\":false,\"paid_at\":\"2023-09-17T14:21:39.000Z\",\"updated\":\"2023-09-17T14:21:40.177Z\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"currency\":\"IDR\",\"payment_id\":\"qrpy_79307d82-c738-4e75-b328-6c3a8919a44b\",\"description\":\"Invoice for Order: TXB-65070b0398135-2309172119\",\"external_id\":\"TXB-65070b0398135-2309172119\",\"paid_amount\":5000,\"payer_email\":\"rezkyzakiri@gmail.com\",\"merchant_name\":\"Tiketbox.com\",\"payment_method\":\"QR_CODE\",\"payment_channel\":\"QRIS\",\"payment_details\":{\"source\":\"Ovo\",\"receipt_id\":\"28a157fce644\"},\"payment_method_id\":\"pm-654adc74-c930-4c72-8c48-1cb58f693b82\"}', '2023-09-17', 'PAID', 'Y', NULL, '2023-09-17 14:19:49', '2023-09-17 22:54:47'),
(71, 'TXB-6507e0152fc1f-2309181228', 0, 'yudiripayansah@gmail.com', '08121913683', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 4000, '6507e017e9773c42b729cd0d', 'none', 'UNPAID', '{\"id\":\"6507e017e9773c42b729cd0d\",\"external_id\":\"TXB-6507e0152fc1f-2309181228\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":4000,\"payer_email\":\"yudiripayansah@gmail.com\",\"description\":\"Invoice for Order: TXB-6507e0152fc1f-2309181228\",\"expiry_date\":\"2023-09-18T05:42:55.810Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/6507e017e9773c42b729cd0d\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":4000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":4000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":4000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":4000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":4000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":4000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-18T05:28:56.553Z\",\"updated\":\"2023-09-18T05:28:56.553Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-18 05:28:57', '2023-09-18 05:28:57'),
(72, 'TXB-6507ec594e210-2309181321', 0, 'mohammadrzakiri@gmail.com', '087887257295', 'zakiri', 'Male', '1993-06-18', 'Jakarta', 1, 1000, '6507ec5aa487a91a22f81d40', 'QR_CODE', 'PAID', '{\"id\":\"6507ec5aa487a91a22f81d40\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"external_id\":\"TXB-6507ec594e210-2309181321\",\"is_high\":false,\"status\":\"PAID\",\"merchant_name\":\"Tiketbox.com\",\"amount\":1000,\"created\":\"2023-09-18T06:21:14.846Z\",\"updated\":\"2023-09-18T06:22:33.380Z\",\"payer_email\":\"mohammadrzakiri@gmail.com\",\"description\":\"Invoice for Order: TXB-6507ec594e210-2309181321\",\"payment_id\":\"qrpy_62637186-e477-45ac-9c7f-14f335c3d445\",\"paid_amount\":1000,\"payment_method\":\"QR_CODE\",\"currency\":\"IDR\",\"paid_at\":\"2023-09-18T06:22:32.000Z\",\"payment_channel\":\"QRIS\",\"payment_method_id\":\"pm-b5ff8e20-de73-4977-aed3-1e97d43cf1fb\",\"payment_details\":{\"receipt_id\":\"000147518898\",\"source\":\"Gopay\"}}', '2023-09-18', 'PAID', 'Y', NULL, '2023-09-18 06:21:15', '2023-09-18 06:22:37'),
(73, 'TXB-650810736b004-2309181555', 0, 'ripayansahyudi@gmail.com', '08998594720', 'Yudi Ripayansah', 'Male', '1993-05-28', 'Jakarta', 1, 5000, '650810733ce7b06feb994090', 'none', 'UNPAID', '{\"id\":\"650810733ce7b06feb994090\",\"external_id\":\"TXB-650810736b004-2309181555\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":5000,\"payer_email\":\"ripayansahyudi@gmail.com\",\"description\":\"Invoice for Order: TXB-650810736b004-2309181555\",\"expiry_date\":\"2023-09-18T09:09:15.706Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/650810733ce7b06feb994090\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-18T08:55:16.465Z\",\"updated\":\"2023-09-18T08:55:16.465Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-18 08:55:22', '2023-09-18 08:55:22'),
(74, 'TXB-650a4fdb83cd1-2309200850', 0, 'vikri1990@gmail.com', '08111441405', 'vikri', 'Male', '1990-05-14', 'Jakarta', 3, 15000, '650a4fdb142b849f87964d79', 'none', 'UNPAID', '{\"id\":\"650a4fdb142b849f87964d79\",\"external_id\":\"TXB-650a4fdb83cd1-2309200850\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":15000,\"payer_email\":\"vikri1990@gmail.com\",\"description\":\"Invoice for Order: TXB-650a4fdb83cd1-2309200850\",\"expiry_date\":\"2023-09-20T02:04:19.938Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/650a4fdb142b849f87964d79\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":15000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-20T01:50:20.482Z\",\"updated\":\"2023-09-20T01:50:20.482Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-20 01:50:26', '2023-09-20 01:50:26'),
(75, 'TXB-650a758a9c101-2309201131', 0, 'vikri1990@gmail.com', '08111441405', 'Vikri', 'Male', '1880-04-13', 'Jakarta', 1, 5000, '650a758bde054e9fb5a946fa', 'none', 'UNPAID', '{\"id\":\"650a758bde054e9fb5a946fa\",\"external_id\":\"TXB-650a758a9c101-2309201131\",\"user_id\":\"639c10eb76686a74fa0dce00\",\"status\":\"PENDING\",\"merchant_name\":\"Tiketbox.com\",\"merchant_profile_picture_url\":\"https:\\/\\/xnd-merchant-logos.s3.amazonaws.com\\/business\\/production\\/639c10eb76686a74fa0dce00-1679296542724.png\",\"amount\":5000,\"payer_email\":\"vikri1990@gmail.com\",\"description\":\"Invoice for Order: TXB-650a758a9c101-2309201131\",\"expiry_date\":\"2023-09-20T04:45:07.650Z\",\"invoice_url\":\"https:\\/\\/checkout.xendit.co\\/v2\\/650a758bde054e9fb5a946fa\",\"available_banks\":[{\"bank_code\":\"BJB\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BNI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BRI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"MANDIRI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"PERMATA\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0},{\"bank_code\":\"BSI\",\"collection_type\":\"POOL\",\"transfer_amount\":5000,\"bank_branch\":\"Virtual Account\",\"account_holder_name\":\"TIKETBOX.COM\",\"identity_amount\":0}],\"available_retail_outlets\":[],\"available_ewallets\":[{\"ewallet_type\":\"ASTRAPAY\"},{\"ewallet_type\":\"DANA\"},{\"ewallet_type\":\"OVO\"},{\"ewallet_type\":\"SHOPEEPAY\"}],\"available_qr_codes\":[{\"qr_code_type\":\"QRIS\"}],\"available_direct_debits\":[],\"available_paylaters\":[{\"paylater_type\":\"UANGME\"},{\"paylater_type\":\"AKULAKU\"}],\"should_exclude_credit_card\":true,\"should_send_email\":false,\"created\":\"2023-09-20T04:31:08.173Z\",\"updated\":\"2023-09-20T04:31:08.173Z\",\"currency\":\"IDR\"}', '2999-01-01', 'UNPAID', '-', NULL, '2023-09-20 04:31:08', '2023-09-20 04:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_seat` int(11) NOT NULL,
  `section` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `row` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `date`, `id_order`, `id_event`, `id_ticket`, `id_seat`, `section`, `row`, `seat`, `price`, `amount`, `total`, `description`, `status`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2023-08-20', 4, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-08 08:11:48', '2023-08-08 08:11:48'),
(2, '2023-08-20', 4, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'active', 0, NULL, '2023-08-08 08:11:48', '2023-08-08 08:11:48'),
(3, '2023-08-20', 5, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-08 08:18:05', '2023-08-08 08:18:05'),
(4, '2023-08-20', 5, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'active', 0, NULL, '2023-08-08 08:18:05', '2023-08-08 08:18:05'),
(5, '2023-08-20', 6, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-08 08:19:31', '2023-08-08 08:19:31'),
(6, '2023-08-20', 6, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'active', 0, NULL, '2023-08-08 08:19:31', '2023-08-08 08:19:31'),
(7, '2023-08-20', 7, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-08 08:20:10', '2023-08-08 08:20:10'),
(8, '2023-08-20', 7, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'active', 0, NULL, '2023-08-08 08:20:10', '2023-08-08 08:20:10'),
(9, '2023-08-20', 8, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-08 08:41:26', '2023-08-08 08:41:26'),
(10, '2023-08-20', 8, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'active', 0, NULL, '2023-08-08 08:41:26', '2023-08-08 08:41:26'),
(11, '2023-08-20', 8, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'active', 0, NULL, '2023-08-08 08:41:26', '2023-08-08 08:41:26'),
(12, '2023-08-18', 9, 4, 5, 11, 'Section A', 'A', '1', 50000, 1, 50000, 'default', 'active', 0, NULL, '2023-08-08 08:43:29', '2023-08-08 08:43:29'),
(13, '2023-08-18', 9, 4, 5, 12, 'Section 2', 'B', '1', 60000, 1, 60000, 'default', 'active', 0, NULL, '2023-08-08 08:43:29', '2023-08-08 08:43:29'),
(14, '2023-08-20', 10, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-08 09:21:43', '2023-08-08 09:21:43'),
(15, '2023-08-20', 10, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'active', 0, NULL, '2023-08-08 09:21:43', '2023-08-08 09:21:43'),
(16, '2023-08-20', 10, 7, 8, 26, '400', 'D', '1', 650000, 1, 650000, 'default', 'active', 0, NULL, '2023-08-08 09:21:43', '2023-08-08 09:21:43'),
(17, '2023-08-18', 11, 4, 5, 11, 'Section A', 'A', '1', 50000, 1, 50000, 'default', 'active', 0, NULL, '2023-08-08 13:17:07', '2023-08-08 13:17:07'),
(18, '2023-08-20', 12, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-09 17:29:49', '2023-08-09 17:29:49'),
(19, '2023-08-05', 13, 2, 2, 2, 'Section 1', 'A', '1', 20000, 1, 20000, 'default', 'active', 0, NULL, '2023-08-11 09:19:55', '2023-08-11 09:19:55'),
(20, '2023-08-05', 13, 2, 2, 3, 'Section 1', 'B', '6', 25000, 1, 25000, 'default', 'active', 0, NULL, '2023-08-11 09:19:55', '2023-08-11 09:19:55'),
(21, '2023-08-05', 14, 2, 2, 2, 'Section 1', 'A', '1', 20000, 1, 20000, 'default', 'active', 0, NULL, '2023-08-11 09:19:56', '2023-08-11 09:19:56'),
(22, '2023-08-05', 14, 2, 2, 3, 'Section 1', 'B', '6', 25000, 1, 25000, 'default', 'active', 0, NULL, '2023-08-11 09:19:56', '2023-08-11 09:19:56'),
(23, '2023-08-20', 15, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:48:55', '2023-08-13 04:48:55'),
(24, '2023-08-20', 16, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:48:56', '2023-08-13 04:48:56'),
(25, '2023-08-20', 17, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:49:01', '2023-08-13 04:49:01'),
(26, '2023-08-20', 18, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:49:02', '2023-08-13 04:49:02'),
(27, '2023-08-20', 19, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:49:02', '2023-08-13 04:49:02'),
(28, '2023-08-20', 20, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:49:04', '2023-08-13 04:49:04'),
(29, '2023-08-20', 21, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:49:12', '2023-08-13 04:49:12'),
(30, '2023-08-20', 22, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:49:15', '2023-08-13 04:49:15'),
(31, '2023-08-20', 23, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-13 04:49:19', '2023-08-13 04:49:19'),
(32, '2023-08-20', 24, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-14 01:11:31', '2023-08-14 01:11:31'),
(33, '2023-08-20', 25, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-14 03:58:21', '2023-08-14 03:58:21'),
(34, '2023-08-20', 25, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'active', 0, NULL, '2023-08-14 03:58:21', '2023-08-14 03:58:21'),
(35, '2023-08-18', 26, 4, 5, 11, 'Section A', 'A', '1', 50000, 1, 50000, 'default', 'active', 0, NULL, '2023-08-14 03:59:38', '2023-08-14 03:59:38'),
(36, '2023-08-18', 26, 4, 5, 12, 'Section 2', 'B', '1', 60000, 1, 60000, 'default', 'active', 0, NULL, '2023-08-14 03:59:38', '2023-08-14 03:59:38'),
(37, '2023-08-20', 26, 7, 8, 27, '400', 'E', '1', 700000, 1, 700000, 'default', 'active', 0, NULL, '2023-08-14 03:59:38', '2023-08-14 03:59:38'),
(38, '2023-08-18', 27, 4, 5, 12, 'Section 2', 'B', '1', 60000, 1, 60000, 'default', 'active', 0, NULL, '2023-08-14 04:00:20', '2023-08-14 04:00:20'),
(39, '2023-08-18', 27, 4, 5, 11, 'Section A', 'A', '1', 50000, 1, 50000, 'default', 'active', 0, NULL, '2023-08-14 04:00:20', '2023-08-14 04:00:20'),
(40, '2023-08-20', 28, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'active', 0, NULL, '2023-08-14 04:33:13', '2023-08-14 04:33:13'),
(51, '2023-08-20', 39, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-18 10:21:07', '2023-08-18 10:21:07'),
(52, '2023-08-20', 39, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-08-18 10:21:07', '2023-08-18 10:21:07'),
(53, '2023-08-20', 39, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'unused', 0, NULL, '2023-08-18 10:21:07', '2023-08-18 10:21:07'),
(54, '2023-08-20', 40, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-18 10:21:13', '2023-08-18 10:21:13'),
(55, '2023-08-20', 40, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-08-18 10:21:13', '2023-08-18 10:21:13'),
(56, '2023-08-20', 40, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'unused', 0, NULL, '2023-08-18 10:21:13', '2023-08-18 10:21:13'),
(57, '2023-08-20', 41, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-18 10:22:20', '2023-08-18 10:22:20'),
(58, '2023-08-20', 41, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-08-18 10:22:20', '2023-08-18 10:22:20'),
(59, '2023-08-20', 41, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'unused', 0, NULL, '2023-08-18 10:22:20', '2023-08-18 10:22:20'),
(60, '2023-08-20', 42, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-18 10:22:57', '2023-08-18 10:22:57'),
(61, '2023-08-20', 42, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-08-18 10:22:57', '2023-08-18 10:22:57'),
(62, '2023-08-20', 42, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'unused', 0, NULL, '2023-08-18 10:22:57', '2023-08-18 10:22:57'),
(63, '2023-08-27', 43, 3, 4, 10, 'section 1', 'A', '6', 100000, 1, 100000, 'default', 'unused', 0, NULL, '2023-08-18 13:57:20', '2023-08-18 13:57:20'),
(64, '2023-08-20', 43, 7, 8, 24, '400', 'B', '19', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-08-18 13:57:20', '2023-08-18 13:57:20'),
(65, '2023-08-20', 44, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-21 11:05:30', '2023-08-21 11:05:30'),
(66, '2023-08-20', 45, 7, 9, 28, '400', 'A', '16', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-22 18:42:18', '2023-08-22 18:42:18'),
(67, '2023-08-24', 46, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-23 09:50:13', '2023-08-23 09:50:13'),
(68, '2023-08-24', 46, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-08-23 09:50:13', '2023-08-23 09:50:13'),
(69, '2023-08-26', 47, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'used', 4, NULL, '2023-08-23 09:54:51', '2023-08-24 15:12:30'),
(70, '2023-08-26', 47, 7, 9, 29, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-08-23 09:54:51', '2023-08-23 09:54:51'),
(71, '2023-08-20', 48, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-25 10:22:05', '2023-08-25 10:22:05'),
(72, '2023-08-26', 48, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-08-25 10:22:05', '2023-08-25 10:22:05'),
(73, '2023-08-20', 49, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-09-01 12:09:21', '2023-09-01 12:09:21'),
(74, '2023-08-20', 49, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-09-01 12:09:21', '2023-09-01 12:09:21'),
(75, '2023-08-20', 50, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-09-03 13:41:21', '2023-09-03 13:41:21'),
(76, '2023-08-20', 51, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-09-03 14:16:27', '2023-09-03 14:16:27'),
(77, '2023-08-20', 52, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-09-03 14:19:56', '2023-09-03 14:19:56'),
(78, '2023-08-20', 53, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-09-03 14:37:26', '2023-09-03 14:37:26'),
(79, '2023-08-20', 54, 7, 8, 25, '400', 'C', '1', 600000, 1, 600000, 'default', 'unused', 0, NULL, '2023-09-03 14:51:41', '2023-09-03 14:51:41'),
(80, '2023-08-18', 55, 4, 5, 11, 'Section A', 'A', '1', 50000, 1, 50000, 'default', 'unused', 0, NULL, '2023-09-03 14:52:59', '2023-09-03 14:52:59'),
(81, '2023-08-20', 56, 7, 8, 24, '400', 'B', '1', 550000, 1, 550000, 'default', 'unused', 0, NULL, '2023-09-03 14:54:34', '2023-09-03 14:54:34'),
(82, '2023-08-18', 57, 4, 5, 11, 'Section A', 'A', '6', 50000, 1, 50000, 'default', 'unused', 0, NULL, '2023-09-04 03:15:06', '2023-09-04 03:15:06'),
(83, '2023-08-20', 58, 7, 8, 23, '400', 'A', '1', 500000, 1, 500000, 'default', 'unused', 0, NULL, '2023-09-05 07:44:58', '2023-09-05 07:44:58'),
(84, '2023-09-06', 59, 8, 10, 33, '1', 'A', '2', 15000, 1, 15000, 'default', 'unused', 0, NULL, '2023-09-05 08:18:12', '2023-09-05 08:18:12'),
(85, '2023-09-06', 60, 8, 10, 33, '1', 'A', '2', 15000, 1, 15000, 'default', 'unused', 0, NULL, '2023-09-05 08:18:14', '2023-09-05 08:18:14'),
(86, '2023-09-06', 61, 8, 10, 33, '1', 'A', '4', 15000, 1, 15000, 'default', 'unused', 0, NULL, '2023-09-07 07:20:58', '2023-09-07 07:20:58'),
(87, '2999-01-01', 62, 9, 11, 34, '300', 'A', '1', 230000, 1, 230000, 'default', 'unused', 0, NULL, '2023-09-12 03:51:40', '2023-09-12 03:51:40'),
(88, '2023-09-15', 63, 9, 11, 0, '-', '-', '-', 25000, 1, 25000, 'default', 'unused', 0, NULL, '2023-09-12 04:09:40', '2023-09-12 04:09:40'),
(89, '2023-09-12', 64, 9, 11, 0, '-', '-', '-', 25000, 1, 25000, 'default', 'unused', 0, NULL, '2023-09-12 04:15:20', '2023-09-12 04:15:20'),
(90, '2023-09-13', 64, 9, 11, 0, '-', '-', '-', 25000, 1, 25000, 'default', 'unused', 0, NULL, '2023-09-12 04:15:20', '2023-09-12 04:15:20'),
(91, '2023-09-12', 65, 9, 11, 0, '-', '-', '-', 25000, 1, 25000, 'default', 'unused', 0, NULL, '2023-09-14 10:16:29', '2023-09-14 10:16:29'),
(92, '2023-09-13', 65, 9, 11, 0, '-', '-', '-', 25000, 1, 25000, 'default', 'unused', 0, NULL, '2023-09-14 10:16:29', '2023-09-14 10:16:29'),
(93, '2023-09-14', 65, 9, 11, 0, '-', '-', '-', 25000, 1, 25000, 'default', 'unused', 0, NULL, '2023-09-14 10:16:29', '2023-09-14 10:16:29'),
(94, '2023-09-15', 65, 9, 11, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-14 10:16:29', '2023-09-14 10:16:29'),
(95, '2023-09-14', 66, 9, 11, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-14 10:18:24', '2023-09-14 10:18:24'),
(96, '2023-09-05', 67, 8, 10, 33, '1', 'A', '1', 15000, 1, 15000, 'default', 'unused', 0, NULL, '2023-09-16 18:19:10', '2023-09-16 18:19:10'),
(97, '2023-09-05', 68, 8, 10, 33, '1', 'A', '1', 15000, 1, 15000, 'default', 'unused', 0, NULL, '2023-09-16 18:20:01', '2023-09-16 18:20:01'),
(98, '2023-09-06', 69, 8, 10, 33, '1', 'A', '1', 15000, 1, 15000, 'default', 'unused', 0, NULL, '2023-09-17 13:53:47', '2023-09-17 13:53:47'),
(99, '2023-09-17', 70, 9, 11, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-17 14:19:49', '2023-09-17 14:19:49'),
(100, '2023-10-15', 71, 11, 20, 45, '1', 'A', '1', 4000, 1, 4000, 'default', 'unused', 0, NULL, '2023-09-18 05:28:57', '2023-09-18 05:28:57'),
(101, '2023-09-18', 72, 26, 44, 0, '-', '-', '-', 1000, 1, 1000, 'default', 'unused', 0, NULL, '2023-09-18 06:21:15', '2023-09-18 06:21:15'),
(102, '2023-09-18', 73, 27, 37, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-18 08:55:22', '2023-09-18 08:55:22'),
(103, '2023-09-18', 74, 27, 37, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-20 01:50:26', '2023-09-20 01:50:26'),
(104, '2023-09-18', 74, 26, 36, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-20 01:50:26', '2023-09-20 01:50:26'),
(105, '2023-09-19', 74, 26, 36, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-20 01:50:26', '2023-09-20 01:50:26'),
(106, '2023-09-20', 75, 27, 37, 0, '-', '-', '-', 5000, 1, 5000, 'default', 'unused', 0, NULL, '2023-09-20 04:31:08', '2023-09-20 04:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `target_event` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `minimum_amount` int(11) NOT NULL,
  `discount_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_percent` int(11) DEFAULT NULL,
  `amount_rupiah` int(11) DEFAULT NULL,
  `maximum_discount` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `target_event`, `name`, `code`, `type`, `quota`, `minimum_amount`, `discount_type`, `amount_percent`, `amount_rupiah`, `maximum_discount`, `description`, `date_start`, `date_end`, `time_start`, `time_end`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 9, 'Promo Tahun Baru', 'TAHUNBARUPROMO', 'Public', 1000, 100000, 'Persen & Rupiah', 10, 10000, 15000, '<p>Deskripsi</p>', '2023-01-01', '2024-01-01', '08:00:00', '18:00:00', 'active', NULL, '2023-09-17 17:14:46', '2023-09-17 19:41:40'),
(4, 9, 'Indraprastha Talent Night Mr. & Ms. UMN 2023', 'ANCL202012', 'Public', 1000, 250000, 'Persen & Rupiah', 20, 100, 100000, '<h2><strong>Indraprastha Talent Night Mr. &amp; Ms. UMN 2023</strong></h2>', '2023-09-19', '2023-12-01', '23:43:00', '00:00:00', 'active', NULL, '2023-09-17 19:44:25', '2023-09-18 05:50:02'),
(5, 25, 'PLN Mobile Ads', 'AwalBahagia', 'Public', 1000, 1000, 'Persen & Rupiah', 10, 1000, 3000, '<p>Nikmati kemudahan layanan listrik melalui PLN Mobile</p>', '2023-09-18', '2023-09-29', '03:11:00', '00:00:00', 'active', NULL, '2023-09-17 20:12:03', '2023-09-18 05:41:40'),
(6, 27, 'Promo Diskon Indihome', 'DiskonIndihome', 'Public', 1000, 1000, 'Persen & Rupiah', 25, 2000, 2000, '<p>Diskon untuk pembelian Indihome</p>', '2023-09-18', '2023-10-07', '03:13:00', '00:00:00', 'active', NULL, '2023-09-17 20:14:02', '2023-09-18 05:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_images`
--

CREATE TABLE `promotion_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotion_images`
--

INSERT INTO `promotion_images` (`id`, `id_promotion`, `title`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 3, '650734069ef101694970886-3-promotion.png', '650734069ef101694970886-3-promotion.png', NULL, '2023-09-17 17:14:46', '2023-09-17 17:14:46'),
(4, 4, '650757193e6291694979865-4-promotion.png', '650757193e6291694979865-4-promotion.png', '2023-09-18 01:50:04', '2023-09-17 19:44:25', '2023-09-18 01:50:04'),
(5, 5, '65075d93982ca1694981523-5-promotion.png', '65075d93982ca1694981523-5-promotion.png', '2023-09-18 05:41:40', '2023-09-17 20:12:03', '2023-09-18 05:41:40'),
(6, 6, '65075e0a045411694981642-6-promotion.png', '65075e0a045411694981642-6-promotion.png', '2023-09-18 05:40:32', '2023-09-17 20:14:02', '2023-09-18 05:40:32'),
(7, 4, '6507accca11901695001804-4-promotion.png', '6507accca11901695001804-4-promotion.png', '2023-09-18 05:47:03', '2023-09-18 01:50:04', '2023-09-18 05:47:03'),
(8, 6, '6507e2b7308a61695015607-6-promotion.png', '6507e2b7308a61695015607-6-promotion.png', NULL, '2023-09-18 05:40:07', '2023-09-18 05:40:07'),
(9, 5, '6507e314c92391695015700-5-promotion.png', '6507e314c92391695015700-5-promotion.png', NULL, '2023-09-18 05:41:40', '2023-09-18 05:41:40'),
(10, 4, '6507e4578a26b1695016023-4-promotion.png', '6507e4578a26b1695016023-4-promotion.png', '2023-09-18 05:50:02', '2023-09-18 05:47:03', '2023-09-18 05:50:02'),
(11, 4, '6507e50a178211695016202-4-promotion.png', '6507e50a178211695016202-4-promotion.png', NULL, '2023-09-18 05:50:02', '2023-09-18 05:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` text COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `domicile` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `password`, `phone`, `image`, `address`, `gender`, `dob`, `domicile`, `status`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@tiketbox.com', 'Admin', '$2y$10$JK9vKEAuc83QiC.EQRrV.ummIGnE5uEkqFyPapd31ZYlpDRIOJN6O', '08123456789', NULL, 'Address', 'Laki-Laki', '1990-01-01', 'Jakarta', 'active', 'admin', NULL, '2023-08-23 11:22:16', '2023-08-23 11:22:16'),
(2, 'promotor', 'promotor@tiketbox.com', 'Promotor', '$2y$10$4LBuQhpYNfcbzCs3lp18ye6Be2y8QaPyj1cR3ucW0nF/ZJ0lMBy0K', '08123456789', NULL, 'Address', 'Laki-Laki', '1990-01-01', 'Jakarta', 'active', 'promotor', NULL, '2023-08-23 11:22:16', '2023-08-23 11:22:16'),
(3, 'user', 'user@tiketbox.com', 'User', '$2y$10$BwayIiUaS.uK5LvmrK/zO.E3qpprXaFp3vvFsRgatwZNJwvlAf6NO', '08123456789', NULL, 'Address', 'Laki-Laki', '1990-01-01', 'Jakarta', 'active', 'user', NULL, '2023-08-23 11:22:16', '2023-08-23 11:22:16'),
(4, 'scanner', 'scanner@tiketbox.com', 'Scanner', '$2y$10$ZDg6EXwbfTm/MRd.p8KJv.DrA6wIRRY4MahH1gInj4lc/Ysr1DUFu', '08123456789', NULL, 'Address', 'Laki-Laki', '1990-01-01', 'Jakarta', 'active', 'scanner', NULL, '2023-08-23 11:22:16', '2023-08-23 11:22:16'),
(5, 'Yudi Ripayansah64f49d7d029b4', 'yudiripayansah@gmail.com', 'Yudi Ripayansah', '$2y$10$HRzz13Qsos0QrTJX.ohRgecC1wtQVz/5dZaAq5FQXIHQk/RqwwP/6', '08121913683', NULL, 'Jakarta', 'Male', '1993-05-28', 'Jakarta', 'active', 'user', NULL, '2023-09-03 14:51:41', '2023-09-03 14:51:41'),
(6, 'Wildan J Saputra64f54bba4b258', 'wildanjailani@gmail.com', 'Wildan J Saputra', '$2y$10$fIK372FfhN0t5wGuySQs/u9gxGlqJTbC287NB0L0IUC8PhK4xpvgy', '8128882220', NULL, 'Jakarta', 'Male', '1992-01-17', 'Jakarta', 'active', 'user', NULL, '2023-09-04 03:15:06', '2023-09-04 03:15:06'),
(7, 'rezky64f6dc7a44168', 'rezkyzakiri@gmail.com', 'rezky', '$2y$10$VIDXcSPhaBoWitWJyUnHwuW94BxzpA61N4wEMrZq006JjUJqHFiqS', '087887257295', NULL, 'Jakarta', 'Male', '1993-02-11', 'Jakarta', 'active', 'user', NULL, '2023-09-05 07:44:58', '2023-09-17 17:15:51'),
(8, 'Wildan J Saputraa64f979d9e4062', 'wildan@tiketbox.com', 'Wildan J Saputraa', '$2y$10$isCThxWn.R8poHlMaAIJ/O73MBKs.a0vW75v4VDihndQc/dTi2QF6', '08128882220', NULL, 'Jakarta', 'Male', '1993-05-28', 'Jakarta', 'active', 'user', NULL, '2023-09-07 07:20:58', '2023-09-07 07:20:58'),
(9, 'zakiri6507ec5b3717a', 'mohammadrzakiri@gmail.com', 'zakiri', '$2y$10$FHc9br3BT5ShqWPIdAe15utEw22IbfP8j.9qUbQ3xlT353Q3Kdzhe', '087887257295', NULL, 'Jakarta', 'Male', '1993-06-18', 'Jakarta', 'active', 'user', NULL, '2023-09-18 06:21:15', '2023-09-18 06:21:15'),
(10, 'Yudi Ripayansah65081074d8344', 'ripayansahyudi@gmail.com', 'Yudi Ripayansah', '$2y$10$LL5EitsqoVmSx6tVb3KLveTp69k89FyHMBFBVZc4AM3ovElgr8h7q', '08998594720', NULL, 'Jakarta', 'Male', '1993-05-28', 'Jakarta', 'active', 'user', NULL, '2023-09-18 08:55:22', '2023-09-18 08:55:22'),
(11, 'vikri650a4fdcf03f6', 'vikri1990@gmail.com', 'vikri', '$2y$10$OHYHqqfxvrrVBdgPmis0LebO/KxuRuhjsqNMmB0n.y6I2eK2XIEX6', '08111441405', NULL, 'Jakarta', 'Male', '1990-05-14', 'Jakarta', 'active', 'user', NULL, '2023-09-20 01:50:26', '2023-09-20 01:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_scanner`
--

CREATE TABLE `user_scanner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_ticket_seats`
--
ALTER TABLE `event_ticket_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_images`
--
ALTER TABLE `promotion_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_scanner`
--
ALTER TABLE `user_scanner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `event_ticket_seats`
--
ALTER TABLE `event_ticket_seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion_images`
--
ALTER TABLE `promotion_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_scanner`
--
ALTER TABLE `user_scanner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
