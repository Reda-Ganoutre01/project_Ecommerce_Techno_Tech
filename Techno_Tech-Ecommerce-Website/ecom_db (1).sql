-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 mars 2024 à 04:32
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_Categorie` int(11) NOT NULL,
  `nom_Categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_Categorie`, `nom_Categorie`) VALUES
(1, 'Pc Gamer'),
(2, 'Souris'),
(3, 'Clavier'),
(4, 'Ecran Gamer'),
(5, 'CASQUE GAMER');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `mod_pass_client` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `email_client`, `mod_pass_client`) VALUES
(1, 'adnanne', 'aryf@gmail.com', '$2y$10$BrXDdy8HA/PKJ17GPjRkKeuOaM4.POPXlrMNpKmypjA'),
(2, 'adnanee', 'aaaa@gmail.com', '$2y$10$BaqyxdFd8KxBILqrHjgb5uwHxiO.2SFglAUiiPZlVG7'),
(3, 'ahmed', 'rrrr@gmail.com', '$2y$10$Y7NHaLciOYZQF8zq0ZG.s.P4jN.OrxFn3kEvMFZQon5'),
(4, 'armani', 'armani@gmail.com', 'didi2023'),
(5, 'redaa', 'reda@gmail.com', 'reda1234'),
(6, 'saadmoltoon', 'saad@gmail.com', 'saad1234'),
(7, 'firstclient', 'first@gmail.com', 'first1234'),
(8, 'reda1234', 'dadada@GMAIL.COM', 'reda1234'),
(9, 'bf455667', 'bf33333@gmail.com', 'bf455667');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prix` int(30) NOT NULL,
  `description` varchar(400) NOT NULL,
  `nbr_star` int(11) NOT NULL,
  `top` int(11) NOT NULL,
  `Nom_categorie` varchar(50) NOT NULL,
  `img` varchar(400) NOT NULL,
  `quantite_en_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix`, `description`, `nbr_star`, `top`, `Nom_categorie`, `img`, `quantite_en_stock`) VALUES
(10, 'Souris razer', 400, '', 4, 10, 'Souris', 'images/img_Products/1.png', 40),
(11, 'Souris', 350, '', 4, 10, 'Souris', 'images/img_Products/2.png', 30),
(12, 'Souris', 350, '', 4, 10, 'Souris', 'images/img_Products/3.png', 40),
(13, 'Razer Blackshark V2', 659, 'Le casque Razer Blackshark V2 X (Noir) vous permet d’améliorer votre expérience de gaming. Ce casque gamer circum-aural offre un son surround virtuel 7.1 afin que vous puissiez vous immerger complètement dans vos jeux préférés. Son design confortable et son couplage auriculaire englobant les oreilles vous permettent de gamer longtemps sans se fatiguer. Il est plus facile à utiliser grâce à sa conn', 4, 10, 'CASQUE GAMER', 'images/img_Products/4.png', 20),
(14, 'ASUS Ecran 24″ VG24VQ', 2850, 'ASUS Ecran 24 VG24VQ Marrakech Maroc\r\n\r\nASUS TUF VG24VQ : La victoire s’inscrit dans votre quotidien\r\nASUS Ecran 24 VG24VQ Marrakech Maroc\r\n\r\nL’heure du combat est toute proche ! Armez-vous avec le moniteur ASUS TUF VG24VQ et mettez toutes les chances de votre côté pour sortir grand vainqueur de cet affrontement ! Cet écran incurvé Full HD à dalle VA de 23.6 pouces possède de sérieux arguments en ', 4, 10, 'Ecran Gamer', 'images/img_Products/5.png', 50),
(15, 'AOC 31.5″ LED – C32G2ZE', 3549, 'AOC 32 C32G2ZE\r\nLa gloire est toute proche avec AOC\r\nPréparez-vous pour les échéances à venir en intégrant dans votre arsenal le moniteur AOC C32G2ZE ! Ce modèle incurvé 240 Hz à dalle VA de 31.5 pouces possède toutes les qualités pour vous mener directement vers la victoire.Bénéficiez d’un temps de réponse ultra-rapide, appréciez le travail de la technologie AMD FreeSync Premium et mettez toutes ', 4, 9, 'Ecran Gamer', 'images/img_Products/6.png', 20);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `produit_nom` varchar(60) NOT NULL,
  `produit_img` varchar(400) NOT NULL,
  `pourcentage_reduction` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `produit_id`, `produit_nom`, `produit_img`, `pourcentage_reduction`, `date_debut`, `date_fin`) VALUES
(2, 14, 'ASUS Ecran 24″ VG24VQ', 'images/img_Products/5.png', 12, '2024-03-12', '2024-03-31'),
(3, 13, 'Razer Blackshark V2 X', 'images/img_Products/4.png', 10, '2024-03-12', '2024-03-31'),
(4, 15, 'AOC 31.5″ LED – C32G2ZE', 'images/img_Products/6.png', 10, '2024-03-26', '2024-03-31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_Categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Nom_categorie` (`Nom_categorie`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produit_id` (`produit_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_Categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `fk_produit_id` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
