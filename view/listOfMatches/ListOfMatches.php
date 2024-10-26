
<section class="match-list">
  <ul class="match-list-card-container">
    <?php foreach($matchs as $match): ?>
    <li class="match-list-card">
      <!-- <a href="?controller=Matches&action=matchRoute($match['id'])" class="match-list-card-link"> -->
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