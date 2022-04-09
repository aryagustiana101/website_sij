-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 03:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_sij_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `lokasi` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `judul`, `tanggal`, `waktu_mulai`, `waktu_selesai`, `lokasi`, `detail`) VALUES
(4, 'Kegiatan Keagamaan Smartren Ramadhan 1442 H', '2021-04-12', '07:30:00', '10:00:00', 'Sasana Wibawa Mukti SMKN 1 Garut', 'Kegiatan Keagamaan Smartren Ramadhan 1442 H SMKN 1 Garut Dengan tema \"IRAMA\" (Indahnya Ramadhan Meraih Taqwa) Light Up Your Ramadhan ! Raih Predikat Taqwa Be Maximizer Its Time To Be Winner'),
(5, 'Kegiatan SAPA SISWA bersama Politeknik Pos Indonesia', '2021-04-21', '07:30:00', NULL, 'Sasana Wibawa Mukti SMKN 1 Garut', 'Hari ini telah dilaksanakan kegiatan SAPA SISWA \"SILATURAHMI & SOSIALISASIPenerimaan Mahasiswa Baru TA. 2021/2022 bersama Politeknik Pos Indonesia kepada Siswa-Siswi SMK Negeri 1 Garut\r\n\r\nDiharapkan untuk adik - adik khususnya kelas XII (Duabelas) yang ingin melanjutkan ke jenjang pendidikan tinggi selanjutnya dapat tergali minat dan bakat serta pengetahuan tentang kampus yang sesuai dengan pendidikan yang terbaik. (21/04/21)'),
(6, 'NGOPI BARENG bersama KADISDIK dan KAKANWIL KEMENAG JABAR', '2021-04-23', '13:00:00', '15:30:00', 'YouTube live streaming', 'Kepada Yth.\r\nBapak/Ibu Guru,\r\nOrang Tua Siswa, dan \r\nsiswa-siswi SMA, SMK, SLB se Jawa Barat\r\ndi tempat\r\n\r\n\r\nSebagaimana telah diinformasikan dalam pedoman smarttren Ramadhan Dinas Pendidikan Provinsi Jawa Barat, bahwa salah satu agenda dalam rangkaian kegiatan tersebut yaitu NGOPI BARENG ( Ngobrol Pendidikan Islam) bersama KADISDIK dan KAKANWIL KEMENAG JABAR dengan tema \" Implementasi Ibadah Shaum dalam Penumbuhan Karakter\". \r\nOleh karena itu Kami panitia mengundang Bapak/Ibu Guru, orang tua siswa dan siswa-siswi  pada kegiatan tersebut, yang akan dilaksanakan pada: \r\n\r\nHari, tanggal : Jumat, 23 April 2021\r\nWaktu            :  13.00 – 15.30 WIB\r\nTempat          : YouTube live streaming\r\n\r\nhttps://youtube.com/channel/UCWir7ALOPZfyeY9K1-xfqJw\r\n\r\nDemikian undangan ini kami sampaikan atas perhatiannya kami ucapkan terimakasih\r\n\r\nWassalam\r\nPanitia'),
(7, 'asfoihasiof', '2021-04-24', '14:10:00', '19:10:00', 'afsasf', 'sasfaa');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi_berita`, `gambar`, `penulis`, `created_at`, `updated_at`) VALUES
(37, 'Kegiatan Keagamaan Smartren Ramadhan 1442 H SMKN 1 Garut', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Hari ini telah diselenggarakan Kegiatan Keagamaan Smartren Ramadhan 1442 H SMKN 1 Garut<br>Dengan tema \"IRAMA\" (Indahnya Ramadhan Meraih Taqwa) Light Up Your Ramadhan ! Raih Predikat Taqwa Be Maximizer Its Time To Be Winner. Sejumlah perwakilan peserta didik kelas X, SMKN 1 Garut mengikuti pembukaan sekaligus gelaran pertama kegiatan Keagamaan Smartren Ramadhan 1442 Hijriah di area terbuka Sasana Wibawa Mukti, (15/4/2021).</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">&nbsp;</p>', '782162fa356166f113081628cc6b2b11.jpg', 'Administrator', '2021-04-23 06:56:39', NULL),
(38, 'Kuramasan Untuk Menyambut Bulan Suci Ramadhan 1442 H', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Menyambut Bulan Suci Ramadhan 1442 H kami segenap Civitas Akademik SMKN 1 Garut Mengucapkan&nbsp;Marhaban Yaa Ramadhan. Mohon maaf lahir dan Batin.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">SMKN 1 Garut menyelengarakan kuramasan dengan tema&nbsp;Marhaban Yaa Ramadhan, “Saatnya membersihkan jiwa dan kembali kepada-Nya, mensyukuri segala nikmat dan kemurahan-Nya.”.&nbsp;Demikian tema kuramasan civitas SMKN 1 Garut yang dihadiri seluruh pendidik dan tenaga kependidikan, dalam rangka menyambut bulan suci Ramadhan 1442 Hijriah dengan menyelenggarakan pengajian yang dilaksanakan di area terbuka Sasana Wibawa Mukti, Jum’at</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Acara dimulai denganpembacaan ayat Suci Al-Quran dilanjutkan dengan sambutan Kepala SMKN 1 Garut, H. Bejo Siswoyo, S.TP., M.Pd., yang menyampaikan, kegiatan ini dilaksanakan dalam rangka menjalin silaturahmi dan meningkatkan keimanan serta ketaqwaan kepada Allah SWT dalam menyambut datangnya Bulan Suci Ramadhan 1442 Hijriah.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Di puncak acara diisi tausiyah dari Ustadz KH. Aceng Abdul Mujid, M.Ag., yang menyampaikan bahwa orang yang dirindukan surganya Allah SWT ada tiga, yaitu orang yang menjadikan kecintaan kebahagiaan dalam menyambut bulan suci ramadhan, orang yang memberi makan bagi yang membutuhkannya, dan orang yang menjaga lisannya.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Selain itu, KH. Aceng Abdul Mujid juga mengingatkan bagi yang masih memiliki hutang puasanya agar segera diqadha, bila tidak sempat maka dituntaskan setelah Ramadhan ini.Di akhir ceramahnya, KH. Aceng Abdul Mujid mendoakan, semoga diberikan kelancaran dalam menjalankan ibadah puasa kali ini, dan ditutup dengan Musyafahah saling bermaaf-maafan.&nbsp;</p>', 'd51184c388c3c0ea86a5a4843f434ff8.jpeg', 'Administrator', '2021-04-23 07:00:09', NULL),
(39, 'Pelaksanaan Uji Kompetensi Di SMK Negeri 1 Garut', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Pelaksanaan Uji Kompetensi di SMK Negeri 1 Garut berlangsung minggu ini yang diikuti 8 Kompetensi Keahlian yang dilaksanakan di Laboratorium Kompetensi Keahlian Masing - masing . Para Peserta didik SMK Negeri 1 Garut mengikuti Uji Kompetensi dengan mengikuti protokol kesehatan dan diuji oleh penguji serta terdapat juga asesor di setiap Kompetensi Keahlian.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Diharapkan Uji Kompetensi Keahlian ini dapat membuat peserta didik siap dengan keilmuannya untuk digunakan di masa yang akan datang karena sudah melalui proses ujian yang bertujuan untuk menguji peserta didik atas keilmuannya pada kompetensi keahlian masingm- masing peserta didik</p>', '75c0a03ba31018093e8a09970ae5748a.jpeg', 'Administrator', '2021-04-23 07:01:03', NULL),
(40, 'Seminar Kewirausahaan Menghadapi Revolusi Industri 4.0', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Sebagai bentuk program SMK Negeri 1 Garut yaitu SMK Pencetak Wirausaha, SMKN 1 Garut menyelenggarakan \"Seminar Kewirausahaan\" di Sasana Wibawa Mukti SMK Negeri 1 Garut. Seminar Kewirausahaan ini diisi oleh&nbsp;tiga orang pembicara dari Ma’soem University yakni Wakil Rektor Ma’soem University, Pengusaha, Dr. Ir. Tonton Taufi, MBA., Praktisi Kewirausahaan, Dr. Asep Sujana, M.M., dan Ketua Pengurus Inkubator Bisnis Ma’soem University, pengusaha, Amillia Khairina, S.TP., MBA.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Seminar ini bertujuan untuk memberikan edukasi kepada para peserta didik dan guru SMKN 1 Garut mengenai konsep kewirausahaan kreatif. Dimana konsep tersebut belakangan ini tengah berkembang dengan sangat pesat.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Selain itu diharapkan para peserta didik SMKN 1 Garut tergerak untuk mengetahui lebih dalam maupun terjun langsung ke dalam bidang kewirausahaan.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Inti dari yang disampaikan oleh ketiga pembicara tersebut bahwa, Revolusi Industri 4.0 yang dihadapi oleh generasi kita sekarang ini memberikan tantangan bagi dunia kewirausahaan yang sangat ketat, sehingga masyarakat perlu memahami strategi managerial hingga marketing dengan pemanfaatan media digital.</p>', 'fd42e387e6a3757af76decf876aa5fdc.jpeg', 'Administrator', '2021-04-23 07:02:08', NULL),
(41, 'Pelantikan Ketua Se Jawa Barat 2021 - 2021 Jabar Bergerak', '<p><span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Alhamdulillah agenda Pelantikan Ketua Jabar Bergerak 27 Kab/Kota se-Jawa Barat yang dirangkaikan dengan agenda Rakor serta JB Awards 2021 telah terlaksana secara baik di Hotel Preanger Bandung pada hari Minggu, 11 April 2021.Ada banyak rencana baik yang telah dicanangkan di agenda ini. Semoga saja rencana-rencana baik ini dimudahkan serta diberkahi jalannya oleh Allah SWT.</span><br style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\"><span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Terimakasih kepada Bapak Gubernur Jawa Barat, Bapak Ridwan Kamil yang telah memberikan Motivational Speechnya yang sangat menyemangati kami untuk terus melakukan yang terbaik bagi sesama. Insya Allah, dengan berbekal niat, ikhtiar dan doa yang baik, maka rencana-rencana baik Jabar Bergerak untuk menebar kemanfaatan bagi semesta raya ini akan berjalan baik pula. Bismillah, bersama Ibu Pendiri Jabar Bergerak, Ibu Atalia Praratya kita akan mulai kebaikan itu dari Jawa Barat; untuk Indonesia dan dunia yang lebih baik.</span><br></p>', 'd56b90c6740b0a500353d9d303de0d1f.jpeg', 'Administrator', '2021-04-23 07:04:32', NULL),
(42, 'SMK Negeri 1 Garut Berkolaborasi Bersama Kelurahan Sukagalih Dalam Program SMK Membangun Desa', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Dalam Program SMK Membangun Desa, SMK Negeri 1 Garut bekerja sama dengan Kelurahan Sukagalih dalam berbagai kegiatan untuk membangun Kelurahan Sukagalih, setelah sebelumnya Kegiatan SMK Membangun Desa diselengarakan bekerja sama dengan Kelurahan Jayaswara.&nbsp;Kedatangan rombongan SMKN 1 Garut yang dipimpin Waka Bidang Manajemen Mutu, Reni Nurhaerani, S.Pd., dan Waka Bidang Humas, Asep Paridadin, S.Pd., beserta Komli Farmasi Klinis dan Komunitas (FKK) disambut langsung Lurah Sukagalih, Ahmad Suwargi di Aula Kelurahan Sukagalih, di Jl. Terusan Pahlawan No. 119, Kecamatan Tarogong Kidul, Pada Kamis 25 Maret 2021</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Lurah Sukagalih, Ahmad Suwargi mengucapkan terima kasih pada SMKN 1 Garut, selain mengedukasi khususnya para kader PKK, melalui programnya SMKN 1 Garut ini bisa membantu mengentaskan kemiskinan di lingkungannya. Dirinya mengakui, kerjasama SMKN 1 Garut dengan Kelurahan Sukagalih melalui program SMK Membangun Desa, sangat bermanfaat dan membantu, minimal warganya bisa merasakan manfaat dengan adanya SMKN 1 Garut.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Adapun tujuan kerjasama ini, kata Lurah Ahmad, yang paling utama para kader PKK terampil kemudian menularkannya kepada warga lainnya, sehingga dapat merubah taraf hidup, dan kedepannya pertumbuhan perekonomian masyarakat meningkat.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Dengan diberikannya keterampilan oleh SMKN 1 Garut, minimal para kader PKK bisa membuat suatu produk, seperti pelatihan membuat sabun cuci piring hari ini. Karena keberadaan sabun cuci piring bersifat wajib, dari cacah sampai juragan harus tersedia di dapur.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Ditempat Terpisah Komli Multimedia, SMKN 1 Garut sedang melanjutkan Program SMK Membangun Desa di Kelurahan Jayawaras, dengan melakukan pendampingan penyusunan desain konten presentasi.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Diharapkan SMKN 1 Garut Dalam Program SMK Membangun Desa dapat memberikan manfaat kepada Desa.</p>', '01038d990a12956ffabb74fbd5ff7cc8.jpeg', 'Administrator', '2021-04-23 07:06:55', NULL),
(43, 'Program SMK membangun Desa/Kelurahan, yang dilakukan SMKN 1 Garut terhadap Kelurahan Jayawaras', '<p><span style=\"color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Program SMK membangun Desa/Kelurahan, yang dilakukan SMKN 1 Garut terhadap Kelurahan Jayawaras membuahkan hasil positif yang luar biasa dalam membantu</span><br></p>', '54f0f504b36fb94daaab11178789587a.jpg', 'Administrator', '2021-04-23 07:08:09', NULL),
(44, 'Penutupan Kegiatan Gerakan Magrib Mengaji DPD. AGPAII Kab. Garut', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Pada Jumat 26 Maret 2021 telah diselengarakan Penutupan kegiatan Magrib Mengaji oleh DPD Asosiasi Guru Pendidikan Agama Islam Indonesia&nbsp;Kabupaten Garut&nbsp;AGPAII Kab. Garut&nbsp;bersama Berdaya Foundation yang diselengarakan di Sasana Wibawa Mukti SMK Negeri 1 Garut. Penutupan dilakukan Ketua MGMP PAI yang juga Ketua AGPAII Kabupaten Garut, Bapak Asep Ridwan Daleh, M.P.d., dihadiri Kepala SMKN 1 Garut,Bapak&nbsp; H. Bejo Siswoyo, S.TP., M.Pd., Ketua Berdaya Foundation, dan 20 utusan salah satu perwakilan dari guru agama sebagai pendobrak kembali kegiatan program Gerakan Magrib Mengaji.Sebelumnya, launching program Gerakan Magrib Mengaji ini dilaksanakan di Kantor Cabang Dinas Pendidikan Cabang XI Jawa Barat, namun untuk penutupan dilaksanakan di Sasana Wibawa Mukti, SMKN 1 Garut, Jum’at .&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Dalam sambutannya, Kepala Sekolah SMKN 1 Garut, Bapak H. Bejo Siswoyo, S.TP., M.Pd., sangat mengapresiasi terhadap program Gerakan Magrib Mengaji, dan mengusulkan yang diucapkannya sampai tiga kali, agar program Gerakan Magrib Mengaji ini jangan diputus sampai disini (6 bulan-red) karena efeknya luar biasa, bagi generasi bangsa yang akan menggantikan kita semua.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Kegiatan ini, untuk memantau setiap anak di waktu magrib apakah digunakan untuk pengajian atau tidak, pihaknya lebih memfokuskan pada anak yang diajar lebih dulu. Dan kalau ini berhasil akan di programkan di sekolah, dengan SK dari bupati kepada kepala sekolah, untuk memberikan dukungan kepada guru PAI di sekolah masing-masing, untuk melaksanakan kegiatan program Garut Mengaji.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Program ini sebenarnya untuk mengembalikan kebiasaan-kebiasaan orang tua dulu, dimana waktu magrib sampai isya digunakan untuk pengajian. Karena sekarang sudah mulai memudar, anak-anak memilih diam di rumah tapi tidak melakukan mengaji, dan yang paling bagus anak-anak mengaji itu dilakukan dengan seusianya di mesjid atau di madrasah.</p>', '6468e3106bfd9084b52e89cffe27f4b5.jpeg', 'Administrator', '2021-04-23 07:09:28', NULL),
(45, 'Rencana Aksi SMK Pusat Keunggulan SMKN 1 Garut Untuk Seleksi Program SMK Pusat Keunggulan Tahun 2021', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Rencana Aksi SMK Pusat Keunggulan SMK 1 Garut Untuk Seleksi Pogram SMK Pusat Keunggulan Tahun 2021 SMK Negeri 1 Garut adalah salah satu SMK terbesar yang ada di wilayah kabupaten Garut jumlah siswa 2521, guru dan tenaga administrasi 177 SMK Negeri 1 Garut mencetak peserta didik untuk menjadi yang terbaik dengan menyiapkan soft skill dan hard skill serta membangun karakter yang sesuai dengan budaya DUDIKA. SMK Negeri 1 Garut mengembangkan program sekolah pencetak para juara, sekolah pencetak wirausaha dan sekolah semangat membangun desa.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">SMK 1 Garut memiliki 10 kompetensi keahlian, salah satunya&nbsp;<br>Kompetensi keahlian Bisnis daring dan pemasaran</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Visi kompetensi keahlian (Bisnis Daring dan Pemasaran)<br>“Menyiapkan Lulusan yang Kompeten dalam bidang bisnis,&nbsp;<br>mampu berwirausaha &nbsp;dan siap beradaptasi di dunia usaha,&nbsp;<br>dunia industi dan dunia kerja”,&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Kompetensi keahlian Bisnis daring dan pemasaran saat ini sudah melaksanakan beberapa kerjasama dengan DUDIKA, Diantaranya:<br>1. Google School Indonesia<br>2. PT. Akur Pratama (Yogya Grup)<br>3. Sangkuriang Digital Academy&nbsp;<br>4. PT. Sumber Alfaria Tridaya (Alfamart)<br>5. PT. Nutrifood</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">memiliki 5 guru kejuruan yang telah BERSERTIFIKAT ASESOR da BERSERTIFIKAT MAGANG INDUSTRI Untuk mendukung SMK pusat keunggulan, SMK Negeri 1 Garut melaksanakan program link and match yang tercakup di dalam konsep 8 + i.&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Rencana Kedepan kompetensi keahlian Bisnis daring dan Pemasaran adalah:<br>1. Merencanakan pembentukan mini market yang bekerja sama dengan Alfamart<br>2. Lebih mengefektifkan peran DUDIKA agar bisa memberikan kontribusi kepada siswa dalam bentuk beasiswa dan atau ikatan dinas<br>3. Melaksanakan PKL selama 1 semester dengan DUDIKA<br>4. Lebih mengintensifkan peran guru/instruktur dari DUDIKA minimal 50 jam/semester.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Target lulusan Bekerja 40 %, Berwirausaha 45%, Melanjutkan ke perguruan tinggi 15%</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Program SMK PK ini dibebankan kepada dana BOS dan BOPD &nbsp;<br>serta Sumbangan yang tidak mengikat baik dari industry maupun masyarakat.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Pengajuan SMK PK untuk SMK Negeri 1 Garut telah didukung oleh kepala dinas Pendidikan provinsi jawa barat.</p>', '080f8fe394fa242026a5997b4934154f.png', 'Administrator', '2021-04-23 07:10:28', NULL),
(46, 'SMK Negeri 1 Garut Menjadi Juara Di Berbagai Bidang Lomba Institut Pendidikan Indonesia', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Selamat kepada teman - teman kita perwakilan dari SMK Negeri 1 Garut yang telah menorehkan prestasi di beberapa bidang lomba yang diadakan oleh Institut Pendidikan Indonesia (IPI) tingkat Kabupaten dan Provinsi yaitu :</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Juara 3 Desain Power Point se-Kabupaten Garut :<br>-Advin Sandika Wibawa XI MTM 2</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\"><br>Juara 2 Cipta Puisi Se-Provinsi Jawa Barat IPI :<br>-Yesha Novita Rusmana X AKL 2</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Juara 2 Pidato Se-Provinsi Jawa Barat IPI :<br>Muhammad Dewangga Adidaryansyah X BDP 2</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Juara 1 Videografi se-Kabupaten Garut :<br>-Muhammad Errival XI MTM 2 (Diwakilkan)<br>-Muhammad Erik Saputra XI MTM 2 (Diwakilkan)<br><br>Juara 1 Animasi se-Kabupaten Garut :<br>-Damita Khalida Nurwan XI MTM 3 (Diwakilkan)<br>-Helga Alya XI MTM 1 (Diwakilkan)<br><br>Juara 2 Fotografi se-Kabupaten Garut :<br>-Amry Sabilul Haq XI MTM 2<br><br>Juara 3 Desain Grafis se-Kabupaten Garut :<br>-Muhammad Luthfi Insan MS XI MTM 1<br><br>Hal ini membuktikan bahwa SMK Negeri 1 Garut Merupakan SMK Pencetak Para Juara dan harapan ke depannya Kami dapat menjuarai berbagai bidang lomba baik tingkat kabupaten sampai Nasional. Selamat Untuk Para Pemenang</p>', '87049cc87c55576343acaaa91c6a1fb9.jpg', 'Administrator', '2021-04-23 07:20:32', NULL),
(47, 'asfasf', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">sdasfasfsafas</font></p>', '2cdf85748ec35f4210e52f4dd3059b6a.jpg', 'Nazwa', '2021-04-24 07:13:19', '2021-04-24 07:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_foto`
--

CREATE TABLE `galeri_foto` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri_foto`
--

INSERT INTO `galeri_foto` (`id`, `judul`, `gambar`, `created_at`, `updated_at`) VALUES
(6, 'SMK Negeri 1 Garut Menjadi Juara Di Berbagai Bidang Lomba Institut Pendidikan Indonesia', '7442f828dae0ffadf7f68440fee101a0.jpg', '2021-04-23 07:11:34', NULL),
(7, 'Kegiatan Keagamaan Smartren Ramadhan 1442 H SMKN 1 Garut', 'cda3d5700be736f79f96a39b4826b85e.jpg', '2021-04-23 07:11:50', NULL),
(8, 'Kuramasan Untuk Menyambut Bulan Suci Ramadhan 1442 H', '5409ece0fcf8e0cd6954e160036248f2.jpeg', '2021-04-23 07:12:07', NULL),
(9, 'Pelaksanaan Uji Kompetensi Di SMK Negeri 1 Garut', '9d1669674148e316a739753d70f4416b.jpeg', '2021-04-23 07:13:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gambar_slider`
--

CREATE TABLE `gambar_slider` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar_slider`
--

INSERT INTO `gambar_slider` (`id`, `judul`, `gambar`, `created_at`, `updated_at`) VALUES
(5, 'Ramadan Banner', '87c6e4bb40b2fc819b62199398ef8d20.jpeg', '2021-04-23 07:14:44', NULL),
(6, 'Banner Default', 'f6ab68b362ada8a9a3203eca8eb67342.jpg', '2021-04-23 07:14:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi_pengumuman`, `created_at`, `updated_at`) VALUES
(4, 'Hari Kartini 2021', '<p><span style=\"color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">Untuk setiap wanita teruslah bahagia dan mengispirasi. - R.A.Kartini</span><br style=\"color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">semoga sobat smk dapat menjadi inspirasi untuk para pelajar lainnya. ????</span><br style=\"color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><br style=\"color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><span style=\"color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">SMK Negeri 1 Garut Mengucapkan selamat Hari Kartini untuk semua wanita Indonesia. Mati satu tumbuh seribu. Kartini mungkin sudah tiada, namun semangat juangnya tidak boleh padam begitu saja. Maju terus para Kartini m</span></p><p><span style=\"color: rgb(38, 38, 38); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" helvetica,=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\">asfafuda Indonesia. ????????</span><br></p>', '2021-04-23 07:18:53', '2021-04-24 07:22:19'),
(5, 'Hari Raya China', '<p>OIAOSIOISAOI</p><p>fsa</p><p>asf</p><p>asf</p><p>asf</p>', '2021-04-24 07:22:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `detail_prestasi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `judul`, `detail_prestasi`, `foto`, `created_at`, `updated_at`) VALUES
(4, 'Siswa SMK Negeri 1 Garut Raih Juara 1 Jabar Dan Nasional', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Siswa SMK Negeri 1 Garut Raih Juara 1 Jabar dan Nasional</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Pada Festival dan Lomba Seni Siswa Nasional (FLS2N) jenjang SMK Tingkat Nasional Tahun 2020 secara daring/online yang dilaksanakan 28 September 2020 sampai 3 Oktober 2020.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Tak disangka seorang siswa yang baru saja satu tahun masuk di Sekolah Menengah Kejuruan Negeri 1 Garut itu telah berkontribusi dengan menorehkan prestasi yang membanggakan bagi sekolah, Pemerintah Kabupaten Garut dan Provinsi Jawa Barat.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Dia adalah Mahin Abdul Mu\'min pria kelahiran Garut yang merupakan anak kedua dari tiga bersaudara itu berhasil meraih juara 1 tingkat provinsi, kemudian mewakili Jawa Barat untuk lanjut mengikuti perlombaan ke tingkat nasional yang akhirnya berhasil meraih Juara 1 Gitar Solo.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Kepala SMK Negeri 1 Garut, H. Bejo Siswoyo, S.TP., M.Pd., mengapresiasi prestasi yang ditorehkan peserta didiknya yang diumumkan secara daring Sabtu (3/10/2020) di Sasana Wibawa Mukti SMK Negeri 1 Garut.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">\"Alhamdulillah, meskipun di tengah pandemi Covid-19 dan lomba dilakukan secara daring, anak didik kami berhasil menjuarai tingkat nasional, ini suatu kebanggaan, dengan bangga saya ucapkan terima kasih kepada pelatih dan pembimbing yang tak henti-hentinya berjuang dalam menorehkan prestasi di ajang FLS2N ini,\" katanya.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">Guru Pembimbing yang mewakili SMKN 1 Garut, Diana, S.Pd mengaku bangga dan tidak menyangka anak didiknya Mahin bisa lolos juara di tingkat Jabar, lalu maju di tingkat nasional hingga akhirnya mendapatkan prestasi terbaik, membawa harum nama sekolah mewakili Jawa Barat, dan juara di tingkat nasional.</p><p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; line-height: 1.5; color: rgb(68, 68, 68); font-family: Roboto, sans-serif; font-size: 15px;\">\"Kami selaku pembimbing merasa bangga dan tak menyangka, ini merupakan bonus, karena sudah masuk tingkat Jawa Barat saja sudah prestasi luar biasa, Mahin memang memiliki bakat yang harus terus diasah, siapa tahu nanti bisa ikut kompetisi tingkat internasional,\" kata Diana.</p>', 'f328694f9fbbad1825b77578c2301f16.jpg', '2021-04-23 07:21:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publikasi_ilmiah`
--

CREATE TABLE `publikasi_ilmiah` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `file_publikasi_ilmiah` varchar(255) NOT NULL,
  `nama_penulis` varchar(255) NOT NULL,
  `level_penulis` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publikasi_ilmiah`
--

INSERT INTO `publikasi_ilmiah` (`id`, `judul`, `file_publikasi_ilmiah`, `nama_penulis`, `level_penulis`, `email_user`, `created_at`, `updated_at`) VALUES
(7, 'Publikasi Pertama Administrator', '78ddb98dfe90b83fd9406d2cad8038ca.pdf', 'Administrator', 'Administrator', 'root@smknegeri1garut.sch.id', '2021-04-23 07:22:29', NULL),
(8, 'Publikasi Pertama Siswa', '4fda2cb6304d8f3c4d4caba4085f7266.pdf', 'Davi Hanan', 'Siswa', 'root@smknegeri1garut.sch.id', '2021-04-23 07:23:02', NULL),
(9, 'Publikasi Pertama Guru', '6533ec8a7c62ab1a6dbe2e5beb1deefb.pdf', 'Revy Cahya Alamsyah, S.Kom', 'Guru', 'revy_cahya_alamsyah@smknegeri1garut.sch.id', '2021-04-23 07:23:40', NULL),
(10, 'Lorem ASW', '959247245250324a357e73ce71106994.pdf', 'Nazwa', 'Administrator', 'nazwa@smknegeri1garut.sch.id', '2021-04-24 07:24:25', NULL),
(11, 'asfasf', '7465892ec80bc80f1c331a6f69b3d01b.pdf', 'Asep Ulumudin, S.Kom', 'Guru', 'ucwsiwku@smknegeri1garut.sch.id', '2021-04-24 07:29:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isi_sambutan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sambutan`
--

INSERT INTO `sambutan` (`id`, `nama`, `isi_sambutan`, `foto`, `updated_at`) VALUES
(1, 'Asep Ulumudin, S.Kom', '<p style=\"text-align: justify; \"><b>Assalamu’alikum warohmatullohi wabarakatuh</b></p><p style=\"text-align: justify; \">\r\nSebagai salah satu unit penunjang pokok SMK Negeri 1 Garut yang mempunyai visi “Menjadi pusat kegiatan akademik yang berbasis teknologi informasi untuk mendukung pengembangan IPTEKS yang baik dan memberi arah perubahan”, fungsi dan peran Perpustakaan SMK Negeri 1 Garut sangat penting dan sentral dalam penyediaan sumber-sumber informasi dan kegiatan akademik lainnya yang dibutuhkan sivitas akademika.\r\n\r\nAlhamdullillahirobbil’alamiin dengan senantiasa memanjatkan puji dan syukur kehadirat Allah SWT, dalam kesempatan yang baik ini kami bisa menyajikan perubahan konten website Perpustakaan SMK Negeri 1 Garut pada tahun 2020 ini. Semoga memberikan kontribusi kebaikan kepada masyarakat yang mengakses seluruah layanan di Perpustakaan SMK Negeri 1 Garut.</p><p style=\"text-align: justify; \"><b>\r\n\r\nWassalamu’alikum warohmatullohi wabarakatuh</b></p>', '7a022affa91775aa2f86b452c1e432b9.png', '2021-04-18 09:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_unhash` varchar(255) NOT NULL,
  `password_default` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Guru',
  `active` int(11) NOT NULL DEFAULT 1,
  `nip` varchar(255) DEFAULT NULL,
  `mata_pelajaran` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `password_unhash`, `password_default`, `role`, `active`, `nip`, `mata_pelajaran`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nik`, `alamat`, `no_hp`, `foto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nazwa', 'nazwa@smknegeri1garut.sch.id', '$2y$10$8cz2l1qgvVOQqLB35iHn3Om0dFFVSj3CdDhdWg5vHCexc4IjR3vB6', '123', '123', 'Administrator', 1, NULL, NULL, 'Perempuan', 'Garut', '2021-04-15', NULL, 'Jalan 123', NULL, NULL, '2021-04-15 01:14:02', '2021-05-17 07:36:00', NULL),
(2, 'Revy Cahya Alamsyah, S.Kom', 'revy_cahya_alamsyah@smknegeri1garut.sch.id', '$2y$10$uqyCq6a8.sDsGrL7QjrD0.vZBT5eIEtSLSW/wIpmHhRm61oRtsNiK', '123', '123', 'Guru', 1, NULL, 'Sistem Internet of Things / Sistem Keaman Jaringan', 'Perempuan', 'Garut', '1998-05-21', '123', NULL, NULL, '1f2345d1ba17355e7ba392e35b31d1aa.png', '2021-04-13 07:54:19', '2021-04-22 16:00:42', NULL),
(9, 'Asep Ulumudin, S.Kom', 'ucwsiwku@smknegeri1garut.sch.id', '$2y$10$E02qd8tcoiEYuQ3pD0V/QOJ6mkA8OdJ.K0HoSlK1Xd1.hF3SbAx8G', 'np4l5bza', 'np4l5bza', 'Guru', 1, NULL, NULL, 'Laki-Laki', 'Garut', '2021-04-24', NULL, NULL, NULL, NULL, '2021-04-24 07:20:45', NULL, NULL),
(10, 'asfaf', 'vztyarje@smknegeri1garut.sch.id', '$2y$10$9ZlY64VwHR8T2uFPnBbB2.Ivq5lu6Fsi6xb7GkJWu6vXg2AIKBY3.', '79bwzr6a', '79bwzr6a', 'Administrator', 1, NULL, NULL, 'Perempuan', 'Garut', '2021-05-17', NULL, 'Jalan 123', '235235235', NULL, '2021-05-17 08:34:24', '2021-05-17 08:35:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_slider`
--
ALTER TABLE `gambar_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publikasi_ilmiah`
--
ALTER TABLE `publikasi_ilmiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `galeri_foto`
--
ALTER TABLE `galeri_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gambar_slider`
--
ALTER TABLE `gambar_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publikasi_ilmiah`
--
ALTER TABLE `publikasi_ilmiah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
