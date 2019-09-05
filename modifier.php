<?php require_once("./sqlRequete/db.php");
    if ($_SESSION['user']['type'] == 'admin') {
       include('./headerLogOn.php'); 
    } else {
        header('Location: ../?accueil');
    }
        


    //var_dump($_GET);die;

    $id = $_GET['modifier?idPost'];
    $user = 'root';
    $pass = '0000';
    $connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
    $requete = $connect->prepare("SELECT * FROM post WHERE idPost='$id'");
    $requete->execute();
    $uniqueArticle = $requete->fetch(PDO::FETCH_ASSOC);
?>
<div class="form">
    <!-- Page Content -->
    <div class="container ajouter_style">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="addCss">
                <form action="sqlRequete/update.php?idPost=<?= $uniqueArticle['idPost'] ?>" method="POST" enctype="multipart/form-data"
                class="style-form">
                    <label>Titre de l'article:</label>
                    <input type="text" name="title" id="title" value="<?= $uniqueArticle['title'] ?>" required>
                    <label>Nouveau prix:</label>
                    <input type="number" name="price" id="price" value="<?= $uniqueArticle['price'] ?>" required>
                    <label> Choisir une autre photo ? </label>
                    <input type="file" name="my_file" value="<?= $uniqueArticle['photo'] ?>" class="buttonImg" required>

                   
                    <textarea rows="10" cols="50" name="commentaire" class="test-area-space" required><?= $uniqueArticle['commentaire'] ?></textarea>

                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('./footer.php') ?>