<?php
require_once("./sqlRequete/db.php");
if ($_SESSION) {
  include('./headerLogOn.php');
} else {
  include('./header.php');
} ?>

<div class="form">
  <!-- Page Content -->
  <div class="container ajouter_style">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="addCss">
        <form action="sqlRequete/add.php" method="POST" enctype="multipart/form-data">
          <fieldset>
            <legend>Création d'un article de la boutique </legend>
            <div class="form-group">
              <label for="exampleInputEmail1">Titre</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" required>
            </div>
            <div class="form-group">
              <label for="exampleTextarea">Commentaire</label>
              <textarea class="form-control" id="exampleTextarea" name="commentaire" rows="3" ></textarea>
            </div>
            <div class="form-group">
              <label>Prix:</label>
              <input type="number" name="price" required>      
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="my_file" required>
            </div>
          </fieldset>
          <button type="submit" class="btn btn-primary">Submit</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- /.container -->
<?php include('./footer.php') ?>

