-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Out-2017 às 04:22
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `painel_producao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab1`
--

CREATE TABLE `tab1` (
  `id` int(11) NOT NULL,
  `linha` int(11) NOT NULL,
  `descricao_linha` varchar(255) NOT NULL,
  `contador` int(11) NOT NULL,
  `meta` int(11) NOT NULL,
  `tempo_ciclo` int(11) NOT NULL,
  `hora_inicio` int(11) NOT NULL,
  `minuto_inicio` int(11) NOT NULL,
  `hora_termino` int(11) NOT NULL,
  `minuto_termino` int(11) NOT NULL,
  `tempo_refresh_realizado` int(11) NOT NULL,
  `tempo_refresh_homem` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab1`
--
ALTER TABLE `tab1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab1`
--
ALTER TABLE `tab1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
