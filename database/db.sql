-- MySQL Workbench Forward Engineering
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema easyrail
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS `easyrail` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `easyrail` ;

-- -----------------------------------------------------
-- Table `easyrail`.`trem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`trem` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easyrail`.`trilho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`trilho` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo_trecho` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easyrail`.`sensor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`sensor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `trem_id` INT NULL,   
  `trilho_id` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_sensor_trem`
    FOREIGN KEY (`trem_id`) REFERENCES `easyrail`.`trem` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_sensor_trilho`
    FOREIGN KEY (`trilho_id`) REFERENCES `easyrail`.`trilho` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easyrail`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`perfil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easyrail`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL,
  `perfil_id` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_usuario_perfil`
    FOREIGN KEY (`perfil_id`) REFERENCES `easyrail`.`perfil` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easyrail`.`registro_sensor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`registro_sensor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sensor_id` INT NOT NULL,
  `data_registro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_registro_sensor`
    FOREIGN KEY (`sensor_id`) REFERENCES `easyrail`.`sensor` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easyrail`.`rota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`rota` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `trem_id` INT NOT NULL,
  `trilho_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_rota_trem`
    FOREIGN KEY (`trem_id`) REFERENCES `easyrail`.`trem` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_rota_trilho`
    FOREIGN KEY (`trilho_id`) REFERENCES `easyrail`.`trilho` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `easyrail`.`carga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `easyrail`.`carga` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `trem_id` INT NOT NULL,
  `tipo` VARCHAR(100) NOT NULL,
  `peso` DOUBLE NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_carga_trem`
    FOREIGN KEY (`trem_id`) REFERENCES `easyrail`.`trem` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;