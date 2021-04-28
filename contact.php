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
                    <br>
                    <h1>Demande de contact</h1>
                    <form method="POST" action="php/verif.php" enctype="multipart/form-data" id="formulaire">
                        <label for="nom">Nom :</label><br>
                        <input type="text" name="nom" id="nom" required value="<?php if(isset($_SESSION['nom'])) echo $_SESSION['nom'];?>">
                        <small class="text-danger"></small><br>
                        
                        <label for="pnom">Prénom :</label><br>
                        <input type="text" name="pnom"id="pnom" required value="<?php if(isset($_SESSION['nom'])) echo $_SESSION['nom'];?>">
                        <small class="text-danger"></small><br>
                        
                        <label for="email">Adresse Mail:</label><br>
                        <input type="email" name="email"id="email" required value=""><br>
                        <label for="genre">Genre :</label><br>
                        <div class="container">
                            <div class="row align-self-center">
                                <label for="homme">Homme</label><br>
                                <input type="radio" id="homme" name="genre" value="homme" checked >
                                <label for="femme">Femme</label><br>
                                <input type="radio" id="femme" name="genre" value="femme">
                                <label for="autre">Autre</label><br>
                                <input type="radio" id="autre" name="genre" value="autre">
                            </div>
                        </div>
                        <label for="activité"> Secteur d'activité:</label> <br>
                        <select id="Activité" name="activité" value="<?php if(isset($_SESSION['contenu'])) echo $_SESSION['contenu'];?>" required>
                            <option disabled selected>Selectionnez un secteur d'activité</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Agroalimentaire-Alimentation">Agroalimentaire-Alimentation</option>
                            <option value="Animaux">Animaux</option>
                            <option value="Architecture-Aménagement Intérieur">Architecture-Aménagement Intérieur</option>
                            <option value="Bâtiment - Travaux Publics">Bâtiment - Travaux Publics</option>
                            <option value="Biologie - Chimie">Biologie - Chimie</option>
                            <option value="Culture - Spectacle">Culture - Spectacle</option>
                            <option value="Défense - Sécurité - Secours">Défense - Sécurité - Secours</option>
                            <option value="Informatique - Electronique">Informatique - Electronique</option>
                            <option value="Enseignement - Formation">Enseignement - Formation</option>
                            <option value="Hôtellerie - Restauration - Tourisme">Hôtellerie - Restauration - Tourisme</option>
                            <option value="Humanitaire">Humanitaire</option>
                            <option value="Mécanique - Maintenance">Mécanique - Maintenance</option>
                            <option value="Numérique - Multimédia - Audiovisuel">Numérique - Multimédia - Audiovisuel</option>
                            <option value="Secrétariat - Accueil">Secrétariat - Accueil</option>
                            <option value="Social - Services à la personne">Social - Services à la personne</option>
                            <option value="Transport - Logistique">Transport - Logistique</option>
                            <option value="Autre Secteur">Autre Secteur</option>
                        </select><br>
                        <label for="dateNaissance">Date de naissance : </label> <br>
                        <input type="date" id="dateNaissance" name="dateNaissance" min="1111-01-01" max="2000-12-12" required value="<?php if(isset($_SESSION['LE_NOM_DU_CHAMP'])) echo $_SESSION['LE_NOM_DU_CHAMP'];?>"><br>
                        <label for="sujet">Sujet:</label> <br>
                        <input type="text" id="sujet" name="sujet" value="<?php if(isset($_SESSION['sujet'])) echo $_SESSION['sujet'];?>" required> <br>
                        <label for="contenu">Contenu:</label><br>
                        <textarea name="contenu" rows="10" cols="40" value="" required><?php if(isset($_SESSION['contenu'])) echo $_SESSION['contenu'];?></textarea><br>
                        <input type="submit" name="submit" value="Send" />
                    </form>
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