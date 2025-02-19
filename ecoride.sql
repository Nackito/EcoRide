-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 19 fév. 2025 à 19:09
-- Version du serveur : 9.2.0
-- Version de PHP : 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecoride`
--

-- --------------------------------------------------------

--
-- Structure de la table `Avis`
--

CREATE TABLE `Avis` (
  `avis_id` int NOT NULL,
  `commentaire` text,
  `note` int DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avisUtilisateur`
--

CREATE TABLE `avisUtilisateur` (
  `utilisateur_id` int NOT NULL,
  `avis_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Configuration`
--

CREATE TABLE `Configuration` (
  `id_configuration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Covoiturage`
--

CREATE TABLE `Covoiturage` (
  `covoiturage_id` int NOT NULL,
  `date_depart` date DEFAULT NULL,
  `heure_depart` time DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `heure_arrivee` time DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `nb_place` int DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL,
  `lieu_depart` varchar(255) DEFAULT NULL,
  `lieu_arrive` varchar(255) DEFAULT NULL,
  `voiture_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Covoiturage`
--

INSERT INTO `Covoiturage` (`covoiturage_id`, `date_depart`, `heure_depart`, `date_arrivee`, `heure_arrivee`, `statut`, `nb_place`, `prix`, `utilisateur_id`, `lieu_depart`, `lieu_arrive`, `voiture_id`) VALUES
(1, '2025-02-20', '10:00:00', '2025-02-20', '18:00:00', 'Depart bientot', 4, 26, 1, 'Paris', 'Marseille', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Marque`
--

CREATE TABLE `Marque` (
  `marque_id` int NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `MarqueVoiture`
--

CREATE TABLE `MarqueVoiture` (
  `voiture_id` int NOT NULL,
  `marque_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Parametre`
--

CREATE TABLE `Parametre` (
  `parametre_id` int NOT NULL,
  `propriete` varchar(255) DEFAULT NULL,
  `valeur` varchar(255) DEFAULT NULL,
  `id_configuration` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Role`
--

CREATE TABLE `Role` (
  `role_id` int NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Role`
--

INSERT INTO `Role` (`role_id`, `libelle`) VALUES
(1, 'chauffeur'),
(2, 'passager');

-- --------------------------------------------------------

--
-- Structure de la table `roleUtilisateur`
--

CREATE TABLE `roleUtilisateur` (
  `utilisateur_id` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roleUtilisateur`
--

INSERT INTO `roleUtilisateur` (`utilisateur_id`, `role_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `utilisateur_id` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text,
  `date_naissance` date DEFAULT NULL,
  `photo` blob,
  `pseudo` varchar(255) DEFAULT NULL,
  `credits` int DEFAULT NULL,
  `note` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`utilisateur_id`, `nom`, `prenom`, `email`, `password`, `telephone`, `adresse`, `date_naissance`, `photo`, `pseudo`, `credits`, `note`) VALUES
(1, '', '', 'jdoe@gmail.com', '$2y$10$4J76gSwphpDZ8X2XVyWR4eiutGbMMQSkvaR2rwQY1QPEiFofqUt.i', NULL, '', NULL, '', 'Debamba', 20, NULL),
(2, '', '', 'jdoe@gmail.com', '$2y$10$vDzxd0cAtmMTuAftx5X4qOZwfRToxjCfTVNyXZAOFEuCWCTWffPEq', NULL, '', NULL, '', 'Debamba', 20, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurCovoiturage`
--

CREATE TABLE `utilisateurCovoiturage` (
  `utilisateur_id` int NOT NULL,
  `covoiturage_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Voiture`
--

CREATE TABLE `Voiture` (
  `voiture_id` int NOT NULL,
  `modele` varchar(255) DEFAULT NULL,
  `immatriculation` varchar(50) DEFAULT NULL,
  `energie` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `date_premiere_immatriculation` date DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Voiture`
--

INSERT INTO `Voiture` (`voiture_id`, `modele`, `immatriculation`, `energie`, `couleur`, `date_premiere_immatriculation`, `utilisateur_id`) VALUES
(1, 'MG4', 'AP-475-HV', 'Electric', 'GRIS', '2021-02-03', 1),
(2, 'MG3', 'AM-465-HV', 'Hybride', 'ROUGE', '2024-12-30', 1);

-- --------------------------------------------------------

--
-- Structure de la table `voitureCovoiturage`
--

CREATE TABLE `voitureCovoiturage` (
  `covoiturage_id` int NOT NULL,
  `voiture_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `voitureUtilisateur`
--

CREATE TABLE `voitureUtilisateur` (
  `utilisateur_id` int NOT NULL,
  `voiture_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Avis`
--
ALTER TABLE `Avis`
  ADD PRIMARY KEY (`avis_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `avisUtilisateur`
--
ALTER TABLE `avisUtilisateur`
  ADD PRIMARY KEY (`utilisateur_id`,`avis_id`),
  ADD KEY `avis_id` (`avis_id`);

--
-- Index pour la table `Configuration`
--
ALTER TABLE `Configuration`
  ADD PRIMARY KEY (`id_configuration`);

--
-- Index pour la table `Covoiturage`
--
ALTER TABLE `Covoiturage`
  ADD PRIMARY KEY (`covoiturage_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `voiture_id` (`voiture_id`);

--
-- Index pour la table `Marque`
--
ALTER TABLE `Marque`
  ADD PRIMARY KEY (`marque_id`);

--
-- Index pour la table `MarqueVoiture`
--
ALTER TABLE `MarqueVoiture`
  ADD PRIMARY KEY (`voiture_id`,`marque_id`),
  ADD KEY `marque_id` (`marque_id`);

--
-- Index pour la table `Parametre`
--
ALTER TABLE `Parametre`
  ADD PRIMARY KEY (`parametre_id`),
  ADD KEY `id_configuration` (`id_configuration`);

--
-- Index pour la table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `roleUtilisateur`
--
ALTER TABLE `roleUtilisateur`
  ADD PRIMARY KEY (`utilisateur_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`);

--
-- Index pour la table `utilisateurCovoiturage`
--
ALTER TABLE `utilisateurCovoiturage`
  ADD PRIMARY KEY (`utilisateur_id`,`covoiturage_id`),
  ADD KEY `covoiturage_id` (`covoiturage_id`);

--
-- Index pour la table `Voiture`
--
ALTER TABLE `Voiture`
  ADD PRIMARY KEY (`voiture_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `voitureCovoiturage`
--
ALTER TABLE `voitureCovoiturage`
  ADD PRIMARY KEY (`covoiturage_id`,`voiture_id`),
  ADD KEY `voiture_id` (`voiture_id`);

--
-- Index pour la table `voitureUtilisateur`
--
ALTER TABLE `voitureUtilisateur`
  ADD PRIMARY KEY (`utilisateur_id`,`voiture_id`),
  ADD KEY `voiture_id` (`voiture_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Avis`
--
ALTER TABLE `Avis`
  MODIFY `avis_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Configuration`
--
ALTER TABLE `Configuration`
  MODIFY `id_configuration` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Covoiturage`
--
ALTER TABLE `Covoiturage`
  MODIFY `covoiturage_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Marque`
--
ALTER TABLE `Marque`
  MODIFY `marque_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Parametre`
--
ALTER TABLE `Parametre`
  MODIFY `parametre_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Role`
--
ALTER TABLE `Role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `utilisateur_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Voiture`
--
ALTER TABLE `Voiture`
  MODIFY `voiture_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Avis`
--
ALTER TABLE `Avis`
  ADD CONSTRAINT `Avis_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `avisUtilisateur`
--
ALTER TABLE `avisUtilisateur`
  ADD CONSTRAINT `avisUtilisateur_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `avisUtilisateur_ibfk_2` FOREIGN KEY (`avis_id`) REFERENCES `Avis` (`avis_id`);

--
-- Contraintes pour la table `Covoiturage`
--
ALTER TABLE `Covoiturage`
  ADD CONSTRAINT `Covoiturage_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `MarqueVoiture`
--
ALTER TABLE `MarqueVoiture`
  ADD CONSTRAINT `MarqueVoiture_ibfk_1` FOREIGN KEY (`voiture_id`) REFERENCES `Voiture` (`voiture_id`),
  ADD CONSTRAINT `MarqueVoiture_ibfk_2` FOREIGN KEY (`marque_id`) REFERENCES `Marque` (`marque_id`);

--
-- Contraintes pour la table `Parametre`
--
ALTER TABLE `Parametre`
  ADD CONSTRAINT `Parametre_ibfk_1` FOREIGN KEY (`id_configuration`) REFERENCES `Configuration` (`id_configuration`);

--
-- Contraintes pour la table `roleUtilisateur`
--
ALTER TABLE `roleUtilisateur`
  ADD CONSTRAINT `roleUtilisateur_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `roleUtilisateur_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `Role` (`role_id`);

--
-- Contraintes pour la table `utilisateurCovoiturage`
--
ALTER TABLE `utilisateurCovoiturage`
  ADD CONSTRAINT `utilisateurCovoiturage_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `utilisateurCovoiturage_ibfk_2` FOREIGN KEY (`covoiturage_id`) REFERENCES `Covoiturage` (`covoiturage_id`);

--
-- Contraintes pour la table `Voiture`
--
ALTER TABLE `Voiture`
  ADD CONSTRAINT `Voiture_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`);

--
-- Contraintes pour la table `voitureCovoiturage`
--
ALTER TABLE `voitureCovoiturage`
  ADD CONSTRAINT `voitureCovoiturage_ibfk_1` FOREIGN KEY (`covoiturage_id`) REFERENCES `Covoiturage` (`covoiturage_id`),
  ADD CONSTRAINT `voitureCovoiturage_ibfk_2` FOREIGN KEY (`voiture_id`) REFERENCES `Voiture` (`voiture_id`);

--
-- Contraintes pour la table `voitureUtilisateur`
--
ALTER TABLE `voitureUtilisateur`
  ADD CONSTRAINT `voitureUtilisateur_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `voitureUtilisateur_ibfk_2` FOREIGN KEY (`voiture_id`) REFERENCES `Voiture` (`voiture_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
