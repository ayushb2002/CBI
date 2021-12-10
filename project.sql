-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 05:58 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `get_gender` (`age` INT) RETURNS VARCHAR(10) CHARSET utf8mb4 begin
declare gender varchar(10);
select Gender into gender from person where Age = age;
return (gender);
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchID` varchar(20) NOT NULL,
  `Manager` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Details` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchID`, `Manager`, `Address`, `Details`) VALUES
('ACB Bangalore', 'OFF111', 'Office of Supdt. of Police, No. 36, Bellary Road, ', 'Juridiction-State of Karanataka.'),
('ACB Bhopal', 'OFF103', 'Anveshan Parisar, Char Imli, Bhopal-462016', 'Jurisdiction-Alirajpur, Ashok Nagar, Agar, Malwa, Barwani, Betul, Bhind, Bhopal, Burhanpur, Datia, Dewas, Dhar, Guna, Gwalior'),
('ACB Dehradun', 'OFF104', 'CBI Residential Complex, Seemadwar, Indira Nagar, ', 'Entire State of Uttarakhand.'),
('ACB Goa', 'OFF110', 'GMC Quarters, National Highway NH-17,\r\nBambolim, G', 'Entire State of Goa.'),
('ACB Jaipur', 'OFF102', ' Tilak Marg, C Scheme, Jaipur-302005', 'Jurisdiction-Jaipur, Sikar, Jhunjhunu, Bharatpur, Dholpur, Alwar, Dausa, Kota, Baran, Sawai Madhopur, Karauli, Bundi,Tonk, Jhalawar, Ajmer.'),
('ACB Jammu', '', 'Anveshan Bhawan, Rail Head Complex, Panama Chowk, ', 'Jammu Division of Union Territory of J&K comprising of districts of Jammu'),
('ACB Kolkata', 'OFF106', '234/4, A.J.C. Bose Road, 15th Floor, Nizam Palace,', 'Juridiction-State of West Bengal, Orissa, Port Blair'),
('ACB Patna', 'OFF105', 'Dr.S.K. Singh Path, Off. Bailey Road, Patna 800022', 'juridiction-Entire State of Bihar'),
('ACB Pune', 'OFF109', 'GPOA, Kendriya Sadan, A & B Wing, Akurdi,\r\nPune - ', 'Juridiction-Pune, Satara, Solapur, Sangli, Kolhapur, Nandurbar, Dhule, Jalgaon, Aurangabad'),
('ACB Ranchi', 'OFF112', '2, Booty Road, Ranchi-834008.', 'Ranchi, Garhwa, Lohardaga, Gumla, Simdega, Khunti, Ramgarh, East Singhbhum, West Singhbhum'),
('CHENNAI ZONE', 'OFF107', 'Joint Director and Head of Zone, III Floor, E.V.K.', 'State of Tamil Nadu, Kerala & Puducherry.'),
('Hyderabad Zone', 'OFF108', 'Head of Zone, 3rd Floor, Kendriya Sadan, Sulatn Ba', 'Juridiction-State of Andhra Pradesh & Karnataka'),
('South-ND', 'OFF101', 'Hauz Khas, New Delhi', 'CBI office situated at Indian Capital. Manages all affairs related to presidential security and solves all type of cases');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `CaseID` varchar(20) NOT NULL,
  `StartingDate` date NOT NULL DEFAULT current_timestamp(),
  `Closing Date` date DEFAULT NULL,
  `Description` varchar(1000) NOT NULL,
  `LeadOfficer` varchar(20) NOT NULL,
  `BranchID` varchar(20) NOT NULL,
  `Labels` varchar(40) NOT NULL,
  `Level` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`CaseID`, `StartingDate`, `Closing Date`, `Description`, `LeadOfficer`, `BranchID`, `Labels`, `Level`) VALUES
('CASE101', '2021-10-13', NULL, 'Murder in Gandhi Nagar.\r\nForensic report suggests, the victim was shot twice.\r\nTime of death - Around mid night.', 'OFF101', 'South-ND', 'Murder', 1),
('CASE102', '2021-11-22', NULL, 'Theft at Mukesh Ambani\'s house.\r\nStole $10 crore worth jewellery.\r\nTheft took place on 20th November 2020 around 2 AM.', 'OFF101', 'South-ND', 'Theft', 8),
('CASE103', '2020-08-22', '0000-00-00', 'Attack in Hyderabad', 'OFF108', 'Hyderabad Zone', 'terrrorism', 8),
('CASE104', '2012-12-17', '0000-00-00', 'Attack at Taj Hotel,Jaipur', 'OFF102', 'ACB Jaipur', 'terrrorism', 9),
('CASE105', '2021-11-30', '2021-12-07', 'Cybercrime in ranchi', 'OFF112', 'ACB Ranchi', 'cyber security', 5),
('CASE106', '2021-04-28', '2021-12-07', 'Threatened to gain money', 'OFF110', 'ACB Goa', 'extortion', 5),
('CASE107', '2019-11-21', '2021-12-12', 'Public Property', 'OFF104', 'ACB Dehradun', 'vandalism', 6),
('CASE108', '2020-08-08', '2021-02-10', 'Theft in WestBengal', 'OFF106', 'ACB Kolkata', 'theft', 4),
('CASE109', '2021-11-18', '2021-12-31', 'Murder of Cheif Minister', 'OFF107', 'CHENNAI ZONE', 'murder', 10),
('CASE110', '2021-09-29', '2021-12-24', 'Data breach of MNC', 'OFF109', 'ACB Pune', 'cyber security', 6);

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `CriminalID` varchar(20) NOT NULL,
  `CrimeID` varchar(20) NOT NULL,
  `Adhaar` varchar(12) NOT NULL,
  `Reward` float DEFAULT NULL,
  `PriorityStatus` varchar(10) NOT NULL DEFAULT 'Yellow'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Reward - Price on criminal head';

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`CriminalID`, `CrimeID`, `Adhaar`, `Reward`, `PriorityStatus`) VALUES
('CRIMINAL101', 'CASE101', '999988887777', 100000, 'Orange'),
('CRIMINAL102', 'CASE110', '141414141414', 20000, 'blue'),
('CRIMINAL103', 'CASE103', '464646464646', 200000000, 'red'),
('CRIMINAL104', 'CASE105', '343434343434', 90000, 'orange'),
('CRIMINAL105', 'CASE105', '123123123123', 350000, 'yellow'),
('CRIMINAL106', 'CASE102', '131313131313', 10000, 'orange'),
('CRIMINAL107', 'CASE107', '167167167167', 80000, 'red'),
('CRIMINAL108', 'CASE108', '147147147147', 200000, 'orange'),
('CRIMINAL109', 'CASE109', '191919191919', 67000, 'blue'),
('CRIMINAL110', 'CASE104', '567812349087', 67000, 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

CREATE TABLE `officer` (
  `OfficerID` varchar(10) NOT NULL,
  `Adhaar` varchar(12) NOT NULL,
  `SuccessRate` int(11) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `JoiningDate` date NOT NULL DEFAULT current_timestamp(),
  `Details` varchar(100) NOT NULL,
  `Branch` varchar(20) NOT NULL,
  `TerminationDate` date DEFAULT NULL,
  `Position` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Clearence` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`OfficerID`, `Adhaar`, `SuccessRate`, `State`, `Department`, `JoiningDate`, `Details`, `Branch`, `TerminationDate`, `Position`, `Password`, `Clearence`) VALUES
('OFF101', '123423453456', 95, 'Active', 'Executive', '2013-10-17', 'Excellent Officer. Great decision making ability.', 'South-ND', NULL, 'HOD', 'ayush2002', 10),
('OFF102', '121212121212', 90, 'Active', 'Executive', '2018-11-07', 'Great Officer!', 'ACB Jaipur', NULL, 'Officer', 'ayush2002', 5),
('OFF103', '000400040004', 92, 'Active', 'Executive', '2021-11-10', 'Excellent Forensic Officer!', 'ACB Bhopal', NULL, 'Desk officer', 'password', 3),
('OFF104', '123456789012', 89, 'Active', 'Executive', '2021-06-02', 'Excellent officer!', 'ACB Dheradun', NULL, 'Field Officer', 'password', 8),
('OFF105', '161616161616', 91, 'Active', 'Executive', '2019-05-16', 'Excellent officer', 'ACB Patna', NULL, 'Field Officer', 'password', 6),
('OFF106', '231231231790', 90, 'Active', 'Executive', '1980-01-24', 'Highly Experienced', 'ACB Kolkata', NULL, 'HOD', 'password', 10),
('OFF107', '345345345289', 90, 'Active', 'Executive', '2007-06-11', 'Excellent Officer', 'CHENNAI ZONE', NULL, 'Manager', 'password', 7),
('OFF108', '818181818181', 97, 'Active', 'Executive', '2008-06-17', 'Excellent Officer', 'Hyderabad Zone', NULL, 'Desk officer', 'password', 8),
('OFF109', '234589017890', 96, 'Active', 'Executive', '2016-11-18', 'Excellent Officer', 'ACB Pune', NULL, 'Hidden Asset', 'password', 7),
('OFF110', '236789123090', 98, 'Active', 'Executive', '1985-06-08', 'Excellent Officer', 'ACB Goa', NULL, 'HOD', 'password', 9),
('OFF111', '070707070707', 97, 'Active', 'Executive', '2014-12-08', 'Highly experienced', 'ACB Bangalore', NULL, 'HOD', 'password', 8),
('OFF112', '782782782782', 97, 'Active', 'Executive', '2015-11-08', 'Excellent Officer', 'ACB Ranchi', NULL, 'Desk officer', 'password', 8),
('OFF113', '835827430312', 98, 'Active', 'Executive', '2019-06-12', 'Excellent officer', 'Hyderabad Zone', NULL, 'Hidden Asset', 'password', 9);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Name` varchar(30) NOT NULL,
  `Adhaar` varchar(12) NOT NULL,
  `Age` int(11) NOT NULL,
  `Phone` double NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Qualification` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Name`, `Adhaar`, `Age`, `Phone`, `Gender`, `Address`, `Qualification`) VALUES
('Apeksha Agarwal', '000400040004', 31, 9888888888, 'Female', 'Mumbai, Maharashtra', 'BSC, MSC Chemistry'),
('Ashok Maheshwari', '070707070707', 55, 7657657652, 'Male', 'Ranchi,Jharkhand', 'MBA'),
('Bhavya Shah', '121212121212', 20, 9999988888, 'Male', 'Ghaziabad, Uttar Pradesh', 'LLB'),
('Sahil Dhakre', '123123123123', 40, 9658976541, 'Male', 'Kanpur,Uttar Pradesh', 'BBA'),
('Nishant Rathore', '123423453456', 24, 9876543210, 'Male', 'Shahdara, Delhi', 'IAS'),
('Vedant Agnihotri', '123456789012', 20, 9999977777, 'Male', 'Noida', 'BTECH'),
('Khistij gupta', '131313131313', 30, 9894321345, 'Male', 'Noida', 'LLB'),
('Neha Sharma', '141414141414', 27, 6785432109, 'Female', 'Lucknow,uttar pradesh', 'BSc'),
('Vijay Mathur', '147147147147', 38, 9879870987, 'Male', 'Gandhinagar,Gujrat', 'LLB'),
('Ram Sharma', '161616161616', 25, 8976547897, 'Male', 'Jaipur ,Rajasthan', 'LLB'),
('Virat Agrawal', '167167167167', 29, 9870987609, 'Male', 'Dheradun', 'MBA'),
('Riya Dixit', '191919191919', 24, 8912123450, 'female', 'Mumbai,Maharastra', 'BCom'),
('Dhirendra Vikram Singh', '231231231790', 60, 9454532139, 'Male', 'Patiala,Punjab', 'Bcom'),
('Vinay Das', '234523452349', 29, 9345678912, 'Male', 'Bhopal,Madhya pradesh', 'Bcom'),
('Hemant Bansal', '234589017890', 55, 3456123897, 'Male', 'Udaipur', 'LLB'),
('Vinayak Agrawal', '236789123090', 60, 9897142034, 'Male', 'Jhodpur', 'IAS'),
('Himani Bansal', '245245245825', 34, 7865432789, 'Female', 'Banglore,Karnaka', 'Btech'),
('Sajal Agrawal', '343434343434', 32, 9789078906, 'Male', 'Agra,Uttar Pradesh', 'LLB'),
('Khushi Gupta', '345345345289', 48, 7893245123, 'Female', 'Pune,Maharastra', 'CA'),
('Devash Rathi', '464646464646', 26, 7123678909, 'Male', 'GreaterNoida', 'BMS'),
('Alind jain', '567812349087', 26, 9191234567, 'Male', 'Raipur', 'BSc'),
('Ankit Kumar', '717171717171', 58, 9898989809, 'Male', 'Mumbai,Maharastra', 'IAS'),
('Rohit Singh', '782782782782', 49, 8078076541, 'Male', 'Nagpur', 'LLB'),
('Simran Singh', '789789789789', 35, 9786532065, 'Female', 'Hyderabad', 'MBA'),
('Naman Biswas', '818181818181', 52, 8923456123, 'Male', 'Ganganagar', 'CA'),
('Ayush Bansal', '835827430312', 40, 8368274303, 'Male', 'Excellent Officer ', 'IPS'),
('RAJA', '888888888888', 34, 0, 'Male', 'Agra', 'BCOM'),
('Shradha jain', '909090909090', 45, 765765765765, 'Male', 'Kolkata,West Bengal', 'BTech'),
('Vikram kumar', '911223344556', 45, 789876543, 'Male', 'Meerut', 'MBA'),
('Mandeep Singh', '912312312312', 34, 9897676543, 'Male', 'Noida', 'MBA'),
('Shivam Jain', '933445566778', 35, 8976543298, 'Male', 'Pune', 'BTech'),
('Namam Mishra', '943219432121', 34, 9453214567, 'Male', 'Patiala', 'BCom'),
('Shardul Das', '944223344556', 30, 7896589765, 'Male', 'Nagpur,Maharastra', 'BBA'),
('Rohan Mehra', '954395439543', 26, 9876543212, 'Male', 'Indore', 'MBA'),
('Suraj Yadav', '976976976976', 40, 9453945342, 'Male', 'Chennai', 'LLB'),
('Preeti Kaur', '980980980980', 23, 6789123456, 'Female', 'Amritsar', 'Bcom'),
('Vivek Arora', '986986986123', 28, 7890987650, 'Male', 'Gandhinagar', 'BTech'),
('Mansha Gupta', '987098798734', 30, 6789213210, 'Female', 'Indore,Madhya Pradesh', 'BSc'),
('Ramesh Kapoor', '987687657654', 21, 7867564534, 'Male', 'Ghaziabad, Uttar Pradesh', 'BBA'),
('Rajat Kumar', '987698769876', 39, 6780954321, 'Male', 'Ludhiana', 'LLB'),
('Ishpreet Arora', '999888111333', 38, 9000022227, 'Female', 'Faridabad', 'Bsc'),
('Atif Ali', '999988887777', 45, 8876543210, 'Male', 'Hauz Khas, New Delhi', '10th Pass');

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE `victim` (
  `VictimID` varchar(20) NOT NULL,
  `CaseID` varchar(20) NOT NULL,
  `Adhaar` varchar(12) NOT NULL,
  `Concession` varchar(100) DEFAULT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Deceased'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`VictimID`, `CaseID`, `Adhaar`, `Concession`, `Status`) VALUES
('VICTIM101', 'CASE101', '987687657654', 'Job in Municipal Department for a family member.\r\nRs. 2 Lakh for loss of life from CM of Delhi.', 'Deceased'),
('VICTIM102', 'CASE103', '987098798734', 'Job to his family member', 'Deceased'),
('VICTIM103', 'CASE104', '986986986123', 'Job to his family member and 20000 rupees', 'Deceased'),
('VICTIM104', 'CASE105', '976976976976', 'Claimed Insurance', 'Alive'),
('VICTIM105', 'CASE106', '954395439543', '-', 'Alive'),
('VICTIM106', 'CASE108', '944223344556', '-', 'Alive'),
('VICTIM107', 'CASE109', '943219432121', 'Political power to CM wife', 'Deceased'),
('VICTIM108', 'CASE110', '933445566778', '-', 'Alive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchID`),
  ADD UNIQUE KEY `Manager` (`Manager`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`CaseID`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`CriminalID`),
  ADD UNIQUE KEY `Adhaar` (`Adhaar`);

--
-- Indexes for table `officer`
--
ALTER TABLE `officer`
  ADD PRIMARY KEY (`OfficerID`),
  ADD UNIQUE KEY `Aadhar` (`Adhaar`),
  ADD UNIQUE KEY `OfficerID` (`OfficerID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`Adhaar`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`VictimID`),
  ADD UNIQUE KEY `Aadhar` (`Adhaar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
