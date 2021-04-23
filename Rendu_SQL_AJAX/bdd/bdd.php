<?php
    // $server = "localhost";
    // $dbName = "foodkingdom";
    // $chipset = "utf8mb4";
    // $port = 3306;
    // $user = "root";
    // $pass = "";
    //PDO est utilisé

    
    function connexion() {
        include "bddData.php";
        try
        {
            $dbConn = new PDO('mysql:host='.$server.';dbname='.$dbName.';charset='.$charset.';port='.$port,$user, $pass);
        }
        catch (Exception $error)
        {
                die('Erreur : ' . $error->getMessage());
        }
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //permet de gérer les exceptions plus tard 
            return $dbConn;
    }
    
    function deconnexion() {
        return NULL;
    }

    function insertionProduitsDB($dbConn) { // la fonction connect appélé avant celle là
        
        try {
            $verif = $dbConn->prepare("SELECT * FROM produit");
            $verif->execute();
            $res = $verif->fetchall();
            if (count($res) == 0) {
                $xml = simplexml_load_file("cat.xml") or die("Error : Cannot create object");
                $_SESSION["fileRead"] = TRUE; //vérification que la fonction ne s'applique qu'une seule fois
                $fsql = fopen("sql\\foodKingdomData.sql",'w+');
                $query = $dbConn->prepare("INSERT INTO produit (alt, nom, categorie, description, prix, stock, image) VALUES (:alt, :nom, :categorie, :description, :prix, :stock, :image)");
                foreach($xml->categorie as $categorie) {
                    $nomCategorie = strval($categorie["nom"]);
                    foreach ($categorie as $produit) {
                        $query->execute(array('alt' => strval($produit->alt),
                        'nom' => strval($produit->nom),
                        'categorie' => $nomCategorie,
                        'description' => strval($produit->description),
                        'prix' => strval($produit->prix),
                        'stock' => strval($produit->stock), 
                        'image' => strval($produit->image)));
                        $sqlText = "INSERT INTO produit (alt, nom,categories,description,prix,stock,image) VALUES('".strval($produit->alt)."','".strval($produit->nom)."','".$nomCategorie."','".strval($produit->description)."','".strval($produit->prix)."',".strval($produit->stock).",'".strval($produit->image)."');\n";
                        fwrite($fsql, $sqlText);
                    }
                }
                fclose($fsql);
            }
            $dbConn = deconnexion();
        }
        catch (Exception $error)
        { 
                die('Erreur : ' . $error->getMessage());
        }

    }

?>