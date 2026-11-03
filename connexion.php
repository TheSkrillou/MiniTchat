<?php
try {
    $bdd = new PDO('mysql:host=mysql-etu.unicaen.fr;dbname=navarro251_0;charset=utf8mb4', 'navarro251', 'Eus6eib4bae7eito');
} 
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>