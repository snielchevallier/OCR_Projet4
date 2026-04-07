# TOM TROC

## DESCRIPTION

**TomTroc** est une application web permettant de mettre en relation des lecteurs afin qu’ils puissent partager et échanger leurs livres.

Chaque utilisateur peut gérer sa bibliothèque personnelle et communiquer avec d'autres membres via un système de messagerie intégré.

## STACK TECHNIQUE

- **Frontend** : Tailwind CSS 3.4.19 (pages statiques)
- **Gestionnaire de dépendances** : nodejs 24.13.1, npm 11.8.0
- **Backend** : PHP 8.3.28
- **Base de données** : MySQL 8.4.7


## RESSOURCES
**repo Github** :

https://github.com/snielchevallier/OCR_Projet4/tree/develop

**Maquette Figma** :

https://www.figma.com/design/igDdidGb6uJ7ykjROaAB8z/P6-PHP-Symfony---Tom-Troc?node-id=0-1&p=f&t=3GLpWr6MyXjcsQjH-0


## INSTALLATION
### GIT
git clone git@github.com:snielchevallier/OCR_Projet4.git


cd OCR_Projet4


git checkout develop


### Comptes Tests
user1@tomtroc.com

user1TT

user2@tomtroc.com

user2TT

### FRONTEND
les sources du front sont dans le dossier _front.

**Installation** : npm install

**compilation** (avec watcher) : npm run dev

**build** ->copie le fichier de styles dans le dossier /public/assets/styles de l'appli : npm run build



### BACKEND
- bdd

à la racine du projet se trouve l'export de la bdd à importer.

il contient la structure des tables et quelques données de test.

-application

le virtualhost doit pointer vers le dossier "**/public**"

renommer le fichier "**/config/config.example**" en "**/config/config.php**", mettre à jour les variables suivantes avec vos informations

- 'DB_HOST'
- 'DB_NAME'
- 'DB_USER'
- 'DB_PASS'
- 'BASE_URL'

## STRUCTURE

L'appli est développée en suivant le modèle MVC.

Le routeur est dans le fichier "**/public/index.php**".

l'ensenmble des Modèles, Managers, Controllers et des vues sont dans le dossier "**/App**"