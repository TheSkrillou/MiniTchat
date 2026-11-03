<?php
require_once 'connexion.php';

if (isset($_GET['date'])) {
    $dateModif = $_GET['date'];
    
    $req = $bdd->prepare('SELECT * FROM messages WHERE messages_dateM = ?');
    $req->execute([$dateModif]);
    $message = $req->fetch();

    if (!$message) {
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['date_originale']) && isset($_POST['message'])) {
    $dateOriginale = $_POST['date_originale'];
    $nouveauMessage = strip_tags($_POST['message']);

    $req = $bdd->prepare('UPDATE messages SET messages_contenu = :message WHERE messages_dateM = :date_orig');
    $req->execute([
        'message' => $nouveauMessage,
        'date_orig' => $dateOriginale
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
        <input type="hidden" name="date_originale" value="<?php echo $message['messages_dateM']; ?>">
        <p>
            <label for="message">Nouveau contenu :</label><br>
            <input type="text" name="message" id="message" value="<?php echo htmlspecialchars($message['messages_contenu']); ?>" maxlength="255" required>
        </p>
        <p>
            <input type="submit" value="Enregistrer">
            <a href="index.php">Annuler</a>
        </p>
    </form>
</body>
</html>