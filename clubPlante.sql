-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE;
SET SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema clubPlante
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema clubPlante
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `clubPlante` DEFAULT CHARACTER SET utf8 ;
USE `clubPlante` ;

-- -----------------------------------------------------
-- Table `clubPlante`.`City`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`City` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`Plant_Offered`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`Plant_Offered` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `age` INT NULL,
  `type` VARCHAR(45) NULL,
  `care` TEXT NULL,
  `image` BLOB NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`Member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`Member` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `postal_code` VARCHAR(10) NULL,
  `email` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(20) NULL,
  `wishlist` VARCHAR(45) NOT NULL,
  `City_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Member_City1_idx` (`City_id` ASC),
  CONSTRAINT `fk_Member_City1`
    FOREIGN KEY (`City_id`)
    REFERENCES `clubPlante`.`City` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`Member_has_Plant_Offered`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`Member_has_Plant_Offered` (
  `Member_id` INT NOT NULL,
  `Plant_Offered_id` INT NOT NULL,
  PRIMARY KEY (`Member_id`, `Plant_Offered_id`),
  INDEX `fk_Member_has_Plant_Offered_Plant_Offered1_idx` (`Plant_Offered_id` ASC),
  INDEX `fk_Member_has_Plant_Offered_Member_idx` (`Member_id` ASC),
  CONSTRAINT `fk_Member_has_Plant_Offered_Member`
    FOREIGN KEY (`Member_id`)
    REFERENCES `clubPlante`.`Member` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Member_has_Plant_Offered_Plant_Offered1`
    FOREIGN KEY (`Plant_Offered_id`)
    REFERENCES `clubPlante`.`Plant_Offered` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

select * from city;

insert into city(name) Montréal;