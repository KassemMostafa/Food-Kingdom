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
    if (count($xml->categorie) > count($cat)) { //condition works
        //je veux trouver la bonne categorie (càd le bon attribut qui n'est pas dans la cat et l'ajouter)
        $longueurCatSession = count($cat);
        foreach($xml->categorie as $categorie) {
            $existe = false;
            $nomCategorie = strval($categorie["nom"]);
            for ($i = 0; $i < $longueurCatSession; $i++) {
                if ($cat[$i] == $nomCategorie) {
                    $existe = true;
                }
            }
            if ($existe == false) {
                array_push($cat, $nomCategorie);
                $_SESSION[$nomCategorie] = null;
            }
        }
        //till here works fine
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
                $nbCatXML = count($xml->categorie); //dans ce cas 3
                $categorie = $xml->addChild('categorie');
                $categorie->addAttribute('nom',$cat[$caseFound]);
                $xml->saveXML("cat.xml");
                 fclose($fxml);
            }
        }
    }
    foreach($xml->categorie as $categories) {
        $nomCategorie = strval($categories["nom"]);
        foreach ($categories as $produit) {
            $product = array('nom' => strval($produit->nom),
            'description' => strval($produit->description),
            'prix' => strval($produit->prix),
            'stock' => strval($produit->stock),
            'alt' => strval($produit->alt),
            'image' => strval($produit->image));
            array_push($_SESSION[$nomCategorie], $product);
        }
    }
	//var_dump($_SESSION($produit);
?>
