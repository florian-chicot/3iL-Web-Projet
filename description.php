<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détails du Match</title>
  <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
  <?php require_once 'header.php'; ?>
  <main>
    <?php
    // Connexion à la base de données
    $dsn = 'mysql:host=localhost;dbname=mes_matchs;charset=utf8';
    $user = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données : ' . $e->getMessage());
    }

    // Vérification que l'ID du match est bien passé en paramètre d'URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $match_id = $_GET['id'];

        // Requête pour récupérer les détails du match sélectionné
        $sql = "
            SELECT 
              matchs.id,
              matchs.date_match,
              matchs.sport,
              matchs.domicile_score,
              matchs.visiteur_score,
              matchs.affluence,
              e1.nom AS equipe_domicile,
              e1.ville AS ville_domicile,
              e1.logo AS logo_domicile,
              e2.nom AS equipe_visiteur,
              e2.ville AS ville_visiteur,
              e2.logo AS logo_visiteur,
              stades.nom AS stade_nom,
              stades.ville AS stade_ville,
              stades.pays AS stade_pays,
              competitions.nom AS competition
            FROM matchs
            JOIN equipes e1 ON matchs.domicile_equipe = e1.id
            JOIN equipes e2 ON matchs.visiteur_equipe = e2.id
            JOIN stades ON matchs.stade = stades.id
            JOIN competitions ON matchs.competition = competitions.id
            WHERE matchs.id = :id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $match_id]);
        $match = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($match) {
            ?>
            <section class="match-details">
              <h2><?= htmlspecialchars($match['equipe_domicile']) ?> vs <?= htmlspecialchars($match['equipe_visiteur']) ?></h2>
              <ul class="match-info-list">
                <li class="venue-container"><?= htmlspecialchars($match['stade_nom']) ?></li>
                <li class="date-container"><?= date("d M Y", strtotime($match['date_match'])) ?></li>
                <li class="image-container"><img src="assets\images\IMGViewer\Match_<?= htmlspecialchars($match['id']).'_600x450' ?>.jpg" width="600" alt=""></li>
                <li class="score-container">
                  <div class="match-team-home">
                    <img src="assets/images/logo_equipe/<?= htmlspecialchars($match['logo_domicile']) ?>.svg" class="team-logo" alt="Logo domicile">
                    <span><?= htmlspecialchars($match['ville_domicile']) ?></span>
                  </div>
                  <div class="match-score">
                    <p><?= htmlspecialchars($match['domicile_score']) ?> - <?= htmlspecialchars($match['visiteur_score']) ?></p>
                  </div>
                  <div class="match-team-away">
                    <img src="assets/images/logo_equipe/<?= htmlspecialchars($match['logo_visiteur']) ?>.svg" class="team-logo" alt="Logo visiteur">
                    <span><?= htmlspecialchars($match['ville_visiteur']) ?></span>
                  </div>
                </li>
                <li class="competition-container"><?= htmlspecialchars($match['competition']) ?></li>
                <li class="location-container"><?= htmlspecialchars($match['stade_ville']) ?>, <?= htmlspecialchars($match['stade_pays']) ?></li>
                <li class="attendance-container">Affluence <?= htmlspecialchars($match['affluence']) ?></li>
              </ul>
            </section>
            <?php
        } else {
            echo "<p>Match introuvable.</p>";
        }
    } else {
        echo "<p>ID de match non valide.</p>";
    }
    ?>
  </main>
  <?php require_once 'footer.php'; ?>
</body>
</html>
