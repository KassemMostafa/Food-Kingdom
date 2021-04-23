<?php 
  session_start();
  

  
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food kingdom</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<!-- Entete   Navbar non affiché sur les petites écrans due au manque du javascript, erreur à réparer lors du deuxième rendu-->
<header>

  <?php
    $currentpage = "index";
    include("php/header.php"); 
    include("bdd\bdd.php");
    if (!isset($_SESSION["firstConnection"])) {
      $_SESSION["firstConnection"] = TRUE;
      $bdd = connexion();
      insertionProduitsDB($bdd);
      insertUsers($bdd);
      $bdd = deconnexion();
      
    }
    
  ?>
</header>
<body>
    <div class="container-fluid" id="nav-horizontal">
        <div class="row">
          <?php include("php\\navBarVertical.php");?>
            <div class="col-sm bg-warning text-dark">
                <aside class="text-center">
                    <br>
                    <br>
                    <h1><strong>Votre royaume d'alimentation</strong></h1><br>
                    <p><img class="w-50" src="img/kindofburger.png" /></p>
                    <h1 class="display-6 text-start"><strong><u>Notre Histoire</u></strong></h1><br>
                    <p class="text-start"> Notre histoire commence en 2021, deux hommes confinés en période Covid en train de changer le monde de chez eux. C'est le 15 février 2021 que Mostafa Kassem et Tomy Phalyvong révolutionnent le monde de restauration avec la création d'un royaume d'alimentation ouvert pour tout le monde : FOOD KINGDOM®. <br> </p>
                    <p class="text-start"> Dans ce royaume, il n'y a que les ingredients les plus fraîches et notre viande grillé à la flamme. C'est exactement ce que vous méritez. <br>
                    Notre poulet avec sa fameuse recette de poulet composée de 15 herbes et épices <del>beaucoup plus d'une autre chaîne de restauration dont on va pas prononcé le nom</del> possède un goût de délicieux poulet cuisinés et frit sur place, pour une fraîcheur et une croustillance sur place.  </p>
                    <p class="text-start"> En ce qui concerne notre pizza, notre devise est "Ingredients fraîches, pizza délicieuse". On cherche évidemmenet pas à reinventer la roue, c'est pour cela qu'on utilise la façon italienne authentique et essaye de faire le mieux pour garantir une pizza qui vous fera voyager à Rome.</p>
                    <p class="test-start"> N'hésitez à nous appelez pour passer une commande sur le 06xxxxxxx.</p>

                    
                </aside>
            </div>
        </div>
    </div>
 
</body>

<footer>
<?php include("php\\footer.php");?>
</footer>

</html>
