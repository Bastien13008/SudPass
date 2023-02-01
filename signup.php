<?php 
require_once 'config.php'; 
if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_retype = htmlspecialchars($_POST['password_retype']);


        $check = $bdd->prepare('SELECT  email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); 

        $token = 0;
        if($row == 0){ 
                if(strlen($email) <= 100){ 
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                        if($password === $password_retype){ 
                            $ip = $_SERVER['REMOTE_ADDR']; 
                            $insert = $bdd->prepare('INSERT INTO user(email, password) VALUES(:email, :password)');
                            $insert->execute(array(
                                'email' => $email,
                                'password' => $password
                            ));
                            header('Location: index.php');
                            die();
                        }else{ header('Location: inscription.php'); die();}
                    }else{ header('Location: inscription.php'); die();}
                }else{ header('Location: inscription.php'); die();}
            }else{ header('Location: inscription.php'); die();}
        }else{ header('Location: inscription.php'); die();}
    