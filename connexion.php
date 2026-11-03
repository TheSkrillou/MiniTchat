<?php

try {
    $bdd = new PDO('mysql:host=dev-navarro251.users.info.unicaen.fr;dbname=navarro251_0;charset=utf8', 'navarro251', 'Eus6eib4bae7eito');
} 

catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


?>