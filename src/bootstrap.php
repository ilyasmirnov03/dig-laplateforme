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
// traiter les différentes routes
require 'router.php';
