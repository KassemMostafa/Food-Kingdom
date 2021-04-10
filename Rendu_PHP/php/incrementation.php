<?php
//phpinfo();
//echo session_status();
if (session_status() === PHP_SESSION_DISABLED) {	//Version php >5.4.0 sinon session_id() == ''
//if(session_id() == ''  ){
  //location('';
	echo "ok";
}
else{
	session_start();
	//Verification variable
	$produit = isset($_POST["produit"]) ? htmlspecialchars($_POST["produit"]) : NULL;
	$qte = isset($_POST['qteProduit']) ? htmlspecialchars($_POST['qteProduit']) : NULL;
	//echo $produit.$qte;

	//controle variable, ajout au variable de session
	if (empty($_POST['produit']) || empty($_POST['qteProduit'])){
		//si vide ne rien faire
	}
	else{
		$_SESSION[$produit] = $produit;
		$_SESSION["qte".$produit] = $qte;
				
		//echo $produit;
		echo $_SESSION[$produit];
		//echo "banane";
		echo "<br/>";
		echo $_SESSION["qte".$produit];
		//header("location:".  $_SERVER['HTTP_REFERER']); 

	}
}
		header("location:".  $_SERVER['HTTP_REFERER']); 


//<?php/* if(isset($_SESSION[$value["nom"]])){echo $_SESSION[$value["nom"]."qte"];} else{echo 0;}*/

// if(isset($_SESSION[$value["nom"]]))
	//{echo $_SESSION[$value["nom"]."qte"];} 
//else{echo 0;}
?>