-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Fev-2016 às 02:27
-- Versão do servidor: 5.5.39
-- PHP Version: 5.4.31

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `publication_id`, `schedule`, `text`) VALUES
(24, 6, 1, '2016-02-17 02:17:38', 'Belo artigo professor Diego, recomendarei a ferramenta a meus orientandos'),
(25, 6, 9, '2016-02-17 02:19:03', 'Os Design atuais possuem formas retangulares, facilita na responsividade mas nÃ£o gosto... somos da velha guarda Cesimar'),
(26, 8, 9, '2016-02-17 02:20:34', 'Concordo com Edmilson'),
(27, 5, 6, '2016-02-17 02:23:10', 'Desastre terrÃ­vel, o ecossistema nÃ£o serÃ¡ recuperado com essas planos'),
(28, 5, 1, '2016-02-17 02:24:20', 'Ã“tima ferramenta, muito rÃ¡pida'),
(29, 5, 3, '2016-02-17 02:25:47', 'Queria aprender espanhol...');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matters`
--

CREATE TABLE IF NOT EXISTS `matters` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `matters`
--

INSERT INTO `matters` (`id`, `name`, `description`) VALUES
(1, 'QuÃ­mica', ''),
(2, 'Espanhol', ''),
(3, 'Banco Dados', ''),
(4, 'PortuguÃªs', ''),
(5, 'HistÃ³ria', ''),
(6, 'Biologia', ''),
(7, 'Geografia', ''),
(8, 'Engenharia de Software', ''),
(9, 'Design', ''),
(10, 'InformÃ¡tica', ''),
(11, 'MatemÃ¡tica', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
`id` int(11) NOT NULL,
  `registration` datetime NOT NULL,
  `title` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `text_publication` varchar(10000) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `matter_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `text_review` varchar(50000) COLLATE latin1_general_ci NOT NULL,
  `old_publication` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `publications`
--

INSERT INTO `publications` (`id`, `registration`, `title`, `text_publication`, `user_id`, `type_id`, `matter_id`, `status`, `teacher_id`, `text_review`, `old_publication`) VALUES
(1, '2016-01-27 11:47:00', 'Backup', 'Utilizando a ferramenta mysqldump, vocÃª poderÃ¡ realizar o backup de uma base de dados local e restaura-la para uma base de dados remota com as mesmas caracterÃ­sticas, tudo isso utilizando um simples comando. Em seguida, vocÃª verÃ¡ na prÃ¡tica exemplos de utilizaÃ§Ã£o da ferramenta mysqldump realizando a exportaÃ§Ã£o e importaÃ§Ã£o de bases de dados MySQL.', 4, 3, 3, 1, 4, '', NULL),
(2, '2016-01-27 12:23:00', 'Descobrimento do Brasil', 'Em 22 de abril de 1500 chegava ao Brasil 13 caravelas portuguesas lideradas por Pedro Ãlvares Cabral. A primeira vista, eles acreditavam tratar-se de um grande monte, e chamaram-no de Monte Pascoal. No dia 26 de abril, foi celebrada a primeira missa no Brasil.\nApÃ³s deixarem o local em direÃ§Ã£o Ã  Ãndia, Cabral, na incerteza se a terra descoberta tratava-se de um continente ou de uma grande ilha, alterou o nome para Ilha de Vera Cruz. ApÃ³s exploraÃ§Ã£o realizada por outras expediÃ§Ãµes portuguesas, foi descoberto tratar-se realmente de um continente, e novamente o nome foi alterado. A nova terra passou a ser chamada de Terra de Santa Cruz. Somente depois da descoberta do pau-brasil, ocorrida no ano de 1511, nosso paÃ­s passou a ser chamado pelo nome que conhecemos hoje: Brasil.\n', 11, 5, 5, 0, NULL, '', NULL),
(3, '2016-01-27 08:23:00', 'Verbos irregulares', 'Em espanhol o verbo se divide em duas partes: raiz (expressa o significado) e desinÃªncia (a terminaÃ§Ã£o do verbo que indica a flexÃ£o de nÃºmero e pessoa), por exemplo, se conjugarmos "amar" em primeira pessoa do presente de indicativo: (amo), teremos que "am" Ã© a raiz e que "o" Ã© a desinÃªncia.', 2, 5, 2, 1, 2, '', NULL),
(4, '2016-01-27 12:26:00', 'RadiaÃ§Ã£o', 'A liberaÃ§Ã£o de alta radiaÃ§Ã£o ionizante Ã© capaz de matar as cÃ©lulas do organismo, alÃ©m de causar mutaÃ§Ãµes.', 1, 5, 1, 1, 1, '', NULL),
(5, '2016-01-27 12:25:00', 'Machado de Assis - Vida e Obra', 'Joaquim Maria Machado de Assis Ã© considerado um dos mais importantes escritores da literatura brasileira. Nasceu no Rio de Janeiro em 21/6/1839, filho de uma famÃ­lia muito pobre. Mulato e vÃ­tima de preconceito, perdeu na infÃ¢ncia sua mÃ£e e foi criado pela madrasta. Superou todas as dificuldades da Ã©poca e tornou-se um grande escritor.Na infÃ¢ncia, estudou numa escola pÃºblica durante o primÃ¡rio e aprendeu francÃªs e latim. Trabalhou como aprendiz de tipÃ³grafo, foi revisor e funcionÃ¡rio pÃºblico.', 10, 5, 4, 0, NULL, '', NULL),
(6, '2016-01-27 12:23:00', 'Desastre ecolÃ³gico em Mariana', 'Mas nÃ£o Ã© apenas nessa mÃ©trica (volume de rejeitos) que a tragÃ©dia mineira sai negativamente na frente. Em termos de distÃ¢ncia percorrida pelos rejeitos de mineraÃ§Ã£o, a lama vazada da Samarco quebra outro recorde. SÃ£o 600 quilÃ´metros (km) de trajeto seguidos pelo material, atÃ© o momento. No histÃ³rico deste tipo de acidente, em segundo lugar aparece um registro ocorrido na BolÃ­via, em 1996, com metade da distÃ¢ncia do trajeto da lama, 300 quilÃ´metros.', 1, 5, 6, 1, 1, '', NULL),
(7, '2016-01-27 12:24:00', 'Rochas sendimentares', 'As rochas sedimentares sÃ£o formaÃ§Ãµes naturais resultantes da consolidaÃ§Ã£o de fragmentos de outras rochas (chamados de sedimentos) ou da precipitaÃ§Ã£o de minerais salinos dissolvidos em ambientes aquÃ¡ticos. Em geral, esse tipo de rocha Ã© menos duro do que as demais e de formaÃ§Ã£o geolÃ³gica mais recente, embora a sua presenÃ§a seja um indÃ­cio de que o relevo local Ã© antigo.', 7, 5, 7, 2, 1, '', NULL),
(8, '2016-01-27 12:51:00', 'Requisitos Funcionais', 'Um requisito fundamental define uma funÃ§Ã£o de um software ou parte dele. Ele Ã© o conjunto de entradas, seu comportamento e sua saÃ­da, ou seja, envolve cÃ¡lculos, lÃ³gicas de trabalho, manipulaÃ§Ã£o e processamento de dados, entre outros. Dentro dos requisitos funcionais tambÃ©m encontram-se a arquitetura do aplicativo, diferentemente da arquitetura tÃ©cnica, que pertence aos requisitos nÃ£o funcionais', 6, 5, 8, 1, 6, '', NULL),
(9, '2016-01-27 12:45:00', 'Conceitos de Design atuais', 'O termo design moderno se refere a uma prÃ¡tica e ideologia de design que tÃªm suas origens no sÃ©culo XIX. AlÃ©m de ser o estÃ­lo caracterÃ­stico de design da primeira metade de sÃ©culo XX.', 3, 5, 5, 1, 3, '', NULL),
(10, '2016-02-17 00:06:39', 'Cadeias CarbÃ´nicas fechadas', 'Devido Ã  sua tetravalÃªncia, o Ã¡tomo de carbono tem facilidade de formar cadeias carbÃ´nicas e formar grandes molÃ©culas. Os compostos da quÃ­mica orgÃ¢nica tÃªm uma cadeia principal, que servirÃ¡ de base para nomeÃ¡-los.\nA cadeia principal em um composto qualquer, Ã© aquela que liga a maior quantidade possÃ­vel de Ã¡tomos de carbono. A cadeia nÃ£o precisa ser linear, mas deve ser contÃ­nua. Veja o exemplo abaixo, em que diferentes combinaÃ§Ãµes geram diferentes cadeias:', 8, 4, 1, 0, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=84 ;

--
-- Extraindo dados da tabela `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `publication_id`, `stars`) VALUES
(79, 1, 1, 1),
(80, 1, 1, 1),
(81, 1, 8, 1),
(82, 1, 8, 1),
(83, 1, 9, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `teachers`
--

INSERT INTO `teachers` (`id`, `institution`, `matter_id`, `place`, `user_id`) VALUES
(1, 'IFRN', 1, 'Natal', 1),
(2, 'IFRN', 2, 'Natal', 2),
(3, 'IFRN', 9, 'Natal', 3),
(4, 'IFRN', 3, 'Natal', 4),
(5, 'IFRN', 3, 'Natal', 5),
(6, 'IFRN', 8, 'Natal', 6),
(7, 'IFRN', 11, 'Natal', 12),
(8, 'IFRN', 10, 'Natal', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `types`
--

CREATE TABLE IF NOT EXISTS `types` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
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
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `registration` datetime NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `registration`, `role`) VALUES
(1, 'pio.antas@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Pio Antas', '2016-02-11 10:26:00', 1),
(2, 'erika.moreira@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Erika Moreira', '2016-02-11 10:38:00', 1),
(3, 'cesimar.Xavier@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Cesimar Xavier', '2016-02-15 11:34:00', 1),
(4, 'diego.costa@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Diego Costa', '2016-01-27 11:34:00', 1),
(5, 'alba.lopes@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Alba Lopes', '2016-01-27 11:34:00', 1),
(6, 'edmilson.campos@ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Edmilson Campos', '2016-01-27 11:35:00', 1),
(7, 'claudio.junior@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Claudio JÃºnior', '2016-01-27 11:36:00', 0),
(8, 'arthur.barros@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Arthur Barros', '2016-01-27 11:37:00', 0),
(9, 'fernando.alves@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Fernando Alves', '2016-01-27 11:39:00', 0),
(10, 'bruno.Willian@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Bruno Willian', '2016-01-27 11:39:00', 0),
(11, 'pedro.victor@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Pedro Victor', '2016-01-27 11:39:00', 0),
(12, 'thiago.valentim@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Thiago Valentim', '2016-01-27 11:39:00', 1),
(13, 'ailton.torres@academico.ifrn.edu.br', 'e04ec20910b3ef5600fbbe59a6dc86ca2818d087', 'Ailton Torres', '2016-01-27 11:39:00', 1);

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
 ADD PRIMARY KEY (`id`), ADD KEY `fk_comments_users` (`user_id`), ADD KEY `fk_comments_publications` (`publication_id`);

--
-- Indexes for table `matters`
--
ALTER TABLE `matters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_publications_users` (`user_id`), ADD KEY `fk_publications_types` (`type_id`), ADD KEY `fk_publications_matters` (`matter_id`), ADD KEY `fk_publications_teachers` (`teacher_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ratings_users` (`user_id`), ADD KEY `fk_ratings_publication` (`publication_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_teachers_users` (`user_id`), ADD KEY `fk_teachers_matters` (`matter_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `matters`
--
ALTER TABLE `matters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
