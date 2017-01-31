# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.46-0ubuntu0.14.04.2)
# Database: scotchbox
# Generation Time: 2017-01-31 13:58:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table chats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chats`;

CREATE TABLE `chats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `messages` text,
  `pseudo` varchar(100) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT '0',
  `prenom` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `contenu` text,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `host_id` int(11) DEFAULT NULL,
  `salle_id` int(11) DEFAULT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `duree` time DEFAULT NULL,
  `description` text,
  `sexe` enum('Homme','Femme','Mixte') DEFAULT NULL,
  `niveau` enum('Débutant','Intermédiaire','Confirmé','Tout niveaux') DEFAULT NULL,
  `nbrs_joueurs` tinyint(2) DEFAULT NULL,
  `score_equipe_1` int(11) DEFAULT NULL,
  `score_equipe_2` int(11) DEFAULT NULL,
  `match_over` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `host_id`, `salle_id`, `titre`, `date`, `heure`, `duree`, `description`, `sexe`, `niveau`, `nbrs_joueurs`, `score_equipe_1`, `score_equipe_2`, `match_over`)
VALUES
	(24,16,1,'Premier Evenement','2017-01-29','17:30:00','01:00:00','    Premier Evenement','Mixte','Débutant',10,2,1,1);

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table joueurs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `joueurs`;

CREATE TABLE `joueurs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `equipe_id` tinyint(2) DEFAULT NULL,
  `statut_id` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `joueurs` WRITE;
/*!40000 ALTER TABLE `joueurs` DISABLE KEYS */;

INSERT INTO `joueurs` (`id`, `user_id`, `event_id`, `equipe_id`, `statut_id`)
VALUES
	(43,16,24,2,2),
	(44,17,24,1,2),
	(47,16,25,2,1),
	(48,19,24,1,2),
	(49,19,25,1,1),
	(50,20,24,1,2),
	(51,21,24,NULL,1),
	(52,22,24,2,1),
	(53,23,24,2,1),
	(54,24,24,NULL,1),
	(55,25,24,2,1);

/*!40000 ALTER TABLE `joueurs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resultats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resultats`;

CREATE TABLE `resultats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `score_equipe_1` int(11) DEFAULT NULL,
  `score_equipe_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table salles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salles`;

CREATE TABLE `salles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `departement` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `tarif` tinyint(3) DEFAULT NULL,
  `site_web` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `salles` WRITE;
/*!40000 ALTER TABLE `salles` DISABLE KEYS */;

INSERT INTO `salles` (`id`, `nom`, `departement`, `ville`, `adresse`, `cp`, `tarif`, `site_web`)
VALUES
	(1,'LE FIVE','Paris','Paris','32, rue Moussorgski',75018,14,'http://paris.lefive.fr/'),
	(2,'URBAN SOCCER','Paris','Paris','22, Rue Notre Dame des Champs',75006,8,'http://www.bfive.fr/'),
	(3,'GO PARK PONTOISE','Val-d-Oise','Pontoise','25, route de Ménandon ',95300,10,'http://www.gopark.fr/'),
	(4,'KAISER PARK BEAUCHAMP','Val-d-Oise','Beauchamp','15, rue Denis Papin ',95250,8,'http://www.kaiserpark.fr/');

/*!40000 ALTER TABLE `salles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table statuts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `statuts`;

CREATE TABLE `statuts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `statut` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `statuts` WRITE;
/*!40000 ALTER TABLE `statuts` DISABLE KEYS */;

INSERT INTO `statuts` (`id`, `statut`)
VALUES
	(1,'En attente'),
	(2,'Confirmé');

/*!40000 ALTER TABLE `statuts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table utilisateurs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateurs`;

CREATE TABLE `utilisateurs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `departement` varchar(100) DEFAULT NULL,
  `sexe` enum('Homme','Femme') DEFAULT NULL,
  `niveau` enum('Débutant','Intermédiaire','Confirmé') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `wusers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;

INSERT INTO `utilisateurs` (`id`, `user_id`, `nom`, `prenom`, `departement`, `sexe`, `niveau`)
VALUES
	(16,16,'testnom','testprenom','75 - Paris','Homme','Débutant'),
	(17,17,'testnom','testprenom','95 - Val-d-Oise','Homme','Intermédiaire'),
	(18,18,'testnom','testprenom','95 - Val-d-Oise','Homme','Débutant'),
	(19,19,'testnom','testprenom','75 - Paris','Homme','Intermédiaire'),
	(20,20,'testnom','testprenom','95 - Val-d-Oise','Homme','Intermédiaire'),
	(21,21,'testnom','testprenom','75 - Paris','Femme',NULL),
	(22,22,'testnom','testprenom','95 - Val-d-Oise','Femme',NULL),
	(23,23,'testnom','testprenom','75 - Paris','Homme',NULL),
	(24,24,'testnom','testprenom','75 - Paris','Femme',NULL),
	(25,25,'testnom','testprenom','95 - Val-d-Oise','Homme',NULL),
	(26,27,'testnom','testprenom','75 - Paris','Homme',NULL);

/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wusers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wusers`;

CREATE TABLE `wusers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `wusers` WRITE;
/*!40000 ALTER TABLE `wusers` DISABLE KEYS */;

INSERT INTO `wusers` (`id`, `username`, `password`, `email`)
VALUES
	(16,'test01','$2y$10$5oTy4qhXeygEEruSZA6Z6ewddeYX.dX9bqwEn7Ftf78TuDsHXnOLO','test01@gmail.com'),
	(17,'test02','$2y$10$LIMBklCDJeExu1vZOQQOXuIj10ku0hk0M909jW81lPke1mEmYo8.K','test02@gmail.com'),
	(18,'test03','$2y$10$46xPJQ4YU09LH5zY/PrixuVIu5tB3HQBpbdEYOoHS4xYeuKAqbqp.','test03@gmail.com'),
	(19,'test04','$2y$10$Ze7pMgkmQf2Wg7lSCjtaX.zHxUUMVBz01oJayUOqfaM5nKZxV3XHG','test04@gmail.com'),
	(20,'test05','$2y$10$a4wWH1wZyLhfgdKkNuOdXeyo.ZxSMf14Lp9YUde05N6cxgKRReJG6','test05@gmail.com'),
	(21,'test06','$2y$10$j/YB6GSMK3MZgCvIGVoGruN.R/dDyvoLG3fSw0fVbPL1EcwcJJM6G','test06@gmail.com'),
	(22,'test07','$2y$10$XTlOJwJb5nrWi36OgKW.3eORVeHbj40cq6YQvZoAgX2tNjRxvAwWK','test07@gmail.com'),
	(23,'test08','$2y$10$VpOoT.tdTOVSyKB/.FntkOuF7ck9LZZYyYzIdzAWkdnSDDY/zXQg2','test08@gmail.com'),
	(24,'test09','$2y$10$WVdEp7LzBnG58gYypz4KZ.hNCrYz0sYEPuPgPZwdxY4D98HqhROO6','test09@gmail.com'),
	(25,'test10','$2y$10$tXu6dTJ2/NvxfEv5sOByBO5KFSBK68xj1CfcirpfSSEk6IeV03L2C','test10@gmail.com'),
	(27,NULL,'$2y$10$lYyKTnEAV1amsK.p8T8vIuSm.5klXQWPhXZhwuMVhTDIAu8uRT.ZG','test11@gmail.com');

/*!40000 ALTER TABLE `wusers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
