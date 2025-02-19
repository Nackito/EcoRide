# EcoRide

La startup "EcoRide" fraichement crée en France, a pour objectif de réduire l'impact environnemental des déplacements en encourageant le covoiturage

## Description

EcoRide est une application de covoiturage écologique qui permet aux utilisateurs de rechercher, créer et gérer des trajets de covoiturage.

## Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- PHP (version 7.4 ou supérieure)
- Composer
- MySQL
- Un serveur web (Apache, Nginx, etc.)

## Installation

### 1. Cloner le dépôt

Clonez le dépôt GitHub de l'application sur votre machine locale :

```bash
git clone https://github.com/votre-utilisateur/EcoRide.git
cd EcoRide

```

### 2. Installer les dépendances

Utilisez Composer pour installer les dépendances PHP :
composer install

### 3. Configurer la base de données

Créez une base de données MySQL pour l'application :
CREATE DATABASE ecoride;

Importez le fichier SQL fourni pour créer les tables nécessaires :
mysql -u votre-utilisateur -p ecoride < database/ecoride.sql

### 4. Configurer les variables d'environnement

Créez un fichier .env à la racine du projet et ajoutez les informations de configuration de la base de données :
DB_HOST=localhost
DB_NAME=ecoride
DB_USER=votre-utilisateur
DB_PASS=votre-mot-de-passe

### 5. Démarrer le serveur web

Utilisez le serveur web intégré de PHP pour démarrer l'application :
php -S localhost:8000 -t public

### 6. Accéder à l'application

Ouvrez votre navigateur web et accédez à l'URL suivante :
http://localhost:8000

- Fonctionnalités

  - Rechercher des trajets de covoiturage
  - Créer un nouveau trajet de covoiturage
  - Gérer les trajets de covoiturage
  - Voir les détails des trajets

- Structure du projet

  - public/ : Contient les fichiers accessibles publiquement (index.php, assets, etc.)
  - src : Contient le code source de l'application (contrôleurs, modèles, vues, etc.)
  - templates : Contient les fichiers de templates (header.php, footer.php, etc.)
  - database/ : Contient les fichiers de configuration de la base de données

- Aide
  Si vous rencontrez des problèmes ou avez des questions, n'hésitez pas à ouvrir une issue sur le dépôt GitHub.

Auteur
Nom : Frank
Email : cdricdebamba@gmil.com
