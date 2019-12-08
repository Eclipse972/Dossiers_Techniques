-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Dim 08 Décembre 2019 à 12:14
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
-- Structure de la vue `Vue_code_menu`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_code_menu` AS select `Menu`.`support_ID` AS `support_ID`,`Menu`.`item` AS `item`,`Menu`.`sous_item` AS `sous_item`,concat(_latin1'<li><a href="pageDT.php?p=',char((97 + `Menu`.`support_ID`)),char((97 + `Menu`.`item`)),if((`Menu`.`sous_item` > 0),char((97 + `Menu`.`sous_item`)),_utf8''),_latin1'">',`Menu`.`texte`,_latin1'</a></li>') AS `code` from `Menu` order by `Menu`.`support_ID`,`Menu`.`item`,`Menu`.`sous_item`;

--
-- VIEW  `Vue_code_menu`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
