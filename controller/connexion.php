<?php 

            session_start();
            require_once("../bdd/config.php"); 
            
            if(isset($_POST["username"])){
                $valide= !empty($_POST["username"]) &&
                         !empty($_POST["password"]);
                if(!$valide){
                    echo "<p style='color:red'>Tous les champs sont obligatoire!</p>";
                }else{
                    $sql = "select * from stadium_user where login='".$_POST['username']."'";
                    
                    $stmt = $pdo->query($sql, PDO::FETCH_ASSOC); 
                    
                    $stmt->execute();
                    $result= $stmt->fetch();

                   //$goodPassword= password_verify($_POST['password'], $result["password"]);

                   
                    if($result){
                        $_SESSION["user"]= $result;
                        header('Location: ../index.php');  
                    }else{
                        echo "<p>Identifiants incorrect!</p>";
                    }
                }
            }else if(isset($_SESSION["user"])){
                header('Location: ../views/index.php'); 
            }
            
            ?>