<?php
require_once 'connexion.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int) $_GET['id'];

    $req = $bdd->prepare('DELETE FROM messages WHERE messages_id = ?');
    $req->execute([$id]);
}

header('Location: index.php');
exit;
?>