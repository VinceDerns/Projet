<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Identification</h1>
        <section>
            <?php
          
            if (isset($_SESSION['login'])) {
                
                echo $_SESSION['login'];
            
                unset($_SESSION['login']);
            }
            ?>
        </section>
    </header>
    <main>
        <form action="authentification.php" method="post">
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="email" />
            </div>
            <div>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" placeholder="mot de passe" />
            </div>
            <div><input type="submit" value="Connecter" /></div>

        </form>
    </main>
</body>

</html>