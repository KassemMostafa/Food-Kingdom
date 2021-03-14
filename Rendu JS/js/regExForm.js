//controle nom

let form = document.querySelector('#formulaire');

console.log(form.nom);

form.nom.addEventListener('change', function () {
    validnom(this);
}
);
form.pnom.addEventListener('change', function () {
    validpnom(this);
}
);
const validnom = function (input) {
    let nomRegExp = new RegExp("^[A-Z][A-Za-z\�\�\�\-]+$", "g");
    let test = nomRegExp.test(input.value);
    let small = input.nextElementSibling;
    if (test) {
        form.nom.style.borderColor = "green";
        small.innerHTML = "";
    }
    else {
        form.nom.style.borderColor = "red";
        small.innerHTML = "<br>Votre prenom doit commencer par une majuscule et comporter ensuite une minuscule et ne peut contenir de caractere spetiaux";
    }
    console.log(test);
};

const validpnom = function (input) {
    let nomRegExp = new RegExp("^[A-Z][A-Za-z\�\�\�\-]+$", "g");
    let test = nomRegExp.test(input.value);
    let small = input.nextElementSibling;
    if (test) {
        form.pnom.style.borderColor = "green";
        small.innerHTML = "";
    }
    else {
        form.pnom.style.borderColor = "red";
        small.innerHTML = "<br>Votre prenom doit commencer par une majuscule et comporter ensuite une minuscule et ne peut contenir de caractere spetiaux";
    }
    console.log(test);
};

const verifDate = function (){
    let ajd = new Date();
    let jour = ajd.getDate();
    let mois = ajd.getMonth() + 1; //January is 0!
    let annee = ajd.getFullYear();
    if (jour < 10) {
        jour = '0' + jour;
    }
    if (mois < 10) {
        mois = '0' + mois;
    }
    ajd = annee + '-' + mois + '-' + jour;
    form.dateNaissance.setAttribute("max", ajd);
};

verifDate();