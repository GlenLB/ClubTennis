window.onload = () => {
    // Déclaration du mode strict
    "use strict";

    // Menu hamburger ----------------------
    const menuHamburger = document.getElementById("menuHamburger");
    const liensNavMobile = document.getElementById("liensNavMobile");
    menuHamburger.onclick = () => {
        // Déclenche l'animation du menu mobile
        if (liensNavMobile.classList.contains("liensNavMobileHidden")) {
            liensNavMobile.classList.replace("liensNavMobileHidden", "liensNavMobileVisible");
        } else {
            liensNavMobile.classList.replace("liensNavMobileVisible", "liensNavMobileHidden");
        }
        // Déclenche l'animation du menu hamburger
        if (menuHamburger.classList.contains("menuHamburger")) {
            menuHamburger.classList.replace("menuHamburger", "menuHamburgerClicked");
        } else {
            menuHamburger.classList.replace("menuHamburgerClicked", "menuHamburger");
        }
    }
}
