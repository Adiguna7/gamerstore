-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2020 at 10:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamerstore`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `showUIT` ()  NO SQL
BEGIN
	SELECT * FROM pengguna;
    SELECT * FROM item;
    SELECT * FROM transaksi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userDetail` (IN `idparam` INT(11))  NO SQL
BEGIN

SELECT userId, userName, userEmail, userAddress, userCity FROM pengguna WHERE userId = idparam;

SELECT p.orderId, p.userId, p.itemId, i.itemName, p.quantity, p.orderPrice, p.isDone FROM pesanan p, item i WHERE p.userId = idparam AND i.itemId = p.itemId;

SELECT t.transactionId, t.userId, p.userName, t.transactionDate, t.totalPrice, t.isApproval FROM transaksi t, pengguna p WHERE t.userId = idparam AND p.userId = t.userId;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemPrice` int(11) NOT NULL,
  `itemCategory` enum('keyboard','mouse','headset') NOT NULL,
  `itemDescription` varchar(100) DEFAULT NULL,
  `itemStock` int(7) NOT NULL,
  `itemImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `itemPrice`, `itemCategory`, `itemDescription`, `itemStock`, `itemImage`) VALUES
(1, 'razer blackwidow', 790000, 'keyboard', 'The Razer BlackWidow lets you experience full gaming immersion with Razer Chroma™.', 10, 'keyboard1.jpg'),
(2, 'Razer Huntsman', 12000000, 'keyboard', NULL, 3, 'keyboard2.jpg'),
(3, 'Virgo keyboard', 350000, 'keyboard', NULL, 4, 'keyboard3.jpg'),
(4, 'Oem keyboard', 200000, 'keyboard', NULL, 2, 'keyboard4.jpg'),
(5, 'Havitz mechanical', 199000, 'keyboard', NULL, 3, 'keyboard5.jpg'),
(6, 'Razer Mouse G102', 500000, 'mouse', NULL, 4, 'mouse1.jpg'),
(7, 'Rexus Gaming G288', 249000, 'mouse', NULL, 10, 'mouse2.jpg'),
(8, 'Logitech g220', 400000, 'mouse', NULL, 6, 'mouse3.jpg'),
(9, 'Logitech g221', 456000, 'mouse', NULL, 7, 'mouse4.jpg'),
(10, 'Razer Gaming L213', 560000, 'mouse', NULL, 4, 'mouse5.jpg'),
(11, 'Logitech g992 ', 799000, 'mouse', NULL, 2, 'mouse6.jpg'),
(17, 'Rexus Gaming Headset G992', 299999, 'headset', NULL, 2, 'headset1.jpg'),
(18, 'Kotion Each Gaming Headset G9000', 149000, 'headset', NULL, 2, 'headset2.jpg'),
(19, 'Havit Gaming Headset L122', 99999, 'headset', NULL, 2, 'headset3.jpg'),
(20, 'Mediatech Gaming Headset Stereo FullBass g877', 150000, 'headset', NULL, 2, 'headset4.jpg'),
(21, 'Dareu EH925 7.1 Gaming', 199999, 'headset', NULL, 3, 'headset5.jpg'),
(22, 'Rexus K9D Keyboard Gaming', 299999, 'keyboard', NULL, 2, 'keyboard6.jpg'),
(23, 'Havit Gaming Keyboard', 538000, 'keyboard', NULL, 1, 'keyboard7.jpg'),
(24, 'E-Blue Mechanical Gaming Keyboard', 450000, 'keyboard', NULL, 3, 'keyboard8.jpg'),
(25, 'Msi Vigor GK40 Wired RGB Gaming Keyboard', 625000, 'keyboard', NULL, 3, 'keyboard9.jpg'),
(26, 'Leopard G700 Gaming Keyboard', 340000, 'keyboard', NULL, 2, 'keyboard10.jpg'),
(27, 'Asus ROG STRIX Impact Gaming Mouse', 720000, 'mouse', NULL, 9, 'mouse7.jpg'),
(28, 'Mouse Gaming MSI Interceptor Ds200', 2550000, 'mouse', NULL, 4, 'mouse8.jpg'),
(29, 'Pictek Gaming Mouse Wired RGB Chroma Backlit', 560000, 'mouse', NULL, 5, 'mouse9.jpg'),
(30, 'HP M100 Wired Gaming Mouse', 700000, 'mouse', NULL, 3, 'mouse10.jpg'),
(31, 'SADES sa818 Gaming Headset Microphone', 297000, 'headset', NULL, 5, 'headset6.jpg'),
(32, 'Toshiba Gaming Headset RZE-G902H', 899999, 'headset', NULL, 6, 'headset7.jpg'),
(33, 'Mediatech Gaming Headset Zeus MSH', 375000, 'headset', NULL, 2, 'headset8.jpg'),
(34, 'Kotion Each 2 in 1 Bluetooth Wireless Gaming Headset Deep Bass - B3505', 699999, 'headset', NULL, 1, 'headset9.jpg'),
(35, 'Rexus M1 Gaming Headset', 299999, 'headset', NULL, 3, 'headset10.jpg'),
(36, 'abc', 90000, 'keyboard', 'abd', 4, 'keyboard1589931557.png');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `userId` int(11) NOT NULL,
  `userName` varchar(70) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userAddress` varchar(70) NOT NULL,
  `userCity` varchar(10) NOT NULL,
  `userPassword` varchar(61) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT '0',
  `isVerify` tinyint(1) DEFAULT '0',
  `verifyCode` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`userId`, `userName`, `userEmail`, `userAddress`, `userCity`, `userPassword`, `isAdmin`, `isVerify`, `verifyCode`) VALUES
(1, 'adminadiguna', 'emailtestuntukbasdat@gmail.com', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$WLcBuaj1SWdYhlJlQvzqj.IVGqbbGUAsgN0I51/tPSNXlKQzWfZEG', 1, 1, 2345),
(2, 'a', 'emailtestuntukbasdat123@gmail.com', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$mq/pM.o4A.B.yP7B/a9MG.cn/GSYuwTaOGki0LqwM7/kc6bPQ.pGK', NULL, 1, 7692),
(3, 'bcd', 'emailtestuntukbasdat123@gmail.com', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$is.sKY7CkqxzyQEdpPI4BuGyZt/fa5L80njhyK4aINvseKTuYB/I6', NULL, NULL, 9230),
(4, 'adiguna', 'emailtestuntukbasdat123@gmail.com', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$Odad5kB18xGR5dPTxzYABOtLyv6hhuYfgnrnzyBeia8LMl5izOcIq', NULL, NULL, 5405),
(5, 'acd', 'emailtestuntukbasdat123@gmail.co', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$dPMHVvx/yiDASMKjFYnI..bFDYsXpV6GhOa/czIfyNsui19NvO7x6', NULL, NULL, 4976),
(6, 'fvb', 'emailtestuntukbasdat123@gmail.com', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$vUQjQtCPam9fU0T/l7iEIeVPeaTr6JKMC7s90zsXtEq7IgVO/mhRa', NULL, NULL, 1997),
(7, 'agb', 'emailtestuntukbasdat123@gmail.com', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$WiWTQf9XIP13suO9GKkwgOUW4dWw5ur3q0gNpy7i7fu/OPaFiInRe', NULL, 1, 2072),
(10, 'demobasdat', 'emailtestuntukbasdat123@gmail.com', 'granting baru 1 no.24 a', 'surabaya', '$2y$10$vTDpMQHOEgf9MjsF8Q4tPerr/j9SWiRdUiUQzAPGIJhpnQgGlgVZW', NULL, 1, 1732);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(7) DEFAULT '1',
  `orderPrice` int(10) NOT NULL,
  `isDone` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`orderId`, `userId`, `itemId`, `quantity`, `orderPrice`, `isDone`) VALUES
(15, 10, 1, 1, 790000, NULL);

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `delete_pesanan` AFTER DELETE ON `pesanan` FOR EACH ROW UPDATE 
item SET 
item.itemStock = item.itemStock + OLD.quantity
WHERE item.itemId = OLD.itemId
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pesanan` AFTER INSERT ON `pesanan` FOR EACH ROW UPDATE item SET item.itemStock = item.itemStock - NEW.quantity
WHERE item.itemId = NEW.itemId
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pesanan` AFTER UPDATE ON `pesanan` FOR EACH ROW UPDATE item 
SET item.itemStock= item.itemStock - NEW.quantity + OLD.quantity
WHERE item.itemId = NEW.itemId
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transactionId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `transactionDate` date NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `isApproval` tinyint(1) DEFAULT '0',
  `imgAdmin` varchar(50) DEFAULT NULL,
  `imgUser` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transactionId`, `userId`, `transactionDate`, `totalPrice`, `isApproval`, `imgAdmin`, `imgUser`) VALUES
(11, 10, '2020-05-20', 790000, 1, '1589934932.png', '1589934858.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`orderId`),
  ADD UNIQUE KEY `orderId` (`orderId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `orderId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `pengguna` (`userId`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `pengguna` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
