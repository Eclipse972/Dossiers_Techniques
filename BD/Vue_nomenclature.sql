-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Mer 25 Décembre 2019 à 08:54
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
-- Structure de la vue 'Vue_nomenclature'
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW dossiers_techniques.Vue_nomenclature AS select dossiers_techniques.Supports.ID AS support_ID,concat(_utf8'<td>',cast(dossiers_techniques.Pieces.repere as char(2) charset utf8),_utf8'</td>') AS repere,concat(_latin1'<td><a href="Supports/',dossiers_techniques.Supports.dossier,_latin1'/fichiers/',dossiers_techniques.Pieces.fichier,convert(if((dossiers_techniques.Pieces.assemblage = 0),_utf8'.EPRT',_utf8'.EASM') using latin1),_latin1'"><img src="Supports/',dossiers_techniques.Supports.dossier,_latin1'/images/',dossiers_techniques.Pieces.fichier,_latin1'.png" alt="',dossiers_techniques.Pieces.nom,_latin1'"></a>',_latin1'</td>') AS lien_image,concat(_utf8'<td>',convert(dossiers_techniques.Pieces.nom using utf8),if((dossiers_techniques.Pieces.quantite > 1),concat(_utf8' (x',cast(dossiers_techniques.Pieces.quantite as char(2) charset utf8),_utf8')'),_utf8''),_utf8'</td>') AS designation,concat(_latin1'<td>',if((dossiers_techniques.Pieces.matiere_ID = 0),_latin1'',concat(_latin1'<a href="https://fr.wikipedia.org/wiki/',dossiers_techniques.Materiaux.URL_wiki,_latin1'" target="_blank">',dossiers_techniques.Materiaux.formule,_latin1'</a>')),_latin1'</td>') AS matiere,concat(_latin1'<td>',dossiers_techniques.Pieces.observation,_latin1'</td>') AS observation from ((dossiers_techniques.Supports join dossiers_techniques.Pieces) join dossiers_techniques.Materiaux) where ((dossiers_techniques.Pieces.matiere_ID = dossiers_techniques.Materiaux.ID) and (dossiers_techniques.Supports.ID = dossiers_techniques.Pieces.support_ID)) order by dossiers_techniques.Supports.ID,dossiers_techniques.Pieces.repere;

--
-- VIEW  'Vue_nomenclature'
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
