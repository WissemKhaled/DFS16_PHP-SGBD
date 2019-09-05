<?php
require_once("./sqlRequete/db.php");

if ($_SESSION) {
  include('./headerLogOn.php');
} else {
  include_once('./header.php');
}

?>

<div class="container">
  <div class="row">
    <h1 class="my-4 title">Article</h1>
    <div class="element-article">
      <?php foreach ($allPost as $post) : ?>
        <div class="card mb-4 article-style">
          <h3 class="card-title"> <?= $post['title'] ?> </h3>
          <div class="image_style">
            <img src="./css/photos/<?= $post['photo'] ?>" />
          </div>
          <div class="card-body">
            <p class="card-text"> <?= $post['commentaire'] ?> </p>
            <p>Prix :  <?= $post['price'] ?> €<p>
            <?php if ($_SESSION && ( $_SESSION['user']["type"] == 'admin' || $_SESSION['user']["type"] == 'modo')) : ?>
              <a href="?modifier?idPost=<?= $post['idPost'] ?>" class="btn btn-primary">Modifier</a>
              <a href="sqlRequete/delete.php?idPost=<?= $post['idPost'] ?>" class="btn btn-danger">Supprimer</a>
            <?php elseif ($_SESSION && ($_SESSION['user']["type"] == 'user')) : ?>
              <a href="sqlRequete/buy.php?idPost=<?= $post['idPost'] ?>" class="btn btn-success">Acheter</a>
              <?php endif ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php include('./footer.php') ?>