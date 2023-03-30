<?php
require 'bd_conn.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elsie:wght@400;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ea6733594a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
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
                <a href="./connx.html" class="connx">Connexion</a>
                <a href="./inscrip.html">Inscription</a>
            </div>
        </nav>
    </header>

    <main>
        <div class="main-section">
            <div class="tapertache">
                <form action="">
                    <input class="barretache" type="text" name="title" placeholder="Saisir une tâche">
                    <button class="bouton" type="submit">Ajouter &nbsp; <span>&#43;</span></button>
                </form>
            </div>
        </div>
        <?php
        $todo = $conn->query('SELECT * FROM todo ORDER BY id DESC');
        ?>
        <div class="show-todo-section">
            <?php
            if ($todo->rowCount() > 0) { ?>
                <div class="tache">
                    <div class="vide">
                        <button class="btn_vide">
                            <img src="./../images/tete_romain.jpg" alt="">
                        <i class="fa-regular fa-square-plus" style="color: #000000;"></i>
                        </button>
                    </div>
                </div>
            <?php } ?>

            <div class="tache">
                <input type="checkbox">
                <h2>Tâche à faire</h2>
                <br>
                <small>créer le : 30/03/2023</small>
            </div>
        
        </div>


    </main>


    <footer>
        <p class="retv">R&V Entertainment all right reserved</p>
        <a href="" class="dark">Mode sombre</a>
    </footer>


</body>

</html>