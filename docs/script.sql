-- MySQL Script generated by MySQL Workbench
-- Fri Dec 22 18:37:26 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema laMantequilla
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema laMantequilla
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `laMantequilla` DEFAULT CHARACTER SET utf8 ;
USE `laMantequilla` ;

-- -----------------------------------------------------
-- Table `laMantequilla`.`Fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laMantequilla`.`Fornecedor` (
  `idFornecedor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomeEmpresa` VARCHAR(45) NOT NULL,
  `nomeRepresentante` VARCHAR(45) NOT NULL,
  `cnpj` VARCHAR(14) NOT NULL,
  `endereco` VARCHAR(100) NOT NULL,
  `telefoneEmpresa` INT NOT NULL,
  `telefoneRepresentante` INT NOT NULL,
  `emailEmpresa` VARCHAR(100) NOT NULL,
  `emailRepresentante` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idFornecedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laMantequilla`.`Funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laMantequilla`.`Funcionario` (
  `idFuncionario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(100) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idFuncionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laMantequilla`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laMantequilla`.`Produto` (
  `idProduto` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `quantidade` INT NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  `precoCusto` DOUBLE NOT NULL,
  `precoVenda` DOUBLE NOT NULL,
  PRIMARY KEY (`idProduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `laMantequilla`.`Login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `laMantequilla`.`Login` (
  `idLogin` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `tipo` TINYINT NOT NULL,
  `Funcionario_idFuncionario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idLogin`),
  INDEX `fk_Login_Funcionario_idx` (`Funcionario_idFuncionario` ASC),
  CONSTRAINT `fk_Login_Funcionario`
    FOREIGN KEY (`Funcionario_idFuncionario`)
    REFERENCES `laMantequilla`.`Funcionario` (`idFuncionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
