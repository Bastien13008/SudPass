<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php
session_start();

    // Connexion à la base de données
    $host = "localhost";
    $dbname = "sudpass_bdd";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Définition de l'encodage UTF-8
        $conn->exec("set names utf8");
        // Définition de l'erreur de levée d'exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Requête pour récupérer toutes les données souhaitées
        $user = $_SESSION['email'];

        $query = 'SELECT password FROM password where user="'.$user.'"';
        // Exécution de la requête et stockage des résultats dans une variable
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Error : " . $e->getMessage();
    }
?>

<div id="copy-buttons">
    <?php foreach ($results as $result) { ?>
        <a class="copy-button" data-value="<?php echo $result['password']; ?>"><i class="fa fa-eye"  style="font-size:28px;"></i></a>
    <?php } ?>
</div>

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
            alert("Donnée copiée dans le presse-papier !");
        });
    }
</script>
