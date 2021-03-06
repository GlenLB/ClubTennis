// Import du JS spécifique à la page d'accueil
import * as accueil from "./accueil.js";
// Autres imports
import * as inscription from "../../bdd/js/inscription.js";
import * as connexion from "../../bdd/js/connexion.js";
import * as deconnexion from "../../bdd/js/deconnexion.js";
import * as changementInfosAbonne from "../../bdd/js/changementInfosAbonne.js";
import * as DSB from "../../DSB/page_web/execution_requetes.js";

window.onload = () => {
    // Déclaration du mode strict
    "use strict";

    // MENU HAMBURGER ------------------------------------------------------

    const menuHamburger = document.querySelector("#menuHamburger");
    const liensNavMobile = document.querySelector("#liensNavMobile");
    const main = document.querySelector("main");
    /**
     * Handler pour le clic sur menuHamburger
     */
    function handleHamburger() {
        // Déclenche l'animation du menu mobile
        if (liensNavMobile.classList.contains("liensNavMobileHidden")) {
            liensNavMobile.classList.replace("liensNavMobileHidden", "liensNavMobileVisible");
            main.style.opacity = "0.2";
        } else {
            liensNavMobile.classList.replace("liensNavMobileVisible", "liensNavMobileHidden");
            main.style.opacity = "1";
        }
        // Déclenche l'animation du menu hamburger
        if (menuHamburger.classList.contains("menuHamburger")) {
            menuHamburger.classList.replace("menuHamburger", "menuHamburgerClicked");
        } else {
            menuHamburger.classList.replace("menuHamburgerClicked", "menuHamburger");
        }
    }
    /**
     * Handler pour le clic sur le main quand le menu mobile est visible
     */
    function handleHamburgerMain() {
        // Déclenche l'animation du menu mobile
        if (liensNavMobile.classList.contains("liensNavMobileVisible")) {
            liensNavMobile.classList.replace("liensNavMobileVisible", "liensNavMobileHidden");
            main.style.opacity = "1";
        }
        // Déclenche l'animation du menu hamburger
        if (menuHamburger.classList.contains("menuHamburgerClicked")) {
            menuHamburger.classList.replace("menuHamburgerClicked", "menuHamburger");
        }
    }
    menuHamburger.onclick = handleHamburger
    main.onclick = handleHamburgerMain


    // ICON USER CONNEXION && MODAL CONNEXION && BTN CONNEXION NAVBAR && MODALE USER -----------------------------------------------

    // Modale de connexion
    const btnConnexionNavbar = document.querySelectorAll(".btnConnexionNavbar");
    // Icone pour afficher l'espace abonné
    const userIcons = document.querySelectorAll(".userIcon");
    // Modale de connexion
    const modalConnect = document.querySelector("#modalConnect");
    // Modale espace abonné
    const modaleEspaceAbonne = document.querySelector("#modaleEspaceAbonne")
    // Bouton de fermeture de la modale de connexion
    const btnClose = document.querySelector("#modalClose");
    if (btnConnexionNavbar != null) {
        btnConnexionNavbar.forEach(btn => btn.onclick = handleUserBtnConnexionNavbarAndBtnCloseClick);
        btnClose.onclick = handleUserBtnConnexionNavbarAndBtnCloseClick;
    }
    if (userIcons != null) {
        userIcons.forEach(icon => icon.onclick = handleClickUserSpace)
    }
    modalConnect.style.display = "none"

    /**
     * Handler pour le clic sur le bouton de connexion de la navbar et le btn de fermeture de la modale de connexion
     */
    function handleUserBtnConnexionNavbarAndBtnCloseClick() {
        modalConnect.style.display != "none" ? modalConnect.style.display = "none" : modalConnect.style.display = "flex";
    }

    /**
     * Handler pour le clic sur l'icone d'espace abonné
     * Toggle la modale de l'espace abonné
     */
    function handleClickUserSpace() {
        modaleEspaceAbonne.style.display == "flex" ? modaleEspaceAbonne.style.display = "none" : modaleEspaceAbonne.style.display = "flex";
    }


    // IMAGE BACKGROUND && H1 && BOX ACCUEIL ---------------------------

    if (location.pathname == "/") {
        // Importé depuis le module accueil.js
        accueil.exec();
    }


    // TAILLE MINIMUM PAGE ---------------------------

    document.querySelector("main").style.minHeight = window.innerHeight - 2 * document.querySelector("nav").clientHeight - document.querySelector("footer").clientHeight + "px";


    // INSCRIPTION UTILISATEUR ---------------------------
    if (location.pathname == "/inscription") {
        // Importé depuis le module inscription.js
        inscription.exec();
    }

    // CONNEXION UTILISATEUR ---------------------------
    // Importé depuis le module connexion.js
    connexion.exec();


    // DSB -------------------------------------
    if (location.pathname == "/dsb") {
        // Importé depuis le module accueil.js
        DSB.exec();
    }

    /* Pour un chargement de la page propre */
    document.body.style.opacity = 1;


    // DECONNEXION ------------------------------------------
    deconnexion.exec();

    // CHANGEMENT DES INFORMATIONS DE L'ABONNÉ ------------------------------------------
    if (location.pathname == "/compte-abonne") {
        changementInfosAbonne.exec();
    }


    // ENVOI DE MAIL ------------------------------------------
    if (location.pathname == "/contact") {
        const formContact = document.querySelector("#contactContainer form");
        const btnEnvoiMail = document.querySelector("#btnEnvoiMailContact");
        let retour = document.createElement("div");
        retour.style.marginTop = "15px";
        btnEnvoiMail.onclick = handleEnvoiEmail

        function handleEnvoiEmail() {
            retour.className = "inscriptionRetour";
            const emailAbonne = document.querySelector("#contactContainer #emailContact").value;
            const messageMail = document.querySelector("#contactContainer textarea").value;

            const headers = new Headers({ "Content-Type": "application/x-www-form-urlencoded" });
            const settings = {
                method: "POST",
                headers: headers,
                body: `email=${emailAbonne}&message=${messageMail}`
            };
            fetch("/apiEnvoiMail", settings)
                .then((reponse) => reponse.text()
                    .then(reponse => {
                        console.log(reponse);
                        if (reponse === "Message envoyé") {
                            handleRetour(true);
                        } else handleRetour(false);
                    }))
                .catch((err) => {
                    console.log(err);
                    handleRetour(false);
                })
        }

        function handleRetour(success) {
            if (success) {
                retour.classList.add("inscriptionSuccess");
                retour.innerHTML = "Message envoyé avec succès. Nous y répondrons dans les meilleurs délais.";
            } else {
                retour.classList.add("inscriptionError");
                retour.innerHTML = "Il y a eu une erreur lors de l'envoi de l'email. Merci de réessayer dans quelques minutes ou de choisir un autre moyen de contact.";
            }
            formContact.appendChild(retour);
        }
    }

}