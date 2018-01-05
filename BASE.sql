-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Ven 05 Janvier 2018 à 20:35
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
-- Structure de la table `Articles`
--

CREATE TABLE IF NOT EXISTS `Articles` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `du` varchar(10) collate latin1_general_ci NOT NULL,
  `le` varchar(7) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='articles pour le nom des supports' AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Articles`
--

INSERT INTO `Articles` (`ID`, `du`, `le`) VALUES
(1, 'du ', 'le '),
(2, 'de la ', 'la '),
(3, 'de l&apos;', 'l&apos;');

-- --------------------------------------------------------

--
-- Structure de la table `Associations_image-fichier`
--

CREATE TABLE IF NOT EXISTS `Associations_image-fichier` (
  `support_ID` int(10) unsigned NOT NULL,
  `type_ID` int(10) unsigned NOT NULL,
  `image` varchar(32) collate latin1_general_ci NOT NULL,
  `fichier` varchar(32) collate latin1_general_ci NOT NULL,
  UNIQUE KEY `suppoort-type` (`support_ID`,`type_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `Associations_image-fichier`
--

INSERT INTO `Associations_image-fichier` (`support_ID`, `type_ID`, `image`, `fichier`) VALUES
(0, 1, 'dessin_BP', 'BP'),
(0, 2, 'eclate_BP', 'BP'),
(2, 1, 'dessin_cambreuse', 'cambreuse'),
(2, 2, 'eclate_cambreuse', 'cambreuse'),
(3, 1, 'dessin_cric', 'cric'),
(3, 2, 'eclate_cric', 'cric'),
(5, 1, 'dessin_electrovanne', 'electrovanne'),
(5, 2, 'eclate_electrovanne', 'electrovanne'),
(6, 1, 'dessin_etau', 'etau'),
(6, 2, 'eclate_etau', 'etau'),
(7, 1, 'dessin_extracteur', 'extracteur'),
(7, 2, 'eclate_extracteur', 'extracteur'),
(8, 1, 'dessin_mini_coupe-tube', 'mini_coupe-tube'),
(8, 2, 'eclate_mini_coupe-tube', 'mini_coupe-tube'),
(9, 1, 'dessin_pince', 'pince'),
(9, 2, 'eclate_pince', 'pince'),
(10, 2, 'eclate_pince', 'pince'),
(11, 1, 'dessin_pompe', 'pompe'),
(11, 2, 'eclate_pompe', 'pompe'),
(13, 1, 'dessin_vanne', 'vanne'),
(13, 2, 'eclate_vanne', 'vanne'),
(15, 1, 'dessin_casseNoix', 'casseNoix'),
(15, 2, 'eclate_casseNoix', 'casseNoix');

-- --------------------------------------------------------

--
-- Structure de la table `Items_menu`
--

CREATE TABLE IF NOT EXISTS `Items_menu` (
  `support_ID` int(10) unsigned NOT NULL,
  `item` tinyint(1) unsigned NOT NULL,
  `sous_item` tinyint(1) unsigned NOT NULL,
  `texte` text collate latin1_general_ci NOT NULL,
  `script` varchar(20) collate latin1_general_ci NOT NULL,
  UNIQUE KEY `support-page unique` (`support_ID`,`item`,`sous_item`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `Items_menu`
--

INSERT INTO `Items_menu` (`support_ID`, `item`, `sous_item`, `texte`, `script`) VALUES
(0, 1, 0, 'Mise en situation', 'MES'),
(0, 2, 0, 'Diagramme pieuvre', 'pieuvre'),
(0, 3, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(0, 4, 0, '&Eacute;clat&eacute;', 'eclate'),
(0, 5, 0, 'Nomenclature', 'nomenclature'),
(1, 1, 0, 'Mise en situation', 'MES'),
(1, 2, 0, 'Nomenclature', 'nomenclature'),
(1, 3, 0, '&Eacute;clat&eacute;', 'eclate'),
(2, 1, 0, 'Mise en situation', 'MES'),
(2, 2, 0, 'Fonctionnement', 'fonctionnement'),
(2, 2, 1, '&Eacute;tape 1', 'position1'),
(2, 2, 2, '&Eacute;tape 2', 'position2'),
(2, 2, 3, '&Eacute;tape 3', 'position3'),
(2, 3, 0, 'Caract&eacute;ristiques', 'caracteristiques'),
(2, 4, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(2, 5, 0, '&Eacute;clat&eacute;', 'eclate'),
(3, 1, 0, 'Mise en situation', 'MES'),
(3, 2, 0, 'Fonctionnement', 'fonctionnement'),
(3, 2, 1, 'Mont&eacute;e', 'montee'),
(3, 2, 2, 'Descente', 'descente'),
(3, 3, 0, 'Analyse fonctionnelle', 'pieuvre'),
(3, 4, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(3, 5, 0, 'Nomenclature', 'nomenclature'),
(3, 6, 0, '&Eacute;clat&eacute;', 'eclate'),
(4, 1, 0, 'Mise en situation', 'MES'),
(4, 2, 0, 'Fonctionnement', 'fonctionnement'),
(4, 2, 1, 'mont&eacute;e', 'monte'),
(4, 2, 2, 'descente', 'descend'),
(4, 2, 3, 'pr&eacute;cautions d&apos;utilisation', 'precautions'),
(4, 3, 0, 'Mouvements du cric', 'mvt'),
(4, 3, 1, 'de face', 'mvt-face'),
(4, 3, 2, 'en perspective', 'mvt-3d'),
(4, 4, 0, 'Analyse fonctionnelle', 'AF'),
(4, 4, 1, 'diagramme des int&eacute;racteurs', 'pieuvre'),
(4, 4, 2, 'FAST "Levage du v&eacute;hicule"', 'fast_levage'),
(4, 4, 3, 'FAST "D&eacute;pose du v&eacute;hicule"', 'fast_depose'),
(4, 5, 0, '&Eacute;clat&eacute;', 'eclate_cric'),
(4, 6, 0, 'Nomenclature', 'nomenclature'),
(4, 7, 0, 'Nomenclature', 'nomenclature'),
(4, 8, 0, 'Entretien du cric', 'entretien'),
(4, 8, 1, 'Probl&egrave;me au levage', 'pb_levage'),
(4, 8, 2, 'Probl&egrave;me à la descente', 'pb_descente'),
(5, 1, 0, 'Mise en situation', 'MES'),
(5, 2, 0, 'Fonctionnement', 'fonctionnement'),
(5, 3, 0, 'Analyse fonctionnelle', 'AF'),
(5, 4, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(5, 5, 0, 'Nomenclature', 'nomenclature'),
(6, 1, 0, 'Mise en situation', 'MES'),
(6, 2, 0, 'Fonctionnement', 'fonctionnement'),
(6, 3, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(6, 4, 0, 'Nomenclature', 'nomenclature'),
(6, 5, 0, '&Eacute;clat&eacute;', 'eclate'),
(6, 6, 0, 'Classes d&apos;&eacute;quivalence', 'CE'),
(7, 1, 0, 'Mise en situation', 'MES'),
(7, 2, 0, 'Fonctionnement', 'fonctionnement'),
(7, 3, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(7, 4, 0, 'Nomenclature', 'nomenclature'),
(7, 5, 0, '&Eacute;clat&eacute;', 'eclate'),
(8, 1, 0, 'Mise en situation', 'MES'),
(8, 2, 0, 'Diagramme A-0', 'A-0'),
(8, 3, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(8, 4, 0, '&Eacute;clat&eacute;', 'eclate'),
(8, 5, 0, 'Nomenclature', 'nomenclature'),
(9, 1, 0, 'Mise en situation', 'MES'),
(9, 2, 0, 'Fonctionnement', 'fonctionnement'),
(9, 3, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(9, 4, 0, 'Nomenclature', 'nomenclature'),
(9, 5, 0, '&Eacute;clat&eacute;', 'eclate'),
(10, 1, 0, 'Mise en situation', 'MES'),
(10, 2, 0, 'Fonctionnement', 'fonctionnement'),
(10, 3, 0, 'Nomenclature', 'nomenclature'),
(10, 4, 0, '&Eacute;clat&eacute;', 'eclate'),
(11, 1, 0, 'Mise en situation', 'MES'),
(11, 2, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(11, 3, 0, 'Nomenclature', 'nomenclature'),
(11, 4, 0, '&Eacute;clat&eacute;', 'eclate'),
(12, 1, 0, 'Mise en situation', 'MES'),
(12, 1, 1, 'Dispositif de transfert', 'dispositif_transfert'),
(12, 1, 2, '&eacute;tape 1', 'transfert1'),
(12, 1, 4, '&eacute;tape 2', 'transfert2'),
(12, 1, 5, '&eacute;tape 3 et 4', 'transfert3et4'),
(12, 1, 6, '&eacute;tape 5', 'transfert5'),
(12, 1, 7, '&eacute;tape 6', 'transfert6'),
(12, 2, 0, '&Eacute;clat&eacute;', 'eclate_CE'),
(12, 2, 1, 'CE1: b&acirc;ti', 'CE1'),
(12, 2, 2, 'CE2: tige de v&eacute;rin', 'CE2'),
(12, 2, 3, 'CE3: biellette', 'CE3'),
(12, 2, 4, 'CE4: deux doigts', 'CE4'),
(12, 2, 5, 'CE5: un doigt', 'CE5'),
(12, 3, 0, 'M&eacute;canique', 'mecanique'),
(12, 3, 1, 'd&eacute;placement de la tige''', 'tige'),
(12, 3, 2, 'd&eacute;placement de la pince', 'pince'),
(12, 3, 3, 'effort de la tige de v&eacute;rin', 'effort_verin'),
(12, 3, 4, 'effort de l&apos;articulation', 'effort_articulation'),
(13, 1, 0, 'Mise en situation', 'MES'),
(13, 2, 0, 'Fonctionnement', 'fonctionnement'),
(13, 3, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(13, 4, 0, 'Nomenclature', 'nomenclature'),
(13, 5, 0, '&Eacute;clat&eacute;', 'eclate'),
(14, 1, 0, 'Mise en situation', 'MES'),
(14, 2, 0, 'Vue d&apos;ensemble', 'ensemble'),
(14, 3, 0, 'Vue &eacute;clat&eacute;e', 'vue_eclatee'),
(14, 4, 0, 'Nomenclature', 'nomenclature'),
(15, 1, 0, 'Mise en situation', 'MES'),
(15, 2, 0, 'Diagramme A-0', 'A-0'),
(15, 3, 0, 'Dessin d&apos;ensemble', 'dessin_densemble'),
(15, 4, 0, '&Eacute;clat&eacute;', 'eclate'),
(15, 5, 0, 'Nomenclature', 'nomenclature');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `Materiaux`
--

INSERT INTO `Materiaux` (`ID`, `formule`, `URL_wiki`) VALUES
(0, '', '#'),
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
(15, 'stub', '#'),
(16, 'h&ecirc;tre', '');

-- --------------------------------------------------------

--
-- Structure de la table `Pieces`
--

CREATE TABLE IF NOT EXISTS `Pieces` (
  `support_ID` int(10) unsigned NOT NULL,
  `nom` varchar(64) collate latin1_general_ci NOT NULL,
  `repere` int(10) unsigned NOT NULL,
  `quantite` int(10) unsigned NOT NULL,
  `matiere_ID` int(10) NOT NULL default '0',
  `observation` text collate latin1_general_ci NOT NULL,
  `fichier` varchar(32) collate latin1_general_ci NOT NULL,
  `assemblage` tinyint(3) unsigned NOT NULL default '0',
  KEY `support-repère` (`support_ID`,`repere`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Listes des pièces de chaque support';

--
-- Contenu de la table `Pieces`
--

INSERT INTO `Pieces` (`support_ID`, `nom`, `repere`, `quantite`, `matiere_ID`, `observation`, `fichier`, `assemblage`) VALUES
(14, 'carter gauche', 1, 1, 0, '', 'carter_gauche', 0),
(14, 'carter droit', 3, 1, 2, '', 'carter_droit', 0),
(14, 'rotor &agrave; griffes', 4, 1, 0, '', 'rotorAgriffes', 1),
(14, 'stator', 5, 1, 0, '', 'stator', 0),
(14, 'arbre du rotor', 6, 1, 0, '', 'arbreDUrotor', 0),
(14, 'rondelle', 10, 1, 0, '', 'rondelle', 0),
(14, 'poulie pour courroie polyV', 11, 1, 0, '', 'poulie', 0),
(14, '&eacute;crou', 12, 1, 0, '', 'ecrou', 0),
(14, 'vis ISO M5x85x26', 15, 4, 0, '', 'vis_ISO_M5x85x26', 0),
(14, 'plaque support de roulement', 20, 1, 0, '', 'plaque', 0),
(14, 'roulement ?int 17 ?ext 52  l : 17 - 2RS', 21, 1, 0, '', 'roulement1', 0),
(14, 'roulement 6202', 22, 1, 0, '', 'roulement2', 0),
(14, 'bague de roulement', 23, 1, 13, '', 'bague2roulement', 0),
(14, 'joint', 25, 1, 0, '', 'joint', 0),
(0, 'Corps', 1, 1, 10, '', 'Corps', 0),
(0, 'Borne', 2, 2, 5, 'Cadmi&eacute;', 'borne', 0),
(0, 'Vis CS M2-4', 3, 4, 6, '', 'Vis_CS', 0),
(0, 'Fourreau', 4, 1, 6, 'Cadmi&eacute;', 'Fourreau', 0),
(0, '&Eacute;crou H M12-1', 5, 1, 5, 'Cadmi&eacute;', 'Ecrou_H', 0),
(0, '&Eacute;crou molet&eacute;', 6, 1, 5, 'Cadmi&eacute;', 'Ecrou_molete', 0),
(0, 'Ressort', 7, 1, 1, '', 'Ressort', 0),
(0, 'Rondelle de contact', 8, 1, 5, '&Eacute;tam&eacute;e', 'Rondelle', 0),
(0, 'Cylindre de pouss&eacute;e', 9, 1, 10, 'Coll&eacute; dans 11', 'Cylindre', 0),
(0, 'Vis FS M2.5-18', 10, 1, 6, '', 'Vis_FS', 0),
(0, 'Poussoir', 11, 1, 12, 'Chrom&eacute;', 'Poussoir', 0),
(1, 'socle', 1, 1, 9, '', 'socle', 0),
(1, 'contre embase', 2, 1, 9, '', 'contreembase', 0),
(1, 'module bis', 3, 1, 9, '', 'module', 0),
(1, 'axe', 4, 1, 9, '', 'axe4', 0),
(1, 'vis CHc M4 - 55', 5, 1, 9, '', 'vis4x55', 0),
(1, 'embase', 6, 1, 9, 'commerce', 'embase', 0),
(1, 'intermédiaire', 7, 1, 9, '', 'intermediaire', 0),
(1, 'bouton', 8, 1, 9, '', 'bouton', 0),
(1, 'tige filetée', 9, 1, 9, 'commerce', 'tige_filetee', 0),
(1, 'axe', 10, 1, 9, '', 'axe10', 0),
(1, 'embout', 11, 1, 9, '', 'embout', 0),
(1, 'tige', 12, 1, 9, '', 'tige', 0),
(2, 'Table', 1, 1, 0, 'non repr&eacute;sent&eacute;e', 'Table', 0),
(2, 'Corps de v&eacute;rin ISO 6431 63X50', 2, 1, 0, '', 'corps2verin', 1),
(2, 'Corps de v&eacute;rin ISO 6431 80X50', 3, 1, 0, '', 'corps2verin2', 1),
(2, 'Tige de v&eacute;rin ISO 6431 63X50', 4, 1, 0, '', 'tige2verin', 1),
(2, 'Tige de v&eacute;rin ISO 6431 80X50', 5, 1, 0, '', 'tige2verin2', 1),
(2, 'Vis H M8x65', 6, 1, 0, 'NF EN ISO 4017', 'visHM8x65', 0),
(2, 'Basculeur usin&eacute;', 7, 1, 9, '', 'basculeur', 0),
(2, 'Axe de bielle', 8, 1, 3, '', 'axe2bielle', 0),
(2, 'Coussinet 12-18x12', 9, 2, 7, 'ISO 2795', 'coussinet12-18x12', 0),
(2, 'Bielle', 10, 1, 8, '', 'bielle', 0),
(2, 'Coussinet 12-18x16', 11, 3, 7, 'ISO 2795', 'coussinet12-18x16', 0),
(2, 'Coussinet 16-22x16', 12, 1, 7, 'ISO 2795', 'coussinet16-22x16', 0),
(2, 'Chape', 13, 1, 12, '', 'chape', 0),
(2, 'Axe de chape', 14, 1, 3, '', 'Axe2chape', 0),
(2, 'But&eacute;e', 15, 1, 12, '', 'butee', 0),
(2, 'Bride de blocage', 16, 1, 3, 'Tremp&eacute;', 'Bride2blocage', 0),
(2, 'Bride', 17, 1, 3, '', 'Bride', 0),
(2, 'Flasque', 18, 2, 9, '', 'Flasque', 0),
(2, 'Plaque de support de v&eacute;rin de cambrage', 19, 1, 0, '', 'Plaque_cambrage', 0),
(2, 'Plaque de support de v&eacute;rin de bridage', 20, 1, 0, '', 'Plaque_bridage', 0),
(2, 'Cale', 21, 1, 9, '', 'Cale', 0),
(2, 'Support de fixation', 22, 4, 12, '', 'Support2fixation', 0),
(2, 'Bride d&apos;arbre', 23, 4, 12, '', 'Bride_darbre', 0),
(2, 'Tige de guidage', 24, 2, 0, '', 'Tige2guidage', 0),
(2, 'Plaque support de posoir', 25, 1, 12, '', 'Plaque_support2posoir', 0),
(2, 'Support de vis d&apos;arr&ecirc;t', 26, 1, 12, '', 'Support2vis_darret', 0),
(2, 'Support d&apos:axe d&apos;&eacute;querre', 27, 2, 0, '', 'Support_daxe_dequerre', 0),
(2, 'Axe d&apos;&eacute;querre', 28, 2, 0, '', 'Axe_dequerre', 0),
(2, '&Eacute;crou H M8', 29, 1, 0, 'ISO EN 4032', 'EcrouHM8', 0),
(2, 'Vis CHC M6-16-14', 30, 20, 0, '', 'CHCM6-16-14', 0),
(2, 'Vis CHC M8-16-14', 31, 16, 0, '', 'CHCM8-16-14', 0),
(2, 'Support de but&eacute;e', 32, 1, 3, '', 'Support2butee', 0),
(2, 'But&eacute;e de positionnement ext&eacute;rieure', 33, 5, 3, '', 'Butee2positionnement_ext', 0),
(2, 'Goupille 3 x 20', 34, 2, 0, 'ISO 8752', 'Goupille3x20', 0),
(2, 'Vis t&ecirc;te frais&eacute;e M6-12', 35, 4, 0, 'ISO 10642', 'VisFSM6-12', 0),
(2, 'Appui fil d=8 L = 150', 36, 1, 0, '', 'Appui_fil_d8_L150', 0),
(2, 'Branche gauche', 37, 1, 0, '', 'branche_gauche', 0),
(2, 'Branche droite', 38, 1, 0, '', 'branche_droite', 1),
(8, 'Corps', 1, 1, 0, '', 'corps', 0),
(8, 'Coulisseau', 2, 1, 0, '', 'coulisseau', 0),
(8, 'Rouleau', 3, 2, 0, '', 'rouleau', 0),
(8, 'Axe de rouleau', 4, 2, 0, '', 'axe2rouleau', 0),
(8, 'Molette', 5, 1, 0, '', 'molette', 0),
(8, 'Axe de molette', 6, 1, 0, '', 'axe2molette', 0),
(8, 'Axe de manoeuvre', 7, 1, 0, '', 'axe2manoeuvre', 0),
(8, 'Anneau &eacute;lastique d&apos;arbre', 8, 1, 0, '', 'anneau_elastique', 0),
(8, 'Bouton de manoeuvre', 9, 1, 0, '', 'bouton2manoeuvre', 0),
(3, 'Embase de cric', 1, 1, 9, '', 'Embase', 0),
(3, 'Corps de pompe', 2, 1, 9, '', 'Corps2pompe', 0),
(3, 'Piston de pompe', 3, 1, 12, '', 'piston_pompe', 0),
(3, 'Axe d&apos;articulation', 4, 2, 12, '', 'axe_articulation', 0),
(3, 'Segment d&apos;arr&ecirc;t radial 6 x 0,7', 5, 4, 0, '', 'segment_arret', 0),
(3, 'Articulation', 6, 1, 9, '', 'articulation', 0),
(3, 'Piston r&eacute;cepteur', 7, 1, 9, '', 'piston_recepteur', 0),
(3, 'Couvercle', 8, 1, 9, '', 'Couvercle', 0),
(3, 'Cylindre principal', 9, 1, 11, 'Polym&eacute;thylm&eacute;thacrylate', 'cylindre_principal', 0),
(3, 'R&eacute;servoir', 10, 1, 11, 'Polym&eacute;thylm&eacute;thacrylate', 'reservoir', 0),
(3, '&Eacute;crou M4', 11, 4, 0, '', 'ecrouM4', 0),
(3, 'Rondelle M4', 12, 4, 0, '', 'rondelleM4', 0),
(3, 'Tirant', 13, 4, 12, '', 'tirant', 0),
(3, 'Biellette', 14, 1, 12, '', 'biellette', 0),
(3, 'Axe d&apos;articulation de chape', 15, 1, 0, '', 'axe_chape', 0),
(3, 'Pointeau', 16, 1, 0, 'Vis sans t&ecirc;te à bout plat HC M10-30 modifi&eacute;e', 'pointeau', 0),
(3, 'Joint de pointeau de retour', 17, 1, 0, '', 'joint2pointeau', 0),
(3, 'Chandelle', 18, 1, 9, '', 'Chandelle', 0),
(3, 'Bille de tarage', 19, 1, 0, '', 'bille_tarage', 0),
(3, 'Poussoir de tarage', 20, 1, 12, '', 'poussoir2tarage', 0),
(3, 'Ressort de tarage', 21, 1, 4, '', 'ressort2tarage', 0),
(3, 'Vis de tarage', 22, 1, 12, '', 'vis2tarage', 0),
(3, 'Bouchon de tarage', 23, 1, 0, '', 'bouchon_tarage', 0),
(3, 'Joint plat de bouchon de tarage', 24, 1, 0, '', 'joint2tarage', 0),
(3, 'Bouchon de remplissage', 25, 1, 0, '', 'bouchon2remplissage', 0),
(3, 'Bille d&apos;admission', 26, 1, 0, '', 'bille_admission', 0),
(3, 'Joint de pompe', 27, 1, 0, '', 'joint2pompe', 0),
(3, 'Joint torique de piston', 28, 1, 0, '', 'joint2piston', 0),
(3, 'Vis de fixation du corps de pompe', 29, 1, 0, '', 'vis2fixation_du_corps2pompe', 0),
(3, 'Levier', 30, 1, 12, '', 'levier', 0),
(3, 'Joint torique de r&eacute;servoir', 31, 1, 0, '', 'joint2reservoir', 0),
(3, 'Joint torique de corps de pompe', 32, 1, 0, '', 'joint_torique2corps2pompe', 0),
(4, 'Flasque gauche', 1, 1, 0, '', 'flasque_gauche', 1),
(4, 'Flasque droit', 2, 1, 0, '', 'flasque_droit', 1),
(4, 'Roulette directrice assembl&eacute;e', 3, 2, 0, '', 'roulette_directrice', 1),
(4, 'Roue avant', 4, 2, 0, '', 'roue_avant', 0),
(4, 'Axe roues avant', 5, 2, 0, '', 'axe_roues_avant', 0),
(4, 'Axe pivot v&eacute;rin', 6, 2, 0, '', 'axe_pivot_verin', 0),
(4, 'Axe pivot bras de levage', 7, 1, 0, '', 'axe_pivot_bras_levage', 0),
(4, 'Rondelle M12', 8, 6, 0, '', 'rondelleM12', 0),
(4, '&Eacute;crou hexagonal ISO 4032-M12', 9, 6, 0, '', 'ecrouM12', 0),
(4, 'Tourillon', 10, 2, 0, '', '', 0),
(4, 'Anneau &eacute;lastique pour arbre 10x1', 11, 2, 0, '', '', 0),
(4, 'Unit&eacute; hydraulique', 12, 1, 0, '', '', 0),
(5, 'Corps', 1, 1, 0, '', 'corps', 0),
(5, 'Membrane', 2, 1, 0, '', 'membrane', 0),
(5, 'Joint torique', 3, 2, 0, '', 'joint_torique', 0),
(5, 'Noyau', 4, 1, 0, '', 'noyau', 0),
(5, 'Ressort', 5, 1, 0, '', 'ressort', 0),
(5, 'Support', 6, 1, 0, '', 'support', 0),
(5, 'Axe guide', 7, 1, 0, '', 'axe_guide', 0),
(5, 'Bobine', 8, 1, 0, '', 'bobine', 0),
(5, 'Boitier', 9, 1, 0, '', 'boitier', 0),
(5, 'Vis CHc M5-25', 10, 1, 0, '', 'vis', 0),
(5, '&Eacute;crou', 11, 1, 0, '', 'ecrou', 0),
(6, 'Mors mobile', 1, 1, 0, '', 'mors-mobile', 0),
(6, 'Mors fixe', 2, 1, 0, '', 'mors-fixe', 0),
(6, 'Garniture de mors mobile', 3, 1, 0, '', 'garniture-mors-mobile', 0),
(6, 'Vis FS M5-20 5-6', 4, 4, 0, '', 'vis_FS_M5-20', 0),
(6, 'Garniture de mors fixe', 5, 1, 0, '', 'garniture-mors-fixe', 0),
(6, 'Vis de manoeuvre', 6, 1, 0, '', 'vis2manoeuvre', 0),
(6, '&Eacute;crou H M12-8', 7, 1, 0, '', 'ecrou-H-M12', 0),
(6, 'Bague de renfort', 8, 1, 0, '', 'bague2renfort', 0),
(6, 'Tige de poign&eacute;e', 9, 1, 0, '', 'tige2poignee', 0),
(6, 'Semelle', 10, 1, 0, '', 'semelle', 0),
(6, 'Vis CHc M5-10 - 8.8', 11, 2, 0, '', 'vis_CHC_M5-10', 0),
(6, 'Tige guide', 12, 2, 0, '', 'tige_guide', 0),
(6, 'Vis sans t&ecirc;te HC M4-6', 13, 2, 0, '', 'vis_HC_M4-6', 0),
(6, 'Goupille &eacute;lastique', 14, 1, 0, '', 'goupille_elastique_3x16', 0),
(6, 'Embout de tige de poign&eacute;e', 15, 2, 0, '', 'embout2poignee', 0),
(7, 'Corps', 1, 1, 0, '', 'corps', 0),
(7, 'Vis', 2, 1, 0, '', 'vis', 0),
(7, '&Eacute;crou', 3, 1, 0, '', 'ecrou', 0),
(7, 'Axe', 4, 2, 0, '', 'axe', 0),
(7, 'Doigt', 5, 2, 0, '', 'doigt', 0),
(10, 'Corps', 1, 1, 0, '', 'corps', 1),
(10, 'Vis', 2, 1, 0, '', 'vis', 0),
(10, '&Eacute;crou', 3, 1, 0, '', 'ecrou', 0),
(10, 'roulement &agrave; double rang&eacute;e de billes', 4, 1, 0, '', 'roulement', 1),
(10, 'Levier', 5, 2, 0, '', 'levier', 0),
(10, 'Doigt', 6, 2, 0, '', 'doigt', 0),
(10, 'Grande biellette', 7, 4, 0, '', 'grande_biellette', 0),
(10, 'Petite biellette', 8, 2, 0, '', 'petite_biellette', 0),
(11, 'Corps', 1, 1, 0, '', 'corps', 0),
(11, 'Coussinet &agrave; collerette', 2, 1, 0, '', 'Coussinet', 0),
(11, 'Arbre', 3, 1, 0, '', 'arbre', 0),
(11, 'Anneau &eacute;lastique pour arbre 16x1', 4, 1, 0, '', 'Anneau_elastique', 0),
(11, 'Embout de tube 3/8e', 5, 2, 0, '', 'Embout_tube', 0),
(11, 'Palette', 6, 2, 0, '', 'Palette', 0),
(11, 'Joint torique 50.40x3.53', 7, 1, 0, '', 'joint_torique', 0),
(11, 'Plaque', 8, 1, 0, '', 'plaque', 0),
(11, 'Vis ISO 10642-m3X12-8.8', 9, 8, 0, '', 'Vis', 0),
(13, 'Corps', 1, 1, 0, '', 'corps', 0),
(13, 'Raccord', 2, 2, 0, '', 'raccord', 0),
(13, 'Bille', 3, 1, 0, '', 'bille', 0),
(13, 'Joint de si&egrave;ge', 4, 2, 0, '', 'joint2siege', 0),
(13, 'Axe de manoeuvre', 5, 1, 0, '', 'axe2manoeuvre', 0),
(13, 'Rondelle but&eacute;e', 6, 1, 0, '', 'rondelle_butee', 0),
(13, 'Rondelle L3', 7, 1, 0, '', 'rondelle_L3', 0),
(13, 'Manette', 8, 1, 0, '', 'manette', 0),
(13, 'Vis', 9, 1, 0, '', 'vis', 0),
(13, 'Joint torique', 10, 1, 0, '', 'joint_torique', 0),
(13, 'Joint torique', 11, 2, 0, '', 'joint_torique2', 0),
(13, 'But&eacute;e', 12, 1, 0, '', 'butee', 0),
(9, 'Support de v&eacute;rin', 1, 1, 0, '', 'support2verin', 0),
(9, 'Fond', 2, 1, 0, '', 'fond', 0),
(9, 'Plaque avant', 3, 1, 0, '', 'plaque_avant', 0),
(9, 'Goupile ISO 87-34-5x16-A', 4, 4, 0, '', 'goupille', 0),
(9, 'T&ocirc;le de protection', 5, 1, 0, '', 'tole2protection', 0),
(9, 'Vis &eacute;paul&eacute;e M5x40 NF E 27-191', 6, 2, 0, '', 'vis_epauleeM5x40', 0),
(9, 'Entretoise', 7, 4, 0, '', 'entretoise', 0),
(9, 'Bras sup&eacute;rieur', 8, 1, 0, '', 'bras_superieur', 0),
(9, 'Bras inf&eacute;rieur', 9, 1, 0, '', 'bras_inferieur', 0),
(9, 'Carter sup&eacute;rieur', 10, 1, 0, '', 'carter_superieur', 0),
(9, 'Carter inf&eacute;rieur', 11, 1, 0, '', 'carter_inferieur', 0),
(9, 'Corps v&eacute;rin PES 32 P NA 254', 12, 1, 0, '', 'corps_verin', 0),
(9, 'Piston PES 32 NA 25 DM4', 13, 1, 0, '', 'piston', 1),
(9, 'Came', 14, 1, 0, '', 'came', 0),
(9, 'Axe', 15, 1, 0, '', 'axe', 0),
(9, 'Entretoise ep. 1.8', 16, 1, 0, '', 'entretoise_ep1.8', 0),
(9, 'Enclume', 17, 1, 0, '', 'enclume', 0),
(9, 'Plaque d&apos;appui', 18, 1, 0, '', 'plaque_dappui', 0),
(9, 'Poinçon', 19, 1, 0, '', 'poincon', 0),
(9, 'Roulement SNR 624EE', 20, 1, 0, '', 'roulement', 1),
(9, 'Vis FHC NF E 27-160M3X0,5-8-8.8', 21, 13, 0, '', 'visFHC', 0),
(9, 'Vis CZX NF E25-11 M3-0,5-10-4,8-1', 22, 8, 0, '', 'visCZX', 0),
(9, 'Vis sans t&ecirc;te &agrave; bout plat NF E-27-180 M3x0,5-8-3,3h', 23, 1, 0, '', 'vis_sans_tete', 0),
(9, 'Vis ISO 4762-M5x16-8.8', 24, 8, 0, '', 'visISO', 0),
(9, 'Ressort de rappel', 25, 1, 0, '', 'ressort', 0),
(15, 'colonne', 1, 2, 14, '', 'colonne', 0),
(15, 'embout', 3, 1, 6, '', 'embout', 0),
(15, 'levier', 2, 1, 15, '', 'levier', 0),
(15, 'excentrique', 4, 1, 6, '', 'excentrique', 0),
(15, 'piston', 5, 1, 14, '', 'piston', 0),
(15, 'coupelle', 6, 1, 9, '', 'coupelle', 0),
(15, 'r&eacute;hausse', 7, 1, 9, '', 'rehausse', 0),
(15, 'bague', 8, 1, 6, 'mont&eacute; serr&eacute; dans le bloc coulisse', 'bague', 0),
(15, 'bloc coulisse', 9, 1, 9, '', 'bloc_coulisse', 0),
(15, 'bloc pivot', 10, 2, 9, '', 'bloc_pivot', 0),
(15, 'socle', 11, 1, 16, '', 'socle', 0),
(15, 'goupille 6x26', 12, 1, 0, 'mont&eacute;e serr&eacute;e dans le bloc pivot', 'goupille', 0),
(15, 'vis CHc M5-16', 13, 2, 0, '', 'vis', 0),
(15, '&eacute;crou H M6', 14, 2, 0, '', 'ecrou', 0),
(15, 'rondelle ', 15, 2, 0, '', 'rondelle', 0),
(15, 'ressort dint=16, 10 spires', 16, 1, 0, '', 'ressort', 0),
(15, 'Vis sans t&ecirc;te HC &agrave; bout plat M5 - 6', 17, 2, 0, '', 'visSANStete', 0),
(15, 'plaquette support', 18, 1, 0, '', 'plaquette', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Supports`
--

CREATE TABLE IF NOT EXISTS `Supports` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `nom` varchar(32) collate latin1_general_ci NOT NULL,
  `pti_nom` varchar(32) collate latin1_general_ci NOT NULL,
  `dossier` varchar(32) collate latin1_general_ci NOT NULL,
  `article_ID` int(10) unsigned NOT NULL default '1',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `nom` (`nom`,`dossier`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Contenu de la table `Supports`
--

INSERT INTO `Supports` (`ID`, `nom`, `pti_nom`, `dossier`, `article_ID`) VALUES
(0, 'bouton poussoir', 'BP', 'BP', 1),
(1, 'but&eacute;e 5 axes', 'butee', 'butee5axes', 2),
(2, 'cambreuse', 'cambreuse', 'cambreuse', 2),
(3, 'cric bouteille', 'cric', 'cric_bouteille', 1),
(4, 'cric hydraulique 2 tonnes', 'cric', 'cric_hydraulique', 1),
(5, '&eacute;lectrovanne', 'electrovanne', 'electrovanne', 3),
(6, '&eacute;tau de mod&eacute;lisme', 'etau', 'etau', 3),
(7, 'extracteur de roulement', 'extracteur', 'extracteur2roulement', 3),
(8, 'mini coupe-tube', 'mini_coupe-tube', 'coupe-tube', 1),
(9, 'pince de marquage', 'pince', 'x2marquage', 2),
(10, 'pince de robot', 'pince', 'pince2robot', 2),
(11, 'pompe &agrave; palettes', 'pompe', 'pompeApalettes', 2),
(12, 'pr&eacute;henseur de culasse', 'prehenseur', 'prehenseur', 1),
(13, 'vanne sph&eacute;rique', 'vanne', 'vanne', 2),
(14, 'alternateur', 'alternateur', 'alternateur', 3),
(15, 'casse-noix', 'casseNoix', 'casse_noix', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Type_association`
--

CREATE TABLE IF NOT EXISTS `Type_association` (
  `ID` int(10) unsigned NOT NULL auto_increment,
  `nom` varchar(32) collate latin1_general_ci NOT NULL,
  `script` varchar(20) collate latin1_general_ci NOT NULL,
  `extension` varchar(5) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `script` (`script`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `Type_association`
--

INSERT INTO `Type_association` (`ID`, `nom`, `script`, `extension`) VALUES
(1, 'dessin d''ensemble', 'dessin_densenble', '.EDRW'),
(2, 'éclaté', 'eclate', '.EASM'),
(3, 'classe d''équivalence entrée', 'CE_entree', '.EASM'),
(4, 'classe d''équivalence sortie', 'CE_sortie', '.EASM'),
(5, 'classe d''équivalence bâti', 'CE_bati', '.EASM'),
(6, 'CE pièce unique entrée', 'piece_entree', '.EPRT'),
(7, 'CE pièce unique sortie', 'piece_sortie', '.EPRT'),
(8, 'CE pièce unique bâti', 'piece_bati', '.EPRT'),
(9, 'éclaté en classe d''équivalence', 'eclate_CE', '.EASM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
