<header>
  <nav>
    <h1><a href="index.php"><img class="logo-img" src="logo.svg"></a></h1>
    <div id="nav-menu">
      <a href="index.php">Accueil</a>
      <a href="?controller=ListOfMatches&action=readAll">Description</a>
      <?php if (isset($_SESSION['user']) && $_SESSION['user']->isAdmin()): ?>
      <a href="index.php?controller=Admin&action=adminRoute">Administration</a>
      <?php endif; ?>
      <?php if (isset($_SESSION['user'])): ?>
      <a href="index.php?controller=Login&action=logout">Se déconnecter</a>
      <?php else: ?>
      <a href="index.php?controller=Login&action=loginForm">Se connecter</a>
      <?php endif; ?>
    </div>
    <span class="burger-menu-btn" onclick="toggleMenu()">&#9776;</span>
  </nav>
</header>
<script src="assets/scripts/header.min.js"></script>