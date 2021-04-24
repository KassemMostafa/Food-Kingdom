<?php session_start() ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food kingdom</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
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
					//TODO 1- add + and - buttons to modify cart in database, 
					// 2- add supprimer button to delete a product from shopping cart
					// 3- on first session start delete NULL user panier 
					// 4- on disconnect, unset user variable
					// 5- Ajax
					$cart = fetchShoppingCart($bdd, $user);
					$sum=0;
					foreach ($cart as $key => $value){
					?>
					<form method="POST" action="php/modifyCart.php" enctype="multipart/form-data">
						<input name= "username" type= "hidden" value="<?php 
						if (isset($user)) {
							echo 0;
						} else {
							echo $user;
						} ?>
						">
						<input name = "nomProduit" type= "hidden" value= "<?php echo $value["nomProduit"]?>">
						
						<tr>
						<td><?php echo $value['nomProduit'] ?></td>
						<td> <input type="num" class="num" value= "<?php echo $value['qte'] ?>" size="1" name="qteProduit"/>
						</td>
						<td><?php echo $value['prix'] ?> </td>
						<td><?php echo $value['qte']*$value['prix'] ?></td>
						<?php $sum=$sum+($value['qte']*$value['prix']);?>
						<br/>
						</tr>
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