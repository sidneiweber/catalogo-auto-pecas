SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `catalogo` ;
CREATE SCHEMA IF NOT EXISTS `catalogo` DEFAULT CHARACTER SET latin1 ;
USE `catalogo` ;

-- -----------------------------------------------------
-- Table `catalogo`.`clientes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catalogo`.`clientes` ;

CREATE  TABLE IF NOT EXISTS `catalogo`.`clientes` (
  `idCliente` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(500) NOT NULL ,
  `endereco` VARCHAR(200) NOT NULL ,
  `bairro` VARCHAR(100) NOT NULL ,
  `cidade` VARCHAR(100) NOT NULL ,
  `uf` VARCHAR(25) NOT NULL ,
  `cpf_cnpj` VARCHAR(40) NOT NULL ,
  `telefone` VARCHAR(25) NOT NULL ,
  `fax` VARCHAR(25) NOT NULL ,
  PRIMARY KEY (`idCliente`) )
ENGINE = InnoDB
AUTO_INCREMENT = 53
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalogo`.`contas_pagar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catalogo`.`contas_pagar` ;

CREATE  TABLE IF NOT EXISTS `catalogo`.`contas_pagar` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `fornecedor` TEXT NOT NULL ,
  `numero_documento` TEXT NOT NULL ,
  `data` DATE NOT NULL ,
  `valor` TEXT NOT NULL ,
  `status` TEXT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `data` (`data` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 43
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalogo`.`orcamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catalogo`.`orcamento` ;

CREATE  TABLE IF NOT EXISTS `catalogo`.`orcamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `idProduto` INT(11) NOT NULL ,
  `idOrcamento` INT(11) NOT NULL ,
  `idCliente` INT(11) NOT NULL ,
  `preco` FLOAT NOT NULL ,
  `quantidade` INT(11) NOT NULL ,
  `dataHora` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4446
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalogo`.`produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catalogo`.`produtos` ;

CREATE  TABLE IF NOT EXISTS `catalogo`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` TEXT NULL DEFAULT NULL ,
  `produto` TEXT NULL DEFAULT NULL ,
  `descricao` TEXT NULL DEFAULT NULL ,
  `estoque` TEXT NULL DEFAULT NULL ,
  `codigo_original` TEXT NULL DEFAULT NULL ,
  `codigo_paralelo` TEXT NULL DEFAULT NULL ,
  `preco` TEXT NULL DEFAULT NULL ,
  `promocao` TEXT NULL DEFAULT NULL ,
  `foto` TEXT NULL DEFAULT NULL ,
  `pasta` TEXT NULL DEFAULT NULL ,
  `custo` TEXT NULL DEFAULT NULL ,
  `ultimo_fornecedor` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  FULLTEXT INDEX `pesquisa` (`produto` ASC, `descricao` ASC) ,
  FULLTEXT INDEX `pesquisa2` (`produto` ASC, `descricao` ASC) ,
  FULLTEXT INDEX `pesquisa_final` (`produto` ASC, `descricao` ASC) ,
  FULLTEXT INDEX `indice_pesquisa` (`codigo` ASC, `produto` ASC, `descricao` ASC, `codigo_original` ASC, `codigo_paralelo` ASC) ,
  FULLTEXT INDEX `codigo` (`codigo` ASC, `produto` ASC, `descricao` ASC, `codigo_original` ASC, `codigo_paralelo` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 40584
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalogo`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catalogo`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `catalogo`.`usuarios` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(100) NOT NULL ,
  `usuario` VARCHAR(50) NOT NULL ,
  `senha` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `usuario` (`usuario` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `catalogo`.`prevenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catalogo`.`prevenda` ;

CREATE  TABLE IF NOT EXISTS `catalogo`.`prevenda` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `finalizada` TINYINT(1) NOT NULL DEFAULT false ,
  `data_inclusao` DATETIME NOT NULL ,
  `data_finalizacao` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `catalogo`.`vendaItens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `catalogo`.`vendaItens` ;

CREATE  TABLE IF NOT EXISTS `catalogo`.`vendaItens` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `produtos_id` INT NOT NULL ,
  `prevenda_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `produtos_id`, `prevenda_id`) ,
  INDEX `fk_vendaItens_produtos_idx` (`produtos_id` ASC) ,
  INDEX `fk_vendaItens_prevenda1_idx` (`prevenda_id` ASC) ,
  CONSTRAINT `fk_vendaItens_produtos`
    FOREIGN KEY (`produtos_id` )
    REFERENCES `catalogo`.`produtos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_vendaItens_prevenda1`
    FOREIGN KEY (`prevenda_id` )
    REFERENCES `catalogo`.`prevenda` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `catalogo` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
