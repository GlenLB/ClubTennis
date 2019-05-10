# Notice d'installation du site web

<ol>
    <li>Clonez le projet ou téléchargez et extrayez le .zip depuis la page Github du projet.</li>
    <li>Dans le répertoire /env/, créez un fichier .env qui servira à stocker les variables d'environnement. Ce fichier est protégé par un .htaccess, vous pouvez donc y inscrire des mots de passe.</li>
    <li>Dans ce fichier doivent être définies les variables d'environnement suivantes :<br>
    - TENNISROOTDIR (path de la racine de votre machine jusqu'au répertoire du projet).<br>
    - MYSQL_USER (nom d'utilisateur de la base de données).<br>
    - MYSQL_PASS (mot de passe de la base de données).<br>
    - GMAIL_PASS (mot de passe de votre compte mail pour l'envoi de mail, modifier aussi dans le fichier /bdd/php/envoiMail.php l'adresse mail en mettant la votre).<br>
    - BDD_NAME (le nom de votre base de données).</li>
    <li>Vous pouvez recréer la base de données en important dans votre SGBD le fichier /bdd/sql/CLUBTENNIS.sql.</li>
</ol>

**Les fichiers du projet doivent être à la racine de votre serveur HTTP pour que le site web fonctionne.**

