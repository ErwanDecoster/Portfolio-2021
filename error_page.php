<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Erreur</title>
  </head>
  <body>
    <?php
    switch($_GET['code'])
    {
      case '310': echo "Ereur 310<br> vous avez etez redirigé a de trop nombreuses reprise";
      case '403': echo "Ereur 403<br> accès refusé";
      case '404': echo "Ereur 404<br> fichier introuvable";
      case '408': echo "Ereur 408<br> temps ecoulé";
      case '500': echo "Ereur 500<br> erreur serveur";
      case '503': echo "Ereur 503<br> erreur serveur, service temporairement indisponible ou en maintenance.";
      case '504': echo "Ereur 504<br> delais d'attente depasé le serveur n'a pas répondu.";
      break;
      default:header('Location: https://www.erwan.pro/');
    }
    ?>
  </body>
</html>
