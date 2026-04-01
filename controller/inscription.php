<?php 
require_once("../bdd/config.php"); 

            if(isset($_POST["lastname"])){
                $valide= !empty($_POST["lastname"]) &&
                         !empty($_POST["firstname"]) &&
                         !empty($_POST["email"]) &&
                         !empty($_POST["telephone"]) &&
                         !empty($_POST["login"]) &&
                         !empty($_POST["password"]);
                if(!$valide){
                    echo "<p style='color:red'>Tous les champs sont obligatoires !</p>";
                }else{

                    //crypter le password
                    $_POST['password']= password_hash($_POST['password'], PASSWORD_DEFAULT);

                    //entrer des données

                    $sql = "INSERT INTO stadium_user(firstname, lastname, email, telephone, login, password) 
                    VALUES (:firstname, :lastname, :email, :telephone, :login, :password)";
                    $stmt = $pdo->prepare($sql);
                    $result= $stmt->execute($_POST);
                    header('Location: ../views/connexion.php'); 
                }
            }
?>