<?php
include 'navbar.php';

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Requête pour récupérer toutes les données souhaitées
$user = $_SESSION['email'];

$query = 'SELECT password FROM password where user="'.$user.'"';
// Exécution de la requête et stockage des résultats dans une variable
$stmt = $bdd->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
      echo'
  <tr>
    <td><a href="'.$passwordinfo['url'].'" target="_blank"><img src="'.$passwordinfo['photo'].'" alt="Image 1"></td>
    <td>'.$passwordinfo['email'].'</td>
    ';?>
    <td>
      <div id="copy-buttons">
        <a class="copy-button" data-value="<?php echo $passwordinfo['password']; ?>"><i class="fa fa-eye"  style="font-size:28px;"></i></a>
</div>
</td>   
<?php
echo' 
    <td><a href="editpassword.php?id='.$passwordinfo['id'].'"><i class="fa fa-pencil"  style="font-size:28px;"></i></a></td>
  </tr>

  ';
}
?>

  
</table>

<script>
    var copyButtons = document.querySelectorAll(".copy-button");
    for (var i = 0; i < copyButtons.length; i++) {
        copyButtons[i].addEventListener("click", function() {
            // Récupération de la donnée depuis l'attribut "data-value"
            var data = this.getAttribute("data-value");
            // Création d'un élément de type "input" caché pour stocker temporairement la donnée
            var tempInput = document.createElement("input");
            // Attribution de la donnée à la valeur de l'élément "input"
            tempInput.value = data;
            // Ajout de l'élément à la page
            document.body.appendChild(tempInput);
            // Sélection de la valeur dans l'élément "input"
            tempInput.select();
            // Copie de la valeur sélectionnée dans le presse-papier
            // Exécution de la commande "copy" pour copier la valeur dans le presse-papier
            document.execCommand("copy");
            // Suppression de l'élément "input" de la page
            document.body.removeChild(tempInput);
            // Notification pour indiquer que la copie a réussi
        });
    }
</script>



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