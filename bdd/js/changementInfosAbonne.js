export function exec() {

    const btnChangementInfosAbonne = document.querySelector("#btnChangementInfosAbonne");
    const prenomSession = document.querySelector("#prenom").value;
    const nomSession = document.querySelector("#nom").value;
    const pseudoSession = document.querySelector("#pseudo").value;
    const emailSession = document.querySelector("#email").value;
    const descriptionSession = document.querySelector("#description").value;
    const arrayDonneesSession = [
        prenomSession,
        nomSession,
        pseudoSession,
        emailSession,
        descriptionSession
    ]
    const formBody = document.querySelector(".body");
    let retour = document.createElement("div");

    btnChangementInfosAbonne.onclick = () => {
        const prenom = document.querySelector("#prenom").value;
        const nom = document.querySelector("#nom").value;
        const pseudo = document.querySelector("#pseudo").value;
        const email = document.querySelector("#email").value;
        const description = document.querySelector("#description").value;
        const arrayDonnees = [
            prenom,
            nom,
            pseudo,
            email,
            description
        ]

        const request = new XMLHttpRequest();
        const url = window.location.protocol + "//" + window.location.hostname + "/apiChangementInfosAbonne";

        // Vérification que des données ont changé
        if (checkChanges(arrayDonnees)) {
            request.open("POST", url);
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            request.onreadystatechange = () => {
                if (request.readyState === XMLHttpRequest.DONE) {
                    console.log("Retour AJAX : " + request.responseText);
                    handleRetour(request.responseText);
                }
            }

            const requestParams = `prenom=${prenom}&nom=${nom}&pseudo=${pseudo}&email=${email}&description=${description}&emailSession=${emailSession}`;
            request.send(requestParams);
        } else {
            console.log("Les données n'ont pas changé.");
            handleRetour("Les données n'ont pas changé.");
        }
    }

    function handleRetour(reponse) {
        retour.innerHTML = reponse;
        retour.className = "inscriptionRetour";
        retour.style.marginTop = "20px";
        if (reponse == "Vos données ont bien été actualisées.") {
            retour.classList.add("inscriptionSuccess");
            retour.innerHTML += " Vous allez être redirigé pour vous authentifier à nouveau."
            setTimeout(() => document.location.reload(true), 3000);
        } else {
            retour.classList.add("inscriptionError");
        }
        formBody.appendChild(retour);
    }

    /**
     * @return true ssi des données ont été changées
     */
    function checkChanges(arrayDonnees) {
        return arrayDonneesSession.some((donnee, i) => donnee != arrayDonnees[i])
    }

}