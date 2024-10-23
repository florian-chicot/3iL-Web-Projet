<header>
  <nav>
    <h1>MES MATCHS</h1>
    <ul id="nav-menu">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="matches-list.php">Description</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
    <span class="checkbtn" onclick="toggleMenu()">&#9776;</span>
  </nav>
</header>
<script>
function toggleMenu() {
  var menu = document.getElementById('nav-menu');
  menu.classList.toggle('show');
}
</script>