-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 nov. 2022 à 12:40
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage_revelation`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `code_client` varchar(10) NOT NULL,
  `nom_client` varchar(30) NOT NULL,
  `type_client` varchar(20) NOT NULL,
  `numero_tel` varchar(11) NOT NULL,
  `date_enreg` datetime NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--


-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `numero_facture` varchar(30) NOT NULL,
  `montant_facture` int(11) NOT NULL,
  `date_facture` datetime DEFAULT NULL,
  `id_interv` int(11) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id_facture`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `factures`
--


-- --------------------------------------------------------

--
-- Structure de la table `interventions`
--

DROP TABLE IF EXISTS `interventions`;
CREATE TABLE IF NOT EXISTS `interventions` (
  `id_interv` int(11) NOT NULL AUTO_INCREMENT,
  `code_interv` varchar(20) NOT NULL,
  `libelle_intervention` varchar(100) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime DEFAULT NULL,
  `id_voiture` int(11) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `mmo` int(11) DEFAULT '0',
  PRIMARY KEY (`id_interv`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `interventions`
--


-- --------------------------------------------------------

--
-- Structure de la table `interventions_pieces`
--

DROP TABLE IF EXISTS `interventions_pieces`;
CREATE TABLE IF NOT EXISTS `interventions_pieces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_interv` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `nb_piece` int(11) NOT NULL,
  `date_c` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `interventions_pieces`
--


-- --------------------------------------------------------

--
-- Structure de la table `mecanos`
--

DROP TABLE IF EXISTS `mecanos`;
CREATE TABLE IF NOT EXISTS `mecanos` (
  `id_mecano` int(11) NOT NULL AUTO_INCREMENT,
  `code_mecano` varchar(20) NOT NULL,
  `nom_mecano` varchar(30) NOT NULL,
  `adresse_mecano` varchar(50) NOT NULL,
  `numero_telephone` varchar(20) NOT NULL,
  `date_enreg` datetime NOT NULL,
  PRIMARY KEY (`id_mecano`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mecanos`
--


-- --------------------------------------------------------

--
-- Structure de la table `mecano_interv`
--

DROP TABLE IF EXISTS `mecano_interv`;
CREATE TABLE IF NOT EXISTS `mecano_interv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mecano` int(11) NOT NULL,
  `id_interv` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mecano_interv`
--


-- --------------------------------------------------------

--
-- Structure de la table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
CREATE TABLE IF NOT EXISTS `pieces` (
  `id_piece` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_piece` varchar(40) NOT NULL,
  `prix_piece` int(11) NOT NULL,
  PRIMARY KEY (`id_piece`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pieces`
--


-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(30) NOT NULL,
  `prenom_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--


-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures` (
  `id_voiture` int(11) NOT NULL AUTO_INCREMENT,
  `code_voiture` varchar(20) NOT NULL,
  `numero_plaque` varchar(30) NOT NULL,
  `marque_voiture` varchar(30) NOT NULL,
  `modele_voiture` varchar(30) NOT NULL,
  `numero_chassis` varchar(30) DEFAULT NULL,
  `date_enreg` datetime NOT NULL,
  `type_voiture` varchar(30) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_voiture`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voitures`
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
