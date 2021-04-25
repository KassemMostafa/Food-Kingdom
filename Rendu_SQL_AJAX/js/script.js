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

function stockUpdate(divID) {

    let XMLHR = new XMLHttpRequest();
    var x = document.querySelector("#" + divID);
    let input = x.getElementsByClassName("num")[0];
    let nom = input.closest("form").children[0].children[2].value;
    let inputValue = input.value
    let prix = input.closest("form").children[0].children[4].value;
    let alt = input.closest("form").children[0].children[1].value;

    XMLHR.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            x.getElementsByClassName("stock-quantity")[0].innerHTML = this.responseText;
            console.log(this.responseText);
        }
    }
    
        XMLHR.open("POST", "/php/addPanier.php",true);
        XMLHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        XMLHR.send("nomProduit=" + nom +"&qte=" + inputValue +"&prix=" + prix + "&alt=" + alt);
}      

function upPanier(max, productID) {
    let input = document.getElementById("panierID" + productID);
    let increase = document.getElementById("panierID" + productID + "increase");
    let decrease = document.getElementById("panierID" + productID + "decrease");
    
    if (decrease.disabled = true) {
        decrease.disabled = false;
    }
    if (input.value == max) {
        increase.disabled = true;
    } else {
        input.value = parseInt(input.value) + 1;
    }
}

function downPanier(productID) {
    let input = document.getElementById("panierID" + productID);
    let increase = document.getElementById("panierID" + productID + "increase");
    let decrease = document.getElementById("panierID" + productID + "decrease");
    
    if (increase.disabled = true) {
        increase.disabled = false;
    }
    if (input.value == 1) {
        decrease.disabled = true;
    } else {
        input.value = parseInt(input.value) - 1;
    }
}

    

