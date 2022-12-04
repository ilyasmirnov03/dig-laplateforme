<?php
/*
  TP MMI PHP et base de données
  Université POITIERS - Angoulême
  -----------------------------------------------------------------------------
  La page 404

  Fichier : src/page/404.php
 */

echo HTTP::head('404');
?>

<body>
  <div class="container">
    <h1 class="display-1">erreur 404</h1>
    <a href="/" class="btn btn-primary btn-lg">revenir sur la page d'accueil</a>
  </div>
  <?php
  echo HTTP::footer();