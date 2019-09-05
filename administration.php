<?php
require_once("./sqlRequete/db.php");

if($_SESSION['user']['type'] == 'admin') {
    include('./headerLogOn.php');
    } else {
        header('Location: ../?accueil');
    }
;

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);


$id = "";
$user = 'root';
$pass = '0000';
$connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
$requete = $connect->prepare("SELECT * FROM users   ");
$requete->execute();
$allUsers = $requete->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $onUser = $connect->prepare("DELETE FROM users WHERE idUser='$id'");
   
    $onUser->execute();
    header('Location: ../?accueil');
}

?>


<div class="form">
    <div class="row_spe">
        <form action="" method="POST" class="form-admin">
            <fieldset>
                <legend>Choisissez un utilisateur</legend>
                <div class="form-group">
                    <select class="form-control" id="id" name="id">
                        <?php foreach ($allUsers as $user) : ?>
                            <option value="<?= $user['idUser'] ?>"><?= $user['username'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button type="submit" class="btn text-danger">Supprimer le compte</button>
            </fieldset>
        </form>
       
    </div>
</div>








<?php include('./footer.php') ?>