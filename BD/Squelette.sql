-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossier.te.ch.nique.sql.free.fr
-- Généré le : Mer 29 Décembre 2021 à 19:23
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
-- Structure de la table `Squelette`
--

CREATE TABLE IF NOT EXISTS `Squelette` (
  `ID` int(11) NOT NULL auto_increment,
  `alpha` int(11) NOT NULL,
  `beta` int(11) NOT NULL default '0',
  `gamma` int(11) NOT NULL default '0',
  `texteMenu` varchar(99) collate latin1_general_ci NOT NULL,
  `imageMenu` varchar(99) collate latin1_general_ci NOT NULL default 'Vue/images/nom_du_fichier.png' COMMENT 'associée à la page',
  `ptiNom` varchar(99) collate latin1_general_ci NOT NULL,
  `classePage` varchar(99) collate latin1_general_ci NOT NULL default 'Page',
  `controleur` varchar(99) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `navigation` (`alpha`,`beta`,`gamma`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Squelette`
--

INSERT INTO `Squelette` (`ID`, `alpha`, `beta`, `gamma`, `texteMenu`, `imageMenu`, `ptiNom`, `classePage`, `controleur`) VALUES
(1, -1, 500, 0, 'Serveur satur&eacute;', '', 'Serveur_sature', 'PageErreur', 'erreur_serveur.php'),
(2, -1, 404, 0, 'Cette page n&apos;existe pas', '', 'Page_inexistante', 'PageErreur', 'erreur_serveur.php'),
(3, -1, 403, 0, 'Acc&egrave;s interdit', '', 'Acces_interdit', 'PageErreur', 'erreur_serveur.php'),
(4, -1, 0, 0, 'Erreur inconnue', '', 'Erreur', 'PageErreur', 'erreur_serveur.php'),
(5, 0, 0, 0, 'Page d&apos;accueil', '', 'home', 'PageDaccueil', 'home.php'),
(6, 1, 0, 0, 'Formulaire de contact', '', 'Contact', 'PageContact', 'contact.php');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
