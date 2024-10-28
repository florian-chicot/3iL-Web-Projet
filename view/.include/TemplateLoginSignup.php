<section class="login-signup-form">
  <h2><?= htmlspecialchars($formTitle) ?></h2>
  <form action="<?= htmlspecialchars($formAction) ?>" method="POST">
    <div>
      <label for="username">Nom d'utilisateur</label>
      <input type="text" id="username" name="username" required>
    </div>
    <div>
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" required>
    </div>
    <div>
      <button type="submit"><?= htmlspecialchars($buttonText) ?></button>
    </div>
  </form>
  <p class="login-signup-text"><?= htmlspecialchars($linkText) ?> <a href="<?= htmlspecialchars($linkUrl) ?>" class="login-signup-link"><?= htmlspecialchars($linkAnchorText) ?></a></p>
  <?php if (isset($errorMessage)) : ?>
    <p class="login-signup-error-message"><?= htmlspecialchars($errorMessage) ?></p>
  <?php endif; ?>
</section>