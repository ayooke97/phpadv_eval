-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 06:01 PM
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
-- Database: `jamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` char(50) NOT NULL,
  `descKategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`, `descKategori`) VALUES
(1, 'Tech', 'Teknologi'),
(2, 'Tech', 'Teknologi'),
(3, 'Kesehatan', 'Mens sana in corpora sano.');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idPostingan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggalDibuat` date DEFAULT current_timestamp(),
  `kategoriID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idPostingan`, `judul`, `isi`, `tanggalDibuat`, `kategoriID`, `user_id`) VALUES
(16, 'Judul 1', 'mari kita cobaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '0000-00-00', 0, 1),
(17, 'Judul 2', 'sdfsdfsdf', '2023-02-12', 1, 1),
(18, 'Lorem Ipsum', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '0000-00-00', 2, 1),
(19, 'Judul 3', 'random aja deh', '0000-00-00', 3, 1),
(21, 'Tuchkii', 'lyubi otusvaetsyya apci apacu apaci apacu na vsegda URAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '0000-00-00', 1, 1),
(22, 'Lorem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem. Veritatis\r\nobcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam\r\nnihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,\r\ntenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,\r\nquia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos \r\nsapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam\r\nrecusandae alias error harum maxime adipisci amet laborum. Perspiciatis \r\nminima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit \r\nquibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur \r\nfugiat, temporibus enim commodi iusto libero magni deleniti quod quam \r\nconsequuntur! Commodi minima excepturi repudiandae velit hic maxime\r\ndoloremque. Quaerat provident commodi consectetur veniam similique ad \r\nearum omnis ipsum saepe, voluptas, hic voluptates pariatur est explicabo \r\nfugiat, dolorum eligendi quam cupiditate excepturi mollitia maiores labore \r\nsuscipit quas? Nulla, placeat. Voluptatem quaerat non architecto ab laudantium\r\nmodi minima sunt esse temporibus sint culpa, recusandae aliquam numquam \r\ntotam ratione voluptas quod exercitationem fuga. Possimus quis earum veniam \r\nquasi aliquam eligendi, placeat qui corporis!\r\n', '2023-02-14', 5, 1),
(23, 'test', 'alskdlaskdlkasldklaskldsa', '0000-00-00', 1, 1),
(24, 'tosst', 'alskdlaskdlkasldklaskldsa', '0000-00-00', 2, 1),
(25, 'dvbdfbdf', 'dfvdfdzffbdzfbdfbdfzbdfb', '0000-00-00', 3, 1),
(26, 'szdvsdv', 'bvvmbncv,mnm,vnbm,cvnbm,cvnbm,ncvm,bnm,cvnb,cv', '0000-00-00', 3, 1),
(27, 'dfvdzfvdzbdfb', 'dfvbdfbfgmsgmsfmgnmsfmgsgmsgfmsgf', '0000-00-00', 1, 1),
(28, 'ralsfnlkasfhlk', 'dfbmnsdfbkjdnfbndmbm,dfnbm,dfnbm,dfnb', '0000-00-00', 1, 1),
(30, 'dfjdfhdkfj', 'lksdjfksdhfjksdjkfhsdjk', '2023-03-03', 2, 1),
(33, 'jhudhulll', 'lorem doang ygy', NULL, 1, 1),
(34, 'jhudhullle', 'lorem doang ygyy', NULL, 5, 1),
(35, 'sdfsdfsd', 'svsdvsdvsdvsdvsdvsdv', NULL, 5, 1),
(36, 'cvcvcvcvcv', 'zxvzxvzxvzxvxzvxzv', NULL, 1, 1),
(37, 'sdvsdvsdv', 'lorem doang ygyy', NULL, 5, 1),
(38, 'Tuchkiipik', 'gnfnvbnvbnvbnvbbnvbvbnbvnbv', NULL, 1, 1),
(39, 'awokaowkoawkoakwoakwoakwoe', 'dfbdfbdfbdfbdfbdfbdfb', '0000-00-00', 4, 1),
(40, 'fnvcbnvcbnvcbn', 'hgjghkkgh,gh,gh,gh', '0000-00-00', 1, 1),
(41, 'dfbfdfbdf', 'ASasAS', '0000-00-00', 1, 1),
(42, 'dfbfdfbdfdsvsdv', 'ASasAS', '0000-00-00', 1, 1),
(43, 'random', 'sdlkfjsklfjlksdjflksdjflksdjflksjdklf', '0000-00-00', 1, 1),
(44, 'Lorem ipsumsf', 'dfgdsagdfsgdsfsgdfg', '2023-02-22', 1, 1),
(45, 'sdgsdsdgsdgsdgxzvx', 'dfssdfsfsdzc', '2023-02-22', 5, 1),
(46, 'sdgvgsdfsdgsdbcvbv v', 'sdfsdfsdfsdfsdf', '2023-02-22', 3, 1),
(48, 'sfdlghjkdfghkjlfd', 'xncvb,cxcbvnmxcbmnvbxcnmvbxcm', '2023-02-22', 1, 1),
(49, 'LOOOOLLLL', 'SDJFHLKSDHJKSDHFJHSDJKFHSDKJFHJSKDHFJKSDHFJKSD', '2023-02-22', 1, 1),
(50, 'sdfsdfdcvxcvxcvxcvxcvxcv', 'asdfsadfsadfsadfsadfsadfsadsdafsdaasdffsdasdfsdafsdafasdf', '2023-03-03', 1, 1),
(52, '10 Kiat untuk Jadi sehat wal afiat', 'dsfsdfsdjfksdjkfjsdkf', '2023-03-03', 3, 6),
(53, '10 Kiat untuk sehat', 'LOREM IPSUM SEHAT AMIN', '2023-03-04', 3, 1),
(54, 'wkwkwkwkwkwkw', 'wkwkwkwkwkwkwkwkwkwkwkwkwkwkwkwkw', '2023-03-08', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `namaProduk` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `descProduk` text NOT NULL,
  `kategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `foto`, `harga`, `descProduk`, `kategoriID`) VALUES
(3, 'r1', 'r1.jpg', 50000, 'kosong', 1),
(4, 'r2', 'r2.jpg', 100000, 'Kualitas Ori!', 1),
(9, 'ghjghjghjghjhg', '870-Capture2.PNG', 1000000, 'hgjghjghjghjghj', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `role` enum('admin','editor','ordinaryuser') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `role`) VALUES
(1, 'bakti12356@gmail.com', '$2y$10$7mT.RBxzfcJs1GwNYAuo7.u65vCvEh2GsOxmfP1b60LZiUDPL6.y6', 'admin'),
(6, 'kangeditor@gmail.com', '$2y$10$44l1gJWm4idaVQlIkasjYu0Xhmx7roD7.uUq2L4emiOhKZIlDIhQu', 'editor'),
(14, 'kangeditoii@gmail.com', '$2y$10$mWu7A7/jFxY7arNmtkRlXO6RYldTy.rP6M.QWfg3quQPNgmfMhgvK', 'ordinaryuser'),
(16, 'bakti', '$2y$10$JFgdYUMaftp1oo3w/tB0Ce.5N/J0pzJ8n1jZ9CSOjIv7WFk4AtFFK', ''),
(17, 'editoramatir@gmail.com', '$2y$10$CLD8zL1lNOdRQjIZSixzuOcrN13RRJ7UC3w9bB26UXsQwhsXmyV/O', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPostingan`),
  ADD KEY `fk_user_post` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`),
  ADD KEY `fk_kategori_produk` (`kategoriID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_kategori_produk` FOREIGN KEY (`kategoriID`) REFERENCES `kategori` (`idKategori`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
