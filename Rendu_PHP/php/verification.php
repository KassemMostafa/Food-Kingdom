<?php

$username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : NULL;
$password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : NULL;
$location = False;


if (empty($_POST["username"]) || empty($_POST['password']) ){
	//l'utilisateur n'a rien saisi
	header("Location: /connexion.php");
	//echo "fail";
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
		//echo $obj[$i]->user;
		if($username == $obj[$i]->user && $password ==$obj[$i]->mdp){
			//la personnne est bien un utilisateur du site
			session_start();
			$_SESSION["userConnect"]=$username;
			$location = TRUE;
			header("Location: /index.php");
			echo "zeae";
	var_dump($location);

		}
	}	
}
///var_dump($location);
	 //N'est pas un utilisateur du site retour vers la page de connxion
	if($location == False){
		header("Location: /connexion.php");
	}
?>