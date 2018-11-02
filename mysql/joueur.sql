-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 02 nov. 2018 à 16:21
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `trivialnavigo`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `idJoueur` int(8) NOT NULL AUTO_INCREMENT,
  `role` int(1) DEFAULT NULL,
  `pseudoJoueur` text,
  `adresseMail` text,
  `password` text,
  `nbTotalQuestion` int(10) DEFAULT '0',
  `nbBonnesReponses` int(10) DEFAULT '0',
  `idSalon` int(8) DEFAULT NULL,
  PRIMARY KEY (`idJoueur`),
  KEY `idSalon` (`idSalon`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`idJoueur`, `role`, `pseudoJoueur`, `adresseMail`, `password`, `nbTotalQuestion`, `nbBonnesReponses`, `idSalon`) VALUES
(1, 1, 'Lily', 'test@test.fr', '1', 0, 0, 1),
(2, 1, 'Leo', 'leo@leo.leo', 'leo', 0, 0, 1),
(3, 1, 'Quentin', 'svz@svz.fr', 'svz', 0, 0, 1),
(4, 1, 'Camille', 'camille@camille.fr', 'camille', 0, 0, 1),
(5, NULL, 'Maeva', 'maeva@gmail.com', '$2y$12$p9n6CvkhLrPvUARdgx43F.an9K..1FE7goMOv0QuMFnhi0zTIxdZa', 0, 0, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
