<?php
include 'config.php'; 


$requete = $bdd->prepare('SELECT * FROM password  WHERE id="' . $_GET['id'] .'"');
$requete->execute();
$reponse = $requete->fetch(PDO::FETCH_ASSOC);  

include 'navbar.php';
echo'
<div class="form">
<form action="editpassword_post.php" method="post">
    <img src="'.$reponse['photo'].'" alt="Image 1">
    <br>
    <input type="hidden" name="id"  value="'.$reponse['id'].'">
    <input type="text" placeholder="Url Site web" value="'.$reponse['url'].'" name="url">
    <input type="email" placeholder="Email" value="'.$reponse['email'].'" name="email">
    <input type="text" id="passwordInput" placeholder="Password" value="'.$reponse['password'].'" name="password">
    <button type="button" id="generateBtn">Generate Password</button>
    <button type="submit">Enregistrer</button>
    <a href="deletepassword.php?id='.$reponse['id'].'">
    <button type="button">Delete</button>
    </a>
  </form>

</div>
';
?>



<script>
  function generatePassword() {
    const passwordLength = 20;
    const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{};:'\"\\|,.<>/?`~";
    let password = "";
    for (let i = 0, n = charset.length; i < passwordLength; ++i) {
      password += charset.charAt(Math.floor(Math.random() * n));
    }
    document.getElementById("passwordInput").value = password;
  }

  document.getElementById("generateBtn").addEventListener("click", generatePassword);
</script>