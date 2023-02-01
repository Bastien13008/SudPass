<?php
   require_once 'config.php'; 
   session_start();
   $stmt = $bdd->prepare('SELECT * FROM user WHERE id = :id');
   $stmt->bindValue(':id', $_SESSION['id']);
   $stmt->execute();
   $reponseuser2 = $stmt->fetch(PDO::FETCH_ASSOC);  
?>
<link rel="stylesheet" type="text/css" href="css/home.css">
<div class="navbar">
  <a href="profil.php">Profil</a>
  <?php
  if ($reponseuser2['number_password'] >= 5 && $reponseuser2['subscribe'] == 1) {

    echo'
    <a href="createpassword.php">Crée un password</a>
    ';
  }elseif($reponseuser2['number_password'] >= 5 && $reponseuser2['subscribe'] == 0){
    echo'
    <a href="passwordlimit.php">Crée un password</a>
    ';
  }else{
    echo'
    <a href="createpassword.php">Crée un password</a>
    ';
  }
 
  ?>
  <a href="home.php">Password</a>
  <?php
  if ($reponseuser2['subscribe'] == 0) {
    echo'
  <a href="upgrade.php">Upgrade</a>
  ';
  }else{

  }
?>
  <a href="logout.php">Déconnexion</a>
</div>
