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
  const updateSportSelect = document.getElementById("updateSport");
  for (let i = 0; i < updateSportSelect.options.length; i++) {
    if (updateSportSelect.options[i].text === sportName) {
      updateSportSelect.options[i].selected = true;
      break;
    }
  }
  document.getElementById("modalUpdateForm").style.display = "flex";
}

// Fonction pour fermer la modale de mise à jour
function closeUpdateModal() {
  document.getElementById("modalUpdateForm").style.display = "none";
}