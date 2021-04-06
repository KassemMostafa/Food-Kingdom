<p><?php
session_start();
//include "H:\Desktop\2020-2021\S2\DevWeb\rendus\Rendu_PHP\contact.php";

$nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : NULL;
$pnom = isset($_POST['pnom']) ? htmlspecialchars($_POST['pnom']) : NULL;
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : NULL;
$genre = isset($_POST) ? htmlspecialchars($_POST['genre']) : NULL;
$activité = isset($_POST['activité']) ? htmlspecialchars($_POST['activité']) : NULL;
$dateNaissance = isset($_POST['dateNaissance']) ? htmlspecialchars($_POST['dateNaissance']) : NULL;
$sujet = isset($_POST['sujet']) ? htmlspecialchars($_POST['sujet']) : NULL;
$contenu = isset($_POST['contenu']) ? htmlspecialchars($_POST['contenu']) : NULL;

$n = isset($_GET["n"]) ? $_GET["n"] : null;
/*$name = $_POST['nom'];
$prenom = $_POST['prenom'];/*
*/
/*
$email_address = $_POST['email'];
$objet = $_POST['objet'];
$message = $_POST['message'];
*/
/*
if (isset($_POST["nom"])) {
    $nom = htmlspecialchars($_POST["nom"]);
	echo "la varianble et dans le dollard";
}
else{
	echo "ok";
}
*/
echo "<pre>";
    print_r($_POST);
    echo "</pre>";
	
//Verification variable vide et verification regex
if (empty($_POST['nom']) || empty($_POST['pnom']) || empty($_POST['email']) || empty($_POST['genre']) )
	{
		sleep(5);
		echo "ERREUR : tous les champs n'ont pas ete renseignés.";		
		$_SESSION["nom"] = $nom;
		$_SESSION["pnom"] = $pnom;
		$_SESSION["email"] = $email;
		$_SESSION["genre"] = $genre;
		$_SESSION["activité"] = $activité;
		$_SESSION["dateNaissance"] = $dateNaissance;
		$_SESSION["sujet"] = $sujet;
		$_SESSION["contenu"] = $contenu;
		header("location:".  $_SERVER['HTTP_REFERER']); 
	}
	else
	{
		//enregistrement des veriables de session
			
		$regxmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
		$regxstr ="^[A-Za-z]+((\s)?([A-Za-z])+)*$^";
		$regxdate ="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/";
		$verif1= preg_match($regxmail, $email);		
		$verif2= preg_match($regxstr, $nom);
		$verif3= preg_match($regxstr, $pnom);
		$verif4= preg_match($regxdate, $dateNaissance);
		$verif5= preg_match($regxstr, $sujet);
		$verif6= preg_match($regxstr, $contenu);
		if( $verif1 && $verif2 && $verif3 && $verif4 && $verif5 && $verif6 ){
			sleep(5);
		}
		else{
			$_SESSION["nom"] = $nom;
			$_SESSION["pnom"] = $pnom;
			$_SESSION["email"] = $email;
			$_SESSION["genre"] = $genre;
			$_SESSION["activité"] = $activité;
			$_SESSION["dateNaissance"] = $dateNaissance;
			$_SESSION["sujet"] = $sujet;
			$_SESSION["contenu"] = $contenu;
			header("location:".  $_SERVER['HTTP_REFERER']); 
			//header("Location: http://projetdevweb/contact.php");
			
		}
	}
	


 ?>
 
 <p>