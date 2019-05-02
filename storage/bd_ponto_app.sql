-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Maio-2019 às 05:17
-- Versão do servidor: 5.7.10-log
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_ponto_app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_competencia`
--

CREATE TABLE `tb_competencia` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_competencia`
--

INSERT INTO `tb_competencia` (`id`, `id_empresa`, `mes`, `ano`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(1, 2, 1, 2019, '2019-04-16 01:40:24', 15, NULL, NULL, 1),
(2, 2, 2, 2019, '2019-04-16 01:40:24', 15, NULL, NULL, 1),
(3, 2, 3, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(4, 2, 4, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(5, 2, 5, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(6, 2, 6, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(7, 2, 7, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(8, 2, 8, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(9, 2, 9, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(10, 2, 10, 2019, '2019-04-16 01:40:25', 15, NULL, NULL, 1),
(11, 2, 11, 2019, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(12, 2, 12, 2019, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(13, 2, 1, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(14, 2, 2, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(15, 2, 3, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(16, 2, 4, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(17, 2, 5, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(18, 2, 6, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(19, 2, 7, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(20, 2, 8, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(21, 2, 9, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(22, 2, 10, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(23, 2, 11, 2020, '2019-04-16 01:40:26', 15, NULL, NULL, 1),
(24, 2, 12, 2020, '2019-04-16 01:40:27', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `nome_fantasia` varchar(200) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `id_endereco` int(11) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`id_empresa`, `nome`, `nome_fantasia`, `cnpj`, `id_endereco`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(2, 'PREFEITURA MUNICIPAL DE  GUAMARE', 'PREFEITURA MUNICIPAL DE  GUAMARE', '08.184.442/0001-47', 17, '2019-03-31 14:21:57', 15, '2019-04-03 15:45:02', 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id_endereco` int(11) NOT NULL,
  `logradouro` varchar(200) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_endereco`, `logradouro`, `numero`, `complemento`, `cep`, `bairro`, `cidade`, `uf`, `telefone`, `celular`, `email`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(17, 'RUA LUIZ DE SOUZA MIRANDA', '1166', NULL, '59598-000', 'CENTRO', 'Guamarï¿½', 'RN', '(84) 3525-2968', NULL, 'rh@guamare.rn.gov.br', '2019-03-31 14:17:48', 15, '2019-04-03 15:45:03', 15, 1),
(18, NULL, NULL, NULL, NULL, NULL, 'Guamaré', 'RN', NULL, NULL, NULL, '2019-03-31 14:24:48', 15, NULL, NULL, 1),
(19, 'JOSE DOS SANTOS', '2', '', '59507-000', 'CENTRO', 'ALTO DO RODRIGUES', 'RN', '', '', '', '2019-04-03 18:29:17', 15, NULL, NULL, 1),
(20, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-03 18:51:11', 15, '2019-04-17 17:35:07', 15, 0),
(21, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-03 18:54:27', 15, NULL, NULL, 1),
(22, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-10 19:00:31', 15, NULL, NULL, 1),
(23, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-10 19:25:23', 15, NULL, NULL, 1),
(24, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 11:49:03', 15, NULL, NULL, 1),
(25, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 11:51:07', 15, NULL, NULL, 1),
(26, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 11:52:23', 15, NULL, NULL, 1),
(27, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 11:54:32', 15, NULL, NULL, 1),
(28, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 11:57:26', 15, NULL, NULL, 1),
(29, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 11:58:34', 15, NULL, NULL, 1),
(30, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:00:15', 15, NULL, NULL, 1),
(31, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:01:35', 15, NULL, NULL, 1),
(32, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:06:12', 15, NULL, NULL, 1),
(33, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:09:06', 15, NULL, NULL, 1),
(34, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:10:09', 15, NULL, NULL, 1),
(35, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:11:04', 15, NULL, NULL, 1),
(36, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:12:51', 15, NULL, NULL, 1),
(37, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:14:41', 15, NULL, NULL, 1),
(38, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:16:57', 15, NULL, NULL, 1),
(39, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:23:41', 15, NULL, NULL, 1),
(40, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:24:52', 15, NULL, NULL, 1),
(41, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:26:25', 15, NULL, NULL, 1),
(42, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:27:55', 15, NULL, NULL, 1),
(43, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:29:37', 15, NULL, NULL, 1),
(44, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:38:03', 15, NULL, NULL, 1),
(45, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:41:01', 15, NULL, NULL, 1),
(46, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:43:54', 15, NULL, NULL, 1),
(47, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:45:08', 15, NULL, NULL, 1),
(48, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:47:21', 15, NULL, NULL, 1),
(49, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:51:44', 15, NULL, NULL, 1),
(50, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 12:53:20', 15, NULL, NULL, 1),
(51, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:03:25', 15, NULL, NULL, 1),
(52, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:07:39', 15, NULL, NULL, 1),
(53, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:10:53', 15, NULL, NULL, 1),
(54, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:12:03', 15, NULL, NULL, 1),
(55, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:19:26', 15, NULL, NULL, 1),
(56, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:20:29', 15, NULL, NULL, 1),
(57, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:22:16', 15, NULL, NULL, 1),
(58, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:24:09', 15, NULL, NULL, 1),
(59, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:27:13', 15, NULL, NULL, 1),
(60, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:31:30', 15, NULL, NULL, 1),
(61, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:34:10', 15, NULL, NULL, 1),
(62, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:35:11', 15, NULL, NULL, 1),
(63, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:39:44', 15, NULL, NULL, 1),
(64, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:40:57', 15, NULL, NULL, 1),
(65, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:42:51', 15, NULL, NULL, 1),
(66, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:45:17', 15, NULL, NULL, 1),
(67, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:51:18', 15, NULL, NULL, 1),
(68, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:53:27', 15, NULL, NULL, 1),
(69, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:54:39', 15, NULL, NULL, 1),
(70, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:55:38', 15, NULL, NULL, 1),
(71, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:56:37', 15, NULL, NULL, 1),
(72, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:57:40', 15, NULL, NULL, 1),
(73, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 13:59:06', 15, NULL, NULL, 1),
(74, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:00:21', 15, NULL, NULL, 1),
(75, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:07:18', 15, NULL, NULL, 1),
(76, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:09:49', 15, NULL, NULL, 1),
(77, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:10:56', 15, NULL, NULL, 1),
(78, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:12:06', 15, NULL, NULL, 1),
(79, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:14:44', 15, NULL, NULL, 1),
(80, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:16:08', 15, NULL, NULL, 1),
(81, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:17:36', 15, NULL, NULL, 1),
(82, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:19:58', 15, NULL, NULL, 1),
(83, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:22:54', 15, NULL, NULL, 1),
(84, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:24:14', 15, NULL, NULL, 1),
(85, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:27:51', 15, NULL, NULL, 1),
(86, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:29:12', 15, NULL, NULL, 1),
(87, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:30:20', 15, NULL, NULL, 1),
(88, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:32:42', 15, NULL, NULL, 1),
(89, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:33:56', 15, NULL, NULL, 1),
(90, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:35:49', 15, NULL, NULL, 1),
(91, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:37:03', 15, NULL, NULL, 1),
(92, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:38:09', 15, NULL, NULL, 1),
(93, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:46:10', 15, NULL, NULL, 1),
(94, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:49:04', 15, NULL, NULL, 1),
(95, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:50:27', 15, NULL, NULL, 1),
(96, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:52:28', 15, NULL, NULL, 1),
(97, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 14:54:52', 15, NULL, NULL, 1),
(98, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:15:36', 15, NULL, NULL, 1),
(99, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:16:56', 15, NULL, NULL, 1),
(100, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:19:59', 15, NULL, NULL, 1),
(101, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:21:03', 15, NULL, NULL, 1),
(102, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:22:17', 15, NULL, NULL, 1),
(103, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:23:13', 15, NULL, NULL, 1),
(104, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:26:01', 15, NULL, NULL, 1),
(105, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:27:41', 15, NULL, NULL, 1),
(106, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:28:49', 15, NULL, NULL, 1),
(107, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:30:45', 15, NULL, NULL, 1),
(108, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:34:03', 15, NULL, NULL, 1),
(109, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:36:09', 15, NULL, NULL, 1),
(110, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:40:07', 15, NULL, NULL, 1),
(111, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:41:29', 15, NULL, NULL, 1),
(112, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:42:35', 15, NULL, NULL, 1),
(113, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:43:58', 15, NULL, NULL, 1),
(114, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:44:56', 15, NULL, NULL, 1),
(115, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:46:43', 15, NULL, NULL, 1),
(116, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:47:54', 15, NULL, NULL, 1),
(117, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:49:07', 15, NULL, NULL, 1),
(118, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:50:17', 15, NULL, NULL, 1),
(119, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 15:51:25', 15, NULL, NULL, 1),
(120, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 16:03:55', 15, NULL, NULL, 1),
(121, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 16:04:48', 15, NULL, NULL, 1),
(122, '', '', '', '', '', '', 'AC', '', '', '', '2019-04-15 16:05:57', 15, NULL, NULL, 1),
(123, 'Rua Fabrício Pedroza', '', '', '50014-030', 'Areia Preta', 'Natal', 'RN', '', '', '', '2019-04-27 00:06:59', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_feriado`
--

CREATE TABLE `tb_feriado` (
  `id_feriado` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `dt_feriado` date NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_feriado`
--

INSERT INTO `tb_feriado` (`id_feriado`, `nome`, `dt_feriado`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(1, 'CARNAVAL', '2019-03-04', '2019-04-09 16:37:41', 15, '2019-04-09 13:38:02', 15, 0),
(2, 'CARNAVAL', '2019-03-04', '2019-04-09 16:38:29', 15, NULL, NULL, 1),
(3, 'CARNAVAL', '2019-03-05', '2019-04-09 16:38:42', 15, NULL, NULL, 1),
(4, 'SEXTA FEIRA SANTA', '2019-04-19', '2019-04-09 16:39:21', 15, NULL, NULL, 1),
(5, 'TIRADENTES/PASCOA', '2019-04-21', '2019-04-09 16:39:43', 15, NULL, NULL, 1),
(6, 'DIA MUNDIAL DO TRABALHO', '2019-05-01', '2019-04-09 16:40:02', 15, NULL, NULL, 1),
(7, 'EMANCIPACAO POLITICA DE GUAMARE', '2019-05-07', '2019-04-09 16:40:23', 15, NULL, NULL, 1),
(8, 'CORPUS CHRISTI', '2019-06-20', '2019-04-09 16:41:12', 15, NULL, NULL, 1),
(9, 'CORPUS CHRISTI', '2019-06-21', '2019-04-09 16:41:32', 15, NULL, NULL, 1),
(10, 'NOSSA SENHORA DOS NAVEGANTES', '2019-08-15', '2019-04-09 16:42:00', 15, NULL, NULL, 1),
(11, 'COLONIZACAO PORTUGUESA', '2019-08-20', '2019-04-09 16:42:22', 15, NULL, NULL, 1),
(12, 'INDEPENDENCIA DO BRASIL', '2019-09-07', '2019-04-09 16:42:50', 15, NULL, NULL, 1),
(13, 'DIA ESTADUAL A MEMORIA DOS PROTOMATIRES DE URUACU E CUNHAU', '2019-10-03', '2019-04-09 16:43:38', 15, NULL, NULL, 1),
(14, 'DIA ESTADUAL A MEMORIA DOS PROTOMATIRES DE URUACU E CUNHAU', '2019-10-04', '2019-04-09 16:44:05', 15, NULL, NULL, 1),
(15, 'NOSSA SENHORA APARECIDA', '2019-10-12', '2019-04-09 16:45:03', 15, NULL, NULL, 1),
(16, 'FINADOS', '2019-11-02', '2019-04-09 16:45:25', 15, NULL, NULL, 1),
(17, 'PROCLAMACAO DA REPUBLICA', '2019-11-15', '2019-04-09 16:45:57', 15, NULL, NULL, 1),
(18, 'NOSSA SENHORA DA CONCEICAO', '2019-12-08', '2019-04-09 16:46:57', 15, NULL, NULL, 1),
(19, 'VESPERA DE NATAL', '2019-12-24', '2019-04-09 16:47:13', 15, NULL, NULL, 1),
(20, 'NATAL', '2019-12-25', '2019-04-09 16:47:24', 15, NULL, NULL, 1),
(21, 'VESPERA DE ANO NOVO', '2019-12-31', '2019-04-09 16:47:41', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcao`
--

CREATE TABLE `tb_funcao` (
  `id_funcao` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1',
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_funcao`
--

INSERT INTO `tb_funcao` (`id_funcao`, `nome`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`, `id_empresa`) VALUES
(7, 'CHEFE DO DEPTO DE RECURSOS HUMANOS', '2019-04-03 18:34:38', 15, NULL, NULL, 1, 2),
(8, 'ASSESSOR TECNICO N IV', '2019-04-03 18:53:22', 15, NULL, NULL, 1, 2),
(9, 'ASSESSOR TECNICO N I', '2019-04-09 16:55:42', 15, NULL, NULL, 1, 2),
(10, 'ASSESSOR TECNICO N II', '2019-04-09 16:55:49', 15, NULL, NULL, 1, 2),
(11, 'ASSESSOR TECNICO N III', '2019-04-09 16:55:58', 15, NULL, NULL, 1, 2),
(12, 'SECRETARIO(A) MUNICIPAL', '2019-04-09 16:56:16', 15, NULL, NULL, 1, 2),
(13, 'DIRETOR(A) DE DEPARTAMENTO', '2019-04-09 16:56:35', 15, NULL, NULL, 1, 2),
(14, 'COORDENADOR(A) DE DIVISAO', '2019-04-09 16:56:51', 15, NULL, NULL, 1, 2),
(15, 'SUB-COORDENADOR(A) DE DIVISAO', '2019-04-09 16:57:01', 15, NULL, NULL, 1, 2),
(16, 'ASSISTENTE SOCIAL', '2019-04-09 16:57:50', 15, NULL, NULL, 1, 2),
(17, 'MOTORISTA CAT &#34;B&#34;', '2019-04-09 16:59:07', 15, NULL, NULL, 1, 2),
(18, 'MOTORISTA CAT &#34;D&#34;', '2019-04-09 16:59:17', 15, NULL, NULL, 1, 2),
(19, 'ENFERMEIRO(A)', '2019-04-09 16:59:29', 15, NULL, NULL, 1, 2),
(20, 'TECNICO(A) EM ENFERMAGEM', '2019-04-09 16:59:41', 15, NULL, NULL, 1, 2),
(21, 'AUXILIAR DE SERVICOS DIVERSOS', '2019-04-09 17:00:04', 15, NULL, NULL, 1, 2),
(22, 'AUXILIAR DE SERVICOS GERAIS', '2019-04-09 17:00:17', 15, NULL, NULL, 1, 2),
(23, 'AGENTE ADMINISTRATIVO', '2019-04-09 17:00:31', 15, NULL, NULL, 1, 2),
(24, 'SECRETARIO(A) ADJUNTO(A)', '2019-04-15 12:03:09', 15, NULL, NULL, 1, 2),
(25, 'PORTEIRO', '2019-04-15 12:03:33', 15, NULL, NULL, 1, 2),
(26, 'TEC EM CONTABILIDADE', '2019-04-15 12:04:00', 15, NULL, NULL, 1, 2),
(27, 'RELACOES PUBLICAS', '2019-04-15 12:04:27', 15, NULL, NULL, 1, 2),
(28, 'CONTROLADOR(A) ADJUNTO(A)', '2019-04-15 13:53:04', 15, NULL, NULL, 1, 2),
(29, 'CONTROLADOR(A)', '2019-04-15 13:55:16', 15, NULL, NULL, 1, 2),
(30, 'TRATORISTA', '2019-04-15 14:05:40', 15, NULL, NULL, 1, 2),
(31, 'TECNICO AGRICOLA', '2019-04-15 14:06:01', 15, NULL, NULL, 1, 2),
(32, 'ELETRICISTA', '2019-04-15 14:06:30', 15, NULL, NULL, 1, 2),
(33, 'LOCUTOR OFICIAL', '2019-04-15 16:05:35', 15, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id` int(11) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `pis` varchar(13) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1',
  `matricula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`id`, `id_pessoa`, `pis`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`, `matricula`) VALUES
(15, 20, '12594644643', '2019-04-03 18:29:19', 15, NULL, NULL, 1, 27277),
(16, 21, '20389070844', '2019-04-03 18:51:12', 15, '2019-04-17 17:35:06', 15, 0, 28257),
(17, 22, '20389070844', '2019-04-03 18:54:28', 15, NULL, NULL, 1, 28257),
(18, 23, '12594644643', '2019-04-10 19:00:33', 15, NULL, NULL, 1, 27277),
(19, 24, '20389070844', '2019-04-10 19:25:24', 15, NULL, NULL, 1, 28256),
(20, 25, '20125924881', '2019-04-15 11:49:05', 15, NULL, NULL, 1, 27822),
(21, 26, '19022348388', '2019-04-15 11:51:07', 15, NULL, NULL, 1, 1397),
(22, 27, '12509028911', '2019-04-15 11:52:23', 15, NULL, NULL, 1, 27263),
(23, 28, '12853231641', '2019-04-15 11:54:33', 15, NULL, NULL, 1, 1031),
(24, 29, '12799368648', '2019-04-15 11:57:26', 15, NULL, NULL, 1, 600),
(25, 30, '12455561641', '2019-04-15 11:58:35', 15, NULL, NULL, 1, 3286),
(26, 31, '19031450785', '2019-04-15 12:00:16', 15, NULL, NULL, 1, 27947),
(27, 32, '12647845648', '2019-04-15 12:01:36', 15, NULL, NULL, 1, 27724),
(28, 33, '19052790976', '2019-04-15 12:06:12', 15, NULL, NULL, 1, 27367),
(29, 34, '10893354136', '2019-04-15 12:09:06', 15, NULL, NULL, 1, 27940),
(30, 35, '12705926986', '2019-04-15 12:10:09', 15, NULL, NULL, 1, 27806),
(31, 36, '12594644643', '2019-04-15 12:11:05', 15, NULL, NULL, 1, 27277),
(32, 37, '19045384496', '2019-04-15 12:12:51', 15, NULL, NULL, 1, 196),
(33, 38, '16210540237', '2019-04-15 12:14:41', 15, NULL, NULL, 1, 27720),
(34, 39, '19002783194', '2019-04-15 12:16:57', 15, NULL, NULL, 1, 73),
(35, 40, '13034623649', '2019-04-15 12:23:41', 15, NULL, NULL, 1, 27943),
(36, 41, '12960960647', '2019-04-15 12:24:52', 15, NULL, NULL, 1, 28221),
(37, 42, '12557411649', '2019-04-15 12:26:26', 15, NULL, NULL, 1, 3762),
(38, 43, '16217036313', '2019-04-15 12:27:55', 15, NULL, NULL, 1, 2948),
(39, 44, '12799393642', '2019-04-15 12:29:38', 15, NULL, NULL, 1, 27998),
(40, 45, '19054645159', '2019-04-15 12:38:03', 15, NULL, NULL, 1, 25110),
(41, 46, '19051415500', '2019-04-15 12:41:01', 15, NULL, NULL, 1, 27387),
(42, 47, '17034325438', '2019-04-15 12:43:54', 15, NULL, NULL, 1, 1064),
(43, 48, '13160723649', '2019-04-15 12:45:08', 15, NULL, NULL, 1, 27893),
(44, 49, '16366437409', '2019-04-15 12:47:21', 15, NULL, NULL, 1, 28222),
(45, 50, '12517877124', '2019-04-15 12:51:44', 15, NULL, NULL, 1, 27807),
(46, 51, '12245673842', '2019-04-15 12:53:20', 15, NULL, NULL, 1, 28331),
(47, 52, '17041437246', '2019-04-15 13:03:26', 15, NULL, NULL, 1, 27365),
(48, 53, '12469270954', '2019-04-15 13:07:39', 15, NULL, NULL, 1, 28088),
(49, 54, '12800922623', '2019-04-15 13:10:53', 15, NULL, NULL, 1, 2794),
(50, 55, '12245673869', '2019-04-15 13:12:03', 15, NULL, NULL, 1, 264),
(51, 56, '12780735645', '2019-04-15 13:19:26', 15, NULL, NULL, 1, 28256),
(52, 57, '12645808567', '2019-04-15 13:20:29', 15, NULL, NULL, 1, 1071),
(53, 58, '12873979641', '2019-04-15 13:22:16', 15, NULL, NULL, 1, 27284),
(54, 59, '13539888453', '2019-04-15 13:24:09', 15, NULL, NULL, 1, 27808),
(55, 60, '17049238765', '2019-04-15 13:27:13', 15, NULL, NULL, 1, 719),
(56, 61, '12740851644', '2019-04-15 13:31:30', 15, NULL, NULL, 1, 3290),
(57, 62, '19052783805', '2019-04-15 13:34:10', 15, NULL, NULL, 1, 27809),
(58, 63, '20389070844', '2019-04-15 13:35:11', 15, NULL, NULL, 1, 28257),
(59, 64, '16544900983', '2019-04-15 13:39:44', 15, NULL, NULL, 1, 27810),
(60, 65, '20932677821', '2019-04-15 13:40:57', 15, NULL, NULL, 1, 1083),
(61, 66, '18000098488', '2019-04-15 13:42:51', 15, NULL, NULL, 1, 2864),
(62, 67, '17045421646', '2019-04-15 13:45:17', 15, NULL, NULL, 1, 2397),
(63, 68, '10789028333', '2019-04-15 13:51:18', 15, NULL, NULL, 1, 27288),
(64, 69, '10789028333', '2019-04-15 13:53:27', 15, NULL, NULL, 1, 27288),
(65, 70, '12560993645', '2019-04-15 13:54:40', 15, NULL, NULL, 1, 27321),
(66, 71, '12560993645', '2019-04-15 13:55:38', 15, NULL, NULL, 1, 27321),
(67, 72, '12404579861', '2019-04-15 13:56:38', 15, NULL, NULL, 1, 27939),
(68, 73, '16210487875', '2019-04-15 13:57:41', 15, NULL, NULL, 1, 27723),
(69, 74, '13018844644', '2019-04-15 13:59:06', 15, NULL, NULL, 1, 28370),
(70, 75, '13922953459', '2019-04-15 14:00:21', 15, NULL, NULL, 1, 28042),
(71, 76, '12318376028', '2019-04-15 14:07:18', 15, NULL, NULL, 1, 674),
(72, 77, '1902235117', '2019-04-15 14:09:49', 15, NULL, NULL, 1, 27903),
(73, 78, '16145193299', '2019-04-15 14:10:56', 15, NULL, NULL, 1, 28345),
(74, 79, '12452436234', '2019-04-15 14:12:08', 15, NULL, NULL, 1, 556),
(75, 80, '13578643458', '2019-04-15 14:14:45', 15, NULL, NULL, 1, 28347),
(76, 81, '12377492705', '2019-04-15 14:16:09', 15, NULL, NULL, 1, 565),
(77, 82, '12596229643', '2019-04-15 14:17:38', 15, NULL, NULL, 1, 1203),
(78, 83, '16074695041', '2019-04-15 14:20:00', 15, NULL, NULL, 1, 282),
(79, 84, '20939741355', '2019-04-15 14:22:55', 15, NULL, NULL, 1, 302),
(80, 85, '16071902593', '2019-04-15 14:24:16', 15, NULL, NULL, 1, 27991),
(81, 86, '16215470709', '2019-04-15 14:27:52', 15, NULL, NULL, 1, 28346),
(82, 87, '19002783410', '2019-04-15 14:29:13', 15, NULL, NULL, 1, 5739),
(83, 88, '12786559644', '2019-04-15 14:30:21', 15, NULL, NULL, 1, 4066),
(84, 89, '12233698322', '2019-04-15 14:32:42', 15, NULL, NULL, 1, 5841),
(85, 90, '12803007640', '2019-04-15 14:33:56', 15, NULL, NULL, 1, 706),
(86, 91, '12784141642', '2019-04-15 14:35:50', 15, NULL, NULL, 1, 278),
(87, 92, '10026471024', '2019-04-15 14:37:04', 15, NULL, NULL, 1, 1551),
(88, 93, '12816877649', '2019-04-15 14:38:09', 15, NULL, NULL, 1, 2693),
(89, 94, '12130508334', '2019-04-15 14:46:10', 15, NULL, NULL, 1, 3174),
(90, 95, '12311639856', '2019-04-15 14:49:04', 15, NULL, NULL, 1, 28037),
(91, 96, '19022344927', '2019-04-15 14:50:28', 15, NULL, NULL, 1, 746),
(92, 97, '12665597642', '2019-04-15 14:52:28', 15, NULL, NULL, 1, 690),
(93, 98, '12581826640', '2019-04-15 14:54:52', 15, NULL, NULL, 1, 28063),
(94, 99, '20180742285', '2019-04-15 15:15:37', 15, NULL, NULL, 1, 27323),
(95, 100, '13117399649', '2019-04-15 15:16:57', 15, NULL, NULL, 1, 27990),
(96, 101, '20180748127', '2019-04-15 15:19:59', 15, NULL, NULL, 1, 28068),
(97, 102, '12404631960', '2019-04-15 15:21:04', 15, NULL, NULL, 1, 2801),
(98, 103, '16386945248', '2019-04-15 15:22:18', 15, NULL, NULL, 1, 28340),
(99, 104, '19049776208', '2019-04-15 15:23:14', 15, NULL, NULL, 1, 2789),
(100, 105, '12130657577', '2019-04-15 15:26:02', 15, NULL, NULL, 1, 353),
(101, 106, '12209504920', '2019-04-15 15:27:41', 15, NULL, NULL, 1, 46539689),
(102, 107, '12786561649', '2019-04-15 15:28:49', 15, NULL, NULL, 1, 279),
(103, 108, '12755771641', '2019-04-15 15:30:46', 15, NULL, NULL, 1, 27992),
(104, 109, '19058713442', '2019-04-15 15:34:03', 15, NULL, NULL, 1, 27897),
(105, 110, '19020389044', '2019-04-15 15:36:09', 15, NULL, NULL, 1, 28343),
(106, 111, '12903510646', '2019-04-15 15:40:08', 15, NULL, NULL, 1, 27993),
(107, 112, '19052795625', '2019-04-15 15:41:29', 15, NULL, NULL, 1, 28388),
(108, 113, '19052581382', '2019-04-15 15:42:35', 15, NULL, NULL, 1, 27988),
(109, 114, '12788049643', '2019-04-15 15:43:58', 15, NULL, NULL, 1, 100),
(110, 115, '16395860020', '2019-04-15 15:44:56', 15, NULL, NULL, 1, 28344),
(111, 116, '17045422049', '2019-04-15 15:46:43', 15, NULL, NULL, 1, 1534),
(112, 117, '19002768756', '2019-04-15 15:47:55', 15, NULL, NULL, 1, 245),
(113, 118, '16566665758', '2019-04-15 15:49:08', 15, NULL, NULL, 1, 27989),
(114, 119, '17045861239', '2019-04-15 15:50:17', 15, NULL, NULL, 1, 420),
(115, 120, '12771751641', '2019-04-15 15:51:25', 15, NULL, NULL, 1, 27995),
(116, 121, '12746531641', '2019-04-15 16:03:55', 15, NULL, NULL, 1, 27388),
(117, 122, '16050542288', '2019-04-15 16:04:51', 15, NULL, NULL, 1, 27290),
(118, 123, '16050542288', '2019-04-15 16:05:57', 15, NULL, NULL, 1, 27290),
(119, 124, '13094929647', '2019-04-27 00:07:00', 15, NULL, NULL, 1, 72123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_jornada_de_trabalho`
--

CREATE TABLE `tb_jornada_de_trabalho` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_tipo_jornada_de_trabalho` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `seg` int(11) DEFAULT '0',
  `ter` int(11) DEFAULT '0',
  `qua` int(11) DEFAULT '0',
  `qui` int(11) DEFAULT '0',
  `sex` int(11) DEFAULT '0',
  `sab` int(11) DEFAULT '0',
  `dom` int(11) DEFAULT '0',
  `num_plantoes` int(11) DEFAULT '0',
  `carga_plantao` int(11) DEFAULT '0',
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1',
  `hora_trabalho` int(11) DEFAULT '60'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_jornada_de_trabalho`
--

INSERT INTO `tb_jornada_de_trabalho` (`id`, `id_empresa`, `id_tipo_jornada_de_trabalho`, `descricao`, `seg`, `ter`, `qua`, `qui`, `sex`, `sab`, `dom`, `num_plantoes`, `carga_plantao`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`, `hora_trabalho`) VALUES
(5, 2, 3, '38 horas Semanais - 8,5 Horas diárias de Segunda a Quinta, e 4 horas na Sexta', 510, 510, 510, 510, 240, 0, 0, 0, 0, '2019-04-01 23:39:51', 15, NULL, NULL, 1, 60),
(6, 2, 4, 'Escala de 12 plantões por 12 horas - 144 horas mensais', 0, 0, 0, 0, 0, 0, 0, 12, 12, '2019-04-01 23:39:52', 15, NULL, NULL, 1, 60),
(7, 2, 3, '44 horas semanais - 8 Horas diárias De Segunda a Sexta e 4 horas no sábado', 480, 480, 480, 480, 480, 240, 0, 0, 0, '2019-04-01 23:39:52', 15, NULL, NULL, 1, 60),
(8, 2, 4, 'Escala de 10 plantões de 12 horas - 120 horas mensais', 0, 0, 0, 0, 0, 0, 0, 10, 12, '2019-04-01 23:39:52', 15, NULL, NULL, 1, 60),
(9, 2, 3, '20 horas semanais - 4 Horas diárias De Segunda a Sexta', 240, 240, 240, 240, 240, 0, 0, 0, 0, '2019-04-01 23:39:52', 15, NULL, NULL, 1, 60),
(10, 2, 3, '30 horas semanais - 6 Horas diárias De Segunda a Sexta', 360, 360, 360, 360, 360, 0, 0, 0, 0, '2019-04-01 23:39:52', 15, NULL, NULL, 1, 60),
(11, 2, 3, '25 horas semanais - 5 Horas diárias De Segunda a Sexta', 300, 300, 300, 300, 300, 0, 0, 0, 0, '2019-04-15 23:23:06', 15, NULL, NULL, 1, 60);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_justificativa`
--

CREATE TABLE `tb_justificativa` (
  `id_justificativa` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `data` date NOT NULL,
  `hrs_justificadas` bigint(20) NOT NULL,
  `txt_justificado` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `doc_justificativa` varchar(255) DEFAULT NULL,
  `criado_por` int(11) NOT NULL,
  `dt_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_mod_aprova` datetime DEFAULT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `ativo` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_justificativa`
--

INSERT INTO `tb_justificativa` (`id_justificativa`, `id_funcionario`, `id_empresa`, `data`, `hrs_justificadas`, `txt_justificado`, `status`, `doc_justificativa`, `criado_por`, `dt_criacao`, `dt_mod_aprova`, `dt_modificacao`, `ativo`) VALUES
(1, 119, 2, '2019-04-16', 120, 'Teste justificativa', 0, NULL, 120, '2019-05-02 00:16:33', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_log_acesso`
--

CREATE TABLE `tb_log_acesso` (
  `id_log` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `login` varchar(14) NOT NULL,
  `acesso` varchar(10) NOT NULL,
  `data_do_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` smallint(6) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_log_acesso`
--

INSERT INTO `tb_log_acesso` (`id_log`, `id_usuario`, `login`, `acesso`, `data_do_cadastro`, `ativo`) VALUES
(26, 0, '111.111.111-11', 'NEGADO', '2019-03-31 14:04:14', 1),
(27, 15, '102.030.405-06', 'PERMITIDO', '2019-03-31 14:25:42', 1),
(28, 0, '102.030.405-06', 'NEGADO', '2019-03-31 14:28:00', 1),
(29, 15, '102.030.405-06', 'PERMITIDO', '2019-03-31 14:28:09', 1),
(30, 15, '102.030.405-06', 'PERMITIDO', '2019-04-01 17:28:38', 1),
(31, 15, '102.030.405-06', 'PERMITIDO', '2019-04-02 02:08:49', 1),
(32, 15, '102.030.405-06', 'PERMITIDO', '2019-04-02 02:10:01', 1),
(33, 15, '102.030.405-06', 'PERMITIDO', '2019-04-03 18:24:08', 1),
(34, 15, '102.030.405-06', 'PERMITIDO', '2019-04-04 09:12:49', 1),
(35, 15, '102.030.405-06', 'PERMITIDO', '2019-04-09 16:34:32', 1),
(36, 15, '102.030.405-06', 'PERMITIDO', '2019-04-09 21:37:16', 1),
(37, 15, '102.030.405-06', 'PERMITIDO', '2019-04-10 18:58:34', 1),
(38, 15, '102.030.405-06', 'PERMITIDO', '2019-04-15 11:39:25', 1),
(39, 0, '111.111.111-11', 'NEGADO', '2019-04-16 01:41:35', 1),
(40, 15, '102.030.405-06', 'PERMITIDO', '2019-04-16 01:41:50', 1),
(41, 0, '102.030.406-50', 'NEGADO', '2019-04-16 02:28:34', 1),
(42, 0, '102.030.405-06', 'NEGADO', '2019-04-16 02:28:50', 1),
(43, 0, '102.030.405-06', 'NEGADO', '2019-04-16 02:29:11', 1),
(44, 0, '111.111.111-11', 'NEGADO', '2019-04-16 02:29:35', 1),
(45, 15, '102.030.405-06', 'PERMITIDO', '2019-04-16 02:31:30', 1),
(46, 15, '102.030.405-06', 'PERMITIDO', '2019-04-16 10:40:18', 1),
(47, 15, '102.030.405-06', 'PERMITIDO', '2019-04-16 10:40:30', 1),
(48, 0, '102.030.405-06', 'NEGADO', '2019-04-17 20:32:58', 1),
(49, 15, '102.030.405-06', 'PERMITIDO', '2019-04-17 20:33:08', 1),
(50, 15, '102.030.405-06', 'PERMITIDO', '2019-04-25 00:19:29', 1),
(51, 0, '064.020.444-90', 'NEGADO', '2019-04-25 00:30:22', 1),
(52, 0, '064.020.444-90', 'NEGADO', '2019-04-25 00:31:23', 1),
(53, 0, '064.020.444-90', 'NEGADO', '2019-04-25 00:31:45', 1),
(54, 15, '102.030.405-06', 'PERMITIDO', '2019-04-27 00:03:12', 1),
(55, 120, '087.694.404-76', 'PERMITIDO', '2019-04-27 00:11:13', 1),
(56, 0, '087.694.404-76', 'NEGADO', '2019-04-30 20:15:25', 1),
(57, 120, '087.694.404-76', 'PERMITIDO', '2019-04-30 20:15:42', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_log_update`
--

CREATE TABLE `tb_log_update` (
  `id_log` int(11) NOT NULL,
  `tabela` varchar(30) DEFAULT NULL,
  `id_tabela` int(11) DEFAULT NULL,
  `reg_log` varchar(10000) NOT NULL,
  `criado_por` int(11) DEFAULT NULL,
  `data_do_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ativo` smallint(6) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_log_update`
--

INSERT INTO `tb_log_update` (`id_log`, `tabela`, `id_tabela`, `reg_log`, `criado_por`, `data_do_cadastro`, `ativo`) VALUES
(1, 'tb_empresa', 2, 'UPDATE:  cnpj: 73.233.802/0001-15 : 08.184.442/0001-47 nome: Karma Genna : PREFEITURA MUNICIPAL DE  GUAMARE nome_fantasia: Karma Genna : PREFEITURA MUNICIPAL DE  GUAMARE', 15, '2019-04-03 18:40:41', 1),
(2, 'tb_endereco', 17, 'UPDATE:  bairro:  : CENTRO cep:  : 59598-000 cidade: Guamaré : Guamarï¿½ cidade: Guamaré : Guamarï¿½ logradouro:  : RUA LUIZ DE SOUZA MIRANDA numero:  : 1166 telefone:  : (84) 3525-2968', 15, '2019-04-03 18:40:43', 1),
(3, 'tb_empresa', 2, 'UPDATE: ', 15, '2019-04-03 18:45:03', 1),
(4, 'tb_endereco', 17, 'UPDATE:  email:  : rh@guamare.rn.gov.br', 15, '2019-04-03 18:45:03', 1),
(5, 'tb_feriado', 1, 'DELETE:  ativo: 1 : 0', 15, '2019-04-09 16:38:02', 1),
(6, 'tb_unidade', 6, 'DELETE:  ativo: 1 : 0', 15, '2019-04-09 16:48:02', 1),
(7, 'tb_funcionario', 16, 'DELETE:  ativo: 1 : 0', 15, '2019-04-17 20:35:07', 1),
(8, 'tb_pessoa', 21, 'DELETE:  ativo: 1 : 0', 15, '2019-04-17 20:35:07', 1),
(9, 'tb_endereco', 20, 'DELETE:  ativo: 1 : 0', 15, '2019-04-17 20:35:08', 1),
(10, 'tb_usuario', 17, 'DELETE:  ativo: 1 : 0', 15, '2019-04-17 20:35:09', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lotacao`
--

CREATE TABLE `tb_lotacao` (
  `id` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `dt_inicio_lotacao` date NOT NULL,
  `dt_fim_lotacao` date DEFAULT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lotacao`
--

INSERT INTO `tb_lotacao` (`id`, `id_funcionario`, `id_unidade`, `id_funcao`, `dt_inicio_lotacao`, `dt_fim_lotacao`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(22, 17, 7, 8, '2019-02-08', NULL, '2019-04-03 18:54:50', 15, NULL, NULL, 1),
(23, 17, 6, 8, '2019-02-08', NULL, '2019-04-03 18:56:21', 15, NULL, NULL, 1),
(24, 18, 7, 7, '2019-04-10', NULL, '2019-04-10 19:01:06', 15, NULL, NULL, 1),
(25, 19, 7, 8, '2019-02-08', NULL, '2019-04-10 19:25:56', 15, NULL, NULL, 1),
(26, 20, 7, 8, '2019-01-04', NULL, '2019-04-15 11:49:56', 15, NULL, NULL, 1),
(27, 21, 7, 22, '2004-06-09', NULL, '2019-04-15 11:51:36', 15, NULL, NULL, 1),
(28, 22, 7, 8, '2018-12-18', NULL, '2019-04-15 11:52:50', 15, NULL, NULL, 1),
(29, 23, 7, 22, '2003-03-06', NULL, '2019-04-15 11:55:14', 15, NULL, NULL, 1),
(30, 24, 7, 21, '2000-01-28', NULL, '2019-04-15 11:57:53', 15, NULL, NULL, 1),
(31, 25, 7, 23, '2006-10-17', NULL, '2019-04-15 11:59:22', 15, NULL, NULL, 1),
(32, 26, 7, 13, '2019-01-04', NULL, '2019-04-15 12:00:49', 15, NULL, NULL, 1),
(33, 27, 7, 11, '2019-01-04', NULL, '2019-04-15 12:02:03', 15, NULL, NULL, 1),
(34, 28, 7, 24, '2019-01-04', NULL, '2019-04-15 12:06:38', 15, NULL, NULL, 1),
(35, 29, 7, 13, '2019-01-04', NULL, '2019-04-15 12:09:31', 15, NULL, NULL, 1),
(36, 30, 7, 13, '2019-01-04', NULL, '2019-04-15 12:10:32', 15, NULL, NULL, 1),
(37, 31, 7, 7, '2018-12-18', NULL, '2019-04-15 12:11:31', 15, NULL, NULL, 1),
(38, 32, 7, 21, '2000-01-28', NULL, '2019-04-15 12:13:15', 15, NULL, NULL, 1),
(39, 33, 7, 13, '2019-01-04', NULL, '2019-04-15 12:15:07', 15, NULL, NULL, 1),
(40, 34, 7, 8, '2000-04-17', NULL, '2019-04-15 12:17:27', 15, NULL, NULL, 1),
(41, 35, 7, 13, '2019-01-04', NULL, '2019-04-15 12:23:55', 15, NULL, NULL, 1),
(42, 36, 7, 13, '2019-02-06', NULL, '2019-04-15 12:25:20', 15, NULL, NULL, 1),
(43, 37, 7, 26, '2008-03-24', NULL, '2019-04-15 12:27:09', 15, NULL, NULL, 1),
(44, 38, 7, 25, '2006-08-10', NULL, '2019-04-15 12:28:38', 15, NULL, NULL, 1),
(45, 39, 7, 8, '2019-01-04', NULL, '2019-04-15 12:33:19', 15, NULL, NULL, 1),
(46, 40, 7, 21, '2017-01-02', NULL, '2019-04-15 12:38:46', 15, NULL, NULL, 1),
(47, 41, 7, 14, '2019-01-04', NULL, '2019-04-15 12:41:31', 15, NULL, NULL, 1),
(48, 42, 7, 22, '2003-03-25', NULL, '2019-04-15 12:44:17', 15, NULL, NULL, 1),
(49, 43, 7, 14, '2019-01-04', NULL, '2019-04-15 12:45:35', 15, NULL, NULL, 1),
(50, 44, 7, 13, '2019-02-06', NULL, '2019-04-15 12:47:55', 15, NULL, NULL, 1),
(51, 45, 7, 13, '2019-01-04', NULL, '2019-04-15 12:52:13', 15, NULL, NULL, 1),
(52, 46, 7, 13, '2019-01-12', NULL, '2019-04-15 12:53:45', 15, NULL, NULL, 1),
(53, 47, 7, 10, '2019-01-04', NULL, '2019-04-15 13:03:54', 15, NULL, NULL, 1),
(54, 48, 7, 12, '2019-02-01', NULL, '2019-04-15 13:08:39', 15, NULL, NULL, 1),
(55, 49, 7, 25, '2003-03-27', NULL, '2019-04-15 13:11:28', 15, NULL, NULL, 1),
(56, 50, 7, 22, '0020-06-10', NULL, '2019-04-15 13:12:27', 15, NULL, NULL, 1),
(57, 50, 7, 22, '1999-06-10', NULL, '2019-04-15 13:14:55', 15, NULL, NULL, 1),
(58, 51, 7, 8, '2019-02-08', NULL, '2019-04-15 13:19:49', 15, NULL, NULL, 1),
(59, 52, 7, 22, '2003-03-24', NULL, '2019-04-15 13:20:56', 15, NULL, NULL, 1),
(60, 53, 7, 8, '2018-12-18', NULL, '2019-04-15 13:22:41', 15, NULL, NULL, 1),
(61, 54, 7, 11, '2019-01-04', NULL, '2019-04-15 13:24:41', 15, NULL, NULL, 1),
(62, 55, 7, 22, '2003-11-04', NULL, '2019-04-15 13:27:50', 15, NULL, NULL, 1),
(63, 56, 7, 23, '2008-10-13', NULL, '2019-04-15 13:32:05', 15, NULL, NULL, 1),
(64, 57, 7, 10, '2019-01-04', NULL, '2019-04-15 13:34:23', 15, NULL, NULL, 1),
(65, 58, 7, 8, '2019-02-08', NULL, '2019-04-15 13:35:38', 15, NULL, NULL, 1),
(66, 59, 7, 13, '2019-01-04', NULL, '2019-04-15 13:40:08', 15, NULL, NULL, 1),
(67, 60, 7, 22, '2003-03-24', NULL, '2019-04-15 13:41:34', 15, NULL, NULL, 1),
(68, 61, 7, 17, '2006-07-24', NULL, '2019-04-15 13:43:28', 15, NULL, NULL, 1),
(69, 62, 7, 21, '2000-01-14', NULL, '2019-04-15 13:45:41', 15, NULL, NULL, 1),
(70, 64, 8, 28, '2007-07-15', NULL, '2019-04-15 13:53:54', 15, NULL, NULL, 1),
(71, 66, 8, 29, '2019-01-04', NULL, '2019-04-15 13:56:01', 15, NULL, NULL, 1),
(72, 67, 8, 13, '2019-01-04', NULL, '2019-04-15 13:57:00', 15, NULL, NULL, 1),
(73, 68, 8, 14, '2019-01-04', NULL, '2019-04-15 13:58:26', 15, NULL, NULL, 1),
(74, 69, 8, 11, '2019-02-08', NULL, '2019-04-15 13:59:30', 15, NULL, NULL, 1),
(75, 70, 8, 13, '2019-01-04', NULL, '2019-04-15 14:00:44', 15, NULL, NULL, 1),
(76, 71, 9, 30, '1999-06-15', NULL, '2019-04-15 14:07:46', 15, NULL, NULL, 1),
(77, 72, 9, 14, '2019-01-04', NULL, '2019-04-15 14:10:16', 15, NULL, NULL, 1),
(78, 73, 9, 13, '2019-02-15', NULL, '2019-04-15 14:11:24', 15, NULL, NULL, 1),
(79, 74, 9, 25, '1998-03-03', NULL, '2019-04-15 14:14:03', 15, NULL, NULL, 1),
(80, 75, 9, 14, '2019-02-15', NULL, '2019-04-15 14:15:11', 15, NULL, NULL, 1),
(81, 76, 9, 30, '2003-11-03', NULL, '2019-04-15 14:16:37', 15, NULL, NULL, 1),
(82, 77, 9, 30, '2003-11-03', NULL, '2019-04-15 14:18:08', 15, NULL, NULL, 1),
(83, 78, 9, 25, '2004-06-04', NULL, '2019-04-15 14:20:30', 15, NULL, NULL, 1),
(84, 79, 9, 22, '1995-12-16', NULL, '2019-04-15 14:23:27', 15, NULL, NULL, 1),
(85, 80, 9, 14, '2019-01-04', NULL, '2019-04-15 14:24:50', 15, NULL, NULL, 1),
(86, 81, 9, 15, '2019-02-15', NULL, '2019-04-15 14:28:21', 15, NULL, NULL, 1),
(87, 82, 9, 22, '2000-12-01', NULL, '2019-04-15 14:29:41', 15, NULL, NULL, 1),
(88, 83, 9, 22, '2003-05-07', NULL, '2019-04-15 14:31:07', 15, NULL, NULL, 1),
(89, 84, 9, 17, '1999-06-29', NULL, '2019-04-15 14:33:15', 15, NULL, NULL, 1),
(90, 85, 9, 30, '2003-11-03', NULL, '2019-04-15 14:34:27', 15, NULL, NULL, 1),
(91, 86, 9, 23, '2000-01-15', NULL, '2019-04-15 14:36:17', 15, NULL, NULL, 1),
(92, 87, 9, 17, '1999-05-27', NULL, '2019-04-15 14:37:29', 15, NULL, NULL, 1),
(93, 88, 9, 31, '2003-05-05', NULL, '2019-04-15 14:38:39', 15, NULL, NULL, 1),
(94, 89, 9, 17, '2003-11-12', NULL, '2019-04-15 14:46:37', 15, NULL, NULL, 1),
(95, 90, 9, 17, '2019-01-04', NULL, '2019-04-15 14:49:32', 15, NULL, NULL, 1),
(96, 91, 9, 30, '2003-03-04', NULL, '2019-04-15 14:51:03', 15, NULL, NULL, 1),
(97, 92, 9, 22, '2004-06-09', NULL, '2019-04-15 14:52:53', 15, NULL, NULL, 1),
(98, 93, 9, 13, '2019-01-04', NULL, '2019-04-15 14:55:37', 15, NULL, NULL, 1),
(99, 94, 9, 13, '2009-01-04', NULL, '2019-04-15 15:16:07', 15, NULL, NULL, 1),
(100, 95, 9, 13, '2019-01-04', NULL, '2019-04-15 15:17:26', 15, NULL, NULL, 1),
(101, 96, 9, 13, '2019-01-04', NULL, '2019-04-15 15:20:23', 15, NULL, NULL, 1),
(102, 97, 9, 25, '2006-05-30', NULL, '2019-04-15 15:21:38', 15, NULL, NULL, 1),
(103, 98, 9, 14, '2019-02-15', NULL, '2019-04-15 15:22:40', 15, NULL, NULL, 1),
(104, 99, 9, 25, '2006-06-01', NULL, '2019-04-15 15:23:52', 15, NULL, NULL, 1),
(105, 100, 9, 17, '1999-06-21', NULL, '2019-04-15 15:26:38', 15, NULL, NULL, 1),
(106, 101, 9, 32, '1999-05-15', NULL, '2019-04-15 15:28:05', 15, NULL, NULL, 1),
(107, 102, 9, 22, '2003-03-07', NULL, '2019-04-15 15:30:05', 15, NULL, NULL, 1),
(108, 103, 10, 13, '2019-01-04', NULL, '2019-04-15 15:31:11', 15, NULL, NULL, 1),
(109, 104, 9, 14, '2019-01-04', NULL, '2019-04-15 15:34:51', 15, NULL, NULL, 1),
(110, 105, 9, 14, '2019-02-15', NULL, '2019-04-15 15:36:36', 15, NULL, NULL, 1),
(111, 106, 9, 14, '2019-01-04', NULL, '2019-04-15 15:40:50', 15, NULL, NULL, 1),
(112, 107, 9, 13, '2019-03-01', NULL, '2019-04-15 15:41:57', 15, NULL, NULL, 1),
(113, 108, 9, 14, '2019-01-04', NULL, '2019-04-15 15:43:01', 15, NULL, NULL, 1),
(114, 109, 9, 22, '2000-01-28', NULL, '2019-04-15 15:44:22', 15, NULL, NULL, 1),
(115, 110, 9, 15, '2019-02-15', NULL, '2019-04-15 15:45:23', 15, NULL, NULL, 1),
(116, 111, 9, 17, '1999-03-21', NULL, '2019-04-15 15:47:05', 15, NULL, NULL, 1),
(117, 112, 9, 17, '1999-06-21', NULL, '2019-04-15 15:48:18', 15, NULL, NULL, 1),
(118, 113, 9, 14, '2019-01-04', NULL, '2019-04-15 15:49:38', 15, NULL, NULL, 1),
(119, 114, 9, 25, '2000-01-28', NULL, '2019-04-15 15:50:50', 15, NULL, NULL, 1),
(120, 115, 9, 14, '2019-01-04', NULL, '2019-04-15 15:51:52', 15, NULL, NULL, 1),
(121, 116, 10, 13, '2019-01-04', NULL, '2019-04-15 16:04:13', 15, NULL, NULL, 1),
(122, 118, 10, 33, '2018-12-27', NULL, '2019-04-15 16:06:14', 15, NULL, NULL, 1),
(123, 119, 27, 23, '2019-04-26', NULL, '2019-04-27 00:08:31', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lotacao_jornada_de_trabalho`
--

CREATE TABLE `tb_lotacao_jornada_de_trabalho` (
  `id` int(11) NOT NULL,
  `id_lotacao` int(11) NOT NULL,
  `id_jornada_de_trabalho` int(11) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lotacao_jornada_de_trabalho`
--

INSERT INTO `tb_lotacao_jornada_de_trabalho` (`id`, `id_lotacao`, `id_jornada_de_trabalho`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(8, 22, 5, '2019-04-03 18:55:33', 15, NULL, NULL, 1),
(9, 23, 5, '2019-04-03 18:56:38', 15, NULL, NULL, 1),
(10, 24, 5, '2019-04-10 19:01:26', 15, NULL, NULL, 1),
(11, 25, 5, '2019-04-10 19:26:10', 15, NULL, NULL, 1),
(12, 26, 5, '2019-04-15 11:50:16', 15, NULL, NULL, 1),
(13, 27, 5, '2019-04-15 11:51:46', 15, NULL, NULL, 1),
(14, 28, 5, '2019-04-15 11:53:31', 15, NULL, NULL, 1),
(15, 29, 5, '2019-04-15 11:55:31', 15, NULL, NULL, 1),
(16, 30, 5, '2019-04-15 11:58:04', 15, NULL, NULL, 1),
(17, 31, 5, '2019-04-15 11:59:32', 15, NULL, NULL, 1),
(18, 32, 5, '2019-04-15 12:00:59', 15, NULL, NULL, 1),
(19, 33, 5, '2019-04-15 12:02:20', 15, NULL, NULL, 1),
(20, 34, 5, '2019-04-15 12:06:51', 15, NULL, NULL, 1),
(21, 35, 5, '2019-04-15 12:09:40', 15, NULL, NULL, 1),
(22, 36, 5, '2019-04-15 12:10:46', 15, NULL, NULL, 1),
(23, 37, 5, '2019-04-15 12:11:41', 15, NULL, NULL, 1),
(24, 38, 5, '2019-04-15 12:13:25', 15, NULL, NULL, 1),
(25, 39, 5, '2019-04-15 12:15:15', 15, NULL, NULL, 1),
(26, 40, 5, '2019-04-15 12:19:27', 15, NULL, NULL, 1),
(27, 41, 5, '2019-04-15 12:24:02', 15, NULL, NULL, 1),
(28, 42, 5, '2019-04-15 12:25:35', 15, NULL, NULL, 1),
(29, 43, 5, '2019-04-15 12:27:22', 15, NULL, NULL, 1),
(30, 44, 5, '2019-04-15 12:28:49', 15, NULL, NULL, 1),
(31, 45, 5, '2019-04-15 12:33:30', 15, NULL, NULL, 1),
(32, 46, 5, '2019-04-15 12:39:17', 15, NULL, NULL, 1),
(33, 47, 5, '2019-04-15 12:41:42', 15, NULL, NULL, 1),
(34, 48, 5, '2019-04-15 12:44:36', 15, NULL, NULL, 1),
(35, 49, 5, '2019-04-15 12:45:50', 15, NULL, NULL, 1),
(36, 50, 5, '2019-04-15 12:48:06', 15, NULL, NULL, 1),
(37, 51, 5, '2019-04-15 12:52:23', 15, NULL, NULL, 1),
(38, 52, 5, '2019-04-15 12:53:54', 15, NULL, NULL, 1),
(39, 53, 5, '2019-04-15 13:04:04', 15, NULL, NULL, 1),
(40, 54, 5, '2019-04-15 13:08:48', 15, NULL, NULL, 1),
(41, 55, 5, '2019-04-15 13:11:36', 15, NULL, NULL, 1),
(42, 57, 5, '2019-04-15 13:17:32', 15, NULL, NULL, 1),
(43, 58, 5, '2019-04-15 13:20:02', 15, NULL, NULL, 1),
(44, 59, 5, '2019-04-15 13:21:04', 15, NULL, NULL, 1),
(45, 60, 5, '2019-04-15 13:22:52', 15, NULL, NULL, 1),
(46, 61, 5, '2019-04-15 13:24:50', 15, NULL, NULL, 1),
(47, 62, 5, '2019-04-15 13:28:24', 15, NULL, NULL, 1),
(48, 63, 5, '2019-04-15 13:32:15', 15, NULL, NULL, 1),
(49, 64, 5, '2019-04-15 13:34:31', 15, NULL, NULL, 1),
(50, 65, 5, '2019-04-15 13:35:52', 15, NULL, NULL, 1),
(51, 66, 5, '2019-04-15 13:40:21', 15, NULL, NULL, 1),
(52, 67, 5, '2019-04-15 13:42:22', 15, NULL, NULL, 1),
(53, 68, 5, '2019-04-15 13:43:37', 15, NULL, NULL, 1),
(54, 69, 5, '2019-04-15 13:45:51', 15, NULL, NULL, 1),
(55, 70, 5, '2019-04-15 13:54:06', 15, NULL, NULL, 1),
(56, 71, 5, '2019-04-15 13:56:13', 15, NULL, NULL, 1),
(57, 72, 5, '2019-04-15 13:57:07', 15, NULL, NULL, 1),
(58, 73, 5, '2019-04-15 13:58:35', 15, NULL, NULL, 1),
(59, 74, 5, '2019-04-15 13:59:45', 15, NULL, NULL, 1),
(60, 75, 5, '2019-04-15 14:00:52', 15, NULL, NULL, 1),
(61, 76, 5, '2019-04-15 14:07:55', 15, NULL, NULL, 1),
(62, 77, 5, '2019-04-15 14:10:26', 15, NULL, NULL, 1),
(63, 78, 5, '2019-04-15 14:11:34', 15, NULL, NULL, 1),
(64, 79, 5, '2019-04-15 14:14:11', 15, NULL, NULL, 1),
(65, 80, 5, '2019-04-15 14:15:34', 15, NULL, NULL, 1),
(66, 81, 5, '2019-04-15 14:16:45', 15, NULL, NULL, 1),
(67, 82, 5, '2019-04-15 14:18:19', 15, NULL, NULL, 1),
(68, 83, 5, '2019-04-15 14:20:45', 15, NULL, NULL, 1),
(69, 84, 5, '2019-04-15 14:23:37', 15, NULL, NULL, 1),
(70, 85, 5, '2019-04-15 14:25:00', 15, NULL, NULL, 1),
(71, 86, 5, '2019-04-15 14:28:31', 15, NULL, NULL, 1),
(72, 87, 5, '2019-04-15 14:29:49', 15, NULL, NULL, 1),
(73, 88, 5, '2019-04-15 14:31:16', 15, NULL, NULL, 1),
(74, 89, 5, '2019-04-15 14:33:31', 15, NULL, NULL, 1),
(75, 90, 5, '2019-04-15 14:34:37', 15, NULL, NULL, 1),
(76, 91, 5, '2019-04-15 14:36:33', 15, NULL, NULL, 1),
(77, 92, 5, '2019-04-15 14:37:39', 15, NULL, NULL, 1),
(78, 93, 5, '2019-04-15 14:38:49', 15, NULL, NULL, 1),
(79, 94, 5, '2019-04-15 14:46:46', 15, NULL, NULL, 1),
(80, 95, 5, '2019-04-15 14:49:40', 15, NULL, NULL, 1),
(81, 96, 5, '2019-04-15 14:51:12', 15, NULL, NULL, 1),
(82, 97, 5, '2019-04-15 14:53:03', 15, NULL, NULL, 1),
(83, 98, 5, '2019-04-15 14:55:45', 15, NULL, NULL, 1),
(84, 99, 5, '2019-04-15 15:16:16', 15, NULL, NULL, 1),
(85, 100, 5, '2019-04-15 15:18:03', 15, NULL, NULL, 1),
(86, 101, 5, '2019-04-15 15:20:35', 15, NULL, NULL, 1),
(87, 102, 5, '2019-04-15 15:21:48', 15, NULL, NULL, 1),
(88, 103, 5, '2019-04-15 15:22:48', 15, NULL, NULL, 1),
(89, 104, 5, '2019-04-15 15:24:02', 15, NULL, NULL, 1),
(90, 105, 5, '2019-04-15 15:26:47', 15, NULL, NULL, 1),
(91, 106, 5, '2019-04-15 15:28:13', 15, NULL, NULL, 1),
(92, 107, 5, '2019-04-15 15:30:16', 15, NULL, NULL, 1),
(93, 108, 5, '2019-04-15 15:31:19', 15, NULL, NULL, 1),
(94, 109, 5, '2019-04-15 15:35:01', 15, NULL, NULL, 1),
(95, 110, 5, '2019-04-15 15:36:51', 15, NULL, NULL, 1),
(96, 111, 5, '2019-04-15 15:40:57', 15, NULL, NULL, 1),
(97, 112, 5, '2019-04-15 15:42:05', 15, NULL, NULL, 1),
(98, 113, 5, '2019-04-15 15:43:10', 15, NULL, NULL, 1),
(99, 114, 5, '2019-04-15 15:44:31', 15, NULL, NULL, 1),
(100, 115, 5, '2019-04-15 15:45:32', 15, NULL, NULL, 1),
(101, 116, 5, '2019-04-15 15:47:26', 15, NULL, NULL, 1),
(102, 117, 5, '2019-04-15 15:48:26', 15, NULL, NULL, 1),
(103, 118, 5, '2019-04-15 15:49:46', 15, NULL, NULL, 1),
(104, 119, 5, '2019-04-15 15:50:57', 15, NULL, NULL, 1),
(105, 120, 5, '2019-04-15 15:52:01', 15, NULL, NULL, 1),
(106, 121, 5, '2019-04-15 16:04:22', 15, NULL, NULL, 1),
(107, 122, 5, '2019-04-15 16:06:25', 15, NULL, NULL, 1),
(108, 123, 5, '2019-04-27 00:09:11', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lotacao_registra_ponto`
--

CREATE TABLE `tb_lotacao_registra_ponto` (
  `id` int(11) NOT NULL,
  `id_lotacao` int(11) NOT NULL,
  `registra_ponto` varchar(20) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lotacao_registra_ponto`
--

INSERT INTO `tb_lotacao_registra_ponto` (`id`, `id_lotacao`, `registra_ponto`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(6, 22, 'SIM', '2019-04-03 18:54:53', 15, NULL, NULL, 1),
(7, 23, 'SIM', '2019-04-03 18:56:22', 15, NULL, NULL, 1),
(8, 24, 'SIM', '2019-04-10 19:01:06', 15, NULL, NULL, 1),
(9, 25, 'SIM', '2019-04-10 19:25:57', 15, NULL, NULL, 1),
(10, 26, 'SIM', '2019-04-15 11:49:56', 15, NULL, NULL, 1),
(11, 27, 'SIM', '2019-04-15 11:51:36', 15, NULL, NULL, 1),
(12, 28, 'SIM', '2019-04-15 11:52:50', 15, NULL, NULL, 1),
(13, 29, 'SIM', '2019-04-15 11:55:15', 15, NULL, NULL, 1),
(14, 30, 'SIM', '2019-04-15 11:57:54', 15, NULL, NULL, 1),
(15, 31, 'SIM', '2019-04-15 11:59:22', 15, NULL, NULL, 1),
(16, 32, 'SIM', '2019-04-15 12:00:49', 15, NULL, NULL, 1),
(17, 33, 'SIM', '2019-04-15 12:02:03', 15, NULL, NULL, 1),
(18, 34, 'SIM', '2019-04-15 12:06:38', 15, NULL, NULL, 1),
(19, 35, 'SIM', '2019-04-15 12:09:31', 15, NULL, NULL, 1),
(20, 36, 'SIM', '2019-04-15 12:10:32', 15, NULL, NULL, 1),
(21, 37, 'SIM', '2019-04-15 12:11:31', 15, NULL, NULL, 1),
(22, 38, 'SIM', '2019-04-15 12:13:15', 15, NULL, NULL, 1),
(23, 39, 'SIM', '2019-04-15 12:15:07', 15, NULL, NULL, 1),
(24, 40, 'SIM', '2019-04-15 12:17:27', 15, NULL, NULL, 1),
(25, 41, 'SIM', '2019-04-15 12:23:55', 15, NULL, NULL, 1),
(26, 42, 'SIM', '2019-04-15 12:25:20', 15, NULL, NULL, 1),
(27, 43, 'SIM', '2019-04-15 12:27:09', 15, NULL, NULL, 1),
(28, 44, 'SIM', '2019-04-15 12:28:38', 15, NULL, NULL, 1),
(29, 45, 'SIM', '2019-04-15 12:33:19', 15, NULL, NULL, 1),
(30, 46, 'SIM', '2019-04-15 12:38:46', 15, NULL, NULL, 1),
(31, 47, 'SIM', '2019-04-15 12:41:32', 15, NULL, NULL, 1),
(32, 48, 'SIM', '2019-04-15 12:44:17', 15, NULL, NULL, 1),
(33, 49, 'SIM', '2019-04-15 12:45:35', 15, NULL, NULL, 1),
(34, 50, 'SIM', '2019-04-15 12:47:56', 15, NULL, NULL, 1),
(35, 51, 'SIM', '2019-04-15 12:52:13', 15, NULL, NULL, 1),
(36, 52, 'SIM', '2019-04-15 12:53:45', 15, NULL, NULL, 1),
(37, 53, 'SIM', '2019-04-15 13:03:55', 15, NULL, NULL, 1),
(38, 54, 'SIM', '2019-04-15 13:08:39', 15, NULL, NULL, 1),
(39, 55, 'SIM', '2019-04-15 13:11:28', 15, NULL, NULL, 1),
(40, 56, 'SIM', '2019-04-15 13:12:27', 15, NULL, NULL, 1),
(41, 57, 'SIM', '2019-04-15 13:14:55', 15, NULL, NULL, 1),
(42, 58, 'SIM', '2019-04-15 13:19:49', 15, NULL, NULL, 1),
(43, 59, 'SIM', '2019-04-15 13:20:56', 15, NULL, NULL, 1),
(44, 60, 'SIM', '2019-04-15 13:22:41', 15, NULL, NULL, 1),
(45, 61, 'SIM', '2019-04-15 13:24:41', 15, NULL, NULL, 1),
(46, 62, 'SIM', '2019-04-15 13:27:50', 15, NULL, NULL, 1),
(47, 63, 'SIM', '2019-04-15 13:32:05', 15, NULL, NULL, 1),
(48, 64, 'SIM', '2019-04-15 13:34:23', 15, NULL, NULL, 1),
(49, 65, 'SIM', '2019-04-15 13:35:38', 15, NULL, NULL, 1),
(50, 66, 'SIM', '2019-04-15 13:40:09', 15, NULL, NULL, 1),
(51, 67, 'SIM', '2019-04-15 13:41:34', 15, NULL, NULL, 1),
(52, 68, 'SIM', '2019-04-15 13:43:28', 15, NULL, NULL, 1),
(53, 69, 'SIM', '2019-04-15 13:45:42', 15, NULL, NULL, 1),
(54, 70, 'SIM', '2019-04-15 13:53:54', 15, NULL, NULL, 1),
(55, 71, 'SIM', '2019-04-15 13:56:01', 15, NULL, NULL, 1),
(56, 72, 'SIM', '2019-04-15 13:57:00', 15, NULL, NULL, 1),
(57, 73, 'SIM', '2019-04-15 13:58:26', 15, NULL, NULL, 1),
(58, 74, 'SIM', '2019-04-15 13:59:30', 15, NULL, NULL, 1),
(59, 75, 'SIM', '2019-04-15 14:00:44', 15, NULL, NULL, 1),
(60, 76, 'SIM', '2019-04-15 14:07:46', 15, NULL, NULL, 1),
(61, 77, 'SIM', '2019-04-15 14:10:16', 15, NULL, NULL, 1),
(62, 78, 'SIM', '2019-04-15 14:11:24', 15, NULL, NULL, 1),
(63, 79, 'SIM', '2019-04-15 14:14:03', 15, NULL, NULL, 1),
(64, 80, 'SIM', '2019-04-15 14:15:12', 15, NULL, NULL, 1),
(65, 81, 'SIM', '2019-04-15 14:16:37', 15, NULL, NULL, 1),
(66, 82, 'SIM', '2019-04-15 14:18:09', 15, NULL, NULL, 1),
(67, 83, 'SIM', '2019-04-15 14:20:33', 15, NULL, NULL, 1),
(68, 84, 'SIM', '2019-04-15 14:23:27', 15, NULL, NULL, 1),
(69, 85, 'SIM', '2019-04-15 14:24:50', 15, NULL, NULL, 1),
(70, 86, 'SIM', '2019-04-15 14:28:22', 15, NULL, NULL, 1),
(71, 87, 'SIM', '2019-04-15 14:29:41', 15, NULL, NULL, 1),
(72, 88, 'SIM', '2019-04-15 14:31:07', 15, NULL, NULL, 1),
(73, 89, 'SIM', '2019-04-15 14:33:15', 15, NULL, NULL, 1),
(74, 90, 'SIM', '2019-04-15 14:34:27', 15, NULL, NULL, 1),
(75, 91, 'SIM', '2019-04-15 14:36:17', 15, NULL, NULL, 1),
(76, 92, 'SIM', '2019-04-15 14:37:29', 15, NULL, NULL, 1),
(77, 93, 'SIM', '2019-04-15 14:38:39', 15, NULL, NULL, 1),
(78, 94, 'SIM', '2019-04-15 14:46:37', 15, NULL, NULL, 1),
(79, 95, 'SIM', '2019-04-15 14:49:32', 15, NULL, NULL, 1),
(80, 96, 'SIM', '2019-04-15 14:51:03', 15, NULL, NULL, 1),
(81, 97, 'SIM', '2019-04-15 14:52:54', 15, NULL, NULL, 1),
(82, 98, 'SIM', '2019-04-15 14:55:37', 15, NULL, NULL, 1),
(83, 99, 'SIM', '2019-04-15 15:16:08', 15, NULL, NULL, 1),
(84, 100, 'SIM', '2019-04-15 15:17:26', 15, NULL, NULL, 1),
(85, 101, 'SIM', '2019-04-15 15:20:24', 15, NULL, NULL, 1),
(86, 102, 'SIM', '2019-04-15 15:21:38', 15, NULL, NULL, 1),
(87, 103, 'SIM', '2019-04-15 15:22:40', 15, NULL, NULL, 1),
(88, 104, 'SIM', '2019-04-15 15:23:53', 15, NULL, NULL, 1),
(89, 105, 'SIM', '2019-04-15 15:26:38', 15, NULL, NULL, 1),
(90, 106, 'SIM', '2019-04-15 15:28:05', 15, NULL, NULL, 1),
(91, 107, 'SIM', '2019-04-15 15:30:05', 15, NULL, NULL, 1),
(92, 108, 'SIM', '2019-04-15 15:31:11', 15, NULL, NULL, 1),
(93, 109, 'SIM', '2019-04-15 15:34:51', 15, NULL, NULL, 1),
(94, 110, 'SIM', '2019-04-15 15:36:37', 15, NULL, NULL, 1),
(95, 111, 'SIM', '2019-04-15 15:40:50', 15, NULL, NULL, 1),
(96, 112, 'SIM', '2019-04-15 15:41:57', 15, NULL, NULL, 1),
(97, 113, 'SIM', '2019-04-15 15:43:01', 15, NULL, NULL, 1),
(98, 114, 'SIM', '2019-04-15 15:44:22', 15, NULL, NULL, 1),
(99, 115, 'SIM', '2019-04-15 15:45:23', 15, NULL, NULL, 1),
(100, 116, 'SIM', '2019-04-15 15:47:05', 15, NULL, NULL, 1),
(101, 117, 'SIM', '2019-04-15 15:48:18', 15, NULL, NULL, 1),
(102, 118, 'SIM', '2019-04-15 15:49:38', 15, NULL, NULL, 1),
(103, 119, 'SIM', '2019-04-15 15:50:50', 15, NULL, NULL, 1),
(104, 120, 'SIM', '2019-04-15 15:51:52', 15, NULL, NULL, 1),
(105, 121, 'SIM', '2019-04-15 16:04:13', 15, NULL, NULL, 1),
(106, 122, 'SIM', '2019-04-15 16:06:15', 15, NULL, NULL, 1),
(107, 123, 'SIM', '2019-04-27 00:08:31', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pdn`
--

CREATE TABLE `tb_pdn` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pdn`
--

INSERT INTO `tb_pdn` (`id`, `codigo`, `descricao`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(2, '7010', 'FALTA HORA', '2019-04-01 23:59:59', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `apelido` varchar(200) DEFAULT NULL,
  `data_de_nascimento` datetime DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(25) DEFAULT NULL,
  `id_endereco` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1',
  `genero` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`id_pessoa`, `nome`, `apelido`, `data_de_nascimento`, `cpf`, `rg`, `id_endereco`, `id_empresa`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`, `genero`) VALUES
(19, 'Administrador', 'Administrador', '2019-03-31 11:24:48', '102.030.405-06', NULL, 18, 2, '2019-03-31 14:24:48', 1, NULL, NULL, 1, NULL),
(20, 'FRANCISCO  HERIBERTO BEZERRA DA SILVA ', '', '1975-11-29 00:00:00', '019.448.424-62', '1517016', 19, 2, '2019-04-03 18:29:17', 15, NULL, NULL, 1, 'MASCULINO'),
(21, 'THIAGO BASTOS QUEIROZ ', '', '1985-06-04 00:00:00', '064.020.444-90', '', 20, 2, '2019-04-03 18:51:12', 15, '2019-04-17 17:35:07', 15, 0, 'MASCULINO'),
(22, 'THIAGO BASTOS QUEIROZ ', '', '1985-06-04 00:00:00', '064.020.444-90', '', 21, 2, '2019-04-03 18:54:28', 15, NULL, NULL, 1, 'MASCULINO'),
(23, 'FRANCISCO  HERIBERTO BEZERRA DA SILVA ', '', '1975-11-29 00:00:00', '019.448.424-62', '', 22, 2, '2019-04-10 19:00:32', 15, NULL, NULL, 1, 'MASCULINO'),
(24, 'THIAGO BASTOS QUEIROZ ', '', '1985-06-04 00:00:00', '064.020.444-90', '', 23, 2, '2019-04-10 19:25:24', 15, NULL, NULL, 1, 'MASCULINO'),
(25, 'AGNES ADALIA DANTAS VALENTIM', '', '2000-07-12 00:00:00', '700.756.054-73', '', 24, 2, '2019-04-15 11:49:04', 15, NULL, NULL, 1, 'FEMININO'),
(26, 'ALDEIZA DA SILVA BEZERRA CARVALHO', '', '1983-03-14 00:00:00', '012.350.994-74', '', 25, 2, '2019-04-15 11:51:07', 15, NULL, NULL, 1, 'FEMININO'),
(27, 'ALDENOR GONDIM DE AQUINO JUNIOR ', '', '1963-04-09 00:00:00', '352.930.634-72', '', 26, 2, '2019-04-15 11:52:23', 15, NULL, NULL, 1, 'MASCULINO'),
(28, 'ANA PAULA DA COSTA GOMES', '', '1984-04-04 00:00:00', '011.568.674-60', '', 27, 2, '2019-04-15 11:54:32', 15, NULL, NULL, 1, 'FEMININO'),
(29, 'DORIEDSON NUNES DE MELO ', '', '1976-06-15 00:00:00', '021.004.714-30', '', 28, 2, '2019-04-15 11:57:26', 15, NULL, NULL, 1, 'MASCULINO'),
(30, 'EDEUZA MARIA SANTOS FERNANDES ', '', '1970-08-27 00:00:00', '623.367.034-91', '', 29, 2, '2019-04-15 11:58:34', 15, NULL, NULL, 1, 'FEMININO'),
(31, 'ELENILDE ALVES DE MIRANDA SIQUEIRA ', '', '1975-02-24 00:00:00', '036.162.304-62', '', 30, 2, '2019-04-15 12:00:15', 15, NULL, NULL, 1, 'FEMININO'),
(32, 'ELENILSON DE OLIVEIRA FONSECA ', '', '1977-06-01 00:00:00', '023.339.654-36', '', 31, 2, '2019-04-15 12:01:36', 15, NULL, NULL, 1, 'MASCULINO'),
(33, 'EVANDRO VARELA DE CARVALHO', '', '1975-02-13 00:00:00', '915.966.024-49', '', 32, 2, '2019-04-15 12:06:12', 15, NULL, NULL, 1, 'MASCULINO'),
(34, 'FRANCISCO DA SILVEIRA MENDES ', '', '1959-02-14 00:00:00', '307.866.224-15', '', 33, 2, '2019-04-15 12:09:06', 15, NULL, NULL, 1, 'MASCULINO'),
(35, 'FRANCISCO DE ASSIS SOARES ', '', '1978-01-05 00:00:00', '042.531.996-23', '', 34, 2, '2019-04-15 12:10:09', 15, NULL, NULL, 1, 'MASCULINO'),
(36, 'FRANCISCO  HERIBERTO BEZERRA DA SILVA ', '', '1975-11-29 00:00:00', '019.448.424-62', '', 35, 2, '2019-04-15 12:11:04', 15, NULL, NULL, 1, 'MASCULINO'),
(37, 'IRISMAR PIMENTEL DA SILVA ', '', '1966-02-23 00:00:00', '481.919.224-87', '', 36, 2, '2019-04-15 12:12:51', 15, NULL, NULL, 1, 'FEMININO'),
(38, 'IVONE TAVARES DE MORAIS ', '', '1972-09-11 00:00:00', '033.196.574-70', '', 37, 2, '2019-04-15 12:14:41', 15, NULL, NULL, 1, 'FEMININO'),
(39, 'JAFIA OSILANE BATISTA DE MIRANDA', '', '1973-08-04 00:00:00', '024.450.094-05', '', 38, 2, '2019-04-15 12:16:57', 15, NULL, NULL, 1, 'FEMININO'),
(40, 'JAIANE RAQUEL ANDRADE DE MELO ', '', '1987-07-05 00:00:00', '073.656.514-07', '', 39, 2, '2019-04-15 12:23:41', 15, NULL, NULL, 1, 'FEMININO'),
(41, 'JANAINA CAMARA DE ANDRADE', '', '1986-09-01 00:00:00', '068.045.224-94', '', 40, 2, '2019-04-15 12:24:52', 15, NULL, NULL, 1, 'FEMININO'),
(42, 'JOSE ELENILDO FELIX ', '', '1974-10-16 00:00:00', '031.447.364-57', '', 41, 2, '2019-04-15 12:26:25', 15, NULL, NULL, 1, 'MASCULINO'),
(43, 'JOSE JOSENILDO BENTO ', '', '1983-08-02 00:00:00', '051.752.684-06', '', 42, 2, '2019-04-15 12:27:55', 15, NULL, NULL, 1, 'MASCULINO'),
(44, 'JOSE PEREIRA DO NASCIMENTO', '', '1977-06-18 00:00:00', '025.531.774-37', '', 43, 2, '2019-04-15 12:29:38', 15, NULL, NULL, 1, 'MASCULINO'),
(45, 'JOYCIANE RODRIGUES COSTA ', '', '1995-12-08 00:00:00', '125.003.354-37', '', 44, 2, '2019-04-15 12:38:03', 15, NULL, NULL, 1, 'FEMININO'),
(46, 'KAROLAYNE MENDES MORAIS ', '', '1997-02-27 00:00:00', '071.189.184-23', '', 45, 2, '2019-04-15 12:41:01', 15, NULL, NULL, 1, 'FEMININO'),
(47, 'KEZIA SUELLY DE AQUINO', '', '2019-02-07 00:00:00', '737.412.214-49', '', 46, 2, '2019-04-15 12:43:54', 15, NULL, NULL, 1, 'FEMININO'),
(48, 'KLEBSON RICARDO DA SILVA BEZERRA ', '', '1989-12-28 00:00:00', '077.317.254-80', '', 47, 2, '2019-04-15 12:45:08', 15, NULL, NULL, 1, 'MASCULINO'),
(49, 'LIEBERT TAVARES BERNARDO ', '', '1989-11-09 00:00:00', '016.098.784-93', '', 48, 2, '2019-04-15 12:47:21', 15, NULL, NULL, 1, 'MASCULINO'),
(50, 'LINDOMAR MIRANDA GOMES ', '', '1975-08-25 00:00:00', '785.058.104-06', '', 49, 2, '2019-04-15 12:51:44', 15, NULL, NULL, 1, 'MASCULINO'),
(51, 'MANOEL DE JESUS FERREIRA DA SILVA ', '', '1963-04-11 00:00:00', '421.686.514-34', '', 50, 2, '2019-04-15 12:53:20', 15, NULL, NULL, 1, 'MASCULINO'),
(52, 'MARCIA MEYRE DE ABREU LEITE BEZERRA ', '', '1969-06-17 00:00:00', '664.069.784-04', '', 51, 2, '2019-04-15 13:03:26', 15, NULL, NULL, 1, 'FEMININO'),
(53, 'MARCONDES DE SOUZA DIOGENES PAIVA ', '', '1971-08-14 00:00:00', '565.840.914-49', '', 52, 2, '2019-04-15 13:07:39', 15, NULL, NULL, 1, 'MASCULINO'),
(54, 'MARCOS DE OLIVEIRA SILVA', '', '1978-09-20 00:00:00', '034.048.964-24', '', 53, 2, '2019-04-15 13:10:53', 15, NULL, NULL, 1, 'MASCULINO'),
(55, 'MARIA AMELIA DA SILVEIRA MENDES ', '', '1966-07-10 00:00:00', '492.046.104-68', '', 54, 2, '2019-04-15 13:12:03', 15, NULL, NULL, 1, 'FEMININO'),
(56, 'MARILISI ALVES DOS SANTOS ', '', '1983-02-18 00:00:00', '012.103.954-44', '', 55, 2, '2019-04-15 13:19:26', 15, NULL, NULL, 1, 'FEMININO'),
(57, 'MARTA SILVA DO NASCIMENTO ', '', '1975-11-15 00:00:00', '021.842.584-82', '', 56, 2, '2019-04-15 13:20:29', 15, NULL, NULL, 1, 'FEMININO'),
(58, 'PEDRO RAFAEL FONSECA PEREIRA ', '', '1986-07-28 00:00:00', '059.551.834-69', '', 57, 2, '2019-04-15 13:22:16', 15, NULL, NULL, 1, 'MASCULINO'),
(59, 'RAPHAELLA KALIANNA OLEGARIO DE LIMA ', '', '1988-04-19 00:00:00', '074.340.804-77', '', 58, 2, '2019-04-15 13:24:09', 15, NULL, NULL, 1, 'FEMININO'),
(60, 'ROSA MARIA SILVA DOS SANTOS', '', '1973-05-20 00:00:00', '904.302.204-72', '', 59, 2, '2019-04-15 13:27:13', 15, NULL, NULL, 1, 'FEMININO'),
(61, 'SHIRLEY SIQUEIRA DANTAS', '', '1983-09-01 00:00:00', '042.127.334-80', '', 60, 2, '2019-04-15 13:31:30', 15, NULL, NULL, 1, 'FEMININO'),
(62, 'TALITA JOICY FERREIRA DANTAS', '', '1995-07-13 00:00:00', '102.053.434-65', '', 61, 2, '2019-04-15 13:34:10', 15, NULL, NULL, 1, 'FEMININO'),
(63, 'THIAGO BASTOS QUEIROZ ', '', '1985-06-04 00:00:00', '064.020.444-90', '', 62, 2, '2019-04-15 13:35:11', 15, NULL, NULL, 1, 'MASCULINO'),
(64, 'VERONICA MARIA DA CONCEICAO', '', '1996-05-16 00:00:00', '048.613.934-42', '', 63, 2, '2019-04-15 13:39:44', 15, NULL, NULL, 1, 'FEMININO'),
(65, 'WELLICA HELENA TAVARES DAS CHAGAS', '', '2019-04-27 00:00:00', '046.249.944-85', '', 64, 2, '2019-04-15 13:40:57', 15, NULL, NULL, 1, 'FEMININO'),
(66, 'AURELINO RODRIGUES PEIXOTO JUNIOR', '', '1967-02-15 00:00:00', '314.026.584-00', '', 65, 2, '2019-04-15 13:42:51', 15, NULL, NULL, 1, 'MASCULINO'),
(67, 'LUCIA DE FATIMA RODRIGUES MALAQUIAS ', '', '1960-05-29 00:00:00', '807.474.854-53', '', 66, 2, '2019-04-15 13:45:17', 15, NULL, NULL, 1, 'FEMININO'),
(68, 'ALDIMAR VIEIRA PEREIRA DA SILVA ', '', '1959-04-06 00:00:00', '202.560.434-34', '', 67, 2, '2019-04-15 13:51:18', 15, NULL, NULL, 1, 'MASCULINO'),
(69, 'ALDIMAR VIEIRA PEREIRA DA SILVA ', '', '1959-04-06 00:00:00', '202.560.434-34', '', 68, 2, '2019-04-15 13:53:27', 15, NULL, NULL, 1, 'MASCULINO'),
(70, 'ANNE KELLY TEIXEIRA DE LIMA ', '', '1976-06-02 00:00:00', '025.749.054-07', '', 69, 2, '2019-04-15 13:54:39', 15, NULL, NULL, 1, 'FEMININO'),
(71, 'ANNE KELLY TEIXEIRA DE LIMA ', '', '1976-06-02 00:00:00', '025.749.054-07', '', 70, 2, '2019-04-15 13:55:38', 15, NULL, NULL, 1, 'FEMININO'),
(72, 'ANTONIO TEIXEIRA DA SILVA ', '', '1970-06-13 00:00:00', '722.238.804-44', '', 71, 2, '2019-04-15 13:56:38', 15, NULL, NULL, 1, 'MASCULINO'),
(73, 'FRANCISCO WAGNER TAVARES DE MORAIS ', '', '1991-01-13 00:00:00', '079.796.054-62', '', 72, 2, '2019-04-15 13:57:41', 15, NULL, NULL, 1, 'MASCULINO'),
(74, 'LEANDRO JOSE COELHO BENTO', '', '1989-01-03 00:00:00', '072.930.554-63', '', 73, 2, '2019-04-15 13:59:06', 15, NULL, NULL, 1, 'MASCULINO'),
(75, 'LUANA ISABELLE DA SILVA', '', '1994-04-20 00:00:00', '018.336.134-22', '', 74, 2, '2019-04-15 14:00:21', 15, NULL, NULL, 1, 'FEMININO'),
(76, 'ADALBERTO CARLOS MALAQUIAS ', '', '1963-08-12 00:00:00', '391.698.634-15', '', 75, 2, '2019-04-15 14:07:18', 15, NULL, NULL, 1, 'MASCULINO'),
(77, 'ANA CRISTINA MARTINS MACIEL', '', '1971-08-08 00:00:00', '071.832.904-09', '', 76, 2, '2019-04-15 14:09:49', 15, NULL, NULL, 1, 'FEMININO'),
(78, 'ANA VITORIA SOARES DA COSTA', '', '2000-04-17 00:00:00', '017.217.214-44', '', 77, 2, '2019-04-15 14:10:56', 15, NULL, NULL, 1, 'FEMININO'),
(79, 'CELESTINO FERNANDES DA FONSECA', '', '1972-05-19 00:00:00', '792.370.964-53', '', 78, 2, '2019-04-15 14:12:07', 15, NULL, NULL, 1, 'MASCULINO'),
(80, 'DAIANA VARELA DA TRINDADE', '', '1987-05-18 00:00:00', '085.019.694-94', '', 79, 2, '2019-04-15 14:14:44', 15, NULL, NULL, 1, 'FEMININO'),
(81, 'ERIVALDO FERREIRA DA SILVA', '', '1966-07-07 00:00:00', '525.775.624-20', '', 80, 2, '2019-04-15 14:16:08', 15, NULL, NULL, 1, 'MASCULINO'),
(82, 'ERIVAN FERREIRA DA SILVA', '', '1971-10-11 00:00:00', '874.650.194-00', '', 81, 2, '2019-04-15 14:17:37', 15, NULL, NULL, 1, 'MASCULINO'),
(83, 'FABIANO DE MEDEIROS MENDONï¿½A ', '', '1979-06-05 00:00:00', '041.746.774-50', '', 82, 2, '2019-04-15 14:20:00', 15, NULL, NULL, 1, 'MASCULINO'),
(84, 'FABIO FERREIRA DA SILVA ', '', '1975-12-18 00:00:00', '277.219.208-33', '', 83, 2, '2019-04-15 14:22:55', 15, NULL, NULL, 1, 'MASCULINO'),
(85, 'FRANCISCA ERINEIDE DE LIMA MEDEIROS ', '', '1973-08-07 00:00:00', '806.874.744-34', '', 84, 2, '2019-04-15 14:24:15', 15, NULL, NULL, 1, 'FEMININO'),
(86, 'FRANCISCA FRANCINEIDE DAVID DA SILVA', '', '1992-04-03 00:00:00', '017.412.004-40', '', 85, 2, '2019-04-15 14:27:51', 15, NULL, NULL, 1, 'FEMININO'),
(87, 'FRANCISCA TERTULIANA DA SILVA', '', '1968-09-15 00:00:00', '011.955.024-51', '', 86, 2, '2019-04-15 14:29:12', 15, NULL, NULL, 1, 'FEMININO'),
(88, 'FRANCISCO ANANIAS DA SILVA', '', '1979-01-25 00:00:00', '027.947.614-04', '', 87, 2, '2019-04-15 14:30:21', 15, NULL, NULL, 1, 'MASCULINO'),
(89, 'FRANCISCO DE ASSIS  SILVA SANTOS', '', '1965-09-28 00:00:00', '465.438.484-72', '', 88, 2, '2019-04-15 14:32:42', 15, NULL, NULL, 1, 'MASCULINO'),
(90, 'FRANCISCO EIDE DOS SANTOS ', '', '1980-12-06 00:00:00', '050.796.864-64', '', 89, 2, '2019-04-15 14:33:56', 15, NULL, NULL, 1, 'MASCULINO'),
(91, 'FRANCISCO RIZONALDO DE SOUZA', '', '1969-12-31 00:00:00', '029.194.714-06', '', 90, 2, '2019-04-15 14:35:50', 15, NULL, NULL, 1, 'MASCULINO'),
(92, 'FRANCISCO ROMï¿½O DA SILVA', '', '1952-03-09 00:00:00', '130.051.704-20', '', 91, 2, '2019-04-15 14:37:04', 15, NULL, NULL, 1, 'MASCULINO'),
(93, 'ITAMAR BEZERRA DA SILVA', '', '1971-11-30 00:00:00', '654.771.384-91', '', 92, 2, '2019-04-15 14:38:09', 15, NULL, NULL, 1, 'MASCULINO'),
(94, 'JOAO BATISTA PINHEIRO', '', '1964-06-04 00:00:00', '357.835.674-34', '', 93, 2, '2019-04-15 14:46:10', 15, NULL, NULL, 1, 'MASCULINO'),
(95, 'JOï¿½O DARC DA SILVA BEZERRA', '', '1968-04-16 00:00:00', '642.549.334-87', '', 94, 2, '2019-04-15 14:49:04', 15, NULL, NULL, 1, 'MASCULINO'),
(96, 'JOSE DANILO DA SILVA', '', '1981-01-26 00:00:00', '053.091.124-80', '', 95, 2, '2019-04-15 14:50:28', 15, NULL, NULL, 1, 'MASCULINO'),
(97, 'JOSE LUIZ DOS SANTOS ', '', '1954-04-21 00:00:00', '792.368.474-04', '', 96, 2, '2019-04-15 14:52:28', 15, NULL, NULL, 1, 'MASCULINO'),
(98, 'JOSE NETO FERREIRA DA SILVA ', '', '1971-01-03 00:00:00', '702.482.224-49', '', 97, 2, '2019-04-15 14:54:52', 15, NULL, NULL, 1, 'MASCULINO'),
(99, 'JOSE RODRIGUES DA SILVA JUNIOR', '', '1995-05-20 00:00:00', '116.268.514-09', '', 98, 2, '2019-04-15 15:15:36', 15, NULL, NULL, 1, 'MASCULINO'),
(100, 'JOSE ROMUALDO DA SILVA JUNIOR', '', '1989-10-06 00:00:00', '076.759.454-17', '', 99, 2, '2019-04-15 15:16:56', 15, NULL, NULL, 1, 'MASCULINO'),
(101, 'JOSEFA VIVIA DE MOURA MARTINS', '', '1997-05-07 00:00:00', '709.885.624-05', '', 100, 2, '2019-04-15 15:19:59', 15, NULL, NULL, 1, 'FEMININO'),
(102, 'JULIO CESAR BEZERRA DE ASSIS', '', '1962-12-19 00:00:00', '305.223.904-04', '', 101, 2, '2019-04-15 15:21:03', 15, NULL, NULL, 1, 'MASCULINO'),
(103, 'JUVANILSON DA SILVA NASCIMENTO', '', '1992-06-19 00:00:00', '078.301.824-00', '', 102, 2, '2019-04-15 15:22:18', 15, NULL, NULL, 1, 'MASCULINO'),
(104, 'LEOTO BARBOSA DE SOUSA', '', '1983-02-24 00:00:00', '056.513.704-20', '', 103, 2, '2019-04-15 15:23:14', 15, NULL, NULL, 1, 'MASCULINO'),
(105, 'LUIZ AVELINO DA SILVA', '', '1962-08-20 00:00:00', '336.616.934-68', '', 104, 2, '2019-04-15 15:26:01', 15, NULL, NULL, 1, 'MASCULINO'),
(106, 'LUIZ MARQUES DA SILVA', '', '1970-01-01 00:00:00', '465.396.894-20', '', 105, 2, '2019-04-15 15:27:41', 15, NULL, NULL, 1, 'MASCULINO'),
(107, 'MANOEL ITAMAR DE OLIVEIRA', '', '1983-09-26 00:00:00', '047.268.544-96', '', 106, 2, '2019-04-15 15:28:49', 15, NULL, NULL, 1, 'MASCULINO'),
(108, 'MARCONDES DE MELO GOMES ', '', '1974-05-09 00:00:00', '023.744.874-23', '', 107, 2, '2019-04-15 15:30:46', 15, NULL, NULL, 1, 'MASCULINO'),
(109, 'MARIA CONCEICAO DE FRANCA', '', '1973-05-21 00:00:00', '054.723.564-07', '', 108, 2, '2019-04-15 15:34:03', 15, NULL, NULL, 1, 'FEMININO'),
(110, 'MARIA DA CONCEIï¿½ï¿½O BARBOSA DA SILVA RODRIGUES ', '', '1981-04-06 00:00:00', '011.293.124-37', '', 109, 2, '2019-04-15 15:36:09', 15, NULL, NULL, 1, 'FEMININO'),
(111, 'MARIA DO SOCORRO RODRIGUES DA SILVA', '', '1981-05-11 00:00:00', '059.326.804-07', '', 110, 2, '2019-04-15 15:40:07', 15, NULL, NULL, 1, 'FEMININO'),
(112, 'MARIA JOSE DA SILVA', '', '1984-05-16 00:00:00', '013.902.684-38', '', 111, 2, '2019-04-15 15:41:29', 15, NULL, NULL, 1, 'FEMININO'),
(113, 'MARIA LUZIMAR RODRIGUES DE SALES', '', '1968-06-02 00:00:00', '874.626.724-72', '', 112, 2, '2019-04-15 15:42:35', 15, NULL, NULL, 1, 'FEMININO'),
(114, 'MARIA ZULEIDE BARBOSA DA SILVA', '', '1962-09-12 00:00:00', '642.550.184-72', '', 113, 2, '2019-04-15 15:43:58', 15, NULL, NULL, 1, 'MASCULINO'),
(115, 'MARLEIDE MONTEIRO DE BRITO', '', '1979-11-01 00:00:00', '080.438.474-60', '', 114, 2, '2019-04-15 15:44:56', 15, NULL, NULL, 1, 'MASCULINO'),
(116, 'MAURICIO DO NASCIMENTO RODRIGUES', '', '1968-07-17 00:00:00', '566.202.414-68', '', 115, 2, '2019-04-15 15:46:43', 15, NULL, NULL, 1, 'MASCULINO'),
(117, 'ROSINE ROSSE RODRIGUES', '', '1974-04-08 00:00:00', '807.294.874-15', '', 116, 2, '2019-04-15 15:47:55', 15, NULL, NULL, 1, 'MASCULINO'),
(118, 'SAMARA GOMES DA SILVA', '', '1996-02-28 00:00:00', '016.808.994-73', '', 117, 2, '2019-04-15 15:49:08', 15, NULL, NULL, 1, 'FEMININO'),
(119, 'TOBIAS GOMES DOS SANTOS', '', '1966-09-09 00:00:00', '638.817.484-15', '', 118, 2, '2019-04-15 15:50:17', 15, NULL, NULL, 1, 'MASCULINO'),
(120, 'VANUSIA GOMES RODRIGUES', '', '1976-12-26 00:00:00', '021.865.484-70', '', 119, 2, '2019-04-15 15:51:25', 15, NULL, NULL, 1, 'FEMININO'),
(121, 'ADRIANO NASCIMENTO DA SILVA ', '', '1979-08-31 00:00:00', '032.915.194-00', '', 120, 2, '2019-04-15 16:03:55', 15, NULL, NULL, 1, 'MASCULINO'),
(122, 'ALAN SANTOS DE SOUSA ', '', '1989-04-05 00:00:00', '074.633.454-08', '', 121, 2, '2019-04-15 16:04:48', 15, NULL, NULL, 1, 'MASCULINO'),
(123, 'ALAN SANTOS DE SOUSA ', '', '1989-04-05 00:00:00', '074.633.454-08', '', 122, 2, '2019-04-15 16:05:57', 15, NULL, NULL, 1, 'MASCULINO'),
(124, 'THALYSON LUIZ GOMES DE SOUZA', '', '1990-08-07 00:00:00', '087.694.404-76', '1234567', 123, 2, '2019-04-27 00:06:59', 15, NULL, NULL, 1, 'MASCULINO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_registro_de_ponto`
--

CREATE TABLE `tb_registro_de_ponto` (
  `id` int(11) NOT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `id_servidor` int(11) DEFAULT NULL,
  `id_funcionario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `dt_entrada` datetime DEFAULT NULL,
  `dt_saida` datetime DEFAULT NULL,
  `tempo_atividade` bigint(20) DEFAULT NULL,
  `ponto_em_aberto` int(11) DEFAULT '1',
  `nsr_entrada` varchar(11) DEFAULT NULL,
  `nsr_saida` varchar(11) DEFAULT NULL,
  `id_relogio_entrada` int(11) DEFAULT NULL,
  `id_relogio_saida` int(11) DEFAULT NULL,
  `obs` varchar(1000) DEFAULT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` varchar(30) DEFAULT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_registro_de_ponto`
--

INSERT INTO `tb_registro_de_ponto` (`id`, `id_registro`, `id_servidor`, `id_funcionario`, `id_empresa`, `dt_entrada`, `dt_saida`, `tempo_atividade`, `ponto_em_aberto`, `nsr_entrada`, `nsr_saida`, `id_relogio_entrada`, `id_relogio_saida`, `obs`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(1, NULL, NULL, 119, 2, '2019-04-26 07:30:00', '2019-04-26 17:30:00', 600, 0, '1234', '1235', 1, 1, NULL, '2019-04-26 03:00:00', '15', NULL, NULL, 1),
(2, NULL, NULL, 119, 2, '2019-04-29 07:30:00', '2019-04-29 17:30:00', 600, 0, '1122', '1123', 1, 1, NULL, '2019-04-26 03:00:00', '15', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_jornada_de_trabalho`
--

CREATE TABLE `tb_tipo_jornada_de_trabalho` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_tipo_jornada_de_trabalho`
--

INSERT INTO `tb_tipo_jornada_de_trabalho` (`id`, `nome`, `id_empresa`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(3, 'DIÁRIA', 2, '2019-04-01 23:36:02', 15, NULL, NULL, 1),
(4, 'PLANTÃO', 2, '2019-04-01 23:36:02', 15, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_unidade`
--

CREATE TABLE `tb_unidade` (
  `id_unidade` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1',
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_unidade`
--

INSERT INTO `tb_unidade` (`id_unidade`, `nome`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`, `id_empresa`) VALUES
(6, 'DEPARTAMENTO DE RECURSOS HUMANOS', '2019-04-03 18:33:14', 15, '2019-04-09 13:48:01', 15, 0, 2),
(7, 'SECRETARIA MUNICIPAL DE ADMINISTRACAO', '2019-04-03 18:52:57', 15, NULL, NULL, 1, 2),
(8, 'CONTROLADORIA', '2019-04-09 16:48:49', 15, NULL, NULL, 1, 2),
(9, 'SECRETARIA MUNICIPAL DE DESENVOLVIMENTO RURAL', '2019-04-09 16:49:21', 15, NULL, NULL, 1, 2),
(10, 'SECRETARIA MUNICIPAL DA CHEFIA DO GABINETE CIVIL', '2019-04-09 16:49:42', 15, NULL, NULL, 1, 2),
(11, 'SECRETARIA MUNICIPAL DE TURISMO', '2019-04-09 16:49:52', 15, NULL, NULL, 1, 2),
(12, 'SECRETARIA MUNICIPAL DE SEGURANCA', '2019-04-09 16:50:09', 15, NULL, NULL, 1, 2),
(13, 'SECRETARIA MUNICIPAL DE ESPORTE, LAZER E JUVENTUDE ', '2019-04-09 16:50:25', 15, NULL, NULL, 1, 2),
(14, 'SECRETARIA MUNICIPAL DA INDUSTRIA, COMERCIO, SERV. ENERG E PROJETOS', '2019-04-09 16:50:49', 15, NULL, NULL, 1, 2),
(15, 'SECRETARIA MUNICIPAL DE PLANEJAMENTO E DESENVOLVIMENTO INTEGRADO', '2019-04-09 16:51:08', 15, NULL, NULL, 1, 2),
(16, 'SECRETARIA MUNICIPAL DE TRIBUTACAO', '2019-04-09 16:51:22', 15, NULL, NULL, 1, 2),
(17, 'SECRETARIA MUNICIPAL DE MEIO AMBIENTE E URBANISMO', '2019-04-09 16:51:39', 15, NULL, NULL, 1, 2),
(18, 'SECRETARIA MUNICIPAL DE TRANSPORTE E TRANSITO', '2019-04-09 16:51:53', 15, NULL, NULL, 1, 2),
(19, 'SECRETARIA MUNICIPAL DE OBRAS E SERVICOS URBANOS ', '2019-04-09 16:52:06', 15, NULL, NULL, 1, 2),
(20, 'SECRETARIA MUNICIPAL DE ARTICULACAO INSTITUCIONAL', '2019-04-09 16:52:27', 15, NULL, NULL, 1, 2),
(21, 'SECRETARIA MUNICIPAL DE PESCA E CARCINICULTURA', '2019-04-09 16:52:44', 15, NULL, NULL, 1, 2),
(22, 'SECRETARIA MUNICIPAL DE FINANCAS', '2019-04-09 16:52:53', 15, NULL, NULL, 1, 2),
(23, 'GABINETE DA(O) VICE PREFEITO(A)', '2019-04-09 16:53:27', 15, NULL, NULL, 1, 2),
(24, 'CONTADORIA GERAL DO MUNICIPIO', '2019-04-09 16:53:42', 15, NULL, NULL, 1, 2),
(25, 'PROCURADORIA GERAL DO MUNICIPIO', '2019-04-09 16:53:59', 15, NULL, NULL, 1, 2),
(26, 'CONSULTORIA GERAL DO MUNICIPIO', '2019-04-09 16:54:10', 15, NULL, NULL, 1, 2),
(27, 'SECRETARIA MUNICIPAL DE SAUDE', '2019-04-09 16:55:01', 15, NULL, NULL, 1, 2),
(28, 'SECRETARIA MUNICIPAL DE EDUCACAO', '2019-04-09 16:55:10', 15, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_pessoa` int(11) DEFAULT NULL,
  `login` varchar(25) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `criado_por` int(11) NOT NULL,
  `dt_modificacao` datetime DEFAULT NULL,
  `modificado_por` int(11) DEFAULT NULL,
  `ativo` smallint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `id_pessoa`, `login`, `senha`, `dt_criacao`, `criado_por`, `dt_modificacao`, `modificado_por`, `ativo`) VALUES
(15, 19, '102.030.405-06', '$2y$10$7YpF7NyrM0ivNX37j06StO8KEXe/fb368Po8zcHcbpEJxNfXmthWG', '2019-03-31 14:12:56', 1, NULL, NULL, 1),
(16, 20, '019.448.424-62', '$2y$10$s37mUzsebCarw.fMXMCPT.HdD6uE02GBTUspnuv85JmEUMdWQ49ka', '2019-04-03 18:29:20', 15, NULL, NULL, 1),
(17, 21, '064.020.444-90', '$2y$10$7YpF7NyrM0ivNX37j06StO8KEXe/fb368Po8zcHcbpEJxNfXmthWG', '2019-04-03 18:51:13', 15, '2019-04-17 17:35:08', 15, 0),
(18, 22, '064.020.444-90', '$2y$10$NgfBlIojAPtirKfUEnolFOaqc3sHwXm4R.HqPAMqoM4.Z9LMJ/N2O', '2019-04-03 18:54:28', 15, NULL, NULL, 1),
(19, 23, '019.448.424-62', '$2y$10$NT21ff3oJ1.CFmqrXv9YAe2WqVJctf62aapN//3ObyxED4tlY68iK', '2019-04-10 19:00:33', 15, NULL, NULL, 1),
(20, 24, '064.020.444-90', '$2y$10$hxTa9N3YxnpCS7bjgx29ieZ9zAj3v1TvhHncukfj3bDQCzBsq8wm.', '2019-04-10 19:25:24', 15, NULL, NULL, 1),
(21, 25, '700.756.054-73', '$2y$10$3XsMj9Y2bH3tpHOMJp4.sOttPW2Z0X9cWiy4EyYimz0oryTSbr/g6', '2019-04-15 11:49:05', 15, NULL, NULL, 1),
(22, 26, '012.350.994-74', '$2y$10$vBCGI9ZlPdwTL9i0YjrFbuydbxZFQErZ.MSbV/f/mb15sz02ss4bC', '2019-04-15 11:51:07', 15, NULL, NULL, 1),
(23, 27, '352.930.634-72', '$2y$10$.KgY75OP.8A9qO3SXl9L6eUH45dE353NLObY78uJ37WJRC.Qa/nsy', '2019-04-15 11:52:23', 15, NULL, NULL, 1),
(24, 28, '011.568.674-60', '$2y$10$1W/zGHh94EHAROxtGF9w8ejXHPOte8S5tftCZr.oVctPkXTa0a.0.', '2019-04-15 11:54:33', 15, NULL, NULL, 1),
(25, 29, '021.004.714-30', '$2y$10$LIfqvmd4zIDu8sdZUswQ4eXKi9jkswZqDnIHV8PrtwTG4MlMfiT6u', '2019-04-15 11:57:27', 15, NULL, NULL, 1),
(26, 30, '623.367.034-91', '$2y$10$TmL43OSizUppyD/0Up5SQOgDt83FuVN.jCo5.zGw1vFamq4wW0JGe', '2019-04-15 11:58:35', 15, NULL, NULL, 1),
(27, 31, '036.162.304-62', '$2y$10$iANCw/TJGzGXk0CNgjRoyOkOJxIFWMWEKz1eb9lixGenVR0KXHTmW', '2019-04-15 12:00:16', 15, NULL, NULL, 1),
(28, 32, '023.339.654-36', '$2y$10$8sy2YPdgR/zQ6LzA./bhIu75BOe3922bwXCzpJzun1MWZmSEwW1d6', '2019-04-15 12:01:36', 15, NULL, NULL, 1),
(29, 33, '915.966.024-49', '$2y$10$CrJvbAFjEJj8X.AFJbLsa.RMJNp5MouIonqiCCpF6lcNVm9ckDyQG', '2019-04-15 12:06:12', 15, NULL, NULL, 1),
(30, 34, '307.866.224-15', '$2y$10$3p/ro14./fdtjO1yTgqbvuKDbHQ/n5qILj3EwIkR3XeCfTBheucZ6', '2019-04-15 12:09:06', 15, NULL, NULL, 1),
(31, 35, '042.531.996-23', '$2y$10$4HfvP6nRoLoEJ666dCSzbeiPwnYnxkC7OFWOVnO54mYCzjdWgW.gy', '2019-04-15 12:10:10', 15, NULL, NULL, 1),
(32, 36, '019.448.424-62', '$2y$10$tWGNoBqJ6UxdgXHulmc5e.upbS931i1BMU0tBlhH.11OnDS2mmRn6', '2019-04-15 12:11:05', 15, NULL, NULL, 1),
(33, 37, '481.919.224-87', '$2y$10$/BWuNFxS7dtC87xIMUHGGOGxQ4hJpt.6ZiShD4XSirNrRyzoVoPWq', '2019-04-15 12:12:51', 15, NULL, NULL, 1),
(34, 38, '033.196.574-70', '$2y$10$V8.R7/Sot4WSerkj2MM9JOB2Nl/mYhttlxglbL.24YaV.V8V/rIG2', '2019-04-15 12:14:42', 15, NULL, NULL, 1),
(35, 39, '024.450.094-05', '$2y$10$vr5iLATR2ikPKxViuM027O0R/I4fJGp1dr4DRX77.NmSEc3seVEIW', '2019-04-15 12:16:58', 15, NULL, NULL, 1),
(36, 40, '073.656.514-07', '$2y$10$PMf4xvngDKK76WCW6rdAfOxuGLpkeVLMxPLpae26TIlGLz8IORL46', '2019-04-15 12:23:41', 15, NULL, NULL, 1),
(37, 41, '068.045.224-94', '$2y$10$b2gaqgTlXUGh4LxHju9wGuAIVPA9g4FV.h.lKbtzHowwmdhcfR0Z.', '2019-04-15 12:24:52', 15, NULL, NULL, 1),
(38, 42, '031.447.364-57', '$2y$10$B2DjgUcVHnGv3LQeyLq7s.5.7hXdv7DiDN/NwSG41WcYcnTqevJLW', '2019-04-15 12:26:26', 15, NULL, NULL, 1),
(39, 43, '051.752.684-06', '$2y$10$n9wLKUBENCvEp4nLERnog.1Bbi9m342v4JxKRS1SxMOUOD8R2JylK', '2019-04-15 12:27:55', 15, NULL, NULL, 1),
(40, 44, '025.531.774-37', '$2y$10$v9VLeKizXtQ/0OR.72.ro.nvNzp65jHae1IGaTvou5NomUXFeFj6y', '2019-04-15 12:29:38', 15, NULL, NULL, 1),
(41, 45, '125.003.354-37', '$2y$10$057q3ON0fYrQTldyly50oe3DMWYJjEkEOFtLRKayQUAeJraBvlM5i', '2019-04-15 12:38:03', 15, NULL, NULL, 1),
(42, 46, '071.189.184-23', '$2y$10$0rth0ZBB31pZDHcGKmnwZelRoKJ5ilMNl/uI8Ge2DqDkp0ZdfsDc.', '2019-04-15 12:41:01', 15, NULL, NULL, 1),
(43, 47, '737.412.214-49', '$2y$10$UiWBeKmSorvG/shfGHXfoOxhgxO4v8fYLgLjGIrwNzfpoqcDdW8PS', '2019-04-15 12:43:54', 15, NULL, NULL, 1),
(44, 48, '077.317.254-80', '$2y$10$VTvH7fn2/nWJrrhzLHvU0ebqV.HOQ9ClOd8t3qv4scaUuJMj4NtRW', '2019-04-15 12:45:08', 15, NULL, NULL, 1),
(45, 49, '016.098.784-93', '$2y$10$dYm.KixV1/D6YZSZ.bQ4du6rYoFUsNMMv0tBlMyW9V9iVOmpNM5ea', '2019-04-15 12:47:21', 15, NULL, NULL, 1),
(46, 50, '785.058.104-06', '$2y$10$za3GSUreoWdDiYFjftJFAOS.24Lu69TDMY7EsG/r.Nb4hwLP3cjs6', '2019-04-15 12:51:45', 15, NULL, NULL, 1),
(47, 51, '421.686.514-34', '$2y$10$pkXmut93lMw/x4o1NQwfjOQqJEEen7G/LO9s863I8sKOTEAK8K0q.', '2019-04-15 12:53:20', 15, NULL, NULL, 1),
(48, 52, '664.069.784-04', '$2y$10$q9hWRrdqwOcdE77j/MK7jerukzwWVrhV4T4rJizpLIMLQFP/IeuQa', '2019-04-15 13:03:26', 15, NULL, NULL, 1),
(49, 53, '565.840.914-49', '$2y$10$NouQPLrIq0HVz28XY7NBauMIaeDrjEVgd4UFNQNe/Alqf3jieD/Fy', '2019-04-15 13:07:39', 15, NULL, NULL, 1),
(50, 54, '034.048.964-24', '$2y$10$ILcuUcCPDuItHNJ36ggrT.pTJKbLIIsVIIYB.lspjYRE9spoXjiF.', '2019-04-15 13:10:54', 15, NULL, NULL, 1),
(51, 55, '492.046.104-68', '$2y$10$0APuitOscEYpvWbsi4rnEOJ9LGhkDOAbkWprnv4eYsFdDiYJLgBSe', '2019-04-15 13:12:04', 15, NULL, NULL, 1),
(52, 56, '012.103.954-44', '$2y$10$N0H3xW0SN0TEfJfbLkMxK.XkTEZ1NW5czCfpFZWdqhdRLUruXM8oa', '2019-04-15 13:19:27', 15, NULL, NULL, 1),
(53, 57, '021.842.584-82', '$2y$10$A2wZEpDpGXMaynBddiTXiOSwx8U4w7Pw5MvbBlFO8T/zMMSlLtPVa', '2019-04-15 13:20:30', 15, NULL, NULL, 1),
(54, 58, '059.551.834-69', '$2y$10$jMFVlq1.rqLcqEwDFCAN7.CmdWk9Cf1xVRtzamEvRjHNDL1dQwkwC', '2019-04-15 13:22:17', 15, NULL, NULL, 1),
(55, 59, '074.340.804-77', '$2y$10$llZUoZNxYjo9sevWHeTTeuboa4nF9EwEYZK9om0sq3Otd0SfUNdrS', '2019-04-15 13:24:09', 15, NULL, NULL, 1),
(56, 60, '904.302.204-72', '$2y$10$qrAUMTm4M2dEOEzlQQmZV.222.lpZvxiYi.5y.k9Cq4NN7pAvvvfG', '2019-04-15 13:27:13', 15, NULL, NULL, 1),
(57, 61, '042.127.334-80', '$2y$10$AdZzpY/uMyziML0eXwOw.OvOk5k13iNBFqqL4vDYE/qn0svli19tG', '2019-04-15 13:31:30', 15, NULL, NULL, 1),
(58, 62, '102.053.434-65', '$2y$10$WeGSuqUdOG/ab2jimiOrJ.AYsMDmBEYFPb.tw1Y6rUBrc5TdNVO5q', '2019-04-15 13:34:10', 15, NULL, NULL, 1),
(59, 63, '064.020.444-90', '$2y$10$qzhBit74epC8IlCzAaF0k.ElWuJ./E6Qr0OGETsDZ34u77Ro95xiy', '2019-04-15 13:35:12', 15, NULL, NULL, 1),
(60, 64, '048.613.934-42', '$2y$10$6DHhIl.VzqRzptIRAfRW6O9Axcv8pI/fvmErcD4w82UkS1nFNGA12', '2019-04-15 13:39:44', 15, NULL, NULL, 1),
(61, 65, '046.249.944-85', '$2y$10$XTJO3LOlfdEXgzEh6ZCv..i6J59NAOvVnB7FT4vZ3E/x8aSYwKbFu', '2019-04-15 13:40:57', 15, NULL, NULL, 1),
(62, 66, '314.026.584-00', '$2y$10$GDbV3g8/Epzzxk3mVoZvT.e4VUWjRxfDciQYXlYh0S9S3tKSPeDcW', '2019-04-15 13:42:52', 15, NULL, NULL, 1),
(63, 67, '807.474.854-53', '$2y$10$l3DQPCzhBfkln7Pm.KtIH.yi6ZU.s7vTugr6kz7dlXGMbW.aCI0jW', '2019-04-15 13:45:18', 15, NULL, NULL, 1),
(64, 68, '202.560.434-34', '$2y$10$at.y39O0RiuSOVIyLGe/i.zLqJM7/45N4CtGQ9BSkbJiKi7JesbYm', '2019-04-15 13:51:18', 15, NULL, NULL, 1),
(65, 69, '202.560.434-34', '$2y$10$8.TkhDfU9GJz2ivUmjesk.PI7FiKcDXm0AMAVR7XeTsd.5lBSpIkO', '2019-04-15 13:53:28', 15, NULL, NULL, 1),
(66, 70, '025.749.054-07', '$2y$10$D7ILAA.GxlW.bEZd8MI9vuROXwr8wrB2NUA24vkzrBXb0C5TkudIa', '2019-04-15 13:54:40', 15, NULL, NULL, 1),
(67, 71, '025.749.054-07', '$2y$10$h/X09L7s6wB1dbW6VKV.Z.lyAxhI9AfIJpQjWu7M63UYKMfcE.oM2', '2019-04-15 13:55:39', 15, NULL, NULL, 1),
(68, 72, '722.238.804-44', '$2y$10$1owrdp5Y3L63a4C57hcp9uBWKPeztZe1gMZ/t0VQmiMcuVGAfPhha', '2019-04-15 13:56:38', 15, NULL, NULL, 1),
(69, 73, '079.796.054-62', '$2y$10$WI/DNip78tcaIcV7suxinuwbVIIF1yrmPsTKHndDwL1auVv6POxbO', '2019-04-15 13:57:41', 15, NULL, NULL, 1),
(70, 74, '072.930.554-63', '$2y$10$pZqyNI12Sd1Mai7zsVxvq.Q9PbrsqCbs3Xsarbp/iCHhl6Pi8g9ve', '2019-04-15 13:59:07', 15, NULL, NULL, 1),
(71, 75, '018.336.134-22', '$2y$10$mFA9D03xtP3v.G93nT.92uLcscu6/0se3Q1VwMHuKGlAtorCMQBOu', '2019-04-15 14:00:21', 15, NULL, NULL, 1),
(72, 76, '391.698.634-15', '$2y$10$uvcrl5wtv9h/aieWXw1LEOo/K6j6OF8ep0UaX4swF1CVFHWTJWryi', '2019-04-15 14:07:18', 15, NULL, NULL, 1),
(73, 77, '071.832.904-09', '$2y$10$tTW6AWowI4bUs6BwxXqIzOKd267uTpyUoognjr8L0/FSAGQH.XfSW', '2019-04-15 14:09:50', 15, NULL, NULL, 1),
(74, 78, '017.217.214-44', '$2y$10$LJnjnFMePW9AEEKVJ6vU4eGg0BIwi7yEn18MduSDBi9i/YfGbV0Dq', '2019-04-15 14:10:56', 15, NULL, NULL, 1),
(75, 79, '792.370.964-53', '$2y$10$UhwiQ/20s4beQqKBVRVL5ez.IWRKj25pns6jdojgkmkS73SIfU2fm', '2019-04-15 14:12:08', 15, NULL, NULL, 1),
(76, 80, '085.019.694-94', '$2y$10$OxOdc90i9iielSKA338Z/OR6Ig.BW0tj/H/7lR/AGqpXGj5kDkrwG', '2019-04-15 14:14:45', 15, NULL, NULL, 1),
(77, 81, '525.775.624-20', '$2y$10$2NtyMOytMuVy/keVpvxfnOQM3ITslVtQveK1MeS6Le0gbGpNpQZQu', '2019-04-15 14:16:09', 15, NULL, NULL, 1),
(78, 82, '874.650.194-00', '$2y$10$Wc7QA231vsQ1UqtemqBYluyPpbZcAI9zafUx3TCQRKM46Z..zwTSi', '2019-04-15 14:17:38', 15, NULL, NULL, 1),
(79, 83, '041.746.774-50', '$2y$10$igNyfdQ..UD5ccp5Oyq5Z.1G2JQYMZIPhmI60agLKVEJb9QGIgGtu', '2019-04-15 14:20:01', 15, NULL, NULL, 1),
(80, 84, '277.219.208-33', '$2y$10$e1cN30uMFLkxYCC/tjo.VebN6sH77jFtDFKVQ3/1nl9qxiARjjf5m', '2019-04-15 14:22:55', 15, NULL, NULL, 1),
(81, 85, '806.874.744-34', '$2y$10$TNs2HubXErOkHtggmWZvaecVu9eTOcyGBcS7XV.Z1xYBuonIG.Ttq', '2019-04-15 14:24:17', 15, NULL, NULL, 1),
(82, 86, '017.412.004-40', '$2y$10$aBENoesjnYettY9sEgnlqOJBh8J9/qtdFJJmY0pLNXR1nkesmKxEa', '2019-04-15 14:27:52', 15, NULL, NULL, 1),
(83, 87, '011.955.024-51', '$2y$10$48RwD89rTVLSfHOmczAoeeO0oAnEV1WgGS7u6AS0mB0brjvzy4/DC', '2019-04-15 14:29:13', 15, NULL, NULL, 1),
(84, 88, '027.947.614-04', '$2y$10$g3zX2pI42xl1SrzBzcUNheaNuSMIU211BceHdDa24czHb3Xc4s0qa', '2019-04-15 14:30:21', 15, NULL, NULL, 1),
(85, 89, '465.438.484-72', '$2y$10$6ML2FvJRfX6G37ftHxYpz.GGtjK4gJknrevimRlZg2ZOiC7ET5VCu', '2019-04-15 14:32:43', 15, NULL, NULL, 1),
(86, 90, '050.796.864-64', '$2y$10$4Wz4ezeZ2qQ3232cVxXhVeOlZggp20LvGAG6iZ26CzvuNgsTQDZt2', '2019-04-15 14:33:57', 15, NULL, NULL, 1),
(87, 91, '029.194.714-06', '$2y$10$7JkUnLWxv.cWymdR5ZQ3eeuEfcExQ3ZA7H4vVL3ewI.1josarKLwq', '2019-04-15 14:35:50', 15, NULL, NULL, 1),
(88, 92, '130.051.704-20', '$2y$10$bcf49x4HkStH35JDm3j4suAuGdPLFJbVS2tZ3aAIF4x0joExcAnFe', '2019-04-15 14:37:04', 15, NULL, NULL, 1),
(89, 93, '654.771.384-91', '$2y$10$lX2Bh7OtPLrPTIfcEM2A9..rmH7nhWvM/KXA3hAnedF0x3pwi6Swm', '2019-04-15 14:38:10', 15, NULL, NULL, 1),
(90, 94, '357.835.674-34', '$2y$10$mKUSiAXnZ72DYFTGx6HZPutHAXaACgfsu0KUzpN/7lihdh77LNQNa', '2019-04-15 14:46:10', 15, NULL, NULL, 1),
(91, 95, '642.549.334-87', '$2y$10$mkA6GgQckBoiUbD/LassYeU4BPH1Ne9YI1dCJJ/cB53tS20LQLtzW', '2019-04-15 14:49:04', 15, NULL, NULL, 1),
(92, 96, '053.091.124-80', '$2y$10$Npq9FqpRjQfjVZZ/vIHLmOLHq3igRA2TsSn8jm7jv1xcI5fpG9VrW', '2019-04-15 14:50:28', 15, NULL, NULL, 1),
(93, 97, '792.368.474-04', '$2y$10$41VO4YW5TEAFR/Q2pLkyLO3p67sQE7v9fonxe.q3aeekD7eE2LhQa', '2019-04-15 14:52:28', 15, NULL, NULL, 1),
(94, 98, '702.482.224-49', '$2y$10$dNWSptiGQi6zm8SgORiPP.JrJ9VwUktw/frNY8yd/gpfMoGly9.Iu', '2019-04-15 14:54:53', 15, NULL, NULL, 1),
(95, 99, '116.268.514-09', '$2y$10$P1pgraEaTF7iK0RDxGBLtu.ecZuHeEWTR1fgMapT74/yvSMETQy4i', '2019-04-15 15:15:37', 15, NULL, NULL, 1),
(96, 100, '076.759.454-17', '$2y$10$UjWqZ1T2Ybsl1neKA.wu7eCziDdeyY9OApJQ4Vh7PIY3S8bwkBCYi', '2019-04-15 15:16:57', 15, NULL, NULL, 1),
(97, 101, '709.885.624-05', '$2y$10$oCQuFXxKaishw/.w9n5ZyeCvX0xNSlMseA1stPrYtDin6eZvTSoCO', '2019-04-15 15:19:59', 15, NULL, NULL, 1),
(98, 102, '305.223.904-04', '$2y$10$0HuKDvDbRPMlXINzo4lf2.AMhZgyvwNBr3YcdlyfDBinuiOw7TRJ.', '2019-04-15 15:21:04', 15, NULL, NULL, 1),
(99, 103, '078.301.824-00', '$2y$10$VhZHavFwCONdYUOyRvs0l.XC8myQ99c3/m2yVv67aq6hjOyE9WXrK', '2019-04-15 15:22:18', 15, NULL, NULL, 1),
(100, 104, '056.513.704-20', '$2y$10$xCQafRJj1KMP7rSDasQlEepRtBqupzEz2EcFlmhuG/yJPexwU1cri', '2019-04-15 15:23:15', 15, NULL, NULL, 1),
(101, 105, '336.616.934-68', '$2y$10$Viuy027baqOF.N/efdmgZe0L8Xra/E3nl38d3SCLriji/72c8q43e', '2019-04-15 15:26:02', 15, NULL, NULL, 1),
(102, 106, '465.396.894-20', '$2y$10$6qJ6l6n1xh4qASfz92.wd.c3pTOPiDFRvh9lh79bJBeR2ic7OjD6K', '2019-04-15 15:27:41', 15, NULL, NULL, 1),
(103, 107, '047.268.544-96', '$2y$10$7Wtappn03TwjeCjncmZBde2QW2oNjb4aYEuANNZ2zbbAepJjh63o6', '2019-04-15 15:28:50', 15, NULL, NULL, 1),
(104, 108, '023.744.874-23', '$2y$10$xLmPIrE9sn7BsgfX1zXkYuVmcWX61U62E513GTzu/qSOfMm1yQK3i', '2019-04-15 15:30:46', 15, NULL, NULL, 1),
(105, 109, '054.723.564-07', '$2y$10$XC.u0VR3yWL/Qc912ch7pu0QJsBmdFML.UBSQCogUGMeGegS0P1RO', '2019-04-15 15:34:04', 15, NULL, NULL, 1),
(106, 110, '011.293.124-37', '$2y$10$drGV9eFHaRW3.BGC0Ms2EevUuh9s7PWH.5TGgiRKwv/pzOIvzkIPa', '2019-04-15 15:36:10', 15, NULL, NULL, 1),
(107, 111, '059.326.804-07', '$2y$10$JS6lNkiCxVtMFStW7Ny95O3NnExRGxavBKBcuWOUtg4soWexMA3eu', '2019-04-15 15:40:08', 15, NULL, NULL, 1),
(108, 112, '013.902.684-38', '$2y$10$N7/NkCoKPn2LJaZVACdObeNYo4shUl.uoQVnZmWKj0GZfXfDFcNBe', '2019-04-15 15:41:29', 15, NULL, NULL, 1),
(109, 113, '874.626.724-72', '$2y$10$F74SfMuPHXMimzE1yLHaGe7dzN2UZ9e8VkaVMsQqshVk29BOD4ISi', '2019-04-15 15:42:35', 15, NULL, NULL, 1),
(110, 114, '642.550.184-72', '$2y$10$yRLbt5EKaSmilXgYRRcsDO1S6kfJRDjKwQvrNaQgT91/veQrm6une', '2019-04-15 15:43:58', 15, NULL, NULL, 1),
(111, 115, '080.438.474-60', '$2y$10$d0NJ9ZppQo4YYV4qpBJeyufv9klGePvF3qIOciohXLpxa/eL2zukO', '2019-04-15 15:44:56', 15, NULL, NULL, 1),
(112, 116, '566.202.414-68', '$2y$10$1R1gF3RQq2gl7R2d6z.MLencVdqqi4Ll89HnMi/y7wRdEDiO8nscq', '2019-04-15 15:46:43', 15, NULL, NULL, 1),
(113, 117, '807.294.874-15', '$2y$10$zGDkEEsgQcNgfsT/s89Atu2elCujciGAVCwAknu9Fl9Zw0HtBxuBi', '2019-04-15 15:47:55', 15, NULL, NULL, 1),
(114, 118, '016.808.994-73', '$2y$10$MSJV9ntNe1cug9EIy..CvOrMNk1bskbvKNqk0B9.5qzjdY8Ugn.MS', '2019-04-15 15:49:08', 15, NULL, NULL, 1),
(115, 119, '638.817.484-15', '$2y$10$HJi9hVDiWUHPYsQbhfIDNenL876UOYr/0bgUhbEgj3nH3jT4MvrbG', '2019-04-15 15:50:17', 15, NULL, NULL, 1),
(116, 120, '021.865.484-70', '$2y$10$RR21E46OQPQ5JnNAnW0I7.qfRJPIcX0IZkZIuEfr0UKDFAvV.C1pC', '2019-04-15 15:51:25', 15, NULL, NULL, 1),
(117, 121, '032.915.194-00', '$2y$10$Cx30vS.mfYUFkiEsrkobCeKurPs.1HeagUi.w9w8YReq3i.7ndxv6', '2019-04-15 16:03:55', 15, NULL, NULL, 1),
(118, 122, '074.633.454-08', '$2y$10$ofoVtnUSiLoN6z2ym.lN/ustFG3w8rcd9xkt2nTmKuN.vMqQ.QGyW', '2019-04-15 16:04:52', 15, NULL, NULL, 1),
(119, 123, '074.633.454-08', '$2y$10$94y6lkV9/ZD555QGL1BY1epWW.XOXg/Qww5232XHj54RE1Ae4Ij2G', '2019-04-15 16:05:58', 15, NULL, NULL, 1),
(120, 124, '087.694.404-76', '$2y$10$HifFNs7Emdxo/C1C0XOsZeSO6Q7isayIXzpa3GgyEhwzUflmovyhi', '2019-04-27 00:07:00', 15, '2019-04-30 20:01:33', 120, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_competencia`
--
ALTER TABLE `tb_competencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_tb_competencia` (`criado_por`),
  ADD KEY `fk_id_empresa_tb_competencia` (`id_empresa`);

--
-- Indexes for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `fk_id_endereco_empresa` (`id_endereco`),
  ADD KEY `fk_criado_por_empresa` (`criado_por`);

--
-- Indexes for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_criado_por_endereco` (`criado_por`);

--
-- Indexes for table `tb_feriado`
--
ALTER TABLE `tb_feriado`
  ADD PRIMARY KEY (`id_feriado`),
  ADD KEY `fk_criado_por_feriado` (`criado_por`);

--
-- Indexes for table `tb_funcao`
--
ALTER TABLE `tb_funcao`
  ADD PRIMARY KEY (`id_funcao`),
  ADD KEY `fk_criado_por_funcao` (`criado_por`),
  ADD KEY `fk_id_empresa_funcao` (`id_empresa`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_funcionario` (`criado_por`),
  ADD KEY `fk_id_pessoa_funcionario` (`id_pessoa`);

--
-- Indexes for table `tb_jornada_de_trabalho`
--
ALTER TABLE `tb_jornada_de_trabalho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_jornada_de_trabalho1` (`criado_por`),
  ADD KEY `fk_id_empresa_jornada_de_trabalho2` (`id_empresa`),
  ADD KEY `fk_id_tipo_jornada_de_trabalho2` (`id_tipo_jornada_de_trabalho`);

--
-- Indexes for table `tb_justificativa`
--
ALTER TABLE `tb_justificativa`
  ADD PRIMARY KEY (`id_justificativa`);

--
-- Indexes for table `tb_log_acesso`
--
ALTER TABLE `tb_log_acesso`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_log_update`
--
ALTER TABLE `tb_log_update`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `tb_lotacao`
--
ALTER TABLE `tb_lotacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_lotacao` (`criado_por`),
  ADD KEY `fk_id_funcionario_lotacao` (`id_funcionario`),
  ADD KEY `fk_id_unidade_lotacao` (`id_unidade`),
  ADD KEY `fk_id_funcao_lotacao` (`id_funcao`);

--
-- Indexes for table `tb_lotacao_jornada_de_trabalho`
--
ALTER TABLE `tb_lotacao_jornada_de_trabalho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_lotacao_jornada_de_trabalho_jornada_de_trabalho1` (`criado_por`),
  ADD KEY `fk_id_lotacao_lotacao_jornada_de_trabalho2` (`id_lotacao`),
  ADD KEY `fk_id_jornada_de_trabalho_lotac` (`id_jornada_de_trabalho`);

--
-- Indexes for table `tb_lotacao_registra_ponto`
--
ALTER TABLE `tb_lotacao_registra_ponto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_lotacao_registra_ponto` (`criado_por`),
  ADD KEY `fk_id_lotacao_lotacao_registra_ponto` (`id_lotacao`);

--
-- Indexes for table `tb_pdn`
--
ALTER TABLE `tb_pdn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_pdn` (`criado_por`);

--
-- Indexes for table `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD KEY `fk_id_endereco_pessoa` (`id_endereco`),
  ADD KEY `fk_id_empresa_pessoa` (`id_empresa`);

--
-- Indexes for table `tb_registro_de_ponto`
--
ALTER TABLE `tb_registro_de_ponto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_funcionario_registro_de_ponto` (`id_funcionario`),
  ADD KEY `fk_id_empresa_registro_de_ponto` (`id_empresa`);

--
-- Indexes for table `tb_tipo_jornada_de_trabalho`
--
ALTER TABLE `tb_tipo_jornada_de_trabalho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_criado_por_tipo_jornada_de_trabalho` (`criado_por`),
  ADD KEY `fk_id_empresa_jornada_de_trabalho` (`id_empresa`);

--
-- Indexes for table `tb_unidade`
--
ALTER TABLE `tb_unidade`
  ADD PRIMARY KEY (`id_unidade`),
  ADD KEY `fk_criado_por_unidade` (`criado_por`),
  ADD KEY `fk_id_empresa_unidade` (`id_empresa`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_competencia`
--
ALTER TABLE `tb_competencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tb_feriado`
--
ALTER TABLE `tb_feriado`
  MODIFY `id_feriado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_funcao`
--
ALTER TABLE `tb_funcao`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tb_jornada_de_trabalho`
--
ALTER TABLE `tb_jornada_de_trabalho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_justificativa`
--
ALTER TABLE `tb_justificativa`
  MODIFY `id_justificativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_log_acesso`
--
ALTER TABLE `tb_log_acesso`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_log_update`
--
ALTER TABLE `tb_log_update`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_lotacao`
--
ALTER TABLE `tb_lotacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tb_lotacao_jornada_de_trabalho`
--
ALTER TABLE `tb_lotacao_jornada_de_trabalho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tb_lotacao_registra_ponto`
--
ALTER TABLE `tb_lotacao_registra_ponto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tb_pdn`
--
ALTER TABLE `tb_pdn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tb_registro_de_ponto`
--
ALTER TABLE `tb_registro_de_ponto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tipo_jornada_de_trabalho`
--
ALTER TABLE `tb_tipo_jornada_de_trabalho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_unidade`
--
ALTER TABLE `tb_unidade`
  MODIFY `id_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_competencia`
--
ALTER TABLE `tb_competencia`
  ADD CONSTRAINT `fk_criado_por_tb_competencia` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_empresa_tb_competencia` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

--
-- Limitadores para a tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD CONSTRAINT `fk_criado_por_empresa` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_endereco_empresa` FOREIGN KEY (`id_endereco`) REFERENCES `tb_endereco` (`id_endereco`);

--
-- Limitadores para a tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_criado_por_endereco` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_feriado`
--
ALTER TABLE `tb_feriado`
  ADD CONSTRAINT `fk_criado_por_feriado` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_funcao`
--
ALTER TABLE `tb_funcao`
  ADD CONSTRAINT `fk_criado_por_funcao` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_empresa_funcao` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

--
-- Limitadores para a tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `fk_criado_por_funcionario` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_pessoa_funcionario` FOREIGN KEY (`id_pessoa`) REFERENCES `tb_pessoa` (`id_pessoa`);

--
-- Limitadores para a tabela `tb_jornada_de_trabalho`
--
ALTER TABLE `tb_jornada_de_trabalho`
  ADD CONSTRAINT `fk_criado_por_jornada_de_trabalho1` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_empresa_jornada_de_trabalho2` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_id_tipo_jornada_de_trabalho2` FOREIGN KEY (`id_tipo_jornada_de_trabalho`) REFERENCES `tb_tipo_jornada_de_trabalho` (`id`);

--
-- Limitadores para a tabela `tb_lotacao`
--
ALTER TABLE `tb_lotacao`
  ADD CONSTRAINT `fk_criado_por_lotacao` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_funcao_lotacao` FOREIGN KEY (`id_funcao`) REFERENCES `tb_funcao` (`id_funcao`),
  ADD CONSTRAINT `fk_id_funcionario_lotacao` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id`),
  ADD CONSTRAINT `fk_id_unidade_lotacao` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidade` (`id_unidade`);

--
-- Limitadores para a tabela `tb_lotacao_jornada_de_trabalho`
--
ALTER TABLE `tb_lotacao_jornada_de_trabalho`
  ADD CONSTRAINT `fk_criado_por_lotacao_jornada_de_trabalho_jornada_de_trabalho1` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_jornada_de_trabalho_lotac` FOREIGN KEY (`id_jornada_de_trabalho`) REFERENCES `tb_jornada_de_trabalho` (`id`),
  ADD CONSTRAINT `fk_id_lotacao_lotacao_jornada_de_trabalho2` FOREIGN KEY (`id_lotacao`) REFERENCES `tb_lotacao` (`id`);

--
-- Limitadores para a tabela `tb_lotacao_registra_ponto`
--
ALTER TABLE `tb_lotacao_registra_ponto`
  ADD CONSTRAINT `fk_criado_por_lotacao_registra_ponto` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_lotacao_lotacao_registra_ponto` FOREIGN KEY (`id_lotacao`) REFERENCES `tb_lotacao` (`id`);

--
-- Limitadores para a tabela `tb_pdn`
--
ALTER TABLE `tb_pdn`
  ADD CONSTRAINT `fk_criado_por_pdn` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD CONSTRAINT `fk_id_empresa_pessoa` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_id_endereco_pessoa` FOREIGN KEY (`id_endereco`) REFERENCES `tb_endereco` (`id_endereco`);

--
-- Limitadores para a tabela `tb_registro_de_ponto`
--
ALTER TABLE `tb_registro_de_ponto`
  ADD CONSTRAINT `fk_id_empresa_registro_de_ponto` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_id_funcionario_registro_de_ponto` FOREIGN KEY (`id_funcionario`) REFERENCES `tb_funcionario` (`id`);

--
-- Limitadores para a tabela `tb_tipo_jornada_de_trabalho`
--
ALTER TABLE `tb_tipo_jornada_de_trabalho`
  ADD CONSTRAINT `fk_criado_por_jornada_de_trabalho` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_empresa_jornada_de_trabalho` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);

--
-- Limitadores para a tabela `tb_unidade`
--
ALTER TABLE `tb_unidade`
  ADD CONSTRAINT `fk_criado_por_unidade` FOREIGN KEY (`criado_por`) REFERENCES `tb_usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_id_empresa_unidade` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
