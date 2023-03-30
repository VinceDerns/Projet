<?php

session_start();
$nom = $_POST['nom'] ?? null;
$prenom = $_POST['prenom'] ?? null;
$email = $_POST['email'] ?? null;
$mdp = $_POST['mdp'] ?? null;
if (    
    !is_null($nom) && strlen($nom) <= 100 &&   
    !is_null($prenom) && strlen($prenom) <= 50 &&    
    !is_null($email) && strlen($email) <= 255 && filter_var($email, FILTER_VALIDATE_EMAIL) && 
    !is_null($mdp) && preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/', $mdp)   
) {
    $pathTobaseDonneeConnection = __DIR__ . '/../baseDonneeConnection.php';
    require_once $pathTobaseDonneeConnection;   

    $sql = 'insert into utilisateurs values(null, :nom, :prenom, :email, :mdp);'; 
    $stmt = $pdo->prepare($sql);
    $mdp = dataCleaning($mdp);       
    $res = $stmt->execute([
        'nom' => dataCleaning($nom),
        'prenom' => dataCleaning($prenom),
        'email' => dataCleaning($email),        
        'mdp' => password_hash($mdp, PASSWORD_ARGON2I),        
    ]);
    if ($res) {
        $_SESSION['creationCompte'] = 'Le compte a été succès';
    } else {
        $_SESSION['creationCompte'] = 'Une erreur est survenue lors de la création du compte, veuillez ré essayer dans quelques instant et contacter l\'administrateur du site si le problèmeme persiste';
    }
} else {
    
    $_SESSION['creationCompte'] = 'Veuillez vérifier les informations saisie sur le formulaire';
}
header('location:form-inscription.php');