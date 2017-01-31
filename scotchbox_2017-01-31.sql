# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.46-0ubuntu0.14.04.2)
# Database: scotchbox
# Generation Time: 2017-01-31 08:52:08 +0000
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
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sujet` varchar(255) DEFAULT NULL,
  `contenu` text,
  `date` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `email`, `sujet`, `contenu`, `date`, `user_id`)
VALUES
	(1,'','Marc','Morandini@gmail.com','Bonjour','Salut salut','2017-01-30 11:02:18',7);

/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `host_id`, `salle_id`, `titre`, `date`, `heure`, `duree`, `description`, `sexe`, `niveau`, `nbrs_joueurs`)
VALUES
	(5,3,1,'Premier Evenement','2017-02-03','19:00:00',NULL,'  Premier événément créer dans la base de données','Mixte','Confirmé',3),
	(6,3,2,'Deuxieme Evenement','2017-01-28','18:30:00',NULL,'  Deuxieme événement dans la base de données','Homme','Intermédiaire',1),
	(10,3,3,'Troisieme Evenement','2017-01-27','18:00:00',NULL,' Troisième événément dans la base de données ','Femme','Confirmé',NULL),
	(11,3,4,'Quatrieme Evenement','2017-01-27','17:30:00',NULL,'Quatrième événément dans la base de données','Mixte','Confirmé',NULL),
	(16,3,4,'Salu','2017-01-27','17:30:00',NULL,'Quatrième événément dans la base de données','Mixte','Tout niveaux',NULL),
	(18,5,1,'Nouvelle event','2017-01-29','18:00:00',NULL,'  Nouvelle evenement','Homme','Intermédiaire',0),
	(19,5,1,'Nouvelle event','2017-01-29','18:00:00','02:00:00','   Nouvelle evenement ','Homme','Intermédiaire',0),
	(20,5,1,'Nouvelle event','2017-01-29','18:00:00','01:00:00','  Nouvelle evenement','Homme','Intermédiaire',1),
	(22,7,1,'lalala','2017-02-09','17:00:00','01:00:00','  lalalalal','Homme','Intermédiaire',0);

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
	(30,3,5,NULL,1),
	(31,3,20,NULL,1),
	(32,4,5,NULL,1),
	(33,3,6,NULL,1),
	(36,8,5,NULL,1);

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
  `photo` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `salles` WRITE;
/*!40000 ALTER TABLE `salles` DISABLE KEYS */;

INSERT INTO `salles` (`id`, `nom`, `departement`, `ville`, `adresse`, `cp`, `tarif`, `site_web`, `photo`)
VALUES
	(1,'LE FIVE','Paris','Paris','32, rue Moussorgski',75018,14,'http://paris.lefive.fr/',NULL),
	(2,'URBAN SOCCER','Paris','Paris','22, Rue Notre Dame des Champs',75006,8,'http://www.bfive.fr/',NULL),
	(3,'GO PARK PONTOISE','Val-d-Oise','Pontoise','25, route de Ménandon ',95300,10,'http://www.gopark.fr/',NULL),
	(4,'KAISER PARK BEAUCHAMP','Val-d-Oise','Beauchamp','15, rue Denis Papin ',95250,8,'http://www.kaiserpark.fr/',NULL);

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
	(4,4,'Piussan','charles','95 - Val-d-Oise','Femme',NULL),
	(5,5,'Piussan','thomas','75 - Paris','Homme','Débutant'),
	(6,6,'Thomas','Piussan','75 - Paris','Homme',NULL),
	(7,7,'','Marc','75 - Paris','Homme','Débutant'),
	(8,8,'Anais','Liu','75 - Paris','Homme',NULL),
	(9,9,'aaaa','aaaaa','75 - Paris','Homme',NULL);

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
	(4,NULL,'$2y$10$M3LL0KkUxLxo8bZCSb3Ey.vY2flWcFEMDbXzcxhp89HyOxjJ5XowC','charles.p@gmail.com'),
	(5,'Toto','$2y$10$u9xWPj.qY9iKqpLlwhjf4OrHCiXtGhvA25x9JYk5EwJn4bQyN/mlS','thomas.piussan@gmail.com'),
	(6,NULL,'$2y$10$uYdf7fHhgAcYK0Fh6DjAjubWpjEkWLAHgmBrJ/6z23vD6TjVm.9xi','toto2@gmail.com'),
	(7,'Waouw','$2y$10$IlXEB84UBDId4M4tlDMJ8udz1ShmchZm3M3ZHfQYesELU8DLEchsO','Morandini@gmail.com'),
	(8,NULL,'$2y$10$YRE/g.W0Z03R6erwbmybd.yWNyP1oAs3yv6XFxfyPowJerXKOtZCy','anais@gmail.com'),
	(9,NULL,'$2y$10$dvu/4ARW.SSFDMiG7oRYB.JPnK14f7UETfZh837h2YWvcDb5RVyWK','aaaaa@aaa.com');

/*!40000 ALTER TABLE `wusers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
