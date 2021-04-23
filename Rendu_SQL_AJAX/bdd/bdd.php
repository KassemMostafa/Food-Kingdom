<?php
    // $server = "localhost";
    // $dbName = "foodkingdom";
    // $chipset = "utf8";
    // $port = 3306;
    // $user = "root";
    // $pass = "";
    //PDO est utilisé

    include "bddData.php";
    function connexion($server, $dbName, $chipset, $port, $user, $pass) {
        try
        {
            $dbConn = new PDO('mysql:host='.$server.';dbname='.$dbName.';charset='.$chipset.';port='.$port,$user, $pass);
        }
        catch (Exception $error)
        {
                die('Erreur : ' . $error->getMessage());
        }
            return $dbConn;
    }
    
    function deconnexion() {
        return NULL;
    }

    function insertionDB($dbConn) {
        
    }

?>