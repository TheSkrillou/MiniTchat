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
    <form action="" method="get" class="form-limite">
        <label>Combien de messages ?</label>
        <select name="limite">
            <option value="5" <?php if(isset($_GET['limite']) && $_GET['limite'] == 5) echo 'selected'; ?>>5</option>
            <option value="10" <?php if(isset($_GET['limite']) && $_GET['limite'] == 10) echo 'selected'; ?>>10</option>
            <option value="20" <?php if(isset($_GET['limite']) && $_GET['limite'] == 20) echo 'selected'; ?>>20</option>
        </select>
        <input type="submit" value="Afficher">
    </form>
    <form action="traitement.php" method="post">
        <p class="info">Laissez un message</p>
        <p>
            <label for="pseudo">Pseudo :</label><br>
            <input type="text" name="pseudo" id="pseudo" value="<?php echo isset($_SESSION['pseudo']) ? htmlspecialchars($_SESSION['pseudo']) : ''; ?>" maxlength="25" required>
        </p>
        <p>
            <label for="message">Message :</label><br>
            <input type="text" name="message" id="message" maxlength="255" required>
        </p>
        <p>
            <input type="submit" value="Envoyer">
        </p>
    </form>

    
   <div>
        <?php
        $limite = 5;
        if (isset($_GET['limite'])) {
            $limite = (int) $_GET['limite'];
        }

        $reponse = $bdd->query('SELECT messages_id, messages_pseudo, messages_contenu, DATE_FORMAT(messages_dateM, \'%d/%m/%Y à %H:%i\') AS date, DATE_FORMAT(messages_dateModif, \'%d/%m/%Y à %H:%i\') AS dateModif FROM messages ORDER BY messages_dateM DESC LIMIT ' . $limite);
        
       while ($donnees = $reponse->fetch()) {
            echo '<p>';
            echo 'Le <span class="date">' . $donnees['date'] . '</span> à <span class="heure">' . $donnees['heure'] . '</span>';
            
            echo ' - <strong>' . htmlspecialchars($donnees['messages_pseudo']) . '</strong> : ' . htmlspecialchars($donnees['messages_contenu']);
            
            // On utilise la date brute stockée en base (messages_dateM) pour identifier le message
            echo ' <a href="modifier.php?date=' . urlencode($donnees['messages_dateM']) . '">[Modifier]</a>';
            echo ' <a href="supprimer.php?date=' . urlencode($donnees['messages_dateM']) . '" onclick="return confirm(\'Voulez-vous vraiment supprimer ce message ?\');">[Supprimer]</a>';
            
            echo '</p>';
        }
        $reponse->closeCursor();
        ?>
    </div>
</body>
</html>