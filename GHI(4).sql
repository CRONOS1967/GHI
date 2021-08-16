-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2021 at 06:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GHI`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `idC` varchar(45) NOT NULL,
  `DOB` date NOT NULL,
  `Job` varchar(45) DEFAULT NULL,
  `Emcontact` int(40) DEFAULT NULL,
  `NumOfFam` int(11) NOT NULL,
  `DateOfReg` date NOT NULL,
  `idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`idC`, `DOB`, `Job`, `Emcontact`, `NumOfFam`, `DateOfReg`, `idUsers`) VALUES
('CU17', '2020-06-03', 'Teacher', 987654321, 3, '2021-07-26', 17),
('CU35', '1983-04-23', 'worker', 987654321, 2, '2021-07-22', 35);

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `idE` varchar(45) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `Status` varchar(45) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`idE`, `idUsers`, `Status`) VALUES
('E19', 19, 'active'),
('E2', 2, 'active'),
('E21', 21, 'active'),
('E23', 23, 'active'),
('E26', 26, 'active'),
('E27', 27, 'active'),
('E28', 28, 'active'),
('E3', 3, 'disable'),
('E36', 36, 'active'),
('E37', 37, 'active'),
('E38', 38, 'disable'),
('E39', 39, 'disable'),
('E40', 40, 'disable'),
('E5', 5, 'active'),
('E6', 6, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `Families`
--

CREATE TABLE `Families` (
  `idFamilies` int(11) NOT NULL,
  `FName` varchar(45) NOT NULL,
  `LName` varchar(45) NOT NULL,
  `idC` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Families`
--

INSERT INTO `Families` (`idFamilies`, `FName`, `LName`, `idC`) VALUES
(1, 'Addis', 'Alemu', 'CU17'),
(2, 'Mulu', 'Wase', 'CU17'),
(4, 'Ayele', 'Mola', 'CU35'),
(5, 'fasil', 'Demesse', 'CU35');

-- --------------------------------------------------------

--
-- Table structure for table `Feedbacks`
--

CREATE TABLE `Feedbacks` (
  `idFeedbacks` int(11) NOT NULL,
  `Fdetail` varchar(8000) NOT NULL,
  `Sendby` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Feedbacks`
--

INSERT INTO `Feedbacks` (`idFeedbacks`, `Fdetail`, `Sendby`) VALUES
(1, 'this the first try', 'Addis.Ale'),
(2, 'this has been good so far', 'Abye.Ahm');

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `idN` int(11) NOT NULL,
  `Ntitle` varchar(255) NOT NULL,
  `Ndetail` varchar(8000) NOT NULL,
  `Dofp` datetime NOT NULL DEFAULT current_timestamp(),
  `postedBy` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`idN`, `Ntitle`, `Ndetail`, `Dofp`, `postedBy`) VALUES
(1, 'THE FIRST POST', 'hello world again', '2006-07-21 00:00:00', 'E2'),
(2, 'Gech Has Done it Again', 'On Recent events Gech ahs doen it..........', '2009-07-21 00:00:00', 'E2'),
(3, 'Third attempt', 'this is 3rd time to see if time works,and to see if time update works', '2021-07-11 06:54:39', 'E2'),
(4, 'abcd', 'abcdefgh', '2021-07-09 00:00:00', 'E2'),
(5, 'the 7th attemot', 'asdasdsda im still tird', '2021-07-09 00:00:00', 'E2'),
(6, '8th attept ', 'the is with hope pls work', '2021-07-09 17:19:41', 'E2'),
(7, '9th attept', 'this is for trying to cestomise the time', '2021-07-09 05:21:19', 'E2'),
(8, 'last work on news', 'this is has been a nightmare', '2021-07-09 05:27:26', 'E2'),
(9, 'This is for Bini', 'Trying to show hw to works', '2021-07-12 06:47:24', 'E2'),
(10, 'Insurance news', 'This news board', '2021-07-25 07:06:08', 'E2'),
(11, 'This is NEWS', 'information boadr', '2021-07-25 07:30:11', 'E2');

-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--

CREATE TABLE `Patients` (
  `idPatients` int(11) NOT NULL,
  `idC` varchar(45) NOT NULL,
  `Date` datetime DEFAULT current_timestamp(),
  `idSproviders` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patients`
--

INSERT INTO `Patients` (`idPatients`, `idC`, `Date`, `idSproviders`) VALUES
(7, 'CU17', '2021-07-12 10:07:17', 'SP18'),
(9, 'CU17', '2021-07-26 05:42:41', 'SP8');

-- --------------------------------------------------------

--
-- Table structure for table `Reports`
--

CREATE TABLE `Reports` (
  `idReports` int(11) NOT NULL,
  `Rtitle` varchar(50) DEFAULT NULL,
  `Detail` varchar(8000) DEFAULT NULL,
  `Rdate` datetime NOT NULL DEFAULT current_timestamp(),
  `Rby` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Reports`
--

INSERT INTO `Reports` (`idReports`, `Rtitle`, `Detail`, `Rdate`, `Rby`) VALUES
(1, 'the is the first Report', 'testing one', '2021-07-12 14:52:11', 'Alegeta.Yir'),
(2, 'The first Report', 'This is the first Report to cheack', '2021-07-12 14:52:11', 'Addis.Ale');

-- --------------------------------------------------------

--
-- Table structure for table `Sproviders`
--

CREATE TABLE `Sproviders` (
  `idSproviders` varchar(45) NOT NULL,
  `Hname` varchar(50) NOT NULL,
  `Sdate` date NOT NULL,
  `Fdate` date NOT NULL,
  `Cdetail` varchar(255) DEFAULT NULL,
  `idUsers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Sproviders`
--

INSERT INTO `Sproviders` (`idSproviders`, `Hname`, `Sdate`, `Fdate`, `Cdetail`, `idUsers`) VALUES
('SP18', 'Gondr', '2021-07-15', '2023-07-15', '3 year contract', 18),
('SP22', 'Cristian Hospital', '2021-07-14', '2023-07-12', 'A two Year Contract', 22),
('SP25', 'Ibex specilized clinic', '2021-07-14', '2023-07-21', 'A two Year Contract', 25),
('SP41', 'Rift Dental Clinic', '2021-07-27', '2023-07-19', 'A two Year Contract', 41),
('SP42', 'Beko General Hospital', '2021-07-27', '2023-07-27', 'A two Year Contract', 42),
('SP43', 'Samri clinic', '2021-07-27', '2022-07-27', 'one year Contrat', 43),
('SP45', 'Sari medum clinic', '2021-07-27', '2022-08-02', 'one year Contrat', 45),
('SP8', 'Ibex General Hospital', '2021-07-17', '2025-07-31', 'A four Year contract', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `idUsers` int(11) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Fname` varchar(45) DEFAULT NULL,
  `Lname` varchar(45) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `Phone` int(20) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Role` varchar(45) NOT NULL,
  `Sex` varchar(45) DEFAULT NULL,
  `pic` varchar(50) DEFAULT 'user.png',
  `Pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`idUsers`, `Username`, `Fname`, `Lname`, `Address`, `Phone`, `Email`, `Role`, `Sex`, `pic`, `Pass`) VALUES
(2, 'admin', 'Fadmin', 'Ladmin', 'Gondar', 987654321, 'admin@gmail.com', 'admin', 'Male', 'Screenshot from 2021-07-20 02-36-22.png', '$2y$10$tz33wLtek1rFsnhGynwX5O3601nQQQzWzCAMrC2aBwrn9owrKcOVW'),
(3, 'Aman', 'Aman', 'Goshu', 'Gondar', 923974523, 'aman@gmail.com', 'admin', 'Male', 'user.png', '$2y$10$8zeRH9VN5gIzZivj3VsWHenXGG5BEMyxwYmhSKkClTJuldIK7WPQi'),
(5, 'Ayele.Yir', 'Ayele', 'Yirdaw', 'Gondar', 987654321, 'aman@gmail.com', 'EW', 'Male', 'user.png', '$2y$10$AimkzxJXZBUqQhbeSmB1YuVh0hRozfvckyGpjCgYhvud59.g7FWmG'),
(6, 'Ayele.Yir1', 'Ayele', 'Yirdaw', 'Gondar', 987654321, 'bayeleygn@gmail.com', 'cord', 'Male', 'user.png', '$2y$10$J2Btb/cphLgd.36lwNPQcehAuwRtmivpELuWOKaeKZuvHrJli8jh6'),
(8, 'Alegeta.Yir', 'Alegeta', 'Yirdaw', 'Gondar', 987654321, 'ale@gmail.com', 'Sprovider', 'Male', 'user.png', '$2y$10$yw8wj0rADzo/A0OKrUwFs.hZq90MyB33bciZh5ujJb8cjvVnR.S2y'),
(17, 'Bamlak.Des', 'Bamlak', 'Desalgn', 'Addis Abeba', 987654321, 'bam@gmail.com', 'Cust', 'Male', 'user.png', '$2y$10$W5z.niJoppNT3WZ/OGMzmeaUdJGOMGFVZfUoFDAR0qbCXn2wLLNui'),
(18, 'Addis.Ale', 'Addis', 'Alemu', 'Gondar', 987654334, 'addis@gmail.com', 'Sprovider', 'Female', 'Screenshot from 2021-07-05 23-01-43.png', '$2y$10$15q90EDElJNgBlH5PabwNeG1aYoZKYjAOVcCpCcTEvgijJqoxsubi'),
(19, 'Bamlak.Des1', 'Bamlak', 'Desalgn', 'Gondar', 987654321, 'ho@gmail.com', 'HO', 'Male', 'user.png', '$2y$10$Krj.MaUsOQapioYC8suJwOUCzHMw2gkxK3lwj9K0v9v5gdG5CLOUm'),
(21, 'Beselamu.Daw', 'Beselamu', 'Dawit', 'Sodo,South Nation Nationality', 987654321, 'bese@gmail.com', 'cord', 'Male', '20210712_172921.jpg', '$2y$10$xaiqjFCWAJ47d.R6Rs65beNKqpwi/53sfo3Rh2GFJBi9SZ.8Jf2HS'),
(22, 'Kelemu.Ale', 'Kelemu', 'Alemayehu', 'Gondar', 987654323, 'kelemu@gmail.com', 'Sprovider', 'Male', 'user.png', '$2y$10$NSg8S5OGan71XniO/4t1oeqG2.3hl0xRURdqNlvu38A4BmtGsZxma'),
(23, 'Binyam.Yir1', 'Binyam', 'Yirdaw', 'Bahir dar', 987654323, 'bini@gmail.com', 'EW', 'Male', 'a.jpg', '$2y$10$PAL5yei1CMiaIaP2c/wXG.Hgcsvq21AuvtFf/Tukw9/./dFJjzOBG'),
(25, 'Abye.Ahm', 'Abye', 'Ahmed', 'Gondar', 987654323, 'abey@gmail.com', 'Sprovider', 'Female', 'user.png', '$2y$10$x4itaMGveM5/Lgn8k8bDd.BrQSJSCx5FCj.CJSSP4ZDzlxCdYUZiW'),
(26, 'Binyam.Yir2', 'Binyam', 'Yirdaw', 'Bahir dar', 987654321, 'bam@gmail.com', 'cord', 'Male', 'user.png', '$2y$10$UhcOB/DJVFUN6zFnwArBcu12eBhRaHkNNIubUmrmRClWqVytXaUeu'),
(27, 'Binyam.Yir', 'Binyam', 'Yirdaw', 'Addis Abeba', 987654321, 'yirdaw@gmail.com', 'EW', 'Male', 'user.png', '$2y$10$Uh/158POJJgTzLmsPaNIGeJrcSqaeDKEiM0jNXq1GXEVYjFW3QSm6'),
(28, 'Binyam.Yir3', 'Binyam', 'Yirdaw', 'Gondar', 987654321, 'bayeleygn@gmail.com', 'HO', 'Male', 'user.png', '$2y$10$eaFtqbAh0zjV.T9N5NqOx.CBxmoQ8aoaD/xH0/FDF.BTX1WyfeBDC'),
(35, 'Bestegaw.Dem', 'Bestegaw', 'Demesse', 'south gondar', 987654321, 'bese@gmail.com', 'Cust', 'Male', 'user.png', '$2y$10$zeqUrwC0U3bUHuMNZLP3PeEazGMP5yFBkZdIaKTTRX9zQaed4rrQi'),
(36, 'Abebe.Keb', 'Abebe', 'Kebede', 'Piyassa', 987654321, 'Abebe@gmail.com', 'cord', 'Male', 'user.png', '$2y$10$1Srn4Jfl5Mzv8iw62XqIJupT4z.POfFUOMuGDJwit1.Q.ljCYQzTW'),
(37, 'Ayele.Mol', 'Ayele', 'Mola', 'Goro', 923344334, 'ayele@gmail.com', 'HO', 'Male', 'user.png', '$2y$10$OPzMYeepU3TIcfcRVxpYBunL3tF2rOM8NhxYVtUkSkWr7ZVxxfxHO'),
(38, 'Fcordinator.Lco', 'Fcordinator', 'Lcordinator', 'Azezo', 987654321, 'fcord@gmail.com', 'cord', 'Female', 'user.png', '$2y$10$G5gaqPt/V7MNkvzeyAo4/OWo2Mamur.WMDzEDKkJ/KyicEkGumVpG'),
(39, 'FHealth.Lhe', 'FHealth', 'Lhealth', 'Maraki', 987654324, 'health@gmail.com', 'HO', 'Female', 'user.png', '$2y$10$0kUzWc0NCxYeDNw8.7mbrOFjj6VF2JxKB2Xs3vVJni2PJCTOz9icy'),
(40, 'Fextension.Lex', 'Fextension', 'Lextension', 'fasiledes', 987654321, 'extn@gmail.com', 'EW', 'Female', 'user.png', '$2y$10$lyMzm4Yrz01.Jq7U8oiy0ed2hnhh1gLuH6isU9TBK8oHhcGmnZUna'),
(41, 'Solomon.Bog', 'Solomon', 'Bogale', 'Embassy', 987654322, 'sol@gmail.com', 'Sprovider', 'Male', 'user.png', '$2y$10$ISvVLAJDHiKVu6iXJu/lQuQ0eoXso1P9Ht7McN0XAmUODCTouGF1m'),
(42, 'Bayeleygn.Kas', 'Bayeleygn', 'Kasa', 'Bulko', 987654321, 'beko@gmail.com', 'Sprovider', 'Male', 'user.png', '$2y$10$GYYwdV43f6dK8IElWYku4eLCltqtS5fJej9R.Swm7UHxGu1s9yq3q'),
(43, 'Samrawit.Mol', 'Samrawit', 'Mola', 'Maraki', 987654323, 'samri@gmail.com', 'Sprovider', 'Female', 'user.png', '$2y$10$WZf.KFL/LGN4rXLXDrMTBe4WLqOnjDdFjXrcgBckOwyZ8iiI0SZ5S'),
(44, 'Samrawit.Mol', 'Samrawit', 'Mola', 'Maraki', 987654323, 'samri@gmail.com', 'Sprovider', 'Female', 'user.png', '$2y$10$Rcb3vsxOkJ2jg20MuTtfJenlnGJdLcKSDPqkIUgnXeyqYUZBamQF2'),
(45, 'Saron.Mul', 'Saron', 'Mulu', 'collage wede meskid wered bilo', 987653456, 'sar@gmail.com', 'Sprovider', 'Female', 'user.png', '$2y$10$7hzmpjEhG9HhTYLVUEakTO3rdo60TfoarxA2pHiFXchgJsMVSZRWG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`idC`),
  ADD KEY `fk_Customers_Users1_idx` (`idUsers`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`idE`),
  ADD KEY `fk_Employees_Users1_idx` (`idUsers`);

--
-- Indexes for table `Families`
--
ALTER TABLE `Families`
  ADD PRIMARY KEY (`idFamilies`),
  ADD KEY `fk_Families_Customers1_idx` (`idC`);

--
-- Indexes for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  ADD PRIMARY KEY (`idFeedbacks`),
  ADD KEY `fk_Feedbacks_Employees1_idx` (`Sendby`);

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`idN`),
  ADD KEY `fk_News_Employees1_idx` (`postedBy`);

--
-- Indexes for table `Patients`
--
ALTER TABLE `Patients`
  ADD PRIMARY KEY (`idPatients`),
  ADD KEY `fk_Patients_Customers1_idx` (`idC`),
  ADD KEY `fk_Patients_Sproviders1_idx` (`idSproviders`);

--
-- Indexes for table `Reports`
--
ALTER TABLE `Reports`
  ADD PRIMARY KEY (`idReports`);

--
-- Indexes for table `Sproviders`
--
ALTER TABLE `Sproviders`
  ADD PRIMARY KEY (`idSproviders`),
  ADD KEY `fk_Sproviders_Users1_idx` (`idUsers`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`idUsers`,`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Families`
--
ALTER TABLE `Families`
  MODIFY `idFamilies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Feedbacks`
--
ALTER TABLE `Feedbacks`
  MODIFY `idFeedbacks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `News`
--
ALTER TABLE `News`
  MODIFY `idN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Patients`
--
ALTER TABLE `Patients`
  MODIFY `idPatients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Reports`
--
ALTER TABLE `Reports`
  MODIFY `idReports` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Customers`
--
ALTER TABLE `Customers`
  ADD CONSTRAINT `fk_Customers_Users1` FOREIGN KEY (`idUsers`) REFERENCES `Users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Employees`
--
ALTER TABLE `Employees`
  ADD CONSTRAINT `fk_Employees_Users1` FOREIGN KEY (`idUsers`) REFERENCES `Users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Families`
--
ALTER TABLE `Families`
  ADD CONSTRAINT `fk_Families_Customers1` FOREIGN KEY (`idC`) REFERENCES `Customers` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `News`
--
ALTER TABLE `News`
  ADD CONSTRAINT `fk_News_Employees1` FOREIGN KEY (`postedBy`) REFERENCES `Employees` (`idE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Patients`
--
ALTER TABLE `Patients`
  ADD CONSTRAINT `fk_Patients_Customers1` FOREIGN KEY (`idC`) REFERENCES `Customers` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Patients_Sproviders1` FOREIGN KEY (`idSproviders`) REFERENCES `Sproviders` (`idSproviders`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Sproviders`
--
ALTER TABLE `Sproviders`
  ADD CONSTRAINT `fk_Sproviders_Users1` FOREIGN KEY (`idUsers`) REFERENCES `Users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
