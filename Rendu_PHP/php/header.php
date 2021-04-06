<?php require_once "varSession.inc.php";?>
<nav class="nav navbar-expand-lg navbar-dark bg-dark ">
		<div class="container-fluid">
		  <a class="navbar-brand" href="index.php"><img id="logo" class=" d.inline-block align-middle" alt="logo" name="logo" src="img/cuteBurger.png" height="40"/>
			Food Kingdom
		  </a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
			<ul class="navbar-nav justify-content-center">
			  <li class="nav-item"> 
				<a <?php if($currentpage == "Index") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="index.php">Accueil</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "burger") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="produits.php?cat=burger">Burger</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "poulet") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="produits.php?cat=poulet">Poulet</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "pizza") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="produits.php?cat=pizza">Pizza</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "contact") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="contact.php">Contact</a>
			  </li>
			</ul>
		  </div>
		</div> 
		<?php
			if(isset($_SESSION["user"]))
				echo '<a href="connexion.php">Connexion</a>';
			else
				echo '<a href="connexion.php">Deconnexion</a>';	//ne fonctionne pas mais a remplacer par un bouton + option de deconnection de session
					
		?>
	  </nav>

	  