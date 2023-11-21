-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Nov-2023 às 21:36
-- Versão do servidor: 5.7.40
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ordem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_nome` varchar(45) NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`, `categoria_data_alteracao`) VALUES
(1, 'Games', 1, '2023-10-24 13:38:23'),
(3, 'Eletronicos', 1, '2023-10-23 22:07:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_tipo` tinyint(1) DEFAULT NULL,
  `cliente_nome` varchar(45) DEFAULT NULL,
  `cliente_sobrenome` varchar(150) DEFAULT NULL,
  `cliente_data_nascimento` date DEFAULT NULL,
  `cliente_cpf_cnpj` varchar(9) DEFAULT NULL,
  `cliente_rg_ie` varchar(13) DEFAULT NULL,
  `cliente_email` varchar(50) DEFAULT NULL,
  `cliente_celular` varchar(16) DEFAULT NULL,
  `cliente_cep` varchar(10) DEFAULT NULL,
  `cliente_endereco` varchar(155) DEFAULT NULL,
  `cliente_numero_endereco` varchar(20) DEFAULT NULL,
  `cliente_bairro` varchar(45) DEFAULT NULL,
  `cliente_complemento` varchar(145) DEFAULT NULL,
  `cliente_cidade` varchar(50) DEFAULT NULL,
  `cliente_estado` varchar(2) DEFAULT NULL,
  `cliente_ativo` tinyint(1) DEFAULT NULL,
  `cliente_obs` tinytext,
  `cliente_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_telefone` varchar(16) NOT NULL,
  `cliente_sexo` char(1) NOT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_tipo`, `cliente_nome`, `cliente_sobrenome`, `cliente_data_nascimento`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_numero_endereco`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`, `cliente_data_alteracao`, `cliente_telefone`, `cliente_sexo`) VALUES
(1, '2023-10-13 09:45:31', 1, 'eliseu lucas', 'lucas', '2023-10-04', '258906314', '147896523698', 'eliseulucass30@gmail.com', '+258 84 777 7777', 'M4P78514', 'Grande Maputo', '43', 'Kumbeza', 'mocambicana', 'Maputo', 'MC', 1, '', '2023-10-13 09:46:08', '+258 84 700 6457', 'M'),
(2, '2023-10-15 21:55:59', 2, 'Germano Júnior', 'cossa', '2019-06-06', '457896211', '125478963', 'germano2@gmail.com', '+258 84 444 4444', 'M4P78515', 'Grande Maputo', '2322', 'Kumbeza', 'wwwwwwwwwwwwww', 'Maputo', 'MA', 1, '', '2023-10-15 21:55:59', '+258 84 044 4444', 'M'),
(21, '2023-10-28 22:27:22', 1, 'Helder Vumo II', 'Vumo', '2023-09-27', '258906399', '147896523699', 'HelderVumoII@gmail.com', '', 'M4P78514', 'Grande Maputo', '43', 'Kumbeza', 'wwwwwwwwwwwwww', 'Maputo', 'MA', 1, '', '2023-10-28 22:27:22', '', ''),
(18, '2023-10-21 21:42:54', 2, 'Helder Vumo', 'Vumo', '1992-06-12', '145214789', '147822569', 'heldervumo@gmail.com', '', 'M4P78512', 'Zimpeto', '43', 'Matendene', '142', 'Maputo', 'MC', 0, '', '2023-10-21 21:42:54', '+258 84 145 2698', ''),
(17, '2023-10-21 21:37:58', 1, 'Elton Palmira', 'Palmira', '1997-06-21', '258906222', '1425639874155', 'eltonpalmira@gmail.com', '', 'M4P78513', 'Grande Maputo', '431', 'Matendene', 'wwwwwwwwwwwwww', 'Maputo', 'MP', 1, '', '2023-10-21 21:37:58', '+258 47 569 2147', 'M'),
(16, '2023-10-21 19:21:59', 1, 'Marcia Tchakayta', 'ttttt', '2023-10-02', '258906312', '1425639811111', 'eliseuluca40@gmail.com', '+258 84 700 6111', 'M4P44442', 'Grande Maputo', '43', 'Kumbeza', 'wwwwwwwwwwwwww', 'Maputo', 'MA', 1, '', '2023-10-21 19:21:59', '+258 11 222 2222', 'F'),
(19, '2023-10-22 01:15:39', 1, 'Helder Sampaio', 'Sampaio', '1998-03-18', '258906222', '1425639874563', 'helderSampaio@gmail.com', '', 'M5P46829', '3 de fevereiro', '5489', 'Laulane', 'wwwwwwwwwwwwww', 'Maputo', 'MC', 0, '', '2023-10-22 01:15:39', '+258 84 444 4445', 'M'),
(20, '2023-10-24 11:36:30', 1, 'Gabriel Mause', 'junior', '2023-10-04', '258906322', '414142556221', 'GabrielMaus@gmail.com', '+258 84 258 8444', 'M4P78514', '3 de fevereiro', '43', 'Maguanine', '142', 'Maputo', 'MP', 1, '', '2023-10-24 11:36:30', '+258 84 500 6459', ''),
(11, '2023-10-19 13:37:10', 0, 'Miguel M Paulino', 'lucio', '2023-10-02', '124587963', '145632789', 'eliseulucasss40@gmail.com', '+258 84 800 6363', 'M4P78512', 'Grande Maputo', '5489', 'Kumbeza', 'wwwwwwwwwwwwww', 'Manica', 'MA', 1, '', '2023-10-19 13:37:10', '+258 84 700 6457', 'M'),
(25, '2023-10-29 18:39:34', 2, 'jorge Neves', 'NEVES', '2023-10-05', '147896214', '414142556', 'jorgeneves@gmail.com', '', 'M4P44444', 'albazine', '43', 'cmc', '', 'Maputo', 'MC', 0, '', '2023-10-29 18:39:34', '+258 84 846 2157', 'M'),
(28, '2023-11-12 21:27:37', 1, 'yuni', 'vulc', '2008-06-12', '258906312', '4141425562212', 'eliseulucas230@gmail.com', '', 'M4P78512', 'Grande Maputo', '43', 'Kumbeza', 'mocambicana', 'Maputo', 'MA', 0, '', '2023-11-12 21:27:37', '+258 84 500 6458', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

DROP TABLE IF EXISTS `contas_pagar`;
CREATE TABLE IF NOT EXISTS `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`conta_pagar_id`),
  KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
(1, 3, '2023-10-31', '2023-10-28 09:24:05', '800.00', 1, '', '2023-10-28 09:24:05'),
(4, 2, '2023-10-20', NULL, '1,800.00', 0, '', '2023-10-28 15:04:01'),
(6, 1, '2023-10-28', NULL, '81,800.00', 0, '', '2023-10-28 19:53:10'),
(7, 2, '2023-10-29', NULL, '81,800.00', 0, '', '2023-10-28 21:29:52'),
(8, 1, '2023-10-14', NULL, '800.00', 0, '', '2023-10-29 09:12:08'),
(11, 6, '2023-11-12', NULL, '800.00', 0, '', '2023-11-11 22:24:53'),
(13, 6, '2023-11-12', '2023-11-12 01:46:14', '800.00', 1, '', '2023-11-11 23:46:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

DROP TABLE IF EXISTS `contas_receber`;
CREATE TABLE IF NOT EXISTS `contas_receber` (
  `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_receber_cliente_id` int(11) NOT NULL,
  `conta_receber_data_vencto` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_valor` varchar(20) DEFAULT NULL,
  `conta_receber_status` tinyint(1) DEFAULT NULL,
  `conta_receber_obs` tinytext,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`conta_receber_id`),
  KEY `fk_conta_receber_id_cliente` (`conta_receber_cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`conta_receber_id`, `conta_receber_cliente_id`, `conta_receber_data_vencto`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
(2, 2, '2020-02-21', '2020-02-28 18:33:19', '350.00', 1, NULL, '2020-02-28 21:33:19'),
(3, 11, '2020-02-28', '2020-02-28 17:22:47', '56.00', 1, NULL, '2023-10-28 20:15:36'),
(5, 1, '2023-10-28', NULL, '875,694.85', 0, '', '2023-10-29 18:11:11'),
(6, 2, '2023-11-04', NULL, '72,000.00', 0, '', '2023-11-04 21:04:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formas_pagamentos`
--

DROP TABLE IF EXISTS `formas_pagamentos`;
CREATE TABLE IF NOT EXISTS `formas_pagamentos` (
  `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pagamento_nome` varchar(45) DEFAULT NULL,
  `forma_pagamento_aceita_parc` tinyint(1) DEFAULT NULL,
  `forma_pagamento_ativa` tinyint(1) DEFAULT NULL,
  `forma_pagamento_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`forma_pagamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formas_pagamentos`
--

INSERT INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`, `forma_pagamento_data_alteracao`) VALUES
(1, 'Cartão de crédito', 1, 1, '2020-02-14 23:46:46'),
(2, 'Dinheiro', 1, 1, '2020-01-29 21:43:54'),
(3, 'Boleto bancário', 1, 1, '2020-01-29 21:44:14'),
(5, 'Cartão de debito', 0, 1, '2023-11-04 23:51:17'),
(6, 'Trasferencia Bancaria', 1, 1, '2023-11-04 23:55:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fornecedor_razao` varchar(200) DEFAULT NULL,
  `fornecedor_nome_fantasia` varchar(145) DEFAULT NULL,
  `fornecedor_cnpj` varchar(9) DEFAULT NULL,
  `fornecedor_ie` varchar(10) DEFAULT NULL,
  `fornecedor_telefone` varchar(16) DEFAULT NULL,
  `fornecedor_celular` varchar(16) DEFAULT NULL,
  `fornecedor_email` varchar(50) DEFAULT NULL,
  `fornecedor_contato` varchar(50) DEFAULT NULL,
  `fornecedor_cep` varchar(9) DEFAULT NULL,
  `fornecedor_endereco` varchar(255) DEFAULT NULL,
  `fornecedor_numero_endereco` varchar(20) DEFAULT NULL,
  `fornecedor_bairro` varchar(45) DEFAULT NULL,
  `fornecedor_complemento` varchar(45) DEFAULT NULL,
  `fornecedor_cidade` varchar(50) DEFAULT NULL,
  `fornecedor_estado` varchar(2) DEFAULT NULL,
  `fornecedor_ativo` tinyint(1) DEFAULT NULL,
  `fornecedor_obs` tinytext,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`fornecedor_id`, `fornecedor_data_cadastro`, `fornecedor_razao`, `fornecedor_nome_fantasia`, `fornecedor_cnpj`, `fornecedor_ie`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_email`, `fornecedor_contato`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_numero_endereco`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`, `fornecedor_data_alteracao`) VALUES
(1, '2023-10-21 22:25:04', 'Loja de informática em Moçambique', 'MozComputers LDA', '142458963', '1452639874', '+258 21 329 298', '', 'sales@mozcomputers.co.mz', ' João Metambo', 'M1P22233', 'Rua Ngungunhane', '85', '25 de julho', 'Bloco A', 'Maputo', 'MC', 1, '', '2023-10-30 23:37:30'),
(2, '2023-10-22 02:24:39', 'Loja de informática em Moçambique', 'ProComputers Solutions', '145632477', '1452639871', '+258 43 880 002', '', 'Support@procomputer.com', NULL, 'M1P22331', 'Avenida 25 de Setembro', '1238', 'Alto Maé &quot;A&quot;', 'www.procomputers.co.mz', 'Maputo', 'MC', 1, '', '2023-10-24 10:24:48'),
(3, '2023-10-22 02:32:01', 'loja de Game&quot;Jogos&quot;', 'Mapa Game Mozambique', '145896273', '1452634445', '+258 21 453 000', '', 'gamemaputo@mdd.co.za', NULL, 'M1P22124', 'Jardim, Ponta Malangane', '1104', 'Rua do Jardim', 'Bloco A', 'Maputo', 'MC', 1, '', '2023-10-24 14:03:55'),
(4, '2023-10-24 22:15:52', 'Loja de informática em Moçambique', 'Inforlandia', '124587452', '1515158745', '+258 43 880 0022', '', 'inforlandia@gmail.co.mz', '', 'M1P22124', 'Av. Joaquim Chissano,', '292', 'Rua do Jardim', '', 'Maputo', 'MC', 0, '', '2023-10-30 23:40:19'),
(6, '2023-10-28 22:01:50', 'Loja de informática em Moçambiquee', 'technoplus', '158478963', '1265473899', '+258 25 964 7896', '', 'technoplus@mz.plus.com', '', 'M1P22233', 'Avenida 25 de Setembro', '1104', 'Alto Maé &quot;A&quot;', 'Bloco A', 'Maputo', 'MC', 1, '', '2023-11-11 23:45:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'Vendedor', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(2, '::1', 'admin@admin.com', 1699801787),
(3, '::1', 'admin@admin.com', 1699801792),
(4, '::1', 'admin@admin.com', 1699801796),
(5, '::1', 'admin@admin.com', 1699812667);

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `marca_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca_nome` varchar(45) NOT NULL,
  `marca_ativa` tinyint(1) DEFAULT NULL,
  `marca_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`marca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`marca_id`, `marca_nome`, `marca_ativa`, `marca_data_alteracao`) VALUES
(3, 'HP', 1, '2023-10-25 10:32:50'),
(5, 'Dell', 1, '2023-10-23 11:43:59'),
(6, 'toshiba', 1, '2023-11-04 20:44:44'),
(7, 'samsung', 0, '2023-11-04 20:44:49'),
(8, 'hisense', 1, '0000-00-00 00:00:00'),
(10, 'PlayStation 5', 1, '0000-00-00 00:00:00'),
(11, 'PlayStation 4', 0, '0000-00-00 00:00:00'),
(12, 'Leviton', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordem_tem_servicos`
--

DROP TABLE IF EXISTS `ordem_tem_servicos`;
CREATE TABLE IF NOT EXISTS `ordem_tem_servicos` (
  `ordem_ts_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordem_ts_id_servico` int(11) DEFAULT NULL,
  `ordem_ts_id_ordem_servico` int(11) DEFAULT NULL,
  `ordem_ts_quantidade` int(11) DEFAULT NULL,
  `ordem_ts_valor_unitario` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_desconto` varchar(45) DEFAULT NULL,
  `ordem_ts_valor_total` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ordem_ts_id`),
  KEY `fk_ordem_ts_id_servico` (`ordem_ts_id_servico`),
  KEY `fk_ordem_ts_id_ordem_servico` (`ordem_ts_id_ordem_servico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

--
-- Extraindo dados da tabela `ordem_tem_servicos`
--

INSERT INTO `ordem_tem_servicos` (`ordem_ts_id`, `ordem_ts_id_servico`, `ordem_ts_id_ordem_servico`, `ordem_ts_quantidade`, `ordem_ts_valor_unitario`, `ordem_ts_valor_desconto`, `ordem_ts_valor_total`) VALUES
(2, 2, 2, 4, '80.00', '0', '320.00'),
(3, 3, 3, 1, '120.00', '0', '120.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordens_servicos`
--

DROP TABLE IF EXISTS `ordens_servicos`;
CREATE TABLE IF NOT EXISTS `ordens_servicos` (
  `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordem_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `ordem_servico_cliente_id` int(11) DEFAULT NULL,
  `ordem_servico_data_emissao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ordem_servico_data_conclusao` varchar(100) DEFAULT NULL,
  `ordem_servico_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_marca_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_modelo_equipamento` varchar(80) DEFAULT NULL,
  `ordem_servico_acessorios` tinytext,
  `ordem_servico_defeito` tinytext,
  `ordem_servico_valor_desconto` varchar(25) DEFAULT NULL,
  `ordem_servico_valor_total` varchar(25) DEFAULT NULL,
  `ordem_servico_status` tinyint(1) DEFAULT NULL,
  `ordem_servico_obs` tinytext,
  `ordem_servico_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ordem_servico_id`),
  KEY `fk_ordem_servico_id_cliente` (`ordem_servico_cliente_id`),
  KEY `fk_ordem_servico_id_forma_pagto` (`ordem_servico_forma_pagamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ordens_servicos`
--

INSERT INTO `ordens_servicos` (`ordem_servico_id`, `ordem_servico_forma_pagamento_id`, `ordem_servico_cliente_id`, `ordem_servico_data_emissao`, `ordem_servico_data_conclusao`, `ordem_servico_equipamento`, `ordem_servico_marca_equipamento`, `ordem_servico_modelo_equipamento`, `ordem_servico_acessorios`, `ordem_servico_defeito`, `ordem_servico_valor_desconto`, `ordem_servico_valor_total`, `ordem_servico_status`, `ordem_servico_obs`, `ordem_servico_data_alteracao`) VALUES
(2, 1, 2, '2020-02-14 20:48:53', NULL, 'Notebook gamer', 'Awell', 'FONE01', 'Mouse e carregador', 'Não carrega', 'R$ 0.00', '80.00', 0, '', '2020-02-17 23:51:56'),
(3, 1, 18, '2020-02-17 23:53:26', NULL, 'Notebook Sony', 'Sony', 'FONE01', 'Mouse e carregador', 'Tela trincada', 'R$ 0.00', '120.00', 0, 'Vem buscar pela manhã', '2023-11-05 01:07:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_codigo` varchar(45) DEFAULT NULL,
  `produto_data_cadastro` datetime DEFAULT NULL,
  `produto_categoria_id` int(11) NOT NULL,
  `produto_marca_id` int(11) NOT NULL,
  `produto_fornecedor_id` int(11) NOT NULL,
  `produto_descricao` varchar(145) DEFAULT NULL,
  `produto_unidade` varchar(25) DEFAULT NULL,
  `produto_codigo_barras` varchar(45) DEFAULT NULL,
  `produto_ncm` varchar(15) DEFAULT NULL,
  `produto_preco_custo` varchar(45) DEFAULT NULL,
  `produto_preco_venda` varchar(45) DEFAULT NULL,
  `produto_estoque_minimo` varchar(10) DEFAULT NULL,
  `produto_qtde_estoque` varchar(10) DEFAULT NULL,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_obs` tinytext,
  `produto_data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`produto_id`),
  KEY `produto_categoria_id` (`produto_categoria_id`,`produto_marca_id`,`produto_fornecedor_id`),
  KEY `fk_produto_marca_id` (`produto_marca_id`),
  KEY `fk_produto_forncedor_id` (`produto_fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_fornecedor_id`, `produto_descricao`, `produto_unidade`, `produto_codigo_barras`, `produto_ncm`, `produto_preco_custo`, `produto_preco_venda`, `produto_estoque_minimo`, `produto_qtde_estoque`, `produto_ativo`, `produto_obs`, `produto_data_alteracao`) VALUES
(1, '72495380', NULL, 1, 10, 3, 'call of duty', 'jogo de Guerra', '4545', '5656', '130.000,00', '140.000,00', '2', '3', 1, '', '2023-10-28 20:01:22'),
(3, '41697502', NULL, 3, 5, 2, 'Mouse usb', 'rato de mesa', '9999', '5555', '420,00', '450,00', '18', '14', 1, '', '2023-10-28 20:04:53'),
(4, '12768934', NULL, 3, 12, 2, 'conector RJ 45', 'cat6', NULL, NULL, '19,00', '33,00', '50', '100', 1, '', '2023-10-28 20:06:59'),
(5, '52403896', NULL, 3, 12, 2, 'conector RJ 11', 'PABX', NULL, NULL, '12,00', '20,00', '15', '15', 1, '', '2023-10-28 20:07:21'),
(6, '29875603', NULL, 3, 3, 2, 'EliteBook série 1000', 'laptop', NULL, NULL, '130.684,35', '150.689,35', '3', '3', 1, '', '2023-10-28 19:48:29'),
(9, '05968237', NULL, 3, 3, 2, 'probook-450-g8', 'laptop', NULL, NULL, '70.000,00', '72.000,00', '2', '2', 1, '', '2023-11-04 21:02:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_nome` varchar(145) DEFAULT NULL,
  `servico_preco` varchar(15) DEFAULT NULL,
  `servico_descricao` tinytext,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`servico_id`, `servico_nome`, `servico_preco`, `servico_descricao`, `servico_ativo`, `servico_data_alteracao`) VALUES
(1, 'Limpeza geral', '50,00', 'Lorem Ipsum e muito trabalho', 1, '2023-10-25 09:38:43'),
(2, 'Solda elétrica', '80,00', 'Solda elétrica', 0, '2023-11-04 20:57:37'),
(3, 'Restauração de componentes', '120,00', 'Restauração de componentes', 1, '2020-02-13 22:11:29'),
(5, 'higenizacao de perifericos', '500,00', 'higenizacao de perifericos', 1, '2023-10-22 19:40:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sistema`
--

DROP TABLE IF EXISTS `sistema`;
CREATE TABLE IF NOT EXISTS `sistema` (
  `sistema_id` int(11) NOT NULL AUTO_INCREMENT,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(9) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(16) DEFAULT NULL,
  `sistema_telefone_movel` varchar(16) NOT NULL,
  `sistema_email` varchar(50) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_txt_ordem_servico` tinytext,
  `sistema_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sistema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sistema`
--

INSERT INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`, `sistema_data_alteracao`) VALUES
(1, 'system GEH inc', 'empresa de venda de material informatico', '704000162', '9874563214', '+258 84 700 6457', '+258 84 258 8470', 'GabrielTivane@gmail.com', 'http://localhost/Ordem1/', 'M8P04280', 'alto mae', '3811', 'Maputo', 'MA', '', '2023-10-19 20:40:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$z/r6AvgyTOuDsF2RU00ziO9Dn6qYM2FrqOpAgx5emnJ/zYnIDXthm', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1699800708, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(6, '::1', 'Eliseu', '$2y$10$14iiHGAPPo7kLUlfxx7YjexjETg2U/Wns9MWs5Nb69/AGfMhX3VAe', 'eliseulucass30@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1697058402, 1699815301, 1, 'Eliseu Lucas', 'lucas', NULL, NULL),
(7, '::1', 'ana', '$2y$10$cE4CzhiSdiCvklQ3Cztl8ef4JNy4mi6ogSJe2pBJt1149OkxyAUtq', 'anaxavi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1697059584, 1699795594, 1, 'ana', 'Xavier', NULL, NULL),
(8, '::1', 'juju', '$2y$10$a0S./xwKTTf78YKVV5fg3.YkXFHM8Hi5VkVzbW4EEbt0J0.1nuvKG', 'juju.alf@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1697150774, NULL, 0, 'judite', 'alfredo', NULL, NULL),
(10, '::1', 'Helder', '$2y$10$gz/rcSxMoHWTBlRgWjBVgO2Yi1gx906CgyTb4jcSIWm3WXiBjNWqq', 'heldervumo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1697703804, 1699795814, 0, 'Helder', 'Vumo', NULL, NULL),
(12, '::1', 'Gabriel Tivane', '$2y$10$uqGV1cM/xAIbtEWJFpGzf.xb7Q97x5C6Utozu7uW.EdS7iSRQ7Lhq', 'gabrieltivane@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1699800926, 1699822898, 1, 'Gabriel Tivane', 'boss tivas', NULL, NULL),
(13, '::1', 'Eliana', '$2y$10$VPf5npJlPiK7ahdT1sSFi.Z5pk97fyLW82PHqGgDa1I6KeFR8X9PO', 'elianalucas@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1699814146, 1699814220, 1, 'Eliana lucas', 'lucas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(9, 1, 1),
(18, 6, 1),
(20, 7, 2),
(21, 8, 2),
(23, 10, 2),
(32, 12, 1),
(31, 13, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `contacto` int(11) NOT NULL,
  `nome` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `biografia` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `nome_usuario` varchar(10) NOT NULL,
  `senha` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

DROP TABLE IF EXISTS `vendas`;
CREATE TABLE IF NOT EXISTS `vendas` (
  `venda_id` int(11) NOT NULL AUTO_INCREMENT,
  `venda_cliente_id` int(11) DEFAULT NULL,
  `venda_forma_pagamento_id` int(11) DEFAULT NULL,
  `venda_vendedor_id` int(11) DEFAULT NULL,
  `venda_tipo` tinyint(1) DEFAULT NULL,
  `venda_data_emissao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `venda_valor_desconto` varchar(25) DEFAULT NULL,
  `venda_valor_total` varchar(25) DEFAULT NULL,
  `venda_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`venda_id`),
  KEY `fk_venda_cliente_id` (`venda_cliente_id`),
  KEY `fk_venda_forma_pagto_id` (`venda_forma_pagamento_id`),
  KEY `fk_venda_vendedor_id` (`venda_vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`venda_id`, `venda_cliente_id`, `venda_forma_pagamento_id`, `venda_vendedor_id`, `venda_tipo`, `venda_data_emissao`, `venda_valor_desconto`, `venda_valor_total`, `venda_data_alteracao`) VALUES
(12, 2, 3, 1, 1, '2023-11-12 20:12:38', NULL, '18.168.1', NULL),
(13, 21, 6, 1, 2, '2023-11-12 20:21:02', NULL, '259.684,5', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_produtos`
--

DROP TABLE IF EXISTS `venda_produtos`;
CREATE TABLE IF NOT EXISTS `venda_produtos` (
  `id_venda_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `venda_produto_id_venda` int(11) DEFAULT NULL,
  `venda_produto_id_produto` int(11) DEFAULT NULL,
  `venda_produto_quantidade` varchar(15) DEFAULT NULL,
  `venda_produto_valor_unitario` varchar(20) DEFAULT NULL,
  `venda_produto_desconto` varchar(10) DEFAULT NULL,
  `venda_produto_valor_total` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_venda_produtos`),
  KEY `fk_venda_produtos_id_produto` (`venda_produto_id_produto`),
  KEY `fk_venda_produtos_id_venda` (`venda_produto_id_venda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE IF NOT EXISTS `vendedores` (
  `vendedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendedor_codigo` varchar(10) NOT NULL,
  `vendedor_data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `vendedor_nome_completo` varchar(145) NOT NULL,
  `vendedor_cpf` varchar(25) NOT NULL,
  `vendedor_rg` varchar(25) NOT NULL,
  `vendedor_telefone` varchar(16) DEFAULT NULL,
  `vendedor_celular` varchar(16) DEFAULT NULL,
  `vendedor_email` varchar(45) DEFAULT NULL,
  `vendedor_cep` varchar(15) DEFAULT NULL,
  `vendedor_endereco` varchar(45) DEFAULT NULL,
  `vendedor_numero_endereco` varchar(25) DEFAULT NULL,
  `vendedor_complemento` varchar(45) DEFAULT NULL,
  `vendedor_bairro` varchar(45) DEFAULT NULL,
  `vendedor_cidade` varchar(45) DEFAULT NULL,
  `vendedor_estado` varchar(2) DEFAULT NULL,
  `vendedor_ativo` tinyint(1) DEFAULT NULL,
  `vendedor_obs` tinytext,
  `vendedor_data_alteracao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`vendedor_id`, `vendedor_codigo`, `vendedor_data_cadastro`, `vendedor_nome_completo`, `vendedor_cpf`, `vendedor_rg`, `vendedor_telefone`, `vendedor_celular`, `vendedor_email`, `vendedor_cep`, `vendedor_endereco`, `vendedor_numero_endereco`, `vendedor_complemento`, `vendedor_bairro`, `vendedor_cidade`, `vendedor_estado`, `vendedor_ativo`, `vendedor_obs`, `vendedor_data_alteracao`) VALUES
(1, '09842573', '2020-01-28 01:24:17', 'Lucio Antonio de Souza', '687307000', '1452639874566', '', '+258 25 884 7006', 'vendedor@gmail.com', 'M8P05300', 'Rua das vendas', '45', '', 'Centro', 'Maputo', 'MP', 1, '', '2023-11-04 20:56:47'),
(2, '03841956', '2020-01-29 22:22:27', 'Sara Betina', '207179023', '2528742987893', '', '+258 25 887 5006', 'sara@gmail.com', 'M8P05401', 'Rua das vendas', '45', '', 'Centro', 'Joinville', 'SC', 0, '', '2023-10-22 15:29:55'),
(4, '78369140', '2023-10-22 17:36:30', 'Gabriel Tivane', '147896555', '2528742987897', '', '+258 25 888 4569', 'gabrieltivane@gmail.com', 'M8P05300', 'cmc', '1478', 'HIV/SIDA', 'albazine', 'Maputo', 'MP', 1, '', '2023-11-12 20:58:08'),
(5, '28751690', '2023-11-12 21:34:26', 'analisa', '845612378', '8478965123652', '', '+258 47 123 3655', 'ana@gmail.com', 'M8P05300', 'cmc', '1478', 'cancro de mama', 'albazine', 'Maputo', 'MP', 0, '', '2023-11-12 21:34:26');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`);

--
-- Limitadores para a tabela `ordem_tem_servicos`
--
ALTER TABLE `ordem_tem_servicos`
  ADD CONSTRAINT `fk_ordem_ts_id_ordem_servico` FOREIGN KEY (`ordem_ts_id_ordem_servico`) REFERENCES `ordens_servicos` (`ordem_servico_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_ordem_ts_id_servico` FOREIGN KEY (`ordem_ts_id_servico`) REFERENCES `servicos` (`servico_id`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda_produtos`
--
ALTER TABLE `venda_produtos`
  ADD CONSTRAINT `fk_venda_produtos_id_produto` FOREIGN KEY (`venda_produto_id_produto`) REFERENCES `produtos` (`produto_id`),
  ADD CONSTRAINT `fk_venda_produtos_id_venda` FOREIGN KEY (`venda_produto_id_venda`) REFERENCES `vendas` (`venda_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
