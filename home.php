<?php
include 'navbar.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<table>
      <tr>
        <th>Lien</th>
        <th>Email</th>
        <th>Password</th>
        <th>Modifier</th>
    
      </tr>
  <?php
  require_once 'config.php'; 

  $user = $_SESSION['email'];
  $stmt = $bdd->prepare('SELECT * FROM password where user="'.$user.'"');
  $stmt->execute();
  
  while ($passwordinfo = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo('
  <tr>
    <td><a href="'.$passwordinfo['url'].'" target="_blank"><img src="'.$passwordinfo['photo'].'" alt="Image 1"></td>
    <td>'.$passwordinfo['email'].'</td>
    <td><a href="#" ><i class="fa fa-eye"  style="font-size:28px;"></i></a></td>
    <td><a href="editpassword.php?id='.$passwordinfo['id'].'"><i class="fa fa-pencil"  style="font-size:28px;"></i></a></td>
  </tr>
  ');
}
?>

  
</table>
<style>
   table {
  width: calc(100% - 200px);
  margin-left: 165px;
  border-collapse: collapse;
}

th, td {
  border: 1px solid white;
  font-weight: bold;
  font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  padding: 5px;
  color:white;
}

th {
  background-color: #444;
  color: white;
  text-align: left;
  font-weight: bold;
}

img {
  width: 50px;
  height: 50px;
}

a {
  color: white;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

a:hover {
  background-color: #16191b;
}

</style>