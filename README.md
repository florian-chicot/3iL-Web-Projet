## Acte métier
Le site MatchMemories consiste à afficher les résultats de matchs de sport ainsi que des informations détaillées sur ces matchs.

## Solution
Site web : https://florian-chicot-3il.alwaysdata.net/3iL-Web-Projet/index.php

## Scénario

L'utilisateur souhaite regarder les résultats des matchs de sport (Ligue 1, Top 14, etc.), pour cela il se rend sur la page Descriptions où les matchs sont listés. Parmi cette liste de match, l'utilisateur souhaite cette fois connaître une information sur un match en particulier tel que l'affluence, le score, le stade, etc. Il clique sur le match souhaité afin d'obtenir ces informations.

Il peut trouver une information erronée et souhaite contacter le support pour signaler cette erreur à partir de la page contact, accessible depuis le pied de page (footer).

## Connexion page d'administration

* login : **admin**
* password : **admin123456**

## Informations supplémentaires

* Les pages web appellent les fichiers CSS et JS minifiés, mais dans le dossier assets/scripts ou assets/styles ces fichiers existent également sous forme non minifiées.

* Les images n'ont pas été commit dans le dépôt Git afin de maintenir un dépôt léger, éviter les et suivre les bonnes pratiques de gestion de ressources volumineuses.

* Pour refaire le site à partir de l'export de la base de données, changez les informations de connextion à la BDD dans model/Model.php
```
  public static function init() {
    $dsn = 'mysql:host=YOUR_DATABASE_HOST;dbname=YOUR_DATABASE_NAME
    $user = YOUR_DATABASE_USER;
    $password = YOUR_DATABASE_PASSWORD;
  }```