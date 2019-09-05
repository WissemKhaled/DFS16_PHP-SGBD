
<?php 
    session_start();
    $title = $_POST['title'];
    $commentaire = $_POST['commentaire'];
    $id = $_SESSION['user']['idUser'];


    if (string ($_FILES['my_file']['name']!="")){
    // Where the file is going to be stored
        $target_dir = "../css/photos/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
    
    // Check if file already exists
    if (file_exists($path_filename_ext)) {
        echo "Sorry, file already exists.";
    } else { 
        //var_dump('/var/www/html,'' $path_filename_ext, $target_dir); die;
        $pathFinding = '/var/www/html'.$path_filename_ext;
        //var_dump($temp_name,$pathFinding) ;die;
        move_uploaded_file($temp_name, "$pathFinding");
    }
}


$connect = new PDO('mysql:host=localhost;dbname=website', 'root', '0000');
$requete = "INSERT INTO post (title, commentaire, photo, idUser) VALUES('$title', '$commentaire', '$filename.$ext', $id)";
$requete_preparee = $connect->prepare($requete);
$requete_preparee->execute();

header('Location: ../?accueil'); 
    
?> 
