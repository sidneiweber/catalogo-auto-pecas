-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 02-Out-2015 às 12:19
-- Versão do servidor: 5.5.44-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `catalogo`
--
CREATE DATABASE IF NOT EXISTS `catalogo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `catalogo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
`idCliente` int(11) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(25) NOT NULL,
  `cpf_cnpj` varchar(40) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=191 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

DROP TABLE IF EXISTS `contas_pagar`;
CREATE TABLE IF NOT EXISTS `contas_pagar` (
`id` int(11) NOT NULL,
  `fornecedor` text NOT NULL,
  `numero_documento` text NOT NULL,
  `data` date NOT NULL,
  `valor` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4495 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamento`
--

DROP TABLE IF EXISTS `orcamento`;
CREATE TABLE IF NOT EXISTS `orcamento` (
`id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `idOrcamento` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` float NOT NULL,
  `dataHora` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19553 ;

--
-- Acionadores `orcamento`
--
DROP TRIGGER IF EXISTS `atualizaEstoqueDevolucao`;
DELIMITER //
CREATE TRIGGER `atualizaEstoqueDevolucao` BEFORE DELETE ON `orcamento`
 FOR EACH ROW UPDATE produtos SET estoque = estoque + OLD.quantidade WHERE id = OLD.idProduto
//
DELIMITER ;
DROP TRIGGER IF EXISTS `atualizaQuantidadeProduto`;
DELIMITER //
CREATE TRIGGER `atualizaQuantidadeProduto` BEFORE INSERT ON `orcamento`
 FOR EACH ROW UPDATE produtos SET estoque = estoque - NEW.quantidade WHERE id = NEW.idProduto
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
`id` int(11) NOT NULL,
  `codigo` text,
  `produto` text,
  `descricao` text,
  `estoque` text,
  `codigo_original` text,
  `codigo_paralelo` text,
  `ncm` text,
  `preco` text,
  `promocao` text,
  `foto` text,
  `pasta` text,
  `custo` text,
  `ultimo_fornecedor` text
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40975 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `contas_pagar`
--
ALTER TABLE `contas_pagar`
 ADD PRIMARY KEY (`id`), ADD KEY `data` (`data`);

--
-- Indexes for table `orcamento`
--
ALTER TABLE `orcamento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `pesquisa` (`produto`,`descricao`), ADD FULLTEXT KEY `pesquisa2` (`produto`,`descricao`), ADD FULLTEXT KEY `pesquisa_final` (`produto`,`descricao`), ADD FULLTEXT KEY `indice_pesquisa` (`codigo`,`produto`,`descricao`,`codigo_original`,`codigo_paralelo`), ADD FULLTEXT KEY `codigo` (`codigo`,`produto`,`descricao`,`codigo_original`,`codigo_paralelo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `contas_pagar`
--
ALTER TABLE `contas_pagar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4495;
--
-- AUTO_INCREMENT for table `orcamento`
--
ALTER TABLE `orcamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19553;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40975;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
