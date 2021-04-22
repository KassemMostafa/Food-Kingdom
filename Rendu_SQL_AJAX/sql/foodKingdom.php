<?php

$serveur = "localhost";
$user = "root";
$pass = "";



function connecterBDD($server, $user, $pass) {

        $DBconn = mysqli_connect($server, $user, $pass);
        if (!$DBconn) {
            die("Erreur: " . mysqli_connect_error());
        }
        return $DBconn;
    }

function deconnecterBDD($DBconn) {
        if (isset($DBconn)) {
            mysqli_close($DBconn);
        }
    }

$DB = connecterBDD("localhost","root",""); //connectTODATABASE


//createDB
mysqli_query($DB, "DROP DATABASE if EXISTS FoodKingdom") or die(mysqli_error("Erreur"));
mysqli_query($DB, "CREATE DATABASE IF NOT EXISTS FoodKingdom")or die(mysqli_error("Erreur"));
mysqli_query($DB,"USE foodkingdom"); //USEDB

$table=["produit","user"];
foreach ($table as $key => $value){
	mysqli_query($DB,"DROP TABLE if EXISTS ".$key);
	switch ($value) {
    case "produit":
        mysqli_query($DB,"CREATE TABLE IF NOT EXISTS produit(
			id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			nom VARCHAR(128),
			couleur VARCHAR(5)
			)") or die(mysqli_error("Erreur"));
        break;
    case "panier":
        mysqli_query($DB,"CREATE TABLE IF NOT EXISTS panier(
			id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
			produit VARCHAR(128),
			prix INT,
			qte INT)") or die(mysqli_error("Erreur"));

        break;
    case 2:
        echo "i égal 2";
        break;
	}
}

deconnecterBDD($DB);
?>