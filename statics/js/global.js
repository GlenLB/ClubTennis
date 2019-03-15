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


// IMAGE BACKGROUND ET BUTTON INSCRIPTION ---------------------------

const imgBackground = document.querySelector("#background");
const btnInscription = document.querySelector("#btnInscription");
imgBackground.style.height = (window.innerHeight - 70) + "px";
btnInscription.style.top = (window.innerHeight / 2 - btnInscription.clientHeight / 2) + "px";

/* Pour un chargement de la page propre */
document.body.style.opacity = 1;

}