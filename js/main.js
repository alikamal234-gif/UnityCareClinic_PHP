const btn = document.getElementById("ajoutePatient");
    const btnClose = document.getElementById("CloseboxFormulerAjoutePatient");
    const boxFormulerAjoutePatient = document.getElementById("boxFormulerAjoutePatient");
    btn.addEventListener("click", () => {
        boxFormulerAjoutePatient.style.display = "block";
    });
    btnClose.addEventListener("click", () => {
        boxFormulerAjoutePatient.style.display = "none";
    });