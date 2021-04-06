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
		if ($_GET['cat'] == "burger"){ 
			$currentpage = "burger";
		} else if($_GET['cat'] == "pizza"){
			$currentpage = "pizza";
		} else if ($_GET['cat'] == "poulet") {
			$currentpage = "poulet";
		} else {
			die();
		
		}
		include("php/header.php");
	?>
</header>
	<!-- Menu vertical -->
	<div class="container-fluid">
        <div class="row">
		<?php include("php/navBarVertical.php");?>
	<!-- Partie principale -->
<div class="col-sm bg-warning">
	<aside>
		<br>
		<h1><?php 
			if ($_GET['cat'] == "burger"){ 
				echo "Burgers";
			} else if($_GET['cat'] == "pizza"){
				echo "Pizza";
			} else if ($_GET['cat'] == "poulet") {
				echo "Poulet";
			} else {
				die();
			}	?>   </h1>
			<br><br>
		<div class = "container">
			<div class="row justify-content-md-center">
				<?php foreach ($_SESSION[$_GET['cat']] as $value) {
					echo '<div class="col col-md-auto">';
					echo '<div class="card bg-dark text-light" id="'. $value["alt"] . '" style="width: 18rem";>';
					echo '<img src = "'. $value['image'] . '" class = "card-img-top zoom" alt = "'. $value["alt"] .'">';
					echo '<div class="card-body">';
					echo '<h5 class="card-title">' . $value["nom"] . '</h5>';
					echo '<p class="card-text">' . $value["description"] . '</p>';
					echo '</div>';
					echo '<div class="card-body">';
					echo '<p>' . $value["prix"] . '€<span class= "stock">Stock : <span class ="stock-quantity">' . $value['stock'] . "</span></span></p>";
					echo '<p> Quantité : </p>';
					echo '<button type="button" class="btn btn-outline-light btn-sm button-cart decrease" disabled onclick="down('. "'" . $value["alt"] . "'" . ',this)">-</button>';
					echo '<input type="text" class="num" value="0" size="1" readonly />';
					echo '<button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up(' . "'" . $value["alt"] . "'" . ',this)">+</button><br>';
					echo '<button type="button" class="btn btn-outline-light btn-sm button-add-cart  ">Ajouter au panier</button>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				} ?>
			</div>
		</div>
		<button type="button" class="btn btn-dark button-stock" value="stock-cache" id="stock-button" onclick="affichageStock(this.id)">Afficher Stock</button>
	</aside>
</div>
	<!-- Pied de page -->
	<footer>
    <?php include("php/footer.php");?>
</footer>
</div>

</html>

