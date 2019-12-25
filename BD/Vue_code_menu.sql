-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Mer 25 Décembre 2019 à 08:52
-- Version du serveur: 5.0.83
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: 'dossiers_techniques'
--

-- --------------------------------------------------------

--
-- Structure de la vue 'Vue_code_menu'
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW dossiers_techniques.Vue_code_menu AS select dossiers_techniques.Menu.support_ID AS support_ID,dossiers_techniques.Menu.item AS item,dossiers_techniques.Menu.sous_item AS sous_item,concat(_utf8'<li><a href="pageDT.php?s=',cast(dossiers_techniques.Menu.support_ID as char(2) charset utf8),_utf8'&m=',char((97 + dossiers_techniques.Menu.item)),if((dossiers_techniques.Menu.sous_item > 0),char((97 + dossiers_techniques.Menu.sous_item)),_utf8''),_utf8'">',convert(dossiers_techniques.Menu.texte using utf8),_utf8'</a></li>') AS `code` from dossiers_techniques.Menu order by dossiers_techniques.Menu.support_ID,dossiers_techniques.Menu.item,dossiers_techniques.Menu.sous_item;

--
-- VIEW  'Vue_code_menu'
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
