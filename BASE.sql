-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Lun 05 Mars 2018 à 14:12
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
-- Structure de la table `Supports`
--

CREATE TABLE IF NOT EXISTS `Supports` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `nom` varchar(32) collate latin1_general_ci NOT NULL,
  `pti_nom` varchar(32) collate latin1_general_ci NOT NULL,
  `dossier` varchar(32) collate latin1_general_ci NOT NULL,
  `article_ID` int(10) unsigned NOT NULL default '1',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `nom` (`nom`,`dossier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `Supports`
--

INSERT INTO `Supports` (`ID`, `nom`, `pti_nom`, `dossier`, `article_ID`) VALUES
(0, 'bouton poussoir', 'BP', 'BP', 1),
(1, 'but&eacute;e 5 axes', 'butee', 'butee5axes', 2),
(2, 'cambreuse', 'cambreuse', 'cambreuse', 2),
(3, 'cric bouteille', 'cric', 'cric_bouteille', 1),
(4, 'cric hydraulique 2 tonnes', 'cric', 'cric_hydraulique', 1),
(5, '&eacute;lectrovanne', 'electrovanne', 'electrovanne', 3),
(6, '&eacute;tau de mod&eacute;lisme', 'etau', 'etau', 3),
(7, 'extracteur de roulement', 'extracteur', 'extracteur2roulement', 3),
(8, 'mini coupe-tube', 'mini_coupe-tube', 'coupe-tube', 1),
(9, 'pince de marquage', 'pince', 'x2marquage', 2),
(10, 'pince de robot', 'pince', 'pince2robot', 2),
(11, 'pompe &agrave; palettes', 'pompe', 'pompeApalettes', 2),
(12, 'pr&eacute;henseur de culasse', 'prehenseur', 'prehenseur', 1),
(13, 'vanne sph&eacute;rique', 'vanne', 'vanne', 2),
(14, 'alternateur', 'alternateur', 'alternateur', 3),
(15, 'casse-noix', 'casseNoix', 'casse_noix', 1),
(16, 'bride &agrave; nez', 'bride', 'brideAnez', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
