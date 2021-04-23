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
						$sum=0;
						foreach ($_SESSION["panier"] as $key => $value){
							echo '<tr>';
							echo '<td>'.$key . "</td>";
							echo '<td>'.$value['qte'] . "</td>";
							echo '<td>'.$value['prix'] . "</td>";;
							echo '<td>'.$value['qte']*$value['prix'] . "</td>";
							$sum=$sum+($value['qte']*$value['prix']);
							echo '<br/>';
							echo '</tr>';
						}
						echo '<tr>';
						echo '<td>'."</td>";
						echo '<td>'."</td>";
						echo '<td>'."</td>";;
						echo '<td>'.$sum."</td>";;							
						echo '<br/>';
						echo '</tr>';
					?>
					</table>
					<button class="btn btn-danger">payer</button>
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