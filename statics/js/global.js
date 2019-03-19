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


    // IMAGE BACKGROUND && H1 && BOX ACCUEIL ---------------------------

    const imgBackground = document.querySelector("#background");
    const boxAccueil = document.querySelector("#boxAccueil");
    imgBackground.style.height = (window.innerHeight - 70) + "px";
    boxAccueil.style.top = (window.innerHeight / 2 - boxAccueil.clientHeight / 2) + "px";

    /* Pour un chargement de la page propre */
    document.body.style.opacity = 1;


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


}