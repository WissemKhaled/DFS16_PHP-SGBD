<?php 
    session_start();
    $nom = $_POST['username'];
    $password = md5($_POST['password']);
    $checkifExiste = false;
    
    $connect = new PDO('mysql:host=localhost;dbname=website', 'root', '0000');
    $requete = $connect->prepare("SELECT * FROM users INNER JOIN role ON users.idType = role.idType");
    $requete->execute();
    $users = $requete->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        if($nom == $user['username']) {
            $checkifExiste = true; 
            echo("<script> alert('Ce nom existe déjà. Choisissez en un nouveau.'); window.location.href='javascript:history.go(-1)'; </script>");
        } 
    }

    if( $checkifExiste == false) {
        $requete = "INSERT INTO users (username, password, idType) VALUES('$nom', '$password', '3')";
        $requete_preparee = $connect->prepare($requete);
        $requete_preparee->execute();
        header('Location: ../?accueil');
    }  
