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
</section>
<section>
  <?php
    require_once File::build_path(array("view", ".include", "Pagination.php"));
    $baseUrl = '?controller=AdminCompetition&action=readAll';
    echo renderPagination($page, $totalPages, $baseUrl);
  ?>
</section>

<?php require_once File::build_path(array("view", "admin", "ModalAddCompetition.php")); ?>
<?php require_once File::build_path(array("view", "admin", "ModalUpdateCompetition.php")); ?>
<?php require_once File::build_path(array("view", "admin", "ModalDeleteCompetition.php")); ?>

<script src="assets/scripts/modal.js"></script>