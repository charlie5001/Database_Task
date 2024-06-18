-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 09:53 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `00_booksl3`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `Author_ID` int(11) NOT NULL,
  `Author_FName` varchar(30) NOT NULL,
  `Author_LName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`Author_ID`, `Author_FName`, `Author_LName`) VALUES
(1, 'Douglas ', 'Adams'),
(2, 'John', 'Sandford'),
(3, '', 'Ctein'),
(4, 'Steve', 'Krug'),
(5, 'Jeffery', 'Archer'),
(6, 'Rachel', 'Bach'),
(7, 'Mark', 'Pryor'),
(50, 'Nora', 'Roberts'),
(51, 'Joe', 'Black'),
(52, 'Mike', 'Black'),
(53, 'Jenny', 'Goodall'),
(54, 'TV', 'One'),
(55, 'Nigel', 'Marsden');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ID` int(11) NOT NULL,
  `Book_Title` varchar(200) NOT NULL,
  `Book_Plot` text NOT NULL,
  `Book_First_Published` date NOT NULL,
  `Book_Author_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Book_Title`, `Book_Plot`, `Book_First_Published`, `Book_Author_ID`) VALUES
(1, 'HitchHikers Guide to the Galaxy', 'blah blah', '1979-10-12', 1),
(2, 'Saturn Run', 'blah blah', '2015-10-06', 2),
(3, 'Don\'t Make me Think', 'blah blah', '2000-01-01', 4),
(5, 'Yes', '', '0000-00-00', 52),
(6, 'Using PHP', '', '0000-00-00', 53),
(7, 'TV Guide', '', '0000-00-00', 54),
(8, 'Quiver of Arrows', '', '0000-00-00', 5),
(9, 'On the Way', '', '0000-00-00', 55),
(10, 'Hit The Ball', '', '0000-00-00', 54);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Review_ID` int(11) NOT NULL,
  `Review_Book_ID` int(11) NOT NULL,
  `Review_Genre` enum('Historical','Humour','Crime','Adventure','Mystery','Non Fiction') NOT NULL,
  `Review_Rating` int(1) NOT NULL,
  `Review_Content` text NOT NULL,
  `Review_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Review_Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Review_ID`, `Review_Book_ID`, `Review_Genre`, `Review_Rating`, `Review_Content`, `Review_Date`, `Review_Email`) VALUES
(1, 1, 'Humour', 3, 'The book is not as good as its cult status would lead one to believe. Whilst it has some memorable quotes and a number of cool ideas the overall plot is weak and often the jokes / humour are simply not all that funny. This book may well appeal to a younger audience but for me it was quite a disappointment.', '0000-00-00 00:00:00', 'js@hotmail.com'),
(2, 2, 'Adventure', 4, 'The story is fast moving and compelling. The characters are well developed and as a reader I became quite invested in their personal stories. Whilst the book took quite a while to read, the journey was worthwhile. The Physics underlying the novel has been well researched and this helps to make the story both interesting and believable.', '0000-00-00 00:00:00', 'TT@hotmail.com'),
(3, 0, 'Humour', 5, 'Don\'t Make me Think is a fun, practical book that describes the need for frequent, informal testing to ensure that an interface (such as a website) is easy to use. The book\'s informal style is appealing and whilst some of the material is out of date, most of the information easy to understand and implement.  This is a \'must read\' for anyone involved with the design or development of websites / interfaces.', '0000-00-00 00:00:00', 'TT@hotmail.com'),
(25, 5, 'Humour', 1, 'fsfsf', '2019-08-20 11:02:53', 'm.cameron@tgs.school.nz'),
(26, 6, 'Humour', 1, 'ok', '2019-08-20 11:05:49', 'm.cameron@tgs.school.nz'),
(27, 7, 'Humour', 1, 'sfsdfsf', '2019-08-20 11:07:17', 'm.cameron@tgs.school.nz'),
(28, 8, 'Crime', 1, 'fdsfsdfsdfsdf', '2019-08-20 11:09:49', 'm.cameron@tgs.school.nz'),
(29, 8, 'Adventure', 1, 'sfaewrewrwrwr', '2019-08-20 11:10:27', 'm.cameron@tgs.school.nz'),
(30, 9, 'Adventure', 3, 'rwrwrrrwr', '2019-08-20 11:34:32', 'm.cameron@tgs.school.nz'),
(31, 1, 'Humour', 3, 'sdfsdfs', '2019-08-27 22:10:51', 'm.cameron@tgs.school.nz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`Author_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ID`),
  ADD KEY `Book_Author_ID` (`Book_Author_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `Reviews_Book_ID` (`Review_Book_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `Author_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
