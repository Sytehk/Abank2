-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 10:37 PM
-- Server version: 5.6.37
-- PHP Version: 5.4.42

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ob`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountmaster`
--

CREATE TABLE IF NOT EXISTS `accountmaster` (
  `id` int(11) NOT NULL,
  `accounttype` varchar(25) NOT NULL,
  `prefix` varchar(11) NOT NULL,
  `minbalance` double(12,2) NOT NULL,
  `interest` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `accno` varchar(25) NOT NULL,
  `customerid` int(10) NOT NULL,
  `accstatus` varchar(25) NOT NULL,
  `accopendate` date NOT NULL,
  `accounttype` varchar(25) NOT NULL,
  `accountbalance` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accno`, `customerid`, `accstatus`, `accopendate`, `accounttype`, `accountbalance`) VALUES
('1123891222', 98696, '', '2019-06-17', 'Savings', 0.00),
('1136626524', 98690, 'active', '2019-06-13', 'Current', 16062.00),
('1187011193', 98692, 'active', '2019-06-17', 'Savings', 369.00),
('1237230634', 98699, '', '2019-08-03', 'Savings', 0.00),
('1269580769', 98698, '', '2019-08-03', 'Savings', 0.00),
('1271299755', 98694, 'active', '2019-06-17', 'Savings', 0.00),
('1284016691', 98695, '', '2019-06-17', 'Savings', 0.00),
('1296958301', 98697, '', '2019-06-17', 'Savings', 0.00),
('1302953919', 98691, 'active', '2019-06-14', 'Student', 115.00),
('1337168073', 98693, 'active', '2019-06-17', 'Savings', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(2) NOT NULL,
  `username` varchar(22) NOT NULL,
  `password` varchar(22) NOT NULL,
  `status` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `code` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank`, `code`) VALUES
(1, 'Access Bank', '044'),
(2, 'Aso Savinhgs and Loan', '401'),
(3, 'Citi Bank', '023'),
(4, 'Covenant Microfinance Bank', '551'),
(5, 'Diamond Bank', '063'),
(6, 'Eco Bank', '050'),
(7, 'Eco Mobile', '307'),
(8, 'Ekondo Microfinance Bank', '562'),
(9, 'Enterprice Bank', '084'),
(10, 'Equitorial Trust Bank', '040'),
(11, 'Fidelity Bank', '070'),
(12, 'Fidelity Mobile', '318'),
(13, 'Finatrust Microfinance Bank', '608'),
(14, 'First City Monument Bank', '214'),
(15, 'First Inland Bank', '085'),
(16, 'Guarantee Trust Bank', '058'),
(17, 'Heritage Bank', '030'),
(18, 'Jaiz Bank', '301'),
(19, 'Keystone Bank', '082'),
(20, 'Main Street Bank', '014'),
(21, 'PAGA', '327'),
(22, 'Skye Bank', '076'),
(23, 'Stanbic IBTC BAnk', '221'),
(24, 'Stanbic Mobile', '304'),
(25, 'Standard Chartered Bank', '068'),
(26, 'Sterline Bank', '232'),
(27, 'Sterline Mobile', '326'),
(28, 'Sun Trust Bank', '100'),
(29, 'Union Bank of Nigeria', '32'),
(30, 'United Bank For Africa', '33'),
(31, 'Unity Bank', '215'),
(32, 'Wema Bank', '35'),
(33, 'Zenith Bank', '57'),
(34, 'Zenith Mobile', '322');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `ifsccode` varchar(25) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `branchaddress` text NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ifsccode`, `branchname`, `city`, `branchaddress`, `state`, `country`) VALUES
('2t59aiwlrhce08', 'Ohio Branch', 'Ikeja', '2, Awolowo,  Ikeja, Lagos State.', 'Lagos', 'Andorra'),
('8z05jxe3nylqdp', 'Ontario Branch', '4y45ghghcbn', 'nvhjfgfgdgg', 'yhfghnvcnb', 'Albania'),
('ctpblf00grmvzi', 'Australia Branch', '4y45ghghcbn', 'nvhjfgfgdgg', 'm;k', 'Algeria'),
('dspj9khm485fix', 'Lagos Branch', 'Ikeja', '2, Awolowo,  Ikeja, Lagos State.', 'Lagos', 'Andorra');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `code` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `comment`) VALUES
(1, 'US Dollar', 'USD', ''),
(2, 'Australian Dollar', 'AUD', ''),
(3, 'Brazilian Real', 'BRL', ''),
(4, 'Canadian Dollar', 'CAD', ''),
(5, 'Czech Koruna', 'CZK', ''),
(6, 'Danish Krone', 'DKK', ''),
(7, 'Euro', 'EUR', ''),
(8, 'Thai Baht', 'THB', ''),
(9, 'Hong Kong Dollar', 'HKD', ''),
(10, 'Hungarian Forint', 'HUF', ''),
(11, 'Israeli New Sheqel', 'ILS', ''),
(12, 'Japanese Yen', 'JPY', ''),
(13, 'Malaysian Ringgit', 'MYR', ''),
(14, 'Mexican Peso', 'MXN', ''),
(15, 'Nigeria Naira', 'NGN', ''),
(16, 'New Zealand Dollar', 'NZD', ''),
(17, 'Philippine Peso', 'PHP', ''),
(18, 'Polish Zloty ', 'PLN', ''),
(19, 'Pound Sterling', 'GBP', ''),
(20, 'Russian Ruble', 'RUB', ''),
(21, 'Singapore Dollar', 'SGD', ''),
(22, 'Swedish Krona', 'SEK', ''),
(23, 'Swiss Franc', 'CHF', ''),
(24, 'Taiwan New Dollar', 'TWD', ''),
(26, 'Turkish Lira', 'TRY', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) NOT NULL,
  `accountno` text NOT NULL,
  `acctype` varchar(33) NOT NULL,
  `ifsccode` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(22) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `accpassword` varchar(50) NOT NULL,
  `transpassword` varchar(50) NOT NULL,
  `cot` varchar(50) NOT NULL,
  `imf` varchar(50) NOT NULL,
  `accstatus` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `accopendate` date NOT NULL,
  `lastlogin` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98700 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `accountno`, `acctype`, `ifsccode`, `firstname`, `lastname`, `email`, `phone`, `loginid`, `accpassword`, `transpassword`, `cot`, `imf`, `accstatus`, `city`, `state`, `country`, `accopendate`, `lastlogin`) VALUES
(98690, '1136626524', 'Current', '8z05jxe3nylqdp', 'Adekola', 'Gold', 'test@test.com', '02344423423280', 'test1234', 'test1234', 'test1234', 'COT', 'IMF', 'active', 'Ikeja', 'Lagos', 'Aruba', '2019-06-13', 'Saturday 3rd of August 2019 '),
(98691, '1302953919', 'Student', '8z05jxe3nylqdp', 'gfhg', 'dhfdghdh', 'adetunjioluwakayode@gm', '7865878675', 'test123', 'test1234', '9l856swujhfmot', '0', '0', 'active', 'gfdhgdghd', 'ghgkv', 'Afganistan', '2019-06-14', '0000-00-00'),
(98692, '1187011193', 'Savings', '8z05jxe3nylqdp', 'Olowokayemo', 'Tanimola', 'adeolere@yahoo.com', '080989967665', 'yrctl9uibjvk5p', 'w9o2vqehb8a4tp', 'w9o2vqehb8a4tp', '0', '0', 'active', 'Benin', 'Edo', 'Nigeria', '2019-06-17', ''),
(98693, '1337168073', 'Savings', '2t59aiwlrhce08', 'jhxhjkqwgh', 'ckqkcjh', 'adetunjioluwakayode@gm', '7685', '2dkuzby0e57xj0', 'fis40qwr61t9a0', 'fis40qwr61t9a0', '0', '0', 'active', 'gfdhgdghd', 'ghgkv', 'Afganistan', '2019-06-17', ''),
(98694, '1271299755', 'Savings', '2t59aiwlrhce08', 'cjkkcg', 'dghj', 'hg@g.c', '675', 'fvt10ipd5owukr', '9dw63yts0vmgnx', '9dw63yts0vmgnx', '0', '0', 'Active', 'dc', 'dsc', 'Algeria', '2019-06-17', ''),
(98695, '1284016691', 'Savings', 'ctpblf00grmvzi', 'svachjv', 'hjgghjfhj', 'adetunjioluwakayode@gm', '76545747', 'suytmph8gcwibk', '6bzqey1hwpikxf', '6bzqey1hwpikxf', '0', '0', 'Active', '4y45ghghcbn', 'yhfghnvcnb', 'Algeria', '2019-06-17', ''),
(98696, '1123891222', 'Savings', '8z05jxe3nylqdp', 'xx x ', 'xcxcx', 'e@gmail.com', '563643', 'viaxmr5syoz3bt', '95xzo8eyjas4k3', '95xzo8eyjas4k3', '0', '0', 'Active', '4y45ghghcbn', 'yhfghnvcnb', '', '2019-06-17', ''),
(98697, '1296958301', 'Savings', '2t59aiwlrhce08', 'chdfhd', 'fhhdhfdhf', 'adetunjioluwakayode@gm', '4324242', '139ntrcjyvmq0w', 'k80wmp4uhficgj', 'k80wmp4uhficgj', '0', '0', 'Active', '4y45ghghcbn', 'yhfghnvcnb', 'Algeria', '2019-06-17', ''),
(98698, '1269580769', 'Savings', 'dspj9khm485fix', 'chdfhd', 'fhhdhfdhf', 'adetunjioluwakayode@gm', '4324242', '9bq6v3azlf400p', '94ekfmz2up0nlo', '94ekfmz2up0nlo', '30', '0', 'Active', '4y45ghghcbn', 'yhfghnvcnb', 'Angola', '2019-08-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE IF NOT EXISTS `deposits` (
  `id` int(6) NOT NULL,
  `customerid` varchar(33) NOT NULL,
  `amount` int(55) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE IF NOT EXISTS `duration` (
  `id` int(22) NOT NULL,
  `name` varchar(33) NOT NULL,
  `value` int(33) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`id`, `name`, `value`, `status`) VALUES
(1, 'One Month', 30, 1),
(2, 'Two Months', 60, 1),
(3, 'Three Months', 90, 1),
(4, 'Four Months', 120, 1),
(5, 'Five Months', 150, 1),
(6, 'Six Months', 180, 1),
(7, 'Seven Months', 210, 1),
(8, 'Eight Months', 230, 1),
(9, 'Nine Months', 260, 1),
(10, 'Ten Months', 290, 1),
(11, 'Eleven Months', 320, 1),
(12, 'Twelve Months', 365, 1),
(13, 'Two Years', 730, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_deposit`
--

CREATE TABLE IF NOT EXISTS `fixed_deposit` (
  `id` int(6) NOT NULL,
  `customerid` int(44) NOT NULL,
  `accno` int(22) NOT NULL,
  `amount` varchar(44) NOT NULL,
  `duration` int(222) NOT NULL,
  `balance` float(10,2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_deposit`
--

INSERT INTO `fixed_deposit` (`id`, `customerid`, `accno`, `amount`, `duration`, `balance`, `status`) VALUES
(59, 98690, 2147483647, '20000', 730, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE IF NOT EXISTS `loan` (
  `loanid` int(10) NOT NULL,
  `loantype` varchar(25) NOT NULL,
  `loanamt` float(10,2) NOT NULL,
  `loannumber` int(10) NOT NULL,
  `customerid` int(12) NOT NULL,
  `acctno` int(33) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `balance` int(200) NOT NULL,
  `total` float(10,2) NOT NULL,
  `paid` float(10,2) NOT NULL,
  `startdate` date NOT NULL,
  `status` int(2) NOT NULL,
  `signed` varchar(33) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanid`, `loantype`, `loanamt`, `loannumber`, `customerid`, `acctno`, `interest`, `balance`, `total`, `paid`, `startdate`, `status`, `signed`) VALUES
(24, 'Other Loan', 5000.00, 1366185950, 98690, 1136626524, 15.00, 5750, 0.00, 2134.00, '2019-06-13', 2, ''),
(25, 'Car Loan', 40.00, 1334915320, 98690, 1136626524, 15.00, 46, 0.00, 0.00, '2019-06-15', 2, ''),
(26, 'Car Loan', 5000.00, 1334915320, 98690, 1136626524, 15.00, 0, 0.00, 0.00, '2019-06-15', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `loanpayment`
--

CREATE TABLE IF NOT EXISTS `loanpayment` (
  `id` int(11) NOT NULL,
  `customerid` int(33) NOT NULL,
  `loanid` int(33) NOT NULL,
  `date` date NOT NULL,
  `paidamt` int(10) NOT NULL,
  `principleamt` float(10,2) NOT NULL,
  `interestamt` float(10,2) NOT NULL,
  `balance` float(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanpayment`
--

INSERT INTO `loanpayment` (`id`, `customerid`, `loanid`, `date`, `paidamt`, `principleamt`, `interestamt`, `balance`) VALUES
(89, 98690, 1366185950, '2019-06-13', 123, 0.00, 0.00, 0.00),
(90, 98690, 1366185950, '2019-06-13', 777, 0.00, 0.00, 0.00),
(91, 98690, 1366185950, '2019-06-14', 1234, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `loantype`
--

CREATE TABLE IF NOT EXISTS `loantype` (
  `loantype` varchar(25) NOT NULL,
  `prefix` varchar(25) NOT NULL,
  `maximumamt` float(10,2) NOT NULL,
  `minimumamt` float(10,2) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loantype`
--

INSERT INTO `loantype` (`loantype`, `prefix`, `maximumamt`, `minimumamt`, `interest`, `status`) VALUES
('Car Loan', 'CL', 5000.00, 500.00, 15.00, 'active'),
('Home Loan', 'HL', 50000.00, 500.00, 15.00, 'active'),
('Land Loan', 'LL', 100000.00, 300.00, 15.00, 'active'),
('Other Loan', 'OL', 7000.00, 5000.00, 15.00, 'active'),
('Student Loan', 'SL', 75000.00, 1000.00, 15.00, 'active'),
('Travel Loan', 'TL', 70000.00, 1000.00, 15.00, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `mailid` int(10) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `mdatetime` datetime NOT NULL,
  `senderid` varchar(25) NOT NULL,
  `reciverid` varchar(25) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mailid`, `subject`, `message`, `mdatetime`, `senderid`, `reciverid`, `status`) VALUES
(55, 'Hello My Guy', 'Hi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-05 08:01:27', 'admin', '98687', ''),
(56, 'Hello My Guy', 'Hi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-05 08:01:30', 'admin', '98687', ''),
(57, 'Hello My Guy', 'Hi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-05 08:01:34', 'admin', '98687', ''),
(58, 'hello admin please', 'Hi ,jhghkgkhghkk\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-05 08:08:04', '98687', 'admin', ''),
(59, 'hello oga admin', 'jbcjkbwcjew i need to buy some stuff for my mums birthday at hearea in the house of thekufrijiHi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-05 07:55:02', 'admin', 'admin', ''),
(60, 'wdwdccwec', 'Hi ,\r\nType Your Message Content Here.\r\ncwecew\r\nCheers!\r\n', '2019-06-10 10:24:03', '98687', '98688', 'New'),
(61, 'sdsc', 'Hi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-10 10:25:50', 'q35tdivfrc8yan', '98687', ''),
(62, 'sdsc', 'Hi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-10 10:25:55', 'q35tdivfrc8yan', '98687', ''),
(63, 'test new', 'Hi ,\r\nType Your Message Content Here.\r\ndvsdv\r\nCheers!\r\n', '2019-06-10 10:36:25', 'q35tdivfrc8yan', 'admin', 'New'),
(64, 'asdds', 'Hi ,\r\nType Your Message Content Here.sdcdscdsc\r\n\r\nCheers!\r\n', '2019-06-10 10:47:26', '98687', 'q35tdivfrc8yan', 'New'),
(65, 'asdds', 'Hi ,\r\nType Your Message Content Here.sdcdscdsc\r\n\r\nCheers!\r\n', '2019-06-10 10:47:32', '98687', 'q35tdivfrc8yan', 'New'),
(66, 'bjghjgjh', 'rdhgfghfhjvhjkvkHi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-14 11:23:34', 'admin', '98690', ''),
(67, 'hello my guy', 'Hi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-16 07:16:41', 'admin', '98690', ''),
(68, 'mbvhjvhv', 'Hi ,\r\nType Your Message Content Here.\r\n\r\nCheers!\r\n', '2019-06-17 06:34:56', 'admin', '98690', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE IF NOT EXISTS `payment_gateway` (
  `id` int(6) NOT NULL,
  `name` varchar(33) NOT NULL,
  `gateway_name` varchar(22) NOT NULL,
  `public_key` text NOT NULL,
  `secret_key` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `name`, `gateway_name`, `public_key`, `secret_key`, `status`) VALUES
(1, 'Paystack', 'Paystack', 'public key', 'secret key', 1),
(2, 'Rave', 'Rave', 'ghkgkhgkgkh', 'flutterwave public key', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saved`
--

CREATE TABLE IF NOT EXISTS `saved` (
  `id` int(12) NOT NULL,
  `userid` int(33) NOT NULL,
  `amount` int(33) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved`
--

INSERT INTO `saved` (`id`, `userid`, `amount`, `date`, `status`) VALUES
(5, 98690, 20000, '2019-06-15 12:04:24', 0),
(6, 98690, 200, '2019-06-16 08:01:07', 0),
(7, 98690, 200, '2019-06-16 08:02:48', 0),
(8, 98690, 200, '2019-06-16 08:03:25', 0),
(9, 98690, 20000, '2019-06-16 08:05:14', 0),
(10, 98690, 20000, '2019-06-16 08:05:57', 0),
(11, 98690, 20000, '2019-06-16 13:11:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `empid` int(10) NOT NULL,
  `firstname` varchar(22) NOT NULL,
  `lastname` varchar(22) NOT NULL,
  `country` varchar(22) NOT NULL,
  `state` varchar(22) NOT NULL,
  `bank_branch` varchar(22) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `createdat` date NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`empid`, `firstname`, `lastname`, `country`, `state`, `bank_branch`, `username`, `password`, `email`, `phone`, `createdat`, `last_login`) VALUES
(232, 'Busola', 'Thomas', 'American Samoa', 'yhfghnvcnb', 'BOGC2345', 'adeola', 'adeola', 'uwakayode@gmail.com', '6574754754', '2019-06-05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE IF NOT EXISTS `system_settings` (
  `bank_name` varchar(22) NOT NULL,
  `currency` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `theme_color` varchar(55) NOT NULL,
  `status` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`bank_name`, `currency`, `email`, `phone`, `theme_color`, `status`) VALUES
('Khaytech Banking', 'USD', 'khaytech@khaytech.comm', '8656724157986', 'light-style-1.min.css', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(11) NOT NULL,
  `color` varchar(33) NOT NULL,
  `code` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `color`, `code`) VALUES
(1, 'Purple', 'light-style-1.min.css'),
(2, 'Light blue', 'light-style-blue.min.css'),
(3, 'Navy Blue', 'light-style-navyblue.min.css'),
(4, 'Pink', 'light-style-pink.min.css'),
(5, 'Green', 'light-style-green.min.css'),
(6, 'Red', 'light-style-red.min.css');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `transactionid` int(11) NOT NULL,
  `paymentdate` datetime NOT NULL,
  `payeeid` int(11) NOT NULL,
  `receiveid` varchar(11) NOT NULL,
  `charged` int(11) NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(11) NOT NULL,
  `paymentstat` text NOT NULL,
  `cashier` varchar(33) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionid`, `paymentdate`, `payeeid`, `receiveid`, `charged`, `amount`, `type`, `paymentstat`, `cashier`) VALUES
(108, '0000-00-00 00:00:00', 98690, '1302953919', 0, 24, 'Transfer', 'active', ''),
(109, '2019-06-15 12:04:24', 0, '98690', 0, 20000, 'Credit', 'active', 'admin'),
(110, '2019-06-16 08:01:07', 0, '98690', 0, 200, 'Credit', 'active', 'admin'),
(111, '2019-06-16 08:02:48', 0, '98690', 0, 200, 'Credit', 'active', 'admin'),
(112, '2019-06-16 08:03:25', 0, '98690', 0, 200, 'Credit', 'active', 'admin'),
(113, '2019-06-16 08:05:14', 0, '98690', 0, 20000, 'Credit', 'active', 'admin'),
(114, '2019-06-16 08:05:57', 0, '98690', 0, 20000, 'Credit', 'active', 'admin'),
(115, '2019-06-16 08:08:02', 0, '', 98690, 20000, 'Debit', 'active', 'admin'),
(116, '2019-06-16 08:08:31', 0, '', 98690, 20000, 'Debit', 'active', 'admin'),
(117, '2019-06-16 01:11:17', 0, '98690', 0, 20000, 'Credit', 'active', 'adeola'),
(118, '2019-06-16 01:13:37', 0, '', 98691, 9, 'Debit', 'active', 'adeola'),
(119, '2019-06-19 10:22:33', 98690, '0577118011', 0, 24, 'Transfer', 'active', ''),
(120, '2019-08-03 05:24:18', 98690, '', 0, 23, 'Transfer', 'active', ''),
(121, '2019-08-03 05:48:36', 98690, '', 0, 1234, 'Transfer', 'active', ''),
(122, '2019-08-03 05:52:06', 98690, '34531875478', 0, 54000, 'Transfer', 'active', ''),
(123, '2019-08-03 06:55:41', 98690, '34531875478', 0, 90, 'Transfer', 'active', ''),
(124, '2019-08-03 07:10:32', 98690, 'BNSHUTRYS', 0, 123, 'Transfer', 'active', ''),
(125, '2019-08-03 07:16:14', 98690, 'BNSHUTRYS', 0, 24, 'Transfer', 'active', ''),
(126, '2019-08-03 07:17:43', 98690, 'BNSHUTRYS', 0, 24, 'Transfer', 'active', ''),
(127, '2019-08-03 07:19:24', 98690, 'SWIFT1234', 0, 123, 'Transfer', 'active', ''),
(128, '2019-08-03 07:21:28', 98690, 'SWIFT1234', 0, 234, 'Transfer', 'active', ''),
(129, '2019-08-03 07:41:54', 98690, 'SWIFT1234', 0, 1234, 'Transfer', 'active', ''),
(130, '2019-08-03 07:46:09', 98690, 'SWIFT1234', 0, 1234, 'Transfer', 'active', ''),
(131, '2019-08-03 08:06:27', 98690, 'SWIFT1234', 0, 10, 'Transfer', 'active', ''),
(132, '2019-08-03 08:10:53', 98690, 'SWIFT1234', 0, 1234, 'Transfer', 'active', ''),
(133, '2019-08-03 08:14:31', 98690, 'SWIFT1234', 0, 1234, 'Transfer', 'active', ''),
(134, '2019-08-03 08:19:12', 98690, 'SWIFT1234', 0, 123, 'Transfer', 'active', ''),
(135, '2019-08-03 08:21:02', 98690, 'SWIFT1234', 0, 123, 'Transfer', 'active', ''),
(136, '2019-08-03 08:21:57', 98690, 'SWIFT1234', 0, 1234, 'Transfer', 'active', ''),
(137, '2019-08-03 08:23:04', 98690, 'SWIFT1234', 0, 123, 'Transfer', 'active', ''),
(138, '2019-08-03 08:33:42', 98690, '1187011193', 0, 123, 'Transfer', 'active', ''),
(139, '2019-08-03 08:37:26', 98690, '1187011193', 0, 123, 'Transfer', 'active', ''),
(140, '2019-08-03 08:37:50', 98690, '1187011193', 0, 123, 'Transfer', 'active', ''),
(141, '2019-08-03 09:49:32', 98690, 'SWIFT1234', 0, 1234, 'Transfer', 'active', ''),
(142, '2019-08-03 09:53:26', 98690, 'SWIFT1234', 0, 1234, 'Transfer', 'active', ''),
(143, '2019-08-03 10:32:35', 98690, 'SWIFT1234', 0, 123, 'Transfer', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE IF NOT EXISTS `transfers` (
  `id` int(33) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `bank` varchar(33) NOT NULL,
  `swift` varchar(60) NOT NULL DEFAULT 'Not Specified',
  `address` varchar(500) NOT NULL DEFAULT 'Address Not Specified',
  `amount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `sender`, `receiver`, `name`, `bank`, `swift`, `address`, `amount`, `date`, `status`) VALUES
(63, 98690, 1187011193, '', 'Khaytech Banking', 'Not Specified', 'Address Not Specified', 123, '2019-08-03 20:33:42', 1),
(64, 98690, 1187011193, '1187011193', 'Khaytech Banking', 'Not Specified', 'Address Not Specified', 123, '2019-08-03 20:37:26', 1),
(65, 98690, 1187011193, 'Olowokayemo Tanimola', 'Khaytech Banking', 'Not Specified', 'Address Not Specified', 123, '2019-08-03 20:37:50', 1),
(66, 98690, 577118011, 'Amrios Alaricos', 'FCMB', 'Not Specified', 'Jigawa', 1234, '2019-08-03 21:49:32', 1),
(67, 98690, 577118011, 'Amrios Alaricos', 'FCMB', 'SWIFT1234', 'Jigawa', 1234, '2019-08-03 21:53:26', 1),
(68, 98690, 577118011, 'Amrios Alaricos', 'FCMB', 'SWIFT1234', 'Jigawa', 123, '2019-08-03 22:32:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` int(12) NOT NULL,
  `userid` int(33) NOT NULL,
  `amount` int(33) NOT NULL,
  `date` timestamp NOT NULL,
  `status` int(22) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `userid`, `amount`, `date`, `status`) VALUES
(19, 98690, 24, '0000-00-00 00:00:00', 1),
(20, 98690, 24, '0000-00-00 00:00:00', 1),
(21, 98690, 23, '0000-00-00 00:00:00', 1),
(22, 98690, 1234, '0000-00-00 00:00:00', 1),
(23, 98690, 54000, '0000-00-00 00:00:00', 1),
(24, 98690, 90, '0000-00-00 00:00:00', 1),
(25, 98690, 123, '0000-00-00 00:00:00', 1),
(26, 98690, 24, '0000-00-00 00:00:00', 1),
(27, 98690, 24, '0000-00-00 00:00:00', 1),
(28, 98690, 123, '0000-00-00 00:00:00', 1),
(29, 98690, 234, '0000-00-00 00:00:00', 1),
(30, 98690, 1234, '0000-00-00 00:00:00', 1),
(31, 98690, 1234, '0000-00-00 00:00:00', 1),
(32, 98690, 10, '0000-00-00 00:00:00', 1),
(33, 98690, 1234, '0000-00-00 00:00:00', 1),
(34, 98690, 1234, '0000-00-00 00:00:00', 1),
(35, 98690, 123, '0000-00-00 00:00:00', 1),
(36, 98690, 123, '0000-00-00 00:00:00', 1),
(37, 98690, 1234, '0000-00-00 00:00:00', 1),
(38, 98690, 123, '0000-00-00 00:00:00', 1),
(39, 98690, 123, '0000-00-00 00:00:00', 1),
(40, 98690, 123, '0000-00-00 00:00:00', 1),
(41, 98690, 123, '0000-00-00 00:00:00', 1),
(42, 98690, 1234, '0000-00-00 00:00:00', 1),
(43, 98690, 1234, '0000-00-00 00:00:00', 1),
(44, 98690, 123, '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountmaster`
--
ALTER TABLE `accountmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accno`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ifsccode`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixed_deposit`
--
ALTER TABLE `fixed_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanid`);

--
-- Indexes for table `loanpayment`
--
ALTER TABLE `loanpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loantype`
--
ALTER TABLE `loantype`
  ADD UNIQUE KEY `loantype` (`loantype`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountmaster`
--
ALTER TABLE `accountmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98700;
--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fixed_deposit`
--
ALTER TABLE `fixed_deposit`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `loanpayment`
--
ALTER TABLE `loanpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mailid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `empid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=233;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(33) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
