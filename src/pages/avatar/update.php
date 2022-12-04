<?php
/*
  TP MMI PHP et base de données
  Université POITIERS - Angoulême
  -----------------------------------------------------------------------------
  Ce script de mise à jour d'un  avatar.

  Fichier : src/page/avatar/update.php
 */


// dump($_POST);
// afficher le contenu de la variable superglobale $_FILES
// dd($_FILES);
// 1. récupérer l'identifiant (à partir du champ caché du formulaire)
$id = (int) $_POST['id'];

// 2. récupérer les informations sur l'avatar en cours
$avatar = Avatar::getInstance()->find($id);


$filename = '';
// 3. traiter l'image si elle est mise à jour
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

    // effacer l'ancienne image (si elle existe)
    if ($avatar['illustration']) {
        $old_illustration = APP_ASSETS_DIRECTORY . 'image' . DS . 'illustration' . $avatar['illustration'] ;
        unlink($old_illustration);
    }
}


// 4. préparer les données à mettre à jour
$datas = [
    'email' =>  trim($_POST['email']),
    'display_name' => trim($_POST['display_name']),
];
// si le mot de passe est renseigné, alors mettre à jour
if ($password =  trim($_POST['password'])) {
    $datas['password'] = $password;
}
// si une nouvelle illustration est proposée, alors mettre à jour
if ($illustration) {
    $datas['illustration'] = $illustration;
}
$avatar = Avatar::getInstance()->update($id, $datas);

// après l'insertion, retourner sur la page d'accueil
HTTP::redirect('/');