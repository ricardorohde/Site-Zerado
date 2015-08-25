-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2015 at 03:55 PM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

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
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) CHARACTER SET utf8 NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `codigo` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `empresa` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `conteudo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dominio` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `descricao` varchar(160) CHARACTER SET utf8 DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `logotipo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `localizacao` bigint(20) unsigned DEFAULT NULL,
  `texto` longtext CHARACTER SET utf8 NOT NULL,
  `imagem` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `localizacao` (`localizacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(128) CHARACTER SET utf8 NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 NOT NULL,
  `video` varchar(50) CHARACTER SET utf8 NOT NULL,
  `imagem` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paginas`
--
ALTER TABLE `paginas`
  ADD CONSTRAINT `paginas_localizacao` FOREIGN KEY (`localizacao`) REFERENCES `localizacao` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
