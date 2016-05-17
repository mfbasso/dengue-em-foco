/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.13-MariaDB : Database - projetodef
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`projetodef` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `projetodef`;

/*Table structure for table `foco` */

DROP TABLE IF EXISTS `foco`;

CREATE TABLE `foco` (
  `idFoco` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(128) NOT NULL,
  `idLocal` int(11) NOT NULL,
  `idAcesso` int(11) NOT NULL,
  `tipo` enum('Foco','Caso') NOT NULL,
  PRIMARY KEY (`idFoco`),
  KEY `idLocal` (`idLocal`),
  KEY `idAcesso` (`idAcesso`),
  CONSTRAINT `foco_ibfk_1` FOREIGN KEY (`idLocal`) REFERENCES `local` (`idLocal`),
  CONSTRAINT `foco_ibfk_2` FOREIGN KEY (`idAcesso`) REFERENCES `log_acesso` (`idAcesso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `foco` */

/*Table structure for table `local` */

DROP TABLE IF EXISTS `local`;

CREATE TABLE `local` (
  `idLocal` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(64) NOT NULL,
  `uf` char(2) NOT NULL,
  PRIMARY KEY (`idLocal`),
  UNIQUE KEY `UNIQUE` (`cidade`,`uf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `local` */

/*Table structure for table `log_acesso` */

DROP TABLE IF EXISTS `log_acesso`;

CREATE TABLE `log_acesso` (
  `idAcesso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `data` date NOT NULL,
  `email` varchar(128) NOT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`idAcesso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `log_acesso` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
