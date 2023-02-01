<?php
    $bdd = new PDO("mysql:host=localhost;dbname=sudpass_bdd", "root", "") or die('Could not Connect to Database');
    return $bdd;
?>