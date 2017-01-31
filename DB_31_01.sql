-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.5.46-0ubuntu0.14.04.2 - (Ubuntu)
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la table scotchbox. chats
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `messages` text,
  `pseudo` varchar(100) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table scotchbox.chats : ~0 rows (environ)
DELETE FROM `chats`;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;

-- Export de la structure de la table scotchbox. contacts
CREATE TABLE IF NOT EXISTS `contacts` (
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

-- Export de données de la table scotchbox.contacts : ~0 rows (environ)
DELETE FROM `contacts`;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;

-- Export de la structure de la table scotchbox. events
CREATE TABLE IF NOT EXISTS `events` (
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Export de données de la table scotchbox.events : ~10 rows (environ)
DELETE FROM `events`;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `host_id`, `salle_id`, `titre`, `date`, `heure`, `duree`, `description`, `sexe`, `niveau`, `nbrs_joueurs`, `score_equipe_1`, `score_equipe_2`, `match_over`) VALUES
	(5, 3, 1, 'Premier Evenement', '2017-02-03', '19:00:00', NULL, '  Premier événément créer dans la base de données', 'Mixte', '', 1, NULL, NULL, 0),
	(6, 3, 2, 'Deuxieme Evenement', '2017-01-28', '18:30:00', NULL, '  Deuxieme événement dans la base de données', 'Homme', 'Intermédiaire', NULL, NULL, NULL, 0),
	(10, 3, 3, 'Troisieme Evenement', '2017-01-27', '18:00:00', NULL, ' Troisième événément dans la base de données ', 'Femme', 'Confirmé', NULL, NULL, NULL, 0),
	(11, 3, 4, 'Quatrieme Evenement', '2017-01-27', '17:30:00', NULL, 'Quatrième événément dans la base de données', 'Mixte', '', NULL, NULL, NULL, 0),
	(16, 3, 4, 'Salu', '2017-01-27', '17:30:00', NULL, 'Quatrième événément dans la base de données', 'Mixte', '', NULL, NULL, NULL, 0),
	(18, 5, 1, 'Nouvelle event', '2017-01-29', '18:00:00', NULL, '  Nouvelle evenement', 'Homme', 'Intermédiaire', NULL, NULL, NULL, 0),
	(19, 5, 1, 'Nouvelle event', '2017-01-29', '18:00:00', '02:00:00', '   Nouvelle evenement ', 'Homme', 'Intermédiaire', NULL, NULL, NULL, 0),
	(20, 5, 1, 'Nouvelle event', '2017-01-29', '18:00:00', '01:00:00', '  Nouvelle evenement', 'Homme', 'Intermédiaire', NULL, NULL, NULL, 0),
	(21, 6, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2017-01-31', '18:00:00', '01:00:00', '  aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Mixte', 'Débutant', 1, NULL, NULL, 0),
	(22, 6, 1, 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2017-01-30', '18:00:00', '01:00:00', '  aaaaaaaaaaaaaaaaaaaaaa', 'Mixte', 'Débutant', 10, 7, 10, 1);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Export de la structure de la table scotchbox. joueurs
CREATE TABLE IF NOT EXISTS `joueurs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `equipe_id` tinyint(2) DEFAULT NULL,
  `statut_id` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- Export de données de la table scotchbox.joueurs : ~11 rows (environ)
DELETE FROM `joueurs`;
/*!40000 ALTER TABLE `joueurs` DISABLE KEYS */;
INSERT INTO `joueurs` (`id`, `user_id`, `event_id`, `equipe_id`, `statut_id`) VALUES
	(26, 3, 5, 4, 1),
	(28, 6, 22, 1, 1),
	(29, 7, 22, 1, 1),
	(30, 8, 22, 1, 1),
	(31, 9, 22, 1, 1),
	(32, 10, 22, 1, 1),
	(33, 11, 22, 2, 1),
	(34, 12, 22, 2, 1),
	(35, 13, 22, 2, 1),
	(36, 14, 22, 2, 1),
	(37, 15, 22, 2, 1),
	(38, 6, 21, NULL, 1);
/*!40000 ALTER TABLE `joueurs` ENABLE KEYS */;

-- Export de la structure de la table scotchbox. salles
CREATE TABLE IF NOT EXISTS `salles` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Export de données de la table scotchbox.salles : ~4 rows (environ)
DELETE FROM `salles`;
/*!40000 ALTER TABLE `salles` DISABLE KEYS */;
INSERT INTO `salles` (`id`, `nom`, `departement`, `ville`, `adresse`, `cp`, `tarif`, `site_web`, `photo`) VALUES
	(1, 'LE FIVE', 'Paris', 'Paris', '32, rue Moussorgski', 75018, 14, 'http://paris.lefive.fr/', NULL),
	(2, 'URBAN SOCCER', 'Paris', 'Paris', '22, Rue Notre Dame des Champs', 75006, 8, 'http://www.bfive.fr/', NULL),
	(3, 'GO PARK PONTOISE', 'Val-d-Oise', 'Pontoise', '25, route de Ménandon ', 95300, 10, 'http://www.gopark.fr/', NULL),
	(4, 'KAISER PARK BEAUCHAMP', 'Val-d-Oise', 'Beauchamp', '15, rue Denis Papin ', 95250, 8, 'http://www.kaiserpark.fr/', NULL);
/*!40000 ALTER TABLE `salles` ENABLE KEYS */;

-- Export de la structure de la table scotchbox. statuts
CREATE TABLE IF NOT EXISTS `statuts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `statut` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Export de données de la table scotchbox.statuts : ~2 rows (environ)
DELETE FROM `statuts`;
/*!40000 ALTER TABLE `statuts` DISABLE KEYS */;
INSERT INTO `statuts` (`id`, `statut`) VALUES
	(1, 'En attente'),
	(2, 'Confirmé');
/*!40000 ALTER TABLE `statuts` ENABLE KEYS */;

-- Export de la structure de la table scotchbox. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Export de données de la table scotchbox.utilisateurs : ~13 rows (environ)
DELETE FROM `utilisateurs`;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` (`id`, `user_id`, `nom`, `prenom`, `departement`, `sexe`, `niveau`) VALUES
	(3, 3, 'Liu', 'Anais', '75 - Paris', 'Homme', 'Débutant'),
	(4, 4, 'Piussan', 'charles', '95 - Val-d-Oise', 'Femme', NULL),
	(5, 5, 'Piussan', 'thomas', '75 - Paris', 'Homme', 'Débutant'),
	(6, 6, 'azerty', 'uiop', '75 - Paris', 'Homme', NULL),
	(7, 7, 'aaaaaa', 'aaaaaa', '75 - Paris', 'Homme', NULL),
	(8, 8, 'bbbbbb', 'bbbbbb', '75 - Paris', 'Homme', NULL),
	(9, 9, 'cccccc', 'cccccc', '75 - Paris', 'Homme', NULL),
	(10, 10, 'dddddd', 'dddddd', '75 - Paris', 'Homme', NULL),
	(11, 11, 'eeeeee', 'eeeeee', '75 - Paris', 'Homme', NULL),
	(12, 12, 'ffffff', 'ffffff', '75 - Paris', 'Homme', NULL),
	(13, 13, 'gggggg', 'gggggg', '75 - Paris', 'Homme', NULL),
	(14, 14, 'hhhhhh', 'hhhhhh', '75 - Paris', 'Homme', NULL),
	(15, 15, 'iiiiii', 'iiiiii', '75 - Paris', 'Homme', NULL);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;

-- Export de la structure de la table scotchbox. wusers
CREATE TABLE IF NOT EXISTS `wusers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Export de données de la table scotchbox.wusers : ~13 rows (environ)
DELETE FROM `wusers`;
/*!40000 ALTER TABLE `wusers` DISABLE KEYS */;
INSERT INTO `wusers` (`id`, `username`, `password`, `email`) VALUES
	(3, 'Dada', '$2y$10$5LJ1dANMDTTsZMe/59aJ8Oi9OgcVwXOObzSxbpsS8NLjuXcQOZIz2', 'Anais.liu@gmail.com'),
	(4, NULL, '$2y$10$M3LL0KkUxLxo8bZCSb3Ey.vY2flWcFEMDbXzcxhp89HyOxjJ5XowC', 'charles.p@gmail.com'),
	(5, 'Toto', '$2y$10$u9xWPj.qY9iKqpLlwhjf4OrHCiXtGhvA25x9JYk5EwJn4bQyN/mlS', 'thomas.piussan@gmail.com'),
	(6, NULL, '$2y$10$6upiXtYzWA5Mloox05S3V.0YIHGrDRMeTOCF8DduQjWQMThpNDBNC', 'azerty@gmail.com'),
	(7, NULL, '$2y$10$wERXasEXfa0BlhqyhgqQCuMbXdioTKTIwkxngBe7u7lYHP3ukB3Aa', 'aaaaaa@gmail.com'),
	(8, NULL, '$2y$10$hvGhlXkULmO6Qb7UtAu5ReZ.QvLKO7p1Td1fMYhZm8RX0vXFZZQqy', 'bbbbbb@gmail.com'),
	(9, NULL, '$2y$10$rgUsgLGjf.fbIIG5jrXsk.HsmLddb7gSxaquxihkSfylBco5b1RHG', 'cccccc@gmail.com'),
	(10, NULL, '$2y$10$c5iQ7Ir55L3Kya.zpbTAee3vbvFbGYhYhLvlth7Sy3V5z.NIUaw/u', 'dddddd@gmail.com'),
	(11, NULL, '$2y$10$aZTLv2k.ApX/g7Rxy0xh3e/yikEerBRcdOONVo816FXEGaLvnaNdC', 'eeeeee@gmail.com'),
	(12, NULL, '$2y$10$MYvJ6lgsOTtuWVXYzFHM9Owm.FhXLZUJOvrYw9DMDATlPuwmS/YlO', 'ffffff@gmail.com'),
	(13, NULL, '$2y$10$r75gJAs0RkZ13y36Wp7wEOQEabPGtlMDUEUjQaqSumqnWSLaC8x7C', 'gggggg@gmail.com'),
	(14, NULL, '$2y$10$YwuaO28G1Qty7g/6RVTCcuGuE6CxsPzxVEJMl29QoPS2qzU7c46Eu', 'hhhhhh@gmail.com'),
	(15, NULL, '$2y$10$K9JcmFMxYYScQDXhMRkjo.QcoqzR3C7HoyhDKawcOeDaPBaZh5/z.', 'iiiiii@gmail.com');
/*!40000 ALTER TABLE `wusers` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
