-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Mar 24 Décembre 2019 à 02:45
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
-- Structure de la vue `Vue_Hydrate_Page`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_Hydrate_Page` AS select `Menu`.`support_ID` AS `support_ID`,`Menu`.`item` AS `item`,`Menu`.`sous_item` AS `sous_item`,`HydratePage`.`variable` AS `variable`,`HydratePage`.`valeur` AS `valeur` from (`HydratePage` join `Menu`) where (`Menu`.`ID` = `HydratePage`.`menu_ID`) order by `Menu`.`support_ID`,`Menu`.`item`,`Menu`.`sous_item`,`HydratePage`.`variable`;

--
-- VIEW  `Vue_Hydrate_Page`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
