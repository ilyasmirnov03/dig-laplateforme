<?php
/*
  Intégration des librairies communes.
  ------------------------------------------------

  Fichier : bootstrap.php

*/

/** 1 */
// libraries and classes autoload
require './../vendor/autoload.php';

/** 2 */
// les constantes de configuration pour la base
require 'Config/config.php';

/** 3 */
// les fonctions de debug et fonction utilisateur
require 'Helper/HTTP.php';

/** 4 */
// les modèles d'accés à la base
require 'Model/Model.php';

/** 5 */
// traiter les différentes routes
require 'router.php';
