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