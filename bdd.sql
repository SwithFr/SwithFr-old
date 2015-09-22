# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: 127.0.0.1 (MySQL 5.6.25)
# Base de données: swith
# Temps de génération: 2015-09-22 15:11:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `subtitle` tinytext NOT NULL,
  `description` tinytext,
  `keywords` varchar(255) DEFAULT NULL,
  `ref` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ref` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`id`, `title`, `subtitle`, `description`, `keywords`, `ref`)
VALUES
	(1,'Page d\'accueil','','Portfolio de Jeremy Smith | @SwithFr, développeur et intégrateur web.','jeremy, smith, web, developer, développeur, integrateur, designer, phh','home'),
	(2,'À propos','Vous voulez en savoir un peu plus sur moi ?','À propos de Jeremy Smith @SwithFr étudiant en inforgaphie à l\'HEPL','À propos, HEPL','about'),
	(3,'Me contacter','Vous cherchez un type sympa qui fera de son mieux pour répondre à vos besoins ? Ça tombe bien ! moi je cherche quelqu’un de sympa avec qui travailler.','Contacter Jeremy Smith','contact, email','contact'),
	(4,'Mes réalisations','Voici quelques unes de mes réalisations. Il y a un peu de tout, des projets scolaires ou personnels. La plus part sont disponnibles sur GitHub, si cela vous intéresse.','Réalisations, projets, scolaires ou personnels de Jeremy Smith','projets, projects','works');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `login`, `password`, `role`)
VALUES
	(1,'admin','693088b406c3c8032f47205c914b5662c4451284','admin');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table works
# ------------------------------------------------------------

DROP TABLE IF EXISTS `works`;

CREATE TABLE `works` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `url` varchar(255) DEFAULT '',
  `alt_img` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL DEFAULT '',
  `online` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;

INSERT INTO `works` (`id`, `title`, `img`, `description`, `url`, `alt_img`, `slug`, `online`)
VALUES
	(8,'BookStore','bookstore.png','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis recusandae atque rerum at quam quia fugit a, quisquam dolores, cum aspernatur illo asperiores sint reprehenderit quibusdam ea voluptatibus iste et?','','','bookstore',1),
	(9,'Ecco Nova','ecconova.png','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis recusandae atque rerum at quam quia fugit a, quisquam dolores, cum aspernatur illo asperiores sint reprehenderit quibusdam ea voluptatibus iste et?','','','test1',1),
	(10,'DS Wallonie','dswallonie.png','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis recusandae atque rerum at quam quia fugit a, quisquam dolores, cum aspernatur illo asperiores sint reprehenderit quibusdam ea voluptatibus iste et?','','','test2',1);

/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
