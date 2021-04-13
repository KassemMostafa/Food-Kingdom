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
        $currentpage = "contact";
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