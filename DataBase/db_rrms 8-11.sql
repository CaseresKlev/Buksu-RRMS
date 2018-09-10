-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2018 at 09:35 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `g_name` varchar(25) NOT NULL,
  `u_name` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`, `activate`, `type`) VALUES
(1, 'neutech', 'neutech', '1234', 1, 'instructor'),
(2, 'Administrator', 'admin', 'admin2222', 1, 'admin'),
(3, 'voidmain', 'voidmain', '1234', 1, 'student'),
(4, 'AnneMazing', 'anne', '1234', 1, 'user'),
(5, 'Princess', 'princess', '1234', 1, 'student'),
(6, 'Loyd', 'loyd', '1234', 1, 'student'),
(7, 'sales123', 'sales123', '1234', 1, 'instructor'),
(8, 'Caseres', 'klevie', '1234', 1, 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `acesskey`
--

CREATE TABLE `acesskey` (
  `id` int(11) NOT NULL,
  `acesskey` varchar(8) NOT NULL,
  `type` varchar(10) NOT NULL,
  `used` tinyint(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acesskey`
--

INSERT INTO `acesskey` (`id`, `acesskey`, `type`, `used`, `date`) VALUES
(1, 'ZOmW9U2a', 'instructor', 1, '2018-08-08'),
(2, 'U5Ly68hY', 'instructor', 1, '2018-08-08'),
(3, '6rWtD08y', 'instructor', 0, '2018-08-08'),
(4, 'CgpGzbrG', 'instructor', 1, '2018-08-08'),
(5, '3V3IlxpT', 'instructor', 0, '2018-08-08'),
(6, 'ZLVDyVO9', 'instructor', 0, '2018-08-08'),
(7, 'gLwbcWGu', 'instructor', 1, '2018-08-08'),
(8, 'kOACCyx7', 'instructor', 0, '2018-08-08'),
(9, '6PAR39Zt', 'instructor', 1, '2018-08-08'),
(10, 'NyEN53Tm', 'instructor', 0, '2018-08-08'),
(11, 'EdaIXUOC', 'instructor', 0, '2018-08-08'),
(12, '2moWuTWH', 'instructor', 0, '2018-08-08'),
(13, 'FQWd7ZYB', 'instructor', 0, '2018-08-08'),
(14, 'OjU8pubk', 'instructor', 0, '2018-08-08'),
(15, 'Nw4e893a', 'instructor', 0, '2018-08-08'),
(16, '8fkZcnpF', 'instructor', 0, '2018-08-08'),
(17, '77HjnS2u', 'instructor', 0, '2018-08-08'),
(18, 'uOCIRYdv', 'instructor', 0, '2018-08-08'),
(19, 'QuCDTGvl', 'instructor', 1, '2018-08-08'),
(20, 'KfhEAHYG', 'instructor', 0, '2018-08-08'),
(21, 'WiqCFsXy', 'instructor', 0, '2018-08-08'),
(22, '8a2XbWmU', 'instructor', 0, '2018-08-08'),
(23, 'mklvV7AE', 'instructor', 0, '2018-08-08'),
(24, 'TGODI1KG', 'instructor', 0, '2018-08-08'),
(25, 'HmTHazzK', 'instructor', 0, '2018-08-08'),
(26, 'lOr61KNJ', 'instructor', 0, '2018-08-08'),
(27, 'NR9i2t95', 'instructor', 0, '2018-08-08'),
(28, 'itwILbMp', 'instructor', 0, '2018-08-08'),
(29, 'Fhx4SYcl', 'instructor', 0, '2018-08-08'),
(30, 'nw3lc0pP', 'instructor', 0, '2018-08-08'),
(31, 'zfbmZPSd', 'instructor', 0, '2018-08-08'),
(32, '4HxiLJGW', 'instructor', 0, '2018-08-08'),
(33, 'NtW1bKzF', 'instructor', 0, '2018-08-08'),
(34, 'agjwH88O', 'instructor', 0, '2018-08-08'),
(35, 'FOMWtd8r', 'instructor', 0, '2018-08-08'),
(36, 'uUSNebUR', 'instructor', 0, '2018-08-08'),
(37, 'otelAiqf', 'instructor', 0, '2018-08-08'),
(38, 'QpSwk45c', 'instructor', 0, '2018-08-08'),
(39, 't4161FSo', 'instructor', 0, '2018-08-08'),
(40, 'tpU2TYsM', 'instructor', 0, '2018-08-08'),
(41, 'QSArTq69', 'instructor', 0, '2018-08-08'),
(42, 'ui5rL8pY', 'instructor', 0, '2018-08-08'),
(43, 'jrkfQZAd', 'instructor', 0, '2018-08-08'),
(44, 'RizH03ju', 'instructor', 0, '2018-08-08'),
(45, 'dVyA6LqE', 'instructor', 0, '2018-08-08'),
(965, 'bQdlvrZJ', 'STUDENT', 1, '2018-08-10'),
(966, 'LKw9p44l', 'STUDENT', 0, '2018-08-10'),
(967, '08LT1Cll', 'STUDENT', 0, '2018-08-10'),
(968, 'EmzsXzre', 'STUDENT', 0, '2018-08-10'),
(969, '3VwIvLms', 'STUDENT', 0, '2018-08-10'),
(970, 'y63lsuK0', 'STUDENT', 0, '2018-08-10'),
(971, '9zsVW87W', 'STUDENT', 0, '2018-08-10'),
(972, 'hOARIZWC', 'STUDENT', 0, '2018-08-10'),
(973, 'TPHvbks2', 'STUDENT', 0, '2018-08-10'),
(974, 'eJZzdmxm', 'STUDENT', 0, '2018-08-10'),
(975, 'OG7C3rdY', 'STUDENT', 0, '2018-08-10'),
(976, '7WIEXaIC', 'STUDENT', 0, '2018-08-10'),
(977, 'S2cVygja', 'STUDENT', 0, '2018-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE `adviser` (
  `adv_id` smallint(6) NOT NULL,
  `adv_fname` varchar(20) NOT NULL,
  `adv_midName` varchar(20) NOT NULL,
  `adv_Lname` varchar(20) NOT NULL,
  `adv_suff` varchar(5) NOT NULL,
  `adv_email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`adv_id`, `adv_fname`, `adv_midName`, `adv_Lname`, `adv_suff`, `adv_email`) VALUES
(1, 'Sales', 'Gamponia', 'Aribe', 'JR', 'sales@yahoo.com'),
(2, 'John Dale', 'Tsar', 'Belderol', '', 'jd06@gmail.com'),
(3, 'loyd', 't', 'gonzales', '', 'loyd@gmail.com'),
(4, 'ggdgdgdrfgr', 'fdrrhtf', 'dvbgfyj', '', 'kkkkkkkkkkkkkkkkk'),
(5, 'Exhan', 'Dumalig', 'Bandas', 'JR', 'exhan@gmail.com'),
(6, 'hegtghu', 'nhujkmnbh', 'mnbvhjmn ', '', 'csefrs@gmail.com'),
(7, 'fsecs', 'sefsef', 'sefsefe', 'JR', 'sefsef'),
(8, 'dwasedrgt', 'wfergfthgy', 'wadsefftgy', 'JR', 'qdawsefthgy');

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`id`, `username`, `password`, `type`) VALUES
(1, 'anne', 'anne', 'admin'),
(2, 'ambot', 'ambot', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `a_id` int(11) NOT NULL,
  `a_fname` varchar(20) NOT NULL,
  `a_mname` varchar(20) NOT NULL,
  `a_lname` varchar(20) NOT NULL,
  `a_suffix` varchar(5) NOT NULL,
  `a_add` varchar(50) NOT NULL,
  `a_contact` varchar(15) NOT NULL,
  `a_email` varchar(25) NOT NULL,
  `a_pic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`a_id`, `a_fname`, `a_mname`, `a_lname`, `a_suffix`, `a_add`, `a_contact`, `a_email`, `a_pic`) VALUES
(1, 'Angus', 'O', 'Unegbu', '', 'University of Kurdistan Hewler', '2222-1697', 'unegbu4@yahoo.com', ''),
(2, 'Princess Gay Mary', 'Labuntog', 'Tapayan', '', 'Malaybalay city, Bukidnon', '09092827192', 'hime22@gmail.com', ''),
(3, 'Sarah', 'Dela Cruz', 'Gonzaga', '', 'United States', '09127856312', 'sarah@yahoo.com', ''),
(4, 'sales', 'g', 'aribe', 'JR', 'malaybalay city', '092354765214', 'sales.com', ''),
(5, 'John', 'K', 'Jain', '', 'New York', '888-925-12', 'john_jain@gmail.com', ''),
(6, 'rrrr', 'rrrr', 'rrrr', '', 'yytyt', '3245678', 'scdxcfgv', ''),
(7, 'Princess', 'Labuntog', 'Tapayan', '', 'Gango, Libona, Bukidnon', '09092827192', 'hime22@gmail.com', ''),
(9, 'VIJESH', 'O', 'VENUGOPAL', '', 'Irinjalakuda', '09168759424', 'vijesh@yahoo.com', ''),
(10, 'Klevie', 'Roflo', 'Caseres', '', 'Apo MAcote Malaybalay City', '09656744977', 'klevmailbox04@gmail.com', ''),
(11, 'Super', 'Man', 'Heroes', 'JR', 'New York', '098765678', 'wnwbdveafghwdna@gmail.com', ''),
(12, 'cawde', 'cserf', 'vrsef', 'JR', 'daefsef', '43465586', 'csedvrfbt', ''),
(13, 'adwdgdr', 'dfdtfhg', 'vtfgy', '', 'ssrdftgym', '23445678', 'xcdvbftgh', '');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(150) NOT NULL,
  `abstract` varchar(1000) DEFAULT NULL,
  `pub_date` date NOT NULL,
  `department` smallint(11) NOT NULL,
  `rev_count` smallint(6) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `enabled` tinyint(4) NOT NULL,
  `views_count` smallint(6) DEFAULT NULL,
  `cited` int(11) NOT NULL,
  `cover` varchar(80) NOT NULL,
  `docloc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `abstract`, `pub_date`, `department`, `rev_count`, `status`, `enabled`, `views_count`, `cited`, `cover`, `docloc`) VALUES
(1, 'Theories of Accounting', 'Accounting frameworks follow stipulations of existing Accounting Theories. This exploratory research sets out to trace the evolution of accounting theories of Charge and Discharge Syndrome and the Corollary of Double Entry. Furthermore, it dives into the theories of Income Determination, garnishing it with areas of diversities in the use of Accounting Information while review of theories of recent growths and developments in Accounting are not left out. The method of research adopted is exploratory review of existing accounting literature. It is observed that the emergence of these theories exist to minimize fraud, errors, misappropriations and pilfering of Corporate assets. It is recommended that implementation prescriptions of these theories by International Financial Reporting Standard Committee and Practicing Accountants should be adhered to and simplified so as to avoid confusing and scandalous reporting of financial statements.', '2017-08-15', 4, 0, 'Published', 1, 0, 0, 'cover/5b69239c267674.09042148.jpg', 'book/5b69239c271789.01418217.doc'),
(2, 'Around the World in 80 Days', 'Mr. Phileas Fogg lived, in 1872, at No. 7, Saville Row, Burlington Gardens, the house in which Sheridan died in 1814. He was one of the most noticeable members of the Reform Club, though he seemed always to avoid attracting attention; an enigmatical personage, about whom little was known, except that he was a polished man of the world. People said that he resembled ByronÃ¢â‚¬â€ at least that his head was Byronic; but he was a bearded, tranquil Byron, who might live on a thousand years without growing old.', '2018-08-07', 4, 0, 'Completed', 1, 0, 7, 'cover/5b6924da0a2c42.53484210.jpg', 'book/5b6924da0ac802.20529897.doc'),
(3, 'BASIC ACCOUNTING', 'We have studied economic activities which have been converted into business activities. In business activity a lot of Ã¢â‚¬Å“give & takeÃ¢â‚¬Â exist which is known as transaction. Transaction involves transfer of money or moneyÃ¢â‚¬â„¢s worth. Thus exchange of money, goods & services between the parties is known to have resulted in a transaction. It is necessary to record all these transactions very systematically & scientifically so that the financial relationship of a business with other persons may be properly understood, profit & loss and financial position of the business may be worked out at a particular date. The procedure to record all these transactions is known as Ã¢â‚¬Å“Book-keepingÃ¢â‚¬Â.', '1955-03-12', 4, 0, 'Unpublish', 1, 0, 0, 'cover/default-book-cover.png', 'book/5b692582cfbd61.70578984.doc'),
(4, 'Accounting Principles', 'In other words the book keeping may be defined as an activity concerned with the recording of financial data relating to business operations in an orderly manner. Book keeping is the recording phase of accounting. Accounting is based on an efficient system of book keeping.\nAccounting is the analysis & interpretation of book keeping records. It includes not only the maintenance of accounting records but also the preparation of financial & economic information which involves the measurement of transactions & other events relating to entry.', '1875-12-02', 13, 0, 'Unpublish', 1, 0, 0, 'cover/5b6d54f13146c6.19048394.jpeg', 'book/5b6d54f13bc3b2.69575014.doc'),
(5, 'This is Title', 'dawdacwa', '2018-08-11', 7, 0, 'Published', 1, 0, 0, 'cover/default-book-cover.png', 'book/5b6d550b2f39d5.35826276.docx'),
(7, 'Pride and Prejudice', 'It is a truth universally acknowledged, that a single man in possession of a good fortune, must be in want of a wife.\nHowever little known the feelings or views of such a man may be on his first entering a neighborhood, this truth is so well fixed in the minds of the surrounding families, that he is considered the rightful property of someone or other of their daughters.\n', '2018-08-10', 1, 0, 'Unpublish', 1, 0, 0, 'cover/5b6d5687006d58.51285359.jpg', 'book/5b6d5687011380.72724443.docx'),
(8, 'Prince of Persia', 'sdsfdnjnjnjknjdfhsf', '2018-08-18', 18, 0, 'Published', 1, 0, 0, 'cover/5b6d5de7167c49.53005729.jpg', 'book/5b6d5de716fe29.37553952.docx'),
(9, 'The Hungre Games', 'Abstract ni.', '2018-08-04', 1, 0, 'Unpublish', 1, 0, 0, 'cover/5b6dc0c9876063.78296975.jpg', 'book/5b6dc0c987ade9.57395055.docx'),
(10, 'Test for RefKey', 'dawsegdtfhb', '2018-08-25', 3, 0, 'Published', 1, 0, 0, 'cover/5b6dc96cc14e26.08284290.png', 'book/5b6dc96cc19aa8.32236755.docx'),
(11, 'Test Again', ',lenjfhbgvyjh', '2018-08-16', 18, 0, 'Unpublish', 1, 0, 0, 'cover/default-book-cover.png', 'book/5b6dcaad222f09.26641695.docx'),
(12, 'Test3', 'davfcdwgjhbnm', '2018-08-02', 19, 0, 'Unpublish', 1, 0, 0, 'cover/default-book-cover.png', 'book/5b6dcb1542dcd4.27159758.docx');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `section` varchar(15) NOT NULL,
  `description` varchar(40) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` smallint(6) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dictionary`
--

CREATE TABLE `dictionary` (
  `id` int(20) NOT NULL,
  `word` varchar(45) NOT NULL,
  `index_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disseminated`
--

CREATE TABLE `disseminated` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `location` varchar(15) NOT NULL,
  `description` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disseminated`
--

INSERT INTO `disseminated` (`id`, `book_id`, `location`, `description`) VALUES
(2, 2, 'Local', 'dawdaw');

-- --------------------------------------------------------

--
-- Table structure for table `groupdoc`
--

CREATE TABLE `groupdoc` (
  `id` int(11) NOT NULL,
  `accid` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupdoc`
--

INSERT INTO `groupdoc` (`id`, `accid`, `book_id`) VALUES
(1, 7, 1),
(6, 6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `indexes`
--

CREATE TABLE `indexes` (
  `index_id` bigint(20) NOT NULL,
  `word_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `offset` int(11) NOT NULL,
  `end` tinyint(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `junc_advicerbook`
--

CREATE TABLE `junc_advicerbook` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `adv_id` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_advicerbook`
--

INSERT INTO `junc_advicerbook` (`id`, `book_id`, `adv_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(5, 4, 1),
(6, 5, 4),
(7, 5, 4),
(8, 9, 5),
(9, 10, 6),
(10, 11, 7),
(11, 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `junc_authorbook`
--

CREATE TABLE `junc_authorbook` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `aut_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_authorbook`
--

INSERT INTO `junc_authorbook` (`id`, `book_id`, `aut_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 5),
(5, 5, 6),
(7, 7, 7),
(8, 9, 10),
(9, 10, 11),
(10, 11, 12),
(11, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `junc_bookkeywords`
--

CREATE TABLE `junc_bookkeywords` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `keywords_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_bookkeywords`
--

INSERT INTO `junc_bookkeywords` (`id`, `book_id`, `keywords_id`) VALUES
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 2, 10),
(9, 2, 11),
(10, 2, 12),
(11, 3, 13),
(16, 4, 16),
(17, 4, 17),
(18, 4, 18),
(19, 5, 19),
(20, 5, 19),
(25, 7, 20),
(26, 7, 21),
(27, 8, 27),
(28, 8, 28),
(29, 9, 29),
(30, 9, 30),
(31, 10, 31),
(32, 11, 32),
(33, 12, 33);

-- --------------------------------------------------------

--
-- Table structure for table `junk_accountbook`
--

CREATE TABLE `junk_accountbook` (
  `id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `junk_bookref`
--

CREATE TABLE `junk_bookref` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `webref_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junk_bookref`
--

INSERT INTO `junk_bookref` (`id`, `book_id`, `webref_id`) VALUES
(2, 2, 2),
(4, 1, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(12, 4, 7),
(13, 5, 10),
(14, 5, 10),
(19, 7, 11),
(20, 8, 13),
(21, 8, 14),
(22, 8, 15),
(23, 9, 16),
(24, 10, 17),
(25, 11, 18),
(26, 12, 19);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(11) NOT NULL,
  `key_words` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `key_words`) VALUES
(30, 'and key'),
(11, 'Around the World'),
(16, 'Assets'),
(13, 'Business Environment'),
(18, 'Capital'),
(23, 'Capital Contribution'),
(26, 'Common Seal'),
(7, 'Corporate Reports'),
(32, 'dawdawd'),
(31, 'dawdawdwd'),
(19, 'dawdawxa'),
(33, 'dawefgtfgyu'),
(9, 'Developments in Acco'),
(24, 'Distribution of Profit'),
(17, 'Equity'),
(6, 'Financial Reporting'),
(8, 'Financial Statements'),
(14, 'index'),
(22, 'Liability'),
(15, 'literature'),
(28, 'persia'),
(10, 'PHILEAS FOGG '),
(20, 'possession'),
(21, 'Pride and Prejudice'),
(27, 'prince'),
(5, 'Review of Accounting'),
(29, 'This Key'),
(25, 'Transferability of Shares'),
(12, 'world');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `nickname`, `email`, `password`) VALUES
(1, 'anne', 'anne', 'anne@gmail.com', 'anne');

-- --------------------------------------------------------

--
-- Table structure for table `published`
--

CREATE TABLE `published` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issn` varchar(50) NOT NULL,
  `journal` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `published`
--

INSERT INTO `published` (`id`, `book_id`, `issn`, `journal`) VALUES
(1, 1, '34567', 'jokh'),
(3, 2, '56', 'rwr');

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE `ref` (
  `id` int(11) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref`
--

INSERT INTO `ref` (`id`, `link`) VALUES
(2, 'google.com'),
(4, 'www.iiste.org'),
(5, 'Dickens, Charles, and Simon Schama. 1990. A tale of two cities. New York: Vintage Books.'),
(6, 'Dickens, Charles, and Simon Schama. A Tale of Two Cities. New York: Vintage Books, 1990. Print.'),
(7, 'DIPLOMA IN INSURANCE SERVICES'),
(8, 'https://www.urbandictionary.com/define.php?term=Literally'),
(9, ''),
(10, 'dawdawd'),
(11, 'Austen, J. (1995). Pride and prejudice. New York: Modern Library.'),
(12, 'SRI K.O.FRANCIS'),
(13, 'prince '),
(14, 'the prince '),
(15, 'www.prince.com'),
(16, 'ref and ref'),
(17, 'ddawdawd'),
(18, 'ceaef'),
(19, 'esfdrfthbdrg');

-- --------------------------------------------------------

--
-- Table structure for table `referencekey`
--

CREATE TABLE `referencekey` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `refkey` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referencekey`
--

INSERT INTO `referencekey` (`id`, `book_id`, `refkey`) VALUES
(1, 11, 'wA57Pwq1kWK2NI9SbbzvdF123cwueanj'),
(2, 12, 'wA57Pwq1wWK2NI9SbbzvdF123cwueanj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username and password unique` (`u_name`,`password`);

--
-- Indexes for table `acesskey`
--
ALTER TABLE `acesskey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adviser`
--
ALTER TABLE `adviser`
  ADD PRIMARY KEY (`adv_id`),
  ADD UNIQUE KEY `adv_name` (`adv_fname`);

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `author name unique` (`a_fname`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book name unique` (`book_title`),
  ADD KEY `Book Has a Category` (`department`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `word must unique` (`word`);

--
-- Indexes for table `disseminated`
--
ALTER TABLE `disseminated`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disseminated_ibfk_1` (`book_id`);

--
-- Indexes for table `groupdoc`
--
ALTER TABLE `groupdoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accid` (`accid`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `indexes`
--
ALTER TABLE `indexes`
  ADD PRIMARY KEY (`index_id`),
  ADD UNIQUE KEY `word id book id offset unique` (`word_id`,`book_id`,`offset`),
  ADD KEY `word_id` (`word_id`),
  ADD KEY `index_id` (`index_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `offset` (`offset`);

--
-- Indexes for table `junc_advicerbook`
--
ALTER TABLE `junc_advicerbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `adv_id` (`adv_id`);

--
-- Indexes for table `junc_authorbook`
--
ALTER TABLE `junc_authorbook`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `AuthorBook` (`book_id`,`aut_id`),
  ADD KEY `Pk_author_id` (`aut_id`);

--
-- Indexes for table `junc_bookkeywords`
--
ALTER TABLE `junc_bookkeywords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book have manay key words` (`book_id`),
  ADD KEY `many to many` (`keywords_id`);

--
-- Indexes for table `junk_accountbook`
--
ALTER TABLE `junk_accountbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `junction author` (`acc_id`),
  ADD KEY `junction book` (`book_id`);

--
-- Indexes for table `junk_bookref`
--
ALTER TABLE `junk_bookref`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Book` (`book_id`),
  ADD KEY `WebRefence` (`webref_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywordsUnique` (`key_words`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `published`
--
ALTER TABLE `published`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referencekey`
--
ALTER TABLE `referencekey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `acesskey`
--
ALTER TABLE `acesskey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=978;
--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `adv_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dictionary`
--
ALTER TABLE `dictionary`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disseminated`
--
ALTER TABLE `disseminated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `groupdoc`
--
ALTER TABLE `groupdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `indexes`
--
ALTER TABLE `indexes`
  MODIFY `index_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `junc_advicerbook`
--
ALTER TABLE `junc_advicerbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `junc_authorbook`
--
ALTER TABLE `junc_authorbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `junc_bookkeywords`
--
ALTER TABLE `junc_bookkeywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `junk_accountbook`
--
ALTER TABLE `junk_accountbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `junk_bookref`
--
ALTER TABLE `junk_bookref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `published`
--
ALTER TABLE `published`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `referencekey`
--
ALTER TABLE `referencekey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `Book Has a Category` FOREIGN KEY (`department`) REFERENCES `department` (`id`);

--
-- Constraints for table `disseminated`
--
ALTER TABLE `disseminated`
  ADD CONSTRAINT `disseminated_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `groupdoc`
--
ALTER TABLE `groupdoc`
  ADD CONSTRAINT `groupdoc_ibfk_1` FOREIGN KEY (`accid`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `groupdoc_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `indexes`
--
ALTER TABLE `indexes`
  ADD CONSTRAINT `fk book id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk word id` FOREIGN KEY (`word_id`) REFERENCES `dictionary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `junc_advicerbook`
--
ALTER TABLE `junc_advicerbook`
  ADD CONSTRAINT `Pk_Advicer` FOREIGN KEY (`adv_id`) REFERENCES `adviser` (`adv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Pk_book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `junc_authorbook`
--
ALTER TABLE `junc_authorbook`
  ADD CONSTRAINT `Pk_author_id` FOREIGN KEY (`aut_id`) REFERENCES `author` (`a_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Pk_book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `junc_bookkeywords`
--
ALTER TABLE `junc_bookkeywords`
  ADD CONSTRAINT `book have manay key words` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `many to many` FOREIGN KEY (`keywords_id`) REFERENCES `keywords` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `junk_accountbook`
--
ALTER TABLE `junk_accountbook`
  ADD CONSTRAINT `junction author` FOREIGN KEY (`acc_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `junction book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `junk_bookref`
--
ALTER TABLE `junk_bookref`
  ADD CONSTRAINT `Book` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `WebRefence` FOREIGN KEY (`webref_id`) REFERENCES `ref` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `published`
--
ALTER TABLE `published`
  ADD CONSTRAINT `published_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `referencekey`
--
ALTER TABLE `referencekey`
  ADD CONSTRAINT `referencekey_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
