-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 jan. 2023 à 11:23
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laplateforme`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `idEnt` int(100) NOT NULL,
  `nomEnt` varchar(100) NOT NULL,
  `labels` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`idEnt`, `nomEnt`, `labels`) VALUES
(1, 'foodCharente', 'AB'),
(2, 'nourriture16', ''),
(3, 'vêtement16', 'Max Havelaar Fair Trade'),
(4, 'lesfringuesdu16', 'BioRe'),
(5, 'cosmé16', ''),
(6, 'cosmetiqueCharente', 'cosmebio'),
(7, 'laboîteatrucs16', ''),
(8, 'meubles16', 'ecolabel europpéen'),
(9, 'meublesCharente', ''),
(10, 'proprete16', 'ecolabel europpéen'),
(11, 'maroquinerie16', ''),
(12, 'maroCharente', 'ecolabel europpéen');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(10) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `idEnt` int(100) DEFAULT NULL,
  `categorie` varchar(100) NOT NULL,
  `provenance` varchar(50) NOT NULL,
  `bio` varchar(20) DEFAULT NULL,
  `impactAnimal` varchar(50) DEFAULT NULL,
  `recup` varchar(20) DEFAULT NULL,
  `leafScore` float DEFAULT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`idEnt`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEnt` (`idEnt`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `idEnt` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `idEnt` FOREIGN KEY (`idEnt`) REFERENCES `entreprises` (`idEnt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
