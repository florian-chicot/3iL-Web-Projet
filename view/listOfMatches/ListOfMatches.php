
<section class="match-list">
  <h2>Liste des matchs</h2>
  <ul class="match-list-card-container">
    <?php foreach($matches as $match): ?>
    <li class="match-list-card">
      <a href="?controller=Match&action=matchRoute&id=<?= $match['id'] ?>" class="match-list-card-link">
        <div id="score-info" class="match-list-card-match-info">
          <p id="equipe-domicile" class="match-list-card-equipe-domicile"><?= htmlspecialchars($match['equipe_domicile']) ?></p>
          <img id="logo-equipe-domicile" src="assets/images/logo_equipe/<?= htmlspecialchars($match['logo_domicile']) ?>.svg" class="match-list-card-team-logo">
          <div id="score" class="match-list-card-score">
            <p id="score-domicile"><?= htmlspecialchars($match['domicile_score']) ?></p>
            <p id="score-separateur">&nbsp;-&nbsp;</p>
            <p id="score-visiteur"><?= htmlspecialchars($match['visiteur_score']) ?></p>
          </div>
          <img id="logo-equipe-visiteur" src="assets/images/logo_equipe/<?= htmlspecialchars($match['logo_visiteur']) ?>.svg" class="match-list-card-team-logo">
          <p id="equipe-visiteur" class="match-list-card-equipe-visiteur"><?= htmlspecialchars($match['equipe_visiteur']) ?></p>
        </div>
        <div id="date-competition-info" class="match-list-card-match-date-compet">
          <p id="date"><?= date("j M Y", strtotime($match['date_match'])) ?></p>
          <p id="equipe-separateur">&nbsp;·&nbsp;</p>
          <p id="competition"><?= htmlspecialchars($match['competition']) ?></p>
        </div>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</section>
<section>
  <?php
    require_once File::build_path(array("view", ".include", "Pagination.php"));
    $baseUrl = '?controller=listOfMatches&action=readAll';
    echo renderPagination($page, $totalPages, $baseUrl);
  ?>
</section>