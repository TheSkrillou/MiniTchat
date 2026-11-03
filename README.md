# MiniTchat

MiniTchat est un projet de minichat développé en PHP procédural et MySQL dans le cadre des cours de l'Université de Caen Normandie.

## Fonctionnalités

- Envoi de messages avec pseudonyme.
- Affichage dynamique des derniers messages avec choix du nombre de messages à afficher.
- Modification et suppression des messages (avec pop-up de confirmation).
- Enregistrement de la date de modification.
- Support complet des émojis (UTF-8mb4).
- Sécurisation contre les injections SQL (requêtes préparées PDO) et les failles XSS (`strip_tags`).

## Stack technique

- **Langage :** PHP (procédural)
- **Base de données :** MySQL (PDO, interclassement `utf8mb4_unicode_ci`)
- **Interface :** HTML5 / CSS3

## Accès au projet

Le projet est en ligne et accessible à l'adresse suivante :
[MiniTchat sur le serveur étudiant](https://www.info.unicaen.fr/~navarro251/R3.01-MiniChat/)

## Auteur

Pierre Navarro Etudiant en 2ème année de BUT Informatique sur Ifs