/**
 * Effectue la connexion de l'utilisateur après vérification de ses identifiants en base de données.
 * Requête asynchrone AJAX.
 */
export function exec() {
    const btnConnexion = document.querySelector("#modalConnect .btn");
    /* Utilisé pour donner un retour visuel à l'utilisateur sur le succès ou non de sa connexion */
    const msgRetour = document.createElement("div");
    msgRetour.classList.add("connexionRetour");

    /* Lors du clic sur le btn de connexion */
    btnConnexion.onclick = () => {
        msgRetour.style.top = document.querySelector("#modalConnect>form").getBoundingClientRect().top - 80 + "px";
        /* Récupération des données du formulaire */
        const dataForm = document.querySelectorAll("#modalConnect>form input");
        const email = dataForm[0].value;
        const mdp = dataForm[1].value;
        const isValid = validationForm(email, mdp)
        // Si les données ne sont pas valides, avertir l'utilisateur
        if (isValid != "true") {
            msgRetour.innerHTML = isValid;
            msgRetour.classList.add("connexionError");
            document.querySelector("#modalConnect").insertBefore(msgRetour, document.querySelector("#modalConnect>form"));
            console.log("Données saisies par l'utilisateur non valides");
        }
        // Les données sont valides, envoi des données au serveur via AJAX
        else {
            console.log("Données saisies par l'utilisateur valides");
            const request = new XMLHttpRequest();
            const url = window.location.protocol + "//" + window.location.hostname + "/apiConnexion";
            request.open("POST", url);
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.onreadystatechange = () => {
                // La requête est terminée
                if (request.readyState === XMLHttpRequest.DONE) {
                    console.log("AJAX terminé")
                    const response = request.responseText;
                    // Si les identifiants stockés en BDD ne correspondent pas avec ceux fournis par l'utilisateur, avertir l'utilisateur et afficher l'erreur en console
                    if (response !== "success") {
                        // Avertir l'utilisateur
                        msgRetour.innerHTML = response;
                        msgRetour.classList.add("connexionError");
                        document.querySelector("#modalConnect").insertBefore(msgRetour, document.querySelector("#modalConnect>form"));
                        console.log("Connexion non réussie");
                        console.log(response);
                    } else {
                        // Connexion et création de session réussies
                        // Avertit l'utilisateur
                        msgRetour.innerHTML = "Vous êtes connecté.";
                        msgRetour.classList.add("connexionSuccess");
                        msgRetour.classList.remove("connexionError");
                        document.querySelector("#modalConnect").insertBefore(msgRetour, document.querySelector("#modalConnect>form"));
                        console.log("connexion ok");
                        console.log(response);
                    }
                }
            }
            const requestParams = `email=${email}&mdp=${mdp}`;
            console.log(requestParams);
            request.send(requestParams);
        }
    }
}

/**
 * Vérifie que les données saisies par l'utilisateur sont correctes.
 * Vérifications effectuées :
 * Longueur des paramètres
 * Param email contient un "@" et un "."
 * Les chaînes de caractères ne contiennent pas d'élément <script></script>
 * TODO: vérifier l'adresse mail avec une expression régulière
 * @param {string} email 
 * @param {string} mdp 
 */
function validationForm(email, mdp) {
    // Vérification des longueurs de chaînes
    if (email.length < 3) return "L'email doit faire plus de 2 caractères.";
    if (mdp.length < 5) return "Le mot de passe doit faire plus de 4 caractères.";
    // Vérification que l'email contient un @ et un .
    if (!(email.indexOf("@") !== -1 && email.indexOf(".") !== -1)) {
        return "Veuillez saisir une adresse email valide."
    }
    // Vérification que les chaînes ne contiennent pas d'élément <script></script>
    const arrayParams = [email, mdp];
    arrayParams.forEach(param => {
        if (param.indexOf("<script>") !== -1 || param.indexOf("</script>") !== -1) {
            return "Veuillez ne pas insérer de JavaScript."
        }
    });
    return "true";
}
