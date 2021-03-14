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
form.dateNaissance.addEventListener('change', function () {
    verifDate(this);
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
    let nomRegExp = new RegExp("^[A-Z][A-Za-z\é\è\ê\-]+$", "g");
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
    let nomRegExp = new RegExp("^[A-Z][A-Za-z\é\è\ê\-]+$", "g");
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
    let nomRegExp = new RegExp("^[A-Z][A-Za-z\é\è\ê\-]+$", "g");
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

/*
const verifDate = function (var){
    let today = new Date();
    let dd = today.getDate();
    let mm = today.getMonth() + 1; //January is 0!
    let yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    today = yyyy + '-' + mm + '-' + dd;
document.getElementById("dateNaissance").setAttribute("max", today);
};
*/

/*let nom = document.getElementById('nom').value;
console.log(nom);
//document.getElementById('nom').value;
*/