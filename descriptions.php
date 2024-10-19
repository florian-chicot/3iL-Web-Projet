<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Matchs</title>
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

    // Requête pour récupérer les matchs et les informations associées
    $sql = "
        SELECT 
          matchs.id,
          matchs.date_match,
          matchs.sport,
          matchs.domicile_score,
          matchs.visiteur_score,
          matchs.affluence,
          e1.nom_court AS equipe_domicile,
          e1.logo AS logo_domicile,
          e2.nom_court AS equipe_visiteur,
          e2.logo AS logo_visiteur,
          competitions.nom AS competition
        FROM matchs
        JOIN equipes e1 ON matchs.domicile_equipe = e1.id
        JOIN equipes e2 ON matchs.visiteur_equipe = e2.id
        JOIN competitions ON matchs.competition = competitions.id
        ORDER BY matchs.date_match DESC
    ";
    $stmt = $pdo->query($sql);
    $matchs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="match-list">
      <ul class="card-container">  
      <!-- <ul> -->
        <?php foreach($matchs as $match): ?>
        <!-- <li> -->
        <li class="card">
          <a href="description.php?id=<?= $match['id'] ?>" class="card-link">
            <div>
              <div id="score-info" class="match-info">
                <p id="equipe-domicile"><?= htmlspecialchars($match['equipe_domicile']) ?></p>
                <img id="logo-equipe-domicile" src="assets/images/logo_equipe/<?= htmlspecialchars($match['logo_domicile']) ?>.svg" class="team-logo" width="50">
                <p id="score-domicile"><?= htmlspecialchars($match['domicile_score']) ?></p>
                <p id="score-separateur">&nbsp;-&nbsp;</p>
                <p id="score-visiteur"><?= htmlspecialchars($match['visiteur_score']) ?></p>
                <img id="logo-equipe-visiteur" src="assets/images/logo_equipe/<?= htmlspecialchars($match['logo_visiteur']) ?>.svg" class="team-logo" width="50">
                <p id="equipe-visiteur"><?= htmlspecialchars($match['equipe_visiteur']) ?></p>
              </div>
              <div id="date-competition-info" class="match-info">
                <p id="date" class="date"><?= date("d M Y", strtotime($match['date_match'])) ?></p>
                <p id="equipe-separateur">&nbsp;|&nbsp;</p>
                <p id="competition"><?= htmlspecialchars($match['competition']) ?></p>
              </div>
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </section>
  </main>
  <?php require_once 'footer.php'; ?>
</body>
</html>
