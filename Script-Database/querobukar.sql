-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2019 às 15:52
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `querobukar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `pri_nome` varchar(45) NOT NULL,
  `sec_nome` varchar(45) DEFAULT NULL,
  `ult_nome` varchar(45) NOT NULL,
  `sexo` enum('MASCULINO','FEMENINO') NOT NULL,
  `processo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) DEFAULT NULL,
  `tipo` enum('Livro','Forum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `forum` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(1, 'Informática'),
(2, 'Electronica e Telecomunicações'),
(3, 'Sistemas e Multimedia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `id` int(11) NOT NULL,
  `gosto` enum('GOSTEI','NÃO GOSTEI') DEFAULT NULL,
  `forum` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `usuario` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `pri_nome` varchar(45) NOT NULL,
  `sec_nome` varchar(45) DEFAULT NULL,
  `ult_nome` varchar(45) NOT NULL,
  `numero_agente` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `pri_nome`, `sec_nome`, `ult_nome`, `numero_agente`, `usuario`) VALUES
(1, 'Fernando', 'Pessoa', 'Neto', 12034, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura`
--

CREATE TABLE `leitura` (
  `id` int(11) NOT NULL,
  `data_lida` date NOT NULL,
  `hora_lida` time DEFAULT NULL,
  `processo_livro` varchar(45) NOT NULL,
  `data_devolvida` date DEFAULT NULL,
  `hora_devolvida` time DEFAULT NULL,
  `estado` enum('FRATURADO','BOM','ROUBADO','OCUPADO') DEFAULT NULL,
  `obs` text NOT NULL,
  `solicitacao` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `id` int(11) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `edicao` varchar(45) DEFAULT NULL,
  `lancamento` year(4) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `prefacio` text,
  `processo` varchar(45) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `editora` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  `foto` text,
  `isbn` varchar(150) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro_tem_autor`
--

CREATE TABLE `livro_tem_autor` (
  `livro_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco`
--

CREATE TABLE `preco` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `pri_nome` varchar(45) NOT NULL,
  `sec_nome` varchar(45) DEFAULT NULL,
  `ult_nome` varchar(45) NOT NULL,
  `sexo` enum('MASCULINO','FEMENINO') NOT NULL,
  `numero_agente` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id` int(11) NOT NULL,
  `data_solicitado` date NOT NULL,
  `chavesolicitacao` varchar(45) NOT NULL,
  `livro` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `estado` enum('PENDENTE','ATENDIDO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `solicitacaoexterna`
-- (See below for the actual view)
--
CREATE TABLE `solicitacaoexterna` (
`id` int(11)
,`idusuario` int(11)
,`idvisitante` int(11)
,`pri_nome` varchar(45)
,`ult_nome` varchar(45)
,`bilhete` varchar(70)
,`data_solicitado` date
,`chavesolicitacao` varchar(45)
,`quantidade` int(11)
,`estado` enum('PENDENTE','ATENDIDO')
,`idlivro` int(11)
,`livro` varchar(70)
,`idpreco` int(11)
,`precolivro` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `solicitacaointerna`
-- (See below for the actual view)
--
CREATE TABLE `solicitacaointerna` (
`id` int(11)
,`idusuario` int(11)
,`idaluno` int(11)
,`pri_nome` varchar(45)
,`ult_nome` varchar(45)
,`processo` int(11)
,`idcurso` int(11)
,`curso` varchar(45)
,`data_solicitado` date
,`chavesolicitacao` varchar(45)
,`quantidade` int(11)
,`estado` enum('PENDENTE','ATENDIDO')
,`idlivro` int(11)
,`livro` varchar(70)
,`idpreco` int(11)
,`precolivro` varchar(45)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `senha` varchar(70) NOT NULL,
  `estado` enum('ACTIVO','PENDENTE') DEFAULT NULL,
  `perfil` enum('ALUNO','FUNCIONARIO','VISITANTE','') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `estado`, `perfil`, `foto`) VALUES
(1, 'Root', 'e10adc3949ba59abbe56e057f20f883e', 'ACTIVO', 'FUNCIONARIO', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendido`
--

CREATE TABLE `vendido` (
  `id` int(11) NOT NULL,
  `data_vendido` date NOT NULL,
  `hora_vendido` time DEFAULT NULL,
  `quantidade_vendido` int(11) NOT NULL,
  `solicitacao` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vercomentario`
-- (See below for the actual view)
--
CREATE TABLE `vercomentario` (
`id` int(11)
,`descricao` varchar(1000)
,`data` timestamp
,`idforum` int(11)
,`idusuario` int(11)
,`processo` varchar(70)
,`pri_nome` varchar(45)
,`ult_nome` varchar(45)
,`foto` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `verforum`
-- (See below for the actual view)
--
CREATE TABLE `verforum` (
`id` int(11)
,`titulo` varchar(200)
,`descricao` text
,`data` timestamp
,`idcategoria` int(11)
,`idusuario` int(11)
,`processo` varchar(70)
,`pri_nome` varchar(45)
,`ult_nome` varchar(45)
,`foto` text
,`categoria` varchar(70)
,`fotoForum` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `verlivro`
-- (See below for the actual view)
--
CREATE TABLE `verlivro` (
`id` int(11)
,`titulo` varchar(70)
,`edicao` varchar(45)
,`ano` year(4)
,`quantidade` int(11)
,`prefacio` text
,`processo` varchar(45)
,`isbn` varchar(150)
,`foto` text
,`idcategoria` int(11)
,`categoria` varchar(70)
,`ideditora` int(11)
,`editora` varchar(45)
,`idpreco` int(11)
,`preco` varchar(45)
,`data` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewaluno`
-- (See below for the actual view)
--
CREATE TABLE `viewaluno` (
`id` int(11)
,`pri_nome` varchar(45)
,`ult_nome` varchar(45)
,`sexo` enum('MASCULINO','FEMENINO')
,`processo` int(11)
,`idusuario` int(11)
,`idcurso` int(11)
,`curso` varchar(45)
,`estado` enum('ACTIVO','PENDENTE')
,`perfil` enum('ALUNO','FUNCIONARIO','VISITANTE','')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewalunousuario`
-- (See below for the actual view)
--
CREATE TABLE `viewalunousuario` (
`id` int(11)
,`pri_nome` varchar(45)
,`ult_nome` varchar(45)
,`sexo` enum('MASCULINO','FEMENINO')
,`processo` int(11)
,`idusuario` int(11)
,`idcurso` int(11)
,`curso` varchar(45)
,`estado` enum('ACTIVO','PENDENTE')
,`perfil` enum('ALUNO','FUNCIONARIO','VISITANTE','')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewfuncionario`
-- (See below for the actual view)
--
CREATE TABLE `viewfuncionario` (
`id` int(11)
,`numero_agente` int(11)
,`pri_nome` varchar(45)
,`ult_nome` varchar(45)
,`idusuario` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewlivro`
-- (See below for the actual view)
--
CREATE TABLE `viewlivro` (
`id` int(11)
,`titulo` varchar(70)
,`edicao` varchar(45)
,`ano` year(4)
,`quantidade` int(11)
,`prefacio` text
,`processo` varchar(45)
,`isbn` varchar(150)
,`foto` text
,`idcategoria` int(11)
,`categoria` varchar(70)
,`ideditora` int(11)
,`editora` varchar(45)
,`idpreco` int(11)
,`preco` varchar(45)
,`idautor` int(11)
,`autor` varchar(70)
,`data` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewlivroleituraexterna`
-- (See below for the actual view)
--
CREATE TABLE `viewlivroleituraexterna` (
`id` int(11)
,`data_lida` date
,`hora_lida` time
,`data_devolvida` date
,`hora_devolvida` time
,`estado` enum('FRATURADO','BOM','ROUBADO','OCUPADO')
,`obs` text
,`idfuncionario` int(11)
,`numero_agente` int(11)
,`pri_nome_funcionario` varchar(45)
,`ult_nome_funcionario` varchar(45)
,`idsolicitacao` int(11)
,`livro` varchar(70)
,`idlivro` int(11)
,`pri_nome_visitante` varchar(45)
,`ult_nome_visitante` varchar(45)
,`bilhete_visitante` varchar(70)
,`quantidade_solicitada` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewlivroleiturainterna`
-- (See below for the actual view)
--
CREATE TABLE `viewlivroleiturainterna` (
`id` int(11)
,`data_lida` date
,`hora_lida` time
,`data_devolvida` date
,`hora_devolvida` time
,`estado` enum('FRATURADO','BOM','ROUBADO','OCUPADO')
,`obs` text
,`idfuncionario` int(11)
,`numero_agente` int(11)
,`pri_nome_funcionario` varchar(45)
,`ult_nome_funcionario` varchar(45)
,`idsolicitacao` int(11)
,`livro` varchar(70)
,`idlivro` int(11)
,`pri_nome_aluno` varchar(45)
,`ult_nome_aluno` varchar(45)
,`processo_aluno` int(11)
,`curso` varchar(45)
,`quantidade_solicitada` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewlivrovendidoexterno`
-- (See below for the actual view)
--
CREATE TABLE `viewlivrovendidoexterno` (
`id` int(11)
,`data_vendido` date
,`hora_vendido` time
,`quantidade_vendido` int(11)
,`idsolicitacao` int(11)
,`idfuncionario` int(11)
,`numero_agente` int(11)
,`pri_nome_funcionario` varchar(45)
,`ult_nome_funcionario` varchar(45)
,`pri_nome_visitante` varchar(45)
,`ult_nome_visitante` varchar(45)
,`bilhete_visitante` varchar(70)
,`livro` varchar(70)
,`idlivro` int(11)
,`preco_livro` varchar(45)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewlivrovendidointerno`
-- (See below for the actual view)
--
CREATE TABLE `viewlivrovendidointerno` (
`id` int(11)
,`data_vendido` date
,`hora_vendido` time
,`quantidade_vendido` int(11)
,`idsolicitacao` int(11)
,`idfuncionario` int(11)
,`numero_agente` int(11)
,`pri_nome_funcionario` varchar(45)
,`ult_nome_funcionario` varchar(45)
,`pri_nome_aluno` varchar(45)
,`ult_nome_aluno` varchar(45)
,`processo_aluno` int(11)
,`curso` varchar(45)
,`livro` varchar(70)
,`idlivro` int(11)
,`preco_livro` varchar(45)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

CREATE TABLE `visitante` (
  `id` int(11) NOT NULL,
  `pri_nome` varchar(45) NOT NULL,
  `sec_nome` varchar(45) DEFAULT NULL,
  `ult_nome` varchar(45) NOT NULL,
  `bilhete` varchar(70) DEFAULT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `solicitacaoexterna`
--
DROP TABLE IF EXISTS `solicitacaoexterna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `solicitacaoexterna`  AS  select `solicitacao`.`id` AS `id`,`usuario`.`id` AS `idusuario`,`visitante`.`id` AS `idvisitante`,`visitante`.`pri_nome` AS `pri_nome`,`visitante`.`ult_nome` AS `ult_nome`,`visitante`.`bilhete` AS `bilhete`,`solicitacao`.`data_solicitado` AS `data_solicitado`,`solicitacao`.`chavesolicitacao` AS `chavesolicitacao`,`solicitacao`.`quantidade` AS `quantidade`,`solicitacao`.`estado` AS `estado`,`livro`.`id` AS `idlivro`,`livro`.`titulo` AS `livro`,`livro`.`preco` AS `idpreco`,`preco`.`nome` AS `precolivro` from ((((`usuario` join `visitante` on((`usuario`.`id` = `visitante`.`usuario`))) join `solicitacao` on((`solicitacao`.`usuario` = `usuario`.`id`))) join `livro` on((`livro`.`id` = `solicitacao`.`livro`))) join `preco` on((`preco`.`id` = `livro`.`preco`))) ;

-- --------------------------------------------------------

--
-- Structure for view `solicitacaointerna`
--
DROP TABLE IF EXISTS `solicitacaointerna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `solicitacaointerna`  AS  select `solicitacao`.`id` AS `id`,`usuario`.`id` AS `idusuario`,`aluno`.`id` AS `idaluno`,`aluno`.`pri_nome` AS `pri_nome`,`aluno`.`ult_nome` AS `ult_nome`,`aluno`.`processo` AS `processo`,`curso`.`id` AS `idcurso`,`curso`.`nome` AS `curso`,`solicitacao`.`data_solicitado` AS `data_solicitado`,`solicitacao`.`chavesolicitacao` AS `chavesolicitacao`,`solicitacao`.`quantidade` AS `quantidade`,`solicitacao`.`estado` AS `estado`,`livro`.`id` AS `idlivro`,`livro`.`titulo` AS `livro`,`livro`.`preco` AS `idpreco`,`preco`.`nome` AS `precolivro` from (((((`usuario` join `aluno` on((`usuario`.`id` = `aluno`.`usuario`))) join `solicitacao` on((`solicitacao`.`usuario` = `usuario`.`id`))) join `livro` on((`livro`.`id` = `solicitacao`.`livro`))) join `curso` on((`curso`.`id` = `aluno`.`curso`))) join `preco` on((`preco`.`id` = `livro`.`preco`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vercomentario`
--
DROP TABLE IF EXISTS `vercomentario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vercomentario`  AS  select `comentario`.`id` AS `id`,`comentario`.`descricao` AS `descricao`,`comentario`.`data` AS `data`,`comentario`.`forum` AS `idforum`,`comentario`.`usuario` AS `idusuario`,`usuario`.`nome` AS `processo`,`aluno`.`pri_nome` AS `pri_nome`,`aluno`.`ult_nome` AS `ult_nome`,`usuario`.`foto` AS `foto` from ((`comentario` join `usuario` on((`usuario`.`id` = `comentario`.`usuario`))) join `aluno` on((`aluno`.`usuario` = `usuario`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `verforum`
--
DROP TABLE IF EXISTS `verforum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `verforum`  AS  select `forum`.`id` AS `id`,`forum`.`titulo` AS `titulo`,`forum`.`descricao` AS `descricao`,`forum`.`data` AS `data`,`forum`.`categoria` AS `idcategoria`,`forum`.`usuario` AS `idusuario`,`usuario`.`nome` AS `processo`,`aluno`.`pri_nome` AS `pri_nome`,`aluno`.`ult_nome` AS `ult_nome`,`usuario`.`foto` AS `foto`,`categoria`.`nome` AS `categoria`,`forum`.`foto` AS `fotoForum` from (((`forum` join `usuario` on((`usuario`.`id` = `forum`.`usuario`))) join `aluno` on((`aluno`.`usuario` = `usuario`.`id`))) join `categoria` on((`categoria`.`id` = `forum`.`categoria`))) order by `forum`.`data` desc ;

-- --------------------------------------------------------

--
-- Structure for view `verlivro`
--
DROP TABLE IF EXISTS `verlivro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `verlivro`  AS  select `livro`.`id` AS `id`,`livro`.`titulo` AS `titulo`,`livro`.`edicao` AS `edicao`,`livro`.`lancamento` AS `ano`,`livro`.`quantidade` AS `quantidade`,`livro`.`prefacio` AS `prefacio`,`livro`.`processo` AS `processo`,`livro`.`isbn` AS `isbn`,`livro`.`foto` AS `foto`,`livro`.`categoria` AS `idcategoria`,`categoria`.`nome` AS `categoria`,`livro`.`editora` AS `ideditora`,`editora`.`nome` AS `editora`,`livro`.`preco` AS `idpreco`,`preco`.`nome` AS `preco`,`livro`.`data` AS `data` from (((`livro` join `categoria` on((`categoria`.`id` = `livro`.`categoria`))) join `editora` on((`editora`.`id` = `livro`.`editora`))) join `preco` on((`preco`.`id` = `livro`.`preco`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viewaluno`
--
DROP TABLE IF EXISTS `viewaluno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewaluno`  AS  select `aluno`.`id` AS `id`,`aluno`.`pri_nome` AS `pri_nome`,`aluno`.`ult_nome` AS `ult_nome`,`aluno`.`sexo` AS `sexo`,`aluno`.`processo` AS `processo`,`aluno`.`usuario` AS `idusuario`,`aluno`.`curso` AS `idcurso`,`curso`.`nome` AS `curso`,`usuario`.`estado` AS `estado`,`usuario`.`perfil` AS `perfil` from ((`aluno` join `curso` on((`curso`.`id` = `aluno`.`curso`))) join `usuario` on((`usuario`.`id` = `aluno`.`usuario`))) order by `aluno`.`pri_nome` ;

-- --------------------------------------------------------

--
-- Structure for view `viewalunousuario`
--
DROP TABLE IF EXISTS `viewalunousuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewalunousuario`  AS  select `aluno`.`id` AS `id`,`aluno`.`pri_nome` AS `pri_nome`,`aluno`.`ult_nome` AS `ult_nome`,`aluno`.`sexo` AS `sexo`,`aluno`.`processo` AS `processo`,`aluno`.`usuario` AS `idusuario`,`aluno`.`curso` AS `idcurso`,`curso`.`nome` AS `curso`,`usuario`.`estado` AS `estado`,`usuario`.`perfil` AS `perfil` from ((`aluno` join `curso` on((`curso`.`id` = `aluno`.`curso`))) join `usuario` on((`usuario`.`id` = `aluno`.`usuario`))) order by `aluno`.`pri_nome` ;

-- --------------------------------------------------------

--
-- Structure for view `viewfuncionario`
--
DROP TABLE IF EXISTS `viewfuncionario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewfuncionario`  AS  select `funcionario`.`id` AS `id`,`funcionario`.`numero_agente` AS `numero_agente`,`funcionario`.`pri_nome` AS `pri_nome`,`funcionario`.`ult_nome` AS `ult_nome`,`funcionario`.`usuario` AS `idusuario` from (`funcionario` join `usuario` on((`usuario`.`id` = `funcionario`.`usuario`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viewlivro`
--
DROP TABLE IF EXISTS `viewlivro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewlivro`  AS  select `livro`.`id` AS `id`,`livro`.`titulo` AS `titulo`,`livro`.`edicao` AS `edicao`,`livro`.`lancamento` AS `ano`,`livro`.`quantidade` AS `quantidade`,`livro`.`prefacio` AS `prefacio`,`livro`.`processo` AS `processo`,`livro`.`isbn` AS `isbn`,`livro`.`foto` AS `foto`,`livro`.`categoria` AS `idcategoria`,`categoria`.`nome` AS `categoria`,`livro`.`editora` AS `ideditora`,`editora`.`nome` AS `editora`,`livro`.`preco` AS `idpreco`,`preco`.`nome` AS `preco`,`autor`.`id` AS `idautor`,`autor`.`nome` AS `autor`,`livro`.`data` AS `data` from (((((`livro` join `categoria` on((`categoria`.`id` = `livro`.`categoria`))) join `editora` on((`editora`.`id` = `livro`.`editora`))) join `preco` on((`preco`.`id` = `livro`.`preco`))) join `livro_tem_autor` on((`livro_tem_autor`.`livro_id` = `livro`.`id`))) join `autor` on((`livro_tem_autor`.`autor_id` = `autor`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viewlivroleituraexterna`
--
DROP TABLE IF EXISTS `viewlivroleituraexterna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewlivroleituraexterna`  AS  select `leitura`.`id` AS `id`,`leitura`.`data_lida` AS `data_lida`,`leitura`.`hora_lida` AS `hora_lida`,`leitura`.`data_devolvida` AS `data_devolvida`,`leitura`.`hora_devolvida` AS `hora_devolvida`,`leitura`.`estado` AS `estado`,`leitura`.`obs` AS `obs`,`leitura`.`funcionario` AS `idfuncionario`,`funcionario`.`numero_agente` AS `numero_agente`,`funcionario`.`pri_nome` AS `pri_nome_funcionario`,`funcionario`.`ult_nome` AS `ult_nome_funcionario`,`leitura`.`solicitacao` AS `idsolicitacao`,`solicitacaoexterna`.`livro` AS `livro`,`solicitacaoexterna`.`idlivro` AS `idlivro`,`solicitacaoexterna`.`pri_nome` AS `pri_nome_visitante`,`solicitacaoexterna`.`ult_nome` AS `ult_nome_visitante`,`solicitacaoexterna`.`bilhete` AS `bilhete_visitante`,`solicitacaoexterna`.`quantidade` AS `quantidade_solicitada` from ((`leitura` join `solicitacaoexterna` on((`solicitacaoexterna`.`id` = `leitura`.`solicitacao`))) join `funcionario` on((`funcionario`.`id` = `leitura`.`funcionario`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viewlivroleiturainterna`
--
DROP TABLE IF EXISTS `viewlivroleiturainterna`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewlivroleiturainterna`  AS  select `leitura`.`id` AS `id`,`leitura`.`data_lida` AS `data_lida`,`leitura`.`hora_lida` AS `hora_lida`,`leitura`.`data_devolvida` AS `data_devolvida`,`leitura`.`hora_devolvida` AS `hora_devolvida`,`leitura`.`estado` AS `estado`,`leitura`.`obs` AS `obs`,`leitura`.`funcionario` AS `idfuncionario`,`funcionario`.`numero_agente` AS `numero_agente`,`funcionario`.`pri_nome` AS `pri_nome_funcionario`,`funcionario`.`ult_nome` AS `ult_nome_funcionario`,`leitura`.`solicitacao` AS `idsolicitacao`,`solicitacaointerna`.`livro` AS `livro`,`solicitacaointerna`.`idlivro` AS `idlivro`,`solicitacaointerna`.`pri_nome` AS `pri_nome_aluno`,`solicitacaointerna`.`ult_nome` AS `ult_nome_aluno`,`solicitacaointerna`.`processo` AS `processo_aluno`,`solicitacaointerna`.`curso` AS `curso`,`solicitacaointerna`.`quantidade` AS `quantidade_solicitada` from ((`leitura` join `solicitacaointerna` on((`solicitacaointerna`.`id` = `leitura`.`solicitacao`))) join `funcionario` on((`funcionario`.`id` = `leitura`.`funcionario`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viewlivrovendidoexterno`
--
DROP TABLE IF EXISTS `viewlivrovendidoexterno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewlivrovendidoexterno`  AS  select `vendido`.`id` AS `id`,`vendido`.`data_vendido` AS `data_vendido`,`vendido`.`hora_vendido` AS `hora_vendido`,`vendido`.`quantidade_vendido` AS `quantidade_vendido`,`vendido`.`solicitacao` AS `idsolicitacao`,`vendido`.`funcionario` AS `idfuncionario`,`funcionario`.`numero_agente` AS `numero_agente`,`funcionario`.`pri_nome` AS `pri_nome_funcionario`,`funcionario`.`ult_nome` AS `ult_nome_funcionario`,`solicitacaoexterna`.`pri_nome` AS `pri_nome_visitante`,`solicitacaoexterna`.`ult_nome` AS `ult_nome_visitante`,`solicitacaoexterna`.`bilhete` AS `bilhete_visitante`,`solicitacaoexterna`.`livro` AS `livro`,`solicitacaoexterna`.`idlivro` AS `idlivro`,`preco`.`nome` AS `preco_livro` from (((`vendido` join `solicitacaoexterna` on((`vendido`.`solicitacao` = `solicitacaoexterna`.`id`))) join `preco` on((`preco`.`id` = `solicitacaoexterna`.`idpreco`))) join `funcionario` on((`funcionario`.`id` = `vendido`.`funcionario`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viewlivrovendidointerno`
--
DROP TABLE IF EXISTS `viewlivrovendidointerno`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewlivrovendidointerno`  AS  select `vendido`.`id` AS `id`,`vendido`.`data_vendido` AS `data_vendido`,`vendido`.`hora_vendido` AS `hora_vendido`,`vendido`.`quantidade_vendido` AS `quantidade_vendido`,`vendido`.`solicitacao` AS `idsolicitacao`,`vendido`.`funcionario` AS `idfuncionario`,`funcionario`.`numero_agente` AS `numero_agente`,`funcionario`.`pri_nome` AS `pri_nome_funcionario`,`funcionario`.`ult_nome` AS `ult_nome_funcionario`,`solicitacaointerna`.`pri_nome` AS `pri_nome_aluno`,`solicitacaointerna`.`ult_nome` AS `ult_nome_aluno`,`solicitacaointerna`.`processo` AS `processo_aluno`,`solicitacaointerna`.`curso` AS `curso`,`solicitacaointerna`.`livro` AS `livro`,`solicitacaointerna`.`idlivro` AS `idlivro`,`preco`.`nome` AS `preco_livro` from (((`vendido` join `solicitacaointerna` on((`vendido`.`solicitacao` = `solicitacaointerna`.`id`))) join `preco` on((`preco`.`id` = `solicitacaointerna`.`idpreco`))) join `funcionario` on((`funcionario`.`id` = `vendido`.`funcionario`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `processo_UNIQUE` (`processo`),
  ADD KEY `fk_aluno_usuario1_idx` (`usuario`),
  ADD KEY `fk_aluno_curso1_idx` (`curso`);

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comentario_forum1_idx` (`forum`),
  ADD KEY `fk_comentario_usuario1_idx` (`usuario`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curtida`
--
ALTER TABLE `curtida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curtida_forum1_idx` (`forum`),
  ADD KEY `fk_curtida_usuario1_idx` (`usuario`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_forum_usuario1_idx` (`usuario`),
  ADD KEY `fk_forum_categoria1_idx` (`categoria`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `leitura`
--
ALTER TABLE `leitura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_leitura_solicitacao1_idx` (`solicitacao`),
  ADD KEY `fk_leitura_funcionario1_idx` (`funcionario`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_livro_categoria1_idx` (`categoria`),
  ADD KEY `fk_livro_editora1_idx` (`editora`),
  ADD KEY `fk_livro_preco1_idx` (`preco`);

--
-- Indexes for table `livro_tem_autor`
--
ALTER TABLE `livro_tem_autor`
  ADD PRIMARY KEY (`livro_id`,`autor_id`),
  ADD KEY `fk_livro_has_autor_autor1_idx` (`autor_id`),
  ADD KEY `fk_livro_has_autor_livro1_idx` (`livro_id`);

--
-- Indexes for table `preco`
--
ALTER TABLE `preco`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `processo_UNIQUE` (`numero_agente`),
  ADD KEY `fk_professor_usuario1_idx` (`usuario`),
  ADD KEY `fk_professor_disciplina1_idx` (`disciplina`);

--
-- Indexes for table `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solicitacao_livro1_idx` (`livro`),
  ADD KEY `fk_solicitacao_usuario1_idx` (`usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`nome`);

--
-- Indexes for table `vendido`
--
ALTER TABLE `vendido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendido_solicitacao1_idx` (`solicitacao`),
  ADD KEY `fk_vendido_funcionario1_idx` (`funcionario`);

--
-- Indexes for table `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `curtida`
--
ALTER TABLE `curtida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `editora`
--
ALTER TABLE `editora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leitura`
--
ALTER TABLE `leitura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preco`
--
ALTER TABLE `preco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `vendido`
--
ALTER TABLE `vendido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitante`
--
ALTER TABLE `visitante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_curso1` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aluno_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_forum1` FOREIGN KEY (`forum`) REFERENCES `forum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `curtida`
--
ALTER TABLE `curtida`
  ADD CONSTRAINT `fk_curtida_forum1` FOREIGN KEY (`forum`) REFERENCES `forum` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curtida_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `fk_forum_categoria1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_forum_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `leitura`
--
ALTER TABLE `leitura`
  ADD CONSTRAINT `fk_leitura_funcionario1` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_leitura_solicitacao1` FOREIGN KEY (`solicitacao`) REFERENCES `solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_livro_categoria1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livro_editora1` FOREIGN KEY (`editora`) REFERENCES `editora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livro_preco1` FOREIGN KEY (`preco`) REFERENCES `preco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `livro_tem_autor`
--
ALTER TABLE `livro_tem_autor`
  ADD CONSTRAINT `fk_livro_has_autor_autor1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livro_has_autor_livro1` FOREIGN KEY (`livro_id`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_disciplina1` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professor_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD CONSTRAINT `fk_solicitacao_livro1` FOREIGN KEY (`livro`) REFERENCES `livro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitacao_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vendido`
--
ALTER TABLE `vendido`
  ADD CONSTRAINT `fk_vendido_funcionario1` FOREIGN KEY (`funcionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendido_solicitacao1` FOREIGN KEY (`solicitacao`) REFERENCES `solicitacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `visitante`
--
ALTER TABLE `visitante`
  ADD CONSTRAINT `visitante_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
