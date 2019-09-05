<?php require_once("./sqlRequete/db.php");


$request_uri = explode('?', $_SERVER['REQUEST_URI'], 3);

if (isset($request_uri[1])) {
    switch ($request_uri[1]) {
      case 'seConnecter':
        require_once 'seConnecter.php';
        break;
        // Creation d'utilisateur
      case 'creerUtilisateur':
        require_once 'creerUtilisateur.php';
        break;
        // Ajouter 
      case 'ajouter':
        require_once 'ajouter.php';
        break;
        // Admin 
      case 'administration':
        require_once 'administration.php';
        break;
        // Modifier 
      case 'modifier':
        require_once 'modifier.php';
        break;
        // Articles page
      case 'panier':
        require_once 'panier.php';
        break;
      case 'accueil':
        require_once 'accueil.php';
        break;
      case 'login':
        require_once 'index.php';
        break;
        // Everything else
      default:
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        require_once '404.php';
        exit;
    
    } 
}else { 
    require_once 'index.php';
}

if ($_SESSION) {
    include('./headerLogOn.php');
} else {    
    include('./header.php');
    } 
?>
