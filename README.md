# Réalisation du site web pour le Garage V.Parrot - Sujet ECF



# Documentations Techniques : 

1. [Documentation Projet & Produit](https://drive.google.com/file/d/1ceVtFqiwU6245p2H3EucoeHQVh5dpYyv/view?usp=sharing)

2. [Charte graphique & Maquettes](https://drive.google.com/file/d/1pmwmWuqx8ZkZT7hvDhBlj1ePx_3qiqXa/view?usp=sharing)

3. [Manuel d'Utilisation](https://drive.google.com/file/d/1W7pvzIBLsEiKdlsl-j5hXgC5gKI79hF0/view?usp=sharing)



# Installation en local

Afin de faire fonctionner le site et le visualiser sur votre serveur local, il vous faut: 

1. Créer un projet Symfony dans votre éditeur de code (exemple: VSCode) 

2. Inserer mes fichiers dans votre projet et installer les dépendances citées dans le fichier bundles.php

3. Ouvrir votre client serveur(exemple: Xampp) et start Apache et MySQL

4. Créer un fichier .env.local dans votre dossier principal et y ajouter la valeur de DATABASE_URL pour configurer la base de données sur votre serveur

5. Taper les commandes suivantes dans votre terminal: 
$ php bin/console doctrine:database:create      // Crée la base de données
$ php bin/console doctrine:migrations:diff   // Compare les tableaux dans la base de données et les entités crées en local. 
$ php bin/console doctrine:migrations:migrate  // Crée les tableaux associés aux entités dans la base de données

6. Ajouter les valeur de ADMIN_ID et ADMIN_PASSWORD afin de définir l'identifiant de ladministrateur ainsi que son mot de passe et taper la commande suivante dans votre terminal pour executer les fixtures: 
$ php bin/console doctrine:fixtures:load  // Insère les données dans la base de données

7. Lancer le serveur symfony avec la commande :
$ symfony server:start

8. Cliquer sur le lien fourni par la commande précedente ou entrez manuellement l'adresse associée au site web dans votre navigateur. 

9. Le site web est vide ! Il faut donc entrer des données pour tester les differentes functionnalités: 

Phase 1 : Créer les premières données du site
- aller sur la page /login
- Se connecter en Admin
- Gérer les vehicules -> Ajouter 4-5 véhicules
- Gérer les avis -> Ecrire un avis et le mettre en ligne
- Gerer les Employés -> Ajouter un employé
- Changer les horaires -> Modifier les horaires
- Modifier les services du garage -> Créer environ 7 services
- Se deconnecter

Phase 2 : Créer les premières données visiteur
- Ecrire un avis
- Ecrire un message dans le formulaire en bas de page
- Filtrer les vehicules
- Ecrire une question concernant un véhicule

Phase 3 : Voir les nouvelles données visiteurs dans l'espace dédié aux employés
- Se connecter avec le compte employé crée précedement
- Ajouter un véhicule
- Voir les demandes de contact
- Gérer les avis
- Se déconnecter
