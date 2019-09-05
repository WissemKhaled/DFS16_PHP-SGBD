
<?php 
    session_start();
    $id = $_GET['idPost'];
    $idUser = $_SESSION['user']['idUser'];

    $connect = new PDO('mysql:host=localhost;dbname=website', 'root', '0000');

    $requetePanierUser = "SELECT * FROM panier WHERE idUser='$idUser'";
    $requetePanierUserExe = $connect->prepare($requetePanierUser);
    $requetePanierUserExe->execute();
    $panierComplet = $requetePanierUserExe->fetchAll(PDO::FETCH_ASSOC);
    

    foreach($panierComplet as $compareAchat) {
        if ( $compareAchat['idPost'] == $id) {
            $quantity = $compareAchat['quantity'];
            $oneMore = $quantity + 1;
            $idAchat = $compareAchat['id'];
            $requeteUpdate = "UPDATE panier SET quantity = '$oneMore' WHERE id = '$idAchat'";
            $requeteUpdatedFinish = $connect->prepare($requeteUpdate);
            $requeteUpdatedFinish->execute();
            header('Location: ../?panier');
            exit;
        } else {

        }
    } 

    $requete = "INSERT INTO panier (idUser, idPost, quantity) VALUES('$idUser', '$id', 1)";
    $requete_preparee = $connect->prepare($requete);
    $requete_preparee->execute();

    header('Location: ../?panier');
   
    
?> 
