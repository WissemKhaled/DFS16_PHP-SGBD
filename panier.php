<?php require_once("./sqlRequete/db.php");
    if ($_SESSION['user']['type'] == 'user') {
       include('./headerLogOn.php'); 
    } else {
        header('Location: ../?accueil');
    }
    
    // $id = $_GET['modifier?idPost'];
    $id = $_SESSION['user']["idUser"];

    $user = 'root';
    $pass = '0000';
    $connect = $connectOne = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
    ?>
    <div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $prices = [];
                      $requete = $connect->prepare("SELECT * FROM panier WHERE idUser = :idUser");
                      $requete->execute([":idUser" => $id]);
                      $panierComplet = $requete->fetchAll(PDO::FETCH_ASSOC);
                        
                      foreach ($panierComplet as $info) {
                        $oneProd = $info['idPost'];
                        $requeteOne = $connectOne->prepare("SELECT * from post WHERE idPost='$oneProd'");
                        $requeteOne->execute();
                        $infoUnique = $requeteOne->fetchAll(PDO::FETCH_ASSOC);
                        


                       foreach ($infoUnique as $produitUnique) {
                           
                        //$prices[] = $produitUnique['price'];
                        if ($info['quantity'] > 1) {
                            $now = ($info['quantity'] * $produitUnique['price']);
                            } else {
                                $now = $produitUnique['price'];
                            }
                            $prices[] = $now;
                            $idToSup = $info['id'];

                       ?>
                        <tr>
                            <td><?=$produitUnique['title']?></td>
                            <td><?=$info['quantity']?></td>
                            <td class="text-right"><?=$produitUnique['price']?></td>
                            <td class="text-right">
                            <form class="" action="sqlRequete/deleteProduct.php" method="post">
                                <input type="hidden" name="deleteProduitPanier" value="<?= $info['id'] ?>">
                                <button type="submit"class="btn btn-sm btn-danger">X<i class="fa fa-trash"></i> </button> </td>
                            </form>
                        </tr>
                        <?php    } 
                        
                         } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sous-Total</td>
                              <?php
                              $prixTotal = array_sum($prices);
                               ?>
                            <td class="text-right"><?= $prixTotal; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Frais de port</td>
                            <?php
                            $fdp = '18.99'
                             ?>
                            <td class="text-right"><?= $fdp.' €' ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?=$prixTotal + $fdp.'0 €' ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                  <a href="?accueil"><button class="btn btn-light">Continuer votre shopping</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-success text-uppercase" disabled>Passer à l'achat</button>
                </div>
            </div>
        </div>
    </div>
</div>