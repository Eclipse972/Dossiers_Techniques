-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Dim 08 Décembre 2019 à 12:12
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
-- Structure de la table `Commentaires`
--

CREATE TABLE IF NOT EXISTS `Commentaires` (
  `support_ID` smallint(5) NOT NULL,
  `ordre` tinyint(1) NOT NULL default '0' COMMENT 'présentation',
  `texte` text collate latin1_general_ci NOT NULL,
  `lien` varchar(64) collate latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='à propos de chaque support';

--
-- Contenu de la table `Commentaires`
--

INSERT INTO `Commentaires` (`support_ID`, `ordre`, `texte`, `lien`) VALUES
(14, 2, 'dessin de l&apos;&eacute;clat&eacute;', ''),
(0, 1, 'configuration contenant &eacute;corch&eacute; disponible', ''),
(0, 3, 'sous ensemble fixe', ''),
(0, 4, 'sous ensemble mobile', ''),
(14, 1, 'contient deux configuraions compl&eacute;mentaires', ''),
(0, 0, 'site de l&apos;auteur', 'http://laparrej.free.fr/pro_sw.htm'),
(1, 1, 'chaque axe fait l&apos;objet d&apos;une configuration dans le fichier But&eacute;e', ''),
(1, 2, '&eacute;clat&eacute; sur un fichier séparé', ''),
(1, 3, 'contient les dessins de d&eacute;finition', ''),
(2, 1, 'pas de contrainte limite pour la tige de v&eacute;rin', ''),
(2, 2, 'contient des configurations', ''),
(2, 3, 'ne contient pas le dessin d&apos;ensemble', ''),
(15, 1, 'maquette bloqu&eacute;e', ''),
(15, 1, 'dessins de d&eacute;finition', ''),
(3, 1, 'le fichier s&apos;apelle Assemblage2', ''),
(3, 2, 'la maquette est mobile', ''),
(3, 3, 'pas de simulation des clapets', ''),
(5, 1, 'une des configurations est un &eacute;corch&eacute;', ''),
(5, 2, 'maquette fixe', ''),
(5, 3, 'source : J&eacute;r&ocirc;me Laparre', 'http://laparrej.free.fr/pro_sw.htm#e'),
(6, 1, 'source J&eacute;r&ocirc;me Laparre', 'http://laparrej.free.fr/pro_sw.htm#e'),
(6, 1, 'maquette construite &agrave; partir des classes d&apos;&eacute;quivalence', ''),
(8, 0, 'contient d&apos;autres dessins que le dessin d&apos;ensemble', ''),
(8, 0, 'dans le commerce', 'https://www.bricodepot.fr/beauvais/mini-coupe-tube/prod5924/'),
(9, 0, 'les rouleaux ne roulent pas correctement sur la came', ''),
(9, 1, 'dessin d''&apos;ensemble absent', ''),
(10, 0, 'par défaut le corps est cach&eacute;', ''),
(10, 1, 'rajout d&apos;une contrainte limite', ''),
(11, 0, 'contient une configuration pour les &eacute;tapes de l&apos;assemblage', ''),
(12, 2, 'plusieurs fichiers au lieus d&apos;utiliser des configurations', ''),
(12, 1, 'le fichier pr&eacute;henseur pour &eacute;tude d''ouverture permet de voir le fonctionnement', ''),
(18, 0, 'Ajout d&apos;une contrainte limite pour simuler les fins de course angulaire du levier.', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
