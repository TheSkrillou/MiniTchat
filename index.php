<?php
require_once 'connexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniChat</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="traitement.php" method="post">
        <label for="pseudo">Pseudo (25 caractères max):</label>
        <input type="text" id="pseudo" name="pseudo" maxlength="25" required>

        <label for="message">Le petit message (255 caractères max):</label>
        <input type="text" id="message" name="message" maxlength="255" required>

        <input type="submit" value="Valider">
    </form>

    <?php
        $reponse = $bdd->query('SELECT messages_pseudo, messages_contenu, DATE_FORMAT(messages_dateM, \'%d/%m/%Y %H:%i\') AS date FROM messages ORDER BY messages_dateM DESC LIMIT 10');

        while ($donnees = $reponse->fetch()) {
            echo '<p><strong>' . htmlspecialchars($donnees['messages_pseudo']) . '</strong> <em>(' . $donnees['date'] . ')</em> : ' . htmlspecialchars($donnees['messages_contenu']) . '</p>';
        }
        $reponse->closeCursor();
    ?>
</body>
</html>