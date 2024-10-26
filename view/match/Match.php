<?php
  if ($match) {
?>
<section class="match-details">
<h2><?= htmlspecialchars($equipeDomicile->getNomCourt()) ?> vs <?= htmlspecialchars($equipeVisiteur->getNomCourt()) ?></h2>
<ul class="match-details-list">
    <li class="match-details-venue-container"><?= htmlspecialchars($stade->getNom()) ?></li>
    <li class="match-details-date-container"><?= date("j M Y", strtotime($match->getDateMatch())) ?></li>
    <li class="match-details-image-container"><img src="assets\images\IMGViewer\Match_<?= htmlspecialchars($match->getId()).'_600x450' ?>.jpg" alt=""></li>
    <li class="match-details-score-container">
      <div class="match-details-team-home">
        <img class="match-details-team-logo" src="assets/images/logo_equipe/<?= htmlspecialchars($equipeDomicile->getLogo()) ?>.svg" class="team-logo" alt="Logo domicile">
        <span class="match-details-team-home-great"><?= htmlspecialchars($equipeDomicile->getVille()) ?></span>
        <span class="match-details-team-home-small"><?= htmlspecialchars($equipeDomicile->getTrigramme()) ?></span>
      </div>
      <div class="match-details-score">
        <span><?= htmlspecialchars($match->getDomicileScore()) ?> - <?= htmlspecialchars($match->getVisiteurScore()) ?></span>
      </div>
      <div class="match-details-team-away">
        <img class="match-details-team-logo" src="assets/images/logo_equipe/<?= htmlspecialchars($equipeVisiteur->getLogo()) ?>.svg" alt="Logo visiteur">
        <span class="match-details-team-home-great"><?= htmlspecialchars($equipeVisiteur->getVille()) ?></span>
        <span class="match-details-team-home-small"><?= htmlspecialchars($equipeVisiteur->getTrigramme()) ?></span>
      </div>
    </li>
    <li class="match-details-competition-container"><?= htmlspecialchars($competition->getNom()) ?></li>
    <li class="match-details-location-container"><?= htmlspecialchars($stade->getVille()) ?>, <?= htmlspecialchars($stade->getPays()) ?></li>
    <li class="match-details-attendance-container"><?= htmlspecialchars(number_format($match->getAffluence(), 0, '', ' ')) ?> spectateurs</li>
  </ul>
</section>
<?php
} else {
  echo "<p>ID de match non valide.</p>";
}
?>