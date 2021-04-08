<?php 
    //pas de session start car le fichier est utilisé une seule fois dans index.php précédé par un session start

    // Burgers

    

    $hamburger = array(
        'nom' => 'Hamburger',
        'description' => 'Pain spécial, steak haché, oignon, cornichon avec une sauce moutarde et ketchup.',
        'prix' => 3.00,
        'stock' => 143,
        'alt' => 'hamburger',
        'image' => 'img/hamburger.png');
        
    $cheeseBurger = array(
        'nom' => 'Cheeseburger',
        'description' => 'Pain spécial, steak haché, oignon, cornichon, moutarde, ketchup, fromage fondu.',
        'prix' => 3.50,
        'stock' => 242,
        'alt' => 'cheeseburger',
        'image' => 'img/cheeseburger.png');
    $cheesyBacon = array(
        'nom' => 'Cheesy Bacon',
        'description' => 'Pain spécial, double steak haché, oignon, cornichon, moutarde, ketchup, fromage fondu, bacon.',
        'prix' => 5.00,
        'stock' => 223,
        'alt' => 'cheesybacon',
        'image' => 'img/cheesybacon.png');
    $doubleBeefBBQ = array(
        'nom' => 'Double Beef BBQ',
        'description' => 'Pain spécial, double steak haché, oignon, cornichon, Sauce BBQ, fromage fondu.',
        'prix' => 4.75,
        'stock' => 312,
        'alt' => 'doublebeefbbq',
        'image' => 'img/doublebeefbbq.png');
    $doubleCheese = array(
        'nom' => 'Double Cheese',
        'description' => 'Pain spécial, double steak haché, oignon, cornichon, double fromage fondu',
        'prix' => 4.50,
        'stock' => 258,
        'alt' => 'doublecheese',
        'image' => 'img/doublecheese.png');

    //Poulet
    
    $bucketMixte = array(
        'nom' => 'Bucket Wings et Tinders',
        'description' => 'poulet coupés, marinés et panés, Ailes de poulet marinées, panées.',
        'prix' => 35.00,
        'stock' => 169,
        'alt' => 'bucketmixte',
        'image' => 'img/bucketmixte.png');
    $chickenAvocado = array(
        'nom' => 'Chicken Avocado',
        'description' => 'Pain spécial, poulet, sauce avocado, fromage fondu, crudités.',
        'prix' => 8.00,
        'stock' => 372,
        'alt' => 'chickenavocado',
        'image' => 'img/chickenavocado.png');
    $phillyChicken = array(
        'nom' => 'Philly Chicken',
        'description' => 'Sub brioché, bacon, tomate, pickles, cheddar, salade, sauce.',
        'prix' => 9.30,
        'stock' => 203,
        'alt' => 'Phillychicken',
        'image' => 'img/Phillychicken.png');
    $tastyChicken = array(
        'nom' => 'Tasty Chicken',
        'description' => 'Pain, panée au poulet, salade, oignon, emmental , tomate, sauce.',
        'prix' => 4.75,
        'stock' => 443,
        'alt' => 'tastychicken',
        'image' => 'img/tastychicken.png');
    $wings = array(
        'nom' => 'Wings',
        'description' => '10 wings nappées de sauce Buffalo ou Barbecue au choix.',
        'prix' => 8.50,
        'stock' => 321,
        'alt' => 'Wings',
        'image' => 'img/Wings.png');

    //Pizza

    $campione = array(
        'nom' => 'Pizza Campione',
        'description' => 'Sauce tomate,fromage,œuf, viande, champignons, pâte au choix.',
        'prix' => 11.60,
        'stock' => 168,
        'alt' => 'Campione',
        'image' => 'img/Campione.png');
    $fruttiDeMare = array(
        'nom' => 'Pizza Frutti Di Mare',
        'description' => 'Sauce tomate, fromage, fruits de mer, ail et persil, pâte au choix.',
        'prix' => 18.50,
        'stock' => 159,
        'alt' => 'fruttidemare',
        'image' => 'img/fruttidemare.png');
    $raclette = array(
        'nom' => 'Pizza Raclette',
        'description' => 'Sauce tomate, Raclette, pomme de terre, poulet, pâte au choix.',
        'prix' => 14.00,
        'stock' => 143,
        'alt' => 'Raclette',
        'image' => 'img/Raclette.png');
    $vegetarienne = array(
        'nom' => 'Pizza Végétarienne',
        'description' => 'Sauce tomate, fromage, tomates, poivrons et olives, pâte au choix.',
        'prix' => 17.75,
        'stock' => 177,
        'alt' => 'Végétarienne',
        'image' => 'img/vég.png');
    $western = array(
        'nom' => 'Pizza Western',
        'description' => 'Crème fraîche, fromage, poulet, poivrons, pâte au choix.',
        'prix' => 15.50,
        'stock' => 238,
        'alt' => 'western',
        'image' => 'img/western.png');
    
    
    


    
    $cat = array("burger", "poulet", "pizza");
    $_SESSION["burger"] = array($hamburger,$cheeseBurger,$cheesyBacon,$doubleBeefBBQ,$doubleCheese);
    $_SESSION["poulet"] = array($bucketMixte,$chickenAvocado,$phillyChicken,$tastyChicken,$wings);
    $_SESSION["pizza"] = array($campione,$fruttiDeMare,$raclette,$vegetarienne,$western);
    $xml = simplexml_load_file("cat.xml") or die("Error : Cannot create object");
    // il reste d'ajouter les categorie dans xml et dans session*
    if (count($xml->categorie) > count($cat)) {
        //je veux trouver la bonne categorie (càd le bon attribut qui n'est pas dans la cat et l'ajouter)
        $longueurCatSession = count($cat);
        for ($i = 0; $i < $longueurCatSession; $i++) {
            $existe = false;
            foreach($xml->categorie as $produit) {
                $nomCategorie = strval($produit["nom"]);
            if ($cat[$i] == $nomCategorie) {
                $existe = true;
            }
        }
            if ($existe = false) {
                array_push($cat, $nomCategorie);
            }
        }
    } elseif (count($xml->categorie) < count($cat)) {
        //ajout catégorie varSession dans xml
        $longueurCatSession = count($cat);
        for ($i = 0; $i < $longueurCatSession; $i++)
        {
            $existe = false;
            foreach ($xml->categorie as $produit) {
                $nomCategorie = strval($produit["nom"]);
                if ($cat[$i] == $nomCategorie) {
                    $existe = true;
                }
            }
            if ($existe == false) {
                $caseFound = $i;
                $fxml = fopen("cat.xml","a+");
                rewind($fxml);
                $categoryFound = false;
                while (!feof($fxml) && $categoryFound == false) {
                    $line = fgets($fxml);
                    if (strpos($line, "<categories>") !== false) {
                        $categoryFound = true;
                    }
                }
                fwrite($fxml, "<categorie nom = '". $cat[$caseFound] ."'>\r\n");
                fwrite($fxml, "</categorie>\r\n");
            }
        }
    }


    if (count($xml->categorie) == count($cat)) { //si pas de nouveau catégorie on vérifie les produit
        foreach($xml->categorie as $produits) { //1 seule categorie
            $nomCategorie = strval($produits['nom']); // nom categorie
            $num = count($_SESSION[$nomCategorie]);
            if (count($produits) < count($_SESSION[$nomCategorie])) { // 
                //je dois ecrire les produits dans le xml 
                //si une var de session n'est pas dans produit, je l'ajoute
                for ($i = 0; $i < count($_SESSION[$nomCategorie]) ; $i++) {
                    $existe = false;
                    foreach($produits as $produit) {
                        //je cherche la variable de session qui n'est pas dans le xml
                        if ($produit->nom == $_SESSION[$nomCategorie][$i]["nom"]) {
                            $existe = true;
                        } 
                    }
                    if ($existe = false) {
                        $caseNotFound = $i; 
                        $fxml = fopen("cat.xml","a+");
                        rewind($fxml);
                        $categoryFound = false;
                        while (!feof($fxml) && $categoryFound == false) {
                            $line = fgets($fxml);
                            if (strpos($line, $nomCategorie) !== false) {
                                $categoryFound = true;
                            }
                        }
                        fwrite($fxml, "<produit>\r\n");
                        fwrite($fxml, "<nom>" . $_SESSION[$nomCategorie][$caseNotFound]["nom"] . "</nom>\r\n");
                        fwrite($fxml,"<description>" . $_SESSION[$nomCategorie][$caseNotFound]["description"] . "</description>\r\n");
                        fwrite($fxml, "<prix>" . $_SESSION[$nomCategorie][$caseNotFound]["prix"] . "</prix>\r\n");
                        fwrite($fxml, "<stock>" . $_SESSION[$nomCategorie][$caseNotFound]["stock"] . "</stock>\r\n");
                        fwrite($fxml, "<alt>" . $_SESSION[$nomCategorie][$caseNotFound]["alt"] . "</alt>\r\n");
                        fwrite($fxml, "<image>" . $_SESSION[$nomCategorie][$caseNotFound]["image"] . "</image>\r\n");
                        fwrite($fxml, "</produit>\r\n");
                        fclose($fxml);
                    }
                }
            } elseif (count($produits) > count($_SESSION[$nomCategorie])) {
                //remplir ajouter des produits dans la variable de session correspondante C

                //CETTE PARTIE EST FAITE
                foreach($produits as $produit) { //je parcours les produits du xml
                    $existe = false;
                    //$difference = count($produits) - count($_SESSION[$nomCategorie]); // nb de produits à changer
                    $lengthSession = count($_SESSION[$nomCategorie]);
                    for ($i = 0; $i < $lengthSession; $i++) {
                        if($_SESSION[$nomCategorie][$i]["nom"] == $produit->nom) { //si mon produit dans le xml est dans la var de session
                            $existe = true;
                        }
                    }
                    if ($existe = false) { // le produit du xml n'est pas dans la var de SESSION
                        //je l'ajoute dans le tableau de session;
                        $newProduit = array(
                            'nom' => $produit->nom,
                            'description' => $produit->description,
                            'prix' => $produit->prix,
                            'stock' => $produit->stock,
                            'alt' => $produit->alt,
                            'image' => $produit->image);
                        array_push($_SESSION[$nomCategorie], $newProduit);
                    }
                }
            }
        }        
    }
   


        
    
?>
