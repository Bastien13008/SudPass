<?php
require_once 'config.php'; 

session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
      $email = $_POST['email']; 
      $motdepasse = $_POST['password'];

      
         if($email !== "" && $motdepasse !== ""){
         $requete = $bdd->prepare("SELECT count(*), id FROM user WHERE email = ? AND password = ?");
         $requete->bindParam(1, $email);
         $requete->bindParam(2, $motdepasse);

         $requete->execute();
         $reponse = $requete->fetch(PDO::FETCH_ASSOC);
         $count = $reponse['count(*)'];
         if($count!=0) 
         {  
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $reponse['id'];
            $_SESSION['acces'] = 1;
            
            if (isset($_POST["remember_me"])) {
              setcookie("remember_me", "true", time() + (10 * 365 * 24 * 60 * 60));
            } else {
              setcookie("remember_me", "", time() - 3600);
            }
            
            header('Location: home.php');
         }
         else
         {
            header('Location: index.php');
         }
      }
   }
else
{
   header('Location: index.php');
}
?>
