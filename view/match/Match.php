<?php
  if ($match) {
?>
<section class="match-details">
  <h2><?= htmlspecialchars($match->getDomicileEquipe()) ?> vs <?= htmlspecialchars($match->getVisiteurEquipe()) ?></h2>
  <ul class="match-details-list">
    <li class="match-details-venue-container"><?= htmlspecialchars($match->getStade()) ?></li>
    <li class="match-details-date-container"><?= date("j M Y", strtotime($match->getDateMatch())) ?></li>
    <li class="match-details-image-container"><img src="assets\images\IMGViewer\Match_<?= htmlspecialchars($match->getId()).'_600x450' ?>.jpg" alt=""></li>
    <li class="match-details-score-container">
      <div class="match-details-team-home">
        <img class="match-details-team-logo" src="assets/images/logo_equipe/logo_domicile.svg" class="team-logo" alt="Logo domicile">
        <span class="match-details-team-home-great">ville_domicile</span>
        <span class="match-details-team-home-small">equipe_domicile_tri</span>
      </div>
      <div class="match-details-score">
        <span><?= htmlspecialchars($match->getDomicileScore()) ?> - <?= htmlspecialchars($match->getVisiteurScore()) ?></span>
      </div>
      <div class="match-details-team-away">
        <img class="match-details-team-logo" src="assets/images/logo_equipe/logo_visiteur.svg" class="team-logo" alt="Logo visiteur">
        <span class="match-details-team-home-great">ville_visiteur</span>
        <span class="match-details-team-home-small">equipe_visiteur_tri</span>
      </div>
    </li>
    <li class="match-details-competition-container"><?= htmlspecialchars($match->getCompetition()) ?></li>
    <li class="match-details-location-container">stade_ville, stade_pays</li>
    <li class="match-details-attendance-container"><?= htmlspecialchars(number_format(num: $match->getAffluence(), thousands_separator: ' ')) ?> spectateurs</li>
  </ul>
</section>
<?php
} else {
  echo "<p>ID de match non valide.</p>";
}
?>