export function exec() {
    const btnInscription = document.querySelector("#inscriptionBox>form>a");
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
        if(isValid != "true") {
            // TODO:
            console.log("pas valide");
            console.log(isValid);
        } else {
            console.log("valide");
            // Les données sont valides, envoi des données au serveur via AJAX
            const request = new XMLHttpRequest();
            const url = window.location.protocol + "//" + window.location.hostname + "/apiInscription";
            console.log(url);
            request.open("POST", url);
            request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            request.onreadystatechange = () => {
                // La requête est terminée
                if(request.readyState == XMLHttpRequest.DONE) {
                    const response = request.responseText;
                    // S'il y a eu une erreur lors de l'insertion, avertir l'utilisateur et afficher l'erreur en console
                    if(response !== "success") {
                        // TODO: avertir l'utilisateur
                        console.log(response);
                    } else {
                        // Insertion réussie, avertir l'utilisateur
                        // TODO: avertir l'utilisateur
                        console.log("insertion ok");
                    }
                }
            }
            request.send(`prenom=${prenom}&nom=${nom}&email=${email}&mdp=${mdp}`);
        }
        console.log(prenom, nom, email, mdp, mdpConfirm);
    }
}

function validationForm(prenom, nom, email, mdp, mdpConfirm) {
    // Vérification des longueurs de chaînes
    if (prenom.length < 3) return "Le prenom doit faire plus de 2 caractères.";
    if (nom.length < 3) return "Le nom doit faire plus de 2 caractères.";
    if (email.length < 3) return "L'email doit faire plus de 2 caractères.";
    if (mdp.length < 5) return "Le mot de passe doit faire plus de 4 caractères.";
    // Vérification que le mdp == mdpConfirm
    if(mdp !== mdpConfirm) return "Le mot de passe et le mot de passe de confirmation ne sont pas égaux.";
    // Vérification que l'email contient un @ et un .
    if(!(email.indexOf("@") !== -1 && email.indexOf(".") !== -1)) {
        return "Veuillez saisir une adresse email valide."
    }
    return "true";
}
