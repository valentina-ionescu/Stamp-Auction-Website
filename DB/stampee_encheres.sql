-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2021 at 07:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stampee_encheres`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `courriel` varchar(45) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nom_categorie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nom_categorie`) VALUES
(1, 'Animaux'),
(2, 'Aviation'),
(3, 'Histoire'),
(4, 'Guerre'),
(5, 'Nature'),
(6, 'Royauté'),
(7, 'Symboles'),
(8, 'Vedettes'),
(9, 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `enchere`
--

CREATE TABLE `enchere` (
  `idEnchere` int(11) NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `offre_actuelle` decimal(10,0) DEFAULT NULL,
  `qty_mises` int(11) DEFAULT NULL,
  `Timbre_idTimbre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enchere`
--

INSERT INTO `enchere` (`idEnchere`, `date_debut`, `date_fin`, `offre_actuelle`, `qty_mises`, `Timbre_idTimbre`) VALUES
(2, '2021-06-23 12:00:00', '2021-07-01 12:00:00', '34', NULL, 191),
(4, '2021-07-12 12:00:00', '2021-07-21 12:00:00', '27', NULL, 196),
(5, '2021-08-14 14:01:00', '2021-09-13 14:01:00', '30', NULL, 198),
(7, '2021-07-01 12:00:00', '2021-07-23 12:00:00', '6001', NULL, 197),
(8, '2021-07-01 16:28:00', '2021-07-15 16:29:00', '78', NULL, 200),
(22, '2021-07-07 20:19:00', '2021-07-21 20:19:00', '54', NULL, 201),
(24, '2021-07-01 20:21:00', '2021-07-21 20:21:00', '26', NULL, 203),
(25, '2021-07-13 21:40:00', '2021-07-21 21:40:00', '70', NULL, 202),
(26, '2021-07-07 21:49:00', '2021-07-21 21:49:00', '588', NULL, 191),
(27, '2021-06-29 22:42:00', '2021-07-13 22:42:00', '50', NULL, 200),
(29, '2021-07-14 11:14:00', '2021-07-21 11:15:00', '56', NULL, 197),
(31, '2021-07-17 15:17:00', '2021-07-29 15:17:00', '10000', NULL, 205),
(32, '2021-07-17 15:17:00', '2021-07-29 15:17:00', '10000', NULL, 205),
(33, '2021-07-08 16:22:00', '2021-07-22 16:22:00', '1000', NULL, 205),
(34, '2021-07-08 16:22:00', '2021-07-22 16:22:00', '1000', NULL, 205);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `nom_image` varchar(255) DEFAULT NULL,
  `taille` decimal(10,0) DEFAULT NULL,
  `image_principale` tinyint(4) DEFAULT NULL,
  `Timbre_idTimbre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `nom_image`, `taille`, `image_principale`, `Timbre_idTimbre`) VALUES
(52, 'Annee-complete-des-timbres-francais-194.jpg', '192432', 1, 191),
(65, 'timbre_rouge-1625761017.png', '182013', 1, 196),
(66, 'Timbre-poste_Canada_5c_Quebec_1908.jpg', '125520', 0, 196),
(67, 'timbres.jpg', '95685', 0, 196),
(68, 'Timbre_rare-1625846666.jpg', '8794', 1, 197),
(69, 'timbre_rouge-1625846666.png', '182013', 0, 197),
(70, 'Timbre-poste_Canada_5c_Quebec_1908-1625846666.jpg', '125520', 0, 197),
(75, 'Canards-1626290177.jpg', '10028', 1, 200),
(76, 'I-Moyenne-54698-n-2-3-timbre-france-poste-lvf.net.jpg', '29548', 1, 201),
(77, '1849-le-premiers-timbre-poste-francais-1626296338.jpg', '12224', 1, 202),
(78, 'Annee-complete-des-timbres-francais-194-1626296338.jpg', '192432', 0, 202),
(79, 'bielorussie-timbres.jpeg', '45954', 1, 203),
(80, 'bielorussie-timbres-obliteres.jpeg', '47222', 0, 203),
(81, 'european-hedgehog-erinaceus-europa.jpg', '89401', 1, 204),
(82, 'invertedJenny.jpg', '53588', 1, 205),
(83, 'inverted-jenny.jpg', '23650', 0, 205),
(84, 'invertedJenny1.jpg', '572076', 0, 205);

-- --------------------------------------------------------

--
-- Table structure for table `mise`
--

CREATE TABLE `mise` (
  `Usager_idUsager` int(11) NOT NULL,
  `Enchere_idEnchere` int(11) NOT NULL,
  `prix_offert` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mise`
--

INSERT INTO `mise` (`Usager_idUsager`, `Enchere_idEnchere`, `prix_offert`) VALUES
(96, 4, '44'),
(96, 7, '6001'),
(96, 8, '78'),
(96, 22, '54'),
(96, 24, '26'),
(96, 25, '60'),
(96, 26, '588'),
(96, 27, '50'),
(96, 29, '50'),
(96, 31, '10000'),
(96, 32, '10000'),
(96, 33, '1000'),
(96, 34, '1000'),
(98, 2, '34'),
(98, 4, '22'),
(98, 5, '34'),
(98, 7, '102'),
(98, 25, '70'),
(98, 29, '56'),
(109, 7, '100');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL,
  `nom_pays` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`idPays`, `nom_pays`) VALUES
(1, 'Canada'),
(2, 'USA'),
(3, 'UK'),
(4, 'France'),
(5, 'Italy'),
(6, 'Belgique'),
(7, 'Australia'),
(8, 'Danemark'),
(9, 'Irland'),
(10, 'Japan'),
(11, 'Vatican'),
(12, 'Russia'),
(13, 'Austria'),
(14, 'Brasil'),
(15, 'Cuba'),
(16, 'Greece');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL,
  `nom_role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `nom_role`) VALUES
(1, 'admin'),
(2, 'non-admin');

-- --------------------------------------------------------

--
-- Table structure for table `timbre`
--

CREATE TABLE `timbre` (
  `idTimbre` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `annee` int(4) DEFAULT NULL,
  `tirage` varchar(45) DEFAULT NULL,
  `condition` varchar(45) NOT NULL,
  `dimmensions` varchar(45) DEFAULT NULL,
  `certifie` tinyint(1) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `couleur` varchar(45) DEFAULT NULL,
  `favori_du_Lord` tinyint(4) DEFAULT NULL,
  `Pays_idPays` int(11) NOT NULL,
  `Categorie_idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timbre`
--

INSERT INTO `timbre` (`idTimbre`, `nom`, `annee`, `tirage`, `condition`, `dimmensions`, `certifie`, `details`, `couleur`, `favori_du_Lord`, `Pays_idPays`, `Categorie_idCategorie`) VALUES
(191, '1840 Année Complète des Timbres Français SG2v', 1840, '900 pc', 'Utilisé (Usé);  Avec taches d&#39;encre; Bien', ' 20mm x 15mm ', 0, 'Les 2 timbres du haut neufs*. Le timbre du bas à droite, variété &#34;4 large pseudo retouché&#34;. Bloc signé Brun avec certificat attestant la variété. Superbe et RARE. Valeur catalogue très très élevée', ' Multi ', 1, 4, 3),
(196, 'Timbre - France 1849 - Collection symboles', 2000, '   900 pc', 'Utilisé (Usé);  Avec taches d&#39;encre; Bien', ' 27mm  x  20mm     ', 1, 'Une très bonne collection d&#39;une très belle qualité.\r\nDans l&#39;album il y a Michel n°7a/7b total 5x, n°17b, n°32 5x, etc......\r\n\r\nS&#39;il vous plaît voir les photos pour faire votre propre impression.\r\nMichel 2016 valeur catalogue. 35,000 CAD', ' bleu     ', 0, 4, 3),
(197, '1870 Timbres Français Symboles  SG2v', 1870, '  20 pc', 'Utilisée, Traces d&#39;encre', ' 27mm  x  20mm  ', 1, ' Bloc signé Brun avec certificat attestant la variété.\r\n\r\nSuperbe et RARE.\r\n\r\nValeur catalogue très très élevée', 'Multicouleur  ', 0, 4, 7),
(198, 'Canard', 2345, ' 40pc', 'Utilisé (Usé);  Avec taches d&#39;encre; Bien', ' 27mm  x  20mm', 0, 'ertue56i', ' rouge', 1, 1, 2),
(200, 'Oiseaux - canards, timbre - Canada.', 2007, '  400pc', 'Neuf, Mint', ' 27mm x 20mm ', 1, 'Un beau timbre - canard - état neuf, jamais utilisé. Voir les photos pour votre propre impression. Sera envoyé par courrier recommandé.', ' bleu ', 0, 1, 1),
(201, 'Timbres Français &#34;Avions&#34;. Poste-Fran', 1954, '  30pc', 'Utilisée, Traces d&#39;encre', ' 27mm x 20mm ', 1, ' 2 timbres oblitérés. Ces collections sont scrupuleusement constituées , cependant une erreur est toujours possible,n&#39;hésitez pas à  nous le faire savoir.', ' vert, rouge ', 1, 4, 2),
(202, 'Les premiers Timbre Poste-France 1849', 1849, '  20 pc', 'Neuf, Mint', ' 20mm x 15mm', 1, 'Collection de timbres oblitérés tous différents - La photo représente un exemple des timbres que vous pourriez trouver dans cette collection.D&#39;une façon générale les timbres sont oblitérés (sauf indication contraire),quelques timbres neufs peuvent êtr', ' vert, rouge, bleu, brun', 0, 4, 3),
(203, 'Collection de timbres Bielorussie oblitérés', 1996, ' 300pc', 'Utilisé', ' 27mm x 20mm', 0, 'La Biélorussie, aussi appelée Bélarus est un pays d&#39;Europe orientale bordé à l&#39;ouest par la Pologne. Nous vous proposons l&#39;album philatélique Corona particulièrement bien adapté au classement de plusieurs centaines de timbres. - La photo repré', ' vert, rouge, bleu, brun', 0, 6, 6),
(204, 'Timbre Hérisson Éeuropéen - Mongolie', 1954, ' 10pc', 'Utilisé', ' 27mm x 20mm', 1, 'Timbre Hérisson Éeuropéen - de Mongolie. Forme Triangle,  tres rare - seulement 10 exemplaires ', 'blanc, rose', 0, 5, 1),
(205, '&#34;Inverted Jenny&#34;  - Jenny inversée', 1955, '    100pc', 'Neuf, Mint', ' 27mm x 20mm  ', 1, 'Jenny inversée, l&#39;un des 100 timbres notoirement mal imprimés, imprimé au bureau de la Philatelic Foundation à New York. Jenny No. 76 faisait partie d&#39;un bloc de quatre Jennies qui ont disparu lors d&#39;une exposition de timbres à Norfolk, en Virinie en 1955', ' rouge  ', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `usager`
--

CREATE TABLE `usager` (
  `idUsager` int(11) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `courriel` varchar(45) DEFAULT NULL,
  `adresse` varchar(255) NOT NULL,
  `dateRegistration` datetime NOT NULL,
  `membre` tinyint(4) DEFAULT NULL,
  `Role_idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usager`
--

INSERT INTO `usager` (`idUsager`, `prenom`, `nom`, `username`, `password`, `courriel`, `adresse`, `dateRegistration`, `membre`, `Role_idRole`) VALUES
(96, 'Val', 'Admin', NULL, '$2y$12$ET2NR5/VVxXxs1JATMsv7.IPo4yztO/8lTtitBiCHQ0A8T28fp8Yi', 'admin@stampee.com', '50 Main Street', '2021-06-30 20:32:49', 0, 1),
(98, 'Cris ', 'B', NULL, '$2y$12$lG40NnUNs9SvyFwdFqaO3ecLpEcWM7rehVdcneLDwLlB/d7BrinV6', 'CB@CB.com', '10 Chemin Central, apt 107', '2021-07-01 16:16:19', 1, 2),
(107, 'Babe', 'D', NULL, '$2y$12$fEWqqzHYhoCAjQWFj8lkk.4R6Rl5B7i7saqmXYKz1JqCYEwFH8GpO', 'cico@hh.om', '1 Place de la Costa Verde, apt 217', '2021-07-06 04:10:33', 0, 2),
(109, 'V1', 'v1', NULL, '$2y$12$qi6f49xDk478WCddXofB6ODniXgLRlz5kpsuec45gnFHGhvzfJBYe', 'V1@V1.com', 'vi address', '2021-07-07 18:00:25', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `enchere`
--
ALTER TABLE `enchere`
  ADD PRIMARY KEY (`idEnchere`,`Timbre_idTimbre`),
  ADD KEY `fk_Enchere_Timbre1_idx` (`Timbre_idTimbre`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`),
  ADD KEY `fk_Image_Timbre1_idx` (`Timbre_idTimbre`);

--
-- Indexes for table `mise`
--
ALTER TABLE `mise`
  ADD PRIMARY KEY (`Usager_idUsager`,`Enchere_idEnchere`),
  ADD KEY `fk_Mise_Usager1_idx` (`Usager_idUsager`),
  ADD KEY `fk_Mise_Enchere1_idx` (`Enchere_idEnchere`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPays`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `timbre`
--
ALTER TABLE `timbre`
  ADD PRIMARY KEY (`idTimbre`),
  ADD KEY `fk_Timbre_Pays1_idx` (`Pays_idPays`),
  ADD KEY `fk_Timbre_Categorie1_idx` (`Categorie_idCategorie`);

--
-- Indexes for table `usager`
--
ALTER TABLE `usager`
  ADD PRIMARY KEY (`idUsager`),
  ADD KEY `fk_Usager_Role1_idx` (`Role_idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `enchere`
--
ALTER TABLE `enchere`
  MODIFY `idEnchere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `idPays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timbre`
--
ALTER TABLE `timbre`
  MODIFY `idTimbre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `usager`
--
ALTER TABLE `usager`
  MODIFY `idUsager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `fk_Enchere_Timbre1` FOREIGN KEY (`Timbre_idTimbre`) REFERENCES `timbre` (`idTimbre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_Image_Timbre1` FOREIGN KEY (`Timbre_idTimbre`) REFERENCES `timbre` (`idTimbre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mise`
--
ALTER TABLE `mise`
  ADD CONSTRAINT `fk_Mise_Enchere1` FOREIGN KEY (`Enchere_idEnchere`) REFERENCES `enchere` (`idEnchere`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mise_Usager1` FOREIGN KEY (`Usager_idUsager`) REFERENCES `usager` (`idUsager`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `timbre`
--
ALTER TABLE `timbre`
  ADD CONSTRAINT `fk_Timbre_Categorie1` FOREIGN KEY (`Categorie_idCategorie`) REFERENCES `categorie` (`idCategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Timbre_Pays1` FOREIGN KEY (`Pays_idPays`) REFERENCES `pays` (`idPays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usager`
--
ALTER TABLE `usager`
  ADD CONSTRAINT `fk_Usager_Role1` FOREIGN KEY (`Role_idRole`) REFERENCES `role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
