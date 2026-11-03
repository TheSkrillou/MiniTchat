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
    <form action="" method="get">
        <label>Combien de messages ?</label>
        <select name="limite">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
        <input type="submit" value="Afficher">
    </form>
    <form action="" method="get" class="form-limite">
    <label>Combien de messages ?</label>
    <select name="limite">
        <option value="5" <?php if(isset($_GET['limite']) && $_GET['limite'] == 5) echo 'selected'; ?>>5</option>
        <option value="10" <?php if(isset($_GET['limite']) && $_GET['limite'] == 10) echo 'selected'; ?>>10</option>
        <option value="20" <?php if(isset($_GET['limite']) && $_GET['limite'] == 20) echo 'selected'; ?>>20</option>
    </select>
    <input type="submit" value="Afficher">
    </form>

   <div>
        <?php
        $limite = 5;
        if (isset($_GET['limite'])) {
            $limite = (int) $_GET['limite'];
        }

        $reponse = $bdd->query('SELECT messages_pseudo, messages_contenu, DATE_FORMAT(messages_dateM, \'%d/%m/%Y\') AS date, DATE_FORMAT(messages_dateM, \'%H:%i\') AS heure FROM messages ORDER BY messages_dateM DESC LIMIT ' . $limite); 

        while ($donnees = $reponse->fetch()) {
            echo '<p>Le <span class="date">' . $donnees['date'] . '</span> à <span class="heure">' . $donnees['heure'] . '</span> - <strong>' . htmlspecialchars($donnees['messages_pseudo']) . '</strong> : ' . htmlspecialchars($donnees['messages_contenu']) . '</p>';
        }
        $reponse->closeCursor();
        ?>
    </div>
</body>
</html>