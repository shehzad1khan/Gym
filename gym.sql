-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 02:46 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `image`) VALUES
(2, 'Admin khan', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'waheed.jpg'),
(3, 'Shehzad khan', 'shehzad', '4054b2941ba6f1168e8ce90e072b0e8d', 'wallpaperflare.com_wallpaper (9).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `age` int(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `shift` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `contact`, `address`, `age`, `email`, `gender`, `shift`, `image`) VALUES
(30, 'asfasf', '79789', 'sdfgdj', 4564, 'ryhrt', 'male', 'evening', ''),
(31, 'adfsdf', 'fsdfs', '34sdfsedfsdf', 343, 'sdfsdf@gmail.com', 'male', 'morning', 'admin2.jpg'),
(32, 'wer', 'etr', 'ert', 0, '', 'male', 'morning', 't4.jpg'),
(33, 'erw', 'er', 'ewr', 0, '', 'female', 'evening', '2.jpg'),
(34, 'Shehzad', '03075709661', 'Landikotal', 23, 'shehzadshinwari100@gmail.com', 'male', 'evening', 't4.jpg'),
(35, 'jawad khan', '03060301226', 'Saddar Bazar', 22, 'jawad@gmal.com', 'male', 'morning', 'admin2.jpg'),
(36, 'Shams ur Rehman', '03029671213', 'Gulberg', 25, 'shams@gmail.com', 'male', 'evening', 'waheed.jpg'),
(39, 'ibrar', '', '', 0, '', '', '', ''),
(51, 'Khuzifa khalil', '03325661785', 'Islamabad pakistan', 32, 'khuzaifa@khalil.com', 'male', 'evening', 'neil-soni-6wdRuK7bVTE-unsplash.jpg'),
(52, 'Khan', '03026598741', 'KHAN BAZAR LANDIKOTAL', 87, 'khan@gmail.com', 'female', 'morning', 't-2.png'),
(54, 'Asad khan', '03070725745', 'Sitara market  Peshawar', 21, 'asad@gmai.com', 'male', 'morning', 't4.jpg'),
(55, 'Asad khan', '03070725745', 'Sitara Market Peshawar', 15, 'asad@gmal.com', 'male', 'morning', 't4.jpg'),
(56, 'Jawad khan', '03060301226', 'Saddar Bazar', 12, 'jawad@gmail.com', 'male', 'evening', '2.jpg'),
(58, 'mmmmm', '4563453', 'asdf', 3423, 'asdas@wetwe.tyu', 'female', 'evening', '1000_F_225428104_3krDQiekHSEN7LQu2scSKchNocr4Ja2D.jpg'),
(60, 'sssss', '5346574', 'asdasd', 44, 'sssss@dfd.sss', 'male', 'morning', 't2.jpg'),
(62, 'sdfs', '4723894', 'kldfjksdlj', 3, 'amir@tgmail.com', 'male', 'morning', 'admin2.jpg'),
(64, 'fsdfs', 'dsf23423423', '34wrefsdaf', 34, 'amiir@gamil.com', 'male', 'morning', 'admin2.jpg'),
(66, 'aSD', '324234', 'WERW', 234, 'SDRFWSR@tegghj.hjghj', 'male', 'morning', ''),
(67, 'aSD', '324234', 'WERW', 234, 'SDRFWSR@tegghj.hjghj', 'male', 'morning', ''),
(68, 'aSD', '324234', 'WERW', 234, 'SDRFWSR@tegghj.hjghj', 'female', 'evening', ''),
(69, 'Shehzad', '03075709661', 'Landikotal', 23, 'shehzadshinwari100@gmail.com', 'male', 'evening', 'neil-soni-6wdRuK7bVTE-unsplash.jpg'),
(70, 'Shehzad', '03075709661', 'Landikotal', 23, 'shehzadshinwari100@gmail.com', 'male', 'evening', 't2.jpg'),
(71, 'Shehzad', '03075709661', 'Landikotal', 23, 'shehzadshinwari100@gmail.com', 'male', 'evening', ''),
(72, 'Shehzad', '03075709661', 'Landikotal', 23, 'shehzadshinwari100@gmail.com', 'male', 'evening', ''),
(73, 'fsdfs', 'dsf23423423', '34wrefsdaf', 34, 'amiir@gamil.com', 'male', 'morning', ''),
(74, 'fsdfs', 'dsf23423423', '34wrefsdaf', 34, 'amiir@gamil.com', 'male', 'morning', ''),
(75, 'fsdfs', 'dsf23423423', '34wrefsdaf', 34, 'amiir@gamil.com', 'male', 'morning', ''),
(77, 'fsdfs', 'dsf23423423', '34wrefsdaf', 34, 'amiir@gamil.com', 'male', 'evening', ''),
(78, 'fsdfs', 'dsf23423423', '34wrefsdaf', 34, 'amiir@gamil.com', 'male', 'evening', ''),
(79, 'Ali khan', '03028182283', 'Pashawar Pakistan', 23, 'Ali@gmail.com', 'male', 'morning', 't-2.png'),
(80, 'haya', '030212458574', 'Shenpukh Lalazaar', 54, 'jabir@gmail.com', 'female', 'morning', 'neil-soni-6wdRuK7bVTE-unsplash.jpg'),
(83, 'hammad', '03028182383', 'torghar', 23, 'hamad@gmail.com', 'male', 'morning', 't4.jpg'),
(84, 'dsgerg', '546t45', 'dfhf', 456, 'dfg@sdfg.hjk', 'female', 'evening', ''),
(89, 'SD', 'DSASDAS', '23WDASDAD', 23, 'ADIML@GMAIL.COM', 'male', 'morning', ''),
(92, 'Rizwan', '03026598147', 'landiktoal bazar', 34, 'rizwan@gmail.com', 'male', 'evening', 'waheed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(100) NOT NULL,
  `package` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `amount` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package`, `description`, `amount`) VALUES
(9, 'Basic', 'Simple Exercise + Trainer Few Tips', 1000),
(10, 'Silver', 'Trainer Tips + Exercise + Use Of Dumbles', 1500),
(11, 'Gold', 'Trainer Tips + Use Of Dumbles + Running Machine', 2500),
(12, 'Platinum', 'Trainer Tips + Use Of Every Machine And Dumbles', 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
