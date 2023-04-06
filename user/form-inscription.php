<?php
// je créer ou récupere une session
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Inscription d'un utilisateur</title>
</head>

<body>
	<header>
		<h1>To Do List</h1>
		<h2>Inscription</h2>
		<section>
			
			<?php
			
			if (isset($_SESSION['creationCompte'])) {
				
				echo $_SESSION['creationCompte'];
				
				unset($_SESSION['creationCompte']);
			}
			?>
		</section>
	</header>
	<main>
		<form action="inscription.php" method="post">
			<div>
				<label for="nom">Nom</label>
				<input type="text" name="nom" id="nom" placeholder="nom" />
				<img src="captcha.php" alt="">
			</div>
			<div>
				<label for="prenom">Prénom</label>
				<input type="text" name="prenom" id="prenom" placeholder="prénom" />
			</div>
			<div>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" placeholder="email" />
			</div>			
			<div>
				<label for="mdp">Mot de passe</label>
				<input type="password" name="mdp" id="mdp" placeholder="mot de passe" />
			</div>		
			
			<div><input type="submit" value="Enregistrer" /></div>
		</form>

	</main>
</body>

</html>