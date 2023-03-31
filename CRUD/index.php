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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
                <a href="./../user/form-inscription.php" class="connx">Connexion</a>
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

        ?>
        <div class="show-todo-section">
            <?php
            $todo = $conn->query('SELECT * FROM todo ORDER BY id DESC');

            if ($todo->rowCount() <= 0) { ?>
                <div class="tache">
                    <div class="vide">
                        <button class="btn_vide">
                            <i class="fa-regular fa-square-plus" style="color: #000000;"></i>
                        </button>
                    </div>
                </div>
            <?php } ?>

            <?php while($add_todo = $todo -> fetch(PDO :: FETCH_ASSOC)) { ?>
                <div class="tache">
                    <span id="<?php echo $add_todo['id'];?>"
                    class="supprimer_todo">x</span>
                    <?php if ($add_todo['valider']){?>
                    <input type="checkbox"
                           class="checkbox" 
                           checked>
                    <h2 class="valider"><?php echo $add_todo['titre'] ?></h2>
                    <?php } else { ?>
                        <input type="checkbox" 
                               class="checkbox">
                    <h2><?php echo $add_todo['titre'] ?></h2>
                    <?php } ?>
                    <br>
                    <small>créer le : <?php echo $add_todo['date_crea'] ?></small>
                </div>
            <?php } ?>
        </div>


    </main>


    <footer>
        <p class="retv">R&V Entertainment all right reserved</p>
        <a href="" class="dark">Mode sombre</a>
    </footer>


</body>

</html>