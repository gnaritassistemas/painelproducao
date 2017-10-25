-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Out-2017 às 01:15
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
  `linha` int(11) NOT NULL,
  `contador` int(11) NOT NULL,
  `meta` int(11) NOT NULL,
  `tempo_ciclo` int(11) NOT NULL,
  `hora_inicio` int(11) NOT NULL,
  `minuto_inicio` int(11) NOT NULL,
  `hora_termino` int(11) NOT NULL,
  `minuto_termino` int(11) NOT NULL,
  `tempo_refresh_realizado` int(11) NOT NULL,
  `tempo_refresh_homem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab1`
--

INSERT INTO `tab1` (`linha`, `contador`, `meta`, `tempo_ciclo`, `hora_inicio`, `minuto_inicio`, `hora_termino`, `minuto_termino`, `tempo_refresh_realizado`, `tempo_refresh_homem`) VALUES
(1, 799, 8000, 30, 8, 0, 16, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
