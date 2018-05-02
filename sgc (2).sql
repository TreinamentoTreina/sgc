-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Maio-2018 às 22:14
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
(113, 101, 10),
(114, 102, 10),
(115, 201, 10),
(116, 202, 10),
(117, 301, 10),
(118, 302, 10),
(119, 401, 10),
(120, 402, 10),
(121, 101, 11),
(122, 102, 11),
(123, 201, 11),
(124, 202, 11),
(125, 301, 11),
(126, 302, 11),
(127, 401, 11),
(128, 402, 11),
(129, 101, 12),
(130, 102, 12),
(131, 201, 12),
(132, 202, 12),
(133, 301, 12),
(134, 302, 12),
(135, 401, 12),
(136, 402, 12),
(137, 101, 13),
(138, 102, 13),
(139, 201, 13),
(140, 202, 13),
(141, 301, 13),
(142, 302, 13),
(143, 401, 13),
(144, 402, 13),
(145, 101, 14),
(146, 102, 14),
(147, 201, 14),
(148, 202, 14),
(149, 301, 14),
(150, 302, 14),
(151, 401, 14),
(152, 402, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `areas_comuns`
--

CREATE TABLE `areas_comuns` (
  `AREA_COMUM_ID` int(10) UNSIGNED NOT NULL,
  `AREA_COMUM_NOME` varchar(255) NOT NULL,
  `AREA_COMUM_BREVE_DESCRICAO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `areas_comuns`
--

INSERT INTO `areas_comuns` (`AREA_COMUM_ID`, `AREA_COMUM_NOME`, `AREA_COMUM_BREVE_DESCRICAO`) VALUES
(1, 'Piscina', 'Area Destinada para praticas nadatórios'),
(3, 'Salão de Festa', 'Salão destinada a reuniões e encontros dos condominos ou reservas');

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
(6, 'Agua');

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
(10, 'A', 4, 2, 26245509000198),
(11, 'B', 4, 2, 26245509000198),
(12, 'C', 4, 2, 26245509000198),
(13, 'D', 4, 2, 26245509000198),
(14, 'E', 4, 2, 26245509000198);

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
(26245509000198, 'Residencial PSI', 5, 31930030, 'Rua Luiza Batista Guedes', '50', 'Ipê', 'Belo Horizonte', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominos`
--

CREATE TABLE `condominos` (
  `CONDOMINO_CPF` bigint(11) UNSIGNED ZEROFILL NOT NULL,
  `CONDOMINO_NOME` varchar(255) NOT NULL,
  `CONDOMINO_FK_USER_ID` int(10) UNSIGNED NOT NULL,
  `CONDOMINO_EMAIL` varchar(191) NOT NULL,
  `CONDOMINO_SINDICO` tinyint(1) NOT NULL,
  `CONDOMINO_FK_APARTAMENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `condominos`
--

INSERT INTO `condominos` (`CONDOMINO_CPF`, `CONDOMINO_NOME`, `CONDOMINO_FK_USER_ID`, `CONDOMINO_EMAIL`, `CONDOMINO_SINDICO`, `CONDOMINO_FK_APARTAMENTO`) VALUES
(12345678908, 'Joselito', 2, 'joselito@gmail.com', 0, 114),
(12345678909, 'Edson L F Santos', 1, 'jesusfreakedson@gmail.com', 1, 113);

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
-- Estrutura da tabela `reserva_area`
--

CREATE TABLE `reserva_area` (
  `RESERVA_AREA_ID` int(10) UNSIGNED NOT NULL,
  `RESERVA_AREA_FK_ID_AREA` int(10) UNSIGNED NOT NULL,
  `RESERVA_AREA_DATA_RESERVA` date NOT NULL,
  `RESERVA_AREA_HORARIO_INICIO` time NOT NULL,
  `RESERVA_AREA_RESERVADO_POR` bigint(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reserva_area`
--

INSERT INTO `reserva_area` (`RESERVA_AREA_ID`, `RESERVA_AREA_FK_ID_AREA`, `RESERVA_AREA_DATA_RESERVA`, `RESERVA_AREA_HORARIO_INICIO`, `RESERVA_AREA_RESERVADO_POR`) VALUES
(1, 1, '2018-05-09', '16:00:00', 12345678909),
(2, 3, '2018-05-17', '17:00:00', 12345678908);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reunioes`
--

CREATE TABLE `reunioes` (
  `REUNIAO_ID` int(10) UNSIGNED NOT NULL,
  `REUNIAO_ASSUNTO` int(10) UNSIGNED NOT NULL,
  `REUNIAO_DATA` date DEFAULT NULL,
  `REUNIAO_HORA` time DEFAULT NULL,
  `REUNIAO_OBSERVACAO` varchar(255) DEFAULT NULL,
  `REUNIAO_STATUS` int(1) NOT NULL DEFAULT '1',
  `REUNIAO_ATA` text,
  `REUNIAO_FK_CONDOMINIO` bigint(14) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reunioes`
--

INSERT INTO `reunioes` (`REUNIAO_ID`, `REUNIAO_ASSUNTO`, `REUNIAO_DATA`, `REUNIAO_HORA`, `REUNIAO_OBSERVACAO`, `REUNIAO_STATUS`, `REUNIAO_ATA`, `REUNIAO_FK_CONDOMINIO`) VALUES
(1, 1, '2018-03-30', '16:30:00', NULL, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu mollis neque. Sed egestas consequat augue, eu commodo nisi venenatis id. Maecenas lorem augue, sollicitudin et gravida a, tristique vitae leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer a augue aliquam leo commodo tincidunt a sit amet odio. Aenean at ullamcorper leo, tincidunt suscipit orci. Fusce malesuada eu ipsum at bibendum. Suspendisse interdum, nibh lacinia iaculis porta, libero felis sagittis felis, a cursus purus metus nec turpis. Phasellus varius nunc at arcu interdum viverra. Suspendisse ullamcorper, ipsum ultrices eleifend lacinia, metus metus pellentesque ex, non pretium ipsum ipsum sit amet felis. Quisque tristique risus a quam convallis, et pretium nisl sagittis. Cras fringilla eleifend est, eu fermentum est pellentesque in. Aliquam erat volutpat.\r\n\r\nUt eu lorem odio. In hac habitasse platea dictumst. Phasellus eget magna gravida, sollicitudin tellus non, ornare magna. Donec volutpat, nisi sit amet lobortis faucibus, turpis orci rutrum erat, quis tempor ante sapien vel urna. Nunc non ex sed nulla imperdiet venenatis in eu nisi. Sed consequat ligula ante, et vulputate nunc tincidunt consequat. Nullam consequat vitae libero at tincidunt. Nunc metus lacus, laoreet in magna quis, congue tincidunt erat. Suspendisse ut urna posuere, imperdiet dui ac, mollis lectus. Nam ac justo accumsan, tempor nulla eget, blandit mi. Curabitur a odio eget quam tincidunt efficitur. Maecenas elementum, eros non blandit viverra, leo nisl condimentum erat, non euismod nisi dui ac turpis. Suspendisse vitae nunc non orci efficitur scelerisque et et augue. Vestibulum posuere sed justo ac tincidunt. Aliquam commodo molestie ipsum, a tempus ante blandit ac.\r\n\r\nMorbi consequat felis ipsum, eget dictum ante fermentum fermentum. Maecenas sodales euismod diam, et auctor nulla condimentum non. Nullam vitae euismod massa, ut fermentum est. In ultricies viverra posuere. Duis vel metus eu nibh convallis pellentesque id vel justo. Aenean et erat in justo finibus lacinia viverra vel eros. Nam mi ligula, interdum sed nunc accumsan, maximus tempus nisi. In nec finibus nunc, ac fringilla felis. Etiam pretium ligula arcu, et vulputate magna accumsan ut. Duis ullamcorper ac nisl eget ornare.\r\n\r\nMorbi vel aliquet erat. Nulla nisi quam, dictum a consequat at, ornare at dui. Pellentesque luctus, ligula a aliquam faucibus, justo dolor iaculis lacus, sit amet vulputate ipsum ex eget sem. In sed ultricies enim. Fusce tincidunt velit quis dolor mattis vehicula. Vivamus fermentum tellus id lobortis rhoncus. Suspendisse sit amet bibendum urna. Pellentesque posuere augue nunc, eget mattis diam eleifend vitae. Etiam eu pharetra mi. Mauris placerat mi quis purus semper, quis mattis odio scelerisque. Donec nulla dui, luctus vitae tortor sit amet, rutrum condimentum mi. Mauris porttitor erat a erat cursus condimentum placerat a velit. Sed ut lacinia elit. Mauris convallis nec arcu a iaculis. Sed turpis arcu, commodo eget felis vel, tempor lacinia augue. Quisque mattis pharetra justo at finibus.\r\n\r\nPhasellus erat nisi, accumsan eu urna ac, molestie vulputate leo. Sed elementum lectus lacus, et scelerisque risus imperdiet vitae. Phasellus placerat aliquet dui ac fermentum. Donec eget venenatis leo. Nulla consectetur venenatis nisi. Vestibulum nec dolor tincidunt, pulvinar tellus eget, convallis lorem. Morbi ornare ullamcorper metus vitae tempor.', 26245509000198),
(3, 4, '2018-04-05', '20:30:00', NULL, 2, 'Cara de Cocnha', 26245509000198),
(4, 2, '2018-06-29', '19:45:00', NULL, 1, NULL, 26245509000198),
(5, 4, '2018-05-09', '20:30:00', NULL, 3, NULL, 26245509000198),
(6, 4, '2018-05-31', '19:30:00', 'Bloco 01 Fazendo muito Barulho depois das 22, Solicitado por: Joselito, A - 102', 1, NULL, 26245509000198),
(9, 1, '2018-05-31', '17:45:00', 'Pessoas não autorizadas entrando nos blocos, Solicitado por: Joselito, A - 102', 3, NULL, 26245509000198);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_reuniao`
--

CREATE TABLE `status_reuniao` (
  `STATUSR_ID` int(10) UNSIGNED NOT NULL,
  `STATUSR_DESCRICAO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status_reuniao`
--

INSERT INTO `status_reuniao` (`STATUSR_ID`, `STATUSR_DESCRICAO`) VALUES
(1, 'Agendada'),
(2, 'Realizada'),
(3, 'Solicitada');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `cpf` bigint(11) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `cpf`) VALUES
(1, 'Edson L F Santos', 'jesusfreakedson@gmail.com', '$2y$10$J6JhkKtDrmUbkKO9cjXpmO70q9vH3Z0AdClHuSvgq47996a7UUL9K', 'jBRTPCu2DG5bFE4kiWxYKvmsNLyN5uSgpaBbCzac8Z4VMqppk766PAdlmjh1', '2018-03-12 20:44:35', '2018-03-12 20:44:35', 12345678909),
(2, 'Joselito', 'joselito@gmail.com', '$2y$10$KOyxuV1/CSEDcqynlB7EGO8kcHCQ2WiMz/QfD/vnQ8Fipa8yEMBqu', 'cejgNcwjp5nJt2IISrH2GSajBcb47hqyDMsR0OjKdmBPPK3EUolouNVBRLp6', '2018-05-02 04:00:55', '2018-05-02 04:00:55', 12345678908);

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
-- Indexes for table `areas_comuns`
--
ALTER TABLE `areas_comuns`
  ADD PRIMARY KEY (`AREA_COMUM_ID`);

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
-- Indexes for table `reserva_area`
--
ALTER TABLE `reserva_area`
  ADD PRIMARY KEY (`RESERVA_AREA_ID`);

--
-- Indexes for table `reunioes`
--
ALTER TABLE `reunioes`
  ADD PRIMARY KEY (`REUNIAO_ID`),
  ADD KEY `FK_ASSUNTO` (`REUNIAO_ASSUNTO`);

--
-- Indexes for table `status_reuniao`
--
ALTER TABLE `status_reuniao`
  ADD PRIMARY KEY (`STATUSR_ID`);

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
  MODIFY `APTO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `areas_comuns`
--
ALTER TABLE `areas_comuns`
  MODIFY `AREA_COMUM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assunto_reunioes`
--
ALTER TABLE `assunto_reunioes`
  MODIFY `ASSUNTO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blocos`
--
ALTER TABLE `blocos`
  MODIFY `BLOCO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reserva_area`
--
ALTER TABLE `reserva_area`
  MODIFY `RESERVA_AREA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reunioes`
--
ALTER TABLE `reunioes`
  MODIFY `REUNIAO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_reuniao`
--
ALTER TABLE `status_reuniao`
  MODIFY `STATUSR_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `FK_BLOCO` FOREIGN KEY (`APTO_FK_BLOCO`) REFERENCES `blocos` (`BLOCO_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `blocos`
--
ALTER TABLE `blocos`
  ADD CONSTRAINT `FK_CONDOMINIO` FOREIGN KEY (`BLOCO_FK_CONDOMINIO`) REFERENCES `condominios` (`CONDOMINIO_CNPJ`) ON DELETE CASCADE ON UPDATE CASCADE;

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
