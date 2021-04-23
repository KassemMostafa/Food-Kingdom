<?php
include "../bdd/bdd.php";
$username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : NULL;
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : NULL;




if (empty($_POST["username"]) || empty($_POST['password']) ){
	//l'utilisateur n'a rien saisi
	header("Location: /connexion.php");
}
else{
	
	$db = connexion();
	if (!verifyLogin($db, $username, $password)) {
		header("Location: /connexion.php");

	} else {
		session_start();
		$_SESSION["userConnect"]=$username;
		header("Location: /index.php");	
		$_SESSION["panier"] = [];
	}			
}	

///var_dump($location);
	 //N'est pas un utilisateur du site retour vers la page de connxion
	// if($location == False){
	// 	header("Location: /connexion.php");
	// }
?>