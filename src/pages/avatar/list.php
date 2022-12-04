<?php
/*
  TP MMI PHP et base de données
  Université POITIERS - Angoulême
  -----------------------------------------------------------------------------
  Ce script permet d'afficher l'ensemble des avatars.
  Les opérations de CRUD peuvent aussi être exécutées.

  Fichier : src/page/avatar/list.php
 */

// récupérer les informations sur les avatars
$avatars = Avatar::getInstance()->findAll();

echo HTTP::head('Liste des avatars');
?>

<body>
  <div class="container">
    <h1 class="display-1">Les avatars</h1>

    <a href="<?php HTTP::url('/add') ?>" class="btn btn-primary m-4">Ajouter un nouvel avatar</a>

    <?php
    if (count($avatars) === 0) { ?>
    <p>Aucun avatar n'est enregistré pour le moment.</p>
    <?php }?>

    <?php foreach ($avatars as $avatar) { ?>
    <section class="row mb-3 bg-light">
      <div class="col-md-2 position-relative">
        <div class="avatar-operations">
          <a href="<?php HTTP::url('/edit?id=' . $avatar['id']) ?>" class="text-warning">éditer</a>
          <a href="<?php HTTP::url('/delete?id=' . $avatar['id'])?>" class="text-danger">effacer</a>
        </div>
        <?php if ($avatar['illustration'] === '') { ?>
        <img src="assets/image/no-avatar.jpg" class="img img-fluid w-100">
        <?php } else { ?>
        <img src="assets/image/illustration/<?php echo $avatar['illustration']?>" class="img img-fluid w-100">
        <?php }  ?>
      </div>
      <div class="col-md-8">
        <h2><?php echo $avatar['display_name']?></h2>
        <p class="m-0">de <?php echo $avatar['email']?></p>
        <p class="m-0 text-muted fw-lighter ms-4">ajouté le
          <?php echo date_format(date_create($avatar['created_at']), 'd/m/Y');?>
          à <?php echo date_format(date_create($avatar['created_at']), 'H:i');?>
        </p>
      </div>
    </section>
    <?php } ?>
  </div>
  <?php
  echo HTTP::footer();