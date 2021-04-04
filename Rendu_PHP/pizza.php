<?php session_start() ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food kingdom</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/script.js"></script>

</head>
<!-- Entete       Navbar non affiché sur les petites écrans due au manque du javascript, erreur à réparer lors du deuxième rendu-->
<header>
    <?php
        $currentpage = "Pizza";
        include("php\header.php");
    ?>
</header>
	<!-- Menu vertical -->
<div class="container-fluid">
    <div class="row">
    <?php include("php\\navBarVertical.php");?>
        <!-- Partie principale -->
        <div class="col-sm bg-warning">
            <aside>
                <br>
                <h1>Pizza</h1>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light card" id="Campione" style="width: 18rem;">
                                <img src="img/Campione.png" class="card-img-top zoom" alt="Campione">
                                <div class="card-body">
                                    <h5 class="card-title">Pizza Campione</h5>
                                    <p class="card-text">Sauce tomate,fromage,œuf, viande, champignons, pâte au choix.</p>
                                </div>
                                <div class="card-body">
                                    <p>11,60€<span class="stock">Stock : <span class ="stock-quantity" >168</span></span></p> 
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('Campione',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('Campione',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
                                </div>  
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id ="fruttidemare" style="width: 18rem;">
                                <img src="img/fruttidemare.png" class="card-img-top zoom" alt="fruttidemare">
                                <div class="card-body">
                                    <h5 class="card-title">Pizza Frutti Di Mare</h5>
                                    <p class="card-text">Sauce tomate, fromage, fruits de mer, ail et persil, pâte au choix. </p>
                                </div>
                                <div class="card-body">
                                    <p>18,50€<span class="stock"> Stock : <span class ="stock-quantity" >159</span></span></p>  
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('fruttidemare',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('fruttidemare',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart ">Ajouter au panier</button>  
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="Raclette" style="width: 18rem;">
                                <img src="img/Raclette.png" class="card-img-top zoom" alt="Raclette">
                                <div class="card-body">
                                    <h5 class="card-title">Pizza Raclette</h5>
                                    <p class="card-text">Sauce tomate, Raclette, pomme de terre, poulet, pâte au choix.</p>
                                </div>
                                <div class="card-body">
                                    <p>14,00€<span class="stock">Stock : <span class ="stock-quantity" >143</span></span></p>
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('Raclette',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('Raclette',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart ">Ajouter au panier</button>  
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="Végétarienne" style="width: 18rem;">
                                <img src="img/vég.png" class="card-img-top zoom" alt="Végétarienne">
                                <div class="card-body">
                                    <h5 class="card-title">Pizza Végétarienne</h5>
                                    <p class="card-text">Sauce tomate, fromage, tomates, poivrons et olives, pâte au choix.</p>
                                </div>
                                <div class="card-body">
                                    <p>17,75€<span class="stock">Stock : <span class ="stock-quantity" >177</span></span></p>
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('Végétarienne',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('Végétarienne',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart ">Ajouter au panier</button>  
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="western" style="width: 18rem;">
                                <img src="img/western.png" class="card-img-top zoom" alt="western">
                                <div class="card-body">
                                    <h5 class="card-title">Pizza Western</h5>
                                    <p class="card-text">Crème fraîche, fromage, poulet, poivrons, pâte au choix.</p>
                                </div>
                                <div class="card-body">
                                    <p>15,50€<span class="stock">Stock : <span class ="stock-quantity" >238</span></span></p> 
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('western',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('western',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart ">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <button type="button" class="btn btn-dark button-stock" value="stock-cache" id="stock-button" onclick="affichageStock(this.id)">Afficher Stock</button>
            </aside>
        </div>
        <!-- Pied de page -->
        <footer>
        <?php include("php\\footer.php");?>
        </footer>
    </div>

</html>