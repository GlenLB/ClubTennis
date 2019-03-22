// Import du JS spécifique à la page d'accueil
import * as accueil from "./accueil.js";
import * as inscription from "../../bdd/js/inscription.js";

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


    // ICON USER CONNEXION && MODAL CONNEXION -----------------------------------------------

    const userIcons = document.querySelectorAll(".userIcon");
    const modalConnect = document.querySelector("#modalConnect");
    const btnClose = document.querySelector("#modalClose");
    userIcons.forEach((icon) => icon.onclick = handleUserIconsAndBtnCloseClick)
    btnClose.onclick = handleUserIconsAndBtnCloseClick
    modalConnect.style.display = "none"
    /**
     * Handler pour le clic sur l'icone de connexion et le btn de fermeture de la modale
     * de connexion
     */
    function handleUserIconsAndBtnCloseClick() {
        modalConnect.style.display != "none" ? modalConnect.style.display = "none" : modalConnect.style.display = "flex";
    }


    // IMAGE BACKGROUND && H1 && BOX ACCUEIL ---------------------------

    if (location.pathname == "/") {
        // Importé depuis le module accueil.js
        accueil.exec();
    }


    // TAILLE MINIMUM PAGE ---------------------------

    document.querySelector("main").style.minHeight = window.innerHeight - 2*document.querySelector("nav").clientHeight - document.querySelector("footer").clientHeight + "px";


    // INSCRIPTION UTILISATEUR ---------------------------
    if (location.pathname == "/inscription") {
        // Importé depuis le module inscription.js
        inscription.exec();
    }

    /* Pour un chargement de la page propre */
    document.body.style.opacity = 1;

}