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
<!-- Entete Navbar non affiché sur les petites écrans due au manque du javascript, erreur à réparer lors du deuxième rendu-->
<header>
    <?php 
        $currentpage = "panier";
        include("php\header.php"); 
		include("bdd\bdd.php");
    ?>
</header>

<body>
    <!-- Menu vertical -->
    <div class="container-fluid">
        <div class="row">
        <?php include("php\\navBarVertical.php");?>
            <!-- Partie principale -->
            <div class="col-sm text-dark bg-warning text-light">
                <aside class="text-center">
					<table class="table">
					<tr>
					<td>Produit</td>
					<td>Quantite</td>
					<td>Prix Unitaire</td>
					<td>Prix Total</td>
					</tr>
				<?php
					$bdd = connexion();
					if (isset($_SESSION["userConnect"])) {
						$user = $_SESSION["userConnect"];
					} else {
						$user = NULL;
					} 
					
					//TODO 
					//
					//1- add + and - buttons to modify cart in database,done 
					// 2- add supprimer button to delete a product from shopping cart
					// 3- on first session start delete NULL user panier 
					// 4- on disconnect, unset user variable
					// 5- Ajax
					$cart = fetchShoppingCart($bdd, $user);
					
					$sum=0;
					foreach ($cart as $key => $value){
						$stock = (int)fetchStockQuantity($bdd, $value["nomProduit"]); 
					?>
					<form method="POST"  action="php/modifyCart.php" enctype="multipart/form-data">
						<input name= "username" type= "hidden" value="<?php 
						if (is_null($user)) {
							echo "0";
						} else {
							echo ($user);
						}?>">
			
						<input name = "nomProduit" type= "hidden" value= "<?php echo $value["nomProduit"]?>"><br>
						
						<tr>
						<td><?php echo $value['nomProduit'] ?></td>
						<td> <button type="button" id= "panierID<?php echo $value["nomProduit"] . "decrease";?>" class="btn btn-outline-dark btn-sm button-cart decrease" onclick="downPanier('<?php echo $value['nomProduit']?>')">-</button>
							<input  type="text" name="quantity" readonly id= "panierID<?php echo $value["nomProduit"];?>" class="num"  value= "<?php echo $value['qte'] ?>" size="1" >
							<button type="button" id= "panierID<?php echo $value["nomProduit"] . "increase";?>" class="btn btn-outline-dark btn-sm button-cart increase " onclick="upPanier(<?php echo $stock;?>,'<?php echo $value['nomProduit']?>') ">+</button>
							<button type="submit" name = "action" value="modifier"   <?php if ($stock == 0) { echo 'disabled';} ?>class="btn btn-outline-dark btn-sm button-panier  " style="margin-bottom : 5px;"> Modifier</button>
							<button type="submit" name = "action" value="supprimer"   <?php if ($stock == 0) { echo 'disabled';} ?>class="btn btn-outline-danger btn-sm button-panier  " style="margin-bottom : 5px;"> Supprimer</button>
						</td>
						<td><?php echo $value['prix'] ?> </td>

						<td> <?php echo $value['qte']*$value['prix'] ?></td>
						<?php $sum=$sum+($value['qte']*$value['prix']);?>
						<br/>
						</tr>
						</div>
					</form>
				<?php } ?>
					<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><?php echo $sum ?> </td>							
					<br/>
					</tr>
					</table>
					<button class="btn btn-danger">Payer</button>
				</aside>
            </div>
        </div>
    </div>

    <!--<script type="text/javascript" src="js/regExForm.js" async></script>-->
</body>
<!-- Pied de page -->
<footer>
<?php include("php\\footer.php");?>
</footer>


</html>