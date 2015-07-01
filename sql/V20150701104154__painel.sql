-- phpMyAdmin SQL Dump
-- version 4.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01-Jul-2015 às 10:07
-- Versão do servidor: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.6.9-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `painel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `analytic`
--

CREATE TABLE IF NOT EXISTS `analytic` (
  `id` int(11) NOT NULL,
  `pagina` int(11) DEFAULT NULL,
  `id_pagina` int(11) DEFAULT NULL,
  `criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `quantidade` int(11) DEFAULT '1',
  `user_agent` text,
  `ip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `name`, `size`, `type`, `criacao`) VALUES
(9, '1-o.jpg', 230191, 'image/jpeg', '2015-06-25 14:56:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `mensagem` text,
  `criacao` timestamp NULL DEFAULT NULL,
  `atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `arquivo` varchar(200) DEFAULT NULL,
  `tipo` int(11) DEFAULT '1' COMMENT '1 falo conosco 2 Depoimentos',
  `status` int(11) DEFAULT '2' COMMENT '1 publicado 2 nÃ£o publicado',
  `lido` int(11) DEFAULT '2' COMMENT '1 lido 2 nÃ£o lido',
  `resposta` int(11) DEFAULT NULL COMMENT '1 sim, 2 nÃ£o',
  `assunto` varchar(45) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `telefone`, `mensagem`, `criacao`, `atualizacao`, `arquivo`, `tipo`, `status`, `lido`, `resposta`, `assunto`) VALUES
(14, 'xxx', NULL, NULL, 'fasdfsdf', '2015-04-13 17:58:15', '2015-04-14 16:50:21', NULL, 2, 2, 2, NULL, NULL),
(13, 'Antonio Santos', NULL, NULL, 'Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. ', '2015-04-08 20:58:13', '2015-04-14 16:49:36', NULL, 2, 1, 2, NULL, NULL),
(11, 'Antonio Santos', NULL, NULL, 'Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros. ', '2015-04-08 20:54:47', '2015-04-08 21:03:29', NULL, 2, 1, 2, NULL, NULL),
(16, 'Antonio Santos', NULL, NULL, 'asdfasdfasdf', '2015-04-14 16:49:15', '2015-04-14 16:49:47', NULL, 2, 1, 2, NULL, NULL),
(17, 'asdfasd', NULL, NULL, 'fasdfasdfasdfsdqf', '2015-04-14 16:49:20', '2015-04-14 16:49:55', NULL, 2, 1, 2, NULL, NULL),
(18, 'asdfasdfsadf', NULL, NULL, 'asdfasdfasdfasd', '2015-04-14 16:49:26', '2015-04-14 16:50:01', NULL, 2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `name`, `size`, `type`, `criacao`) VALUES
(12, '1-o.jpg', 230191, 'image/jpeg', '2015-06-25 14:55:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE IF NOT EXISTS `servico` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobre`
--

CREATE TABLE IF NOT EXISTS `sobre` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `foto` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL COMMENT '1 sobre 2 termo',
  `criacao` timestamp NULL DEFAULT NULL,
  `atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sobre`
--

INSERT INTO `sobre` (`id`, `nome`, `descricao`, `foto`, `link`, `categoria`, `criacao`, `atualizacao`) VALUES
(1, NULL, 'Sobre sua empresa.', NULL, NULL, NULL, NULL, '2015-07-01 13:07:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` text,
  `status` int(11) DEFAULT NULL,
  `criacao` timestamp NULL DEFAULT NULL,
  `atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(16) DEFAULT NULL,
  `nivel_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `email`, `senha`, `status`, `criacao`, `atualizacao`, `ip`, `nivel_id`) VALUES
(2, 'marcus', 'marcus', 'marcus@inetsistemas.com.br', '$2y$10$Wr4d7kPpZKOUY8H5wqaK6ujHevyElC5w5hDrflKIAlbBfawgFKvWu', NULL, NULL, '2015-06-30 20:42:06', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  `video` text,
  `criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `nome`, `descricao`, `video`, `criacao`) VALUES
(1, 'Trainamento', NULL, 'https://www.youtube.com/watch?v=pirTIAy1NVM', '2015-06-26 23:13:39'),
(2, 'adfasdf', NULL, 'https://www.youtube.com/watch?v=xjfVDxttN7Y', '2015-06-26 23:14:12'),
(3, 'Trainamento', NULL, 'https://www.youtube.com/watch?v=uWN2kYo4cX8&feature=youtu.be', '2015-06-26 23:15:05'),
(4, 'Trainamento', NULL, 'https://www.youtube.com/watch?v=pirTIAy1NVM', '2015-06-26 23:15:11'),
(5, 'Trainamento', NULL, 'https://www.youtube.com/watch?v=pirTIAy1NVM', '2015-06-26 23:15:27'),
(6, 'Trainamento', NULL, 'https://www.youtube.com/watch?v=pirTIAy1NVM', '2015-06-26 23:15:34'),
(7, 'Trainamento', NULL, 'https://www.youtube.com/watch?v=CyXCLQzKGEU', '2015-06-26 23:15:41'),
(8, 'Trainamento', NULL, 'https://www.youtube.com/watch?v=pirTIAy1NVM', '2015-06-26 23:15:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytic`
--
ALTER TABLE `analytic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
