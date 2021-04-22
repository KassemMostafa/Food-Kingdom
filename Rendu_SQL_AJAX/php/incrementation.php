<?php
//phpinfo();
//echo (empty($_POST['produit']));

if (session_status() === PHP_SESSION_DISABLED) {	//Version php >5.4.0 sinon session_id() == ''
//if(session_id() == ''  ){
  //location('';
	echo "ok";
}
else{
	session_start();
	//Verification variable
	echo empty($_POST['produit']);
	$produit = isset($_POST["produit"]) ? htmlspecialchars($_POST["produit"]) : NULL;
	$alt = isset($_POST["alt"]) ? htmlspecialchars($_POST["alt"]) : NULL;
	$qte = isset($_POST['qteProduit']) ? htmlspecialchars($_POST['qteProduit']) : NULL;
	$prix = isset($_POST['prix']) ? htmlspecialchars($_POST['prix']) : NULL;
	//echo $produit.$qte;

	//controle variable, ajout au variable de session
	if (empty($_POST['qteProduit'])){
		foreach($_SESSION["panier"] as $key => $value){
			if ($key ==$produit){
				unset($_SESSION["panier"][$key]);
			}
		}
	}
	else{
		//$_SESSION[$produit] = $produit;
		//$_SESSION["qte".$produit] = $qte;
		$produitpanier = [$produit => $qte];
		//echo $produit;
		//$tab = $_SESSION['panier'];
		$flag = false;
		foreach($_SESSION["panier"] as $key => $value){
			//echo "{$key} => {$value[0]} ";		//le nomproduit
			//echo "{$key} => {$value[1]} ";
			//echo $value[0] ==$produit;
			if ($key ==$produit){		// si on trouve le produit dans le panier
				//$value = array($value[0],$qte);
				//$value = array_replace_recursive($value,array("qte" => $qte));
				$_SESSION["panier"][$key]["qte"]= $qte;
				$flag=true;
			}
			//echo $_SESSION[$key][1];
			//echo $value;

		}
		if($flag == false)// le produit n'est pas dans le panier
			$_SESSION['panier'][$produit] = ["qte" => $qte,"prix" => $prix,"alt" => $alt];
			//$_SESSION['panier'][$produit] = $qte;					//important
		//array_push($_SESSION['panier'],$produitpanier);
		
		
		var_dump($_SESSION['panier']);
		//echo $_SESSION[$produit];
		//echo "banane";
		echo "<br/>";
		//echo $_SESSION["qte".$produit];
		//header("location:".  $_SERVER['HTTP_REFERER']); 

	}
}
		header("location:".  $_SERVER['HTTP_REFERER']); 


//<?php/* if(isset($_SESSION[$value["nom"]])){echo $_SESSION[$value["nom"]."qte"];} else{echo 0;}*/

// if(isset($_SESSION[$value["nom"]]))
	//{echo $_SESSION[$value["nom"]."qte"];} 
//else{echo 0;}
?>