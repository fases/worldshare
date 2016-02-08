-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2015 às 20:06
-- Versão do servidor: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldshare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL,
  `file` varchar(5000) NOT NULL,
  `publication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `schedule` datetime NOT NULL,
  `text` varchar(500) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matters`
--

CREATE TABLE IF NOT EXISTS `matters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `matters`
--

INSERT INTO `matters` (`id`, `name`, `description`) VALUES
(1, 'Banco de Dados', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL,
  `registration` datetime NOT NULL,
  `title` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `text_publication` varchar(5000) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `matter_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `text_review` varchar(50000) COLLATE latin1_general_ci NOT NULL,
  `old_publication` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `publications`
--

INSERT INTO `publications` (`id`, `registration`, `title`, `text_publication`, `user_id`, `type_id`, `matter_id`, `status`, `teacher_id`, `text_review`, `old_publication`) VALUES
(4, '2015-11-25 18:07:00', 'Santo padre', 'Colombia', 2, 1, 1, 1, 2, 'no tengo nada para hablar.', NULL),
(5, '2035-01-01 00:00:00', 'Mi suenos', 'Dios mio', 1, 1, 1, 1, NULL, 'No me gusta, nem un poco!', NULL),
(6, '2015-11-25 19:45:00', 'Nova Publicacao', 'Texto teste para o loop', 2, 1, 1, 1, 1, 'Okay Okay', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL,
  `institution` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `matter_id` int(11) NOT NULL,
  `place` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `teachers`
--

INSERT INTO `teachers` (`id`, `institution`, `matter_id`, `place`, `user_id`) VALUES
(1, 'IFRN', 1, 'Natal', 1),
(2, 'IFRN', 1, 'Fortaleza', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'Poesia', '');

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
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD KEY `fk_attachments_publications` (`publication_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_users` (`user_id`),
  ADD KEY `fk_comments_publications` (`publication_id`);

--
-- Indexes for table `matters`
--
ALTER TABLE `matters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_publications_users` (`user_id`),
  ADD KEY `fk_publications_types` (`type_id`),
  ADD KEY `fk_publications_matters` (`matter_id`),
  ADD KEY `fk_publications_teachers` (`teacher_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ratings_users` (`user_id`),
  ADD KEY `fk_ratings_publication` (`publication_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teachers_users` (`user_id`),
  ADD KEY `fk_teachers_matters` (`matter_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matters`
--
ALTER TABLE `matters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `fk_attachments_publications` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`);

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_publications` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `fk_publications_matters` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`id`),
  ADD CONSTRAINT `fk_publications_teachers` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `fk_publications_types` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `fk_publications_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_ratings_publication` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `fk_ratings_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_matters` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`id`),
  ADD CONSTRAINT `fk_teachers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
