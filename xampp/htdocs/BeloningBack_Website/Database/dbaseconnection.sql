-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 10:43 PM
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
-- Database: `dbaseconnection`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_users`
--

CREATE TABLE `login_users` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(130) DEFAULT NULL,
  `Email` varchar(260) DEFAULT NULL,
  `Phoneno` varchar(16) DEFAULT NULL,
  `Password` varchar(260) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_users`
--

INSERT INTO `login_users` (`id`, `Fullname`, `Email`, `Phoneno`, `Password`, `role`) VALUES
(1, 'OUSSAMA HELMI', 'osamahelmi22@gmail.com', '5343525171', '$2y$10$0dIavkXMaGEM0gFLcal.zuGuaCV5/ETNg9dIYE.XBiLtF3H5EH4ze', 'user'),
(2, 'admin', 'test@admin.com', '00', '$2y$10$hzVkPOqtN5UuzS.Fn73YmORtBJWYAmNo6.mLgRo.XTAGoVy8IWcQW', 'admin'),
(3, 'azam', 'azam@gmail.com', '0000000000', '$2y$10$PgS7/iQUsajxk3GuOMfcUOZKN8UNlbYun7PSApna3kxU9TqiV0lty', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `lost_found_items`
--

CREATE TABLE `lost_found_items` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `itemType` varchar(255) DEFAULT NULL,
  `contactPurpose` enum('lost','found') DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_found_items`
--

INSERT INTO `lost_found_items` (`id`, `userID`, `itemType`, `contactPurpose`, `date`, `location`, `city`, `state`, `details`, `image`) VALUES
(16, 1, 'phone', 'found', '2024-05-02', 'at uskudar university', 'istanbul', 'uskudar', 'I have found this phone ', 'uploads/phone.jpg'),
(17, 1, 'other', 'lost', '2024-05-03', 'at uskudar university', 'istanbul', 'uskudar', 'iuptdrtthj', 'uploads/passport.jpg'),
(18, 3, 'key', 'lost', '2024-05-02', 'at metro station', 'istanbul', 'pendik', 'Hello guys I have lost my key at the station', 'uploads/key.jpg'),
(19, 1, 'wallet', 'found', '2024-05-02', 'Ankara Gar', 'Ankara', 'Altindag', 'I lost this wallet yesterday around the station', 'uploads/wallet.jpg'),
(20, 1, 'phone', 'lost', '2024-05-02', 'istanbul', 'istanbul', 'Florya', 'I lost this cat two days ago she was walking in the garden', 'uploads/00TB-MEOWS-square640.jpg'),
(21, 1, 'other', 'found', '2024-05-02', 'A', 'Antalya', 'Yeni Dogan', 'I found this Airpods on the street so if someone your contact me ', 'uploads/airpods.jpg'),
(22, 1, 'other', 'lost', '2024-05-01', 'W', 'istanbul', 'maltapa', 'I have forget my watch in the resturant ', 'uploads/watch.jpg'),
(23, 1, 'other', 'found', '2024-04-25', 'U', 'istanbul', 'uskudar', 'I get this one near to uskudar university', 'uploads/charger.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_users`
--
ALTER TABLE `login_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_found_items`
--
ALTER TABLE `lost_found_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_users`
--
ALTER TABLE `login_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lost_found_items`
--
ALTER TABLE `lost_found_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lost_found_items`
--
ALTER TABLE `lost_found_items`
  ADD CONSTRAINT `lost_found_items_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `login_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
