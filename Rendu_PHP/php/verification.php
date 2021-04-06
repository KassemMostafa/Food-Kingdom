<?php

$username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : NULL;
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : NULL;

if (empty($_POST["username"]) || empty($_POST['password']) ){
	//l'utilisateur n'a rien saisi
	header("Location: http://projetdevweb/php/connexion.php");
}
else{
	// chemin d'accès à votre fichier JSON
	$file = 'utilisateur.json'; 
	// mettre le contenu du fichier dans une variable
	$data = file_get_contents($file); 
	// décoder le flux JSON
	$obj = json_decode($data); 
	// accéder à l'élément approprié
	for ($i = 0; $i <= count($obj)-1; $i++) {
		echo $obj[$i]->user;
		if($username == $obj[$i]->user && $password ==$obj[$i]->mdp){
			//la personnne est bien un utilisateur du site
			session_start();
			$_SESSION["user"]=$username;
			header("Location: http://projetdevweb/index.php");
		}
	}	

	//N'est pas un utilisateur du site retour vers la page de connxion
	header("Location: http://projetdevweb/php/connexion.php");
}
?>