-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2015 às 00:40
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `worldshare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ativo` int(1) NOT NULL DEFAULT '0',
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `registration` datetime NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ativo`, `id`, `email`, `password`, `name`, `phone`, `address`, `registration`, `role`) VALUES
(0, 1, 'diego@gmail.com', 'e76f46ed29f2374b0cb229d0681e327729096edb', 'Diego Costa', '987767676', 'Rua JerusalÃ©m', '2015-11-25 17:32:00', 1),
(0, 2, 'luana@gmail.com', 'e76f46ed29f2374b0cb229d0681e327729096edb', 'Luana', '988562776', 'Rua Camboriu', '2015-11-25 17:34:00', 0),
(0, 3, 'alba@gmail.com', 'e76f46ed29f2374b0cb229d0681e327729096edb', 'Alba', '98854-7643', 'Mor Gouveia', '2015-11-25 19:28:00', 1),
(0, 4, 'a@gmail.com', '5afcaf36c681892dbc659b7799f820058f06ab0b', 'a', 'a', 'a', '2015-04-03 10:56:00', 0),
(0, 5, 'asda@gmail.com', '5afcaf36c681892dbc659b7799f820058f06ab0b', 'a', 'a', 'a', '2015-04-03 23:00:00', 0),
(0, 6, 'asda@gmail.com', 'fefcc0d095c40274b0d1fd41e23c8afcb2bdd299', 'a', 'a', 'a', '2015-04-03 23:00:00', 0),
(1, 7, 'ass@gmail.com', '5afcaf36c681892dbc659b7799f820058f06ab0b', 'aaa', 's', 'aa', '2015-12-03 23:49:00', 0),
(0, 8, 'sa@ifrn.edu.br', '5afcaf36c681892dbc659b7799f820058f06ab0b', 'k', 's', 'k', '2015-12-03 23:51:00', 1),
(0, 9, 'sa@ifrn.edu.br', 'fefcc0d095c40274b0d1fd41e23c8afcb2bdd299', 'k', 's', 'k', '2015-12-03 23:51:00', 1),
(1, 10, 'sa@ifrn.edu.brsasa', 'c7a845e6f5a3104214953f2d47cc55e4989bbc3c', 'k', 's', 'k', '2015-12-03 23:51:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
