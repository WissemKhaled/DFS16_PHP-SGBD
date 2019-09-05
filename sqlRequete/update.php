<?php
session_start();
$title = $_POST['title'];
$commentaire = $_POST['commentaire'];
$prix = $_POST['price'];
$id = $_GET['idPost'];

if ($_FILES['my_file']['name']) {
    // Where the file is going to be stored
    $target_dir = "../css/photos/";
    $file = $_FILES['my_file']['name'];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $temp_name = $_FILES['my_file']['tmp_name'];
    $path_filename_ext = $target_dir . $filename . "." . $ext;

    // Check if file already exists
    if (file_exists($path_filename_ext)) {
        echo "Sorry, file already exists.";
    } else {
        $pathFinding = $path_filename_ext;
        move_uploaded_file($temp_name, "$pathFinding");
    }

    $connect = new PDO('mysql:host=localhost;dbname=website', 'root', '0000');
    $requeteUpdate = "UPDATE post SET title = '$title',commentaire = '$commentaire',price = '$prix', photo = '$filename.$ext' WHERE idPost = '$id'";
    $requete_preparee = $connect->prepare($requeteUpdate);
    $requete_preparee->execute();


    header('Location: ../?accueil');
}


?>