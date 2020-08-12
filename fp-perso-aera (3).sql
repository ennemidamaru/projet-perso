-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 août 2020 à 15:15
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fp-perso-aera`
--

-- --------------------------------------------------------

--
-- Structure de la table `axes`
--

DROP TABLE IF EXISTS `axes`;
CREATE TABLE IF NOT EXISTS `axes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_membre` smallint(6) NOT NULL,
  `Æthernano` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Ether1` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Mêlée` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Dextérité` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Résistance Physique` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Ingénierie` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Seconde Origine` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Ether2` enum('E','D','C','B','A','S','Z') NOT NULL,
  `Résistance Magique` enum('E','D','C','B','A','S','Z') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_axes_membres` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` tinytext,
  `password_member` varchar(255) DEFAULT NULL,
  `idfa` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `argent` mediumint(9) DEFAULT NULL,
  `rang` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `username`, `password_member`, `idfa`, `date`, `argent`, `rang`) VALUES
(1, 'Jordan', '$2y$10$.AnO4.2JrW/OnLJs1yR6de2iahgQPwZ1gUt5NeUQKbKCsiVEV47iq', 3, '2020-03-18', 75000, 'C');

-- --------------------------------------------------------

--
-- Structure de la table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE IF NOT EXISTS `objets` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_membre` smallint(6) NOT NULL,
  `nom` tinytext,
  `image` tinytext,
  `description` text,
  `prix` int(11) DEFAULT NULL,
  `quantité` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_objets_membres` (`id_membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `talents`
--

DROP TABLE IF EXISTS `talents`;
CREATE TABLE IF NOT EXISTS `talents` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_membre` smallint(6) NOT NULL,
  `nom` tinytext NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_talents_membres` (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `talents`
--

INSERT INTO `talents` (`id`, `id_membre`, `nom`, `description`) VALUES
(1, 1, 'Larcin', 'On vole pas nouuus ?'),
(2, 1, 'Acharnement', 'On s\'acharne pas nouuus ?');

-- --------------------------------------------------------

--
-- Structure de la table `techniques`
--

DROP TABLE IF EXISTS `techniques`;
CREATE TABLE IF NOT EXISTS `techniques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_membre` smallint(6) NOT NULL,
  `nom` tinytext NOT NULL,
  `rang` enum('E','D','C','B','A','S','Z') NOT NULL,
  `description` text NOT NULL,
  `axe1` tinytext NOT NULL,
  `axe2` tinytext NOT NULL,
  `Etat` tinyint(4) DEFAULT NULL,
  `periode_reception` date NOT NULL,
  `refus_comment` text,
  PRIMARY KEY (`id`),
  KEY `FK_techniques_membres` (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `techniques`
--

INSERT INTO `techniques` (`id`, `id_membre`, `nom`, `rang`, `description`, `axe1`, `axe2`, `Etat`, `periode_reception`, `refus_comment`) VALUES
(2, 1, 'Première technique', 'B', 'Sah quel plaisir', 'Ingénierie', '', 2, '2020-03-22', NULL),
(3, 1, 'Deanouuu', 'Z', 'Le plus soin', 'Æthernano', 'Mêlée', 2, '2020-03-22', NULL),
(4, 1, 'Shinichi', 'Z', 'On soulève pas 500kg à la salle nous ?', 'Ingénierie', 'Mêlée', 2, '2020-03-22', NULL),
(16, 1, 'TEST', 'B', 'testestest', 'Æthernano', 'Mêlée', 2, '2020-03-22', NULL),
(17, 1, '222222222', 'E', '22222222222222', 'Æthernano', 'Ether1', 1, '2020-03-22', '.$refus_comment.'),
(18, 1, 'ofbazoijkfazf', 'E', 'zhzerhzehzerdh', 'Æthernano', 'Ether1', 0, '2020-03-22', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `axes`
--
ALTER TABLE `axes`
  ADD CONSTRAINT `FK_axes_membres` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `objets`
--
ALTER TABLE `objets`
  ADD CONSTRAINT `FK_objets_membres` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `talents`
--
ALTER TABLE `talents`
  ADD CONSTRAINT `FK_talents_membres` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `techniques`
--
ALTER TABLE `techniques`
  ADD CONSTRAINT `FK_techniques_membres` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
