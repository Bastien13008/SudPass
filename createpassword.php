<?php
include 'navbar.php';

?>
<div class="form">
<form action="createpassword_post.php" method="post">
    <input type="text" placeholder="Url Site web" name="url">
    <input type="email" placeholder="Email" name="email">
    <input type="text" id="passwordInput" placeholder="Password" name="password">
    <button type="button" id="generateBtn">Generate Password</button>
    <button type="submit">Enregistrer</button>
  </form>
</div>



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