-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2015 at 12:25 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Dumping data for table `configuracoes`
--

INSERT INTO `configuracoes` (`codigo`, `titulo`, `empresa`, `conteudo`, `dominio`, `descricao`, `keywords`, `logotipo`, `emailPagSeguro`, `tokenPagSeguro`, `endereco`, `numero`, `bairro`, `cep`, `cidade`, `estado`, `telefone`,`facebookPage`,`excluido`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Dumping data for table `funcoes`
--

INSERT INTO `funcoes` (`codigo`, `banner`, `video`, `galeria`, `ecommerce`, `delivery`, `imobiliaria`, `excluido`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nome`, `email`, `senha`, `administrador`, `ativo`, `excluido`) VALUES
(1, 'RogÃ©rio Eduardo Pereira', 'rogerio@groupsofter.com.br', '0495854e64f784aa25aeca615779020e8793ffb88cfef01eb1bc7301cfcb908ff38821664980798a8a105a7390fa9d400ebc3d0a79837135c9c7436c61d62c67', 1, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
