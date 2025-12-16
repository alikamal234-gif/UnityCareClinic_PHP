const btn = document.getElementById("ajoutePatient");
const btnClose = document.getElementById("CloseboxFormulerAjoutePatient");
const boxFormulerAjoutePatient = document.getElementById("boxFormulerAjoutePatient");
btn.addEventListener("click", () => {
        console.log("hh")
        boxFormulerAjoutePatient.style.display = "block";
    });
    btnClose.addEventListener("click", () => {
        boxFormulerAjoutePatient.style.display = "none";
    });


// const EditBtn = document.querySelectorAll(".EditBtn");

// EditBtn.forEach(btn => {
//     btn.addEventListener("click", (e) => {
//         e.preventDefault();

//     });
// });
