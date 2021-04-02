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
    <?php include("php\header.php"); ?>
</header>
	<!-- Menu vertical -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-auto bg-info text-dark">
            <section class="align-middle">
                <br>
                <h2>Food Kingdom</h2>
                <a href="index.html">Accueil</a>
                <hr />
                <p><u><b>Nos produits</b></u></p>
                <ul style="list-style-type:none;">
                    <li><a href="burger.html">Burger</a></li>
                    <li><a href="poulet.html">Poulet</a></li>
                    <li><a href="pizza.html">Pizza</a></li>
                </ul>
                <p /><a href="contact.html">Contact</a></p>
            </section>
        </div>
        <!-- Partie principale -->
        <div class="col-sm bg-warning">
            <aside>
                <br>
                <h1>Poulet</h1>
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="bucketmixte" style="width: 18rem;">
                                <img src="img/bucketmixte.png" class="card-img-top zoom" alt="bucketmixte">
                                <div class="card-body">
                                    <h5 class="card-title">Bucket Wings et Tinders</h5>
                                    <p class="card-text">poulet coupés, marinés et panés, Ailes de poulet marinées, panées</p>
                                </div>
                                <div class="card-body">
                                    <p>35,00€<span class= "stock">Stock : <span class ="stock-quantity" >169</span></span></p>
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('bucketmixte',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('bucketmixte',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="chickenavocado" style="width: 18rem;">
                                <img src="img/chickenavocado.png" class="card-img-top zoom" alt="chickenavocado">
                                <div class="card-body">
                                    <h5 class="card-title">Chicken Avocado</h5>
                                    <p class="card-text">Pain spécial, poulet, sauce avocado, fromage fondu, crudités.</p>
                                </div>
                                <div class="card-body">
                                    <p>8,00€<span class= "stock">Stock : <span class ="stock-quantity" >372</span></p>
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('chickenavocado',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('chickenavocado',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="Phillychicken" style="width: 18rem;">
                                <img src="img/Phillychicken.png" class="card-img-top zoom" alt="Phillychicken">
                                <div class="card-body">
                                    <h5 class="card-title">Philly Chicken</h5>
                                    <p class="card-text">Sub brioché, bacon, tomate, pickles, cheddar, salade, sauce.</p>
                                </div>
                                <div class="card-body">
                                    <p>9,30€<span class= "stock">Stock : <span class ="stock-quantity" >203</span></span></p>
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('Phillychicken',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('Phillychicken',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="tastychicken" style="width: 18rem;">
                                <img src="img/tastychicken.png" class="card-img-top zoom" alt="tastychicken">
                                <div class="card-body">
                                    <h5 class="card-title">Tasty Chicken</h5>
                                    <p class="card-text">Pain, panée au poulet, salade, oignon, emmental , tomate, sauce.</p>
                                </div>
                                <div class="card-body">
                                    <p>4,75€<span class= "stock">Stock : <span class ="stock-quantity" >443</span></span></p>
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('tastychicken',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('tastychicken',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-auto">
                            <div class="card bg-dark text-light" id="Wings" style="width: 18rem;">
                                <img src="img/Wings.png" class="card-img-top zoom" alt="Wings">
                                <div class="card-body">
                                    <h5 class="card-title">Wings</h5>
                                    <p class="card-text">10 wings nappées de sauce Buffalo ou Barbecue au choix.</p>
                                </div>
                                <div class="card-body">
                                    <p>8,50€<span class= "stock">Stock : <span class ="stock-quantity" >321</span></span></p>
                                    <p>Quantité:</p>
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('Wings',this)">-</button>
                                    <input type="text" class="num" value="0" size="1" readonly />
                                    <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('Wings',this)">+</button><br>
                                    <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
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
            <div class="text-center ">
                <strong>FOOD KINGDOM®</strong> par Mostafa KASSEM et Tomy PHALYVONG. Le code source est protégé par la license
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. Le contenu est licenié <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC PAR NC SA 4.0</a>.
            </div>
        </footer>
    </div>

</html>