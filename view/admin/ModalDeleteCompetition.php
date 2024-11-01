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