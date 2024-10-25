<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pagetitle ?></title>
  <link rel="stylesheet" href="assets/styles/style.css">
  <link rel="stylesheet" href="assets/styles/media-queries.css">
  <link rel="stylesheet" href="assets/styles/carousel.css">
</head>
<body>
  <?php require_once '.include/Header.php'; ?>
  <main>
    <?php require_once File::build_path(array("view", $controller, $view.".php")); ?>
  </main>
  <?php require_once '.include/Footer.php'; ?>
</body>
</html>
