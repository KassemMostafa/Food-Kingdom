"use strict";
function affichageStock() {
    let stock, i;

    stock = document.getElementsByClassName("stock");
    if (document.getElementById("stock-button").value == 'stock-cache') {                 
        for (i = 0; i < stock.length; i++) {
            stock[i].style.display = "inline-block";
            stock[i].style.textAlign = "right";
        }
        document.getElementById("stock-button").innerHTML="Cacher Stock";
        document.getElementById("stock-button").value="stock-affiche";
    } else
    {
        for (i = 0; i < stock.length; i++) {
            stock[i].style.display = "none";
        }
        document.getElementById("stock-button").innerHTML="Afficher Stock";
        document.getElementById("stock-button").value="stock-cache";
        
    }
}

function up(divID,button) {
    let x = document.querySelector('#' + divID); //div correspondant au produit 
    let max = x.getElementsByClassName("stock-quantity")[0].innerHTML; //stock

    if (x.getElementsByClassName("decrease")[0].disabled = true) {
        x.getElementsByClassName("decrease")[0].disabled = false;
    }

    x.getElementsByClassName("num")[0].value = parseInt(x.getElementsByClassName("num")[0].value) + 1;
    if (x.getElementsByClassName("num")[0].value >= parseInt(max)) {
        document.getElementsByClassName("num")[0].value = max;
        button.disabled = true;
    }
}

function down(divID,button) {

    let x = document.querySelector("#"+ divID);
    
    if (x.getElementsByClassName("increase")[0].disabled = true) {
        x.getElementsByClassName("increase")[0].disabled = false;
    }
    x.getElementsByClassName("num")[0].value = parseInt(x.getElementsByClassName("num")[0].value) - 1;
    if (x.getElementsByClassName("num")[0].value <= 1) {
        document.getElementsByClassName("num")[0].value = 1;
        button.disabled = true;
    }
}

