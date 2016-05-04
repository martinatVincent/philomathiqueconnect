-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 29 Février 2016 à 12:51
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `philomatiqueunity`
--
CREATE DATABASE IF NOT EXISTS `philomatiqueunity` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `philomatiqueunity`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `iduserspost` int(11) NOT NULL,
  `idprojet` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `iduserspost`, `idprojet`, `titre`, `comments`, `date`) VALUES
(1, 1, 2, 'je teste de nouveau', 'hislhboùùrwobipvo^qùwshmyvsi lw:m\r\n', '2016-02-24 11:10:06'),
(2, 1, 2, 'je teste de nouveau', 'hislhboùùrwobipvo^qùwshmyvsi lw:m\r\n', '2016-02-24 11:20:23'),
(3, 1, 2, '3eme commentaire', '3 eme texte du 3eme commentaire', '2016-02-24 11:24:20'),
(4, 1, 2, '3eme commentaire', '3 eme texte du 3eme commentaire', '2016-02-24 11:39:16'),
(5, 1, 2, '3eme commentaire', '3 eme texte du 3eme commentaire', '2016-02-24 11:40:12'),
(17, 1, 2, 'try again', 'That''s Fat not Vince !!', '2016-02-24 14:10:25');

-- --------------------------------------------------------

--
-- Structure de la table `metiers`
--

CREATE TABLE `metiers` (
  `id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `metiers`
--

INSERT INTO `metiers` (`id`, `section`, `alias`, `photo`, `description`) VALUES
(1, 'Broderie', 'broderie', 'https://s-media-cache-ak0.pinimg.com/236x/00/d3/46/00d346b41ec2537b6263598d61f41ca8.jpg', 'La broderie est un art de d?coration des tissus qui consiste ? ajouter sur un tissu un motif plat ou en relief fait de fils simples, parfois en int?grant des mat?riaux tels que paillettes, perles voire pierres pr?cieuses.\r\n\r\nOn peut la diviser en trois grandes classes :\r\n\r\nmanuelle : faite ? la main, au moyen d''une aiguille ou faite au crochet ;\r\nsemi-m?canique : ? la machine ;\r\n m?canique : industrielle.'),
(16, 'Cartonnage', 'cartonnage', 'http://a404.idata.over-blog.com/3/65/36/70/Cartonnage-et-broderies--.Vos-realisations/DSC04762.JPG', 'La fabrication d''un objet en carton comporte les ?tapes suivantes :\r\n\r\nle trac? du patron comportant les lignes de d?coupe, de pliage et ?ventuellement les marques d''assemblage ;\r\nla sp?cification du carton de structure et de grammage adapt? ? l''objet envisag? et ?ventuellement son impression ;\r\nla d?coupe ? l''aide d''outil de d?coupage ou d''une forme sp?cialis?e (munie de filets coupants) et de marquage des plis (par rainage ou refoulage) ;\r\nle pliage et l''assemblage de l''objet.\r\nDans le cas d''une fabrication en grande s?rie, une machine peut faire le d?coupage, le pliage-collage ou l''agrafage.'),
(17, 'Couture', 'couture', 'http://clubtissus.com/assets/img/bkgr/bg-accessoires-couture.jpg', 'Une couture est l''assemblage de deux ou plusieurs pi?ces ? l''aide de fil ? coudre, soit manuellement avec une aiguille, soit en utilisant une machine ? coudre ou une surjeteuse. La couture est utilis?e dans la fabrication des v?tements, du linge de maison (draps, mouchoirs, etc.), des ?l?ments de d?coration (nappes, rideaux, tentures, etc.), des chaussures, de la maroquinerie (bagages, sacs, etc.), etc. La premi?re utilisation connue du mot daterait du xive si?cle1.'),
(18, 'Menuiserie', 'menuiserie', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Kairouan_Great_Mosque_doors.jpg/240px-Kairouan_Great_Mosque_doors.jpg', 'La menuiserie, art et m?tier, est l''ensemble des techniques mises en ?uvre pour construire des ouvrages de taille relativement petite (par opposition aux ouvrages de charpente) par la mise en forme et l''assemblage de menues pi?ces de bois1. Ces assemblages se font de largeur, de longueur ou en angle.'),
(19, 'Réfection de Sièges', 'refectionsieges', 'http://www.espacesorano.com/wp-content/uploads/2015/03/Photo-R%C3%A9fection-de-si%C3%A8ges-DR-Recadrage-site-990x460.jpg', 'Ici, vous apprendrez ? restaurer vous-m?mes vos si?ges, selon la m?thode traditionnelle : pose de sangles, fixation des ressorts, mise en place du crin, des toiles de soutien, et, pour finir, du tissu de votre choix agr?ment? ou non de clous dor?s, de galons? Chaque ?l?ve travaille avec ses propres outils, soit sur un si?ge ancien ? restaurer (tabouret, chaise ou fauteuil de tous styles), soit sur une structure en bois brut.'),
(20, 'Plomberie', 'plomberie', 'http://www.allo-plombier-paris2.fr/uploads/446/externe/originals/installation-evier.jpg', 'La plomberie est une sp?cialit? de l''ing?nieur en M?canique appliqu?e au b?timent et du plombier sp?cialis?, regroupant l''ensemble des techniques utilis?es pour faire circuler des fluides (liquide ou gaz) ? l''aide de tuyaux, tubes, vannes, robinets, soupapes, pompes aux diff?rents points d''usage d''une installation. Le mot a pour origine le terme latin pour plomb (plumbum) et provient de l''utilisation de ce m?tal mall?able pour r?aliser les installations de plomberie au cours des si?cles pr?c?dents.'),
(21, 'Stylisme', 'stylisme', 'http://uploads.cecilemancion.com/2010/10/collec_hiver08-09_1.jpg', 'Le stylisme est un m?tier de la mode consistant ? imaginer et dessiner des mod?les destin?s au pr?t-?-porter. La personne exer?ant ce m?tier est appel?e un ou une styliste. Le styliste est aussi appel? fashion designer designer de mode ou encore dessinateur(trice) de mode, car le mot ? styliste ? en anglais d?signe un coiffeur.'),
(22, 'Webforce3', 'webforce', 'http://www.wf3.fr/wp-content/uploads/2015/03/DSC_00271.jpg', 'La Web@cad?mie, c''est un peu la seconde chance pour des 18-25 ans qui ont claqu? la porte de l''?cole avant le bac. \r\nBien s?r, il faut aimer l''informatique et les nouvelles technos, car l''?cole forme, en deux ans, des d?veloppeurs web en partenariat avec Epitech, une autre ?cole d''informatique dont elle partage le campus et les enseignants. '),
(23, 'Electricité', 'electricite', 'http://www.ville-levallois.fr/wp-content/uploads/2014/09/electricit%C3%A9.jpg', 'L??lectricit? est l''effet du d?placement de particules charg?es, ? l?int?rieur d''un ? conducteur ?, sous l''effet d''une diff?rence de potentiel aux extr?mit?s de ce conducteur. Ce ph?nom?ne physique est pr?sent dans de nombreux contextes : l''?lectricit? constitue aussi bien l''influx nerveux des ?tres vivants que les ?clairs d''un orage. Elle est largement utilis?e dans les soci?t?s d?velopp?es pour transporter de grandes quantit?s d''?nergie facilement utilisable.');

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `id_projet` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `caption` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `id_projet`, `photo`, `caption`) VALUES
(1, 2, 'projets/broderie1.jpg', 'Lorem ipsum dolor sit amet'),
(2, 2, 'projets/broderie4.jpg', 'Lorem ipsum dolor sit amet'),
(3, 5, 'projets/menuiserie1.jpg', 'Lorem ipsum dolor sit amet'),
(4, 9, 'projets/cartonerie1.jpg', 'Lorem ipsum dolor sit amet'),
(5, 7, 'projets/mensuiserie2.jpg', 'Lorem ipsum dolor sit amet'),
(6, 10, 'projets/webforce5.png', 'Lorem ipsum dolor sit amet'),
(7, 8, 'projets/stylisme1.jpg', 'Lorem ipsum dolor sit amet'),
(8, 2, 'projets/broderie6.jpg', 'Lorem ipsum dolor sit amet'),
(9, 2, 'projets/broderie7.jpg', 'Lorem ipsum dolor sit amet'),
(10, 11, 'projets/couture1.jpg', 'Lorem ipsum dolor sit amet'),
(11, 7, 'projets/menuiserie4.jpg', 'Lorem ipsum dolor sit amet'),
(12, 13, 'projets/menuiserie3.jpg', 'Le bahut contemporain'),
(13, 3, 'projets/stylisme2.jpg', 'Lorem ipsum dolor sit amet'),
(14, 4, 'projets/stylisme2.jpg', 'Lorem ipsum dolor sit amet'),
(15, 15, 'projets/menuiserie3.jpg', 'Le bahut contemporain'),
(16, 16, 'projets/stylisme2.jpg', 'Lorem ipsum dolor sit amet'),
(17, 17, 'projets/stylisme2.jpg', 'Lorem ipsum dolor sit amet'),
(18, 11, 'projets/webforce5.png', 'Lorem ipsum dolor sit amet'),
(19, 18, 'projets/webforce5.png', 'Lorem ipsum dolor sit amet'),
(20, 6, 'projets/menuiserie3.jpg', 'Le bahut contemporain'),
(21, 12, 'projets/webforce5.png', 'Lorem ipsum dolor sit amet');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(11) NOT NULL,
  `project_title` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `date_publish` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `projets`
--

INSERT INTO `projets` (`id`, `project_title`, `description`, `date_publish`, `id_user`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-18', 2),
(2, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-21', 14),
(3, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-20', 14),
(4, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-13', 14),
(5, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-18', 6),
(6, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-21', 6),
(7, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-17', 6),
(8, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-16', 8),
(9, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-17', 9),
(10, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-17', 9),
(12, 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-02-26', 12),
(13, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2016-02-26', 4),
(14, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-17', 10),
(15, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-18', 5),
(16, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-21', 9),
(17, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-17', 5),
(18, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2016-02-25', 9);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmedToken` varchar(255) DEFAULT NULL,
  `dateConfirmedToken` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `role` enum('Admin','user') NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_update` date NOT NULL,
  `id_metier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `password`, `confirmedToken`, `dateConfirmedToken`, `email`, `description`, `role`, `linkedin`, `photo`, `date_update`, `id_metier`) VALUES
(1, 'fatou', 'diaby', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', '$2y$10$9hEstj4xEYHSjpBUBOCmi.N.kYuqLQCKDeu1AMYFXjfQ744HDg1Y.', '2016-03-03 00:00:00', 'fatou.chance@gmail.com', 'La vie est belle les oiseaux chante,le feu ça brûle et l''eau ça mouille !!', 'Admin', '', 'avatar/1fatou.jpg', '2016-02-16', 1),
(3, 'Martha', 'Tronc', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'martha.tronc@email.com', 'Bonjour je m''appelle Martha, j''aime la broderie !', 'user', '', 'avatar/3symptomes-menopause1.jpg', '2016-02-16', 1),
(4, 'Luc', 'Vamplin', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@luc.vamplin.com', 'Bonjour je m''appelle Luc!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.\r\n', 'user', '', 'avatar/luc.png', '2016-02-17', 18),
(5, 'Stephane', 'Archais', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@stephane.archais.com', 'Bonjour je m''appelle Stephane.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 'user', '', 'avatar/stephane.jpg', '2016-02-20', 16),
(6, 'Martin', 'Bonnaventure', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo.marin@bonnaventure.com', 'Bonjour je m''appelle Vincent.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 'user', '', 'avatar/martin.jpg', '2016-02-18', 19),
(7, 'Jean', 'Dutronc', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@jean.dutronc.com', 'Bonjour je m''appelle Vincent.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 'user', '', 'avatar/jean.jpg', '2016-02-16', 22),
(8, 'Veronica', 'Parrat', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@veronica.parrat.com', 'Bonjour je m''appelle Vincent. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 'user', '', 'avatar/veronica.jpg', '2016-02-16', 21),
(9, 'George', 'Calang', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@george.calang.com', 'Bonjour je m''appelle Vincent.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 'user', '', 'avatar/georges.jpg', '2016-02-16', 23),
(10, 'Justine', 'Paillet', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@justine.rivi?re.com', 'Bonjour je m''appelle Vincent.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 'user', '', 'avatar/justine.jpg', '2016-02-19', 17),
(11, 'Susanne', 'Vaquin', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@susanne.vaquin.com', 'Bonjour et Bienvenue sur mon profil!sed do eiusmod tempor incididunt ut labore', 'user', '', 'avatar/suzanne.jpg', '2016-02-24', 17),
(12, 'Tom', 'Vollat', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@tom.vollat.com', 'Bonjour et Bienvenue sur mon profil!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ', 'user', '', 'avatar/tom.jpg', '2016-02-23', 18),
(13, 'Carl', 'Soison', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@carl.soison.com', 'Bonjour et Bienvenue sur mon profil!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ', 'user', '', 'avatar/carl.jpg', '2016-02-22', 18),
(14, 'Amanda', 'Charret', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@amanda.charret.com', 'Bonjour et Bienvenue sur mon profil!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ', 'user', '', 'avatar/amanda.jpg', '2016-02-17', 21),
(15, 'Sonia', 'Marchais', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@sonia.marchais.com', 'Bonjour et Bienvenue sur mon profil!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ', 'user', '', 'avatar/sonia.png', '2016-02-19', 1),
(16, 'Kevin', 'Goncalves', '$2y$10$dzKBPRYascgFbbD2TMsdNeIlDN4INRpHsC3iiapf2AmNlUeKpuuCe', NULL, NULL, 'philo@kevin.goncalves.com', 'Bonjour et Bienvenue sur mon profil!Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ', 'user', '', '', '2016-02-23', 18);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
