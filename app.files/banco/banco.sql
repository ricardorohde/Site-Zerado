-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 25-Out-2016 às 16:27
-- Versão do servidor: 5.6.30-1
-- PHP Version: 7.0.12-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `painelzerado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogoclientes`
--

CREATE TABLE `catalogoclientes` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaimoveis`
--

CREATE TABLE `categoriaimoveis` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(100) NOT NULL COMMENT 'Apartamento, Casa, Terreno',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaprodutos`
--

CREATE TABLE `categoriaprodutos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clienteenderecos`
--

CREATE TABLE `clienteenderecos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `codigoCliente` bigint(20) UNSIGNED NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipoPessoa` tinyint(1) NOT NULL COMMENT '0 - Pessoa Juridica; 1 - Pessoa Fisica;',
  `rg` varchar(13) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` tinyint(1) DEFAULT NULL COMMENT '0 - Feminino; 1 - Masculino',
  `cnpj` varchar(18) DEFAULT NULL,
  `inscricaoEstadual` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientetelefones`
--

CREATE TABLE `clientetelefones` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `codigoCliente` int(10) UNSIGNED NOT NULL,
  `telefone` varchar(17) NOT NULL,
  `ramal` int(11) DEFAULT NULL,
  `operadora` varchar(20) DEFAULT NULL,
  `recado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `codigo` tinyint(1) UNSIGNED NOT NULL,
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
  `numero` int(10) UNSIGNED DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `telefone` varchar(17) DEFAULT NULL,
  `facebookPage` varchar(100) DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`codigo`, `titulo`, `empresa`, `conteudo`, `dominio`, `descricao`, `keywords`, `logotipo`, `emailPagSeguro`, `tokenPagSeguro`, `endereco`, `numero`, `bairro`, `cep`, `cidade`, `estado`, `telefone`, `facebookPage`, `excluido`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `depoimento` longtext NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` longtext,
  `imagem` varchar(100) DEFAULT NULL,
  `inicio` date NOT NULL,
  `fim` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoes`
--

CREATE TABLE `funcoes` (
  `codigo` tinyint(3) UNSIGNED NOT NULL,
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
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcoes`
--

INSERT INTO `funcoes` (`codigo`, `banner`, `video`, `galeria`, `catalogo`, `ecommerce`, `delivery`, `imobiliaria`, `portifolio`, `depoimentos`, `catalogoClientes`, `eventos`, `excluido`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descricao` longtext CHARACTER SET utf8,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeriaimagens`
--

CREATE TABLE `galeriaimagens` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `codigoPagina` bigint(20) UNSIGNED DEFAULT NULL,
  `codigoProduto` bigint(20) UNSIGNED DEFAULT NULL,
  `codigoImovel` bigint(20) UNSIGNED DEFAULT NULL,
  `codigoGaleria` bigint(20) UNSIGNED DEFAULT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descricao` longtext,
  `url` varchar(100) DEFAULT NULL,
  `ordem` int(10) UNSIGNED NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` int(10) UNSIGNED DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `preco` double UNSIGNED NOT NULL,
  `situacao` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Aluguel, Venda, Arrendamento',
  `categoria` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Casa, apartamento, Terreno',
  `categoriaAluguel` tinyint(1) DEFAULT NULL COMMENT '0 - Residencial; 1 - Comercial',
  `destaque` tinyint(1) NOT NULL,
  `metragemTerreno` double UNSIGNED DEFAULT NULL,
  `metragemConstrucao` double DEFAULT NULL,
  `descricao` longtext,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE `localizacao` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `localizacao` bigint(20) UNSIGNED DEFAULT NULL,
  `texto` longtext,
  `imagem` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `portifolio`
--

CREATE TABLE `portifolio` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` longtext NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` longtext,
  `valor` double DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `categoria` bigint(20) UNSIGNED DEFAULT NULL,
  `subCategoria` bigint(20) UNSIGNED DEFAULT NULL,
  `imagemVideo` varchar(50) DEFAULT NULL,
  `video` varchar(50) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacaoimoveis`
--

CREATE TABLE `situacaoimoveis` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `situacao` varchar(100) NOT NULL COMMENT 'Aluguel, Venda, Arrendamento',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoriaprodutos`
--

CREATE TABLE `subcategoriaprodutos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `categoria` bigint(20) UNSIGNED NOT NULL,
  `subCategoria` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `whatsapp` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `telefones`
--

INSERT INTO `telefones` (`codigo`, `telefone`, `whatsapp`, `ativo`, `excluido`) VALUES
(1, '(55) 55555-5555', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(128) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nome`, `email`, `senha`, `administrador`, `ativo`, `excluido`) VALUES
(1, 'RogÃ©rio Eduardo Pereira', 'rogerio@groupsofter.com.br', '0495854e64f784aa25aeca615779020e8793ffb88cfef01eb1bc7301cfcb908ff38821664980798a8a105a7390fa9d400ebc3d0a79837135c9c7436c61d62c67', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendaprodutos`
--

CREATE TABLE `vendaprodutos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `codigoVenda` bigint(20) UNSIGNED NOT NULL,
  `produto` bigint(20) UNSIGNED DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `desconto` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `cliente` bigint(20) UNSIGNED DEFAULT NULL,
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
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `codigo` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `video` varchar(50) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `catalogoclientes`
--
ALTER TABLE `catalogoclientes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `categoriaimoveis`
--
ALTER TABLE `categoriaimoveis`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `categoriaprodutos`
--
ALTER TABLE `categoriaprodutos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `clienteenderecos`
--
ALTER TABLE `clienteenderecos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoCliente` (`codigoCliente`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `clientetelefones`
--
ALTER TABLE `clientetelefones`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoCliente` (`codigoCliente`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `funcoes`
--
ALTER TABLE `funcoes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `galeriaimagens`
--
ALTER TABLE `galeriaimagens`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoPagina` (`codigoPagina`,`codigoProduto`,`codigoImovel`),
  ADD KEY `codigoProduto` (`codigoProduto`),
  ADD KEY `codigoImovel` (`codigoImovel`),
  ADD KEY `codigoGaleria` (`codigoGaleria`);

--
-- Indexes for table `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `situacao` (`situacao`),
  ADD KEY `categoria` (`categoria`);

--
-- Indexes for table `localizacao`
--
ALTER TABLE `localizacao`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `localizacao` (`localizacao`);

--
-- Indexes for table `portifolio`
--
ALTER TABLE `portifolio`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `categoria` (`categoria`,`subCategoria`),
  ADD KEY `subCategoria` (`subCategoria`);

--
-- Indexes for table `situacaoimoveis`
--
ALTER TABLE `situacaoimoveis`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `subcategoriaprodutos`
--
ALTER TABLE `subcategoriaprodutos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoCategoria` (`categoria`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigoPedido` (`codigoVenda`,`produto`),
  ADD KEY `produto` (`produto`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cliente` (`cliente`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catalogoclientes`
--
ALTER TABLE `catalogoclientes`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoriaimoveis`
--
ALTER TABLE `categoriaimoveis`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoriaprodutos`
--
ALTER TABLE `categoriaprodutos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clienteenderecos`
--
ALTER TABLE `clienteenderecos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientetelefones`
--
ALTER TABLE `clientetelefones`
  MODIFY `codigo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `codigo` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcoes`
--
ALTER TABLE `funcoes`
  MODIFY `codigo` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galeriaimagens`
--
ALTER TABLE `galeriaimagens`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `localizacao`
--
ALTER TABLE `localizacao`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portifolio`
--
ALTER TABLE `portifolio`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `situacaoimoveis`
--
ALTER TABLE `situacaoimoveis`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategoriaprodutos`
--
ALTER TABLE `subcategoriaprodutos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `telefones`
--
ALTER TABLE `telefones`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendaprodutos`
--
ALTER TABLE `vendaprodutos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
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
ALTER TABLE `vendaprodutos`
  ADD CONSTRAINT `vendaProduto-Pedido` FOREIGN KEY (`codigoVenda`) REFERENCES `vendas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vendaProduto-Produto` FOREIGN KEY (`produto`) REFERENCES `produtos` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas-cliente` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`codigo`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
