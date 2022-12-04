<?php
/*
  Constantes de configuraiton communes.
  ------------------------------------------------

  Fichier : /Config/config.php

*/

// les constantes de configuration pour la base
// 2 fichiers peuvent être analysés selon la situation :
//   - config.local.php pour le développement LOCAL
//   - config.prod.php quand le site est placé chez un hébergeur
//
// On détecte le local car l'IP de la machine est 127.0.0.1
$is_localhost = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' or $_SERVER['REMOTE_ADDR'] == '::1');
if ($is_localhost) {
    require 'config.local.php';
    define('APP_MODE', 'dev');
} else {
    require 'config.prod.php';
    define('APP_MODE', 'prod');
}

/** séparateur entre dossiers qui correspond à \ sur un windows ou / sur un linux */
define('DS', DIRECTORY_SEPARATOR);

/** Chemin absolu vers le dossier du projet. */
define('APP_ROOT_DIRECTORY', realpath(__DIR__ . DS . '..' . DS . '..') . DS);

/** chemin absolu vers le dossier de l'application */
define('APP_SRC_DIRECTORY', APP_ROOT_DIRECTORY . 'src' . DS);

/** chemin absolu vers le dossier des ressources CSS,JS,IMAGES */
define('APP_ASSETS_DIRECTORY', APP_ROOT_DIRECTORY . 'public' . DS . 'assets' . DS);

/** URL partielle de l'application - cette constante est utile pour le router  */
define('APP_ROOT_URL', str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));

/** URL complète de l'application en http:// ou https:// */
define(
    'APP_ROOT_URL_COMPLETE',
    isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] . "://{$_SERVER['HTTP_HOST']}" . APP_ROOT_URL :
  (strpos($_SERVER['SERVER_PROTOCOL'], 'HTTP/') !== false ? 'http' : 'https') .
  "://{$_SERVER['HTTP_HOST']}" . APP_ROOT_URL
);