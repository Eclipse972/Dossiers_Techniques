-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Sam 24 Février 2018 à 00:43
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dossiers_techniques`
--

-- --------------------------------------------------------

--
-- Structure de la table `Type_association`
--

CREATE TABLE IF NOT EXISTS `Type_association` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `nom` varchar(32) collate latin1_general_ci NOT NULL,
  `script` varchar(20) collate latin1_general_ci NOT NULL,
  `extension` varchar(5) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `script` (`script`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `Type_association`
--

INSERT INTO `Type_association` (`ID`, `nom`, `script`, `extension`) VALUES
(1, 'dessin d''ensemble', 'dessin_densenble', '.EDRW'),
(2, 'éclaté', 'eclate', '.EASM'),
(3, 'classe d''équivalence entrée', 'CE_entree', '.EASM'),
(4, 'classe d''équivalence sortie', 'CE_sortie', '.EASM'),
(5, 'classe d''équivalence bâti', 'CE_bati', '.EASM'),
(6, 'CE pièce unique entrée', 'piece_entree', '.EPRT'),
(7, 'CE pièce unique sortie', 'piece_sortie', '.EPRT'),
(8, 'CE pièce unique bâti', 'piece_bati', '.EPRT'),
(9, 'éclaté en classe d''équivalence', 'eclate_CE', '.EASM'),
(10, 'association', 'association', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
