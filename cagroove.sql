-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 19 fév. 2023 à 14:40
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
  `reseauxSociaux` varchar(100) NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `style`, `reseauxSociaux`, `nationalite`) VALUES
(6, 'Jul ', 'rap', 'insta', 'fr'),
(7, 'Rihanna', 'pop', 'fb, insta, twitter', 'us'),
(8, 'Orelsan', 'rap', 'insta', 'fr'),
(9, 'Laura Temple', 'techno', 'twitter', 'fr');

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
  `nom` varchar(150) NOT NULL,
  `places` int(11) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `nom`, `places`, `lieu`, `date`) VALUES
(11, 'Garorock', 355, 'Marmande', '2023-06-23'),
(12, 'Festival Summer', 148, 'Lille', '2023-07-13');

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `goutsmusicaux`
--

INSERT INTO `goutsmusicaux` (`id`, `style`) VALUES
(1, 'Rock'),
(7, 'Jazz'),
(8, 'Rap'),
(12, 'RnB'),
(13, 'Electro'),
(14, 'EDM'),
(15, 'Reggae');

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
CREATE TABLE IF NOT EXISTS `organisation` (
  `horaires` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvent` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEvent` (`idEvent`),
  KEY `idArtiste` (`idArtiste`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `organisation`
--

INSERT INTO `organisation` (`horaires`, `id`, `idEvent`, `idArtiste`) VALUES
('2023-02-24 18:38:00', 2, 12, 7),
('2023-02-16 17:39:00', 3, 11, 6),
('2023-06-09 20:45:00', 4, 12, 9),
('2023-03-17 16:40:00', 5, 12, 8),
('2023-06-28 18:20:00', 6, 11, 8);

-- --------------------------------------------------------

--
-- Structure de la table `passions`
--

DROP TABLE IF EXISTS `passions`;
CREATE TABLE IF NOT EXISTS `passions` (
  `nom` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `passions`
--

INSERT INTO `passions` (`nom`, `id`) VALUES
('Cinema', 1),
('Sport', 4),
('Cuisine', 6),
('Jeux-vidÃ©os', 7),
('Voyage', 8),
('Lecture', 9),
('DÃ©veloppement Web', 10);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'admin'),
(2, 'responsable client'),
(3, 'webmaster'),
(4, 'festivalier');

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

DROP TABLE IF EXISTS `scene`;
CREATE TABLE IF NOT EXISTS `scene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lieu` varchar(50) NOT NULL,
  `typeScene` varchar(50) NOT NULL,
  `idEvent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
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
  `idRole` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`),
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `age`, `idRole`) VALUES
(17, 'Guillaume', 'Degan', 'guillaume.degan@free.fr', '0769068609', '30 rue des courgettes', 21, 1),
(18, 'Jean', 'Dujardin', 'jean.ofthegarden@gmail.com', '0785451424', '14 allÃ©e des riziÃ¨res', 55, 4),
(19, 'Serge', 'leBoss', 'serge@gmail.com', '0685468512', '7 rue du riz', 30, 1),
(20, 'jean', 'hui', 'j@gmail.com', '5485485625', '4 rue des madelaines', 40, 4);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateursgouts`
--

INSERT INTO `utilisateursgouts` (`idUtilisateur`, `idGout`) VALUES
(19, 1),
(19, 7),
(19, 8),
(18, 8),
(18, 13),
(18, 14),
(17, 8),
(17, 12),
(17, 13),
(17, 14);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurspassions`
--

INSERT INTO `utilisateurspassions` (`idUtilisateur`, `idPassion`) VALUES
(17, 1),
(17, 7),
(17, 10),
(18, 1),
(18, 4),
(19, 8),
(19, 9);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`);

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
-- Contraintes pour la table `organisation`
--
ALTER TABLE `organisation`
  ADD CONSTRAINT `organisation_ibfk_1` FOREIGN KEY (`idEvent`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `organisation_ibfk_2` FOREIGN KEY (`idArtiste`) REFERENCES `artiste` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Contraintes pour la table `utilisateursgouts`
--
ALTER TABLE `utilisateursgouts`
  ADD CONSTRAINT `utilisateursgouts_ibfk_1` FOREIGN KEY (`idGout`) REFERENCES `goutsmusicaux` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateursgouts_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurspassions`
--
ALTER TABLE `utilisateurspassions`
  ADD CONSTRAINT `utilisateurspassions_ibfk_1` FOREIGN KEY (`idPassion`) REFERENCES `passions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateurspassions_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
