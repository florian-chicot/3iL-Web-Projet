<section class="contact-form">
  <h2>Contactez-nous</h2>
  <form action="?controller=Contact.php?action=send" method="POST">
    <div>
      <label for="subject">Sujet</label>
      <input type="text" id="subject" name="subject" required>
    </div>
    <div>
      <label for="message">Message</label>
      <textarea id="message" name="message" rows="5" required></textarea>
    </div>
    <div>
      <button type="submit">Envoyer le message</button>
    </div>
  </form>
  <div>
    <?php foreach ($contactInfos as $info): ?>
      <p><?php echo htmlspecialchars($info['name']); ?> : <?php echo htmlspecialchars($info['content']); ?></p>
    <?php endforeach; ?>
  </div>
</section>
