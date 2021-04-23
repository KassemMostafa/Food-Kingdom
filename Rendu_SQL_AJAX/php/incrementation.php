<?php
	session_start();
	include("../bdd/bdd.php");





	$produit = isset($_POST["produit"]) ? htmlspecialchars($_POST["produit"]) : NULL;
	$alt = isset($_POST["alt"]) ? htmlspecialchars($_POST["alt"]) : NULL;
	$qte = isset($_POST['qteProduit']) ? htmlspecialchars($_POST['qteProduit']) : NULL;
	$prix = isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : NULL;
	
	if (isset($_SESSION["userConnect"])) {
		$user = $_SESSION["userConnect"];
	} else {
		$user = NULL;
	} 
	
	//premier truc, vérifier que le produit ajouté n'est pas déjà lié dans la base;

	$bdd = connexion();
	try {
		$verif = $bdd->prepare("SELECT * FROM panier WHERE user like :user AND nomProduit LIKE :nomProduit");
		$verif->bindValue(':user', $user);
		$verif->bindValue(':nomProduit', $produit);
		$verif->execute();
		$res = $verif->fetchall(PDO::FETCH_ASSOC);
		if (count($res) == 0) {
			//ajout nouveau produit dans panier
			$query = $bdd->prepare("INSERT INTO panier (user, nomProduit, prix, qte) VALUES (:user, :nomProduit, :prix, :qte)");
			$query->execute(array(
				'user' => $user,
				'nomProduit' => $produit,
				'prix' => $prix,
				'qte' => $qte));
		} else {
			//ajout quantité dans panier
			$query = $bdd->prepare("UPDATE panier
			SET qte = qte + :qte
			WHERE user LIKE :user AND nomProduit LIKE :nomProduit");
			$res = $query->execute(array(
				'qte' => $qte,
				'user' => $user,
				'nomProduit' => $produit
			));
			if ($res === false) {
				var_dump($query->errorInfo());
			} 
		}
	}
	catch (Exception $error)
	{
		die('Erreur : ' . $error->getMessage());
	}
?>