-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 07:02 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Username`, `Password`) VALUES
(156712, 'dileep', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `Candidate_id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Mobile_no` varchar(12) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Admin_id` int(11) NOT NULL DEFAULT '1234',
  `Position` varchar(30) NOT NULL,
  `Candidate_cvote` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`Candidate_id`, `Username`, `Address`, `Mobile_no`, `Gender`, `Admin_id`, `Position`, `Candidate_cvote`) VALUES
(10001, 'Amit Singh', 'mumbai', '1111111111', 'Male', 1234, 'chairman', 0),
(1002, 'Deepak Maurya', 'varanasi', '1234567891', 'Male', 1234, 'chairman', 2),
(1003, 'Vinay Maurya', 'varanasi', '1234566789', 'Male', 1234, 'Member', 1),
(1004, 'abhishek singh', 'varanasi', '1234567890', 'Male', 1234, 'Member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `Election_Id` int(11) NOT NULL,
  `Election_Desc` varchar(50) NOT NULL,
  `End_Date` date NOT NULL,
  `Position` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`Election_Id`, `Election_Desc`, `End_Date`, `Position`) VALUES
(10001, 'election for chairman', '2018-03-25', 'chairman'),
(10002, 'election for member', '2018-03-26', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position`) VALUES
(102, 'chairman'),
(101, 'Vice-Chairman'),
(103, 'Secretary'),
(104, 'Vice-Secretary'),
(105, 'Member'),
(106, 'Class_Cr'),
(107, 'Organising_Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `Voter_id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Admin_id` int(11) NOT NULL DEFAULT '1234',
  `voted_position` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`Voter_id`, `Username`, `Password`, `Admin_id`, `voted_position`) VALUES
(107341, 'anurag tiwari', '12345', 1234, NULL),
(107339, ' dileep maurya', '1234', 1234, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voter_candidate`
--

CREATE TABLE `voter_candidate` (
  `vote_cand_id` int(11) NOT NULL,
  `Voter_id` int(11) NOT NULL,
  `Candidate_id` int(11) NOT NULL,
  `Position` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter_candidate`
--

INSERT INTO `voter_candidate` (`vote_cand_id`, `Voter_id`, `Candidate_id`, `Position`) VALUES
(148, 107339, 1003, 'Member'),
(147, 107339, 1002, 'chairman'),
(146, 107341, 1004, 'Member'),
(144, 1234, 2, 'class'),
(145, 107341, 1002, 'chairman'),
(100, 100000000, 100000000, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `voter_id`
--

CREATE TABLE `voter_id` (
  `Voter_Id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voter_id`
--

INSERT INTO `voter_id` (`Voter_Id`) VALUES
(7338),
(107339),
(107341),
(107342),
(107343),
(107344),
(107345),
(107346),
(107347),
(107348),
(107350),
(107351),
(107352),
(107354),
(107355),
(107356),
(107357),
(107359),
(107361),
(107362),
(107364),
(107366),
(107367),
(107369),
(107370),
(107372),
(114899),
(114900),
(114901),
(114902),
(114903),
(114904),
(114905),
(114907),
(114909),
(114910),
(114912),
(114914),
(114917),
(114922),
(114925),
(114926),
(114929),
(114931),
(114932),
(114933),
(114934),
(114935),
(114937),
(114938),
(114939),
(114940),
(114941),
(114943),
(123065),
(123066),
(123072),
(123073),
(123074),
(123076),
(123078),
(123081),
(123082),
(123083),
(123084),
(123086),
(123088),
(123089),
(123091),
(123095),
(123096),
(123097),
(123101),
(123104),
(123106),
(123107),
(123110),
(123111),
(123112),
(123113),
(123114),
(131562),
(131563),
(131564),
(131566),
(131569),
(131570),
(131571),
(131573),
(131575),
(131576),
(131577),
(131579),
(131581),
(131583),
(131584),
(131585),
(131587),
(131588),
(131589),
(131592),
(131595),
(131597),
(131599),
(131600),
(131604),
(131605),
(131606),
(139263),
(139265),
(139266),
(139268),
(139269),
(139271),
(139273),
(139274),
(139275),
(139277),
(139278),
(139279),
(139280),
(139282),
(139283),
(139285),
(139287),
(139288),
(139289),
(139290),
(139293),
(139294),
(139295),
(139296),
(139297),
(139298),
(139299),
(146260),
(146262),
(146263),
(146264),
(146265),
(146266),
(146268),
(146271),
(146272),
(146273),
(146274),
(146279),
(146282),
(146283),
(146284);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`Candidate_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`Election_Id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`Voter_id`),
  ADD KEY `Admin_id` (`Admin_id`);

--
-- Indexes for table `voter_candidate`
--
ALTER TABLE `voter_candidate`
  ADD PRIMARY KEY (`vote_cand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `voter_candidate`
--
ALTER TABLE `voter_candidate`
  MODIFY `vote_cand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
