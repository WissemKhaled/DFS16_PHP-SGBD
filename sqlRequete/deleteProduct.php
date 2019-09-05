<?php 


session_start();
$user = 'root';
$pass = '0000';
$id = $_POST['deleteProduitPanier'];
$connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
$requete = $connect->prepare("DELETE FROM panier WHERE id='$id'");

$requete->execute();

header('Location: ../?panier');
