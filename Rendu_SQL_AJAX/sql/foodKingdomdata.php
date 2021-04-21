<?php
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

function ecritureFile($text){
	$fichier = fopen('script2.sql',"r+");
	$flag=false;
	
	if ($fichier){
	/*Tant que l'on est pas à la fin du fichier*/
	while (!feof($fichier)){
		/*On lit la ligne courante*/
		$buffer = fgets($fichier);
		if($buffer == $text)
			$flag= true;
	}
	/*On ferme le fichier*/
	if (!$flag)
		fputs($fichier,$text);
	fclose($fichier);
	}
}

	
if (session_status() === PHP_SESSION_DISABLED) {	//Version php >5.4.0 sinon session_id() == ''
	echo "ok";
}

else{
	session_start();
	$DB = connecterBDD("localhost","root","","foodkingdom") or die (mysqli_error());
	$use=mysqli_query($DB,"USE foodkingdom");
	/*if( isset($_SESSION["panier"])){		//si isset == faux on doit verifier la condition?
		foreach($_SESSION["panier"] as $key => $value){
			$prix= $_SESSION['panier'][$key]['prix'];
			$qte= $_SESSION['panier'][$key]['qte'];
			echo $key;
			///$texte1 = "INSERT INTO panier (produit,prix,qte) VALUES('".$key."', $prix,$qte)";
			$texte2 = "INSERT INTO panier (produit,prix,qte) VALUES('".$key."',".$prix.",".$qte.")";
			mysqli_query($DB,$texte2)or die(mysqli_error($DB));
			ecritureFile($texte2.";\n");
		}
	}*/
	// echo var_dump($_SESSION);
	
	foreach ($_SESSION as $key => $value){
		// echo $key;
		// echo var_dump($value);
		if ($key == "panier"){
		
		}
		else if ($key =="userConnect"){}
		else{
			foreach ($value as $key1 => $value1){
				$texte = "INSERT INTO produit (alt, nom,categories,description,prix,stock,image) VALUES('".$value1['alt']."','".$value1['nom']."','".$key."','".$value1['description']."','".$value1['prix']."',".$value1['stock'].",'".$value1['image']."')";
				echo $texte;
				echo "<br/>";
				ecritureFile($texte.";\n");
				
			}
		}
	}
	
	
/*

	else{
		$produitpanier = [$produit => $qte];
		$flag = false;
		foreach($_SESSION["panier"] as $key => $value){
			if ($key ==$produit){		// si on trouve le produit dans le panier
				$_SESSION["panier"][$key]["qte"]= $qte;
				$flag=true;
			}
		}
		if($flag == false)
			$_SESSION['panier'][$produit] = ["qte" => $qte,"prix" => $prix];
		
		var_dump($_SESSION['panier']);
		echo "<br/>";
	}

//		header("location:".  $_SERVER['HTTP_REFERER']); 
*/

deconnecterBDD($DB);
}
?>