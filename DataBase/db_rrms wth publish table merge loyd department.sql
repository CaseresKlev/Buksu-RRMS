-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 09:59 PM
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
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `g_name`, `u_name`, `password`, `activate`, `type`) VALUES
(1, 'voidmain', 'admin', '1111', 0, 'admin'),
(3, 'fefe', 'ggg', 'qqq', 0, 'user'),
(4, 'group', 'efwwf', 'weffwf', 0, 'user'),
(5, 'fwefewf', 'efwfe', 'ewfef', 0, 'user'),
(6, 'fewfwff', 'wefewf', 'fwfwfe', 0, 'user'),
(7, 'tertretet', 'retretet', 'ertretertrt', 0, 'user'),
(8, 'momoland', 'nancy', '1234', 0, 'user'),
(9, 'v,,,', 'cccc', 'ccc,,,', 0, 'user'),
(11, 'loyd', 'anthony', '1234', 0, 'user');

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
(1, 'ZOmW9U2a', 'instructor', 0, '2018-08-08'),
(2, 'U5Ly68hY', 'instructor', 0, '2018-08-08'),
(3, '6rWtD08y', 'instructor', 0, '2018-08-08'),
(4, 'CgpGzbrG', 'instructor', 0, '2018-08-08'),
(5, '3V3IlxpT', 'instructor', 0, '2018-08-08'),
(6, 'ZLVDyVO9', 'instructor', 0, '2018-08-08'),
(7, 'gLwbcWGu', 'instructor', 0, '2018-08-08'),
(8, 'kOACCyx7', 'instructor', 0, '2018-08-08'),
(9, '6PAR39Zt', 'instructor', 0, '2018-08-08'),
(10, 'NyEN53Tm', 'instructor', 0, '2018-08-08'),
(11, 'EdaIXUOC', 'instructor', 0, '2018-08-08'),
(12, '2moWuTWH', 'instructor', 0, '2018-08-08'),
(13, 'FQWd7ZYB', 'instructor', 0, '2018-08-08'),
(14, 'OjU8pubk', 'instructor', 0, '2018-08-08'),
(15, 'Nw4e893a', 'instructor', 0, '2018-08-08'),
(16, '8fkZcnpF', 'instructor', 0, '2018-08-08'),
(17, '77HjnS2u', 'instructor', 0, '2018-08-08'),
(18, 'uOCIRYdv', 'instructor', 0, '2018-08-08'),
(19, 'QuCDTGvl', 'instructor', 0, '2018-08-08'),
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
(46, 'jNtcgvnn', 'instructor', 0, '2018-08-08'),
(47, 'i2E6smDo', 'instructor', 0, '2018-08-08'),
(48, 'H2jtwnTl', 'instructor', 0, '2018-08-08'),
(49, 'SL9DsGrT', 'instructor', 0, '2018-08-08'),
(50, 'E4XcrdkS', 'instructor', 0, '2018-08-08'),
(51, 'x91m6p8r', 'instructor', 0, '2018-08-08'),
(52, 'PAhYYMmR', 'instructor', 0, '2018-08-08'),
(53, 'QTIFaSel', 'instructor', 0, '2018-08-08'),
(54, 'friuZApZ', 'instructor', 0, '2018-08-08'),
(55, 'DADW3Y5a', 'instructor', 0, '2018-08-08'),
(56, 'l7sq1BZi', 'instructor', 0, '2018-08-08'),
(57, 'VQ6AOMe5', 'instructor', 0, '2018-08-08'),
(58, 'xBwoMYL5', 'instructor', 0, '2018-08-08'),
(59, 'S6WUnx17', 'instructor', 0, '2018-08-08'),
(60, 'pIMCzEtY', 'instructor', 0, '2018-08-08'),
(61, 'ItHtglQV', 'instructor', 0, '2018-08-08'),
(62, '7E1r3gWe', 'instructor', 0, '2018-08-08'),
(63, 'BBB8OoiK', 'instructor', 0, '2018-08-08'),
(64, 'Qao3JbD0', 'instructor', 0, '2018-08-08'),
(65, 'LORwoMIq', 'instructor', 0, '2018-08-08'),
(66, '41RWEe1G', 'instructor', 0, '2018-08-08'),
(67, 'fhUfv9at', 'instructor', 0, '2018-08-08'),
(68, 'uwCFODfm', 'instructor', 0, '2018-08-08'),
(69, 'WUVM8Ato', 'instructor', 0, '2018-08-08'),
(70, 'W5SQ7vWR', 'instructor', 0, '2018-08-08'),
(71, 'gOLRPGrW', 'instructor', 0, '2018-08-08'),
(72, 'fIzhwejk', 'instructor', 0, '2018-08-08'),
(73, 'RJel1ZjU', 'instructor', 0, '2018-08-08'),
(74, 'FxurN4eD', 'instructor', 0, '2018-08-08'),
(75, '5uWZ8pzD', 'instructor', 0, '2018-08-08'),
(76, 'sKZVEaMr', 'instructor', 0, '2018-08-08'),
(77, 'A8caAMIO', 'instructor', 0, '2018-08-08'),
(78, 'q4qW9VPP', 'instructor', 0, '2018-08-08'),
(79, 'IdebBVvg', 'instructor', 0, '2018-08-08'),
(80, '9fzaggVl', 'instructor', 0, '2018-08-08'),
(81, 'FeG2xvyp', 'instructor', 0, '2018-08-08'),
(82, 'RpEb6TAe', 'instructor', 0, '2018-08-08'),
(83, 'ymB3X0NH', 'instructor', 0, '2018-08-08'),
(84, 'Zq7YfTxe', 'instructor', 0, '2018-08-08'),
(85, 'k0sKU1O0', 'instructor', 0, '2018-08-08'),
(86, 'Xwz9u5Eg', 'instructor', 0, '2018-08-08'),
(87, '6qFYBTsf', 'instructor', 0, '2018-08-08'),
(88, 'zzvzfUy0', 'instructor', 0, '2018-08-08'),
(89, 'de1CdD8E', 'instructor', 0, '2018-08-08'),
(90, 'lCl9KRs3', 'instructor', 0, '2018-08-08'),
(91, 'XST9wptE', 'instructor', 0, '2018-08-08'),
(92, '8Xit1nmB', 'instructor', 0, '2018-08-08'),
(93, '0LoAvDsl', 'instructor', 0, '2018-08-08'),
(94, '8C6jy2JP', 'instructor', 0, '2018-08-08'),
(95, '7t5Bj94J', 'instructor', 0, '2018-08-08'),
(96, 'FXAcdQre', 'instructor', 0, '2018-08-08'),
(97, '8kyjNsjc', 'instructor', 0, '2018-08-08'),
(98, 'tt8ia7az', 'instructor', 0, '2018-08-08'),
(99, '8klQgFE6', 'instructor', 0, '2018-08-08'),
(100, 'doXei2xR', 'instructor', 0, '2018-08-08'),
(101, 'guibFoRr', 'instructor', 0, '2018-08-08'),
(102, 'StBsItpb', 'instructor', 0, '2018-08-08'),
(103, 'TdId0r5g', 'instructor', 0, '2018-08-08'),
(104, 'rK4jiwqx', 'instructor', 0, '2018-08-08'),
(105, 'M5ZHrnng', 'instructor', 0, '2018-08-08'),
(106, 'UTpiWwEF', 'instructor', 0, '2018-08-08'),
(107, 'aOQuwdCu', 'instructor', 0, '2018-08-08'),
(108, '9VMLtF43', 'instructor', 0, '2018-08-08'),
(109, 'DImiZ69r', 'instructor', 0, '2018-08-08'),
(110, '4HBUa0eP', 'instructor', 0, '2018-08-08'),
(111, 'G5BIdfqB', 'instructor', 0, '2018-08-08'),
(112, 'KQgQ1o0u', 'instructor', 0, '2018-08-08'),
(113, 'Aj0PVRfm', 'instructor', 0, '2018-08-08'),
(114, 'jses8fQm', 'instructor', 0, '2018-08-08'),
(115, 'nqmdDlDH', 'instructor', 0, '2018-08-08'),
(116, '0ryu0Uxv', 'instructor', 0, '2018-08-08'),
(117, 'MfH3gpcY', 'instructor', 0, '2018-08-08'),
(118, 'KtQyemSk', 'instructor', 0, '2018-08-08'),
(119, '30a6yCHx', 'instructor', 0, '2018-08-08'),
(120, 'NHhmL2OX', 'instructor', 0, '2018-08-08'),
(121, 'bDLnYGA0', 'instructor', 0, '2018-08-08'),
(122, 'DmUdxoG0', 'instructor', 0, '2018-08-08'),
(123, '3ElwkUBt', 'instructor', 0, '2018-08-08'),
(124, 'Yqdp6hp2', 'instructor', 0, '2018-08-08'),
(125, 'TeiJffif', 'instructor', 0, '2018-08-08'),
(126, 'JFcpr5fB', 'instructor', 0, '2018-08-08'),
(127, '8R41YPr1', 'instructor', 0, '2018-08-08'),
(128, '43Zw9WMJ', 'instructor', 0, '2018-08-08'),
(129, 'fSQ1o9a8', 'instructor', 0, '2018-08-08'),
(130, 'zrwHdoqJ', 'instructor', 0, '2018-08-08'),
(131, 'sWzvztUi', 'instructor', 0, '2018-08-08'),
(132, 'Bdfalk8D', 'instructor', 0, '2018-08-08'),
(133, 'bOPpXCyY', 'instructor', 0, '2018-08-08'),
(134, 'e2vDzNnu', 'instructor', 0, '2018-08-08'),
(135, '9qCg0HuS', 'instructor', 0, '2018-08-08'),
(136, 'SbKRjD1D', 'instructor', 0, '2018-08-08'),
(137, 'EAKuxVJ4', 'instructor', 0, '2018-08-08'),
(138, 'MVRlUVNX', 'instructor', 0, '2018-08-08'),
(139, 'Iji852YP', 'instructor', 0, '2018-08-08'),
(140, 'UVjNsRku', 'instructor', 0, '2018-08-08'),
(141, 'vCYqZsI1', 'instructor', 0, '2018-08-08'),
(142, 'faJ31BOJ', 'instructor', 0, '2018-08-08'),
(143, 'goUm6ggT', 'instructor', 0, '2018-08-08'),
(144, 'Ag4An1LB', 'instructor', 0, '2018-08-08'),
(145, 'DdCnyoyr', 'instructor', 0, '2018-08-08'),
(146, 'yLoANyTA', 'instructor', 0, '2018-08-08'),
(147, 'hRLaBJsJ', 'instructor', 0, '2018-08-08'),
(148, '2p16rEfe', 'instructor', 0, '2018-08-08'),
(149, 'iWqRuPz8', 'instructor', 0, '2018-08-08'),
(150, 'xIzkcsBo', 'instructor', 0, '2018-08-08'),
(151, 'Kgl85LFc', 'instructor', 0, '2018-08-08'),
(152, 'jA7FKKkM', 'instructor', 0, '2018-08-08'),
(153, 'ILnYe8EX', 'instructor', 0, '2018-08-08'),
(154, 'LsROB3p0', 'instructor', 0, '2018-08-08'),
(155, 'jY7D2XWa', 'instructor', 0, '2018-08-08'),
(156, 'UyIqyqMu', 'instructor', 0, '2018-08-08'),
(157, 'WFCa7xIt', 'instructor', 0, '2018-08-08'),
(158, 'SyUd5qdT', 'instructor', 0, '2018-08-08'),
(159, 'hyABSsmt', 'instructor', 0, '2018-08-08'),
(160, 'NzaVHVyh', 'instructor', 0, '2018-08-08'),
(161, 'zrTNI5FU', 'instructor', 0, '2018-08-08'),
(162, 'jCsXqJMC', 'instructor', 0, '2018-08-08'),
(163, 'JdBeIeEy', 'instructor', 0, '2018-08-08'),
(164, 'gUnEqMrb', 'instructor', 0, '2018-08-08'),
(165, 'FRWOoxzh', 'instructor', 0, '2018-08-08'),
(166, 'd51ZZ2rf', 'instructor', 0, '2018-08-08'),
(167, 'cEpQvicy', 'instructor', 0, '2018-08-08'),
(168, 'ukVc5Pum', 'instructor', 0, '2018-08-08'),
(169, 'WzewE1pi', 'instructor', 0, '2018-08-08'),
(170, 'sbM90Evm', 'instructor', 0, '2018-08-08'),
(171, 'dP7EDso0', 'instructor', 0, '2018-08-08'),
(172, 'C2mn7BGI', 'instructor', 0, '2018-08-08'),
(173, 's8AqsMvg', 'instructor', 0, '2018-08-08'),
(174, 'iFpoH6pA', 'instructor', 0, '2018-08-08'),
(175, 'fsAG74r5', 'instructor', 0, '2018-08-08'),
(176, 'kO6UU8a4', 'instructor', 0, '2018-08-08'),
(177, 'klprirQX', 'instructor', 0, '2018-08-08'),
(178, 'Bkf6UTqn', 'instructor', 0, '2018-08-08'),
(179, '7CGuSHJb', 'instructor', 0, '2018-08-08'),
(180, '779H94PC', 'instructor', 0, '2018-08-08'),
(181, 'EnAeaJ52', 'instructor', 0, '2018-08-08'),
(182, '8k7vK5aj', 'instructor', 0, '2018-08-08'),
(183, 'wrRcpxO5', 'instructor', 0, '2018-08-08'),
(184, 'VMTFu76I', 'instructor', 0, '2018-08-08'),
(185, 'bhaCTrlU', 'instructor', 0, '2018-08-08'),
(186, 'GolOhSU4', 'instructor', 0, '2018-08-08'),
(187, 'qR9aITMt', 'instructor', 0, '2018-08-08'),
(188, '4L0koaVO', 'instructor', 0, '2018-08-08'),
(189, 'Ul5dlyPJ', 'instructor', 0, '2018-08-08'),
(190, 'raYat7Vo', 'instructor', 0, '2018-08-08'),
(191, '2BwS7bnL', 'instructor', 0, '2018-08-08'),
(192, 'vQ3pFSEx', 'instructor', 0, '2018-08-08'),
(193, 'TRA5DcSk', 'instructor', 0, '2018-08-08'),
(194, 'lFrlGxnG', 'instructor', 0, '2018-08-08'),
(195, 'W2CyertT', 'instructor', 0, '2018-08-08'),
(196, 'GDAesjWR', 'instructor', 0, '2018-08-08'),
(197, 'vCSRAzZl', 'instructor', 0, '2018-08-08'),
(198, 'wcnwIILj', 'instructor', 0, '2018-08-08'),
(199, '5sNXlUTX', 'instructor', 0, '2018-08-08'),
(200, 'rSiTBJlO', 'instructor', 0, '2018-08-08'),
(201, 'aWl1ZV5Y', 'instructor', 0, '2018-08-08'),
(202, 'gWDoJc7i', 'instructor', 0, '2018-08-08'),
(203, 'KbwHkkbV', 'instructor', 0, '2018-08-08'),
(204, 'K5a64bzw', 'instructor', 0, '2018-08-08'),
(205, '3J7t2HHF', 'instructor', 0, '2018-08-08'),
(206, 'B1wpGwIz', 'instructor', 0, '2018-08-08'),
(207, 'rTnskeYa', 'instructor', 0, '2018-08-08'),
(208, 'FkfgOUnD', 'instructor', 0, '2018-08-08'),
(209, 'bqtvJcJI', 'instructor', 0, '2018-08-08'),
(210, '9MAx5Gql', 'instructor', 0, '2018-08-08'),
(211, 'YFFFJj7Y', 'instructor', 0, '2018-08-08'),
(212, 'o1MSEpsr', 'instructor', 0, '2018-08-08'),
(213, 'XAlxKGIo', 'instructor', 0, '2018-08-08'),
(214, 'B2ipHgbM', 'instructor', 0, '2018-08-08'),
(215, 'kjze9HB4', 'instructor', 0, '2018-08-08'),
(216, 'iBPOV69D', 'instructor', 0, '2018-08-08'),
(217, 'bo9d0Ak9', 'instructor', 0, '2018-08-08'),
(218, 'UFRKMip8', 'instructor', 0, '2018-08-08'),
(219, 'P5vsltkG', 'instructor', 0, '2018-08-08'),
(220, 'fHeNjGTb', 'instructor', 0, '2018-08-08'),
(221, 'CF0HaqgE', 'instructor', 0, '2018-08-08'),
(222, 'ui4alDN8', 'instructor', 0, '2018-08-08'),
(223, 'CnCj2gHZ', 'instructor', 0, '2018-08-08'),
(224, 'A2afJpaI', 'instructor', 0, '2018-08-08'),
(225, 'SEUqO75D', 'instructor', 0, '2018-08-08'),
(226, 'fKxHjH9Q', 'instructor', 0, '2018-08-08'),
(227, 'TP324wNr', 'instructor', 0, '2018-08-08'),
(228, 'E9jhxGMh', 'instructor', 0, '2018-08-08'),
(229, 'mF33abqE', 'instructor', 0, '2018-08-08'),
(230, 'kv54p3n3', 'instructor', 0, '2018-08-08'),
(231, '4ni1pfT1', 'instructor', 0, '2018-08-08'),
(232, 'o6yAEw7p', 'instructor', 0, '2018-08-08'),
(233, 'rlUh3mvw', 'instructor', 0, '2018-08-08'),
(234, '6DSXfwcl', 'instructor', 0, '2018-08-08'),
(235, 'Itbvcgxh', 'instructor', 0, '2018-08-08'),
(236, 'HYYMxHkz', 'instructor', 0, '2018-08-08'),
(237, 'dBVCPu8k', 'instructor', 0, '2018-08-08'),
(238, 'kH0caLlQ', 'instructor', 0, '2018-08-08'),
(239, 'f1BLzj0Y', 'instructor', 0, '2018-08-08'),
(240, 'eR3hBwLo', 'instructor', 0, '2018-08-08'),
(241, 'BE4qyNS0', 'instructor', 0, '2018-08-08'),
(242, 'OQrGYaJ2', 'instructor', 0, '2018-08-08'),
(243, 'UX00RIbi', 'instructor', 0, '2018-08-08'),
(244, 'ZRBtR35P', 'instructor', 0, '2018-08-08'),
(245, 'wNYwBwv3', 'instructor', 0, '2018-08-08'),
(246, 'df0JaI0E', 'instructor', 0, '2018-08-08'),
(247, 'yxJGuboK', 'instructor', 0, '2018-08-08'),
(248, 'DOwodovF', 'instructor', 0, '2018-08-08'),
(249, 'rvtdFLkm', 'instructor', 0, '2018-08-08'),
(250, 'qyoXbKgG', 'instructor', 0, '2018-08-08'),
(251, '6EO72i0V', 'instructor', 0, '2018-08-08'),
(252, 'kOUYYpPu', 'instructor', 0, '2018-08-08'),
(253, 'dGgA0jpP', 'instructor', 0, '2018-08-08'),
(254, 'gTduJdXy', 'instructor', 0, '2018-08-08'),
(255, 'xCXIESAH', 'instructor', 0, '2018-08-08'),
(256, 'r0iBE5oV', 'instructor', 0, '2018-08-08'),
(257, 'ZFfrdq0U', 'instructor', 0, '2018-08-08'),
(258, 'YLEUOCoO', 'instructor', 0, '2018-08-08'),
(259, 'KZxIApBI', 'instructor', 0, '2018-08-08'),
(260, 'Ok1sTYqM', 'instructor', 0, '2018-08-08'),
(261, 'Nhaa6Llz', 'instructor', 0, '2018-08-08'),
(262, 'iD2vR6nn', 'instructor', 0, '2018-08-08'),
(263, '25o3oPLI', 'instructor', 0, '2018-08-08'),
(264, '8OGTLVZg', 'instructor', 0, '2018-08-08'),
(265, 'pYESbqzn', 'instructor', 0, '2018-08-08'),
(266, 'TUTWEKvh', 'instructor', 0, '2018-08-08'),
(267, 'trnEMxYx', 'instructor', 0, '2018-08-08'),
(268, 'SFbhgZbq', 'instructor', 0, '2018-08-08'),
(269, 'rZdY2m7x', 'instructor', 0, '2018-08-08'),
(270, 'yEZBE5Xv', 'instructor', 0, '2018-08-08'),
(271, 'zrukgVTb', 'instructor', 0, '2018-08-08'),
(272, 'Rh8HN37H', 'instructor', 0, '2018-08-08'),
(273, '2MAgXct1', 'instructor', 0, '2018-08-08'),
(274, '2eiJaWOv', 'instructor', 0, '2018-08-08'),
(275, 'ZP5iEtWW', 'instructor', 0, '2018-08-08'),
(276, '7rgivDGf', 'instructor', 0, '2018-08-08'),
(277, 'EPNpt3gD', 'instructor', 0, '2018-08-08'),
(278, 'ICIswHZt', 'instructor', 0, '2018-08-08'),
(279, 'vgiq3Aof', 'instructor', 0, '2018-08-08'),
(280, 'cP3f3gro', 'instructor', 0, '2018-08-08'),
(281, 'eLlxxUKv', 'instructor', 0, '2018-08-08'),
(282, 'WnidfvOP', 'instructor', 0, '2018-08-08'),
(283, 'qTH7thIA', 'instructor', 0, '2018-08-08'),
(284, 'gtuGunMu', 'instructor', 0, '2018-08-08'),
(285, 'iGQO5eGq', 'instructor', 0, '2018-08-08'),
(286, 'ajInU1mM', 'instructor', 0, '2018-08-08'),
(287, 'ykuUVzVk', 'instructor', 0, '2018-08-08'),
(288, '45XBsLwu', 'instructor', 0, '2018-08-08'),
(289, 'QgNxKcRd', 'instructor', 0, '2018-08-08'),
(290, 'xRttGT3Q', 'instructor', 0, '2018-08-08'),
(291, 'rqGe7Zxm', 'instructor', 0, '2018-08-08'),
(292, '32SukEdZ', 'instructor', 0, '2018-08-08'),
(293, 'rLzLXx0i', 'instructor', 0, '2018-08-08'),
(294, 'y4b0p0Jd', 'instructor', 0, '2018-08-08'),
(295, 'Qkotb4LU', 'instructor', 0, '2018-08-08'),
(296, 'yvvELRbU', 'instructor', 0, '2018-08-08'),
(297, 'XHJSQ22V', 'instructor', 0, '2018-08-08'),
(298, 'B1vnnOYk', 'instructor', 0, '2018-08-08'),
(299, 'zuRPoe6i', 'instructor', 0, '2018-08-08'),
(300, 'kKvG0NAE', 'instructor', 0, '2018-08-08'),
(301, 'jkWXYpfQ', 'instructor', 0, '2018-08-08'),
(302, 'cqXjjaCR', 'instructor', 0, '2018-08-08'),
(303, 'uKuyFkhm', 'instructor', 0, '2018-08-08'),
(304, 'kitrzJj1', 'instructor', 0, '2018-08-08'),
(305, 'eytjrkig', 'instructor', 0, '2018-08-08'),
(306, 'RpuN4i4U', 'instructor', 0, '2018-08-08'),
(307, 'U6aTGIg2', 'instructor', 0, '2018-08-08'),
(308, 'CLRaduvO', 'instructor', 0, '2018-08-08'),
(309, 'cAttv8V9', 'instructor', 0, '2018-08-08'),
(310, '6GobK3CU', 'instructor', 0, '2018-08-08'),
(311, 'IaR8K4NN', 'instructor', 0, '2018-08-08'),
(312, 'GFKR2q9Y', 'instructor', 0, '2018-08-08'),
(313, 'BSG89he8', 'instructor', 0, '2018-08-08'),
(314, 'AnxRfHh8', 'instructor', 0, '2018-08-08'),
(315, 'bznLOutJ', 'instructor', 0, '2018-08-08'),
(316, 'cXkxD3uF', 'instructor', 0, '2018-08-08'),
(317, '57bFR6rf', 'instructor', 0, '2018-08-08'),
(318, '7Oc6Twpt', 'instructor', 0, '2018-08-08'),
(319, 'HLwVFURn', 'instructor', 0, '2018-08-08'),
(320, 'wVLhazQO', 'instructor', 0, '2018-08-08'),
(321, 'ql6WtOgO', 'instructor', 0, '2018-08-08'),
(322, '5CdHC4k7', 'instructor', 0, '2018-08-08'),
(323, 'VHwN9S0t', 'instructor', 0, '2018-08-08'),
(324, 'CRqBZdnq', 'instructor', 0, '2018-08-08'),
(325, 'LJLOrD7Y', 'instructor', 0, '2018-08-08'),
(326, 'YmMmrwNs', 'instructor', 0, '2018-08-08'),
(327, 'CTCqKxxJ', 'instructor', 0, '2018-08-08'),
(328, 'WSEQLsba', 'instructor', 0, '2018-08-08'),
(329, 'DN8xxDhf', 'instructor', 0, '2018-08-08'),
(330, 'jKF5fnvB', 'instructor', 0, '2018-08-08'),
(331, 'oSdxrE3m', 'instructor', 0, '2018-08-08'),
(332, '3sLKHMpH', 'instructor', 0, '2018-08-08'),
(333, '1jjgU01j', 'instructor', 0, '2018-08-08'),
(334, 'WlZELc1J', 'instructor', 0, '2018-08-08'),
(335, 'oZlpUy3q', 'instructor', 0, '2018-08-08'),
(336, 'UOOeiUpO', 'instructor', 0, '2018-08-08'),
(337, 'enleBPxs', 'instructor', 0, '2018-08-08'),
(338, 'EjJTXKge', 'instructor', 0, '2018-08-08'),
(339, 'Bu3RmNWD', 'instructor', 0, '2018-08-08'),
(340, 'yVR1XNvm', 'instructor', 0, '2018-08-08'),
(341, 'gMYZf2YJ', 'instructor', 0, '2018-08-08'),
(342, 'XzTkeu4G', 'instructor', 0, '2018-08-08'),
(343, 'zxJPimSs', 'instructor', 0, '2018-08-08'),
(344, 'Wo0GjiFh', 'instructor', 0, '2018-08-08'),
(345, 'eRb3yawA', 'instructor', 0, '2018-08-08'),
(346, 'rKBD2Hog', 'instructor', 0, '2018-08-08'),
(347, 'KY6reTHQ', 'instructor', 0, '2018-08-08'),
(348, 'LjVKa9Cn', 'instructor', 0, '2018-08-08'),
(349, 'kIgjQyov', 'instructor', 0, '2018-08-08'),
(350, 'xByBQyez', 'instructor', 0, '2018-08-08'),
(351, '3ISNRxUq', 'instructor', 0, '2018-08-08'),
(352, 'OY7Odbil', 'instructor', 0, '2018-08-08'),
(353, '9uLknTyD', 'instructor', 0, '2018-08-08'),
(354, 'luhdHbcq', 'instructor', 0, '2018-08-08'),
(355, '3rexPT0B', 'instructor', 0, '2018-08-08'),
(356, 'btkSbQpZ', 'instructor', 0, '2018-08-08'),
(357, 'Wd5IG6aa', 'instructor', 0, '2018-08-08'),
(358, 'rGyPE7bz', 'instructor', 0, '2018-08-08'),
(359, '8otVcBrN', 'instructor', 0, '2018-08-08'),
(360, '3LRE5odG', 'instructor', 0, '2018-08-08'),
(361, '2r4WVrrw', 'instructor', 0, '2018-08-08'),
(362, 'jx1ot5rO', 'instructor', 0, '2018-08-08'),
(363, 'Tph9fnQp', 'instructor', 0, '2018-08-08'),
(364, 'UbEIc5xE', 'instructor', 0, '2018-08-08'),
(365, 'vYavI9NZ', 'instructor', 0, '2018-08-08'),
(366, 'lGz65JGj', 'instructor', 0, '2018-08-08'),
(367, 'lMdUw8G1', 'instructor', 0, '2018-08-08'),
(368, 'nja7qABD', 'instructor', 0, '2018-08-08'),
(369, 'zm1kCUcB', 'instructor', 0, '2018-08-08'),
(370, 'dXpAMzk6', 'instructor', 0, '2018-08-08'),
(371, 'wTCgWHSI', 'instructor', 0, '2018-08-08'),
(372, 'COzRtEw7', 'instructor', 0, '2018-08-08'),
(373, 'OLXBimt2', 'instructor', 0, '2018-08-08'),
(374, 'O9vdkZpK', 'instructor', 0, '2018-08-08'),
(375, 'FeCI5zf5', 'instructor', 0, '2018-08-08'),
(376, 'gQgXted7', 'instructor', 0, '2018-08-08'),
(377, 'ZCRS71Pn', 'instructor', 0, '2018-08-08'),
(378, 'GH8YxpUL', 'instructor', 0, '2018-08-08'),
(379, 'tJxGx3Fp', 'instructor', 0, '2018-08-08'),
(380, 'ktLCrqqZ', 'instructor', 0, '2018-08-08'),
(381, '9T9xYzEq', 'instructor', 0, '2018-08-08'),
(382, 'FYF3x1o4', 'instructor', 0, '2018-08-08'),
(383, 'T0R96DyH', 'instructor', 0, '2018-08-08'),
(384, '2FzomYYn', 'instructor', 0, '2018-08-08'),
(385, '3yxfBOxL', 'instructor', 0, '2018-08-08'),
(386, 'bjPGzpHr', 'instructor', 0, '2018-08-08'),
(387, 'ZXBWprMh', 'instructor', 0, '2018-08-08'),
(388, 'E70QIZtK', 'instructor', 0, '2018-08-08'),
(389, 'qYRJV3rL', 'instructor', 0, '2018-08-08'),
(390, 'xkL79yv3', 'instructor', 0, '2018-08-08'),
(391, 'h2SNY1P2', 'instructor', 0, '2018-08-08'),
(392, 'jCMC32PW', 'instructor', 0, '2018-08-08'),
(393, 'h03lj1tr', 'instructor', 0, '2018-08-08'),
(394, 'RXHjCwur', 'instructor', 0, '2018-08-08'),
(395, 'BNAPwnTK', 'instructor', 0, '2018-08-08'),
(396, 'ToNErgiQ', 'instructor', 0, '2018-08-08'),
(397, 'WmflJPnd', 'instructor', 0, '2018-08-08'),
(398, 'i9EDaINC', 'instructor', 0, '2018-08-08'),
(399, 'eUJkjbS7', 'instructor', 0, '2018-08-08'),
(400, 'ESaku2Mt', 'instructor', 0, '2018-08-08'),
(401, 'VYCE3lA8', 'instructor', 0, '2018-08-08'),
(402, 'QXSscjZv', 'instructor', 0, '2018-08-08'),
(403, 'rBHObZUA', 'instructor', 0, '2018-08-08'),
(404, '1kO6yMb8', 'instructor', 0, '2018-08-08'),
(405, 'PQOY9cdo', 'instructor', 0, '2018-08-08'),
(406, 'QQFNknCV', 'instructor', 0, '2018-08-08'),
(407, 'oMysk1Mf', 'instructor', 0, '2018-08-08'),
(408, '6gqPhWoE', 'instructor', 0, '2018-08-08'),
(409, 'A35l1cLp', 'instructor', 0, '2018-08-08'),
(410, 'NfIdCmIs', 'instructor', 0, '2018-08-08'),
(411, 'wH1LIa8N', 'instructor', 0, '2018-08-08'),
(412, '3mQZ356d', 'instructor', 0, '2018-08-08'),
(413, '0MVpOA4w', 'instructor', 0, '2018-08-08'),
(414, 'RUZFsn95', 'instructor', 0, '2018-08-08'),
(415, 'tFFQRcmj', 'instructor', 0, '2018-08-08'),
(416, 'YWOki78E', 'instructor', 0, '2018-08-08'),
(417, 'rRmi7m0Y', 'instructor', 0, '2018-08-08'),
(418, 'R2pcKM9X', 'instructor', 0, '2018-08-08'),
(419, 'w7skNlml', 'instructor', 0, '2018-08-08'),
(420, 'z6V1d91i', 'instructor', 0, '2018-08-08'),
(421, '5rSlSoay', 'instructor', 0, '2018-08-08'),
(422, 'hepXIaJo', 'instructor', 0, '2018-08-08'),
(423, 'gxrF2EGS', 'instructor', 0, '2018-08-08'),
(424, 'pFRfgEIB', 'instructor', 0, '2018-08-08'),
(425, 'OxisUBYD', 'instructor', 0, '2018-08-08'),
(426, 'kKTiJSDK', 'instructor', 0, '2018-08-08'),
(427, 'B05VXVor', 'instructor', 0, '2018-08-08'),
(428, 'K00HlNPW', 'instructor', 0, '2018-08-08'),
(429, 'cAuLs5Ow', 'instructor', 0, '2018-08-08'),
(430, 'wll5vRX8', 'instructor', 0, '2018-08-08'),
(431, 'rzxea15V', 'instructor', 0, '2018-08-08'),
(432, 'bUx0qpgt', 'instructor', 0, '2018-08-08'),
(433, 'pRnvBV1e', 'instructor', 0, '2018-08-08'),
(434, '19nPLuC7', 'instructor', 0, '2018-08-08'),
(435, '81Bn7EFX', 'instructor', 0, '2018-08-08'),
(436, 'qdn2ifC1', 'instructor', 0, '2018-08-08'),
(437, 'GbNtNJZQ', 'instructor', 0, '2018-08-08'),
(438, 'HRwvVXT1', 'instructor', 0, '2018-08-08'),
(439, 'xoTs7ED7', 'instructor', 0, '2018-08-08'),
(440, 'bwUuUfzY', 'instructor', 0, '2018-08-08'),
(441, 'w5Ikiuf2', 'instructor', 0, '2018-08-08'),
(442, 'MHjCEU0u', 'instructor', 0, '2018-08-08'),
(443, 'ZHH9vpcA', 'instructor', 0, '2018-08-08'),
(444, 'TNV5iOIA', 'instructor', 0, '2018-08-08'),
(445, '3XKxknCx', 'instructor', 0, '2018-08-08'),
(446, 'vhIOQi3f', 'instructor', 0, '2018-08-08'),
(447, 'yNVuA5xT', 'instructor', 0, '2018-08-08'),
(448, 'rp1sFJlN', 'instructor', 0, '2018-08-08'),
(449, '4NLkI8eB', 'instructor', 0, '2018-08-08'),
(450, 'NyY3Crpv', 'instructor', 0, '2018-08-08'),
(451, '7nswL62a', 'instructor', 0, '2018-08-08'),
(452, 'YRprlNCM', 'instructor', 0, '2018-08-08'),
(453, 'Nz4ZGBG0', 'instructor', 0, '2018-08-08'),
(454, 'SV8SEiVF', 'instructor', 0, '2018-08-08'),
(455, 'NF3xQelD', 'instructor', 0, '2018-08-08'),
(456, 'l3P7PZ2e', 'instructor', 0, '2018-08-08'),
(457, 'Gm63K244', 'instructor', 0, '2018-08-08'),
(458, 'fjREFVDh', 'instructor', 0, '2018-08-08'),
(459, 'K2sEJ5jo', 'instructor', 0, '2018-08-08'),
(460, '0DUT4igq', 'instructor', 0, '2018-08-08'),
(461, 'hYXb70T3', 'instructor', 0, '2018-08-08'),
(462, 'p5gdqE9H', 'instructor', 0, '2018-08-08'),
(463, 'horxFC52', 'instructor', 0, '2018-08-08'),
(464, 'xymDswnc', 'instructor', 0, '2018-08-08'),
(465, 'pvvICJeM', 'instructor', 0, '2018-08-08'),
(466, 'U4swcVuG', 'instructor', 0, '2018-08-08'),
(467, 'QVcPDOLj', 'instructor', 0, '2018-08-08'),
(468, 'gxXeO7I8', 'instructor', 0, '2018-08-08'),
(469, 'WfCEABkc', 'instructor', 0, '2018-08-08'),
(470, 'ej3fZDNx', 'instructor', 0, '2018-08-08'),
(471, 'vVIlaaeZ', 'instructor', 0, '2018-08-08'),
(472, 'Ay7DC7ES', 'instructor', 0, '2018-08-08'),
(473, 'ncXui2up', 'instructor', 0, '2018-08-08'),
(474, 'MZtV7oHg', 'instructor', 0, '2018-08-08'),
(475, 'Z9AjtUvb', 'instructor', 0, '2018-08-08'),
(476, 'zUXwasVs', 'instructor', 0, '2018-08-08'),
(477, 'Wq9Ogjrf', 'instructor', 0, '2018-08-08'),
(478, 'hDKe5oZo', 'instructor', 0, '2018-08-08'),
(479, 'qAYGBQlK', 'instructor', 0, '2018-08-08'),
(480, 'Kxy2N5dm', 'instructor', 0, '2018-08-08'),
(481, 'XMNSqeTr', 'instructor', 0, '2018-08-08'),
(482, 'o6xxNxxP', 'instructor', 0, '2018-08-08'),
(483, 'omYPRbQg', 'instructor', 0, '2018-08-08'),
(484, 'jwVFYIIn', 'instructor', 0, '2018-08-08'),
(485, '6MYGu25H', 'instructor', 0, '2018-08-08'),
(486, 'Wn6y2c7Z', 'instructor', 0, '2018-08-08'),
(487, 'Dvnd8xSd', 'instructor', 0, '2018-08-08'),
(488, 'IBDrBfMK', 'instructor', 0, '2018-08-08'),
(489, 'ozsXNlNL', 'instructor', 0, '2018-08-08'),
(490, 'w4IEmsQ9', 'instructor', 0, '2018-08-08'),
(491, 'ADbUioFb', 'instructor', 0, '2018-08-08'),
(492, 'qj3NKTHq', 'instructor', 0, '2018-08-08'),
(493, 'TpcR6q5v', 'instructor', 0, '2018-08-08'),
(494, 'TU1ck3va', 'instructor', 0, '2018-08-08'),
(495, 'oIdLkqcz', 'instructor', 0, '2018-08-08'),
(496, 'YNPXHv8y', 'instructor', 0, '2018-08-08'),
(497, 'TEvTKVRf', 'instructor', 0, '2018-08-08'),
(498, 'lTCXLuDT', 'instructor', 0, '2018-08-08'),
(499, 'pAC59sjw', 'instructor', 0, '2018-08-08'),
(500, 'X76TseXE', 'instructor', 0, '2018-08-08'),
(501, 'YeSm8Ihf', 'instructor', 0, '2018-08-08'),
(502, 'ksvExLiM', 'instructor', 0, '2018-08-08'),
(503, 'f8PQinKN', 'instructor', 0, '2018-08-08'),
(504, 'agSC5k4h', 'instructor', 0, '2018-08-08'),
(505, 'Cv2pvMkt', 'instructor', 0, '2018-08-08'),
(506, 'HzgjNJPU', 'instructor', 0, '2018-08-08'),
(507, 'KXKcAHvK', 'instructor', 0, '2018-08-08'),
(508, '45lmjlHM', 'instructor', 0, '2018-08-08'),
(509, 'Ln17zz44', 'instructor', 0, '2018-08-08'),
(510, 'tn7Ub2r1', 'instructor', 0, '2018-08-08'),
(511, 'HHCP9s20', 'instructor', 0, '2018-08-08'),
(512, 'Xsqh32nc', 'instructor', 0, '2018-08-08'),
(513, 'x7hiW6dM', 'instructor', 0, '2018-08-08'),
(514, 'sSUTgR5X', 'instructor', 0, '2018-08-08'),
(515, 'iL1bR0KU', 'instructor', 0, '2018-08-08'),
(516, 'TEa5yZjv', 'instructor', 0, '2018-08-08'),
(517, 'V8HCDRZQ', 'instructor', 0, '2018-08-08'),
(518, 'IyK5K16d', 'instructor', 0, '2018-08-08'),
(519, 'C5Ks1DFl', 'instructor', 0, '2018-08-08'),
(520, 'p18Y6Xxn', 'instructor', 0, '2018-08-08'),
(521, 'yWfzRvLo', 'instructor', 0, '2018-08-08'),
(522, '4ZQp8x3V', 'instructor', 0, '2018-08-08'),
(523, '6fu3WAtL', 'instructor', 0, '2018-08-08'),
(524, 'o4Y7WQpI', 'instructor', 0, '2018-08-08'),
(525, '9L0zgwfo', 'instructor', 0, '2018-08-08'),
(526, 'SR4V4VwC', 'instructor', 0, '2018-08-08'),
(527, 'xXwCDh2O', 'instructor', 0, '2018-08-08'),
(528, 'LHTsPpwQ', 'instructor', 0, '2018-08-08'),
(529, 'Yv0MEXxH', 'instructor', 0, '2018-08-08'),
(530, 'JGP7pys7', 'instructor', 0, '2018-08-08'),
(531, '0YWv6vae', 'instructor', 0, '2018-08-08'),
(532, '0iZQ7hh0', 'instructor', 0, '2018-08-08'),
(533, 'br875mcK', 'instructor', 0, '2018-08-08'),
(534, '63hx5oTU', 'instructor', 0, '2018-08-08'),
(535, 'nMgaN3X4', 'instructor', 0, '2018-08-08'),
(536, 'ETTJixR7', 'instructor', 0, '2018-08-08'),
(537, 'aIWRbOnB', 'instructor', 0, '2018-08-08'),
(538, 'kKCElsK8', 'instructor', 0, '2018-08-08'),
(539, 'R3viMiM7', 'instructor', 0, '2018-08-08'),
(540, 'laC9UfAx', 'instructor', 0, '2018-08-08'),
(541, 'OrKz2Otx', 'instructor', 0, '2018-08-08'),
(542, 'tXQSPKyq', 'instructor', 0, '2018-08-08'),
(543, 'juG2CpFZ', 'instructor', 0, '2018-08-08'),
(544, 'jxVwSpiX', 'instructor', 0, '2018-08-08'),
(545, 'sf1ljrtr', 'instructor', 0, '2018-08-08'),
(546, 'D4WxFJBL', 'instructor', 0, '2018-08-08'),
(547, 'zXN4vU9u', 'instructor', 0, '2018-08-08'),
(548, 'guu1c7tV', 'instructor', 0, '2018-08-08'),
(549, 'KB2M6edP', 'instructor', 0, '2018-08-08'),
(550, 'K0YIDXR9', 'instructor', 0, '2018-08-08'),
(551, 'hfghJBop', 'instructor', 0, '2018-08-08'),
(552, 'LCjtVr9i', 'instructor', 0, '2018-08-08'),
(553, 'c6s6jcqs', 'instructor', 0, '2018-08-08'),
(554, 'voVzfNfB', 'instructor', 0, '2018-08-08'),
(555, 'C95AT99s', 'instructor', 0, '2018-08-08'),
(556, 'VZj6YgV8', 'instructor', 0, '2018-08-08'),
(557, '4noVaz0Q', 'instructor', 0, '2018-08-08'),
(558, 'X4cyVH3L', 'instructor', 0, '2018-08-08'),
(559, 'sYzurVWs', 'instructor', 0, '2018-08-08'),
(560, 'cZXPxb2Q', 'instructor', 0, '2018-08-08'),
(561, '0UJhOKZr', 'instructor', 0, '2018-08-08'),
(562, 'exYnzHU9', 'instructor', 0, '2018-08-08'),
(563, 'UzUyi2fL', 'instructor', 0, '2018-08-08'),
(564, 'lCpIz1DB', 'instructor', 0, '2018-08-08'),
(565, 'LuhxQs7z', 'instructor', 0, '2018-08-08'),
(566, 'pcbYjZ6m', 'instructor', 0, '2018-08-08'),
(567, 'iTzvlVw9', 'instructor', 0, '2018-08-08'),
(568, 'OgD6HeRU', 'instructor', 0, '2018-08-08'),
(569, 'gYME8bGZ', 'instructor', 0, '2018-08-08'),
(570, 'bquLDZpI', 'instructor', 0, '2018-08-08'),
(571, 'kZgSN18w', 'instructor', 0, '2018-08-08'),
(572, 'CiCRvgzj', 'instructor', 0, '2018-08-08'),
(573, 'waNOmHPc', 'instructor', 0, '2018-08-08'),
(574, 'uEm9q19i', 'instructor', 0, '2018-08-08'),
(575, 'Ha17POPw', 'instructor', 0, '2018-08-08'),
(576, 'OnKPHCLE', 'instructor', 0, '2018-08-08'),
(577, 'OTtM2cKU', 'instructor', 0, '2018-08-08'),
(578, 'cxi5Oz8B', 'instructor', 0, '2018-08-08'),
(579, 'OWnku3fc', 'instructor', 0, '2018-08-08'),
(580, 'Q80m99Ok', 'instructor', 0, '2018-08-08'),
(581, 'EfAr10lr', 'instructor', 0, '2018-08-08'),
(582, 'mjwMxoQp', 'instructor', 0, '2018-08-08'),
(583, '4kixa4BD', 'instructor', 0, '2018-08-08'),
(584, 'GStc8Bm8', 'instructor', 0, '2018-08-08'),
(585, 'VkIXSlue', 'instructor', 0, '2018-08-08'),
(586, 'dbiBLfV5', 'instructor', 0, '2018-08-08'),
(587, '5hhcwgyL', 'instructor', 0, '2018-08-08'),
(588, 'RvI8SVS8', 'instructor', 0, '2018-08-08'),
(589, 'WXh4hWBE', 'instructor', 0, '2018-08-08'),
(590, 'CRrtcZQY', 'instructor', 0, '2018-08-08'),
(591, 'MTrx3mJK', 'instructor', 0, '2018-08-08'),
(592, 'h3eruokL', 'instructor', 0, '2018-08-08'),
(593, '2OmqrzMF', 'instructor', 0, '2018-08-08'),
(594, 'UNIHsZ7m', 'instructor', 0, '2018-08-08'),
(595, 'ZX9d1xzV', 'instructor', 0, '2018-08-08'),
(596, '87Mr1qhp', 'instructor', 0, '2018-08-08'),
(597, 'nIGDH6yv', 'instructor', 0, '2018-08-08'),
(598, 'E0KZZi3j', 'instructor', 0, '2018-08-08'),
(599, '3gS4OWS0', 'instructor', 0, '2018-08-08'),
(600, 'EuWC1c5f', 'instructor', 0, '2018-08-08'),
(601, 'f9cxD7ka', 'instructor', 0, '2018-08-08'),
(602, 'KkUMTBNp', 'instructor', 0, '2018-08-08'),
(603, '9FRGC56x', 'instructor', 0, '2018-08-08'),
(604, 'izYG6iJT', 'instructor', 0, '2018-08-08'),
(605, 'Uw8eV2aD', 'instructor', 0, '2018-08-08'),
(606, 'sOHUCfFo', 'instructor', 0, '2018-08-08'),
(607, '7IenUsy9', 'instructor', 0, '2018-08-08'),
(608, 'oCHlIY6w', 'instructor', 0, '2018-08-08'),
(609, 'pgJxD5tr', 'instructor', 0, '2018-08-08'),
(610, '3qN31wwF', 'instructor', 0, '2018-08-08'),
(611, 'THai6TTS', 'instructor', 0, '2018-08-08'),
(612, 'OO3dPIFl', 'instructor', 0, '2018-08-08'),
(613, '49kfVIAJ', 'instructor', 0, '2018-08-08'),
(614, 'Oir6cmeW', 'instructor', 0, '2018-08-08'),
(615, '5wzMQDWT', 'instructor', 0, '2018-08-08'),
(616, 'XSp1v8iA', 'instructor', 0, '2018-08-08'),
(617, 'tyi71A1H', 'instructor', 0, '2018-08-08'),
(618, 'YjFX8xEx', 'instructor', 0, '2018-08-08'),
(619, 'jzmyOxUR', 'instructor', 0, '2018-08-08'),
(620, 'nQklDwvE', 'instructor', 0, '2018-08-08'),
(621, 'ju4uM4SB', 'instructor', 0, '2018-08-08'),
(622, 'RgQ548B3', 'instructor', 0, '2018-08-08'),
(623, '6b4DExPv', 'instructor', 0, '2018-08-08'),
(624, 'NzUqdVUP', 'instructor', 0, '2018-08-08'),
(625, 'YBt5jhqh', 'instructor', 0, '2018-08-08'),
(626, 'RNh4R7cl', 'instructor', 0, '2018-08-08'),
(627, '6jkVY60S', 'instructor', 0, '2018-08-08'),
(628, 'fwoUYEcy', 'instructor', 0, '2018-08-08'),
(629, 'FJJQaaxp', 'instructor', 0, '2018-08-08'),
(630, 'xExwoqbF', 'instructor', 0, '2018-08-08'),
(631, 'N0OF0Wa4', 'instructor', 0, '2018-08-08'),
(632, 's3tUGOeJ', 'instructor', 0, '2018-08-08'),
(633, 's0viSmO4', 'instructor', 0, '2018-08-08'),
(634, 'r0Lo01TG', 'instructor', 0, '2018-08-08'),
(635, 'xg0pwq7n', 'instructor', 0, '2018-08-08'),
(636, 'iKdhqFOn', 'instructor', 0, '2018-08-08'),
(637, 'h1e0sqXS', 'instructor', 0, '2018-08-08'),
(638, '0hsPWOwi', 'instructor', 0, '2018-08-08'),
(639, 'kiSkR2Mh', 'instructor', 0, '2018-08-08'),
(640, 'ngi2JbMi', 'instructor', 0, '2018-08-08'),
(641, 'UItQ7FEq', 'instructor', 0, '2018-08-08'),
(642, 'e3yyXf2g', 'instructor', 0, '2018-08-08'),
(643, 'Zq8Zabxw', 'instructor', 0, '2018-08-08'),
(644, 'vmNi1Ztv', 'instructor', 0, '2018-08-08'),
(645, 'uKfq9dHT', 'instructor', 0, '2018-08-08'),
(646, 'tOHyiWnZ', 'instructor', 0, '2018-08-08'),
(647, 'Bhtjv5dl', 'instructor', 0, '2018-08-08'),
(648, 'tgoUAa1b', 'instructor', 0, '2018-08-08'),
(649, 'bIBFt0tI', 'instructor', 0, '2018-08-08'),
(650, 'O3w3I8r6', 'instructor', 0, '2018-08-08'),
(651, 'eToZyY6q', 'instructor', 0, '2018-08-08'),
(652, '4k0k9BN0', 'instructor', 0, '2018-08-08'),
(653, 'v8Si4WBv', 'instructor', 0, '2018-08-08'),
(654, 'rKrBBUJ4', 'instructor', 0, '2018-08-08'),
(655, 'BTKK24lz', 'instructor', 0, '2018-08-08'),
(656, 'FSruZOgS', 'instructor', 0, '2018-08-08'),
(657, 'plPgGDru', 'instructor', 0, '2018-08-08'),
(658, 'SvuXuAPz', 'instructor', 0, '2018-08-08'),
(659, 'hJ4r53GN', 'instructor', 0, '2018-08-08'),
(660, 'bNyRVQ05', 'instructor', 0, '2018-08-08'),
(661, 'l8VJ6yzp', 'instructor', 0, '2018-08-08'),
(662, 'dahVfaI6', 'instructor', 0, '2018-08-08'),
(663, 'PQdX90HQ', 'instructor', 0, '2018-08-08'),
(664, 'ICVqQ1WD', 'instructor', 0, '2018-08-08'),
(665, 'b65ZnG6f', 'instructor', 0, '2018-08-08'),
(666, 'LmIV6Jwc', 'instructor', 0, '2018-08-08'),
(667, 'GMmS2woq', 'instructor', 0, '2018-08-08'),
(668, '62JpU4ze', 'instructor', 0, '2018-08-08'),
(669, 'olC8awN0', 'instructor', 0, '2018-08-08'),
(670, 'UEKBUTrC', 'instructor', 0, '2018-08-08'),
(671, '7oWALDe7', 'instructor', 0, '2018-08-08'),
(672, '9rhSPJ7E', 'instructor', 0, '2018-08-08'),
(673, 'ISrtEsK8', 'instructor', 0, '2018-08-08'),
(674, '9KGwfOSu', 'instructor', 0, '2018-08-08'),
(675, 'IUZnB5CL', 'instructor', 0, '2018-08-08'),
(676, 'CYWUm8m5', 'instructor', 0, '2018-08-08'),
(677, 'GH1wofQi', 'instructor', 0, '2018-08-08'),
(678, 'C74gJfwm', 'instructor', 0, '2018-08-08'),
(679, '1ohIak6j', 'instructor', 0, '2018-08-08'),
(680, 'TioqXzQV', 'instructor', 0, '2018-08-08'),
(681, 'G0qyI2Fk', 'instructor', 0, '2018-08-08'),
(682, 'pDKW5WMA', 'instructor', 0, '2018-08-08'),
(683, 'ICx5uGMt', 'instructor', 0, '2018-08-08'),
(684, 'yUvLClXz', 'instructor', 0, '2018-08-08'),
(685, 'MBr0Orph', 'instructor', 0, '2018-08-08'),
(686, 'Fc43L2SS', 'instructor', 0, '2018-08-08'),
(687, 'r1IDNEXk', 'instructor', 0, '2018-08-08'),
(688, 'LG1LgHrU', 'instructor', 0, '2018-08-08'),
(689, '3ddCvKqB', 'instructor', 0, '2018-08-08'),
(690, '1MddVgNl', 'instructor', 0, '2018-08-08'),
(691, 'vfOcbJhm', 'instructor', 0, '2018-08-08'),
(692, 'EQahFqvh', 'instructor', 0, '2018-08-08'),
(693, 'wJZQWWbt', 'instructor', 0, '2018-08-08'),
(694, '0LetjK74', 'instructor', 0, '2018-08-08'),
(695, 'j7LaGgVg', 'instructor', 0, '2018-08-08'),
(696, 'sqmm1Jao', 'instructor', 0, '2018-08-08'),
(697, '6t2VOlld', 'instructor', 0, '2018-08-08'),
(698, 'VqUxXZPj', 'instructor', 0, '2018-08-08'),
(699, 'y136BBDs', 'instructor', 0, '2018-08-08'),
(700, '3Bk4LnPo', 'instructor', 0, '2018-08-08'),
(701, 'NKtEXEDW', 'instructor', 0, '2018-08-08'),
(702, '24PDqCAd', 'instructor', 0, '2018-08-08'),
(703, 'Llzy9yFm', 'instructor', 0, '2018-08-08'),
(704, '69dA3UHS', 'instructor', 0, '2018-08-08'),
(705, '6FBWsd7H', 'instructor', 0, '2018-08-08'),
(706, 'nzGoBH2T', 'instructor', 0, '2018-08-08'),
(707, 'Dq6chjhF', 'instructor', 0, '2018-08-08'),
(708, 'qW7mSOPc', 'instructor', 0, '2018-08-08'),
(709, 'weYoG92g', 'instructor', 0, '2018-08-08'),
(710, 'rV3X4Tjy', 'instructor', 0, '2018-08-08'),
(711, 'EJlt66BZ', 'instructor', 0, '2018-08-08'),
(712, 'GgBwg8Ch', 'instructor', 0, '2018-08-08'),
(713, 'qebxrNew', 'instructor', 0, '2018-08-08'),
(714, '3Y5uQ2Ea', 'instructor', 0, '2018-08-08'),
(715, 'QbQx8i6i', 'instructor', 0, '2018-08-08'),
(716, 'WdZ35RMQ', 'instructor', 0, '2018-08-08'),
(717, 'hfnujU1m', 'instructor', 0, '2018-08-08'),
(718, 'GmvdcZzT', 'instructor', 0, '2018-08-08'),
(719, 'xz1cvibo', 'instructor', 0, '2018-08-08'),
(720, 'Dx1u3W3D', 'instructor', 0, '2018-08-08'),
(721, 'qi5jqEB2', 'instructor', 0, '2018-08-08'),
(722, 'teohspBi', 'instructor', 0, '2018-08-08'),
(723, 'f60rTXcZ', 'instructor', 0, '2018-08-08'),
(724, 'GcKgDzXg', 'instructor', 0, '2018-08-08'),
(725, 'Nkx1HMQz', 'instructor', 0, '2018-08-08'),
(726, 'ttd4zYkJ', 'instructor', 0, '2018-08-08'),
(727, 'gJwulwjm', 'instructor', 0, '2018-08-08'),
(728, 'vuRddgyO', 'instructor', 0, '2018-08-08'),
(729, '5M0v58Po', 'instructor', 0, '2018-08-08'),
(730, 'vL0bQCV4', 'instructor', 0, '2018-08-08'),
(731, 'GjMEm3rW', 'instructor', 0, '2018-08-08'),
(732, 'wSmKfyYy', 'instructor', 0, '2018-08-08'),
(733, '6K8c8PVE', 'instructor', 0, '2018-08-08'),
(734, 'Xhv8Q7u7', 'instructor', 0, '2018-08-08'),
(735, '7uiI1KLW', 'instructor', 0, '2018-08-08'),
(736, '7pEKRVua', 'instructor', 0, '2018-08-08'),
(737, 'HXNTUTeL', 'instructor', 0, '2018-08-08'),
(738, 'iECU2ZOH', 'instructor', 0, '2018-08-08'),
(739, 'eaEPwf2d', 'instructor', 0, '2018-08-08'),
(740, 'pX58Szb4', 'instructor', 0, '2018-08-08'),
(741, 'xtPIN6cq', 'instructor', 0, '2018-08-08'),
(742, '2tNGQaFj', 'instructor', 0, '2018-08-08'),
(743, 'CXzO3IB7', 'instructor', 0, '2018-08-08'),
(744, 'Ib6qiAF2', 'instructor', 0, '2018-08-08'),
(745, 'EEyD2y8B', 'instructor', 0, '2018-08-08'),
(746, 'B5XbgmTd', 'instructor', 0, '2018-08-08'),
(747, 'TmVcX0S4', 'instructor', 0, '2018-08-08'),
(748, 'RxyZoqz6', 'instructor', 0, '2018-08-08'),
(749, 'owoIQPss', 'instructor', 0, '2018-08-08'),
(750, 'BMZLev4W', 'instructor', 0, '2018-08-08'),
(751, 'RxRQICCk', 'instructor', 0, '2018-08-08'),
(752, 'QfcwXnqe', 'instructor', 0, '2018-08-08'),
(753, 'MzMlEAHv', 'instructor', 0, '2018-08-08'),
(754, 'PUBoN7Hz', 'instructor', 0, '2018-08-08'),
(755, '4tNr8KCE', 'instructor', 0, '2018-08-08'),
(756, 'tfEpXjm0', 'instructor', 0, '2018-08-08'),
(757, 'KkEiJuCh', 'instructor', 0, '2018-08-08'),
(758, 'TjFZ0fTT', 'instructor', 0, '2018-08-08'),
(759, 'Ygqwspso', 'instructor', 0, '2018-08-08'),
(760, '3Bo88IA7', 'instructor', 0, '2018-08-08'),
(761, 'oIE3UO6Q', 'instructor', 0, '2018-08-08'),
(762, 'ntqdaQ57', 'instructor', 0, '2018-08-08'),
(763, 'FrgM3Id1', 'instructor', 0, '2018-08-08'),
(764, '7qyQBVe6', 'instructor', 0, '2018-08-08'),
(765, 'pfXllR9g', 'instructor', 0, '2018-08-08'),
(766, 'KaqMuxIo', 'instructor', 0, '2018-08-08'),
(767, 'ehBs2kv4', 'instructor', 0, '2018-08-08'),
(768, '7yRTZzOB', 'instructor', 0, '2018-08-08'),
(769, 'RihtIEBb', 'instructor', 0, '2018-08-08'),
(770, 'czg3goAd', 'instructor', 0, '2018-08-08'),
(771, 'VjWYaEvi', 'instructor', 0, '2018-08-08'),
(772, '87whFrm3', 'instructor', 0, '2018-08-08'),
(773, 'p14BtiCY', 'instructor', 0, '2018-08-08'),
(774, '5YrWoeEj', 'instructor', 0, '2018-08-08'),
(775, 'svYCLcWV', 'instructor', 0, '2018-08-08'),
(776, 'LNkacvne', 'instructor', 0, '2018-08-08'),
(777, 'zK5exUHp', 'instructor', 0, '2018-08-08'),
(778, 'HNPdHb7E', 'instructor', 0, '2018-08-08'),
(779, 'lBgNCVBM', 'instructor', 0, '2018-08-08'),
(780, 'YMJ4i79x', 'instructor', 0, '2018-08-08'),
(781, 'PcsQ57QV', 'instructor', 0, '2018-08-08'),
(782, 'IfkQdPNk', 'instructor', 0, '2018-08-08'),
(783, 'z3Vcce5p', 'instructor', 0, '2018-08-08'),
(784, 'Y7gIAPDi', 'instructor', 0, '2018-08-08'),
(785, 'yY3teCjW', 'instructor', 0, '2018-08-08'),
(786, 'l4m0rDKQ', 'instructor', 0, '2018-08-08'),
(787, 'Q4U4bFNi', 'instructor', 0, '2018-08-08'),
(788, 'BDxSQzkY', 'instructor', 0, '2018-08-08'),
(789, '2mXsR6cP', 'instructor', 0, '2018-08-08'),
(790, 'YdzWSfuf', 'instructor', 0, '2018-08-08'),
(791, 'yE78V6Ht', 'instructor', 0, '2018-08-08'),
(792, '7bUiGwmg', 'instructor', 0, '2018-08-08'),
(793, '2aTeKzhg', 'instructor', 0, '2018-08-08'),
(794, 'pwfxhw0B', 'instructor', 0, '2018-08-08'),
(795, '9lIt4Ljb', 'instructor', 0, '2018-08-08'),
(796, 'w9c4n27s', 'instructor', 0, '2018-08-08'),
(797, '0pD43Lrz', 'instructor', 0, '2018-08-08'),
(798, 'obcZ1RrW', 'instructor', 0, '2018-08-08'),
(799, 'JjRwmBGb', 'instructor', 0, '2018-08-08'),
(800, 'xaHfpefy', 'instructor', 0, '2018-08-08'),
(801, 'sKrExqcp', 'instructor', 0, '2018-08-08'),
(802, 'Ey7N8tan', 'instructor', 0, '2018-08-08'),
(803, 'uIEOhg6Q', 'instructor', 0, '2018-08-08'),
(804, 'KMQkVDgl', 'instructor', 0, '2018-08-08'),
(805, 'fWGcYWCZ', 'instructor', 0, '2018-08-08'),
(806, 'iXFbusxe', 'instructor', 0, '2018-08-08'),
(807, 'PbBBTQSW', 'instructor', 0, '2018-08-08'),
(808, '2V4n8kAZ', 'instructor', 0, '2018-08-08'),
(809, 'WmHcR1lC', 'instructor', 0, '2018-08-08'),
(810, 'zsmrNecr', 'instructor', 0, '2018-08-08'),
(811, '0Iup046L', 'instructor', 0, '2018-08-08'),
(812, 'bvAzqKm3', 'instructor', 0, '2018-08-08'),
(813, 'rTgweg6n', 'instructor', 0, '2018-08-08'),
(814, '6aACkOmt', 'instructor', 0, '2018-08-08'),
(815, 'YUtwvQOE', 'instructor', 0, '2018-08-08'),
(816, 'Q86VnMV6', 'instructor', 0, '2018-08-08'),
(817, 'OP3qSpze', 'instructor', 0, '2018-08-08'),
(818, 'AGpBPt1p', 'instructor', 0, '2018-08-08'),
(819, 'oYs3wi6a', 'instructor', 0, '2018-08-08'),
(820, 'yQnn76VR', 'instructor', 0, '2018-08-08'),
(821, '5poCpsTw', 'instructor', 0, '2018-08-08'),
(822, '5J4q14im', 'instructor', 0, '2018-08-08'),
(823, 'iitLIGmR', 'instructor', 0, '2018-08-08'),
(824, 'fxt6e9gO', 'instructor', 0, '2018-08-08'),
(825, '4himY9HO', 'instructor', 0, '2018-08-08'),
(826, 's37gq9Vp', 'instructor', 0, '2018-08-08'),
(827, 'VzDusoEn', 'instructor', 0, '2018-08-08'),
(828, 'symv9vmJ', 'instructor', 0, '2018-08-08'),
(829, 'bmjQTF5i', 'instructor', 0, '2018-08-08'),
(830, 'F5I2z88J', 'instructor', 0, '2018-08-08'),
(831, 'cnzCfRcR', 'instructor', 0, '2018-08-08'),
(832, 'orNoxnQY', 'instructor', 0, '2018-08-08'),
(833, 'Q7ZpZLm8', 'instructor', 0, '2018-08-08');

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
(2, 'John Dale', 'Tsar', 'Belderol', '', 'jd06@gmail.com');

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
(3, 'Sarah', 'Dela Cruz', 'Gonzaga', '', 'United States', '09127856312', 'sarah@yahoo.com', '');

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
(3, 'BASIC ACCOUNTING', 'We have studied economic activities which have been converted into business activities. In business activity a lot of Ã¢â‚¬Å“give & takeÃ¢â‚¬Â exist which is known as transaction. Transaction involves transfer of money or moneyÃ¢â‚¬â„¢s worth. Thus exchange of money, goods & services between the parties is known to have resulted in a transaction. It is necessary to record all these transactions very systematically & scientifically so that the financial relationship of a business with other persons may be properly understood, profit & loss and financial position of the business may be worked out at a particular date. The procedure to record all these transactions is known as Ã¢â‚¬Å“Book-keepingÃ¢â‚¬Â.', '1955-03-12', 4, 0, 'Unpublish', 1, 0, 0, 'cover/default-book-cover.png', 'book/5b692582cfbd61.70578984.doc');

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
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `cat_name`) VALUES
(1, 'CAS- INFORMATION TECHNOLOGY '),
(2, 'CAS- MATHEMATICS'),
(3, 'CAS- SOCIAL SCIENCES'),
(4, 'CAS- NATURAL SCIENCES'),
(7, 'CAS- LANGUAGE & LETTERS'),
(12, 'COB- BUSINESS ADMINISTRATION'),
(13, 'COB- ACCOUNTANCY'),
(14, 'COB- PUBLIC ADMINISTRATION'),
(15, 'COE- ELEMENTARY EDUCATION'),
(16, 'COE- SECONDARY EDUCATION'),
(17, 'COE- PHYSICAL EDUCATION'),
(18, 'CON- COLLEGE OF NURSING'),
(19, 'CSDT- COMDEV'),
(20, 'CSDT- DEVCOM');

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
(2, 2, 2);

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
(3, 3, 3);

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
(11, 3, 13);

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
(7, 3, 7);

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
(11, 'Around the World'),
(13, 'Business Environment'),
(7, 'Corporate Reports'),
(9, 'Developments in Acco'),
(6, 'Financial Reporting'),
(8, 'Financial Statements'),
(10, 'PHILEAS FOGG '),
(5, 'Review of Accounting'),
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
(7, 'DIPLOMA IN INSURANCE SERVICES');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `acesskey`
--
ALTER TABLE `acesskey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=834;
--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `adv_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
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
-- AUTO_INCREMENT for table `indexes`
--
ALTER TABLE `indexes`
  MODIFY `index_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `junc_advicerbook`
--
ALTER TABLE `junc_advicerbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `junc_authorbook`
--
ALTER TABLE `junc_authorbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `junc_bookkeywords`
--
ALTER TABLE `junc_bookkeywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `junk_accountbook`
--
ALTER TABLE `junk_accountbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `junk_bookref`
--
ALTER TABLE `junk_bookref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
