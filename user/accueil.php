<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['login']='Vous devez être identifié pour accéder a cette page';   
    header('location:login.php');
}
echo '<pre>'. print_r($_SESSION,true).'</pre>';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
</head>

<body>
<header>
        <nav>
            <div class="navgauche">
                <a href="./index.html"><img src="../images/place.jpg" alt=""></a>
                <h1 class="titre">ToDoList</h1>
            </div>
            <div class="navdroite">
                <a href="./../user/login.php" class="connx">Connexion</a>
                <a href="./../user/form-inscription.php">Inscription</a>
            </div>
        </nav>
    </header>
    <main>
        <?php
        $nom = $_SESSION['user']['nom'];
        $prenom = $_SESSION['user']['prenom'];
        echo "Bienvenue $prenom $nom";
        ?>
    </main>
    <p><a href="logout.php">Deconnexion</a></p>
</body>

</html>