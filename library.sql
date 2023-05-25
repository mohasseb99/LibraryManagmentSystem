-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 08:40 PM
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
(0, 'NoAddress', 0),
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
(1, 'The Fellowship of the Ring', 2, 10, '200', 9, 'he Fellowship of the Ring is a 2001 epic fantasy adventure film'),
(2, 'Great Expectations', 1, 10, '150', 9, 'Great Expectations is the thirteenth novel by Charles Dickens and his penultimate completed novel'),
(3, 'The Thousand Eyes', 2, 10, '250', 10, 'Two years after defying the wizard Belthandros Sethennai and escaping into the great unknown, Csorwe and Shuthmili have made a new life for themselves, hunting for secrets among the ruins of an ancient snake empire.');

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
(24, 1, '2023-05-24');

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
(24, 24, 2, '0'),
(25, 24, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `Id` int(11) NOT NULL,
  `FriendlyName` varchar(222) NOT NULL,
  `PhysicalAddress` varchar(222) NOT NULL,
  `static` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`Id`, `FriendlyName`, `PhysicalAddress`, `static`) VALUES
(1, 'About Us', 'showstaticcontent.php', 1),
(2, 'Add Book', 'addbook.php', 0),
(3, 'Add User', 'addUser.php', 0),
(4, 'Books', 'listAllBooks.php', 0),
(5, 'Book Categories', 'listBookCategory.php', 0),
(6, 'Login', 'login.php', 0),
(7, 'Log out', 'logout.php', 0),
(8, 'Show Borrows', 'showReaderborrowing.php', 0),
(9, 'Reach Us', 'showstaticcontent.php', 1),
(10, 'Cart', 'cart.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staticcontent`
--

CREATE TABLE `staticcontent` (
  `id` int(11) NOT NULL,
  `pageId` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staticcontent`
--

INSERT INTO `staticcontent` (`id`, `pageId`, `content`) VALUES
(1, 1, '<div class=\"content\">\n    <div class=\"content_resize\">\n      <div class=\"content_resize2\">\n        <div class=\"mainbar\">\n          <div class=\"article\">\n            <h2><span>About to</span> Company Name</h2>\n            <div class=\"clr\"></div>\n            <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum tellus. Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.</strong></p>\n            <p>Curabitur purus mi, pharetra vitae viverra et, mattis sit amet nunc. Quisque enim ipsum, convallis sit amet molestie in, placerat vel urna. Praesent congue auctor elit, nec pretium ipsum volutpat vitae. Vivamus eget ipsum sit amet ipsum tincidunt fermentum. Sed hendrerit neque ac erat condimentum vulputate. Nulla velit massa, dictum etinterdum quis, tempus at velit.</p>\n          </div>\n          <div class=\"article\">\n            <h2><span>Our</span> Mission</h2>\n            <div class=\"clr\"></div>\n            <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum tellus. Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.</strong></p>\n            <p>Maecenas vestibulum fermentum eleifend. Mauris erat sem, suscipit non tincidunt quis, vestibulum eget elit. Duis eget arcu ante. Proin nulla elit, elementum sit amet commodo et, eleifend vitae quam. Nam vel aliquam tortor. Aliquam bibendum erat a urna interdum quis mattis augue interdum. Phasellus fermentum bibendum mauris, ut semper justo pharetra vestibulum. Duis dictum purus sed nibh commodo a congue elit lobortis. Nunc sed feugiat tellus. Mauris aliquet lorem non enim euismod quis fermentum erat porta. Nullam non elit orci. Aliquam blandit mattis feugiat. Cras pulvinar aliquet massa, quis laoreet mi pulvinar ac. Aliquam mi augue, vehicula in consectetur in, porttitor sed tellus. Mauris convallis dapibus auctor. Integer in egestas lorem. In nulla dolor, sollicitudin vitae sollicitudin quis, viverra at lorem.</p>\n            <p>Ut ullamcorper velit et nisi feugiat non sagittis tortor pharetra. Mauris ut urna et magna commodo cursus. Curabitur quis elementum arcu. Maecenas eleifend, urna vitae vehicula bibendum, felis tellus tincidunt lorem, at iaculis neque eros ac dui. Nunc malesuada pulvinar suscipit. Phasellus sed tortor quis ligula facilisis aliquam. Aliquam quis magna eu dolor posuere malesuada. Quisque consequat, metus fermentum convallis imperdiet, ante justo pharetra enim, vel commodo ipsum mauris eget purus. Morbi lacinia nisl urna, scelerisque suscipit lacus. Nulla ac orci ut nunc venenatis gravida.</p>\n          </div>\n        </div>\n        <div class=\"sidebar\">\n          <div class=\"gadget\">\n            <h2 class=\"star\"><span>Sidebar</span> Menu</h2>\n            <div class=\"clr\"></div>\n            <ul class=\"sb_menu\">\n              <li><a href=\"#\">Home</a></li>\n              <li><a href=\"#\">TemplateInfo</a></li>\n              <li><a href=\"#\">Style Demo</a></li>\n              <li><a href=\"#\">Blog</a></li>\n              <li><a href=\"#\">Archives</a></li>\n            </ul>\n          </div>\n          <div class=\"gadget\">\n            <h2 class=\"star\"><span>Sponsors</span></h2>\n            <div class=\"clr\"></div>\n            <ul class=\"ex_menu\">\n              <li><a href=\"#\">Lorem ipsum dolor</a><br />\n                Donec libero. Suspendisse bibendum</li>\n              <li><a href=\"#\">Dui pede condimentum</a><br />\n                Phasellus suscipit, leo a pharetra</li>\n              <li><a href=\"#\">Condimentum lorem</a><br />\n                Tellus eleifend magna eget</li>\n              <li><a href=\"#\">Fringilla velit magna</a><br />\n                Curabitur vel urna in tristique</li>\n              <li><a href=\"#\">Suspendisse bibendum</a><br />\n                Cras id urna orbi tincidunt orci ac</li>\n              <li><a href=\"#\">Donec mattis</a><br />\n                purus nec placerat bibendum</li>\n            </ul>\n          </div>\n        </div>\n        <div class=\"clr\"></div>\n      </div>\n    </div>\n  </div>\n  <div class=\"fbg\">\n    <div class=\"fbg_resize\">\n      <div class=\"col c1\">\n        <h2><span>Image Gallery</span></h2>\n        <a href=\"#\"><img src=\"images/pix1.jpg\" width=\"58\" height=\"58\" alt=\"\" /></a> <a href=\"#\"><img src=\"images/pix2.jpg\" width=\"58\" height=\"58\" alt=\"\" /></a> <a href=\"#\"><img src=\"images/pix3.jpg\" width=\"58\" height=\"58\" alt=\"\" /></a> <a href=\"#\"><img src=\"images/pix4.jpg\" width=\"58\" height=\"58\" alt=\"\" /></a> <a href=\"#\"><img src=\"images/pix5.jpg\" width=\"58\" height=\"58\" alt=\"\" /></a> <a href=\"#\"><img src=\"images/pix6.jpg\" width=\"58\" height=\"58\" alt=\"\" /></a> </div>\n      <div class=\"col c2\">\n        <h2><span>Lorem Ipsum</span></h2>\n        <p>Lorem ipsum dolor<br />\n          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href=\"#\">Morbi tincidunt, orci ac convallis aliquam</a>, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>\n      </div>\n      <div class=\"col c3\">\n        <h2><span>Contact</span></h2>\n        <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue.</p>\n        <p><a href=\"#\">support@yoursite.com</a></p>\n        <p>+1 (123) 444-5677<br />\n          +1 (123) 444-5678</p>\n        <p>Address: 123 TemplateAccess Rd1</p>\n      </div>\n      <div class=\"clr\"></div>\n    </div>\n  </div>'),
(2, 9, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221002.01074749354!2d31.517187357949165!3d30.06105058212572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145815f5627d7877%3A0xc12313b40cbde8d8!2z2YXZg9iq2KjYqSDZhdi12LEg2KfZhNis2K_Zitiv2KkgLSBIZWxpb3BvbGlzIExpYnJhcnk!5e0!3m2!1sar!2seg!4v1684934492883!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

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
(3, 'Youssef Ahmed', '2000-08-15', 2, 'yyt25s#', 'youssefAhmed', 6),
(8, 'madonnaMagdy ', '2000-04-14', 3, 'mmk835%@ffDD', 'madonnamagdy', 7),
(9, 'Omar Ahmed', '1999-02-18', 3, '9', 'omarahmed', 8),
(12, 'Sameh Attia', '0000-00-00', 3, '12', 'samehattia', 9),
(23, 'Mostafa Salah', '1999-02-18', 1, '23', 'mostafaSaleh', 8),
(24, 'omar salah', '0000-00-00', 3, '23', 'omarsalahh', 1);

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
(3, 'librarian'),
(4, 'default');

-- --------------------------------------------------------

--
-- Table structure for table `usertypepages`
--

CREATE TABLE `usertypepages` (
  `Id` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `pageid` int(11) NOT NULL,
  `orderby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertypepages`
--

INSERT INTO `usertypepages` (`Id`, `usertypeid`, `pageid`, `orderby`) VALUES
(20, 1, 1, 5),
(21, 1, 5, 3),
(24, 1, 7, 1),
(25, 1, 8, 2),
(26, 3, 1, 6),
(27, 3, 2, 3),
(28, 3, 3, 2),
(29, 3, 5, 4),
(32, 3, 7, 1),
(34, 3, 9, 7),
(35, 1, 9, 6),
(36, 4, 6, 0),
(37, 4, 3, 1),
(38, 4, 5, 2),
(39, 4, 1, 3),
(40, 4, 9, 4),
(41, 1, 10, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `parentid` (`parentid`);

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
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `staticcontent`
--
ALTER TABLE `staticcontent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pageId` (`pageId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userTypeId` (`userTypeId`),
  ADD KEY `cityid` (`cityid`),
  ADD KEY `cityid_2` (`cityid`),
  ADD KEY `cityid_3` (`cityid`),
  ADD KEY `cityid_4` (`cityid`),
  ADD KEY `cityid_5` (`cityid`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypepages`
--
ALTER TABLE `usertypepages`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `usertypeid` (`usertypeid`),
  ADD KEY `pageid` (`pageid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staticcontent`
--
ALTER TABLE `staticcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertypepages`
--
ALTER TABLE `usertypepages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`parentid`) REFERENCES `address` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `staticcontent`
--
ALTER TABLE `staticcontent`
  ADD CONSTRAINT `staticcontent_ibfk_1` FOREIGN KEY (`pageId`) REFERENCES `pages` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userTypeId`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`cityid`) REFERENCES `address` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usertypepages`
--
ALTER TABLE `usertypepages`
  ADD CONSTRAINT `usertypepages_ibfk_1` FOREIGN KEY (`usertypeid`) REFERENCES `usertype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertypepages_ibfk_2` FOREIGN KEY (`pageid`) REFERENCES `pages` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
