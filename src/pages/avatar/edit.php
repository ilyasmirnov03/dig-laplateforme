<?php
/*
  TP MMI PHP et base de données
  Université POITIERS - Angoulême
  -----------------------------------------------------------------------------
  Ce script affiche le formulaire d'édition d'un avatar.

  Fichier : src/page/avatar/edit.php
 */

// récupérer les informations sur l'avatar
$id = (int) $_GET['id'];
$avatar = Avatar::getInstance()->find($id);

echo HTTP::head('Liste des avatars');
?>

<body>
  <div class="container">
    <h1>Éditer un avatar</h1>
    <form action="<?php HTTP::url('/update') ?>" method="post" class="w-50" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $avatar['id'] ?>">
      <div class="mb-3">
        <label class="form-label">Email <span class="required-info">*</span> :</label>
        <input name="email" type="email" value="<?php echo $avatar['email'] ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mot de passe <span class="required-info">*</span> :</label>
        <input name="password" type="password" class="form-control w-50">
      </div>
      <div class="mb-3">
        <label class="form-label">Nom à afficher <span class="required-info">*</span> :</label>
        <input name="display_name" type="text" value="<?php echo $avatar['display_name'] ?>" class="form-control w-50"
          required>
      </div>
      <div class="mb-3">
        <label class="form-label">Image de l'avatar :</label>
        <input name="illustration" type="file" class="form-control">
        <img src="/assets/image/illustration/<?php echo $avatar['illustration']  ?>" id="illustration_preview"
          class="img-fluid">
      </div>
      <p class="text-danger fs-6">Les données marquées d'une astérisque sont obligatoires.</p>
      <button type="submit" class="btn btn-primary">Mettre à jour cet avatar</button>
      <a href="/" class="btn btn-link text-black">annuler</a>
    </form>

  </div>

  <script>
  document.addEventListener('DOMContentLoaded', () => {

    // chercher une nouvelle image
    document.querySelector('[name="illustration"]').addEventListener('change', function() {
      // récupérer l'objet File
      const file = this.files[0];
      // compléter ici pour tester le type du fichier sélectionné
      // et afficher un éventuel message d'erreur
      console.log(file);
      if (file.type != 'image/webp') {
        alert(`le format de votre image (${file.type}) n'est pas correct`)
      }

      // récupérer le contenu de l'image
      let reader = new FileReader();
      reader.readAsDataURL(file);
      // attendre que le contenu de l'image soit totalement chargé
      reader.onload = function(e) {
        // le contenu binaire de l'image est disponible dans e.target.result
        document.querySelector('#illustration_preview').src = e.target.result;
        document.querySelector('#illustration_preview').classList.remove('d-none');
      }

    });

  })
  </script>
  <?php
  echo HTTP::footer();