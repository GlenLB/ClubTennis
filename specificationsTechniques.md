# Club de tennis

## Spécifications techniques :

### Variables d'environnement :
La variable d'environnement *TENNISROOTDIR* doit être définie à la racine du dossier contenant le site.
Pour cela, ajouter la variable au fichier "/etc/apache2/envvars" : export TENNISROOTDIR=cheminversledossier.
**Essayer de la défninir dans le .htaccess pour prod**

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