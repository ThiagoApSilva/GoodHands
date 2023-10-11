-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 06-Dez-2020 às 20:51
-- Versão do servidor: 10.3.14-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodhands`
--
CREATE DATABASE IF NOT EXISTS `goodhands` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `goodhands`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
CREATE TABLE IF NOT EXISTS `cadastro` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `uf` varchar(50) DEFAULT NULL,
  `ibge` varchar(20) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `arquivo` varchar(50) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `coren` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `descricao` varchar(8000) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `coren` (`coren`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id_usuario`, `nome`, `usuario`, `senha`, `email`, `cep`, `uf`, `ibge`, `cidade`, `bairro`, `rua`, `numero`, `telefone`, `arquivo`, `dt_nascimento`, `coren`, `foto`, `descricao`, `categoria`) VALUES
(1, 'cliente1', 'cliente1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'cliente1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(11)1 1111-1111', NULL, NULL, NULL, NULL, NULL, 'cliente'),
(2, 'Thiago Aparecido da Silva', 'thiago', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'aparecidothiago33@gmail.com', '07500-000', 'SP', '3546801', 'Santa Isabel', 'Monte Negro', 'Monte Negro', '00', '(11)9 6399-1633', '01004fa9ca0ac9c3bb46750e7bf72b5e59cb46b9.pdf', '2002-07-07', 'Coren sp 1111', 'perfil/b3c55181104b7efdcc8b9c304e8530fc.jpeg', NULL, 'cuidador'),
(3, 'Raissa Reis de Sousa', 'raissa', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'raissareiss@gmail.com', '07432-575', 'SP', '3503901', 'ArujÃ¡', 'Jardim das Cerejeiras', 'Rua Tomi Saburo Yamamoto', '34', '(11)9 8948-1580', '59715a5127c502569a7c2c98342e5edd352e26f2.pdf', '2002-01-28', 'Coren sp 2222', 'perfil/4d9c0d9dddb56ad6c2c878913fbc619d.jpeg', NULL, 'cuidador'),
(4, 'NathÃ¡lia Caroline Pereira Fortunato', 'nathalia', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'nathpereira@gmail.com', '07500-000', 'SP', '3546801', 'Santa Isabel', 'Monte Serrat', '', '', '(11)9 7028-9708', 'b17467ba38d9832f928de93bc198d569741498fe.pdf', '2000-11-11', 'Coren sp 3333', 'perfil/ae5dbd68948f90f85a0f1db05a2ff243.jpeg', NULL, 'cuidador'),
(5, 'Gustavo Vaz de Lima', 'gustavo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'gustavovaz@gmail.com', '07500-000', 'SP', '3546801', 'Santa Isabel', 'Jardim das Acassias', '', '', '(11)9 5079-1145', 'f8ea9b9480f83af3d4dab495412702a9c76eb75a.pdf', '2000-03-26', 'Coren sp 4444', NULL, NULL, 'cuidador'),
(6, 'Vinicius Santana Fontoura', 'vinicius', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'vinicius@gmail.com', '07401-085', 'SP', '3503901', 'ArujÃ¡', 'ArujÃ¡ Center Ville', 'Rua Aires Monteiro', '23', '(11)9 9876-1722', 'b23de25d1962e7ba37bc88cf4cda9ec444de49db.pdf', '1999-03-12', 'Coren sp 5555', 'perfil/2d0ca878bd7e1a8f1df0e89ed4c193da.jpeg', NULL, 'cuidador'),
(7, 'Murilo Trevizol Melin', 'murilo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'murilo@gmail.com', '07500-000', 'SP', '3546801', 'Santa Isabel', 'Monte Serrat', '', '', '(11)9 3505-6852', '1f84b5bd1bda8ed7e9c92990e74461d53af24cbd.pdf', '1998-02-22', 'Coren sp 6666', 'perfil/4d38245cd840a7003db7930c36be2441.jpeg', NULL, 'cuidador'),
(8, 'Good Hands', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'goodhandstcc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '(11)9 4002-8922', NULL, NULL, NULL, NULL, NULL, 'amd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(100) NOT NULL,
  `envio` int(5) DEFAULT NULL,
  `conversa` varchar(8000) DEFAULT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

DROP TABLE IF EXISTS `contrato`;
CREATE TABLE IF NOT EXISTS `contrato` (
  `id_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `numero_cartao` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `dt_vencimento` varchar(10) DEFAULT NULL,
  `cvv` int(3) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(100) DEFAULT NULL,
  `profissional` varchar(100) DEFAULT NULL,
  `valor` varchar(100) DEFAULT NULL,
  `hora` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contrato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

DROP TABLE IF EXISTS `denuncia`;
CREATE TABLE IF NOT EXISTS `denuncia` (
  `id_denuncia` int(11) NOT NULL AUTO_INCREMENT,
  `id_denunciador` int(10) NOT NULL,
  `id_denunciado` int(10) DEFAULT NULL,
  `mensagem` varchar(8000) NOT NULL,
  PRIMARY KEY (`id_denuncia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especificacao`
--

DROP TABLE IF EXISTS `especificacao`;
CREATE TABLE IF NOT EXISTS `especificacao` (
  `id_especificacao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_especificacao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_especificacao`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especificacao`
--

INSERT INTO `especificacao` (`id_especificacao`, `nome_especificacao`) VALUES
(1, 'Fisioterapeuta'),
(2, 'PsicÃ³logo'),
(3, 'Enfermeiro(a)'),
(4, 'Parkinson');

-- --------------------------------------------------------

--
-- Estrutura da tabela `previa_contrato`
--

DROP TABLE IF EXISTS `previa_contrato`;
CREATE TABLE IF NOT EXISTS `previa_contrato` (
  `id_previa` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(10) DEFAULT NULL,
  `id_cuidador` int(10) DEFAULT NULL,
  `tempo` varchar(10) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `liberacao` varchar(100) DEFAULT NULL,
  `finalizado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_previa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_chat`
--

DROP TABLE IF EXISTS `registro_chat`;
CREATE TABLE IF NOT EXISTS `registro_chat` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_criador` int(10) NOT NULL,
  `id_receptor` int(10) NOT NULL,
  `nome_chat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_registro`),
  UNIQUE KEY `nome_chat` (`nome_chat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_especificacao`
--

DROP TABLE IF EXISTS `registro_especificacao`;
CREATE TABLE IF NOT EXISTS `registro_especificacao` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `nome_especificacao` varchar(100) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  PRIMARY KEY (`id_registro`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registro_especificacao`
--

INSERT INTO `registro_especificacao` (`id_registro`, `nome_especificacao`, `id_usuario`) VALUES
(1, 'Fisioterapeuta', 3),
(2, 'Fisioterapeuta', 4),
(3, 'Enfermeiro(a)', 4),
(4, 'PsicÃ³logo', 5),
(5, 'PsicÃ³logo', 6),
(6, 'Enfermeiro(a)', 6),
(7, 'Parkinson', 6),
(8, 'Fisioterapeuta', 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
