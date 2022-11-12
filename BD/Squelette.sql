-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Serveur: dossiers.techniques.sql.free.fr
-- Généré le : Sam 12 Novembre 2022 à 16:54
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
-- Structure de la table `Squelette`
--

CREATE TABLE IF NOT EXISTS `Squelette` (
  `ID` int(11) NOT NULL auto_increment,
  `alpha` int(11) NOT NULL,
  `beta` int(11) NOT NULL default '0',
  `gamma` int(11) NOT NULL default '0',
  `texteMenu` varchar(99) collate latin1_general_ci NOT NULL,
  `imageMenu` varchar(99) collate latin1_general_ci NOT NULL default 'Vue/images/nom_du_fichier.png' COMMENT 'associée à la page',
  `ptiNom` varchar(99) collate latin1_general_ci NOT NULL,
  `classePage` varchar(99) collate latin1_general_ci NOT NULL default 'Page',
  `controleur` varchar(99) collate latin1_general_ci NOT NULL,
  `methode` varchar(99) collate latin1_general_ci NOT NULL default 'GET',
  `paramAutorise` varchar(99) collate latin1_general_ci NOT NULL default '[]' COMMENT 'syntaxe JSON',
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `navigation` (`alpha`,`beta`,`gamma`,`methode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=248 ;

--
-- Contenu de la table `Squelette`
--

INSERT INTO `Squelette` (`ID`, `alpha`, `beta`, `gamma`, `texteMenu`, `imageMenu`, `ptiNom`, `classePage`, `controleur`, `methode`, `paramAutorise`) VALUES
(242, 100, 1, 0, 'Pr&eacute;parer les fichiers', '', 'preparer', 'Page', 'preparer.php', 'GET', '[]'),
(243, 100, 2, 0, 'Les pages du site', '', 'pageSite', 'Page', 'pageSite.php', 'GET', '[]'),
(245, 21, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'freinAdisque/MES.php', 'GET', '[]'),
(246, 21, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(5, 0, 0, 0, 'Page d&apos;accueil', '', 'home', 'PEUNC\\Page', 'home.php', 'GET', '["parametre", "param"]'),
(244, 21, 0, 0, '&Agrave propos', '', 'freinAdisque', 'PageApropos', 'freinAdisque/Apropos.php', 'GET', '[]'),
(7, 1, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'BP/MES.php', 'GET', '[]'),
(8, 1, 2, 0, 'Diagramme pieuvre', '', 'pieuvre', 'Page_image', 'BP/pieuvre.php', 'GET', '[]'),
(9, 1, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'BP/dessin_densemble.php', 'GET', '[]'),
(10, 1, 4, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'BP/eclate.php', 'GET', '[]'),
(11, 1, 5, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'BP/nomenclature.php', 'GET', '[]'),
(12, 2, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'butee5axes/MES.php', 'GET', '[]'),
(13, 2, 5, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'butee5axes/nomenclature.php', 'GET', '[]'),
(14, 2, 4, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'butee5axes/eclate.php', 'GET', '[]'),
(15, 3, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'cambreuse/MES.php', 'GET', '[]'),
(16, 3, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'cambreuse/fonctionnement.php', 'GET', '[]'),
(17, 3, 2, 1, '&Eacute;tape 1', '', 'etape1', 'Page_image', 'cambreuse/etape1.php', 'GET', '[]'),
(18, 3, 2, 2, '&Eacute;tape 2', '', 'etape2', 'Page_image', 'cambreuse/etape2.php', 'GET', '[]'),
(19, 3, 2, 3, '&Eacute;tape 3', '', 'etape3', 'Page_image', 'cambreuse/etape3.php', 'GET', '[]'),
(20, 3, 3, 0, 'Caract&eacute;ristiques', '', 'caracteristiques', 'Page', 'cambreuse/caracteristiques.php', 'GET', '[]'),
(21, 3, 4, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'cambreuse/dessin_densemble.php', 'GET', '[]'),
(22, 3, 5, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'cambreuse/eclate.php', 'GET', '[]'),
(23, 4, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'cric_bouteille/MES.php', 'GET', '[]'),
(24, 4, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'cric_bouteille/fonctionnement.php', 'GET', '[]'),
(25, 4, 2, 1, 'Mont&eacute;e', '', 'monte', 'Page', 'cric_bouteille/monte.php', 'GET', '[]'),
(26, 4, 2, 2, 'Descente', '', 'descend', 'Page', 'cric_bouteille/descend.php', 'GET', '[]'),
(27, 4, 3, 0, 'Analyse fonctionnelle', '', 'AF', 'Page_image', 'cric_bouteille/AF.php', 'GET', '[]'),
(28, 4, 4, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'cric_bouteille/dessin_densemble.php', 'GET', '[]'),
(29, 4, 5, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'cric_bouteille/nomenclature.php', 'GET', '[]'),
(30, 4, 6, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'cric_bouteille/eclate.php', 'GET', '[]'),
(31, 5, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'cric_hydraulique/MES.php', 'GET', '[]'),
(32, 5, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'cric_hydraulique/fonctionnement.php', 'GET', '[]'),
(33, 5, 2, 1, 'mont&eacute;e', '', 'monte', 'Page', 'cric_hydraulique/monte.php', 'GET', '[]'),
(34, 5, 2, 2, 'descente', '', 'descend', 'Page', 'cric_hydraulique/descend.php', 'GET', '[]'),
(35, 5, 2, 3, 'pr&eacute;cautions d&apos;utilisation', '', 'precautions', 'Page', 'cric_hydraulique/precautions.php', 'GET', '[]'),
(36, 5, 3, 0, 'Mouvements du cric', '', 'mouvement', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(37, 5, 3, 1, 'de face', '', '2face', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(38, 5, 3, 2, 'en perspective', '', 'en3D', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(39, 5, 4, 0, 'Analyse fonctionnelle', '', 'AF', 'Page', 'cric_hydraulique/AF.php', 'GET', '[]'),
(40, 5, 4, 1, 'diagramme des int&eacute;racteurs', '', 'pieuvre', 'Page_image', 'cric_hydraulique/pieuvre.php', 'GET', '[]'),
(41, 5, 4, 2, 'FAST "Levage du v&eacute;hicule"', '', 'FASTlevage', 'Page_image', 'cric_hydraulique/FASTlevage.php', 'GET', '[]'),
(42, 5, 4, 3, 'FAST "D&eacute;pose du v&eacute;hicule"', '', 'FASTdepose', 'Page_image', 'cric_hydraulique/FASTdepose.php', 'GET', '[]'),
(43, 5, 5, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_image', 'cric_hydraulique/eclate.php', 'GET', '[]'),
(44, 5, 6, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'cric_hydraulique/nomenclature.php', 'GET', '[]'),
(45, 5, 7, 0, 'Entretien du cric', '', 'entretien', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(46, 5, 7, 1, 'Probl&egrave;me au levage', '', 'PBlevage', 'Page', 'cric_hydraulique/PBlevage.php', 'GET', '[]'),
(47, 5, 7, 2, 'Probl&egrave;me &agrave; la descente', '', 'PBdescente', 'Page', 'cric_hydraulique/PBdescente.php', 'GET', '[]'),
(48, 6, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'electrovanne/MES.php', 'GET', '[]'),
(49, 6, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page_image', 'electrovanne/fonctionnement.php', 'GET', '[]'),
(50, 6, 3, 0, 'Analyse fonctionnelle', '', 'AF', 'Page', 'electrovanne/AF.php', 'GET', '[]'),
(51, 6, 4, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'electrovanne/dessin_densemble.php', 'GET', '[]'),
(52, 6, 5, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'electrovanne/nomenclature.php', 'GET', '[]'),
(53, 7, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'etau/MES.php', 'GET', '[]'),
(54, 7, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page_image', 'etau/fonctionnement.php', 'GET', '[]'),
(55, 7, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'etau/dessin_densemble.php', 'GET', '[]'),
(56, 7, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'etau/nomenclature.php', 'GET', '[]'),
(57, 7, 5, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'etau/eclate.php', 'GET', '[]'),
(58, 7, 6, 0, 'Classes d&apos;&eacute;quivalence', '', 'CE', 'Page', 'etau/CE.php', 'GET', '[]'),
(59, 8, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(60, 8, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(61, 8, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'extracteur2roulement/dessin_densemble.php', 'GET', '[]'),
(62, 8, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'extracteur2roulement/nomenclature.php', 'GET', '[]'),
(63, 8, 5, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'extracteur2roulement/eclate.php', 'GET', '[]'),
(64, 9, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'coupe-tube/MES.php', 'GET', '[]'),
(65, 9, 2, 0, 'Diagramme A-0', '', 'diagrammeA-0', 'Page_image', 'coupe-tube/diagrammeA-0.php', 'GET', '[]'),
(66, 9, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'coupe-tube/dessin_densemble.php', 'GET', '[]'),
(67, 9, 4, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'coupe-tube/eclate.php', 'GET', '[]'),
(68, 9, 5, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'coupe-tube/nomenclature.php', 'GET', '[]'),
(69, 10, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'pince2marquage/MES.php', 'GET', '[]'),
(70, 10, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'pince2marquage/fonctionnement.php', 'GET', '[]'),
(71, 10, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'pince2marquage/dessin_densemble.php', 'GET', '[]'),
(72, 10, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'pince2marquage/nomenclature.php', 'GET', '[]'),
(73, 10, 5, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'pince2marquage/eclate.php', 'GET', '[]'),
(74, 11, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'pince2robot/MES.php', 'GET', '[]'),
(75, 11, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(76, 11, 3, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'pince2robot/nomenclature.php', 'GET', '[]'),
(77, 11, 4, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'pince2robot/eclate.php', 'GET', '[]'),
(78, 12, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'pompeApalettes/MES.php', 'GET', '[]'),
(79, 12, 2, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'pompeApalettes/dessin_densemble.php', 'GET', '[]'),
(80, 12, 3, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'pompeApalettes/nomenclature.php', 'GET', '[]'),
(81, 12, 4, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'pompeApalettes/eclate.php', 'GET', '[]'),
(82, 13, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'prehenseur/MES.php', 'GET', '[]'),
(83, 13, 1, 1, 'dispositif de transfert', '', 'dispositifTransfert', 'Page_image', 'prehenseur/dispositifTransfert.php', 'GET', '[]'),
(84, 13, 1, 2, '&eacute;tape 1', '', 'etape1', 'Page_image', 'prehenseur/etape1.php', 'GET', '[]'),
(85, 13, 1, 3, '&eacute;tape 2', '', 'etape2', 'Page_image', 'prehenseur/etape2.php', 'GET', '[]'),
(86, 13, 1, 4, '&eacute;tape 3 et 4', '', 'etape3-4', 'Page', 'prehenseur/etape3-4.php', 'GET', '[]'),
(87, 13, 1, 5, '&eacute;tape 5', '', 'etape5', 'Page_image', 'prehenseur/etape5.php', 'GET', '[]'),
(88, 13, 1, 6, '&eacute;tape 6', '', 'etape6', 'Page_image', 'prehenseur/etape6.php', 'GET', '[]'),
(89, 13, 5, 0, '&Eacute;clat&eacute;s', '', 'eclate', 'Page_image', 'prehenseur/eclate.php', 'GET', '[]'),
(90, 13, 5, 1, 'CE1: b&acirc;ti', '', 'CE1', 'Page_association', 'prehenseur/CE1.php', 'GET', '[]'),
(91, 13, 5, 2, 'CE2: tige de v&eacute;rin', '', 'CE2', 'Page_association', 'prehenseur/CE2.php', 'GET', '[]'),
(92, 13, 5, 3, 'CE3: biellette', '', 'CE3', 'Page_association', 'prehenseur/CE3.php', 'GET', '[]'),
(93, 13, 5, 4, 'CE4: bras avec deux doigts', '', 'CE4', 'Page_association', 'prehenseur/CE4.php', 'GET', '[]'),
(94, 13, 5, 5, 'CE5: bras avec un doigt', '', 'CE5', 'Page_association', 'prehenseur/CE5.php', 'GET', '[]'),
(95, 13, 6, 0, 'M&eacute;canique', '', 'mecanique', 'Page_image', 'prehenseur/mecanique.php', 'GET', '[]'),
(96, 13, 6, 1, 'd&eacute;placement de la tige', '', 'deplacementTige', 'Page_image', 'prehenseur/deplacementTige.php', 'GET', '[]'),
(97, 13, 6, 2, 'd&eacute;placement de la pince', '', 'deplacementPince', 'Page_image', 'prehenseur/deplacementPince.php', 'GET', '[]'),
(98, 13, 6, 3, 'effort de la tige de v&eacute;rin', '', 'effortTige', 'Page_image', 'prehenseur/effortTige.php', 'GET', '[]'),
(99, 13, 6, 4, 'effort de l&apos;articulation', '', 'effortArticulation', 'Page_image', 'prehenseur/effortArticulation.php', 'GET', '[]'),
(100, 15, 1, 0, 'Mise en situation', '', 'MES', 'Page_image', 'alternateur/MES.php', 'GET', '[]'),
(101, 15, 2, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_image', 'alternateur/dessin_densemble.php', 'GET', '[]'),
(102, 15, 3, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_image', 'alternateur/eclate.php', 'GET', '[]'),
(103, 15, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'alternateur/nomenclature.php', 'GET', '[]'),
(104, 16, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'casse_noix/MES.php', 'GET', '[]'),
(105, 16, 2, 0, 'Diagramme A-0', '', 'diagrammeA-0', 'Page_image', 'casse_noix/diagrammeA-0.php', 'GET', '[]'),
(106, 16, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'casse_noix/dessin_densemble.php', 'GET', '[]'),
(107, 16, 4, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'casse_noix/eclate.php', 'GET', '[]'),
(108, 16, 5, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'casse_noix/nomenclature.php', 'GET', '[]'),
(109, 17, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'brideAnez/MES.php', 'GET', '[]'),
(110, 17, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'brideAnez/fonctionnement.php', 'GET', '[]'),
(111, 17, 3, 0, 'Caract&eacute;ristiques', '', 'caracteristiques', 'Page', 'brideAnez/caracteristiques.php', 'GET', '[]'),
(112, 17, 4, 0, 'Montage de bridage', '', 'Montage2bridage', 'Page_image', 'brideAnez/Montage2bridage.php', 'GET', '[]'),
(113, 17, 6, 0, '&Eacute;clat&eacute; du montage', '', 'eclateMontage', 'Page_association', 'brideAnez/eclateMontage.php', 'GET', '[]'),
(114, 17, 5, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'brideAnez/dessin_densemble.php', 'GET', '[]'),
(115, 2, 2, 0, 'Pr&eacute;sentation des axes', '', 'axes', 'Page', 'butee5axes/axes.php', 'GET', '[]'),
(116, 2, 2, 1, 'axe 1', '', 'axe1', 'Page_image', 'butee5axes/axe1.php', 'GET', '[]'),
(117, 2, 2, 2, 'axe 2', '', 'axe2', 'Page_image', 'butee5axes/axe2.php', 'GET', '[]'),
(118, 2, 2, 3, 'axe 3', '', 'axe3', 'Page_image', 'butee5axes/axe3.php', 'GET', '[]'),
(119, 2, 2, 4, 'axe 4', '', 'axe4', 'Page_image', 'butee5axes/axe4.php', 'GET', '[]'),
(120, 2, 2, 5, 'axe 5', '', 'axe5', 'Page_image', 'butee5axes/axe5.php', 'GET', '[]'),
(121, 4, 7, 0, 'Dessins de d&eacute;finition', '', 'dessin2definition', 'Page', 'cric_bouteille/dessin2definition.php', 'GET', '[]'),
(122, 4, 7, 1, 'axe d&apos;articulation', '', 'axeArticulation', 'Page_association', 'cric_bouteille/axeArticulation.php', 'GET', '[]'),
(123, 4, 7, 2, 'biellette', '', 'biellette', 'Page_association', 'cric_bouteille/biellette.php', 'GET', '[]'),
(124, 4, 7, 3, 'chandelle', '', 'chandelle', 'Page_association', 'cric_bouteille/chandelle.php', 'GET', '[]'),
(125, 4, 7, 4, 'chape', '', 'chape', 'Page_association', 'cric_bouteille/chape.php', 'GET', '[]'),
(126, 4, 7, 5, 'corps de pompe', '', 'corps2pompe', 'Page_association', 'cric_bouteille/corps2pompe.php', 'GET', '[]'),
(127, 4, 7, 6, 'cylindre principal', '', 'cylindrePrincipal', 'Page_association', 'cric_bouteille/cylindrePrincipal.php', 'GET', '[]'),
(128, 4, 7, 7, 'embase', '', 'embase', 'Page_association', 'cric_bouteille/embase.php', 'GET', '[]'),
(129, 4, 7, 8, 'levier', '', 'levier', 'Page_association', 'cric_bouteille/levier.php', 'GET', '[]'),
(130, 4, 7, 9, 'piston de pompe', '', 'piston2pompe', 'Page_association', 'cric_bouteille/piston2pompe.php', 'GET', '[]'),
(131, 4, 7, 10, 'piston r&eacute;cepteur', '', 'pistonRecepteur', 'Page_association', 'cric_bouteille/pistonRecepteur.php', 'GET', '[]'),
(132, 4, 7, 11, 'pointeau', '', 'pointeau', 'Page_association', 'cric_bouteille/pointeau.php', 'GET', '[]'),
(133, 4, 7, 12, '&eacute;l&eacute;ments de tarage', '', 'tarage', 'Page_association', 'cric_bouteille/tarage.php', 'GET', '[]'),
(134, 4, 7, 13, 'r&eacute;servoir', '', 'reservoir', 'Page_association', 'cric_bouteille/reservoir.php', 'GET', '[]'),
(135, 4, 7, 14, 'tirant M4', '', 'tirantM4', 'Page_association', 'cric_bouteille/tirantM4.php', 'GET', '[]'),
(136, 17, 9, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'brideAnez/nomenclature.php', 'GET', '[]'),
(137, 17, 2, 1, 'd&eacute;but de la phase 1', '', 'debutPhase1', 'Page_image', 'brideAnez/debutPhase1.php', 'GET', '[]'),
(138, 17, 2, 2, 'phase 1', '', 'phase1', 'Page_image', 'brideAnez/phase1.php', 'GET', '[]'),
(139, 17, 2, 3, 'd&eacute;but de la phase 2', '', 'debutPhase2', 'Page_image', 'brideAnez/debutPhase2.php', 'GET', '[]'),
(140, 17, 2, 4, 'phase 2', '', 'phase2', 'Page_image', 'brideAnez/phase2.php', 'GET', '[]'),
(141, 17, 7, 0, 'Sous-ensembles', '', 'SE', 'Page_association', 'brideAnez/SE.php', 'GET', '[]'),
(142, 17, 7, 1, 'corps de la bride', '', 'corpsBride', 'Page_association', 'brideAnez/corpsBride.php', 'GET', '[]'),
(143, 17, 7, 2, 'nez de la bride', '', 'nez2bride', 'Page_association', 'brideAnez/nez2bride.php', 'GET', '[]'),
(144, 17, 7, 3, 'ensemble piston', '', 'ensemblePiston', 'Page_association', 'brideAnez/ensemblePiston.php', 'GET', '[]'),
(145, 17, 7, 4, 'plaquette', '', 'plaquette', 'Page_association', 'brideAnez/plaquette.php', 'GET', '[]'),
(146, 17, 7, 5, 'ressort', '', 'ressort', 'Page_association', 'brideAnez/ressort.php', 'GET', '[]'),
(236, 10, 6, 0, 'Sous-ensembles', '', 'sous-ensembles', 'Page_association', 'pince2marquage/sous-ensembles.php', 'GET', '[]'),
(148, 13, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page_image', 'prehenseur/fonctionnement.php', 'GET', '[]'),
(149, 13, 2, 2, 'Fermeture', '', 'fermeture', 'Page_image', 'prehenseur/fermeture.php', 'GET', '[]'),
(150, 13, 2, 1, 'ouverture', '', 'ouverture', 'Page_image', 'prehenseur/ouverture.php', 'GET', '[]'),
(151, 13, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'prehenseur/dessin_densemble.php', 'GET', '[]'),
(152, 13, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'prehenseur/nomenclature.php', 'GET', '[]'),
(153, 18, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'unite2marquage/MES.php', 'GET', '[]'),
(154, 18, 2, 0, '&Eacute;l&eacute;ments constitutifs', '', 'elements', 'Page', 'unite2marquage/elements.php', 'GET', '[]'),
(155, 18, 2, 1, 'corps', '', 'corps', 'Page_association', 'unite2marquage/corps.php', 'GET', '[]'),
(156, 18, 2, 2, 'V&eacute;rin', '', 'verin', 'Page_association', 'unite2marquage/verin.php', 'GET', '[]'),
(157, 18, 2, 3, 'Enclume', '', 'enclume', 'Page_association', 'unite2marquage/enclume.php', 'GET', '[]'),
(158, 18, 2, 4, 'Embiellage', '', 'embiellage', 'Page_association', 'unite2marquage/embiellage.php', 'GET', '[]'),
(159, 18, 2, 5, 'Levier', '', 'levier', 'Page_association', 'unite2marquage/levier.php', 'GET', '[]'),
(160, 18, 4, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'unite2marquage/dessin_densemble.php', 'GET', '[]'),
(161, 18, 7, 0, 'Flasque droit', '', 'flasqueDroit', 'Page_image', 'unite2marquage/flasqueDroit.php', 'GET', '[]'),
(162, 18, 7, 1, 'flasque', '', 'flasque', 'Page', 'unite2marquage/flasque.php', 'GET', '[]'),
(163, 18, 7, 2, 'Dessin de d&eacute;finition', '', 'dessin2definition', 'Page_association', 'unite2marquage/dessin2definition.php', 'GET', '[]'),
(164, 18, 8, 0, 'M&eacute;canique', '', 'mecanique', 'Page_image', 'unite2marquage/mecanique.php', 'GET', '[]'),
(165, 18, 8, 1, 'efforts embiellage/Levier', '', 'efforts_embiellage-levier', 'Page_image', 'unite2marquage/efforts_embiellage-levier.php', 'GET', '[]'),
(166, 18, 8, 2, 'effort de marquage', '', 'effort2marquage', 'Page_image', 'unite2marquage/effort2marquage.php', 'GET', '[]'),
(167, 18, 8, 3, 'vitesse de la biellette', '', 'vitesseBielette', 'Page_image', 'unite2marquage/vitesseBielette.php', 'GET', '[]'),
(168, 18, 8, 4, 'vitesse du Levier', '', 'vitesseLevier', 'Page_image', 'unite2marquage/vitesseLevier.php', 'GET', '[]'),
(169, 18, 3, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(170, 18, 5, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'unite2marquage/eclate.php', 'GET', '[]'),
(171, 18, 6, 0, 'Classes d&apos;&eacute;quivalence', '', 'CE', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(172, 19, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'vanne/fonctionnement.php', 'GET', '[]'),
(173, 19, 4, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'vanne/eclate.php', 'GET', '[]'),
(174, 19, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'vanne/dessin_densemble.php', 'GET', '[]'),
(175, 19, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'vanne/MES.php', 'GET', '[]'),
(176, 19, 5, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'vanne/nomenclature.php', 'GET', '[]'),
(177, 14, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'moteur2modelisme/MES.php', 'GET', '[]'),
(178, 14, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'moteur2modelisme/fonctionnement.php', 'GET', '[]'),
(179, 14, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'moteur2modelisme/nomenclature.php', 'GET', '[]'),
(180, 3, 7, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'cambreuse/nomenclature.php', 'GET', '[]'),
(181, 14, 3, 0, 'Les classes d&apos;&eacute;quivalence', '', 'CE', 'Page', 'moteur2modelisme/CE.php', 'GET', '[]'),
(182, 14, 3, 1, 'CE1: le b&acirc;ti', '', 'CE1', 'Page', 'pageDTenConstruction.php', 'GET', '[]'),
(183, 14, 3, 2, 'CE2 : le vilebrequin', '', 'CE2', 'Page_association', 'moteur2modelisme/CE2.php', 'GET', '[]'),
(184, 14, 3, 3, 'CE3 : la bielle', '', 'CE3', 'Page_association', 'moteur2modelisme/CE3.php', 'GET', '[]'),
(185, 14, 3, 4, 'CE4: le piston', '', 'CE4', 'Page_association', 'moteur2modelisme/CE4.php', 'GET', '[]'),
(186, 14, 5, 0, '&Eacute;clat&eacute;', '', 'eclate', 'Page_association', 'moteur2modelisme/eclate.php', 'GET', '[]'),
(187, 2, 6, 0, 'Dessins de d&eacute;finition', '', 'dessin2definition', 'Page', 'butee5axes/dessin2definition.php', 'GET', '[]'),
(188, 2, 6, 1, 'socle', '', 'socle', 'Page_association', 'butee5axes/socle.php', 'GET', '[]'),
(189, 2, 6, 2, 'contre-embase', '', 'contre-embase', 'Page_association', 'butee5axes/contre-embase.php', 'GET', '[]'),
(190, 2, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'butee5axes/dessin_densemble.php', 'GET', '[]'),
(191, 1, 0, 0, '&Agrave propos', '', 'BP', 'PageApropos', 'BP/Apropos.php', 'GET', '[]'),
(192, 2, 0, 0, '&Agrave propos', '', 'butee5axes', 'PageApropos', 'butee5axes/Apropos.php', 'GET', '[]'),
(193, 3, 0, 0, '&Agrave propos', '', 'cambreuse', 'PageApropos', 'cambreuse/Apropos.php', 'GET', '[]'),
(194, 4, 0, 0, '&Agrave propos', '', 'cric_bouteille', 'PageApropos', 'cric_bouteille/Apropos.php', 'GET', '[]'),
(195, 5, 0, 0, '&Agrave propos', '', 'cric_hydraulique', 'PageApropos', 'cric_hydraulique/Apropos.php', 'GET', '[]'),
(196, 6, 0, 0, '&Agrave propos', '', 'electrovanne', 'PageApropos', 'electrovanne/Apropos.php', 'GET', '[]'),
(197, 7, 0, 0, '&Agrave propos', '', 'etau', 'PageApropos', 'etau/Apropos.php', 'GET', '[]'),
(198, 8, 0, 0, '&Agrave propos', '', 'extracteur2roulement', 'PageApropos', 'extracteur2roulement/Apropos.php', 'GET', '[]'),
(199, 9, 0, 0, '&Agrave propos', '', 'coupe-tube', 'PageApropos', 'coupe-tube/Apropos.php', 'GET', '[]'),
(200, 10, 0, 0, '&Agrave propos', '', 'pince2marquage', 'PageApropos', 'pince2marquage/Apropos.php', 'GET', '[]'),
(201, 11, 0, 0, '&Agrave propos', '', 'pince2robot', 'PageApropos', 'pince2robot/Apropos.php', 'GET', '[]'),
(202, 12, 0, 0, '&Agrave propos', '', 'pompeApalettes', 'PageApropos', 'pompeApalettes/Apropos.php', 'GET', '[]'),
(203, 13, 0, 0, '&Agrave propos', '', 'prehenseur', 'PageApropos', 'prehenseur/Apropos.php', 'GET', '[]'),
(204, 15, 0, 0, '&Agrave propos', '', 'alternateur', 'PageApropos', 'alternateur/Apropos.php', 'GET', '[]'),
(205, 16, 0, 0, '&Agrave propos', '', 'casse_noix', 'PageApropos', 'casse_noix/Apropos.php', 'GET', '[]'),
(206, 17, 0, 0, '&Agrave propos', '', 'brideAnez', 'PageApropos', 'brideAnez/Apropos.php', 'GET', '[]'),
(207, 18, 0, 0, '&Agrave propos', '', 'unite2marquage', 'PageApropos', 'unite2marquage/Apropos.php', 'GET', '[]'),
(208, 19, 0, 0, '&Agrave propos', '', 'vanne', 'PageApropos', 'vanne/Apropos.php', 'GET', '[]'),
(209, 14, 0, 0, '&Agrave propos', '', 'moteur2modelisme', 'PageApropos', 'moteur2modelisme/Apropos.php', 'GET', '[]'),
(212, 7, 6, 3, 'vis de manoeuvre', '', 'vis', 'Page_association', 'etau/vis.php', 'GET', '[]'),
(210, 7, 6, 1, 'mors fixe', '', 'mors_fixe', 'Page_association', 'etau/CE_mors_fixe.php', 'GET', '[]'),
(211, 7, 6, 2, 'mors mobile', '', 'mors_mobile', 'Page_association', 'etau/CE_mors_mobile.php', 'GET', '[]'),
(213, 7, 6, 4, 'tige', '', 'tige', 'Page_association', 'etau/tige.php', 'GET', '[]'),
(214, 99, 0, 0, 'traitement formulaire de contact', '', 'Contact', 'PEUNC\\Contact', '', 'POST', '["XSRF", "nom", "courriel", "objet", "message", "code"]'),
(216, -1, 0, 0, 'Bac &agrave; sable', '', 'bacAsable', 'PEUNC\\Page', 'PEUNC/BacAsable/bacAsable.php', 'GET', '[]'),
(219, -1, 3, 0, 'Chiffrement', '', 'chiffrement', 'PEUNC\\Page', 'PEUNC/BacAsable/chiffrement.php', 'GET', '[]'),
(220, -1, 4, 0, 'Fichiers JSON', '', 'json', 'PEUNC\\Page', 'PEUNC/BacAsable/JSON.php', 'GET', '[]'),
(241, 100, 0, 0, 'Participez !', '', 'participer', 'Page', 'participer.php', 'GET', '[]'),
(222, -1, 1, 0, 'Code de validation', '', 'code_validation', 'PEUNC\\Page', 'PEUNC/BacAsable/validation.php', 'GET', '[]'),
(224, -1, 2, 0, 'Lecture jeton XSRF', '', 'lectureJetonXSRF', 'PEUNC\\Page', 'PEUNC/BacAsable/lectureJeton.php', 'GET', '[]'),
(225, 3, 6, 0, 'Sous-ensembles', '', 'sous-ensembles', 'Page_association', 'cambreuse/sous-ensembles.php', 'GET', '[]'),
(226, 3, 6, 1, 'b&acirc;ti', '', 'SE_bati', 'Page_association', 'cambreuse/SE_bati.php', 'GET', '[]'),
(227, 3, 6, 2, 'tige de v&eacute;rin de cambrage', '', 'tige2cambrage', 'Page_association', 'cambreuse/SE_tige2cambrage.php', 'GET', '[]'),
(228, 3, 6, 3, 'tige de v&eacute;rin de bridage', '', 'tige2bridage', 'Page_association', 'cambreuse/SE_tige2bridage.php', 'GET', '[]'),
(229, 3, 6, 4, 'basculeur', '', 'SE_basculeur', 'Page_association', 'cambreuse/SE_basculeur.php', 'GET', '[]'),
(230, 3, 6, 5, 'bielle', '', 'SE_bielle', 'Page_association', 'cambreuse/SE_bielle.php', 'GET', '[]'),
(231, 20, 1, 0, 'Mise en situation', '', 'MES', 'Page', 'bride_hydraulique/MES.php', 'GET', '[]'),
(232, 20, 0, 0, '&Agrave propos', '', 'bride_hydraulique', 'PageApropos', 'bride_hydraulique/Apropos.php', 'GET', '[]'),
(233, 20, 2, 0, 'Fonctionnement', '', 'fonctionnement', 'Page', 'bride_hydraulique/fonctionnement.php', 'GET', '[]'),
(234, 20, 3, 0, 'Dessin d&apos;ensemble', '', 'dessin_densemble', 'Page_association', 'bride_hydraulique/dessin_densemble.php', 'GET', '[]'),
(235, 20, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'bride_hydraulique/nomenclature.php', 'GET', '[]'),
(237, 10, 6, 1, 'b&acirc;ti', '', 'SE_bati', 'Page_association', 'pince2marquage/SE_bati.php', 'GET', '[]'),
(238, 10, 6, 2, 'bras sup&eacute;rieur', '', 'bras_sup', 'Page_association', 'pince2marquage/SE_bras_sup.php', 'GET', '[]'),
(239, 10, 6, 3, 'bras inf&eacute;rieur', '', 'SE_bras_inf', 'Page_association', 'pince2marquage/SE_bras_inf.php', 'GET', '[]'),
(240, 10, 6, 4, 'piston', '', 'SE_piston', 'Page_association', 'pince2marquage/SE_piston.php', 'GET', '[]'),
(247, 21, 4, 0, 'Nomenclature', '', 'nomenclature', 'Page_nomenclature', 'freinAdisque/nomenclature.php', 'GET', '[]');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
