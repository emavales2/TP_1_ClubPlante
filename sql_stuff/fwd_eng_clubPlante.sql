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
-- Table `clubPlante`.`Plant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`Plant` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `description` TEXT NULL,
  `type` VARCHAR(45) NULL,
  `care` TEXT NULL,
  `image` BLOB NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
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
  INDEX `fk_Member_City` (`City_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `fk_Member_City`
    FOREIGN KEY (`City_id`)
    REFERENCES `clubPlante`.`City` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`Exchange`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`Exchange` (
  `id` INT NOT NULL,
  `Date` DATETIME NOT NULL,
  `Member_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Exchange_Member` (`Member_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_Exchange_Member`
    FOREIGN KEY (`Member_id`)
    REFERENCES `clubPlante`.`Member` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `clubPlante`.`ExchgPlantTransaction`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `clubPlante`.`ExchgPlantTransaction` (
  `Exchange_id` INT NOT NULL,
  `Plant_id` INT NOT NULL,
  `traded_for` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Exchange_id`, `Plant_id`),
  INDEX `fk_ExchgPlantTransaction` (`Plant_id` ASC),
  CONSTRAINT `fk_ExchgPlantTransaction_Exchange`
    FOREIGN KEY (`Exchange_id`)
    REFERENCES `clubPlante`.`Exchange` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ExchgPlantTransaction_Plant`
    FOREIGN KEY (`Plant_id`)
    REFERENCES `clubPlante`.`Plant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

ALTER TABLE plant CHANGE nom name VARCHAR(45);

/* --------- TO ADD CITIES TO TABLE --------- */

INSERT INTO City (name) VALUES
('Montréal'), ('Québec'), ('Sherbrooke'),
('Gaspé'), ('Lévis'), ('Trois-Rivières');

/* --------- TO CHECK QUICK QUICK --------- */

SELECT * FROM member;
SELECT * FROM city;
SELECT * FROM plant;
