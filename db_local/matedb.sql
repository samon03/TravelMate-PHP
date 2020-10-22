-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 04:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_post`
--

CREATE TABLE `create_post` (
  `Cpost_ID` int(11) NOT NULL,
  `Cuser` varchar(255) NOT NULL,
  `Cpost_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Upload_Img` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Total_Budget` int(11) NOT NULL,
  `Vehical` varchar(100) NOT NULL,
  `Pick_Point` varchar(255) NOT NULL,
  `Members` int(11) NOT NULL,
  `Travel_Place` varchar(255) NOT NULL,
  `Current_Location` varchar(255) NOT NULL,
  `Plan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_post`
--

INSERT INTO `create_post` (`Cpost_ID`, `Cuser`, `Cpost_Time`, `Upload_Img`, `Title`, `Start_Date`, `End_Date`, `Total_Budget`, `Vehical`, `Pick_Point`, `Members`, `Travel_Place`, `Current_Location`, `Plan`) VALUES
(1, 'samon@gmail.com', '0000-00-00 00:00:00', 'templeBandarban.jpg', 'Lets go to Bandarban', '2019-05-07', '2018-01-16', 10000, 'bus', 'Motijheel', 5, 'Bandarban', 'Dhaka', 'Bandarban, is a district in South-Eastern Bangladesh, and a part of the Chittagong Division. It is one of the three hill districts of Bangladesh and a part of the Chittagong Hill Tracts, the others being Rangamati District and Khagrachhari District. Bandarban city is the headquarter of the Bandarban district.'),
(2, 'emon@gmail.com', '0000-00-00 00:00:00', 'khag.jpg', 'Lets chill in Sundarban', '2019-05-21', '2018-01-16', 20000, 'Train', 'Jatrabari', 5, 'Sundarban', 'Dhaka', 'The Sundarbans is a mangrove area in the delta formed by the confluence of Ganges, Brahmaputra and Meghna Rivers in the Bay of Bengal. It spans from the Hooghly River in India\'s state of West Bengal to the Baleswar River in Bangladesh.'),
(3, 'saher@gmail.com', '0000-00-00 00:00:00', 'SajekRangamati.jpg', 'Sajek a jabo', '2019-04-27', '2018-01-16', 15000, 'bus', 'Gulistan', 5, 'Sajek', 'Dhaka', ' Sajek is a nice place which is called cloudy town it is really beautiful to look at and feel pease '),
(5, 'emon@gmail.com', '2019-07-09 14:21:23', 'sss.jpg', 'Sundorban jabo', '2019-07-16', '2019-07-30', 10000, 'Bus', 'Gulistan', 5, 'Sundarban', 'Dhaka', 'The Sundarbans is a mangrove area in the delta formed by the confluence of Ganges, Brahmaputra and Meghna Rivers in the Bay of Bengal.'),
(7, 'samon@gmail.com', '2019-07-09 14:16:03', '', 'Hello', '2019-07-09', '2019-07-09', 10000, 'Bus', 'Gulistan', 5, 'Sunbarban', 'Dhaka', 'Hellow everyone If you are planning to visit Saint Martin Islands Bangladesh. Here you will get here Travel Guide, Pictures, Hotel List & everything you need.'),
(80, 'emon@gmail.com', '2019-07-09 14:53:49', 'sm.JPG', 'cxvxcvx', '2019-07-16', '2019-07-30', 50000, 'Train', 'Motijheel', 5, 'Saint Martins', 'Dhaka', ' hye ja bhai :( '),
(81, 'emon@gmail.com', '2019-07-09 14:55:08', '', 'Chill krbo, moja krbo ;)', '2019-07-23', '2019-07-30', 90000, 'Bus', 'Motijheel', 5, 'Sylhet', 'Dhaka', ' Allah e jane ki vbe ki hoitese :( '),
(86, 'spixel559@gmail.com', '2019-07-16 14:01:26', 'sm.JPG', 'Cholo sajek jai ', '2019-07-23', '2019-08-07', 30000, 'Bus', 'Gulistan', 10, 'Sajek Valley', 'Dhaka', ' Sajek is a nice place which is called cloudy town it is really beautiful to look at and feel pease '),
(88, 'badsha0716@gmail.com', '2019-07-18 19:32:01', 'sm.JPG', 'Sundorban jabo', '2019-08-01', '2019-09-07', 12000, 'Train', 'Saydabad', 5, 'Sundarban', 'Dhaka', 'The Sundarbans is a mangrove area in the delta formed by the confluence of Ganges, Brahmaputra and Meghna Rivers in the Bay of Bengal.');

-- --------------------------------------------------------

--
-- Table structure for table `group_info`
--

CREATE TABLE `group_info` (
  `SL` int(11) NOT NULL,
  `Group_ID` int(11) NOT NULL,
  `Joined_Member` varchar(255) NOT NULL,
  `Joined_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_info`
--

INSERT INTO `group_info` (`SL`, `Group_ID`, `Joined_Member`, `Joined_Time`) VALUES
(61, 76, 'emon@gmail.com', '2019-06-30 00:10:00'),
(62, 76, 'emon@gmail.com', '2019-07-09 13:41:45'),
(63, 76, 'emon@gmail.com', '2019-07-09 13:42:52'),
(64, 76, 'emon@gmail.com', '2019-07-09 13:44:19'),
(65, 76, 'emon@gmail.com', '2019-07-09 13:47:48'),
(66, 76, 'emon@gmail.com', '2019-07-09 14:05:14'),
(67, 76, 'emon@gmail.com', '2019-07-09 14:06:30'),
(68, 78, 'emon@gmail.com', '2019-07-09 14:17:50'),
(69, 79, 'emon@gmail.com', '2019-07-09 14:21:23'),
(70, 80, 'emon@gmail.com', '2019-07-09 14:53:49'),
(71, 81, 'emon@gmail.com', '2019-07-09 14:55:08'),
(72, 82, 'emon@gmail.com', '2019-07-09 15:04:50'),
(73, 83, 'emon@gmail.com', '2019-07-09 16:20:03'),
(74, 84, 'emon@gmail.com', '2019-07-09 16:22:30'),
(75, 85, 'emon@gmail.com', '2019-07-09 16:22:50'),
(77, 87, 'emon@gmail.com', '2019-07-10 11:43:45'),
(78, 88, 'emon@gmail.com', '2019-07-10 12:57:17'),
(79, 86, 'spixel559@gmail.com', '2019-07-16 14:01:26'),
(80, 86, 'samon0025@gmail.com', '2019-07-16 20:31:55'),
(81, 0, 'badsha0716@gmail.com', '2019-07-18 19:30:09'),
(82, 87, 'badsha0716@gmail.com', '2019-07-18 19:30:56'),
(83, 88, 'badsha0716@gmail.com', '2019-07-18 19:32:01'),
(84, 89, 'badsha0716@gmail.com', '2019-07-18 19:57:14'),
(85, 89, 'badsha0716@gmail.com', '2019-07-18 20:15:49'),
(86, 90, 'badsha0716@gmail.com', '2019-07-18 20:16:32'),
(87, 91, 'badsha0716@gmail.com', '2019-07-18 20:16:55'),
(88, 92, 'badsha0716@gmail.com', '2019-07-18 20:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `message_box`
--

CREATE TABLE `message_box` (
  `Group_ID` int(11) NOT NULL,
  `Message_ID` int(11) NOT NULL,
  `Messager` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `Message_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_box`
--

INSERT INTO `message_box` (`Group_ID`, `Message_ID`, `Messager`, `Message`, `Message_Time`) VALUES
(0, 1, 'Samon', 'Hey', '2018-12-25 07:52:50'),
(0, 2, 'Samon', 'hlw', '2018-12-25 11:47:10'),
(14, 3, 'Emon', 'Hola', '2018-12-25 13:23:23'),
(0, 4, 'Emon', 'dfsdfd', '2018-12-25 13:28:47'),
(0, 5, 'Emon', 'sdsds', '2018-12-25 13:30:19'),
(2, 6, 'Emon', 'talk plz', '2018-12-25 13:33:23'),
(2, 7, 'Ony', 'hola ;p ', '2018-12-25 13:46:44'),
(0, 8, 'Ony', 'cholo na gure aschi ojanate ... ', '2018-12-25 13:54:02'),
(0, 9, 'Ony', 'oops ', '2018-12-25 14:01:18'),
(0, 10, 'Ony', 'is anyone there? ', '2018-12-25 14:07:03'),
(0, 11, 'Emon', 'yes i m here', '2018-12-25 14:17:22'),
(0, 12, 'Emon', 'hola guys!', '2018-12-25 16:18:44'),
(2, 13, 'Ony', 'ki re emon', '2018-12-25 16:46:06'),
(0, 14, 'Emon', 'Test', '2018-12-26 07:36:43'),
(0, 16, 'Emon', 'Bla bla ', '2018-12-26 07:37:05'),
(0, 17, 'Ony', 'sdcsdfvsdv', '2018-12-28 16:49:03'),
(15, 18, 'Ony', 'anyone there?', '2018-12-28 16:50:06'),
(0, 19, 'Emon', 'yep i m ', '2018-12-29 20:22:04'),
(0, 20, 'Emon', 'hello', '2018-12-30 19:53:59'),
(0, 21, 'Emon', 'hey', '2018-12-30 19:55:50'),
(15, 22, 'Ony', 'bhai taka ta ki vbe niben?', '2018-12-30 20:24:07'),
(0, 23, 'Ony', 'kothon jaben?', '2018-12-30 20:26:29'),
(0, 24, 'Emon', 'bkash kre dile e hbe ', '2018-12-30 20:29:22'),
(0, 25, 'Emon', 'djsdbf', '2018-12-30 20:31:31'),
(0, 26, 'Emon', 'sdfmnj', '2018-12-30 20:32:31'),
(0, 27, 'Ony', 'hay re allah ', '2018-12-30 20:47:08'),
(0, 28, 'Samon', 'kono lav nai re', '2018-12-30 22:09:51'),
(0, 29, 'Emon', 'Ache Ache ', '2018-12-31 06:23:10'),
(0, 30, 'Emon', 'hbe hbe ', '2018-12-31 06:36:49'),
(0, 31, 'Emon', 'r koto r koto? ', '2018-12-31 06:38:33'),
(0, 32, 'Emon', 'jjjj', '2018-12-31 06:47:05'),
(0, 33, 'Emon', 'jhbjhbhbbhnbhbb', '2018-12-31 06:51:54'),
(14, 34, 'Emon', 'Test test', '2018-12-31 07:05:04'),
(15, 35, 'Samon', 'hello ', '2018-12-31 07:46:45'),
(15, 36, 'Samon', 'hhh', '2018-12-31 08:12:58'),
(15, 37, 'Samon', 'is anyone there?', '2018-12-31 08:21:13'),
(15, 38, 'Samon', 'vdvdf', '2018-12-31 08:32:49'),
(2, 39, 'Emon', 'hello ', '2018-12-31 08:33:54'),
(18, 41, 'Saher Uddin', 'anyone there? ', '2018-12-31 08:44:17'),
(15, 43, 'Ony', 'yep', '2018-12-31 09:00:32'),
(12, 44, 'Ony', 'hola', '2018-12-31 11:02:13'),
(12, 45, 'Ony', 'holl', '2018-12-31 11:02:21'),
(19, 46, 'Ony', 'hello', '2018-12-31 12:55:21'),
(19, 50, 'Ony', 'sdfbdsvb', '2018-12-31 13:05:43'),
(2, 53, 'Emon', 'anypone here', '2018-12-31 13:09:45'),
(2, 54, 'Emon', 'happy new year', '2018-12-31 13:10:04'),
(2, 55, 'Ony', 'happy new year :) ', '2018-12-31 13:10:46'),
(2, 56, 'Samon', 'happy new year guys ;)', '2018-12-31 13:11:49'),
(2, 59, 'Samon', 'so whats the plan?', '2018-12-31 13:17:43'),
(2, 60, 'Samon', 'so whats the plan?', '2018-12-31 13:17:52'),
(2, 61, 'Samon', 'blo kii korba?', '2018-12-31 13:20:51'),
(2, 62, 'Samon', 'hmm?', '2018-12-31 13:21:08'),
(2, 63, 'Samon', 'ki hocche :( ', '2018-12-31 13:24:58'),
(2, 64, 'Samon', 'bujhtesi na :( ', '2018-12-31 13:25:38'),
(2, 65, 'Samon', 'gdfbgf', '2018-12-31 13:37:53'),
(2, 66, 'Samon', 'cxzc', '2018-12-31 13:38:02'),
(20, 67, 'Ony', 'hellw', '2018-12-31 13:43:26'),
(20, 68, 'Samon', 'hmm?', '2018-12-31 13:44:06'),
(20, 69, 'Samon', 'hey', '2018-12-31 13:44:43'),
(20, 70, 'Ony', 'ki obbostha? ', '2018-12-31 13:46:38'),
(20, 71, 'Emon', 'vlo apnar? ', '2018-12-31 13:49:50'),
(20, 72, 'Ony', 'aito acha ki vbe jaba? ', '2018-12-31 13:50:12'),
(20, 73, 'Emon', 'bhai mne hoy na aro 7 jon paba', '2018-12-31 13:51:55'),
(20, 74, 'Samon', '6 jon ;p ', '2018-12-31 13:52:41'),
(20, 75, 'Emon', 'haha ;p lets see', '2018-12-31 13:53:05'),
(20, 76, 'Samon', 'yeah!', '2018-12-31 13:58:09'),
(20, 77, 'Samon', 'svdsvd', '2018-12-31 13:58:15'),
(20, 78, 'Samon', 'r baki ra kothay?', '2018-12-31 13:58:37'),
(20, 79, 'Emon', 'ki jani', '2018-12-31 14:00:06'),
(20, 80, 'Samon', 'saint martin a toh khub thanda akn ', '2018-12-31 14:04:31'),
(20, 81, 'Emon', 'tai ble e toh jacchi amra', '2018-12-31 14:04:46'),
(20, 82, 'Emon', 'ki jni?', '2018-12-31 15:40:09'),
(2, 83, 'Emon', 'ki', '2018-12-31 15:43:11'),
(20, 84, 'Samon', 'mane? :/ ', '2018-12-31 15:44:38'),
(20, 85, 'Emon', 'na kisu na ', '2018-12-31 15:45:14'),
(10, 86, 'Emon', 'hello', '2018-12-31 16:10:05'),
(19, 87, 'Emon', 'nmvcx', '2018-12-31 16:10:51'),
(2, 88, 'Samon', 'haa', '2018-12-31 16:17:31'),
(19, 89, 'Emon', 'mcxvxn', '2018-12-31 16:18:44'),
(2, 90, 'Samon', 'ki koi acho', '2018-12-31 16:19:11'),
(2, 91, 'Samon', 'basay na', '2018-12-31 16:19:33'),
(2, 92, 'Emon', 'na', '2018-12-31 16:20:24'),
(2, 93, 'Samon', 'thle? ', '2018-12-31 16:24:22'),
(2, 94, 'Samon', 'thle? ', '2018-12-31 16:24:30'),
(2, 95, 'Emon', 's,mdfnbdndsma,', '2018-12-31 16:27:45'),
(2, 96, 'Emon', 'sylhet a ', '2018-12-31 16:28:23'),
(2, 97, 'Emon', 'cnxbcnxm,mxzcn ', '2018-12-31 16:28:30'),
(2, 98, 'Samon', 'time lage ', '2018-12-31 16:30:03'),
(2, 99, 'Emon', 'na toh', '2018-12-31 16:30:38'),
(2, 100, 'Samon', 'abr dekhoto ? ', '2018-12-31 16:31:23'),
(2, 101, 'Emon', 'ki j kri ', '2018-12-31 16:31:44'),
(20, 102, 'Samon', 'ki', '2018-12-31 16:50:53'),
(20, 103, 'Samon', 'askdjznsmasnnz,>', '2018-12-31 16:52:18'),
(20, 104, 'Samon', 'xmzcnnmzxmc', '2018-12-31 16:52:54'),
(2, 105, 'Samon', 'ki ? ', '2018-12-31 19:01:18'),
(2, 106, 'Emon', 'mnbmn', '2018-12-31 19:09:36'),
(2, 107, 'Samon', 'mnbn', '2018-12-31 19:09:50'),
(19, 108, 'Emon', 'hello ', '2018-12-31 19:33:13'),
(19, 109, 'Emon', 'hello ', '2018-12-31 19:33:13'),
(19, 110, 'Samon', 'hbe? :( ', '2018-12-31 19:35:56'),
(19, 111, 'Samon', 'hmm? ', '2018-12-31 19:36:41'),
(19, 112, 'Emon', 'ki jani ', '2018-12-31 19:40:30'),
(19, 113, 'Samon', 'hay re', '2018-12-31 19:40:43'),
(19, 114, 'Emon', 'ki ki ', '2018-12-31 19:41:16'),
(19, 115, 'Emon', 'hello', '2018-12-31 19:42:38'),
(19, 116, 'Emon', 'Bal sal', '2018-12-31 19:44:53'),
(20, 117, 'Samon', 'hola   kdjfbf', '2018-12-31 19:46:23'),
(20, 118, 'Samon', 'aje baje ', '2018-12-31 19:47:38'),
(20, 119, 'Samon', 'ki jinish ata ? ', '2018-12-31 19:49:16'),
(20, 120, 'Samon', 'kaha ho tum ? ', '2018-12-31 19:55:33'),
(20, 121, 'Samon', 'ki jni ', '2018-12-31 20:10:45'),
(20, 122, 'Ony', 'hello ', '2018-12-31 20:30:56'),
(20, 123, 'Ony', 'hhhhh', '2018-12-31 20:31:05'),
(20, 124, 'Samon', 'abr ki ', '2018-12-31 21:07:40'),
(20, 125, 'Samon', 'koto kisu ', '2019-01-01 05:50:04'),
(20, 126, 'Shiliya', 'hello', '2019-01-01 06:46:58'),
(20, 127, 'Shiliya', 'cncnzxcnx', '2019-01-01 06:47:09'),
(21, 128, 'Emon', 'hlw', '2019-04-05 11:24:13'),
(21, 129, 'Emon', 'hii', '2019-05-24 13:24:06'),
(24, 130, 'Emon', 'hlw', '2019-05-24 19:24:51'),
(59, 131, 'Emon', 'hello', '2019-05-29 14:12:22'),
(62, 132, 'Sara', 'hey anyone there', '2019-05-29 17:49:41'),
(74, 133, 'Sara', 'Hola!', '2019-06-02 17:45:54'),
(74, 134, 'Sara', 'xz,xzm', '2019-06-02 17:46:06'),
(74, 135, 'Ony', 'hlw', '2019-06-02 18:15:02'),
(74, 136, 'Ony', 'xvxcvcxv', '2019-06-02 18:15:27'),
(74, 137, 'Ony', 'mnbvbnm', '2019-06-02 18:15:36'),
(74, 138, 'Ony', 'keo aso? ', '2019-06-02 18:36:28'),
(75, 139, 'Ony', 'welcome guys!', '2019-06-03 12:37:57'),
(87, 140, 'Emon', 'hello', '2019-07-10 08:04:41'),
(87, 141, 'Emon', 'ndncxcvn', '2019-07-10 08:04:47'),
(87, 142, 'Emon', 'hahaha ', '2019-07-10 08:14:58'),
(88, 143, 'Badsha', 'hiiiiii', '2019-07-18 13:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `Cpost_ID` int(11) NOT NULL,
  `Gcomment_ID` int(11) NOT NULL,
  `Gparent_ID` int(11) NOT NULL,
  `Group_Commentor` varchar(255) NOT NULL,
  `Group_Comment` text NOT NULL,
  `Gcomment_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`Cpost_ID`, `Gcomment_ID`, `Gparent_ID`, `Group_Commentor`, `Group_Comment`, `Gcomment_Time`) VALUES
(9, 23, 0, 'samon@gmail.com', 'Osmani Museum a jaben? ', '2018-12-28 21:58:40'),
(9, 24, 0, 'emon@gmail.com', 'Hey', '2018-12-28 22:01:40'),
(13, 25, 0, 'emon@gmail.com', 'Hiron Point gurte jaben? ', '2018-12-28 22:25:55'),
(17, 26, 0, '', 'ytygg', '2018-12-30 21:36:16'),
(17, 27, 0, 'samon@gmail.com', 'is there any possibality to add me in the group?', '2018-12-31 04:20:33'),
(12, 29, 0, 'ony@gmail.com', 'hello ', '2018-12-31 15:23:55'),
(18, 30, 0, 'ony@gmail.com', 'keo intrested?', '2018-12-31 17:24:30'),
(18, 32, 0, 'emon@gmail.com', 'haa ami', '2018-12-31 20:20:11'),
(20, 33, 0, 'emon@gmail.com', 'hey', '2018-12-31 20:22:52'),
(21, 34, 0, 'shiliya@gmail.com', 'hola', '2019-01-01 12:46:35'),
(19, 35, 0, 'samon@gmail.com', 'hello', '2019-01-01 13:13:13'),
(21, 36, 0, 'emon@gmail.com', 'hlw', '2019-04-05 17:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `Reply_ID` int(11) NOT NULL,
  `Reply_User` varchar(255) NOT NULL,
  `Reply_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Comment_No` int(11) NOT NULL,
  `Reply_Details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `review_comment`
--

CREATE TABLE `review_comment` (
  `Review_ID` int(11) NOT NULL,
  `Comment_ID` int(11) NOT NULL,
  `Parent_ID` int(11) NOT NULL,
  `Commentor` varchar(255) NOT NULL,
  `Comment` text NOT NULL,
  `Comment_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_comment`
--

INSERT INTO `review_comment` (`Review_ID`, `Comment_ID`, `Parent_ID`, `Commentor`, `Comment`, `Comment_Time`) VALUES
(15, 1, 0, 'Emon', 'Hey', '2018-12-27 11:26:15'),
(15, 2, 1, 'Samon', 'Hola', '2018-12-27 11:43:02'),
(14, 13, 0, 'emon@gmail.com', 'TTTT', '2018-12-27 21:44:37'),
(14, 15, 0, 'emon@gmail.com', 'Hola guys!', '2018-12-27 21:48:47'),
(12, 16, 0, 'ony@gmail.com', 'how was the river part?', '2018-12-28 23:19:14'),
(26, 17, 0, 'emon@gmail.com', 'hello', '2018-12-30 01:33:03'),
(28, 18, 0, 'emon@gmail.com', 'zcxcvnx', '2018-12-31 20:37:07'),
(28, 19, 0, 'emon@gmail.com', 'hola', '2018-12-31 20:37:36'),
(28, 20, 0, 'emon@gmail.com', 'hii', '2018-12-31 20:37:51'),
(28, 21, 0, 'emon@gmail.com', 'ki krbo :/ ', '2018-12-31 20:51:12'),
(28, 22, 0, 'samon@gmail.com', 'onkk kisu e ache korar ;p ', '2018-12-31 20:54:41'),
(28, 23, 0, 'emon@gmail.com', 'hmm?', '2018-12-31 20:56:02'),
(31, 24, 0, 'emon@gmail.com', 'hello', '2019-05-29 20:07:53'),
(35, 25, 0, 'emon@gmail.com', 'ki :/ ', '2019-07-10 14:02:59'),
(35, 26, 0, 'emon@gmail.com', 'asole :o ', '2019-07-10 14:13:41'),
(35, 27, 0, 'ony@gmail.com', 'hay re ', '2019-07-10 14:21:21'),
(36, 28, 0, 'badsha0716@gmail.com', 'nice  one  bro', '2019-07-18 19:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `review_post`
--

CREATE TABLE `review_post` (
  `Review_ID` int(11) NOT NULL,
  `Review_Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Reviewer` varchar(255) NOT NULL,
  `Review_Image` varchar(255) NOT NULL,
  `Review_Title` varchar(255) NOT NULL,
  `Traveled` varchar(255) NOT NULL,
  `Experience` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_post`
--

INSERT INTO `review_post` (`Review_ID`, `Review_Time`, `Reviewer`, `Review_Image`, `Review_Title`, `Traveled`, `Experience`) VALUES
(26, '2018-12-30 00:58:31', 'emon@gmail.com', 'nilBandarban.jpg', 'What a Journey!', 'Sundarban', ' some thing is beyond expectation '),
(27, '2018-12-30 02:09:32', 'emon@gmail.com', 'bandarban.jpg', 'The Sajek Journey', 'Sajek', 'Its really amazing being there , its feel like i m in sajek or sajek in me what a awesome feelings was that i can still feel it .'),
(28, '2018-12-31 18:17:28', 'emon@gmail.com', 'St._Martin.jpg', 'Himchori Waterfall', 'Himchori ', ' What a rainfall its nice to see and feeling amazing '),
(29, '2019-05-24 19:51:52', 'sara@gmail.com', 'bandarban.jpg', 'Bandarban ar sei trip ta ;p ', 'Bandarban', ' Osthir akta place \r\n'),
(31, '2019-05-27 23:18:23', 'emon@gmail.com', 'bandarban.jpg', 'Enjoyable bandarban Journey!', 'Bandarban', ' Bole ses kra jabe na koto ta e na sundor chilo, osthir chilo trip ta jara akno jay naii tara akbar gure asun lyf k love kra sikhe jaben'),
(34, '2019-07-09 14:22:46', 'emon@gmail.com', 'sss.jpg', 'Sundarban joss ', 'Sundarban', ' life a jara sekhne jay nai tara ki j miss krse seta tara nije ra o jane na '),
(35, '2019-07-09 16:30:52', 'emon@gmail.com', 'sm.JPG', 'Saint martins atto joss', 'Saint Martins', ' life a jara sekhne jay nai tara ki j miss krse seta tara nije ra o jane na '),
(36, '2019-07-18 19:37:02', 'badsha0716@gmail.com', 'sm.JPG', 'ami ai gia chilam', 'Sundarban', ' The Sundarbans is a mangrove area in the delta formed by the confluence of Ganges.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `User_Img` varchar(255) NOT NULL,
  `Last_Loggedin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Name`, `Email`, `Phone`, `Password`, `User_Img`, `Last_Loggedin`) VALUES
(1, 'Ony', 'ony@gmail.com', '01917031210', 'e10adc3949ba59abbe56e057f20f883e', 'avatar2.png', '2019-07-10 14:20:58'),
(2, 'Sara', 'sara@gmail.com', '1917031210', '5bd537fc3789b5482e4936968f0fde95', 'Bubbles.jpg', '2019-06-03 00:08:09'),
(3, 'Emon', 'emon@gmail.com', '01819533402', 'e10adc3949ba59abbe56e057f20f883e', 'img1532330244994.jpg', '2019-07-16 13:22:43'),
(5, 'Saher Uddin', 'saher@gmail.com', '01819533402', 'e10adc3949ba59abbe56e057f20f883e', 'avatar4.png', '0000-00-00 00:00:00'),
(35, 'Samon', 'samon0025@gmail.com', '1234', 'd8393cb052fc43d89edac3995023c345', '', '2019-07-16 20:38:06'),
(37, 'Shiliya', 'shiliya36@gmail.com', '1752064125', 'a039d2267f3c096038c34a1e345d70f3', '', '2019-07-16 13:42:14'),
(38, 'samon pixel', 'spixel559@gmail.com', '1917031210', 'd8393cb052fc43d89edac3995023c345', 'img1541863728681121.jpg', '2019-07-16 13:58:56'),
(39, 'Badsha', 'badsha0716@gmail.com', '1534532716', 'e10adc3949ba59abbe56e057f20f883e', '31522348_2447615218789320_4484465578131587072_n.jpg', '2019-07-18 19:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `User_Id` varchar(255) NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `Verified` int(11) NOT NULL,
  `Create_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`User_Id`, `OTP`, `Verified`, `Create_Time`) VALUES
('badsha0716@gmail.com', '611115', 1, '2019-07-18 13:15:57'),
('samon0025@gmail.com', '622850', 1, '2019-07-13 11:48:48'),
('shiliya36@gmail.com', '788674', 1, '2019-07-13 11:52:16'),
('spixel559@gmail.com', '231173', 1, '2019-07-16 07:58:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_post`
--
ALTER TABLE `create_post`
  ADD PRIMARY KEY (`Cpost_ID`);

--
-- Indexes for table `group_info`
--
ALTER TABLE `group_info`
  ADD PRIMARY KEY (`SL`);

--
-- Indexes for table `message_box`
--
ALTER TABLE `message_box`
  ADD PRIMARY KEY (`Message_ID`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`Gcomment_ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`Reply_ID`);

--
-- Indexes for table `review_comment`
--
ALTER TABLE `review_comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `Review_ID` (`Review_ID`);

--
-- Indexes for table `review_post`
--
ALTER TABLE `review_post`
  ADD PRIMARY KEY (`Review_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_post`
--
ALTER TABLE `create_post`
  MODIFY `Cpost_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `group_info`
--
ALTER TABLE `group_info`
  MODIFY `SL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `message_box`
--
ALTER TABLE `message_box`
  MODIFY `Message_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `Gcomment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `Reply_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_comment`
--
ALTER TABLE `review_comment`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `review_post`
--
ALTER TABLE `review_post`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
