// IMAGE BACKGROUND && H1 && BOX ACCUEIL ---------------------------

export function exec() {
    const imgBackground = document.querySelector("#background");
    const boxAccueil = document.querySelector("#boxAccueil");
    imgBackground.style.height = (window.innerHeight - 70) + "px";
    boxAccueil.style.top = (window.innerHeight / 2 - boxAccueil.clientHeight / 2) + "px";
}

