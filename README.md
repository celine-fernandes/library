# Gestion des Livres et Auteurs - Laravel

Ce projet est une application web construite avec Laravel pour la gestion de livres, d'auteurs et de catégories. Il inclut des fonctionnalités CRUD complètes pour les livres et auteurs, ainsi qu'un système d'authentification. L'interface utilisateur est développée avec Blade.

## Fonctionnalités

- **Gestion des auteurs** 
- **Gestion des livres** 
- **Gestion des catégories**
- **Authentification des utilisateurs**
- **Pagination** 

## Technologies Utilisées

- **Laravel** 
- **Blade**
- **MySQL**
- **Bootstrap**

## Installation

### Prérequis

- PHP >= 8.0
- Composer
- MySQL
- Laravel 9.x

### Étapes d'installation

1. Clonez le projet :
    ```bash
    git clone https://github.com/celine-fernandes/library
    ```

2. Installez les dépendances avec Composer :
    ```bash
    composer install
    ```

3. Créez un fichier `.env` à partir du fichier exemple :
    ```bash
    cp .env.example .env
    ```


4. Configurez les informations de la base de données dans le fichier `.env` :
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nom_de_votre_base_de_donnees
    DB_USERNAME=utilisateur
    DB_PASSWORD=mot_de_passe
    ```

5. Exécutez les migrations pour créer les tables :
    ```bash
    php artisan migrate
    ```

6. Exécutez les seedeurs pour remplir la base de données :
    ```bash
    php artisan db:seed
    ```

8. Démarrez le serveur local :
    ```bash
    php artisan serve
    ```

9. Accédez à l'application via `http://localhost:8000`.




