<?php
require_once 'connexion.php';

if (isset($_GET['date']) && !empty($_GET['date'])) {
    $dateSuppr = $_GET['date'];

    $req = $bdd->prepare('DELETE FROM messages WHERE messages_dateM = ?');
    $req->execute([$dateSuppr]);
}

header('Location: index.php');
exit;
?>