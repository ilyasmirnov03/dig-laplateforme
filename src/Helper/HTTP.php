<?php

namespace App\Helper;

/**
 * Classe HTTP avec des methodes :
 *  - is_method_get() pour verifier si le serveur est en GET
 *  - head(string $title) qui renvoit le head en HTML
 *  - footer() qui renvoit le footer en HTML
 *  - url(string $url) pour generer des url 
 *  - redirect(string $url) pour generer des url dans header()
 */
class HTTP
{
  public static function is_method_get(): bool
  {
    return $_SERVER['REQUEST_METHOD'] === 'GET';
  }

  /**
   * Affiche le head du HTML.
   *
   * @param string $title  le titre de la page.
   * @return string
   */
  public static function head(string $title = ''): string
  {
    $css = HTTP::url('/assets/css/styles.css');
    return  <<<HTML_HEAD
 <!DOCTYPE html>
 <html lang="fr">
 
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://www.la-plate-forme.fr/themes/lpf/assets/cache/theme-ea2af4201.css" media="all">
   <link href="$css" rel="stylesheet">
   <script src="https://kit.fontawesome.com/3a4ebac570.js" crossorigin="anonymous"></script>
   <title>$title</title>
 </head>
 HTML_HEAD;
  }


  /**
   * Affiche le footer du HTML.
   *
   * @return string
   */
  public static function footer(): string
  {
    return  <<<HTML_FOOTER
</body>
</html>
HTML_FOOTER;
  }

  /**
   * Retourne l'URL complète.
   *
   * @param string $url
   * @return string
   */
  public static function url(string $url = '')
  {
    // ajouter le slash si nécéssaire
    $url = substr($url, 0, 1) != '/' ? '/' . $url : $url;
    return APP_ROOT_URL_COMPLETE . $url;
  }

  /**
   * Redirige vers une commande.
   *
   * @param string $url
   * @return void
   */
  public static function redirect(string $url = '/')
  {
    header('Location: ' . APP_ROOT_URL_COMPLETE . $url);
  }
}
