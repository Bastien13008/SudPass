<?php
include 'navbar.php';
$stmt = $bdd->prepare('SELECT * FROM user');
$stmt->execute();
$profilinfo = $stmt->fetch(PDO::FETCH_ASSOC);
echo'
<div class="box3">
  <p class="box3">Email : '.$profilinfo['email'].'<br>
 <br>Password Stockée : '.$profilinfo['number_password'].'<br><br>

';
?>
<?php
if($profilinfo['subscribe']==0){
    echo'
    Abbonée : Non
    ';
}else{
    echo'
    Abbonée : Oui
    ';
}

?>
</p>
</div>