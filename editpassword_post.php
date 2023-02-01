<?php
require_once 'config.php'; 

$stmt = $bdd->prepare('SELECT * FROM user WHERE id = :id');
$stmt->bindValue(':id', $_SESSION['id']);
$stmt->execute();
$reponseuser = $stmt->fetch(PDO::FETCH_ASSOC);  


$requete = $bdd->prepare('SELECT * FROM password  WHERE id="' . $_GET['id'] .'"');
$requete->execute();
$reponse = $requete->fetch(PDO::FETCH_ASSOC);  


$id = $_POST['id'];
$url = $_POST['url'];
$mail = $_POST['email'];
$password = $_POST['password'];
$pseudo = $_POST['user'];

$test = "test"; 


$photourl = "https://t1.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=";
$phototype ="&size=32";
$photo = "$photourl$url$phototype";

// Préparation de la requête d'insertion
$stmt = $bdd->prepare('UPDATE password SET user=:user, photo=:photo, url=:url, email=:mail, password=:password WHERE id=:id');

// Liaison des valeurs
$stmt->bindValue(':id', $id);
$stmt->bindValue(':user', $pseudo);
$stmt->bindValue(':photo', $photo);
$stmt->bindValue(':url', $url);
$stmt->bindValue(':mail', $mail);
$stmt->bindValue(':password', $password);

// Exécution de la requête
$stmt->execute();
header('Location: home.php');
?>