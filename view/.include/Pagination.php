<?php
function renderPagination($page, $totalPages, $baseUrl) {
    ob_start(); // Commence la capture de sortie
    ?>
    <div class="pagination">
        <!-- Lien Précédent -->
        <?php if ($page > 1): ?>
            <a class="pagination-button-previous" href="<?php echo $baseUrl . '&page=' . ($page - 1); ?>">❮ Précédent</a>
        <?php else: ?>
            <span class="pagination-button-previous disabled">❮ Précédent</span>
        <?php endif; ?>

        <!-- Première page et points de suspension si nécessaire -->
        <?php if ($page > 2): ?>
            <a href="<?php echo $baseUrl . '&page=1'; ?>">1</a>
            <span>···</span>
        <?php elseif ($page == 2): ?>
            <a href="<?php echo $baseUrl . '&page=1'; ?>">1</a>
        <?php endif; ?>

        <!-- Page actuelle -->
        <span class="active"><?php echo $page; ?></span>

        <!-- Dernière page et points de suspension si nécessaire -->
        <?php if ($page < $totalPages - 1): ?>
            <span>···</span>
            <a href="<?php echo $baseUrl . '&page=' . $totalPages; ?>"><?php echo $totalPages; ?></a>
        <?php elseif ($page == $totalPages - 1): ?>
            <a href="<?php echo $baseUrl . '&page=' . $totalPages; ?>"><?php echo $totalPages; ?></a>
        <?php endif; ?>

        <!-- Lien Suivant -->
        <?php if ($page < $totalPages): ?>
            <a class="pagination-button-next" href="<?php echo $baseUrl . '&page=' . ($page + 1); ?>">Suivant ❯</a>
        <?php else: ?>
            <span class="pagination-button-next disabled">Suivant ❯</span>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean(); // Renvoie le contenu capturé
}
?>
