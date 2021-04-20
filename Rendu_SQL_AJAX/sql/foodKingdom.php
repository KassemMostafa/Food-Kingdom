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

$DB = connecterBDD("localhost","root","");

$drop_DB = mysqli_query($DB, "DROP DATABASE if EXISTS FoodKingdom") or die(mysqli_error());
$create_DB = mysqli_query($DB, "CREATE DATABASE IF NOT EXISTS FoodKingdom")or die(mysqli_error());

$use=mysqli_query($DB,"USE Foodkingdom");

$table=["produit","panier"];

/*
foreach ($table as $key => $value){
}
*/
foreach ($table as $key => $value){
	$Drop_Table=mysqli_query($DB,"DROP TABLE if EXISTS ".$key);

	switch ($value) {
    case "produit":
        $create_Table = mysqli_query($DB,"CREATE TABLE IF NOT EXISTS Produit(
			id INT PRIMARY KEY,
			nom VARCHAR(9),
			couleur VARCHAR(5))");
        break;
    case "panier":
        $create_Table1 = mysqli_query($DB,"CREATE TABLE IF NOT EXISTS Panier(
			id INT PRIMARY KEY,
			nom VARCHAR(9),
			couleur VARCHAR(5))");
        break;
    case 2:
        echo "i égal 2";
        break;
	}
}

deconnecterBDD($DB);

/*$create_Table = mysqli_query($DB,"CREATE TABLE Equipe(
 id INT PRIMARY KEY,
 nom VARCHAR(9),
 couleur VARCHAR(5))");
 
 
/*	CREATE TABLE Equipe(

 id INT PRIMARY KEY,

 nom VARCHAR(9),

$

 couleur VARCHAR(5));*/
 
 	//DROP TABLE Defense;
 
 
 
 
?>