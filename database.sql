SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;



-- -----------------------------------------------------
-- Table 'user`
-- -----------------------------------------------------


CREATE TABLE IF NOT EXISTS 'user` (
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
  `user_id_user` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id_photo`, `user_id_user`),
  INDEX `fk_photo_user_idx` (`user_id_user` ASC),
  CONSTRAINT `fk_photo_user`
    FOREIGN KEY (`user_id_user`)
    REFERENCES 'user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARACTER SET = latin1;




INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', '_MG_4819.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', '_MG_4835.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', '_MG_4919.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', '_MG_4956.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', '_MG_5005.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', '_MG_5012.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', '_MG_5195.jpg', NULL, 1);


INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'BackgroundCircle.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'BlogPortfolio_Logo.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Death_Expectation.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Dratewka_logo_Final.png', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Dratewka_website.png', NULL, 1);



INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Everything_IS_conected.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Love_Fences.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'My_template_V3.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'My_template_V4.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'NANO_2014.jpg', NULL, 1);


INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'NaoDesign_Wallpeper.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'NaoDesign_Wallpeper_2.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'NaoDesign_Wallpeper_3.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Nario_Time_to_adventure.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Panel09.jpg', NULL, 1);

INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Portfolio_Blog.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'Show_Your_Darkness2.jpg', NULL, 1);
INSERT INTO `photo` (`id_photo`, `title`, `description`, `path`, `filename`, `tags`, `user_id_user`) VALUES (NULL, NULL, NULL, 'upload/9Fv2a6h392t8ST4L46850151C156PeR7_2014-10-18/', 'WSNHiD_Logo.jpg', NULL, 1);


-- -----------------------------------------------------
-- Drop table
-- -----------------------------------------------------



DROP TABLE IF EXISTS 'user` ;
DROP TABLE IF EXISTS `photo` ;