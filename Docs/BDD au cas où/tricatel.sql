-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 19 avr. 2021 à 14:24
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tricatel`
--

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

DROP TABLE IF EXISTS `plat`;
CREATE TABLE IF NOT EXISTS `plat` (
  `id_plat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_plat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `origine` varchar(255) CHARACTER SET utf8 NOT NULL,
  `regime` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_plat`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nom_plat`, `description`, `type`, `origine`, `regime`, `url_image`) VALUES
(1, 'Hamburger du terroir', '  Hamburger typique amÃ©ricain avec son steak cuit aux feu de bois et son fromage succulant et fondant.', 'Plat salÃ©', 'AmÃ©ricain', 'FlÃ©xitarien', 'https://cdn.pixabay.com/photo/2016/03/05/19/02/hamburger-1238246_960_720.jpg'),
(9, 'FeuilletÃ© chÃ¨vre', 'FeuilletÃ© croustillant aux fromages de chÃ¨vre idÃ©al pour accompagner vos salades ', 'EntrÃ©e', 'EuropÃ©en', 'VÃ©gÃ©tarien', 'https://odelices.ouest-france.fr/images/recettes/feuillete-au-fromage-de-chevre.jpg'),
(4, 'Tiramisu maison', 'Tiramisu au cafÃ© torrÃ©fiÃ© localement et issus de l\'agriculture biologique ', 'Plat sucrÃ©', 'EuropÃ©en', 'FlÃ©xitarien', 'https://cdn.pixabay.com/photo/2018/04/21/12/03/food-3338312_960_720.jpg'),
(5, 'Nem aux LÃ©gumes', 'Nems aux lÃ©gumes de saison et local. \r\nCe n\'est pas possible de ne pas nÃ©mer nos nems  !', 'Plat salÃ©', 'Asiatique', 'VÃ©gÃ©tarien', 'https://cdn.pixabay.com/photo/2017/10/16/08/59/nem-2856543_960_720.jpg'),
(6, 'Chocolatine', 'Voici notre gamme de chocolatine , avec notre chocolat de qualitÃ© choisis par nos meilleurs artisans.     ', 'Petit dÃ©jeuner', 'EuropÃ©en', 'VÃ©gÃ©tarien', 'https://cdn.pixabay.com/photo/2020/04/19/16/02/chocolate-5064273_960_720.jpg'),
(7, 'Pizza vÃ©gan ', '  Pizza Ã  base d\'herbe et de tomate cueillit avec amour, saupoudrÃ© de Faux Mage.   ', 'Plat salÃ©', 'EuropÃ©en', 'VÃ©gÃ©talien', 'https://cdn.pixabay.com/photo/2015/04/07/19/49/pizza-711662_960_720.jpg'),
(8, 'Pancake', 'Pancake sans son sirop d\'Ã©rable ni son bacon ', 'Petit dÃ©jeuner', 'AmÃ©ricain', 'VÃ©gÃ©tarien', 'https://cdn.pixabay.com/photo/2017/07/18/11/00/healthy-2515483_960_720.jpg'),
(13, 'Tartelette Ã  la framboise', 'Tartelette sur sa couche de framboise et de crÃ¨me fouettÃ©.', 'Plat sucrÃ©', 'EuropÃ©en', 'VÃ©gÃ©tarien', 'https://cdn.pixabay.com/photo/2016/03/27/19/23/tart-1283822_960_720.jpg'),
(19, 'Mochis Ã  la fraise', 'Confiserie japonaise Ã  base de farine de riz.', 'Plat sucrÃ©', 'Asiatique', 'VÃ©gÃ©tarien', 'https://cdn.pixabay.com/photo/2021/02/22/18/10/japanese-sweets-6041180_960_720.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(12, 'Abedounetdu69', '$2y$10$oUg9TngRIAL0evKeLC9/6eZT/IJvr4ZbABMA.VVnksmDzv36jQ9f6'),
(11, 'admin', '$2y$10$RGUjl5ai5H9V/jvGMPN8z.bbXJQhiGOWqKBXL3XVYoA9fK/Fid9tS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
