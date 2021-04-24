<?php
    session_start();
	include("../bdd/bdd.php");


    $nomProduit = $_GET["nomProduit"];
    $stock = $_GET["stock"];
    $bddConn = connexion();
    try {
        $query = $bddConn->prepare("UPDATE produit SET stock = stock - :stock WHERE nom LIKE :nomProduit");
        $query->execute(array(
        'stock' => $stock,
        'nomProduit' => $nomProduit
        ));
        $query = $bddConn->prepare("SELECT stock FROM produit WHERE nom LIKE :nomProduit");
        $query->bindValue(':nomProduit', $nomProduit);
        $query->execute();
        $res = $query->fetchall(PDO::FETCH_ASSOC);
        echo $res[0]['stock'];

    }
    catch (Exception $error)
    {
        die('Erreur : ' . $error->getMessage());
    }
    

?>