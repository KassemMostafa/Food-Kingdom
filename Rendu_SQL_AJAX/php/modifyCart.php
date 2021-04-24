<?php
	session_start();
	include("../bdd/bdd.php");

    $user = $_POST["username"];
   
    if ($user == '0') {
        $user = NULL;
    }
    $nomProduit = $_POST["nomProduit"];
    $qte = $_POST["quantity"];
    $bddConn = connexion();
    $stock = fetchStockQuantity($bddConn, $nomProduit);
    try {
        if ($_POST["action"] == "modifier") {
            if ($user == NULL) {
                $query = $bddConn->prepare('UPDATE panier
                SET qte = :qte WHERE user is NULL AND nomProduit LIKE :nomProduit ');
                $query->execute(array(
                    'qte' => $qte,
                    'nomProduit' => $nomProduit
                ));
            } else {
                $user = trim($user);
                $query = $bddConn->prepare('UPDATE panier
                SET qte = :qte WHERE user LIKE :user AND nomProduit LIKE :nomProduit ');
                $query->execute(array(
                    'qte' => $qte,
                    'user' => $user,
                    'nomProduit' => $nomProduit
                ));
            }	
        } elseif ($_POST["action"] == "supprimer") {
            if ($user == NULL) {
                $query = $bddConn->prepare('DELETE FROM panier WHERE user is NULL AND nomProduit LIKE :nomProduit');
                $query->bindValue(':nomProduit', $nomProduit);
                $query->execute();
            } else {
                $user = trim($user);
                $query = $bddConn->prepare('DELETE FROM panier WHERE user LIKE :user AND nomProduit LIKE :nomProduit');
                $query->execute(array(
                    'user' => $user,
                    'nomProduit' => $nomProduit
                ));

            }
        }
        header("Location: /panier.php");
        $bddConn = NULL;
    } catch (Exception $error)
    {
        die('Erreur: ' .$error->getMessage());
    }

?>