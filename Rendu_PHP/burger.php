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
		$currentpage = "Burger"; 
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
		<h1>Burgers</h1>
		<div class = "container">
			<div class="row justify-content-md-center">
				<div class="col col-md-auto">
					<div class="card bg-dark text-light card" id="hamburger" style="width: 18rem;">
						<img src="img/hamburger.png" class="card-img-top zoom" alt="hamburger">
						<div class="card-body">
						  <h5 class="card-title">Hamburger</h5>
						  <p class="card-text">Pain spécial, steak haché, oignon, cornichon avec une sauce moutarde et ketchup.</p>
						</div>
						<div class="card-body">
						  <p>3,00€<span class= "stock">Stock : <span class ="stock-quantity" >143</span></span></p>
						  <p>Quantité:</p>
						  <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('hamburger',this)">-</button>
						  <input type="text" class="num" value="0" size="1" readonly />
						  <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('hamburger',this)">+</button><br>
						  <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
					  </div>
					</div>
				</div>
				<div class="col col-md-auto">
					<div class="card bg-dark text-light" id="cheeseburger" style="width: 18rem;">
						<img src="img/cheeseburger.png" class="card-img-top zoom" alt="cheeseburger">
						<div class="card-body">
						  <h5 class="card-title">Cheeseburger</h5>
						  <p class="card-text">Pain spécial, steak haché, oignon, cornichon, moutarde, ketchup, fromage fondu.</p>
						</div>
						<div class="card-body">
						  <p>3,50€<span class="stock">Stock : <span class ="stock-quantity" >242</span></span></p>
						  <p>Quantité:</p>
						  <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('cheeseburger',this)">-</button>
						  <input type="text" class="num" value="0" size="1" readonly />
						  <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('cheeseburger',this)">+</button><br>
						  <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
						</div>
					  </div>
				</div>
				<div class="col col-md-auto">
					<div class="card bg-dark text-light" id="cheesybacon" style="width: 18rem;">
						<img src="img/cheesybacon.png" class="card-img-top zoom" alt="cheesybacon">
						<div class="card-body">
						  <h5 class="card-title">Cheesy Bacon</h5>
						  <p class="card-text">Pain spécial, double steak haché, oignon, cornichon, moutarde, ketchup, 	fromage fondu, bacon.</p>
						</div>
						<div class="card-body">
						  <p>5,00€<span class="stock">Stock : <span class ="stock-quantity" >223</span></span></p>
						  <p>Quantité:</p>
						  <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('cheesybacon',this)">-</button>
						  <input type="text" class="num" value="0" size="1" readonly />
						  <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('cheesybacon',this)">+</button><br>
						  <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
						</div>
					  </div>
				</div>
				<div class="col col-md-auto">
					<div class="card bg-dark text-light" id="doublebeefbbq" style="width: 18rem;">
						<img src="img/doublebeefbbq.png" class="card-img-top zoom" alt="doublebeefbbq">
						<div class="card-body">
						  <h5 class="card-title">Double Beef BBQ</h5>
						  <p class="card-text">Pain spécial, double steak haché, oignon, cornichon,fromage fondu, sauce bbq.</p>
						</div>
						<div class="card-body">
						  <p>4,75€<span class="stock">Stock : <span class ="stock-quantity" >312</span></span></p>
						  <p>Quantité:</p>
						  <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('doublebeefbbq',this)">-</button>
						  <input type="text" class="num" value="0" size="1" readonly />
						  <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('doublebeefbbq',this)">+</button><br>
						  <button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>
						</div>
					  </div>
				</div>
				<div class="col col-md-auto">
					<div class="card bg-dark text-light" id= "doublecheese" style="width: 18rem;">
						<img src="img/doublecheese.png" class="card-img-top zoom" alt="doublecheese">
						<div class="card-body">
						  <h5 class="card-title">Double Cheese</h5>
						  <p class="card-text">Pain spécial, double steak haché, oignon, cornichon, double fromage fondu</p>
						</div>
						<div class="card-body">
						  <p>4,50€<span class="stock">Stock : <span class ="stock-quantity" >258</span></span></p>
						  <p>Quantité:</p>
						  <button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('doublecheese',this)">-</button>
						  <input type="text" class="num" value="0" size="1" readonly />
						  <button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('doublecheese',this)">+</button><br>
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
    <?php include("php\\footer.php");?>
</footer>
</div>

</html>