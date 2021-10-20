-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema AppMedico
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `AppMedico` ;

-- -----------------------------------------------------
-- Schema AppMedico
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `AppMedico` DEFAULT CHARACTER SET utf8 ;
USE `AppMedico` ;

-- -----------------------------------------------------
-- Table `AppMedico`.`Doctor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AppMedico`.`Doctor` ;

CREATE TABLE IF NOT EXISTS `AppMedico`.`Doctor` (
  `IdDoctor` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Paterno` VARCHAR(45) NOT NULL,
  `Materno` VARCHAR(45) NOT NULL,
  `Contrasenia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdDoctor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppMedico`.`Expediente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AppMedico`.`Expediente` ;

CREATE TABLE IF NOT EXISTS `AppMedico`.`Expediente` (
  `IdExpediente` INT NOT NULL AUTO_INCREMENT,
  `Padecimiento` VARCHAR(45) NOT NULL,
  `Sintomas` TEXT(100) NOT NULL,
  `Ingreso` DATE NOT NULL,
  `Medicacion` TEXT(100) NOT NULL,
  `IdDoctor` INT NOT NULL,
  PRIMARY KEY (`IdExpediente`, `IdDoctor`),
  CONSTRAINT `fk_Expediente_Doctor1`
    FOREIGN KEY (`IdDoctor`)
    REFERENCES `AppMedico`.`Doctor` (`IdDoctor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppMedico`.`Paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AppMedico`.`Paciente` ;

CREATE TABLE IF NOT EXISTS `AppMedico`.`Paciente` (
  `IdPaciente` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Paterno` VARCHAR(45) NOT NULL,
  `Materno` VARCHAR(45) NOT NULL,
  `Edad` INT NOT NULL,
  `Genero` VARCHAR(1) NOT NULL,
  `Correo` VARCHAR(30) NULL,
  `Telefono` VARCHAR(10) NOT NULL,
  `Edad` INT NOT NULL,
  `Direccion` VARCHAR(50) NOT NULL,
  `Estado` VARCHAR(30) NOT NULL,
  `Ciudad` INT NOT NULL,
  `IdExpediente` INT NOT NULL,
  PRIMARY KEY (`IdPaciente`, `IdExpediente`),
  CONSTRAINT `fk_Paciente_Expediente`
    FOREIGN KEY (`IdExpediente`)
    REFERENCES `AppMedico`.`Expediente` (`IdExpediente`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AppMedico`.`Administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `AppMedico`.`Administrador` ;

CREATE TABLE IF NOT EXISTS `AppMedico`.`Administrador` (
  `IdAdministrador` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Paterno` VARCHAR(45) NOT NULL,
  `Materno` VARCHAR(45) NOT NULL,
  `Contrasenia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdAdministrador`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
