"use strict";
function affichageStock() 
{
    var stock, i;

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