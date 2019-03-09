window.onload = () => {
    // Déclaration du mode strict
    "use strict";

    // Menu hamburger ------------------------------------------------------

    const menuHamburger = document.getElementById("menuHamburger");
    const liensNavMobile = document.getElementById("liensNavMobile");
    const main = document.getElementsByTagName("main")[0];
    menuHamburger.onclick = () => {
        // Déclenche l'animation du menu mobile
        if (liensNavMobile.classList.contains("liensNavMobileHidden")) {
            liensNavMobile.classList.replace("liensNavMobileHidden", "liensNavMobileVisible");
            //main.classList.add("blur");
            main.style.opacity = "0.2";
        } else {
            liensNavMobile.classList.replace("liensNavMobileVisible", "liensNavMobileHidden");
            //main.classList.remove("blur");
            main.style.opacity = "1";
        }
        // Déclenche l'animation du menu hamburger
        if (menuHamburger.classList.contains("menuHamburger")) {
            menuHamburger.classList.replace("menuHamburger", "menuHamburgerClicked");
        } else {
            menuHamburger.classList.replace("menuHamburgerClicked", "menuHamburger");
        }
    }
}
