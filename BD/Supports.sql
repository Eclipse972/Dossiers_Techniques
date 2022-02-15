-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossier.te.ch.nique.sql.free.fr
-- Généré le : Mar 15 Février 2022 à 06:07
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `dossier_te_ch_nique`
--

-- --------------------------------------------------------

--
-- Structure de la table `Supports`
--

DROP TABLE IF EXISTS `Supports`;
CREATE TABLE IF NOT EXISTS `Supports` (
  `ID` smallint(5) unsigned NOT NULL auto_increment,
  `nom` varchar(32) collate latin1_general_ci NOT NULL,
  `pti_nom` varchar(32) collate latin1_general_ci NOT NULL,
  `dossier` varchar(32) collate latin1_general_ci NOT NULL,
  `article_ID` int(10) unsigned NOT NULL default '1',
  `zip` varchar(32) collate latin1_general_ci NOT NULL COMMENT 'archive',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `nom` (`nom`,`dossier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Contenu de la table `Supports`
--

INSERT INTO `Supports` (`ID`, `nom`, `pti_nom`, `dossier`, `article_ID`, `zip`) VALUES
(0, 'bouton poussoir', 'BP', 'BP', 1, 'BP'),
(1, 'but&eacute;e 5 axes', 'butee', 'butee5axes', 2, 'Butee5axes'),
(2, 'cambreuse', 'cambreuse', 'cambreuse', 2, 'Cambreuse'),
(3, 'cric bouteille', 'cric', 'cric_bouteille', 1, 'cric_bouteille'),
(4, 'cric hydraulique 2 tonnes', 'cric', 'cric_hydraulique', 1, 'cric_hydraulique'),
(5, '&eacute;lectrovanne', 'electrovanne', 'electrovanne', 3, 'Electrovanne'),
(6, '&eacute;tau de mod&eacute;lisme', 'etau', 'etau', 3, 'Etau2modeliste'),
(7, 'extracteur de roulement', 'extracteur', 'extracteur2roulement', 3, 'Extracteur2roulement'),
(8, 'mini coupe-tube', 'mini_coupe-tube', 'coupe-tube', 1, 'Mini_coupe-tube'),
(9, 'pince de marquage', 'pince', 'pince2marquage', 2, 'Pince2marquage'),
(10, 'pince de robot', 'pince', 'pince2robot', 2, 'Pince2robot'),
(11, 'pompe &agrave; palettes', 'pompe', 'pompeApalettes', 2, 'pompeApalettes'),
(12, 'pr&eacute;henseur de culasse', 'prehenseur', 'prehenseur', 1, 'prehenseur2culasse'),
(14, 'alternateur', 'alternateur', 'alternateur', 3, 'alternateur'),
(15, 'casse-noix', 'casseNoix', 'casse_noix', 1, 'CasseNoix'),
(16, 'bride &agrave; nez', 'bride', 'brideAnez', 2, 'brideAnez'),
(17, 'unit&eacute; de marquage', 'unite2marquage', 'unite2marquage', 3, 'unite2marquage'),
(18, 'vanne Legris', 'vanne', 'vanne', 2, 'Vanne'),
(13, 'moteur de mod&eacute;lisme', 'moteur', 'moteur2modelisme', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
