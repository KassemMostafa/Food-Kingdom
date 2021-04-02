<nav class="nav navbar-expand-lg navbar-dark bg-dark ">
		<div class="container-fluid">
		  <a class="navbar-brand" href="Index.html"><img id="logo" class=" d.inline-block align-middle" alt="logo" name="logo" src="img/cuteBurger.png" height="40"/>
			Food Kingdom</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
			<ul class="navbar-nav justify-content-center">
			  <li class="nav-item"> 
				<a <?php if($currentpage == "Index") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="index.php">Accueil</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "Burger") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="burger.php?cat=burger">Burger</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "Poulet") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="poulet.php?cat=poulet">Poulet</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "Pizza") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="pizza.php?cat=pizza">Pizza</a>
			  </li>
			  <li class="nav-item">
				<a <?php if($currentpage == "Contact") {echo 'class="nav-link active" aria-current="page"';} else echo 'class = "nav-link"';?> href="contact.php">Contact</a>
			  </li>
			</ul>
		  </div>
		</div> 
	  </nav>