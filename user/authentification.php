<?php
session_start();

$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp'] ?? null;

if (
  
    !is_null($email) && strlen($email) <= 255 && filter_var($email, FILTER_VALIDATE_EMAIL) &&
    
    !is_null($mdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $mdp)
) {
    
    $pathTobaseDonneeConnection = __DIR__ . '/../baseDonneeConnection.php';
    require_once $pathTobaseDonneeConnection;
    $sql = 'select * from utilisateurs where email = :email';    
    $stmt = $pdo->prepare($sql);
    
    $res = $stmt->execute(['email' => dataCleaning($email)]);    
    if ($res) {       
        $user = $stmt->fetch();        
        if (password_verify($mdp, $user['mdp']) === true) {            
            $_SESSION['accueil'] = 'Bienvenue ' . $user['prenom'] . ' ' . $user['nom'];
            $_SESSION['user'] = $user;          
            header('location:accueil.php');            
            die();
        } else {
            $_SESSION['login'] = 'Merci de vérifier votre email et/ou votre mot de passe';
        }
    } else {
        $_SESSION['login'] = 'Une erreur est survenue lors de la création du compte, veuillez ré essayer dans quelques instant et contacter l\'administrateur du site si le problèmeme persiste';
    }
} else {
    
    $_SESSION['login'] = 'Veuillez vérifier les informations saisie sur le formulaire';
}
header('location:login.php');
