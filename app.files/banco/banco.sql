-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Maio-2016 às 22:37
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotelestancia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogoclientes`
--

CREATE TABLE IF NOT EXISTS `catalogoclientes` (
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
-- Estrutura da tabela `categoriaimoveis`
--

CREATE TABLE IF NOT EXISTS `categoriaimoveis` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL COMMENT 'Apartamento, Casa, Terreno',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaprodutos`
--

CREATE TABLE IF NOT EXISTS `categoriaprodutos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clienteenderecos`
--

CREATE TABLE IF NOT EXISTS `clienteenderecos` (
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
-- Estrutura da tabela `clientes`
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
-- Estrutura da tabela `clientetelefones`
--

CREATE TABLE IF NOT EXISTS `clientetelefones` (
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
-- Estrutura da tabela `configuracoes`
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
-- Estrutura da tabela `depoimentos`
--

CREATE TABLE IF NOT EXISTS `depoimentos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `depoimento` longtext NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` longtext,
  `imagem` varchar(100) DEFAULT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE IF NOT EXISTS `funcoes` (
  `codigo` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `banner` tinyint(1) DEFAULT NULL,
  `video` tinyint(1) DEFAULT NULL,
  `galeria` tinyint(1) DEFAULT NULL,
  `catalogo` tinyint(1) DEFAULT NULL,
  `ecommerce` tinyint(1) DEFAULT NULL,
  `delivery` tinyint(1) DEFAULT NULL,
  `imobiliaria` tinyint(1) DEFAULT NULL,
  `portifolio` tinyint(1) DEFAULT NULL,
  `depoimentos` tinyint(1) DEFAULT NULL,
  `catalogoClientes` tinyint(1) DEFAULT NULL,
  `eventos` tinyint(1) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descricao` longtext CHARACTER SET utf8,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeriaimagens`
--

CREATE TABLE IF NOT EXISTS `galeriaimagens` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigoPagina` bigint(20) unsigned DEFAULT NULL,
  `codigoProduto` bigint(20) unsigned DEFAULT NULL,
  `codigoImovel` bigint(20) unsigned DEFAULT NULL,
  `codigoGaleria` bigint(20) unsigned DEFAULT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descricao` longtext,
  `url` varchar(100) DEFAULT NULL,
  `ordem` int(10) unsigned NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `codigoPagina` (`codigoPagina`,`codigoProduto`,`codigoImovel`),
  KEY `codigoProduto` (`codigoProduto`),
  KEY `codigoImovel` (`codigoImovel`),
  KEY `codigoGaleria` (`codigoGaleria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` int(10) unsigned DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `preco` double unsigned NOT NULL,
  `situacao` bigint(20) unsigned DEFAULT NULL COMMENT 'Aluguel, Venda, Arrendamento',
  `categoria` bigint(20) unsigned DEFAULT NULL COMMENT 'Casa, apartamento, Terreno',
  `categoriaAluguel` tinyint(1) DEFAULT NULL COMMENT '0 - Residencial; 1 - Comercial',
  `destaque` tinyint(1) NOT NULL,
  `metragemTerreno` double unsigned DEFAULT NULL,
  `metragemConstrucao` double DEFAULT NULL,
  `descricao` longtext,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `situacao` (`situacao`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
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
-- Estrutura da tabela `paginas`
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
-- Estrutura da tabela `portifolio`
--

CREATE TABLE IF NOT EXISTS `portifolio` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` longtext NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `valor` double DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `categoria` bigint(20) unsigned DEFAULT NULL,
  `subCategoria` bigint(20) unsigned DEFAULT NULL,
  `imagemVideo` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `categoria` (`categoria`,`subCategoria`),
  KEY `subCategoria` (`subCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacaoimoveis`
--

CREATE TABLE IF NOT EXISTS `situacaoimoveis` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `situacao` varchar(100) NOT NULL COMMENT 'Aluguel, Venda, Arrendamento',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoriaprodutos`
--

CREATE TABLE IF NOT EXISTS `subcategoriaprodutos` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` bigint(20) unsigned NOT NULL,
  `subCategoria` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `codigoCategoria` (`categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE IF NOT EXISTS `telefones` (
  `codigo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `telefone` varchar(15) NOT NULL,
  `whatsapp` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
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
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dataCompra` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataAlteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `codigoCliente` bigint(20) UNSIGNED NOT NULL,
  `codigoStatus` bigint(20) UNSIGNED NOT NULL,
  `referencia` varchar(32) NOT NULL,
  `valor` double NOT NULL,
  `desconto` double DEFAULT NULL,
  `montagem` double DEFAULT NULL,
  `codigoEnderecoEntrega` bigint(20) UNSIGNED NOT NULL,
  `frete` double DEFAULT NULL,
  `codigoTipoEntrega` bigint(20) UNSIGNED NOT NULL,
  `codigoRastreioCorreio` varchar(13) DEFAULT NULL,
  `formaPagamento` varchar(11) NOT NULL,
  `parcelas` int(11) DEFAULT NULL,
  `sessionPagSeguro` varchar(100) NOT NULL,
  `senderHash` varchar(100) NOT NULL,
  `tokenCartao` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
  PRIMARY KEY (`codigo`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendasprodutos`
--

CREATE TABLE `vendasprodutos` (
  `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigoVenda` bigint(20) UNSIGNED NOT NULL,
  `codigoProduto` bigint(20) UNSIGNED NOT NULL,
  `valor` double NOT NULL,
  `quantidade` int(11) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
  PRIMARY KEY (`codigo`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendastatus`
--

CREATE TABLE `vendastatus` (
  `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
  PRIMARY KEY (`codigo`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendastipoentrega`
--

CREATE TABLE `vendastipoentrega` (
  `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipoEntrega` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
  PRIMARY KEY (`codigo`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
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
-- Limitadores para a tabela `clienteenderecos`
--
ALTER TABLE `clienteenderecos`
  ADD CONSTRAINT `endereco-cliente` FOREIGN KEY (`codigoCliente`) REFERENCES `clientes` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `galeriaimagens`
--
ALTER TABLE `galeriaimagens`
  ADD CONSTRAINT `galeria_galeria` FOREIGN KEY (`codigoGaleria`) REFERENCES `galeria` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galeria_imovel` FOREIGN KEY (`codigoImovel`) REFERENCES `imoveis` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galeria_pagina` FOREIGN KEY (`codigoPagina`) REFERENCES `paginas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galeria_produto` FOREIGN KEY (`codigoProduto`) REFERENCES `produtos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD CONSTRAINT `imoveis_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoriaimoveis` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `imoveis_situacao` FOREIGN KEY (`situacao`) REFERENCES `situacaoimoveis` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `paginas`
--
ALTER TABLE `paginas`
  ADD CONSTRAINT `paginas_localizacao` FOREIGN KEY (`localizacao`) REFERENCES `localizacao` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `categoria_produto` FOREIGN KEY (`categoria`) REFERENCES `categoriaprodutos` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategoria_produto` FOREIGN KEY (`subCategoria`) REFERENCES `subcategoriaprodutos` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `subcategoriaprodutos`
--
ALTER TABLE `subcategoriaprodutos`
  ADD CONSTRAINT `categorio_subcategoriaProdutos` FOREIGN KEY (`categoria`) REFERENCES `categoriaprodutos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vendaprodutos`
--
ALTER TABLE `vendasprodutos` 
  ADD CONSTRAINT `vendasprodutos_vendas` FOREIGN KEY (`codigoVenda`) REFERENCES `vendas`(`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendasprodutos_produtos` FOREIGN KEY (`codigoProduto`) REFERENCES `produtos`(`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas` 
  ADD CONSTRAINT `vendas_cliente` FOREIGN KEY (`codigoCliente`) REFERENCES `clientes`(`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vendas_status` FOREIGN KEY (`codigoStatus`) REFERENCES `vendastatus`(`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vendas_enderecocliente` FOREIGN KEY (`codigoEnderecoEntrega`) REFERENCES `clienteenderecos`(`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `vendas_tipoentrega` FOREIGN KEY (`codigoTipoEntrega`) REFERENCES `vendastipoentrega`(`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE `clientes` ADD `senha` VARCHAR(128) NOT NULL AFTER `email`;
ALTER TABLE `clientetelefones` CHANGE `codigoCliente` `codigoCliente` BIGINT UNSIGNED NOT NULL;
ALTER TABLE `clientetelefones` ADD CONSTRAINT `clientetelefone_cliente` FOREIGN KEY (`codigoCliente`) REFERENCES `clientes`(`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `clienteenderecos` ADD `ativo` BOOLEAN NOT NULL DEFAULT TRUE AFTER `cep`, ADD `excluido` BOOLEAN NOT NULL DEFAULT FALSE AFTER `ativo`;
ALTER TABLE `clienteenderecos` CHANGE `codigo` `codigo` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `clientetelefones` CHANGE `codigo` `codigo` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `configuracoes` ADD `sandboxPagSeguro` BOOLEAN NULL DEFAULT FALSE AFTER `tokenPagSeguro`;
ALTER TABLE `clientetelefones` ADD `ativo` BOOLEAN NOT NULL DEFAULT TRUE AFTER `recado`, ADD `excluido` BOOLEAN NOT NULL DEFAULT FALSE AFTER `ativo`;
ALTER TABLE `configuracoes` ADD `emailPagSeguroSandbox` VARCHAR(100) NULL AFTER `tokenPagSeguro`, ADD `tokenPagSeguroSandbox` VARCHAR(32) NULL AFTER `emailPagSeguroSandbox`;

--
-- Dumping data for table `configuracoes`
--

INSERT INTO `configuracoes` (`codigo`, `titulo`, `empresa`, `conteudo`, `dominio`, `descricao`, `keywords`, `logotipo`, `emailPagSeguro`, `tokenPagSeguro`, `emailPagSeguroSandbox`, `tokenPagSeguro`, `sandboxPagSeguro`, `endereco`, `numero`, `bairro`, `cep`, `cidade`, `estado`, `telefone`,`facebookPage`,`excluido`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Dumping data for table `funcoes`
--

INSERT INTO `funcoes` (`codigo`, `banner`, `video`, `galeria`, `catalogo`, `ecommerce`, `delivery`, `imobiliaria`, `portifolio`, `depoimentos`, `catalogoClientes`, `eventos`, `excluido`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nome`, `email`, `senha`, `administrador`, `ativo`, `excluido`) VALUES (1, 'RogÃ©rio Eduardo Pereira', 'rogerio@colmeiatecnologia.com.br', '0495854e64f784aa25aeca615779020e8793ffb88cfef01eb1bc7301cfcb908ff38821664980798a8a105a7390fa9d400ebc3d0a79837135c9c7436c61d62c67', 1, 1, 0);

--
-- Dumping data for table `vendastatus`
--

INSERT INTO `vendastatus` (`codigo`, `status`, `descricao`, `ativo`, `excluido`) VALUES
(1, 'Aguardando pagamento', 'O comprador iniciou a transaÃ§Ã£o, mas atÃ© o momento o PagSeguro nÃ£o recebeu nenhuma informaÃ§Ã£o sobre o pagamento', 1, 0),
(2, 'Em anÃ¡lise', 'O comprador optou por pagar com um cartÃ£o de crÃ©dito e o PagSeguro estÃ¡ analisando o risco da transaÃ§Ã£o', 1, 0),
(3, 'Paga', 'A transaÃ§Ã£o foi paga pelo comprador e o PagSeguro jÃ¡ recebeu uma confirmaÃ§Ã£o da instituiÃ§Ã£o financeira responsÃ¡vel pelo processamento', 1, 0),
(4, 'DisponÃ­vel', 'A transaÃ§Ã£o foi paga e chegou ao final de seu prazo de liberaÃ§Ã£o sem ter sido retornada e sem que haja nenhuma disputa aberta', 1, 0),
(5, 'Em disputa', 'O comprador, dentro do prazo de liberaÃ§Ã£o da transaÃ§Ã£o, abriu uma disputa', 1, 0),
(6, 'Devolvido', 'O valor da transaÃ§Ã£o foi devolvido para o comprador', 1, 0),
(7, 'Cancelada', 'A transaÃ§Ã£o foi cancelada sem ter sido finalizada', 1, 0),
(8, 'Debitado', 'O valor da transaÃ§Ã£o foi devolvido para o comprador', 1, 0),
(9, 'RetenÃ§Ã£o temporÃ¡ria', 'O comprador abriu uma solicitaÃ§Ã£o de chargeback junto Ã  operadora do cartÃ£o de crÃ©dito', 1, 0);

--
-- Dumping data for table `vendasTipoEntrega`
--
INSERT INTO `vendastipoentrega` (`codigo`, `tipoEntrega`, `ativo`, `excluido`) VALUES (NULL, 'PAC', '1', '0'), (NULL, 'SEDEX', '1', '0'), (NULL, 'NOT_SPECIFIED', '1', '0');