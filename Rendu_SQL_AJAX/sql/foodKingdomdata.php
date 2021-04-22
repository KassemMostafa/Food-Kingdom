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
		if($buffer == $text){
			$flag= true;
		}
	}
	if (!$flag)
		fputs($fichier,$text);
	/*On ferme le fichier*/
	fclose($fichier);
	}
}

	
if (session_status() === PHP_SESSION_DISABLED) {	//Version php >5.4.0 sinon session_id() == ''
}

else{
	session_start();
		// echo var_dump($_SESSION);
	$DB = connecterBDD("localhost","root","","foodkingdom") or die (mysqli_error());
	$use=mysqli_query($DB,"USE foodkingdom");
	
	
	foreach ($_SESSION as $key => $value){
		if ($key == "panier"){
		
		}
		else if ($key =="userConnect"){
		}
		else{
			foreach ($value as $key1 => $value1){
				// echo $key1;
				$texte = "INSERT INTO produit (alt, nom,categories,description,prix,stock,image) VALUES('".$value1['alt']."','".$value1['nom']."','".$key."','".$value1['description']."','".$value1['prix']."',".$value1['stock'].",'".$value1['image']."')";
				ecritureFile($texte.";\n");			
			}
		}
	}
	if( isset($_SESSION["panier"])){		//si isset == faux on doit verifier la condition?
		foreach($_SESSION["panier"] as $key => $value){
			$prix= $_SESSION['panier'][$key]['prix'];
			$qte= $_SESSION['panier'][$key]['qte'];
			$alt= $_SESSION['panier'][$key]['alt'];
			$texte2 = "INSERT INTO panier (utilisateur,idproduit,prix,qte) VALUES('".$alt."','".$_SESSION['userConnect']."',".$prix.",".$qte.")";
			// echo $texte2."<br/>";
			mysqli_query($DB,$texte2)or die(mysqli_error($DB));
			ecritureFile($texte2.";\n");
		}
	}

deconnecterBDD($DB);
}
?>