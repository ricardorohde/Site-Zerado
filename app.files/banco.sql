-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2015 at 10:59 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.13

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
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoriaImoveis`
--

CREATE TABLE IF NOT EXISTS `categoriaImoveis` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL COMMENT 'Apartamento, Casa, Terreno',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clienteEnderecos`
--

CREATE TABLE IF NOT EXISTS `clienteEnderecos` (
  `codigo` bigint(20) unsigned NOT NULL,
  `codigoCliente` bigint(20) unsigned NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigoCliente` (`codigoCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `tipoPessoa` tinyint(1) NOT NULL COMMENT '0 - Pessoa Juridica; 1 - Pessoa Fisica;',
  `rg` varchar(13) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` tinyint(1) DEFAULT NULL COMMENT '0 - Feminino; 1 - Masculino',
  `cnpj` varchar(18) DEFAULT NULL,
  `inscricaoEstadual` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `clienteTelefones`
--

CREATE TABLE IF NOT EXISTS `clienteTelefones` (
  `codigo` int(10) unsigned NOT NULL,
  `codigoCliente` int(10) unsigned NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `ramal` int(11) DEFAULT NULL,
  `operadora` varchar(20) DEFAULT NULL,
  `recado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `codigoCliente` (`codigoCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `codigo` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `conteudo` varchar(255) DEFAULT NULL,
  `dominio` varchar(100) DEFAULT NULL,
  `descricao` varchar(160) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `logotipo` varchar(100) DEFAULT NULL,
  `emailPagSeguro` varchar(100) DEFAULT NULL,
  `tokenPagSeguro` varchar(32) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` int(10) unsigned DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `telefone` varchar(17) DEFAULT NULL,
  `facebookPage` varchar(100) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `codigo` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `banner` tinyint(1) DEFAULT NULL,
  `video` tinyint(1) DEFAULT NULL,
  `galeria` tinyint(1) DEFAULT NULL,
  `ecommerce` tinyint(1) DEFAULT NULL,
  `delivery` tinyint(1) DEFAULT NULL,
  `imobiliaria` tinyint(1) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigoPagina` bigint(20) unsigned DEFAULT NULL,
  `codigoProduto` bigint(20) unsigned DEFAULT NULL,
  `codigoImovel` bigint(20) unsigned DEFAULT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `ordem` int(10) unsigned NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `codigoPagina` (`codigoPagina`,`codigoProduto`,`codigoImovel`),
  KEY `codigoProduto` (`codigoProduto`),
  KEY `codigoImovel` (`codigoImovel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `endereco` varchar(100) NOT NULL,
  `numero` int(10) unsigned NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `preco` double unsigned NOT NULL,
  `situacao` bigint(20) unsigned DEFAULT NULL COMMENT 'Aluguel, Venda, Arrendamento',
  `categoria` bigint(20) unsigned DEFAULT NULL COMMENT 'Casa, apartamento, Terreno',
  `categoriaAluguel` tinyint(1) DEFAULT NULL COMMENT '0 - Residencial; 1 - Comercial',
  `destaque` tinyint(1) NOT NULL,
  `descricao` longtext,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `situacao` (`situacao`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `localizacao` bigint(20) unsigned DEFAULT NULL,
  `texto` longtext,
  `imagem` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `localizacao` (`localizacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `valor` double NOT NULL,
  `peso` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `situacaoImoveis`
--

CREATE TABLE IF NOT EXISTS `situacaoImoveis` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `situacao` varchar(100) NOT NULL COMMENT 'Aluguel, Venda, Arrendamento',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendaProdutos`
--

CREATE TABLE IF NOT EXISTS `vendaProdutos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigoVenda` bigint(20) unsigned NOT NULL,
  `produto` bigint(20) unsigned DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` double DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigoPedido` (`codigoVenda`,`produto`),
  KEY `produto` (`produto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendas`
--

CREATE TABLE IF NOT EXISTS `vendas` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` bigint(20) unsigned DEFAULT NULL,
  `dataHora` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 - Aberto; 2 - Processando; 3 - Postado no Correio; 4 - Entregue',
  `codigoRastreio` varchar(20) DEFAULT NULL,
  `tipoEntrega` int(11) NOT NULL COMMENT '1 - PAC; 2 - SEDEX;',
  `frete` double DEFAULT NULL,
  `enderecoEntrega` varchar(100) NOT NULL,
  `numeroEntrega` int(11) NOT NULL,
  `complementoEntrega` varchar(50) DEFAULT NULL,
  `bairroEntrega` varchar(50) NOT NULL,
  `cepEntrega` varchar(9) NOT NULL,
  `cidadeEntrega` varchar(100) NOT NULL,
  `estadoEntrega` varchar(2) NOT NULL,
  `valor` double NOT NULL,
  `desconto` double DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `cliente` (`cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `video` varchar(50) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clienteEnderecos`
--
ALTER TABLE `clienteEnderecos`
  ADD CONSTRAINT `endereco-cliente` FOREIGN KEY (`codigoCliente`) REFERENCES `clientes` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `galeria_imovel` FOREIGN KEY (`codigoImovel`) REFERENCES `imoveis` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galeria_pagina` FOREIGN KEY (`codigoPagina`) REFERENCES `paginas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galeria_produto` FOREIGN KEY (`codigoProduto`) REFERENCES `produtos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoriaImoveis` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `imoveis_situacao` FOREIGN KEY (`situacao`) REFERENCES `situacaoImoveis` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `paginas`
--
ALTER TABLE `paginas`
  ADD CONSTRAINT `paginas_localizacao` FOREIGN KEY (`localizacao`) REFERENCES `localizacao` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `vendaProdutos`
--
ALTER TABLE `vendaProdutos`
  ADD CONSTRAINT `vendaProduto-Pedido` FOREIGN KEY (`codigoVenda`) REFERENCES `vendas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendaProduto-Produto` FOREIGN KEY (`produto`) REFERENCES `produtos` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas-cliente` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
