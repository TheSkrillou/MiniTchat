<?php
session_start();
require_once 'connexion.php'; 

if (isset($_POST['pseudo']) && isset($_POST['message'])) {
    $_SESSION['pseudo'] = strip_tags($_POST['pseudo']);

    $req = $bdd->prepare('INSERT INTO messages (messages_pseudo, messages_contenu) VALUES(:pseudo, :message)');
    $req->execute([
        'pseudo' => $_SESSION['pseudo'],
        'message' => strip_tags($_POST['message'])
    ]);
}

header('Location: index.php');
exit;
?>