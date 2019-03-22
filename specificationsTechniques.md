# Club de tennis

## Spécifications techniques :

### Variables d'environnement :
La variable d'environnement *TENNISROOTDIR* doit être définie, et doit stocker le chemin menant à la racine du dossier contenant le site.
La variable d'environnement *MYSQL_PASS* doit être définie, et doit stocker le mot de passe de la base de données.
Pour cela, ajouter ces variables d'environnement au fichier "/etc/apache2/envvars" : 
export TENNISROOTDIR=cheminVersLeDossier
export MYSQL_PASS=saisirMotDePasse.

### Partie client :
* Variables CSS
* Flexbox
* CSS Grid layout
* Deferring images 
* Deferring JS
* 1 feuille de style par media queries
* JavaScript ES6+ mode strict
* AJAX pour tous les échanges serveur (API fetch ?)

### Partie serveur :
* PHP 7
* Architecture MVC
* Templates et partials
* Namespaces 

### Base de données :
* Mysql
* Driver PDO 
* Validation des requêtes dans PHPMyAdmin 

### Sécurité :
* Https pour le site en production
* Requêtes SQL PDO préparées
* HTML escaped
* Hashage mdp