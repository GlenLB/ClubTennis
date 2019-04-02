export function exec() {
    const requetesSQLContainer = document.querySelector("#requetesSQL");
    const btnDSB = document.querySelectorAll("#requetesSQL .btn");

    btnDSB.forEach(btn => {
        btn.addEventListener("click", handleClickDSBBtn);
    })

    function handleClickDSBBtn() {
        /* Récupération de la requête SQL */
        const dataSQL = this.getAttribute("data-sql");
        console.log("-------" + dataSQL);
        if (dataSQL == "" || dataSQL == null) {
            console.log("Erreur data-sql");
            return;
        }

        const request = new XMLHttpRequest();
        const url = window.location.protocol + "//" + window.location.hostname + "/executionRequetesDSB";
        console.log(url);
        request.open("POST", url);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        request.onreadystatechange = () => {
            // La requête est terminée
            if (request.readyState == XMLHttpRequest.DONE) {
                console.log("AJAX terminé")
                const response = request.responseText;
                console.log("response ----------- " + response);
                createResponse(response, this);
            }
        }
        const requestParams = `dataSQL=${dataSQL}`;
        console.log("params ---------- " + requestParams);
        request.send(requestParams);
    }

    function createResponse(response, button) {
        const tableResponse = document.createElement("table");
        tableResponse.classList.add("tableResponse");
        response.split("\n").forEach(row => {
            if (row.length > 0) {
                let rowElt = document.createElement("tr");
                row.split(";").forEach(col => {
                    if (col.length > 0) {
                        let colElt = document.createElement("td");
                        colElt.innerText = col;
                        rowElt.appendChild(colElt);
                    }
                })
                tableResponse.appendChild(rowElt);
            }
        });
        button.after(tableResponse);
        console.log(tableResponse);
    }
}