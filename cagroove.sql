-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 jan. 2023 à 08:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cagroove`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `nom` varchar(50) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

DROP TABLE IF EXISTS `artiste`;
CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `style` varchar(50) NOT NULL,
  `idHoraire` int(11) NOT NULL,
  `reseauxSociaux` varchar(100) NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idHoraire` (`idHoraire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `category` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `idEvent` int(11) NOT NULL,
  `idCommande` int(11) NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `idEvent` (`idEvent`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroCommande` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `dateModification` date NOT NULL,
  `dateAnnulation` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateur` (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `conversationsupport`
--

DROP TABLE IF EXISTS `conversationsupport`;
CREATE TABLE IF NOT EXISTS `conversationsupport` (
  `message` text NOT NULL,
  `idRespClient` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  KEY `idClient` (`idClient`),
  KEY `idRespClient` (`idRespClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `places` int(11) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `eventorganisation`
--

DROP TABLE IF EXISTS `eventorganisation`;
CREATE TABLE IF NOT EXISTS `eventorganisation` (
  `idEvent` int(11) NOT NULL,
  `idHoraire` int(11) NOT NULL,
  KEY `idHoraire` (`idHoraire`),
  KEY `idEvent` (`idEvent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `goutsmusicaux`
--

DROP TABLE IF EXISTS `goutsmusicaux`;
CREATE TABLE IF NOT EXISTS `goutsmusicaux` (
  `type de musique` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`type de musique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
CREATE TABLE IF NOT EXISTS `organisation` (
  `horaires` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `passions`
--

DROP TABLE IF EXISTS `passions`;
CREATE TABLE IF NOT EXISTS `passions` (
  `nom` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

DROP TABLE IF EXISTS `scene`;
CREATE TABLE IF NOT EXISTS `scene` (
  `lieu` varchar(50) NOT NULL,
  `typeScene` varchar(50) NOT NULL,
  `idEvent` int(11) NOT NULL,
  KEY `idEvent` (`idEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateursgouts`
--

DROP TABLE IF EXISTS `utilisateursgouts`;
CREATE TABLE IF NOT EXISTS `utilisateursgouts` (
  `idUtilisateur` int(11) NOT NULL,
  `idGout` int(11) NOT NULL,
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idGout` (`idGout`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurspassions`
--

DROP TABLE IF EXISTS `utilisateurspassions`;
CREATE TABLE IF NOT EXISTS `utilisateurspassions` (
  `idUtilisateur` int(11) NOT NULL,
  `idPassion` int(11) NOT NULL,
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idPassion` (`idPassion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD CONSTRAINT `artiste_ibfk_1` FOREIGN KEY (`idHoraire`) REFERENCES `organisation` (`id`);

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `conversationsupport`
--
ALTER TABLE `conversationsupport`
  ADD CONSTRAINT `conversationsupport_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `conversationsupport_ibfk_2` FOREIGN KEY (`idRespClient`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `scene`
--
ALTER TABLE `scene`
  ADD CONSTRAINT `scene_ibfk_1` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
