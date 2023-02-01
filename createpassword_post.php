<?php
session_start();
require_once 'config.php'; 

$stmt = $bdd->prepare('SELECT * FROM user WHERE id = :id');
$stmt->bindValue(':id', $_SESSION['id']);
$stmt->execute();
$reponseuser = $stmt->fetch(PDO::FETCH_ASSOC);  

$requetenumber=$bdd->exec('UPDATE user SET number_password= number_password + 1 WHERE email="'.$reponseuser['email'].'"');


$url = $_POST['url'];
$mail = $_POST['email'];
$password = $_POST['password'];
$pseudo = $reponseuser['email']; 

$photourl = "https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=";
$phototype ="&size=32";

$photo = "$photourl$url$phototype";
// Préparation de la requête d'insertion
$stmt = $bdd->prepare("INSERT INTO password (user, photo, url, email, password) VALUES (:user, :photo, :url, :mail, :password)");

// Liaison des valeurs
$stmt->bindValue(':user', $pseudo);
$stmt->bindValue(':photo', $photo);
$stmt->bindValue(':url', $url);
$stmt->bindValue(':mail', $mail);
$stmt->bindValue(':password', $password);

// Exécution de la requête
$stmt->execute();
header('Location: home.php');
?>