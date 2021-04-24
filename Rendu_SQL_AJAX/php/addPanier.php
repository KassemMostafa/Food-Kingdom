<?php
    session_start();
	include("../bdd/bdd.php");


    $nomProduit = isset($_POST["nomProduit"]) ? htmlspecialchars($_POST["nomProduit"]) : NULL;
	$alt = isset($_POST["alt"]) ? htmlspecialchars($_POST["alt"]) : NULL;
	$qte = isset($_POST['qte']) ? htmlspecialchars($_POST['qte']) : NULL;
	$prix = isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : NULL;
    $bddConn = connexion();
    try {
        $query = $bddConn->prepare("UPDATE produit SET stock = stock - :qte WHERE nom LIKE :nomProduit");
        $query->execute(array(
        'qte' => $qte,
        'nomProduit' => $nomProduit
        ));
        $query = $bddConn->prepare("SELECT stock FROM produit WHERE nom LIKE :nomProduit");
        $query->bindValue(':nomProduit', $nomProduit);
        $query->execute();
        $res = $query->fetchall(PDO::FETCH_ASSOC);
        echo $res[0]['stock'];
        if (isset($_SESSION["userConnect"])) {
		$user = $_SESSION["userConnect"];
	} else {
		$user = null;
	} 
    if (is_null($user)) {
        $verif = $bddConn->prepare("SELECT * FROM panier WHERE user is NULL AND nomProduit LIKE :nomProduit");
    } else {
        $verif = $bddConn->prepare("SELECT * FROM panier WHERE user like :user AND nomProduit LIKE :nomProduit");
        $verif->bindValue(':user', $user);
    }
    $verif->bindValue(':nomProduit', $nomProduit);
    $verif->execute();
    $res = $verif->fetchall(PDO::FETCH_ASSOC);
    if (count($res) == 0) {
        //ajout nouveau produit dans panier
        $query = $bddConn->prepare("INSERT INTO panier (user, nomProduit, prix, qte) VALUES (:user, :nomProduit, :prix, :qte)");
        $query->execute(array(
            'user' => $user,
            'nomProduit' => $nomProduit,
            'prix' => $prix,
            'qte' => $qte));
    } else {
        //ajout quantité dans panier
        if (is_null($user)) {
            $query = $bddConn->prepare("UPDATE panier SET qte = qte + :qte
            WHERE user is NULL and nomProduit LIKE :nomProduit");
        } else {
            $query = $bddConn->prepare("UPDATE panier
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
    }
    catch (Exception $error)
    {
        die('Erreur : ' . $error->getMessage());
    }
    $bddConn = NULL;
    

?>