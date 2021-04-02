<?php 
    session_start();
    // Burgers

    $hamburger = array(
        'nom' => 'Hamburger',
        'description' => 'Pain spécial, steak haché, oignon, cornichon avec une sauce moutarde et ketchup.',
        'prix' => '3,00€',
        'stock' => 143,
        'image' => 'img/hamburger.png');
    $cheeseBurger = array(
        'nom' => 'Cheeseburger',
        'description' => 'Pain spécial, steak haché, oignon, cornichon, moutarde, ketchup, fromage fondu.',
        'prix' => '3,50€',
        'stock' => 242,
        'image' => 'img/cheeseburger.png');
    $cheesyBacon = array(
        'nom' => 'Cheesy Bacon',
        'description' => 'Pain spécial, double steak haché, oignon, cornichon, moutarde, ketchup, 	fromage fondu, bacon.',
        'prix' => '5,00€',
        'stock' => 223,
        'image' => 'img/cheesybacon.png');
    $doubleBeefBBQ = array(
        'nom' => 'Double Beef BBQ',
        'description' => 'Pain spécial, double steak haché, oignon, cornichon, moutarde, ketchup, 	fromage fondu, bacon.',
        'prix' => '4,75€',
        'stock' => 312,
        'image' => 'img/doublebeefbbq.png');
    $doubleCheese = array(
        'nom' => 'Double Cheese',
        'description' => 'Pain spécial, double steak haché, oignon, cornichon, double fromage fondu',
        'prix' => '4,50€',
        'stock' => 258,
        'image' => 'img/doublecheese.png');

    //Poulet
    
    $bucketMixte = array(
        'nom' => 'Bucket Wings et Tinders',
        'description' => 'poulet coupés, marinés et panés, Ailes de poulet marinées, panées.',
        'prix' => '35,00€',
        'stock' => 169,
        'image' => 'img/bucketmixte.png');
    $chickenAvocado = array(
        'nom' => 'Chicken Avocado',
        'description' => 'Pain spécial, poulet, sauce avocado, fromage fondu, crudités.',
        'prix' => '8,00€',
        'stock' => 372,
        'image' => 'img/chickenavocado.png');
    $phillyChicken = array(
        'nom' => 'Philly Chicken',
        'description' => 'Sub brioché, bacon, tomate, pickles, cheddar, salade, sauce.',
        'prix' => '9,30€',
        'stock' => 203,
        'image' => 'img/Phillychicken.png');
    $tastyChicken = array(
        'nom' => 'Tasty Chicken',
        'description' => 'Pain, panée au poulet, salade, oignon, emmental , tomate, sauce.',
        'prix' => '4,75€',
        'stock' => 443,
        'image' => 'img/tastychicken.png');
    $wings = array(
        'nom' => 'Wings',
        'description' => '10 wings nappées de sauce Buffalo ou Barbecue au choix.',
        'prix' => '8,50€',
        'stock' => 321,
        'image' => 'img/Wings.png');

    //Pizza

    $campione = array(
        'nom' => 'Pizza Campione',
        'description' => 'Sauce tomate,fromage,œuf, viande, champignons, pâte au choix.',
        'prix' => '11,60€',
        'stock' => '168',
        'image' => 'img/Campione.png');
    $fruttiDeMare = array(
        'nom' => 'Pizza Frutti Di Mare',
        'description' => 'Sauce tomate, fromage, fruits de mer, ail et persil, pâte au choix.',
        'prix' => '18,50€',
        'stock' => 159,
        'image' => 'img/fruttidemare.png');
    $raclette = array(
        'nom' => 'Pizza Raclette',
        'description' => 'Sauce tomate, Raclette, pomme de terre, poulet, pâte au choix.',
        'prix' => '14,00€',
        'stock' => 143,
        'image' => 'img/Raclette.png');
    $vegetarienne = array(
        'nom' => 'Pizza Végétarienne',
        'description' => 'Sauce tomate, fromage, tomates, poivrons et olives, pâte au choix.',
        'prix' => '17,75€',
        'stock' => 177,
        'image' => 'img/vég.png');
    $western = array(
        'nom' => 'Pizza Western',
        'description' => 'Crème fraîche, fromage, poulet, poivrons, pâte au choix.',
        'prix' => '15,50€',
        'stock' => 238,
        'image' => 'img/western.png');
    
    $_SESSION["burger"] = array($hamburger,$cheeseBurger,$cheesyBacon,$doubleBeefBBQ,$doubleCheese);
    $_SESSION["poulet"] = array($bucketMixte,$chickenAvocado,$phillyChicken,$tastyChicken,$wings);
    $_SESSION["pizza"] = array($campione,$fruttiDeMare,$raclette,$vegetarienne,$western);
    
?>
