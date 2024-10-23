<header>
  <nav>
    <h1>MES MATCHS</h1>
    <div id="nav-menu">
      <a href="index.php">Accueil</a>
      <a href="matches-list.php">Description</a>
      <a href="contact.php">Contact</a>
    </div>
    <span class="burger-menu-btn" onclick="toggleMenu()">&#9776;</span>
  </nav>
</header>
<script>
function toggleMenu() {
  var menu = document.getElementById('nav-menu');
  menu.classList.toggle('show');
}
</script>