-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Nov-2025 às 18:28
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saep_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `idEstoque` int(11) NOT NULL,
  `fkProd` int(11) NOT NULL,
  `fkUsuario` int(11) NOT NULL,
  `tipoMovimento` char(1) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `dataMovimento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`idEstoque`, `fkProd`, `fkUsuario`, `tipoMovimento`, `quantidade`, `dataMovimento`) VALUES
(1, 2, 2, 'S', 12, '2025-11-11 13:16:22'),
(2, 1, 1, 'E', 2, '2025-11-11 13:16:04'),
(6, 2, 2, 'S', 10, '2025-11-11 20:26:00'),
(7, 2, 2, 'S', 1, '2025-11-11 20:26:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `tipoMaterial` varchar(30) NOT NULL,
  `preco` float NOT NULL,
  `estoque` int(11) NOT NULL,
  `estoqueMin` int(11) NOT NULL,
  `estoqueMax` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `tensao` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `modelo`, `tipoMaterial`, `preco`, `estoque`, `estoqueMin`, `estoqueMax`, `marca`, `tamanho`, `peso`, `tensao`) VALUES
(1, 'Martelo', 'Martelo de ferro', 'Madeira e ferro', 17, 33, 20, 40, 'Boosch', 30, 500, 0),
(2, 'Prego', 'Prego pequeno', 'Ferro', 12, 39, 40, 200, 'Boosch', 2, 10, 0),
(4, 'Furadeira', 'V15', 'ferro e plastico', 97, 31, 30, 50, 'Bosch', 17, 1000, 220);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(200) NOT NULL,
  `loginUsuario` varchar(20) NOT NULL,
  `senhaUsuario` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `loginUsuario`, `senhaUsuario`) VALUES
(1, 'Flávia Prouvot', 'flaviaprouvot', '1234'),
(2, 'Antonio Scudeler', 'antonioscudeler', '1234'),
(3, 'Bruno Attina', 'brunoatinna', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`idEstoque`),
  ADD KEY `fkProd` (`fkProd`),
  ADD KEY `fkUsuario` (`fkUsuario`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `idEstoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`fkProd`) REFERENCES `produto` (`idProduto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estoque_ibfk_2` FOREIGN KEY (`fkUsuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
