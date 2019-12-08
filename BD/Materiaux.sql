-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Dim 08 Décembre 2019 à 12:13
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
-- Structure de la table `Materiaux`
--

CREATE TABLE IF NOT EXISTS `Materiaux` (
  `ID` int(11) unsigned NOT NULL auto_increment,
  `formule` varchar(99) collate latin1_general_ci NOT NULL,
  `URL_wiki` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `formule` (`formule`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `Materiaux`
--

INSERT INTO `Materiaux` (`ID`, `formule`, `URL_wiki`) VALUES
(0, '', ''),
(1, '45 Si 8', 'Acier#Aciers_faiblement_alli.C3.A9s'),
(2, 'AU4-G', 'Dural'),
(3, 'C 40', 'Acier#Aciers_non_alli.C3.A9s_sp.C3.A9ciaux_.28type_C.29'),
(4, 'C 60', 'Acier#Aciers_non_alli.C3.A9s_sp.C3.A9ciaux_.28type_C.29'),
(5, 'Cu Zn 15', 'Alliage_de_cuivre'),
(6, 'Cu Zn 39 Pb 2', 'Alliage_de_cuivre'),
(7, 'CW 453K', 'Bronze'),
(8, 'E 335', 'Acier#Aciers_non_alli.C3.A9s_d.27usage_g.C3.A9n.C3.A9ral'),
(9, 'EN AW 2017', 'D%C3%A9signation_des_m%C3%A9taux_et_alliages#Alliage_d.27aluminium_destin.C3.A9s_au_corroyage'),
(10, 'PF 21 (Bak&eacute;lite)', 'Bak%C3%A9lite'),
(11, 'PMMA', 'Polym%C3%A9thacrylate_de_m%C3%A9thyle'),
(12, 'S 235', 'Acier#Aciers_non_alli.C3.A9s'),
(13, 't&eacute;flon', 'T%C3%A9flon'),
(14, 'S 275', 'Acier#Aciers_non_alli.C3.A9s'),
(15, 'stub', ''),
(16, 'h&ecirc;tre', ''),
(17, 'EN-GJS-600-2', 'Fonte_(m%C3%A9tallurgie)#Fonte_GS_(graphite_sph%C3%A9ro%C3%AFdal,_aussi_appel%C3%A9e_fonte_ductile)'),
(18, 'C 55', 'Acier#Aciers_non_alli.C3.A9s_sp.C3.A9ciaux_.28type_C.29'),
(19, '55 Cr3', 'Acier#Aciers_faiblement_alli.C3.A9s'),
(20, 'E 295', 'Acier#Aciers_non_alli.C3.A9s_d.27usage_g.C3.A9n.C3.A9ral'),
(21, 'C35', 'Acier#Aciers_non_alli.C3.A9s_sp.C3.A9ciaux_.28type_C.29'),
(22, 'S 185', 'Acier#Aciers_non_alli.C3.A9s'),
(23, 'X 12 Cr 13', 'Désignation_des_métaux_et_alliages#Aciers'),
(24, 'Cu Al10 Fe', 'Alliage_de_cuivre'),
(25, 'EN AW 2018', 'D%C3%A9signation_des_m%C3%A9taux_et_alliages#Alliage_d.27aluminium_destin.C3.A9s_au_corroyage'),
(26, 'PTFE', 'Polytétrafluoroéthylène'),
(27, 'GE 295', 'Acier#Aciers_non_alli%C3%A9s_d''usage_g%C3%A9n%C3%A9ral');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
