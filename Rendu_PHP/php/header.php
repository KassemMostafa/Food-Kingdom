<?php 
	require_once "varSession.inc.php";
	if (!isset($currentpage) || $currentpage == 'index' || $currentpage == 'contact' || $currentpage == 'connexion') {
		$existe = true;
	} else {
		$existe = false;
	}
	for ($i = 0 ; $i < count($cat); $i++) {
		if ($currentpage == $cat[$i]) {
			$existe = true;
		}
	}
	if ($existe == false && $currentpage != "index") {
		http_response_code(404);
		header("HTTP/1.0 404 Not Found");
		echo "<h1>404 Not Found</h1>";
		echo "The page that you have requested could not be found.";
		exit();	
	}
?>
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


				<a <?php if($currentpage == "index") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="index.php">Accueil</a>
			  </li>
			  <?php
			  	foreach($cat as $category) {
			  ?>
			  <li class="nav-item">
				<a <?php if($currentpage == $category) {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="produits.php?cat=<?php echo $category?>"><?php echo ucfirst(($category));?></a>
			  </li>
			  <?php } ?>
			  <li class="nav-item">
				<a <?php if($currentpage == "contact") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="contact.php">Contact</a>
			  </li>
			</ul>
		  </div>
		</div> 
		
		
		
		
		<div class="container-fluid-col-1">
		  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
			<ul class="navbar-nav justify-content-center">
<?php
			echo '<a ';
			if(isset($_SESSION["userConnect"])){
				echo 'class="nav-link" href="php/deconnexion.php">Deconnexion</a>';	//ne fonctionne pas mais a remplacer par une page php ou javascript pour deco session   (en php session_destroy();)
			}
			else{
				if($currentpage == "connexion") 
					{echo 'class="nav-link active" aria-current="page"';} 
				else 
					echo 'class = "nav-link"';
				echo ' class="nav-link" href="connexion.php">Connexion</a>';
			}	
		?>
			</ul>
		  </div>
		</div>
		
	  </nav>

	  