-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jan-2018 às 21:57
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamantequilla`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornecedor` int(10) UNSIGNED NOT NULL,
  `nomeEmpresa` varchar(45) NOT NULL,
  `nomeRepresentante` varchar(45) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefoneEmpresa` int(11) NOT NULL,
  `telefoneRepresentante` int(11) NOT NULL,
  `emailEmpresa` varchar(100) NOT NULL,
  `emailRepresentante` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `cpf`, `nome`, `endereco`, `cargo`) VALUES
(1, '10850060000', 'Hilda T. Barron', 'Ap #657-5847 Sem Rd.', 'Confeiteira'),
(2, '21270177111', 'Ross B. Robles', 'Ap #292-9589 Integer Ave', 'Contador'),
(3, '12139025222', 'Addison H. Carlson', 'P.O. Box 157, 5472 Tristique Road', 'Presidente'),
(4, '47637367333', 'Xander Q. Franco', 'P.O. Box 375, 3053 Nibh Avenue', 'Confeiteiro'),
(5, '18205910444', 'Ivy A. Mcknight', '566 Semper, Street', 'Vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLogin` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `Funcionario_idFuncionario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `email`, `senha`, `tipo`, `Funcionario_idFuncionario`) VALUES
(1, 'lamantequilla@alfa.com', '9dbf7c1488382487931d10235fc84a74bff5d2f4', 1, 3),
(2, 'hilda@alfa.com', 'db5fbafff95e2d0b6a305732cf8c663d0402bc19', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` longtext NOT NULL,
  `precoCusto` varchar(5) NOT NULL,
  `precoVenda` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `quantidade`, `descricao`, `precoCusto`, `precoVenda`) VALUES
(1, 'Farinha de trigo', 400, 'Farinha de trigo', '1,11', '3,33'),
(2, 'Fermento ', 1000, 'Fermento em pó', '1,99', '2,99'),
(3, 'Açúcar Mascavo', 350, 'Açúcar mascavo', '1,20', '2,20'),
(4, 'Sal', 500, 'Sal', '1,50', '2,99'),
(5, 'Manteiga', 1800, 'Manteiga', '2,99', '3,99'),
(6, 'Milho', 200, 'Milho verde', '1,89', '2,08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idFornecedor`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD KEY `fk_Login_Funcionario_idx` (`Funcionario_idFuncionario`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idFornecedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_Login_Funcionario` FOREIGN KEY (`Funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
