<?php require_once("./sqlRequete/db.php");
if ($_SESSION) {
    include('./headerLogOn.php');
} else {
    include('./header.php');
} 
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

//var_dump($request_uri);die;
?>

<div class="form">
    <div class="wrapper">
        <h2>Créer ton compte</h2>
        <form action="sqlRequete/firstConnexion.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
                    <input type="text" name="username" class="form-control" value="" required>
                <?php if (isset($name_error)): ?>
                <span><?php echo $name_error; ?></span>
            <?php endif ?>  
        </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="" required>
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>
<?php include('./footer.php') ?>

