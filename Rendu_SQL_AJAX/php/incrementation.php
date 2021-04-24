<?php
	session_start();
	include("../bdd/bdd.php");





	$nomProduit = isset($_POST["nomProduit"]) ? htmlspecialchars($_POST["nomProduit"]) : NULL;
	$alt = isset($_POST["alt"]) ? htmlspecialchars($_POST["alt"]) : NULL;
	$qte = isset($_POST['qte']) ? htmlspecialchars($_POST['qte']) : NULL;
	$prix = isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : NULL;
	if (isset($_SESSION["userConnect"])) {
		$user = $_SESSION["userConnect"];
	} else {
		$user = null;
	} 
	
	
	//premier truc, vérifier que le produit ajouté n'est pas déjà lié dans la base;

	$bdd = connexion();
	try {
		if (is_null($user)) {
			$verif = $bdd->prepare("SELECT * FROM panier WHERE user is NULL AND nomProduit LIKE :nomProduit");
		} else {
			$verif = $bdd->prepare("SELECT * FROM panier WHERE user like :user AND nomProduit LIKE :nomProduit");
			$verif->bindValue(':user', $user);
		}
		$verif->bindValue(':nomProduit', $nomProduit);
		$verif->execute();
		$res = $verif->fetchall(PDO::FETCH_ASSOC);
		var_dump($res);
		if (count($res) == 0) {
			//ajout nouveau produit dans panier
			$query = $bdd->prepare("INSERT INTO panier (user, nomProduit, prix, qte) VALUES (:user, :nomProduit, :prix, :qte)");
			$query->execute(array(
				'user' => $user,
				'nomProduit' => $nomProduit,
				'prix' => $prix,
				'qte' => $qte));
		} else {
			//ajout quantité dans panier
			if (is_null($user)) {
				$query = $bdd->prepare("UPDATE panier SET qte = qte + :qte
				WHERE user is NULL and nomProduit LIKE :nomProduit");
			} else {
				$query = $bdd->prepare("UPDATE panier
				SET qte = qte + :qte
				WHERE user LIKE :user AND nomProduit LIKE :nomProduit");
				$query->bindValue(':user', $user);
			}
			$query->bindValue(':qte', $qte);
			$query->bindValue(':nomProduit', $nomProduit);
			$res = $query->execute();
			if ($res === false) {
				var_dump($query->errorInfo());
			} 
		}
		header("location: /produits.php?cat=".$_POST["pageName"]); 
	}
	catch (Exception $error)
	{
		die('Erreur : ' . $error->getMessage());
	}
?>