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
-- Structure de la vue 'Vue_lien_support'
--

CREATE ALGORITHM=UNDEFINED DEFINER=`dossiers.techniques`@`172.20.%` SQL SECURITY DEFINER VIEW dossiers_techniques.Vue_lien_support AS select dossiers_techniques.Commentaires.support_ID AS support_ID,concat(_latin1'<a href="',dossiers_techniques.Commentaires.lien,_latin1'" target="_blank">',dossiers_techniques.Commentaires.texte,_latin1'</a>') AS lien from dossiers_techniques.Commentaires where (dossiers_techniques.Commentaires.lien <> _latin1'') order by dossiers_techniques.Commentaires.ordre;

--
-- VIEW  'Vue_lien_support'
-- Données: aucune
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
