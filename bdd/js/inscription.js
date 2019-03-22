/**
 * Éxécute l'inscription de l'utilisateur dans la base de données du club de tennis.
 * Requête asynchrone AJAX.
 */
export function exec() {
    const btnInscription = document.querySelector("#inscriptionBox>form>a");
    /* Utilisé pour donner un retour visuel à l'utilisateur sur le succès ou non de son inscription */
    const msgRetour = document.createElement("div");
    msgRetour.classList.add("inscriptionRetour");

    /* Lors du clic sur le btn d'inscription */
    btnInscription.onclick = () => {
        /* Récupération des données du formulaire */
        const dataForm = document.querySelectorAll("#inscriptionBox>form input");
        const prenom = dataForm[0].value;
        const nom = dataForm[1].value;
        const email = dataForm[2].value;
        const mdp = dataForm[3].value;
        const mdpConfirm = dataForm[4].value;
        const isValid = validationForm(prenom, nom, email, mdp, mdpConfirm)
        // Si les données ne sont pas valides, avertir l'utilisateur
        if (isValid != "true") {
            msgRetour.innerHTML = isValid;
            msgRetour.classList.add("inscriptionError");
            document.querySelector("#inscriptionMain").insertBefore(msgRetour, document.querySelector("#inscriptionBox"));
            console.log("Données saisies par l'utilisateur non valides");
        }
        // Les données sont valides, envoi des données au serveur via AJAX
        else {
            console.log("Données saisies par l'utilisateur valides");
            const request = new XMLHttpRequest();
            const url = window.location.protocol + "//" + window.location.hostname + "/apiInscription";
            console.log(url);
            request.open("POST", url);
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            request.onreadystatechange = () => {
                // La requête est terminée
                if (request.readyState == XMLHttpRequest.DONE) {
                    console.log("AJAX terminé")
                    const response = request.responseText;
                    // S'il y a eu une erreur lors de l'insertion, avertir l'utilisateur et afficher l'erreur en console
                    if (response !== "success") {
                        // Avertir l'utilisateur
                        msgRetour.innerHTML = "Votre inscription a échoué. Veuillez réessayer dans quelques minutes.";
                        msgRetour.classList.add("inscriptionError");
                        document.querySelector("#inscriptionMain").insertBefore(msgRetour, document.querySelector("#inscriptionBox"));
                        console.log("Insertion non réussie");
                        console.log(response);
                    } else {
                        // Insertion réussie, avertir l'utilisateur
                        // Avertir l'utilisateur
                        msgRetour.innerHTML = "Merci de votre inscription au club de tennis EarthLoader.";
                        msgRetour.classList.add("inscriptionSuccess");
                        msgRetour.classList.remove("inscriptionError");
                        document.querySelector("#inscriptionMain").insertBefore(msgRetour, document.querySelector("#inscriptionBox"));
                        console.log("insertion ok");
                        console.log(response);
                    }
                }
            }
            const requestParams = `prenom=${prenom}&nom=${nom}&email=${email}&mdp=${mdp}`;
            request.send(requestParams);
        }
    }
}

/**
 * Vérifie que les données saisies par l'utilisateur sont correctes.
 * Vérifications effectuées :
 * Longueur des paramètres
 * Le mot de passe et le mot de passe de validation sont identiques
 * Param email contient un "@" et un "."
 * TODO: vérifier l'adresse mail avec une expression régulière
 * @param {string} prenom
 * @param {string} nom 
 * @param {string} email 
 * @param {string} mdp 
 * @param {string} mdpConfirm 
 */
function validationForm(prenom, nom, email, mdp, mdpConfirm) {
    // Vérification des longueurs de chaînes
    if (prenom.length < 3) return "Le prenom doit faire plus de 2 caractères.";
    if (nom.length < 3) return "Le nom doit faire plus de 2 caractères.";
    if (email.length < 3) return "L'email doit faire plus de 2 caractères.";
    if (mdp.length < 5) return "Le mot de passe doit faire plus de 4 caractères.";
    // Vérification que le mdp == mdpConfirm
    if (mdp !== mdpConfirm) return "Le mot de passe et le mot de passe de confirmation ne sont pas égaux.";
    // Vérification que l'email contient un @ et un .
    if (!(email.indexOf("@") !== -1 && email.indexOf(".") !== -1)) {
        return "Veuillez saisir une adresse email valide."
    }
    // Vérification que les chaînes ne contiennent pas d'élément <script></script>
    const arrayParams = [prenom, nom, email, mdp, mdpConfirm];
    arrayParams.forEach(param => {
        if (param.indexOf("<script>") !== -1 || param.indexOf("</script>") !== -1) {
            return "Veuillez ne pas insérer de JavaScript."
        }
    });
    return "true";
}
