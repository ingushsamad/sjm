-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema restaurant
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema restaurant
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET utf8 ;
USE `restaurant` ;

-- -----------------------------------------------------
-- Table `restaurant`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`categories` (
  `id` INT UNSIGNED NOT NULL,
  `nom` VARCHAR(63) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`produits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`produits` (
  `id` INT UNSIGNED NOT NULL,
  `nom` VARCHAR(63) NULL,
  `image` VARCHAR(511) NULL,
  `prix` INT UNSIGNED NULL,
  `categories_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `categories_id`),
  INDEX `fk_products_categories_idx` (`categories_id` ASC),
  CONSTRAINT `fk_products_categories`
    FOREIGN KEY (`categories_id`)
    REFERENCES `restaurant`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`menu` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(511) NULL,
  `reduction` INT UNSIGNED NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`reservation` (
  `id` INT UNSIGNED NOT NULL,
  `clientnom` VARCHAR(63) NULL,
  `clienttel` VARCHAR(63) NULL,
  `date` DATETIME NULL,
  `commentaires` VARCHAR(511) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`livraison`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`livraison` (
  `id` INT UNSIGNED NOT NULL,
  `clientnom` VARCHAR(63) NULL,
  `clienttel` VARCHAR(63) NULL,
  `clientadresse` VARCHAR(63) NULL,
  `clientville` VARCHAR(63) NULL,
  `commentaires` VARCHAR(511) NULL,
  `date` DATETIME NULL,
  `produits_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `produits_id`),
  INDEX `fk_livraison_produits1_idx` (`produits_id` ASC),
  CONSTRAINT `fk_livraison_produits1`
    FOREIGN KEY (`produits_id`)
    REFERENCES `restaurant`.`produits` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`commentaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`commentaires` (
  `id` INT UNSIGNED NOT NULL,
  `contenu` VARCHAR(511) NULL,
  `note` TINYINT(1) NULL,
  `auteur` VARCHAR(127) NULL,
  `email` VARCHAR(127) NULL,
  `date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`users` (
  `id` INT UNSIGNED NOT NULL,
  `login` VARCHAR(63) NULL,
  `password` VARCHAR(511) NULL,
  `email` VARCHAR(127) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`date`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`date` (
  `id` INT UNSIGNED NOT NULL,
  `date` DATE NULL,
  `miday` TINYINT(1) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`linkmenu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`linkmenu` (
  `menu_id` INT UNSIGNED NOT NULL,
  `produits_id` INT UNSIGNED NOT NULL,
  `produits_categories_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`menu_id`, `produits_id`, `produits_categories_id`),
  INDEX `fk_menu_has_produits_produits1_idx` (`produits_id` ASC, `produits_categories_id` ASC),
  INDEX `fk_menu_has_produits_menu1_idx` (`menu_id` ASC),
  CONSTRAINT `fk_menu_has_produits_menu1`
    FOREIGN KEY (`menu_id`)
    REFERENCES `restaurant`.`menu` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_has_produits_produits1`
    FOREIGN KEY (`produits_id` , `produits_categories_id`)
    REFERENCES `restaurant`.`produits` (`id` , `categories_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
