-- Structure de la table 'Avis'

CREATE TABLE `Avis` (
  `avis_id` int AUTO_INCREMENT PRIMARY KEY,
  `commentaire` text,
  `note` int DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL,
  CONSTRAINT fk_utilisateur_avis FOREIGN  KEY (utilisateur_id) REFERENCES Utilisateur (utilisateur_id)
  );

-- Structure de la table `avisUtilisateur`

CREATE TABLE `avisUtilisateur` (
  `utilisateur_id` int NOT NULL,
  `avis_id` int NOT NULL
  CONSTRAINT fk_utilisateur FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur (utilisateur_id),
  CONSTRAINT fk_avis FOREIGN KEY (avis_id) REFERENCES Avis (avis_id)
  );

-- --------------------------------------------------------

--
-- Structure de la table `Configuration`
--

CREATE TABLE `Configuration` (
  `id_configuration` int AUTO_INCREMENT
);

-- Structure de la table `Covoiturage`

CREATE TABLE `Covoiturage` (
  `covoiturage_id` int AUTO_INCREMENT PRIMARY KEY,
  `date_depart` date DEFAULT NULL,
  `heure_depart` time DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `heure_arrivee` time DEFAULT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `nb_place` int DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `lieu_depart` varchar(255) DEFAULT NULL,
  `lieu_arrive` varchar(255) DEFAULT NULL,
  `voiture_id` int DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL,
  CONSTRAINT fk_utilisateur_covoit FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur(utilisateur_id),
  CONSTRAINT fk_voiture FOREIGN KEY (voiture_id) REFERENCES Voiture(voiture_id)
  );

-- Déchargement des données de la table `Covoiturage`

INSERT INTO `Covoiturage` (`covoiturage_id`, `date_depart`, `heure_depart`, `date_arrivee`, `heure_arrivee`, `statut`, `nb_place`, `prix`, `utilisateur_id`, `lieu_depart`, `lieu_arrive`, `voiture_id`) VALUES
(1, '2025-02-20', '10:00:00', '2025-02-20', '18:00:00', 'Depart bientot', 4, 26, 1, 'Paris', 'Marseille', 1);

-- Structure de la table `Marque`

CREATE TABLE `Marque` (
  `marque_id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(255)
  );

-- Structure de la table `MarqueVoiture`

CREATE TABLE `MarqueVoiture` (
  `voiture_id` int NOT NULL,
  `marque_id` int NOT NULL,
  CONSTRAINT fk_voiture FOREIGN KEY (voiture_id) REFERENCES Voiture (voiture_id),
  CONSTRAINT fk__marque FOREIGN KEY (marque_id) REFERENCES Marque (marque_id)
  );

-- Structure de la table `Parametre`

CREATE TABLE `Parametre` (
  `parametre_id` int AUTO_INCREMENT,
  `propriete` varchar(255) DEFAULT NULL,
  `valeur` varchar(255) DEFAULT NULL,
  `id_configuration` int DEFAULT NULL
  FOREIGN (id_configuration) REFERENCES Configuration (id_configuration)
  );

-- Structure de la table `Role`

CREATE TABLE `Role` (
  `role_id` int AUTO_INCREMENT PRIMARY KEY,
  `libelle` varchar(255)
  );

-- Déchargement des données de la table `Role`

INSERT INTO `Role` (`role_id`, `libelle`) VALUES
(1, 'chauffeur'),
(2, 'passager');

-- Structure de la table `roleUtilisateur`

CREATE TABLE `roleUtilisateur` (
  `utilisateur_id` int NOT NULL,
  `role_id` int NOT NULL,
  CONSTRAINT fk_utilisateur FOREIGN KEY (utilisateur_id) REFERENCES Utilisateur (utilisateur_id),
  CONSTRAINT fk_role FOREIGN KEY (role_id) REFERENCES Role (role_id)
  );

-- Déchargement des données de la table `roleUtilisateur`

INSERT INTO `roleUtilisateur` (`utilisateur_id`, `role_id`) VALUES
(1, 2);

-- Structure de la table `Utilisateur`

CREATE TABLE `Utilisateur` (
  `utilisateur_id` int AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `adresse` text,
  `date_naissance` date DEFAULT NULL,
  `photo` blob,
  `pseudo` varchar(255) DEFAULT NULL,
  `credits` int DEFAULT NULL
  );

-- Déchargement des données de la table `Utilisateur`

INSERT INTO `Utilisateur` (`utilisateur_id`, `nom`, `prenom`, `email`, `password`, `telephone`, `adresse`, `date_naissance`, `photo`, `pseudo`, `credits`) VALUES
(1, '', '', 'jdoe@gmail.com', '$2y$10$4J76gSwphpDZ8X2XVyWR4eiutGbMMQSkvaR2rwQY1QPEiFofqUt.i', NULL, '', NULL, '', 'Debamba', 20),
(2, '', '', 'jdoe@gmail.com', '$2y$10$vDzxd0cAtmMTuAftx5X4qOZwfRToxjCfTVNyXZAOFEuCWCTWffPEq', NULL, '', NULL, '', 'Debamba', 20);

-- Structure de la table `utilisateurCovoiturage`

CREATE TABLE `utilisateurCovoiturage` (
  `utilisateur_id` int NOT NULL,
  `covoiturage_id` int NOT NULL,
  FOREIGN (utilisateur_id) REFERENCES Utilisateur (utilisateur_id),
  FOREIGN (covoiturage_id) REFERENCES Covoiturage (covoiturage_id)
  );

-- Structure de la table `Voiture`

CREATE TABLE `Voiture` (
  `voiture_id` int AUTO_INCREMENT PRIMARY KEY,
  `modele` varchar(255) DEFAULT NULL,
  `immatriculation` varchar(50) DEFAULT NULL,
  `energie` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `date_premiere_immatriculation` date DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL,
  CONSTRAINT fk_utilisateur FOREIGN (utilisateur_id) REFERENCES Utilisateur (utilisateur_id)
  );

INSERT INTO `Voiture` (`voiture_id`, `modele`, `immatriculation`, `energie`, `couleur`, `date_premiere_immatriculation`, `utilisateur_id`) VALUES
(1, 'MG4', 'AP-475-HV', 'Electric', 'GRIS', '2021-02-03', 1),
(2, 'MG3', 'AM-465-HV', 'Hybride', 'ROUGE', '2024-12-30', 1);

-- Structure de la table `voitureCovoiturage`

CREATE TABLE `voitureCovoiturage` (
  `covoiturage_id` int NOT NULL,
  `voiture_id` int NOT NULL,
  FOREIGN (covoiturage_id) REFERENCES Covoiturage (covoiturage_id),
  FOREIGN (voiture_id) REFERENCES Voiture (voiture_id)
  );
