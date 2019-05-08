export function exec() {

    const btnDeconnexion = document.querySelector("#deconnexion");
    btnDeconnexion.onclick = () => {
        const request = new XMLHttpRequest();
        const url = window.location.protocol + "//" + window.location.hostname + "/apiDeconnexion";
        request.open("GET", url);
        request.onreadystatechange = () => {
            if (request.readyState === XMLHttpRequest.DONE) {
                console.log("session détruite --- " + request.responseText);
                window.location.reload();
            }
        }
        request.send();
    }

}