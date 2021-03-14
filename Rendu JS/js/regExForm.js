//controle nom

let form = document.querySelector('#formulaire');

//console.log(form.nom);
//console.log(form.dateNaissance.);

form.nom.addEventListener('change', function () {
    validnom(this);
}
);
form.pnom.addEventListener('change', function () {
    validpnom(this);
}
);
form.dateNaissance.addEventListener('change', function () {
    let auj = new Date();
    let jour = today.getDate();
    let mois = today.getMonth() + 1;
    let annee = today.getyear();

    if (jour < 10) {
        jour = '0' + jour;
    }
    if (mois < 10) {
        mois = '0' + mois;
    }
    auj = annee + '-' + mois + '-' + jour;
    form.date.setAttribute("max", auj);
}
);
/*
form.email.addEventListener('change', function () {
    validemail(this);
}
);
*/
//form.nom.

const validnom = function (input) {
    let nomRegExp = new RegExp("^[A-Z][A-Za-z\�\�\�\-]+$", "g");
    let test = nomRegExp.test(input.value);
    let small = input.nextElementSibling;
    if (test) {
        form.nom.style.borderColor = "green";
        small.innerHTML = "";
    }
    else {
        //innerHTML = "<br/>";
       // form.nom.innerHTML = "<br>";
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

/*
const validemail = function (input) {
    let nomRegExp = new RegExp("^[A-Z][A-Za-z\�\�\�\-]+$", "g");
    let test = nomRegExp.test(input.value);
    let small = input.nextElementSibling;
    if (test) {
        form.email.style.borderColor = "green";
        small.innerHTML = "";
    }
    else {
        //innerHTML = "<br/>";
        // form.nom.innerHTML = "<br>";
        form.email.style.borderColor = "red";
        small.innerHTML = "Votre prenom doit commencer par une majuscule et comporter ensuite une minuscule";
    }
    console.log(test);
};*/


const verifDate = function (){
    let ajd = new Date();
    let jour = ajd.getDate();
    let mois = ajd.getMonth() + 1; //January is 0!
    let annnee = ajd.getFullYear();
    if (jour < 10) {
        jour = '0' + jour;
    }
    if (mois < 10) {
        mois = '0' + mois;
    }
    ajd = yyyy + '-' + mois + '-' + jour;
    //document.getElementById("dateNaissance").setAttribute("max", today);
    form.dateNaissance.setAttribute("max", ajd);
};

verifDate();

/*let nom = document.getElementById('nom').value;
console.log(nom);
//document.getElementById('nom').value;
*/