<?php

namespace App\Helper;

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
    return  <<<HTML_HEAD
 <!DOCTYPE html>
 <html lang="fr">
 
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
    echo APP_ROOT_URL_COMPLETE . $url;
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
