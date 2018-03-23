-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Mar-2018 às 22:35
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
  `APTO_ID` int(10) UNSIGNED NOT NULL,
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
(80, 404, 5),
(81, 101, 6),
(82, 102, 6),
(83, 201, 6),
(84, 202, 6),
(85, 301, 6),
(86, 302, 6),
(87, 101, 7),
(88, 102, 7),
(89, 201, 7),
(90, 202, 7),
(91, 301, 7),
(92, 302, 7),
(93, 101, 8),
(94, 102, 8),
(95, 201, 8),
(96, 202, 8),
(97, 301, 8),
(98, 302, 8),
(99, 101, 9),
(100, 102, 9),
(101, 201, 9),
(102, 202, 9),
(103, 301, 9),
(104, 302, 9),
(105, 401, 9),
(106, 402, 9),
(107, 101, 10),
(108, 102, 10),
(109, 201, 10),
(110, 202, 10),
(111, 301, 10),
(112, 302, 10),
(113, 401, 10),
(114, 402, 10),
(115, 101, 11),
(116, 102, 11),
(117, 201, 11),
(118, 202, 11),
(119, 301, 11),
(120, 302, 11),
(121, 401, 11),
(122, 402, 11),
(123, 101, 12),
(124, 102, 12),
(125, 201, 12),
(126, 202, 12),
(127, 301, 12),
(128, 302, 12),
(129, 401, 12),
(130, 402, 12),
(131, 101, 13),
(132, 102, 13),
(133, 201, 13),
(134, 202, 13),
(135, 301, 13),
(136, 302, 13),
(137, 401, 13),
(138, 402, 13);

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
(4, 'Barulho'),
(5, 'Conversa após 22 horas'),
(8, 'Tec Web Ed');

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
(5, 'E', 4, 4, 26245509000198),
(6, 'A', 3, 2, 12345678000198),
(7, 'B', 3, 2, 12345678000198),
(8, 'C', 3, 2, 12345678000198),
(9, 'A', 4, 2, 12345678000199),
(10, 'B', 4, 2, 12345678000199),
(11, 'C', 4, 2, 12345678000199),
(12, 'D', 4, 2, 12345678000199),
(13, 'E', 4, 2, 12345678000199);

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
(12345678000198, 'Tec Web Edit', 3, 30130900, 'Avenida Afonso Pena', '12500', 'Centro', 'Belo Horizonte', 'MG'),
(12345678000199, 'Tec Web teste', 5, 31980110, 'Rua Walter Ianni', '120', 'São Gabriel', 'Belo Horizonte', 'MG'),
(26245509000198, 'Residencial Trabalho Integrado', 5, 31370254, 'Avenida Otacílio Negrão de Lima', '50', 'Garças', 'Belo Horizonte', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominos`
--

CREATE TABLE `condominos` (
  `CONDOMINO_CPF` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `CONDOMINO_NOME` varchar(255) NOT NULL,
  `CONDOMINO_EMAIL` varchar(191) NOT NULL,
  `CONDOMINO_SINDICO` tinyint(1) NOT NULL,
  `CONDOMINO_FK_USER` int(10) UNSIGNED DEFAULT NULL,
  `CONDOMINO_FK_APARTAMENTO` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `condominos`
--

INSERT INTO `condominos` (`CONDOMINO_CPF`, `CONDOMINO_NOME`, `CONDOMINO_EMAIL`, `CONDOMINO_SINDICO`, `CONDOMINO_FK_USER`, `CONDOMINO_FK_APARTAMENTO`) VALUES
(12345678909, 'Edson L F Santos', 'jesusfreakedson@gmail.com', 1, 1, 1);

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
(3, 1, '2018-04-05', '20:30:00', NULL, 1, NULL, 26245509000198),
(5, 2, '2018-04-06', '20:15:00', NULL, 1, NULL, 26245509000198),
(6, 4, '2018-04-05', '20:30:00', NULL, 1, NULL, 26245509000198),
(7, 2, '2018-04-19', '20:20:00', NULL, 1, NULL, 26245509000198);

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
(1, 'Edson L F Santos', 'jesusfreakedson@gmail.com', '$2y$10$J6JhkKtDrmUbkKO9cjXpmO70q9vH3Z0AdClHuSvgq47996a7UUL9K', '4gPIGJdQB1D79AYv1EDg0legLwxcZKunr7nwTffAaJ7Gde2FOStJRwtC7cga', '2018-03-12 20:44:35', '2018-03-12 20:44:35'),
(2, 'Teste', 'teste@teste.com', '$2y$10$TiIDGjXpRThw30iTGFX1Jur.nit2L5msSzEzuAe3gcgUpJDhtCnJC', 'CQ8EZtXKyRQKC8YNJcFQtxLYo1fa66xHwt24c4icFz7o5chdRdCBhyL0XDRx', '2018-03-24 00:35:03', '2018-03-24 00:35:03');

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
  ADD UNIQUE KEY `CONDOMINO_EMAIL` (`CONDOMINO_EMAIL`),
  ADD KEY `FK_USER` (`CONDOMINO_FK_USER`),
  ADD KEY `FK_APARTAMENTO` (`CONDOMINO_FK_APARTAMENTO`);

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
  MODIFY `APTO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `assunto_reunioes`
--
ALTER TABLE `assunto_reunioes`
  MODIFY `ASSUNTO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blocos`
--
ALTER TABLE `blocos`
  MODIFY `BLOCO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reunioes`
--
ALTER TABLE `reunioes`
  MODIFY `REUNIAO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Limitadores para a tabela `condominos`
--
ALTER TABLE `condominos`
  ADD CONSTRAINT `FK_APARTAMENTO` FOREIGN KEY (`CONDOMINO_FK_APARTAMENTO`) REFERENCES `apartamentos` (`APTO_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER` FOREIGN KEY (`CONDOMINO_FK_USER`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
