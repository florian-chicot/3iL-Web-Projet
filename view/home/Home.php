<section class="home-section">
  <?php foreach ($presentationContents as $content): ?>
    <?php if ($content->getId() == 1): ?>
      <h2><?= htmlspecialchars($content->getContent()) ?></h2>
    <?php endif; ?>
  <?php endforeach; ?>
  <?php require_once File::build_path(array("view", ".include", "Carousel.php")); ?>
  <?php foreach ($presentationContents as $content): ?>
    <?php if ($content->getId() == 2): ?>
      <p><?= htmlspecialchars($content->getContent()) ?></p>
    <?php endif; ?>
  <?php endforeach; ?>
</section>
