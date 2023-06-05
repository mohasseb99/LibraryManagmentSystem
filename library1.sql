-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 05:25 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Id`, `name`, `parentid`) VALUES
(1, 'Egypt', 0),
(2, 'USA', 0),
(3, 'Cairo', 1),
(4, 'Alex', 1),
(5, 'New York', 2),
(6, 'NaserCity', 3),
(7, 'Masr El Gydyda', 3),
(8, 'Madii', 3),
(9, 'Abbsia', 3),
(10, 'Shobra', 3),
(11, 'Attaba', 3),
(12, 'Ain Shams', 3),
(13, 'Giza', 1),
(14, 'Zamalek', 13),
(15, 'Al Haram', 13),
(16, 'Al-Sheikh-Zayed  ', 13),
(17, 'Al Agoza', 13);

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`id`, `name`) VALUES
(1, 'Classics'),
(2, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `bookfile`
--

CREATE TABLE `bookfile` (
  `id` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `filePath` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookfile`
--

INSERT INTO `bookfile` (`id`, `bookId`, `filePath`) VALUES
(1, 1, 'images/books/TheFellowshipoftheRing.jpg'),
(2, 2, 'images/books/GreatExpectations.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fees` decimal(10,0) NOT NULL,
  `available` int(11) NOT NULL,
  `descriptionbook` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookName`, `categoryId`, `quantity`, `fees`, `available`, `descriptionbook`) VALUES
(1, 'The Fellowship of the Ring', 2, 5, '200', 5, 'he Fellowship of the Ring is a 2001 epic fantasy adventure film'),
(2, 'Great Expectations', 1, 4, '150', 4, 'Great Expectations is the thirteenth novel by Charles Dickens and his penultimate completed novel'),
(3, 'The Thousand Eyes', 2, 6, '250', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `readerId` int(11) NOT NULL,
  `borrowDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `readerId`, `borrowDate`) VALUES
(1, 1, '2023-03-25'),
(6, 2, '2023-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `id` int(11) NOT NULL,
  `borrowId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `lateFees` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`id`, `borrowId`, `bookId`, `lateFees`) VALUES
(1, 1, 2, '0'),
(2, 1, 1, '0'),
(4, 6, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `Id` int(11) NOT NULL,
  `FriendlyName` varchar(222) NOT NULL,
  `PhysicalAddress` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`Id`, `FriendlyName`, `PhysicalAddress`) VALUES
(1, 'Login Page', 'login.php'),
(2, 'Log Out page', 'logout.php'),
(3, 'Sign Up Page', 'addUser.php'),
(4, 'Show User Type Page ', 'listUserType.php'),
(5, 'Show All Book Categories', 'listBookCategory.php'),
(6, 'Add new Book', 'addbook.php'),
(7, 'All Books', 'listAllBooks.php');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(222) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `userTypeId` int(11) NOT NULL,
  `password` varchar(222) NOT NULL,
  `userName` varchar(222) NOT NULL,
  `cityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `dateOfBirth`, `userTypeId`, `password`, `userName`, `cityid`) VALUES
(1, 'Ahmed Mohamed Ahmed', '2009-03-01', 1, '17u665', 'ahmedMohamed', 16),
(2, 'Mahmoud Mohasseb', '1999-07-14', 1, 'i822r5', 'mahmoudMohasseb', 14),
(3, 'Youssef Ahmed', '2000-08-15', 2, 'yyt25s#', 'youssefAhmed', 6),
(8, 'madonnaMagdy ', '2000-04-14', 3, 'mmk835%@ffDD', 'madonnamagdy', 7),
(9, 'Omar Ahmed', '1999-02-18', 3, '9', 'omarahmed', 8),
(12, 'Sameh Attia', '0000-00-00', 3, '12', 'samehattia', 9),
(23, 'Mostafa Salah', '1999-02-18', 1, '23', 'mostafaSaleh', 8),
(24, 'omar salah', '0000-00-00', 3, '23', 'omarsalahh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `name`) VALUES
(1, 'Reader'),
(2, 'manager'),
(3, 'librarian');

-- --------------------------------------------------------

--
-- Table structure for table `usertypepages`
--

CREATE TABLE `usertypepages` (
  `Id` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `pageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertypepages`
--

INSERT INTO `usertypepages` (`Id`, `usertypeid`, `pageid`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 3, 1),
(9, 3, 2),
(10, 3, 3),
(11, 3, 4),
(12, 3, 5),
(13, 3, 6),
(14, 3, 7),
(15, 1, 1),
(16, 1, 2),
(17, 1, 3),
(18, 1, 5),
(19, 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookfile`
--
ALTER TABLE `bookfile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `readerId` (`readerId`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowId` (`borrowId`,`bookId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userTypeId` (`userTypeId`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `cityid_2` (`cityid`),
  ADD KEY `cityid_3` (`cityid`),
  ADD KEY `cityid_4` (`cityid`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypepages`
--
ALTER TABLE `usertypepages`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookfile`
--
ALTER TABLE `bookfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usertypepages`
--
ALTER TABLE `usertypepages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookfile`
--
ALTER TABLE `bookfile`
  ADD CONSTRAINT `bookfile_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `bookcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`readerId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD CONSTRAINT `borrowdetails_ibfk_1` FOREIGN KEY (`borrowId`) REFERENCES `borrow` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowdetails_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
