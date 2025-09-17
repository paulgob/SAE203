-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 avr. 2025 à 17:01
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_Categorie` int(11) NOT NULL,
  `nom` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_Categorie`, `nom`) VALUES
(1, 'Animal'),
(2, 'Flower');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_Client` int(11) NOT NULL,
  `prenom` varchar(12) NOT NULL,
  `nom` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_Client`, `prenom`, `nom`, `email`) VALUES
(1, 'Jean', 'Dupont', 'jDupont.75@gmail.com'),
(2, 'Marie', 'Dupuis', 'marieD@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_Commande` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `date_Commande` date NOT NULL,
  `statut` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `id_Client` int(11) NOT NULL,
  `id_Produit` int(11) NOT NULL
) ;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_Commande`, `adresse`, `date_Commande`, `statut`, `total`, `id_Client`, `id_Produit`) VALUES
(1, '10 rue de la paix', '2023-10-01', 'en attente', 100, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id_Marque` int(11) NOT NULL,
  `nom` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id_Marque`, `nom`) VALUES
(1, 'Royal Animal'),
(2, 'Flower Power');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_Panier` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_Client` int(11) NOT NULL,
  `id_Produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_Panier`, `quantite`, `id_Client`, `id_Produit`) VALUES
(1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_Produit` int(11) NOT NULL,
  `nom` varchar(12) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `prix` float NOT NULL,
  `id_Marque` int(11) NOT NULL,
  `id_Categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_Produit`, `nom`, `description`, `stock`, `prix`, `id_Marque`, `id_Categorie`) VALUES
(1, 'Croquette po', 'Super croquette 100% adapté aux besoins des lapins', 10, 5, 1, 1),
(2, 'Rose noir', 'Fleur de rose noir de qualité premium.', 50, 10, 2, 2),
(3, 'Litière', 'Une litière incroyable répondant aux besoins de no', 5, 35, 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_Categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_Client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_Commande`),
  ADD KEY `FK_client_TO_commande` (`id_Client`),
  ADD KEY `FK_produit_TO_commande` (`id_Produit`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_Marque`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_Panier`),
  ADD KEY `FK_client_TO_panier` (`id_Client`),
  ADD KEY `FK_produit_TO_panier` (`id_Produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_Produit`),
  ADD KEY `FK_marque_TO_produit` (`id_Marque`),
  ADD KEY `FK_categorie_TO_produit` (`id_Categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_Categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_Commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_Marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_Panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_Produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_client_TO_commande` FOREIGN KEY (`id_Client`) REFERENCES `client` (`id_Client`),
  ADD CONSTRAINT `FK_produit_TO_commande` FOREIGN KEY (`id_Produit`) REFERENCES `produit` (`id_Produit`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_client_TO_panier` FOREIGN KEY (`id_Client`) REFERENCES `client` (`id_Client`),
  ADD CONSTRAINT `FK_produit_TO_panier` FOREIGN KEY (`id_Produit`) REFERENCES `produit` (`id_Produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_categorie_TO_produit` FOREIGN KEY (`id_Categorie`) REFERENCES `categorie` (`id_Categorie`),
  ADD CONSTRAINT `FK_marque_TO_produit` FOREIGN KEY (`id_Marque`) REFERENCES `marque` (`id_Marque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
