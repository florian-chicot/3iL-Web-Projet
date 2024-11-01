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