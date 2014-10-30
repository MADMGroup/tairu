SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `user` (
  `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(200) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_user`)
  )ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `photo`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(200) NULL,
  `path` VARCHAR(2048) NOT NULL,
  `filename` VARCHAR(45) NOT NULL,
  `tags` VARCHAR(200) NULL,
  PRIMARY KEY (`id_photo`))
ENGINE = InnoDB AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `usersetting`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `usersetting` (
  `id_usersetting` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `url` VARCHAR(200) NULL,
  PRIMARY KEY (`id_usersetting`))
ENGINE = InnoDB AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Data for table `usersetting`
-- -----------------------------------------------------

INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'logo', 'css/images/logo.png');
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'facebook', NULL);
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'pdf', NULL);
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'site', 'madmgroup.github.io/tairu');
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'mail', '');


-- -----------------------------------------------------
-- Drop table
-- -----------------------------------------------------



DROP TABLE IF EXISTS `user` ;
DROP TABLE IF EXISTS `usersetting` ;
DROP TABLE IF EXISTS `photo` ;