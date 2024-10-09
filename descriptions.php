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
    <section class="match-list">
      <div class="card-container">
        <div class="card">
          <div id="score-info" class="match-info">
            <p id="equipe-domicile">Aix-Maurienne</p>
            <img id="logo-equipe-domicile" src="assets/images/logo_equipe/Basketball_Aix-Maurienne.svg" class="team-logo" width="50">
            <p id="score-domicile">91</p>
            <p id="score-separateur">&nbsp;-&nbsp;</p>
            <p id="score-visiteur">85</p>
            <img id="logo-equipe-visiteur" src="assets/images/logo_equipe/Basketball_Vichy.svg" class="team-logo" width="50">
            <p id="equipe-visiteur">Vichy</p>
          </div>
          <div id="date-competition-info" class="match-info">
            <p id="date" class="date">21 août 2019</p>
            <p id="equipe-separateur">&nbsp;|&nbsp;</p>
            <p id="competition">Amical</p>
          </div>
        </div>
        <div class="card">
          <div id="score-info" class="match-info">
            <p id="equipe-domicile">Aix-Maurienne</p>
            <img id="logo-equipe-domicile" src="assets/images/logo_equipe/Basketball_Aix-Maurienne.svg" class="team-logo" width="50">
            <p id="score-domicile">78</p>
            <p id="score-separateur">&nbsp;-&nbsp;</p>
            <p id="score-visiteur">86</p>
            <img id="logo-equipe-visiteur" src="assets/images/logo_equipe/Basketball_Dijon.svg" class="team-logo" width="50">
            <p id="equipe-visiteur">Dijon</p>
          </div>
          <div id="date-competition-info" class="match-info">
            <p id="date" class="date">24 août 2019</p>
            <p id="equipe-separateur">&nbsp;|&nbsp;</p>
            <p id="competition">Amical</p>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php require_once 'footer.php'; ?>
</body>
</html>
