<?php
require './bd_conn.php';
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
    <script src="../js/script.js" defer></script>
    <link rel="stylesheet" href="/../Projet//css/style.css">
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
        <div class="main-section">
            <div class="tapertache">
                <form action="../app/ajouter.php" method="POST" autocomplete="off">
                    <?php if (isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                        <input class="barretache" type="text" name="title" placeholder="Veuillez saisir une tâche." style="border-color: red">
                        <button class="bouton" type="submit">Ajouter &nbsp; <span>&#43;</span></button>
                    <?php } else { ?>
                        <input class="barretache" type="text" name="title" placeholder="Saisir une tâche !">
                        <button class="bouton" type="submit">Ajouter &nbsp; <span>&#43;</span></button>
                    <?php } ?>
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

            <?php while ($add_todo = $todo->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="tache">
                    <button id="<?php echo $add_todo['id']; ?>" 
                    class="supprimer_todo">X</button>                    
                    <?php if ($add_todo['valider']) { ?>
                        <input type="checkbox" 
                        data-todo-id="<?php echo $add_todo['id']; ?>" 
                        class="checkbox" 
                        checked>
                        <h2 class="valider"><?php echo $add_todo['titre'] ?></h2>
                    <?php } else { ?>
                        <input type="checkbox" 
                        data-todo-id="<?php echo $add_todo['id']; ?>" 
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
        <a href="" class="dark" id="dark">Mode sombre</a>
    </footer>
    <script src="../js/jquery.js"></script>

    <script>
        $(document).ready(function() {
            $('.supprimer_todo').click(function() {
                const id = $(this).attr('id');

                $.post("../app/supp.php", {
                    id: id
                }, (data) => {
                    if (data) {
                        $(this).parent().hide(800);
                    }
                });
            });

           $(".checkbox").click(function(e){
            const id = $(this).attr('data-todo-id');

            $.post('../app/valider.php', {
                id: id

            },             
            (data) => {
                if (data != 'erreur') {
                    const h2 = $(this).next();
                    if(data === '1') {
                        h2.removeClass('valider');
                    } else {
                        h2.addClass('valider');
                    }
                }
            })

                   
        
           });
        });
    </script>
</body>

</html>