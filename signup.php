<?php

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sudpass_bdd";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email and password from the POST request
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_retype = $_POST['password_retype'];

    // Check if the password and password retype match
    if ($password != $password_retype) {
        echo "Error: Passwords do not match";
        exit;
    }
    
    // Insert the email and password into the database
    $sql = "INSERT INTO user (email, password)
    VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    
    echo "New record created successfully";
}

?>
