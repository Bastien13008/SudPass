<?php
session_start();
require_once 'config.php'; 
$stmt = $bdd->prepare('SELECT * FROM user WHERE id = :id');
$stmt->bindValue(':id', $_SESSION['id']);
$stmt->execute();
$reponseuser = $stmt->fetch(PDO::FETCH_ASSOC);  

$insertUser=$bdd->exec('DELETE FROM password WHERE id="' . $_GET['id'] .'"');
$requetenumber=$bdd->exec('UPDATE user SET number_password= number_password - 1 WHERE email="'.$reponseuser['email'].'"');
header('Location: home.php');
?>