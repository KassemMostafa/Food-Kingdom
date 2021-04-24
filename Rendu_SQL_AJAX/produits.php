<?php session_start() ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food kingdom</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
	<script src="js\script.js"></script>

</head>
<!-- Entete       Navbar non affiché sur les petites écrans due au manque du javascript, erreur à réparer lors du deuxième rendu-->
<header>
	<?php
		$currentpage = $_GET['cat'];
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
				<?php
					include("bdd\bdd.php");
					$dbConn = connexion();
					$produits = fetchProduits($dbConn, $_GET['cat']);
					$dbConn = deconnexion();
					foreach ($produits as $value) {
				?>
					
					<div class="col col-md-auto">
						<form method="POST" action="php/incrementation.php" enctype="multipart/form-data">
							<div class="card bg-dark text-light" id="<?php echo $value["alt"]?>" style="width: 18rem";>
								<img src = "<?php echo $value['image']?>" class = "card-img-top zoom" alt = "<?php echo $value["alt"] ?>">
								<input name="alt" type="hidden" value="<?php echo $value["alt"]?>">
								<input name="produit" type="hidden" value="<?php echo $value["nom"]?>">
								<input name= "pageName" type= "hidden" value="<?php echo $_GET['cat']?>">
								<div class="card-body">
									<h5 class="card-title"><?php echo $value["nom"] ?> </h5>
									<p class="card-text"> <?php echo $value["description"] ?></p>
								</div>
								<div class="card-body">
									
										<p> <?php echo $value["prix"]?>€<span class= "stock">Stock : <span class ="stock-quantity"> <?php echo $value['stock'] ?></span></span></p>
										<input name="prix" type="hidden" value="<?php echo $value["prix"]?>">
										<p> Quantité : </p>	
										<button type="button" disabled class="btn btn-outline-light btn-sm button-cart decrease" onclick="down('<?php echo $value['alt']?>',this)">-</button>
										<input type="num" class="num" value= "1" size="1" name="qteProduit" readonly />
										<button type="button" class="btn btn-outline-light btn-sm button-cart increase" onclick="up('<?php echo $value['alt']?>',this)">+</button><br>
										<button type="submit"  <?php if ($value['stock'] == 0) { echo 'disabled';} ?>class="btn btn-outline-light btn-sm button-add-cart  "> Ajouter au panier</button>
									
								</div>
							</div>
						</form>
					</div>
				<?php } ?>
				
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

