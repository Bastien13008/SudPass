<?php
require_once 'config.php'; 
session_start();

$requete = $bdd->prepare('SELECT * FROM user');
$requete->execute();
$reponse = $requete->fetch(PDO::FETCH_ASSOC); 


$code = isset($_POST['code']) ? preg_replace('/[^a-zA-Z0-9]+/', '', $_POST['code']) : '';
if( empty($code) ) {
  echo 'Vous devez saisir un code';
}
else {
  $dedipass = file_get_contents('http://api.dedipass.com/v1/pay/?public_key=c91d42d53235f9edea24cdcdf3726543&private_key=946b6732c3229c1f5973d96bc5152bce6ef662b5&code=' . $code);
  $dedipass = json_decode($dedipass);
  if($dedipass->status == 'success') {
    // Le transaction est validée et payée.
    
$requetefinal=$bdd->exec('UPDATE user SET subscribe=subscribe + 1 WHERE email="'.$reponse['email'].'"');

  }
  else {
    // Le code est invalide
    echo 'Le code '.$code.' est invalide';
  }
}
header('Location: home.php');
?>