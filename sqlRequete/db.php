<?php
session_start();
// $id = $_POST['id'];


$user = 'root';
$pass = '0000';
$connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
$requete = $connect->prepare("SELECT * FROM post ORDER BY idPost DESC LIMIT 10");
$requete->execute();


$allPost = $requete->fetchAll(PDO::FETCH_ASSOC);

