-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Dim 08 Décembre 2019 à 12:15
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
-- Structure de la vue `Vue_nomenclature`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW `Vue_nomenclature` AS select `Supports`.`ID` AS `ID`,concat(_utf8'	<td>',cast(`Pieces`.`repere` as char(2) charset utf8),_utf8'</td>\n') AS `rep`,concat(_latin1'	',_latin1'<td><a href="Supports/',`Supports`.`dossier`,_latin1'/fichiers/',`Pieces`.`fichier`,convert(if((`Pieces`.`assemblage` = 0),_utf8'.EPRT',_utf8'.EASM') using latin1),_latin1'"><img src="Supports/',`Supports`.`dossier`,_latin1'/images/',`Pieces`.`fichier`,_latin1'.png" alt="',`Pieces`.`nom`,_latin1'"></a>',_latin1'</td>\n') AS `lien_image`,concat(_utf8'	<td>',convert(`Pieces`.`nom` using utf8),if((`Pieces`.`quantite` > 1),concat(_utf8' (x',cast(`Pieces`.`quantite` as char(2) charset utf8),_utf8')'),_utf8''),_utf8'</td>\n') AS `designation`,if((`Supports`.`type_nomenclature` < 2),_latin1'',concat(_latin1'	<td>',if((`Materiaux`.`URL_wiki` = _latin1''),`Materiaux`.`formule`,concat(_latin1'<a href="https://fr.wikipedia.org/wiki/',`Materiaux`.`URL_wiki`,_latin1'" target="_blank">',`Materiaux`.`formule`,_latin1'</a>')),_latin1'</td>\n')) AS `matiere`,if(((`Supports`.`type_nomenclature` = 0) or (`Supports`.`type_nomenclature` = 2)),_latin1'',concat(_latin1'	<td>',`Pieces`.`observation`,_latin1'</td>\n')) AS `observation` from ((`Supports` join `Pieces`) join `Materiaux`) where ((`Pieces`.`matiere_ID` = `Materiaux`.`ID`) and (`Supports`.`ID` = `Pieces`.`support_ID`)) order by `Supports`.`ID`,`Pieces`.`repere`;

--
-- VIEW  `Vue_nomenclature`
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
