<?php

session_start();
$id = $_GET['idPost'];
$user = 'root';
$pass = '0000';
$connect = new PDO('mysql:host=localhost;dbname=website', $user, $pass);
$requete = $connect->prepare("DELETE FROM post WHERE idPost='$id'");
$requete->execute();

header('Location: ../?accueil');
