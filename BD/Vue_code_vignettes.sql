-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Dim 08 Décembre 2019 à 12:43
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
-- Structure de la vue `Vue_code_vignettes`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_code_vignettes` AS select concat(_utf8'<td><a href="pageDT.php?s=',cast(`Supports`.`ID` as char(2) charset utf8),_utf8'">',convert(`Supports`.`nom` using utf8),_utf8'<br><img src="Supports/',convert(`Supports`.`dossier` using utf8),_utf8'/images/',convert(`Supports`.`pti_nom` using utf8),_utf8'.png" alt="',convert(`Supports`.`nom` using utf8),_utf8'"></a></td>') AS `code` from `Supports` order by `Supports`.`pti_nom`,`Supports`.`nom`;

--
-- VIEW  `Vue_code_vignettes`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
