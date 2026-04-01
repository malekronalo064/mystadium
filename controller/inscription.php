<?php 
require_once("../bdd/config.php"); 

            if(isset($_POST["lastname"])){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
        $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : '';
        $login = isset($_POST['login']) ? trim($_POST['login']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        $valide = $firstname !== '' && $lastname !== '' && $email !== '' && $telephone !== '' && $login !== '' && $password !== '';
        if (!$valide) {
            set_flash('Tous les champs sont obligatoires!', 'error');
            header('Location: /views/inscription.php');
            exit;
        } else {
            $csrf = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
            if (!verify_csrf_token($csrf)) {
                set_flash('Jeton CSRF invalide.', 'error');
                header('Location: /views/inscription.php');
                exit;
            }
            // basic email validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    set_flash('Email invalide.', 'error');
                    header('Location: /views/inscription.php');
                    exit;
            } else {
                // hash password before storing
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO stadium_user(firstname, lastname, email, telephone, login, password) VALUES (:firstname, :lastname, :email, :telephone, :login, :password)";
                $stmt = $pdo->prepare($sql);
                try {
                    $stmt->execute([
                        ':firstname' => $firstname,
                        ':lastname' => $lastname,
                        ':email' => $email,
                        ':telephone' => $telephone,
                        ':login' => $login,
                        ':password' => $hash
                    ]);
                    set_flash('Inscription réussie. Vous pouvez vous connecter.', 'success');
                    header('Location: /views/connexion.php');
                    exit;
                } catch (PDOException $ex) {
                    // handle duplicate login or other DB errors
                    set_flash('Erreur lors de l\'inscription: ' . $ex->getMessage(), 'error');
                    header('Location: /views/inscription.php');
                    exit;
                }
            }
        }
    }
            }
?>