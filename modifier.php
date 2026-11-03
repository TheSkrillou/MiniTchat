<?php
require_once 'connexion.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    
    $req = $bdd->prepare('SELECT * FROM messages WHERE messages_id = ?');
    $req->execute([$id]);
    $message = $req->fetch();

    if (!$message) {
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['id']) && isset($_POST['message'])) {
    $id = (int) $_POST['id'];
    $nouveauMessage = strip_tags($_POST['message']);

    $req = $bdd->prepare('UPDATE messages SET messages_contenu = :message, messages_dateModif = NOW() WHERE messages_id = :id');
    $req->execute([
        'message' => $nouveauMessage,
        'id' => $id
    ]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un message</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="modifier.php" method="post">
        <p class="info">Modifier le message</p>
        <input type="hidden" name="id" value="<?php echo $message['messages_id']; ?>">
        <p>
            <label for="message">Nouveau contenu :</label><br>
            <input type="text" name="message" id="message" value="<?php echo htmlspecialchars($message['messages_contenu']); ?>" maxlength="255" required style="width: 100%; padding: 10px;">
        </p>
        <p>
            <input type="submit" value="Enregistrer">
            <a href="index.php">Annuler</a>
        </p>
    </form>
</body>
</html>