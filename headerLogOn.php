<?php
require_once("./sqlRequete/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog du HardKiller - Futuring Underground Website</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="?accueil">Boutique Inkongru</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <?php if ($_SESSION) :  ?>
                    <h4 style="margin: 0;" class="navbar-brand"> Bienvenue <?= $_SESSION['user']['username'] ?></h4>
                <?php endif ?>
                <ul class="navbar-nav ml-auto">
                    <?php if ($_SESSION['user']["type"] == 'admin' ) :  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?ajouter">Approvisionner la boutique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="?administration">Supprimer un compte</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="?creerUtilisateur">Créer un compte</a>
                        </li>
                    <?php elseif  ($_SESSION['user']["type"] == 'user' ) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?panier" >Panier</a>
                        </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" >Se déconnecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>