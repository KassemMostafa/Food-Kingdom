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
	
if (session_status() === PHP_SESSION_DISABLED) {	//Version php >5.4.0 sinon session_id() == ''
	echo "ok";
}

else{
	session_start();
	$DB = connecterBDD("localhost","root","","foodkingdom") or die (mysqli_error());
	$use=mysqli_query($DB,"USE foodkingdom");
	if( isset($_SESSION["panier"])){		//si isset == faux on doit verifier la condition?
		foreach($_SESSION["panier"] as $key => $value){
			$prix= $_SESSION['panier'][$key]['prix'];
			$qte= $_SESSION['panier'][$key]['qte'];
			echo $key;
			///$texte1 = "INSERT INTO panier (produit,prix,qte) VALUES('".$key."', $prix,$qte)";
			$texte2 = "INSERT INTO panier (produit,prix,qte) 
			VALUES('".$key."',".$prix.",".$qte.")";
			mysqli_query($DB,$texte2)
			or die(mysqli_error($DB));
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