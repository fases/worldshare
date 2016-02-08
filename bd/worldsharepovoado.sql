-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `worldshare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL,
  `file` varchar(5000) NOT NULL,
  `publication_id` int(11) NOT NULL,
  KEY `fk_attachments_publications` (`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `schedule` datetime NOT NULL,
  `text` varchar(500) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users` (`user_id`),
  KEY `fk_comments_publications` (`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matters`
--

CREATE TABLE IF NOT EXISTS `matters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `matters`
--

INSERT INTO `matters` (`id`, `name`, `description`) VALUES
(1, 'Quimica', ''),
(2, 'Espanhol', ''),
(3, 'Banco Dados', ''),
(4, 'PortuguÃªs', ''),
(5, 'HistÃ³ria', ''),
(6, 'Biologia', ''),
(7, 'Geografia', ''),
(8, 'Eng Software', ''),
(9, 'Design', ''),
(10, 'Informatica', ''),
(11, 'Matematica', '');
-- --------------------------------------------------------

--
-- Estrutura da tabela `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration` datetime NOT NULL,
  `title` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `text_publication` varchar(5000) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `matter_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `text_review` varchar(50000) COLLATE latin1_general_ci NOT NULL,
  `old_publication` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publications_users` (`user_id`),
  KEY `fk_publications_types` (`type_id`),
  KEY `fk_publications_matters` (`matter_id`),
  KEY `fk_publications_teachers` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `publications`
--

INSERT INTO `publications` (`id`, `registration`, `title`, `text_publication`, `user_id`, `type_id`, `matter_id`, `status`, `teacher_id`, `text_review`, `old_publication`) VALUES
(1, '2016-01-27 11:47:00', 'Backup', 'Backup de Banco de Dados', 4, 3, 3, 1, 4, '', NULL),
(2, '2016-01-27 12:23:00', 'Descobrimento do Brasil', 'As Origens do Brasil', 11, 5, 5, 0, NULL, '', NULL),
(3, '2016-01-27 08:23:00', 'Verbos irregulares', 'Uso dos verbos irregulares em espanhol', 2, 5, 2, 1, 2, '', NULL),
(4, '2016-01-27 12:26:00', 'Radiação', 'Efeitos do desastre de Chernobyl', 1, 5, 1, 1, 1, '', NULL),
(5, '2016-01-27 12:25:00', 'Machado de Assis - Vida e Obra', 'Produções de Machado de Assis', 10, 5, 4, 0, NULL, '', NULL),
(6, '2016-01-27 12:23:00', 'Desastre ecologico em Mariana', 'Seres vivos estão perdendo a vida', 1, 5, 6, 1, 1, '', NULL),
(7, '2016-01-27 12:24:00', 'Rochas sendimentares do Brasil', 'Uso dessas rochas no ambiente residencial', 7, 5, 7, 2, 1, '', NULL),
(8, '2016-01-27 12:51:00', 'Requisitos Funcionais', 'Artigo sobre os requisitos funcionais em ES.', 6, 5, 8, 1, 6, '', NULL),
(9, '2016-01-27 12:45:00', 'Conceitos de Design atuais', 'Formas quadradas, cores neutras', 3, 5, 5, 1, 3, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ratings_users` (`user_id`),
  KEY `fk_ratings_publication` (`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `institution` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `matter_id` int(11) NOT NULL,
  `place` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_teachers_users` (`user_id`),
  KEY `fk_teachers_matters` (`matter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `types`
--

INSERT INTO `types` (`id`, `name`, `description`) VALUES
(1, 'Foto', ''),
(2, 'MÃºsica', ''),
(3, 'VÃ­deo', ''),
(4, 'Texto', ''),
(5, 'Documento', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `registration` datetime NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`,`registration`, `role`) VALUES
(1, 'pio.antas@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Pio Antas', '2016-02-11 10:26:00', 1),
(2, 'erika.moreira@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Erika Moreira', '2016-02-11 10:38:00', 1),
(3, 'cesimar.Xavier@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Cesimar Xavier', '2016-02-15 11:34:00', 1),
(4, 'diego.costa@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Diego Costa', '2016-01-27 11:34:00', 1),
(5, 'alba.lopes@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Alba Lopes','2016-01-27 11:34:00', 1),
(6, 'edmilson.campos@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Edmilson Campos', '2016-01-27 11:35:00', 1),
(7, 'claudio.junior@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Claudio JÃºnior', '2016-01-27 11:36:00', 0),
(8, 'arthur.barros@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Arthur Barros', '2016-01-27 11:37:00', 0),
(9, 'fernando.alves@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Fernando Alves', '2016-01-27 11:39:00', 0),
(10, 'bruno.Willian@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Bruno Willian', '2016-01-27 11:39:00', 0),
(11, 'pedro.victor@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Pedro Victor', '2016-01-27 11:39:00', 0),
(12, 'thiago.valentim@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Thiago Valentim', '2016-01-27 11:39:00', 1),
(13, 'ailto.torres@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Ailton Torres', '2016-01-27 11:39:00', 1);
--
-- Restrições para as tabelas dumpadas
--
INSERT INTO `teachers` (`id`,`institution`,`matter_id`,`place`,`user_id`) VALUES
(1, 'IFRN',1,'Natal',1),
(2, 'IFRN',2,'Natal',2),
(3, 'IFRN',9,'Natal',3),
(4, 'IFRN',3,'Natal',4),
(5, 'IFRN',3,'Natal',5),
(6, 'IFRN',8,'Natal',6),
(7, 'IFRN',11,'Natal',12),
(8, 'IFRN',10,'Natal',13);
--
-- Restrições para a tabela `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `fk_attachments_publications` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`);

--
-- Restrições para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_publications` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para a tabela `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `fk_publications_matters` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`id`),
  ADD CONSTRAINT `fk_publications_teachers` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `fk_publications_types` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `fk_publications_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para a tabela `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_ratings_publication` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `fk_ratings_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para a tabela `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_teachers_matters` FOREIGN KEY (`matter_id`) REFERENCES `matters` (`id`),
  ADD CONSTRAINT `fk_teachers_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
