-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Host: dossiers.techniques.sql.free.fr
-- Generation Time: Jul 04, 2018 at 05:46 PM
-- Server version: 5.0.83
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dossiers_techniques`
--

-- --------------------------------------------------------

--
-- Table structure for table `Pieces`
--

CREATE TABLE IF NOT EXISTS `Pieces` (
  `support_ID` int(10) unsigned NOT NULL,
  `nom` varchar(64) collate latin1_general_ci NOT NULL,
  `repere` int(10) unsigned NOT NULL,
  `quantite` int(10) unsigned NOT NULL default '1',
  `matiere_ID` int(10) NOT NULL default '0',
  `observation` text collate latin1_general_ci NOT NULL,
  `fichier` varchar(32) collate latin1_general_ci NOT NULL,
  `assemblage` tinyint(3) unsigned NOT NULL default '0',
  KEY `support-repère` (`support_ID`,`repere`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Listes des pièces de chaque support';

--
-- Dumping data for table `Pieces`
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
(1, 'interm&eacute;diaire', 7, 1, 9, '', 'intermediaire', 0),
(1, 'bouton', 8, 1, 9, '', 'bouton', 0),
(1, 'tige filet&eacute;e', 9, 1, 9, 'commerce', 'tige_filetee', 0),
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
(13, 'Corps', 1, 1, 5, '', 'corps', 0),
(13, 'Raccord', 2, 2, 5, '', 'raccord', 0),
(13, 'Bille', 3, 1, 5, '', 'bille', 0),
(13, 'Joint de si&egrave;ge', 4, 2, 26, '', 'joint2siege', 0),
(13, 'Axe de manoeuvre', 5, 1, 0, '', 'axe2manoeuvre', 0),
(13, 'Rondelle but&eacute;e', 6, 1, 20, '', 'rondelle_butee', 0),
(13, 'Rondelle L3', 7, 1, 5, '', 'rondelle_L3', 0),
(13, 'Manette', 8, 1, 27, 'Rouge', 'manette', 0),
(13, 'Vis', 9, 1, 5, '', 'vis', 0),
(13, 'Joint torique', 10, 1, 0, '', 'joint_torique', 0),
(13, 'Joint torique', 11, 2, 0, '', 'joint_torique2', 0),
(13, 'But&eacute;e', 12, 1, 20, '', 'butee', 0),
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
(15, 'plaquette support', 18, 1, 0, '', 'plaquette', 0),
(16, 'T&ecirc;te de bride', 1, 1, 17, '', 'tete2bride', 0),
(16, 'Corps de v&eacute;rin', 2, 1, 17, 'Image avec 1/4 enlev&eacute', 'corps2verin', 0),
(16, 'Support lame de ressort', 3, 1, 12, '', 'support_lame2ressort', 0),
(16, 'Vis &agrave; t&ecirc;te cylindrique &agrave; 6 pans creux M3-6', 4, 3, 0, 'Commerce', 'visCHcM3-6', 0),
(16, 'Vis &agrave; t&ecirc;te frais&eacute;e fendue M4-13', 5, 2, 0, 'Commerce', 'visFSM4-13', 0),
(16, 'Vis &agrave; t&ecirc;te cylindrique &agrave; 6 pans creux M6-20', 6, 4, 0, 'Commerce', 'visCHcM6-20', 0),
(16, 'Rondelle Grower W6', 7, 4, 0, 'Commerce', 'rondelle_growerW6', 0),
(16, 'Vis sans t&ecirc;te &agrave; six pans creux', 8, 1, 0, 'Commerce', 'visAHcM10-10', 0),
(16, 'Plaquette avant', 9, 1, 9, '', 'plaquette_avant', 0),
(16, 'Vis &agrave; t&ecurc;te frais&eacute;e fendue M3-8', 10, 4, 0, 'Commerce', 'visFSM3-8', 0),
(16, 'Axe', 11, 1, 18, '', 'axe', 0),
(16, 'Anneau &eacute;lastique pour al&eacute;sage 40x1,75', 12, 1, 0, 'Commerce', 'anneau_elastique40x1,75', 0),
(16, 'Vis sans t&ecirc;te &agrave; six pans creux M6-10', 13, 1, 0, 'Commerce', 'visAHcM6-10', 0),
(16, 'Lame de ressort', 14, 1, 19, '', 'lame2ressort', 0),
(16, 'Nez de bride', 15, 1, 20, '', 'nez2bride', 0),
(16, 'Piston', 16, 1, 0, 'Commerce', 'piston', 0),
(16, 'Segment de guidage de 40', 17, 1, 13, '', 'segment2guidage40', 0),
(16, 'Bague anti extrusion 34-40', 18, 3, 13, '', 'bague_anti_extrusion34-40', 0),
(16, 'Joint torique 35,6x3,6', 19, 2, 0, 'Commerce', 'joint_torique35,6x3,6', 0),
(16, 'Douille', 20, 1, 0, 'Commerce', 'douille', 0),
(16, 'Joint torique 16,6x2,7', 21, 1, 0, 'Commerce', 'joint_torique16.9x2.7', 0),
(16, 'Bague anti-extrusion 18-21', 22, 1, 13, '', 'bague_anti-extrusion18-21', 0),
(16, 'Goupille &eacute;lastique 4 x 35', 24, 1, 0, 'Commerce', 'goupille4x35', 0),
(16, 'chape', 25, 1, 21, '', 'chape', 0),
(16, 'Segment de guidage de 18', 23, 1, 21, '', 'racleur18', 0),
(16, 'Axe de chape', 26, 1, 0, '', 'axe2chape', 0),
(16, 'Axe de chape', 26, 1, 18, '', 'axe2chape', 0),
(16, 'Plaquette plastique', 27, 1, 0, '', 'plaquette_plastique', 0),
(16, 'Ressort de compression', 28, 1, 0, 'Commerce', 'ressort', 0),
(12, 'Ch&acirc;ssis', 1, 1, 14, '', 'chassis', 0),
(12, 'Renfort', 2, 2, 22, '', 'renfort', 0),
(12, 'Vis H M5 8', 3, 4, 0, '', 'visHM5-8', 0),
(12, 'Vis H M 10', 4, 14, 0, '', 'visHM6-10', 0),
(12, 'Rail TKSD', 5, 4, 0, '', 'railTKSD', 0),
(12, 'Chariot', 6, 4, 0, '', 'chariot', 0),
(12, 'Ensemble m&eacute;cano-soud&eacute; 2 doigts', 7, 1, 0, '', 'ensemble2doigts', 1),
(12, 'Vis HM8 16', 8, 4, 0, '', 'visHM8-16', 0),
(12, 'Rondelle M8', 9, 4, 0, '', 'rondelleM8', 0),
(12, 'Guide ressort', 10, 4, 0, '', 'guide', 0),
(12, 'Vis CHc M8 12', 11, 3, 0, '', 'visCHcM8-12', 0),
(12, 'Doigt', 13, 3, 23, '', 'doigt', 0),
(12, 'Vic CHc M5 16', 14, 32, 0, '', 'visCHcM5-16', 0),
(12, '&Eacute;crou H M16', 15, 4, 0, '', 'ecrouHM16', 0),
(12, '&Eacute;querre mobile', 16, 2, 0, '', 'equerreUPN', 0),
(12, 'Carter', 18, 1, 0, '', 'carter', 0),
(12, 'Bague', 19, 4, 24, '', 'bague2biellette', 0),
(12, 'Biellette', 20, 2, 25, '', 'biellette', 0),
(12, 'Fixation v&eacute;rin', 21, 2, 0, '', 'bride', 0),
(12, 'Corps de v&eacute;rin Joucomatic', 22, 1, 0, 'K 63 D 80 M', 'corps2verin', 0),
(12, 'Noix', 23, 1, 0, '', 'noix', 0),
(12, 'Ensemble m&eacute;cano-soud&eacute; 1 doigt', 24, 1, 0, '', 'ensemble1doigt', 1),
(12, 'Piston du v&eacute;rin', 25, 1, 0, '', 'piston', 0),
(12, 'Ressort', 26, 1, 0, '', 'ressort', 0),
(12, '&Eacute;querre fixe', 27, 2, 0, '', 'equerre_fixe', 0),
(12, 'Vis CHc M8 30', 28, 4, 0, '', 'visCHcM8-30', 0),
(12, 'Vis CHc M6 25', 29, 4, 0, '', 'visCHcM6-25', 0),
(12, 'Rondelle M6', 30, 4, 0, '', 'rondelleM6', 0),
(12, 'Vis CHc M10 25', 31, 4, 0, '', 'visCHcM10-25', 0),
(12, 'Vis CHc M4 22', 32, 16, 0, '', 'visCHcM4-22', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
