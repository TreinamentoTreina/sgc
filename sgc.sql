-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Mar-2018 às 18:57
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apartamentos`
--

CREATE TABLE `apartamentos` (
  `APTO_ID` int(11) NOT NULL,
  `APTO_NUMERO` int(4) UNSIGNED NOT NULL,
  `APTO_FK_BLOCO` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `apartamentos`
--

INSERT INTO `apartamentos` (`APTO_ID`, `APTO_NUMERO`, `APTO_FK_BLOCO`) VALUES
(1, 101, 1),
(2, 102, 1),
(3, 103, 1),
(4, 104, 1),
(5, 201, 1),
(6, 202, 1),
(7, 203, 1),
(8, 204, 1),
(9, 301, 1),
(10, 302, 1),
(11, 303, 1),
(12, 304, 1),
(13, 401, 1),
(14, 402, 1),
(15, 403, 1),
(16, 404, 1),
(17, 101, 2),
(18, 102, 2),
(19, 103, 2),
(20, 104, 2),
(21, 201, 2),
(22, 202, 2),
(23, 203, 2),
(24, 204, 2),
(25, 301, 2),
(26, 302, 2),
(27, 303, 2),
(28, 304, 2),
(29, 401, 2),
(30, 402, 2),
(31, 403, 2),
(32, 404, 2),
(33, 101, 3),
(34, 102, 3),
(35, 103, 3),
(36, 104, 3),
(37, 201, 3),
(38, 202, 3),
(39, 203, 3),
(40, 204, 3),
(41, 301, 3),
(42, 302, 3),
(43, 303, 3),
(44, 304, 3),
(45, 401, 3),
(46, 402, 3),
(47, 403, 3),
(48, 404, 3),
(49, 101, 4),
(50, 102, 4),
(51, 103, 4),
(52, 104, 4),
(53, 201, 4),
(54, 202, 4),
(55, 203, 4),
(56, 204, 4),
(57, 301, 4),
(58, 302, 4),
(59, 303, 4),
(60, 304, 4),
(61, 401, 4),
(62, 402, 4),
(63, 403, 4),
(64, 404, 4),
(65, 101, 5),
(66, 102, 5),
(67, 103, 5),
(68, 104, 5),
(69, 201, 5),
(70, 202, 5),
(71, 203, 5),
(72, 204, 5),
(73, 301, 5),
(74, 302, 5),
(75, 303, 5),
(76, 304, 5),
(77, 401, 5),
(78, 402, 5),
(79, 403, 5),
(80, 404, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto_reunioes`
--

CREATE TABLE `assunto_reunioes` (
  `ASSUNTO_ID` int(10) UNSIGNED NOT NULL,
  `ASSUNTO_DESCRICAO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `assunto_reunioes`
--

INSERT INTO `assunto_reunioes` (`ASSUNTO_ID`, `ASSUNTO_DESCRICAO`) VALUES
(1, 'Segurança'),
(2, 'Gás Encanado'),
(4, 'Barulho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `blocos`
--

CREATE TABLE `blocos` (
  `BLOCO_ID` int(10) UNSIGNED NOT NULL,
  `BLOCO_NOME` varchar(2) NOT NULL,
  `BLOCO_QTDADE_ANDARES` int(2) NOT NULL,
  `BLOCO_QTDADE_APTO_POR_ANDAR` int(1) UNSIGNED NOT NULL,
  `BLOCO_FK_CONDOMINIO` bigint(14) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `blocos`
--

INSERT INTO `blocos` (`BLOCO_ID`, `BLOCO_NOME`, `BLOCO_QTDADE_ANDARES`, `BLOCO_QTDADE_APTO_POR_ANDAR`, `BLOCO_FK_CONDOMINIO`) VALUES
(1, 'A', 4, 4, 26245509000198),
(2, 'B', 4, 4, 26245509000198),
(3, 'C', 4, 4, 26245509000198),
(4, 'D', 4, 4, 26245509000198),
(5, 'E', 4, 4, 26245509000198);

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominios`
--

CREATE TABLE `condominios` (
  `CONDOMINIO_CNPJ` bigint(14) UNSIGNED ZEROFILL NOT NULL,
  `CONDOMINIO_NOME` varchar(255) NOT NULL,
  `CONDOMINIO_QTDADE_BLOCO` int(2) UNSIGNED NOT NULL,
  `CONDOMINIO_CEP` int(8) NOT NULL,
  `CONDOMINIO_ENDERECO` varchar(255) NOT NULL,
  `CONDOMINIO_NUMERO` varchar(6) NOT NULL,
  `CONDOMINIO_BAIRRO` varchar(255) NOT NULL,
  `CONDOMINIO_CIDADE` varchar(255) NOT NULL,
  `CONDOMINIO_ESTADO` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `condominios`
--

INSERT INTO `condominios` (`CONDOMINIO_CNPJ`, `CONDOMINIO_NOME`, `CONDOMINIO_QTDADE_BLOCO`, `CONDOMINIO_CEP`, `CONDOMINIO_ENDERECO`, `CONDOMINIO_NUMERO`, `CONDOMINIO_BAIRRO`, `CONDOMINIO_CIDADE`, `CONDOMINIO_ESTADO`) VALUES
(26245509000198, 'Residencial Trabalho Integrado', 5, 31370254, 'Avenida Otacílio Negrão de Lima', '50', 'Garças', 'Belo Horizonte', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominos`
--

CREATE TABLE `condominos` (
  `CONDOMINO_CPF` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `CONDOMINO_NOME` varchar(255) NOT NULL,
  `CONDOMINO_EMAIL` varchar(191) NOT NULL,
  `CONDOMINO_SINDICO` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jesusfreakedson@gmail.com', '$2y$10$YhKCG8q7RrPztsJh2U7z6.vZK/dJV542qmS/HU5iv8ZHs3Nv6t7e6', '2018-03-21 17:54:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reunioes`
--

CREATE TABLE `reunioes` (
  `REUNIAO_ID` int(10) UNSIGNED NOT NULL,
  `REUNIAO_ASSUNTO` int(10) UNSIGNED NOT NULL,
  `REUNIAO_DATA` date NOT NULL,
  `REUNIAO_HORA` time NOT NULL,
  `REUNIAO_OBSERVACAO` varchar(255) DEFAULT NULL,
  `REUNIAO_STATUS` int(1) NOT NULL DEFAULT '1',
  `REUNIAO_ATA` text,
  `REUNIAO_FK_CONDOMINIO` bigint(14) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reunioes`
--

INSERT INTO `reunioes` (`REUNIAO_ID`, `REUNIAO_ASSUNTO`, `REUNIAO_DATA`, `REUNIAO_HORA`, `REUNIAO_OBSERVACAO`, `REUNIAO_STATUS`, `REUNIAO_ATA`, `REUNIAO_FK_CONDOMINIO`) VALUES
(1, 1, '2018-03-30', '16:30:00', NULL, 1, NULL, 26245509000198),
(2, 1, '2018-03-29', '16:30:00', NULL, 1, NULL, 26245509000198);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE `telefones` (
  `TELEFONE_NUMERO` varchar(11) NOT NULL,
  `TELEFONE_FK_CONDOMINO` bigint(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edson L F Santos', 'jesusfreakedson@gmail.com', '$2y$10$J6JhkKtDrmUbkKO9cjXpmO70q9vH3Z0AdClHuSvgq47996a7UUL9K', 'OIW6KYIGNaJkTj2poYPCJsEc08kcJrqieFC2poyUA7KMEb9Tu4zqTlAGY3ia', '2018-03-12 20:44:35', '2018-03-12 20:44:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD PRIMARY KEY (`APTO_ID`),
  ADD KEY `FK_BLOCO` (`APTO_FK_BLOCO`);

--
-- Indexes for table `assunto_reunioes`
--
ALTER TABLE `assunto_reunioes`
  ADD PRIMARY KEY (`ASSUNTO_ID`);

--
-- Indexes for table `blocos`
--
ALTER TABLE `blocos`
  ADD PRIMARY KEY (`BLOCO_ID`),
  ADD KEY `FK_CONDOMINIO` (`BLOCO_FK_CONDOMINIO`);

--
-- Indexes for table `condominios`
--
ALTER TABLE `condominios`
  ADD PRIMARY KEY (`CONDOMINIO_CNPJ`);

--
-- Indexes for table `condominos`
--
ALTER TABLE `condominos`
  ADD PRIMARY KEY (`CONDOMINO_CPF`),
  ADD UNIQUE KEY `CONDOMINO_EMAIL` (`CONDOMINO_EMAIL`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reunioes`
--
ALTER TABLE `reunioes`
  ADD PRIMARY KEY (`REUNIAO_ID`),
  ADD KEY `FK_ASSUNTO` (`REUNIAO_ASSUNTO`);

--
-- Indexes for table `telefones`
--
ALTER TABLE `telefones`
  ADD KEY `FK_CONDOMINO` (`TELEFONE_FK_CONDOMINO`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartamentos`
--
ALTER TABLE `apartamentos`
  MODIFY `APTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `assunto_reunioes`
--
ALTER TABLE `assunto_reunioes`
  MODIFY `ASSUNTO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blocos`
--
ALTER TABLE `blocos`
  MODIFY `BLOCO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reunioes`
--
ALTER TABLE `reunioes`
  MODIFY `REUNIAO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `apartamentos`
--
ALTER TABLE `apartamentos`
  ADD CONSTRAINT `FK_BLOCO` FOREIGN KEY (`APTO_FK_BLOCO`) REFERENCES `blocos` (`BLOCO_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `blocos`
--
ALTER TABLE `blocos`
  ADD CONSTRAINT `FK_CONDOMINIO` FOREIGN KEY (`BLOCO_FK_CONDOMINIO`) REFERENCES `condominios` (`CONDOMINIO_CNPJ`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `reunioes`
--
ALTER TABLE `reunioes`
  ADD CONSTRAINT `FK_ASSUNTO` FOREIGN KEY (`REUNIAO_ASSUNTO`) REFERENCES `assunto_reunioes` (`ASSUNTO_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `FK_CONDOMINO` FOREIGN KEY (`TELEFONE_FK_CONDOMINO`) REFERENCES `condominos` (`CONDOMINO_CPF`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
