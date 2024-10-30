<section class="admin-management">
<h2>Liste des Compétitions</h2>
<button onclick="openModal()" class="admin-button">Ajouter une nouvelle compétition</button>
<table class="admin-table" border="1">
  <thead>
  <tr>
    <th>Sport</th>
    <th>Nom</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($competitions as $competition): ?>
    <tr>
      <td><?php echo htmlspecialchars($competition['sport']); ?></td> <!-- Affiche le nom du sport -->
      <td><?php echo htmlspecialchars($competition['nom']); ?></td>
      <td>
        <a href="#" onclick="openUpdateModal(<?php echo $competition['id']; ?>, '<?php echo htmlspecialchars($competition['nom']); ?>', '<?php echo htmlspecialchars($competition['sport']); ?>')" class="action-icon edit-icon" title="Modifier">
        <!-- <a href="#" onclick="openUpdateModal(<?php echo $competition['id']; ?>, <?php echo $competition['sport']; ?>, <?php echo $competition['nom']; ?>)" class="action-icon edit-icon" title="Modifier"> -->
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg>
        </a>
        <a href="#" onclick="openDeleteModal(<?php echo $competition['id']; ?>)" class="action-icon delete-icon" title="Supprimer">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
        </a>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<!-- Modale pour le formulaire de création -->
<div id="modalForm" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <h3>Ajouter une nouvelle compétition</h3>
    <form action="index.php?controller=AdminCompetition&action=created" method="post">
      <label for="sport">Sport</label>
      <select id="sport" name="sport" required>
        <?php if (isset($sports) && is_array($sports)): ?>
          <?php foreach ($sports as $sport): ?>
            <option value="<?php echo $sport['id']; ?>"><?php echo htmlspecialchars($sport['nom']); ?></option>
          <?php endforeach; ?>
        <?php else: ?>
          <option value="">Aucun sport disponible</option>
        <?php endif; ?>
      </select>
      <label for="nom">Nom de la compétition</label>
      <input type="text" id="nom" name="nom" required>
      <button type="submit" class="button">Créer la compétition</button>
    </form>
  </div>
</div>

<!-- Modale de confirmation pour la suppression -->
<div id="deleteModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeDeleteModal()">&times;</span>
    <h3>Confirmer la suppression</h3>
    <p class="modal-message">Êtes-vous sûr de vouloir supprimer cette compétition ?</p>
    <form id="deleteForm" method="post" action="index.php?controller=AdminCompetition&action=delete">
      <input type="hidden" name="id" id="competitionId" value="">
      <div class="button-group">
        <button type="button" onclick="closeDeleteModal()" class="cancel-button">Annuler</button>
        <button type="submit" class="delete-button">Supprimer</button>
      </div>
    </form>
  </div>
</div>

<!-- Modale pour la mise à jour d'une compétition -->
<div id="modalUpdateForm" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeUpdateModal()">&times;</span>
    <h3>Modifier la compétition</h3>
    <form id="updateForm" action="index.php?controller=AdminCompetition&action=updated" method="post">
      <input type="hidden" name="id" id="updateCompetitionId">
      <label for="updateSport">Sport</label>
      <select id="updateSport" name="sport" required>
        <?php if (isset($sports) && is_array($sports)): ?>
          <?php foreach ($sports as $sport): ?>
            <option value="<?php echo $sport['id']; ?>">
              <?php echo htmlspecialchars($sport['nom']); ?>
            </option>
          <?php endforeach; ?>
        <?php else: ?>
          <option value="">Aucun sport disponible</option>
        <?php endif; ?>
      </select>
      <label for="updateNom">Nom de la compétition</label>
      <input type="text" id="updateNom" name="nom" required>
      <button type="submit" class="button">Mettre à jour</button>
    </form>
  </div>
</div>
</section>

<script>
// Fonction pour ouvrir la modale
function openModal() {
  document.getElementById("modalForm").style.display = "flex";
}

// Fonction pour fermer la modale
function closeModal() {
  document.getElementById("modalForm").style.display = "none";
}

// Fonction pour ouvrir la modale de suppression
function openDeleteModal(id) {
  document.getElementById("competitionId").value = id;
  document.getElementById("deleteModal").style.display = "flex";
}

// Fonction pour fermer la modale de suppression
function closeDeleteModal() {
  document.getElementById("deleteModal").style.display = "none";
}

// Ferme la modale si l'utilisateur clique en dehors de celle-ci
window.onclick = function(event) {
  const modalForm = document.getElementById("modalForm");
  const deleteModal = document.getElementById("deleteModal");
  const modalUpdateForm = document.getElementById("modalUpdateForm");

  if (event.target === modalForm) {
    closeModal();
  } else if (event.target === deleteModal) {
    closeDeleteModal();
  } else if (event.target === modalUpdateForm) {
    closeUpdateModal();
  }
};

// Fonction pour ouvrir la modale de mise à jour avec les valeurs actuelles de la compétition
function openUpdateModal(id, nom, sportName) {
  document.getElementById("updateCompetitionId").value = id;
  document.getElementById("updateNom").value = nom;
  // document.getElementById("updateSport").value = sportName;
  const updateSportSelect = document.getElementById("updateSport");
  for (let i = 0; i < updateSportSelect.options.length; i++) {
    if (updateSportSelect.options[i].text === sportName) {
      updateSportSelect.options[i].selected = true;
      break;
    }
  }
  document.getElementById("modalUpdateForm").style.display = "flex";
  // console.log(id, nom, sportName)
}

// Fonction pour fermer la modale de mise à jour
function closeUpdateModal() {
  document.getElementById("modalUpdateForm").style.display = "none";
}
</script>