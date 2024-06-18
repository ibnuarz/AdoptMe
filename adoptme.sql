-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 07:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoptme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(50) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Adminname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Username`, `Password`, `Email`, `Adminname`) VALUES
(1, 'ibnuar', 'ibnuar', 'ibnuar@gmail.com', 'Ibnu Arbianto Pratama');

-- --------------------------------------------------------

--
-- Table structure for table `adopsi`
--

CREATE TABLE `adopsi` (
  `AdoptionID` int(50) NOT NULL,
  `UserID` int(50) NOT NULL,
  `AnimalID` int(50) NOT NULL,
  `Adoptiondate` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Keteranganstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `AnimalID` int(50) NOT NULL,
  `Animalname` varchar(100) DEFAULT NULL,
  `Age` int(50) DEFAULT NULL,
  `Deskripsi` varchar(255) DEFAULT NULL,
  `Status` int(50) DEFAULT NULL,
  `UserID` int(50) DEFAULT NULL,
  `RasID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`AnimalID`, `Animalname`, `Age`, `Deskripsi`, `Status`, `UserID`, `RasID`) VALUES
(18, 'Kucing Abyssinian', 1, 'Abyssinian', 1, 1, 201),
(19, 'Kucing Bengal', 0, 'Bengal', 1, 1, 204),
(20, 'Kucing Birman', 1, 'Kucing Birman', 1, 1, 205),
(21, 'Kucing Tuxedo', 1, 'Tuxedo', 1, 1, 215),
(22, 'Kucing Bombay', 1, 'Bombay', 1, 1, 206),
(23, 'Kucing Russian Blue', 0, 'Russian Blue', 1, 1, 212),
(24, 'Anjing Dalmation', 1, 'Dalmation', 1, 1, 132),
(25, 'Anjing Boxer', 2, 'Boxer', 1, 1, 118),
(26, 'Anjing Greyhound', 2, 'Greyhound', 1, 1, 142),
(27, 'Anjing Borzoi', 2, 'Borzoi', 1, 1, 116),
(38, 'Anjing Labrador', 12, 'Labrador', 1, 1, 149),
(39, 'Anjing Husky', 2, 'Husky', 1, 1, 168);

-- --------------------------------------------------------

--
-- Table structure for table `gambar_animal`
--

CREATE TABLE `gambar_animal` (
  `GambarID` int(11) NOT NULL,
  `AnimalID` int(11) DEFAULT NULL,
  `NamaGambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar_animal`
--

INSERT INTO `gambar_animal` (`GambarID`, `AnimalID`, `NamaGambar`) VALUES
(23, 18, '2f8820bb74e19f2aa1490540ad53a46c.jpg'),
(24, 18, 'ab5c4236eae39e45f3b07b46cb968a57.jpg'),
(30, 20, '00ea2a8564353100f6074795874b35a4.jpg'),
(31, 20, '3d36a2dadc0e3cf3a58d258df7c3f500.jpg'),
(93, 19, '012f475b6b1b2df91b57b6bae930114f.jpg'),
(94, 19, '2b7f4709539de8fb4abe13899f04621c.jpg'),
(95, 21, '70fc2bb7a55d23013a77df144f112196.jpg'),
(96, 21, '33b46feb7878af379619f86e54e8405b.jpg'),
(97, 21, '69ad9722fe7e3986ed030aea21d023ca.jpg'),
(98, 22, 'b077f51969594a70116846784be3b42e.jpg'),
(99, 22, 'e61c8804129eae89a79fcd8dcde3535f.jpg'),
(100, 23, 'b0c25a004147d03c41d4484cb3c12e4b.jpg'),
(101, 23, '40760563ee8fd34c8e881cdbec7e850d.jpg'),
(102, 27, '4c9f4b5299a60355bed4bedc3f38ecc0.jpg'),
(103, 27, '01446ab814deeb97849ac96b9724e505.jpg'),
(104, 24, '76e3349de770fe1697d12841ea5407a9.jpg'),
(105, 24, 'ff88247d4637b3e47acb9c9e5999cd59.jpg'),
(106, 24, '5824f4efb9846249e5199699425cfabc.jpg'),
(107, 25, '2ce8f70b9b91a7a1db52b7090b7864aa.jpg'),
(108, 25, '740195e9f2a05b936f3a5b947922ef40.jpg'),
(109, 26, '8700226be90b2bb1d266cb7b7472efe3.jpg'),
(110, 26, '6fefb7184477e2fdef4f8d793dd3b6c2.jpg'),
(111, 26, 'e2ae3f5adf9f856985c59441534f2433.jpg'),
(115, 38, '1be5e4f600701eec7c4a398fa9a54d05.jpg'),
(116, 38, '4a106a232f5fbbef2bac1bea571d8b4a.jpg'),
(117, 38, '4c02c0b96512ae6b0a130cb9cead3ef3.jpg'),
(118, 39, '2729b92d9e88ed8e317198b1409c6e94.jpg'),
(119, 39, '966d3ebe49ee49ba90c9870cd7d34a0f.jpg'),
(120, 39, '8c3b1bdb6a3e763fb79d1d192b1a98a9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_adopsi`
--

CREATE TABLE `laporan_adopsi` (
  `LaporanID` int(50) NOT NULL,
  `AdoptionID` int(50) NOT NULL,
  `Tanggalawal` date NOT NULL,
  `Tanggalakhir` date NOT NULL,
  `Isi` varchar(255) NOT NULL,
  `Urgensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_user`
--

CREATE TABLE `laporan_user` (
  `LaporanID` int(50) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Jenislaporan` int(50) NOT NULL,
  `Isi` varchar(255) NOT NULL,
  `Tanggallaporan` date NOT NULL,
  `Gambarlaporan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ras`
--

CREATE TABLE `ras` (
  `RasID` int(50) NOT NULL,
  `Namaras` varchar(100) NOT NULL,
  `Jenis` int(11) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ras`
--

INSERT INTO `ras` (`RasID`, `Namaras`, `Jenis`, `Deskripsi`) VALUES
(1, 'Tidak Diketahui', 1, 'Tidak Diketahui (Anjing)'),
(2, 'Tidak Diketahui ', 2, 'Tidak Diketahui (Kucing)'),
(101, 'Afghan', 1, 'Afghan adalah anjing yang elegan dan anggun. Mereka memiliki bulu panjang dan anggun.'),
(102, 'African Wild Dog', 1, 'African Wild Dog adalah anjing liar yang kuat dan tangguh. Mereka memiliki warna bulu yang unik dan garis-garis.'),
(103, 'Airedale', 1, 'Airedale adalah anjing yang cerdas dan bersemangat. Mereka memiliki mantel tebal dan warna coklat.'),
(104, 'American Hairless', 1, 'American Hairless adalah anjing yang unik dan ramah. Mereka tidak memiliki bulu dan memiliki kulit halus.'),
(105, 'American Spaniel', 1, 'American Spaniel adalah anjing yang ramah dan setia. Mereka memiliki bulu tebal dan berbulu.'),
(106, 'Basenji', 1, 'Basenji adalah anjing yang cerdas dan independen. Mereka memiliki bulu pendek dan tidak menggonggong.'),
(107, 'Basset', 1, 'Basset adalah anjing yang pendiam dan bersemangat. Mereka memiliki tubuh yang pendek dan telinga yang panjang.'),
(108, 'Beagle', 1, 'Beagle adalah anjing yang ceria dan ramah. Mereka memiliki bulu pendek dan telinga yang panjang.'),
(109, 'Bearded Collie', 1, 'Bearded Collie adalah anjing yang ramah dan pekerja keras. Mereka memiliki mantel panjang dan berbulu.'),
(110, 'Bermaise', 1, 'Bermaise adalah anjing yang tenang dan ramah. Mereka memiliki bulu panjang dan warna yang indah.'),
(111, 'Bichon Frise', 1, 'Bichon Frise adalah anjing yang ceria dan ramah. Mereka memiliki bulu putih dan lembut.'),
(112, 'Blenheim', 1, 'Blenheim adalah anjing yang setia dan penyayang. Mereka memiliki bulu panjang dan berwarna cerah.'),
(113, 'Bloodhound', 1, 'Bloodhound adalah anjing yang bersemangat dan bersemangat. Mereka memiliki bulu pendek dan telinga yang panjang.'),
(114, 'Bluetick', 1, 'Bluetick adalah anjing yang ceria dan aktif. Mereka memiliki bulu pendek dan warna biru.'),
(115, 'Border Collie', 1, 'Border Collie adalah anjing yang cerdas dan energik. Mereka memiliki mantel tebal dan warna yang bervariasi.'),
(116, 'Borzoi', 1, 'Borzoi adalah anjing yang anggun dan berani. Mereka memiliki bulu panjang dan tubuh yang ramping.'),
(117, 'Boston Terrier', 1, 'Boston Terrier adalah anjing yang ceria dan ramah. Mereka memiliki wajah hitam dan putih yang khas.'),
(118, 'Boxer', 1, 'Boxer adalah anjing yang kuat dan ramah. Mereka memiliki tubuh yang berotot dan telinga yang tegak.'),
(119, 'Bull Mastiff', 1, 'Bull Mastiff adalah anjing yang tenang dan setia. Mereka memiliki tubuh yang besar dan berotot.'),
(120, 'Bull Terrier', 1, 'Bull Terrier adalah anjing yang ceria dan ramah. Mereka memiliki kepala yang bulat dan tubuh yang berotot.'),
(121, 'Bulldog', 1, 'Bulldog adalah anjing yang setia dan ramah. Mereka memiliki tubuh yang kekar dan wajah yang khas.'),
(122, 'Cairn', 1, 'Cairn adalah anjing yang cerdas dan berani. Mereka memiliki bulu kasar dan berwarna cerah.'),
(123, 'Chihuahua', 1, 'Chihuahua adalah anjing yang berani dan ceria. Mereka memiliki tubuh kecil dan telinga yang besar.'),
(124, 'Chinese Crested', 1, 'Chinese Crested adalah anjing yang unik dan ramah. Mereka memiliki kulit halus dan tidak berbulu.'),
(125, 'Chow', 1, 'Chow adalah anjing yang anggun dan berani. Mereka memiliki bulu tebal dan lidah biru.'),
(126, 'Clumber', 1, 'Clumber adalah anjing yang ramah dan setia. Mereka memiliki tubuh yang besar dan telinga yang panjang.'),
(127, 'Cockapoo', 1, 'Cockapoo adalah anjing yang ceria dan ramah. Mereka merupakan campuran antara Cocker Spaniel dan Poodle.'),
(128, 'Cocker', 1, 'Cocker adalah anjing yang ceria dan bersemangat. Mereka memiliki bulu panjang dan telinga yang panjang.'),
(129, 'Collie', 1, 'Collie adalah anjing yang cerdas dan setia. Mereka memiliki mantel panjang dan bulu yang tebal.'),
(130, 'Corgi', 1, 'Corgi adalah anjing yang ceria dan ramah. Mereka memiliki tubuh pendek dan kaki yang pendek.'),
(131, 'Coyote', 1, 'Coyote adalah anjing liar yang kuat dan berani. Mereka memiliki bulu tebal dan ekor yang panjang.'),
(132, 'Dalmation', 1, 'Dalmation adalah anjing yang ceria dan bersemangat. Mereka memiliki bulu putih dengan bercak hitam.'),
(133, 'Dhole', 1, 'Dhole adalah anjing liar yang kuat dan berani. Mereka memiliki bulu berwarna coklat dan ekor yang panjang.'),
(134, 'Dingo', 1, 'Dingo adalah anjing liar yang kuat dan independen. Mereka memiliki bulu pendek dan ekor yang panjang.'),
(135, 'Doberman', 1, 'Doberman adalah anjing yang cerdas dan berani. Mereka memiliki tubuh yang berotot dan telinga yang tegak.'),
(136, 'Elk Hound', 1, 'Elk Hound adalah anjing yang tangguh dan setia. Mereka memiliki bulu tebal dan ekor yang melingkar.'),
(137, 'French Bulldog', 1, 'French Bulldog adalah anjing yang ceria dan ramah. Mereka memiliki wajah datar dan telinga yang tegak.'),
(138, 'German Sheperd', 1, 'German Sheperd adalah anjing yang cerdas dan berani. Mereka memiliki bulu tebal dan tubuh yang berotot.'),
(139, 'Golden Retriever', 1, 'Golden Retriever adalah anjing yang ceria dan ramah. Mereka memiliki bulu tebal dan warna emas yang indah.'),
(140, 'Great Dane', 1, 'Great Dane adalah anjing yang besar dan berani. Mereka memiliki tubuh yang tinggi dan telinga yang panjang.'),
(141, 'Great Perenees', 1, 'Great Perenees adalah anjing yang tenang dan setia. Mereka memiliki bulu tebal dan berbulu.'),
(142, 'Greyhound', 1, 'Greyhound adalah anjing yang bersemangat dan cepat. Mereka memiliki tubuh yang ramping dan kaki yang panjang.'),
(143, 'Groenendael', 1, 'Groenendael adalah anjing yang cerdas dan berani. Mereka memiliki bulu panjang dan berwarna hitam.'),
(144, 'Irish Spaniel', 1, 'Irish Spaniel adalah anjing yang ceria dan ramah. Mereka memiliki bulu panjang dan berwarna cerah.'),
(145, 'Irish Wolfhound', 1, 'Irish Wolfhound adalah anjing yang tangguh dan setia. Mereka memiliki bulu panjang dan tubuh yang besar.'),
(146, 'Japanese Spaniel', 1, 'Japanese Spaniel adalah anjing yang ceria dan ramah. Mereka memiliki tubuh kecil dan bulu panjang.'),
(147, 'Komondor', 1, 'Komondor adalah anjing yang unik dan berani. Mereka memiliki bulu putih yang berkeriting dan tebal.'),
(148, 'Labradoodle', 1, 'Labradoodle adalah anjing yang ceria dan ramah. Mereka merupakan campuran antara Labrador dan Poodle.'),
(149, 'Labrador', 1, 'Labrador adalah anjing yang setia dan ramah. Mereka memiliki bulu pendek dan berwarna coklat atau hitam.'),
(150, 'Lhasa', 1, 'Lhasa adalah anjing yang cerdas dan setia. Mereka memiliki bulu panjang dan mata yang lembut.'),
(151, 'Malinois', 1, 'Malinois adalah anjing yang cerdas dan aktif. Mereka memiliki bulu pendek dan tubuh yang berotot.'),
(152, 'Maltese', 1, 'Maltese adalah anjing yang ceria dan ramah. Mereka memiliki bulu putih dan lembut.'),
(153, 'Mex Hairless', 1, 'Mex Hairless adalah anjing yang unik dan ramah. Mereka tidak memiliki bulu dan memiliki kulit halus.'),
(154, 'Newfoundland', 1, 'Newfoundland adalah anjing yang kuat dan ramah. Mereka memiliki tubuh yang besar dan bulu tebal.'),
(155, 'Pekinese', 1, 'Pekinese adalah anjing yang ceria dan ramah. Mereka memiliki bulu panjang dan tubuh yang kecil.'),
(156, 'Pit Bull', 1, 'Pit Bull adalah anjing yang kuat dan setia. Mereka memiliki tubuh yang berotot dan wajah yang khas.'),
(157, 'Pomeranian', 1, 'Pomeranian adalah anjing yang ceria dan ramah. Mereka memiliki bulu tebal dan warna yang bervariasi.'),
(158, 'Poodle', 1, 'Poodle adalah anjing yang cerdas dan ceria. Mereka memiliki bulu tebal dan berkeriting.'),
(159, 'Pug', 1, 'Pug adalah anjing yang ceria dan ramah. Mereka memiliki wajah keriput dan tubuh yang kecil.'),
(160, 'Rhodesian', 1, 'Rhodesian adalah anjing yang tangguh dan berani. Mereka memiliki bulu pendek dan warna coklat.'),
(161, 'Rottweiler', 1, 'Rottweiler adalah anjing yang kuat dan setia. Mereka memiliki tubuh yang berotot dan mantel hitam dan coklat.'),
(162, 'Saint Bernard', 1, 'Saint Bernard adalah anjing yang setia dan penyayang. Mereka memiliki tubuh yang besar dan bulu panjang.'),
(163, 'Schnauzer', 1, 'Schnauzer adalah anjing yang cerdas dan berani. Mereka memiliki bulu tebal dan kumis yang khas.'),
(164, 'Scotch Terrier', 1, 'Scotch Terrier adalah anjing yang ceria dan ramah. Mereka memiliki bulu panjang dan warna yang cerah.'),
(165, 'Shar_Pei', 1, 'Shar_Pei adalah anjing yang unik dan berani. Mereka memiliki kulit keriput dan tubuh yang berotot.'),
(166, 'Shiba Inu', 1, 'Shiba Inu adalah anjing yang cerdas dan setia. Mereka memiliki bulu tebal dan ekor yang melingkar.'),
(167, 'Shih-Tzu', 1, 'Shih-Tzu adalah anjing yang ceria dan ramah. Mereka memiliki bulu panjang dan mata yang besar.'),
(168, 'Siberian Husky', 1, 'Siberian Husky adalah anjing yang cerdas dan bersemangat. Mereka memiliki bulu tebal dan mata biru.'),
(169, 'Vizsla', 1, 'Vizsla adalah anjing yang ceria dan bersemangat. Mereka memiliki bulu pendek dan berwarna merah keemasan.'),
(170, 'Yorkie', 1, 'Yorkie adalah anjing yang ceria dan berani. Mereka memiliki bulu panjang dan warna yang bervariasi.'),
(201, 'Abyssinian', 2, 'Abyssinian adalah salah satu ras kucing yang paling populer. Mereka dikenal karena mantel mereka yang tebal dan warna yang indah.'),
(202, 'American Bobtail', 2, 'American Bobtail adalah kucing yang kuat dan ramah. Mereka memiliki ekor yang pendek dan bulu yang tebal.'),
(203, 'American Shorthair', 2, 'American Shorthair adalah kucing yang kuat dan sehat. Mereka memiliki mantel pendek dan bulat.'),
(204, 'Bengal', 2, 'Bengal adalah ras kucing yang energik dan aktif. Mereka memiliki bulu yang indah dengan pola yang menarik.'),
(205, 'Birman', 2, 'Birman adalah kucing yang anggun dan ramah. Mereka memiliki mantel panjang dan mata biru yang menawan.'),
(206, 'Bombay', 2, 'Bombay adalah kucing yang pintar dan ramah. Mereka memiliki mantel hitam mengkilap dan mata yang besar.'),
(207, 'British Shorthair', 2, 'British Shorthair adalah kucing yang tenang dan ramah. Mereka memiliki mantel pendek dan tubuh yang bulat.'),
(208, 'Egyptian Mau', 2, 'Egyptian Mau adalah ras kucing yang aktif dan atletis. Mereka memiliki mantel yang halus dan pola bercak yang unik.'),
(209, 'Maine Coon', 2, 'Maine Coon adalah kucing yang besar dan lembut. Mereka memiliki mantel panjang dan bulu yang tebal.'),
(210, 'Persian', 2, 'Persian adalah kucing yang anggun dan tenang. Mereka memiliki bulu panjang dan hidung pesek.'),
(211, 'Ragdoll', 2, 'Ragdoll adalah kucing yang tenang dan ramah. Mereka memiliki bulu panjang dan mata biru yang lembut.'),
(212, 'Russian Blue', 2, 'Russian Blue adalah kucing yang cerdas dan tenang. Mereka memiliki bulu yang tebal dan warna abu-abu yang indah.'),
(213, 'Siamese', 2, 'Siamese adalah kucing yang cerdas dan sosial. Mereka memiliki mata biru yang menawan dan mantel pendek.'),
(214, 'Sphynx', 2, 'Sphynx adalah kucing yang unik dan ramah. Mereka memiliki kulit halus dan tidak berbulu.'),
(215, 'Tuxedo', 2, 'Tuxedo adalah kucing yang elegan dan ramah. Mereka memiliki mantel hitam dan putih yang kontras.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Namalengkap` varchar(255) NOT NULL,
  `Nomortlp` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Kota` varchar(100) DEFAULT NULL,
  `Kecamatan` varchar(100) DEFAULT NULL,
  `Alamatfull` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Namalengkap`, `Nomortlp`, `Email`, `Kota`, `Kecamatan`, `Alamatfull`) VALUES
(1, 'admin', 'admin', 'Admin', '+628314067689', NULL, NULL, NULL, NULL),
(13, 'ibnuar123', '$2y$10$SfDitjV1mjZwVROyT6XiHezGvYtOSolJp11D7kKAqsdk6fN8umGfu', 'Ibnu Arbianto Pratama', '+628314189', 'ibnuar123@gmail.com', 'Jakarta Utara', 'Kamal Muara', 'Jl. Kenari Golf 6 51-19, RT.6/RW.2, Kamal Muara, Kec. Penjaringan, Jkt Utara, Daerah Khusus Ibukota Jakarta 14470, Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `adopsi`
--
ALTER TABLE `adopsi`
  ADD PRIMARY KEY (`AdoptionID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AnimalID` (`AnimalID`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`AnimalID`),
  ADD KEY `RasID` (`RasID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `gambar_animal`
--
ALTER TABLE `gambar_animal`
  ADD PRIMARY KEY (`GambarID`),
  ADD KEY `AnimalID` (`AnimalID`);

--
-- Indexes for table `laporan_adopsi`
--
ALTER TABLE `laporan_adopsi`
  ADD PRIMARY KEY (`LaporanID`),
  ADD KEY `AdoptionID` (`AdoptionID`);

--
-- Indexes for table `laporan_user`
--
ALTER TABLE `laporan_user`
  ADD PRIMARY KEY (`LaporanID`);

--
-- Indexes for table `ras`
--
ALTER TABLE `ras`
  ADD PRIMARY KEY (`RasID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adopsi`
--
ALTER TABLE `adopsi`
  MODIFY `AdoptionID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `AnimalID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `gambar_animal`
--
ALTER TABLE `gambar_animal`
  MODIFY `GambarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `laporan_adopsi`
--
ALTER TABLE `laporan_adopsi`
  MODIFY `LaporanID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `laporan_user`
--
ALTER TABLE `laporan_user`
  MODIFY `LaporanID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopsi`
--
ALTER TABLE `adopsi`
  ADD CONSTRAINT `adopsi_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `adopsi_ibfk_2` FOREIGN KEY (`AnimalID`) REFERENCES `animal` (`AnimalID`);

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`RasID`) REFERENCES `ras` (`RasID`),
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `gambar_animal`
--
ALTER TABLE `gambar_animal`
  ADD CONSTRAINT `gambar_animal_ibfk_1` FOREIGN KEY (`AnimalID`) REFERENCES `animal` (`AnimalID`);

--
-- Constraints for table `laporan_adopsi`
--
ALTER TABLE `laporan_adopsi`
  ADD CONSTRAINT `laporan_adopsi_ibfk_1` FOREIGN KEY (`AdoptionID`) REFERENCES `adopsi` (`AdoptionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
