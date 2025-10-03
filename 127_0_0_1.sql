-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03/10/2025 às 04:08
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `educamoney`
--
CREATE DATABASE IF NOT EXISTS `educamoney` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `educamoney`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `planejamento`
--

DROP TABLE IF EXISTS `planejamento`;
CREATE TABLE IF NOT EXISTS `planejamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `meta` varchar(64) NOT NULL,
  `valor_total` decimal(15,2) NOT NULL,
  `valor_atual` decimal(15,2) NOT NULL DEFAULT '0.00',
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `planejamento`
--

INSERT INTO `planejamento` (`id`, `meta`, `valor_total`, `valor_atual`, `id_usuario`) VALUES
(1, 'comprar carro', 3000.00, 0.00, 1),
(2, 'viagem a praia', 1500.00, 0.00, 1),
(3, 'casa', 15000.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `transacao`
--

DROP TABLE IF EXISTS `transacao`;
CREATE TABLE IF NOT EXISTS `transacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `razao` varchar(64) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `data_entrada` date NOT NULL DEFAULT (curdate()),
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `transacao`
--

INSERT INTO `transacao` (`id`, `razao`, `valor`, `data_entrada`, `id_usuario`) VALUES
(5, 'aa', 1.00, '2025-09-28', 1),
(11, 'comida', -300.00, '2025-10-12', 1),
(7, 'aa', 1.00, '2025-09-28', 1),
(8, 'Jogo', -300.00, '2025-09-17', 1),
(12, 'conserto carro', -3900.00, '2025-08-05', 1),
(13, 'Freelancer de pizza', 200.00, '2025-10-01', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `saldo` decimal(15,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_usuario` (`email_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha`, `saldo`) VALUES
(1, 'londero', 'pedroslondero6@gmail.com', '$2y$10$itrZ0I.uigVD.oQFMIgc.uQNpNZZoqTPgyVObEWu2wNukvBs9ePdG', 4593.00),
(2, 'predokareis', 'predokareis@gmail.com', '$2y$10$wW6t3dgVEgWB5QOwHS8L2u3YI1b1zH0lEyA2NA5N223FXBcrp.1..', 0.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `valores_fixos`
--

DROP TABLE IF EXISTS `valores_fixos`;
CREATE TABLE IF NOT EXISTS `valores_fixos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `razao` varchar(64) NOT NULL,
  `valor` decimal(15,2) NOT NULL,
  `dia` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `valores_fixos`
--

INSERT INTO `valores_fixos` (`id`, `razao`, `valor`, `dia`, `id_usuario`) VALUES
(11, 'aa', 1.00, 28, 1),
(10, 'Programador junior Amazon', 4444.00, 4, 1),
(12, 'Aluguel', -200.00, 5, 1),
(13, 'Condominio', -120.00, 7, 1),
(14, 'Mensalidade Spotfy', -10.00, 9, 1),
(15, 'Mensalidade Academia', -100.00, 20, 1),
(16, 'Freelancer de pizza', 200.00, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
