-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 24 Décembre 2017 à 21:47
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerceydays`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `ID` int(11) NOT NULL,
  `Chemin` varchar(255) DEFAULT NULL,
  `IDuser` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`ID`, `Chemin`, `IDuser`) VALUES
(18, 'images/Profil/photo5a3ec9d865eab.jpg', NULL),
(17, 'images/Profil/photo5a401d12d0a0e.jpg', '1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `ID` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `coordonnee` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `nom`, `prenom`, `password`, `email`, `adresse`, `birth`, `coordonnee`, `contact`) VALUES
(1, 'Lamrani', 'Branis', '123456789', 'branis.lamrani@gmail.com', '', ';;', '2  Rue Charles Peguy;77500;Chelles', NULL),
(2, 'LAMRANI', 'CÃ©lia', '$2y$10$W1t052NGrf2.i2QzTiIP3.Mn0a.crFc7swzI4cOoCjF24ypg4Gd5q', 'lamranicelia@gmail.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `ID` int(255) NOT NULL,
  `matricule` varchar(12) DEFAULT NULL,
  `marque` varchar(20) DEFAULT NULL,
  `modele` varchar(20) DEFAULT NULL,
  `couleur` varchar(15) DEFAULT NULL,
  `disponible` int(1) DEFAULT NULL,
  `prixheure` int(20) DEFAULT NULL,
  `categorie` varchar(30) DEFAULT NULL,
  `localisation` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `IDuser` int(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `place` varchar(2) DEFAULT NULL,
  `kmparcouru` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`ID`, `matricule`, `marque`, `modele`, `couleur`, `disponible`, `prixheure`, `categorie`, `localisation`, `image`, `IDuser`, `description`, `place`, `kmparcouru`) VALUES
(71, '54DFS6D5F4', 'Peugeot', '308', NULL, NULL, 15, NULL, 'C', 'images/Vehicule/photo5a32c25dd6696.jpg', NULL, '', '0', 0),
(72, 'SD5F4S65', 'Peugeot', '308', NULL, NULL, 15, 'CoupÃ©', 'C', 'images/Vehicule/photo5a32c2f6f376f.jpg', NULL, '', '0', 0),
(69, 'LAMRANI', 'Branis', 'LAMRANI', NULL, NULL, 16, NULL, 'C', 'images/Vehicule/photo5a32bf4d12f83.jpg', NULL, '', '0', 0),
(73, 'HJFGJHFGJH', 'Fghjfgh', 'JFGHJF', NULL, NULL, 15, 'Optionnelle', 'H', 'images/Vehicule/photo5a32c3bdab580.jpg', NULL, '', '0', 0),
(75, '6SE8RV4S86E', 'Test1', 'TEST2', NULL, NULL, 52, 'Optionnelle', 'C', 'images/Vehicule/photo5a355adab26b4.jpg', NULL, NULL, NULL, NULL),
(76, 'T8SE4TS8E', 'Test2', 'TEST2', NULL, NULL, 25, 'Optionnelle', 'P', 'images/Vehicule/photo5a355aea0fcbe.jpg', NULL, NULL, NULL, NULL),
(77, 'RSERDT', 'Test3', 'TEST4', NULL, NULL, 25, 'Optionnelle', 'C', '', NULL, NULL, NULL, NULL),
(78, 'SXD5R4BDX36F', 'Test4', 'TEST4', NULL, NULL, 26, 'Optionnelle', 'C', 'images/Vehicule/photo5a355b1c3e39e.jpg', NULL, NULL, NULL, NULL),
(79, 'DFGBHDFGBH', 'Gfbdhfgbh', 'DFGBHDFGB', NULL, NULL, 25, 'Optionnelle', 'D', 'images/Vehicule/photo5a3e581bc2de1.jpg', NULL, NULL, NULL, NULL),
(80, 'SDFGSDF', 'Dsfgsdfg', 'SDFGS', NULL, NULL, 12, 'Optionnelle', 'G', 'images/Vehicule/photo5a3e58364d99c.jpg', NULL, NULL, NULL, NULL),
(81, 'DFGHDFGH', 'Dfghdfgh', 'DFGHDFGHFG', NULL, NULL, 123456789, 'Optionnelle', 'D', 'images/Vehicule/photo5a3e7d05693b1.jpg', NULL, NULL, NULL, NULL),
(82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 'MTN', 'J\'ai ', 'REUSSI', NULL, NULL, 123, NULL, 'A', 'images/Vehicule/photo5a3e7f59ec32b.jpg', NULL, NULL, NULL, NULL),
(85, 'MTN', 'J\'ai ', 'REUSSI', NULL, NULL, 123, NULL, 'A', 'images/Vehicule/photo5a3e7fe3146d4.jpg', NULL, NULL, NULL, NULL),
(86, 'DFGH', 'Gfdh', 'DFGH', NULL, NULL, 123, NULL, 'D', 'images/Vehicule/photo5a3e8019f2b53.jpg', NULL, NULL, NULL, NULL),
(87, 'DFGH', 'Gfdh', 'DFGH', NULL, NULL, 123, NULL, 'D', 'images/Vehicule/photo5a3e80cdc8e5c.jpg', NULL, NULL, NULL, NULL),
(88, 'HJKLHJKL', 'Jljh', 'LHJKL', NULL, NULL, 123, '0', 'H', 'images/Vehicule/photo5a3e839b65f08.jpg', NULL, NULL, NULL, NULL),
(89, 'HJKLHJKL', 'Jljh', 'LHJKL', NULL, NULL, 123, '0', 'H', 'images/Vehicule/photo5a3e848079708.jpg', NULL, NULL, NULL, NULL),
(90, 'TESTREUSSI', 'Peugeot', '308', NULL, NULL, 25, 'Familliale', 'C', 'images/Vehicule/photo5a3e864db0ec8.jpg', NULL, NULL, NULL, NULL),
(92, 'GHJK', 'G', 'G', 'Lmkl', NULL, 45, '4x4', 'Hjk', 'images/Vehicule/photo5a3e8912ca81b.jpg', 1, NULL, NULL, NULL),
(93, 'GHJK', 'G', 'G', 'Lmkl', NULL, 45, '4x4', 'Hjk', 'images/Vehicule/photo5a3e8985f3364.jpg', 1, NULL, NULL, NULL),
(94, 'HDFGHDFG', 'Dgfhfgd', 'DFGHDFG', 'Rouge', NULL, 987654321, 'Utilitaire', 'Hdfghdfgh', 'images/Vehicule/photo5a3e89959b143.jpg', 1, NULL, NULL, NULL),
(95, 'HDFGHDFG', 'Dgfhfgd', 'DFGHDFG', 'Rouge', NULL, 987654321, 'Utilitaire', 'Hdfghdfgh', 'images/Vehicule/photo5a3e8a7e258fe.jpg', 1, 'Parfait pour se déplacer en ville en toute sécruité', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
