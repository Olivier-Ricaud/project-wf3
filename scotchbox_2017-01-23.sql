# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.46-0ubuntu0.14.04.2)
# Database: scotchbox
# Generation Time: 2017-01-23 15:03:10 +0000
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;

INSERT INTO `events` (`id`, `host_id`, `salle_id`, `titre`, `date`, `heure`, `duree`, `description`, `sexe`, `niveau`)
VALUES
	(4,3,3,'Bonsoir Bonsoir','2017-01-27','18:30:00','02:00:00','Salut salut','Homme','Intermédiaire');

/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table joueurs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `joueurs`;

CREATE TABLE `joueurs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(1,'LE FIVE','Ile-de-France','Paris','32, rue Moussorgski',75018,14,'http://paris.lefive.fr/',NULL),
	(2,'URBAN SOCCER','Ile-de-France','Paris','22, Rue Notre Dame des Champs',75006,8,'http://www.bfive.fr/',NULL),
	(3,'GO PARK PONTOISE','Val d\'Oise','Pontoise','25, route de Ménandon ',95300,10,'http://www.gopark.fr/',NULL),
	(4,'KAISER PARK BEAUCHAMP','Val d\'Oise','Beauchamp','15, rue Denis Papin ',95250,8,'http://www.kaiserpark.fr/',NULL);

/*!40000 ALTER TABLE `salles` ENABLE KEYS */;
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
	(1,1,'PIUSSAN','Thomas','95 - Val-d-Oise','Homme',NULL),
	(3,3,'Liu','Anais','75 - Paris','Homme','Débutant');

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
	(1,NULL,'$2y$10$rUkVLnpLwoeC5BHkTQYC6u.4rMhKuh9kF4naZJWyhGkcbagVZ9WMy','thomas.piussan@gmail.com'),
	(3,'Dada','$2y$10$5LJ1dANMDTTsZMe/59aJ8Oi9OgcVwXOObzSxbpsS8NLjuXcQOZIz2','Anais.liu@gmail.com');

/*!40000 ALTER TABLE `wusers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
