<?php
/*
  TP MMI PHP et base de données
  Université POITIERS - Angoulême
  -----------------------------------------------------------------------------
  Ce script d'enregistrement d'un nouvel avatar.

  Fichier : src/page/avatar/save.php
 */


// afficher le contenu de la variable superglobale $_FILES
$filename = '';
if (!empty($_FILES['illustration']) && $_FILES['illustration']['type'] == 'image/webp') {

  // récupérer le nom et emplacement du fichier dans sa zone temporaire
    $source = $_FILES['illustration']['tmp_name'];
    // récupérer le nom originel du fichier
    $filename = $_FILES['illustration']['name'];
    // ajout d'un suffixe unique
    // récupérer séparément le nom du fichier et son extension
    $filename_name = pathinfo($filename, PATHINFO_FILENAME);
    $filename_extension = pathinfo($filename, PATHINFO_EXTENSION);
    // produire un suffixe unique
    $suffix = uniqid();
    $filename = $filename_name . '_' . $suffix . '.' . $filename_extension;
    // construire le nom et l'emplacement du fichier de destination
    $destination = APP_ASSETS_DIRECTORY . 'image' . DS . 'illustration' . $filename ;
    // placer le fichier dans son dossier cible (le fichier de la zone temporaire est effacé)
    move_uploaded_file($source, $destination);
}


// 2. exécuter la req d'insertion
$avatars = Avatar::getInstance()->create([
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
    'display_name' => trim($_POST['display_name']),
    'illustration' => $filename,
]);


// après l'insertion, retourner sur la page d'accueil
HTTP::redirect('/');