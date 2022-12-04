<?php
/*
  TP MMI PHP et base de données
  Université POITIERS - Angoulême
  -----------------------------------------------------------------------------
  Ce script autoréférant permet d'effacer un avatar.

  Fichier : src/page/avatar/delete.php
 */


    // 1. récupérer les données du formulaire
    $id =  (int) ($_GET['id']);
    // 2. effacer
    Avatar::getInstance()->delete($id);
    // page d'accueil
    HTTP::redirect('/');