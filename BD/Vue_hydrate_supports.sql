-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Mer 18 Décembre 2019 à 14:50
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
-- Structure de la vue `Vue_hydrate_supports`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_hydrate_supports` AS select `Supports`.`ID` AS `ID`,`Supports`.`nom` AS `nom`,`Supports`.`pti_nom` AS `pti_nom`,`Supports`.`type_nomenclature` AS `type_nomenclature`,concat(convert(if((`Supports`.`article_ID` = 1),_utf8'du ',if((`Supports`.`article_ID` = 2),_utf8'de la ',_utf8'de l&apos;')) using latin1),`Supports`.`nom`) AS `du_support`,concat(convert(if((`Supports`.`article_ID` = 1),_utf8'le ',if((`Supports`.`article_ID` = 2),_utf8'la ',_utf8'l&apos;')) using latin1),`Supports`.`nom`) AS `le_support`,concat(_latin1'Supports/',`Supports`.`dossier`,_latin1'/') AS `dossier`,concat(_latin1'Supports/',`Supports`.`dossier`,_latin1'/fichiers/',`Supports`.`pti_nom`,_latin1'.zip') AS `zip`,concat(_latin1'Supports/',`Supports`.`dossier`,_latin1'/images/',`Supports`.`pti_nom`,_latin1'.png') AS `image` from `Supports`;

--
-- VIEW  `Vue_hydrate_supports`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
