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
-- Table `restaurant`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`category` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(63) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`products` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(63) NULL,
  `image` VARCHAR(511) NULL,
  `price` INT UNSIGNED NULL,
  `categories_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `categories_id`),
  INDEX `fk_products_categories_idx` (`categories_id` ASC),
  CONSTRAINT `fk_products_categories`
    FOREIGN KEY (`categories_id`)
    REFERENCES `restaurant`.`category` (`id`)
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
  `discount` INT UNSIGNED NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`booking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`booking` (
  `id` INT UNSIGNED NOT NULL,
  `customer_name` VARCHAR(63) NULL,
  `customer_tel` VARCHAR(63) NULL,
  `date` DATETIME NULL,
  `comments` VARCHAR(511) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`delivery`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`delivery` (
  `id` INT UNSIGNED NOT NULL,
  `customer_name` VARCHAR(63) NULL,
  `customer_tel` VARCHAR(63) NULL,
  `customer_address` VARCHAR(63) NULL,
  `customer_city` VARCHAR(63) NULL,
  `comments` VARCHAR(511) NULL,
  `date` DATETIME NULL,
  `product_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `product_id`),
  INDEX `fk_livraison_produits1_idx` (`product_id` ASC),
  CONSTRAINT `fk_livraison_produits1`
    FOREIGN KEY (`product_id`)
    REFERENCES `restaurant`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `restaurant`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurant`.`comments` (
  `id` INT UNSIGNED NOT NULL,
  `content` VARCHAR(511) NULL,
  `note` TINYINT(1) NULL,
  `author` VARCHAR(127) NULL,
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
  `products_id` INT UNSIGNED NOT NULL,
  `products_category_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`menu_id`, `products_id`, `products_category_id`),
  INDEX `fk_menu_has_produits_produits1_idx` (`products_id` ASC, `products_category_id` ASC),
  INDEX `fk_menu_has_produits_menu1_idx` (`menu_id` ASC),
  CONSTRAINT `fk_menu_has_produits_menu1`
    FOREIGN KEY (`menu_id`)
    REFERENCES `restaurant`.`menu` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_has_produits_produits1`
    FOREIGN KEY (`products_id` , `products_category_id`)
    REFERENCES `restaurant`.`products` (`id` , `categories_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

